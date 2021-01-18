<?php

require_once('Experiencia.php');

$categoria =  $_REQUEST['categoria'];

$experiencia = new Experiencia();

$experiencies = $experiencia->selectExperienciesFiltrades($categoria);

echo json_encode($experiencies);
?>