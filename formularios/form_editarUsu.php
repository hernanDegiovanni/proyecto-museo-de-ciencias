<?php

 
 session_start();

 // Verifica si el parámetro 'id' está presente en la URL

    $id = $_POST['idUsuario'];
// Conexion a la Base de Datos Biblioteca 
 require_once "../conexion.php";

 $sql = "SELECT * FROM usuario WHERE idUsuario = '$id'";
 $result = mysqli_query($conex, $sql);
 
 // Verifica si se encontró el usuario con ese id
 if ($result && mysqli_num_rows($result) > 0) {
     // Si el usuario existe, lo obtienes en el array $usuario
     $usuario = mysqli_fetch_assoc($result);
 } else {
     // Si no se encontró el usuario, muestra un error
     die("Usuario no encontrado.");
 }
  
  ?>
 
<body>
  
  
  <?php
           include_once('../head.php');
           include_once('../header.php');
  
     ?>
  
     
    <section>
  
  
      <?php 
      // Uso de GET para mostrar Mensaje resultante de la operacion de Actualizacion
      // Verifica si hay un mensaje en la URL
      if (isset($_GET['msje'])) {
          $mensaje = $_GET['msje'];
      }
      ?>
    
    <div class="container mt-2 mb-5">
    <div class="text-center my-5 text-success"><h2>Editar Usuario</h2></div>	
        
    <form class="row g-3" action="../acciones/ediUsu.php" method="post" enctype="multipart/form-data" >
  
    
    <input type="hidden" class="form-control" name="idUsuario" id="idUsuario" value="<?=$usuario['idUsuario'];?>">
  
    <div class="col-sm-6 mb-3">
     <label for="dni" class="form-label">* DNI</label>
     <input type="text" class="form-control" name="dni" id="dni" value="<?=$usuario['dni'];?>">
    </div>
    
    <div class="col-sm-6 mb-3">
        <label for="nombre" class="form-label">* Nombre</label>
        <input type="text" class="form-control" name="nombre" id="nombre" value="<?=$usuario['nombre'];?>" required>
    </div> 

    <div class="col-sm-6 mb-3">
        <label for="apellido" class="form-label">* Apellido</label>
        <input type="text" class="form-control" name="apellido" id="apellido" value="<?=$usuario['apellido'];?>" required>
    </div>
    
    <div class="col-sm-6 mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" name="email" id="email" value="<?=$usuario['email'];?>" required>
    </div>

    <div class="col-sm-6 mb-3">
        <label for="clave" class="form-label">Contraseña</label>
        <!-- Aquí dejamos el campo vacío, para que el usuario pueda ingresar una nueva contraseña -->
        <input type="password" class="form-control" name="clave" id="clave">
        <small class="form-text text-muted">Deje vacío si no desea cambiar la contraseña.</small>
    </div> 

   <div class="col-sm-6 mb-3">
      <label for="fecha_alta" class="form-label">Fecha de alta</label>
      <input type="date" class="form-control" name="fecha_alta" id="fecha_alta" value="<?=$usuario['fecha_alta'];?>" required>
   </div>

    <div  class="col-sm-6 mb-3">
    <label for="tipo_de_usuario" class="form-label">Cambiar Tipo de Usuario</label>
        <select class="form-select" aria-label="Default select example" id="tipo_de_usuario" name="tipo_de_usuario" required>
        <option value="<?=$usuario['tipo_de_usuario'];?>"><?=$usuario['tipo_de_usuario'];?></option>
        <option value="administrador">administrador</option>
        <option value="gerente">gerente</option>
            
        </select> 
    </div>


  
    <div class="col-12 text-center">
    <h5>¿Confirma la Actualizacion del usuario?</a></h5>
    <button type="submit" class="btn btn-primary btn-sm" name="btn_editar" id="editar">Actualizar</button>
    <a class="btn btn-primary btn-sm ms-2" href="./../listados/usuariosList.php" role="button">Cancelar</a>
    </div>
    
    </form>
     
      
      <!-- Mostrar el mensaje de error (si existe) -->
      <?php if (isset($mensaje)): ?>
          <div class="alert alert-danger mt-3">
              <?php echo htmlspecialchars($mensaje); ?>
          </div>
      <?php endif; ?>
   
  
   </section>
  
 
  <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
  
  
  </body>
  
 
  
  
