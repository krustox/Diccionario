<?php
include($_SERVER['DOCUMENT_ROOT'].'/Diccionario/ajax/validarSesion.php');
$id = $_POST["id"];
$display = trim($_POST["display_tipo"]);
$fabricante = $_POST["fabricante"];
$resp = edittipo($id,$display,$fabricante);
if($resp >0){
	escribir("edittipo_OK", $query . " OK ".$resp);
	$extra = 'tipo.php?ok=1';
}else{
	escribir("edittipo_Error", $query . " ".$resp);
	$extra = 'tipo.php?ok=0';
}
header("Location: http://$host$uri/$extra");
?>
