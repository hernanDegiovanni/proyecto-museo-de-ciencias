
<?php
session_start();
//echo $_SESSION['dnicli'];
//die();
 if(!isset($_SESSION['dniadmin'])){
     header("location:index.php");
    }
//$categorias=$conex->query("SELECT * FROM *")
?>

<html lang="es">

<body>
 
 
   <?php
         include_once('../head.php');
         include_once('../header.php');

   ?>
      
            
    
   

   
   
  <section class="">
  
  
  <div class="container mt-2 mb-5">
  <div class="text-center mt-5 mb-2 text-primary border border-secondary"><h2>Agregar piezas</h2></div>	
  <div class="text-secondary"><p><small>* Dato Obligatorio</small></p></div>
  	
  <form class="row g-3 " action="../acciones/insertar_datos.php" method="POST" enctype="multipart/form-data">
<!-- DATOS GENERALES -->
  <div class="col-sm-6 mb-3">
 
    <label for="num_inventario" class="form-label">*numero de inventario</label>
    <input type="number" class="form-control" name="num_inventario" id="num_inventario" placeholder="ingresar numero" required>
  </div>

  <div class="col-sm-6 mb-3">
    <label for="estado_conservacion" class="form-label">* estado de conservacion</label>
    <input type="text" class="form-control" name="estado_conservacion" id="estado_conservacion" placeholder="Ingresa tu Nombre" required>
  </div>

   <div class="col-sm-6 mb-3">
    <label for="fecha_ingreso" class="form-label">* fecha de ingreso</label>
    <input type="date" class="form-control" name="fecha_ingreso" id="fecha_ingreso" placeholder="Ingresa  fecha de alta" required>
  </div>

  <div class="col-sm-6 mb-3">
    <label for="cantidad_de_piezas" class="form-label"> *cantidad</label>
    <input type="number" class="form-control" name="cantidad_de_piezas" id="cantidad_de_piezas" placeholder="Ingresa existencia (cantidad)" required>
  </div>

 <div class="col-sm-6 mb-3">
    <label for="observacion_piezas" class="form-label">* observacion</label>
    <textarea class="form-control" id="observacion_piezas" name="observacion_piezas" rows="3"></textarea>
  </div>

  <div class="col-sm-6 mb-3">
  <label for="clasificacion" class="form-label">* clasificacion</label>
  <select class="form-select" aria-label="Default select example" id="clasificacion" name="clasificacion"  required>
  <option value="">Seleccionar...</option>
  <option value="arqueologia">arqueologia</option>
  <option value="botanica">botanica</option>
  <option value="geologia">geologia</option>
  <option value="ictiologia">ictiologia</option>
  <option value="oología">Oología</option>
  <option value="osteologia">osteologia</option>
  <option value="paleontologia">paleontologia</option>
  <option value="zoologia">zoologia</option>
</select>
</div>



<!--ARQUEOLOGIA -->
   <div   id="arqueologia_fields" style="display:none;">
   <h4>ARQUEOLOGIA </H4>

      <label for="integridad_historica" class="form-label">* integridad_historica</label>
      <input type="text" class="form-control" name="integridad_historica" id="integridad_historica" placeholder="Ingresa integridad historica" >

      <label for="estetica" class="form-label">* estetica</label>
      <input type="text" class="form-control" name="estetica" id="estetica" placeholder="Ingresa estetica" >

      <label for="material" class="form-label">* material</label>
      <input type="text" class="form-control" name="material" id="material" placeholder="Ingresa el material que lo compone" >

    </div>

