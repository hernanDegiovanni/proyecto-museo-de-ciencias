<header>
            

       <!-- Menú de Navegación -->  
      <nav class="navbar navbar-expand-md navbar-light nav ">
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
                <img src="../imagenes/bug-fill.svg"  href="index.php" alt="Bootstrap" width="30" height="24"> "MUSEO DE LA CIUDAD"
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
         <?php
         
        }else if(isset($_SESSION['dnige']))  {
        
        ?>
         <ul class="navbar-nav">
      	<li class="nav-item titulo">
        <a class="navbar-brand" href="#">
                <img src="../imagenes/bug-fill.svg"  href="index.php" alt="Bootstrap" width="30" height="24"> "Gerente"
                </a>
        </li>
       </ul>
        
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
           <a class="nav-link a" href="../index.php">inicio</a>
          </li>	
          <li class="nav-item">
           <a href="#" class="nav-link a"> <?php echo  $_SESSION['nombreGe']. $_SESSION['apellidoGe'] ?></a>
          </li>	
          <li class="nav-item">
           <a class="nav-link a" href="../acciones/salir.php">SALIR</a>
          </li> 
       </ul>

       <?php 
        }else if(isset($_SESSION['dniadmin'])) { 

       ?>

      <ul class="navbar-nav">
      	<li class="nav-item titulo">
        <a class="navbar-brand" href="#">
                <img src="../imagenes/bug-fill.svg"  href="index.php" alt="Bootstrap" width="30" height="24"> "Administrador"
                </a>
        </li>
   
      </ul>
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
           <a class="nav-link a" href="../index.php">Inicio</a>
          </li>	
          <li class="nav-item">
           <a href="" class="nav-link" a> <?php echo  $_SESSION['nombreadmin']." ". $_SESSION['apellidoadmin'] ?></a>
          </li>	
          <li class="nav-item">
            <a class="nav-link a" href="../acciones/salir.php">SALIR</a>
          </li>	
        
       </ul>

       <?php
        }

       ?>

     
      </div>
      </div>
      </nav>       
</header>
    
    