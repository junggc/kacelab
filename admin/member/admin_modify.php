	<?include("../inc/top.php");?>
	<body>
		<section class="body">
			<?include("../inc/header.php");?>
			<div class="inner-wrapper">
				<?
				$page_code="member";
				$sub_page_code="member";
				include("../inc/menu.php");
				if($_GET["idx"]){
					$sql = "select * from TB_admin where idx='".$_GET["idx"]."'";
					$result = mysqli_query($dbconn,$sql);
					$row = mysqli_fetch_array($result);
				}
				$admin_class=$arr_admin_level_gubun[$row["admin_level"]];

				if(!$admin_class){
					$admin_class="일반회원";
				}
				?>
			<!-- start: page -->
				<div class="row">
						<div class="col-md-12">
							<form id="form" method="post" action="admin_proc.php" class="form-horizontal">
								<input type="hidden" name="mode" value="modify" />
								<input type="hidden" name="idx" value="<?=$row["idx"]?>" />
								<section class="panel">
									<header class="panel-heading">
										<div class="panel-actions">
											<a href="#" class="fa fa-caret-down"></a>
											<a href="#" class="fa fa-times"></a>
										</div>

										<h2 class="panel-title">관리자 관리</h2>
										<p class="panel-subtitle">
											관리자 상세보기
										</p>
									</header>
									<div class="panel-body">
										<div class="form-group">
											<label class="col-sm-3 control-label">관리자 구분<span class="required">*</span></label>
											<div class="col-sm-9">
												<?=$admin_class?>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label">아이디<span class="required">*</span></label>
											<div class="col-sm-6">
												<div class="row">
														<div class="col-sm-12"><?=$row["admin_id"]?></div>
													</div>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label">이름<span class="required">*</span></label>
											<div class="col-sm-9">
												<input type="text" name="admin_name" class="form-control" value="<?=$row["admin_name"]?>" required/>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label">비밀번호변경</label>
											<div class="col-sm-9">
												<div class="row">
													<div class="col-sm-1">
														<input type="checkbox" name="new_pw" id="new_pw" value="Y" onclick="function_pw()"/>
													</div>
													<div class="col-sm-4" style="display:none" id="show_pw">
														<input type="password" name="admin_pw_new" id="admin_pw_new"  class="form-control" value="" />
													</div>
												</div>
											</div>
										</div>
										<div class="form-group" style="display:none" id="show_master_pw">
											<label class="col-sm-3 control-label">마스터비밀번호</label>
											<div class="col-sm-9">
													<input type="password" name="admin_master_pw" id="admin_master_pw"  class="form-control" value="" />
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label">이메일<span class="required">*</span></label>
											<div class="col-sm-9">
												<input type="text" name="admin_email" class="form-control" value="<?=$row["admin_email"]?>" required/>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label">휴대폰번호<span class="required">*</span></label>
											<div class="col-sm-9">
												<input type="text" name="admin_hp" class="form-control" value="<?=$row["admin_hp"]?>" required/>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label">직급</label>
											<div class="col-sm-9">
												<input type="text" name="admin_class" class="form-control" value="<?=$row["admin_class"]?>" />
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label">사용여부<span class="required">*</span></label>
											<div class="col-sm-9">
												<input type="radio" id="admin_use" name="admin_use" value="Y" <?if($row["admin_use"]=="Y"){?>checked<?}?>>
												<label for="radioExample1">사용</label>
												<input type="radio" id="admin_use" name="admin_use" value="N" <?if($row["admin_use"]=="N"){?>checked<?}?>>
												<label for="radioExample1">미사용</label>
											</div>
										</div>
									</div>
									<footer class="panel-footer">
										<div class="row">
											<div class="col-sm-9 col-sm-offset-3">
												<button class="btn btn-primary">수정하기</button>
											</div>
										</div>
									</footer>
								</section>
							</form>
						</div>
					</div>
			<!-- end: page -->
<?include("../inc/bottom.php");?>
<script>
	// basic
	$("#form").validate({

			rules: {
				admin_name: {
					required: true,
					minlength: 3
				},
				admin_email: {
					required: true,
					email: true
				},
				admin_hp: {
					required: true,
					  phoneUS : true
				},
			},
			messages: {
			
				admin_name: {
					required: "이름을 입력하세요",
					minlength: "3글자 이상 입력하세요"
				},
				admin_email: {
					required : "이메일을 입력하시오",
					email : "이메일 형식에 맞추어 입력하여 주세요"
				},
			},
		highlight: function( label ) {
			$(label).closest('.form-group').removeClass('has-success').addClass('has-error');
		},
		success: function( label ) {
			$(label).closest('.form-group').removeClass('has-error');
			label.remove();
		},
		errorPlacement: function( error, element ) {
			var placement = element.closest('.input-group');
			if (!placement.get(0)) {
				placement = element;
			}
			if (error.text() !== '') {
				placement.after(error);
			}
		}
	}
	);
$.validator.addMethod("passwordCk",  function( value, element ) {
		return this.optional(element) ||  /^.*(?=.*\d)(?=.*[a-zA-Z])(?=.*[!@#$%^&+=]).*$/.test(value);
	}); 
jQuery.validator.addMethod("phoneUS", function(phone_number, element) {
    phone_number = phone_number.replace(/\s+/g, "");
    return this.optional(element) || phone_number.length > 9 && 
    phone_number.match("[0-9]+");
}, "전화번호 형식에 맞춰 입력하세요");

function function_pw(){
	var dd=$('input:checkbox[id="new_pw"]').is(":checked") == true

	if(dd==true){
			$("#show_pw").show();
			$("#show_master_pw").show();
	}else{
			$("#show_pw").hide();
			$("#admin_pw_new").val("");
			$("#show_master_pw").hide();
			$("#admin_master_pw").val("");
	}
}
</script>