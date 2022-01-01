<?php
include($_SERVER['DOCUMENT_ROOT'].'/Diccionario/ajax/validarSesion.php');
$id = $_POST["id"];
$display = trim($_POST["display_metrica"]);
$componente = $_POST["componente"];
$resp = editmetrica($id,$display,$componente);
if($resp >0){
	escribir("editmetrica_OK", $query . " OK ".$resp);
	$extra = 'metrica.php?ok=1';
}else{
	escribir("editmetrica_Error", $query . " ".$resp);
	$extra = 'metrica.php?ok=0';
}
header("Location: http://$host$uri/$extra");
?>
