<?php

    session_start();

    if (empty($_SESSION['user'])) {
        echo 'false';
    }else{
        echo 'true';
    }
    
?>