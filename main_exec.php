<?php
include_once "./include/autoload.php";

switch ($_REQUEST['exec'])
{
    case "level_input_info" :
        $level_name     = $_REQUEST["level_name"];
        $level_phone    = $_REQUEST["level_phone"];
        $level_addr     = $_REQUEST["level_addr"];
        $level          = $_REQUEST["level"];

        $mnv_f          = new mnv_function();
        $my_db         = $mnv_f->Connect_MySQL();

        $dupli_query	= "SELECT * FROM member_info WHERE mb_phone='".$level_phone."'";
		$dupli_result 	= mysqli_query($my_db, $dupli_query);
		$dupli_num		= mysqli_num_rows($dupli_result);

        if ($dupli_num > 0)
		{
			$flag = "D";
		}else{
            $mb_winner      = $mnv_f->winner_draw($level, $level_phone);
                
            // $log_query		= "INSERT INTO ".$_gl['tracking_info_table']."(tracking_media, tracking_refferer, tracking_ipaddr, tracking_date, tracking_gubun) values('".$_SESSION['ss_media']."','".$_SERVER['HTTP_REFERER']."','".$_SERVER['REMOTE_ADDR']."',now(),'".$gubun."')";
            // $log_result		= mysqli_query($my_db, $log_query);

            // if ($log_result)
            //     $flag = "Y";
            // else
            //     $flag = "N";
                
		}

		echo $mb_winner;
	break;

}