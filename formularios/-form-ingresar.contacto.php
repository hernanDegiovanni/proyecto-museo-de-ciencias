<!-- vebtana de ingreso --> 

<div class="modal fade" id="ingresar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content ingresar">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Ingresar de usuarios</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="acciones/ingresar.php" method="post">
          <div class="mb-3">
            <label for="dni" class="col-form-label">* DNI USURIO</label>
            <input type="text" class="form-control" name="dni" id="dni" placeholder="Ingresa DNI de 8 dígitos">
          </div>
          <div class="mb-3">
            <label for="clave" class="col-form-label">* Contraseña</label>
            <input type="password" class="form-control" name="clave" id="clave" placeholder="Ingresa una contraseña de 8 caracteres como mínimo">
          </div>

          <div class="modal-footer col-12 text-center" >
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">salir</button>
        <button type="submit" class="btn btn-primary" name="btn_ingresar" id="btn_ingresar">ingresar</button>
      </div>
        </form>
        <!-- el mensage no salta HAY QUE SOLUCIONARLO -->
         <?php
         if (isset($_GET["mensaje"])){
 
          if($_GET["mensaje"]!="ok"){
 
          echo "<div class='text-center mt-4 mb-5'><div class='alert alert-danger' role='alert'><strong>".$_GET["mensaje"]."</strong></div></div>"; 
           
        }else{
 
                  
         echo "<div class='text-center mt-4 mb-5'><div class='alert alert-success' role='alert'><strong>Datos agregados exitosamente!</strong></div></div>";  
        
        }  
      } 
   ?> 
      </div>

      
    </div>
  </div>

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