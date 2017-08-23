<?php
    require './checksession.php';
//  var_dump($_POST);
    $_POST['id']           = (int)$_POST['id'];
    $_POST['addtimes']     = time();
    $_POST['username']      = $_SESSION['username'];

    $where = ' id = ' . $_POST['id'];
    unset($_POST['id']);
    //执行更新操作
    $r = $mysql->updateData('classs', $_POST, $where);
//	echo json_encode($r);
	
