			<!-- start: header -->
			<header class="header">
				<div class="logo-container">
					<a href="../" class="logo">
						사이트 관리자모드
					</a>
					<div class="visible-xs toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened">
						<i class="fa fa-bars" aria-label="Toggle sidebar"></i>
					</div>
				</div>
				<!-- start: search & user box -->
				<div class="header-right">
					<div id="userbox" class="userbox">
						<a href="#" data-toggle="dropdown">
							<figure class="profile-picture">
								<img src="<?=$server_url?>/admin/assets/images/!logged-user.jpg" alt="Joseph Doe" class="img-circle" data-lock-picture="<?=$server_url?>/admin/assets/images/!logged-user.jpg" />
							</figure>
							<div class="profile-info" data-lock-name="John Doe" data-lock-email="johndoe@okler.com">
								<span class="name"><?=$_SESSION["admin_name"]?></span>
								<span class="role"><?=$arr_admin_level_gubun[$_SESSION["admin_level"]]?></span>
							</div>
			
							<i class="fa custom-caret"></i>
						</a>
			
						<div class="dropdown-menu">
							<ul class="list-unstyled">
								<li class="divider"></li>
								<li>
									<a role="menuitem" tabindex="-1" href="../member/admin_modify.php?idx=<?=$_SESSION["admin_idx"]?>"><i class="fa fa-user"></i> 개인정보 수정</a>
								</li>
								
								<li>
									<a role="menuitem" tabindex="-1" href="/admin/logout.php"><i class="fa fa-power-off"></i> 로그아웃</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<!-- end: search & user box -->
			</header>
			<!-- end: header -->