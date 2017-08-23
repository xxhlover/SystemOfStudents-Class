<?php require './head.php'; ?>
<?php
    $where      = '';
    $keywords  = $_GET['keywords'];
    $urlext = '';
    if($keywords){
        $where = 'kw LIKE "%'.$keywords.'%"';
        //对连接地址进行编码：urlencode
        $urlext .= '&keywords=' . urlencode($keywords);
//$urlext .= '&keywords=' . $keywords;
    }
    
    //分页
    //第一步：需要定义每页显示多少条记录； $pagenum = 20;
    //第二步：需要确定当前是第几页；$page = 1; $page = $_EGT['page']; $page = $_EGT['page'];
    //第三步：计算总页数；ceil(allcount/$pagenum)
    //第四步：查询当前页要显示的记录
    // "SELECT * FROM classs WHERE classname LIKE '%关键词%'";
    $pagenum    = 20;
    $page       = (int)$_GET['page'] ? (int)$_GET['page'] : 1;
    $kwlist     = $mysql->selectData('shop360_top20_pc', '*', $where, ($page-1)*$pagenum, $pagenum);

    //查询总记录数
    $totalnum = $mysql->getCount('shop360_top20_pc', $where);
    //计算总页数
    $totpage = ceil($totalnum/$pagenum);

 ?>
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" class="tip-bottom"><i class="icon-home"></i> 首页</a> <a href="#" class="current">关键词管理</a> </div>
  </div>
  <div class="container-fluid">
    <hr>
    <form action="kw.php" method="get">
        <input type="text" name="keywords" value="<?=$keywords;?>" class="span3" placeholder="关键词" />
        <input type="submit" value="查询">
    </form>

    <div class="dataTables_paginate fg-buttonset ui-buttonset fg-buttonset-multi ui-buttonset-multi paging_full_numbers" id="DataTables_Table_0_paginate">

    <a class="first ui-corner-tl ui-corner-bl fg-button ui-button ui-state-default" href="./kw.php?page=1<?=$urlext;?>">首页</a>
    <?php 
        if($page > 1){
     ?>
    <a tabindex="0" class="previous fg-button ui-button ui-state-default" href="./kw.php?page=<?=($page-1).$urlext;?>">上一页</a>
    <?php } ?>

    <span>

    <!-- <a tabindex="0" class="fg-button ui-button ui-state-default ui-state-disabled">1</a> -->
   
    <?php
        $start = $page + 1;
        if($totpage - $page < 5){
            $start = $totpage - 4;
        }
        for($i = $start; $i < $page + 6 && $i <= $totpage&& $i>=1; $i++){
            echo ' <a class="fg-button ui-button ui-state-default" href="./kw.php?page='.$i.$urlext.'">'.$i.'</a>';
        }
     ?>
     </span>
    <?php 
        if($page < $totpage){
     ?>
    <a class="next fg-button ui-button ui-state-default" href="./kw.php?page=<?=$page+1;?><?=$urlext;?>">下一页</a>
    <?php } ?>
    <a class="last ui-corner-tr ui-corner-br fg-button ui-button ui-state-default" href="./kw.php?page=<?=$totpage.$urlext;?>">尾页</a>
    </div>

    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
            <h5>关键词管理</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>关键词</th>
                  <th>类目一</th>
                  <th>类目二</th>
                  <th>类目三</th>
                </tr>
              </thead>
              <tbody>
              <?php 
                    foreach ($kwlist as $key => $value) {
//                  	var_dump($kwlist);
                        echo '  <tr class="odd gradeX">
                                  <td>'.$value['id'].'</td>
                                  <td>'.str_replace($keywords, '<span class="H">'.$keywords.'</span>', $value['kw']).'</td>
                                  <td>'.$value['c1'].'</td>
                                  <td>'.$value['c2'].'</td>
                                  <td>'.$value['c3'].'</td>
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