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
		$('.load-more-btn').click(function(){
			var btn = $(this).data('btn'),
				data = {
				'action': 'load_more',
				'btn': btn,
				'offset': objects_offset(btn),
				'post_type': btn == 'blog' ? 'post' : 'product',
				'posts_per_page': btn == 'blog' ? 6 : 9,
				'category': $(this).data('category')
			};
			if(data.offset < 6){
				$(this).hide();
				return;
			}
			$.post(pw_ajax_object.ajaxurl, data, function(response) {
				append_objects(btn, response);
			});
		});
		function objects_offset(btn){
			return btn == 'blog' ? $('.blogs > article').length : $('.products-grid > div').length;
		}
		function append_objects(btn, markup){
			var selector = btn == 'blog' ? '.blogs' : '.products-grid';
			$(selector).append(markup);
			after_ajax(btn);
		}
		function after_ajax(btn){
			var count = $('.ajax-loaded').length;
			if(btn == 'blog' && count < 6){
				$('.load-more-btn').hide();
			} else {
				if(count < 9){
					$('.load-more-btn').hide();
				}
			}
			$('.ajax-loaded').removeClass('ajax-loaded');
		}
		function hide_load_more(){
			if($('.load-more-btn').data('btn') == 'blog'){
				if($('.blogs > article').length < 6){
					$('.load-more-btn').hide();
				}
			}
			if($('.load-more-btn').data('btn') == 'home' || $('.load-more-btn').data('btn') == 'product'){
				if($('.products-grid > div').length < 9){
					$('.load-more-btn').hide();
				}
			}
		}
		hide_load_more();
	});
})(jQuery);