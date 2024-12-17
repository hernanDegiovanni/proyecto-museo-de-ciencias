<?php
require_once "conexion.php";

$sql="SELECT * FROM evento ORDER BY idEvent  DESC LIMIT 1;";

$result=mysqli_query($conex,$sql);
// Verificar si se encontró un evento
if ($result && mysqli_num_rows($result) > 0) {
    // Obtener el último evento
    $evento = mysqli_fetch_assoc($result);
} else {
    // Si no hay eventos
    $evento = null;
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

   
   
  <section style=" margin-bottom: 40px">
   
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
      <img src="imagenes/cabezaderex.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Second slide label</h5>
        <p>Some representative placeholder content for the second slide.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="imagenes/nose.jpg" class="d-block w-100" alt="...">
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
 <section class=" text-center">
  <div class="card mb-3" style="max-width: 70%;  background-color: rgba(235, 209, 67, 0.6);">

  <?php if ($evento): ?>
  <div class="row g-0">
    <div class="col-md-4">
    <img src="imagenes/<?php echo $evento['archivoimagen']; ?>" alt="Imagen del evento" class="img-fluid rounded-start"  style="width:100%; max-width:400px;"> 
    </div>
    <div class="col-md-8">
      <div class="card-body">
      <h2 class="card-title letraeventos" style="background-color: rgba(214, 214, 209, 0.603);"><?php echo $evento['titulo']; ?></h2>
        <p class="card-text"><?php echo nl2br(htmlspecialchars($evento['texto'])); ?></p>
        <p class="card-text"><strong>Fecha:</strong><?php echo $evento['fecha']; ?></p>
        <p class="card-text"><strong>Dirección:</strong> <?php echo $evento['direccion']; ?></p>
        <?php else:?> 
            <p>No hay eventos cargados aún.</p>
        <?php endif; ?>
      </div>
    </div>
  </div>
</div>


 </section>
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
   <script src="bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>