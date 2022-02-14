<?
include ("../../inc/dbconn.php");
$sql = "update TB_admin set admin_log_fail=0 where idx='".$_POST["idx"]."'";
$result = mysqli_query($dbconn,$sql);

if($result){
	$arr["result"]="ok";
}else{
	$arr["result"]="error";
}
	
echo json_encode($arr);

?>