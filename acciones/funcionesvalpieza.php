<?php

function ValidacionPieza() {
    global $error;  // Para acumular los errores
    $var_bool = TRUE;  // Variable que indica si la validación fue exitosa

    // Validación de los campos
    if(!is_numeric(strval($_POST['num_inventario']))){
        $error .= "Error: num_inventario no es válido. ";
        $var_bool = FALSE;
    }

 

    if(!is_numeric($_POST['cantidad_de_piezas']) || !filter_var($_POST['cantidad_de_piezas'], FILTER_VALIDATE_INT)){
        $error .= "Error: cantidad_de_piezas debe ser un número entero. ";
        $var_bool = FALSE;
    }



   

    return $var_bool;
}
                                 


function validar_alfanumerico($cadena) {
    global $error;  // Para acumular los errores
    $var_bool = TRUE;  // Variable que indica si la validación fue exitosa

    // Aceptar solo letras (mayúsculas y minúsculas), comas (,) y puntos (.)
    if (!preg_match("/^[a-zA-Z.,\s]+$/", $cadena)) {
        $error .= "Error: la cadena '$cadena' no es válida. Solo se permiten letras, comas y puntos. "; 
        $var_bool = FALSE;  // Si no pasa la validación, asignar FALSE
    }

    return $var_bool;
}

?>

