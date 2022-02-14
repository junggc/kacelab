<?php include_once $_SERVER['DOCUMENT_ROOT']."/inc/contents_header2.php";?>

 <style>                                         
	#file1 { width:0; height:0; } 
	#file2 { width:0; height:0; } 
	#file3 { width:0; height:0; } 
</style>
		<div id="container" class="subContainer">
			<div class="subIntro">
				<h2>Career</h2>
				<div class="h2Cont"><div>KACELAB의 탄생은 실력있는 IT경력자가 </div><div>오랫동안 일 할 수 있는 환경을 제공하자는 고민에서 출발했습니다.</div></div>
			</div>
			<div class="subVisual">
				<img class="svp" src="../resources/images/sv6.jpg" alt="KACELAB visual image" />
				<img class="svm" src="../resources/images/sv6m.jpg" alt="KACELAB visual image" />
			</div>
			<div class="subContent">
				<div class="sub01 sub06">
					<div class="inner">
						<h2>Work with us</h2>
						<div class="h2Cont">
							<div>케이스랩은 지속 가능한 교류와 커뮤니케이션을 통해</div>
							<div>일하고 싶은 사람이 일할 수 있는 구조를 만드는 선순환 구조를 채택하고 지향합니다.</div>
							<div class="cont pc">KACELAB의 탄생은 실력있는 IT경력자가 오랫동안 일 할 수 있는 환경을 제공하자는 고민에서 출발했습니다. <div>케이스랩의 분야별 경력자 그룹은 실력있는 워킹맘, 워킹대디와 경력단절자들에게 </div>차별없이 동등한 회사의 혜택과 복지를 제공합니다.</div>
							<div class="cont mo">KACELAB의 탄생은 실력있는 IT경력자가 오랫동안 <div>일 할 수 있는 환경을 제공하자는 고민에서 출발했습니다. </div>케이스랩의 분야별 경력자 그룹은 <div>실력있는 워킹맘, 워킹대디와 경력단절자들에게 </div>차별없이 동등한 회사의 혜택과 복지를 제공합니다.</div>
						</div>
						<div class="career abClear">
							<dl class="abClear">
								<dt><div>근무조건</div></dt>
								<dd>
									<ul>
										<li>주5일근무 / 정규직 / 연봉제</li>
										<li>9시 ~ 18시 근무</li>
										<li>오전 오후 워킹맘 / 워킹대디 재택근무 병행</li>
									</ul>
								</dd>
							</dl>
							<dl class="abClear">
								<dt><div>복리후생</div></dt>
								<dd>
									<ul>
										<li>연차휴가 / 4대보험</li>
										<li>자기계발비 지원(도서비, 컨퍼런스 등)</li>
										<li>생일 지원 / 휴가 지원 / 복지카드 지원</li>
										<li>분기 성과금 지급</li>
									</ul>
								</dd>
							</dl>
						</div>
					</div>
					<div class="careerBtm abClear">
						<div class="cb cb1">
							<h3>Work with Us!</h3>
							<dl>
								<dt>자신만의 이력서를 올려주세요. (양식 구분 없음)</dt>
								<dd>인재는 인재가 알아보는 법!!</dd>
							</dl>
							<dl>
								<dt>워킹맘 / 워킹대디 환영!!</dt>
								<dd>(대표님이 워킹맘이라는 사실 안비밀^^)</dd>
							</dl>
							<dl>
								<dt>팀에 살고 팀에 죽는다!!</dt>
								<dd>우린 팀으로 움직입니다. 케이스랩은 회사지만 팀으로 일합니다.</dd>
							</dl>
							<div class="cbimg"><img class="svp" src="../resources/images/img_career1.png" alt="KACELAB visual image" /></div>
						</div>

						<form name="attach_form" method="post" action="career_proc.php" enctype='multipart/form-data' >
							<input type="hidden" name="title" value="기획자 모집" >
							<input type="hidden" name="code" value="career" >
						<div class="cb cb2">
							<dl>
								<dt>책임감 있고 디테일한 기획자를 모집합니다.</dt>
								<dd>
									<div class="cont">
										<div>기획이 좋아서 시작했으나 내가 기획자인지 오퍼레이터인지 구분이 안가 제대로 배우고 일하고 싶은 신입부터 </div>
										<div>열정과 자부심으로 회사에 몸바쳐 일했지만 그만큼 인정과 대우를 못받는 경력자까지 </div>
										<div>케이스랩의 멤버가 되실 분을 발굴하겠습니다.</div>
									</div>
									<div class="attach" id="attach1"><!-- D: 첨부파일없을때 --></div>
									<div class="btnArea">
										<button type="button" id="btn-upload">이력서 첨부하기</button>
										<input type='file' id='file1' name='upfile1' />
										<button type="submit" style="display:none;" onclick="check_form()" id="submit_1">보내기</button><!-- D: 첨부파일없을때 -->

									</div>
									<div id="attach_1_text">

										<input type="hidden" name="attach_1_total" id="attach_1_total" value="">
										<input type="hidden" name="attach_1_count" id="attach_1_count" value="">
									</div>
								</dd>
							</dl>
						</form>
						<form name="attach_form2" method="post" action="career_proc.php" enctype='multipart/form-data' >
							<input type="hidden" name="title" value="개발자 모집" >
							<input type="hidden" name="code" value="career" >
							<dl>
								<dt>케이스랩을 이끌어갈 경력 개발자를 모집합니다.</dt>
								<dd>
									<div class="cont">
										<div>케이스랩 개발팀을 이끌어갈 실력과 겸손, 소통 능력을 갖춘 전문 개발자를 모십니다.</div>
										<div class="mo">실력과 책임감만 있으시다면 워킹맘 / 워킹대디 환영합니다.</div>
									</div>
									<div class="attach" id="attach2"></div>
									<div class="btnArea">
										<button type="button" id="btn-upload2">이력서 첨부하기</button>
										<input type='file' id='file2' name='upfile1' />
										<button type="submit" style="display:none;" id="submit_2">보내기</button>
									</div>

									<div id="attach_2_text">

										<input type="hidden" name="attach_2_total" id="attach_2_total" value="">
										<input type="hidden" name="attach_2_count" id="attach_2_count" value="">
									</div>
								</dd>
							</dl>
						</form>
						<form name="attach_form3" method="post" action="career_proc.php" enctype='multipart/form-data' >
							<input type="hidden" name="title" value="디자이너 모집" >
							<input type="hidden" name="code" value="career" >

							<dl>
								<dt>즐겁게 일하고 싶은 센스있는 디자이너를 모집합니다.</dt>
								<dd>
									<div class="cont">
										<div>함께 호흡 맞춰 즐겁게 일할 수 있는 디자이너를 모집합니다.</div>
										<div class="mo">신입부터 경력 3년차까지 지원 가능합니다. </div>
									</div>
									<div class="attach" id="attach3">
									</div>
									<div class="btnArea">
										<button type="button" id="btn-upload3">이력서 첨부하기</button>
										<input type='file' id='file3' name='upfile1' />
										<button type="submit" style="display:none;"  id="submit_3">보내기</button>
									</div>
									<div id="attach_3_text">

										<input type="hidden" name="attach_3_total" id="attach_3_total" value="">
										<input type="hidden" name="attach_3_count" id="attach_3_count" value="">
									</div>
								</dd>
							</dl>
						</div>

						</form>

					</div>
				</div>
			</div>
		</div>
	</div>
	<div id="btnContact"><a href="../contents/sub0501.html"><span>Request Projects &amp; Operation</span></a></div>
	<a href="javascript:goTop();" id="btnTop">TOP</a>
