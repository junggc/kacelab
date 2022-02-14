<?
	include ("../../inc/dbconn.php");
	include ("../../inc/function.php");

	$admin_id = mysqli_real_escape_string($dbconn,$_POST["admin_id"]);
	$admin_pw = mysqli_real_escape_string($dbconn,base64_encode(hash('sha256', $_POST["admin_pw"], true)));

	$admin_name = mysqli_real_escape_string($dbconn,$_POST["admin_name"]);
	$admin_email = mysqli_real_escape_string($dbconn,$_POST["admin_email"]);
	$admin_hp = mysqli_real_escape_string($dbconn,$_POST["admin_hp"]);
	$admin_class = mysqli_real_escape_string($dbconn,$_POST["admin_class"]);
	$admin_use = mysqli_real_escape_string($dbconn,$_POST["admin_use"]);
	$reg_dm = time();
	if($_POST["mode"]=="modify"){
		if($_POST["new_pw"]=="Y"){
			$result = passwordCheck($_POST["admin_pw_new"]);
			if ($result[0] == false)
			{
				?>
					<script>alert("<?=$result[1]?>");history.go(-1);</script>
				<?
				exit;
			}
				$admin_master_pw = mysqli_real_escape_string($dbconn,base64_encode(hash('sha256', $_POST["admin_master_pw"], true)));
				$admin_pw_new = mysqli_real_escape_string($dbconn,base64_encode(hash('sha256', $_POST["admin_pw_new"], true)));

				$sql="select count(*) from TB_admin where admin_level='1' and admin_pw='".$admin_master_pw."'";
				$result = mysqli_query($dbconn,$sql);
				$row =mysqli_fetch_array($result);
				$cou = $row[0];
				if($cou<1){
				?>
					<script>alert("마스터 비밀번호가 틀립니다");history.go(-1);</script>
				<?
				exit;
				}
				$up_ment = "admin_pw ='".$admin_pw_new."',";			
		}
		$sql="UPDATE TB_admin set $up_ment admin_name='".$admin_name."',admin_hp='".$admin_hp."',admin_class='".$admin_class."',admin_use='".$admin_use."',admin_upd_dm='".$reg_dm."' WHERE idx='".$_POST["idx"]."'";
		}else if($_POST["mode"]=="del"){
			foreach($_POST["idx"] as $key => $val){
				$sql="DELETE FROM TB_admin where idx='".$val."'";
				$result = mysqli_query($dbconn,$sql);
			}
			?>
				<script>alert("정상처리되었습니다.");location.href="admin_list.php";</script>
			<?
			exit;
		}else{
			$sql="INSERT INTO TB_admin (admin_id,admin_level,admin_pw,admin_name,admin_email,admin_hp,admin_class,admin_use,admin_reg_dm)VALUES('$admin_id','2','$admin_pw','$admin_name','$admin_email','$admin_hp','$admin_class','$admin_use','$reg_dm')";
		}
			$result = mysqli_query($dbconn,$sql);
			if(!$result){
				?>
					<script>alert("오류입니다.");</script>
				<?
				exit;
			}else{
				?>
					<script>alert("정상처리되었습니다.");location.href="admin_list.php";</script>
				<?
			}
?>