
<?php

// Conexion a la Base de Datos Biblioteca 

 require_once "../conexion.php";

 //Funcion de Validacion de Datos

 require_once "funcionesvalpieza.php";



 $error = "";

 
 // Procesar el formulario
 if ($_SERVER["REQUEST_METHOD"] == "POST") {
     
     // Verificar que los campos obligatorios de la pieza estén completos
     if(!empty(trim($_POST['num_inventario'])) && 
        !empty(trim($_POST['estado_conservacion'])) && 
        !empty(trim($_POST['fecha_ingreso'])) && 
        !empty(trim($_POST['cantidad_de_piezas'])) && 
        !empty(trim($_POST['clasificacion'])) && 
        !empty(trim($_POST['observacion_piezas'])) && 
        !empty(trim($_POST['donante_id']))) {
         
         // Validar los datos de la pieza
         if (ValidacionPieza()) {
             // Extraer y sanitizar los datos principales
             $num_inventario = $_POST['num_inventario'];
             $estado_conservacion = $_POST['estado_conservacion'];
             $fecha_ingreso = $_POST['fecha_ingreso'];
             $cantidad_de_piezas = $_POST['cantidad_de_piezas'];
             $clasificacion = $_POST['clasificacion'];
             $observacion_piezas = $_POST['observacion_piezas'];
             $donante_id = $_POST['donante_id'];
             
             // Validar si el número de inventario ya existe
             $sql_check = "SELECT COUNT(*) FROM pieza WHERE num_inventario = '$num_inventario'";
             $result = $conex->query($sql_check);
             
             if ($result) {
                 $row = $result->fetch_row();
                 $count = $row[0];
                 
                 if ($count > 0) {
                     $error = "Error: El número de inventario '$num_inventario' ya existe en la base de datos.";
                     header("Location: ../formularios/form_agregar.php?msje=" . urlencode($error));
                     exit;
                 }
             } else {
                 $error = "Error al verificar el número de inventario en la base de datos.";
                 header("Location: ../formularios/form_agregar.php?msje=" . urlencode($error));
                 exit;
             }
             
             // Procesar el donante
             if ($donante_id == 'si') {
                 if (!empty(trim($_POST['nombre'])) && 
                     !empty(trim($_POST['apellido'])) && 
                     !empty(trim($_POST['fecha']))) {
                     
                     $donante_sql_insert = true;
                     $nombre = $_POST['nombre'];
                     $apellido = $_POST['apellido'];
                     $fecha = $_POST['fecha'];
                     $sql_donante = "INSERT INTO donante (nombre, apellido, fecha) 
                                     VALUES ('$nombre', '$apellido', '$fecha')";
                 } else {
                     $error = "Faltan datos del donante";
                     header("Location: ../formularios/form_agregar.php?msje=" . urlencode($error));
                     exit;
                 }
             } else if ($donante_id == 'no') {
                 $donante_id = 1; // ID por defecto para "sin donante"
             }
             
             // Preparar la consulta SQL para la pieza (aún no se ejecuta)
             $sql_pieza = "INSERT INTO pieza (num_inventario, estado_conservacion, fecha_ingreso, cantidad_de_piezas, clasificacion, observacion, Donante_idDonante) 
                           VALUES ('$num_inventario', '$estado_conservacion', '$fecha_ingreso', '$cantidad_de_piezas', '$clasificacion', '$observacion_piezas', @donante_id)";
             
             // Validar y preparar los datos según la clasificación
             $clasificacion_valida = true;
             $sql_clasificacion = "";
             
             switch ($clasificacion) {
                 case 'arqueologia':
                     if (!empty(trim($_POST['integridad_historica'])) && 
                         !empty(trim($_POST['estetica'])) && 
                         !empty(trim($_POST['material']))) {
                         
                         $integridad_historica = $_POST['integridad_historica'];
                         $estetica = $_POST['estetica'];
                         $material = $_POST['material'];
                         
                         $datos_a_validar = [$integridad_historica, $estetica, $material];
                         foreach ($datos_a_validar as $dato) {
                             if (!validar_alfanumerico($dato)) {
                                 $clasificacion_valida = false;
                                 header("Location:../formularios/form_agregar.php?msje=" . $error);
                                 break;
                             }
                         }
                         
                         $sql_clasificacion = "INSERT INTO arqueologia (integridad_historica, estetica, material, Pieza_idPieza) 
                                             VALUES ('$integridad_historica', '$estetica', '$material', @pieza_id)";
                     } else {
                         $clasificacion_valida = false;
                         $error = "Faltan datos de la clasificación de arqueología";
                     }
                     break;
                 
                 case 'botanica':
                     if (!empty(trim($_POST['familia_botanica'])) && 
                         !empty(trim($_POST['especie_botanica'])) && 
                         !empty(trim($_POST['orden_botanica'])) && 
                         !empty(trim($_POST['divicion_botanica'])) && 
                         !empty(trim($_POST['clase_botanica'])) && 
                         !empty(trim($_POST['descripsion_botanica'])) && 
                         !empty(trim($_POST['clasificacion_botanica']))) {
                         
                         $familia_botanica = $_POST['familia_botanica'];
                         $especie_botanica = $_POST['especie_botanica'];
                         $orden_botanica = $_POST['orden_botanica'];
                         $division_botanica = $_POST['divicion_botanica'];
                         $clase_botanica = $_POST['clase_botanica'];
                         $descripcion_botanica = $_POST['descripsion_botanica'];
                         $clasificacion_botanica = $_POST['clasificacion_botanica'];
                         
                         $datos_a_validar = [
                             $familia_botanica, $especie_botanica, $orden_botanica,
                             $division_botanica, $clase_botanica, $descripcion_botanica, 
                             $clasificacion_botanica
                         ];
                         
                         foreach ($datos_a_validar as $dato) {
                             if (!validar_alfanumerico($dato)) {
                                 $clasificacion_valida = false;
                                 header("Location:../formularios/form_agregar.php?msje=" . $error);
                                 break;
                             }
                         }
                         
                         $sql_clasificacion = "INSERT INTO botanica (familia, especie, orden, division, clase, descripcion, clasificacion, Pieza_idPieza) 
                                             VALUES ('$familia_botanica', '$especie_botanica', '$orden_botanica', 
                                                     '$division_botanica', '$clase_botanica', '$descripcion_botanica', 
                                                     '$clasificacion_botanica', @pieza_id)";
                     } else {
                         $clasificacion_valida = false;
                         $error = "Faltan datos de la clasificación de botánica";
                     }
                     break;
                 
                 case 'geologia':
                     if (!empty(trim($_POST['tipo_rocas'])) && 
                         !empty(trim($_POST['descripcion_geologia']))) {
                         
                         $tipo_rocas = $_POST['tipo_rocas'];
                         $descripcion_geologia = $_POST['descripcion_geologia'];
                         
                         $datos_a_validar = [$tipo_rocas, $descripcion_geologia];
                         foreach ($datos_a_validar as $dato) {
                             if (!validar_alfanumerico($dato)) {
                                 $clasificacion_valida = false;
                                 header("Location:../formularios/form_agregar.php?msje=" . $error);
                                 break;
                             }
                         }
                         
                         $sql_clasificacion = "INSERT INTO geologia (tipo_rocas, descripcion, Pieza_idPieza) 
                                             VALUES ('$tipo_rocas', '$descripcion_geologia', @pieza_id)";
                     } else {
                         $clasificacion_valida = false;
                         $error = "Faltan datos de la clasificación de geología";
                     }
                     break;
                 
                 case 'ictiologia':
                     if (!empty(trim($_POST['clasificacion_ictiologia'])) && 
                         !empty(trim($_POST['especie_ictiologia'])) && 
                         !empty(trim($_POST['descripcion_ictiologia']))) {
                         
                         $clasificacion_ictiologia = $_POST['clasificacion_ictiologia'];
                         $especies_ictiologia = $_POST['especie_ictiologia'];
                         $descripcion_ictiologia = $_POST['descripcion_ictiologia'];
                         
                         $datos_a_validar = [$clasificacion_ictiologia, $especies_ictiologia, $descripcion_ictiologia];
                         foreach ($datos_a_validar as $dato) {
                             if (!validar_alfanumerico($dato)) {
                                 $clasificacion_valida = false;
                                 header("Location:../formularios/form_agregar.php?msje=" . $error);
                                 break;
                             }
                         }
                         
                         $sql_clasificacion = "INSERT INTO ictiologia (clasificacion, especies, descripcion, Pieza_idPieza) 
                                             VALUES ('$clasificacion_ictiologia', '$especies_ictiologia', '$descripcion_ictiologia', @pieza_id)";
                     } else {
                         $clasificacion_valida = false;
                         $error = "Faltan datos de la clasificación de ictiología";
                     }
                     break;
                 
                 case 'oología':
                     if (!empty(trim($_POST['clasificacion_oología'])) && 
                         !empty(trim($_POST['tipo_oología'])) && 
                         !empty(trim($_POST['especie_oología'])) && 
                         !empty(trim($_POST['descripcion_oología']))) {
                         
                         $clasificacion_oología = $_POST['clasificacion_oología'];
                         $tipo_oología = $_POST['tipo_oología'];
                         $especie_oología = $_POST['especie_oología'];
                         $descripcion_oología = $_POST['descripcion_oología'];
                         
                         $datos_a_validar = [$clasificacion_oología, $tipo_oología, $especie_oología, $descripcion_oología];
                         foreach ($datos_a_validar as $dato) {
                             if (!validar_alfanumerico($dato)) {
                                 $clasificacion_valida = false;
                                 header("Location:../formularios/form_agregar.php?msje=" . $error);
                                 break;
                             }
                         }
                         
                         $sql_clasificacion = "INSERT INTO oología (clasificacion, tipo, especie, descripcion, Pieza_idPieza) 
                                             VALUES ('$clasificacion_oología', '$tipo_oología', '$especie_oología', '$descripcion_oología', @pieza_id)";
                     } else {
                         $clasificacion_valida = false;
                         $error = "Faltan datos de la clasificación de oología";
                     }
                     break;
                 
                 case 'osteologia':
                     if (!empty(trim($_POST['especie_osteologia'])) && 
                         !empty(trim($_POST['clasificacion_osteologia']))) {
                         
                         $especie_osteologia = $_POST['especie_osteologia'];
                         $clasificacion_osteologia = $_POST['clasificacion_osteologia'];
                         
                         $datos_a_validar = [$especie_osteologia, $clasificacion_osteologia];
                         foreach ($datos_a_validar as $dato) {
                             if (!validar_alfanumerico($dato)) {
                                 $clasificacion_valida = false;
                                 header("Location:../formularios/form_agregar.php?msje=" . $error);
                                 break;
                             }
                         }
                         
                         $sql_clasificacion = "INSERT INTO osteologia (especie, clasificacion, Pieza_idPieza) 
                                             VALUES ('$especie_osteologia', '$clasificacion_osteologia', @pieza_id)";
                     } else {
                         $clasificacion_valida = false;
                         $error = "Faltan datos de la clasificación de osteología";
                     }
                     break;
                 
                 case 'paleontologia':
                     if (!empty(trim($_POST['era'])) && 
                         !empty(trim($_POST['periodo'])) && 
                         !empty(trim($_POST['descripcion_paleontologia']))) {
                         
                         $era = $_POST['era'];
                         $periodo = $_POST['periodo'];
                         $descripcion_paleontologia = $_POST['descripcion_paleontologia'];
                         
                         $datos_a_validar = [$era, $periodo, $descripcion_paleontologia];
                         foreach ($datos_a_validar as $dato) {
                             if (!validar_alfanumerico($dato)) {
                                 $clasificacion_valida = false;
                                 header("Location:../formularios/form_agregar.php?msje=" . $error);
                                 break;
                             }
                         }
                         
                         $sql_clasificacion = "INSERT INTO paleontologia (era, periodo, descripcion, Pieza_idPieza) 
                                             VALUES ('$era', '$periodo', '$descripcion_paleontologia', @pieza_id)";
                     } else {
                         $clasificacion_valida = false;
                         $error = "Faltan datos de la clasificación de paleontología";
                     }
                     break;
                 
                 case 'zoologia':
                     if (!empty(trim($_POST['familia_zoologia'])) && 
                         !empty(trim($_POST['especie_zoologia'])) && 
                         !empty(trim($_POST['orden_zoologia'])) && 
                         !empty(trim($_POST['phylum_zoologia'])) && 
                         !empty(trim($_POST['clase_zoologia'])) && 
                         !empty(trim($_POST['genero_zoologia'])) && 
                         !empty(trim($_POST['descripcion_zoologia'])) && 
                         !empty(trim($_POST['clasificacion_zoologia']))) {
                         
                         $familia_zoologia = $_POST['familia_zoologia'];
                         $especie_zoologia = $_POST['especie_zoologia'];
                         $orden_zoologia = $_POST['orden_zoologia'];
                         $phylum_zoologia = $_POST['phylum_zoologia'];
                         $clase_zoologia = $_POST['clase_zoologia'];
                         $genero_zoologia = $_POST['genero_zoologia'];
                         $descripcion_zoologia = $_POST['descripcion_zoologia'];
                         $clasificacion_zoologia = $_POST['clasificacion_zoologia'];
                         
                         $datos_a_validar = [
                             $familia_zoologia, $especie_zoologia, $orden_zoologia,
                             $phylum_zoologia, $clase_zoologia, $genero_zoologia,
                             $descripcion_zoologia, $clasificacion_zoologia
                         ];
                         
                         foreach ($datos_a_validar as $dato) {
                             if (!validar_alfanumerico($dato)) {
                                 $clasificacion_valida = false;
                                 header("Location:../formularios/form_agregar.php?msje=" . $error);
                                 break;
                             }
                         }
                         
                         $sql_clasificacion = "INSERT INTO zoologia (clasificacion, familia, especie, orden, phylum, clase, genero, descripcion, Pieza_idPieza) 
                                             VALUES ('$clasificacion_zoologia', '$familia_zoologia', '$especie_zoologia', 
                                                     '$orden_zoologia', '$phylum_zoologia', '$clase_zoologia', 
                                                     '$genero_zoologia', '$descripcion_zoologia', @pieza_id)";
                     } else {
                         $clasificacion_valida = false;
                         $error = "Faltan datos de la clasificación de zoología";
                     }
                     break;
                 
                 default:
                     $clasificacion_valida = false;
                     $error = "Clasificación no válida";
                     break;
             }
             
             // Si todos los datos son válidos, proceder con la inserción
             if ($clasificacion_valida) {
                 // Comenzar transacción
                 $conex->begin_transaction();
                 
                 try {
                     // Insertar donante si es necesario
                     if (isset($donante_sql_insert) && $donante_sql_insert) {
                         if ($conex->query($sql_donante) !== TRUE) {
                             throw new Exception("Error al insertar donante: " . $conex->error);
                         }
                         $donante_id = $conex->insert_id;
                     }
                     
                     // Reemplazar el placeholder del donante_id en la consulta de la pieza
                     $sql_pieza = str_replace('@donante_id', $donante_id, $sql_pieza);
                     
                     // Insertar pieza
                     if ($conex->query($sql_pieza) !== TRUE) {
                         throw new Exception("Error al insertar pieza: " . $conex->error);
                     }
                     
                     $pieza_id = $conex->insert_id;
                     
                     // Reemplazar el placeholder del pieza_id en la consulta de clasificación
                     $sql_clasificacion = str_replace('@pieza_id', $pieza_id, $sql_clasificacion);
                     
                     // Insertar información de clasificación
                     if ($conex->query($sql_clasificacion) !== TRUE) {
                         throw new Exception("Error al insertar en la clasificación: " . $conex->error);
                     }
                     
                     // Confirmar transacción
                     $conex->commit();
                     
                     // Redirigir con mensaje de éxito
                     header("Location: ../formularios/form_agregar.php?msje=ok");
                     exit;
                     
                 } catch (Exception $e) {
                     // Revertir transacción en caso de error
                     $conex->rollback();
                     
                     // Redirigir con mensaje de error
                     $error = $e->getMessage();
                     header("Location: ../formularios/form_agregar.php?msje=" . urlencode($error));
                     exit;
                 }
             } else {
                 // Si los datos de clasificación no son válidos, redirigir con error
                 header("Location: ../formularios/form_agregar.php?msje=" . urlencode($error));
                 exit;
             }
         } else {
             // Si la validación general falla
             header("Location: ../formularios/form_agregar.php?msje=" . urlencode($error));
             exit;
         }
     } else {
         // Si faltan datos obligatorios de la pieza
         $error = "Faltan datos obligatorios de la pieza";
         header("Location: ../formularios/form_agregar.php?msje=" . urlencode($error));
         exit;
     }
 }
 
 // Cerrar conexión
 $conex->close();
?>