<script>
	$(function(){          
		$('#btn-upload').click(function(e){
			e.preventDefault();             
			$("#file1").click();
		$("#file1").val().toLowerCase();

		$('#file1').trigger('onchange');
	});   
	
	$('#file1').change(function(e){
			//파일들을 변수에 넣고
			 var files = e.target.files;
			 var total = $("#attach_1_total").val();
			 total = (total * 1);
			
			
			 if(total>3){
				alert("4개이상 등록불가능합니다.");
				return false;
			 }

			 
			 //post방식으로 보내야하기 때문에 form을 생성해줍니다.
			 var data = new FormData();
			 
			 //만약 input에 multiple 속성을 추가한다면, 파일을 여러개 선택할 수 있는데, 저는 일단 1개로
			 //그 때의 파일을 배열로 만들어 주기 위한 작업입니다.
			 $.each(files, function(key, value)
			 {
			  //key는 다른 지정이 없다면 0부터 시작 할것이고, value는 파일 관련 정보입니다.
			  data.append(key, value);
			 });

			 
			  $.ajax({
					  url: './contents/file_up.php?files', //file을 저장할 소스 주소입니다.
					 type: 'POST',
					 data: data, //위에서 가공한 data를 전송합니다.
					 cache: false,
					 dataType: 'json',
					 processData: false, 
					 contentType: false, 
					 success: function(data, textStatus, jqXHR)
					 {

					  if(typeof data.error === 'undefined') //에러가 없다면
					  {
					   //저장된 파일의 정보를 통해 위에서 선언한 img_section이란 곳에 추가 할 코드입니다. 

					   total = total+1;
					 
						var coup=$("#attach_1_count").val(); 
					   coup = (coup*1)+1;
					   $("#attach_1_count").val(coup); 
					   var source = "<ul id='upfile1_ul_"+coup+"'><li><a href=\"javascript:del_attach('"+coup+"');\">"+data.files_name+"</a></li></ul>";
					  
					   $("#attach1").append(source);
					   $("#attach_1_total").val(total); 
					    $("#submit_1").show();
					   
					   $("#attach_1_text").append("<input type='hidden' name='upfile_1[]' id='upfile1_"+coup+"' value='"+data.new_filename+"|"+data.files_name+"'>");

					  
					  }
					  else//에러가 있다면
					  {
						alert(data.error);
					   console.log('ERRORS: ' + data.error);
					  }
					 },
					 error: function(jqXHR, textStatus, errorThrown)
					 {
					  console.log('ERRORS: ' + textStatus);
					 }
				 });

	});
});  

