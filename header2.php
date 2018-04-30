            <div class="main-header">
                <div class="header-wrap">
                    <div class="header-sns-area">
                        <button class="share_fb_btn" onclick="wmbt.sns_share('fb');"></button>
                        <button class="share_ks_btn" onclick="wmbt.sns_share('ks');"></button>
                        <!-- <img src="./images/event2/share_facebook_btn.png" alt="페이스북 공유 버튼">
                        <img src="./images/event2/share_kakaostory_btn.png" alt="카카오스토리 공유 버튼"> -->
                    </div>
                    <div class="header-navi">
                        <button class="navi1" data-move="index" onclick="wmbt.move(this)">
                            <span></span>
                            <span>투고키트 이벤트</span>
                        </button>
                        <!-- <div class="navi1">
                            <span></span>
                            <span>투고키트 이벤트</span>
                        </div> -->
                        <button class="navi2" data-move="video1" onclick="wmbt.move(this)">
                            <span></span>
                            <span>메이크업 인지 테스트</span>
                        </button>
                        <!-- <div class="navi2">
                            <span></span>
                            <span>메이크업 인지 테스트</span>
                        </div> -->
                        <button class="navi3" data-move="video2" onclick="wmbt.move(this);click_tracking('바이오더마 웹드라마 영상')">
                        <!-- <button class="navi3" data-move="video2" onclick="alert('웹드라마 \'지울 수밖에 없는 사랑\'은 4월 11일 오픈됩니다.')"> -->
                            <span></span>
                            <span>바이오더마 웹드라마</span>
                        </button>
                        <!-- <div class="navi3">
                            <span></span>
                            <span>바이오더마 웹드라마</span>
                        </div> -->
                    </div>
                    <div class="header-logo">
                        <a href="http://www.bioderma.co.kr/" target="_blank"><img src="./images/event2/header_logo.png" alt="로고"></a>
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