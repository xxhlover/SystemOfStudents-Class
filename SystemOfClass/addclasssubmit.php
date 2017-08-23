<?php
    require './checksession.php';
    
    $classname = stripstr($_POST['classname']);
    $classdesc = stripstr($_POST['classdesc']);

    //班级名称不能重复
    //
    
    $sql = 'INSERT INTO classs(classname, classdesc, username, addtimes) VALUES("'.$classname.'", "'.$classdesc.'", "'.$_SESSION['username'].'", '.time().')';
    echo $sql;

    $r = $mysql->db->query($sql);
    var_dump($r);
