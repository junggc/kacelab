<?php include_once $_SERVER['DOCUMENT_ROOT']."/inc/contents_header2.php";?>

 <style>                                         
	#file { width:0; height:0; }                    
</style>



		<div id="container" class="subContainer sub05">
			<div class="subContent">
				<div class="board">
					<div class="boardWrite">
						<div class="subIntro">
							<h2>이바닥 카운셀링</h2>
							<div class="h2Cont">
								<div>무엇이든 물어보세요. <span>케이스랩 분야별 실무자가 답변해드립니다.</span></div>
								<div>공개/비공개 설정할 수 있으며 <span>비공개 글 열람은 작성 시 비밀번호가 필요합니다.</span></div>
							</div>
						</div>
						<div class="cForm">
							<form method="post" action="counseling_proc.php" enctype='multipart/form-data' name="qna_form" onsubmit="return check_form();">
								<input type="hidden" name="code" value="qna" />
								<div class="terms">
									<div class="termsBox">
										<dl>
											<dt>1. 개인정보의 처리 목적 (‘kacelab.com’이하 ‘케이스랩’) 은(는) 다음의 목적을 위하여 개인정보를 처리하고 있으며, 다음의 목적 이외의 용도로는 이용하지 않습니다.</dt>
											<dd>- 고객 가입의사 확인, 고객에 대한 서비스 제공에 따른 본인 식별.인증, 회원자격 유지.관리, 물품 또는 서비스 공급에 따른 금액 결제, 물품 또는 서비스의 공급.배송 등</dd>
										</dl>
										<dl>
											<dt>2. 개인정보의 처리 및 보유 기간</dt>
											<dd>
												① (‘kacelab.com’이하 ‘케이스랩’) 은(는) 정보주체로부터 개인정보를 수집할 때 동의 받은 개인정보 보유․이용기간 또는 법령에 따른 개인정보 보유․이용기간 내에서 개인정보를 처리․보유합니다.<br />
												② 구체적인 개인정보 처리 및 보유 기간은 다음과 같습니다.<br />
												☞ 아래 예시를 참고하여 개인정보 처리업무와 개인정보 처리업무에 대한 보유기간 및 관련 법령, 근거 등을 기재합니다.<br />
												(예시)- 고객 가입 및 관리 : 서비스 이용계약 또는 회원가입 해지시까지, 다만 채권․채무관계 잔존시에는 해당 채권․채무관계 정산시까지<br />
												- 전자상거래에서의 계약․청약철회, 대금결제, 재화 등 공급기록 : 5년
											</dd>
										</dl>
										<dl>
											<dt>3. 개인정보의 제3자 제공에 관한 사항</dt>
											<dd>
												① ('kacelab.com'이하 '케이스랩')은(는) 정보주체의 동의, 법률의 특별한 규정 등 개인정보 보호법 제17조 및 제18조에 해당하는 경우에만 개인정보를 제3자에게 제공합니다.<br />
												② ('kacelab.com')은(는) 다음과 같이 개인정보를 제3자에게 제공하고 있습니다.<br />
												1<br />
												- 개인정보를 제공받는 자 : 케이스랩<br />
												- 제공받는 자의 개인정보 이용목적 : 이메일, 휴대전화번호, 이름, 회사전화번호, 직책, 부서, 회사명, 직업<br />
												- 제공받는 자의 보유.이용기간: 3년
											</dd>
										</dl>
										<dl>
											<dt>4. 정보주체와 법정대리인의 권리·의무 및 그 행사방법 이용자는 개인정보주체로써 다음과 같은 권리를 행사할 수 있습니다.</dt>
											<dd>
												① 정보주체는 케이스랩(‘kacelab.com’이하 ‘케이스랩) 에 대해 언제든지 다음 각 호의 개인정보 보호 관련 권리를 행사할 수 있습니다.<br />
												1. 개인정보 열람요구<br />
												2. 오류 등이 있을 경우 정정 요구<br />
												3. 삭제요구<br />
												4. 처리정지 요구
											</dd>
										</dl>
										<dl>
											<dt>5. 처리하는 개인정보의 항목 작성 </dt>
											<dd>
												① ('kacelab.com'이하 '케이스랩')은(는) 다음의 개인정보 항목을 처리하고 있습니다.<br />
												1<br />
												- 필수항목 : 이메일, 휴대전화번호, 이름, 회사명<br />
												- 선택항목 : 직책, 부서
											</dd>
										</dl>
										<dl>
											<dt>6. 개인정보의 파기('케이스랩')은(는) 원칙적으로 개인정보 처리목적이 달성된 경우에는 지체없이 해당 개인정보를 파기합니다. 파기의 절차, 기한 및 방법은 다음과 같습니다.</dt>
											<dd>
												-파기절차<br />
												이용자가 입력한 정보는 목적 달성 후 별도의 DB에 옮겨져(종이의 경우 별도의 서류) 내부 방침 및 기타 관련 법령에 따라 일정기간 저장된 후 혹은 즉시 파기됩니다. 이 때, DB로 옮겨진 개인정보는 법률에 의한 경우가 아니고서는 다른 목적으로 이용되지 않습니다.<br /><br />
												-파기기한<br />
												이용자의 개인정보는 개인정보의 보유기간이 경과된 경우에는 보유기간의 종료일로부터 5일 이내에, 개인정보의 처리 목적 달성, 해당 서비스의 폐지, 사업의 종료 등 그 개인정보가 불필요하게 되었을 때에는 개인정보의 처리가 불필요한 것으로 인정되는 날로부터 5일 이내에 그 개인정보를 파기합니다.
											</dd>
										</dl>
										<dl>
											<dt>7. 개인정보 자동 수집 장치의 설치•운영 및 거부에 관한 사항</dt>
											<dd>
												① 케이스랩 은 개별적인 맞춤서비스를 제공하기 위해 이용정보를 저장하고 수시로 불러오는 ‘쿠기(cookie)’를 사용합니다. ② 쿠키는 웹사이트를 운영하는데 이용되는 서버(http)가 이용자의 컴퓨터 브라우저에게 보내는 소량의 정보이며 이용자들의 PC 컴퓨터내의 하드디스크에 저장되기도 합니다. 가. 쿠키의 사용 목적 : 이용자가 방문한 각 서비스와 웹 사이트들에 대한 방문 및 이용형태, 인기 검색어, 보안접속 여부, 등을 파악하여 이용자에게 최적화된 정보 제공을 위해 사용됩니다. 나. 쿠키의 설치•운영 및 거부 : 웹브라우저 상단의 도구>인터넷 옵션>개인정보 메뉴의 옵션 설정을 통해 쿠키 저장을 거부 할 수 있습니다. 다. 쿠키 저장을 거부할 경우 맞춤형 서비스 이용에 어려움이 발생할 수 있습니다.
											</dd>
										</dl>
										<dl>
											<dt>8. 개인정보 보호책임자 작성 </dt>
											<dd>
												① 케이스랩(‘kacelab.com’이하 ‘케이스랩) 은(는) 개인정보 처리에 관한 업무를 총괄해서 책임지고, 개인정보 처리와 관련한 정보주체의 불만처리 및 피해구제 등을 위하여 아래와 같이 개인정보 보호책임자를 지정하고 있습니다.<br /><br />
												▶ 개인정보 보호책임자<br />
												성명 :강승혜<br />
												직책 :대표<br />
												직급 :대표<br />
												연락처 :02-3442-2003, canksh@kacelab.com,<br />
												※ 개인정보 보호 담당부서로 연결됩니다.
											</dd>
										</dl>
										<dl>
											<dt>9. 개인정보 처리방침 변경</dt>
											<dd>①이 개인정보처리방침은 시행일로부터 적용되며, 법령 및 방침에 따른 변경내용의 추가, 삭제 및 정정이 있는 경우에는 변경사항의 시행 7일 전부터 공지사항을 통하여 고지할 것입니다.</dd>
										</dl>
										<dl>
											<dt>11. 개인정보의 안전성 확보 조치 ('케이스랩')은(는) 개인정보보호법 제29조에 따라 다음과 같이 안전성 확보에 필요한 관리적 조치를 하고 있습니다.</dt>
											<dd>
												1. 정기적인 자체 감사 실시<br />
												개인정보 취급 관련 안정성 확보를 위해 정기적(분기 1회)으로 자체 감사를 실시하고 있습니다.
											</dd>
										<dl>
									</div>
									<div class="agree">
										<input type="checkbox" name="ag" id="ag1" />
										<label for="ag1"><span>개인정보취급방침에 동의합니다.</span></label>
									</div>
								</div>
								<div class="formWrap">
									<dl>
										<dt>작성자</dt>
										<dd><input type="text" name="name" placeholder="홍길동" /></dd>
									</dl>
									<dl>
										<dt>공개여부</dt>
										<dd>
											<ul class="open">
												<li><input type="radio" name="lock_view" id="op1" checked="checked" value="N" /><label for="op1">공개</label></li>
												<li><input type="radio" name="lock_view" id="op2" value="Y"/><label for="op2">비공개</label></li>
											</ul>
										</dd>
									</dl>
								</div>
								<div class="formWrap">
									<dl>
										<dt>연락처</dt>
										<dd><input type="tel" placeholder="010" title="전화번호 앞 세자리" name="tel1" maxlength="4" /><span class="dash">-</span><input type="tel" placeholder="2345" title="전화번호 두번째 네자리" name="tel2" maxlength="4"/><span class="dash">-</span><input type="tel" placeholder="6789" title="전화번호 마지막 세자리" name="tel3" maxlength="4"/></dd>
									</dl>
									<dl>
										<dt>이메일</dt>
										<dd><input type="text" placeholder="can@kacelab.com" name="email" /></dd>
									</dl>
								</div>			
								<dl>
									<dt>제목</dt>
									<dd><input type="text" placeholder="제목을 입력해주세요." name="title" /></dd>
								</dl>
								<dl>
									<dt>비밀번호</dt>
									<dd><input type="password" placeholder="비밀번호를 입력해주세요." name="passwd" /><div class="noti"><span>*</span> 비밀번호를 입력하셔야 글쓰기, 수정, 삭제가 가능합니다.</div></dd>
								</dl>
								<dl>
									<dt>부담없이 물어보기</dt>
									<dd>
										<div class="editArea" >
										<textarea id="content1" name="content"></textarea></div>
										
									</dd>
								</dl>
								<dl>
									<dt>첨부파일</dt>
									<dd>
										<div class="attachArea">
											<button type="button" id='btn-upload' class="button1 white selected" onfocus="this.blur();">파일첨부</button><div class="noti"><span>*</span> 이미지 파일은 JPG 또는 GIF 파일로 올려주시기 바랍니다.</div>
											<input type='file' id='file' name='upfile1' />
											<div class="attach">
												<!-- <ul>
													<li><a href="javascript:alert('파일삭제');">홍길동_이력서_191212.pdf</a></li>
												</ul> -->
											</div>
										</div>
									</dd>
								</dl>
								<div class="btnArea">
									<button type="submit">등록</button>
									<a href="counseling.php"><button type="button">취소</button></a>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div id="btnContact"><a href="../contact.php"><span>Request Projects &amp; Operation</span></a></div>
	<a href="javascript:goTop();" id="btnTop">TOP</a>
  <!-- <script src="https://cdn.ckeditor.com/4.13.1/standard-all/ckeditor.js"></script> -->
 <script src="https://cdn.ckeditor.com/4.13.1/standard-all/ckeditor.js"></script>


