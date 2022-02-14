<?
include("../inc/contents_header.php");
?>
	<div id="container" class="subContainer">
		<div class="subIntro">
			<h2>Work</h2>
			<div class="h2Cont"><div>KACELAB은 오랜 경력의 파트별 전문가들이 모여 운영, 프로젝트, 마케팅, 컨설팅까지 </div><div>나의 비즈니스처럼 디테일하게 분석하고 스마트하게 완성합니다.</div></div>
		</div>
		<div class="subContent">
			<div class="work">
				<ul class="abClear">
					<?
					$sql = "select * from TB_project where 1=1  and use_yn='Y'  order by sort_num asc,idx desc";
					$result= mysqli_query($dbconn,$sql);
					?>
					<?while($row = mysqli_fetch_array($result)){?>
					<li><a href="project_view.php?idx=<?php echo $row['idx']?>"><img src="/upfile/<?php echo $row['list_file']?>"><span class="hoverWrap"><span><span><?php echo $row['name_en']?></span><span>프로젝트 보기</span></span></span></a></li>
					<?}?>

				</ul>
			</div>
		</div>
	</div>
</div>
	<div id="btnContact"><a href="../contents/sub0501.html"><span>Request Projects &amp; Operation</span></a></div>
	<a href="javascript:goTop();" id="btnTop">TOP</a>
<?
include("../inc/contents_footer.php");
?>