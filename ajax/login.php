<?php
include('../Functions/ldap.php');
include('../Functions/Function.php');
include('../Functions/Archivo.php');
include('../Config/variables.php');

$user = $_POST['user'];
$contra = $_POST['pass'];
session_start();

if($contra == ""){
	$contra = "xxx   xxx";
}
if(substr($user, 0,5) != "banco" && $user != "TEST")
{
	$user = "banco\\".$user;
}

if(strpos($user,"banco") === FALSE ){
	if($user == "TEST" & $contra == "TEST") {
		$ip = getRealIP();
		$session = session_id();
//		iniciar_session($user,$session,$ip,$encuesta,$dbhost,$dbusuario,$dbpassword,$db,$dbport,$host);

		$_SESSION['status'] = "OK";
		$_SESSION['nombre'] = $user;
		$_SESSION['session'] = $session;
		$_SESSION['ip'] = $ip;

		header("Location: http://$host/Diccionario/Diccionario/diccionario.php");
	}else{

		echo "Hay un error en la informacion del usuario";
		escribir("login_err", "|".$user . "| No pudo ingresar |");
		header("Location: http://$host/Diccionario/index.php?login=error");
	}
}else{

	//LDAP
if(login($user, $contra)) {
	$ip = getRealIP();
	$session = session_id();
	$users = substr($user,6);
	//iniciar_session($users,$session,$ip,$encuesta,$dbhost,$dbusuario,$dbpassword,$db,$dbport,$host);

	$_SESSION['nombre'] = $users;
	$_SESSION['ip'] = $ip;
	$_SESSION['session'] = $session;
	$_SESSION['status'] = "OK";

	header("Location: http://$host/Diccionario/Diccionario/diccionario.php");
	}else{

	echo "Hay un error en la informacion del usuario";
	escribir("login_err", "|".$user . "| No pudo ingresar |");
	header("Location: http://$host/Diccionario/index.php?login=error");
	}
}
?>

