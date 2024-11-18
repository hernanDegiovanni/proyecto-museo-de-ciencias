<?php

// Conexion a la Base de Datos Biblioteca 

 require_once "../conexion.php";

 //Funcion de Validacion de Datos

 //require_once "funcionesval.php";





$error = "";



// Procesar el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {

   

  

    // Recibir datos del formulario
    $num_inventario = $_POST['num_inventario'];
    $estado_conservacion = $_POST['estado_conservacion'];
    $fecha_ingreso = $_POST['fecha_ingreso'];
    $cantidad_de_piezas = $_POST['cantidad_de_piezas'];
    $clasificacion = $_POST['clasificacion'];
    $observacion_piezas = $_POST['observacion_piezas'];
    $donante_id = $_POST['donante_id'];




    if($donante_id == 'si'){ 

        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $fecha = $_POST['fecha'];
        $sql_sub = "INSERT INTO donante (nombre, apellido, fecha) 
                    VALUES ('$nombre', '$apellido', '$fecha')";
                    $conex->query($sql_sub);

    $donante_id = $conex->insert_id; 
            //echo $donante_id;

//die();

    // Insertar en la tabla pieza
    $sql = "INSERT INTO pieza (num_inventario, estado_conservacion, fecha_ingreso, cantidad_de_piezas, clasificacion, observacion,Donante_idDonante) 
            VALUES ('$num_inventario', '$estado_conservacion', '$fecha_ingreso', '$cantidad_de_piezas', '$clasificacion', '$observacion_piezas',$donante_id)";
 

    }else if ($donante_id == 'no'){
        $sql = "INSERT INTO pieza (num_inventario, estado_conservacion, fecha_ingreso, cantidad_de_piezas, clasificacion, observacion,Donante_idDonante) 
            VALUES ('$num_inventario', '$estado_conservacion', '$fecha_ingreso', '$cantidad_de_piezas', '$clasificacion', '$observacion_piezas',1)";
    }




    if ($conex->query($sql) === TRUE) {
        $pieza_id = $conex->insert_id; // Obtener ID de la pieza insertada

      
       


        // Insertar en la tabla correspondiente según la clasificación
        switch ($clasificacion) {
            case 'arqueologia':
                $integridad_historica = $_POST['integridad_historica'];
                $estetica = $_POST['estetica'];
                $material = $_POST['material'];
                $sql_sub = "INSERT INTO arqueologia (integridad_historica, estetica, material, Pieza_idPieza) 
                            VALUES ('$integridad_historica', '$estetica', '$material', $pieza_id)";
                break;
            case 'botanica':

              
                $familia_botanica = $_POST['familia_botanica'];
                $especie_botanica = $_POST['especie_botanica'];
                $orden_botanica = $_POST['orden_botanica'];
                $division_botanica = $_POST['divicion_botanica'];
                $clase_botanica = $_POST['clase_botanica'];
                $descripcion_botanica = $_POST['descripsion_botanica'];
                 $clasificacion_botanica = $_POST['clasificacion_botanica'];
                $sql_sub = "INSERT INTO botanica ( familia, especie, orden, division, clase, descripcion, clasificacion, Pieza_idPieza) 
                            VALUES ( '$familia_botanica', '$especie_botanica', '$orden_botanica', '$division_botanica', '$clase_botanica', '$descripcion_botanica', '$clasificacion_botanica',$pieza_id)";
                break;

			case 'geologia':
				$tipo_rocas = $_POST['tipo_rocas'];
				$descripcion_geologia = $_POST['descripcion_geologia'];
				$sql_sub = "INSERT INTO geologia (tipo_rocas, descripcion, Pieza_idPieza) 
                            VALUES ('$tipo_rocas', '$descripcion_geologia', $pieza_id)";
                break;

			case 'ictiologia':
                // NO CARGA LA ESPECIE
				$clasificacion_ictiologia = $_POST['clasificacion_ictiologia'];
				$especies_ictiologia = $_POST['especie_ictiologia'];
				$descripcion_ictiologia = $_POST['descripcion_ictiologia'];
				$sql_sub = "INSERT INTO ictiologia (clasificacion, especies, descripcion, Pieza_idPieza) 
							VALUES ('$clasificacion_ictiologia', '$especies_ictiologia', '$descripcion_ictiologia', $pieza_id)";
				//die($sql_sub);
                break;

			case 'oología':
				$clasificacion_oología = $_POST['clasificacion_oología'];
				$tipo_oología = $_POST['tipo_oología'];
				$especie_oología = $_POST['especie_oología'];
				$descripcion_oología = $_POST['descripcion_oología'];					
				$sql_sub = "INSERT INTO oología (clasificacion, tipo, especie, descripcion, Pieza_idPieza) 
							VALUES ('$clasificacion_oología','$tipo_oología', '$especie_oología', '$descripcion_oología', $pieza_id)";
				 // die($sql_sub);
                  break;

			case 'osteologia':
				$especie_osteologia = $_POST['especie_osteologia'];
				$clasificacion_osteologia= $_POST['clasificacion_osteologia'];				
				$sql_sub = "INSERT INTO osteologia (especie, clasificacion, Pieza_idPieza) 
							VALUES ('$especie_osteologia','$clasificacion_osteologia', $pieza_id)";
                          
				break;

			case 'paleontologia':
				$era = $_POST['era'];
				$periodo = $_POST['periodo'];
				$descripcion_paleontologia = $_POST['descripcion_paleontologia'];					
				$sql_sub = "INSERT INTO paleontologia (era, periodo, descripcion, Pieza_idPieza) 
							VALUES ('$era','$periodo', '$descripcion_paleontologia', $pieza_id)";
				break;

				case 'zoologia':
					
					$familia_zoologia = $_POST['familia_zoologia'];
					$especie_zoologia = $_POST['especie_zoologia'];
					$orden_zoologia = $_POST['orden_zoologia'];
					$phylum_zoologia= $_POST['phylum_zoologia'];
					$clase_zoologia = $_POST['clase_zoologia'];
					$genero_zoologia = $_POST['genero_zoologia'];
					$descripcion_zoologia = $_POST['descripcion_zoologia'];
					$clasificacion_zoologia = $_POST['clasificacion_zoologia'];
					$sql_sub = "INSERT INTO zoologia (clasificacion, familia, especie, orden, phylum, clase, genero, descripcion, Pieza_idPieza) 
								VALUES ('$clasificacion_zoologia', '$familia_zoologia', '$especie_zoologia', '$orden_zoologia', '$phylum_zoologia', '$clase_zoologia', '$genero_zoologia', '$descripcion_zoologia', $pieza_id)";
					break;
	
	
	
	

 
           
            default:
                echo "Clasificación no válida.";
                exit;
        }

        if ($conex->query($sql_sub) === TRUE) {
            header("Location:../listados/piezasList.php");
        } else {
            echo "Error al insertar en la tabla de subcategoría: " . $conex->error;
        }
    } else {
        echo "Error al insertar en la tabla pieza: " . $conex->error;
    }
}

$conex->close();

?>