<?
	include ("../inc/func.php");

	foreach($_POST as $key => $val){
		${$key} = @mysqli_real_escape_string($dbconn,$val);
	}
	// 파일 업로드 처리 - 1
	$max_file_size = 2242880;
	$original_file_name=$_FILES["upfile1"]["name"];

	$reg_dm = time();
	$reg_id = $_SESSION["admin_id"];
	$sort_num=0;

	$rgb_color = $rgb_1.",".$rgb_2.",".$rgb_3;
	if(!empty($_FILES["upfile1"]["name"])){

		if($_FILES["upfile1"]["size"] > $max_file_size) {echo"<script>alert('파일은 2MB 이하로 업로드 해주셔야 합니다.'); history.back();</script>";}

		if(strcmp($_FILES["upfile1"]["name"],"none")){

			$full_filename=explode(".",$_FILES["upfile1"]["name"]);
			$filename=$full_filename[sizeof($full_filename)-2];
			$extension=$full_filename[sizeof($full_filename)-1];

			$filename1_real = $filename.".".$extension;
			$filename = "portfolio_".$new_uid.date("his").".".$extension;

			if(file_exists("../../upfile/".$_FILES["upfile1"]["name"])){
			$filename1 = $filename."(".date("his").").".$extension;
		}else{
				$filename1 = $filename;
			}

			if(!strcmp($extension,"html")||!strcmp($extension,"htm")||!strcmp($extension,"php")||!strcmp($extension,"php3")||!strcmp($extension,"phtml")||!strcmp($extension,"inc")||!strcmp($extension,"pl")||!strcmp($extension,"cgi")||!strcmp($extension,"txt")||!strcmp($extension,"asp")){
				echo "<script language='javascript'>alert('업로드가 금지된 파일형식 입니다.');history.back(-1);</script>";
				exit;
			}

			copy($_FILES["upfile1"]["tmp_name"],"../../upfile/$filename1");

			if($mode=="modify"){
				$file_ment = ",upfile1='".$filename1."',upfile1_name='".$original_file_name."'";
			}
		}
	}else{
		$filename1='';
	}


	if($mode=="insert"){

		$sql="INSERT INTO TB_portfolio (use_yn,title,upfile1,upfile1_name,link_url,link_url_target,top_text,bottom_text,rgb_color,reg_dm,reg_id,sort_num)VALUES('$use_yn','$title','$filename1','$original_file_name','$link_url','$link_url_target','$top_text','$bottom_text','$rgb_color','$reg_dm','$reg_id','$sort_num')";
	}else if($mode=="modify"){
		$sql="UPDATE TB_portfolio SET use_yn = '".$use_yn."',title='".$title."',link_url='".$link_url."',link_url_target='".$link_url_target."',top_text='".$top_text."',bottom_text='".$bottom_text."',rgb_color='".$rgb_color."',upd_dm='".$reg_dm."',upd_id='".$reg_id."'$file_ment WHERE idx = '".$idx."'";
	}else if($mode=="sort"){
		
		$arr_num = explode(",",$_POST["sort_num"]);

		$ii=0;
		foreach($arr_num as $key => $val){
				
			$sql="UPDATE TB_portfolio SET sort_num='".$ii."' WHERE idx = '".$val."'";
			$result = mysqli_query($dbconn,$sql);
			$ii++;
		}
		popup_msg_go('정상 반영되었습니다.','portfolio_sort.php');
		exit;
		
	}else if($mode=="del"){
			foreach($_POST["idx"] as $key => $val){



				$s_sql="select use_yn from TB_portfolio where idx='".$val."'";
				$s_result = mysqli_query($dbconn,$s_sql);
				$s_row= mysqli_fetch_array($s_result);

				if($s_row["use_yn"]!="Y"){
					$sql="DELETE FROM TB_portfolio where idx='".$val."'";
					$result = mysqli_query($dbconn,$sql);
				}
			}
		popup_msg_go('정상 반영되었습니다.','portfolio_list.php');
		exit;
	}
	$result = mysqli_query($dbconn,$sql);


	if($result){
		popup_msg_go('정상 반영되었습니다.','portfolio_list.php');
		exit;
	}










		
?>