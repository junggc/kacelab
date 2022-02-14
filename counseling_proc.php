<?
include_once $_SERVER['DOCUMENT_ROOT']."/inc/dbconn.php";
include_once $_SERVER['DOCUMENT_ROOT']."/inc/function.php";



$signdate = time();
$title = addslashes($title);
$content = addslashes($content);


if(!$_POST["title"]){
	?>
		<script>alert("데이터가 없습니다");</script>
	<?
	exit;
}

		
		
if($_POST["mode"]=="modify"){
		$new_uid=$_POST["uid"];
}else{
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

}

	foreach($_POST as $key => $val){
			${$key} = @mysqli_real_escape_string($dbconn,$val);
		}
	
		$passwd = base64_encode(hash('sha256', $passwd, true));


		// 파일 업로드 처리 - 1
		$max_file_size = 2242880;
		$original_file_name=$_FILES["upfile1"]["name"];

		$reg_dm = time();
		$reg_id = $_SESSION["admin_id"];
		$sort_num=0;


		if(!empty($_FILES["upfile1"]["name"])){

			if($_FILES["upfile1"]["size"] > $max_file_size) {echo"<script>alert('파일은 2MB 이하로 업로드 해주셔야 합니다.'); history.back();</script>";}

			if(strcmp($_FILES["upfile1"]["name"],"none")){

				$full_filename=explode(".",$_FILES["upfile1"]["name"]);
				$filename=$full_filename[sizeof($full_filename)-2];
				$extension=$full_filename[sizeof($full_filename)-1];

				$filename1_real = $filename.".".$extension;
				$filename = "board_qna_".$new_uid.date("his").".".$extension;

				if(file_exists("../upfile/".$_FILES["upfile1"]["name"])){
				$filename1 = $filename."(".date("his").").".$extension;
			}else{
					$filename1 = $filename;
				}

				if(!strcmp($extension,"html")||!strcmp($extension,"htm")||!strcmp($extension,"php")||!strcmp($extension,"php3")||!strcmp($extension,"phtml")||!strcmp($extension,"inc")||!strcmp($extension,"pl")||!strcmp($extension,"cgi")||!strcmp($extension,"txt")||!strcmp($extension,"asp")){
					echo "<script language='javascript'>alert('업로드가 금지된 파일형식 입니다.');history.back(-1);</script>";
					exit;
				}

				@copy($_FILES["upfile1"]["tmp_name"],"../upfile/$filename1");

				
					$file_ment = ",filename1='".$filename1."',filename1_real='".$original_file_name."'";
			
			}
		}else{
			$filename1='';
		}



	$tel = $tel1."-".$tel2."-".$tel3;



if($_POST["mode"]=="modify"){

	$sel_sql="select * from jboard where uid='".$_POST["uid"]."'";
	$sel_result =  mysqli_query($dbconn,$sel_sql);
	$sel_row = mysqli_fetch_array($sel_result);

	if($sel_row["re_content"]){
		?>
		<script>alert("답변이 달린글은 수정이 불가능합니다.");location.href="counseling.php";</script>

		<?
		exit;
	}
	
	$query = "update jboard set name='".$name."',title='".$title."',content='".$content."',passwd='".$passwd."',tel='".$tel."',email='".$email."',lock_view='".$lock_view."' $file_ment where uid='".$_POST["uid"]."'";

	$result = mysqli_query($dbconn,$query);
	if(!$result) {
		
	  exit;
	}else{
		?>
		<script>alert("정상 수정되었습니다.");location.href="counseling.php";</script>

		<?
	}

}else{


		


	$query = "INSERT INTO jboard (uid,fid,name,title,content,signdate,passwd,thread,code,filename1,filename1_real,filename2,filename2_real,filename3,filename3_real,filename4,filename4_real,filename5,filename5_real,url,notice,tel,email,lock_view) VALUES ($new_uid,$new_uid,'$name','$title','$content',$signdate,'$passwd','A','$code','$filename1','$original_file_name','$filename2','$filename2_real','$filename3','$filename3_real','$filename4','$filename4_real','$filename5','$filename5_real','$url','$notice','$tel','$email','$lock_view')";

	$result = mysqli_query($dbconn,$query);
	if(!$result) {
		
	  exit;
	}else{
		?>
		<script>alert("정상 등록되었습니다.");location.href="counseling.php";</script>

		<?
	}
}
?>