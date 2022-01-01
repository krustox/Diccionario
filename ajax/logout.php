<?php
	session_start();
	include('../Functions/Archivo.php');
	include('../Config/variables.php');

	$user ="";
	$session="";
	$ip="";
	if(isset($_SESSION['nombre'])){
		$user = $_SESSION['nombre'];
	}
	if(isset($_SESSION['session'])){
		$session = $_SESSION['session'];
	}
	if(isset($_SESSION['ip'])){
		$ip = $_SESSION['ip'];
	}

	if($user != "" && $session != "" && $ip != "" && $encuesta != "" ){
		session_destroy();
	}
	header("Location: http://$host/Diccionario/index.php");

 ?>
