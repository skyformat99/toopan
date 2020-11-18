<?php
include("./includes/common.php");
$title = $conf['title'];
include SYSTEM_ROOT.'header.php';
?>
</div>
<style type="text/css">
</style>
<div style="font:14px Microsoft YaHei;">
<div class="col-xs-12 center-block" style="float: none;  margin:0px auto; text-align:center;">
<div class="btn-group pull-right" style="display: inline-block;">
</div>
  </div>
<div class="container">  
        <h3>文件列表</h3>
        <div class="table-responsive">
       <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>操作</th>
                    <th>文件名</th>
                    <th>文件大小</th>
                    <th>文件格式</th>
                    <th>上传时间</th>
                    <th>上传者IP</th>
                </tr>
            </thead>
            <tbody>
<?php
$numrows=$DB->getColumn("SELECT count(*) from pre_file WHERE hide=0");
$pagesize=15;
$pages=ceil($numrows/$pagesize);
$page=isset($_GET['page'])?intval($_GET['page']):1;
$offset=$pagesize*($page - 1);

$rs=$DB->query("SELECT * FROM pre_file WHERE hide=0 order by id desc limit $offset,$pagesize");
$i=1;
while($res = $rs->fetch())
{
	$fileurl = './down.php/'.$res['hash'].'.'.($res['type']?$res['type']:'file');
	$viewurl = './file.php?hash='.$res['hash'];
echo '<tr><td><b>'.$i++.'</b></td><td><a href="'.$fileurl.'">下载</a></td><td><a href="'.$viewurl.'" target="_blank"><i class="fa '.type_to_icon($res['type']).' fa-fw"></i>'.$res['name'].'</td><td>'.size_format($res['size']).'</td><td><font color="blue">'.($res['type']?$res['type']:'未知').'</font></td><td>'.$res['addtime'].'</td><td>'.preg_replace('/\d+$/','*',$res['ip']).'</b></td></tr>';
}
?>
            </tbody>
        </table>
        </div>
        <div style="font:14px Microsoft YaHei;">
        <div class="row">
        <div class="col-md-6"><br>共有 <?php echo $numrows?> 个文件&nbsp;&nbsp;当前第 <?php echo $page?> 页，共 <?php echo $pages?> 页</div>
        <div class="col-md-6"><nav>
  <ul class="pagination pagination-sm" style="float:right;">
<?php
$first=1;
$prev=$page-1;
$next=$page+1;
$last=$pages;
if ($page>1)
{
echo '<li><a style="font:14px Microsoft YaHei;" href="index.php?page='.$first.$link.'">首页</a></li>';
echo '<li><a style="font:14px Microsoft YaHei;" href="index.php?page='.$prev.$link.'">&laquo;</a></li>';
} else {
echo '<li style="font:14px Microsoft YaHei;" class="disabled"><a>首页</a></li>';
echo '<li style="font:14px Microsoft YaHei;" class="disabled"><a>&laquo;</a></li>';
}
$start=$page-10>1?$page-10:1;
$end=$page+10<$pages?$page+10:$pages;
for ($i=$start;$i<$page;$i++)
echo '<li><a style="font:14px Microsoft YaHei;" href="index.php?page='.$i.$link.'">'.$i .'</a></li>';
echo '<li style="font:14px Microsoft YaHei;" class="disabled"><a>'.$page.'</a></li>';
for ($i=$page+1;$i<=$end;$i++)
echo '<li><a style="font:14px Microsoft YaHei;" href="index.php?page='.$i.$link.'">'.$i .'</a></li>';
echo '';
if ($page<$pages)
{
echo '<li><a style="font:14px Microsoft YaHei;" href="index.php?page='.$next.$link.'">&raquo;</a></li>';
echo '<li><a style="font:14px Microsoft YaHei;" href="index.php?page='.$last.$link.'">尾页</a></li>';
} else {
echo '<li style="font:14px Microsoft YaHei;" class="disabled"><a>&raquo;</a></li>';
echo '<li style="font:14px Microsoft YaHei;" class="disabled"><a>尾页</a></li>';
}
?>
  </ul>
</nav></div>
</div>
    </div>
    </div>
</div>
<?php include SYSTEM_ROOT.'footer.php';?>
<?php if(!empty($conf['gonggao'])){?>
<link href="//mediy.oss-cn-beijing.aliyuncs.com/toopan.cn/snackbar.min.css" rel="stylesheet">
<script src="//mediy.oss-cn-beijing.aliyuncs.com/toopan.cn/snackbar.min.js"></script>
<script>
$(function() {
$.snackbar({content: "<?php echo $conf['gonggao']?>", timeout: 10000});
});
</script>
<?php }?>