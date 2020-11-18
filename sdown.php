
<style>
.form-inline .form-control {
    display: inline-block;
    width: auto;
    vertical-align: middle;
}
.form-inline .form-group {
    display: inline-block;
    margin-bottom: 0;
    vertical-align: middle;
}
.table>tbody>tr>td {
	vertical-align: middle;
    max-width: 360px;
	word-break: break-all;
}
</style>

<div class="container" style="padding-top:70px;">
  <div class="col-xs-12 center-block" style="float: none;">
	    <form onsubmit="return searchFile()" method="GET" class="form-inline">
	        <div class="form-group">
          <label>搜索</label>
		  <select name="type" class="form-control" default="<?php echo trim($_GET['type'])?>"><option value="1">文件名</option><option value="2">文件Hash</option><option value="3">文件格式</option><option value="4">上传者IP</option></select>
		    </div>
			<div class="form-group" id="searchword">
			<input type="text" class="form-control" name="kw" placeholder="搜索内容" value="<?php echo trim($_GET['kw'])?>">
			</div>
			<div class="form-group">
				<button class="btn btn-primary" type="submit"><i class="fa fa-search"></i>搜索</button>
				<a href="javascript:searchClear()" class="btn btn-default"><i class="fa fa-repeat"></i>重置</a>
			</div>
			<div class="form-group">
			<select id="dstatus" name="dstatus" class="form-control"><option value="0">全部文件</option><option value="1">正常文件</option><option value="2">已屏蔽文件</option><option value="3">待审核文件</option></select>
		    </div>
		</form>
      <div id="listTable"></div>
    </div>
  </div>
