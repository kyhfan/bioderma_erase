$(document).ready(function(event){
	//	 input placeholder 
	var forms;
	forms = $('input');
	forms.placeholder();
	
	// drawer 
	var drawer = drawer || (function() {
		var  trigger = $('.c-drawer__trigger'),
                burger = $('.c-drawer__burger'),
                burgerTop = $('.c-drawer__burger--top'),
                burgerMiddle = $('.c-drawer__burger--middle'),
                burgerBottom = $('.c-drawer__burger--bottom'),
				isOpened = false;

			trigger.on('click', toggle);

			$('.c-header').on('click', function(event){
				if ( event.target == this ){
					closeMotion();
					$('html').removeClass('is-popup-open');
					$('.c-header').removeClass('c-header--active');

					isOpened = false;
				}
			 });

			function toggle(event) {
				TweenMax.killAll();

				if (isOpened) {
					$('html').removeClass('is-popup-open');
					$('.c-header').removeClass('c-header--active');
					closeMotion();
					$('.gauge__adds').stop();
					
					isOpened = false;
					
				} else {
					$('html').addClass('is-popup-open');
					$('.c-header').addClass('c-header--active');
					openMotion();

					isOpened = true;
				}
				
				return false;
			}

		function openMotion() {
            var openTimeline = new TimelineMax();

			openTimeline.to(burgerTop, 0.3, { y: 0}, 'action1')
				.to(burgerBottom, 0.3, { y: 0}, 'action1')
				.to(burgerMiddle, 0.3, { opacity: 0 }, 'action1')
				.to(burgerTop, 1, { ease: Elastic.easeOut.config(1, 0.3), y: -1, rotation: 45 }, 'action2')
				.to(burgerBottom, 1, { ease: Elastic.easeOut.config(1, 0.3), y: -1, rotation: -45 }, 'action2');
		}

		function closeMotion() {
			var closeTimeline = new TimelineMax();

			closeTimeline.to(burgerTop, 0.2, { rotation: 0 }, 'action1')
				.to(burgerBottom, 0.3, { rotation: 0 }, 'action1')
				.to(burgerMiddle, 0.3, { delay: 0.1, opacity: 1 }, 'action1')
				.to(burgerTop, 1, { ease: Elastic.easeOut.config(1, 0.3), y: -5 }, 'action2')
				.to(burgerBottom, 1, { ease: Elastic.easeOut.config(1, 0.3), y: 5 }, 'action2');
		}
	 })();

	// popup
	$('.c-popup__close').on('click', function(){
		$('html').removeClass('is-popup-open');
		$(this).parent().parent().removeClass('c-popup--active');

		return false;
	});

	// header 
	$(window).scroll(function(){
		var scTop = $(this).scrollTop();
		if ( scTop > 20 ){
			$('.c-header').addClass('c-header--scroll');
		}else {
			$('.c-header').removeClass('c-header--scroll');
		}
	});

	var scTop = $(window).scrollTop();
	if ( scTop > 20 ){
		$('.c-header').addClass('c-header--scroll');
	}else {
		$('.c-header').removeClass('c-header--scroll');
	}
	
});
