<?php

include($_SERVER['DOCUMENT_ROOT'].'/Diccionario/ajax/validarSesion.php');
$metrica = $_GET['metrica'];

$resp = getvariable("where metrica = $metrica");
if($resp !== null){
	if(!isset($_GET['u'])){
		echo "<option> </option>";
	}else{
		echo "<table id='table'>
			<thead>
			<tr>
				<th>Variable</th>
				<th>Descripcion</th>
				<th>Unidad Metrica</th>
				<th>Frecuencia</th>
			</tr>
			</thead>
			<tbody>";
	}
	$count = 0;
	while ($count < count($resp) ) {
		$id=$resp[$count][0];
		$nombre= $resp[$count][1];
		if(isset($_GET['u'])){
		 echo "<tr><td width='30%''>"	.$nombre."</td>";
		 echo "<td width='30%''>"	.$resp[$count][3]."</td>";
		 echo "<td width='30%''>"	.$resp[$count][4]."</td>";
		 echo "<td width='30%''>"	.$resp[$count][5]."</td>";
		}else{
			echo "<option value=\"".$id."\">".$nombre."</option>";
		}
		$count = $count + 1;
	}
	if(isset($_GET['u'])){
	 echo "</table>";
	}
}else{
	echo "No hay contenido relacionado";
}
?>
