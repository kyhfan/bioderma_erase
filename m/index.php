<?
	include_once "../include/autoload.php";

	$r 	= $_REQUEST["r"];
	
	$mnv_f = new mnv_function();
	$my_db         = $mnv_f->Connect_MySQL();
	$mobileYN      = $mnv_f->MobileCheck();
	$obYN          = $mnv_f->BrowserCheck();
	if ($mobileYN == "PC")
	{
		echo "<script>location.href='../index.php?media=".$_REQUEST["media"]."&r=".$_REQUEST["r"]."';</script>";
	}else{
		$saveMedia     = $mnv_f->SaveMedia();
		$rs_tracking   = $mnv_f->InsertTrackingInfo($mobileYN);
	}

	include_once "./head2.php";
?>
	<body>
		<div class="wrap">
<?
			include_once "./header2.php";
?>
			<div class="content content-main">
				<section class="visual">
					<div class="area-title">
						<img class="title" src="./images/event_2/main_title.png" alt="#TO GO KIT">
						<img class="title-kr" src="./images/event_2/main_title_kr.png" alt="투고키트 이벤트">
						<p class="sub">지난 이벤트에서 투고키트를 받지 못하신 분들에게<br>다시 한 번, 투고키트를 증정합니다</p>
						<p class="report-guide">
							<span>후기 이벤트 당첨자 발표</span>5월 3일 목요일
						</p>
					</div>
					<div class="kit">
						<img src="./images/event_2/main_visual_kit.png">
					</div>
					<button class="btn-get" onclick="movePage('game2')" type="button">투고키트 받기<span class="txt"></span>
					<!-- <button class="btn-get" onclick="alert('이벤트가 종료 되었습니다.')" type="button">투고키트 받기<span class="txt"></span> -->
						<span class="obj"></span></button>
					<button class="btn-more">더보기</button>
				</section>
				<section class="howto scrollTarget">
					<div class="area-title">
						<img class="title" src="./images/event_2/main_howto_title.png" alt="당신의 일상 속 투고키트가 어떻게 쓰이고 있는지 보여주세요">
						<p class="sub">가장 많은 LIKE를 받은 10분께는 바이오더마에서 빅프라이즈를 드립니다</p>
					</div>
					<div class="kit">
						<img src="./images/event_2/main_howto_kit.jpg">
					</div>
					<div class="txt-caution">
						<p>※ 이벤트 유의사항</p>
						<ul>
							<li>- 최종 당첨자는 컨텐츠 LIKE 수와 내부 심사 기준에 따라 선정됩니다</li>
							<li>- 부정한 방법으로 이벤트 참여시 (ex 좋아요 구매) 당첨 선발에서 제외됨을 알려드립니다</li>
							<li>- 세가지 해시태그를 모두 입력하지 않으면 당첨 선발에서 제외됩니다</li>
							<li>- 제세공과금 규정에 비동의시, 경품을 지급할 수 없어 당첨이 취소됩니다</li>
						</ul>
					</div>
					<div class="gift-info-area">
						<button class="gift-info" onclick="popupOpen('popup_gift_info');"></button>
					</div>
					<div class="area area-step">
						<h5>참여 방법</h5>
						<img src="./images/event_2/main_howto_step.png" alt="">
					</div>
					<div class="area area-ex">
						<h5>참여 예시</h5>
						<img src="./images/event_2/main_howto_ex.png" alt="">
					</div>
					<div class="txt-caution _02">
						<p>※ 이벤트 유의사항</p>
						<ul>
							<li>- 참여 예시에 부합하지 않는 사진은 참여가 인정되지 않습니다</li>
                            <li>- 비공개 계정일 경우 컨텐츠가 노출되지 않아 참여가 인정되지 않습니다</li>
                            <li>- 이벤트 종료 후 해시태그를 삭제하거나 비공개 계정으로 전환할 경우 참여가 인정되지 않습니다</li>
						</ul>
					</div>
				</section>
				<section class="feed">
					<div class="area-title">
						<img class="title" src="./images/event_2/main_feed_title.png" alt="WEEKLY BEST CONTENT">
						<p class="sub">게시물은 매주 월요일 정오에 업데이트 됩니다</p>
					</div>
					<div class="weekly-best">
						<div class="best-wrapper">
							<!-- Slider main container -->
							<div class="best-slider swiper-container main-slider">
								<!-- Additional required wrapper -->
								<!-- 2개 이상일때는 2 지우기 -->
								<!-- <div class="swiper-wrapper"> -->
								<div class="swiper-wrapper">
									<!-- Slides -->
									<div class="swiper-slide">
										<!-- <div class="swiper-slide2"> -->
										<div class="profile">
											<a href="javascript:void(0)">
												<!-- <img class="thumb" src="./images/event_2/main_feed_thumb_sample.png" alt=""> -->
												<img class="thumb" src="./images/event_2/_yoonsoop_profile.jpg" alt="">
											</a>
											<a href="javascript:void(0)">
												<span>_yoonsoop</span>
											</a>
										</div>
										<div class="main-img">
											<a href="javascript:void(0)">
												<!-- <img src="./images/event_2/main_feed_img_sample.jpg" alt=""> -->
												<img src="./images/event_2/_yoonsoop.jpg" alt="">
											</a>
										</div>	
										<div class="txt-wrap">
											<div class="inner">
												이번 여름휴가는 #바이오더마 #투고키트 와 함께!<br><br>
												
												#클렌징지존 #센시비오 #inmybag
											</div>
										</div>
									</div>
									
									<div class="swiper-slide">
										<!-- <div class="swiper-slide2"> -->
										<div class="profile">
											<a href="javascript:void(0)">
												<!-- <img class="thumb" src="./images/event_2/main_feed_thumb_sample.png" alt=""> -->
												<img class="thumb" src="./images/event_2/roro.on_profile.jpg" alt="">
											</a>
											<a href="javascript:void(0)">
												<span>roro.on</span>
											</a>
										</div>
										<div class="main-img">
											<a href="javascript:void(0)">
												<!-- <img src="./images/event_2/main_feed_img_sample.jpg" alt=""> -->
												<img src="./images/event_2/roro.on.jpg" alt="">
											</a>
										</div>	
										<div class="txt-wrap">
											<div class="inner">
												✨홀로그램 영롱쓰🌈<br><br>

												#바이오더마 #투고키트 #클렌징지존
											</div>
										</div>
									</div>
									
									<div class="swiper-slide">
										<!-- <div class="swiper-slide2"> -->
										<div class="profile">
											<a href="javascript:void(0)">
												<!-- <img class="thumb" src="./images/event_2/main_feed_thumb_sample.png" alt=""> -->
												<img class="thumb" src="./images/event_2/luvmyvorld_profile.jpg" alt="">
											</a>
											<a href="javascript:void(0)">
												<span>luvmyvorld</span>
											</a>
										</div>
										<div class="main-img">
											<a href="javascript:void(0)">
												<!-- <img src="./images/event_2/main_feed_img_sample.jpg" alt=""> -->
												<img src="./images/event_2/luvmyvorld.jpg" alt="">
											</a>
										</div>	
										<div class="txt-wrap">
											<div class="inner">
												#inmybag #인마이백 #바이오더마 #투고키트 #클렌징지존 참말로 예쁘고 유용하고 💐 다들 클렌징 정착하세요..
											</div>
										</div>
									</div>
									
									<div class="swiper-slide">
										<!-- <div class="swiper-slide2"> -->
										<div class="profile">
											<a href="javascript:void(0)">
												<!-- <img class="thumb" src="./images/event_2/main_feed_thumb_sample.png" alt=""> -->
												<img class="thumb" src="./images/event_2/2hyo_eun__profile.jpg" alt="">
											</a>
											<a href="javascript:void(0)">
												<span>2hyo_eun_</span>
											</a>
										</div>
										<div class="main-img">
											<a href="javascript:void(0)">
												<!-- <img src="./images/event_2/main_feed_img_sample.jpg" alt=""> -->
												<img src="./images/event_2/2hyo_eun_.jpg" alt="">
											</a>
										</div>	
										<div class="txt-wrap">
											<div class="inner">
												술먹고 집와서 인증샷샷샷📸<br><br>
												
												#23 #오늘 #지금 #today #바이오더마 #센시비오 #클렌징워터 #한정판 #투고키트 #클렌징지존 #셀카 #셀피 #selca #selfie #셀스타그램 #일상 #일상스타그램 #데일리 #daily
											</div>
										</div>
									</div>
									
									<div class="swiper-slide">
										<!-- <div class="swiper-slide2"> -->
										<div class="profile">
											<a href="javascript:void(0)">
												<!-- <img class="thumb" src="./images/event_2/main_feed_thumb_sample.png" alt=""> -->
												<img class="thumb" src="./images/event_2/iloveu.ra_profile.jpg" alt="">
											</a>
											<a href="javascript:void(0)">
												<span>iloveu.ra</span>
											</a>
										</div>
										<div class="main-img">
											<a href="javascript:void(0)">
												<!-- <img src="./images/event_2/main_feed_img_sample.jpg" alt=""> -->
												<img src="./images/event_2/iloveu.ra.jpg" alt="">
											</a>
										</div>	
										<div class="txt-wrap">
											<div class="inner">
												클렌징은 역시☺️👍 -<br>
												-<br>

												#바이오더마 #클렌징지존 #투고키트 #클렌징워터 #bioderma #일상 #daily #셀스타그램 #like4like #selfie #skincare #cleansing #cleansingwater #대학로 #종로
											</div>
										</div>
									</div>
									
									<div class="swiper-slide">
									<!-- <div class="swiper-slide2"> -->
										<div class="profile">
											<a href="javascript:void(0)">
												<!-- <img class="thumb" src="./images/event_2/main_feed_thumb_sample.png" alt=""> -->
												<img class="thumb" src="./images/event_2/week1_best_profile.jpg" alt="">
											</a>
											<a href="javascript:void(0)">
												<span>yell_cc_</span>
											</a>
										</div>
										<div class="main-img">
											<a href="javascript:void(0)">
												<!-- <img src="./images/event_2/main_feed_img_sample.jpg" alt=""> -->
												<img src="./images/event_2/week1_best_image.jpg" alt="">
											</a>
										</div>	
										<div class="txt-wrap">
											<div class="inner">
												가방에 쏙!<br>
												완젹한 클렌징, 요만한거 없는듯💗<br><br>
												#바이오더마#센시비오#클렌징워터#한정판#투고키트#클렌징지존
											</div>
										</div>
									</div>
								</div>
								<!-- If we need navigation buttons -->
								 <div class="button-prev">
									<img src="./images/event_2/main_feed_nav_prev.png" alt="이전">
								</div>
								<div class="button-next">
									<img src="./images/event_2/main_feed_nav_next.png" alt="다음">
								</div> 
							</div>
						</div>
					</div>
					<div class="list-feed">
						<div class="area-title">
							<img class="title" src="./images/event_2/main_feed_list_tag.png" alt="">
							<!--
