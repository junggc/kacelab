<?
if($page_code=="portfolio"){
	$txt_menu="포트폴리오 관리";
	if($sub_page_code=="portfolio_list"){
		$txt_menu_1="포트폴리오 리스트";
	}else if($sub_page_code=="portfolio_modify"){
		$txt_menu_1="포트폴리오 수정";
	}else if($sub_page_code=="portfolio_insert"){
		$txt_menu_1="포트폴리오 등록";
	}
}else if($page_code=="board"){
	$txt_menu="게시판 관리";
	if($code=="qna"){
		$txt_menu="이바닥카운셀링관리 관리";
		if($sub_page_code=="board_list" && $code=="qna"){
			$txt_menu_1="이바닥카운셀링관리 리스트";
		}else if($sub_page_code=="board_view" && $code=="qna"){
			$txt_menu_1="이바닥카운셀링관리 상세보기";	
		}
	}else if($code=="project"){
		$txt_menu="프로젝트 의뢰관리 관리";
		if($sub_page_code=="board_list" && $code=="project"){
			$txt_menu_1="프로젝트 의뢰관리 리스트";
		}else if($sub_page_code=="board_view" && $code=="project"){
			$txt_menu_1="프로젝트 의뢰관리 상세보기";	
		}
	}else if($code=="career"){
		$txt_menu="career 관리";
		if($sub_page_code=="board_list" && $code=="career"){
			$txt_menu_1="career 리스트";
		}else if($sub_page_code=="board_view" && $code=="career"){
			$txt_menu_1="career 상세보기";	
		}
	}
}else if($page_code=="member"){
	$txt_menu="운영관리";
}else if($page_code=="main"){
	$txt_menu="메인화면";
}
else if($page_code=="project"){
	$txt_menu="work 관리";
	if($sub_page_code=="portfolio_list"){
		$txt_menu_1="work 리스트";
	}else if($sub_page_code=="portfolio_modify"){
		$txt_menu_1="work 수정";
	}else if($sub_page_code=="portfolio_insert"){
		$txt_menu_1="work 등록";
	}
}

$locaion_ment="";
if($txt_menu){
	$locaion_ment="<li><span>".$txt_menu."</span></li>";
}
if($txt_menu_1){
	$locaion_ment.="<li><span>".$txt_menu_1."</span></li>";
}

?>
	
	<!-- start: sidebar -->
				<aside id="sidebar-left" class="sidebar-left">
				
					<div class="sidebar-header">
						<div class="sidebar-title">
						
						</div>
						<div class="sidebar-toggle hidden-xs" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
							<i class="fa fa-bars" aria-label="Toggle sidebar"></i>
						</div>
					</div>
				
					<div class="nano">
						<div class="nano-content">
							<nav id="menu" class="nav-main" role="navigation">
								<ul class="nav nav-main nav-active">
									<li <?if($page_code=="main"){?>nav-active<?}?>">
										<a href="<?=$server_url?>/admin/main/">
											<i class="fa fa-home" aria-hidden="true"></i>
											<span>메인화면</span>
										</a>
									</li>
									
									<li class="nav-parent <?if($page_code=="portfolio"){?> nav-expanded nav-active<?}?>">
										<a>
											<i class="fa fa-file-image-o" aria-hidden="true"></i>
											<span>메인 포트폴리오 관리</span>
										</a>
										<ul class="nav nav-children">
											<li <?if($sub_page_code=="portfolio"){?>class="nav-active"<?}?>>
												<a href="../portfolio/portfolio_list.php">
													 메인 포트폴리오 관리
												</a>
											</li>
											
										</ul>
									</li>
									
									<li class="nav-parent <?if($page_code=="project"){?> nav-expanded nav-active<?}?>">
										<a>
											<i class="fa fa-file-image-o" aria-hidden="true"></i>
											<span>work 관리</span>
										</a>
										<ul class="nav nav-children">
											<li <?if($sub_page_code=="project"){?>class="nav-active"<?}?>>
												<a href="../project/project_list.php">
													 work 관리
												</a>
											</li>
											
										</ul>
									</li>
							
									<li class="nav-parent <?if($page_code=="board" && $code=="qna"){?>nav-expanded nav-active<?}?>">
										<a>
											<i class="fa fa-align-justify" aria-hidden="true"></i>
											<span>이바닥카운셀링관리</span>
										</a>
										<ul class="nav nav-children">
											<li <?if($sub_page_code=="qna"){?>class="nav-active"<?}?>>
												<a href="../board/list.php?code=qna">
													 이바닥카운셀링관리
												</a>
											</li>
											
										</ul>
									</li>
									<li class="nav-parent <?if($page_code=="board" && $code=="project"){?>nav-expanded nav-active<?}?>">
										<a>
											<i class="fa fa-align-justify" aria-hidden="true"></i>
											<span>프로젝트 의뢰관리</span>
										</a>
										<ul class="nav nav-children">
											<li <?if($sub_page_code=="project"){?>class="nav-active"<?}?>>
												<a href="../board/list.php?code=project">
													 프로젝트 의뢰관리
												</a>
											</li>
											
										</ul>
									</li>

									<li class="nav-parent <?if($page_code=="board" && $code=="career"){?>nav-expanded nav-active<?}?>">
										<a>
											<i class="fa fa-align-justify" aria-hidden="true"></i>
											<span>Career 관리</span>
										</a>
										<ul class="nav nav-children">
											<li <?if($sub_page_code=="career"){?>class="nav-active"<?}?>>
												<a href="../board/list.php?code=career">
													 Career 관리
												</a>
											</li>
											
										</ul>
									</li>
									
									<li class="nav-parent <?if($page_code=="member"){?>nav-expanded nav-active<?}?>">
										<a>
											<i class="fa fa-user" aria-hidden="true"></i>
											<span>운영관리</span>
										</a>
										<ul class="nav nav-children">
											<li <?if($sub_page_code=="member"){?>class="nav-active"<?}?>>
												<a href="../member/admin_list.php">
													 관리자관리
												</a>
											</li>
											
										</ul>
									</li>
								
				
							<hr class="separator" />
							<hr class="separator" />
							<hr class="separator" />
							<hr class="separator" />
							
							<div class="sidebar-widget widget-stats">
								<div class="widget-header">
									<h6>디스크 사용량</h6>
									<div class="widget-toggle">+</div>
								</div>
								<?
								 $dff = disk_free_space("/");

								 $dft = disk_total_space("/");
								?>
								<div class="widget-content">
									<ul>
										<li>
											<span class="stats-title">디스크 여유용량</span>
											<span class="stats-complete"><?=round(($dff / $dft * 100), 2)?>%</span>
											<div class="progress">
												<div class="progress-bar progress-bar-primary progress-without-number" role="progressbar" aria-valuenow="<?=round(($dff / $dft * 100), 2)?>" aria-valuemin="0" aria-valuemax="100" style="width: <?=round(($dff / $dft * 100), 2)?>%;">
													<span class="sr-only"><?=round(($dff / $dft * 100), 2)?></span>
												</div>
											</div>
										</li>
										
									</ul>
								</div>
							</div>
						</div>
				
					</div>
				
				</aside>
				<!-- end: sidebar -->


				<section role="main" class="content-body">
					<header class="page-header">
						<h2><?=$txt_menu?></h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								
								<li><a href="../main"><i class="fa fa-home"></i></a></li>
								<?=$locaion_ment?>
							</ol>
							&nbsp;&nbsp;
							<!-- <a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a> -->
						</div>
					</header>

					<!-- start: page -->

		