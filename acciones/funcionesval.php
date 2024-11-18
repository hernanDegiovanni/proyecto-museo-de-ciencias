<?php

function ValidacionDatos() {

 global $error;

	$var_bool=TRUE;
    

	

	
	
	
	if(!is_numeric(strval($_POST['precio']))){
		$error.="Error precio ";
		$var_bool=FALSE;
	}
	
	if(!is_numeric($_POST['existencia']) || !filter_var($_POST['existencia'], FILTER_VALIDATE_INT)){
		$error.="Error existencia ";
		$var_bool=FALSE;
	}
	
	
	


	return $var_bool;
}

?>