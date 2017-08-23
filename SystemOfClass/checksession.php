<?php 
    require './common.php';
    if(!$_SESSION['id']){
        header('Location:./login.html');
        exit;
    }
