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
        $my_db          = $mnv_f->Connect_MySQL();
        $gubun          = $mnv_f->MobileCheck();

        $dupli_query	= "SELECT * FROM member_info WHERE mb_phone='".$level_phone."'";
		$dupli_result 	= mysqli_query($my_db, $dupli_query);
		$dupli_num		= mysqli_num_rows($dupli_result);

        if ($dupli_num > 0)
		{
			$flag = "D||D";
		}else{
            $mb_winner      = $mnv_f->winner_draw($level, $level_phone);
                
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

}