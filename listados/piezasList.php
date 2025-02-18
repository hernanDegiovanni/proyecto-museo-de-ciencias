<?php

require_once "retriction.php";
 require_once "../conexion.php";

// Consulta para obtener la información necesaria
$sql = "SELECT pieza.* ,donante.nombre ,donante.apellido FROM pieza,donante where (donante.idDonante=pieza.Donante_idDonante )";

   $result=mysqli_query($conex,$sql);

 ?>

<html>
 <body> 
 <?php
      include_once('../head.php');
      include_once('../header.php');


if(isset($_SESSION['dniadmin']))  {
  ?>
<section class="container text-center listado">
    
        
        <h2> Menú del Administrador </h2>
        <a class="btn btn-success btn-lg mb-2 " href="usuariosList.php"  role="button">usuarios</a>
        <a class="btn btn-success btn-lg mb-2 " href="piezasList.php"     role="button">piezas</a>
        <a class="btn btn-success btn-lg mb-2 " href="../formularios/form_agregar.php"  role="button">AGREGAR PIEZA</a>
        <a class="btn btn-success btn-lg mb-2 " href="../formularios/form_registro.php"  role="button">AGREGAR usuario</a>
        <a class="btn btn-success btn-lg mb-2 " href="../formularios/eventos.php"  role="button">cargar evento</a>
   
</section>


<?php
}else if(isset($_SESSION['dnige'])){

?>
<section class="container text-center listado">
    
    
        
        <h2> Menú de Gerente </h2>
     
        <a class="btn btn-success btn-lg mb-2 " href="piezasList.php"     role="button">piezas</a>
            
        <a class="btn btn-success btn-lg mb-2 " href="../formularios/form_agregar.php"     role="button">AGREGAR PIEZA</a>
        <a class="btn btn-success btn-lg mb-2 " href="../formularios/eventos.php"  role="button">Cargar evento</a>
        
   
</section>

<?php

}

?>
    <section>
     
    <div class="container text-center listado" >
        <div class="text-center mt-5 mb-3 border border-secondary"><h3>Listado de piezas</h3></div>

        
        
        <table class="table table-striped table-hover">
           
            <thead>
                <tr>
                <th scope="col">N° </th>
                <th scope="col">Estado</th>
                <th scope="col">Fecha de Ingreso</th>
                <th scope="col">Cantidad</th>
                <th scope="col">Clasificación</th>
                <th scope="col">Donante</th>
            
                <th scope="col">Acción</th>
                </tr>
            </thead>
            <?php
               if (mysqli_num_rows($result)>0){
            ?>
        
            <tbody>

                
                    <?php

                    While ($fila=mysqli_fetch_array($result)){

                    ?>
                    <tr>
                        
                        <td><?=$fila['num_inventario']; ?></td>
                        <td><?=$fila['estado_conservacion']; ?></td>
                        <td><?=$fila['fecha_ingreso']; ?></td>
                        <td><?=$fila['cantidad_de_piezas']; ?></td>
                        <td><?=$fila['clasificacion']; ?></td>
                        <td><?=$fila['nombre'] . ' ' . $fila['apellido']; ?></td>
                        
                        <td>

                            <div class="d-sm-inline-block">
                                <form action="../formularios/form_editar.php" method="post">
                                <input type="hidden" name="id" value="<?=$fila['idPieza'];?>">
                                <button class="btn btn-outline-success btn-sm" type="submit" name="btneditar" id="btneditar">Editar      
                                </button></form></div>

                            <div class="d-sm-inline-block">
                                <form action="../formularios/form_eliminar.php" method="post">
                                <input type="hidden" name="id" value="<?=$fila['idPieza'];?>">
                                <button class="btn btn-outline-danger btn-sm" type="submit" name="btnborrar" id="btnborrar">Borrar
                                </button></form></div>
                            
                            <div class="d-sm-inline-block">
                                <form action="../formularios/detallesLisPI.php" method="post">
                                <input type="hidden" name="id" value="<?=$fila['idPieza'];?>">
                                <button class="btn btn-outline-success btn-sm" type="submit" name="btnver" id="btnver">ver
                                </button></form></div>
                        
                            </td>
                        
                    </tr>
                    <?php
            }
            ?>  
        </tbody>
    </table>
    </div>
	  
    <?php
	     }else{

          echo "</table></div>";
          echo "<div class='container text-center lead my-3 py-3'><div class='alert alert-danger my-5 py-4'><p><em>No existen piezaz! </em><a href='index.php' class='text-primary lead ms-2'>Volver</a></p></div></div>";
         }
         
	   ?>  
    
    
    </section>    
    <?php
     include_once('../footer.php');
    ?>
   <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
 </body> 


 </html>



