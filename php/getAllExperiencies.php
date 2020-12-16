<?php

require_once('Experiencia.php');

$experiencia = new Experiencia();

$experiencies = $experiencia->selectUltimesExperienciesSenseLimits();

echo json_encode($experiencies);

?>