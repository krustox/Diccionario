<?php
include($_SERVER['DOCUMENT_ROOT'].'/Diccionario/ajax/validarSesion.php');
$display = trim($_POST["display_producto"]);
$fabricante = $_POST["fabricante"];
$tipo = $_POST["tipo"];
$elementos = explode(",",$display);
$tam = sizeof($elementos);

while ($tam > 0){
  	$tam = $tam - 1;
		$display = trim($elementos[$tam]);
		$resp = insertproducto($display,$tipo);
			if($resp >0){
					escribir("producto_OK", $query . " OK ".$resp);
					$extra = 'producto.php?ok=1';
				}else{
					escribir("producto_Error", $query . " ".$resp);
					$extra = 'producto.php?ok=0';
				}
			}
		header("Location: http://$host$uri/$extra");
?>
