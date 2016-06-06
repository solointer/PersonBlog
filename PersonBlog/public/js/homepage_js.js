// JavaScript Document
window.onload = function() {
	$(function () {
		$(window).scroll(function () {
			var winTop = $(window).scrollTop();
			if (winTop >= 5) {
				alert("a");
				$('.header').addClass('sticky_header');
			} else {
				$('.header').removeClass('sticky_header');
			}
			/*if (winTop >= 440) {
				$('.asortment').slideUp("slow");
			}
			else if (winTop < 700) {
				$('.asortment').slideDown("slow");
			}*/
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

}