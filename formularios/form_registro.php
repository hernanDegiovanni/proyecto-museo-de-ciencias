
<?php
session_start();
//echo $_SESSION['dnige'];
//die();
 if(!isset($_SESSION['dniadmin'])){
     header("location:index.php");
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
   <div class="text-center mt-5 mb-2"><h2>Registro de usuarios</h2></div>	
   <div class="text-secondary"><p><small>* Dato Obligatorio</small></p></div>
       
   <form class="row g-3" action="../acciones/registro.php" method="post">
   
   <div class="col-sm-6 mb-3">
     <label for="dni" class="form-label">* DNI</label>
     <input type="text" class="form-control" name="dni" id="dni" placeholder="Ingresa DNI de 8 dígitos"  maxlength="8" pattern="\d{8}">
   </div>
   
   <div class="col-sm-6 mb-3">
     <label for="nombre" class="form-label">* Nombre</label>
     <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Ingresa tu Nombre">
   </div> 

   <div class="col-sm-6 mb-3">
     <label for="apellido" class="form-label">* Apellido</label>
     <input type="text" class="form-control" name="apellido" id="apellido" placeholder="Ingresa tu Apellido">
   </div>
 
   <div class="col-sm-6 mb-3">
     <label for="email" class="form-label">* Email</label>
     <input type="email" class="form-control" name="email" id="email" placeholder="Ingresa tu Correo Electrónico">
   </div>

   <div class="col-sm-6 mb-3">
     <label for="clave" class="form-label">* Contraseña</label>
     <input type="password" class="form-control" name="clave" id="clave" placeholder="Ingresa una contraseña de 8 caracteres como mínimo">
   </div> 

   <div class="col-sm-6 mb-3">
      <label for="fecha_alta" class="form-label">Fecha de alta</label>
      <input type="date" class="form-control" name="fecha_alta" id="fecha_alta" placeholder="Ingresa  fecha de alta" required>
   </div>

   <div  class="col-sm-6 mb-3">
   <label for="tipo_de_usuario" class="form-label">¿quiere cargarlo como administrador?</label>
    <select class="form-select" aria-label="Default select example" id="tipo_de_usuario" name="tipo_de_usuario" required>
    <option value="">Seleccionar...</option>
      <option value="administrador">si</option>
      <option value="gerente">no</option>
    
</select> 
</div>

<div id="usuario_fields" style="display:none;">
<div class="text-center mt-5 mb-2 text-primary border border-secondary">
  <h2>!!exelente el usuario  es administrador!!</h2>
  <h3>por favor presione Agregar</h3>
</div>
</div>

<div id="usuario_fields_no" style="display:none;">
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
     
     /* Evalúa si existe mensaje, enviado mediante el método GET, desde el archivo validarDatosSocio.php 
     Si existe mensaje, entonces evalúa si es un mensaje de error o de OK*/
 
     if (isset($_GET["mensaje"])){
 
          if($_GET["mensaje"]!="ok"){
 
          echo "<div class='text-center mt-4 mb-5'><div class='alert alert-danger' role='alert'><strong>".$_GET["mensaje"]."</strong></div></div>"; 
          
        }else{
 
                  
         echo "<div class='text-center mt-4 mb-5'><div class='alert alert-success' role='alert'><strong>Datos agregados exitosamente!</strong><a href='../listados/usuariosList.php' class='text-primary ms-3'>Volver al Listado</a></div></div>";  
        
        }  
   } 
   ?> 
   
 
 
 
   </section>

   <script>
     document.getElementById('tipo_de_usuario').addEventListener('change', function() {  

document.getElementById('usuario_fields').style.display = 'none';
document.getElementById('usuario_fields_no').style.display = 'none';

if (this.value === 'administrador') {

        document.getElementById('usuario_fields').style.display = 'block';
    } else if (this.value === 'gerente') {
        document.getElementById('usuario_fields_no').style.display = 'block';
    }
});
   </script>
  
</body>
</html>