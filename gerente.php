
<?php
session_start();
//echo $_SESSION['dnige'];
//die();
 if(!isset($_SESSION['dnige'])){
     header("location:index.php");
    }

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
 
 
   <?php
     
     include('header.php');

   ?>





<section class="container text-center">
    
        <div class="border border-secondary ">
        <h1> acceso exclusivo para CLIENTES</h1>
        <h2> BIENVENIDO/A SR/A CLIENTE !!!!</h2>
    </div>
   
    
    
</section>






<?php
  include('footer.php');
?>
 
 <script src="bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>