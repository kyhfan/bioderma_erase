<?
include_once "./include/autoload.php";

$mnv_f      = new mnv_function();
$obYN          = $mnv_f->BrowserCheck();
// $my_db      = $mnv_f->Connect_MySQL();
// $rs_game    = $mnv_f->InsertTrackingInfo($media, $gubun);
// $mobileYN      = $mnv_f->MobileCheck();
// $saveMedia     = $mnv_f->SaveMedia();

include_once "./head.php";
?>

<body>
	<div class="wrap wrap--sub">
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
				<div class="video-wrapper">
					<div class="title">
						<img src="./images/event2/sub_video_title.png" alt="메이크업 인지 테스트">
					</div>
					<div class="video">
						<div class="player">
							<img src="./images/event2/sub_video_sample.jpg" alt="">
						</div>
					</div>
				</div>
			</div>
		</div>
		<?
		include_once "./footer.php";
		?>
	</div>
	<script type="text/javascript" src="http://wcs.naver.net/wcslog.js"></script>
	<script type="text/javascript">
		if(!wcs_add) var wcs_add = {};
		wcs_add["wa"] = "73500228899d2c";
		wcs_do();
	</script>        
</body>

</html>