<?php require './head.php'; ?>

<?php 
    $sql        = 'SELECT id, classname FROM classs';
    $result     = $mysql->db->query($sql);
    $classlist  = array();
    while($row  = $result->fetch_array(MYSQLI_ASSOC)){
        $classlist[] = $row;
    }
    var_dump($class);
    //修改信息的步骤：
    //第一步：获取原始信息
    $id         = $_GET['id'];
    $class    = $mysql->selectData('classs', '*', 'id = ' . $id);
    $class    = $class[0];
    //第二步：把原始信息填充到表单里面
    //
    //第三步：把信息ID作为一个hidden隐藏在表单里面

?>

<div id="content">
<div id="content-header">
  <div id="breadcrumb"> <a href="index.php" class="tip-bottom"><i class="icon-home"></i> 首页</a> <a href="#" class="tip-bottom">班级信息管理</a> <a href="#" class="current">班级信息添加</a> </div>
</div>
<div class="container-fluid">
  <div class="row-fluid">
    <div class="span6">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>添加班级信息</h5>
        </div>
        <div class="widget-content nopadding">
          <form action="#" method="get" class="form-horizontal" id="updateclassform">
          	<input type="hidden" name="id" id="id" value="<?=$class['id'];?>" />
            <div class="control-group">
              <label class="control-label">班级名称 :</label>
              <div class="controls">
                <input type="text" name="classname" id="classname" class="span11" value="<?=$class['classname'];?>" placeholder="班级名称" />
                <span class="err"></span>
              </div>
            </div>
            
            <div class="control-group">
              <label class="control-label">班级简介：</label>
              <div class="controls">
                <textarea name="classdesc" id="classdesc" class="span11"  value="<?=$class['classdesc'];?>">
                	<?php
                		echo $class['classdesc'];
                	?>
                	
                </textarea>
              </div>
            </div>
            <div class="form-actions">
              <button type="button" id="updatesclass" class="btn btn-success">保存</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div></div>
<?php require './foot.php'; ?>