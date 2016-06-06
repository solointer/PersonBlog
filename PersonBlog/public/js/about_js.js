// JavaScript Document
window.onload = function() {
	$(function () {
		$(window).scroll(function () {
			var winTop = $(window).scrollTop();
			if (winTop >= 150) {
				if($('.about_us h1').html() == null || $('.about_us h1').html() ==""){
					$('.about_us h1').append('<h1 class="text-center">关于我们</h1>');
				}
			}
		});
	});
}