<?
	include_once "./include/autoload.php";
?>
  <form enctype="multipart/form-data" action="re_mms_result.php" method="POST"> 
    <input type="hidden" name="MAX_FILE_SIZE" value="30000" /> 
    이 파일을 전송합니다: <input name="userfile" type="file" /> 
    <input type="submit" value="파일 전송" /> 
 </form> 

 <?php 

 /* 
 결과: 
 성공적으로 업로드 되었습니다. 
 Array 
 ( 
    [userfile] => Array 
        ( 
            [name] => config.sys 
            [type] => text/plain 
            [tmp_name] => /tmp/phpXTtzBW 
            [error] => 0 
            [size] => 10 
        ) 
 ) 
 */ 

 ?> 