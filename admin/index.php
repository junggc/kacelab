	<?
	$login_page = true;
	include("inc/top.php");?>
	<body>
		<section class="body">
			

					<!-- start: page -->
		<section class="body-sign">
			<div class="center-sign">
				

				<div class="panel panel-sign">
					<div class="panel-title-sign mt-xl text-right">
						<h2 class="title text-uppercase text-bold m-none"><i class="fa fa-user mr-xs"></i>로그인</h2>
					</div>
					<div class="panel-body">
						<form action="login_proc.php" method="post" id="login" name="login_form">
							<div class="form-group mb-lg">
								<label>아이디</label>
								<div class="input-group input-group-icon">
									<input name="admin_id" type="text" class="form-control input-lg" id="admin_id"/>
									<span class="input-group-addon">
										<span class="icon icon-lg">
											<i class="fa fa-user"></i>
										</span>
									</span>
								</div>
							</div>

							<div class="form-group mb-lg">
								<div class="clearfix">
									<label class="pull-left">비밀번호</label>
									<!-- <a href="pages-recover-password.html" class="pull-right">Lost Password?</a> -->
								</div>
								<div class="input-group input-group-icon">
									<input name="admin_pw" type="password" class="form-control input-lg" id="admin_pw"/>
									<span class="input-group-addon">
										<span class="icon icon-lg">
											<i class="fa fa-lock"></i>
										</span>
									</span>
								</div>
							</div>

							<div class="row">
								<div class="col-sm-8">
									<!-- <div class="checkbox-custom checkbox-default">
										<input id="RememberMe" name="rememberme" type="checkbox"/>
										<label for="RememberMe">Remember Me</label>
									</div> -->
								</div>
								<div class="col-sm-4 text-right">
									<button type="submit" class="btn btn-primary hidden-xs">로그인</button>
									<button type="submit" class="btn btn-primary btn-block btn-lg visible-xs mt-lg">로그인</button>
								</div>
							</div>

							

							<!-- <p class="text-center">회원가입 신ㅊ? <a href="pages-signup.html">Sign Up!</a> -->

						</form>
					</div>
				</div>

				<p class="text-center text-muted mt-md mb-md">&copy; Copyright  All rights reserved. kacellab.</p> <p class="text-center text-muted mt-md mb-md">Template byColorlib</p>
			</div>
		</section>
		<!-- end: page -->

<?include("inc/bottom.php");?>
<script type="text/javascript">


		$( document ).ready( function () {
			$( "#login" ).validate( {
				rules: {
					admin_id: "required",
					admin_pw: "required",
					admin_id: {
						required: true,
						minlength: 3
					},
					admin_pw: {
						required: true,
						passwordCk : true,
						minlength : 8,
						maxlength : 16
					},
				},
				messages: {
					admin_id: {
						required: "아이디를 입력하세요",
						minlength: "3글자 이상 입력하세요"
					},
					admin_pw: {
						required : "암호를 입력하시오.",
						passwordCk : "비밀번호는 영문자, 숫자, 특수문자 조합을 입력해야 합니다.",
						minlength : "암호는 {0}자 이상 입력해주세요!",
						maxlength : "암호는 {0}자 이하 입력해주세요!"
					},
				},
				errorElement: "em",
				errorPlacement: function ( error, element ) {
					if ( element.prop( "type" ) === "checkbox" ) {
						error.insertAfter( element.parent( "label" ) );
					} else {
						error.insertAfter( element );
					}
					// Add the span element, if doesn't exists, and apply the icon classes to it.
					if ( !element.next( "span" )[ 0 ] ) {
						$( "<span class='glyphicon glyphicon-remove form-control-feedback'></span>" ).insertAfter( element );
					}
				},
				success: function ( label, element ) {
					// Add the span element, if doesn't exists, and apply the icon classes to it.
					if ( !$( element ).next( "span" )[ 0 ] ) {
						$( "<span class='glyphicon glyphicon-ok form-control-feedback'></span>" ).insertAfter( $( element ) );
					}
				}
		
			} );

			$.validator.addMethod("passwordCk",  function( value, element ) {
				return this.optional(element) ||  /^.*(?=.*\d)(?=.*[a-zA-Z])(?=.*[!@#$%^&+=]).*$/.test(value);
			}); 

		} );

		$("#admin_id").focus();
	</script>
