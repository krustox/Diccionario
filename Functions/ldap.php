<?php
// ejemplo de autenticación
//$ldaprdn  = 'montivoli';     // ldap rdn or dn
//$ldappass = '14MontH';  // associated password

function login($ldaprdn, $ldappass){
	$ldapconn = ldap_connect("167.28.175.35") or die("Could not connect to LDAP server.");
	if ($ldapconn) {
    	// realizando la autenticación
    	$ldapbind = ldap_bind($ldapconn, $ldaprdn, $ldappass);
    	// verificación del enlace
    	if ($ldapbind) {
        	return true;
    	} else {
        	return false;
    	}
	}
}

?>
