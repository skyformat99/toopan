<?php
/**
 * The login
**/
$verifycode = 1;//Verification code switch

if(!function_exists("imagecreate") || !file_exists('code.php'))$verifycode=0;
include("../includes/common.php");
if(isset($_POST['user']) && isset($_POST['pass'])){
	if(!$_SESSION['pass_error'])$_SESSION['pass_error']=0;
	$user=daddslashes($_POST['user']);
	$pass=daddslashes($_POST['pass']);
	$code=daddslashes($_POST['code']);
	if ($verifycode==1 && (!$code || strtolower($code) != $_SESSION['vc_code'])) {
		unset($_SESSION['vc_code']);
		@header('Content-Type: text/html; charset=UTF-8');
		exit("<script language='javascript'>alert('Verification code error!');history.go(-1);</script>");
	}elseif($_SESSION['pass_error']>5) {
		@header('Content-Type: text/html; charset=UTF-8');
		exit("<script language='javascript'>alert('Incorrect user name or password!');history.go(-1);</script>");
	}elseif($user==$conf['admin_user'] && $pass==$conf['admin_pwd']) {
		$session=md5($user.$pass.$password_hash);
		setcookie("admin_session", $session, time() + 604800);
		@header('Content-Type: text/html; charset=UTF-8');
		exit("<script language='javascript'>alert('Login management center successfully!');window.location.href='./';</script>");
	}else {
		$_SESSION['pass_error']++;
		@header('Content-Type: text/html; charset=UTF-8');
		exit("<script language='javascript'>alert('Incorrect user name or password!');history.go(-1);</script>");
	}
}elseif(isset($_GET['logout'])){
	setcookie("admin_session", "", time() - 604800);
	@header('Content-Type: text/html; charset=UTF-8');
	exit("<script language='javascript'>alert('You have successfully logged off this login!');window.location.href='./login.php';</script>");
}elseif($islogin==1){
	exit("<script language='javascript'>alert('You have logged in!');window.location.href='./';</script>");
}
$title='The user login';
include './head.php';
?>
  <nav class="navbar navbar-fixed-top navbar-default">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Navigation buttons</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="./">Cloud tray backstage management center</a>
      </div><!-- /.navbar-header -->
      <div id="navbar" class="collapse navbar-collapse">
        <ul class="nav navbar-nav navbar-right">
          <li class="active"><a href="https://www.toopan.cn/"><i class="fa fa-folder-open" aria-hidden="true"></i> Return to the home page</a>
            <a href="./login.php"><span class="glyphicon glyphicon-user"></span> The login</a>
          </li>
        </ul>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container -->
  </nav><!-- /.navbar -->
  <br>
  <br>
  <br>
  <div class="container" style="padding-top:70px;">
    <div class="col-xs-12 col-sm-10 col-md-8 col-lg-6 center-block" style="float: none;">
      <div class="panel panel-primary">
        <div class="panel-heading"><h3 class="panel-title">The user login</h3></div>
        <div class="panel-body">
          <form action="./login.php" method="post" class="form-horizontal" role="form">
            <div class="input-group">
              <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
              <input type="text" name="user" value="" class="form-control input-lg" placeholder="The user name" required="required"/>
            </div><br/>
            <div class="input-group">
              <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
              <input type="password" name="pass" class="form-control input-lg" placeholder="password" required="required"/>
            </div><br/>
			<?php if($verifycode==1){?>
			<div class="input-group">
				<span class="input-group-addon"><span class="glyphicon glyphicon-adjust"></span></span>
				<input type="text" class="form-control input-lg" name="code" placeholder="Input verification code" autocomplete="off" required>
				<span class="input-group-addon" style="padding: 0">
					<img src="./code.php?r=<?php echo time();?>"height="45"onclick="this.src='./code.php?r='+Math.random();" title="Click to change the verification code">
				</span>
			</div><br/>
			<?php }?>
            <div class="form-group">
              <div class="col-xs-12"><input type="submit" value="The login" class="btn btn-primary form-control input-lg"/></div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
