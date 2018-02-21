<?
	include_once "./include/autoload.php";

    $mnv_f = new mnv_function();

    $my_db         = $mnv_f->Connect_MySQL();
    $rs_tracking   = $mnv_f->InsertTrackingInfo($media, $gubun);
?>