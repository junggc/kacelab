<?
	include ("../inc/func.php");

	foreach($_POST as $key => $val){
		${$key} = @mysqli_real_escape_string($dbconn,$val);
	}


		// 파일 업로드 처리 - 1
	$max_file_size = 2242880;
	$original_file_name=$_FILES["re_filename1"]["name"];

	$reg_dm = time();
	$reg_id = $_SESSION["admin_id"];
	$sort_num=0;


	if(!empty($_FILES["re_filename1"]["name"])){

		if($_FILES["re_filename1"]["size"] > $max_file_size) {echo"<script>alert('파일은 2MB 이하로 업로드 해주셔야 합니다.'); history.back();</script>";}

		if(strcmp($_FILES["re_filename1"]["name"],"none")){

			$full_filename=explode(".",$_FILES["re_filename1"]["name"]);
			$filename=$full_filename[sizeof($full_filename)-2];
			$extension=$full_filename[sizeof($full_filename)-1];

			$filename1_real = $filename.".".$extension;
			$filename = "re_board_".$new_uid.date("his").".".$extension;

			if(file_exists("../../upfile/".$_FILES["re_filename1"]["name"])){
			$filename1 = $filename."(".date("his").").".$extension;
		}else{
				$filename1 = $filename;
			}

			if(!strcmp($extension,"html")||!strcmp($extension,"htm")||!strcmp($extension,"php")||!strcmp($extension,"php3")||!strcmp($extension,"phtml")||!strcmp($extension,"inc")||!strcmp($extension,"pl")||!strcmp($extension,"cgi")||!strcmp($extension,"txt")||!strcmp($extension,"asp")){
				echo "<script language='javascript'>alert('업로드가 금지된 파일형식 입니다.');history.back(-1);</script>";
				exit;
			}

			copy($_FILES["re_filename1"]["tmp_name"],"../../upfile/$filename1");

			
				$file_ment = ",re_filename1='".$filename1."',re_filename1_real='".$original_file_name."'";
		
		}
	}else{
		$filename1='';
	}

	

	$sql="update jboard set re_content_title='".$re_content_title."',re_content = '".$re_content."',re_content_regdate='".$reg_dm."' $file_ment where uid='".$uid."'";

	
	$result= mysqli_query($dbconn,$sql);

	if($result){
		?>
			<script>
				alert("정상 반영되었습니다.");
				location.href="view.php?code=<?=$code?>&uid=<?=$uid?>";
			</script>
		<?
		exit;
	}



?>