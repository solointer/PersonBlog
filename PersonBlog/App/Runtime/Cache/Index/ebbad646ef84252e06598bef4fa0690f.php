<?php if (!defined('THINK_PATH')) exit();?>  <!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta property="qc:admins" content="15333675634016375" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<title>欢迎</title>

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

<!—自适应布局,导入bootstrap框架布局-->
<script src="__PUBLIC__/js/jquery-1.11.1.min.js"></script>
<script src="__PUBLIC__/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="__PUBLIC__/css/bootstrap.min.css">
<link  href="__PUBLIC__/fonts/">


<!-- 链接导航栏的 CSS 文件 -->
<link rel="stylesheet" type="text/css" href="__PUBLIC__/css/navigation.css">
<!-- 链接欢迎页 CSS 文件 -->
<link rel="stylesheet" type="text/css" href="__PUBLIC__/css/welcomepage_css.css">
<style type="text/css">
 #wrap {
  background: url("__PUBLIC__/images/welcome_2.png")no-repeat center top;
  /* 将背景图片设置为 cover ，使图片扩展到足以充满屏幕 */
  background-size: cover;
  -webkit-background-size: cover;
  min-height: 650px;
}
</style>
</head>

<body>
<div id="wrap"> 
  
  <!--导航开始-->
  <nav class="header">
      <div class="container">
        <div class="row">
          <!--logo部分-->
          <div class="col-md-4">
            <div class="navbar-header navbar-default">
              <!-- 响应式菜单 -->
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#header-right" aria-expanded="false">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
              </button>
              <!-- logo -->
              <a class="navbar-brand" href="<?php echo U('Index/Index/index');?>">Keyi<span class="glyphicon glyphicon-heart-empty" aria-hidden="true"></a>
            </div>
          </div>
           <!--导航栏选项部分-->
          <div class="col-md-8">
            <div class="collapse navbar-collapse" id="header-right">
           	  <!-- 导航栏菜单选项 -->
              <ul class="nav navbar-nav navbar-right">
                <li><a href="<?php echo U('Index/Homepage/homepage');?>" >主页</a></li>
                <li><a href="<?php echo U('Index/Message/index');?>">留言</a></li>
                <li><a href="<?php echo U('Index/Aboutpage/aboutpage');?>">关于</a></li>
                <li><a href="<?php echo U('Index/Homepage/login');?>">登陆</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
  </nav>
  
   <!-- 欢迎内容 -->
  <div class="welcome_content">
    <div class="container">
      <div class="row">
          <div class="col-md-12">
                <div class="brand center-block">
                    Keyi<span class="glyphicon glyphicon-heart-empty" aria-hidden="true"></span>
                </div>
                <div class="text text-center">
                    终于等到你，还好没放弃
                </div>
            </div>
        </div>
    </div>
  </div>
  
  
</div>
</body>
</html>