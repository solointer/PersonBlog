<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<title>关于</title>

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
<!-- 链接关于页的 CSS 文件 -->
<link rel="stylesheet" type="text/css" href="__PUBLIC__/css/aboutpage_css.css">
<!-- 链接关于页的 JS 文件 -->
<script type="text/javascript" src="__PUBLIC__/js/about_js.js"></script>

</head>

<body>
<div id="wrap"> 
  
<div class="wrap_head">
  <!--导航开始-->
  <nav class="header">
      <div class="container">
        <div class="row">
          <!-- logo部分 -->
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
          <!-- 导航栏选项部分 -->
          <div class="col-md-8">
            <div class="collapse navbar-collapse" id="header-right">
           	  <!-- 导航栏选项 -->
              <ul class="nav navbar-nav navbar-right">
                <li><a href="#">主页</a></li>
                <li><a href="#">留言</a></li>
                <li><a href="#">关于</a></li>
                <li><a href="#">登陆</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
  </nav>
  
  <!-- 网站介绍 -->
  <div class="about_intro">
  	<div class="container">
    	<div class="row">
	    	<div class="col-md-12">
            	<h1>关于Keyi<span class="glyphicon glyphicon-heart-empty" aria-hidden="true"></span></h1>
                <p>
                	偶然的一次，我在学习Android的时候，看到布局中的像素就想到了HTML中的像素。无论是PC还是移动设备，相关的开发都离不开实际像素和物理像素这个问题，所以我就认真查阅整理了一番，并且结合自己的理解写了一篇关于像素适应不同设备的文章记录我的心得。但是在之后的学习中，我发现很多人都对这些知识并不了解。所以我就想通过一种方式让所有人都能够有机会了解我的想法，就这样，“可以”就诞生了。
                	<br/>
                	<br/>
                    我们想把“可以”做成一个自由、开放、具有创意的网站，所有人都可以了解到我们的想法，并且和我们共同交流探讨。
                    <br/>
                    <br/>
                    为了做的更好，我们一直在努力着。
                	不知道你是否也有过这种感觉，有时候对某些事物有自己的理解和看法。<br/>即使我们没有很丰富很专业的知识，但是这并不代表我们没有<br/>我们曾经为了不打扰别人而忍着寒风坐在阶梯上讨论；我们也曾经为了赶进度而一整天不吃喝</p>
        	</div>
        </div>
    </div>
  </div>
  
</div>
  
  <!-- 开发者介绍 -->
  <div class="about_us">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center">关于我们</h1>
            </div>
        </div>
      </div>
  </div>
  <div class="about_developer">
  	<div class="container-fluid">
    	<div class="row">
        	<div class="developer col-md-5">
            	<div class="head">
                    <img src="__PUBLIC__/images/about_developer_2_head.png" class="img-responsive img-circle center-block"> 
                </div>
                <div class="info">
                    <div class="info_1"><img src="images/weixin_1.ico"/>&nbsp;微信:&nbsp;18270890760<a href="#"></a></div>
                    <div class="info_1"><img src="images/youxiang_2.ico"/>&nbsp;电子邮箱:&nbsp;1973118930@qq.com</div>
                </div>
            </div>
            <div class="developer_text_1 col-md-7">
            	<p>
                	受限于能力和时间，也许我们的成果并不是那么让你满意。
             		<br/>
                    但是我们会一直学习，不断完善我们的网站
                </p>
            </div>
        </div>
    </div>
  </div>
  
  <div class="about_developer">
  	<div class="container-fluid">
    	<div class="row">
        	<div class="developer_text_2 col-md-7">
            	<p>
                	不仅如此，我们希望你也能够加入我们。
                    <br/>
                    如果你有任何宝贵的建议或意见都可以联系我们或留言，让我们一起把这里做的更好。
                </p>
            </div>
            <div class="developer col-md-5">
                <div class="head">
                    <img src="__PUBLIC__/images/about_developer_1_head.png" class="img-responsive img-circle center-block">
                </div>
                <div class="info">
                    <div class="info_1"><img src="images/weibo_1.ico" style="padding-bottom: 5px;"/>&nbsp;新浪微博:&nbsp;<a href="http://weibo.com/u/5026795547">爱上步行的人</a></div>
                    <div class="info_1"><img src="__PUBLIC__/images/youxiang_2.ico"/>&nbsp;电子邮箱:&nbsp;751747443@qq.com</div>
                </div>
            </div>
        </div>
    </div>
  </div>
  
  <div class="about_us">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center"></h1>       
            </div>
            <img src="__PUBLIC__/images/ending.png" class="img-responsive"/>
        </div>
      </div>
  </div>
  
  
  
</div>
</body>
</html>