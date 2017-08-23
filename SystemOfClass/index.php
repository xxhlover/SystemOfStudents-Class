<?php require './head.php'; ?>
<?php
    $where      = '';
    $classname  = $_GET['classname'];
    if($classname){
        $where = 'classname LIKE "%'.$classname.'%"';
    }
    // "SELECT * FROM classs WHERE classname LIKE '%关键词%'";
    $classlist = $mysql->selectData('classs', 'id, classname, classdesc', $where);
//  
    
 ?>
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" class="tip-bottom"><i class="icon-home"></i> 首页</a> <a href="#" class="current">班级管理</a> </div>
  </div>
  <div class="container-fluid">
    <hr>
    <form action="index.php" method="get">
    <input type="text" name="classname" id="classname" value="<?=$classname;?>" class="span3" placeholder="关键词" />
    <input type="submit" value="查询">
    </form>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
            <h5>班级管理</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>班级名称</th>
                  <th>班级简介</th>
                  <th>操作</th>
                </tr>
              </thead>
              <tbody>
      <?php 
      	//遍历$classlist数组,形式如关联数组，也可以写成$classlist as $key      $key['字段1']
		    foreach ($classlist as $key => $value) {
	            echo '  <tr class="odd gradeX">
	                    <td>'.$value['id'].'</td>
	                    <td>'.str_replace($classname, '<span class="H">'.$classname.'</span>',$value['classname']).'</td>
	                    <td>'.$value['classdesc'].'</td>
	                    <td><a href="./updatesc.php?id='.$value['id'].'">修改</a>|<a href="./delsc.php?id='.$value['id'].'">删除</a></td>
	                    </tr>';
	        }
	  ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php require './foot.php'; ?>