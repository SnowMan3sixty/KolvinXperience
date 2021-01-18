<?php

require_once('checkUser.php');

$username =  $_REQUEST['username'];
$password =  $_REQUEST['password'];

if ($username!= "" && $password!= ""){
    $password = sha1($password);


    $user = new Usuari();

    $resultUser = $user->iniciarSessio($username, $password);

    if($resultUser == false){
        $response =  array("status" => "FAIL");
    }else{
        $response =  array("status" => "OK");   
    }
}
else{
    $response =  array("status" => "VACIO");
}

echo json_encode($response);
?>