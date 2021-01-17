<?php

require_once('checkUser.php');

$username =  $_REQUEST['username'];
$nombreUsuario =  $_REQUEST['nombreUsuario'];

$usuario = new Usuari();

$infoPersonal = $usuario->editarInfoPersonal($username, $nombreUsuario);

echo "OK";
?>