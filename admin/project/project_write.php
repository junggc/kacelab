	<?include("../inc/top.php");?>
	<body>
		<section class="body">
			<?include("../inc/header.php");?>
			<div class="inner-wrapper">
				<?
				$mode="insert";
				$ment="등록";
				$sub_page_code="project_insert";
				if($_GET["idx"]){
					$mode="modify";
					$ment="수정";

					$sql = "SELECT * FROM TB_project WHERE idx= '".$_GET["idx"]."'";
					$result = mysqli_query($dbconn,$sql);
					$row = mysqli_fetch_array($result);

					$arr_color = explode(",",$row["rgb_color"]);
					$sub_page_code="project_modify";

				}
				$page_code="portfolio";
				
				include("../inc/menu.php");

				
				

				?>
			<!— start: page —>
				<div class="row">
						<div class="col-md-12">
							<form id="form" name="write_form" method="post" enctype='multipart/form-data' action="project_proc.php" class="form-horizontal">
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
											<label class="col-sm-3 control-label">업체명 한글<span class="required">*</span></label>
											<div class="col-sm-9">
												<input type="text" name="name_ko" class="form-control" value="<?=$row["name_ko"]?>" />
											</div>
										</div>
										
										<div class="form-group">
											<label class="col-sm-3 control-label">업체명 영어<span class="required">*</span></label>
											<div class="col-sm-9">
												<input type="text" name="name_en" class="form-control" value="<?=$row["name_en"]?>" />
											</div>
										</div>
										
										<div class="form-group">
											<label class="col-sm-3 control-label">날짜<span class="required">*</span></label>
											<div class="col-sm-9">
												<input type="text" name="p_date" class="form-control" value="<?=$row["p_date"]?>" />
											</div>
										</div>
										
										
										<div class="form-group">
											<label class="col-sm-3 control-label">상단 텍스트<span class="required">*</span></label>
											<div class="col-sm-9">
												<input type="text" name="top_title" class="form-control" value="<?=$row["top_title"]?>" />
											</div>
										</div>
										
										<div class="form-group">
											<label class="col-sm-3 control-label">하단 텍스트<span class="required">*</span></label>
											<div class="col-sm-9">
												<textarea name="bottom_text" class="form-control" style="height: 300px;"><?=$row["bottom_text"]?></textarea>
											</div>
										</div>
										
										<div class="form-group">
											<label class="col-sm-3 control-label">사이트 주소<span class="required">*</span></label>
											<div class="col-sm-9">
												<input type="text" name="url" class="form-control" value="<?=$row["url"]?>" />
											</div>
										</div>
										
										<div class="form-group">
											<label class="col-sm-3 control-label">리스트 이미지<span class="required">*</span></label>
											<div class="col-sm-6">
												<input type="file" name="list_file"  id="list_file" class="form-control" />
											</div>
											<div class="col-sm-3"><?=$row["list_file"]?><br>
												<?php if($row['list_file']){?>
												<input type="checkbox" name="list_file_del" value="y">
												<?}?>
											</div>
										</div>
										
										<div class="form-group">
											<label class="col-sm-3 control-label">상세 이미지 1<span class="required">*</span></label>
											<div class="col-sm-6">
												<input type="file" name="view_file"  id="view_file" class="form-control" />
											</div>
											<div class="col-sm-3"><?=$row["view_file"]?><br>
											<?php if($row['view_file']){?>	
											<input type="checkbox" name="view_file_del1" value="y">
											<?}?>	
											</div>
										</div>
										
										<div class="form-group">
											<label class="col-sm-3 control-label">상세 이미지 2<span class="required">*</span></label>
											<div class="col-sm-6">
												<input type="file" name="view_file2"  id="view_file2" class="form-control" />
											</div>
											<div class="col-sm-3"><?=$row["view_file2"]?><br>
											<?php if($row['view_file2']){?>	
											<input type="checkbox" name="view_file_del2" value="y">
											<?}?>
											</div>
										</div>
										
										<div class="form-group">
											<label class="col-sm-3 control-label">상세 이미지 3<span class="required">*</span></label>
											<div class="col-sm-6">
												<input type="file" name="view_file3"  id="view_file3" class="form-control" />
											</div>
											<div class="col-sm-3"><?=$row["view_file3"]?><br>
											<?php if($row['view_file3']){?>	
											<input type="checkbox" name="view_file_del3" value="y">
											<?}?>	
											</div>
										</div>
										
										<div class="form-group">
											<label class="col-sm-3 control-label">상세 이미지 4<span class="required">*</span></label>
											<div class="col-sm-6">
												<input type="file" name="view_file4"  id="view_file4" class="form-control" />
											</div>
											<div class="col-sm-3"><?=$row["view_file4"]?><br>
												<input type="checkbox" name="view_file_del4" value="y">
											</div>
										</div>
										
										<div class="form-group">
											<label class="col-sm-3 control-label">상세 이미지 5<span class="required">*</span></label>
											<div class="col-sm-6">
												<input type="file" name="view_file5"  id="view_file5" class="form-control" />
											</div>
											<div class="col-sm-3"><?=$row["view_file5"]?><br>
												<?php if($row['view_file5']){?>	
											<input type="checkbox" name="view_file_del5" value="y">
											<?}?>
											</div>
										</div>
										
										<div class="form-group">
											<label class="col-sm-3 control-label">상세 이미지 6<span class="required">*</span></label>
											<div class="col-sm-6">
												<input type="file" name="view_file6"  id="view_file6" class="form-control" />
											</div>
											<div class="col-sm-3"><?=$row["view_file6"]?><br>
												<?php if($row['view_file6']){?>	
											<input type="checkbox" name="view_file_del6" value="y">
											<?}?>
											</div>
										</div>
										
										<div class="form-group">
											<label class="col-sm-3 control-label">상세 이미지 7<span class="required">*</span></label>
											<div class="col-sm-6">
												<input type="file" name="view_file7"  id="view_file7" class="form-control" />
											</div>
											<div class="col-sm-3"><?=$row["view_file7"]?><br>
												<?php if($row['view_file7']){?>	
											<input type="checkbox" name="view_file_del7" value="y">
											<?}?>
											</div>
										</div>
										
										<div class="form-group">
											<label class="col-sm-3 control-label">상세 이미지 8<span class="required">*</span></label>
											<div class="col-sm-6">
												<input type="file" name="view_file8"  id="view_file8" class="form-control" />
											</div>
											<div class="col-sm-3"><?=$row["view_file8"]?><br>
												<?php if($row['view_file8']){?>	
											<input type="checkbox" name="view_file_del8" value="y">
											<?}?>
											</div>
										</div>
										
										<div class="form-group">
											<label class="col-sm-3 control-label">상세 이미지 9<span class="required">*</span></label>
											<div class="col-sm-6">
												<input type="file" name="view_file9"  id="view_file9" class="form-control" />
											</div>
											<div class="col-sm-3"><?=$row["view_file9"]?><br>
												<?php if($row['view_file9']){?>	
											<input type="checkbox" name="view_file_del9" value="y">
											<?}?>
											</div>
										</div>
										
										<div class="form-group">
											<label class="col-sm-3 control-label">상세 이미지 10<span class="required">*</span></label>
											<div class="col-sm-6">
												<input type="file" name="view_file10"  id="view_file10" class="form-control" />
											</div>
											<div class="col-sm-3"><?=$row["view_file10"]?><br>
												<?php if($row['view_file10']){?>	
											<input type="checkbox" name="view_file_del10" value="y">
											<?}?>
											</div>
										</div>
										
										
											
									</div>
									<footer class="panel-footer">
										<div class="row">
											<div class="col-sm-12 text-center">
												<a href="javascript:reg_ok()"><span class="btn btn-primary"><?=$ment?>하기</span></a>
												<a href="project_list.php"> <span class="btn btn-danger">취소하기</span></a>
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

		<?if($mode=="insert"){?>
		var fileCheck = document.getElementById("list_file").value;
		 if(!fileCheck){
		 alert("파일을 첨부해 주세요");
			return;
		 }
		
		var fileCheck = document.getElementById("view_file").value;
		 if(!fileCheck){
		 alert("파일을 첨부해 주세요");
			return;
		 }
		 <?}?>



		 form.submit();
	}
</script>