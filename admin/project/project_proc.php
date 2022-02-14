<?
	include ("../inc/func.php");


	foreach($_POST as $key => $val){
		${$key} = @mysqli_real_escape_string($dbconn,$val);
	}
	// 파일 업로드 처리 - 1
	$max_file_size = 22428800;
	$original_file_name=$_FILES["list_file"]["name"];

	$reg_dm = time();
	$reg_id = $_SESSION["admin_id"];
	$sort_num=0;

	$rgb_color = $rgb_1.",".$rgb_2.",".$rgb_3;
	if(!empty($_FILES["list_file"]["name"])){

		if($_FILES["list_file"]["size"] > $max_file_size) {echo"<script>alert('파일은 20MB 이하로 업로드 해주셔야 합니다.'); history.back();</script>";}

		if(strcmp($_FILES["list_file"]["name"],"none")){

			$full_filename=explode(".",$_FILES["list_file"]["name"]);
			$filename=$full_filename[sizeof($full_filename)-2];
			$extension=$full_filename[sizeof($full_filename)-1];

			$filename1_real = $filename.".".$extension;
			$filename = "project_".$new_uid.date("his").".".$extension;

			if(file_exists("../../upfile/".$_FILES["list_file"]["name"])){
			$filename1 = $filename."(".date("his").").".$extension;
		}else{
				$filename1 = $filename;
			}

			if(!strcmp($extension,"html")||!strcmp($extension,"htm")||!strcmp($extension,"php")||!strcmp($extension,"php3")||!strcmp($extension,"phtml")||!strcmp($extension,"inc")||!strcmp($extension,"pl")||!strcmp($extension,"cgi")||!strcmp($extension,"txt")||!strcmp($extension,"asp")){
				echo "<script language='javascript'>alert('업로드가 금지된 파일형식 입니다.');history.back(-1);</script>";
				exit;
			}

			copy($_FILES["list_file"]["tmp_name"],"../../upfile/$filename1");

			if($mode=="modify"){
				$file_ment = ",list_file='".$filename1."',list_file_name='".$original_file_name."'";
			}
		}
	}else{
		$filename1='';
	}


	// 파일 업로드 처리 - 1
	$max_file_size = 22428800;
	$original_file_name2=$_FILES["view_file"]["name"];

	$reg_dm = time();
	$reg_id = $_SESSION["admin_id"];
	$sort_num=0;

	$rgb_color = $rgb_1.",".$rgb_2.",".$rgb_3;
	if(!empty($_FILES["view_file"]["name"])){

		if($_FILES["view_file"]["size"] > $max_file_size) {echo"<script>alert('파일은 20MB 이하로 업로드 해주셔야 합니다.'); history.back();</script>";}

		if(strcmp($_FILES["view_file"]["name"],"none")){

			$full_filename=explode(".",$_FILES["view_file"]["name"]);
			$filename=$full_filename[sizeof($full_filename)-2];
			$extension=$full_filename[sizeof($full_filename)-1];

			$filename1_real = $filename.".".$extension;
			$filename = "project_".$new_uid.date("his")."_2.".$extension;

			if(file_exists("../../upfile/".$_FILES["view_file"]["name"])){
			$filename2 = $filename."(".date("his").").".$extension;
		}else{
				$filename2 = $filename;
			}

			if(!strcmp($extension,"html")||!strcmp($extension,"htm")||!strcmp($extension,"php")||!strcmp($extension,"php3")||!strcmp($extension,"phtml")||!strcmp($extension,"inc")||!strcmp($extension,"pl")||!strcmp($extension,"cgi")||!strcmp($extension,"txt")||!strcmp($extension,"asp")){
				echo "<script language='javascript'>alert('업로드가 금지된 파일형식 입니다.');history.back(-1);</script>";
				exit;
			}

			copy($_FILES["view_file"]["tmp_name"],"../../upfile/$filename2");

			if($mode=="modify"){
				$file_ment2 = ",view_file='".$filename2."',view_file_name='".$original_file_name2."'";
			}
		}
	}else{
		$filename2='';
	}




	// 파일 업로드 처리 - 1
	$max_file_size = 22428800;
	$original_file_name_view2 =$_FILES["view_file2"]["name"];

	$reg_dm = time();
	$reg_id = $_SESSION["admin_id"];
	$sort_num=0;

	$rgb_color = $rgb_1.",".$rgb_2.",".$rgb_3;
	if(!empty($_FILES["view_file2"]["name"])){

		if($_FILES["view_file2"]["size"] > $max_file_size) {echo"<script>alert('파일은 20MB 이하로 업로드 해주셔야 합니다.'); history.back();</script>";}

		if(strcmp($_FILES["view_file2"]["name"],"none")){

			$full_filename=explode(".",$_FILES["view_file2"]["name"]);
			$filename=$full_filename[sizeof($full_filename)-2];
			$extension=$full_filename[sizeof($full_filename)-1];

			$filename1_real = $filename.".".$extension;
			$filename = "project_".$new_uid.date("his")."_view2.".$extension;

			if(file_exists("../../upfile/".$_FILES["view_file2"]["name"])){
			$view_filename2 = $filename."(".date("his").").".$extension;
		}else{
				$view_filename2 = $filename;
			}

			if(!strcmp($extension,"html")||!strcmp($extension,"htm")||!strcmp($extension,"php")||!strcmp($extension,"php3")||!strcmp($extension,"phtml")||!strcmp($extension,"inc")||!strcmp($extension,"pl")||!strcmp($extension,"cgi")||!strcmp($extension,"txt")||!strcmp($extension,"asp")){
				echo "<script language='javascript'>alert('업로드가 금지된 파일형식 입니다.');history.back(-1);</script>";
				exit;
			}

			copy($_FILES["view_file2"]["tmp_name"],"../../upfile/$view_filename2");

			if($mode=="modify"){
				$view_file_ment2 = ",view_file2='".$view_filename2."',view_file_name2='".$original_file_name_view2."'";
			}
		}
	}else{
		$view_filename2='';
	}



	// 파일 업로드 처리 - 1
	$max_file_size = 22428800;
	$original_file_name_view3 =$_FILES["view_file3"]["name"];

	$reg_dm = time();
	$reg_id = $_SESSION["admin_id"];
	$sort_num=0;

	$rgb_color = $rgb_1.",".$rgb_2.",".$rgb_3;
	if(!empty($_FILES["view_file3"]["name"])){

		if($_FILES["view_file3"]["size"] > $max_file_size) {echo"<script>alert('파일은 20MB 이하로 업로드 해주셔야 합니다.'); history.back();</script>";}

		if(strcmp($_FILES["view_file3"]["name"],"none")){

			$full_filename=explode(".",$_FILES["view_file3"]["name"]);
			$filename=$full_filename[sizeof($full_filename)-2];
			$extension=$full_filename[sizeof($full_filename)-1];

			$filename1_real = $filename.".".$extension;
			$filename = "project_".$new_uid.date("his")."_view3.".$extension;

			if(file_exists("../../upfile/".$_FILES["view_file3"]["name"])){
			$view_filename3 = $filename."(".date("his").").".$extension;
		}else{
				$view_filename3 = $filename;
			}

			if(!strcmp($extension,"html")||!strcmp($extension,"htm")||!strcmp($extension,"php")||!strcmp($extension,"php3")||!strcmp($extension,"phtml")||!strcmp($extension,"inc")||!strcmp($extension,"pl")||!strcmp($extension,"cgi")||!strcmp($extension,"txt")||!strcmp($extension,"asp")){
				echo "<script language='javascript'>alert('업로드가 금지된 파일형식 입니다.');history.back(-1);</script>";
				exit;
			}

			copy($_FILES["view_file3"]["tmp_name"],"../../upfile/$view_filename3");

			if($mode=="modify"){
				$view_file_ment3 = ",view_file3='".$view_filename3."',view_file_name3='".$original_file_name_view3."'";
			}
		}
	}else{
		$view_filename3='';
	}

	


	// 파일 업로드 처리 - 1
	$max_file_size = 22428800;
	$original_file_name_view4 =$_FILES["view_file4"]["name"];

	$reg_dm = time();
	$reg_id = $_SESSION["admin_id"];
	$sort_num=0;

	$rgb_color = $rgb_1.",".$rgb_2.",".$rgb_3;
	if(!empty($_FILES["view_file4"]["name"])){

		if($_FILES["view_file4"]["size"] > $max_file_size) {echo"<script>alert('파일은 20MB 이하로 업로드 해주셔야 합니다.'); history.back();</script>";}

		if(strcmp($_FILES["view_file4"]["name"],"none")){

			$full_filename=explode(".",$_FILES["view_file4"]["name"]);
			$filename=$full_filename[sizeof($full_filename)-2];
			$extension=$full_filename[sizeof($full_filename)-1];

			$filename1_real = $filename.".".$extension;
			$filename = "project_".$new_uid.date("his")."_view4.".$extension;

			if(file_exists("../../upfile/".$_FILES["view_file4"]["name"])){
			$view_filename4 = $filename."(".date("his").").".$extension;
		}else{
				$view_filename4 = $filename;
			}

			if(!strcmp($extension,"html")||!strcmp($extension,"htm")||!strcmp($extension,"php")||!strcmp($extension,"php3")||!strcmp($extension,"phtml")||!strcmp($extension,"inc")||!strcmp($extension,"pl")||!strcmp($extension,"cgi")||!strcmp($extension,"txt")||!strcmp($extension,"asp")){
				echo "<script language='javascript'>alert('업로드가 금지된 파일형식 입니다.');history.back(-1);</script>";
				exit;
			}

			copy($_FILES["view_file4"]["tmp_name"],"../../upfile/$view_filename4");

			if($mode=="modify"){
				$view_file_ment4 = ",view_file4='".$view_filename4."',view_file_name4='".$original_file_name_view4."'";
			}
		}
	}else{
		$view_filename4='';
	}



	// 파일 업로드 처리 - 1
	$max_file_size = 22428800;
	$original_file_name_view5 =$_FILES["view_file5"]["name"];

	$reg_dm = time();
	$reg_id = $_SESSION["admin_id"];
	$sort_num=0;

	$rgb_color = $rgb_1.",".$rgb_2.",".$rgb_3;
	if(!empty($_FILES["view_file5"]["name"])){

		if($_FILES["view_file5"]["size"] > $max_file_size) {echo"<script>alert('파일은 20MB 이하로 업로드 해주셔야 합니다.'); history.back();</script>";}

		if(strcmp($_FILES["view_file5"]["name"],"none")){

			$full_filename=explode(".",$_FILES["view_file5"]["name"]);
			$filename=$full_filename[sizeof($full_filename)-2];
			$extension=$full_filename[sizeof($full_filename)-1];

			$filename1_real = $filename.".".$extension;
			$filename = "project_".$new_uid.date("his")."_view5.".$extension;

			if(file_exists("../../upfile/".$_FILES["view_file5"]["name"])){
			$view_filename5 = $filename."(".date("his").").".$extension;
		}else{
				$view_filename5 = $filename;
			}

			if(!strcmp($extension,"html")||!strcmp($extension,"htm")||!strcmp($extension,"php")||!strcmp($extension,"php3")||!strcmp($extension,"phtml")||!strcmp($extension,"inc")||!strcmp($extension,"pl")||!strcmp($extension,"cgi")||!strcmp($extension,"txt")||!strcmp($extension,"asp")){
				echo "<script language='javascript'>alert('업로드가 금지된 파일형식 입니다.');history.back(-1);</script>";
				exit;
			}

			copy($_FILES["view_file5"]["tmp_name"],"../../upfile/$view_filename5");

			if($mode=="modify"){
				$view_file_ment5 = ",view_file5='".$view_filename5."',view_file_name5='".$original_file_name_view5."'";
			}
		}
	}else{
		$view_filename5='';
	}




	// 파일 업로드 처리 - 1
	$max_file_size = 22428800;
	$original_file_name_view6 =$_FILES["view_file6"]["name"];

	$reg_dm = time();
	$reg_id = $_SESSION["admin_id"];
	$sort_num=0;

	$rgb_color = $rgb_1.",".$rgb_2.",".$rgb_3;
	if(!empty($_FILES["view_file6"]["name"])){

		if($_FILES["view_file6"]["size"] > $max_file_size) {echo"<script>alert('파일은 20MB 이하로 업로드 해주셔야 합니다.'); history.back();</script>";}

		if(strcmp($_FILES["view_file6"]["name"],"none")){

			$full_filename=explode(".",$_FILES["view_file6"]["name"]);
			$filename=$full_filename[sizeof($full_filename)-2];
			$extension=$full_filename[sizeof($full_filename)-1];

			$filename1_real = $filename.".".$extension;
			$filename = "project_".$new_uid.date("his")."_view6.".$extension;

			if(file_exists("../../upfile/".$_FILES["view_file6"]["name"])){
			$view_filename6 = $filename."(".date("his").").".$extension;
		}else{
				$view_filename6 = $filename;
			}

			if(!strcmp($extension,"html")||!strcmp($extension,"htm")||!strcmp($extension,"php")||!strcmp($extension,"php3")||!strcmp($extension,"phtml")||!strcmp($extension,"inc")||!strcmp($extension,"pl")||!strcmp($extension,"cgi")||!strcmp($extension,"txt")||!strcmp($extension,"asp")){
				echo "<script language='javascript'>alert('업로드가 금지된 파일형식 입니다.');history.back(-1);</script>";
				exit;
			}

			copy($_FILES["view_file6"]["tmp_name"],"../../upfile/$view_filename6");

			if($mode=="modify"){
				$view_file_ment6 = ",view_file6='".$view_filename6."',view_file_name6='".$original_file_name_view6."'";
			}
		}
	}else{
		$view_filename6='';
	}


	// 파일 업로드 처리 - 1
	$max_file_size = 22428800;
	$original_file_name_view7 =$_FILES["view_file7"]["name"];

	$reg_dm = time();
	$reg_id = $_SESSION["admin_id"];
	$sort_num=0;

	$rgb_color = $rgb_1.",".$rgb_2.",".$rgb_3;
	if(!empty($_FILES["view_file7"]["name"])){

		if($_FILES["view_file7"]["size"] > $max_file_size) {echo"<script>alert('파일은 20MB 이하로 업로드 해주셔야 합니다.'); history.back();</script>";}

		if(strcmp($_FILES["view_file7"]["name"],"none")){

			$full_filename=explode(".",$_FILES["view_file7"]["name"]);
			$filename=$full_filename[sizeof($full_filename)-2];
			$extension=$full_filename[sizeof($full_filename)-1];

			$filename1_real = $filename.".".$extension;
			$filename = "project_".$new_uid.date("his")."_view7.".$extension;

			if(file_exists("../../upfile/".$_FILES["view_file7"]["name"])){
			$view_filename7 = $filename."(".date("his").").".$extension;
		}else{
				$view_filename7 = $filename;
			}

			if(!strcmp($extension,"html")||!strcmp($extension,"htm")||!strcmp($extension,"php")||!strcmp($extension,"php3")||!strcmp($extension,"phtml")||!strcmp($extension,"inc")||!strcmp($extension,"pl")||!strcmp($extension,"cgi")||!strcmp($extension,"txt")||!strcmp($extension,"asp")){
				echo "<script language='javascript'>alert('업로드가 금지된 파일형식 입니다.');history.back(-1);</script>";
				exit;
			}

			copy($_FILES["view_file7"]["tmp_name"],"../../upfile/$view_filename7");

			if($mode=="modify"){
				$view_file_ment7 = ",view_file7='".$view_filename7."',view_file_name7='".$original_file_name_view7."'";
			}
		}
	}else{
		$view_filename7='';
	}



	// 파일 업로드 처리 - 1
	$max_file_size = 22428800;
	$original_file_name_view8 =$_FILES["view_file8"]["name"];

	$reg_dm = time();
	$reg_id = $_SESSION["admin_id"];
	$sort_num=0;

	$rgb_color = $rgb_1.",".$rgb_2.",".$rgb_3;
	if(!empty($_FILES["view_file8"]["name"])){

		if($_FILES["view_file8"]["size"] > $max_file_size) {echo"<script>alert('파일은 20MB 이하로 업로드 해주셔야 합니다.'); history.back();</script>";}

		if(strcmp($_FILES["view_file8"]["name"],"none")){

			$full_filename=explode(".",$_FILES["view_file8"]["name"]);
			$filename=$full_filename[sizeof($full_filename)-2];
			$extension=$full_filename[sizeof($full_filename)-1];

			$filename1_real = $filename.".".$extension;
			$filename = "project_".$new_uid.date("his")."_view8.".$extension;

			if(file_exists("../../upfile/".$_FILES["view_file8"]["name"])){
			$view_filename8 = $filename."(".date("his").").".$extension;
		}else{
				$view_filename8 = $filename;
			}

			if(!strcmp($extension,"html")||!strcmp($extension,"htm")||!strcmp($extension,"php")||!strcmp($extension,"php3")||!strcmp($extension,"phtml")||!strcmp($extension,"inc")||!strcmp($extension,"pl")||!strcmp($extension,"cgi")||!strcmp($extension,"txt")||!strcmp($extension,"asp")){
				echo "<script language='javascript'>alert('업로드가 금지된 파일형식 입니다.');history.back(-1);</script>";
				exit;
			}

			copy($_FILES["view_file8"]["tmp_name"],"../../upfile/$view_filename8");

			if($mode=="modify"){
				$view_file_ment8 = ",view_file8='".$view_filename8."',view_file_name8='".$original_file_name_view8."'";
			}
		}
	}else{
		$view_filename8='';
	}




	// 파일 업로드 처리 - 1
	$max_file_size = 22428800;
	$original_file_name_view9 =$_FILES["view_file9"]["name"];

	$reg_dm = time();
	$reg_id = $_SESSION["admin_id"];
	$sort_num=0;

	$rgb_color = $rgb_1.",".$rgb_2.",".$rgb_3;
	if(!empty($_FILES["view_file9"]["name"])){

		if($_FILES["view_file9"]["size"] > $max_file_size) {echo"<script>alert('파일은 20MB 이하로 업로드 해주셔야 합니다.'); history.back();</script>";}

		if(strcmp($_FILES["view_file9"]["name"],"none")){

			$full_filename=explode(".",$_FILES["view_file9"]["name"]);
			$filename=$full_filename[sizeof($full_filename)-2];
			$extension=$full_filename[sizeof($full_filename)-1];

			$filename1_real = $filename.".".$extension;
			$filename = "project_".$new_uid.date("his")."_view9.".$extension;

			if(file_exists("../../upfile/".$_FILES["view_file9"]["name"])){
			$view_filename9 = $filename."(".date("his").").".$extension;
		}else{
				$view_filename9 = $filename;
			}

			if(!strcmp($extension,"html")||!strcmp($extension,"htm")||!strcmp($extension,"php")||!strcmp($extension,"php3")||!strcmp($extension,"phtml")||!strcmp($extension,"inc")||!strcmp($extension,"pl")||!strcmp($extension,"cgi")||!strcmp($extension,"txt")||!strcmp($extension,"asp")){
				echo "<script language='javascript'>alert('업로드가 금지된 파일형식 입니다.');history.back(-1);</script>";
				exit;
			}

			copy($_FILES["view_file9"]["tmp_name"],"../../upfile/$view_filename9");

			if($mode=="modify"){
				$view_file_ment9 = ",view_file9='".$view_filename8."',view_file_name9='".$original_file_name_view9."'";
			}
		}
	}else{
		$view_filename9='';
	}



	// 파일 업로드 처리 - 1
	$max_file_size = 22428800;
	$original_file_name_view10 =$_FILES["view_file10"]["name"];

	$reg_dm = time();
	$reg_id = $_SESSION["admin_id"];
	$sort_num=0;

	$rgb_color = $rgb_1.",".$rgb_2.",".$rgb_3;
	if(!empty($_FILES["view_file10"]["name"])){

		if($_FILES["view_file10"]["size"] > $max_file_size) {echo"<script>alert('파일은 20MB 이하로 업로드 해주셔야 합니다.'); history.back();</script>";}

		if(strcmp($_FILES["view_file10"]["name"],"none")){

			$full_filename=explode(".",$_FILES["view_file10"]["name"]);
			$filename=$full_filename[sizeof($full_filename)-2];
			$extension=$full_filename[sizeof($full_filename)-1];

			$filename1_real = $filename.".".$extension;
			$filename = "project_".$new_uid.date("his")."_view10.".$extension;

			if(file_exists("../../upfile/".$_FILES["view_file10"]["name"])){
			$view_filename10 = $filename."(".date("his").").".$extension;
		}else{
				$view_filename10 = $filename;
			}

			if(!strcmp($extension,"html")||!strcmp($extension,"htm")||!strcmp($extension,"php")||!strcmp($extension,"php3")||!strcmp($extension,"phtml")||!strcmp($extension,"inc")||!strcmp($extension,"pl")||!strcmp($extension,"cgi")||!strcmp($extension,"txt")||!strcmp($extension,"asp")){
				echo "<script language='javascript'>alert('업로드가 금지된 파일형식 입니다.');history.back(-1);</script>";
				exit;
			}

			copy($_FILES["view_file10"]["tmp_name"],"../../upfile/$view_filename10");

			if($mode=="modify"){
				$view_file_ment10 = ",view_file10='".$view_filename10."',view_file_name10='".$original_file_name_view10."'";
			}
		}
	}else{
		$view_filename10='';
	}

	if($list_file_del)
	{
		$file_ment = ",list_file='',list_file_name=''";
	}

	if($view_file_del1)
	{
		$file_ment2 = ",view_file='',view_file_name=''";
	}

	if($view_file_del2)
	{
		$view_file_ment2 = ",view_file2='',view_file_name2=''";
	}

	if($view_file_del3)
	{
		$view_file_ment3 = ",view_file3='',view_file_name3=''";
	}
	
	if($view_file_del4)
	{
		$view_file_ment4 = ",view_file4='',view_file_name4=''";
	}

	if($view_file_del5)
	{
		$view_file_ment5 = ",view_file5='',view_file_name5=''";
	}

	if($view_file_del6)
	{
		$view_file_ment6 = ",view_file6='',view_file_name6=''";
	}

	if($view_file_del7)
	{
		$view_file_ment7 = ",view_file7='',view_file_name7=''";
	}

	if($view_file_del8)
	{
		$view_file_ment8 = ",view_file8='',view_file_name8=''";
	}

	if($view_file_del9)
	{
		$view_file_ment9 = ",view_file9='',view_file_name9=''";
	}

	if($view_file_del10)
	{
		$view_file_ment10 = ",view_file10='',view_file_name10=''";
	}


	if($mode=="insert"){

	$sql="INSERT INTO TB_project (name_ko,name_en,top_title,bottom_text,url,list_file,list_file_name,view_file,view_file_name ,view_file2,view_file_name2  ,view_file3,view_file_name3 ,view_file4,view_file_name4 ,view_file5,view_file_name5,view_file6,view_file_name6 ,view_file7,view_file_name7 ,view_file8,view_file_name8 ,view_file9,view_file_name9 ,view_file10,view_file_name10,sort_num,use_yn,insert_dt,p_date)VALUES('$name_ko','$name_en','$top_title','$bottom_text','$url','$filename1','$original_file_name','$filename2' ,'$original_file_name2'  ,'$view_filename2','$original_file_name_view2'  ,'$view_filename3','$original_file_name_view3' ,'$view_filename4','$original_file_name_view4' ,'$view_filename5','$original_file_name_view5','$view_filename6','$original_file_name_view6' ,'$view_filename7','$original_file_name_view7' ,'$view_filename8','$original_file_name_view8' ,'$view_filename9','$original_file_name_view9' ,'$view_filename10','$original_file_name_view10','$sort_num','$use_yn',NOW(),'$p_date')";
		
	}else if($mode=="modify"){
		
		$sql="UPDATE TB_project SET name_ko = '".$name_ko."',name_en='".$name_en."',top_title='".$top_title."',bottom_text='".$bottom_text."',url='".$url."',sort_num='".$sort_num."',use_yn='".$use_yn."' , p_date='".$p_date."' $file_ment  $file_ment2  $view_file_ment2  $view_file_ment3  $view_file_ment4  $view_file_ment5  $view_file_ment6  $view_file_ment7  $view_file_ment8  $view_file_ment9  $view_file_ment10 WHERE idx = '".$idx."'";
		
	}else if($mode=="sort"){
		
		$arr_num = explode(",",$_POST["sort_num"]);

		$ii=0;
		foreach($arr_num as $key => $val){
				
			$sql="UPDATE TB_project SET sort_num='".$ii."' WHERE idx = '".$val."'";
			$result = mysqli_query($dbconn,$sql);
			$ii++;
		}
		popup_msg_go('정상 반영되었습니다.','project_sort.php');
		exit;
		
	}else if($mode=="del"){
			foreach($_POST["idx"] as $key => $val){



				$s_sql="select use_yn from TB_project where idx='".$val."'";
				$s_result = mysqli_query($dbconn,$s_sql);
				$s_row= mysqli_fetch_array($s_result);

				//if($s_row["use_yn"]!="Y"){
					$sql="DELETE FROM TB_project where idx='".$val."'";
					$result = mysqli_query($dbconn,$sql);
				//}
			}
		popup_msg_go('정상 반영되었습니다.','project_list.php');
		exit;
	}
	$result = mysqli_query($dbconn,$sql);


	if($result){
		popup_msg_go('정상 반영되었습니다.','project_list.php');
		exit;
	}










		
?>