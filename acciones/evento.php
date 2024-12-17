<?php

// Conexion a la Base de Datos Biblioteca 

require_once "../conexion.php";








$error = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
if(!empty(trim($_POST['titulo'])) && !empty(trim($_POST['texto'])) && !empty(trim($_POST['fecha'])) && !empty(trim($_POST['direccion'])) &&  !empty(trim($_FILES['archivoimagen']['tmp_name']))){
	
 
	
         
		$titulo =$_POST['titulo'];
		
		$texto=$_POST['texto'];
		
        $fecha=$_POST['fecha'];

		$direccion=$_POST['direccion'];

         $archivoimagen=$_FILES['archivoimagen']['tmp_name'];

		if(getimagesize($archivoimagen)==true){ 

			$ruta="../imagenes/";

		 $nombrearch=basename($_FILES['archivoimagen']['name']);

		 move_uploaded_file($archivoimagen,$ruta.$nombrearch);

		 $sql="INSERT INTO evento(texto,fecha,direccion,titulo,archivoimagen) VALUES('$texto','$fecha','$direccion','$titulo','$nombrearch')";

		 $result=mysqli_query($conex,$sql);
	
		 if ($result){
			
         header("Location:../formularios/eventos.php?msje=ok");

        }else{ 
			$error.="error de insercion";
           header("Location:../formularios/eventos.php?msje=".$error);
     
        }

		 }else{
			echo "no es una imagen";
		 }

		 

        

        

       //die($sql);
		

	
	
 }else{

  	$error.="Faltan Datos ";
	header("Location:../formularios/eventos.php.php?msje=".$error);
  
}

} 
?>