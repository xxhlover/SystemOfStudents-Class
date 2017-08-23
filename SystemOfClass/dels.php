<?php 
    require './checksession.php';
    $where = 'id = ' . (int)$_GET['id'];
    $mysql->delData('students', $where);
    header('Location:./students.php');