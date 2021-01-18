<?php

require_once('Experiencia.php');

$experiencia = new Experiencia();

$experiencies = $experiencia->experienciasEnBorrador();

echo json_encode($experiencies);

?>