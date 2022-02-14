	<?include("../inc/top.php");
	?>
	<body>
		<section class="body">
			<?include("../inc/header.php");?>

			<div class="inner-wrapper">
				<?
				$code=$_GET["code"];
				if(!$_GET["code"]){
					$code="notice";
				}
				$page_code="board";
				$sub_page_code="board_list";
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

					$query = "select uid FROM jboard WHERE notice != 'Y' and code = '$code' $add_query ";  
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

					$sql = "select * from jboard WHERE notice != 'Y' and code = '$code' $add_query ORDER BY fid DESC, thread ASC limit $first,$num_per_page";

				
		
						$result= mysqli_query($dbconn,$sql);
					if (!$result) {
					  // error("QUERY_ERROR");
					   exit;
					}

					// 게시물의 가상번호(게시물의 개수에 따른 일련번호)
					$article_num = $total_record - $num_per_page*($page-1);




					$_page_url = "&code=".$code;

				?>

			<!-- start: page -->
												
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
							<form name="check_form" method="post" action="" >
							<input type="hidden" name="mode" value="" />
							<input type="hidden" name="code" value="<?=$code?>" />
							<input type="hidden" name="page" value="<?=$page?>" />


							<div class="panel-body">
								<div class="table-responsive">
									<table class="table table-bordered table-striped table-condensed mb-none">
										<thead>
											<?if($code=="qna"){?>
												<tr>
													<th></th>
													<th class="text-center">번호</th>
													<th class="text-center">작성자</th>
													<th class="text-center">제목</th>
													<th class="text-center">답변상태</th>
													<th class="text-center">등록일</th>
													<th class="text-center">관리</th>
												</tr>
											<?}else if($code=="career"){?>
												<tr>
													<th></th>
													<th class="text-center">번호</th>
													<th class="text-center">작성자</th>
													<th class="text-center">제목</th>
													<th class="text-center">등록일</th>
												</tr>
											
											<?}else{?>
												<tr>
													<th></th>
													<th class="text-center">번호</th>
													<th class="text-center">작성자</th>
													<th class="text-center">프로젝트 및 운영사이트명</th>
													<th class="text-center">프로젝트분야</th>
													<th class="text-center">의뢰범위</th>
													<th class="text-center">연락처</th>
													<th class="text-center">등록일</th>
												</tr>
											<?}?>

										</thead>
										
										<tbody>
											<?
											
											while($row = mysqli_fetch_array($result)){
											
											if($row["use_yn"]=="Y"){
												$use_yn = "전시";
											}else{
												$use_yn = "미전시";
											}

											
											
											if($row["re_content"]){
												$re_ment="답변완료";
												$re_button="<a href='view.php?code=".$code."&uid=".$row["uid"]."'><font color='blue'>[답변수정]</font></a>";
											}else{
												$re_ment="<font color='red'>답변대기</font>";
												$re_button="<a href='view.php?code=".$code."&uid=".$row["uid"]."'><font color='red'>[답변등록]</font></a>";
											}



											$title = $row["title"];
											$name = $row["name"];
											$reg_id = $row["reg_id"];
											$reg_dm = @date("Y-m-d",$row["signdate"]);

											$a_link=" <a href='view.php?code=".$code."&uid=".$row["uid"]."'>";

											if($code=="qna"){
											?>
											<tr>
												<td class="text-center"><input type="checkbox" name="uid[]" class="check_idx" value="<?=$row["uid"]?>"></td>
												<td class="text-center"><?=$article_num?></td>
												<td class="text-center"><?=$name?></td>
												<td class="text-left"><?=$a_link?><?=$title?></a></td>
												<td class="text-center"><?=$re_ment?></td>
												<td class="text-center"><?=$reg_dm?></td>
												<td class="text-center"><?=$re_button?></td>
											</tr>
											<?
											}else if($code=="career"){
											?>
											<tr>
												<td class="text-center"><input type="checkbox" name="uid[]" class="check_idx" value="<?=$row["uid"]?>"></td>
												<td class="text-center"><?=$article_num?></td>
												<td class="text-center">미상</td>
												<td class="text-left"><?=$a_link?><?=$title?></a></td>
												<td class="text-center"><?=$reg_dm?></td>
										
											</tr>
											<?
											
											}else{
											?>
											<tr>
												<td class="text-center"><input type="checkbox" name="uid[]" class="check_idx" value="<?=$row["uid"]?>"></td>
												<td class="text-center"><?=$article_num?></td>
												<td class="text-center"><?=$name?></td>
												<td class="text-left" style="width:20%"><?=$a_link?><?=$title?></a></td>
												<td class="text-center"><?=$row["etc1"]?></td>
												<td class="text-center"><?=$row["etc2"]?></td>
												<td class="text-center"><?=$row["tel"]?></td>
												<td class="text-center"><?=$reg_dm?></td>
											</tr>
											<?
											}
											$article_num--;}?>
											
											
										</tbody>
									</table>
								</div>
								
							</div>
							</form>
							
						</section>
						<section class="panel text-right">
							<div class="col">
							<li ><!-- <a href="portfolio_write.php"><button type="button" class="mb-xs mt-xs mr-xs btn btn-xs btn-success" >등록</button></a> --> <A href="javascript:check_del()"><button type="button" class="mb-xs mt-xs mr-xs btn btn-xs btn-danger">삭제</button></a></li>
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

											echo "<li class=\"page-item\"><a class=\"page-link\" href=\"?page=$first_page".$_page_url."\">처음</a></li>";
											
											echo "<li class=\"page-item\"><a class=\"page-link\" href=\"?page=$p_page".$_page_url."\">이전</a></li>";
											
											for($direct_page = $first_page+1; $direct_page <= $last_page; $direct_page++) {
											   if($page == $direct_page) {
												  echo("<li class=\"page-item active\"><a class=\"page-link \" href=\"?page=".$direct_page.$_page_url."\">".$direct_page."</a></li>");
											   } else {
												  echo("<li class=\"page-item\"><a class=\"page-link\" href=\"?page=".$direct_page.$_page_url."\">".$direct_page."</a></li> ");
											   }
											}
											$n_page = $page+1;
											if($n_page > $total_page) $n_page = $n_page-1;
											$end_page = $last_page+1;
											if($end_page > $total_page) $end_page = $end_page-1;
											
											echo "<li class=\"page-item\"><a class=\"page-link\" href=\"?page=$n_page".$_page_url."\">다음</a></li>";
											
											echo "<li class=\"page-item\"><a class=\"page-link\" href=\"?page=$end_page".$_page_url."\">끝</a></li>";

											?>

										
										
									</ul>
								</div>
							</section>
					<!-- end: page -->

<?include("../inc/bottom.php");?>

<script>
		function check_del(){
			var ch_len=$('input:checkbox[name="uid[]"]:checked').length;
			if(ch_len<1){
				alert("삭제할 항목을 선택하세요");
				return ;
			}

			if(confirm("삭제시 복구 불가능합니다")==true){
				document.check_form.action="delete.php";
				document.check_form.mode.value="del";
				document.check_form.submit();
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