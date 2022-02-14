	<?	session_start();

		include "../inc/dbconn.php";
		include "../inc/function.php";
		


		$admin_id = mysqli_real_escape_string($dbconn,$_POST["admin_id"]);
		$admin_pw = mysqli_real_escape_string($dbconn,base64_encode(hash('sha256', $_POST["admin_pw"], true)));
		

		$now_date = time();
		

		$sql = "select idx,admin_id,admin_pw,admin_name,admin_level,admin_log_fail from TB_admin where admin_id='".$admin_id."'";
		$result = mysqli_query($dbconn,$sql);
		$row = mysqli_fetch_array($result);



		if($row["admin_log_fail"]>5 && $row["admin_level"]>1){
				echo "<script>alert('비밀번호 5회 이상 틀렸습니다. 관리자에게 문의하세요');location.replace('index.php');</script>";
				exit;
		}
		

		if($row["admin_id"]){

			if($row["admin_pw"]==$admin_pw){

				if($row["admin_use"]!="N"){

					$_SESSION["admin_level"]=$row["admin_level"];
					$_SESSION["admin_id"]=$row["admin_id"];
					$_SESSION["admin_name"]=$row["admin_name"];
					$_SESSION["admin_idx"]=$row["idx"];

					$upsql="update TB_admin set admin_last_dm = '".$now_date."',admin_log_fail=0 where idx='".$row["idx"]."' ";
					mysqli_query($dbconn,$upsql);
					echo "<script>location.replace('portfolio/portfolio_list.php');</script>";
				}else{
					echo "<script>alert('아이디 또는 비번을 확인하여 주세요');location.replace('index.php');</script>";
					exit;
				}

			}else{


				$upsql="update TB_admin set admin_log_fail = admin_log_fail+1 where idx='".$row["idx"]."' ";
				mysqli_query($dbconn,$upsql);
				echo "<script>alert('아이디 또는 비번을 확인하여 주세요');location.replace('index.php');</script>";
				exit;
			}

		}else{
			echo "<script>alert('아이디 또는 비번을 확인하여 주세요');location.replace('index.php');</script>";
			exit;
		}


	?>