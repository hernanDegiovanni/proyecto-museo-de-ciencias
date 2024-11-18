<?php
session_start();
//echo $_SESSION['dnicli'];
//die();
 if(!isset($_SESSION['dniadmin'])){
     header("location:index.php");
    }

?>

<html lang="es">

<body>
 
<?php
       include_once('../head.php');
     include_once('../header.php');

   ?>

  

<section class="container text-center">
    
    <div class="border border-secondary ">
        
        <h2> menu administrador</h2>
        <a class="btn btn-primary btn-sm mb-2" href="usuariosList.php"  role="button">usuarios</a>
        <a class="btn btn-primary btn-sm mb-2" href="piezasList.php"     role="button">piezas</a>
      
   
   <div>
   <a class="btn btn-primary btn-sm mb-2" href="../formularios/form_agregar.php"     role="button">AGREGAR PIEZA</a>
   
   <a class="btn btn-primary btn-sm mb-2" href="../formularios/form_registro.php"     role="button">AGREGAR usuario</a>


   </div>

    

    
</section>







 
 <script src="bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>