<?php

require_once('Experiencia.php');

$experiencia = new Experiencia();

$experiencies = $experiencia->crearExperiencia($titulo, $contenido);

echo json_encode($experiencies);

?>