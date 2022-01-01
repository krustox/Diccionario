<?php
include($_SERVER['DOCUMENT_ROOT'].'/Diccionario/ajax/validarSesion.php');
$id = $_POST["id"];
$display = trim($_POST["display_fabricante"]);
$resp = editFabricante($id,$display);
if($resp > 0){
  escribir("editFabricante_OK", $display. " OK ".$resp);
	$extra = 'fabricante.php?ok=1';
}else{
	escribir("editFabricante_ERROR", $display . " ".$resp);
	$extra = 'fabricante.php?ok=0';
}
header("Location: http://$host$uri/$extra");
?>