<span>#바이오더마</span>
<span>#투고키트</span>
<span>#클렌징지존</span>
-->
							<p class="sub">게시물은 매주 월요일 정오에 업데이트 됩니다</p>
						</div>
						<div class="list-container">
							<div class="inner">
								<div class="attractt-container" data-idx="0" data-code="T9VmNLEdHZa3iGh" data-board="grid"></div>
<!--
								<div class="obj-feed">
									<img src="./images/event_2/main_feed_list_sample.jpg" alt="">
								</div>
								<div class="obj-feed">
									<img src="./images/event_2/main_feed_list_sample.jpg" alt="">
								</div>
								<div class="obj-feed">
									<img src="./images/event_2/main_feed_list_sample.jpg" alt="">
								</div>
								<div class="obj-feed">
									<img src="./images/event_2/main_feed_list_sample.jpg" alt="">
								</div>
-->
							</div>
						</div>
					</div>
				</section>
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
	include_once "./popup/popup_gift_info.php";
		
	include_once "./popup/popup_winner_list.php";
?>
		<script type="text/javascript">
			$(window).load(function() {
<?
	if ($r == "y")
	{
?>
				var scTop = $('.scrollTarget').offset().top;

				$('html, body').animate({scrollTop:(scTop-80)+'px'}, 500);
<?
	}
?>
				// popupOpen('popup_winner_list');
			});
			
			$(document).ready(function() {
				var mainSwiper = new Swiper ('.main-slider', {
					direction: 'horizontal',
					loop: true,
					navigation: {
						nextEl: '.button-next',
						prevEl: '.button-prev',
					},
				});
				var popupSwiper = new Swiper ('.popup-slider', {
					direction: 'horizontal',
					loop: true,
					navigation: {
						nextEl: '.button-next',
						prevEl: '.button-prev',
					},
					on: {
						slideChange: function() {
							var grade = 1;
							if(this.realIndex > 2 && this.realIndex < 6) {
								grade = 2;
							} else if(this.realIndex > 5) {
								grade = 3;
							} else {
								grade = 1;
							}
							$('#popup_winner_list .grade img').attr({
								'src': './images/common/0'+grade+'.png',
								'alt': grade+'등'
							});
						}
					}
				});
			});
			
			$('.btn-more').on('click', function(){
				var scTop = $('.scrollTarget').offset().top;

				$('html, body').animate({scrollTop:(scTop-40)+'px'}, 500);
				// $('html, body').animate({scrollTop :  $('.section.'+nav).offset().top}, 1000);

				return false;
			});

		</script>
		<script type="text/javascript">
			(function(d, s) {
				var j, e = d.getElementsByTagName(s)[0], h = "https://cdn.attractt.com/embed/js/dist/embed.min.js";
				if (typeof AttracttTower === "function" || e.src === h) { return; }
				j = d.createElement(s);
				j.src = h;
				j.async = true;
				e.parentNode.insertBefore(j, e);
			})(document, "script");
		</script>
	</body>
</html>