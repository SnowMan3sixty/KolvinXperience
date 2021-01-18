<?php

require_once('Experiencia.php');

$experiencia = new Experiencia();

$experiencies = $experiencia->experienciasReportadas();

echo json_encode($experiencies);

?>