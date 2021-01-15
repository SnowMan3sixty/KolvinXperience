<?php

require_once('checkUser.php');


$username =  $_REQUEST['username'];

$usuario = new Usuari();

$usuarioInfo = $usuario->obtenerInfoUsuario($username);

echo json_encode($usuarioInfo);

?>