<header>
            

       <!-- Menú de Navegación -->  
      <nav class="navbar navbar-expand-md navbar-light bg-light ">
      <div class="container-fluid">
    
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <?php 
        if(!isset($_SESSION['dnige']) && !isset($_SESSION['dniadmin']) ){ 
          ?>

          <ul class="navbar-nav">
          <li class="nav-item titulo">
             <a class="navbar-brand" href="#">
            <img src="imagenes/bug-fill.svg"  href="index.php" alt="Bootstrap" width="30" height="24"> "MUSEO DE LA CIUDAD"
            </a>
        </li>
        
         </ul>
          
         <ul class="navbar-nav ms-auto">

              <li class="nav-item">
              <a class="nav-link" href="#">Novedades</a>
              </li>
          <li class="nav-item"> 
            <a class="nav-link" data-bs-toggle="modal" data-bs-target="#ingresar" >Ingresar</a>
            
          </li>
          <li class="nav-item"> 
            <a class="nav-link" data-bs-toggle="modal" data-bs-target="#contacto" >Contactanos</a>
            
          </li>
          
          
         </ul>
         <?php
         
        }else if(isset($_SESSION['dnige']))  {
        
        ?>
         <ul class="navbar-nav">
      	<li class="nav-item">
          <a class="nav-link" href="./listados/menu.php">GERENTE</a>
        </li>
       </ul>
        
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
           <a class="nav-link" href="../index.php">inicio</a>
          </li>	
          <li class="nav-item">
           <a href="" class="nav-link"> <?php echo  $_SESSION['nombreGe']. $_SESSION['apellidoGe'] ?></a>
          </li>	
          <li class="nav-item">
           <a class="nav-link" href="../acciones/salir.php">SALIR</a>
          </li> 
       </ul>

       <?php 
        }else if(isset($_SESSION['dniadmin'])) { 

       ?>

      <ul class="navbar-nav">
      	<li class="nav-item">
          <a class="nav-link" href="./listados/menu.php">ADMINISTRADOR</a>
        </li>
   
      </ul>
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
           <a class="nav-link" href="../index.php">inicio</a>
          </li>	
          <li class="nav-item">
           <a href="" class="nav-link"> <?php echo  $_SESSION['nombreadmin']." ". $_SESSION['apellidoadmin'] ?></a>
          </li>	
          <li class="nav-item">
            <a class="nav-link" href="../acciones/salir.php">SALIR</a>
          </li>	
        
       </ul>

       <?php
        }

       ?>

     
      </div>
      </div>
      </nav>       
</header>
    
    