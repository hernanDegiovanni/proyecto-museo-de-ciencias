<?php

// Conexion a la Base de Datos Biblioteca 

 require_once "../conexion.php";

 //Funcion de Validacion de Datos

 require_once "funcionesvalpieza.php";




$error = "";



// Procesar el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {

   
    if(!empty(trim($_POST['num_inventario'])) && !empty(trim($_POST['estado_conservacion'])) && !empty(trim($_POST['fecha_ingreso'])) && !empty(trim($_POST['cantidad_de_piezas'])) && !empty(trim($_POST['clasificacion']))  && !empty(trim($_POST['observacion_piezas'])) && !empty(trim($_POST['donante_id']))){
        
        if (ValidacionPieza()) {
                 $num_inventario = $_POST['num_inventario'];
                $estado_conservacion = $_POST['estado_conservacion'];
                $fecha_ingreso = $_POST['fecha_ingreso'];
                $cantidad_de_piezas = $_POST['cantidad_de_piezas'];
                $clasificacion = $_POST['clasificacion'];
                $observacion_piezas = $_POST['observacion_piezas'];
                $donante_id = $_POST['donante_id'];


                    // Validar si el número de inventario ya existe en la base de datos
                    $sql_check = "SELECT COUNT(*) FROM pieza WHERE num_inventario = '$num_inventario'";
                    $result = $conex->query($sql_check);
                    
                    if ($result) {
                        $row = $result->fetch_row();
                        $count = $row[0];

                        // Si el número de inventario ya existe
                        if ($count > 0) {
                            $error = "Error: El número de inventario '$num_inventario' ya existe en la base de datos.";
                            header("Location: ../formularios/form_agregar.php?msje=" . $error);
                            exit;
                        }
                    } else {
                        $error = "Error al verificar el número de inventario en la base de datos.";
                        header("Location: ../formularios/form_agregar.php?msje=" . $error);
                        exit;
                    }


                    if($donante_id == 'si'){ 
                            if(!empty(trim($_POST['nombre'])) && !empty(trim($_POST['apellido'])) && !empty(trim($_POST['fecha'])) ){
                            $nombre = $_POST['nombre'];
                            $apellido = $_POST['apellido'];
                            $fecha = $_POST['fecha'];
                            $sql_sub = "INSERT INTO donante (nombre, apellido, fecha) 
                                        VALUES ('$nombre', '$apellido', '$fecha')";
                                        $conex->query($sql_sub);

                        $donante_id = $conex->insert_id; 
                            //echo $donante_id;
                            }else{

                                $error.="Faltan Datos del donante";
                            header("Location:../formularios/form_agregar.php?msje=".$error);
                            
                                }
                    // Insertar en la tabla pieza
                    $sql = "INSERT INTO pieza (num_inventario, estado_conservacion, fecha_ingreso, cantidad_de_piezas, clasificacion, observacion,Donante_idDonante) 
                            VALUES ('$num_inventario', '$estado_conservacion', '$fecha_ingreso', '$cantidad_de_piezas', '$clasificacion', '$observacion_piezas',$donante_id)";
                

                    }else if ($donante_id == 'no'){
                        $sql = "INSERT INTO pieza (num_inventario, estado_conservacion, fecha_ingreso, cantidad_de_piezas, clasificacion, observacion,Donante_idDonante) 
                            VALUES ('$num_inventario', '$estado_conservacion', '$fecha_ingreso', '$cantidad_de_piezas', '$clasificacion', '$observacion_piezas',1)";
                    }

                        }else {
                            // Si la validación falla, redirigir al formulario con los errores
                            header("Location:../formularios/form_agregar.php?msje=" . $error);
                            exit; 
                        }
                }else{

                        $error.="Faltan Datos pieza";
                        header("Location:../formularios/form_agregar.php?msje=".$error);
                    }

        // Recibir datos del formulario
      
    if ($conex->query($sql) === TRUE) {
        $pieza_id = $conex->insert_id; // Obtener ID de la pieza insertada

    



        // Insertar en la tabla correspondiente según la clasificación
        switch ($clasificacion) {
            case 'arqueologia':
                if(!empty(trim($_POST['nombrintegridad_historicae'])) && !empty(trim($_POST['estetica'])) && !empty(trim($_POST['material'])) ){
                        $integridad_historica = $_POST['integridad_historica'];
                        $estetica = $_POST['estetica'];
                        $material = $_POST['material'];

                            $datos_a_validar = [$integridad_historica, $estetica, $material];
                            foreach ($datos_a_validar as $dato) {
                                if (!validar_alfanumerico($dato)) {
                                    
                                    header("Location:../formularios/form_agregar.php?msje=" . $error);
                                    exit;  
                                }
                            }

                        $sql_sub = "INSERT INTO arqueologia (integridad_historica, estetica, material, Pieza_idPieza) 
                                    VALUES ('$integridad_historica', '$estetica', '$material', $pieza_id)";
                            }else{

                                $error.="Faltan Datos de la clasificacionde de arqueologia";
                              header("Location:../formularios/form_agregar.php?msje=".$error);
                            
                                 }
              
                break;
            case 'botanica':
                if(!empty(trim($_POST['familia_botanica'])) && !empty(trim($_POST['especie_botanica'])) && !empty(trim($_POST['orden_botanica'])) && !empty(trim($_POST['divicion_botanica'])) && !empty(trim($_POST['clase_botanica'])) && !empty(trim($_POST['descripsion_botanica'])) && !empty(trim($_POST['clasificacion_botanica']))){

                        $familia_botanica = $_POST['familia_botanica'];
                        $especie_botanica = $_POST['especie_botanica'];
                        $orden_botanica = $_POST['orden_botanica'];
                        $division_botanica = $_POST['divicion_botanica'];
                        $clase_botanica = $_POST['clase_botanica'];
                        $descripcion_botanica = $_POST['descripsion_botanica'];
                        $clasificacion_botanica = $_POST['clasificacion_botanica'];

                        $datos_a_validar = [$familia_botanica, $especie_botanica, $orden_botanica,$division_botanica,$clase_botanica, $descripcion_botanica, $clasificacion_botanica];
                        foreach ($datos_a_validar as $dato) {
                            if (!validar_alfanumerico($dato)) {
                                
                                header("Location:../formularios/form_agregar.php?msje=" . $error);
                                exit;  
                            }
                        }

                        $sql_sub = "INSERT INTO botanica ( familia, especie, orden, division, clase, descripcion, clasificacion, Pieza_idPieza) 
                                    VALUES ( '$familia_botanica', '$especie_botanica', '$orden_botanica', '$division_botanica', '$clase_botanica', '$descripcion_botanica', '$clasificacion_botanica',$pieza_id)"; 
                         }else{

                            $error.="Faltan Datos de la clasificacion de botanica";
                             header("Location:../formularios/form_agregar.php?msje=".$error);
                        
                            }
                break;

			case 'geologia':
                if(!empty(trim($_POST['tipo_rocas'])) && !empty(trim($_POST['descripcion_geologia']))){

                        $tipo_rocas = $_POST['tipo_rocas'];
                        $descripcion_geologia = $_POST['descripcion_geologia'];

                        $datos_a_validar = [$tipo_rocas, $descripcion_geologia];
                        foreach ($datos_a_validar as $dato) {
                            if (!validar_alfanumerico($dato)) {
                                
                                header("Location:../formularios/form_agregar.php?msje=" . $error);
                                exit;  
                            }
                        }
                        $sql_sub = "INSERT INTO geologia (tipo_rocas, descripcion, Pieza_idPieza) 
                                    VALUES ('$tipo_rocas', '$descripcion_geologia', $pieza_id)";

                        }else{

                            $error.="Faltan Datos  de la clasificacion de geologia";
                             header("Location:../formularios/form_agregar.php?msje=".$error);
                        
                            }

                break;

			case 'ictiologia':
                if(!empty(trim($_POST['clasificacion_ictiologia'])) && !empty(trim($_POST['especie_ictiologia'])) && !empty(trim($_POST['descripcion_ictiologia']))){

                    $clasificacion_ictiologia = $_POST['clasificacion_ictiologia'];
                    $especies_ictiologia = $_POST['especie_ictiologia'];
                    $descripcion_ictiologia = $_POST['descripcion_ictiologia'];
                    
                    $datos_a_validar = [$clasificacion_ictiologia, $especies_ictiologia, $descripcion_ictiologia];
                    foreach ($datos_a_validar as $dato) {
                        if (!validar_alfanumerico($dato)) {
                            
                            header("Location:../formularios/form_agregar.php?msje=" . $error);
                            exit;  
                        }
                    }
                    $sql_sub = "INSERT INTO ictiologia (clasificacion, especies, descripcion, Pieza_idPieza) 
                                VALUES ('$clasificacion_ictiologia', '$especies_ictiologia', '$descripcion_ictiologia', $pieza_id)";
				//die($sql_sub);
                }else{

                    $error.="Faltan Datos de la clasificacion de ictiologia";
                     header("Location:../formularios/form_agregar.php?msje=".$error);
                
                    }
                break;

			case 'oología':
                if(!empty(trim($_POST['clasificacion_oología'])) && !empty(trim($_POST['tipo_oología'])) && !empty(trim($_POST['especie_oología'])) && !empty(trim($_POST['descripcion_oología']))){

                    $clasificacion_oología = $_POST['clasificacion_oología'];
                    $tipo_oología = $_POST['tipo_oología'];
                    $especie_oología = $_POST['especie_oología'];
                    $descripcion_oología = $_POST['descripcion_oología'];	

                    $datos_a_validar = [$clasificacion_oología, $tipo_oología, $especie_oología,$descripcion_oología];
                    foreach ($datos_a_validar as $dato) {
                        if (!validar_alfanumerico($dato)) {
                            
                            header("Location:../formularios/form_agregar.php?msje=" . $error);
                            exit;  
                        }
                    }				
                    $sql_sub = "INSERT INTO oología (clasificacion, tipo, especie, descripcion, Pieza_idPieza) 
                                VALUES ('$clasificacion_oología','$tipo_oología', '$especie_oología', '$descripcion_oología', $pieza_id)";
                    // die($sql_sub);
                }else{

                    $error.="Faltan Datos de la clasificacion de oología";
                     header("Location:../formularios/form_agregar.php?msje=".$error);
                
                    }
                  break;

			case 'osteologia':
                if(!empty(trim($_POST['especie_osteologia'])) && !empty(trim($_POST['clasificacion_osteologia'])) ){

                	$especie_osteologia = $_POST['especie_osteologia'];
                    $clasificacion_osteologia= $_POST['clasificacion_osteologia'];

                    $datos_a_validar = [$especie_osteologia, $clasificacion_osteologia];
                    foreach ($datos_a_validar as $dato) {
                        if (!validar_alfanumerico($dato)) {
                            
                            header("Location:../formularios/form_agregar.php?msje=" . $error);
                            exit;  
                        }
                    }				
                    $sql_sub = "INSERT INTO osteologia (especie, clasificacion, Pieza_idPieza) 
                                VALUES ('$especie_osteologia','$clasificacion_osteologia', $pieza_id)";
                }else{

                    $error.="Faltan Datos de la clasificacion de osteologia";
                     header("Location:../formularios/form_agregar.php?msje=".$error);
                
                    }     
				break;

			case 'paleontologia':
                if(!empty(trim($_POST['era'])) && !empty(trim($_POST['periodo'])) && !empty(trim($_POST['descripcion_paleontologia']))){
                    $era = $_POST['era'];
                    $periodo = $_POST['periodo'];
                    $descripcion_paleontologia = $_POST['descripcion_paleontologia'];
                    
                    $datos_a_validar = [$era, $periodo,$descripcion_paleontologia];
                    foreach ($datos_a_validar as $dato) {
                        if (!validar_alfanumerico($dato)) {
                            
                            header("Location:../formularios/form_agregar.php?msje=" . $error);
                            exit;  
                        }
                    }						
                    $sql_sub = "INSERT INTO paleontologia (era, periodo, descripcion, Pieza_idPieza) 
                                VALUES ('$era','$periodo', '$descripcion_paleontologia', $pieza_id)";
                }else{

                    $error.="Faltan Datos de la clasificacion de paleontologia";
                     header("Location:../formularios/form_agregar.php?msje=".$error);
                
                    }   
				
				break;

				case 'zoologia':
                    if(!empty(trim($_POST['familia_zoologia'])) && !empty(trim($_POST['especie_zoologia'])) && !empty(trim($_POST['orden_zoologia'])) && !empty(trim($_POST['phylum_zoologia'])) && !empty(trim($_POST['clase_zoologia'])) && !empty(trim($_POST['genero_zoologia'])) && !empty(trim($_POST['descripcion_zoologia'])) && !empty(trim($_POST['clasificacion_zoologia']))){
                        
                        $familia_zoologia = $_POST['familia_zoologia'];
                        $especie_zoologia = $_POST['especie_zoologia'];
                        $orden_zoologia = $_POST['orden_zoologia'];
                        $phylum_zoologia= $_POST['phylum_zoologia'];
                        $clase_zoologia = $_POST['clase_zoologia'];
                        $genero_zoologia = $_POST['genero_zoologia'];
                        $descripcion_zoologia = $_POST['descripcion_zoologia'];
                        $clasificacion_zoologia = $_POST['clasificacion_zoologia'];

                        $datos_a_validar = [$familia_zoologia, $especie_zoologia, $orden_zoologia,$phylum_zoologia,$clase_zoologia, $genero_zoologia, $descripcion_zoologia,$clasificacion_zoologia];
                        foreach ($datos_a_validar as $dato) {
                            if (!validar_alfanumerico($dato)) {
                                
                                header("Location:../formularios/form_agregar.php?msje=" . $error);
                                exit;  
                            }
                        }

                        $sql_sub = "INSERT INTO zoologia (clasificacion, familia, especie, orden, phylum, clase, genero, descripcion, Pieza_idPieza) 
                                    VALUES ('$clasificacion_zoologia', '$familia_zoologia', '$especie_zoologia', '$orden_zoologia', '$phylum_zoologia', '$clase_zoologia', '$genero_zoologia', '$descripcion_zoologia', $pieza_id)";
                    }else{

                        $error.="Faltan Datos de la clasificacion de zoologia";
                         header("Location:../formularios/form_agregar.php?msje=".$error);
                    
                        }   
					
					
					break;
	
	
	
	

 
           
            default:
                echo "Clasificación no válida.";
                exit;
        }

        if ($conex->query($sql_sub) === TRUE) {
           
            header("Location: ../formularios/form_agregar.php?msje=ok");
            exit;
        } else {
          
            $error = "Error al insertar en la tabla de subcategoría: ";
            header("Location: ../formularios/form_agregar.php?msje=" .$error);
            exit;
        }
    } else {
        $error = "Error al insertar en la tabla pieza: ";
        header("Location: ../formularios/form_agregar.php?msje=" .$error);
    }
}

$conex->close();

?>
