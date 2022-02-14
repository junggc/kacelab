<?php include_once $_SERVER['DOCUMENT_ROOT']."/inc/contents_header2.php";?>
<div id="container" class="mainContainer">
	<div class="mainVisual">
		<div class="btnAreaMc">
			<a href="#ms1"><span>Smartical</span>디테일한 분석에서 도출</a>
			<a href="#ms2"><span>Flexible</span>유연성으로 완성하는 창의력</a>
			<a href="#ms3"><span>Considerate</span>고객 입장에서 생각하는 서비스</a>
		</div>
		<div class="contTxt">
			<div><div>분야별 업계 경력 15년 이상</div></div>
			<div><div>프로젝트 전문가그룹</div></div>
			<div><div>K.ACELAB만의 방법론으로</div></div>
			<div><div>접근합니다.</div></div>
		</div>
		<div class="swiper-container">
			<div class="swiper-wrapper">


				<div class="swiper-slide slide1" style="background-color:rgb(46,50,55);">
					<div class="slideCont">
						<div class="centerTxt"><img src="../resources/images/txt_kace.png" alt="KACELAB" /></div>
						<div class="contImg"><img src="../resources/images/mv1.jpg" alt="슬라이드이미지" /></div>
					</div>
				</div>
				<?
				$sql = "select * from TB_portfolio where 1=1  and use_yn='Y'  order by sort_num asc,idx desc";
					$result= mysqli_query($dbconn,$sql);

					$ii=2;
					?>

					<?while($row = mysqli_fetch_array($result)){



					if($row["link_url"]){
						$a_tag ="<a href='".$row["link_url"]."' target='".$row["link_url_target"]."'>프로젝트 보기</a>";

					}else{
						$a_tag ="";


					}

					$rgb_color= explode(",",$row["rgb_color"]);
				?>
				<div class="swiper-slide slide<?=$ii?>" style="background-color:rgb(<?=$rgb_color[0]?>,<?=$rgb_color[1]?>,<?=$rgb_color[2]?>);">
					<div class="slideCont">
						<div class="centerTxt"><?=$row["top_text"]?><div><?=$row["bottom_text"]?></div><?=$a_tag?></div>
						<div class="contImg"><img src="../upfile/<?=$row["upfile1"]?>" alt="슬라이드이미지" /></div>
					</div>
				</div>
				<?
				$ii++;}
				?>
				<!-- <div class="swiper-slide slide2" style="background-color:rgb(24,48,96);">
					<div class="slideCont">
						<div class="centerTxt">소재 산업의 글로벌 선도 기업<div>코오롱머티리얼</div><a href="../contents/sub0301_view_05.html">프로젝트 보기</a></div>
						<div class="contImg"><img src="../resources/images/mv_pro5.jpg" alt="슬라이드이미지" /></div>
					</div>
				</div>

				<div class="swiper-slide slide3" style="background-color:rgb(37,86,153);">
					<div class="slideCont">
						<div class="centerTxt">모든 수입차를 위한 열린 케어 <div>코오롱모빌리티</div><a href="../contents/sub0301_view_04.html">프로젝트 보기</a></div>
						<div class="contImg"><img src="../resources/images/mv_pro4.jpg" alt="슬라이드이미지" /></div>
					</div>
				</div>

				<div class="swiper-slide slide4" style="background-color:rgb(32,31,29);">
					<div class="slideCont">
						<div class="centerTxt">창의적 기업 문화로의 시작 <div>코오롱 사내벤처 K-VENTURES</div><a href="../contents/sub0301_view_03.html">프로젝트 보기</a></div>
						<div class="contImg"><img src="../resources/images/mv_pro3.jpg" alt="슬라이드이미지" /></div>
					</div>
				</div>

				<div class="swiper-slide slide5" style="background-color:rgb(20,24,35);">
					<div class="slideCont">
						<div class="centerTxt">더 나은 미래를 위해 <div>For The Better Future, 4TBF</div><a href="../contents/sub0301_view_02.html">프로젝트 보기</a></div>
						<div class="contImg"><img src="../resources/images/mv_pro2.jpg" alt="슬라이드이미지" /></div>
					</div>
				</div>

				<div class="swiper-slide slide6" style="background-color:rgb(94,162,206);">
					<div class="slideCont">
						<div class="centerTxt">20여년 전통의 오리지널 프로바이오틱스 <div>VSL#3® 쇼핑몰 구축</div><a href="../contents/sub0301_view_01.html">프로젝트 보기</a></div>
						<div class="contImg"><img src="../resources/images/mv_pro1.jpg" alt="슬라이드이미지" /></div>
					</div>
				</div> -->




			</div>
			<div class="swiper-pagination"></div>
		</div>
		<script type="text/javascript" src="../resources/js/swiper.js"></script>
		<script>
			var swiper = new Swiper('.swiper-container', {
			  //direction: 'vertical',
			  effect: 'fade',
			  loop: false,
			  speed: 1000,
			  autoplay: {
				delay: 5000,
				disableOnInteraction: false
			  },
			  /*mousewheel: {
				invert: true,
			  },
			  forceToAxis: true,*/
			  releaseOnEdges: true,
			  pagination: {
				el: '.swiper-pagination',
				type: 'fraction',
			  },
			});
		</script>
		<!--
		<div id="fullpage">
			<div class="section " id="section0">
				<h1>fullPage.js</h1>
				<p>Auto-height sections</p>
				<img src="imgs/fullPage.png" alt="fullPage" />
			</div>
			<div class="section" id="section1">
				<div class="intro">
					<h1>Ideal for footers</h1>
					<p>Or any other section rather than the 1st one</p>
				</div>
			</div>
			<div class="section fp-auto-height" id="section2">
				<div class="myContent">
					<div class="intro footer">
						<h1>My footer</h1>
						<p>This could be my footer.</p>
					</div>
				</div>
			</div>
		</div>
		<script type="text/javascript" src="../resources/js/fullpage.js"></script>
		<link rel="stylesheet" type="text/css" href="../resources/css/fullpage.css" />
		<script type="text/javascript">
		  var myFullpage = new fullpage('#fullpage', {
			  verticalCentered: true,
			  anchors: ['anchor1', 'anchor2', 'anchor3'],
			  menu: '#menu',
			  sectionsColor: ['#1bbc9b', '#4BBFC3', '#7BAABE']
		  });
		</script>
		-->
	</div>





		 <div class="mSection" id="ms1">
			<div class="abClear">
				<div class="msimg"><img src="../resources/images/ms1.jpg" alt="KACELAB visual image" /><h3>Smartical</h3></div>
				<div class="mscont">
					<div class="outer">
						<div class="inner active">
							<h4 class="abFd">디테일한 분석에서 도출</h4>
							<div class="abPr1">기초와 기본이 없는 스마트는 있을 수 없습니다.</div>
							<div class="abPr1">수많은 프로젝트의 경험을 바탕으로</div>
							<div class="abPr1">목적에 맞는 디테일한 분석과 케이스랩만의 방법론을 통해 </div>
							<div class="abPr1">누군가가 모방하고 싶어하는</div>
							<div class="abPr1">최상의 스마트한 프로젝트 결과물을 만들어 냅니다.</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="mSection" id="ms2">
			<div class="abClear">
				<div class="msimg"><img src="../resources/images/ms2.jpg" alt="KACELAB visual image" /><h3>Flexible</h3></div>
				<div class="mscont">
					<div class="outer">
						<div class="inner">
							<h4 class="abFd">유연성으로 완성하는 창의력</h4>
							<div class="abPr2">화려하고 트렌드만 따르는 디자인은 오래가지 못합니다.</div>
							<div class="abPr2">사용자가 편리하게 이용하고 공감할 수 있고, </div>
							<div class="abPr2">비즈니스 연관성을 발견하고 확장성을 고려한 서비스 디자인을 통해</div>
							<div class="abPr2">다양한 환경에서도 유연성 있게 완성되는</div>
							<div class="abPr2">크리에이티브한 디자인을 추구합니다.</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="mSection" id="ms3">
			<div class="abClear">
				<div class="msimg"><img src="../resources/images/ms3.jpg" alt="KACELAB visual image" /><h3>Considerate</h3></div>
				<div class="mscont">
					<div class="outer">
						<div class="inner">
							<h4 class="abFd">고객 입장에서 생각하는 서비스</h4>
							<div class="abPr3">KACELAB에서 진행하는 모든 프로젝트와 운영은</div>
							<div class="abPr3">나의 비즈니스라고 생각하고 임합니다.</div>
							<div class="abPr3">프로젝트와 운영을 하다보면 사업 분야와 목적이 다르기 때문에</div>
							<div class="abPr3">고객사마다 다양한 니즈가 있습니다.</div>
							<div class="abPr3">한 번 맺은 인연을 중요하게 여기는 KACELAB은</div>
							<div class="abPr3">작은 운영 하나라도 겸손하게 고객 입장에서 생각하는 서비스를 추구합니다.</div>
							<a href="../who.php" class="goLink">who we are 바로가기</a>
						</div>
					</div>
				</div>
			</div>
		</div> 
	</div>
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
					<a href="../counseling_write.php">그냥 물어보기</a>
				</div>
			</div>
		</div>
	</div>
	</div>
	</div>
	<div class="fMenu abClear">
	<div class="contact">
	<h3>Request Projects &amp; Operate</h3>
	<div>프로젝트 문의 및 견적 의뢰 시 신속하게 답변드리겠습니다.<div>직접 상담이 필요한 경우 canksh@kacelab.com으로 문의 주십시오.</div></div>
	<a href="../contact.php">프로젝트 문의하기</a>
	</div>
	<div class="recruit">
	<h3>K.ACELAB Career</h3>
	<div>K.ACELAB의 시작은 실력있는 IT경력자가<div>오랫동안 일 할 수 있는 환경을 제공하자는 고민에서 출발했습니다.</div></div>
	<a href="../career.php">채용공고 확인하기</a>
	</div>
	</div>
	<div id="btnContact"><a href="../contact.php"><span>Request Projects &amp; Operation</span></a></div>
	<a href="javascript:goTop();" id="btnTop">TOP</a>

<?php include_once $_SERVER['DOCUMENT_ROOT']."/inc/contents_footer.php";?>  

