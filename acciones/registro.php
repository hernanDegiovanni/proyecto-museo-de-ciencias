<?php


require_once "../conexion.php";

require_once "validarregistro.php";


$error = "";


if(!empty($_POST['dni']) && !empty($_POST['nombre']) && 
   !empty($_POST['apellido']) && !empty($_POST['email']) && !empty($_POST['clave'])){
	
    

  	if (Validacion()){
        
        
        $dni= $_POST['dni'];
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
   
           
            $email = $_POST['email'];
            $clave = password_hash($_POST['clave'],PASSWORD_DEFAULT);
            $fecha =date("Y/m/d");
            $tipo_de_usuario=$_POST['tipo_de_usuario'];



                    // Validar si el número de inventario ya existe en la base de datos
                    $sql_check = "SELECT COUNT(*) FROM usuario WHERE dni = '$dni'";
                    $result = $conex->query($sql_check);
                    
                    if ($result) {
                        $row = $result->fetch_row();
                        $count = $row[0];

                        // Si el número de inventario ya existe
                        if ($count > 0) {
                            $error = "Error: El número de DNI: '$dni' ya existe en la base de datos.";
                            header("Location: ../formularios/form_agregar.php?msje=" . $error);
                            exit;
                        }
                    } else {
                        $error = "Error al verificar DNI en la base de datos.";
                        header("Location: ../formularios/form_agregar.php?msje=" . $error);
                        exit;
                    }


            $sql="INSERT INTO usuario(dni,nombre,apellido,email,clave,fecha_alta,tipo_de_usuario) VALUES('$dni','$nombre','$apellido','$email','$clave','$fecha','$tipo_de_usuario')";

            $result=mysqli_query($conex,$sql);
            //die($sql);

            if ($result){

        header("Location:../formularios/form_registro.php?mensaje=ok");
           
     }else{ 

      $error.="error en la insercion de datos ";
      header("Location:../formularios/form_registro.php?mensaje=".$error);
      }
        }else{
  		 
      header("Location:../formularios/form_registro.php?mensaje=".$error);

  	 }

  }else{


  	$error.="Faltan Datos ";
	header("Location:../formularios/form_registro.php?mensaje=".$error);
  
}
	

?>