<div class="ctr-p" id="footer">
	<style>
		.f6F9Be{background:#E0E0E0;line-height:40px;min-width:980px;border-top:1px solid #E0E0E0;min-width:400px}
		.B4GxFc{margin-left:166px}
		.fbar p,.fbar a,#fsettl,#fsett a{color:#5f6368}
		.fbar a:hover,#fsett a:hover{color:#333}
		.fbar{font-size:14px}
		.EvHmz{bottom:0;left:0;position:absolute;right:0}
		.hRvfYe a:hover{text-decoration:underline}#fsl{margin-left:30px;float:left}#fsr{float:right;margin-right:30px;}@media (max-width:805px){#fsl,#fsr{display:block;margin:1;float:none;position:fixed;bottom:0}
	</style>
	
<div class="ctr-p" id="footer">
	<style>
		.f6F9Be{background:#E0E0E0;line-height:40px;min-width:980px;border-top:1px solid #E0E0E0;min-width:400px}
		.B4GxFc{margin-left:166px}
		.fbar p,.fbar a,#fsettl,#fsett a{color:#5f6368}
		.fbar a:hover,#fsett a:hover{color:#333}
		.fbar{font-size:14px}
		.EvHmz{bottom:auto;left:0;position:absolute;right:0}
		.hRvfYe a:hover{text-decoration:underline}#fsl{margin-left:30px;float:left}#fsr{float:right;margin-right:30px;}@media (max-width:805px){#fsl,#fsr{display:block;margin:1;float:none}
	</style>
	
<div class="ctr-p" id="footer">
	<style>
		.f6F9Be{background:#F5F5F5;line-height:40px;min-width:980px;border-top:1px solid #F5F5F5;min-width:400px}
		.B4GxFc{margin-left:166px}
		.fbar p,.fbar a,#fsettl,#fsett a{color:#E0E0E0}
		.fbar a:hover,#fsett a:hover{color:#333}
		.fbar{font-size:14px}
		.EvHmz{bottom:auto;left:0;position:absolute;right:0}
		.hRvfYe a:hover{text-decoration:underline}#fsl{margin-left:30px;float:left}#fsr{float:right;margin-right:30px;}@media (max-width:805px){#fsl,#fsr{display:block;margin:1;float:#E0E0E0}
	</style>
	
<div id="fbarcnt" id="footcnt" class="EvHmz f6F9Be hRvfYe" id="fbar" class="fbar">
	  <span id="fsr">
	  <a class="btn" class="Fx4vi" href="https://www.mediy.cn">Copyright &copy; 2020 Mediy.cn All rights reserved</a>
	  <a class="btn" class="Fx4vi" href="https://beian.miit.gov.cn">sichuanICP For the record,2020028076号</a>
	  <a class="btn" class="Fx4vi" href="#">Return to the top</a>
	  <span style="display:inline-block;position:relative">
	  <span id="fsett" aria-labelledby="fsettl" role="menu" style="display:none">
	  </span>
	  </span>
	  </span>
<span id="fsl">
	<a class="btn" data-toggle="tooltip" data-original-title="Star on Github" class="Fx4vi" href="http://wpa.qq.com/msgrd?v=3&uin=349336500&site=qq&menu=yes"><i class="fa fa-qq fa-2x"></i></a>
	<a class="btn" data-toggle="tooltip" data-original-title="Star on Github" class="Fx4vi" href="https://github.com/HFO4/shudong-share"><i class="fa fa-github fa-2x"></i></a>
	<a class="btn" data-toggle="tooltip" data-original-title="Star on Github" class="Fx4vi" onclick="location.href='mailto:349336500@qq.com';"><i class="fa fa-envelope fa-2x"></i></a>
	<a class="btn" href="https://uweb.umeng.com/v1/login.php?siteid=1279403889"><div style="display:none"><script type="text/javascript">document.write(unescape("%3Cspan id='cnzz_stat_icon_1279403889'%3E%3C/span%3E%3Cscript src='https://s9.cnzz.com/z_stat.php%3Fid%3D1279403889%26show%3Dpic' type='text/javascript'%3E%3C/script%3E"));</script></div><i class="fa fa-spinner fa-spin fa-2x fa-fw"></i></a>
</span>
	</div>



