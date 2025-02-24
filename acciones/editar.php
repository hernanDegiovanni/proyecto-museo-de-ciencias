<?php
session_start();

// Conexion a la BD
require_once "../conexion.php";

//Funcion de Validacion de Datos

require_once "funcionesvalpieza.php";

	$error = "";

$id=$_POST['idPieza'];

$_SESSION['ids']=$id;
   
    if(!empty(trim($_POST['num_inventario'])) && !empty(trim($_POST['estado_conservacion'])) && !empty(trim($_POST['fecha_ingreso'])) && !empty(trim($_POST['cantidad_de_piezas'])) && !empty(trim($_POST['clasificacion']))  && !empty(trim($_POST['observacion_piezas']))){
        
        if (ValidacionPieza()) {
                 $num_inventario = $_POST['num_inventario'];
                $estado_conservacion = $_POST['estado_conservacion'];
                $fecha_ingreso = $_POST['fecha_ingreso'];
                $cantidad_de_piezas = $_POST['cantidad_de_piezas'];
                $clasificacion = $_POST['clasificacion'];
                $observacion_piezas = $_POST['observacion_piezas'];
       

	                $sql = "UPDATE pieza SET num_inventario='$num_inventario', estado_conservacion='$estado_conservacion', fecha_ingreso='$fecha_ingreso', cantidad_de_piezas='$cantidad_de_piezas', clasificacion='$clasificacion', observacion='$observacion_piezas' WHERE idPieza=$id";
						
					}else {
						// Si la validación falla, redirigir al formulario con los errores
						header("Location:../formularios/form_editar.php?msje=" . $error);
						exit; 
					}

                }else{

                        $error.="Faltan Datos pieza";
                        header("Location:../formularios/form_editar.php?msje=".$error);
                    }

        // Recibir datos del formulario
		if ($conex->query($sql) === TRUE) {
			$pieza_id = $id;
    



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
                                    
                                    header("Location:../formularios/form_editar.php?msje=" . $error);
                                    exit;  
                                }
                            }

							$sql_sub = "UPDATE arqueologia 
										SET integridad_historica = '$integridad_historica', 
											estetica = '$estetica', 
											material = '$material' 
										WHERE Pieza_idPieza = $pieza_id";

                            }else{

                                $error.="Faltan Datos de la clasificacionde de arqueologia";
                              header("Location:../formularios/form_editar.php?msje=".$error);
                            
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
                                
                                header("Location:../formularios/form_editar.php?msje=" . $error);
                                exit;  
                            }
                        }

                        $sql_sub = "UPDATE botanica 
										SET familia = '$familia_botanica', 
											especie = '$especie_botanica', 
											orden = '$orden_botanica', 
											division = '$division_botanica', 
											clase = '$clase_botanica', 
											descripcion = '$descripcion_botanica', 
											clasificacion = '$clasificacion_botanica' 
										WHERE Pieza_idPieza = $pieza_id";
                         }else{

                            $error.="Faltan Datos de la clasificacion de botanica";
                             header("Location:../formularios/form_editar.php?msje=".$error);
                        
                            }
                break;

			case 'geologia':
                if(!empty(trim($_POST['tipo_rocas'])) && !empty(trim($_POST['descripcion_geologia']))){

                        $tipo_rocas = $_POST['tipo_rocas'];
                        $descripcion_geologia = $_POST['descripcion_geologia'];

                        $datos_a_validar = [$tipo_rocas, $descripcion_geologia];
                        foreach ($datos_a_validar as $dato) {
                            if (!validar_alfanumerico($dato)) {
                                
                                header("Location:../formularios/form_editar.php?msje=" . $error);
                                exit;  
                            }
                        }
							$sql_sub = "UPDATE geologia 
										SET tipo_rocas = '$tipo_rocas', 
											descripcion = '$descripcion_geologia' 
										WHERE Pieza_idPieza = $pieza_id";

                        }else{

                            $error.="Faltan Datos  de la clasificacion de geologia";
                             header("Location:../formularios/form_editar.php?msje=".$error);
                        
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
                            
                            header("Location:../formularios/form_editar.php?msje=" . $error);
                            exit;  
                        }
                    }
						$sql_sub = "UPDATE ictiologia 
									SET clasificacion = '$clasificacion_ictiologia', 
										especies = '$especies_ictiologia', 
										descripcion = '$descripcion_ictiologia' 
									WHERE Pieza_idPieza = $pieza_id";
                }else{

                    $error.="Faltan Datos de la clasificacion de ictiologia";
                     header("Location:../formularios/form_editar.php?msje=".$error);
                
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
                            
                            header("Location:../formularios/form_editar.php?msje=" . $error);
                            exit;  
                        }
                    }				
							$sql_sub = "UPDATE oología 
										SET clasificacion = '$clasificacion_oología', 
											tipo = '$tipo_oología', 
											especie = '$especie_oología', 
											descripcion = '$descripcion_oología' 
										WHERE Pieza_idPieza = $pieza_id";
					}else{

                    $error.="Faltan Datos de la clasificacion de oología";
                     header("Location:../formularios/form_editar.php?msje=".$error);
                
                    }
                  break;

			case 'osteologia':
                if(!empty(trim($_POST['especie_osteologia'])) && !empty(trim($_POST['clasificacion_osteologia'])) ){

                	$especie_osteologia = $_POST['especie_osteologia'];
                    $clasificacion_osteologia= $_POST['clasificacion_osteologia'];

                    $datos_a_validar = [$especie_osteologia, $clasificacion_osteologia];
                    foreach ($datos_a_validar as $dato) {
                        if (!validar_alfanumerico($dato)) {
                            
                            header("Location:../formularios/form_editar.php?msje=" . $error);
                            exit;  
                        }
                    }				
                        $sql_sub = "UPDATE osteologia 
									SET especie = '$especie_osteologia', 
								    	clasificacion = '$clasificacion_osteologia' 
									WHERE Pieza_idPieza = $pieza_id";
							
                }else{

                    $error.="Faltan Datos de la clasificacion de osteologia";
                     header("Location:../formularios/form_editar.php?msje=".$error);
                
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
                            
                            header("Location:../formularios/form_editar.php?msje=" . $error);
                            exit;  
                        }
                    }						
						$sql_sub = "UPDATE paleontologia 
									SET era = '$era', 
										periodo = '$periodo', 
										descripcion = '$descripcion_paleontologia' 
									WHERE Pieza_idPieza = $pieza_id";
                }else{

                    $error.="Faltan Datos de la clasificacion de paleontologia";
                     header("Location:../formularios/form_editar.php?msje=".$error);
                
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
                                
                                header("Location:../formularios/form_editar.php?msje=" . $error);
                                exit;  
                            }
                        }

							$sql_sub = "UPDATE zoologia 
											SET clasificacion = '$clasificacion_zoologia', 
												familia = '$familia_zoologia', 
												especie = '$especie_zoologia', 
												orden = '$orden_zoologia', 
												phylum = '$phylum_zoologia', 
												clase = '$clase_zoologia', 
												genero = '$genero_zoologia', 
												descripcion = '$descripcion_zoologia' 
											WHERE Pieza_idPieza = $pieza_id";
                    }else{

                        $error.="Faltan Datos de la clasificacion de zoologia";
                         header("Location:../formularios/form_editar.php?msje=".$error);
                    
                        }   
					
					
					break;
	
            default:
                echo "Clasificación no válida.";
                exit;
        }

        if ($conex->query($sql_sub) === TRUE) {
           
            header("Location: ../formularios/form_editar.php?msje=ok");
            exit;
        } else {
          
            $error = "Error al editar en la tabla de subcategoría: ";
            header("Location: ../formularios/form_editar.php?msje=" .$error);
            exit;
        }
    } else {
        $error = "Error al editar en la tabla pieza: ";
        header("Location: ../formularios/form_editar.php?msje=" .$error);
    }


$conex->close();

?>

			if ($conex->query($sql_sub) === TRUE) {
				header("Location:../listados/piezasList.php?msg=exito");
			} else {
				header("Location:../formularios/form_editar.php?msje=error_subcategoría: ");
				exit;
			}
		}




 