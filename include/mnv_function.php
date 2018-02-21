<?
/*
*
*	php function
*
*/
class mnv_function extends mnv_dbi
{
	public function InsertTrackingInfo($media, $gubun)
	{
		global $my_db;
		$log_query	= "INSERT INTO tracking_info(tracking_media, tracking_refferer, tracking_ipaddr, tracking_date, tracking_gubun) values('".$media."','".$_SERVER['HTTP_REFERER']."','".$_SERVER['REMOTE_ADDR']."',now(),'".$gubun."')";
		$q_result 	= mysqli_query($my_db, $log_query);

		return $q_result;
	} 
}
