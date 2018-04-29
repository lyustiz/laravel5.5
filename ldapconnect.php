<?php

// ejemplo de autenticación
$ldaprdn  = 'uid=lyustiz,ou=People,dc=maxcrc,dc=com';     // ldap rdn or dn
$ldappass = '123456';  // associated password

// conexión al servidor LDAP
$ldapconn = ldap_connect("127.0.0.1")
    or die("Could not connect to LDAP server.");

if ($ldapconn) {
    ldap_set_option($ldapconn, LDAP_OPT_PROTOCOL_VERSION, 3);
    // realizando la autenticación
    $ldapbind = ldap_bind($ldapconn, $ldaprdn, $ldappass);

    // verificación del enlace
    if ($ldapbind) {
        echo "LDAP bind successful...";
    } else {
        echo "LDAP bind failed...";
    }

}




