(function($){
	$(document).ready(function(){
		$('.hamburger').click(function(){
			$('.main-nav').addClass('show');
		});
		$('.nav-close').click(function(){
			$('.main-nav').removeClass('show');
		});
		$('.drop-cats').click(function(){
			$('.drop-cats, .front-nav .categories').toggleClass('show');
		});
		$('.contact-link, .contact-link a').click(function(e){
			e.preventDefault();
			$('.popup-newsletter').fadeIn(300);
		});
		$('.close-popup').click(function(){
			$('.popup-newsletter').fadeOut(300);
		});
	});
})(jQuery);