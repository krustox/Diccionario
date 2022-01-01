<?php

include($_SERVER['DOCUMENT_ROOT'].'/Diccionario/ajax/validarSesion.php');
$fabricante = $_GET['fabricante'];

$resp = gettipo("where fabricante = $fabricante");
if($resp !== null){
	$count = 0;
	if(!isset($_GET['u'])){
		echo "<option> </option>";
	}
	while ($count < count($resp) ) {
		$id=$resp[$count][0];
		$nombre= $resp[$count][1];
		if(isset($_GET['u'])){
			echo "<p onclick=\"producto('$id','$nombre')\">".$nombre."</p>";
		}else{
			echo "<option value=\"".$id."\">".$nombre."</option>";
		}
		$count = $count + 1;
	}
}else{
	echo "No hay contenido relacionado";
}
?>
