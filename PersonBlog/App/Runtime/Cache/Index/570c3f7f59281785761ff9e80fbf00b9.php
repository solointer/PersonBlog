<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<title></title>
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
<!-- 链接评论板块的 CSS 文件 -->
<link rel="stylesheet" type="text/css" href="__PUBLIC__/css/comment_css.css" />
<!-- 链接文章内容板块的 CSS 文件 -->
<link rel="stylesheet" type="text/css" href="__PUBLIC__/css/article_css.css">
<!-- 链接文章评论板块的 JS 文件 
<script type="text/javascript"  src="__PUBLIC__/js/articleComment.js"></script>
-->
<!--
<style type="text/css">
  .reply_area{
    display: none;
  }

</style>-->
<script type="text/javascript">
    // JavaScript Document
window.onload = function() {
  //$(".reply_area:last").css("display","block");
    var comment_list = document.getElementsByClassName("comment_item");
    var replyobject='';
    var handle='<?php echo U('handle','','');?>';
    //格式化日期
    function formateDate(date) {
        var y = date.getFullYear();
        var m = date.getMonth() + 1;
        var d = date.getDate();
        var h = date.getHours();
        var mi = date.getMinutes();
        m = m > 9 ? m : '0' + m;
        return y + '-' + m + '-' + d + ' ' + h + ':' + mi;
    }
    function removeNode(node) {
        node.parentNode.removeChild(node);
    }
    
    /* 发评论
     * @param box 每个分享的div容器
     * @param el 点击的元素
     */
     /*文章点赞功能*/
    function handler(res,click) {
         if (res.readyState===4) {
            if (res.status===200) { 
                var data=res.responseText;
                alert(data);
              document.getElementById(click).getElementsByTagName("dd")[0].innerHTML=data;

            } else {
                alert("发生错误：" + res.status);
            }
        } 

        }     
function divicenumber(readnumber){
  //异步传输数据
        var request = new XMLHttpRequest();
        var clickid=readnumber.id;
        var articleid=document.getElementById("thisarticleid").value;
        request.open("POST", "<?php echo U('Index/ArticleLike/index','','');?>");
        var data="clickid="+clickid
         +"&articleid="+articleid;
        request.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        request.onreadystatechange = function() {
          handler(request,clickid);
        };
        
        request.send(data);
    
}
    var btnDigg=document.getElementById("btnDigg");
    var btnBury=document.getElementById("btnBury");
    btnBury.onclick=function(){divicenumber(btnBury);}
      btnDigg.onclick=function(){divicenumber(btnDigg);}


      /*实现评论 的排序
       function handlcommentreturn(res) {
          if (res.readyState === 4) {
              if (res.status===200) { 
                var data = JSON.parse(res.responseText);
                 for(var i=0;i<data['aa'].length;i++){
                     var comment_item = document.getElementsByClassName('comment_item')[0];
                      var list = document.getElementsByClassName('comment_list')[0];
                      comment_item.innerHTML=
                      '<a href="articlepage.html" class="thumbnail"><img src="__PUBLIC__/images/bj4_7.jpg"  alt=""></a>'+
                      '<div class="article_intro">'+
                        "<a href='<?php echo U(Index/Homepage/articlepage,array(id=>"+ data['aa'][i].readnumber +"));?>' class='article_title navbar-link'>"+data['aa'][i].title+'</a>'+
                        '<div class="article_main">'+
                        '<p>'+data['aa'][i].introduce+'</p>'+
                          '</div>'+
                        '<div class="article_info">'+
                        '<span class="glyphicon glyphicon-eye-open" aria-hidden="true" >'+data['aa'][i].readnumber+'</span>'+
                        '<span class="glyphicon glyphicon-comment" aria-hidden="true" >'+data['aa'][i].commentnumber+'</span>'+
                        '<span class="glyphicon glyphicon-thumbs-up" aria-hidden="true">'+data['aa'][i].likenumber+'</span>'+
                        '<span class="article_time">'+data['aa'][i].time+'</span>'+
                        '</div>'+'</div>';
                       alert(data['aa'][i].readnumber);
                       list.appendChild(article_item);    
                    } 
   
              } else {
                  alert("发生错误：" + res.status);
              }
        }

        }    
      function commentsort(readnumber){
  //异步传输数据
        var request = new XMLHttpRequest();
        var clickid=readnumber.id;
        //var articleid=document.getElementById("thisarticleid").value;
        request.open("POST", "<?php echo U('Index/CommentSort/commentNumberSort','','');?>");
        var data="clickid="+clickid;
        request.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        request.onreadystatechange = function() {
          handlcommentreturn(request);
        };
        
        request.send(data);
    
}
var early=document.getElementById("early");
var newmost=document.getElementById("newmost");
var like=document.getElementById("like");
early.onclick=function(){commentsort(early);}
      //实现评论的排序*/



     function reply(box, el) {
        //取得当前文章评论的id
        var articleid=document.getElementById("thisarticleid").value;
         var criticsid=box.getElementsByClassName("thiscriticsid")[0].value;
       //alert(criticsid);
        var commentList = box.getElementsByClassName('content_reply_list')[0];
        var textarea = box.getElementsByClassName('reply_comment')[0];
         // var user = commentBox.getElementsByClassName('user')[0].innerHTML;
        var commentBox = document.createElement('div');
        commentBox.className = 'reply_item clearfix';
        commentBox.setAttribute('user', 'self');
        commentBox.innerHTML =
            '<img class="reply_head" src="images/my.jpg" alt=""/>' +
                '<div class="reply_content">' +
                '<p class="reply_text"><span class="user">我：</span>' + textarea.value + '</p>' +
                '<div class="reply_info">' +
                formateDate(new Date()) +
                '<a href="javascript:;" class="reply_praise_button" total="0" my="0" style="">赞</a>' +
                '<a href="javascript:;" class="reply_operate">删除</a>' +
                '</div>' +
                '</div>'
        commentList.appendChild(commentBox);
        //将评论的内容传到数据库
        
       
//异步传输数据
        var request = new XMLHttpRequest();
        request.open("POST", "<?php echo U('Admin/Critics/criticsHandle','','');?>");
        var data="username="+"<?php echo ($_SESSION['username']); ?>"
        +"&userid="+"<?php echo ($_SESSION['uid']); ?>"
        +"&criticstime="+formateDate(new Date())
        +"&criticscontent="+textarea.value
        +"&replyobject="+replyobject
        +"&articleid="+articleid
        +"&criticsid="+criticsid;
        //alert(data);
         request.setRequestHeader("Content-type","application/x-www-form-urlencoded");
          
         request.send(data);
        alert(data);
 
    request.onreadystatechange = function() {
        if (request.readyState===4) {
            if (request.status===200) { 
              //  var data = JSON.parse(request.responseText);
                var data=request.responseText;
               // alert(data);
               // if (data.success) { 
                   // document.getElementById("createResult").innerHTML = data.msg;
                 //   alert("yes");
               // } else {
                    //document.getElementById("createResult").innerHTML = "出现错误：" + data.msg;
                 //   alert("no");
              //  }
            } else {
                alert("发生错误：" + request.status);
            }
        } 
    }
//异步传输数据结束
       textarea.value = '';
         textarea.onblur();
    }
    
    /**
     * 赞回复
     * @param el 点击的元素
     */
    function praiseReply(el) {
        var box=el.parentNode.parentNode.parentNode;
        var myPraise = parseInt(el.getAttribute('my'));
        var oldTotal = parseInt(el.getAttribute('total'));
         var criticsid=box.getElementsByClassName("thiscriticsid")[0].value;
         var replyid=box.getElementsByClassName("thisreply")[0].value;
            alert(replyid);
           var thisreplyobject=box.getElementsByClassName("thisreplyobject")[0].value;
           alert(thisreplyobject);
        var newTotal;
        if (myPraise == 0) {
            newTotal = oldTotal + 1;
            el.setAttribute('total', newTotal);
            el.setAttribute('my', 1);
            el.innerHTML = newTotal + '&nbsp;&nbsp;&nbsp;取消赞';
        }
        else {
            newTotal = oldTotal - 1;
            el.setAttribute('total', newTotal);
            el.setAttribute('my', 0);
            el.innerHTML = (newTotal == 0) ? '赞' : newTotal + '&nbsp;&nbsp;&nbsp;赞';
        }
        //el.style.display = (newTotal == 0) ? '' : 'inline-block'
        //当出发这个事件的时候把点赞异步传输到后台，注意是ADMIN
          var request = new XMLHttpRequest();
        request.open("POST", "<?php echo U('Index/CriticsLike/countContentLike','','');?>");
        var data="likenumber="+newTotal
          +"&replyobject="+thisreplyobject
          +"&replyid="+replyid
        +"&criticsid="+criticsid;
        //alert(data);
         request.setRequestHeader("Content-type","application/x-www-form-urlencoded");
          
         request.send(data);
        alert(data);
 
    request.onreadystatechange = function() {
        if (request.readyState===4) {
            if (request.status===200) { 
              //  var data = JSON.parse(request.responseText);
                var data=request.responseText
               // alert(data);
               // if (data.success) { 
                   // document.getElementById("createResult").innerHTML = data.msg;
                 //   alert("yes");
               // } else {
                    //document.getElementById("createResult").innerHTML = "出现错误：" + data.msg;
                 //   alert("no");
              //  }
            } else {
                alert("发生错误：" + request.status);
            }
        } 
    }
//异步传输数据结束

    }
    
    /**
     * 操作留言
     * @param el 点击的元素
     */
    function operate(el) {
        var commentBox = el.parentNode.parentNode.parentNode;
        var box = commentBox.parentNode.parentNode.parentNode;
        var txt = el.innerHTML;
        var user = commentBox.getElementsByClassName('user')[0].innerHTML;
        var textarea = box.getElementsByClassName('reply_comment')[0];
        if (txt == '回复') {
            textarea.focus();
            textarea.value = '回复' + user;
            replyobject=user;
            textarea.onkeyup();
        }
        else {
            removeNode(commentBox);
        }
    }
    //事件委托
    for(var i = 0; i < comment_list.length; i++) {
        comment_list[i].onclick = function(e) {
            e = e || window.event;
            var el = e.target || e.srcElement;  // el 存放触发元素
            
            switch(el.className) {
                case "close":
                    removeNode(el.parentNode);
                    break;
                case "info_praise_button":
                    praiseReply(el);
                    break;
                case "reply_button":
                    reply(el.parentNode.parentNode.parentNode, el);
                    break;
                case 'reply_praise_button':
                    praiseReply(el);
                    break;
                case 'reply_operate':
                    operate(el);
                    break;
            }
        }
        
        //  回复评论输入框
        var reply_textarea = document.getElementsByClassName("reply_comment")[i];
            
        //  回复框获取焦点
        reply_textarea.onfocus = function() {
       
       var nowuser= document.getElementById("nowuser").value;
        
        if(nowuser)
        {
           // alert('yes');
              this.parentNode.className = "reply_area reply_area_on";
            this.value = this.value == "评论…" ? "" : this.value;
            this.onkeyup();
        }
        else
        {
            alert("请登陆后在评论");
        }

          
        }
        //  回复框失去焦点
        reply_textarea.onblur = function () {
            var me = this;
            if (me.value == "" || me.value == null) {
                timer = setTimeout(function () {
                    me.value = "评论…";
                    me.parentNode.className = "reply_area";
                }, 200);
            }
        }
        //  评论按键事件
        reply_textarea.onkeyup = function () {
            var val = this.value;
            var len = val.length;
            var els = this.parentNode.children;
            var btn = els[1];
            var word = els[2];
            if (len <=0 || len > 140) {
                btn.className = "reply_button reply_button_off";
            }
            else {
                btn.className = "reply_button";
            }
            word.innerHTML = len + "/140";
        }
    }
}
</script>
</head>

