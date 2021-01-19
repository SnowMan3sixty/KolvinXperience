<?php

require_once('Experiencia.php');

$user = $_REQUEST['user'];
$titulo =  $_REQUEST['titulo'];
$contenido =  $_REQUEST['contenido'];
$imagen =  $_REQUEST['imagen'];
$coordenada =  $_REQUEST['coordenada'];
$categoria = $_REQUEST['categoria'];

$experiencia = new Experiencia();

$experiencies = $experiencia->crearExperiencia($titulo, $contenido, $imagen, $coordenada, $user, $categoria);

echo "OK";
?>