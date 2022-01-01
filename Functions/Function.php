<?php

//Obtener IP del cliente
function getRealIP() {
		if (!empty($_SERVER['HTTP_CLIENT_IP'])){
			return $_SERVER['HTTP_CLIENT_IP'];
		}
		if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
			return $_SERVER['HTTP_X_FORWARDED_FOR'];
		}
		return $_SERVER['REMOTE_ADDR'];
}

//Obtener nombre del LDAP
function getName($user){
	include($_SERVER['DOCUMENT_ROOT'].'/Diccionario/Config/variables.php');
	if($user == "TEST"){
			return $user;
	}else{
		if ($user != "ABEST" ){
			$usuario = Trim($user);
			$adServer = "167.28.175.35";
			$ldap = ldap_connect($adServer);
			$username = "montivoli";
			$password = "15MontHL";
			$ldaprdn = 'banco' . "\\" . $username;
			ldap_set_option($ldap, LDAP_OPT_TIMELIMIT, 2);
			ldap_set_option($ldap, LDAP_OPT_PROTOCOL_VERSION, 3);
			ldap_set_option($ldap, LDAP_OPT_REFERRALS, 0);
			$bind = @ldap_bind($ldap, $ldaprdn, $password);
			if ($bind) {
				$filter="(sAMAccountName=$usuario)";
				$result = ldap_search($ldap,"dc=banco,dc=bestado,dc=cl",$filter);
				ldap_sort($ldap,$result,"sn");
				$info = ldap_get_entries($ldap, $result);
				if(count($info) > 1  ){
					$usuario = $info[0]["sn"][0].", " . $info[0]["givenname"][0];
					//escribir("LDAP",$usuario);
					@ldap_close($ldap);
					escribir("ldap-mal",$usuario);
					return $usuario;
				}else{
					escribir("ldap-ok",$user);
					return $user;
				}
			}else{
				escribir("ldap",$user);
				return $user;
			}
		}
		return $user;
	}
}


?>
