// JavaScript Document
window.onload = function() {
	var comment_textarea = document.getElementsByClassName("message_textarea")[0];
	//	回复框获取焦点
	comment_textarea.onfocus = function() {
		this.parentNode.className = "message_area message_area_on";
		this.value = this.value == "评论…" ? "" : this.value;
        //this.onkeyup();
	}
	//	回复框失去焦点
    comment_textarea.onblur = function () {
		var me = this;
        if (me.value == "" || me.value == null) {
        	timer = setTimeout(function () {
                me.value = "评论…";
                me.parentNode.className = "message_area";
            }, 200);
        }
    }
    /*	评论按键事件
    comment_textarea.onkeyup = function () {
        var val = this.value;
        var len = val.length;
        var els = this.parentNode.children;
        var btn = els[1];
        var word = els[2];
        if (len <=0 || len > 140) {
            btn.className = "message_button message_button_off";
        }
        else {
            btn.className = "message_button";
        }
        word.innerHTML = len + "/140";
    }*/
	
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
	
	/* 发评论
     * @param box 每个分享的div容器
     * @param el 点击的元素
     */
    function reply(box, el) {
		var commentList = box.getElementsByClassName('message_content')[0];
        var textarea = el.parentNode.getElementsByClassName('message_textarea')[0];
        var commentBox = document.createElement('div');
        commentBox.className = 'message_item';
        commentBox.innerHTML =
			'<div class="container">'+   
				'<div class="row">'+
                	'<div class="col-md-12">'+
						'<div class="item_content">'+
                        	'<div class="media">'+
                            	'<div class="media-left">'+
                                	'<a href="#">'+
                                    	'<img class="media-object head" src="images/comment_1.jpg" alt="...">'+
                                    '</a>'+
                                '</div>'+
                                '<div class="media-body">'+
                                	'<h4 class="media-heading">'+'我:'+'</h5>'+
                                    '<p>'+textarea.value+'</p>'+
                                '</div>'+
                                '<div class="message_info text-right">'+
                                	'<span class="message_time">'+formateDate(new Date())+'</span>'+
                                    '<span class="message_type">'+'来自QQ'+'</span>'+
                                '</div>'+
                            '</div>'+
                        '</div>'+
                    '</div>'+
                '</div>'+
			'</div>'
        commentList.insertBefore(commentBox,commentList.firstChild);
        textarea.value = '';
        textarea.onblur();
    }
	  function handler(res) {
          if (res.readyState === 4) {
              if (res.status===200) { 
			  //alert("SA");
                var data = JSON.parse(res.responseText);
				alert(data);
				var commentList = document.getElementsByClassName('message_content')[0];
				var wrap_content = document.getElementsByClassName('wrap_content')[0];
				
                 for(var i=0;i<data['aa'].length;i++){
					  var commentBox = document.createElement('div');
					commentBox.className = 'message_item';
					commentBox.innerHTML =                   
					  '<div class="container">'+   
						'<div class="row">'+
						'<div class="col-md-12">'+
						'<div class="item_content">'+
                        	'<div class="media">'+
                            	'<div class="media-left">'+
                                	'<a href="#">'+
                                    	'<img class="media-object head" src="images/comment_1.jpg" alt="...">'+
                                    '</a>'+
                                '</div>'+
                                '<div class="media-body">'+
                                	'<h4 class="media-heading">'+'我:'+'</h5>'+
                                    '<p>'+data['aa'][i].content+'</p>'+
                                '</div>'+
                                '<div class="message_info text-right">'+
                                	'<span class="message_time">'+data['aa'][i].time+'</span>'+
                                    '<span class="message_type">'+'来自QQ'+'</span>'+
                                '</div>'+
                            '</div>'+
                        '</div>'+
                    '</div>'+
                '</div>';
			
					  
					  alert(data['aa'][i].content);
                       commentList.appendChild(commentBox);    
                    } 
   
              } else {
                  alert("发生错误：" + res.status);
              }
        }

        }    
	function writemessage()
	{
		   var textarea = document.getElementsByClassName('message_textarea')[0];
		     //异步传输数据
        var request = new XMLHttpRequest();
       // var clickid=readnumber.id;
         request.open("POST", handlurl);
        var data="username="+"{$_SESSION['username']}"
		+"&content="+textarea.value
		+"&time="+formateDate(new Date());
        request.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    alert(data);
        request.onreadystatechange = function() {
          handler(request);
        };
        
        request.send(data);
		textarea.value='';
	}
	var message_list = document.getElementsByClassName("message_item");
	var input_message = document.getElementsByClassName("input_message")[0];
	
	input_message.onclick = function(e) {
		e = e || window.event;
		var el = e.target || e.srcElement;	// el 存放触发元素
							
		switch(el.className) {
			case "message_button":
			
               	//reply(el.parentNode.parentNode.parentNode, el);
				writemessage();
                break;
		}
	}
}