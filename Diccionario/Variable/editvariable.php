<?php
include($_SERVER['DOCUMENT_ROOT'].'/Diccionario/ajax/validarSesion.php');
$id = $_POST["id"];
$display = trim($_POST["display_variable"]);
$metrica = $_POST["metrica"];

$descripcion = trim($_POST["display_descripcion"]);
$unidad = trim($_POST["display_unidad"]);
$frecuencia = trim($_POST["display_frecuencia"]);

$resp = editvariable($id,$display,$metrica,$descripcion,$unidad,$frecuencia);
if($resp >0){
	escribir("editvariable_OK", $query . " OK $id,$display,$metrica,$descripcion,$unidad,$frecuencia".$resp);
	$extra = 'variable.php?ok=1';
}else{
	escribir("editvariable_Error", $query . " $id,$display,$metrica,$descripcion,$unidad,$frecuencia".$resp);
	$extra = 'variable.php?ok=0';
}
header("Location: http://$host$uri/$extra");
?>
