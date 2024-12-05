<?php
session_start();
require_once "../conexion.php";

// Verificar si el formulario ha sido enviado y si existe el idUsuario en el POST

    $id = $_POST['idUsuario'];

    // Iniciar transacción
    $conex->begin_transaction();

   
        // Borrar de la tabla usuario
        $query = "DELETE FROM usuario WHERE idUsuario = ?";
        $stmt = $conex->prepare($query);
        $stmt->bind_param("i", $id); // "i" indica que el parámetro es un entero
        $stmt->execute();
        $stmt->close();

        // Confirmar la transacción
        $conex->commit();

        // Redirigir con mensaje de éxito
        header("Location: ../listados/usuariosList.php?msje=ok");
        exit;
   
?>
