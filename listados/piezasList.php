<?php

 require_once "../conexion.php";

// Consulta para obtener la información necesaria
$sql = "SELECT pieza.* ,donante.nombre ,donante.apellido FROM pieza,donante where (donante.idDonante=pieza.Donante_idDonante )";
/*$sql = "SELECT p.idPieza, p.num_inventario, p.estado_conservacion, p.fecha_ingreso, 
               p.cantidad_de_piezas, p.clasificacion, 
               d.nombre AS donante_nombre, d.apellido AS donante_apellido, 
               u.nombre AS usuario_nombre, u.apellido AS usuario_apellido
        FROM pieza p
        JOIN donante d ON p.Donante_idDonante = d.idDonante
        JOIN usuario_has_pieza up ON p.idPieza = up.Pieza_idPieza
        JOIN usuario u ON up.Usuario_idUsuario = u.idUsuario";*/

   $result=mysqli_query($conex,$sql);
 ?>
<html>
 <body> 
 <?php
      include_once('../head.php');
     include_once('menu.php');

   ?>

    <section>
     
    <div class="container text-center">
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
                                <form action="detalles_clasificacion.php" method="post">
                                <input type="hidden" name="id" value="<?=$fila['idPieza'];?>">
                                <button class="btn btn-outline-success btn-sm" type="submit" name="btneditar" id="btneditar">ver
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
    <section class="container text-center">
    <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link" href="piezasList.php">volver al inicio</a>
        </li>	
       </ul>
    </div>

        </section>


   
   <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
 </body> 


 </html>



