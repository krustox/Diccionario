<?php
include($_SERVER['DOCUMENT_ROOT'].'/Diccionario/ajax/validarSesion.php');
$display = trim($_POST["display_tipo"]);
$fabricante = $_POST["fabricante"];
$elementos = explode(",",$display);
$tam = sizeof($elementos);

while ($tam > 0){
  	$tam = $tam - 1;
		$display = trim($elementos[$tam]);
		$resp = inserttipo($display,$fabricante);
			if($resp >0){
					escribir("tipo_OK", $query . " OK ".$resp);
					$extra = 'tipo.php?ok=1';
				}else{
					escribir("tipo_Error", $query . " ".$resp);
					$extra = 'tipo.php?ok=0';
				}
			}
		header("Location: http://$host$uri/$extra");
?>
