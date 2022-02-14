// ################################################## defaults ##################################################
function errorMessage(jqXHR, textStatus, errorThrown) {
	console.log('error - jqXHR: %o, textStatus: %o, errorThrown: %o', jqXHR, textStatus, errorThrown);

	var message = null;

	if (jqXHR) {
		try {
			// ci4 custom exception
			var json = jqXHR.responseJSON;

			if (!json) {
				json = JSON.parse(jqXHR.responseText);
			}

			if (json) {
				if (json.messages && json.messages.error) {
					message = json.messages.error;
				} else if (json.message) { // ci4 default exception
					message = json.message;
				}
			}

			if (message) {
				message = message.replace(/\\\\/g, '\\');
			}
		} catch (e) {
			console.error(e);
		}
	}

	alert(message || '시스템 오류가 발생했습니다.');
}

function langErrorMessage(jqXHR, textStatus, errorThrown) {
	console.log('lang error - jqXHR: %o, textStatus: %o, errorThrown: %o', jqXHR, textStatus, errorThrown);

	var message = null;

	if (jqXHR) {
		try {
			// ci4 custom exception
			var json = jqXHR.responseJSON;

			if (!json) {
				json = JSON.parse(jqXHR.responseText);
			}

			if (json) {
				if (json.messages && json.messages.error) {
					message = json.messages.error;
				} else if (json.message) { // ci4 default exception
					message = json.message;
				}
			}

			if (message) {
				message = message.replace(/\\\\/g, '\\');
			}
		} catch (e) {
			console.error(e);
		}
	}

	alert(i18n[message] || i18n.error);
}

// ajax wrapping
(function ($) {
	$.remote = function (options) {
		var settings = $.extend({
			// accepts (default: depends on dataType)
			async      : true,
			beforeSend : null,
			cache      : false,
			complete   : null,
			// contents
			contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
			// context
			// converters: {"* text": window.String, "text html": true, "text json": jQuery.parseJSON, "text xml": jQuery.parseXML}
			// crossDomain
			data       : null,
			// dataFilter
			dataType   : 'json',
			error      : function (jqXHR, textStatus, errorThrown) {
				errorMessage(jqXHR, textStatus, errorThrown);
			},
			// global
			// headers
			// ifModified
			// isLocal
			// jsonp
			// jsonpCallback
			// method
			// mimeType
			// password
			// processData
			// scriptAttrs
			// scriptCharset
			// statusCode
			callback   : null, // success
			// timeout
			// traditional
			type       : 'post',
			url        : null
			// username
			// xhr
			// xhrFields

		}, options);

		if (settings.callback == null) {
			console.log('callback function is null');
		}

		$.ajax({
			async      : settings.async,
			beforeSend : settings.beforeSend,
			cache      : settings.cache,
			complete   : settings.complete,
			// contents
			contentType: settings.contentType,
			// context
			// converters
			// crossDomain
			data       : settings.data,
			// dataFilter
			dataType   : settings.dataType,
			error      : settings.error,
			// global
			// headers
			// ifModified
			// isLocal
			// jsonp
			// jsonpCallback
			// method
			// mimeType
			// password
			// processData
			// scriptAttrs
			// scriptCharset
			// statusCode
			success    : function (data) {
				settings.callback(data);
			},
			// timeout
			// traditional
			type       : settings.type,
			url        : settings.url
			// username
			// xhr
			// xhrFields
		});
	};
}(jQuery));

// ajax loader
(function ($) {
	var ajaxLoadTimer = null;

	$(document).on({
		ajaxStart: function () {
			if ($('#ajax-loader').length == 0) {
				$('body').append('<div id="ajax-loader"><div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div></div>');
			}
			ajaxLoadTimer = setTimeout(function () {
				$('#ajax-loader').show();
			}, 200);
		},
		ajaxStop : function () {
			if (ajaxLoadTimer) {
				clearTimeout(ajaxLoadTimer);
			}
			$('#ajax-loader').hide();
		}
	});
})(jQuery);

