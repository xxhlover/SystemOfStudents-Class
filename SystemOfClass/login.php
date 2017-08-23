<?php
    require './common.php';
    //接收数据
    $username   = $_POST['username'];
    $passwd     = $_POST['passwd'];
    $sql = 'SELECT id, username, passwd FROM admin WHERE username = "'.$username.'"';
    $result = $mysql->db->query($sql);
    $row = $result->fetch_array(MYSQLI_ASSOC);
    if(!$row){
        $r = array('r'=>'invail_username');
        echo json_encode($r);
        exit;
    }
    if($row['passwd'] != md5($passwd)){
        $r = array('r'=>'invail_passwd');
        echo json_encode($r);
        exit;
    }

    //保存SESSION
    $_SESSION['id']         = $row['id'];
    $_SESSION['username']   = $row['username'];
    //更新相关信息：登录次数  最后一次登录时间
    //更新SQL语句：UPDATE 表名 SET 字段1 = 新的值, 字段2="新值"... [WHERE 判断条件]
    //时间戳函数：time()
    $sql = 'UPDATE admin SET nums = nums + 1, lasttimes = ' . time(). ' WHERE id = ' . $row['id'];
    $mysql->db->query($sql);
    $r = array('r'=>'success');
    echo json_encode($r);
