<?php


/* 
$sql="SELECT * 
FROM zoologia, osteologia, ictiologia, arqueologia, botanica, geologia, octologia, paleontologia, pieza
WHERE (pieza.idPieza=zoologia.Pieza_idPieza) AND (pieza.idPieza=osteologia.Pieza_idPieza) AND (pieza.idPieza=ictiologia.Pieza_idPieza) AND (pieza.idPieza=arqueologia.Pieza_idPieza) AND (pieza.idPieza=botanica.Pieza_idPieza) AND (pieza.idPieza=geologia.Pieza_idPieza) AND (pieza.idPieza=octologia.Pieza_idPieza) AND (pieza.idPieza=paleontologia.Pieza_idPieza)";

$result=mysqli_query($conex,$sql); */

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
        <div class="text-center mt-5 mb-3 border border-secondary"><h3>Listado de geologia</h3></div>

        
        
        <table class="table table-striped table-hover border border-secondary">
           
            <thead>
                <tr>
                <th scope="col">N° de Inventario</th>
                <th scope="col">Nombre de Usuario</th>
                <th scope="col">Clasificación</th>
                <th scope="col">Existencia</th>
                <th scope="col">Fecha de Alta</th>
                <th scope="col">Imagen</th>
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
                    
               <th scope="row"><?php echo $fila["idProductonum_inventario"]; ?></th>
               <td><?=$fila["nombre"].["apellido"] ?></td>
               <td><?=$fila["clasificacion"]; ?></td>
               <td><?=$fila["cantidad_piezas"]; ?></td>
               <td><?php echo $fila["fecha_ingreso"]; ?></td>
               <td ><?php echo "<div class='listadoimg'><img src='./imagenes/".$fila['archivoimagen']."'></div>"; ?></td>

               <td>
               <div class="d-sm-inline-block"><form action="form_editar.php" method="post">
		          <input type="hidden" name="id" value="<?php echo $fila['idProducto'];?>">
		          <button class="btn btn-outline-success btn-sm" type="submit" name="btneditar" id="btneditar">Editar</button></form></div>
               <div class="d-sm-inline-block"><form action="form_eliminar.php" method="post">
		          <input type="hidden" name="id" value="<?php echo $fila['idProducto'];?>">
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

    <?php
    include('footer.php');
    ?>
   
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