<body>

<!-- 导航栏开始 -->
    <nav class="header">
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
              <form class="navbar-form navbar-right" method="post" action="<?php echo U('Index/Inquire/showInquireArticle');?>" role="search">
                <div class="form-group">
                  <input type="text" class="form-control" name="search" placeholder="搜索你喜欢的文章">
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
       <?php if(is_array($info)): foreach($info as $key=>$h): ?><div class="title text-center"><?php echo ($h["title"]); ?></div>
<input type="hidden" id="thisarticleid" value="<?php echo ($h["articleid"]); ?>"><?php endforeach; endif; ?>
        <input type="hidden" id="nowuser" value="<?php echo ($_SESSION['username']); ?>">
    </nav>
<!-- 导航栏结束 -->

<!-- 文章开始 -->
<div id="article">
	<article>
    	<!-- 
            文章标题:
                1、将背景颜色设置为黑色作为遮罩层；
                2、使用图片作为背景，并更改透明度
        -->
               <?php if(is_array($info)): foreach($info as $key=>$h): ?><div id="article_head">
            <div class="article_info">
            	<span class="writer"><?php echo ($h["author"]); ?></span>
                <span>发表日期</span><?php echo (date('y-m-d H:i',$h["time"])); ?>
                <span><?php echo ($h["readnumber"]); ?></span>人阅读
            </div>
   		</div><?php endforeach; endif; ?>
        <!-- 文章内容居中显示 -->
        <div id="article_body">
        <?php if(is_array($info)): foreach($info as $key=>$h): ?><p><?php echo ($h["content"]); ?></p>
      
        	<p>
            	"才5月，就已经热的这么过分了。是顶着骄阳白白浪费太阳能，还是借着早来的热浪推启2014年UXC的火热校园招聘，360 UXC说：别浪费！开始吧！"
            	<br>
                首站——北印（北京印刷学院）。让UXC来告诉你，互联网时代你该作出更有眼光的选择。
            </p>
            <p>
            	"本次校招职位涵盖了UXC全部岗位需求：用户研究、交互设计、视觉设计等职位。校招应聘成功的同学们将得到进入360 UXC部门实习的机会，实习完成后，佼佼者将有机会直接转正，正式成为360 UXC团队中的一员！"
            </p>
            <p>
            	"下面我们来看看来自现场的报道："
                <br>
                <img src="__PUBLIC__/images/3.png"/>
                <br>
                "身着汉服，佩戴古玉，咦~好特别的女子呢。。。原来她是360 UXC的掌门人齐娜女士！她为同学们介绍了360以及有趣的360 UXC团队。她的演讲并不像教室外烈日般炽热，却是表里如一的清新流畅，建起了同学们对360 UXC的第一层向往。"
                <br>
                <img src="__PUBLIC__/images/4.png">
                <br>
                "这位白净有型的男生是UXC里产品体验分析的主管柳科。他深入浅出的给同学们普及了什么是用户体验分析，如何找到产品的感觉，分析的方法有哪些。同学，若是你不但耍得一手好设计，更对产品体验分析感兴趣，这就现场拜师吧。"
            </p>
            <p>
                "又一位姑娘登场，别被温柔的齐肩短发迷惑了，她可是会用鼠标改造世界的设计狮女侠袁雪梅。她用各种精美犀利的UI设计作品直观的展示了360 UXC的实力以及工作内容。这些作品把同学们对UXC的向往推向了高潮"
            </p>
            <p>
            	"好的设计狮都该是很有个人风格的，有棱有角才有料。对！我们就爱有棱有角的你！"
                <br>
                "2014 UXC校招首站告捷，即将整装再发——欢迎怀揣神功心属互联网的同学骚年们，把握机会，加入我们！"
                <br>
                "忘了吃饭也表忘了UXC的招聘链接："
            </p>
             <!-- 文章的顶与踩 -->
            <div id="digg">
                <dl id="btnDigg" class="digg digg_disable">
                    <dt>顶</dt>
                    <dd><?php echo ($h["likenumber"]); ?></dd>
               </dl>
                <dl id="btnBury" class="digg digg_disable">
                   <dt>踩</dt>
                    <dd><?php echo ($h["dislikenumber"]); ?></dd>
               </dl>
           </div><?php endforeach; endif; ?>
        </div>

    </article>

