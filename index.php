<?
	include_once "./include/autoload.php";

    $mnv_f = new mnv_function();
    $my_db         = $mnv_f->Connect_MySQL();
    $rs_tracking   = $mnv_f->InsertTrackingInfo($media, $gubun);
    $mobileYN      = $mnv_f->MobileCheck();
    $saveMedia     = $mnv_f->SaveMedia();
    // print_r($_SESSION);
	// if ($_SESSION['ss_redirect'] == "Y")
	// {
	// 	$_SESSION['ss_redirect'] = "N";
	// 	echo "<script>location.href='index.php';</script>";

	// }
    // print_r($mobileYN);
?>
<a href="javascript:void(0)" onclick="level_submit()">Level 2 이벤트 결과</a>
<script type="text/javascript" src="./js/jquery-1.11.2.min.js"></script>
<script>
    function level_submit()
    {
        var level_name      = $("#level_name").val();
        var level_phone     = $("#level_phone").val();
        var level_addr      = $("#level_addr").val();
        var level           = $("#level").val();

        // 임시 변수값
        level_name          = "김영훈";
        level_phone         = "11111";
        level_addr          = "테스트 주소";
        level               = 2;

        $.ajax({
			type:"POST",
			data:{
				"exec"					: "level_input_info",
				"level_name"			: level_name,
				"level_phone"			: level_phone,
				"level_addr"			: level_addr,
				"level"			        : level

			},
			url: "./main_exec.php",
			success: function(response){
				console.log(response);
			}
		});
    }
</script>