<?php
session_start();

// Conexion a la BD
require_once "../conexion.php";

	$error = "";
  $id = $_POST["idUsuario"];

 
   
 
     if (!empty(trim($_POST['nombre'])) && !empty(trim($_POST['dni'])) && !empty(trim($_POST['fecha_alta'])) && !empty(trim($_POST['apellido'])) && !empty(trim($_POST['email'])) && !empty(trim($_POST['tipo_de_usuario']))) {
 
         $dni = mysqli_real_escape_string($conex, $_POST['dni']);
         $nombre = mysqli_real_escape_string($conex, $_POST['nombre']);
         $apellido = mysqli_real_escape_string($conex, $_POST['apellido']);
         $email = mysqli_real_escape_string($conex, $_POST['email']);
         $fecha = mysqli_real_escape_string($conex, $_POST['fecha_alta']);
         $tipo_de_usuario = mysqli_real_escape_string($conex, $_POST['tipo_de_usuario']);


            // Verifica si la contraseña fue ingresada, si no se deja la anterior
            if (!empty($_POST['clave'])) {
                $clave = password_hash($_POST['clave'], PASSWORD_DEFAULT);
                $sql = "UPDATE usuario SET dni='$dni', nombre='$nombre', apellido='$apellido', email='$email', clave='$clave', fecha_alta='$fecha_alta', tipo_de_usuario='$tipo_de_usuario' WHERE idUsuario=$id";
            } else {
                // Si no se ingresa nueva contraseña, se omite la actualización de la clave
                $sql = "UPDATE usuario SET dni='$dni', nombre='$nombre', apellido='$apellido', email='$email', fecha_alta='$fecha_alta', tipo_de_usuario='$tipo_de_usuario' WHERE idUsuario=$id";
            }

 
         // Validación del correo electrónico
         if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
             $error .= "Correo electrónico no válido. ";
             header("Location:form_editarUsu.php?msje=" . $error);
             exit;
         }
 
         // Se arma la sentencia SQL de Actualización
         $sql = "UPDATE usuario SET dni='$dni', nombre='$nombre', apellido='$apellido', email='$email', clave='$clave', fecha_alta='$fecha', tipo_de_usuario='$tipo_de_usuario' WHERE idUsuario=$id";
 
         if ($conex->query($sql) === TRUE) {
            // Mensaje de éxito, se pasa en la URL
            header("Location: ../formularios/form_editarUsu.php?msje=Actualización exitosa.");
            exit;
        } else {
            // Error en la consulta SQL
            $error = "Error en la consulta SQL: " . mysqli_error($conex);
            header("Location: ../formularios/form_editarUsu.php?msje=" . urlencode($error));
            exit;
        }
    
    } else {
        // Si falta algún dato
        $error = "Faltan Datos.";
        header("Location: ../formularios/form_editarUsu.php?msje=" . urlencode($error));
        exit;
    }

 

?>