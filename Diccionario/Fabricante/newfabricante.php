<?php
include($_SERVER['DOCUMENT_ROOT'].'/Diccionario/ajax/validarSesion.php');
$display = trim($_POST["display_fabricante"]);
$elementos = explode(",",$display);
$tam = sizeof($elementos);
	while ($tam > 0){
			$tam = $tam - 1;
			$display = trim($elementos[$tam]);
			$resp = insertFabricante($display);

			if($resp > 0){
					escribir("Fabricante_OK", $display. " OK ".$resp);
					$extra = 'fabricante.php?ok=1';
				}else{
					escribir("Fabricante_ERROR", $display . " ".$resp);
					$extra = 'fabricante.php?ok=0';
				}
			}
		header("Location: http://$host$uri/$extra");
?>
