	<?include("../inc/top.php");?>
	<body>
		<section class="body">
			<?include("../inc/header.php");?>
			<div class="inner-wrapper">
				<?
				$page_code="member";
				$sub_page_code="member";
				include("../inc/menu.php");
				?>
			<!-- start: page -->
				<div class="row">
						<div class="col-md-12">
							<form id="form" method="post" action="admin_proc.php" class="form-horizontal">
								<section class="panel">
									<header class="panel-heading">
										<div class="panel-actions">
											<a href="#" class="fa fa-caret-down"></a>
											<a href="#" class="fa fa-times"></a>
										</div>
										<h2 class="panel-title">관리자 관리</h2>
										<p class="panel-subtitle">
											관리자 등록
										</p>
									</header>
									<div class="panel-body">
										<div class="form-group">
											<label class="col-sm-3 control-label">아이디<span class="required">*</span></label>
											<div class="col-sm-6">
												<div class="row">
														<div class="col-sm-6">
															<input type="text" name="admin_id" class="form-control" required/>
														</div>
														<div class="visible-xs mb-md"></div>
														<!-- <div class="col-sm-6">
															<button type="button" class="mb-xs mt-xs mr-xs btn btn-xs btn-info" >아이디 중복검사</button>
														</div> -->
													</div>
											</div>
										</div>
										
										<div class="form-group">
											<label class="col-sm-3 control-label">이름<span class="required">*</span></label>
											<div class="col-sm-9">
												<input type="text" name="admin_name" class="form-control" value="" required/>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label">비밀번호<span class="required">*</span></label>
											<div class="col-sm-9">
												<input type="password" name="admin_pw"  id="admin_pw" class="form-control" required/>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label">비밀번호 재입력<span class="required">*</span></label>
											<div class="col-sm-9">
												<input type="password" name="admin_pw_re" class="form-control" required/>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label">이메일<span class="required">*</span></label>
											<div class="col-sm-9">
												<input type="text" name="admin_email" class="form-control" required/>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label">휴대폰번호<span class="required">*</span></label>
											<div class="col-sm-9">
												<input type="text" name="admin_hp" class="form-control" required/>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label">직급</label>
											<div class="col-sm-9">
												<input type="text" name="admin_class" class="form-control" />
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label">사용여부<span class="required">*</span></label>
											<div class="col-sm-9">
												<input type="radio" id="admin_use" name="admin_use" value="Y">
												<label for="radioExample1">사용</label>
												<input type="radio" id="admin_use" name="admin_use" value="N" checked>
												<label for="radioExample1">미사용</label>
											</div>
										</div>
									</div>
									<footer class="panel-footer">
										<div class="row">
											<div class="col-sm-9 col-sm-offset-3">
												<button class="btn btn-primary">등록하기</button>
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
				admin_id: "required",
				admin_id: {
					required: true,
					minlength: 3,
					remote: "id_check_ajax.php"
				},
				admin_name: {
					required: true,
					minlength: 3
				},
				admin_pw: {
					required: true,
					passwordCk : true,
					minlength : 8,
					maxlength : 16
				},
				admin_pw_re: {
					required: true,
					equalTo: "#admin_pw",
					minlength : 8,
					maxlength : 16
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
				admin_id: {
					required: "아이디를 입력하세요",
					minlength: "3글자 이상 입력하세요",
					remote : "이미 존재하는 아이디입니다"
				},
				admin_name: {
					required: "이름을 입력하세요",
					minlength: "3글자 이상 입력하세요"
				},
				admin_pw: {
					required : "비밀번호를 입력하시오.",
					passwordCk : "비밀번호는 영문자, 숫자, 특수문자 조합을 입력해야 합니다.",
					minlength : "비밀번호는 {0}자 이상 입력해주세요!",
					maxlength : "비밀번호는 {0}자 이하 입력해주세요!"
				},
				admin_pw_re: {
					required : "비밀번호를 입력하시오.",
					equalTo: "비밀번호가 맞지않습니다.",
					minlength : "비밀번호는 {0}자 이상 입력해주세요!",
					maxlength : "비밀번호는 {0}자 이하 입력해주세요!"
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
</script>