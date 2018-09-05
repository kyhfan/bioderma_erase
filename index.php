<?
	include_once "./include/autoload.php";

    $r 	= $_REQUEST["r"];
	
    $mnv_f = new mnv_function();
    $my_db         = $mnv_f->Connect_MySQL();
    $mobileYN      = $mnv_f->MobileCheck();
    $obYN          = $mnv_f->BrowserCheck();
    if ($mobileYN == "MOBILE")
	{
		echo "<script>location.href='m/index.php?media=".$_REQUEST["media"]."&r=".$_REQUEST["r"]."';</script>";
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
            <div class="main-section1">
                <div class="section1-wrap">
                    <img src="./images/event2/main_section1_bg.png" alt="" style="max-width:100%;display:block;">
                    <button class="give_kit" data-move="game2" onclick="wmbt.move(this)"></button>
                    <!-- <button class="give_kit" data-move="game2" onclick="alert('이벤트가 종료 되었습니다.')"></button> -->
                </div>
            </div>
            <div class="main-section2">
                <div class="section2-wrap">
                    <div class="title">
                        <span class="sub-title1">
                            당신의 일상 속 투고키트가
                        </span><br>
                        <span class="sub-title2">
                            어떻게 쓰이고 있는지 보여주세요
                        </span><br>
                        <span class="sub-title3">
                            가장 많은 LIKE를 받은 10분께는 <span>다시 한 번</span> 바이오더마에서 빅프라이즈를 드립니다
                        </span>
                    </div>
                    <div class="kit-image">
                        <img src="./images/event2/main_section2_kit.png" alt="투고 키트 이미지">
                    </div>
                    <div class="section2-notice">
                        <div>※ 이벤트 유의사항</div>
                        <ul>
                            <li>- 부정한 방법으로 이벤트 참여시 (ex 좋아요 구매) 당첨 선발에서 제외됨을 알려드립니다</li>
                            <li>- 세가지 해시태그를 모두 입력하지 않으면 당첨 선발에서 제외됩니다</li>
                            <li>- 제세공과금 규정에 비동의시, 경품을 지급할 수 없어 당첨이 취소됩니다</li>
                            <li>- 지난 당첨자는 선발에서 제외됩니다</li>
                            <li>- 이벤트를 통한 경품 획득이 아닌 기타 방법(협찬 등)을 통한 경품 획득으로 참여시 당첨 선발에서는 제외됩니다</li>
                        </ul>
                        <div>
                            <button class="gift-info" data-layer-popup="popup_gift_info" onclick="wmbt.popupOpen(this)"></button>
                            <!-- <img src="./images/event2/gift_info_btn.png" alt="경품안내"> -->
                        </div>
                    </div>
                    <div class="section2-use-text">
                        참여 방법
                    </div>
                    <div class="section2-use-img">
                        <img src="./images/event2/main_section2_how_to_use.png" alt="">
                    </div>
                    <div class="section2-use-text exam">
                        참여 예시
                    </div>
                    <div class="section2-use-exam-img">
                        <img src="./images/event2/main_section2_how_to_exam.png" alt="">
                    </div>
                    <div class="section2-notice2">
                        <div>※ 이벤트 유의사항</div>
                        <ul>
                            <li>- 투고키트가 드러나지 않는 사진은 무효처리 됩니다</li>
                            <li>- 세가지 해시태그 모두 입력해야 이벤트 참여 완료됩니다</li>
                            <li>- 참여 예시에 부합하지 않는 사진으로 참여시 당첨 선발에서 제외됩니다</li>
                            <li>- 비공개 계정일 경우 컨텐츠가 노출되지 않아 참여가 인정되지 않습니다</li>
                            <li>- 이벤트 종료 후 해시태그를 삭제하거나 비공개 계정으로 전환할 경우 참여가 인정되지 않습니다</li>
                        </ul>
                    </div>
                    <div class="title2">
                        <span class="sub-title1">
                            WEEKLY BEST CONTENT
                        </span><br>
                        <span class="sub-title2">
                            게시물은 매주 월요일 정오에 업데이트 됩니다
                        </span>
                    </div>
                    <div class="best_flag">
                        <img src="./images/event2/best_flag.png" alt="">
                    </div>
					<div class="section2-best-content swiper-container main-slider">
                        <div class="swiper-wrapper">
                            <!-- Slides -->
                            <div class="swiper-slide">
                                <div class="image_area">
                                    <img src="./images/event2/week2_content__yoonsoop.jpg" alt="" width="561">
                                </div>
                                <div class="content_area">
                                    <div class="profile_area">
                                        <img src="./images/event2/week2__yoonsoop.jpg" alt="" width="69">
                                        <span>_yoonsoop</span>
                                    </div>
                                    <div class="desc_area">
                                        이번 여름휴가는 #바이오더마 #투고키트 와 함께!<br><br>
                                        #클렌징지존 #센시비오 #inmybag<br>
                                        @bioderma_kr
                                    </div>
                                    <div class="color_area">
                                    </div>
                                </div>
                            </div>
                            <!-- Slides -->
                            <div class="swiper-slide">
                                <div class="image_area">
                                    <img src="./images/event2/week2_content_roro.on.jpg" alt="" width="561">
                                </div>
                                <div class="content_area">
                                    <div class="profile_area">
                                        <img src="./images/event2/week2_roro.on.jpg" alt="" width="69">
                                        <span>roro.on</span>
                                    </div>
                                    <div class="desc_area">
                                        ✨홀로그램 영롱쓰🌈<br><br>
                                        #바이오더마 #투고키트 #클렌징지존
                                    </div>
                                    <div class="color_area">
                                    </div>
                                </div>
                            </div>
                            <!-- Slides -->
                            <div class="swiper-slide">
                                <div class="image_area">
                                    <img src="./images/event2/week2_content_luvmyvorld.jpg" alt="" width="561">
                                </div>
                                <div class="content_area">
                                    <div class="profile_area">
                                        <img src="./images/event2/week2_luvmyvorld.jpg" alt="" width="69">
                                        <span>luvmyvorld</span>
                                    </div>
                                    <div class="desc_area">
                                        #inmybag #인마이백 #바이오더마<br>
                                        #투고키트 #클렌징지존 참말로<br> 
                                        예쁘고 유용하고 💐<br>
                                        다들 클렌징 정착하세요.. @bioderma_kr
                                    </div>
                                    <div class="color_area">
                                    </div>
                                </div>
                            </div>
                            <!-- Slides -->
                            <div class="swiper-slide">
                                <div class="image_area">
                                    <img src="./images/event2/week2_content_2hyo_eun_.jpg" alt="" width="561">
                                </div>
                                <div class="content_area">
                                    <div class="profile_area">
                                        <img src="./images/event2/week2_2hyo_eun_.jpg" alt="" width="69">
                                        <span>2hyo_eun_</span>
                                    </div>
                                    <div class="desc_area">
                                        술먹고 집와서 인증샷샷샷📸<br>
                                        #23 #오늘 #지금 #today #바이오더마 #센시비오 #클렌징워터 #한정판 #투고키트 #클렌징지존 #셀카 #셀피 #selca #selfie #셀스타그램 #일상 #일상스타그램 #데일리 #daily
                                    </div>
                                    <div class="color_area">
                                    </div>
                                </div>
                            </div>
                            <!-- Slides -->
                            <div class="swiper-slide">
                                <div class="image_area">
                                    <img src="./images/event2/week2_content_iloveu.ra.jpg" alt="" width="561">
                                </div>
                                <div class="content_area">
                                    <div class="profile_area">
                                        <img src="./images/event2/week2_iloveu.ra.jpg" alt="" width="69">
                                        <span>iloveu.ra</span>
                                    </div>
                                    <div class="desc_area">
                                        클렌징은 역시☺️👍 -<br><br>
                                        #바이오더마 #클렌징지존 #투고키트 #클렌징워터<br>
                                        #bioderma #일상 #daily #셀스타그램<br>
                                        #selfie #skincare #cleansing<br>
                                        #cleansingwater #대학로 #종로
                                    </div>
                                    <div class="color_area">
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="image_area">
                                    <!-- <img src="./images/event2/sample_best_image.jpg" alt=""> -->
                                    <img src="./images/event2/week1_best_image.jpg" alt="" width="561">
                                </div>
                                <div class="content_area">
                                    <div class="profile_area">
                                        <!-- <img src="./images/event2/sample_best_profileimage.png" alt=""> -->
                                        <img src="./images/event2/week1_best_profile.jpg" alt="" width="69">
                                        <span>yell_cc_</span>
                                    </div>
                                    <div class="desc_area">
                                        가방에 쏙!<br>
                                        완젹한 클렌징, 요만한거 없는듯💗<br><br>
                                        #바이오더마#센시비오#클렌징워터#한정판#투고키트#클렌징지존
                                    </div>
                                    <div class="color_area">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="arrow_area">
                            <button class="button-prev"></button>
                            <button class="button-next"></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="main-section3">
                <div class="section3-wrap">
                    <div class="title">
                        <span>#바이오더마</span>
                        <span>#투고키트</span>
                        <span>#클렌징지존</span>
                    </div>
                    <span class="sub_title">게시물은 매주 월요일 정오에 업데이트 됩니다</span>
                    <div class="iframe_area">
                        <div class="attractt-container" data-idx="0" data-code="T9VmNLEdHZa3iGh" data-board="grid"></div>
                    </div>
                </div>
            </div>
			<div class="c-footer">
				<div class="c-footer__aligner">
					<ul class="c-footer__list">
						<li><a href="javascript:void(0)" data-layer-popup="popup_agree1" onclick="wmbt.popupOpen(this);">개인정보취급방침</a></li>
						<li><a href="javascript:void(0)" data-layer-popup="popup_agree2" onclick="wmbt.popupOpen(this);">이용약관</a></li>
						<li><a href="http://www.bioderma.co.kr/page/brand_philosophy.php" target="_blank">바이오더마 소개</a></li>
						<li><a href="http://www.bioderma.co.kr/front/board.php?bbs_id=notice" target="_blank">온라인 고객센터</a></li>
					</ul>
					<ul class="c-footer__list">
						<li>나오스코리아 유한회사</li>
						<li>대표: 장이브데모트</li>
						<li>사업자등록번호: 214-88-79685 <a href="http://www.ftc.go.kr/bizCommPop.do?wrkr_no=&apv_perm_no=2015321015330200215" target="_blank">(사업자정보확인)</a></li>
					</ul>
					<ul class="c-footer__list">
						<li>주소: 서울특별시 서초구 서초중앙로 138 우림빌딩 7층 나오스코리아 유한회사</li>
						<li>개인정보책임자: 김민정</li>
					</ul>
					<ul class="c-footer__list">
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
        
        include_once "./popup/popup_agree1.php";
        
        include_once "./popup/popup_agree2.php";
		
        include_once "./popup/popup_winner_list.php";
?>        
        <script type="text/javascript">
            $(document).ready(function() {
                var mainSwiper = new Swiper ('.main-slider', {
                    // Optional parameters
                    direction: 'horizontal',
                    loop: true,
                    // Navigation arrows
                    navigation: {
                        nextEl: '.button-next',
                        prevEl: '.button-prev'
                    },
                });
				
				var popupSwiper = new Swiper('.popup-slider', {
					// Optional parameters
					direction: 'horizontal',
					loop: true,
					// Navigation arrows
					navigation: {
						nextEl: '.button-next',
						prevEl: '.button-prev'
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
				

<?
	if ($r == "y")
	{
?>
				var scTop = $('.main-section2').offset().top;
                $('html, body').animate({scrollTop:scTop + 40}, 500);
<?
	}
?>
                
            });

            (function(d, s) {
                var j, e = d.getElementsByTagName(s)[0], h = "https://cdn.attractt.com/embed/js/dist/embed.min.js";
                if (typeof AttracttTower === "function" || e.src === h) { return; }
                j = d.createElement(s);
                j.src = h;
                j.async = true;
                e.parentNode.insertBefore(j, e);
            })(document, "script");
			
			$(window).load(function() {
				// wmbt.popupSelfOpen('popup_winner_list');
			});
        </script>
    </body>
</html>