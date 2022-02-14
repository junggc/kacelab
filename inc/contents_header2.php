<?
include_once $_SERVER['DOCUMENT_ROOT']."/inc/dbconn.php";

?>
<!DOCTYPE html>
<html lang="ko">
<head>
 <title>:: KACELAB ::</title>
 <meta charset="UTF-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <meta name="robots" content="all">
 <meta name="keywords" content="" />
 <meta name="description" content="" />
 <meta name="author" content="케이스랩">
 <meta property="og:type" content="website">
 <meta property="og:title" content="케이스랩">
 <meta property="og:description" content="">
 <meta property="og:image" content="http://www.kacelab.com/resources/images/logo.png">
 <meta property="og:url" content="http://www.kacelab.com/">
 <link rel="stylesheet" type="text/css" href="../resources/css/swiper.min.css" />
 <link href="../resources/css/layout.css" rel="stylesheet" type="text/css">
 <link href="../resources/css/fullpage.css" rel="stylesheet" type="text/css">
 <script type="text/javascript" src="../resources/js/jquery-1.12.4.js"></script>
 <script type="text/javascript" src="../resources/js/common.js"></script>
 <script type="text/javascript" src="../resources/js/scrolloverflow.min.js"></script>
 <script type="text/javascript" src="../resources/js/fullpage.min.js"></script>
<!--[if lt IE 9]> 
<div id="browser" style="display:none;"><div class="infobox"><a href="#none" onclick="$('#browser').hide();$.cookie('browser', 'done', {expires:1});" title="브라우저 관련 팝업 닫기" class="brower_close" ><span>닫기</span></a>    <h2>브라우저를 <span>업그레이드</span> 해주세요</h2>        <p>본 사이트는 익스플로러11, 크롬, 파이어폭스 브라우저에 최적화 되어 있습니다. <br />지금 사용하고 계시는 브라우저는 곧 지원이 중단되므로<br />최신 버전으로 업그레이드하시거나 최신 브라우저를 이용해 주세요.</p><ul>	<li class="ie"><a href="http://windows.microsoft.com/ko-kr/internet-explorer/ie-11-worldwide-languages" target="_blank" title="새창이동"><span>인터넷익스플로러11</span></a></li><li class="ff"><a href="http://www.mozilla.or.kr/" target="_blank" title="새창이동"><span>파이어폭스</span></a></li><li class="cr"><a href="https://www.google.com/intl/ko/chrome/browser/" target="_blank" title="새창이동"><span>크롬</span></a></li></ul></div>
</div>
<![endif]-->
</head>
<body>
	<dl id="skiptoContent">
		<dt class="hidden"><strong>바로가기 메뉴</strong></dt>
		<dd><a href="#container" class="accessibility" onclick="document.getElementById('container').tabIndex = -1;document.getElementById('container').focus();return false;">본문내용 바로가기</a></dd>
	</dl>
	<div class="wrap subWrap">
		<div id="pointer"></div>
		<div id="header">
			<div class="headerInner">
				<h1 class="logo">
					<a href="../index.html">케이스랩</a>
				</h1>
				<a href="../index.html" class="sLogo pCenter"><img src="../resources/images/logo2.png" alt="KACELAB" /></a>
				<a href="javascript:void(0);" id="btnMnav"><span>메뉴</span></a>
				<nav id="navigation" class="navigation">
					<div class="inner" >
						<ul id="gnb" class="gnb abClear">
							<li><a href="../who.php"><span><span>Who we are</span></span></a></li>
							<li><a href="../kspm.php"><span><span>KSPM</span></span></a></li>
							<li><a href="../work.php"><span><span>Work</span></span></a></li>
							<li><a href="../counseling.php"><span><span>이바닥 카운셀링</span></span></a></li>
							<li><a href="../contact.php"><span><span>Contact</span></span></a></li>
							<li><a href="../career.php"><span><span>Career</span></span></a></li>
						</ul>
						<div class="copy">
							<ul class="cinfo">
								<li>서울 강남구 삼성로 763, 3층 301호 (청담동, 금탁프라자)</li>
								<li><a href="mailto:canksh@kacelab.com;">canksh@kacelab.com</a></li>
								<li>Mon-Fri: 10:00 AM – 6:00 PM</li>
								<li>TEL : 02-3442-2003</li>
							</ul>
						</div>
					</div>
				</nav>
			</div>
		</div>