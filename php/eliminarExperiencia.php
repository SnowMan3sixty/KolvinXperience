<?php

require_once('Experiencia.php');

$id =  $_REQUEST['id'];

$experiencia = new Experiencia();

$experiencies = $experiencia->eliminarExperiencia($id);

echo "OK";
?>