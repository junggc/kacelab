var isWeb;
var isTabl;
var isMobile;
$(document).ready(function(){
	$(".subIntro .h2Cont div").each(function(i) {
		var $li = $(this);
		setTimeout(function() {
		  $li.addClass("active");
		}, i*400); // delay 100 ms
	});
	$(window).resize(function(){
		if(jQuery(window).width() > 1024 ){ //웹
			isWeb = true;
			isMobile = false;
			$(window).resize(resizep);
			resizep();
		}else{ //모바일
			isWeb = false;
			isMobile = true;
			$(window).resize(resizem);
			resizem();
		}
	});
	$(window).resize();
	/*$(".abAlp").each(function(index, value) {
		  if ($(this).hasClass("bhFade")) {
		  } else {
			var triggerpoint = $(window).height() * .9 + $(window).scrollTop();
			var counter = $(this).offset().top;
			if (counter <= triggerpoint) {
			  if ($(this).hasClass("abAlpImg")) {
				$(this).addClass("bhFade").fadeIn(1000).animate({"top": "95px","opacity": "1"}, 1000);
			  } else if ($(this).hasClass("abAlpn1")) {
				$(this).addClass("bhFade").fadeIn(1000).animate({"bottom": "182px","opacity": "1"}, 1000);
			  } else if ($(this).hasClass("abAlpn2")) {
				$(this).addClass("bhFade").fadeIn(1000).animate({"bottom": "-1px","opacity": "1"}, 1000);
			  } else if ($(this).hasClass("abAlpn3")) {
				$(this).addClass("bhFade").fadeIn(1000).animate({"bottom": "8px","opacity": "1"}, 1000);
			  } else {
				$(this).addClass("bhFade").fadeIn(1000).animate({"opacity": "1"}, 1000);
			  }
			};
		  };
		});*/
	/*
	$(".contTxt div").each(function(index, value) {
	  if ($(this).hasClass("bhFade")) {} else {
		$(this).addClass("bhFade").delay(500* (index + 1)).fadeIn(1000).animate({
			"top": "0px",
			"opacity": "1"
		  }, 1000);
	  };
	});
	*/

	$(".contTxt").children("div").children("div").each(function(i) {
		var $li = $(this);
		setTimeout(function() {
		  $li.addClass("bhFade");
		}, i*500); // delay 100 ms
	});

	setInterval(function() {
		$(".coun1").fadeIn(1000).fadeOut(1000);
		$(".coun2").fadeIn(1500).fadeOut(1500);
		$(".coun3").fadeIn(1200).fadeOut(1200);
	}, 500);
	setInterval(function() {
		$(".coun4").fadeIn(800).fadeOut(800);
		$(".coun5").fadeIn(2000).fadeOut(2000);
	}, 1000);

	$(".subContainer .mCoun .cncont span").each(function(i) {
		(function(self) {
			setTimeout(function() {
				$(self).addClass("active");
			},(i*800)+800);
		})(this);
	});
	$(".subContainer .mCoun h3").addClass("active");

});

$(document).on('mousemove', function(e){
	$('#pointer').css({
	   left:  e.clientX+3,
	   top:   e.clientY+3
	});
	$("a").hover(
		function(){
			$("#pointer").addClass("active");
			
		}, function() {
			$("#pointer").removeClass("active");
		}
	);
});
$(document).mouseleave(function () {
	$("#pointer").hide();
});
$(document).mouseenter(function () {
	$("#pointer").show();
});

function resizep() {
    $(".contImg").height($(window).height());
    $(".msimg").height($(window).height());
    $(".mscont .outer").height($(window).height());
	$(".slideCont").height($(window).height()).css("padding-top",0);
}
function resizem() {
    $(".mainVisual").height($(window).height());
    $(".slideCont").height($(window).height()/2).css("padding-top",$(window).height()/2);
}

