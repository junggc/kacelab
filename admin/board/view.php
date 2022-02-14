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
				$sub_page_code="board_view";

				include("../inc/menu.php");
				
				if($_GET["uid"]){
					$mode="modify";
					

					$sql = "SELECT * FROM jboard WHERE code='".$_GET["code"]."' and uid= '".$_GET["uid"]."'";
					$result = mysqli_query($dbconn,$sql);
					$row = mysqli_fetch_array($result);

					$reg_dm = date("Y-m-d H:i",$row["signdate"]);
					
					if($row["re_content"]){
						$ment="수정";
					}else{
						$ment="등록";
					}
				}

				?>
			<!— start: page —>
				<div class="row">
						<div class="col-md-12">
							
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
									<div class="panel-body">


									<table class="table  table-no-more table-bordered  mb-none">
											<tr>
												<td style="width: 20%;background-color:#CCCCCC" class="pt-sm pb-sm">
													작성자
												</td>
												<td style="width: 30%" class="pt-sm pb-sm">
													<?=$row["name"]?>
												</td>
												<td style="width: 20%;background-color:#CCCCCC" class="pt-sm pb-sm">
													등록일
												</td>
												<td style="width: 30%" class="pt-sm pb-sm">
													<?=$reg_dm?>
												</td>
											</tr>
											<?if($code=="qna"){?>
											<tr>
												<td style="background-color:#CCCCCC" >비밀글 여부</td>
												<td style="" colspan="3" >
													<?if($row["lock_view"]=="Y"){?>
														비밀글입니다.
													<?}?>	
												</td>
											</tr>
											<tr>
												<td style="background-color:#CCCCCC" >작성자 연락처</td>
												<td style="" colspan="3" >
													<?=$row["tel"]?>	
												</td>
											</tr>
											<?}?>
											<tr>
												<td style="background-color:#CCCCCC" ><?if($code=="qna"){?>제목<?}else{?>프로젝트 및 운영사이트명<?}?></td>
												<td style="" colspan="3" >
													<?=$row["title"]?>
												</td>
											</tr>

											<?if($code=="project"){?>
											<tr>
												<td style="background-color:#CCCCCC" class="pt-sm pb-sm">프로젝트 분야</td>
												<td class="pt-sm pb-sm"><?=$row["etc1"]?></td>
												<td style="background-color:#CCCCCC" class="pt-sm pb-sm">의뢰범위</td>
												<td class="pt-sm pb-sm"><?=$row["etc2"]?></td>
											</tr>
											
											<tr>
												<td style="background-color:#CCCCCC" class="pt-sm pb-sm">소속업체</td>
												<td class="pt-sm pb-sm"><?=$row["etc3"]?></td>
												<td style="background-color:#CCCCCC" class="pt-sm pb-sm">직위</td>
												<td class="pt-sm pb-sm"><?=$row["etc4"]?></td>
											</tr>
											<tr>
												<td style="background-color:#CCCCCC" class="pt-sm pb-sm">연락처</td>
												<td class="pt-sm pb-sm"><?=$row["tel"]?></td>
												<td style="background-color:#CCCCCC" class="pt-sm pb-sm">이메일</td>
												<td class="pt-sm pb-sm"><?=$row["email"]?></td>
											</tr>
											

											<?}?>
											<?if($row["filename1"]){?>
											<tr>
												<td style="background-color:#CCCCCC" >첨부파일</td>
												<td style="" colspan="3" >
													<a href="../../upfile/<?=$row["filename1"]?>" target="_blank"><?=$row["filename1_real"]?></a>
												</td>
											</tr>

											<?}?>
											<?if($row["filename2"]){?>
											<tr>
												<td style="background-color:#CCCCCC" >첨부파일</td>
												<td style="" colspan="3" >
													<a href="../../upfile/<?=$row["filename2"]?>" target="_blank"><?=$row["filename2_real"]?></a>
												</td>
											</tr>

											<?}?>
											<?if($row["filename3"]){?>
											<tr>
												<td style="background-color:#CCCCCC" >첨부파일</td>
												<td style="" colspan="3" >
													<a href="../../upfile/<?=$row["filename3"]?>" target="_blank"><?=$row["filename3_real"]?></a>
												</td>
											</tr>

											<?}?>
											<?if($row["filename4"]){?>
											<tr>
												<td style="background-color:#CCCCCC" >첨부파일</td>
												<td style="" colspan="3" >
													<a href="../../upfile/<?=$row["filename4"]?>" target="_blank"><?=$row["filename4_real"]?></a>
												</td>
											</tr>

											<?}?>

											<tr>
												<td style="background-color:#CCCCCC" >내용</td>
												<td style="" colspan="3" >
													<?=nl2br($row["content"])?>
												</td>
											</tr>

											<?if($code=="qna"){?>
											<form name="reple_form" method="post" action="re_content.php" enctype='multipart/form-data'/>
											<input type="hidden" name="uid" value="<?=$_GET["uid"]?>" />
											<input type="hidden" name="code" value="<?=$_GET["code"]?>" />

											<tr>
												<td style="background-color:#CCCCCC" >답변제목</td>
												<td style="" colspan="3" >
													<input type="text" class="form-control" name="re_content_title" value="<?=$row["re_content_title"]?>" >
												</td>
											</tr>
											<tr>
												<td style="background-color:#CCCCCC" >답변내용</td>
												<td style="" colspan="3" >
													<textarea class="form-control" id="ir1"  style="height:300px"  name="re_content" ><?=$row["re_content"]?></textarea>
												</td>
											</tr>
											<tr>
												<td style="background-color:#CCCCCC" >첨부파일</td>
												<td style="" colspan="3" >
													<input type="file" name="re_filename1"   class="in05" ><?if($row["re_filename1"]){?><?=$row["re_filename1_real"]?><?}?>
												</td>
											</tr>
											</form>
											<?}?>


									</table>


											
									</div>

									<footer class="panel-footer">
										<div class="row">
											<div class="col-sm-12 text-center">
												<?if($code=="qna"){?>
													<a href="javascript:reg_ok()"><span class="btn btn-primary"><?=$ment?>하기</span></a>
													<a href="list.php?code=<?=$_GET["code"]?>"> <span class="btn btn-danger">취소하기</span></a>
												<?}else{?>
													<a href="list.php?code=<?=$_GET["code"]?>"> <span class="btn btn-danger">목록</span></a>
												<?}?>
											</div>
										</div>
									</footer>


								</section>
							</form>
						</div>
					</div>
			<!— end: page —>

<?include("../inc/bottom.php");?>


<script type="text/javascript" src="../../se2/js/HuskyEZCreator.js" charset="utf-8"></script>
<script type="text/javascript">

var oEditors = [];

nhn.husky.EZCreator.createInIFrame({

    oAppRef: oEditors,

    elPlaceHolder: "ir1",

    sSkinURI: "../../se2/SmartEditor2Skin.html",

      fCreator: "createSEditor2",
            htParams :
            { 
                      fOnBeforeUnload : function()
                      { 
                      }
            } 


});

</script>

<script>
	function reg_ok(){
		
		var form = document.reple_form;

		if(form.re_content_title.value==""){
			alert("답변제목을 입력하여 주세요");
			form.re_content_title.focus();
			return;
		}
		
		oEditors.getById["ir1"].exec("UPDATE_CONTENTS_FIELD", []);

			if( document.getElementById("ir1").value==""){
				alert("답변내용을 입력하여 주세요");
				return;
			}
		  document.reple_form.submit();   
		}


</script>