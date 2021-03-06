<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<title>留言</title>

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
<!—自适应布局,导入bootstrap框架布局-->
<script src="__PUBLIC__/js/jquery-1.11.1.min.js"></script>
<script src="__PUBLIC__/js/bootstrap.min.js"></script>
<link href="__PUBLIC__/css/bootstrap.min.css" rel="stylesheet">

<!-- 链接导航栏的 CSS 文件 -->
<link rel="stylesheet" type="text/css" href="__PUBLIC__/css/navigation.css">
<!-- 链接留言页 CSS 文件 -->
<link rel="stylesheet" type="text/css" href="__PUBLIC__/css/messagepage_css.css">
<!-- 链接留言的 JS 文件 -->
<script type="text/javascript" src="__PUBLIC__/js/message.js"></script>
<style type="text/css">
  .wrap_head {
  background: url(__PUBLIC__/images/message_start.png)no-repeat center top;
  background-size: cover;
  -webkit-background-size: cover;
  min-height: 550px;
}
</style>
<script type="text/javascript">
   handlurl='<?php echo U("Index/Message/writemessage",'','');?>';
</script>
</head>

<body>
<div id="wrap">
  <div class="wrap_head"> 
    <!--导航开始-->
    <nav class="header">
      <div class="container">
        <div class="row"> 
          <!-- 导航栏 logo和响应式菜单部分 -->
          <div class="col-md-4">
            <div class="navbar-header navbar-default"> 
              <!-- 响应式菜单 -->
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#header-right" aria-expanded="false"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
              <!-- logo --> 
              <a class="navbar-brand" href="#">Keyi<span class="glyphicon glyphicon-heart-empty" aria-hidden="true"></a> </div>
          </div>
          <!-- 导航栏 选项部分 -->
          <div class="col-md-8">
            <div class="collapse navbar-collapse" id="header-right"> 
              <!-- 搜索框 -->
              <form class="navbar-form navbar-right" role="search">
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="搜索你喜欢的文章">
                </div>
                <button type="submit" class="btn btn-default">搜索</button>
              </form>
              <!-- 导航选项 -->
              <ul class="nav navbar-nav navbar-right">
                <li><a href="<?php echo U('Index/Homepage/homepage');?>">主页</a></li>    
                <li><a href="<?php echo U('Index/Message/index');?>">留言</a></li>                
                <li><a href="<?php echo U('Index/Aboutpage/aboutpage');?>">关于</a><li>
                <li><a href="<?php echo U('Index/Homepage/login');?>">登陆</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </nav>
    
    <!-- 网站介绍 -->
    <div class="title">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h1>留言板</h1>
          </div>
        </div>
      </div>
    </div>
    
    <!-- 分页1 -->
    <div class="message_menu_head">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="paging"> </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="wrap_content"> 
    
    <!-- 留言内容 -->
    <div class="message_content">
    <?php if(is_array($date)): foreach($date as $key=>$v): ?><div class="message_item">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="item_content"> <span class="glyphicon glyphicon-paperclip item_head" aria-hidden="true"></span>
                <div class="media">
                  <div class="media-left"> <a href="#"> <img class="media-object head" src="__PUBLIC__/images/comment_1.jpg" alt="..."> </a> </div>
                  <div class="media-body">
                    <h4 class="media-heading"><?php echo ($v["username"]); ?></h4>
                    <p><?php echo ($v["content"]); ?></p>
                  </div>
                </div>
                <div class="message_info text-right"> <span class="message_time"><?php echo ($v["time"]); ?></span> <span class="message_type">来自QQ</span> </div>
              </div>
            </div>
          </div>
        </div>
      </div><?php endforeach; endif; ?>
      <div class="message_item">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="item_content"> <span class="glyphicon glyphicon-paperclip item_head" aria-hidden="true"></span>
                <div class="media">
                  <div class="media-left"> <a href="#"> <img class="media-object head" src="__PUBLIC__/images/comment_2.jpg" alt="..."> </a> </div>
                  <div class="media-body">
                    <h4 class="media-heading">人在旅途:</h4>
                    <p>三亚的海滩很漂亮。</p>
                  </div>
                </div>
                <div class="message_info text-right"> <span class="message_time">2014-02-19 14:36</span> <span class="message_type">来自QQ</span> </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="message_item">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="item_content"> <span class="glyphicon glyphicon-paperclip item_head" aria-hidden="true"></span>
                <div class="media">
                  <div class="media-left"> <a href="#"> <img class="media-object head" src="__PUBLIC__/images/comment_4.jpg" alt="..."> </a> </div>
                  <div class="media-body">
                    <h4 class="media-heading">小Y:</h4>
                    <p>英国艺术家 Jane Perkins 能利用很多不起眼的东西进行创作，甚至是垃圾。首饰、纽扣、玩具等等都可以作为他创作的工具并创作出惟妙惟肖的画作，丝毫不逊色于色彩丰富的颜料。</p>
                  </div>
                </div>
                <div class="message_info text-right"> <span class="message_time">2014-02-19 14:36</span> <span class="message_type">来自QQ</span> </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="wrap_end"> 
    
    <!-- 分页2 -->
    <div class="message_menu_end">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="paging"><?php echo ($page); ?></div>
          </div>
        </div>
      </div>
    </div>
    <div class="input_message">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="message_area">
              <textarea class="message_textarea" autocomplete="off">评论…</textarea>
              <button class="message_button">发表</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>