$(function(){
	var _height = window.innerHeight;
	var _width = window.innerWidth;
	var _subtop = $(".subVisual").size() ? $(".subVisual").offset().top : 0;
	$(".btnAreaMc a").each(function(){
		$(".btnAreaMc a").off("click").on("click", function() {
			var _aid=$(this).attr("href");
			$("html, body").animate({ scrollTop: $(_aid).offset().top}, 500);
		});	
	});
	$(window).on("scroll", function(){
		if($(window).scrollTop() > _subtop){
			$(".subContent .h2Cont").children("div").each(function(i){
				(function(self) {
					setTimeout(function() {
						$(self).addClass("active");
					},(i*500)+100);
				})(this);
			});
			
		};
	});
	$(".tabArea>dt").off("click").on("click", function() {
		if($(this).hasClass("on")){}else{
			$(this).siblings("dt").removeClass("on");
			$(this).addClass("on");
		};
	});

	if(!isWeb && isMobile){
		$(window).on("scroll", function(){
			if($(window).scrollTop() > 1){
				$(".wrap").addClass("scrolled");
				/*
				if($(window).scrollTop() > ms1){
					$(".mainOnly #ms1 .inner").addClass("active");
					if($(window).scrollTop() > ms2){
						$(".mainOnly #ms1 .inner").removeClass("active");
						$(".mainOnly #ms2 .inner").addClass("active");
						if($(window).scrollTop() > ms3){
							$(".mainOnly #ms2 .inner").removeClass("active");
							$(".mainOnly #ms3 .inner").addClass("active");
						}else{
							$(".mainOnly #ms2 .inner").addClass("active");
							$(".mainOnly #ms3 .inner").removeClass("active");v
						};
					}else{
						$(".mainOnly #ms1 .inner").addClass("active");
						$(".mainOnly #ms2 .inner").removeClass("active");
					};
				}else{
					$(".mainOnly #ms1 .inner").removeClass("active");
				};
				*/

			}else{
				$(".wrap").removeClass("scrolled");
			};
			var _width = window.innerWidth;
			$(".mainOnly .mSection .outer").removeClass("active");
			//$(".mainOnly .mSection .inner").removeClass("active");
		});
		$(".work .hoverWrap").off("click").on("click", function() {
			$(this).toggleClass("active");
		});
		$("#btnTop").off("click").on("click", function() {
			$(this).addClass("on");
		});
		$("#gnb>li>a").off("click").on("click", function() {
			/*var _aid = $(this).attr("href");
			event.preventDefault();
			if($(this).hasClass("link")){
				$(location).attr("href",_aid);
			}else{
				if($(this).hasClass("on")){
					$(this).removeClass("on");
					$(this).next("ul").stop();
					$(this).next("ul").slideUp(200);
				}else{
					$(this).addClass("on");
					$(this).parent("li").siblings("li").children("a").removeClass("on");
					$(this).parent("li").siblings("li").children("ul").slideUp(200);
					$(this).next("ul").stop();
					$(this).next("ul").slideDown(200); 
				};
			};
			*/
		});
		$(".slideCont>li").off("click").on("click", function() {
			if($(this).hasClass("on")){
				$(this).removeClass("on");
			}else{
				$(this).addClass("on");
			};
		});
		$(".subMenu2 .btnSm").off("click").on("click", function() {
			$(this).toggleClass("open");
		});
	}else if(isWeb && !isMobile){
		$(window).on("scroll", function(){
			var _ms1 = $("#ms1").size() ? $("#ms1").offset().top : 0;
			var _ms2 = $("#ms2").size() ? $("#ms2").offset().top : 0;
			var _ms3 = $("#ms3").size() ? $("#ms3").offset().top : 0;
			if($(window).scrollTop() > 88){
				$(".wrap").addClass("scrolled");
				if($(window).scrollTop() > _ms1){
					$("#container .mSection .outer").addClass("active");
					if($(window).scrollTop() > _ms1 + (_height/2)){
						$("#container #ms1 .inner").removeClass("active");
						$("#container #ms2 .inner").addClass("active");
						if($(window).scrollTop() > _ms2 + (_height/1.5)){
							$("#container #ms2 .inner").removeClass("active");
							$("#container #ms3 .inner").addClass("active");
							if($(window).scrollTop() > _ms3){
								$("#container .mSection .mscont").addClass("active");
								$("#container .mSection .outer").removeClass("active");
							}else{
								$("#container .mSection .mscont").removeClass("active");
							};
						}else{
							$("#container #ms2 .inner").addClass("active");
							$("#container #ms3 .inner").removeClass("active");
						};
					}else{
						$("#container #ms1 .inner").addClass("active");
						$("#container #ms2 .inner").removeClass("active");
					};
				}else{
					$("#container .mSection .outer").removeClass("active");
				};
			}else{
				$(".wrap").removeClass("scrolled");;
			};
			var _width = window.innerWidth;
			if(_width<1200){
				$(window).on('load scroll mousewheel', function(){
					$("#header").css('left', -$(window).scrollLeft());
				})
			};
		});
		$("#gnb>li").hover(
			function(){
				$(this).addClass("active");
				//$(this).children("ul").stop().slideDown(200);
			}, function() {
				$(this).removeClass("active");
				//$(this).children("ul").stop().slideUp(200);
			}
		);
		$(".work li").hover(
			function(){
				$(this).addClass("active");
			}, function() {
				$(this).removeClass("active");
			}
		);
	};
	$("#footer .btnFm").off("click").on("click", function() {
		$(this).toggleClass("on");
	});
	$(".tabArea dt").off("click").on("click", function() {
		if($(this).hasClass("on")){
		}else{
			$(this).addClass("on");
			$(this).siblings("dt").removeClass("on");
		};
	});
	/* D:20191122 컨텐츠추가시 사용재개
	$(".boardArc dt").off("click").on("click", function() {
		if($(this).hasClass("on")){
			$(this).removeClass("on");
			$(this).next("dd").slideUp(300);
		}else{
			$(this).addClass("on");
			$(this).next("dd").slideDown(300);
		};
	});
	*/
	/* D:20191122 컨텐츠 없을때 고정*/
	$(".boardArc dt:first").addClass("on");
	$(".boardArc dt.on").next("dd").show();
	/* //D:20191122 컨텐츠 없을때 고정*/
	$("#btnMnav").off("click").on("click", function() {
		$(this).toggleClass("open");
		$("html").toggleClass("mHidden");
		$("#navigation .inner").css("height",_height);
	});

	$(window).on("scroll", function(){
		if($(window).scrollTop()> _height*3.2){
			$(".mCoun .cncont span").each(function(i) {
				(function(self) {
					setTimeout(function() {
						$(self).addClass("active");
					},(i*800)+800);
				})(this);
			});
			$(".mCoun h3").addClass("active");
		}else{
			$(".mCoun .cncont span").each(function(i) {
				$(this).removeClass("active");
			});
			$(".mCoun h3").removeClass("active");
		};
		/*if($(window).scrollTop() + $(window).height() > $(document).height() - 100) {
		   $(".mCoun .coun").each(function(i) {
				(function(self) {
					setTimeout(function() {
						$(self).addClass("active");
					},(i*800)+800);
				})(this);
			});
		};*/
		
		/*
		$(".mSection .msimg h3").each(function(index, value) {
			var triggerpoint = $(window).height() * .8 + $(window).scrollTop();
			var counter = $(this).offset().top;
			if (counter <= triggerpoint) {
			  $(this).addClass("bhFade");
			}else{
				//$(this).removeClass("bhFade");
			};
		});
		$(".abFd").each(function(index, value) {
			var triggerpoint = $(window).height() * .8 + $(window).scrollTop();
			var counter = $(this).offset().top;
			if (counter <= triggerpoint) {
			  $(this).addClass("bhFade");
			}else{
				//$(this).removeClass("bhFade");
			};
		});
		$(".abPr1").each(function(index, value) {
			var triggerpoint = $(window).height() * .8 + $(window).scrollTop();
			var counter = $(this).offset().top;
			if (counter <= triggerpoint) {
			  $(this).addClass("bhFade").delay(500* (index + 1)).animate({"right": "0","opacity": "1"}, 1000);
			}else{
				//$(this).removeClass("bhFade");
			};
		});
		$(".abPr2").each(function(index, value) {
			var triggerpoint = $(window).height() * .8 + $(window).scrollTop();
			var counter = $(this).offset().top;
			if (counter <= triggerpoint) {
			  $(this).addClass("bhFade").delay(500* (index + 1)).animate({"right": "0","opacity": "1"}, 1000);
			}else{
				//$(this).removeClass("bhFade");
			};
		});
		$(".abPr3").each(function(index, value) {
			var triggerpoint = $(window).height() * .8 + $(window).scrollTop();
			var counter = $(this).offset().top;
			if (counter <= triggerpoint) {
			  $(this).addClass("bhFade").delay(500* (index + 1)).animate({"right": "0","opacity": "1"}, 1000);
			}else{
				//$(this).removeClass("bhFade");
			};
		});
		*/


		/*if($(window).scrollTop() > $("#header").height()){
			$("#btnTop").fadeIn(200);
		}else if($(window).scrollTop() <= $("#header").height()){
			$("#btnTop").fadeOut(200);
		}
		if($(window).scrollTop() + $(window).height() > $("#footer").offset().top){
			if(isWeb && !isMobile){
				$("#btnTop").css({"position":"absolute", "bottom" : $("#footer").height() + 40});
			}else if(!isWeb && isMobile){
				$("#btnTop").css({"position":"absolute", "bottom" : $("#footer").height() + 20});
			}
		}else{
			if(isWeb && !isMobile){
				$("#btnTop").css({"position":"fixed", "bottom" : 40});
			}else if(!isWeb && isMobile){
				$("#btnTop").css({"position":"fixed", "bottom" : 20});
			};
		};*/
	});
});

function openWin(){
	 $(".dim").show();
};
function goTop(){
	$("html, body").animate({ scrollTop: 0}, 500);
}