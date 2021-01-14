<?php

require_once('Experiencia.php');

$id =  $_REQUEST['id'];
$titulo =  $_REQUEST['titulo'];
$contenido =  $_REQUEST['contenido'];

$experiencia = new Experiencia();

$experiencies = $experiencia->editarExperiencia($id, $titulo, $contenido);

echo "OK";
?>