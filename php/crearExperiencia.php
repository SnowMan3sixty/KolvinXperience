<?php

require_once('Experiencia.php');

$titulo =  $_REQUEST['titulo'];
$contenido =  $_REQUEST['contenido'];

$experiencia = new Experiencia();

$experiencies = $experiencia->crearExperiencia($titulo, $contenido);

echo "OK";
?>