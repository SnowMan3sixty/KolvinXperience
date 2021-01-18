<?php
    require_once('Experiencia.php');

    $id =  $_REQUEST['id'];

    $experiencia = new Experiencia();

    $experiencies = $experiencia->disLike($id);

    echo "OK";
    
?>