<?
include_once $_SERVER['DOCUMENT_ROOT']."/inc/contents_header.php";

$sql = "select * from TB_project where 1=1  and use_yn='Y' and idx = '".$_GET['idx']."'  order by sort_num asc,idx desc";
$result= mysqli_query($dbconn,$sql);
$row = mysqli_fetch_array($result);

$pn_sql = "select
 idx
 from
    TB_project
 where 
  idx IN (
    (select idx as idx from TB_project WHERE idx < '".$_GET['idx']."' and use_yn='Y' order by sort_num asc,idx desc limit 1),
    (select idx as idx from TB_project WHERE idx > '".$_GET['idx']."' and use_yn='Y' order by sort_num asc,idx desc limit 1)
   )";

$pn_result= mysqli_query($dbconn,$pn_sql);

while($pn_row = mysqli_fetch_array($pn_result)){

	if($_GET['idx'] > $pn_row['idx'])
	{
		$p_idx = $pn_row['idx'];
	}
	else
	{
		$n_idx = $pn_row['idx'];
	}
}
?>
<div id="container" class="subContainer sub03">
	<div class="subIntro">
		<h2><?php echo $row['p_date']?></h2>
		<div class="h2Cont">
			<div><?php echo $row['top_title']?></div>
			<div class="cont3"><?php echo $row['name_ko']?></div>
			<?php 
			if($row['bottom_text'])
			{
				$string = rtrim($row['bottom_text']);
				$tag = 'div';
				$string_parts = explode("\n", $string);
				echo $string = '<'.$tag.' class="cont2" >' . implode('</'.$tag.'><'.$tag.' class="cont2" >', $string_parts) . '</'.$tag.'>';
			}			 
			if($row['url'])
            {
			?>
			<div class="cont2"><a href="<?php echo $row['url']?>" target="_blank">사이트 바로가기</a></div>
            <?php }?>
		</div>
	</div>
	<div class="subContent">
		<div class="work view">
			<ul>
				<li><img src="/upfile/<?php echo $row['view_file']?>" alt="KACELAB" /></li>
				<?php if($row['view_file2']){?>
				<li><img src="/upfile/<?php echo $row['view_file2']?>" alt="KACELAB" /></li>
				<?}?>
				<?php if($row['view_file3']){?>
				<li><img src="/upfile/<?php echo $row['view_file3']?>" alt="KACELAB" /></li>
				<?}?>
				<?php if($row['view_file4']){?>
				<li><img src="/upfile/<?php echo $row['view_file4']?>" alt="KACELAB" /></li>
				<?}?>
				<?php if($row['view_file5']){?>
				<li><img src="/upfile/<?php echo $row['view_file5']?>" alt="KACELAB" /></li>
				<?}?>
				<?php if($row['view_file6']){?>
				<li><img src="/upfile/<?php echo $row['view_file6']?>" alt="KACELAB" /></li>
				<?}?>
				<?php if($row['view_file7']){?>
				<li><img src="/upfile/<?php echo $row['view_file7']?>" alt="KACELAB" /></li>
				<?}?>
				<?php if($row['view_file8']){?>
				<li><img src="/upfile/<?php echo $row['view_file8']?>" alt="KACELAB" /></li>
				<?}?>
				<?php if($row['view_file9']){?>
				<li><img src="/upfile/<?php echo $row['view_file9']?>" alt="KACELAB" /></li>
				<?}?>
				<?php if($row['view_file10']){?>
				<li><img src="/upfile/<?php echo $row['view_file10']?>" alt="KACELAB" /></li>
				<?}?>
			</ul>
			<div class="btnArea">
				<!--a class="btn prev" href="javascript:alert('준비중');">Prev</a>-->
				<?php
				if($p_idx)
				{
				?>
				<a class="btn prev" href="./work_view.php?idx=<?php echo $p_idx;?>">Prev</a>
				<?
				}
				?>
				
				<?php
				if($n_idx)
				{
				?>
				<a class="btn next" href="./work_view.php?idx=<?php echo $n_idx;?>">Next</a>
				<?
				}
				?>
				
				<a class="list" href="work.php">All Projects</a>
			</div>
		</div>
	</div>
</div>

</div>
	<div id="btnContact"><a href="../contact.php"><span>Request Projects &amp; Operation</span></a></div>
	<a href="javascript:goTop();" id="btnTop">TOP</a>
<?php include_once $_SERVER['DOCUMENT_ROOT']."/inc/contents_footer.php";?>  