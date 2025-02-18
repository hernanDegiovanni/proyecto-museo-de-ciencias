<?php
// Conexion a la Base de Datos Biblioteca 
session_start();
 require_once "../conexion.php";
 
 include('../header.php');
 include_once('../head.php');



 $id = $_POST["id"];




 // Primero, obtenemos la información de la tabla `pieza`
 $sql_pieza = "SELECT * FROM pieza WHERE idPieza = $id";
 $result_pieza = mysqli_query($conex, $sql_pieza);

 if ($result_pieza) {
     $pieza = mysqli_fetch_array($result_pieza);
 } else {
     die("Error en la consulta de pieza: " . mysqli_error($conex));
 }
 
 // Supongamos que tienes un campo 'clasificacion' en la tabla `pieza` que determina la clasificación
 $clasificacion = $pieza['clasificacion'];
 
 switch ($clasificacion) {
     case 'arqueologia':
         $sql_clasificacion = "SELECT * FROM arqueologia WHERE Pieza_idPieza = $id";
         break;
     case 'botanica':
         $sql_clasificacion = "SELECT * FROM botanica WHERE Pieza_idPieza = $id";
         break;
     case 'geologia':
         $sql_clasificacion = "SELECT * FROM geologia WHERE Pieza_idPieza = $id";
         break;
     case 'ictiologia':
         $sql_clasificacion = "SELECT * FROM ictiologia WHERE Pieza_idPieza = $id";
         break;
     case 'oología':
         $sql_clasificacion = "SELECT * FROM oología WHERE Pieza_idPieza = $id";
         break;
     case 'osteologia':
         $sql_clasificacion = "SELECT * FROM osteologia WHERE Pieza_idPieza = $id";
         break;
     case 'paleontologia':
         $sql_clasificacion = "SELECT * FROM paleontologia WHERE Pieza_idPieza = $id";
         break;
     case 'zoologia':
         $sql_clasificacion = "SELECT * FROM zoologia WHERE Pieza_idPieza = $id";
         break;
     default:
         die("Clasificación no válida");
 }
 
 // Ejecutar la consulta de la clasificación
 $result_clasificacion = mysqli_query($conex, $sql_clasificacion);
 
 if ($result_clasificacion) {
     $clasificacion_data = mysqli_fetch_array($result_clasificacion);
 } else {
     die("Error en la consulta de clasificación: " . mysqli_error($conex));
 }

 // DONANTE
 $stmt = $conex->prepare("SELECT donante.* 
                            FROM pieza 
                            INNER JOIN donante ON donante.idDonante = pieza.Donante_idDonante 
                            WHERE pieza.idPieza = ?");

// Enlazar el parámetro $id como un entero
$stmt->bind_param("i", $id);  // "i" significa entero (int)

// Ejecutar la consulta
$stmt->execute();

// Obtener el resultado
$result_donante = $stmt->get_result();

// Verificar si la consulta devuelve resultados
if ($result_donante && mysqli_num_rows($result_donante) > 0) {
$donante = mysqli_fetch_array($result_donante);
} else {
die("Error en la consulta de donate: ");
}
    
 
 ?>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Información de la Pieza - Museo</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../bootstrap/css/style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
         
        }

        .container {

        width: 80%;
        margin: 30px auto;
        background-color:rgba(255, 255, 255, 0.31);
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .header h1 {
            font-size: 2em;
            color: #333;
        }

       
        .info-section {
            flex: 1;
            margin-bottom: 20px;
        }

        .info-section h2 {
            color: #2c3e50;
            font-size: 1.5em;
        }

        .info-section p {
            
            font-size: 1.1em;
            color:rgba(14, 17, 17, 0.87);
            line-height: 1.6;
        }

        .details {
            margin-top: 10px;
            font-size: 1.1em;
            color: #34495e;
        }

        .details span {
           
            font-weight: bold;
        }
        .div{
            display: flex;                /* Usamos flexbox para organizar los divs horizontalmente */
            justify-content: space-between; /* Distribuye los divs con espacio entre ellos */
            gap: 20px;                    /* Establece el espacio entre los divs */
        }
    </style>
</head>
<body>

<div class="container">
    <div class="header">
        <h1>Detalles De La Pieza</h1>
        <p>Piezas Del Museo De La Ciudad de San Cristobal </p>
    </div>
  <h3>Datos De La Pieza</h3>
  <div class="div">
    
    <div class="info-section details ">
        
        <p><span>N° De inventario:</span> <?=$pieza['num_inventario'];?></p>
        <p><span>Estado De conservacion:</span> <?=$pieza['estado_conservacion'];?></p>
        <p><span>Fecha De Ingreso:</span> <?=$pieza['fecha_ingreso'];?></p>
        <p><span>Cantidad:</span> <?=$pieza['cantidad_de_piezas'];?></p>
        <p><span>Observacion:</span> <?=$pieza['observacion'];?></p>
        <p><span>Clasificación:</span> <?=$pieza['clasificacion'];?></p>
    </div>

    <div class="info-section details" > 
            
        <!--ARQUEOLOGIA-->
        <?php if ($pieza['clasificacion'] == 'arqueologia') : ?>
            <p><span>Integridad Histirica:</span> <?=$clasificacion_data['integridad_historica'];?></p>
            <p><span>Estetica:</span> <?=$clasificacion_data['estetica'];?></p>
            <p><span>Material:</span>  <?=$clasificacion_data['material'];?></p>

        <!--BOTANICA-->
        <?php elseif ($pieza['clasificacion'] == 'botanica') : ?>
            <p><span>Clasificacion De Botanica:</span> <?=$clasificacion_data['clasificacion'];?></p>
            <p><span>Division:</span> <?=$clasificacion_data['division'];?></p>
            <p><span>Familia:</span> <?=$clasificacion_data['familia'];?></p>
            <p><span>Especie:</span> <?=$clasificacion_data['especie'];?></p>
            <p><span>Orden:</span> <?=$clasificacion_data['orden'];?></p>
            <p><span>Clase:</span> <?=$clasificacion_data['clase'];?></p>
            <p><span>Descripcion:</span> <?=$clasificacion_data['descripcion'];?></p>

        <!--GEOLOGIA -->
        <?php elseif ($pieza['clasificacion'] == 'geologia') : ?>
            <p><span>Tipo De Roca:</span><?=$clasificacion_data['tipo_rocas'];?></p>
            <p><span>Descripcion:</span> <?=$clasificacion_data['descripcion'];?></p>
      
        <!--ICTIOLOGIA -->
        <?php elseif ($pieza['clasificacion'] == 'ictiologia') : ?>
            <p><span>Especies:</span> <?=$clasificacion_data['especies'];?></p>
            <p><span>Clasificacion De Ictiologia:</span> <?=$clasificacion_data['clasificacion'];?></p>
            <p><span>Descripcion:</span> <?=$clasificacion_data['descripcion'];?></p>

        <!--Oología -->
        <?php elseif ($pieza['clasificacion'] == 'oología') : ?>  
            <p><span>Clasificacion De Oología:</span> <?=$clasificacion_data['clasificacion'];?></p>
            <p><span>Tipo:</span> <?=$clasificacion_data['tipo'];?></p>
            <p><span>Especie:</span> <?=$clasificacion_data['especie'];?></p>
            <p><span>Descripcion:</span> <?=$clasificacion_data['descripcion'];?></p> 
            
        <!--osteologia -->
        <?php elseif ($pieza['clasificacion'] == 'osteologia') : ?>
            <p><span>Especie:</span> <?=$clasificacion_data['especie'];?></p>
            <p><span>Clasificacion De Osteologia:</span> <?=$clasificacion_data['clasificacion'];?></p>

        <!--paleontologia -->
        <?php elseif ($pieza['clasificacion'] == 'paleontologia') : ?>
            <p><span>Era:</span> <?=$clasificacion_data['era'];?> </p> 
            <p><span>Periodo:</span> <?=$clasificacion_data['periodo'];?></p>        
            <p><span>Descripcion:</span> <?=$clasificacion_data['descripcion'];?></p> 

        <!--ZOOLOGIA usar inline block -->
        <?php elseif ($pieza['clasificacion'] == 'zoologia') : ?>
            <p><span>Clasificacion De Zoologia:</span> <?=$clasificacion_data['clasificacion'];?></p>
            <p><span>Familia:</span> <?=$clasificacion_data['familia'];?> </p> 
            <p><span>Especie:</span> <?=$clasificacion_data['especie'];?> </p> 
            <p><span>Orden:</span> <?=$clasificacion_data['orden'];?> </p> 
            <p><span>Phylum:</span> <?=$clasificacion_data['phylum'];?> </p> 
            <p><span>Clase:</span> <?=$clasificacion_data['clase'];?> </p> 
            <p><span>Genero:</span> <?=$clasificacion_data['genero'];?> </p> 
            <p><span>Descripcion:</span> <?=$clasificacion_data['descripcion'];?> </p> 

        <?php endif; ?>

    </div>
  </div>
    
    <div class="info-section details ">
        <h3>Datos Del Donante</h3>
        <p><span>nombre y apellido:</span> <?=$donante['nombre'] . ' ' . $donante['apellido']; ?></p>
        <p><span>Fecha:</span> <?php  if(!empty(trim($donante['fecha']))){ echo $donante['fecha'];}else{ echo "(si el donante es anonimo no se registra la fecha )";} ?></p>
        
    </div>
    <div class="text-center">
        <a class="btn btn-success btn-lg mb-2 " href="../listados/piezasList.php"  role="button">volver</a>
    </div>
    
</div>
   <?php
     include('../footer.php');
   ?>
<script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
