var wmbt;

var bioderma = function() {
	var _this = this;
	this.init = function() {
		var forms;
		forms = $('input');
		forms.placeholder();
		Kakao.init('45b1772fcb35228af4b3430ebf90a0d0');

		// header 
		$(window).scroll(function(){
			var scTop = $(this).scrollTop();
			if ( scTop > 50 ){
				$('.c-header--main').addClass('c-header--active');
			}else {
				$('.c-header--main').removeClass('c-header--active');
			}
		});

	},
	this.popupOpen = function(me) {
		var $this = $(me),
			val = $this.attr('data-layer-popup');

		$("#"+val).addClass("c-popup--active");
		$("html").css("overflow","hidden");

		return false;
	},
	this.popupSelfOpen = function(popup) {
		// var $this = $(me),
		// 	val = $this.attr('data-layer-popup');

		$("#" + popup).addClass("c-popup--active");
		$("html").css("overflow","hidden");

		return false;
	},
	this.popupClose = function(me) {
		$('html').removeClass('is-popup-open');
		$(me).parent().parent().removeClass('c-popup--active');
		$("html").css("overflow","");

		return false;
	},
	this.popupMoveClose = function(me) {
		if (confirm("이 창을 닫으면 메인으로 이동합니다. 이동하시겠습니까?"))
			location.href = "index.php";
		return false;
	},
	this.popupSelfClose = function(popup) {
		$('html').removeClass('is-popup-open');
		$('#' + popup).removeClass('c-popup--active');
		$("html").css("overflow","");

		return false;
	},
	this.move = function(me) {
		var $this = $(me),
			val = $this.attr('data-move');

		location.href = val + ".php";
		
		return false;
	},
	this.only_num = function(me) {
		var inText = me.value;
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
			me.value = outText;
			me.focus();
			return false;
		}
		return true;
	},
	this.chk_strlen = function(me) {
		if(me.value.length > 11) {
			alert("전화번호는 11자를 초과할 수 없습니다.");
			me.value = me.value.slice(0, -(me.value.length-11));
			me.focus();
			return false;
		}
		return;
	},
	this.sns_share = function(media) {
		if (media == "fb")
		{
			var newWindow = window.open('https://www.facebook.com/sharer/sharer.php?u=' + encodeURIComponent('http://www.biodermaevent.com/?media=share_fb'),'sharer','toolbar=0,status=0,width=600,height=325');

			$.ajax({
				type   : "POST",
				async  : false,
				url    : "./main_exec.php",
				data:{
					"exec"          : "insert_share_info",
					"sns_media"     : media
				}
			});
		}else{
			Kakao.Story.share({
				url: 'http://www.biodermaevent.com/?media=share_ks'
			});
			$.ajax({
				type   : "POST",
				async  : false,
				url    : "./main_exec.php",
				data:{
					"exec" : "insert_share_info",
					"sns_media" : media
				}
			});
		}
	},
	this.findAddr = function(level) {
		new daum.Postcode({
			oncomplete: function(data) {
				// 팝업에서 검색결과 항목을 클릭했을때 실행할 코드를 작성하는 부분.
	
				// 도로명 주소의 노출 규칙에 따라 주소를 조합한다.
				// 내려오는 변수가 값이 없는 경우엔 공백('')값을 가지므로, 이를 참고하여 분기 한다.
				var fullRoadAddr = data.roadAddress; // 도로명 주소 변수
				var extraRoadAddr = ''; // 도로명 조합형 주소 변수
	
				// 법정동명이 있을 경우 추가한다. (법정리는 제외)
				// 법정동의 경우 마지막 문자가 "동/로/가"로 끝난다.
				if(data.bname !== '' && /[동|로|가]$/g.test(data.bname)){
					extraRoadAddr += data.bname;
				}
				// 건물명이 있고, 공동주택일 경우 추가한다.
				if(data.buildingName !== '' && data.apartment === 'Y'){
				   extraRoadAddr += (extraRoadAddr !== '' ? ', ' + data.buildingName : data.buildingName);
				}
				// 도로명, 지번 조합형 주소가 있을 경우, 괄호까지 추가한 최종 문자열을 만든다.
				if(extraRoadAddr !== ''){
					extraRoadAddr = ' (' + extraRoadAddr + ')';
				}
				// 도로명, 지번 주소의 유무에 따라 해당 조합형 주소를 추가한다.
				if(fullRoadAddr !== ''){
					fullRoadAddr += extraRoadAddr;
				}
	
				// 우편번호와 주소 정보를 해당 필드에 넣는다.
				// document.getElementById('mb_zipcode').value = data.zonecode; //5자리 새우편번호 사용
				// document.getElementById('mb_addr1').value 	= fullRoadAddr;
				document.getElementById('level' + level + '_addr').value 	= "(" + data.zonecode + ") " + fullRoadAddr;
				$("#level" + level + "_addr").attr("readonly",false);
				$("#level" + level + "_addr2").focus();
			}
		}).open();	
	},
	this.levelSubmit = function(me, level) {
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
			alert("상세 주소를 입력해 주세요.");
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
			url: "./main_exec.php",
			success: function(response){
				console.log(response);
				var res_arr = response.split("||");

				switch(res_arr[1])
				{
					case "blank" :
						wmbt.popupSelfClose("popup_level" + level + "_clear");
						wmbt.popupSelfOpen("popup_winner_draw");
					break;
					case "goods" :
						wmbt.popupSelfClose("popup_level" + level + "_clear");
						wmbt.popupSelfOpen("popup_winner_goods");
					break;
					case "kit" :
						wmbt.popupSelfClose("popup_level" + level + "_clear");
						wmbt.popupSelfOpen("popup_winner_kit");
					break;
					case "D" :
						alert("오늘은 이미 참여하셨습니다. 내일 다시 참여해주세요");
						location.href = "index.php";
					break;
				}
				// console.log(response);
			}
		});
		return false;
	}
}

wmbt = new bioderma();
wmbt.init();


// $(document).ready(function(){
// 	//	 input placeholder 
// 	var forms;
// 	forms = $('input');
// 	forms.placeholder();

// 	// popup
// 	$('.c-popup__close').on('click', function(){
// 		$('html').removeClass('is-popup-open');
// 		$(this).parent().parent().removeClass('c-popup--active');

// 		return false;
// 	});
	
// 	// game start
// 	$('.m-visual__button').on('click', function(){
// 		location.href = "game.php";

// 		return false;
// 	});
	
// 	// game start
// 	$('.m-video__button').on('click', function(){
// 		location.href = "game.php";

// 		return false;
// 	});
	
// 	// 팝업 오픈
// 	$('.m-video__button').on('click', function(){
// 		location.href = "game.php";

// 		return false;
// 	});
	

// });
