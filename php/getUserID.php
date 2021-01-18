<?php

require_once('Usuari.php');

$username = $_REQUEST['user'];

$user = new Usuari();

$users = $user->selectIDFromUser($username);

echo json_encode($users);

?>