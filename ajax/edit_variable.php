<?php
include($_SERVER['DOCUMENT_ROOT'].'/Diccionario/ajax/validarSesion.php');
$id = $_GET["id"];
$val = $_GET["val"];
$tmp = explode(",",$id);
$variable =$tmp[1];
$servicio =$tmp[2];

$resp = editvariable2($variable,$servicio,$val);
if($resp != null){
	escribir("editvariable_OK", $query . " OK $id,$atr,$val ".$resp);
	$extra = 'variable.php?ok=1';
}else{
	escribir("editvariable_Error", $query . " $id,$atr,$val".$resp);
	$extra = 'variable.php?ok=0';
}

?>
