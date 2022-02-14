<?
include_once $_SERVER['DOCUMENT_ROOT']."/inc/dbconn.php";
include_once $_SERVER['DOCUMENT_ROOT']."/inc/function.php";


$signdate = time();
$title = addslashes($title);
$content = addslashes($content);


$code="career";
$title = $_POST["title"];

$query = "SELECT max(uid) FROM jboard";
$result = mysqli_query($dbconn,$query);
if(!$result) {
	echo "에러발생";
	exit;
}
$row = mysqli_fetch_row($result);

if($row[0]) {
	$new_uid = $row[0] + 1;
} else {
	$new_uid = 1;
}


	//foreach($_POST as $key => $val){
	//	${$key} = @mysqli_real_escape_string($dbconn,$val);
	//}

	$reg_dm = time();
	$reg_id = $_SESSION["admin_id"];

		// 파일 업로드 처리 - 1
	$max_file_size = 2242880;
	$original_file_name=$_FILES["upfile1"]["name"];
	

	$ii=1;
	
	foreach($_POST["upfile_1"] as $key => $val){


		$arr_file = explode("|",$val);

		${"filename".$ii}=$arr_file[0];
		${"filename".$ii."_real"}=$arr_file[1];

	$ii++;

	}


	


$query = "INSERT INTO jboard (uid,fid,name,title,content,signdate,passwd,thread,code,filename1,filename1_real,filename2,filename2_real,filename3,filename3_real,filename4,filename4_real,filename5,filename5_real,url,notice,tel,email,lock_view,etc1,etc2,etc3,etc4) VALUES ($new_uid,$new_uid,'$name','$title','$content',$signdate,'$passwd','A','$code','$filename1','$filename1_real','$filename2','$filename2_real','$filename3','$filename3_real','$filename4','$filename4_real','$filename5','$filename5_real','$url','$notice','$tel','$email','$lock_view','$etc1','$etc2','$etc3','$etc4')";

$result = mysqli_query($dbconn,$query);
if(!$result) {
	
  exit;
}else{
	?>
	<script>alert("정상 등록되었습니다.");location.href="career.php";</script>

	<?
}
?>