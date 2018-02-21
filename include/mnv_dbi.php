<?
/*
*
*	DB 연결 정보
*
*/
class mnv_dbi
{
	public $my_db;

	public function Connect_MySQL()
	{
		$my_db = new mysqli("localhost", "root", "alslqj~1", "bioderma_erase");

		if (mysqli_connect_error()) {
			exit('Connect Error (' . mysqli_connect_errno() . ') '. mysqli_connect_error());
		}else{
			print_r("연결");
		}

		return $my_db;
	}
}