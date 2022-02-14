<?
include_once $_SERVER['DOCUMENT_ROOT']."/inc/contents_header.php";
?>
<div id="container" class="subContainer">
<div class="subIntro">
	<h2>Who We Are</h2>
	<div class="h2Cont"><div>오랜 업력을 가진 에이전시는 많습니다.</div><div>오랜 경력을 가진 인재가 있는 에이전시는 많지 않습니다.</div></div>
</div>
<div class="subVisual">
	<img class="svp" src="../resources/images/sv1.jpg" alt="KACELAB visual image" />
	<img class="svm" src="../resources/images/sv1m.jpg" alt="KACELAB visual image" />
</div>
<div class="subContent">
	<div class="sub01">
		<div class="inner">
			<h2>What We Do</h2>
			<div class="h2Cont">
				<div>오랜 경력 속에서 프로젝트의 <span>실패와 성공의 수많은 경험을 통해 </span></div>
				<div>정확한 인사이트를 도출하여 <span>고객의 비즈니스에 맞는 </span>최적화된 솔루션을 제공합니다.</div>
				<div class="cont pc">KACELAB은 오랜 경력의 파트별 전문가들이 모여 운영, 프로젝트, 마케팅, 컨설팅까지 <div>나의 비즈니스처럼 디테일하게 분석하고 스마트하게 완성합니다.</div></div>
				<div class="cont mo">KACELAB은 오랜 경력의 파트별 전문가들이 모여 <div>운영, 프로젝트, 마케팅, 컨설팅까지 나의 비즈니스처럼 </div>디테일하게 분석하고 스마트하게 완성합니다.</div></div>
			</div>
			<div class="smartWrap">
				<ul class="smart">
					<li><div><div>Analytics<div>&amp; Strategy</div></div></div></li>
					<li><div><div>Contents<div>&amp; Marketing</div></div></div></li>
					<li><div><div>UX/UI<div>웹표준</div>웹접근성</div></div></li>
					<li><div><div>Creative<div>Design</div></div></div></li>
					<li><div><div>IT 컨설팅<div>Management</div></div></div></li>
					<li><div><div>Research<div>&amp; Development</div></div></div></li>
				</ul>
				<script>
					$(document).ready(function(){
						$(window).resize(function(){
							var _wd = $(".sub01 .smart li:first-child").children("div").width();
							$(".sub01 .smart li").children("div").each(function(){
								$(this).css("height",_wd);
							});
						});
						$(window).resize();
					});
				</script>
			</div>
		</div>
		<div class="msWrap">
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
								<a href="../work.php" class="goLink">Work 살펴보기</a>
							</div>
						</div>
					</div>
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