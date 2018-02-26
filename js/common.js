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
	
	// game start
	$('.m-visual__button').on('click', function(){
		location.href = "game.php";

		return false;
	});
	

});
