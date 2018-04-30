<?
include_once "../include/autoload.php";

$mnv_f = new mnv_function();
$my_db         = $mnv_f->Connect_MySQL();
$mobileYN      = $mnv_f->MobileCheck();
$obYN          = $mnv_f->BrowserCheck();
//if ($mobileYN == "PC")
//{
//	echo "<script>location.href='../index.php?media=".$_REQUEST["media"]."&r=".$_REQUEST["r"]."';</script>";
//}else{
//	$saveMedia     = $mnv_f->SaveMedia();
//	$rs_tracking   = $mnv_f->InsertTrackingInfo($mobileYN);
//}

include_once "./head2.php";
?>
<body>
	<div class="wrap wrap--sub">
<?
		include_once "./header2.php";
?>
			<div class="c-content c-content--sub">
				<!-- <div class="game__popups ">
<div class="game__popup">
<a href="#" class="game__start">게임시작</a>
</div>
</div> -->
				<div class="gauge">
					<div class="gauge__time">20</div>
					<div class="gauge__bars">
						<div class="gauge__bar">
							<div class="gauge__adds"><div class="gauge__add"></div></div>
						</div>
					</div>
				</div>

				<div class="game">
					<div class="game__aligner">
						<!-- 
.game__box에 "game__box--active"클래스 추가해주면 활성화 
-->
						<div class="game__box game__box--active" data-stage-num="1">
							<div class="game__image game__image-1"><img class="stage-image" id="stageImg1" src="./images/pages/game__image-1.png" alt="" /></div>
							<a href="#" class="game__cotton game__cotton-1"><img src="./images/pages/cotton-1.png" alt="" /></a>
						</div>
						<div class="game__box" data-stage-num="2">
							<div class="game__image game__image-2"><img class="stage-image" id="stageImg2" src="./images/pages/game__image-2.png" alt="" /></div>
							<a href="#" class="game__cotton game__cotton-2"><img src="./images/pages/cotton-2.png" alt="" /></a>
						</div>
						<div class="game__box" data-stage-num="3">
							<div class="game__image game__image-3"><img class="stage-image" id="stageImg3" src="./images/pages/game__image-3.png" alt="" /></div>
							<a href="#" class="game__cotton game__cotton-3"><img src="./images/pages/cotton-3.png" alt="" /></a>
						</div>
						<!-- 
.game__step에 "game__step--active"클래스 추가해주면 활성화
-->
						<div class="game-clear__msg">
							<span class="msg">CLEAR<i>!</i></span>
						</div>
					</div>
					<div class="game__steps">
						<a href="#" id="step1" class="game__step game__step--active">1</a>
						<a href="#" id="step2" class="game__step">2</a>
						<a href="#" id="step3" class="game__step">3</a>
					</div>
				</div>
			</div>
			<div class="c-footer">
				<div class="c-footer__aligner">
					<ul class="c-footer__list">
						<li><a href="http://www.bioderma.co.kr/page/brand_philosophy.php" target="_blank">바이오더마 소개</a></li>
						<li><a href="http://www.bioderma.co.kr/front/board.php?bbs_id=notice" target="_blank">온라인 고객센터</a></li>
					</ul>
					<ul class="c-footer__list c-footer__list--none">
						<li>나오스코리아 유한회사</li>
						<li>대표: 장이브데모트</li>
						<li>사업자등록번호: 214-88-79685 <a href="http://www.ftc.go.kr/bizCommPop.do?wrkr_no=&apv_perm_no=2015321015330200215" target="_blank">(사업자정보확인)</a></li>
						<li>주소: 서울특별시 서초구 서초중앙로 138 우림빌딩 7층 <br>나오스코리아 유한회사</li>
						<li>개인정보책임자: 김민정</li>
						<li>이벤트 안내번호: 02-523-7676</li>
						<li>통신판매업신고번호: 2015-서울서초-0215</li>
						<li>E-MAIL: bioderma@bioderma.kr</li>
					</ul>
					<div class="copyright">©2018  BIODERMA.  ALL RIGHT RESERVED.</div>
				</div>
			</div>
		</div>
<?
include_once "./popup/popup_try_again.php";

include_once "./popup/popup_game_pre.php";

include_once "./popup/popup_level1_clear.php";

include_once "./popup/popup_level2_clear.php";

include_once "./popup/popup_level3_clear.php";

// include_once "./popup/popup_winner_goods.php";

include_once "./popup/popup_winner_kit.php";

include_once "./popup/popup_winner_draw.php";

include_once "./popup/popup_agree1.php";

