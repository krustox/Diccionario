<?php
include($_SERVER['DOCUMENT_ROOT'].'/diccionario/ajax/validarSesion.php');

$id = $_GET['id'];
$tabla = $_GET['tabla'];

if($tabla == "fabricante"){
	$cont= gettipo("WHERE fabricante=".$id);
	if($cont === null){
		deleteFabricante($id);
		escribir("Eliminar", "Se ha eliminado el registro");
		echo "Se ha eliminado el registro";
	}else{
    $query2="DELETE FROM diccionario.variable WHERE metrica in
		(SELECT id FROM diccionario.metrica WHERE componente in
     (SELECT id FROM diccionario.componente WHERE producto in
       (SELECT id FROM diccionario.producto WHERE tipo_monitoreo in
         (SELECT id FROM diccionario.tipo_monitoreo WHERE fabricante in
           (SELECT id FROM diccionario.fabricante WHERE id = '$id' )))))";
    Delete($query2);
		$query2="DELETE FROM diccionario.metrica WHERE componente in
     (SELECT id FROM diccionario.componente WHERE producto in
       (SELECT id FROM diccionario.producto WHERE tipo_monitoreo in
         (SELECT id FROM diccionario.tipo_monitoreo WHERE fabricante in
           (SELECT id FROM diccionario.fabricante WHERE id = '$id' ))))";
    Delete($query2);
		$query2="DELETE FROM diccionario.componente WHERE producto in
       (SELECT id FROM diccionario.producto WHERE tipo_monitoreo in
         (SELECT id FROM diccionario.tipo_monitoreo WHERE fabricante in
           (SELECT id FROM diccionario.fabricante WHERE id = '$id' )))";
    Delete($query2);
		$query2="DELETE FROM diccionario.producto WHERE tipo_monitoreo in
         (SELECT id FROM diccionario.tipo_monitoreo WHERE fabricante in
           (SELECT id FROM diccionario.fabricante WHERE id = '$id' ))";
    Delete($query2);
		$query2="DELETE FROM diccionario.tipo_monitoreo WHERE fabricante in
           (SELECT id FROM diccionario.fabricante WHERE id = '$id' )";
    Delete($query2);
		deleteFabricante($id);
    escribir("Eliminar", "Se ha eliminado el registro y subtablas");
    echo "Se han eliminado los registros";
	}
}

if($tabla == "tipo_monitoreo"){
	$cont= getproducto("WHERE tipo_monitoreo=".$id);
	if($cont === null){
		deleteTipo($id);
		escribir("Eliminar", "Se ha eliminado el registro");
		echo "Se ha eliminado el registro";
	}else{
    $query2="DELETE FROM diccionario.variable WHERE metrica in
		(SELECT id FROM diccionario.metrica WHERE componente in
     (SELECT id FROM diccionario.componente WHERE producto in
       (SELECT id FROM diccionario.producto WHERE tipo_monitoreo in
         (SELECT id FROM diccionario.tipo_monitoreo WHERE id = '$id' ))))";
    Delete($query2);
		$query2="DELETE FROM diccionario.metrica WHERE componente in
     (SELECT id FROM diccionario.componente WHERE producto in
       (SELECT id FROM diccionario.producto WHERE tipo_monitoreo in
         (SELECT id FROM diccionario.tipo_monitoreo WHERE id = '$id' )))";
    Delete($query2);
		$query2="DELETE FROM diccionario.componente WHERE producto in
       (SELECT id FROM diccionario.producto WHERE tipo_monitoreo in
         (SELECT id FROM diccionario.tipo_monitoreo WHERE id = '$id' ))";
    Delete($query2);
		$query2="DELETE FROM diccionario.producto WHERE tipo_monitoreo in
         (SELECT id FROM diccionario.tipo_monitoreo WHERE id = '$id' )";
    Delete($query2);
		deleteTipo($id);
    escribir("Eliminar", "Se ha eliminado el registro y subtablas");
    echo "Se han eliminado los registros";
	}
}

if($tabla == "producto"){
	$cont= getcomponente("WHERE producto=".$id);
	if($cont === null){
		deleteProducto($id);
		escribir("Eliminar", "Se ha eliminado el registro");
		echo "Se ha eliminado el registro";
	}else{
    $query2="DELETE FROM diccionario.variable WHERE metrica in
		(SELECT id FROM diccionario.metrica WHERE componente in
     (SELECT id FROM diccionario.componente WHERE producto in
       (SELECT id FROM diccionario.producto WHERE id = '$id' )))";
    Delete($query2);
		$query2="DELETE FROM diccionario.metrica WHERE componente in
     (SELECT id FROM diccionario.componente WHERE producto in
       (SELECT id FROM diccionario.producto WHERE id = '$id' ))";
    Delete($query2);
		$query2="DELETE FROM diccionario.componente WHERE producto in
       (SELECT id FROM diccionario.producto WHERE id = '$id' )";
    Delete($query2);
		deleteProducto($id);
    escribir("Eliminar", "Se ha eliminado el registro y subtablas");
    echo "Se han eliminado los registros";
	}
}

if($tabla == "componente"){
	$cont= getmetrica("WHERE componente=".$id);
	if($cont === null){
		deleteComponente($id);
		escribir("Eliminar", "Se ha eliminado el registro");
		echo "Se ha eliminado el registro";
	}else{
    $query2="DELETE FROM diccionario.variable WHERE metrica in
		(SELECT id FROM diccionario.metrica WHERE componente in
     (SELECT id FROM diccionario.componente WHERE id = '$id' ))";
    Delete($query2);
		$query2="DELETE FROM diccionario.metrica WHERE componente in
     (SELECT id FROM diccionario.componente WHERE id = '$id' )";
    Delete($query2);
		deleteComponente($id);
    escribir("Eliminar", "Se ha eliminado el registro y subtablas");
    echo "Se han eliminado los registros";
	}
}

if($tabla == "metrica"){
	$cont= getvariable("WHERE metrica=".$id);
	if($cont === null){
		deleteMetrica($id);
		escribir("Eliminar", "Se ha eliminado el registro");
		echo "Se ha eliminado el registro";
	}else{
    $query2="DELETE FROM diccionario.variable WHERE metrica in
		(SELECT id FROM diccionario.metrica WHERE id = '$id' )";
    Delete($query2);
		deleteMetrica($id);
    escribir("Eliminar", "Se ha eliminado el registro y subtablas");
    echo "Se han eliminado los registros";
	}
}

if($tabla == "variable"){
		deleteVariable($id);
    escribir("Eliminar", "Se ha eliminado el registro y subtablas");
    echo "Se han eliminado los registros";
	}



?>
