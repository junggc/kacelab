
<?
	session_start();
	include "../../inc/dbconn.php";
	include "../../inc/function.php";

	if(@$_SESSION["admin_id"]=="" && $login_page==false){

		   echo("<script>alert('로그인 후 이용하여 주세요');location.replace('".$server_url."/admin/index.php');</script>");
	}

?>
<meta charset="UTF-8">

	