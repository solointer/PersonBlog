<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<title>welcome</title>

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
  min-height: 750px;
}

</style>
</head>

<body>
<div id="wrap"> 
  
  <!--导航开始-->
  <nav class="header">
      <div class="container">
        <div class="row">
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
              <a class="navbar-brand" href="#">Keyi<span class="glyphicon glyphicon-heart-empty" aria-hidden="true"></a>
            </div>
          </div>
          <div class="col-md-8">
            <div class="collapse navbar-collapse" id="header-right">
           	  <!-- 导航栏菜单选项 -->
              <ul class="nav navbar-nav navbar-right">
                <li><a href="#" class="">home</a></li>
                <li><a data-toggle="modal" data-target="#myModal" href="#" class="">message</a></li>
                <!--留言界面的弹出窗-->
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="exampleModalLabel">New message</h4>
                      </div>
                      <div class="modal-body">
                        <form>
                          <div class="form-group">
                            <label for="recipient-name" class="control-label">Recipient:</label>
                            <input type="text" class="form-control" id="recipient-name">
                          </div>
                          <div class="form-group">
                            <label for="message-text" class="control-label">Message:</label>
                            <textarea class="form-control" id="message-text"></textarea>
                          </div>
                        </form>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Send message</button>
                      </div>
                    </div>
                  </div>
                </div>
                <li><a href="#">about</a></li>
                <li><a href="#" class="">login</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
  </nav>
  
  <!-- 欢迎内容 -->
  <div class="welcome_content">
  	<div class="brand center-block">
    	Keyi<span class="glyphicon glyphicon-heart-empty" aria-hidden="true"></span>
    </div>
    <div class="text">
    	终于等到你，还好没放弃
    </div>
  </div>
  
</div>
</body>
</html>