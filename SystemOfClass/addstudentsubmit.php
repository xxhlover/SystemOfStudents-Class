<?php
    require './checksession.php';
    //补全表单信息
    $_POST['username']  = $_SESSION['username'];
    $_POST['opertimes'] = time();
    $_POST['cid']       = (int)$_POST['cid'];

    //删除变量或者元素
    $r = $mysql->insertData('students', $_POST);
    var_dump($r);
