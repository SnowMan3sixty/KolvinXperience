<?php

    $server = "labs.iam.cat/localhost";
    $user = "a18rubonclop_kx";
    $pass = "123456";
    $table = "a18rubonclop_kx";

    $connection = mysql_connect(
        $server,
        $user,
        $pass,
        $table,
    )

    if ($connection) {
        die("Connection failed: " . $connection);
      }
      echo "Connected successfully";
      
?>