if (window.Handlebars && window.Handlebars.registerHelper) {
	/*
		{{#if (or section1 section2)}}
		.. content
		{{/if}}

		{{#if (or
				(eq section1 "foo")
				(ne section2 "bar"))}}
		.. content
		{{/if}}

		{{#if (and
				(eq section1 "foo")
				(ne section2 "bar"))}}
		.. content
		{{/if}}
	*/
	Handlebars.registerHelper({
		eq : function (v1, v2) {
			return v1 === v2
		},
		ne : function (v1, v2) {
			return v1 !== v2
		},
		lt : function (v1, v2) {
			return v1 < v2
		},
		gt : function (v1, v2) {
			return v1 > v2
		},
		lte: function (v1, v2) {
			return v1 <= v2
		},
		gte: function (v1, v2) {
			return v1 >= v2
		},
		and: function () {
			return Array.prototype.every.call(arguments, Boolean);
		},
		or : function () {
			return Array.prototype.slice.call(arguments, 0, -1).some(Boolean);
		}
	});

	// {{#ifCond var1 '==' var2}}
	Handlebars.registerHelper('ifCond', function (v1, operator, v2, options) {
		switch (operator) {
			case '=='   :
				return (v1 == v2) ? options.fn(this) : options.inverse(this);
			case '==='  :
				return (v1 === v2) ? options.fn(this) : options.inverse(this);
			case '!='   :
				return (v1 != v2) ? options.fn(this) : options.inverse(this);
			case '!=='  :
				return (v1 !== v2) ? options.fn(this) : options.inverse(this);
			case '<'    :
				return (v1 < v2) ? options.fn(this) : options.inverse(this);
			case '<='   :
				return (v1 <= v2) ? options.fn(this) : options.inverse(this);
			case '>'    :
				return (v1 > v2) ? options.fn(this) : options.inverse(this);
			case '>='   :
				return (v1 >= v2) ? options.fn(this) : options.inverse(this);
			case '&&'   :
				return (v1 && v2) ? options.fn(this) : options.inverse(this);
			case '||'   :
				return (v1 || v2) ? options.fn(this) : options.inverse(this);
			default     :
				return options.inverse(this);
		}
	});
}

// ################################################## prototype ##################################################
// fmt
if (!String.prototype.fmt) {
	String.prototype.fmt = function () {
		var args = arguments;
		return this.replace(/{(\d+)}/g, function (match, number) {
			return typeof args[number] != 'undefined' ? args[number] : match;
		});
	};
}

// 앞뒤 공백제거
if (!String.prototype.trim) {
	String.prototype.trim = function () {
		return this.replace(/^\s+|\s+$/g, '').replace(/　/g, '');
	};
}

// 이메일 형식 체크
if (!String.prototype.isEmail) {
	String.prototype.isEmail = function () {
		// ^[0-9a-zA-Z_\-]+@[.0-9a-zA-Z_\-]+$
		// ^[0-9a-zA-Z_\-]+@[0-9a-zA-Z_-]+(\.[0-9a-zA-Z_\-]+)*$
		// ^[0-9a-zA-Z_\-]+@[0-9a-zA-Z_\-]+(\.[0-9a-zA-Z_\-]+){1,2}$
		// ^[0-9a-zA-Z]([\-.\w]*[0-9a-zA-Z\-_+])*@([0-9a-zA-Z][\-\w]*[0-9a-zA-Z]\.)+[a-zA-Z]{2,9}$
		// ^[0-9a-zA-Z]([\-.\w]*[0-9a-zA-Z\-_+])*@([0-9a-zA-Z][\-\w]*[0-9a-zA-Z]\.)+[a-zA-Z]{2,9}$
		return /^[0-9a-zA-Z]([-_\.]?[0-9a-zA-Z])*@[0-9a-zA-Z]([-_\.]?[0-9a-zA-Z])*\.[a-zA-Z]{2,3}$/i.test(this);
	};
}

// 휴대폰번호 형식 체크
if (!String.prototype.isMobile) {
	String.prototype.isMobile = function () {
		// 010은 중간이 4자리
		// 011 016 017 018 019는 중간이 3~4자리
		return /^(?:(010-?\d{4})|(01[1|6|7|8|9]-?\d{3,4}))-?\d{4}$/.test(this);

	};
}

// 전화번호 형식 체크
if (!String.prototype.isTel) {
	String.prototype.isTel = function () {
		// 서울 02
		// 경기 031 / 인천 032 / 강원 033
		// 충남 041 / 대전 042 / 충북 043 / 세종 044
		// 부산 051 / 울산 052 / 대구 053 / 경북 054 / 경남 055
		// 전남 061 / 광주 062 / 전북 063 / 제주 064
		return /^0(2|3[1-3]|4[1-4]|5[1-5]|6[1-4])-?\d{3,4}-?\d{4}$/.test(this);
	};
}

// ID 형식 체크
if (!String.prototype.isId) {
	String.prototype.isId = function () {
		return /^[a-z]{1}[a-z0-9_]{1,49}$/.test(this);
	};
}

// 날짜 형식 체크
if (!String.prototype.isDate) {
	String.prototype.isDate = function () {
		return /^(19|20)\d{2}-?(0[1-9]|1[012])-?(0[1-9]|[12][0-9]|3[0-1])$/.test(this);
	};
}

// 숫자 3자리 단위로 , 추가
if (!String.prototype.getComma) {
	String.prototype.getComma = function (n, s) {
		var num = this.trim();
		var m   = parseInt((n == undefined) ? 3 : n);
		var n   = (s == undefined) ? "," : s;
		var str = eval("/(-?[0-9]+)([0-9]{" + m + "})/");

		while ((str).test(num)) {
			num = num.replace((str), "$1" + n + "$2");
		}
		return num;
	};
}

// 숫자 자리수에 맞춰 반환
if (!String.prototype.zerofill) {
	String.prototype.zerofill = function (cnt) {
		var digit = "";
		if (this.length < cnt) {
			for (var i = 0; i < cnt - this.length; i++) {
				digit += "0";
			}
		}
		return digit + this;
	};
}

