<?php

require_once('Usuari.php');


$username =  $_REQUEST['username'];

$usuario = new Usuari();

$usuarioInfo = $usuario->obtenerInfoUsuario($username);

echo json_encode($usuarioInfo);

?>