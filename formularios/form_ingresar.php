<!-- vebtana de ingreso --> 

<div class="modal fade" id="ingresar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content ingresar">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Ingresar de usuarios</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
        <!-- Alerta de error -->
        <?php if(isset($_GET['mensaje']) && !empty($_GET['mensaje'])): ?>
          <div class="alert alert-danger" role="alert">
            <?php echo htmlspecialchars($_GET['mensaje']); ?>
          </div>
        <?php endif; ?>
        <form action="acciones/ingresar.php" method="post">
          <div class="mb-3">
            <label for="dni" class="col-form-label">* DNI USURIO</label>
            <input type="text" class="form-control" name="dni" id="dni" maxlength="8" pattern="\d{8}" placeholder="Ingresa DNI de 8 dígitos">
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
      </div>

      
    </div>
  </div>

</div>