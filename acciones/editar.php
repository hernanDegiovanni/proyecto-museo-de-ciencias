<?php
session_start();

// Conexion a la BD
require_once "../conexion.php";

//Funcion de Validacion de Datos

require_once "funcionesval.php";



	$error = "";

 // Recibe el id oculto desde el form_editar

 $id=$_POST['idPieza'];
 
 // Crea una variable de sesión llamada ids para guardar el id del socio recibido 




//if(!empty(trim($_POST['nombre'])) && !empty(trim($_POST['precio'])) && !empty(trim($_POST['fecha_alta'])) && !empty(trim($_POST['idCategoria'])) && !empty(trim($_POST['existencia']))){
	
 
	//if (ValidacionDatos()){
         
		$num_inventario = $_POST['num_inventario'];
		$estado_conservacion = $_POST['estado_conservacion'];
		$fecha_ingreso = $_POST['fecha_ingreso'];
		$cantidad_de_piezas = $_POST['cantidad_de_piezas'];
		$clasificacion = $_POST['clasificacion'];
		$observacion_piezas = $_POST['observacion_piezas'];
		
	    // Se arma la sentencia SQL de Actualización
		$sql = "UPDATE pieza SET num_inventario='$num_inventario', estado_conservacion='$estado_conservacion', fecha_ingreso='$fecha_ingreso', cantidad_de_piezas='$cantidad_de_piezas', clasificacion='$clasificacion', observacion='$observacion_piezas' WHERE idPieza=$id";

    
            
		if ($conex->query($sql) === TRUE) {
			$pieza_id = $id;
		
					// Actualizar en la tabla correspondiente según la clasificación
					switch ($clasificacion) {
						case 'arqueologia':
							$integridad_historica = $_POST['integridad_historica'];
							$estetica = $_POST['estetica'];
							$material = $_POST['material'];
							$sql_sub = "UPDATE arqueologia 
										SET integridad_historica = '$integridad_historica', 
											estetica = '$estetica', 
											material = '$material' 
										WHERE Pieza_idPieza = $pieza_id";
							break;

						case 'botanica':
							$familia_botanica = $_POST['familia_botanica'];
							$especie_botanica = $_POST['especie_botanica'];
							$orden_botanica = $_POST['orden_botanica'];
							$division_botanica = $_POST['divicion_botanica'];
							$clase_botanica = $_POST['clase_botanica'];
							$descripcion_botanica = $_POST['descripsion_botanica'];
							$clasificacion_botanica = $_POST['clasificacion_botanica'];
							$sql_sub = "UPDATE botanica 
										SET familia = '$familia_botanica', 
											especie = '$especie_botanica', 
											orden = '$orden_botanica', 
											division = '$division_botanica', 
											clase = '$clase_botanica', 
											descripcion = '$descripcion_botanica', 
											clasificacion = '$clasificacion_botanica' 
										WHERE Pieza_idPieza = $pieza_id";
							break;

						case 'geologia':
							$tipo_rocas = $_POST['tipo_rocas'];
							$descripcion_geologia = $_POST['descripcion_geologia'];
							$sql_sub = "UPDATE geologia 
										SET tipo_rocas = '$tipo_rocas', 
											descripcion = '$descripcion_geologia' 
										WHERE Pieza_idPieza = $pieza_id";
							break;

						case 'ictiologia':
							$clasificacion_ictiologia = $_POST['clasificacion_ictiologia'];
							$especies_ictiologia = $_POST['especie_ictiologia'];
							$descripcion_ictiologia = $_POST['descripcion_ictiologia'];
							$sql_sub = "UPDATE ictiologia 
										SET clasificacion = '$clasificacion_ictiologia', 
											especies = '$especies_ictiologia', 
											descripcion = '$descripcion_ictiologia' 
										WHERE Pieza_idPieza = $pieza_id";
							break;

						case 'oología':
							$clasificacion_oología = $_POST['clasificacion_oología'];
							$tipo_oología = $_POST['tipo_oología'];
							$especie_oología = $_POST['especie_oología'];
							$descripcion_oología = $_POST['descripcion_oología'];                    
							$sql_sub = "UPDATE oología 
										SET clasificacion = '$clasificacion_oología', 
											tipo = '$tipo_oología', 
											especie = '$especie_oología', 
											descripcion = '$descripcion_oología' 
										WHERE Pieza_idPieza = $pieza_id";
							break;

						case 'osteologia':
							$especie_osteologia = $_POST['especie_osteologia'];
							$clasificacion_osteologia = $_POST['clasificacion_osteologia'];                
							$sql_sub = "UPDATE osteologia 
										SET especie = '$especie_osteologia', 
											clasificacion = '$clasificacion_osteologia' 
										WHERE Pieza_idPieza = $pieza_id";
							break;

						case 'paleontologia':
							$era = $_POST['era'];
							$periodo = $_POST['periodo'];
							$descripcion_paleontologia = $_POST['descripcion_paleontologia'];                    
							$sql_sub = "UPDATE paleontologia 
										SET era = '$era', 
											periodo = '$periodo', 
											descripcion = '$descripcion_paleontologia' 
										WHERE Pieza_idPieza = $pieza_id";
							break;

						case 'zoologia':
							$familia_zoologia = $_POST['familia_zoologia'];
							$especie_zoologia = $_POST['especie_zoologia'];
							$orden_zoologia = $_POST['orden_zoologia'];
							$phylum_zoologia = $_POST['phylum_zoologia'];
							$clase_zoologia = $_POST['clase_zoologia'];
							$genero_zoologia = $_POST['genero_zoologia'];
							$descripcion_zoologia = $_POST['descripcion_zoologia'];
							$clasificacion_zoologia = $_POST['clasificacion_zoologia'];
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
							break;

						default:
							echo "Clasificación no válida.";
							exit;
					}


			if ($conex->query($sql_sub) === TRUE) {
				header("Location:../listados/piezasList.php?msg=exito");
			} else {
				header("Location:../formularios/form_editar.php?msje=error_subcategoría: ");
				exit;
			}
		}


      

        // Evalúa si se realizó la actualización de algun dato

      
	//}else{
	//	header("Location:../listados/piezasList.php?msje=".$error);
	//}
// }else{

// 	$error.="Faltan Datos ";
// 	header("Location:form_editar.php?msje=".$error);
	
// }

 

?>