// 확장자
if (!String.prototype.getExt) {
	String.prototype.getExt = function () {
		return (this.indexOf(".") < 0) ? "" : this.substring(this.lastIndexOf(".") + 1, this.length);
	};
}

// 문자열 byte
if (!String.prototype.byteLength) {
	String.prototype.byteLength = function () {
		// 한글,한자 등 = 2byte
		// 그외 = 1byte
		var cnt = 0;
		for (var i = 0; i < this.length; i++) {
			if (this.charCodeAt(i) > 127) {
				cnt += 2;
			} else {
				cnt++;
			}
		}
		return cnt;
	};
}

// 최소, 최대 바이트 길이
// '문자열'.isByteLength(min [,max])
if (!String.prototype.isByteLength) {
	String.prototype.isByteLength = function () {
		var min     = arguments[0];
		var max     = arguments[1] ? arguments[1] : null;
		var success = true;
		if (this.byteLength() < min) {
			success = false;
		}
		if (max && this.byteLength() > max) {
			success = false;
		}
		return success;
	};
}

// 최소, 최대 길이
// '문자열'.isLength(min [,max])
if (!String.prototype.isLength) {
	String.prototype.isLength = function () {
		var min     = arguments[0];
		var max     = arguments[1] ? arguments[1] : null;
		var success = true;
		if (this.length < min) {
			success = false;
		}
		if (max && this.length > max) {
			success = false;
		}
		return success;
	};
}

// 공백, null 홖인
if (!String.prototype.isBlank) {
	String.prototype.isBlank = function () {
		if (this == null) {
			return true;
		}
		var str = this.trim();
		if (str == '') {
			return true;
		}
		for (var i = 0; i < str.length; i++) {
			if ((str.charAt(i) != "\t") && (str.charAt(i) != "\n") && (str.charAt(i) != "\r")) {
				return false;
			}
		}
		return true;
	};
}

// 한글
if (!String.prototype.isKor) {
	String.prototype.isKor = function () {
		return (/^[가-힣]+$/).test(this) ? true : false;
	};
}

// 영문
if (!String.prototype.isEng) {
	String.prototype.isEng = function () {
		return /^[a-zA-Z]+$/.test(this);
	};
}

// 숫자
if (!String.prototype.isNum) {
	String.prototype.isNum = function (min, max) {
		var valid = (/^[0-9]+$/).test(this);
		if (valid) {
			var value = parseInt(this);
			if (min != undefined && min != null) {
				valid = min <= value;
			}
		}
		if (valid) {
			var value = parseInt(this);
			if (max != undefined && max != null) {
				valid = value <= max;
			}
		}
		return valid;
	};
}

// 한글 + 영어
if (!String.prototype.isKorEng) {
	String.prototype.isKorEng = function () {
		return (/^[가-힣a-zA-z]+$/).test(this);
	};
}

// 영문 + 숫자
if (!String.prototype.isEngNum) {
	String.prototype.isEngNum = function () {
		return /^[a-zA-Z0-9]+$/.test(this);
	};
}

// 한글 + 영문 + 숫자
if (!String.prototype.isKorEng) {
	String.prototype.isKorEng = function () {
		return (/^[가-힣a-zA-z0-9]+$/).test(this);
	};
}

// 반복 여부
if (!String.prototype.isContinued) {
	String.prototype.isContinued = function () {
		var cnt1 = 0;
		var cnt2 = 0;
		var tmp0 = '';
		var tmp1 = '';
		var tmp2 = '';
		var tmp3 = '';

		for (var i = 0; i < this.length - 3; i++) {
			tmp0 = this.charAt(i);
			tmp1 = this.charAt(i + 1);
			tmp2 = this.charAt(i + 2);
			tmp3 = this.charAt(i + 3);

			if (tmp0.charCodeAt(0) - tmp1.charCodeAt(0) == 1
				&& tmp1.charCodeAt(0) - tmp2.charCodeAt(0) == 1
				&& tmp2.charCodeAt(0) - tmp3.charCodeAt(0) == 1) {
				cnt1++;
			}

			if (tmp0.charCodeAt(0) - tmp1.charCodeAt(0) == -1
				&& tmp1.charCodeAt(0) - tmp2.charCodeAt(0) == -1
				&& tmp2.charCodeAt(0) - tmp3.charCodeAt(0) == -1) {
				cnt2++
			}
		}

		return (cnt1 > 0 || cnt2 > 0);
	};
}

if (!Date.prototype.yyyyMMdd) {
	Date.prototype.yyyyMMdd = function (separator) {
		separator = separator || '';

		var mm = this.getMonth() + 1; // getMonth() is zero-based
		var dd = this.getDate();

		return [
			this.getFullYear(),
			(mm > 9 ? '' : '0') + mm,
			(dd > 9 ? '' : '0') + dd
		].join(separator);
	};
}
