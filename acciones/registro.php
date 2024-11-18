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