<script>

$(function(){          
	$('#btn-upload').click(function(e){
		e.preventDefault();             
		$("input:file").click();               
		var ext = $("input:file").val().split(".").pop().toLowerCase();
		if(ext.length > 0){
			if($.inArray(ext, ["gif","png","jpg","jpeg","hwp","pdf","xls","xlsx","doc","txt","pptx"]) == -1) { 
				alert("gif,png,jpg,hwp,pdf,xls,xlxs,doc,txt,pptx 파일만 업로드 할수 있습니다.");
				return false;  
			}  
			$(".attach").html("");
		$(".attach").append("<ul><li><a href=\"javascript:del_attach();\">"+$("input:file").val()+"</a></li></ul>");
		}
		$("input:file").val().toLowerCase();
		

	});    
	
	$('input:file').change(function(e){
		var ext = $("input:file").val().split(".").pop().toLowerCase();
		if(ext.length > 0){
			if($.inArray(ext, ["gif","png","jpg","jpeg","hwp","pdf","xls","xlsx","doc","txt","pptx"]) == -1) { 
				alert("gif,png,jpg,hwp,pdf,xls,xlxs,doc,txt,pptx 파일만 업로드 할수 있습니다.");
				return false;  
			}  
			$(".attach").html("");
		$(".attach").append("<ul><li><a href=\"javascript:del_attach();\">"+$("input:file").val()+"</a></li></ul>");
		}
	});

});            

