<?php
@header('Content-Type: text/html; charset=UTF-8');
?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
  <meta charset="utf-8"/>
  <meta name="renderer" content="webkit">
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <title><?php echo $title ?></title>
  <link href="//cdn.staticfile.org/twitter-bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet"/>
  <link href="//cdn.staticfile.org/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
  <script src="//cdn.staticfile.org/modernizr/2.8.3/modernizr.min.js"></script>
  <script src="//cdn.staticfile.org/jquery/2.1.4/jquery.min.js"></script>
  <script src="//cdn.staticfile.org/twitter-bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <!--[if lt IE 9]>
    <script src="//cdn.staticfile.org/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="//cdn.staticfile.org/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body>
<?php if($islogin==1){?>
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
          <ul class="nav navbar-nav">
          <li class="<?php echo checkIfActive('https://www.toopan.cn/')?>">
            <a href="https://www.toopan.cn/"><i class="fa fa-bookmark" aria-hidden="true"></i> Return to the home page</a>
          </li>
      </div><!-- /.navbar-header -->
      <div id="navbar" class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
        <ul class="nav navbar-nav navbar-right">
          <li class="<?php echo checkIfActive('index,')?>">
            <a href="./"><i class="fa fa-home"></i> The background page</a>
          </li>
		      <li class="<?php echo checkIfActive('file')?>">
            <a href="./file.php"><i class="fa fa-list"></i> File management</a>
          </li>
		      <li class="<?php echo checkIfActive('set')?>">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-cog"></i> System Settings<b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="./set.php?mod=site">Website information Settings</a></li>
			        <li><a href="./set.php?mod=file">File upload Settings</a><li>
			        <li><a href="./set.php?mod=green">Content security Settings</a><li>
					<li><a href="./set.php?mod=api">Upload API Settings</a><li>
              <li><a href="./set.php?mod=iptype">User IP address setting</a><li>
              <li><a href="./set.php?mod=account">Management account Settings</a><li>
            </ul>
          </li>
          <li><a href="./en-login.php?logout"><i class="fa fa-power-off"></i> Log out</a></li>
        </ul>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container -->
  </nav><!-- /.navbar -->
<?php }?>