<!--BOTANICA-->
    <div   id="botanica_fields" style="display:none;">
    <h4>BOTANICA </H4>

    <div class="col-sm-6 mb-3"> 
        <label for="clasificacion_botanica" class="form-label">* clasificacion</label>
        <input type="text" class="form-control" name="clasificacion_botanica" id="clasificacion_botanica" placeholder="Ingresa clasificacion" >
        </div>

        <div class="col-sm-6 mb-3">
           <label for="divicion_botanica" class="form-label">* divicion</label>
           <input type="text" class="form-control" name="divicion_botanica" id="divicion_botanica" placeholder="Ingresa divicion" >
        </div>
        <div class="col-sm-6 mb-3">
           <label for="familia_botanica" class="form-label">* familia</label>
           <input type="text" class="form-control" name="familia_botanica" id="familia_botanica" placeholder="Ingresa familia" >
        </div>
        <div class="col-sm-6 mb-3">
           <label for="especie_botanica" class="form-label">* especie</label>
           <input type="text" class="form-control" name="especie_botanica" id="especie_botanica" placeholder="Ingresa especie" >
        </div>
        <div class="col-sm-6 mb-3">
           <label for="orden_botanica" class="form-label">* orden</label>
           <input type="text" class="form-control" name="orden_botanica" id="orden_botanica" placeholder="Ingresa orden" >
        </div>
        <div class="col-sm-6 mb-3">
           <label for="clase_botanica" class="form-label">* clase</label>
           <input type="text" class="form-control" name="clase_botanica" id="clase_botanica" placeholder="Ingresa clase" >
        </div>
        
      <div class="col-sm-6 mb-3">
        <label for="descripsion_botanica" class="form-label">DESCRIPCION</label>
        <textarea class="form-control" id="descripsion_botanica" name="descripsion_botanica" rows="3"></textarea>
      </div>
    </div>
  

    <!--GEOLOGIA -->

    <div id="geologia_fields" style="display:none;">
    <h4>GEOLOGIA </H4>
        <div class="col-sm-6 mb-3"> 
          <label for="tipo_rocas" class="form-label">* tipo_rocas</label>
          <input type="text" class="form-control" name="tipo_rocas" id="tipo_rocas" placeholder="Ingresa tipo de roca ej:sedimentarias">
        </div>

      <label for="descripcion_geologia" class="form-label">* descripcion</label>
      <textarea class="form-control" id="descripcion_geologia" name="descripcion_geologia" rows="3"></textarea>
    </div>

<!--ICTIOLOGIA -->
    <div id="ictiologia_fields" style="display:none;">
    <h4>ICTIOLOGIA </H4>
    <div class="col-sm-6 mb-3"> 
    <label for="especie_ictiologia" class="form-label">* especie</label>
    <input type="text" class="form-control" name="especie_ictiologia" id="especie_ictiologia" placeholder="Ingresa especie ej: de agua dulce" >
   </div>

  <div class="col-sm-6 mb-3"> 
   <label for="clasificacion_ictiologia" class="form-label">* clasificacion</label>
   <input type="text" class="form-control" name="clasificacion_ictiologia" id="clasificacion_ictiologia"  placeholder="Ingresa especie ej: Condricios" >
   </div>

   
    <label for="descripcion_ictiologia" class="form-label">* descripcion</label>
    <textarea class="form-control" id="descripcion_ictiologia" name="descripcion_ictiologia" rows="3"></textarea>
    </div>


<!--Oología -->
    <div id="Oología_fields" style="display:none;">
    <h4>Oología </H4>
       <div class="col-sm-6 mb-3">
           <label for="clasificacion_oología" class="form-label">* clasificacion</label>
           <input type="text" class="form-control" name="clasificacion_oología" id="clasificacion_oología" placeholder="Ingresa clasificacion" >
        </div>

        <div class="col-sm-6 mb-3">
           <label for="tipo_oología" class="form-label">* tipo</label>
           <input type="text" class="form-control" name="tipo_oología" id="tipo_oología" placeholder="Ingresa tipo" >
        </div>

        <div class="col-sm-6 mb-3">
           <label for="especie_oología" class="form-label">* especie</label>
           <input type="text" class="form-control" name="especie_oología" id="especie_oología" placeholder="Ingresa especie" >
        </div>

    <label for="descripcion_oología" class="form-label">* descripcion</label>
    <textarea class="form-control" id="descripcion_oología" name="descripcion_oología" rows="3"></textarea>
    </div>

