<?php 
    require './checksession.php';
    $where = 'id = ' . (int)$_GET['id'];
    $mysql->delData('classs', $where);
    header('Location:./index.php');