$(function(){          
		$('#btn-upload2').click(function(e){
					e.preventDefault();             
			$("#file2").click();
		$("#file2").val().toLowerCase();

		$('#file2').trigger('onchange');
	}); 
	
	$('#file2').change(function(e){
		//파일들을 변수에 넣고
			 var files = e.target.files;
			 var total = $("#attach_2_total").val();
			 total = (total * 1);
			
			
			 if(total>3){
				alert("4개이상 등록불가능합니다.");
				return false;
			 }

			 
			 //post방식으로 보내야하기 때문에 form을 생성해줍니다.
			 var data = new FormData();
			 
			 //만약 input에 multiple 속성을 추가한다면, 파일을 여러개 선택할 수 있는데, 저는 일단 1개로
			 //그 때의 파일을 배열로 만들어 주기 위한 작업입니다.
			 $.each(files, function(key, value)
			 {
			  //key는 다른 지정이 없다면 0부터 시작 할것이고, value는 파일 관련 정보입니다.
			  data.append(key, value);
			 });

			 
			  $.ajax({
					  url: './contents/file_up.php?files', //file을 저장할 소스 주소입니다.
					 type: 'POST',
					 data: data, //위에서 가공한 data를 전송합니다.
					 cache: false,
					 dataType: 'json',
					 processData: false, 
					 contentType: false, 
					 success: function(data, textStatus, jqXHR)
					 {

					  if(typeof data.error === 'undefined') //에러가 없다면
					  {
					   //저장된 파일의 정보를 통해 위에서 선언한 img_section이란 곳에 추가 할 코드입니다. 

					   total = total+1;
					 
						var coup=$("#attach_2_count").val(); 
					   coup = (coup*1)+1;
					   $("#attach_2_count").val(coup); 
					   var source = "<ul id='upfile2_ul_"+coup+"'><li><a href=\"javascript:del_attach2('"+coup+"');\">"+data.files_name+"</a></li></ul>";
					  
					   $("#attach2").append(source);
					   $("#attach_2_total").val(total); 
					    $("#submit_2").show();
					   
					   $("#attach_2_text").append("<input type='hidden' name='upfile_1[]' id='upfile2_"+coup+"' value='"+data.new_filename+"|"+data.files_name+"'>");

					  
					  }
					  else//에러가 있다면
					  {
						alert(data.error);
					   console.log('ERRORS: ' + data.error);
					  }
					 },
					 error: function(jqXHR, textStatus, errorThrown)
					 {
					  console.log('ERRORS: ' + textStatus);
					 }
				 });
	});
});  


