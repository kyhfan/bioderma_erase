<?
/*
*
*	php function
*
*/
class mnv_function extends mnv_dbi
{
	var $winner_flag;
	
	public function InsertTrackingInfo($gubun)
	{
		global $my_db;
		$log_query	= "INSERT INTO tracking_info(tracking_media, tracking_refferer, tracking_ipaddr, tracking_date, tracking_gubun) values('".$_SESSION['ss_media']."','".$_SERVER['HTTP_REFERER']."','".$_SERVER['REMOTE_ADDR']."',now(),'".$gubun."')";
		$q_result 	= mysqli_query($my_db, $log_query);

		return $log_query;
	}

	public function MobileCheck()
	{
		$mobile_agent = array("iPhone","iPod","iPad","Android","Blackberry","SymbianOS|SCH-M\d+","Opera Mini", "Windows ce", "Nokia", "sony" );
		$check_mobile = "PC";

		for($i=0; $i<sizeof($mobile_agent); $i++){
			if(stripos( $_SERVER['HTTP_USER_AGENT'], $mobile_agent[$i] )){
				$check_mobile = "MOBILE";
				break;
			}
		}
		return $check_mobile;
	}

	public function BrowserCheck()
	{
        if(stripos( $_SERVER['HTTP_USER_AGENT'], "MSIE 8" ) || stripos( $_SERVER['HTTP_USER_AGENT'], "MSIE 9" ))
        	$OB	    = "Y";
        else
        	$OB	= "N";
        return $OB;
	}

	public function SaveMedia()
	{
		$_SESSION['ss_media']		= $_REQUEST['media'];
	}

