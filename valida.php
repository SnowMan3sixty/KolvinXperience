<?php
header("Access-Control-Allow-Origin: *");
header('Content-Type: text/html; charset=utf-8');
$aleatorio= rand(0,5);
sleep($aleatorio);

if ($_REQUEST['user']=="usuario" && $_REQUEST['pass']=="123")
  $response = array('status' => "ok", 'name' => "Kevin" , 'pic' => "https://randomuser.me/api/portraits/men/51.jpg");
else
  $response = array('status' => "fail");


  echo json_encode($response);
?>