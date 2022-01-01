<?php
include($_SERVER['DOCUMENT_ROOT'].'/Diccionario/ajax/validarSesion.php');
$display = trim($_POST["display_variable"]);
$fabricante = $_POST["fabricante"];
$tipo = $_POST["tipo"];
$producto = $_POST["producto"];
$componente = $_POST["componente"];
$metrica = $_POST["metrica"];

$descripcion = trim($_POST["display_descripcion"]);
$unidad = trim($_POST["display_unidad"]);
$frecuencia = trim($_POST["display_frecuencia"]);


$elementos = explode(",",$display);
$tam = sizeof($elementos);

while ($tam > 0){
  	$tam = $tam - 1;
		$display = trim($elementos[$tam]);
		$resp = insertvariable($display,$metrica,$descripcion,$unidad,$frecuencia);
			if($resp >0){
					escribir("variable_OK", $query . " OK $display,$metrica,$descripcion,$unidad,$frecuencia ".$resp);
					$extra = 'variable.php?ok=1';
				}else{
					escribir("variable_Error", $query . " $display,$metrica,$descripcion,$unidad,$frecuencia ".$resp);
					$extra = 'variable.php?ok=0';
				}
			}
		header("Location: http://$host$uri/$extra");
?>
