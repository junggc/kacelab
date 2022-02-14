$(function () {
	var $wrap         = $('.wrap');
	var totalPages    = null;
	var currentPageNo = null;

	// ids
	var key            = $('[name=key]').val();
	var rid            = $('[name=rid]').val();
	var isPreview      = $('[name=isPreview]').val() == '1';
	var respondentId   = $('[name=respondentId]').val();
	var projectInfoId  = $('[name=projectInfoId]').val();
	var questionInfoId = $('[name=questionInfoId]').val();

	// 진단
	var $infoForm        = $('#infoForm');
	var $questionView    = $infoForm.find('.questionView');
	var $infoFormPrevBtn = $infoForm.find('.infoFormPrevBtn');
	var $infoFormNextBtn = $infoForm.find('.infoFormNextBtn');
	var $infoFormCompBtn = $infoForm.find('.infoFormCompBtn');

	$infoFormPrevBtn.on('click', function () {
		goPage(currentPageNo - 1, false);
		return false;
	});
	$infoForm.find('.infoShowTempSaveFormBtn').on('click', function () {
		$tempSaveForm.show().siblings().hide();
		$tempSavePassword2.val('');
		$tempSavePassword1.val('').focus();
		return false;
	});
	$infoForm.find('.infoLoadTempFormBtn').on('click', function () {
		$loadTempForm.show().siblings().hide();
		$loadTempPassword.val('').focus();
		return false;
	});
	$infoFormNextBtn.on('click', function () {
		goPage(currentPageNo + 1, true);
		return false;
	});
	$infoFormCompBtn.on('click', function () {
		if (!confirm(i18n.form_is_comp)) {
			return false;
		}

		var answers = qu.validArticles($questionView.find('.articleWrap'), false, goPage);
		//console.log('$infoFormCompBtn - answers', answers);

		if (answers == null) {
			return false;
		}

		// 미리보기
		if (isPreview) {
			alert(i18n.form_preview);
			return false;
		}

		var param = {
			key           : key,
			rid           : rid,
			respondentId  : respondentId,
			projectInfoId : projectInfoId,
			questionInfoId: questionInfoId,
			isCompleted   : 1,
			password      : null,
			answer        : answers
		};

		$.ajax({
			url        : '/ra/save',
			method     : 'post',
			data       : JSON.stringify(param),
			contentType: "application/json; charset=utf-8",
			dataType   : 'json',
			success    : function () {
				alert(i18n.form_comp);
				$infoComp.show().siblings().hide();
			},
			error      : function (jqXHR, textStatus, errorThrown) {
				langErrorMessage(jqXHR, textStatus, errorThrown);
			}
		});

		return false;
	});

	// ----------------------------------------------------------------------------------------------------
	// 진단 완료
	var $infoComp = $('#infoComp');

	// ----------------------------------------------------------------------------------------------------
	// 임시 저장
	var $tempSaveForm      = $('#tempSaveForm');
	var $tempSavePassword1 = $tempSaveForm.find('[name=password1]');
	var $tempSavePassword2 = $tempSaveForm.find('[name=password2]');
	$('.showInfoFormBtn').on('click', function () {
		// 공통
		$infoForm.show().siblings().hide();
		return false;
	});
	$tempSaveForm.find('.tempSaveFormBtn').on('click', function () {
		// 임시저장~
		if ($tempSavePassword1.val() == '') {
			alert(i18n.form_temp_save_pw1);
			$tempSavePassword1.focus();
			return false;
		}

		if ($tempSavePassword1.val() != $tempSavePassword2.val()) {
			alert(i18n.form_temp_save_pw2);
			$tempSavePassword2.focus();
			return false;
		}

		// 미리보기
		if (isPreview) {
			alert(i18n.form_preview);
			return false;
		}

		var answers = qu.validArticles($questionView.find('.articleWrap'), true, goPage);
		//console.log('$tempSaveForm - answers', answers);

		var param = {
			key           : key,
			rid           : rid,
			respondentId  : respondentId,
			projectInfoId : projectInfoId,
			questionInfoId: questionInfoId,
			isCompleted   : 0,
			password      : $tempSavePassword1.val(),
			answer        : answers
		};

		$.ajax({
			url        : '/ra/save',
			method     : 'post',
			data       : JSON.stringify(param),
			contentType: "application/json; charset=utf-8",
			dataType   : 'json',
			success    : function () {
				alert(i18n.form_temp_save_comp);
				$tempSaveComp.show().siblings().hide();
			},
			error      : function (jqXHR, textStatus, errorThrown) {
				langErrorMessage(jqXHR, textStatus, errorThrown);
			}
		});

		return false;
	});

	// ----------------------------------------------------------------------------------------------------
	// 임시 저장 완료
	var $tempSaveComp = $('#tempSaveComp');
	// showInfoFormBtn

	// ----------------------------------------------------------------------------------------------------
	// 불러오기
	var $loadTempForm     = $('#loadTempForm');
	var $loadTempPassword = $loadTempForm.find('[name=password]');

	// showInfoFormBtn
	$loadTempForm.find('.loadTempFormBtn').on('click', function (e, autoLoad) {
		if (autoLoad == undefined) {
			autoLoad = false;
		}

		if (!autoLoad) {
			// 불러오기
			if ($loadTempPassword.val() == '') {
				alert(i18n.form_load_temp_form_pw);
				$loadTempPassword.focus();
				return false;
			}

			if (!confirm(i18n.form_load_temp_form_clear)) {
				return false;
			}

			// 미리보기
			if (isPreview) {
				alert(i18n.form_preview);
				return false;
			}
		}

		var param = {
			key           : key,
			rid           : rid,
			respondentId  : respondentId,
			projectInfoId : projectInfoId,
			questionInfoId: questionInfoId,
			password      : $loadTempPassword.val()
		};

		$.ajax({
			url        : '/ra/load',
			method     : 'post',
			data       : JSON.stringify(param),
			contentType: "application/json; charset=utf-8",
			dataType   : 'json',
			success    : function (resp) {
				alert(i18n.form_load_temp_form_comp);

				// reset
				$infoForm.find('input[name^="article"][type=text]').val('');
				$infoForm.find('input[name^="article"][type=radio]:checked').prop('checked', false);
				$infoForm.find('input[name^="article"][type=checkbox]:checked').prop('checked', false);
				$infoForm.find('textarea[name^="article"]').val('');
				$infoForm.find('select[name^="article"] option:selected').prop('selected', false);
				$infoForm.find('a[name^="article"]').removeClass('on');

				// 불러오기
				var maxOrd = 0;
				if (resp) {
					for (var i = 0, max = resp.length; i < max; i++) {
						var row     = resp[i];
						var $parent = $('.articleWrap[data-ord="{0}"]'.fmt(row.article_ord));
						var data    = $parent.data();
						var ord     = data.ord;
						var type    = data.typeCode;

						var ordX        = parseInt(row.ord_x);
						var ordY        = parseInt(row.ord_y);
						var contents    = row.contents == null ? '' : row.contents;
						var priorityNum = parseInt(row.priority_num);

						// 마지막 답변 문항
						if (maxOrd < ord) {
							maxOrd = ord;
						}

						switch (type) {
							case '05010000':
							case '05020000': {
								$parent.find('[name="article[{0}][ordY]"][value="{1}"]'.fmt(ord, ordY)).prop('checked', true);

								var $contents = $parent.find('[name="article[{0}][contents]"]'.fmt(ord));
								if ($contents.length > 0) {
									$contents.val(contents).prop('disabled', false);
								}
								break;
							}
							case '05030000': {
								$parent.find('[name="article[{0}][priorityNum]"]:eq({1}) option[value="{2}"]'.fmt(ord, priorityNum - 1, ordY)).prop('selected', true);

								var $contents = $parent.find('li[data-item-ord-y="{1}"] [name="article[{0}][contents]"]'.fmt(ord, ordY));
								if ($contents.length > 0) {
									$contents.val(contents).prop('disabled', false);
								}
								break;
							}
							case '05040000':
							case '05050000': {
								$parent.find('[name="article[{0}][{1}][ordX]"][value="{2}"]'.fmt(ord, ordY, ordX)).prop('checked', true);
								break;
							}
							case '05060000': {
								$parent.find('[name="article[{0}][{1}][priorityNum]"]:eq({2}) option[value="{3}"]'.fmt(ord, ordY, priorityNum - 1, ordX)).prop('selected', true);
								break;
							}
							case '05070000':
							case '05090000': {
								$parent.find('[name="article[{0}][contents]"]'.fmt(ord)).val(contents);
								break;
							}
							case '05080000':
							case '05100000': {
								$parent.find('[name="article[{0}][contents]"][data-item-ord-x="{1}"][data-item-ord-y="{2}"]'.fmt(ord, ordX, ordY)).val(contents);
								break;
							}
							case '05110000':
							case '05120000': {
								$parent.find('[name="article[{0}][{1}][ordY]"][value="{2}"]'.fmt(ord, ordX, ordY)).prop('checked', true);
								break;
							}
							case '05140000': {
								$parent.find('[name="article[{0}]"][data-value="{1}"]'.fmt(ord, contents)).addClass('on');
								break;
							}
							case '05150000': {
								break;
							}
						}
					}
				}

				$infoForm.show().siblings().hide();

				// 진단 불러오기 마지막 페이지로 이동
				if (maxOrd > 0) {
					var pageNo = $('[data-ord="' + maxOrd + '"]').closest('.page').index() + 1;
					goPage(pageNo, false);
				}
			},
			error      : function (jqXHR, textStatus, errorThrown) {
				langErrorMessage(jqXHR, textStatus, errorThrown);
			}
		});

		return false;
	});

	// ----------------------------------------------------------------------------------------------------
	var goPage = function (pageNo, validChecked) {
		if (pageNo < 1) {
			alert(i18n.form_first_page);
			return false;
		}
		if (pageNo > totalPages) {
			alert(i18n.form_last_page);
			return false;
		}
		if (validChecked) {
			// validation check;
			var $articles = $questionView.find('.page').eq(currentPageNo - 1).find('.articleWrap');
			var answers   = qu.validArticles($articles, false, goPage);

			//console.log('goPage - valid - answers', answers);

			if (answers == null) {
				return false;
			}
		}

		var $currentPage  = $questionView.find('.page').eq(pageNo - 1);
		var $prevPages    = $currentPage.prevAll('.page');
		var totalArticles = $questionView.find('.articleWrap').length;
		var prevArticles  = 0;

		if ($prevPages.length == 0) {
			prevArticles = 0;
		} else {
			prevArticles = $prevPages.find('.articleWrap').length;
		}

		// 문항 상태 바 표기
		$('.gage').css('width', parseInt(prevArticles / totalArticles * 100) + '%')
		          .find('div').text(prevArticles + '/' + totalArticles);

		// 선택 페이지 노출
		$currentPage.show().siblings().hide();
		currentPageNo = pageNo;

		// 첫, 마지막 페이지 시 버튼 노출 설정
		if (totalPages == 1) {
			$infoFormPrevBtn.show();
			$infoFormNextBtn.hide();
			$infoFormCompBtn.show();
		} else {
			if (pageNo < 2) {
				$infoFormPrevBtn.show();
				$infoFormNextBtn.show();
				$infoFormCompBtn.hide();
			} else if (pageNo >= totalPages) {
				$infoFormPrevBtn.show();
				$infoFormNextBtn.hide();
				$infoFormCompBtn.show();
			} else {
				$infoFormPrevBtn.show();
				$infoFormNextBtn.show();
				$infoFormCompBtn.hide();
			}
		}

		$(window).scrollTop(0);
	};

	var init = function () {
		var $page = null;

		// 페이지 생성
		$questionView.find('.articleWrap').each(function (i) {
			if (i == 0) {
				$page = $('<div class="page"/>')
				$questionView.append($page);
			}

			var data  = $(this).data();
			var $this = $(this).detach();
			$page.append($this);

			if (data.isSeparator) {
				$page = $('<div class="page"/>')
				$questionView.append($page);
			}
		});

		// 빈 페이지 삭제
		$questionView.find('.page').each(function () {
			if ($(this).find('.articleWrap').length == 0) {
				$(this).remove();
			}
		});

		// 전체 페이지 및 현재 페이지 설정
		totalPages    = $questionView.find('.page').length;
		currentPageNo = 1;

		//console.log('totalPages: %o, currentPageNo: %o', totalPages, currentPageNo);

		// user input event
		qu.addUserInputEventToArticles($questionView);

		// 첫페이지 및 from show
		goPage(1, false);
		$infoForm.show().siblings().hide();
	};

	init();
});