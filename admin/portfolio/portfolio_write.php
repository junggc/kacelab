	<?include("../inc/top.php");?>
	<body>
		<section class="body">
			<?include("../inc/header.php");?>
			<div class="inner-wrapper">
				<?
				$mode="insert";
				$ment="등록";
				$sub_page_code="portfolio_insert";
				if($_GET["idx"]){
					$mode="modify";
					$ment="수정";

					$sql = "SELECT * FROM TB_portfolio WHERE idx= '".$_GET["idx"]."'";
					$result = mysqli_query($dbconn,$sql);
					$row = mysqli_fetch_array($result);

					$arr_color = explode(",",$row["rgb_color"]);
					$sub_page_code="portfolio_modify";

				}
				$page_code="portfolio";
				
				include("../inc/menu.php");

				
				

				?>
			<!— start: page —>
				<div class="row">
						<div class="col-md-12">
							<form id="form" name="write_form" method="post" enctype='multipart/form-data' action="portfolio_proc.php" class="form-horizontal">
								<input type="hidden" name="mode" value="<?=$mode?>" />
								<input type="hidden" name="idx" value="<?=$_GET["idx"]?>" />
								<section class="panel">
									<header class="panel-heading">
										<div class="panel-actions">
											<a href="#" class="fa fa-caret-down"></a>
											<a href="#" class="fa fa-times"></a>
										</div>
										<h2 class="panel-title"><?=$txt_menu?></h2>
										<p class="panel-subtitle">
											<?=$txt_menu_1?>
										</p>
									</header> 
									<div class="panel-body">
										<div class="form-group">
											<label class="col-sm-3 control-label">전시여부<span class="required">*</span></label>
											<div class="col-sm-9">
												<input type="radio" id="use_yn" name="use_yn" value="Y" <?if($row["use_yn"]=="Y"){ echo "checked";}?>>
												<label for="radioExample1">전시</label>
												<input type="radio" id="use_yn" name="use_yn" value="N" <?if($row["use_yn"]=="N" || $row["use_yn"]==""){ echo "checked";}?>>
												<label for="radioExample1">미전시</label>
											</div>
										</div>
										
										<div class="form-group">
											<label class="col-sm-3 control-label">제목<span class="required">*</span></label>
											<div class="col-sm-9">
												<input type="text" name="title" class="form-control" value="<?=$row["title"]?>" />
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label">이미지<span class="required">*</span></label>
											<div class="col-sm-6">
												<input type="file" name="upfile1"  id="upfile1" class="form-control" />
											</div>
											<div class="col-sm-3"><?=$row["upfile1_name"]?><br>
												2MB 이하 jpg,png만 업로드 가능
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label">이미지 연결링크</label>
											<div class="col-sm-6">
												<input type="text" name="link_url"  id="link_url" class="form-control" value="<?=$row["link_url"]?>" />
											</div>
											<div class="col-sm-3">
												<input type="radio" id="link_url_target" name="link_url_target" value="_blank" <?if($row["link_url_target"]=="_blank"){ echo "checked";}?>>
												<label for="radioExample1">새창</label>
												<input type="radio" id="link_url_target" name="link_url_target" value="_self" <?if($row["link_url_target"]=="_self" || $row["link_url_target"]==""){ echo "checked";}?>>
												<label for="radioExample1">현재창</label>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label">포트폴리오<br>상단 서브 텍스트</label>
											<div class="col-sm-6">
													<textarea class="form-control" rows="3" name="top_text" id="top_text"><?=$row["top_text"]?></textarea>
											</div>
											<div class="col-sm-3">
											텍스트만 입력가능
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label">포트폴리오<br>하단 메인 텍스트</label>
											<div class="col-sm-6">
												<textarea class="form-control" rows="3" name="bottom_text" id="bottom_text"><?=$row["bottom_text"]?></textarea>
											</div>
											<div class="col-sm-3">
											텍스트만 입력가능
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label">포트폴리오 좌측면 색상값</label>
											<div class="col-sm-3">
												R:<input type="text" name="rgb_1" value="<?=$arr_color[0]?>"  />
											</div>
											<div class="col-sm-3">
												G:<input type="text" name="rgb_2" value="<?=$arr_color[1]?>"/>
											</div>
											<div class="col-sm-3">
												B:<input type="text" name="rgb_3" value="<?=$arr_color[2]?>"/>
											</div>
										</div>
											
									</div>
									<footer class="panel-footer">
										<div class="row">
											<div class="col-sm-12 text-center">
												<a href="javascript:reg_ok()"><span class="btn btn-primary"><?=$ment?>하기</span></a>
												<a href="portfolio_list.php"> <span class="btn btn-danger">취소하기</span></a>
											</div>
										</div>
									</footer>
								</section>
							</form>
						</div>
					</div>
			<!— end: page —>

<?include("../inc/bottom.php");?>
<script>
	function reg_ok(){
		
		var form = document.write_form;

		if(form.title.value==""){
			alert("타이틀을 입력하여 주세요");
			form.title.focus();
			return;
		}


		<?if($mode=="insert"){?>
		var fileCheck = document.getElementById("upfile1").value;
		 if(!fileCheck){
		 alert("파일을 첨부해 주세요");
			return;
		 }
		 <?}?>



		 form.submit();
	}
</script>