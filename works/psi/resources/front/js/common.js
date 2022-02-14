$(document).ready(function(){
	var fileTarget = $('.filebox .upHidden');
	fileTarget.on('change', function(){ // 값이 변경되면
		if(window.FileReader){ // modern browser
			var filename = $(this)[0].files[0].name;
		}else{ // old IE
			var filename = $(this).val().split('/').pop().split('\\').pop(); // 파일명만 추출
		} // 추출한 파일명 삽입 
		$(this).siblings('.upName').val(filename);
	});
	resizeContents()
	$(window).resize(resizeContents);
	//list_tab
	$(".tabContArea2").each(function(index){
		var $this = $(this);
		$(this).children(".tabArea").children("li").click(function() {
			var sindex = $(this).index();
			$this.children(".tabArea").children("li").children("a").removeClass("on")
			$(this).children("a").addClass("on");
			$this.children(".tabCont").hide().eq(sindex).show();
		});		
	});
	$(".tabCont dt").click(function(){
        if($(this).hasClass("active")){
            $(this).removeClass("active");
			$(this).next("dd").slideUp(300);
        }else{
            $(this).addClass("active");
			$(this).next("dd").slideDown(300);
        }
    })
	var _he = window.innerHeight;
	$(".rViewArea .inner .frame").css("height", _he - 450);
	$(".rViewArea .inner .rNavi").css("max-height", _he - 450);
	$(".proContainer .rViewArea .inner .frame").css("height", _he - 510);
	$(".proContainer .rViewArea .inner .rNavi").css("max-height", _he - 510);
	$(".bsContainer .rViewArea .inner .frame").css("height", _he - 570);
	$(".bsContainer .rViewArea .inner .rNavi").css("max-height", _he - 570);
});

function resizeContents() {
   var boxh = $(".layerStatus").height() - 200;
	$(".layerStatus").find(".layerBox").css("height",boxh);
}

$(function() {
	//모든 datepicker에 대한 공통 옵션 설정
	$.datepicker.setDefaults({
		dateFormat: 'yy-mm-dd' //Input Display Format 변경
		,showOtherMonths: true //빈 공간에 현재월의 앞뒤월의 날짜를 표시
		,showMonthAfterYear:true //년도 먼저 나오고, 뒤에 월 표시
		//,changeYear: true //콤보박스에서 년 선택 가능
		//,changeMonth: true //콤보박스에서 월 선택 가능                
		,showOn: "both" //button:버튼을 표시하고,버튼을 눌러야만 달력 표시 ^ both:버튼을 표시하고,버튼을 누르거나 input을 클릭하면 달력 표시  
		,buttonImage: "/resources/front/images/ico_calendar.png" //버튼 이미지 경로
		,buttonImageOnly: true //기본 버튼의 회색 부분을 없애고, 이미지만 보이게 함
		,buttonText: "선택" //버튼에 마우스 갖다 댔을 때 표시되는 텍스트                
		,yearSuffix: " -" //달력의 년도 부분 뒤에 붙는 텍스트
		,monthNamesShort: ['01','02','03','04','05','06','07','08','09','10','11','12'] //달력의 월 부분 텍스트
		,monthNames: ['01','02','03','04','05','06','07','08','09','10','11','12'] //달력의 월 부분 Tooltip 텍스트
		,dayNamesMin: ['S','M','T','W','T','F','S'] //달력의 요일 부분 텍스트
		//,dayNames: ['일요일','월요일','화요일','수요일','목요일','금요일','토요일'] //달력의 요일 부분 Tooltip 텍스트
		//,minDate: "-1M" //최소 선택일자(-1D:하루전, -1M:한달전, -1Y:일년전)
		//,maxDate: "+1M" //최대 선택일자(+1D:하루후, -1M:한달후, -1Y:일년후)                    
	});

   $("#fromDate").datepicker();
   $("#toDate").datepicker();
   // $("#fromDate").datepicker('setDate', 'today'); //(-1D:하루전, -1M:한달전, -1Y:일년전), (+1D:하루후, -1M:한달후, -1Y:일년후)
   // $("#toDate").datepicker('setDate', 'today'); //(-1D:하루전, -1M:한달전, -1Y:일년전), (+1D:하루후, -1M:한달후, -1Y:일년후)
   $(".dateArea .btnArea .dbtn").click(function() {
      $("#fromDate").datepicker('setDate', 'today');
      $("#toDate").datepicker('setDate', 'today');
      if($(this).hasClass("today")) {
      } else if($(this).hasClass("days")) {
         $("#fromDate").datepicker('setDate', '-2D');
      } else if($(this).hasClass("week")) {
         $("#fromDate").datepicker('setDate', '-6D');
      } else if($(this).hasClass("month")) {
         $("#fromDate").datepicker('setDate', '-1M-1D');
      } else if($(this).hasClass("all")) {
         $("#fromDate").datepicker('setDate', '');
         $("#toDate").datepicker('setDate', '');
      };
      $(this).addClass("on");
      $(this).siblings().removeClass("on");
   });
	$(".chkall").click(function(){
        if($(".chkall").prop("checked")){
            $("input[name=chk]").prop("checked",true);
        }else{
            $("input[name=chk]").prop("checked",false);
        }
    })
	$("#gnb>li").hover(
		function(){
			$(this).addClass("active");
		}, function() {
			$(this).removeClass("active");
		}
	);
	$(".proKey .btn_spec").off("click").on("click", function() {
		if($(this).hasClass("on")){
			$(this).removeClass("on");
			$(this).parent().next(".spec").hide();
			$(this).parent().parent().parent(".proSearchArea").removeClass("proOn");
		}else{
			$(this).addClass("on");
			$(this).parent().next(".spec").show();
			$(this).parent().parent().parent(".proSearchArea").addClass("proOn");
		};
	});
	$(".rNavi ul li a").off("click").on("click", function() {
		if($(this).hasClass("on")){
		}else{
			$(this).addClass("on");
			$(this).parent().siblings().children("a").removeClass("on");
		};
	});
	$(".gnb ul").each(function(index) {
		//var _length = $(this).children("li").length;
		//$(this).css("width",_length*90);
	});
	$(".btnPopup").each(function(){
		var str=$(this).attr("href");
		$(this).off("click").on("click", function() {
			$(str).fadeIn();
		});	
	});
	$(".layerPopup .dim").off("click").on("click", function() {
		$(this).parent(".layerPopup").fadeOut(100);
	});
	$(".layerPopup .tclose").off("click").on("click", function() {
		$(this).parent().parent(".layerPopup").fadeOut(100);
	});
	$(".layerPopup .close").off("click").on("click", function() {
		$(this).parent().parent().parent().parent(".layerPopup").fadeOut(100);
	});
	$(".tabArea dt").off("click").on("click", function() {
		if($(this).hasClass("on")){
		}else{
			$(this).addClass("on");
			$(this).siblings("dt").removeClass("on");
		};
	});
});

