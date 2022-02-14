var isWeb;
var isTabl;
var isMobile;
$(document).ready(function(){
	$("iframe").on("load", function() {
			$("iframe").contents().find(".tbl_blue01").css("margin-bottom", "45px");
	});
	$(window).resize(function(){
		if(jQuery(window).width() > 1280 ){ //웹
			isWeb = true;
			isMobile = false;
		}else{ //모바일
			isWeb = false;
			isMobile = true;
		}
		if(!isWeb && isMobile){
			$("#gnb a").off("click").on("click", function() {
				var _aid = $(this).attr("href");
				event.preventDefault();
				if($(this).hasClass("link")){
					$(location).attr("href",_aid);
				}else if($(this).hasClass("link-btn")){
					if($(this).hasClass("on")){
						$(this).removeClass("on");
						$(this).next().stop();
						$(this).next().slideUp(200);
					}else{
						$(this).addClass("on");
						$(this).parent("li").siblings("li").children("a").removeClass("on");
						$(this).parent("li").siblings("li").children("div").slideUp(200);
						$(this).next().stop();
						$(this).next().slideDown(200); 
					};
				};
			});
			$(".lang .btn-lang").off("click").on("click", function() {
				if($(this).hasClass("active")){
					$(this).removeClass("active");
					$(this).next("ul").stop();
					$(this).next("ul").slideUp(200);
				}else{
					$(this).addClass("active");
					$(this).next("ul").stop();
					$(this).next("ul").slideDown(200); 
				};
			});
		}else if(isWeb && !isMobile){
			$(".header-inner >*:not('.head-right, #btn-fullnav, h1.logo')").hover(
				function(){
					$("#header").addClass("active");
				}, function() {
					$("#header").removeClass("active");
				}
			);
			$("#gnb>li").hover(
				function(){
					//$(this).closest("#header").addClass("active");
					$(this).addClass("active");
					//$(this).children(".depth2-box").stop().slideDown(200);
				}, function() {
					//$(this).closest("#header").removeClass("active");
					$(this).removeClass("active");
					//$(this).children(".depth2-box").stop().hide();
				}
			);
			$("#gnb a").off("click").on("click", function() {
				var _aid = $(this).attr("href");
				event.preventDefault();
				if($(this).hasClass("link")){
					$(location).attr("href",_aid);
				}else if($(this).hasClass("link-btn")){
					$(location).attr("href",_aid);
				}else if($(this).hasClass("link-new")){
					window.open('https://dream.kolon.com/RECRUIT_KOLON/hr/rec/recruit/userhtml/controller/RecruitNowWebController/view_05_list.hr', '_blank');
				};
			});
			/*$(window).scroll(function() {
			  var scrolledY = $(window).scrollTop();
			  var subY = $(".sub-cont").offset().top;
			  $("#sub_visual").css('background-position', 'center ' + ((scrolledY)) + 'px');
			  if(scrolledY > _height/2){
				$(".sub-cont").addClass("active");
			  };
			});*/
			$(".lang").hover(
				function(){
					$(this).addClass("active");
					$(this).children("ul").stop().slideDown(200);
				}, function() {
					$(this).removeClass("active");
					$(this).children("ul").stop().slideUp(200);
				}
			);
		};
	});
	$(window).resize();
	/*
	var pos = 0;
	var el = document.getElementById("main-support");
	var m = 0;
	window.addEventListener("scroll", function () {
		el.style.marginTop = -window.pageYOffset/2 + "px";
		pos = window.pageYOffset;
	}, false);
	
	$(".arco-area>dl>dt").each(function(){
		//var str=$(this).attr("href");
		$(this).off("click").on("click", function() {
			if($(this).hasClass("on")){
				$(this).removeClass("on");
				$(this).next("dd").slideUp(200);
			}else{
				$(this).parent("dl").siblings("dl").children("dt").removeClass("on");
				$(this).parent("dl").siblings("dl").children("dd").slideUp(200);
				$(this).addClass("on");
				$(this).next("dd").slideDown(200);
			};
		});	
	});
	*/
	$(".m-step-list a").each(function(){
		//var str=$(this).attr("href");
		$(this).off("click").on("click", function() {
			if($(this).hasClass("on")){
				$(this).removeClass("on");
				$(this).next("div").slideUp(200);
			}else{
				$(this).parent("li").siblings("li").children("a").removeClass("on");
				$(this).parent("li").siblings("li").children("div").slideUp(200);
				$(this).addClass("on");
				$(this).next("div").slideDown(200);
			};
		});	
	});
	/*
	$(".preloader>div").each(function(index, value) {
		  $(this).addClass("vanshi").delay(500* (index + 1)).fadeIn(1000).animate({
				"top": "0px",
				"opacity": "1"
		  }, 1000);
	});
	*/

	if($(window).scrollTop() > 0){
		$("#header").addClass("fixed");
	};
	var docuh = $(document).height();
	var winh = $(window).outerHeight()*0.4;
	var winw = $(window).outerWidth();
	var lastScrollTop = 0;
	//$(window).on("scroll touchmove mousewheel", function(){
	$(window).on("scroll", function(){
		/*if($(window).scrollTop() > 0){
			$("#header").addClass("fixed");
		};
			st = $(this).scrollTop();
			if(st <= lastScrollTop) {
				$("#header").removeClass("hid");
				$(".lnb").removeClass("fixed");
				$(".lnb").removeClass("fixed_top");
			}else{
				$("#header").addClass("hid");
				$(".lnb").addClass("fixed_top");
				if($(window).scrollTop() + $(window).height() >= $(document).height()){
					$("#header").addClass("hid");
				};
			};
			lastScrollTop = st;
		}else{
			$("#header").removeClass("fixed");
			$("#header").removeClass("hid");
			$(".lnb").removeClass("fixed");
		};*/
		if($(window).scrollTop() > 0){
			$("#header").addClass("fixed");
			if($(window).scrollTop() > 99){
				st = $(this).scrollTop();
				if(st <= lastScrollTop) {//스크롤올릴때
					$("#header").removeClass("hid");
					if($(window).width()<=1280){
						$(".lnb").removeClass("fixed");
						$(".lnb").removeClass("fixed_top");
					};
				}else{//스크롤내릴때
					$("#header").addClass("hid");
					if($(window).width()<=1280) {
						$(".lnb").addClass("fixed_top");
					};
				};
				lastScrollTop = st;
			}else{
				$("#header").removeClass("hid");
				if($(window).width()<=1280) {
					$(".lnb").removeClass("fixed");
					$(".lnb").removeClass("fixed_top");
				};
			};
				
		}else{
			$("#header").removeClass("fixed");
			$("#header").removeClass("hid");
			if($(window).width()<=1280) {
				$(".lnb").removeClass("fixed");
			};
		};
		/*
		$(".main-cont").each(function(i) {
			var $li = $(this);
			var $top = $li.offset().top;
			var $height = $li.height();
			if($(window).scrollTop() > $top - winh){
				$li.addClass("active");
				if($(window).scrollTop() > $top + $height ){
					if($li.hasClass("main-fac")){}else{
						setTimeout(function() {
						   $li.removeClass("active");
						}, 2000);
					};
				};
				var $stop = $("#main-support").offset().top;
				var $sheight = $("#main-support").height();
				if($(window).scrollTop() + 101 >=  $stop){
					//$("html").addClass("hold")
				};
			}else{
				if($li.hasClass("main-fac")){}else{
					$li.removeClass("active");
				};
			};
		});*/
	});
	var _height = window.innerHeight;
	var _width = window.innerWidth;
	$(window).on("scroll", function(){
		$("#footer .btn-fm").removeClass("on");
	});

	$(".btn-open-layer").each(function(){
		//var str=$(this).attr("href");
		$(".btn-open-layer").off("click").on("click", function() {
			var str=$(this).attr("href");
			$(str).show();
			$("html").addClass("hold");
		});	
	});
	$(".layer-popup .close").off("click").on("click", function() {
		$(this).parent().parent(".layer-popup").hide();
		$("html").removeClass("hold");
	});
	$(window).scroll(function() {
	  var scrolledY = $(window).scrollTop();
	  var _height = window.innerHeight;
	  var subY = $(".sub-cont").offset().top;
	  if(scrolledY > _height/2){
		//$(".sub-cont").addClass("active");
	  };
	});
	$("#footer .btn-fm").off("click").on("click", function() {
		$(this).toggleClass("on");
	});
	$(".fm-dim").off("click").on("click", function() {
		$("#footer .btn-fm").toggleClass("on");
	});
	$(".tab-area dt").off("click").on("click", function() {
		if($(this).hasClass("on")){
		}else{
			$(this).addClass("on");
			$(this).siblings("dt").removeClass("on");
		};
	});
	$("#btn-fullnav").off("click").on("click", function() {
		$(this).toggleClass("open");
		$("html").toggleClass("hold");
		$("#header").toggleClass("full-nav");
	});

	$(window).on("scroll", function(){
		var _height = window.innerHeight;
		var _width = window.innerWidth;
		if($(window).scrollTop() > $("#header").height()){
			$("#btn-top").fadeIn(200);
		}else if($(window).scrollTop() <= $("#header").height()){
			$("#btn-top").fadeOut(200);
		};
		if($(window).scrollTop() + $(window).height() > $("#footer").offset().top){
			if(isWeb && !isMobile){
				$("#btn-top").css({"position":"absolute", "bottom" : $("#footer").height() + 160});
			}else if(!isWeb && isMobile){
				$("#btn-top").css({"position":"absolute", "bottom" : $("#footer").height() + 80});
			}
		}else{
			if(isWeb && !isMobile){
				$("#btn-top").css({"position":"fixed", "bottom" : 40});
			}else if(!isWeb && isMobile){
				$("#btn-top").css({"position":"fixed", "bottom" : 20});
			};
		};
		
		if(_width<1200){
			/*$(window).on('load scroll mousewheel', function(){
				$("#header").css('left', -$(window).scrollLeft());
			})*/
		};
	});
});

function openWin(){
	 $(".dim").show();
};
function goTop(){
	$("html,body").scrollTop(0);
}