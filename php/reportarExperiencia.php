<?php

require_once('Experiencia.php');

$id =  $_REQUEST['id'];

$experiencia = new Experiencia();

$experiencies = $experiencia->reportarExperiencia($id);

echo "OK";
?>