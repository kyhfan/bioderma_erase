<?
	include_once "./include/autoload.php";
    exit;
    $mnv_f      = new mnv_function();
    $obYN          = $mnv_f->BrowserCheck();
    // $my_db      = $mnv_f->Connect_MySQL();
    // $rs_game    = $mnv_f->InsertTrackingInfo($media, $gubun);
    // $mobileYN      = $mnv_f->MobileCheck();
    // $saveMedia     = $mnv_f->SaveMedia();

    include_once "./head.php";

    echo "<script>location.href='index.php';</script>";
?>

    <body>
        <div class="wrap">
<?
	include_once "./header.php";
?>            

            <div class="c-content c-content--sub">
                <!-- <div class="game__popup">
                    <div class="game__starts">
                        <a href="javascript:void(0)" class="game__start">게임시작</a>
                        <div class="game__start-txt"><img src="./images/pages/s-start__txt.png" alt="클릭 시 게임이 시작됩니다." /></div>
                    </div>
                </div> -->
                <div class="c-content__aligner">
                    <div class="gauge">
                        <div class="gauge__time">20</div>
                        <div class="gauge__bars">
                            <div class="gauge__bar">
                                <div class="gauge__adds">
                                    <div class="gauge__add"></div>
                                </div>
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
                            <div class="game__steps">
                                <a href="javascript:void(0)" id="step1" class="game__step game__step--active">1</a>
                                <a href="javascript:void(0)" id="step2" class="game__step">2</a>
                                <a href="javascript:void(0)" id="step3" class="game__step">3</a>
                            </div>
                            <div class="game-clear__msg">
                                <span class="msg">CLEAR<i>!</i></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
<?
    include_once "./footer.php";
    
    include_once "./popup/popup_try_again.php";
    
    include_once "./popup/popup_game_pre.php";
    
    include_once "./popup/popup_level1_clear.php";
    
	include_once "./popup/popup_level2_clear.php";
    
	include_once "./popup/popup_level3_clear.php";
    
	include_once "./popup/popup_winner_goods.php";
    
	include_once "./popup/popup_winner_kit.php";
    
	include_once "./popup/popup_winner_draw.php";
    
	include_once "./popup/popup_agree1.php";
    
	include_once "./popup/popup_agree2.php";

?>
                <script type="text/javascript">
                    var count = 0;
                    var time = 20;
                    var gameTimer = null;
                    var sizeArray = [100, 80, 60];
                    var ratioArray = [92, 97, 95];
                    wmbt.popupSelfOpen("popup_game_pre");
                    function gameTimerExec(imageNum) {
                        gameTimer = setInterval(function() {
                            time--;
                            count+=1;
                            var gaugeWidths = $('.gauge__adds').css('width'),
                                gaugeWidth = parseInt(gaugeWidths.replace('px', ''));
                            $('.gauge__time').text(time);
                            $('.gauge__adds').animate({
                                // 'width': ((count + 1) * 3.45) + '%'
                                'width': ((count + 1) * 5.2) + '%'
                            }, 1000, 'linear');

                            if (time <= 0) {
                                $('.gauge__adds').addClass('gauge__adds--active');
                                clearInterval(gameTimer);
                                switch(imageNum)
                                {
                                    case 0 :
                                        wmbt.popupSelfOpen("popup_tryagain");
                                    break;
                                    case 1 :
                                        wmbt.popupSelfOpen("popup_level1_clear");
                                    break;
                                    case 2 :
                                        wmbt.popupSelfOpen("popup_level2_clear");
                                    break;
                                }
                                // alert("게임오버");
                            }                            
                        }, 1000);  
                    }
                    // gauge
                    $('.game_start').on('click', function() {
                        wmbt.popupSelfClose("popup_game_pre");
                        $('.game__popup').addClass('game__popup--active');
                        $('.gauge__body').css('width', '0');
                        
                        gameTimerExec(0);

                        $.ajax({
                            type:"POST",
                            data:{
                                "exec"					: "game_click_info"

                            },
                            url: "./main_exec.php",
                            success: function(response){
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
                                        alert("이미 참여해 주셨습니다. 감사합니다.");
                                        location.href = "index.php";
                                    break;
                                }
                                console.log(response);
                            }
                        });

//                        var count = -1;
//                        for (var time = 0; time <= 30; time++) {
//                            gameTimer = setTimeout(function() {
//                                var gaugeWidths = $('.gauge__adds').css('width'),
//                                    gaugeWidth = parseInt(gaugeWidths.replace('px', ''));
//                                $('.gauge__time').text(count += 1);
//                                $('.gauge__adds').animate({
//                                    'width': ((count + 1) * 3.45) + '%'
//                                }, 1000, 'linear');
//
//                                if (count == 30) {
//                                    $('.gauge__adds').addClass('gauge__adds--active');
//                                }
//                            }, 1000 * time);
//                        }
                    });
                    

                    // eraser // 1라운드 세팅
                    eraserSet(1, 100, 92);
                    //						eraserSet(2,80);
                    //						eraserSet(3,60);

                    $('.game__box').on('mouseover', function() {
                        var $currentCotton = $(this).find('.game__cotton');
                        $currentCotton.css('visibility', 'hidden');
                        var thisImgs = $(this).find('img').attr('src'),
                            thisImg = thisImgs.replace('.png', '.cur');
						console.log(thisImgs);
						console.log(thisImg);
//                        $currentCotton.addClass('game__cotton--active');
                        $('.game__aligner').css('cursor', 'url(' + thisImgs + '), url(' + thisImg + '), auto');
                    });
                    
                    function eraserSet(imageNum, sizeValue, ratio) {
                        ratio = ratio || 92;
                        setRatio = (ratio*0.01).toFixed(2);
                        console.log(setRatio);
                        $('.game__image-' + imageNum).find('.stage-image').eraser({
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
                            wmbt.popupSelfOpen("popup_level3_clear");
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
//                        var nextFlag = confirm("다음스테이지?");
//                        if(nextFlag) {
//                            gameTimerExec();
//                            eraserSet(nextNum, nextSize, nextRatio);
//                        }else{
//                            alert("인덱스로");
//                        }
                        
                    }

//                    $('.game__cotton').on('mouseover', function() {
//                        var thisImgs = $(this).find('img').attr('src'),
//                            thisImg = thisImgs.replace('.png', '.cur');
//                        $(this).addClass('game__cotton--active');
//                        $('.game__aligner').css('cursor', 'url(' + thisImg + '), auto');
//                    });
                </script>
        </div>
<script type="text/javascript" src="http://wcs.naver.net/wcslog.js"></script>
<script type="text/javascript">
if(!wcs_add) var wcs_add = {};
wcs_add["wa"] = "73500228899d2c";
wcs_do();
</script>        
    </body>

    </html>