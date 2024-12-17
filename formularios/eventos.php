<?php
session_start();

if(!isset($_SESSION['dnige']) && !isset($_SESSION['dniadmin'])){
    header("location:../index.php");
   }
?> 

<html lang="en">
</head>
<body>
      

<?php
     
     include_once('../head.php');
     include_once('../header.php'); 
     

   ?>
  <section>
   
  
   <div class="container mt-2 mb-5">
   <div class="text-center mt-5 mb-2"><h2>Creacion de EVENTOS</h2></div>	
   <div class="text-secondary"><p><small>* Dato Obligatorio</small></p></div>
       
   <form class="row g-3" action="../acciones/evento.php" method="post" enctype="multipart/form-data">
   
   <div class="col-sm-6 mb-3">
     <label for="titulo" class="form-label">* titulo</label>
     <input type="text" class="form-control" name="titulo" id="titulo" placeholder="Ingresa tu Nombre">
   </div> 
   <div class="col-sm-6 mb-3">
     <label for="texto" class="form-label">* texto</label>
     <textarea class="form-control" id="texto" name="texto" rows="3" ></textarea>
   </div>
 
   <div class="col-sm-6 mb-3">
      <label for="fecha_alta" class="form-label">Fecha</label>
      <input type="date" class="form-control" name="fecha" id="fecha" placeholder="Ingresa fecha" required>
   </div>

   <div class="col-sm-6 mb-3">
     <label for="direccion" class="form-label">* direccion</label>
     <input type="text" class="form-control" name="direccion" id="direccion" placeholder="Ingresa la direccion">
   </div>

   <div class="col-sm-6 mb-3">
    <label for="archivoimagen">incertar imagen </label>
    <input type="file" name="archivoimagen" id="archivoimagen">
  </div>

   <div class="col-12 text-center">
   <button type="submit" class="btn btn-primary btn-sm" name="btn_agregar" id="btn_agregar">crear</button>
   <a class="btn btn-primary btn-sm ms-2" href="../listados/menu.php" role="button">Cancelar</a>
   
   </div>
   
   </form>
    
     
   <?php
     
     /* Evalúa si existe mensaje, enviado mediante el método GET, desde el archivo validarDatosSocio.php 
     Si existe mensaje, entonces evalúa si es un mensaje de error o de OK*/
 
     if (isset($_GET["msje"])){
 
          if($_GET["msje"]!="ok"){
 
          echo "<div class='text-center mt-4 mb-5'><div class='alert alert-danger' role='alert'><strong>".$_GET["msje"]."</strong></div></div>"; 
          
        }else{
 
                  
         echo "<div class='text-center mt-4 mb-5'><div class='alert alert-success' role='alert'><strong>Datos agregados exitosamente!</strong><a href='../listados/menu.php' class='text-primary ms-3'>Volver al menu</a></div></div>";  
        
        }  
   } 
   ?> 
   
 
 
 
   </section>
  
</body>
</html>