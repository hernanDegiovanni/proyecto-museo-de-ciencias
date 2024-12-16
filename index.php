<?php
session_start();
if(isset($_SESSION['dnige']) && isset($_SESSION['dniadmin'])){
  header("location:./listados/menu.php");
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
    <link rel="stylesheet" href="estilo.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
</head>
<body>
 
 
   <?php
     
     include('header.php');
     include('formularios/form_ingresar.php');
   ?>
      
    
   <!-- Inicio --> 


   <!-- Inicio pibe --> 

   
   
  <section>
   
  <div id="carouselExampleCaptions" class="carousel slide">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="imagenes/museo2.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h3>Museo de la Ciudad de San Cristobal </h3>
        <p>cuidad de san cristobal</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="imagenes/museo2.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Second slide label</h5>
        <p>Some representative placeholder content for the second slide.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="imagenes/museo2.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Third slide label</h5>
        <p>Some representative placeholder content for the third slide.</p>
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

  </section>
 <section>
  <h2 class="letraeventos">EVENTOS
  </h2>
  <div>
    
  </div>

 </section>

 <section class="container-fluid">

 <?php
     
     include('cartas.php');

   ?>

</section>
  



   
   <script src="bootstrap/js/bootstrap.bundle.min.js"></script>

   <footer>
    <h3>Siguenos en nuestras redes sociales:</h3>
    <div class="redes_sociales">
      <a href="https://facebook.com"><img src="imagenes/facebook.png" alt="facebook"  ></a>
      <a href="https://whatsapp.com"><img src="imagenes/whatsapp.png" alt="whatsapp"  ></a>
      <a href="https://instagram.com"><img src="imagenes/instagram.png" alt="instagram"  ></a> 
     </div>

     <!-- ventana de contacto --> 

<div class="modal fade" id="contacto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content contacto">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Envianos tu mensaje</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form>
          <div class="mb-3">
            <label for="nombre" class="col-form-label">Nombre:</label>
            <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Ingresa tu Nombre">
          </div>
          <div class="mb-3">
          <label for="email" class="col-form-label">* Email</label>
         <input type="email" class="form-control" name="email" id="email" placeholder="Ingresa tu Correo Electrónico">
         </div>
          <div class="mb-3">
            <label for="text" class="col-form-label">Mensaje:</label>
            <textarea class="form-control" id="text" placeholder="Ingresa tu mensaje"></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Send message</button>
      </div>
    </div>
  </div>
</div>
   </footer>
   

</body>

</html>