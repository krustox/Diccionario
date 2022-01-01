<?php
include($_SERVER['DOCUMENT_ROOT'].'/Diccionario/ajax/validarSesion.php');

$id_ant = $_GET['anterior'];
$id = $_GET['actual'];
$tabla = $_GET['tabla'];

if($tabla == "fabricante"){
	$cont = deleteFabricante($id);
	if($cont > 0){
		escribir("Eliminar", "Se ha eliminado el registro");
		echo "Se ha eliminado el registro";
	}else{
		escribir("Eliminar", $id. " No se pudo eliminar el registro, revise las relaciones en niveles inferiores");
		echo "No se pudo eliminar el registro, revise las relaciones en niveles inferiores";
	}
}

if($tabla == "tipo_monitoreo"){
	$cont = deleteTipo($id);
	if($cont > 0){
		escribir("Eliminar", "Se ha eliminado el registro");
		echo "Se ha eliminado el registro";
	}else{
		escribir("Eliminar", $id. " No se pudo eliminar el registro, revise las relaciones en niveles inferiores");
		echo "No se pudo eliminar el registro, revise las relaciones en niveles inferiores";
	}
}

if($tabla == "producto"){
	$cont = deleteProducto($id);
	if($cont > 0){
		escribir("Eliminar", "Se ha eliminado el registro");
		echo "Se ha eliminado el registro";
	}else{
		escribir("Eliminar", $id. " No se pudo eliminar el registro, revise las relaciones en niveles inferiores");
		echo "No se pudo eliminar el registro, revise las relaciones en niveles inferiores";
	}
}

if($tabla == "componente"){
	$cont = deleteComponente($id);
	if($cont > 0){
		escribir("Eliminar", "Se ha eliminado el registro");
		echo "Se ha eliminado el registro";
	}else{
		escribir("Eliminar", $id. " No se pudo eliminar el registro, revise las relaciones en niveles inferiores");
		echo "No se pudo eliminar el registro, revise las relaciones en niveles inferiores";
	}
}

if($tabla == "metrica"){
	$cont = deleteMetrica($id);
	if($cont > 0){
		escribir("Eliminar", "Se ha eliminado el registro");
		echo "Se ha eliminado el registro";
	}else{
		escribir("Eliminar", $id. " No se pudo eliminar el registro, revise las relaciones en niveles inferiores");
		echo "No se pudo eliminar el registro, revise las relaciones en niveles inferiores";
	}
}

if($tabla == "variable"){
	$cont = deleteVariable($id);
	if($cont > 0){
		escribir("Eliminar", "Se ha eliminado el registro");
		echo "Se ha eliminado el registro";
	}else{
		escribir("Eliminar", $id ." No se pudo eliminar el registro");
		echo "No se pudo eliminar el registro";
	}
}

?>
