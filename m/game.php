<!DOCTYPE html>
<html lang="ko">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <title></title>
        <meta name="format-detection" content="telephone=no" />

        <link rel="stylesheet" href="./css/common.css" />
        <link rel="stylesheet" href="./css/page.css" />

        <script src="./lib/jquery/jquery-1.9.1.min.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script src="./lib/placeholder/jquery.placeholder.min.js"></script>
        <script src="./lib/gsap/TweenMax.min.js"></script>
        <script src="./lib/gsap/jquery.gsap.min.js"></script>
        <script src="./lib/eraser/jquery.eraser.js"></script>

        <script src="./js/common.js"></script>
    </head>
    <body>
        <div class="wrap wrap--sub">
            <div class="c-header">
                <div class="c-header__aligner">
                    <h1 class="c-h1"><a href="#" class="c-h1__logo"><img src="./images/common/c-logo.png" alt="BIODERMA" /></a></h1>
                    <a href="#" class="c-drawer__trigger">
                        <span class="c-drawer__burger c-drawer__burger--top">메뉴</span>
                        <span class="c-drawer__burger c-drawer__burger--middle">여</span>
                        <span class="c-drawer__burger c-drawer__burger--bottom">닫기</span>
                    </a>
                </div>
                <div class="c-drawer">
                    <div class="c-drawer__aligner">
                        <div class="c-events">
                            <button class="c-event c-event--1"><span>EVENT 1</span>건강한 피부만 남기다</button>
                            <button class="c-event c-event--2"><span>EVENT 2</span>투고 키트 샘플링</button>
                        </div>
                        <div class="c-sns">
                            <button class="c-sns__button c-sns__button--facebook">페이스북</button>
                            <button class="c-sns__button c-sns__button--kakao">카카오스토리</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="c-content c-content--sub">
                <div class="game__popups ">
                    <div class="game__popup">
                        <a href="#" class="game__start">게임시작</a>
                    </div>
                </div>
                <div class="gauge">
                    <div class="gauge__time">30</div>
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
                        <li><a href="#">바이오더마 소개</a></li>
                        <li><a href="#">온라인 고객센터</a></li>
                    </ul>
                    <ul class="c-footer__list c-footer__list--none">
                        <li>나오스코리아 유한회사</li>
                        <li>대표: 장이브데모트 &nbsp;사업자등록번호: 214-88-79685 (사업자정보확인)</li>
                        <li>주소: 서울특별시 서초구 서초중앙로 138<br>우림빌딩 7층 나오스코리아 유한회사</li>
                        <li>개인정보책임자: 김민정 &nbsp;대표번호: 02-523-7620</li>
                        <li>통신판매업신고번호: 2015-서울서초-0215</li>
                        <li>E-MAIL: bioderma@bioderma.kr</li>
                    </ul>
                    <div class="copyright">©2018  BIODERMA.  ALL RIGHT RESERVED.</div>
                </div>
            </div>

            <script type="text/javascript">
                
                var count = 0;
                var time = 30;
                var gameTimer = null;
                var sizeArray = [57, 47, 41];
                var ratioArray = [94, 98, 95];
                
                function gameTimerExec(imageNum) {
                    gameTimer = setInterval(function() {
                        time--;
                        count+=1;
                        var gaugeWidths = $('.gauge__adds').css('width'),
                            gaugeWidth = parseInt(gaugeWidths.replace('px', ''));
                        $('.gauge__time').text(time);
                        $('.gauge__adds').animate({
                            'width': ((count + 2) * 3.33) + '%'
                        }, 1000, 'linear');

                        if (time <= 0) {
                            $('.gauge__adds').addClass('gauge__adds--active');
                            clearInterval(gameTimer);
//                            switch(imageNum)
//                            {
//                                case 0 :
//                                    wmbt.popupSelfOpen("popup_tryagain");
//                                    break;
//                                case 1 :
//                                    wmbt.popupSelfOpen("popup_level1_clear");
//                                    break;
//                                case 2 :
//                                    wmbt.popupSelfOpen("popup_level2_clear");
//                                    break;
//                            }
                            alert("게임오버");
                        }                            
                    }, 1000);  
                }
                // gauge
                $('.game__start').on('click', function(event){
                    $('.game__popups').addClass('game__popups--active');
                    $('.gauge__body').css('width','0');
                    
                    gameTimerExec(1);

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
                         alert("올 클리어");                        
                        clearInterval(gameTimer);
//                        wmbt.popupSelfOpen("popup_level3_clear");
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
        </div>
    </body>
</html>
