var qu = window.qu || {};

qu.addUserInputEventToArticles = function ($articlesWrap) {
	/*
		typeCode
		isRequired
		requiredMinNum
		requiredMaxNum
		priorityNum
		isDuplicate
		rangeMinScore
		rangeMaxScore
		valueMaxLength
		valueSum
		inputType
	*/

	// 단일 선택형
	// view  - 랜덤, 한줄갯수
	// input - 단건 - ord_y, contents
	$articlesWrap.find('.articleWrap[data-type-code="05010000"] [name$="[ordY]"]').on('click', function () {
		var $articleWrap = $(this).closest('.articleWrap');

		// etc
		var $contents = $articleWrap.find('[name$="[contents]"]');
		$contents.each(function () {
			$(this).prop('disabled', $(this).closest('li').find('[name$="[ordY]"]:checked').length == 0);
		});
	});

	// 복수 선택형
	// view  - 랜덤, 한줄갯수
	// input - 복수 min~max - ord_y, contents
	$articlesWrap.find('.articleWrap[data-type-code="05020000"] [name$="[ordY]"]').on('click', function () {
		var $articleWrap = $(this).closest('.articleWrap');

		var data           = $articleWrap.data();
		var requiredMinNum = data.requiredMinNum;
		var requiredMaxNum = data.requiredMaxNum;

		// min ~ max
		var name     = $(this).attr('name');
		var $targets = $articleWrap.find('[name="{0}"]:checked'.fmt(name));
		if ($targets.length > requiredMaxNum) {
			alert(i18n.view_05020000_01.fmt(requiredMinNum, requiredMaxNum));
			return false;
		}

		// etc
		var $contents = $articleWrap.find('[name$="[contents]"]');
		$contents.each(function () {
			$(this).prop('disabled', $(this).closest('li').find('[name$="[ordY]"]:checked').length == 0);
		})
	});

	// 순위 선택형
	// view  - 랜덤, 한줄갯수, 중복여부
	// input - 복수 우선순위갯수 - ord_y, contents, priority_num
	$articlesWrap.find('.articleWrap[data-type-code="05030000"] [name$="[priorityNum]"]').on('change', function () {
		var $articleWrap = $(this).closest('.articleWrap');

		var data        = $articleWrap.data();
		var isDuplicate = data.isDuplicate;

		var enabledEtc = function () {
			var $priorityNum = $articleWrap.find('[name$="[priorityNum]"]');
			var $contents    = $articleWrap.find('[name$="[contents]"]');
			$contents.each(function () {
				var itemData = $(this).closest('li').data();
				var itemOrdY = itemData.itemOrdY;

				$(this).prop('disabled', $priorityNum.find('option[value="{0}"]:selected'.fmt(itemOrdY)).length == 0);
			});
		};

		// 중복
		if (isDuplicate) {
			var name     = $(this).attr('name');
			var value    = $(this).val();
			var $targets = $articleWrap.find('[name="{0}"]'.fmt(name)).find('option[value="{0}"]:selected'.fmt(value));
			if ($targets.length > 1) {
				alert(i18n.view_05030000_01);
				$(this).find('option:selected').prop('selected', false);
				$(this).focus();

				enabledEtc();
				return false;
			}
		}

		// etc
		enabledEtc();
	});

	/* ---------------------------------------------------------------------------------------------------- */

	// 표 단일 선택형
	// view  - 랜덤
	// input - 복수 y별 - ord_x, ord_y
	// $articlesWrap.find('.articleWrap[data-type-code="05040000"]');

	// 표 복수 선택형
	// view  - 랜덤
	// input - 복수 y별 min~max - ord_x, ord_y
	$articlesWrap.find('.articleWrap[data-type-code="05050000"] [name$="[ordX]"]').on('click', function () {
		var $articleWrap = $(this).closest('.articleWrap');

		var data           = $articleWrap.data();
		var requiredMinNum = data.requiredMinNum;
		var requiredMaxNum = data.requiredMaxNum;

		// min ~ max
		var name     = $(this).attr('name');
		var $targets = $articleWrap.find('[name="{0}"]:checked'.fmt(name));
		if ($targets.length > requiredMaxNum) {
			alert(i18n.view_05050000_01.fmt(requiredMinNum, requiredMaxNum));
			return false;
		}
	});

	// 표 순위 선택형
	// view  - 랜덤, 중복여부
	// input - 복수 y별 우선순위갯수 - ord_x, ord_y, priority_num
	$articlesWrap.find('.articleWrap[data-type-code="05060000"] [name$="[priorityNum]"]').on('change', function () {
		var $articleWrap = $(this).closest('.articleWrap');

		var data        = $articleWrap.data();
		var isDuplicate = data.isDuplicate;

		// 중복
		if (isDuplicate) {
			var name     = $(this).attr('name');
			var value    = $(this).val();
			var $targets = $articleWrap.find('[name="{0}"]'.fmt(name)).find('option[value="{0}"]:selected'.fmt(value));
			if ($targets.length > 1) {
				alert(i18n.view_05060000_01);
				$(this).find('option:selected').prop('selected', false);
				$(this).focus();
				return false;
			}
		}
	});

	/* ---------------------------------------------------------------------------------------------------- */

	// 주관식 입력형
	// view  - 글자수제한
	// input - 단건 - contents
	$articlesWrap.find('.articleWrap[data-type-code="05070000"] [name$="[contents]"]').on('keyup', function () {
		var $articleWrap = $(this).closest('.articleWrap');

		var data           = $articleWrap.data();
		var valueMaxLength = data.valueMaxLength;

		// 글자수 제한
		var value = $(this).val();
		if (value.length > valueMaxLength) {
			$(this).val(value.substring(0, valueMaxLength));
			alert(i18n.view_05070000_01.fmt(valueMaxLength));
			$(this).focus();
		}
	});

	// 표 주관식 입력형
	// view  - 랜덤
	// input - 복수 x*y별 - ord_x, ord_y, contents
	// $articlesWrap.find('.articleWrap[data-type-code="05080000"]');

	// 숫자 입력형
	// view  - 1 ~ 최대 100 내 범위 내에서 숫자만 입력 가능
	// input - 단건 - contents
	$articlesWrap.find('.articleWrap[data-type-code="05090000"] [name$="[contents]"]').on('keyup', function () {
		var $articleWrap = $(this).closest('.articleWrap');

		var data           = $articleWrap.data();
		var valueMaxLength = data.valueMaxLength;

		// 글자수 제한
		var value = $(this).val();
		if (!value.isNum()) {
			alert(i18n.view_05090000_01.fmt(valueMaxLength));
			$(this).val(value.replace(/[^0-9]*/gi, ''));
			$(this).focus();
			return;
		}
		value = parseInt(value);
		if (value > valueMaxLength || value < 1) {
			alert(i18n.view_05090000_02.fmt(valueMaxLength));
			$(this).val('');
			$(this).focus();
			return;
		}
	});

	// 표 숫자 입력형
	// view  - 숫자 합계
	// input - 복수 y별 - ord_y, contents
	$articlesWrap.find('.articleWrap[data-type-code="05100000"] [name$="[contents]"]').on('keyup', function () {
		var $articleWrap = $(this).closest('.articleWrap');

		var data     = $articleWrap.data();
		var valueSum = data.valueSum;

		// 합계
		var value = $(this).val();
		if (value != '' && !value.isNum()) {
			alert(i18n.view_05100000_01);
			$(this).val(value.replace(/[^0-9]*/gi, ''));
			$(this).focus();
			return;
		}
		/*
		var sum = 0;
		$articleWrap.find('[name$="[contents]"]').each(function () {
			var v = $(this).val();
			if (v != '' && v.isNum()) {
				sum += parseInt(v);
			}
		});
		if (sum > valueSum) {
			alert(i18n.view_05100000_02.fmt(valueSum));
			return;
		}
		*/
	});

	/* ---------------------------------------------------------------------------------------------------- */

	// 세로 단일 선택형
	// view  - 랜덤
	// input - 복수 x별 - ord_x, ord_y
	// $articlesWrap.find('.articleWrap[data-type-code="05110000"]');

	// 세로 복수 선택형
	// view  - 랜덤
	// input - 복수 x별 min~max - ord_x, ord_y
	$articlesWrap.find('.articleWrap[data-type-code="05120000"] [name$="[ordY]"]').on('click', function () {
		var $articleWrap = $(this).closest('.articleWrap');

		var data           = $articleWrap.data();
		var requiredMinNum = data.requiredMinNum;
		var requiredMaxNum = data.requiredMaxNum;

		// min ~ max
		var name     = $(this).attr('name');
		var $targets = $articleWrap.find('[name="{0}"]:checked'.fmt(name));
		if ($targets.length > requiredMaxNum) {
			alert(i18n.view_05120000_01.fmt(requiredMinNum, requiredMaxNum));
			return false;
		}
	});

	/* ---------------------------------------------------------------------------------------------------- */

	// 선호도 형
	// view  - N/A
	// input - 단건 - ord_x
	$articlesWrap.find('.articleWrap[data-type-code="05140000"] .prefer a').on('click', function () {
		$(this).addClass('on');
		$(this).parent('li').siblings().children('a').removeClass('on');
		return false;
	});

};

