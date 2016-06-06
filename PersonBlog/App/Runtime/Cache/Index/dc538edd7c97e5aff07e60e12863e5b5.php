<?php if (!defined('THINK_PATH')) exit();?>  <!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<title>主页</title>

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
<!-- 链接主页 CSS 文件 -->
<link rel="stylesheet" type="text/css" href="__PUBLIC__/css/homepage_css.css">
<!--链接文章列表的css文件-->
<link rel="stylesheet" type="text/css" href="__PUBLIC__/css/article_list.css">
<!--链接主页的js文件-->
<script type="text/javascript" src="__PUBLIC__/js/homepage_js.js"></script>
</head>
<script type="text/javascript">
//调节上面的导航
  window.onload=function()
  {
  $(function () {
    $(window).scroll(function () {
      var winTop = $(window).scrollTop();
      if (winTop >= 5) {
        $('.header').addClass('sticky_header');
      } else {
        $('.header').removeClass('sticky_header');
      }
    });
  });
   //阅读全文效果
    $(document).on('mouseenter','.read',function() {
      $(this).append('<p>阅读全文</p>');
      $(this).css("background-color","rgba(100,100,100,0.5)");
    });
    $(document).on('mouseleave','.read',function() {
      $(this).empty();
      $(this).css("background-color","transparent");
    });

//读取json数据
      function handler(res) {
          if (res.readyState === 4) {
              if (res.status===200) { 
                var data = JSON.parse(res.responseText);
                 for(var i=0;i<data['aa'].length;i++){
                     var article_item = document.getElementsByClassName('article_item')[0];
                      var list = document.getElementsByClassName('list')[0];
                      article_item.innerHTML=
                      ' <div class="article_content">'+
                      "<a href='<?php echo U(Index/Homepage/articlepage,array(id=>"+ data['aa'][i].articleid +"));?>'class='thumbnail' style='background: url(__PUBLIC__/images/bj4_7.jpg)no-repeat center top;background-size: cover;'>"+'<div class="read">'+'</div>'+'</a>'+'</div>'+
                      '<div class="article_intro">'+
                        "<h4><a href='<?php echo U(Index/Homepage/articlepage,array(id=>"+ data['aa'][i].articleid +"));?>' class='article_title navbar-link'>"+data['aa'][i].title+'</a>'+'</h4>'+
                        '<div class="article_main">'+
                        '<p>'+data['aa'][i].introduce+'</p>'+
                          '</div>'+
                        '<div class="article_info">'+
                        '<div class="info article_click">'+
                        '<span class="glyphicon glyphicon-eye-open" aria-hidden="true" >'+data['aa'][i].readnumber+'</span>'+'</div>'+
                         '<div class="info article_comment">'+
                        '<span class="glyphicon glyphicon-comment" aria-hidden="true" >'+data['aa'][i].commentnumber+'</span>'+'</div>'+
                        '<div class="info article_pause">'+
                        '<span class="glyphicon glyphicon-thumbs-up" aria-hidden="true">'+data['aa'][i].likenumber+'</span>'+'</div>'+
                        '<div class="info article_time">'+
                        '<span class="article_time">'+data['aa'][i].time+'</span>'+'</div>'
                        '</div>'+'</div>';
                       alert(data['aa'][i].readnumber);
                       list.appendChild(article_item);    
                    } 
   
              } else {
                  alert("发生错误：" + res.status);
              }
        }
        

        }    
        function transmission(readnumber){
        //异步传输数据
        var request = new XMLHttpRequest();
        var clickid=readnumber.id;
        request.open("POST", "<?php echo U('Index/ArticleSort/readNumberSort','','');?>");
        var data="clickid="+clickid;
        request.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        request.onreadystatechange = function() {
          handler(request);
        };
        
        request.send(data);

//异步传输数据结束
    }
      var readnumber=document.getElementById("readNumber");
      var likenumber=document.getElementById("likeNumber");
      var commentnumber=document.getElementById("commentNumber");
      var tiemnumber=document.getElementById("timeNumber");
      readnumber.onclick=function(){transmission(readnumber);}
     likenumber.onclick=function(){transmission(likenumber); }
     tiemnumber.onclick=function(){transmission(tiemnumber);}
     commentnumber.onclick=function(){transmission(commentnumber);}
  }
