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
 
<header>
      <!-- Menú de Navegación -->  
      <nav class="navbar navbar-expand-md navbar-light nav">
      <div class="container-fluid">
    
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav"> 
          <ul class="navbar-nav">
          <li class="nav-item titulo">
                <a class="navbar-brand" href="#">
                <img src="./imagenes/bug-fill.svg"  href="index.php" alt="Bootstrap" width="30" height="24"> "MUSEO DE LA CIUDAD"
                </a>
           </li>
         </ul>
          
         <ul class="navbar-nav ms-auto">
         <li class="nav-item"> 
            <a class="nav-link a" data-bs-toggle="modal" data-bs-target="#ingresar" type="button">Ingresar</a>
            
          </li>
          <li class="nav-item"> 
            <a class="nav-link a"  href="#contacto" >Contactanos</a>
            
          </li>
          
         </ul>
      </div>
      </div>
      </nav>       
</header>
    
    
 
   <?php
     include('formularios/form_ingresar.php');
   ?>
      
    
   <!-- Inicio --> 


   <!-- Inicio pibe --> 

   
   
  <section style=" margin-bottom: 40px" >
   
  <div id="carouselExampleCaptions" class="carousel slide" id="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner" >
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
      </div>
    </div>
    <div class="carousel-item">
      <img src="imagenes/nose.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
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
 
 <section class="text-center">
  <!-- Contenedor principal centrado -->
  <div class="d-flex justify-content-center align-items-center" >
    <div class="card mb-3" style="max-width: 90%;  background-color:#20881746; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.384); "> <!-- Ajusta el valor de 20px -->
      <?php if ($evento): ?>
        <div class="row g-0">
          <div class="col-md-4">
            <img src="imagenes/<?php echo ($evento['archivoimagen'] ?? 'default.jpg'); ?>" alt="Imagen del evento" class="img-fluid rounded-start" style="max-width: 100%; height: auto;">
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h2 class="card-title letraeventos" style="border-radius: 8px; background-color: rgba(20, 119, 53, 0.6);">
                <?php echo ($evento['titulo']); ?>
              </h2>
              <p class="card-text"><?php echo nl2br(htmlspecialchars($evento['texto'])); ?></p>
              <p class="card-text"><strong>Fecha:</strong> <?php echo ($evento['fecha']); ?></p>
              <p class="card-text"><strong>Dirección:</strong> <?php echo ($evento['direccion']); ?></p>
            </div>
          </div>
        </div>
      <?php else: ?> 
        <p>No hay eventos cargados aún.</p>
      <?php endif; ?>
    </div>
  </div>
</section>



 
  <?php
     
     include('cartas.php');

   ?>
<footer id="contacto">
  <div class="row main-green" >
  <div class="col-12">
    <div class="row">
    <div class="col-12">
  <div class="tres-columnas-new row">
  
  <div class="col-1 col-md-1 ">
    
  </div>   
  
  <div class="text-center">
    <div class="data-container">
      <!-- COMPLETAR CON LOS DATOS CORRESPONDIENTES "<H3>" PARA TITULO, "<P>" PARA INFORMACION Y "<BR>" EN CASO DE QUE SE QUIERA UN SALTO DE LINEA-->
      <h2>CONTACTO</h2>
      <p> <b>Dirección | Address</b> </p>
      <p> - Hipólito Yrigoyen  800 - </p>
      <p>San Cristóbal - Santa Fe - Argentina </p>

      
      
    </div>
    
  </div>
  
    <div class="contact-container" >

      
      <a  href="https://www.facebook.com/sancristobal.gob.ar"><img src="imagenes/facebook.png" alt="facebook"  ></a>
      <a href="https://whatsapp.com"><img src="imagenes/whatsapp.png" alt="whatsapp"  ></a>
      <a href="https://instagram.com"><img src="imagenes/instagram.png" alt="instagram"  ></a> 
    

    </div>

    
</div>

</div>
  </div>
  </div>
</div>

   </footer>


   
   <script src="bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>