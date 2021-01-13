<?php

require_once('Experiencia.php');

$titulo =  $_REQUEST['titulo'];
$contenido =  $_REQUEST['contenido'];
$imagen =  $_REQUEST['imagen'];
$coordenada =  $_REQUEST['coordenada'];

$experiencia = new Experiencia();

$experiencies = $experiencia->crearExperiencia($titulo, $contenido, $imagen, $coordenada);

echo "OK";
?>