</div>
<!-- 文章结束 -->

<hr/>
<!--相关文章-->
<div class="about_list container">
    <div class="row">
      <div class="col-md-12">
        <p>相关文章</p>
        <ul>
            <li><a><span class="glyphicon glyphicon-tag" aria-hidden="true">&nbsp;</span>敢不敢做点用户真正愿意去买单的产品？</a></li>
            <li><a><span class="glyphicon glyphicon-tag" aria-hidden="true">&nbsp;</span>iOS 7和Android 4.4奇巧巧克力：巨人之争</a></li>
            <li><a><span class="glyphicon glyphicon-tag" aria-hidden="true">&nbsp;</span>进击！二次元—MXD BIG DAY 北京第10期</a></li>
            <li><a><span class="glyphicon glyphicon-tag" aria-hidden="true">&nbsp;</span>七个隆冬呛—MXD BIG DAY 北京第9期</a></li>
            <li><a><span class="glyphicon glyphicon-tag" aria-hidden="true">&nbsp;</span>春天花花同学会 — MXD BIG DAY深圳第2期</a></li>
        </ul>
      </div>
    </div>
</div>
<!-- 文章评论开始 -->
<div id="comment">
	<!-- 文章功能模块 comment_menu：
    	 	1、统计评论数量 comment_num
            2、按要求排序 comment_order
    -->
   	<div id="comment_menu">
    	<span id="comment_num">100</span>条评论
    	<div id="comment_order">
        	<span id="like"></span>
            <span id="newmost"></span>
            <span id="early"></span>
        </div>
    </div>
    <!-- 评论列表，每个 comment_item 表示一条评论
    		1、关闭按钮 close X
            2、评论者头像 head
            3、评论部分 comment_content
            	①、评论部分的内容 content_main
            		a、评论者账号名，评论文本 main_text
                	b、评论图片 main_image
                ②、评论部分的信息 content_info
                	a、评论的点赞按钮 info_praise_button
                    b、评论的日期 info_timetal
                ③、评论回复部分 content_reply_list
                	a、回复项 reply_item
                 		1)、回复者头像 reply_head
                        2)、回复部分 reply_content
                        	i、回复者账号名，回复文本 reply_text
                            ii、回复部分的信息 reply_info
                            	1、回复的日期 reply_time
                                2、回复的点赞按钮 reply_praise_button
                                3、对于回复的回复 reply_operate
                ④、回复区 reply_area
                	a、回复评论框 reply_comment
                    b、回复按钮 reply_button
    -->
  
    <?php if(is_array($data)): foreach($data as $key=>$h): if(is_array($h)): foreach($h as $key=>$v): ?><div class="comment_item clearfix">
        <div class="comment_content">
        	
            
            <div class="content_reply_list">
                <div class="reply_item clearfix" user="self">
                	<img class="reply_head" src="__PUBLIC__/images/my.jpg" alt=""/>
                    <div class="reply_content">
                        <p class="reply_text"><span class="user"><?php echo ($v["username"]); echo ($v["criticsid"]); ?></span><?php echo ($v["criticscontent"]); ?>
                          <input type="hidden" class="thisreply" value="1" name="replyid">
                         <input type="hidden" class="thiscriticsid" value="<?php echo ($v["criticsid"]); ?>">
                          <input type="hidden" class="thisreplyobject" value="<?php echo ($v["replyobject"]); ?>">
                        </p>
                        <div class="reply_info">
                        	<div class="reply_time">2014-02-19 14:36</div>
                            <a href="javascript:;" class="reply_praise_button" total="<?php echo ($v["likenumber"]); ?>" my="0" style="display: inline-block"><?php echo ($v["likenumber"]); ?> 赞</a> 
                        	<a href="javascript:;" class="reply_operate">回复</a>   
                        </div>
                     </div>
                </div>
            </div>
            
            <div class="reply">
             <?php if(is_array($v['replycontent'])): foreach($v['replycontent'] as $key=>$n): ?><div class="content_reply_list">
                <div class="reply_item clearfix" user="self">
                    <img class="reply_head" src="__PUBLIC__/images/my.jpg" alt=""/>
                    <div class="reply_content">
                        <p class="reply_text"><span class="user"><?php echo ($n["replyobject"]); ?></span><?php echo ($n["replycontent"]); ?>。
                           <input type="hidden" class="thisreply" value="<?php echo ($n["replyid"]); ?>" name="replyid">
                           <input type="hidden" class="thiscriticsid" value="<?php echo ($v["criticsid"]); ?>">
                            <input type="hidden" class="thisreplyobject" value="<?php echo ($n["replyobject"]); ?>">
                        </p>
                        <div class="reply_info">
                            <div class="reply_time">2014-02-19 14:36</div>
                            <a href="javascript:;" class="reply_praise_button" total="<?php echo ($n["likenumber"]); ?>" my="0" style="display: inline-block"><?php echo ($n["likenumber"]); ?>赞</a> 
                            <a href="javascript:;" class="reply_operate">回复</a>   
                        </div>
                     </div>
                </div>
            </div><?php endforeach; endif; ?>
            </div>
            

            <div class="reply_area">
                <textarea class="reply_comment" autocomplete="off">评论…</textarea>
                <button class="reply_button ">回 复</button>
                <span class="reply_words"><span class="length">0</span>/140</span>
            </div>
        </div>
    </div><?php endforeach; endif; endforeach; endif; ?>
    
    <!--
    <div class="comment_item clearfix">
    	<a class="close" href="javascript:;">×</a>
        <img class="head" src="__PUBLIC__/images/comment_2.jpg" alt=""/>
        <div class="comment_content">
        	<div class="content_main">
            	<p class="main_text">
                	<span class="user">人在旅途：</span>三亚的海滩很漂亮。
                </p>
                <img class="main_image" src="__PUBLIC__/images/img5.jpg" alt=""/>
            </div>
            <div class="content_info clearfix">  
                <div class="info_time" style="background:url(images/bg1.jpg) no-repeat left top">02-14 23:01</div>
                <a class="info_praise_button" href="javascript:;" style="background:url(__PUBLIC__/images/bg2.jpg) no-repeat left top" total="0" my="0">赞</a>
            </div>
            <div class="content_reply_list">
                <div class="reply_item clearfix" user="self">
                	<img class="reply_head" src="__PUBLIC__/images/comment_3.jpg" alt=""/>
                    <div class="reply_content">
                        <p class="reply_text"><span class="user">老鹰：</span>我也想去三亚。</p>
                        <div class="reply_info">
                        	<div class="reply_time">2014-02-19 14:36</div>
                            <a href="javascript:;" class="reply_praise_button" total="1" my="0" style="display: inline-block">1 赞</a> 
                        	<a href="javascript:;" class="reply_operate">回复</a>   
                        </div>
                     </div>
                </div>
            </div>
            <div class="reply_area">
                <textarea class="reply_comment" autocomplete="off">评论…</textarea>
                <button class="reply_button ">回 复</button>
                <span class="reply_words"><span class="length">0</span>/140</span>
            </div>
    	</div>
    </div>
    
     <div class="comment_item clearfix">
    	<a class="close" href="javascript:;">×</a>
        <img class="head" src="__PUBLIC__/images/comment_4.jpg" alt=""/>
        <div class="comment_content">
        	<div class="content_main">
            	<p class="main_text">
                	<span class="user">小Y：</span>英国艺术家 Jane Perkins 能利用很多不起眼的东西进行创作，甚至是垃圾。首饰、纽扣、玩具等等都可以作为他创作的工具并创作出惟妙惟肖的画作，丝毫不逊色于色彩丰富的颜料。
                </p>
            </div>
            <div class="content_info clearfix">
                <div class="info_time" style="background:url(images/bg1.jpg) no-repeat left top">02-14 23:01</div>
                <a class="info_praise_button" href="javascript:;" style="background:url(__PUBLIC__/images/bg2.jpg) no-repeat left top" total="0" my="0">赞</a>
            </div>
            <div class="content_reply_list">
            </div>
            <div class="reply_area">
                <textarea class="reply_comment" autocomplete="off">评论…</textarea>
                <button class="reply_button">回 复</button>
                <span class="reply_words"><span class="length">0</span>/140</span>
            </div>
    	</div>
    </div>
    
    <hr/>
      -->
    <!-- 发表文章评论 
    <div class="comment_area">
    	<textarea class="comment_textarea" autocomplete="off">评论…</textarea>
        <button class="comment_button">发 表</button>
    </div>
-->
</div>
<!-- 文章评论结束 -->

<!—自适应布局,导入bootstrap框架布局--> 
<script src="__PUBLIC__/js/jquery-1.11.1.min.js"></script> 
<script src="__PUBLIC__/js/bootstrap.min.js"></script>
</body>
</html>