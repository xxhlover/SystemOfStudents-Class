<?php
    $_SESSION || session_start();
    header('Content-type:text/html;charset="UTF-8"');
    require './function.php';
    require './class/DB.php';
    require './inc/db.config.php';
    $mysql = new DB($db_config);
