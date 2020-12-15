<?php

    session_start();

    if (empty($_COOKIE['user'])) {
        echo 'false';
    }else{
        echo 'true';
    }
    
?>