<?php
session_start();

require_once "../conexion.php";

$error="";



if(!empty($_POST['dni']) && !empty($_POST['clave'])){
	
    

  
        
        
        $dni= $_POST['dni'];
        $clave = $_POST['clave'];
       

           



            $sql="SELECT dni,clave,tipo_de_usuario,nombre,apellido FROM usuario where(dni='$dni') ";

            $result=mysqli_query($conex,$sql);
      

            if (mysqli_num_rows($result)>0){
          //die($dni);
                   $fila=mysqli_fetch_array($result);
               

               if (password_verify($clave, $fila['clave'])) {
                    if ($fila['tipo_de_usuario']=="Gerente"){

                          $_SESSION['dnige']=$fila['dni'];
                      //  echo $_SESSION['dnige'];
                        //die();
                          $_SESSION['nombreGe']=$fila['nombre'];
                          $_SESSION['apellidoGe']=$fila['apellido'];
                          $_SESSION['tipousu']=$fila['tipo_de_usuario'];               

                          header("Location:gerente.php");

                    }else if($fila['tipo_de_usuario']=="administrador"){

                          $_SESSION['dniadmin']=$fila['dni'];
                          $_SESSION['nombreadmin']=$fila['nombre'];
                          $_SESSION['apellidoadmin']=$fila['apellido'];
                          $_SESSION['tipousu']=$fila['tipo_de_usuario'];               
          
                            header("Location:../listados/menu.php");

                  }
                  }
                } else{   
          
      $error.="error en la insercion de datos ";
      header("Location:form_ingresar.php?mensaje=".$error);

      }}else{


  	$error.="Faltan Datos ";
	header("Location:form_ingresar.php?mensaje=".$error);
  
}
	

?> 

