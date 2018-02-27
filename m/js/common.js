$(document).ready(function(){
	//	 input placeholder 
	var forms;
	forms = $('input');
	forms.placeholder();

	// popup
	$('.c-popup__close').on('click', function(){
		$('html').removeClass('is-popup-open');
		$(this).parent().parent().removeClass('c-popup--active');

		return false;
	});

	// header 
	$(window).scroll(function(){
		var scTop = $(this).scrollTop();
		if ( scTop > 50 ){
			$('.c-header--main').addClass('c-header--active');
		}else {
			$('.c-header--main').removeClass('c-header--active');
		}
	});
	
});
