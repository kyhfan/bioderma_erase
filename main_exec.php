<?php
include_once "./include/autoload.php";

switch ($_REQUEST['exec'])
{
    case "level_input_info" :
        $level_name     = $_REQUEST["level_name"];
        $level_phone    = $_REQUEST["level_phone"];
        $level_addr     = $_REQUEST["level_addr"];
        $level_addr2     = $_REQUEST["level_addr2"];
        $level          = $_REQUEST["level"];

        $level_addr     = $level_addr." ".$level_addr2;

        $mnv_f          = new mnv_function();
        $my_db          = $mnv_f->Connect_MySQL();
        $gubun          = $mnv_f->MobileCheck();

        $dupli_query	= "SELECT * FROM member_info WHERE mb_phone='".$level_phone."' AND mb_regdate like '%".date("Y-m-d")."%'";
		$dupli_result 	= mysqli_query($my_db, $dupli_query);
		$dupli_num		= mysqli_num_rows($dupli_result);

        if ($dupli_num > 0)
		{
			$flag = "D||D";
		}else{
            $winner_query	= "SELECT * FROM member_info WHERE mb_phone='".$level_phone."' AND mb_winner NOT IN ('blank')";
            $winner_result 	= mysqli_query($my_db, $winner_query);
            $winner_num		= mysqli_num_rows($winner_result);

            $winner2_query	= "SELECT * FROM member_info WHERE mb_addr like '%".$level_addr."%' AND mb_winner NOT IN ('blank')";
            $winner2_result 	= mysqli_query($my_db, $winner2_query);
            $winner2_num		= mysqli_num_rows($winner2_result);

            if ($winner_num > 0 || $winner2_num > 0)
            {
                $mb_winner      = "blank";
            }else{
                $mb_winner      = $mnv_f->winner_draw2($level);
            }
                
            $query		= "INSERT INTO member_info(mb_ipaddr, mb_name, mb_phone, mb_addr, mb_winner, mb_level, mb_gubun, mb_media, mb_regdate) values('".$_SERVER['REMOTE_ADDR']."','".$level_name."','".$level_phone."','".$level_addr."','".$mb_winner."','".$level."','".$gubun."','".$_SESSION['ss_media']."',now())";
            $result		= mysqli_query($my_db, $query);

            if ($result)
                $flag = "Y||".$mb_winner;
            else
                $flag = "N||".$mb_winner;
                
		}

		echo $flag;
    break;
    
    case "game_click_info" :
        $mnv_f          = new mnv_function();
        $my_db          = $mnv_f->Connect_MySQL();
        $gubun          = $mnv_f->MobileCheck();

        $query		= "INSERT INTO game_info(game_ipaddr, game_gubun, game_media, game_regdate) values('".$_SERVER['REMOTE_ADDR']."','".$gubun."','".$_SESSION['ss_media']."',now())";
        $result		= mysqli_query($my_db, $query);

    break;

    case "insert_share_info" :
        $mnv_f          = new mnv_function();
        $my_db          = $mnv_f->Connect_MySQL();
        $gubun          = $mnv_f->MobileCheck();
        $sns_media		= $_REQUEST['sns_media'];

        $query 		= "INSERT INTO share_info(sns_media, sns_gubun, sns_ipaddr, inner_media, sns_regdate) values('".$sns_media."','".$gubun."','".$_SERVER['REMOTE_ADDR']."','".$_SESSION['ss_media']."','".date("Y-m-d H:i:s")."')";
        $result 	= mysqli_query($my_db, $query);

    break;

	case "insert_click_info" :
		$click_name 	= $_REQUEST['click_name'];
        $mnv_f          = new mnv_function();
        $my_db          = $mnv_f->Connect_MySQL();
        $gubun          = $mnv_f->MobileCheck();

		$click_query	= "INSERT INTO click_info(click_name, click_refferer, click_ipaddr, click_gubun, click_date) values ('".$click_name."','".$_SERVER['HTTP_REFERER']."','".$_SERVER['REMOTE_ADDR']."','".$gubun."','".date("Y-m-d H:i:s")."')";
		$result			= mysqli_query($my_db, $click_query);

	break;


}