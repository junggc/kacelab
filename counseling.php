<?
include_once $_SERVER['DOCUMENT_ROOT']."/inc/contents_header2.php";

$code="qna";
// 한 페이지당 출력할 게시물의 수
if(!$num_per_page) $num_per_page = 20;

// 게시물 출력목록 하단에 링크를 걸 페이지의 개수

if($this_agent=="Mobile"){
	$page_per_block = 5;
}else{
	$page_per_block = 10;
}

if(!$_GET["page"]) {
   $page = 1;
}else{
	$page = $_GET["page"];
}

if($_GET["search_txt"]){
	$add_query .= " and title like '%".$_GET["search_txt"]."%'";
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
<div id="container" class="mainContainer subContainer" style="padding:0;">
	<div class="mainContent">
		<div class="mCoun">
		<div class="inner abClear">
			<div class="cnimg">
				<h3><span><span>이바닥</span></span> 카운셀링</h3>
				<div class="img">
					<img class="coun coun1" src="../resources/images/ico_coun1.png" alt="KACELAB visual image" />
					<img class="coun coun2" src="../resources/images/ico_coun2.png" alt="KACELAB visual image" />
					<img class="coun coun3" src="../resources/images/ico_coun3.png" alt="KACELAB visual image" />
					<img class="coun coun4" src="../resources/images/ico_coun4.png" alt="KACELAB visual image" />
					<img class="coun coun5" src="../resources/images/ico_coun5.png" alt="KACELAB visual image" />
					<img src="../resources/images/ico_coun.png" alt="KACELAB visual image" />
				</div>
			</div>
			<div class="cncont">
				<span>RFP 작성</span>은 어떻게 하는건가요? <span>견적서 작성</span>을 해야 하는데 아무리 찾아봐도 알려주는 곳이 없어요.<br />
				갑자기 PM을 맡게 되었어요. <span>WBS</span>는 어떻게 작성하면 되나요? <br />
				<span>웹기획자</span>가 되고 싶은데 어떻게 배우면 되나요? <span>디자인 벤치마킹</span>은 어떻게 하면 되죠?<br />
				<span>퍼블리싱</span>을 시작하고 싶은데 어떻게 해야할지 모르겠어요.제가 만든 <span>개발소스</span>를 검수 받고 싶어요.<br />
				<span>테스트 시나리오 샘플</span>이 필요한데 어디서 구할 수 있나요?
				<div class="ques">
					프로젝트, 운영, 마케팅, 영업, <span>고객사 실무 담당자들의 모든 궁금증</span>
					<div>케이스랩에서 답해드립니다.</div>
				</div>
			</div>
		</div>
	</div>
	</div>
	<div class="subContent">
		<div class="board">
			<div class="inner">

				<form name="search_form" method="get" action="?">
				<input type="hidden" name="code" value="<?=$code?>">
				<input type="hidden" name="mode" value="search">

				<div class="searchArea">
					<div class="search"><input type="search" placeholder="키워드로 검색해보세요." name="search_txt" value="<?=$_GET["search_txt"]?>" /><button type="submit">찾기</button></div>
					<a class="btnReq" href="counseling_write.php">그냥 물어보기</a>
				</div>


				<div class="boardArea">
					<div class="list">
						<ul>
							<!-- <li class="notice">
								<div class="num">Notice</div>
								<a class="title" href="counseling_view.html"><span><span>광고성 글. 비방글, 의료상담과 무관한 글은 삭제 조치 합니다.</span></span></a>
								<div class="name">관리자</div>
								<div class="vd">
									<div class="view">115 views</div>
									<div class="date">2019-06-07</div>
									<div class="status"></div>
								</div>
							</li>
							 -->
							<?while($row = mysqli_fetch_array($result)){

							$reg_dm = date("Y-m-d",$row["signdate"]);
							if($row["re_content"]){
								$re_content_ment="답변완료";
								$class_ment=" comp";
							}else{
								$re_content_ment="답변대기";
								$class_ment="";
							}

							if($row["lock_view"]=="Y"){
								$class_ment_lock="lock";
								$link_ment="counseling_password.php?uid=".$row["uid"]."&code=".$code."&num=".$article_num;

							}else{
								$class_ment_lock="";
								$link_ment="counseling_view.php?uid=".$row["uid"]."&code=".$code."&num=".$article_num;

							}


							?>
							<li>
								<div class="num"><?=$article_num?></div>
								<a class="title <?=$class_ment_lock?>" href="<?=$link_ment?>"><span><span><?=$row["title"]?></span></span></a>
								<div class="name"><?=$row["name"]?></div>
								<div class="vd">
									<div class="view"><?=$row["hit"]?> views</div>
									<div class="date"><?=$reg_dm?></div>
									<div class="status <?=$class_ment?>"><span><span><?=$re_content_ment?></span></span></div>
								</div>
							</li>
							<?$article_num--;}?>

						</ul>
						<!-- //D: 일반게시물 -->
					</div>
					<div class="paging">

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



									echo "<a class=\"btn prevAll\" href=\"?page=$first_page".$_page_url."\">맨 처음페이지로</a>";
									echo "<a class=\"btn prev\" href=\"?page=$p_page".$_page_url."\">이전 리스트 페이지</a>";


									for($direct_page = $first_page+1; $direct_page <= $last_page; $direct_page++) {
									   if($page == $direct_page) {
										  echo "<a href=\"?page=".$direct_page.$_page_url."\" class=\"on\">".$direct_page."</a>";

									   } else {

										  echo "<a href=\"?page=".$direct_page.$_page_url."\">".$direct_page."</a>";
									   }
									}
									$n_page = $page+1;
									if($n_page > $total_page) $n_page = $n_page-1;
									$end_page = $last_page+1;
									if($end_page > $total_page) $end_page = $end_page-1;

									echo "<a class=\"btn next\" href=\"?page=$n_page".$_page_url."\">다음 리스트 페이지</a>";


									echo "<a class=\"btn nextAll\" href=\"?page=$end_page".$_page_url."\">맨 마지막페이지로</a>";

									?>
	<!--
						<a class="btn prevAll" href="javascript:;">맨 처음페이지로</a>
						<a class="btn prev" href="javascript:;">이전 리스트 페이지</a>
						<a href="javascript:;" class="on">1</a>
						<a href="javascript:;">2</a>
						<a href="javascript:;">3</a>
						<a href="javascript:;">4</a>
						<a href="javascript:;">5</a>
						 D: pc에서는 페이징 max 10개, 모바일에서는 5개
						<a href="javascript:;">6</a>
						<a href="javascript:;">7</a>
						<a href="javascript:;">8</a>
						<a href="javascript:;">9</a>
						<a href="javascript:;">10</a>

						<a class="btn next" href="javascript:;">다음 리스트 페이지</a>
						<a class="btn nextAll" href="javascript:;">맨 마지막페이지로</a>-->
					</div>
				</div>
			</div>
		</div>
	</div>
	</div>
	</div>
	<div id="btnContact"><a href="../contact.php"><span>Request Projects &amp; Operation</span></a></div>
	<a href="javascript:goTop();" id="btnTop">TOP</a>
<?
include_once $_SERVER['DOCUMENT_ROOT']."/inc/contents_footer.php";
?>