<?php include_once $_SERVER['DOCUMENT_ROOT']."/inc/contents_header2.php";
	
	if($_POST["mode"]=="pass"){
		$code = $_POST["code"];
		$uid = $_POST["uid"];
		$password = $_POST["password"];

	}else{
		$code = $_GET["code"];
		$uid = $_GET["uid"];

		$pass_ok=true;

	}

	$sql ="SELECT * FROM jboard where code='".$code."' and uid = '".$uid."'";
	$result = mysqli_query($dbconn,$sql);
	$row = mysqli_fetch_array($result);

	$class_ment_lock="";
	if($row["lock_view"]=="Y"){

		$class_ment_lock="lock";

		$password = mysqli_real_escape_string($dbconn,base64_encode(hash('sha256', $_POST["password"], true)));

		if($row["passwd"]==$password){
			$pass_ok=true;
		}else{
			$pass_ok=false;
		}

	}

	if($row["re_content"]){
		$re_content_ment="답변완료";
		$class_ment=" comp";
	}else{
		$re_content_ment="답변대기";
		$class_ment="";
	}

	if($pass_ok!=true){
		?>
			<script>
				alert("비밀번호가 정확하지 않습니다.");
				location.href="counseling.php";
			</script>
		<?
		exit;
	}
	// 게시물의 가상번호(게시물의 개수에 따른 일련번호)
	$article_num = $total_record - $num_per_page*($page-1);
	$_page_url = "&code=".$code;
	

	$upsql = "update jboard set hit=hit+1 where uid='".$uid."'";
	mysqli_query($dbconn,$upsql);



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
						<div class="boardArea">
							<dl class="viewWrap">
								<dt>
									<div class="list">
										<ul>
											<li>
												<div class="num"><?=$_GET["num"]?></div>
												<div class="title <?=$class_ment_lock?>"><span><span><?=$row["title"]?></span></span></div><!-- D: 비밀글 class="lock" -->
												<div class="name"><?=$row["name"]?></div>
												<div class="vd">
													<div class="view"><?=$row["hit"]?> views</div>
													<div class="date"><?=date("Y-m-d",$row["signdate"])?></div>
													<div class="status <?=$class_ment?>"><span><span><?=$re_content_ment?></span></span></div><!-- D: 답변완료 class="comp" -->
												</div>
											</li>
										</ul>
									</div>
								</dt>
								<dd>
									 <div class="viewCont">
										<?=nl2br($row["content"])?>
									 </div>
									 <?if($row["filename1"]){?>
									 <div class="attach">
										<ul>
											<li><a href="../inc/download.php?filename_o=<?=$row["filename1_real"]?>&filename=<?=$row["filename1"]?>"><?=$row["filename1_real"]?></a></li>
										</ul>
									</div>
									<?}?>

									<?if($row["re_content"]){?>
									<dl class="reply">
										<dt><span>답변</span><?=$row["re_content_title"]?></dt>
										<dd>
											<?=nl2br($row["re_content"])?>
										</dd>
									</dl>
									<?if($row["re_filename1"]){?>
										<div class="attach">
										<ul>
											<li><a href="../inc/download.php?filename_o=<?=urlencode($row["re_filename1_real"])?>&filename=<?=$row["re_filename1"]?>"><?=$row["re_filename1_real"]?></a></li>
						
										</ul>
									</div>
									<?}?>
									<?}?>
								</dd>
							</dl>
							<div class="btnArea">
								<?if(!$row["re_content"]){?>
								<a href="counseling_password.php?uid=<?=$uid?>&code=qna&num=<?=$_GET["num"]?>&mode=modify">수정하기</a>
								<?}?>
								<a href="counseling.php">목록으로</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div id="btnContact"><a href="../contact.php"><span>Request Projects &amp; Operation</span></a></div>
	<a href="javascript:goTop();" id="btnTop">TOP</a>
<?php include_once $_SERVER['DOCUMENT_ROOT']."/inc/contents_footer.php";?>  