<!--osteologia -->

<div id="osteologia_fields" style="display:none;">
<h4>OSTEOLOGIA </H4>
       
        <div class="col-sm-6 mb-3">
           <label for="especie_osteologia" class="form-label">* especie</label>
           <input type="text" class="form-control" name="especie_osteologia" id="especie_osteologia" placeholder="Ingresa especie" >
        </div>

        <div class="col-sm-6 mb-3">
           <label for="clasificacion_osteologia" class="form-label">* clasificacion</label>
           <input type="text" class="form-control" name="clasificacion_osteologia" id="clasificacion_osteologia" placeholder="Ingresa clasificacion" >
        </div>
 </div>



<!--paleontologia -->
<div id="paleontologia_fields" style="display:none;">
<h4>PALEONTOLOGIA</H4>

       <div class="col-sm-6 mb-3">
           <label for="era" class="form-label">* era</label>
           <input type="text" class="form-control" name="era" id="era" placeholder="Ingresa era" >
        </div>

     <div class="col-sm-6 mb-3">
           <label for="periodo" class="form-label">* periodo</label>
           <input type="text" class="form-control" name="periodo" id="periodo" placeholder="Ingresa periodo" >
        </div>

    
    <label for="descripcion_paleontologia" class="form-label">* descripcion</label>
      <textarea class="form-control" id="descripcion_paleontologia" name="descripcion_paleontologia" rows="3"></textarea>
</div>



<!--ZOOLOGIA usar inline block -->
    <div  id="zoologia_fields" style="display:none;">
    <h4>ZOOLOGIA</H4>
        <div class="col-sm-6 mb-3"> 
        <label for="clasificacion_zoologia" class="form-label">* clasificacion</label>
          <select class="form-select" aria-label="Default select example" id="clasificacion_zoologia" name="clasificacion_zoologia">
          <option value="">Seleccionar...</option>
            <option value="vertebrados">vertebrados</option>
            <option value="invertebrados">invertebrados</option>
          </select>
        </div>

        <div class="col-sm-6 mb-3">
           <label for="familia_zoologia" class="form-label">* familia</label>
           <input type="text" class="form-control" name="familia_zoologia" id="familia_zoologia" placeholder="Ingresa familia" >
        </div>
       <div class="col-sm-6 mb-3">
           <label for="especie_zoologia" class="form-label">* especie</label>
           <input type="text" class="form-control" name="especie_zoologia" id="especie_zoologia" placeholder="Ingresa especie" >
        </div>
        <div class="col-sm-6 mb-3">
           <label for="orden_zoologia" class="form-label">* orden</label>
           <input type="text" class="form-control" name="orden_zoologia" id="orden_zoologia" placeholder="Ingresa orden" >
        </div>
       <div class="col-sm-6 mb-3">
           <label for="phylum_zoologia" class="form-label">* phylum</label>
           <input type="text" class="form-control" name="phylum_zoologia" id="phylum_zoologia" placeholder="Ingresa phylum" >
        </div>
       
        <div class="col-sm-6 mb-3">
           <label for="clase_zoologia" class="form-label">* clase</label>
           <input type="text" class="form-control" name="clase_zoologia" id="clase_zoologia" placeholder="Ingresa clase" >
        </div>
       <div class="col-sm-6 mb-3">
           <label for="genero_zoologia" class="form-label">* genero</label>
           <input type="text" class="form-control" name="genero_zoologia" id="genero_zoologia" placeholder="Ingresa genero" >
        </div>
       
        
       
        <label for="descripcion_zoologia" class="form-label">* descripcion</label>
        <textarea class="form-control" id="descripcion_zoologia" name="descripcion_zoologia" rows="3"></textarea>

    </div>


    
<div>
<label for="donante_id" class="form-label">¿tiene donante?</label>
    <select class="form-select" aria-label="Default select example" id="donante_id" name="donante_id" required>
    <option value="">Seleccionar...</option>
      <option value="si">si</option>
      <option value="no">no</option>
    
