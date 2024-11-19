<?php

require_once "../conexion.php";

$id=$_POST["idPieza"];
/* En la Base de Datos en Vista de Relaciones de la Tabla ficha, aplicar 
el atributo ON Cascade Delete para la relacion entre ficha y socios */
// Iniciar transacción
$conex->begin_transaction();

try {
    // Borrar de las subcategorías
    $conex->query("DELETE FROM arqueologia WHERE Pieza_idPieza  = $id");
    $conex->query("DELETE FROM botanica WHERE Pieza_idPieza  = $id");
    $conex->query("DELETE FROM geologia WHERE Pieza_idPieza  = $id");
    $conex->query("DELETE FROM ictiologia WHERE Pieza_idPieza  = $id");
    $conex->query("DELETE FROM oología WHERE Pieza_idPieza  = $id");
    $conex->query("DELETE FROM osteologia WHERE Pieza_idPieza  = $id");
    $conex->query("DELETE FROM paleontologia WHERE Pieza_idPieza  = $id");
    $conex->query("DELETE FROM zoologia WHERE Pieza_idPieza  = $id");


    // Finalmente, borrar de la tabla pieza
    $conex->query("DELETE FROM pieza WHERE 	idPieza = $id");

    // Confirmar transacción
    $conex->commit();
    echo "Registro eliminado exitosamente.";
} catch (Exception $e) {
    // Si hay un error, revertir la transacción
    $conex->rollback();
    echo "Error al eliminar el registro: " . $e->getMessage();
}

// Cerrar conexión
$conex->close();

//die($sql);
//echo $sql;mysqli_query($conex,$sql);



header("Location:../listados/piezasList.php");

?>