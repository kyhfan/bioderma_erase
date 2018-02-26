<?
/*
*
*	DB 연결 정보
*
*/
class mnv_dbi
{
	var $my_db;
	public function Connect_MySQL()
	{
		$my_db = new mysqli("localhost", "root", "alslqj~1", "bioderma_erase");

		if (mysqli_connect_error()) {
			exit('Connect Error (' . mysqli_connect_errno() . ') '. mysqli_connect_error());
		}

		return $my_db;
	}
}