include_once "./popup/popup_agree2.php";
?>		
		<div id="layer" style="display:none;position:fixed;overflow:hidden;z-index:9999;-webkit-overflow-scrolling:touch;">
			<img src="//i1.daumcdn.net/localimg/localimages/07/postcode/320/close.png" id="btnCloseLayer" style="width:7%;cursor:pointer;position:absolute;right:-3px;top:-3px;z-index:1" onclick="closeDaumPostcode()" alt="닫기 버튼">
		</div>

		<script type="text/javascript">

			var count = 0;
			var time = 20;
			var gameTimer = null;
			var sizeArray = [57, 47, 41];
			var ratioArray = [94, 98, 95];

			popupOpen("popup_game_pre");
			function gameTimerExec(imageNum) {
				gameTimer = setInterval(function() {
					time--;
					count+=1;
					var gaugeWidths = $('.gauge__adds').css('width'),
						gaugeWidth = parseInt(gaugeWidths.replace('px', ''));
					$('.gauge__time').text(time);
					$('.gauge__adds').animate({
						'width': ((count + 2) * 5.1) + '%'
					}, 1000, 'linear');

					if (time <= 0) {
						$('.gauge__adds').addClass('gauge__adds--active');
						clearInterval(gameTimer);
						switch(imageNum)
						{
							case 0 :
								popupOpen("popup_tryagain");
								break;
							case 1 :
								popupOpen("popup_level1_clear");
								break;
							case 2 :
								popupOpen("popup_level2_clear");
								break;
						}
						// alert("게임오버");
					}                            
				}, 1000);  
			}

			$('.game_start').on('click', function(event){
				popupClose("popup_game_pre");
//				$('.game__popups').addClass('game__popups--active');
				$('.gauge__body').css('width','0');
				// $("#left_game_back").hide();
				// $("#right_game_back").hide();

				gameTimerExec(0);

				$.ajax({
					type:"POST",
					data:{
						"exec"					: "game_click_info"

					},
					url: "../main_exec.php"
				});

				//                    var second = 31,
				//                        count = -1;
				//                    for ( var time = 0 ; time <= 30; time++){
				//                        setTimeout(function(){
				//                            $('.gauge__time').text(second-=1);
				//                            count+=1;
				//
				//                            $('.gauge__adds').stop().animate({'width': (3.33*(count+2))+'%'},1000,'linear');
				//
				//                            if ( count == 30){
				//                                $('.gauge__adds').addClass('gauge__adds--active');
				//                            }
				//                        },1000*time);
				//                    }
			});


			// eraser 
			eraserSet(1,57, 94);
			//                eraserSet(2,37);
			//                eraserSet(3,30);

			function eraserSet(imageNum, sizeValue, ratio) {
				ratio = ratio || 92;
				setRatio = (ratio*0.01).toFixed(2);
				$('.game__image-'+imageNum).find('.stage-image').eraser({
					size: sizeValue,
					completeRatio: setRatio,
					completeFunction: function() {
						clearInterval(gameTimer);
						//                                console.log("clear");
						$('.game-clear__msg').css({
							'opacity': 0,
							'z-index': 9999
						}).animate({
							'opacity': 1
						}, 1000, function() {
							console.log("next");
							$('.game-clear__msg').css({
								'opacity': 0,
								'z-index': -1
							});
							stageClear(imageNum, sizeValue, ratio);
						});
						//                                clearInterval(gameTimer);
						//                                stageClear(imageNum, sizeValue, ratio);
					},
					progressFunction: function(p) {
						console.log(Math.round(p * 100) + '%');
					}
				});
			}
			function stageClear(imageNum, sizeValue, ratio) {
				if(imageNum > 2) {
					// alert("올 클리어");                        
					clearInterval(gameTimer);
					popupOpen("popup_level3_clear");
					return;
				}
				$('.game__image-' + imageNum).find('.stage-image').eraser('disable');
				var nextNum = imageNum+1;
				var nextSize = sizeArray[imageNum];
				var nextRatio = ratioArray[imageNum];
				$('[data-stage-num='+ imageNum +']').removeClass('game__box--active');
				$('[data-stage-num='+ nextNum +']').addClass('game__box--active');

				gameTimerExec(imageNum);
				eraserSet(nextNum, nextSize, nextRatio);
				$(".game__step").removeClass("game__step--active");
				$("#step" + nextNum).addClass("game__step--active");
			}
		</script>
		<script type="text/javascript" src="http://wcs.naver.net/wcslog.js"></script>
		<script type="text/javascript">
			if(!wcs_add) var wcs_add = {};
			wcs_add["wa"] = "73500228899d2c";
			wcs_do();
		</script>        
	</body>
</html>
