<?php
session_start();
include($_SERVER['DOCUMENT_ROOT'].'/Diccionario/Config/connection.php');
include($_SERVER['DOCUMENT_ROOT'].'/Diccionario/Functions/Archivo.php');
include($_SERVER['DOCUMENT_ROOT'].'/Diccionario/Config/variables.php');
include($_SERVER['DOCUMENT_ROOT'].'/Diccionario/Functions/Function.php');

if(isset($_SESSION['nombre']) && isset($_SESSION['session']) && isset($_SESSION['ip']) ) {
	$user = $_SESSION['nombre'];
	$sesion = $_SESSION['session'];
	$ip = $_SESSION['ip'];
	escribir("Verify","Se verifica la sessión del usuario ".$user);
}else{
	escribir("Verify","No se pudo verificar la sessión del usuario ");
	session_destroy();
	header("Location: http://$host/Diccionario/index.php?login=error");
}

 ?>
