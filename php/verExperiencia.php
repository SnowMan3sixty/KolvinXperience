<?php
require_once('Experiencia.php');

$id = $_REQUEST['id'];

$experiencia = new Experiencia();

$experiencia = $experiencia->selectOneExperiencia($id);

echo json_encode($experiencia);

?>