$(function(){          
		$('#btn-upload3').click(function(e){
			e.preventDefault();             
			$("#file3").click();
			$("#file3").val().toLowerCase();

			$('#file3').trigger('onchange');
	});  
	
	$('#file3').change(function(e){
		//파일들을 변수에 넣고
			 var files = e.target.files;
			 var total = $("#attach_3_total").val();
			 total = (total * 1);
			
			
			 if(total>3){
				alert("4개이상 등록불가능합니다.");
				return false;
			 }

			 
			 //post방식으로 보내야하기 때문에 form을 생성해줍니다.
			 var data = new FormData();
			 
			 //만약 input에 multiple 속성을 추가한다면, 파일을 여러개 선택할 수 있는데, 저는 일단 1개로
			 //그 때의 파일을 배열로 만들어 주기 위한 작업입니다.
			 $.each(files, function(key, value)
			 {
			  //key는 다른 지정이 없다면 0부터 시작 할것이고, value는 파일 관련 정보입니다.
			  data.append(key, value);
			 });

			 
			  $.ajax({
					 url: './contents/file_up.php?files', //file을 저장할 소스 주소입니다.
					 type: 'POST',
					 data: data, //위에서 가공한 data를 전송합니다.
					 cache: false,
					 dataType: 'json',
					 processData: false, 
					 contentType: false, 
					 success: function(data, textStatus, jqXHR)
					 {

					  if(typeof data.error === 'undefined') //에러가 없다면
					  {
					   //저장된 파일의 정보를 통해 위에서 선언한 img_section이란 곳에 추가 할 코드입니다. 

					   total = total+1;
					 
						var coup=$("#attach_3_count").val(); 
					   coup = (coup*1)+1;
					   $("#attach_3_count").val(coup); 
					   var source = "<ul id='upfile3_ul_"+coup+"'><li><a href=\"javascript:del_attach3('"+coup+"');\">"+data.files_name+"</a></li></ul>";
					  
					   $("#attach3").append(source);
					   $("#attach_3_total").val(total); 
					    $("#submit_3").show();
					   
					   $("#attach_3_text").append("<input type='hidden' name='upfile_1[]' id='upfile3_"+coup+"' value='"+data.new_filename+"|"+data.files_name+"'>");

					  
					  }
					  else//에러가 있다면
					  {
						alert(data.error);
					   console.log('ERRORS: ' + data.error);
					  }
					 },
					 error: function(jqXHR, textStatus, errorThrown)
					 {
					  console.log('ERRORS: ' + textStatus);
					 }
				 });
	});

});  

function del_attach(num){
	$("#upfile1_"+num).val("");
	 var total = $("#attach_1_total").val();
	total = (total * 1);

	total = total-1;
	$("#attach_1_total").val(total); 
	$("#upfile1_ul_"+num).remove();
}

function del_attach2(num){
	$("#upfile2_"+num).val("");
	 var total = $("#attach_2_total").val();
	total = (total * 1);

	total = total-1;
	$("#attach_2_total").val(total); 
	$("#upfile2_ul_"+num).remove();
}

function del_attach3(num){
	$("#upfile3_"+num).val("");
	 var total = $("#attach_3_total").val();
	total = (total * 1);

	total = total-1;
	$("#attach_3_total").val(total); 
	$("#upfile3_ul_"+num).remove();
}
</script>
	<?php include_once $_SERVER['DOCUMENT_ROOT']."/inc/contents_footer.php";?>  
