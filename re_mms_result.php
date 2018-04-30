<?
	include_once "./include/autoload.php";

    $mnv_f          = new mnv_function();
    $my_db          = $mnv_f->Connect_MySQL();

    if($_FILES) 
    { 
        $filename = $_FILES['userfile']['tmp_name']; 
        $handle = fopen($filename, "r"); 
        $data = base64_encode(fread($handle, filesize($filename))); 
        $data = fread($handle, filesize($filename)); 
        //$data = $handle; 

        // $data is file data 
        //$post   = array('imagefile' => $data); 
        //$post   = $data; 
        $post   = $handle; 

        $query 		= "SELECT * FROM mms_info WHERE mb_flag='N'";
        // $query 		= "SELECT * FROM mms_info WHERE mb_flag='N' AND mb_phone IN ('01030033965','01097788366')";
        $result 	= mysqli_query($my_db, $query);
        while ($data = mysqli_fetch_array($result))
        {
            send_mms($data['mb_phone'],$post);
        }
        print_r("전송 완료");

    }    

    function send_mms($phone,$post)
    {
        global $_gl;
        global $my_db;

        $httpmethod = "POST";
        // 미니버타이징
        $url = "http://api.openapi.io/ppurio/1/message/mms/minivertising";
        $clientKey = "MTAyMC0xMzg3MzUwNzE3NTQ3LWNlMTU4OTRiLTc4MGItNDQ4MS05NTg5LTRiNzgwYjM0ODEyYw==";
        //$url = "http://api.openapi.io/ppurio_test/1/message_test/mms/minivertising";
        //$clientKey = "MS0xMzY1NjY2MTAyNDk0LTA2MWE4ZDgyLTZhZmMtNGU5OS05YThkLTgyNmFmYzVlOTkzZQ==";
        //$contentType = "Content-Type: application/x-www-form-urlencoded";
        $contentType = "Content-Type: multipart/form-data; boundary=----WebKitFormBoundary8UhbmC4vAvBxT6z3";

        $response = sendRequest_mms($httpmethod, $url, $clientKey, $contentType, $phone, $post);

        $json_data = json_decode($response, true);
        /*
        받아온 결과값을 DB에 저장 및 Variation
        */
        $query = "UPDATE mms_info SET mb_flag='Y' WHERE mb_phone='".$phone."'";
        $result 		= mysqli_query($my_db, $query);


        $query3 = "INSERT INTO sms_info(send_phone, send_status, cmid, send_regdate) values('".$phone."','".$json_data['result_code']."','".$json_data['cmid']."','".date("Y-m-d H:i:s")."')";
        $result3 		= mysqli_query($my_db, $query3);
    }

    function sendRequest_mms($httpMethod, $url, $clientKey, $contentType, $phone, $post) {

        //create basic authentication header
        $headerValue = $clientKey;
        $headers = array("x-waple-authorization:" . $headerValue , "Content-Type:multipart/form-data");
        //curl initialization
        $curl = curl_init();

        //create request url
        //$url = $url."?".$parameters;
        $cfile = new CURLFILE($_FILES['userfile']['tmp_name'], $_FILES['userfile']['type'], $_FILES['userfile']['name']);

        $params = array(
            'send_time' => '',
            'send_phone' => '07048881164',
            'dest_phone' => $phone,
            //'dest_phone' => '01030033965',
            'send_name' => '',
            'dest_name' => '',
            'subject' => '이제 바이오더마 정품 받을 차례!',
            'file' => $cfile,
            'msg_body' => "
[바이오더마-투고키트 후기이벤트]

안녕하세요, 바이오더마입니다.
투고키트는 잘 수령하셨나요? :-)

일상에서 투고키트를 사용하신 후기를 위의 사진처럼 남겨 인스타그램에 인증해주세요!
추첨을 통해 최종 10분께는 바이오더마 정품 3종 세트를 선물로 드립니다.

*쉿! 후기 이벤트는 4월 30일에 종료되며, 이벤트를 통해 투고키트를 수령한 분들만 참여 가능하여 당첨의 기회가 높으니 서둘러서 참여해보세요-

정품 3종세트 받기! http://bit.ly/bioderma_review2
이벤트 문의 070-4888-1164
(평일 10:00-18:00 / 점심시간 제외 13:00-14:00)
"
        );


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
    
?>