qu.validArticles = function ($articles, isTempSave, goPage) {
	var result = [];
	var valid  = true;

	$articles.each(function () {
		var $this  = $(this);
		var title  = $this.find('.no').text();
		var top    = $this.offset().top;
		var pageNo = $this.closest('.page').index() + 1;

		var data = $this.data();
		// var id             = data.id;
		// var questionInfoId = data.questionInfoId;
		// var typeCode       = data.typeCode;
		// var dep            = data.dep;
		var ord        = data.ord;
		// var isSeparator    = data.isSeparator == 1;
		var isRequired = data.isRequired == 1;
		// var isRandom       = data.isRandom == 1;
		// var colsNum        = data.colsNum;
		var requiredMinNum = data.requiredMinNum;
		var requiredMaxNum = data.requiredMaxNum;
		var priorityNum    = data.priorityNum;
		var isDuplicate    = data.isDuplicate == 1;
		var rangeMinScore  = data.rangeMinScore;
		var rangeMaxScore  = data.rangeMaxScore;
		var valueMaxLength = data.valueMaxLength;
		var valueSum       = data.valueSum;
		var inputType      = data.inputType;

		// 임시 저장일 때는 validation 무시하고 모든 데이터를 파라미터로 생성 (현재 입력 값 자체를 그대로 저장하기 위함)
		if (isTempSave) {
			isRequired = false;
		}

		// 문항 타입별 validation
		switch (data.typeCode) {
			case '05010000': {
				// 단일 선택형
				// view  - 랜덤, 한줄갯수
				// input - 단건 - ord_y, contents
				var $selected = $this.find('[name$="[ordY]"]:checked');

				if (isRequired) {
					if ($selected.length == 0) {
						valid = false;
						goPage(pageNo);
						$(window).scrollTop(top);

						alert(i18n.form_05010000_01.fmt(title));
						$this.find('[name$="[ordY]"]:eq(0)').focus();
						return false;
					}

					var $contents = $selected.closest('li').find('[name$="[contents]"]');

					if ($contents.length > 0 && $contents.val() == '') {
						valid = false;
						goPage(pageNo);
						$(window).scrollTop(top);

						alert(i18n.form_05010000_02.fmt(title));
						$contents.focus();
						return false;
					}

					var ordY     = parseInt($selected.val());
					var contents = $contents.length == 0 ? null : $contents.val();

					result.push(new Answer(ord, 0, ordY, contents, null));

				} else {
					if ($selected.length == 0) {
						return true;
					}

					var ordY      = parseInt($selected.val());
					var $contents = $selected.closest('li').find('[name$="[contents]"]');
					var contents  = $contents.length == 0 ? null : $contents.val();

					result.push(new Answer(ord, 0, ordY, contents, null));
				}
				break;
			}
			case '05020000': {
				// 복수 선택형
				// view  - 랜덤, 한줄갯수
				// input - 복수 min~max - ord_y, contents
				var $selected = $this.find('[name$="[ordY]"]:checked');

				if (isRequired) {
					var selectedLength = $selected.length;

					if (!(requiredMinNum <= selectedLength && requiredMaxNum >= selectedLength)) {
						valid = false;
						goPage(pageNo);
						$(window).scrollTop(top);

						alert(i18n.form_05020000_01.fmt(title, requiredMinNum, requiredMaxNum));
						$this.find('[name$="[ordY]"]:eq(0)').focus();
						return false;
					}

					$selected.each(function () {
						var value     = $(this).val();
						var $contents = $(this).closest('li').find('[name$="[contents]"]');
						var ordY      = parseInt(value);
						var contents  = $contents.val() == undefined ? null : $contents.val();

						if ($contents.length > 0 && $contents.val() == '') {
							valid = false;
							goPage(pageNo);
							$(window).scrollTop(top);

							alert(i18n.form_05020000_02.fmt(title));
							$contents.focus();
							return false;
						}

						result.push(new Answer(ord, 0, ordY, contents, null));
					});

					if (!valid) {
						return false;
					}
				} else {
					$selected.each(function () {
						var value     = $(this).val();
						var $contents = $(this).closest('li').find('[name$="[contents]"]');
						var ordY      = parseInt(value);
						var contents  = $contents.val() == undefined ? null : $contents.val();

						result.push(new Answer(ord, 0, ordY, contents, null));
					});
				}
				break;
			}
			case '05030000': {
				// 순위 선택형
				// view  - 랜덤, 한줄갯수, 중복여부
				// input - 복수 우선순위갯수 - ord_y, contents, priority_num
				var $selected     = $this.find('[name$="[priorityNum]"]');
				var tmpDuplicated = {};

				$selected.each(function (itemIndex) {
					var value       = $(this).val();
					var $contents   = $this.find('[data-item-ord-y="{0}"]'.fmt(value)).find('[name$="[contents]"]');
					var ordY        = value == '' ? null : parseInt(value);
					var contents    = $contents.val() == undefined ? null : $contents.val();
					var priorityNum = itemIndex + 1;

					if (isRequired) {
						if (ordY == null) {
							valid = false;
							goPage(pageNo);
							$(window).scrollTop(top);

							alert(i18n.form_05030000_01.fmt(title, priorityNum));
							$(this).focus();
							return false;
						}

						// 중복 허용 안할 경우
						if (isDuplicate) {
							if (tmpDuplicated[value] == 1) {
								valid = false;
								goPage(pageNo);
								$(window).scrollTop(top);

								alert(i18n.form_05030000_02.fmt(title));
								$(this).focus();
								return false;
							}
						}

						if ($contents.length > 0 && $contents.val() == '') {
							valid = false;
							goPage(pageNo);
							$(window).scrollTop(top);

							alert(i18n.form_05030000_03.fmt(title));
							$contents.focus();
							return false;
						}

						tmpDuplicated[value] = 1;
					} else {
						if (ordY == null) {
							return true;
						}
					}

					result.push(new Answer(ord, 0, ordY, contents, priorityNum));
				});

				if (!valid) {
					return false;
				}
				break;
			}
			case '05040000': {
				// 표 단일 선택형
				// view  - 랜덤
				// input - 복수 y별 - ord_x, ord_y
				var $groups = $this.find('.exCho > ul > li');

				$groups.each(function (groupIndex) {
					var $selected = $(this).find('[name$="[ordX]"]:checked');
					var ordX      = $selected.val() == undefined ? null : parseInt($selected.val());
					var ordY      = groupIndex + 1;

					if (isRequired) {
						if ($selected.length == 0) {
							valid = false;
							goPage(pageNo);
							$(window).scrollTop(top);

							alert(i18n.form_05040000_01.fmt(title, ordY));
							$(this).find('[name$="[ordX]"]:eq(0)').focus();
							return false;
						}
					} else {
						if ($selected.length == 0) {
							return true;
						}
					}

					result.push(new Answer(ord, ordX, ordY, null, null));
				});

				if (!valid) {
					return false;
				}
				break;
			}
			case '05050000': {
				// 표 복수 선택형
				// view  - 랜덤
				// input - 복수 y별 min~max - ord_x, ord_y
				var $groups = $this.find('.exCho > ul > li');

				$groups.each(function (groupIndex) {
					var $selected = $(this).find('[name$="[ordX]"]:checked');
					var ordY      = groupIndex + 1;

					if (isRequired) {
						var selectedLength = $selected.length;

						if (!(requiredMinNum <= selectedLength && requiredMaxNum >= selectedLength)) {
							valid = false;
							goPage(pageNo);
							$(window).scrollTop(top);

							alert(i18n.form_05050000_01.fmt(title, ordY, requiredMinNum, requiredMaxNum));
							$(this).find('[name$="[ordX]"]:eq(0)').focus();
							return false;
						}
					}

					$selected.each(function () {
						var value = $(this).val();
						var ordX  = parseInt(value);

						result.push(new Answer(ord, ordX, ordY, null, null));
					});
				});

				if (!valid) {
					return false;
				}
				break;
			}
			case '05060000': {
				// 표 순위 선택형
				// view  - 랜덤, 중복여부
				// input - 복수 y별 우선순위갯수 - ord_x, ord_y, priority_num
				var $groups = $this.find('.exCho > ul > li');

				$groups.each(function (groupIndex) {
					var $selected     = $(this).find('[name$="[priorityNum]"]');
					var ordY          = groupIndex + 1;
					var tmpDuplicated = {};

					$selected.each(function (itemIndex) {
						var value       = $(this).val();
						var ordX        = value == '' ? null : parseInt(value);
						var priorityNum = itemIndex + 1;

						if (isRequired) {
							if (ordX == null) {
								valid = false;
								goPage(pageNo);
								$(window).scrollTop(top);

								alert(i18n.form_05060000_01.fmt(title, ordY));
								$(this).focus();
								return false;
							}

							// 중복 허용 안할 경우
							if (isDuplicate) {
								if (tmpDuplicated[value] == 1) {
									valid = false;
									goPage(pageNo);
									$(window).scrollTop(top);

									alert(i18n.form_05060000_02.fmt(title));
									$(this).focus();
									return false;
								}
							}

							tmpDuplicated[value] = 1;
						} else {
							if (ordX == null) {
								return true;
							}
						}

						result.push(new Answer(ord, ordX, ordY, null, priorityNum));
					});

					if (!valid) {
						return false;
					}
				});

				if (!valid) {
					return false;
				}
				break;
			}
			case '05070000': {
				// 주관식 입력형
				// view  - 글자수제한
				// input - 단건 - contents
				var $selected = $this.find('[name$="[contents]"]');
				var contents  = $selected.val();

				if (isRequired) {
					if (contents == '') {
						valid = false;
						goPage(pageNo);
						$(window).scrollTop(top);

						alert(i18n.form_05070000_01.fmt(title));
						$selected.focus();
						return false;
					}
				} else {
					if (contents == '') {
						return true;
					}
				}

				if (contents.length > valueMaxLength) {
					valid = false;
					goPage(pageNo);
					$(window).scrollTop(top);

					alert(i18n.form_05070000_02.fmt(title, valueMaxLength));
					$selected.val(contents.substring(0, valueMaxLength));
					$selected.focus();
					return false;
				}

				result.push(new Answer(ord, 0, 0, contents, null));
				break;
			}
			case '05080000': {
				// 표 주관식 입력형
				// view  - 랜덤
				// input - 복수 x*y별 - ord_x, ord_y, contents

				var $groups = $this.find('.exCho > ul > li');

				$groups.each(function (groupIndex) {
					var $selected = $(this).find('[name$="[contents]"]');
					// var ordY = groupIndex + 1;

					$selected.each(function (itemIndex) {
						var value = $(this).val();
						var ordX  = $(this).data().itemOrdX; // itemIndex + 1;
						var ordY  = $(this).data().itemOrdY;

						if (isRequired) {
							if (value == '') {
								valid = false;
								goPage(pageNo);
								$(window).scrollTop(top);

								alert(i18n.form_05080000_01.fmt(title, ordY));
								$(this).focus();
								return false;
							}
						} else {
							if (value == '') {
								return true;
							}
						}
						result.push(new Answer(ord, ordX, ordY, value, null));
					});

					if (!valid) {
						return false;
					}
				});

				if (!valid) {
					return false;
				}
				break;
			}
			case '05090000': {
				// 숫자 입력형
				// view  - 글자수제한
				// input - 단건 - contents

				var $selected = $this.find('[name$="[contents]"]');
				var contents  = $selected.val();

				if (isRequired) {
					if (contents == '' || !contents.isNum()) {
						valid = false;
						goPage(pageNo);
						$(window).scrollTop(top);

						alert(i18n.form_05090000_01.fmt(title));
						$selected.val(contents.replace(/[^0-9]*/gi, ''));
						$selected.focus();
						return false;
					}
				} else {
					if (contents == '') {
						return true;
					}
					if (!contents.isNum()) {
						valid = false;
						goPage(pageNo);
						$(window).scrollTop(top);

						alert(i18n.form_05090000_01.fmt(title));
						$selected.val(contents.replace(/[^0-9]*/gi, ''));
						$selected.focus();
						return false;
					}
				}

				contents = parseInt(contents);

				if (contents > valueMaxLength || contents < 1) {
					valid = false;
					goPage(pageNo);
					$(window).scrollTop(top);

					alert(i18n.form_05090000_02.fmt(title, valueMaxLength));
					$selected.val('');
					$selected.focus();
					return false;
				}

				result.push(new Answer(ord, 0, 0, contents, null));
				break;
			}
			case '05100000': {
				// 표 숫자 입력형
				// view  - 숫자 합계
				// input - 복수 y별 - ord_y, contents

				var $groups = $this.find('.exCho > ul > li');
				var sum     = 0;

				$groups.each(function (groupIndex) {
					var $selected = $(this).find('[name$="[contents]"]');

					$selected.each(function (itemIndex) {
						var value = $(this).val();
						var ordX  = $(this).data().itemOrdX;
						var ordY  = $(this).data().itemOrdY;

						if (isRequired) {
							if (value == '' || !value.isNum()) {
								valid = false;
								goPage(pageNo);
								$(window).scrollTop(top);

								alert(i18n.form_05100000_01.fmt(title, (groupIndex + 1)));
								$(this).val(value.replace(/[^0-9]*/gi, ''));
								$(this).focus();
								return false;
							}

							sum += parseInt(value);

							if (sum > valueSum) {
								valid = false;
								goPage(pageNo);
								$(window).scrollTop(top);

								alert(i18n.form_05100000_02.fmt(title, valueSum));
								$(this).focus();
								return false;
							}

						} else {
							if (value == '') {
								return true;
							}
						}

						result.push(new Answer(ord, ordX, ordY, value, null));
					});

					if (!valid) {
						return false;
					}
				});

				if (valid) {
					if (isRequired) {
						if (sum != valueSum) {
							valid = false;
							goPage(pageNo);
							$(window).scrollTop(top);

							alert(i18n.form_05100000_02.fmt(title, valueSum));
							return false;
						}
					}
				}

				if (!valid) {
					return false;
				}
				break;
			}
			case '05110000': {
				// 세로 단일 선택형
				// view  - 랜덤
				// input - 복수 x별 - ord_x, ord_y
				var names = [];

				$this.find('.exo:eq(0) > li > input[type=radio]').each(function () {
					names.push($(this).attr('name'));
				});

				for (var i = 0; i < names.length; i++) {
					var name      = names[i];
					var $selected = $this.find('[name="{0}"]:checked'.fmt(name));
					var ordX      = i + 1;
					var ordY      = $selected.val() == undefined ? null : parseInt($selected.val());

					if (isRequired) {
						if ($selected.length == 0) {
							valid = false;
							goPage(pageNo);
							$(window).scrollTop(top);

							alert(i18n.form_05110000_01.fmt(title, ordX));
							$this.find('[name="{0}"]:eq(0)'.fmt(name)).focus();
							break;
						}
					} else {
						if ($selected.length == 0) {
							continue;
						}
					}
					result.push(new Answer(ord, ordX, ordY, null, null));
				}

				if (!valid) {
					return false;
				}
				break;
			}
			case '05120000': {
				// 세로 복수 선택형
				// view  - 랜덤
				// input - 복수 x별 min~max - ord_x, ord_y
				var names = [];

				$this.find('.exo:eq(0) > li > input[type=checkbox]').each(function () {
					names.push($(this).attr('name'));
				});

				for (var i = 0; i < names.length; i++) {
					var name      = names[i];
					var $selected = $this.find('[name="{0}"]:checked'.fmt(name));
					var ordX      = i + 1;

					if (isRequired) {
						var selectedLength = $selected.length;

						if (!(requiredMinNum <= selectedLength && requiredMaxNum >= selectedLength)) {
							valid = false;
							goPage(pageNo);
							$(window).scrollTop(top);

							alert(i18n.form_05120000_01.fmt(title, ordX, requiredMinNum, requiredMaxNum));
							$this.find('[name="{0}"]:eq(0)'.fmt(name)).focus();
							break;
						}
					}

					$selected.each(function () {
						var value = $(this).val();
						var ordY  = parseInt(value);

						result.push(new Answer(ord, ordX, ordY, null, null));
					});
				}

				if (!valid) {
					return false;
				}
				break;
			}
			// case '05130000': {break;}
			case '05140000': {
				// 선호도 형
				// view  - N/A
				// input - 단건 - ord_x
				var $selected = $this.find('.exPrefer a.on');

				if (isRequired) {
					if ($selected.length == 0) {
						valid = false;
						goPage(pageNo);
						$(window).scrollTop(top);

						alert(i18n.form_05140000_01.fmt(title));
						$this.find('.exPrefer a:eq(0)').focus();
						return false;
					}
				} else {
					if ($selected.length == 0) {
						return true;
					}
				}

				var contents = $selected.data().value;
				result.push(new Answer(ord, 0, 0, contents, null));
				break;
			}
			case '05150000': {
				// 설명문
				break;
			}
			default: {
				alert('invalid request.');
				valid = false;
				return false;
			}
		}
	});

	return valid ? result : null;
};

function Answer(articleOrd, ordX, ordY, contents, priorityNum) {
	return {
		articleOrd : articleOrd,
		ordX       : ordX,
		ordY       : ordY,
		contents   : contents,
		priorityNum: priorityNum
	}
};