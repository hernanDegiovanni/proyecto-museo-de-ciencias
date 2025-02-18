<?php

 session_start();
 
  if(!isset($_SESSION['dniadmin']) &&  !isset($_SESSION['dnige'])){
      header("location:../index.php");
     }
 require_once "../conexion.php";


  
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
  
  ?>
 
 
 
 <body>
  
  
 <?php
          include_once('../head.php');
          include_once('../header.php');
 
    ?>
 
    
   <section class="listado">
   
   <div class="container mt-2 mb-5">
   <div class="text-center my-5 text-success"><h2>Edita la Pieza</h2></div>	
       
   <form class="row g-3" action="../acciones/editar.php" method="post" enctype="multipart/form-data" >
 
   
   <input type="hidden" class="form-control" name="idPieza" id="idPieza" value="<?=$pieza['idPieza'];?>">
 
 
   <div class="col-sm-6 mb-3">
  
  <label for="num_inventario" class="form-label">*numero de inventario</label>
  <input type="number" class="form-control" name="num_inventario" id="num_inventario" value="<?=$pieza['num_inventario'];?>" >
 </div>
 
 <div class="col-sm-6 mb-3">
  <label for="estado_conservacion" class="form-label">* estado de conservacion</label>
  <input type="text" class="form-control" name="estado_conservacion" id="estado_conservacion" value="<?=$pieza['estado_conservacion'];?>"  >
 </div>
 
 <div class="col-sm-6 mb-3">
  <label for="fecha_ingreso" class="form-label">* fecha de ingreso</label>
  <input type="date" class="form-control" name="fecha_ingreso" id="fecha_ingreso" value="<?=$pieza['fecha_ingreso'];?>"  >
 </div>
 
 <div class="col-sm-6 mb-3">
  <label for="cantidad_de_piezas" class="form-label"> *cantidad</label>
  <input type="number" class="form-control" name="cantidad_de_piezas" id="cantidad_de_piezas" value="<?=$pieza['cantidad_de_piezas'];?>"  >
 </div>
 
 <div class="col-sm-6 mb-3">
  <label for="observacion_piezas" class="form-label">* observacion</label>
  <textarea class="form-control"  name="observacion_piezas" ><?=$pieza['observacion'];?></textarea>
 </div>
 
 <div class="col-sm-6 mb-3">
   <label for="clasificacion" class="form-label">* clasificacion</label>
   <input type="text" class="form-control" name="clasificacion" id="clasificacion" value="<?=$pieza['clasificacion'];?>"  >
   
 
 </div>
 
 <!--ARQUEOLOGIA-->
 <?php if ($pieza['clasificacion'] == 'arqueologia') : ?>
 
   <input type="hidden" class="form-control" name="Pieza_idPieza" id="Pieza_idPieza" value="<?=$clasificacion_data['Pieza_idPieza'];?>">
 
 <h4>ARQUEOLOGIA </H4>
 
       <label for="integridad_historica" class="form-label">* integridad_historica</label>
       <input type="text" class="form-control" name="integridad_historica" id="integridad_historica" value="<?=$clasificacion_data['integridad_historica'];?>">
 
       <label for="estetica" class="form-label">* estetica</label>
       <input type="text" class="form-control" name="estetica" id="estetica" value="<?=$clasificacion_data['estetica'];?>">
 
       <label for="material" class="form-label">* material</label>
       <input type="text" class="form-control" name="material" id="material"  value="<?=$clasificacion_data['material'];?>">
 
 <!--BOTANICA-->
 
 <?php elseif ($pieza['clasificacion'] == 'botanica') : ?>
 
   <input type="hidden" class="form-control" name="Pieza_idPieza" id="Pieza_idPieza" value="<?=$clasificacion_data['Pieza_idPieza'];?>">
 
     <h4>BOTANICA </H4>
 
     <div class="col-sm-6 mb-3"> 
         <label for="clasificacion_botanica" class="form-label">* clasificacion</label>
         <input type="text" class="form-control" name="clasificacion_botanica" id="clasificacion_botanica" value="<?=$clasificacion_data['clasificacion'];?>">
         </div>
 
         <div class="col-sm-6 mb-3">
            <label for="divicion_botanica" class="form-label">* divicion</label>
            <input type="text" class="form-control" name="divicion_botanica" id="divicion_botanica" value="<?=$clasificacion_data['division'];?>">
         </div>
         <div class="col-sm-6 mb-3">
            <label for="familia_botanica" class="form-label">* familia</label>
            <input type="text" class="form-control" name="familia_botanica" id="familia_botanica" value="<?=$clasificacion_data['familia'];?>" >
         </div>
         <div class="col-sm-6 mb-3">
            <label for="especie_botanica" class="form-label">* especie</label>
            <input type="text" class="form-control" name="especie_botanica" id="especie_botanica" value="<?=$clasificacion_data['especie'];?>">
         </div>
         <div class="col-sm-6 mb-3">
            <label for="orden_botanica" class="form-label">* orden</label>
            <input type="text" class="form-control" name="orden_botanica" id="orden_botanica" value="<?=$clasificacion_data['orden'];?>">
         </div>
         <div class="col-sm-6 mb-3">
            <label for="clase_botanica" class="form-label">* clase</label>
            <input type="text" class="form-control" name="clase_botanica" id="clase_botanica" value="<?=$clasificacion_data['clase'];?>">
         </div>
         
       <div class="col-sm-6 mb-3">
         <label for="descripsion_botanica" class="form-label">DESCRIPCION</label>
         <textarea class="form-control" id="descripsion_botanica" name="descripsion_botanica" rows="3"><?=$clasificacion_data['descripcion'];?></textarea>
    
     </div>
 
 
      <!--GEOLOGIA -->
     <?php elseif ($pieza['clasificacion'] == 'geologia') : ?>
  
    <input type="hidden" class="form-control" name="Pieza_idPieza" id="Pieza_idPieza" value="<?=$clasificacion_data['Pieza_idPieza'];?>">
 
     <h4>GEOLOGIA </H4>
         <div class="col-sm-6 mb-3"> 
           <label for="tipo_rocas" class="form-label">* tipo_rocas</label>
           <input type="text" class="form-control" name="tipo_rocas" id="tipo_rocas" value="<?=$clasificacion_data['tipo_rocas'];?>">
         </div>
 
       <label for="descripcion_geologia" class="form-label">* descripcion</label>
       <textarea class="form-control" id="descripcion_geologia" name="descripcion_geologia" rows="3"><?=$clasificacion_data['descripcion'];?></textarea>
   
 
 
 
 <!--ICTIOLOGIA -->
 <?php elseif ($pieza['clasificacion'] == 'ictiologia') : ?>
 
   <input type="hidden" class="form-control" name="Pieza_idPieza" id="Pieza_idPieza" value="<?=$clasificacion_data['Pieza_idPieza'];?>">
 
     <h4>ICTIOLOGIA </H4>
     <div class="col-sm-6 mb-3"> 
     <label for="especie_ictiologia" class="form-label">* especie</label>
     <input type="text" class="form-control" name="especie_ictiologia" id="especie_ictiologia"  value="<?=$clasificacion_data['especies'];?>" >
    </div>
 
   <div class="col-sm-6 mb-3"> 
    <label for="clasificacion_ictiologia" class="form-label">* clasificacion</label>
    <input type="text" class="form-control" name="clasificacion_ictiologia" id="clasificacion_ictiologia"  value="<?=$clasificacion_data['clasificacion'];?>" >
    
    </div>
 
    
     <label for="descripcion_ictiologia" class="form-label">* descripcion</label>
     <textarea class="form-control" id="descripcion_ictiologia" name="descripcion_ictiologia" rows="3"><?=$clasificacion_data['descripcion'];?></textarea>
   
 
 
 
 <!--Oología -->
 <?php elseif ($pieza['clasificacion'] == 'oología') : ?>
   
   <input type="hidden" class="form-control" name="Pieza_idPieza" id="Pieza_idPieza" value="<?=$clasificacion_data['Pieza_idPieza'];?>">
 
     <h4>Oología </H4>
        <div class="col-sm-6 mb-3">
            <label for="clasificacion_oología" class="form-label">* clasificacion</label>
            <input type="text" class="form-control" name="clasificacion_oología" id="clasificacion_oología" value="<?=$clasificacion_data['clasificacion'];?>" >
         </div>
 
         <div class="col-sm-6 mb-3">
            <label for="tipo_oología" class="form-label">* tipo</label>
            <input type="text" class="form-control" name="tipo_oología" id="tipo_oología" value="<?=$clasificacion_data['tipo'];?>" >
         </div>
 
         <div class="col-sm-6 mb-3">
            <label for="especie_oología" class="form-label">* especie</label>
            <input type="text" class="form-control" name="especie_oología" id="especie_oología" value="<?=$clasificacion_data['especie'];?>" >
         </div>
 
     <label for="descripcion_oología" class="form-label">* descripcion</label>
     <textarea class="form-control" id="descripcion_oología" name="descripcion_oología" rows="3"><?=$clasificacion_data['descripcion'];?></textarea>
     
 
 
 <!--osteologia -->
 <?php elseif ($pieza['clasificacion'] == 'osteologia') : ?>
 
   <input type="hidden" class="form-control" name="Pieza_idPieza" id="Pieza_idPieza" value="<?=$clasificacion_data['Pieza_idPieza'];?>">
 
 <h4>OSTEOLOGIA </H4>
        
         <div class="col-sm-6 mb-3">
            <label for="especie_osteologia" class="form-label">* especie</label>
            <input type="text" class="form-control" name="especie_osteologia" id="especie_osteologia" value="<?=$clasificacion_data['especie'];?>" >
         </div>
 
         <div class="col-sm-6 mb-3">
            <label for="clasificacion_osteologia" class="form-label">* clasificacion</label>
            <input type="text" class="form-control" name="clasificacion_osteologia" id="clasificacion_osteologia" value="<?=$clasificacion_data['clasificacion'];?>" >
         </div>
 
 
 
 
 <!--paleontologia -->
 <?php elseif ($pieza['clasificacion'] == 'paleontologia') : ?>
 
  <input type="hidden" class="form-control" name="Pieza_idPieza" id="Pieza_idPieza" value="<?=$clasificacion_data['Pieza_idPieza'];?>">
 
 <h4>PALEONTOLOGIA</H4>
 
        <div class="col-sm-6 mb-3">
            <label for="era" class="form-label">* era</label>
            <input type="text" class="form-control" name="era" id="era" value="<?=$clasificacion_data['era'];?>">
         </div>
 
      <div class="col-sm-6 mb-3">
            <label for="periodo" class="form-label">* periodo</label>
            <input type="text" class="form-control" name="periodo" id="periodo" value="<?=$clasificacion_data['periodo'];?>">
         </div>
 
     
     <label for="descripcion_paleontologia" class="form-label">* descripcion</label>
       <textarea class="form-control" id="descripcion_paleontologia" name="descripcion_paleontologia" rows="3"><?=$clasificacion_data['descripcion'];?></textarea>
 
 
 
 
 <!--ZOOLOGIA usar inline block -->
 <?php elseif ($pieza['clasificacion'] == 'zoologia') : ?>
   
   <input type="hidden" class="form-control" name="Pieza_idPieza" id="Pieza_idPieza" value="<?=$clasificacion_data['Pieza_idPieza'];?>">
 
     
     <h4>ZOOLOGIA</H4>
         <div class="col-sm-6 mb-3"> 
         <label for="clasificacion_zoologia" class="form-label">* clasificacion</label>
           <select class="form-select" aria-label="Default select example" id="clasificacion_zoologia" name="clasificacion_zoologia">
           <option value="<?=$clasificacion_data['clasificacion'];?>"><?=$clasificacion_data['clasificacion'];?></option>
             <option value="vertebrados">vertebrados</option>
             <option value="invertebrados">invertebrados</option>
           </select>
         </div>
 
         <div class="col-sm-6 mb-3">
            <label for="familia_zoologia" class="form-label">* familia</label>
            <input type="text" class="form-control" name="familia_zoologia" id="familia_zoologia" value="<?=$clasificacion_data['familia'];?>" >
         </div>
        <div class="col-sm-6 mb-3">
            <label for="especie_zoologia" class="form-label">* especie</label>
            <input type="text" class="form-control" name="especie_zoologia" id="especie_zoologia" value="<?=$clasificacion_data['especie'];?>" >
         </div>
         <div class="col-sm-6 mb-3">
            <label for="orden_zoologia" class="form-label">* orden</label>
            <input type="text" class="form-control" name="orden_zoologia" id="orden_zoologia" value="<?=$clasificacion_data['orden'];?>" >
         </div>
        <div class="col-sm-6 mb-3">
            <label for="phylum_zoologia" class="form-label">* phylum</label>
            <input type="text" class="form-control" name="phylum_zoologia" id="phylum_zoologia" value="<?=$clasificacion_data['phylum'];?>" >
         </div>
        
         <div class="col-sm-6 mb-3">
            <label for="clase_zoologia" class="form-label">* clase</label>
            <input type="text" class="form-control" name="clase_zoologia" id="clase_zoologia" value="<?=$clasificacion_data['clase'];?>">
         </div>
        <div class="col-sm-6 mb-3">
            <label for="genero_zoologia" class="form-label">* genero</label>
            <input type="text" class="form-control" name="genero_zoologia" id="genero_zoologia" value="<?=$clasificacion_data['genero'];?>">
         </div>
        
         
        
         <label for="descripcion_zoologia" class="form-label">* descripcion</label>
         <textarea class="form-control" id="descripcion_zoologia" name="descripcion_zoologia" rows="3"><?=$clasificacion_data['descripcion'];?></textarea>
 
 
 
     <?php endif; ?>
 
 
 
 
 
 
 
 
 
 
 
 
   <div class="col-12 text-center">
   <h5>¿Confirma la Actualizar de la Pieza?</a></h5>
   <button type="submit" class="btn btn-success btn-lg mb-2" name="btn_editar" id="editar">Actualizar</button>
   <a class="btn btn-success btn-lg mb-2" href="./../listados/piezasList.php" role="button">Cancelar</a>
   </div>
   
   </form>
    
 
    <?php
     
     // Uso de GET para mostrar Mensaje resultante de la operacion de Actualizacion
 
     if (isset($_GET["msje"])){
 
        if($_GET["msje"]!="ok"){
 
          echo "<div class='text-center mt-4 mb-5'><div class='alert alert-danger' role='alert'><strong>".$_GET["msje"]."</strong><a href='listado.php' class='text-primary ms-3'>Volver al Listado</a></div></div>"; 
          
        }else{
 
                
          echo "<div class='text-center mt-4 mb-5'><div class='alert alert-success' role='alert'><strong>"."Actualización Exitosa!"."</strong><a href='listado.php' class='text-primary ms-3'>Volver al Listado</a></div></div>";  
        
        }  
   } 
   ?> 
 
  </section>
 
  <?php
     include('../footer.php');
   ?>
 <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
 
 
 </body>
 

 
 
