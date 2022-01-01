<?php
include($_SERVER['DOCUMENT_ROOT'].'/Diccionario/ajax/validarSesion.php');
$id = $_POST["id"];
$display = trim($_POST["display_componente"]);
$producto = $_POST["producto"];
$resp = editcomponente($id,$display,$producto);
if($resp >0){
	escribir("editcomponente_OK", $query . " OK ".$resp);
	$extra = 'componente.php?ok=1';
}else{
	escribir("editcomponente_Error", $query . " ".$resp);
	$extra = 'componente.php?ok=0';
}
header("Location: http://$host$uri/$extra");
?>
