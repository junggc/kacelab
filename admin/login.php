	<?
	$login_page = true;
	include("inc/top.php");?>
	<body>
		<section class="body">
			<?include("inc/header.php");?>

					<!-- start: page -->
		<section class="body-sign">
			<div class="center-sign">
				

				<div class="panel panel-sign">
					<div class="panel-title-sign mt-xl text-right">
						<h2 class="title text-uppercase text-bold m-none"><i class="fa fa-user mr-xs"></i>로그인</h2>
					</div>
					<div class="panel-body">
						<form action="index.html" method="post">
							<div class="form-group mb-lg">
								<label>아이디</label>
								<div class="input-group input-group-icon">
									<input name="admin_id" type="text" class="form-control input-lg" />
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
									<input name="admin_pw" type="password" class="form-control input-lg" />
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

				<p class="text-right text-muted mt-md mb-md">&copy; Template by Colorlib.</p></div>
		</section>
		<!-- end: page -->
					
			
			
			
			
			


<?include("inc/bottom.php");?>