<?php
include($_SERVER['DOCUMENT_ROOT'].'/Diccionario/ajax/validarSesion.php');
$display = trim($_POST["display_metrica"]);
$fabricante = $_POST["fabricante"];
$tipo = $_POST["tipo"];
$producto = $_POST["producto"];
$componente = $_POST["componente"];
$elementos = explode(",",$display);
$tam = sizeof($elementos);

while ($tam > 0){
  	$tam = $tam - 1;
		$display = trim($elementos[$tam]);
		$resp = insertmetrica($display,$componente);
			if($resp >0){
					escribir("metrica_OK", $query . " OK ".$resp);
					$extra = 'metrica.php?ok=1';
				}else{
					escribir("metrica_Error", $query . " ".$resp);
					$extra = 'metrica.php?ok=0';
				}
			}
		header("Location: http://$host$uri/$extra");
?>