function del_attach(){
	$(".attach").html("");
	$("input:file").val("");
}

/*
  $('#summernote').summernote({
	placeholder: '부담없이 물어보기',
	tabsize: 2,
	height: 220,
	toolbar: [
	  ['style', ['style']],
	  ['font', ['bold', 'underline', 'clear']],
	  ['color', ['color']],
	  ['para', ['ul', 'ol', 'paragraph']],
	  ['table', ['table']],
	  ['insert', ['link', 'picture']],
	  ['view', ['codeview', 'help']]
	]
  });
  */

  function check_form(){
	var form = document.qna_form;
	
	if($("input:checkbox[id='ag1']").is(":checked")==false){
		alert("개인정보취급방침에 동의하여주세요");
		form.ag1.focus();
		return false;
	}
	if(form.name.value==""){
		alert("작성자명을 입력하여 주세요");
		form.name.focus();
		return false;
	}

	if(form.tel1.value==""){
		alert("연락처를 입력하여 주세요");
		form.tel1.focus();
		return false;
	}

	if(form.tel2.value==""){
		alert("연락처를 입력하여 주세요");
		form.tel2.focus();
		return false;
	}

	if(form.tel3.value==""){
		alert("연락처를 입력하여 주세요");
		form.tel3.focus();
		return false;
	}

	if(form.title.value==""){
		alert("제목을 입력하여 주세요");
		form.title.focus();
		return false;
	}

	if(form.passwd.value==""){
		alert("비밀번호를 입력하여 주세요");
		form.passwd.focus();
		return false;
	}
	return true


  }

 
</script>
 <script>
    CKEDITOR.replace('content1', {
      height: 250,
	  enterMode:'2',
      extraPlugins: 'divarea'
    });
  </script>

			
<?php include_once $_SERVER['DOCUMENT_ROOT']."/inc/contents_footer.php";?> 
