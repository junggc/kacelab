	<?include("../inc/top.php");?>
	<body>
		<section class="body">
			<?include("../inc/header.php");?>

			<div class="inner-wrapper">
				<?
				$page_code="member";
				$sub_page_code="member";
				include("../inc/menu.php");
				
					// 한 페이지당 출력할 게시물의 수
					if(!$num_per_page) $num_per_page = 20;

					// 게시물 출력목록 하단에 링크를 걸 페이지의 개수
					$page_per_block = 10;

					if(!$_GET["page"]) {
					   $page = 1;
					}else{
						$page = $_GET["page"];
					}

					$query = "select idx FROM TB_admin WHERE 1=1 ";  
					$result = mysqli_query($dbconn,$query);
					$total_record = mysqli_num_rows($result);

				
					if (!$result) {
					   error("QUERY_ERROR");
					   exit;
					}
					// 현재의 페이지에서 출력할 게시물의 범위를 결정한다.
					if(!$total_record) {
					   $first = 1;
					   $last = 0;   
					} else {
					   $first = $num_per_page*($page-1);					 
					   $last = $num_per_page*$page;

					   $IsNext = $total_record - $last;
					   if($IsNext > 0) {
						  $last -= 1;
					   } else {
						  $last = $total_record - 1;
					   }
					}

					$total_page = ceil( $total_record / $num_per_page );

					$sql = "select * from TB_admin where 1=1   order by idx desc limit $first,$num_per_page";

				
		
						$result= mysqli_query($dbconn,$sql);
					if (!$result) {
					  // error("QUERY_ERROR");
					   exit;
					}

					// 게시물의 가상번호(게시물의 개수에 따른 일련번호)
					$article_num = $total_record - $num_per_page*($page-1);

				?>

			<!-- start: page -->
												
						<section class="panel">
							<header class="panel-heading">
								<div class="panel-actions">
									<a href="#" class="fa fa-caret-down"></a>
									<a href="#" class="fa fa-times"></a>
								</div>
						
								<h2 class="panel-title">관리자 관리</h2>
							</header>
							<form name="check_form" method="post" action="" >
							<input type="hidden" name="mode" value="" />
							<div class="panel-body">
								<div class="table-responsive">
									<table class="table table-bordered table-striped table-condensed mb-none">
										<thead>
											<tr>
												<th></th>
												<th class="text-center">번호</th>
												<th class="text-center">아이디</th>
												<th class="text-center">이름</th>
												<th class="text-center">권한</th>
												<th class="text-center">직급</th>
												<th class="text-center">휴대폰</th>
												<th class="text-center">생성일</th>
												<th class="text-center">최종로그인</th>
												<th class="text-center">사용여부</th>
												<th class="text-center">로그인초기화</th>
											</tr>
										</thead>
										
										<tbody>
											<?
											
											while($row = mysqli_fetch_array($result)){

											$admin_class=$arr_admin_level_gubun[$row["admin_level"]];
											$reg_dm = @date("Y-m-d",$row["admin_reg_dm"]);
											$last_dm = @date("Y-m-d",$row["admin_last_dm"]);
											if($row["admin_use"]=="Y"){
												$use_yn="사용";
											}else{
												$use_yn="미사용";
											}

											$a_link="";
											if($_SESSION["admin_level"]==1){
												$a_link=" <a href=\"admin_modify.php?idx=".$row["idx"]."\">";
												$reset_button_link="<A href=\"javascript:reset_pw('".$row["idx"]."')\"><button type=\"button\" class=\"mb-xs mt-xs mr-xs btn btn-xs btn-danger\">초기화</button></a>";
											}else{
												if($_SESSION["admin_id"]==$row["admin_id"]){
													$a_link=" <a href=\"admin_modify.php?idx=".$row["idx"]."\">";
												}
												$reset_button_link="<A href=\"javascript:alert('권한이 없습니다.');\"><button type=\"button\" class=\"mb-xs mt-xs mr-xs btn btn-xs btn-danger\">초기화</button></A>";
										}
											?>
											<tr>
												<td class="text-center"><input type="checkbox" name="idx[]" class="check_idx" value="<?=$row["idx"]?>"></td>
												<td class="text-center"><?=$article_num?></td>
												<td class="text-center"><?=$a_link?><?=$row["admin_id"]?></a></td>
												<td class="text-center"><?=$row["admin_name"]?></td>
												<td class="text-center"><?=$admin_class?></td>
												<td class="text-center"><?=$row["admin_class"]?></td>
												<td class="text-center"><?=$row["admin_hp"]?></td>
												<td class="text-center"><?=$reg_dm?></td>
												<td class="text-center"><?=$last_dm?></td>
												<td class="text-center"><?=$use_yn?></td>
												<td class="text-center"><?=$reset_button_link?></td>
											</tr>
											<?$article_num--;}?>
											
											
										</tbody>
									</table>
								</div>
								
							</div>
							</form>
							
						</section>
						<section class="panel text-right">
							<div class="col">
							<li ><a href="admin_write.php"><button type="button" class="mb-xs mt-xs mr-xs btn btn-xs btn-success" >등록</button></a> <A href="javascript:check_del()"><button type="button" class="mb-xs mt-xs mr-xs btn btn-xs btn-danger">삭제</button></a></li>
							</div>
						</section>
						<section class="panel text-center">
								<div class="col">
									
									<ul class="pagination">
										<?			
											// 게시물 목록 하단의 각 페이지로 직접 이동할 수 있는 페이지링크에 대한 설정을 한다.
											$total_block = ceil($total_page/$page_per_block);
											$block = ceil($page/$page_per_block);
											
											$first_page = ($block-1)*$page_per_block;
											$last_page = $block*$page_per_block;
											
											if($total_block <= $block) {
											   $last_page = $total_page;
											}
											$p_page = $page-1;

											echo "<li class=\"page-item\"><a class=\"page-link\" href=\"?page=$first_page\">처음</a></li>";
											
											echo "<li class=\"page-item\"><a class=\"page-link\" href=\"?page=$p_page\">이전</a></li>";
											
											for($direct_page = $first_page+1; $direct_page <= $last_page; $direct_page++) {
											   if($page == $direct_page) {
												  echo("<li class=\"page-item\"><a class=\"page-link\" href=\"?page=".$direct_page."\">".$direct_page."</a></li>");
											   } else {
												  echo("<li class=\"page-item\"><a class=\"page-link\" href=\"?page=".$direct_page."\">".$direct_page."</a></li> ");
											   }
											}
											$n_page = $page+1;
											if($n_page > $total_page) $n_page = $n_page-1;
											$end_page = $last_page+1;
											if($end_page > $total_page) $end_page = $end_page-1;
											
											echo "<li class=\"page-item\"><a class=\"page-link\" href=\"?page=$n_page\">다음</a></li>";
											
											echo "<li class=\"page-item\"><a class=\"page-link\" href=\"?page=$end_page\">끝</a></li>";

											?>

										
										
									</ul>
								</div>
							</section>
					<!-- end: page -->

<?include("../inc/bottom.php");?>

<script>
		function check_del(){
			var ch_len=$('input:checkbox[name="idx[]"]:checked').length;
			if(ch_len<1){
				alert("삭제할 아이디를 선택하여 주세요");
				return false;
			}

			if(<?=$_SESSION["admin_level"]?>==1){
				document.check_form.action="admin_proc.php";
				document.check_form.mode.value="del";
				document.check_form.submit();
			}else{
				alert("권한이 없습니다.");
				return false;
			}
		}

		function reset_pw(idx){
		
			 $.ajax({
				url: 'reset_pass_ajax.php',
				data: 'idx='+idx,
				type: 'POST',
				dataType: 'json',
				success: function(response){
					alert("초기화 되었습니다.");
										
				},
				error: function(e){
				
					alert('에러: '+e.responseText);
				}
			});
		}
	</script>