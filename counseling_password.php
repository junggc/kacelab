<?php include_once $_SERVER['DOCUMENT_ROOT']."/inc/contents_header2.php";

			if($_GET["mode"]=="modify"){
				$mode="modify";
			}else{
				$mode="pass";
			}

			$action ="";

			if($mode=="modify"){
				$action="counseling_modify.php";
			}else{
				$action="counseling_view.php";
			}

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
			<form name="pass_form" method="post" action="<?=$action?>" >
			<input type="hidden" name="code" value="<?=$_GET["code"]?>" />
			<input type="hidden" name="uid" value="<?=$_GET["uid"]?>" />
			<input type="hidden" name="num" value="<?=$_GET["num"]?>" />
			
			<input type="hidden" name="mode" value="<?=$mode?>" />
			<div class="subContent">
				<div class="board">
					<div class="ep">
						<div class="boardArea">
							<div class="enterPw">
								<h3>비밀번호를 입력해주세요.</h3>
								<input type="password" name="password"/>
							</div>
							<div class="btnArea">
								<a href="javascript:check_form();">확인</a>
								<a href="counseling.html">목록으로</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			</form>
		</div>
	</div>
	<div id="btnContact"><a href="../contact.php"><span>Request Projects &amp; Operation</span></a></div>
	<a href="javascript:goTop();" id="btnTop">TOP</a>
<script>
	function check_form(){
		if(document.pass_form.password.value==""){
			alert("비밀번호를 입력하여 주세요");
			document.pass_form.password.focus();
			return;
		}

		document.pass_form.submit();
	}
</script>
<?php include_once $_SERVER['DOCUMENT_ROOT']."/inc/contents_footer.php";?>  

