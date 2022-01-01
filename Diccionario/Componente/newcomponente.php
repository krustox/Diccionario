<?php
include($_SERVER['DOCUMENT_ROOT'].'/Diccionario/ajax/validarSesion.php');
$display = trim($_POST["display_componente"]);
$fabricante = $_POST["fabricante"];
$tipo = $_POST["tipo"];
$producto = $_POST["producto"];
$elementos = explode(",",$display);
$tam = sizeof($elementos);

while ($tam > 0){
  	$tam = $tam - 1;
		$display = trim($elementos[$tam]);
		$resp = insertcomponente($display,$producto);
			if($resp >0){
					escribir("componente_OK", $query . " OK ".$resp);
					$extra = 'componente.php?ok=1';
				}else{
					escribir("componente_Error", $query . " ".$resp);
					$extra = 'componente.php?ok=0';
				}
			}
		header("Location: http://$host$uri/$extra");
?>