</script>
<body>
<div id="wrap"> 
  
  <!--导航开始-->
    <nav class="header navbar-fixed-top">
      <div class="container">
        <div class="row">
          <!-- 导航栏 logo和响应式菜单部分 -->
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
  
  <!--轮播图开始-->
  <div class="main_images">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div id="slidershow" class="carousel slide" data-ride="carousel" data-wrap="true" data-interval="30000"> 
            <!-- 设置图片轮播的顺序 -->
            <ol class="carousel-indicators">
              <li class="active" data-target="#slidershow" data-slide-to="0"></li>
              <li data-target="#slidershow" data-slide-to="1"></li>
              <li data-target="#slidershow" data-slide-to="2"></li>
            </ol>
            <!-- 设置轮播图片 -->
            <div class="carousel-inner" role="listbox">
              <div class="item active">
                <img src="__PUBLIC__/images/8.jpg" alt="">
                <div class="carousel-caption">
                  <h3></h3>
                  <p></p>
                </div>
              </div>
              <div class="item">
                <img src="__PUBLIC__/images/8.jpg" alt="">
                <div class="carousel-caption">
                  <h3></h3>
                  <p></p>
                </div>
              </div>
              <div class="item">
                <img src="__PUBLIC__/images/8.jpg" alt="">
                <div class="carousel-caption">
                  <h3></h3>
                  <p></p>
                </div>
              </div>
            </div>
                <a class="left carousel-control " href="#slidershow" role="button" data-slide="prev">
                  <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#slidershow" role="button" data-slide="next">
                  <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
      </div>
    </div>
  </div>
  <!--目录导航-->
  <div class="asortment">
  <div class="container-fluid">
    <div class="row">
      <div class=" col-md-12">
        <div class="navbar navbar-default" role="navigation">
          <ul class="nav navbar-nav nav-contents">
          <?php if(is_array($data)): foreach($data as $key=>$h): ?><li><a href="<?php echo U('Index/Homepage/showThisCateArticle',array('id'=>$h['assortmentid']));?>"><?php echo ($h["name"]); ?></a></li><?php endforeach; endif; ?>
             <li>
                 <a class="dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                            排序
                 <span class="caret"></span>
                  </a>
                   <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                       <li><a href="#" id="readNumber">按阅读量</a></li>
                       <li><a href="#" id="commentNumber">按评论量</a></li>
                       <li><a href="#" id="likeNumber">按点赞量</a></li>
                       <li><a href="#" id="timeNumber">按时间</a></li>
                  </ul>
            </li>
           
          </ul>
          <div><img src="__PUBLIC__/images/ending.png" class="img-responsive"></div>
        </div>
      </div>
    </div>
  </div>
  </div>
  <!--文章列表-->
  <div class="article_list">
  <div class="container content-text">
    <div class="row list">
     <?php if(is_array($info)): foreach($info as $key=>$v): ?><div class="article_item col-md-4">
        <div class="article_content">
          <a href="<?php echo U('Index/Homepage/articlepage',array('id'=>$v['articleid']));?>" class="thumbnail" style="background: url(__PUBLIC__/images/bj4_7.jpg)no-repeat center top;background-size: cover;"><div class="read"></div></a>
        </div>
        <div class="article_intro">
          <h4>
            <a href="<?php echo U('Index/Homepage/articlepage',array('id'=>$v['articleid']));?>" class="article_title navbar-link"><?php echo ($v["title"]); ?></a>
          </h4>
          <div class="article_main">
            <p><?php echo ($v["introduce"]); ?></p>
          </div>
          <div class="article_info">
           <div class="info article_click"><span class="glyphicon glyphicon-eye-open" aria-hidden="true" ></span>&nbsp;<?php echo ($v["readnumber"]); ?></div>
          <div class="info article_comment"><span class="glyphicon glyphicon-comment" aria-hidden="true" ></span>&nbsp;<?php echo ($v["commentnumber"]); ?></div>
          <div class="info article_pause"><span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span>&nbsp;<?php echo ($v["likenumber"]); ?></div>
          <div class="info article_time"><span class="article_time"></span>&nbsp;<?php echo ($v["time"]); ?></div>
          <!--
            <a href="<?php echo U('Index/Homepage/articlepage',array('id'=>$v['articleid']));?>" class="btn btn-primary">浏览全文</a>
           -->
          </div>
        </div>
      </div><?php endforeach; endif; ?>   
    </div>
  </div>
  </div>

</div>
</body>
</html>