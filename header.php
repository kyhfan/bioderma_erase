            <div class="c-header c-header--main">
				<div class="c-header__aligner">
					<h1 class="c-h1"><a href="http://www.bioderma.co.kr/" target="_blank" class="c-h1__logo"><img src="./images/common/c-logo.png" alt="BIODERMA" /></a></h1>
					<div class="c-sns">
						<button class="c-sns__button c-sns__button--facebook" onclick="wmbt.sns_share('fb');">페이스북</button>
						<button class="c-sns__button c-sns__button--kakao" onclick="wmbt.sns_share('ks');">카카오스토리</button>
					</div>
					<div class="c-events">
						<button class="c-event c-event--1" onclick="location.href='index.php'"><span>EVENT 1</span>건강한 피부만 남기다</button>
						<button class="c-event c-event--2" onclick="alert('4월에 오픈됩니다')"><span>EVENT 2</span>투고 키트 샘플링</button>
					</div>
				</div>
            </div>
<?
    if ($obYN == "Y")
    {
?>            
            <div class="old-browser-alarm">
                <div class="message">
                    캠페인 참여가 불가능한 구형 브라우저를 사용하고 계십니다.<br />
                    최신 브라우저를 설치 하시면 더욱 쾌적하게 인터넷을 사용 하실 수 있습니다.<br />
                    아래 링크를 클릭하여 최신 브라우저를 설치 하신 후 캠페인에 참여해 주세요.<br />
                    <a href="http://outdatedbrowser.com/ko" target="_blank">최신 브라우저 받기</a>
                </div>
                <a href="javascript:void(0)" class="c-popup__close" onclick="$('.old-browser-alarm').hide();">popup close</a>
            </div>
<?
    }
?>