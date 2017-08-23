<?php
var_dump($_FILES);

$type=array('image/jpeg','img/jpg');
if(!in_array($_FILES['name']['type'],$type)){
	echo '文件格式不支持';
	exit;
}
$n=expload(',',$_FILES['my0']['name']);
move_uploaded_file($_FILES['my0']['tmp_name'],'./路径/'.time().'_'.rand(1000,9000).'.'.end($n));
?>