</select> 
  

  


  <div id="donante_fields" style="display:none;">
     <div class="text-center mt-5 mb-2 text-primary border border-secondary">
 
    <h2>donante</h2>
  </div>	
   


  <div class=" mb-2">
     <label for="nombre" class="form-label">Nombre</label>
     <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Ingresa tu Nombre">
   </div> 
   

   <div class="col-sm-6 mb-3">
     <label for="apellido" class="form-label">Apellido</label>
     <input type="text" class="form-control" name="apellido" id="apellido" placeholder="Ingresa tu Apellido">
   </div>

   <div class="col-sm-6 mb-3">
      <label for="fecha" class="form-label">Fecha de alta</label>
      <input type="date" class="form-control" name="fecha" id="fecha" placeholder="Ingresa  fecha de alta">
   </div>
  </div>
<div id="donante_fields_no" style="display:none;">
<div class="text-center mt-5 mb-2 text-primary border border-secondary">
  <h2>por favor presione Agregar</h2>
</div>
</div>


  <div class="col-12 text-center">
  <button type="submit" class="btn btn-primary btn-sm" name="btn_agregar" id="btn_agregar">Agregar</button>
  <a class="btn btn-primary btn-sm ms-2" href="../listados/menu.php" role="button">Cancelar</a>
  </div>
  
  </form>
   
    
  <?php
    
    // Uso de GET para mostrar Mensaje resultante 

    if (isset($_GET["mensaje"])){

    	 if($_GET["mensaje"]!="ok"){

         echo "<div class='text-center mt-4 mb-5'><div class='alert alert-danger' role='alert'><strong>".$_GET["mensaje"]."</strong></div></div>"; 
         
       }else{

                 
        echo "<div class='text-center mt-4 mb-5'><div class='alert alert-success' role='alert'><strong>Producto exitosamente agregado!</strong><a href='listado.php' class='text-primary ms-3'>Volver al Listado</a></div></div>";  
       
       }  
  } 
  ?> 
  



  </section>

   
   
   <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
<script>
  document.getElementById('donante_id').addEventListener('change', function() {  

    document.getElementById('donante_fields').style.display = 'none';
    document.getElementById('donante_fields_no').style.display = 'none';

    if (this.value === 'si') {
            document.getElementById('donante_fields').style.display = 'block';
        } else if (this.value === 'no') {
            document.getElementById('donante_fields_no').style.display = 'block';
        }
  });
    document.getElementById('clasificacion').addEventListener('change', function() {
        document.getElementById('arqueologia_fields').style.display = 'none';
        document.getElementById('botanica_fields').style.display = 'none';
        document.getElementById('geologia_fields').style.display = 'none';
        document.getElementById('ictiologia_fields').style.display = 'none';
        document.getElementById('Oología_fields').style.display = 'none';
        document.getElementById('osteologia_fields').style.display = 'none';
        document.getElementById('paleontologia_fields').style.display = 'none';
        document.getElementById('zoologia_fields').style.display = 'none';

        if (this.value === 'arqueologia') {
            document.getElementById('arqueologia_fields').style.display = 'block';

        } else if (this.value === 'botanica') {
            document.getElementById('botanica_fields').style.display = 'block';

        } else if (this.value === 'geologia') {
          document.getElementById('geologia_fields').style.display = 'block';

        } else if (this.value === 'ictiologia') {
          document.getElementById('ictiologia_fields').style.display = 'block';

        } else if (this.value === 'oología') {
            document.getElementById('Oología_fields').style.display = 'block';

        } else if (this.value === 'osteologia') {
            document.getElementById('osteologia_fields').style.display = 'block';

        } else if (this.value === 'paleontologia') {
            document.getElementById('paleontologia_fields').style.display = 'block';

        }  else if (this.value === 'zoologia') {
            document.getElementById('zoologia_fields').style.display = 'block';

        }
    });
</script>
</body>

</html>