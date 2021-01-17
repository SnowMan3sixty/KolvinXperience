<?php

require_once('Experiencia.php');

$id =  $_REQUEST['id'];
$titulo =  $_REQUEST['titulo'];
$contenido =  $_REQUEST['contenido'];
$imagen =  $_REQUEST['imagen'];
$coordenada =  $_REQUEST['coordenada'];

$experiencia = new Experiencia();

$experiencies = $experiencia->editarExperiencia($id, $titulo, $contenido, $imagen, $coordenada);

echo "OK";
?>