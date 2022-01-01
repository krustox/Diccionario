<?php

include($_SERVER['DOCUMENT_ROOT'].'/Diccionario/ajax/validarSesion.php');
$tipo = $_GET['tipo'];

$resp = getproducto("where tipo_monitoreo = $tipo");
if($resp !== null){
	if(!isset($_GET['u'])){
		echo "<option> </option>";
	}
	$count = 0;
	while ($count < count($resp) ) {
		$id=$resp[$count][0];
		$nombre= $resp[$count][1];
		if(isset($_GET['u'])){
			echo "<p onclick=\"componente('$id','$nombre')\">".$nombre."</p>";
		}else{
			echo "<option value=\"".$id."\">".$nombre."</option>";
		}
		$count = $count + 1;
	}
}else{
	echo "No hay contenido relacionado";
}
?>
