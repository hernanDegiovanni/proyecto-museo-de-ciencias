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
<section class="container text-center">
    
    <div class="border border-secondary ">
        
        <h2> Menú del Administrador </h2>
        <a class="btn btn-primary btn-sm mb-2" href="usuariosList.php"  role="button">usuarios</a>
        <a class="btn btn-primary btn-sm mb-2" href="piezasList.php"     role="button">piezas</a>
        <a class="btn btn-primary btn-sm mb-2" href="../formularios/form_agregar.php"  role="button">AGREGAR PIEZA</a>
        <a class="btn btn-primary btn-sm mb-2" href="../formularios/form_registro.php"  role="button">AGREGAR usuario</a>
        <a class="btn btn-primary btn-sm mb-2" href="../formularios/eventos.php"  role="button">cargar evento</a>
   </div>
</section>


<?php
}else if(isset($_SESSION['dnige'])){

?>
<section class="container text-center">
    
    <div class="border border-secondary ">
        
        <h2> Menú de Gerente </h2>
     
        <a class="btn btn-primary btn-sm mb-2" href="piezasList.php"     role="button">piezas</a>
            
        <a class="btn btn-primary btn-sm mb-2" href="../formularios/form_agregar.php"     role="button">AGREGAR PIEZA</a>
        <a class="btn btn-primary btn-sm mb-2" href="../formularios/eventos.php"  role="button">Cargar evento</a>
        
   </div>
</section>

<?php

}

?>
 <script src="bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>