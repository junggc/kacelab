<?

include ("../inc/func.php");


foreach($_POST["uid"] as $key => $val){

	$sql="DELETE FROM jboard where uid='".$val."'";
	$result = mysqli_query($dbconn,$sql);

}


	if($result){

		$url = "list.php?code=".$_POST["code"]."&page=".$_POST["page"];
		popup_msg_go('정상 반영되었습니다.',$url);
		exit;
	}
?>
