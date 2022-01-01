<?php
include($_SERVER['DOCUMENT_ROOT'].'/Diccionario/ajax/validarSesion.php');
$id = $_POST["id"];
$display = trim($_POST["display_producto"]);
$tipo = $_POST["tipo"];
$resp = editproducto($id,$display,$tipo);
if($resp >0){
	escribir("editproducto_OK", $query . " OK ".$resp);
	$extra = 'producto.php?ok=1';
}else{
	escribir("editproducto_Error", $query . " ".$resp);
	$extra = 'producto.php?ok=0';
}
header("Location: http://$host$uri/$extra");
?>
