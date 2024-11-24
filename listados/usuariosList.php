<?php

require_once "../conexion.php";

$sql="SELECT * FROM usuario";

$result=mysqli_query($conex,$sql);

 ?>


 <!DOCTYPE html>
 <html lang="es">
 
 <body>        
 <?php
          include_once('../head.php');
     include_once('menu.php');

   ?>
    <section>
     
    <div class="container text-center">
        <div class="text-center mt-5 mb-3 border border-secondary"><h3>Listado de usuarios</h3></div>

        
        
        <table class="table table-striped table-hover border border-secondary">
           
            <thead>
                <tr>
                <th scope="col">nombre y apellido</th>
                <th scope="col">email</th>
                <th scope="col">fecha alta </th>
                <th scope="col">dni</th>
                <th scope="col">tipo</th>
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
                    
               <td><?=$fila['nombre'] . ' ' . $fila['apellido']; ?></td>
               <td><?=$fila["email"] ?></td>
               <td><?=$fila["fecha_alta"]; ?></td>
               <td><?=$fila["dni"]; ?></td>
               <td><?=$fila["tipo_de_usuario"];?></td>
              

               <td>
               <div class="d-sm-inline-block"><form action="../formularios/form_editarUsu.php" method="post">
		          <input type="hidden" name="idUsuario" value="<?php echo $fila['idUsuario'];?>">
		          <button class="btn btn-outline-success btn-sm" type="submit" name="btneditar" id="btneditar">Editar</button></form></div>
               <div class="d-sm-inline-block"><form action="../formularios/form_eliUsu.php" method="post">
		          <input type="hidden" name="idUsuario" value="<?php echo $fila['idUsuario'];?>">
		          <button class="btn btn-outline-danger btn-sm" type="submit" name="btnborrar" id="btnborrar">Borrar</button></form></div>
                
                </td>
            </tr>
                

            <?php
            }
            ?>         
            
            </tbody>
      
       </table></div>
	   <?php
	     }else{

          echo "</table></div>";
          echo "<div class='container text-center lead my-3 py-3'><div class='alert alert-danger my-5 py-4'><p><em>No existen productos! </em><a href='index.php' class='text-primary lead ms-2'>Volver</a></p></div></div>";
         }
	   ?>  
    
    
    </section>    
    <section class="container text-center">
    <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link" href="administrador.php">volver al inicio</a>
        </li>	
       </ul>
    </div>

        </section>

   
   
   <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
 </body> 
 <!--require_once "conexion.php";
if (isset($_POST['buscar']) && !empty($_POST['buscar'])){
    $valor=$_POST['buscar'];
    $sql="SELECT categoria.*, productos.* FROM categoria,productos where (categoria.id=productos.idCategoria) and productos.nombre like '%$valor%' ORDER BY Productos.idproducto";

    $result=mysqli_query($conex,$sql);

}else{ 


 $sql="SELECT categoria.*, productos.* FROM categoria,productos where (categoria.id=productos.idCategoria) ORDER BY Productos.idproducto";

 $result=mysqli_query($conex,$sql);
}-->
 </html>




 