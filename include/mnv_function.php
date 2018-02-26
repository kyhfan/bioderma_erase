<?
/*
*
*	php function
*
*/
class mnv_function extends mnv_dbi
{
    var $winner_flag;
	public function InsertTrackingInfo($media, $gubun)
	{
		global $my_db;
		$log_query	= "INSERT INTO tracking_info(tracking_media, tracking_refferer, tracking_ipaddr, tracking_date, tracking_gubun) values('".$media."','".$_SERVER['HTTP_REFERER']."','".$_SERVER['REMOTE_ADDR']."',now(),'".$gubun."')";
		$q_result 	= mysqli_query($my_db, $log_query);

		return $q_result;
	}

	public function MobileCheck()
	{
		$mobile_agent = array("iPhone","iPod","iPad","Android","Blackberry","SymbianOS|SCH-M\d+","Opera Mini", "Windows ce", "Nokia", "sony" );
		$check_mobile = "N";

		for($i=0; $i<sizeof($mobile_agent); $i++){
			if(stripos( $_SERVER['HTTP_USER_AGENT'], $mobile_agent[$i] )){
				$check_mobile = "Y";
				break;
			}
		}
		return $check_mobile;
	}

	public function SaveMedia()
	{
        $_SESSION['ss_media']		= $_REQUEST['media'];
	}

	public function winner_draw($level, $level2_phone)
	{
		$kit_winner_count       = 100;	// 투고 키트 총 당첨 수량
		$goods_winner_count     = 30;	// 정품 총 당첨 수량

        $kit_array      = array(8);
        $goods_array    = array(200000);

        // 총 키트 당첨 수량 
		$kit_query      = "SELECT mb_winner, count(mb_winner) FROM member_info WHERE  mb_winner='kit'";
		$kit_result     = mysqli_query($my_db, $kit_query);
		$kit_num        = mysqli_num_rows($kit_result);
        
        // 총 정품 당첨 수량
		$goods_query     = "SELECT mb_winner, count(mb_winner) FROM member_info WHERE  mb_winner='goods'";
		$goods_result    = mysqli_query($my_db, $goods_query);
		$goods_num       = mysqli_num_rows($goods_result);
        
        // 오늘 참여자 수
		$today_query		= "SELECT * FROM member_info WHERE mb_regdate like '%".date("Y-m-d")."%'";
		$today_result		= mysqli_query($my_db, $today_query);
		$today_num		    = mysqli_num_rows($today_result);

        $winner             = "blank";

        if ($kit_num < $kit_winner_count)
        {
            foreach ($kit_array as $key => $val)
            {
                if ($today_num == $val)
                {
                    $winner = "kit";
                    break;
                }
            }
            // 3레벨일 경우에만 정품 당첨 추첨
            if ($level == 3)
            {
                if ($goods_num < $goods_winner_count)
                {
                    foreach ($goods_array as $key => $val)
                    {
                        if ($today_num == $val)
                        {
                            $winner = "goods";
                            break;
                        }
                    }
                }
            }
        }
        return $winner;
	}
}