	public function winner_draw($level)
	{
		$kit_winner_count       = 100;	// 투고 키트 총 당첨 수량
		$goods_winner_count     = 6;	// 정품 총 당첨 수량

        $kit_array      = array(8);
        // $kit_array      = array("Y","N","N","N","N","N","N","N","N","N","N","N","N","N","N","N","N","N","N","N");
		// shuffle($kit_array);
		
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
	public function winner_draw2($level)
	{
		global $my_db;
		$kit_winner_count       = 7300;	// 투고 키트 총 당첨 수량
		$goods_winner_count     = 6;	// 정품 총 당첨 수량

        $kit_array      = array("N","N","N","N","N","N");
        // $kit_array      = array("Y");
        // $kit_array      = array("Y","N");
		shuffle($kit_array);
		
		// $goods_array    = array(1350);

        // 총 키트 당첨 수량 
		$kit_query      = "SELECT * FROM member_info WHERE  mb_winner='kit'";
		$kit_result     = mysqli_query($my_db, $kit_query);
		$kit_num        = mysqli_num_rows($kit_result);
        
        // 총 정품 당첨 수량
		$goods_query     = "SELECT * FROM member_info WHERE  mb_winner='goods'";
		$goods_result    = mysqli_query($my_db, $goods_query);
		$goods_num       = mysqli_num_rows($goods_result);
        
        // 오늘 참여자 수
		$today_query		= "SELECT * FROM member_info WHERE mb_regdate like '%".date("Y-m-d")."%'";
		$today_result		= mysqli_query($my_db, $today_query);
		$today_num		    = mysqli_num_rows($today_result);

        $winner             = "blank";

        if ($kit_num < $kit_winner_count)
        {
			if ($kit_array[0] == "Y")
			{
				// $winner = "kit";
				$winner = "blank";
			}else{
				// 3레벨일 경우에만 정품 당첨 추첨
				if ($level == 3)
				{
					if ($goods_num < $goods_winner_count)
					{
						// foreach ($goods_array as $key => $val)
						// {
						// 	if ($today_num == $val)
						// 	{
						// 		$winner = "goods";
						// 		break;
						// 	}
						// }
						// $winner = "goods";
						$winner = "blank";
					}
				}
			}
        }
        return $winner;
	}
	public function winner_lms()
	{
		global $my_db;

		$httpmethod = "POST";
		// 미니버타이징
		$url = "http://api.openapi.io/ppurio/1/message/lms/minivertising";
		$clientKey = "MTAyMC0xMzg3MzUwNzE3NTQ3LWNlMTU4OTRiLTc4MGItNDQ4MS05NTg5LTRiNzgwYjM0ODEyYw==";
		$contentType = "Content-Type: application/x-www-form-urlencoded";
	
		// $query = "SELECT * FROM winner_info WHERE winner_phone IN ('01030033965','01037578414')";
		$query = "SELECT * FROM winner_info WHERE 1 AND winner_flag='N' LIMIT 1000";
		$result 		= mysqli_query($my_db, $query);
	
		while ($data = mysqli_fetch_array($result))
		{
			print_r($data);
			//create basic authentication header
			$headerValue = $clientKey;
			$headers = array("x-waple-authorization:" . $headerValue);
		
			$params = array(
				'send_time' => '',
				'send_phone' => '07048883804',
				'dest_phone' => $data["winner_phone"],
				//'dest_phone' => '01030033965',
				'send_name' => '',
				'dest_name' => '',
				'subject' => '투고키트 후기, 바이오더마 정품이 되다',
				'msg_body' => "
[바이오더마-투고키트 후기이벤트]

안녕하세요, 바이오더마입니다.			
클렌징 게임을 통해 당첨되신 투고키트는 잘 수령하셨나요? :-)

일상에서 투고키트를 사용하시고 후기를 인증해주세요!

추첨을 통해 최종 10분께는 바이오더마 정품 3종 세트를 선물로 드립니다.

*쉿! 후기 이벤트는 투고키트를 이벤트로 수령한 분들만 참여 가능하여 다른 이벤트보다 당첨의 기회가 높으니 서둘러서 참여해보세요-

정품 3종세트 받기!
http://bit.ly/bioderma_review
"
		);
	
		//curl initialization
		$curl = curl_init();
	
		//create request url
		//$url = $url."?".$parameters;
	
		curl_setopt ($curl, CURLOPT_URL , $url);
		curl_setopt ($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt ($curl, CURLOPT_HTTPHEADER, $headers);
		curl_setopt ($curl, CURLINFO_HEADER_OUT, true);
		curl_setopt ($curl, CURLOPT_SSL_VERIFYPEER, false);
	
		curl_setopt($curl, CURLOPT_POST, 1);
		curl_setopt($curl, CURLOPT_POSTFIELDS, $params);
		curl_setopt($curl, CURLOPT_TIMEOUT, 30);
	
		$response = curl_exec($curl);
	
		$httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
		$responseHeaders = curl_getinfo($curl, CURLINFO_HEADER_OUT);
	
	
		curl_close($curl);
	
			$json_data = json_decode($response, true);
		
			/*
			받아온 결과값을 DB에 저장 및 Variation
			*/

			$query2 = "UPDATE winner_info SET winner_flag='Y' WHERE winner_phone='".$data["winner_phone"]."'";
			$result2 		= mysqli_query($my_db, $query2);

			$query3 = "INSERT INTO sms_info(send_phone, send_status, cmid, send_regdate) values('".$data["winner_phone"]."','".$json_data['result_code']."','".$json_data['cmid']."','".date("Y-m-d H:i:s")."')";
			$result3 		= mysqli_query($my_db, $query3);
			print_r($json_data);
		}
	}
	public function sendRequest_winner($httpMethod, $url, $clientKey, $contentType, $phone) {

		//create basic authentication header
		$headerValue = $clientKey;
		$headers = array("x-waple-authorization:" . $headerValue);
	
		$params = array(
			'send_time' => '',
			'send_phone' => '07048883804',
			'dest_phone' => $phone,
			//'dest_phone' => '01030033965',
			'send_name' => '',
			'dest_name' => '',
			'subject' => '투고키트 후기, 바이오더마 정품이 되다',
			'msg_body' => "
[바이오더마-투고키트 후기이벤트]

안녕하세요, 바이오더마입니다.			
클렌징 게임을 통해 당첨되신 투고키트는 잘 수령하셨나요? :-)

일상에서 투고키트를 사용하시고 후기를 인증해주세요!

추첨을 통해 최종 10분께는 바이오더마 정품 3종 세트를 선물로 드립니다.

*쉿! 후기 이벤트는 투고키트를 이벤트로 수령한 분들만 참여 가능하여 다른 이벤트보다 당첨의 기회가 높으니 서둘러서 참여해보세요-

정품 3종세트 받기! 
http://bit.ly/bioderma_review
"
		);
	
		//curl initialization
		$curl = curl_init();
	
		//create request url
		//$url = $url."?".$parameters;
	
		curl_setopt ($curl, CURLOPT_URL , $url);
		curl_setopt ($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt ($curl, CURLOPT_HTTPHEADER, $headers);
		curl_setopt ($curl, CURLINFO_HEADER_OUT, true);
		curl_setopt ($curl, CURLOPT_SSL_VERIFYPEER, false);
	
		curl_setopt($curl, CURLOPT_POST, 1);
		curl_setopt($curl, CURLOPT_POSTFIELDS, $params);
		curl_setopt($curl, CURLOPT_TIMEOUT, 30);
	
		$response = curl_exec($curl);
	
		$httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
		$responseHeaders = curl_getinfo($curl, CURLINFO_HEADER_OUT);
	
	
		curl_close($curl);
	
		return $response;
	}
	
}
