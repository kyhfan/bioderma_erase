<?
	include_once "./include/autoload.php";

    $mnv_f = new mnv_function();
	include_once "./head.php";
?>
	<body>
		<div class="wrap">
			<div class="c-header">
				<div class="c-header__aligner">
					<h1 class="c-h1"><a href="index.php" class="c-h1__logo"><img src="./images/common/c-logo.png" alt="BIODERMA" /></a></h1>
					<div class="c-sns">
						<button class="c-sns__button c-sns__button--facebook">페이스북</button>
						<button class="c-sns__button c-sns__button--kakao">카카오스토리</button>
					</div>
					<div class="c-events">
						<button class="c-event c-event--1"><span>EVENT 1</span>건강한 피부만 남기다</button>
						<button class="c-event c-event--2" onclick="alert('4월에 오픈됩니다')"><span>EVENT 2</span>투고 키트 샘플링</button>
					</div>
				</div>
			</div>

			<div class="c-content">
				<div class="m-visual">
					<div class="is-hidden">
						메이크업은 말끔하게 지우고 건강한 피부만 남겨요 !
						제한 시간 동안 메이크업을 말끔하게 지워주세요
						추첨을 통해 제품을 선물로 드립니다
					</div>
					<button class="m-visual__button">GAME START</button>
				</div>
				<div class="m-aligner">
					<div class="c-section">
						<div class="m-infos">
							<div class="m-infos__info">
								<div class="m-heading"><img src="./images/pages/m-heading--1.png" alt="이벤트 안내" /></div>
								<ul class="m-info__list">
									<li class="m-info__item">
										<div class="m-info__heading">기간</div>
										<div class="m-info__data">2018.3.5 ~ 2018.3.31</div>
									</li>
									<li class="m-info__item">
										<div class="m-info__heading">발표</div>
										<div class="m-info__data">즉석 당첨</div>
									</li>
									<li class="m-info__item">
										<div class="m-info__heading">배송</div>
										<div class="m-info__data">매주 월요일 일괄 발송</div>
									</li>
								</ul>
							</div>
							<div class="m-infos__step">
								<ul class="m-step__list">
									<li class="m-step__item">
										<div class="m-step__num">#1</div>제한 시간은 30초 입니다
									</li>
									<li class="m-step__item">
										<div class="m-step__num">#2</div>워터가 적셔진 화장솜을 이용해 메이크업을 지워주세요
									</li>
									<li class="m-step__item">
										<div class="m-step__num">#3</div>단계가 올라갈 수록 화장솜 크기는 작아집니다
									</li>
									<li class="m-step__item">
										<div class="m-step__num">#4</div>모든 메이크업을 말끔하게 지우고 건강한 피부만<br />남긴 분들에게는 추첨을 통해 선물을 드립니다 !
									</li>
								</ul>
							</div>
						</div>
					</div>

					<div class="c-section">
						<div class="m-heading"><img src="./images/pages/m-heading--2.png" alt="경품 안내" /></div>
						<div class="m-prize">
							<div class="m-prize__image">
								<img src="./images/pages/m-prize__image.png" alt="경품1등,2등 안내" />
								<div class="is-hidden">
									<ul>
										<li>1등: #3단계 까지 모두 클리어! 모두 말끔하게 지우신 분들 중 추첨을 통해 바이오더마 클렌징워터 정품 증정</li>
										<li>2등: #2단계 까지 모두 클리어! 모두 말끔하게 지우신 분들 중 추첨을 통해 바이오더마 투-고 키트 증정</li>
									</ul>
								</div>
							</div>
							<div class="m-noti">
								<div class="m-noti__heading">※ 이벤트 유의사항</div>
								<ul class="m-noti__list">
									<li class="m-noti__item">본 행사는 2018년 3월 5일부터 3월 31일까지 진행되며, 기타 사유로 조기 종료할 수 있습니다.</li>
									 <li class="m-noti__item">경품은 동일인에게 중복증정되지 않으며, 기타 내부 사유로 변경될 수 있습니다. </li>
									 <li class="m-noti__item">1등 경품 중 클렌징워터는 <em class="c-em">센시비오/세비엄/하이드라비오 클렌징워터 3종 500ml(1명) / 250ml(2명) / 100ml(3명)</em> 으로 랜덤 선정됩니다. </li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="m-video">
					<div class="m-video__top">
						<div class="m-video__text"><img src="./images/pages/m-text--1.png" alt="잔여물없이 말끔하게 지워야 진짜 맨얼굴! 건강한 피부만 남기는 모습, 영상으로도 확인하세요" /></div>
						<a href="#" class="m-video__link">
							<div class="m-video__image"><img src="./images/pages/m-video__image.png" alt="영상썸네일" /></div>
						</a>
					</div>
					<div class="m-video__bottom">
						<div class="m-video__bg">
							<div class="is-hidden">
								건강한 피부만 남겨요
								스킨케어 클렌저 바이오더마 클렌징워터

								1) 프랑스본사자료 CIREC 13041 30명 대상(23-64세 남녀) 7일간 사용(아침/저녁), 사용자 만족도 테스트, 개인차있음
							</div>
							
							<div class="m-video__aligner">
								<div class="m-video__percents">
									<a href="#" class="m-video__percent"><img src="./images/pages/m-video__percent--1.png" alt="100% 메이크업 클렌징력 1)" /></a>
									<a href="#" class="m-video__percent"><img src="./images/pages/m-video__percent--2.png" alt="100% 저자극 클렌징 1)" /></a>
									<a href="#" class="m-video__percent"><img src="./images/pages/m-video__percent--3.png" alt="클렌징 후 부드러운 피부 1)" /></a>
								</div>

								<button class="m-video__button" data-layer-popup="popup_level3_clear" onclick="wmbt.popupOpen(this);">스킨케어 클렌
								저 구매하기</button>
							</div>
						</div>
					</div>
				</div>
			</div>
<?
    include_once "./footer.php";
    
    include_once "./popup/popup_try_again.php";
    
    include_once "./popup/popup_level1_clear.php";
    
	include_once "./popup/popup_level2_clear.php";
    
	include_once "./popup/popup_level3_clear.php";
    
	include_once "./popup/popup_winner_goods.php";
    
	include_once "./popup/popup_winner_kit.php";
    
	include_once "./popup/popup_winner_draw.php";
    
	include_once "./popup/popup_agree1.php";
    
	include_once "./popup/popup_agree2.php";
?>		
		</div>
	</body>
</html>