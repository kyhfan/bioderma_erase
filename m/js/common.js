$(document).ready(function(event){
	//	 input placeholder 
	var forms;
	forms = $('input');
	forms.placeholder();
	Kakao.init('45b1772fcb35228af4b3430ebf90a0d0');

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

	// popup close
	$('.c-popup__close').on('click', function(){
		$('html').removeClass('is-popup-open');
		$(this).parent().parent().removeClass('c-popup--active');

		return false;
	});

	// popup close
	$('.c-popup__close2').on('click', function(){
		if (confirm("이 창을 닫으면 메인으로 이동합니다. 이동하시겠습니까?"))
			location.href = "index.php";
		
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
	
	var yt_width = $(window).width() - 74;
	var yt_height = (yt_width * 9) / 16;
	$("#ytplayer").width(yt_width);
	$("#ytplayer").height(yt_height);
});

	// 페이지 이동
	function movePage(val) {
		location.href = val + ".php";
		
		return false;
	}

	// popup open
	function popupOpen(param) {
		$("#"+param).addClass("c-popup--active");
		$("html").addClass("popupOpened");

		return false;
	}

	// popup closw
	function popupClose(param) {
		$('html').removeClass('is-popup-open');
		$('#' + param).removeClass('c-popup--active');
		$("html").removeClass("popupOpened");
		// $("#"+param).removeClass("ios-fixed");

		return false;
	}



	function levelSubmit(level) {
        var level_name      = $("#level" + level + "_name").val();
        var level_phone     = $("#level" + level + "_phone").val();
        var level_addr      = $("#level" + level + "_addr").val();
        var level_addr2      = $("#level" + level + "_addr2").val();

		if (level_name == "")
		{
			alert("이름을 입력해 주세요.");
			$("#level" + level + "_name").focus();
			return false;
		}
		
		if (level_phone == "")
		{
			alert("전화번호를 입력해 주세요.");
			$("#level" + level + "_phone").focus();
			return false;
		}
		
		if (level_phone.length < 11)
		{
			alert("올바른 전화번호를 입력해 주세요.");
			$("#level" + level + "_phone").focus();
			return false;
		}

		if (level_addr == "")
		{
			alert("주소를 입력해 주세요.");
			return false;
		}
		
		if (level_addr2 == "")
		{
			alert("상세주소를 입력해 주세요.");
			$("#level" + level + "_addr2").focus();
			return false;
		}
		
		if ($("#level" + level+ "_agree1").prop("checked") === false)
		{
			alert('개인 정보 수집 및 이용약관에 동의하셔야만 이벤트 참여가 가능합니다.');
			return false;
		}
		
		if ($("#level" + level+ "_agree2").prop("checked") === false)
		{
			alert('개인 정보 취급 위탁 약관에 동의하셔야만 이벤트 참여가 가능합니다.');
			return false;
		}

        $.ajax({
			type:"POST",
			data:{
				"exec"					: "level_input_info",
				"level_name"			: level_name,
				"level_phone"			: level_phone,
				"level_addr"			: level_addr,
				"level_addr2"			: level_addr2,
				"level"			        : level

			},
			url: "../main_exec.php",
			success: function(response){
				var res_arr = response.split("||");

				switch(res_arr[1])
				{
					case "blank" :
						popupClose("popup_level" + level + "_clear");
						popupOpen("popup_winner_draw");
					break;
					case "goods" :
						popupClose("popup_level" + level + "_clear");
						popupOpen("popup_winner_goods");
					break;
					case "kit" :
						popupClose("popup_level" + level + "_clear");
						popupOpen("popup_winner_kit");
					break;
					case "D" :
						alert("오늘은 이미 참여하셨습니다. 내일 다시 참여해주세요.");
						location.href = "index.php";
					break;
				}
			}
		});
		return false;
	}

	var element_layer = null;
	function findAddr(level){
		element_layer = document.getElementById('layer');
		
		new daum.Postcode({
			oncomplete: function(data) {
				// 검색결과 항목을 클릭했을때 실행할 코드를 작성하는 부분.
	
				// 각 주소의 노출 규칙에 따라 주소를 조합한다.
				// 내려오는 변수가 값이 없는 경우엔 공백('')값을 가지므로, 이를 참고하여 분기 한다.
				var fullAddr = data.address; // 최종 주소 변수
				var extraAddr = ''; // 조합형 주소 변수
	
				// 기본 주소가 도로명 타입일때 조합한다.
				if(data.addressType === 'R'){
					//법정동명이 있을 경우 추가한다.
					if(data.bname !== ''){
						extraAddr += data.bname;
					}
					// 건물명이 있을 경우 추가한다.
					if(data.buildingName !== ''){
						extraAddr += (extraAddr !== '' ? ', ' + data.buildingName : data.buildingName);
					}
					// 조합형주소의 유무에 따라 양쪽에 괄호를 추가하여 최종 주소를 만든다.
					fullAddr += (extraAddr !== '' ? ' ('+ extraAddr +')' : '');
				}
	
				zipcode	= data.zonecode;
				addr1		= fullAddr;
				// document.getElementById('mb_zipcode').value = zipcode; //5자리 새우편번호 사용
				// document.getElementById('mb_addr1').value = "("+zipcode+") "+addr1;
				// document.getElementById('mb_addr1').value = addr1;
				document.getElementById('level' + level + '_addr').value 	= "(" + zipcode + ") " + addr1;
				$("#level" + level + "_addr").attr("readonly",false);
				$("#level" + level + "_addr2").focus();

				// iframe을 넣은 element를 안보이게 한다.
				// (autoClose:false 기능을 이용한다면, 아래 코드를 제거해야 화면에서 사라지지 않는다.)
				element_layer.style.display = 'none';
			},
			width : '100%',
			height : '100%'
		}).embed(element_layer);
	
		// iframe을 넣은 element를 보이게 한다.
		element_layer.style.display = 'block';
	
		// iframe을 넣은 element의 위치를 화면의 가운데로 이동시킨다.
		initLayerPosition();
	}
	
	function closeDaumPostcode() {
		// iframe을 넣은 element를 안보이게 한다.
		element_layer.style.display = 'none';
	}
	
	function initLayerPosition(){
		// var width = 300; //우편번호서비스가 들어갈 element의 width
		var width = $(window).width()*0.94; //우편번호서비스가 들어갈 element의 width
		var height = 360; //우편번호서비스가 들어갈 element의 height
		var borderWidth = 5; //샘플에서 사용하는 border의 두께
	
		// 위에서 선언한 값들을 실제 element에 넣는다.
		element_layer.style.width = width + 'px';
		element_layer.style.height = height + 'px';
		element_layer.style.border = borderWidth + 'px solid';
		// 실행되는 순간의 화면 너비와 높이 값을 가져와서 중앙에 뜰 수 있도록 위치를 계산한다.
		element_layer.style.left = (((window.innerWidth || document.documentElement.clientWidth) - width)/2) + 'px';
		element_layer.style.top = (((window.innerHeight || document.documentElement.clientHeight) - height)/2 - borderWidth) + 60 + 'px';
	}
	
	function sns_share(media)
	{
		if (media == "fb")
		{
		var newWindow = window.open('https://www.facebook.com/sharer/sharer.php?u=' + encodeURIComponent('http://www.biodermaevent.com/?media=share_fb'),'sharer','toolbar=0,status=0,width=600,height=325');

			$.ajax({
				type   : "POST",
				async  : false,
				url    : "../main_exec.php",
				data:{
					"exec"          : "insert_share_info",
					"sns_media"     : media
				}
			});
		}else if (media == "kt"){
			Kakao.Link.sendTalkLink({
				label: '메이크업은 말끔하게 지우고, 건강한 피부만 남겨요!\r\n\r\n제한시간 20초!\r\n\r\n3개의 화려한 메이크업 말끔하게 지우면 바이오더마 정품 팡팡!',
				image: {
					src: 'http://www.biodermaevent.com/images/share_image.jpg',
					width: '1200',
					height: '630'
				},
				webButton: {
					text: "BIODERMA",
					url: 'http://www.biodermaevent.com/m/?media=kt' // 앱 설정의 웹 플랫폼에 등록한 도메인의 URL이어야 합니다.
				}
			});
			$.ajax({
				type   : "POST",
				async  : false,
				url    : "../main_exec.php",
				data:{
					"exec" : "insert_share_info",
					"sns_media" : media
				}
			});
		}else{
			Kakao.Story.share({
				url: 'http://www.biodermaevent.com/?media=share_ks'
			});
			$.ajax({
				type   : "POST",
				async  : false,
				url    : "../main_exec.php",
				data:{
					"exec" : "insert_share_info",
					"sns_media" : media
				}
			});
		}
	}

	function only_num(obj)
	{
		var inText = obj.value;
		var outText = "";
		var flag = true;
		var ret;
		for(var i = 0; i < inText.length; i++)
		{
			ret = inText.charCodeAt(i);
			if((ret < 48) || (ret > 57))
			{
				flag = false;
			}
			else
			{
				outText += inText.charAt(i);
			}
		}

		if(flag == false)
		{
			alert("전화번호는 숫자입력만 가능합니다.");
			obj.value = outText;
			obj.focus();
			return false;
		}
		return true;
	}

	function chk_strlen(obj)
	{
		if(obj.value.length > 11) {
			alert("전화번호는 11자를 초과할 수 없습니다.");
			obj.value = obj.value.slice(0, -(obj.value.length-11));
			obj.focus();
			return false;
		}
		return;
	}