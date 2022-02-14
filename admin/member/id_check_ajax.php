<?
include ("../../inc/dbconn.php");
$sql = "select * from TB_admin where admin_id='".$_GET["admin_id"]."'";
$result = mysqli_query($dbconn,$sql);
$count = mysqli_num_rows($result);
if($count>0){
	$valid=false;
}else{
	$valid=true;
}
	
echo json_encode($valid);

?>