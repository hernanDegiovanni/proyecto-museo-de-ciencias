<?php
require_once "retriction.php";
?>



<html lang="es">

<body >
 
<?php
       include_once('../head.php');
     include_once('../header.php');

   ?>

<?php
if(isset($_SESSION['dniadmin']))  {
  ?>
<section class="container text-center listado">
    
    
        
        <h2> Menú del Administrador </h2>
        <a class="btn btn-success btn-lg mb-2 " href="usuariosList.php"  role="button">Usuarios</a>
        <a class="btn btn-success btn-lg mb-2 " href="piezasList.php"     role="button">Piezas</a>
        <a class="btn btn-success btn-lg mb-2 " href="../formularios/form_agregar.php"  role="button">Agregar Pieza</a>
        <a class="btn btn-success btn-lg mb-2 " href="../formularios/form_registro.php"  role="button">Agregar Usuario</a>
        <a class="btn btn-success btn-lg mb-2 " href="../formularios/eventos.php"  role="button">Cargar Evento</a>
  
</section>


<?php
}else if(isset($_SESSION['dnige'])){

?>
<section class="container text-center listado">
    
    
        
        <h2> Menú de Gerente </h2>
     
        <a class="btn btn-success btn-lg mb-2 " href="piezasList.php" role="button">Piezas</a>
            
        <a class="btn btn-success btn-lg mb-2 " href="../formularios/form_agregar.php"     role="button">Agregar Pieza</a>
        <a class="btn btn-success btn-lg mb-2 " href="../formularios/eventos.php"  role="button">Cargar Evento</a>
        
   
</section>

<?php

}

?>
<?php
include_once('../footer.php');
?>
 <script src="bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>