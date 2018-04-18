<?
include_once "./include/autoload.php";

$mnv_f      = new mnv_function();
$obYN          = $mnv_f->BrowserCheck();
// $my_db      = $mnv_f->Connect_MySQL();
// $rs_game    = $mnv_f->InsertTrackingInfo($media, $gubun);
// $mobileYN      = $mnv_f->MobileCheck();
// $saveMedia     = $mnv_f->SaveMedia();

include_once "./head2.php";
?>

<body>
	<div class="wrap wrap--sub">
		<?
		include_once "./header2.php";
		?>            

		<div class="c-content c-content--sub">
			<div class="c-content__aligner">
				<div class="video-wrapper">
					<div class="title">
						<img src="./images/event2/sub_video_title2.png" alt="메이크업 인지 테스트">
					</div>
					<div class="video">
						<div class="player">
							<!-- <img src="./images/event2/sub_video_sample.jpg" alt=""> -->
							<iframe allowfullscreen="1" src="https://www.youtube.com/embed/OwXHKcC0rL8?controls=0&loop=1&playlist=OwXHKcC0rL8&modestbranding=1&showinfo=0&wmode=opaque&enablejsapi=1&rel=0&autoplay=1" frameborder="0" id="ytplayer" class="ytplayer" width="971" height="589" style="position:relative;z-index:2"></iframe>
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