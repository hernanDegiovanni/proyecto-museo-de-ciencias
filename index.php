<?php
session_start();
if(isset($_SESSION['dnige']) && isset($_SESSION['dniadmin'])){
  header("location:./listados/menu.php");
} 
?>

<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1"> 
      <title>museo</title>
      <link rel="stylesheet" href="estilo.css">
      <link rel="stylesheet" href="recursos/css/bootstrap.min.css">
      <link rel="stylesheet" href="recursos/css/style.css">
      <link rel="stylesheet" href="recursos/css/responsive.css">
      <link rel="icon" href="images/fevicon.png" type="image/gif" />
      <link rel="stylesheet" href="recursos/css/jquery.mCustomScrollbar.min.css">
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
   </head>
   
   <body class="main-layout">

      <div class="loader_bg">
         <div class="loader"><img src="imagenes/loading.gif" alt="#" /></div>
      </div>
   
      <?php
     
        include('header.php');
        include('formularios/form_ingresar.php');
       ?>
      <section class="banner_main">
         <div id="banner1" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
               <li data-target="#banner1" data-slide-to="0" class="active"></li>
               <li data-target="#banner1" data-slide-to="1"></li>
               <li data-target="#banner1" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
               <div class="carousel-item active">
                  <div class="container">
                     <div class="carousel-caption">
                        <div class="text-bg">
                           <h1> <span class="blu">Bienvenido <br></span>Museo de la Ciudad de San Cristobal</h1>
                           <figure><img src="imagenes/museo2.jpg" alt="#"/></figure>
                         
                        </div>
                     </div>
                  </div>
               </div>
               <div class="carousel-item">
                  <div class="container">
                     <div class="carousel-caption">
                        <div class="text-bg">
                           <h1> <span class="blu">Welcome <br></span>To Our Sunglasses</h1>
                           <figure><img src="imagenes/cabezaderex.jpg" alt="#"/></figure>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="carousel-item">
                  <div class="container">
                     <div class="carousel-caption">
                        <div class="text-bg">
                           <h1> <span class="blu">Welcome <br></span>To Our Sunglasses</h1>
                           <figure><img src="imagenes/nose.jpg" alt="#"/></figure>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <a class="carousel-control-prev" href="#banner1" role="button" data-slide="prev">
            <i class="fa fa-arrow-left" aria-hidden="true"></i>
            </a>
            <a class="carousel-control-next" href="#banner1" role="button" data-slide="next">
            <i class="fa fa-arrow-right" aria-hidden="true"></i>
            </a>
         </div>
      </section>
      <!-- para eventos-->
      <div class="about">
         <div class="container">
            <div class="row d_flex">
               <div class="col-md-5">
                  <div class="about_img">
                     <figure><img src="imagenes/evento.jpg" alt="#"/></figure>
                  </div>
               </div>
               <div class="col-md-7">
                  <div class="titlepage">
                     <h2>Titulo de evento</h2>
                     <p>descripcion de evento .</p>
                  </div>
                  <a class="read_more" href="#">nose</a>
               </div>
            </div>
         </div>
      </div>
      <!-- about section -->
      <!-- Our  Glasses section -->
      <div class="glasses">
               <div class="col-md-10 offset-md-1">
                  <div class="titlepage">
                     <h2>Clasificasiones Que Puedes Encontrar en Nuestro Museo</h2>
                     <p>Aqui puedes encontrar toda la informacion breve sobre que estudia cada rama que puedes encontrar en nuestro museo de cienscias 
                     </p>
                     
                  </div>
               </div>
      </div>
                      <?php
                        
                        include('cartas.php');

                      ?>

   

<footer>
    <h3>Siguenos en nuestras redes sociales:</h3>
    <div class="redes_sociales">
      <a href="https://facebook.com"><img src="imagenes/facebook.png" alt="facebook"  ></a>
      <a href="https://whatsapp.com"><img src="imagenes/whatsapp.png" alt="whatsapp"  ></a>
      <a href="https://instagram.com"><img src="imagenes/instagram.png" alt="instagram"  ></a> 
     </div>
   </footer>
      <!-- end footer -->
      <!-- Javascript files-->
      <script src="recursos/js/jquery.min.js"></script>
      <script src="recursos/js/popper.min.js"></script>
      <script src="recursos/js/bootstrap.bundle.min.js"></script>
      <script src="recursos/js/jquery-3.0.0.min.js"></script>
      <!-- sidebar -->
      <script src="recursos/js/jquery.mCustomScrollbar.concat.min.js"></script>
      <script src="recursos/js/custom.js"></script>
    
   </body>
</html>


   