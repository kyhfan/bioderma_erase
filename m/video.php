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
			<div class="wrapper video">
				<div class="title tt-deco">
					<img src="./images/event_2/popup_title_video.png" alt="메이크업 인지 테스트">
				</div>
				<div class="area-video">
					<div class="wrapper">
						<iframe allowfullscreen="1" src="https://www.youtube.com/embed/JkCGTXTn0oM?controls=0&loop=1&playlist=JkCGTXTn0oM&modestbranding=1&showinfo=0&wmode=opaque&enablejsapi=1&rel=0&autoplay=1" frameborder="0" id="ytplayer" class="ytplayer" style="position:relative;z-index:11;left:9px;top:7px"></iframe>
						<div class="video">
<!--							<img src="./images/event_2/popup_video_sample.jpg" alt="">-->
						</div>
					</div>
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
					<li>이벤트 안내번호: 070-4888-1164</li>
					<li>통신판매업신고번호: 2015-서울서초-0215</li>
					<li>E-MAIL: bioderma@bioderma.kr</li>
				</ul>
				<div class="copyright">©2018  BIODERMA.  ALL RIGHT RESERVED.</div>
			</div>
		</div>
	</div>
</body>
</html>
