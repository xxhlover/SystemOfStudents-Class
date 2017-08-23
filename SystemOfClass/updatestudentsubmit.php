<?php
    require './checksession.php';
    var_dump($_POST);
    $_POST['cid']           = (int)$_POST['cid'];
    $_POST['opertimes']     = time();
    $_POST['username']      = $_SESSION['username'];

    $where = ' id = ' . $_POST['id'];
    unset($_POST['id']);
    //执行更新操作
    $r = $mysql->updateData('students', $_POST, $where);
    var_dump($r);