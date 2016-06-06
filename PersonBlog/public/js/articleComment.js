// JavaScript Document
window.onload = function() {

	var comment_list = document.getElementsByClassName("comment_item");
	var ee = "{$an}";
	alert(ee);
	
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
    function reply(box, el) {
        var commentList = box.getElementsByClassName('content_reply_list')[0];
        var textarea = box.getElementsByClassName('reply_comment')[0];
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
        textarea.value = '';
        textarea.onblur();
    }
	
	/**
     * 赞回复
     * @param el 点击的元素
     */
    function praiseReply(el) {
        var myPraise = parseInt(el.getAttribute('my'));
        var oldTotal = parseInt(el.getAttribute('total'));
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
            textarea.onkeyup();
        }
        else {
            removeNode(commentBox);
        }
    }
	
	for(var i = 0; i < comment_list.length; i++) {
		comment_list[i].onclick = function(e) {
			e = e || window.event;
			var el = e.target || e.srcElement;	// el 存放触发元素
			
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
		
		//	回复评论输入框
		var reply_textarea = document.getElementsByClassName("reply_comment")[i];
			
		//	回复框获取焦点
		reply_textarea.onfocus = function() {
			//alert();
			this.parentNode.className = "reply_area reply_area_on";
			this.value = this.value == "评论…" ? "" : this.value;
            this.onkeyup();
		}
		//	回复框失去焦点
        reply_textarea.onblur = function () {
			var me = this;
            if (me.value == "" || me.value == null) {
                timer = setTimeout(function () {
                    me.value = "评论…";
                    me.parentNode.className = "reply_area";
                }, 200);
            }
        }
        //	评论按键事件
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