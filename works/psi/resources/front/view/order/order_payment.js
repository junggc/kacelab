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

$(function () {

	var $form = $('[name=orderForm]');

	// 상품수량
	var $quantity      = $form.find('[name=quantity]');
	var $quantityPlus  = $form.find('.quantityPlus');
	var $quantityMinus = $form.find('.quantityMinus');
	var $viewPrice     = $('[data-product-price]');
	var productPrice   = parseInt($viewPrice.data('productPrice'));

	// 결제방법
	var $payType               = $form.find('[name=payType]');
	var $payTypeBtn            = $form.find('.payTypeBtn');
	var $payTypeCard           = $form.find('#payTypeCard');
	var $payTypeVirtualAccount = $form.find('#payTypeVirtualAccount');

	// 가상계좌 시 소득공제 타입
	var $taxDeductType     = $form.find('[name=taxDeductType]');
	var $perTaxDeductTel   = $form.find('[name=perTaxDeductTel]');
	var $perTaxDeductEmail = $form.find('[name=perTaxDeductEmail]');
	var $bizTaxDeductBizno = $form.find('[name=bizTaxDeductBizno]');
	var $bizTaxDeductEmail = $form.find('[name=bizTaxDeductEmail]');

	// 결제하기
	var $payAgree = $form.find('[name=payAgree]');
	var $payBtn   = $form.find('.payBtn');

	// 수량 * 가격
	var getQuantity    = function () {
		var value = $quantity.val();

		if (/^[0-9]+$/.test(value)) {
			value = parseInt(value);
		} else {
			value = 0;
		}

		return value;
	};
	var viewOrderPrice = function () {
		var orderPrice = productPrice * getQuantity();
		$viewPrice.html((orderPrice + '').getComma());
	};

	// init
	var init = function () {
	};

	// 수량
	$quantity.on('keyup', function () {
		viewOrderPrice();

	}).on('blur', function () {
		var value = getQuantity();

		if (value < 1) {
			alert('수량을 1개 이상 입력해 주세요.');
			value = 1;
		}

		$(this).val(value);
		viewOrderPrice();
	});

	// 상품수량 증가
	$quantityPlus.on('click', function () {
		var value = getQuantity();

		value = value + 1;

		$quantity.val(value);
		viewOrderPrice();
		return false;
	});

	// 상품수량 차감
	$quantityMinus.on('click', function () {
		var value = getQuantity();

		value = value - 1;

		if (value < 1) {
			alert('수량을 1개 이상 입력해 주세요.');
			value = 1;
		}
		$quantity.val(value);
		viewOrderPrice();
		return false;
	});

	// 결제방법
	$payTypeBtn.on('click', function () {
		if ($(this).hasClass('on')) {
			return false;
		}

		// 영역 노출
		var targetId = $(this).attr('href');
		$('[id^=payType]').hide();
		$(targetId).show();

		// 버튼 활성화
		$payTypeBtn.removeClass('on');
		$(this).addClass('on');

		return false;
	});

	// 가상계좌 시 소득공제 타입
	$taxDeductType.on('click', function () {
		var value = $(this).val();

		var targetId = '#taxDeductType-' + value;
		$('[id^=taxDeductType]').hide();
		$(targetId).show();
	});

	// 결제하기
	$payBtn.on('click', function () {
		$form.trigger('submit');
		return false;
	});

	$form.on('submit', function () {
		// 약관 동의
		if (!$payAgree.prop('checked')) {
			alert('"(필수) 주문하실 진단명, 구매금액을 최종 확인하였으며, 회원 본인은 결제에 동의합니다."에 동의 후 결제하실 수 있습니다.');
			$payAgree.focus();
			return false;
		}

		// 소득공제
		if ($('.payTypeBtn.on').attr('href') == '#payTypeVirtualAccount') {
			var taxDeductType = $taxDeductType.filter(':checked').val();

			if (taxDeductType == 'PER') {
				if ($perTaxDeductTel.val() == '') {
					alert('휴대폰번호를 입력해 주세요.');
					$perTaxDeductTel.focus();
					return false;
				}
				if ($perTaxDeductEmail.val() == '') {
					alert('이메일을 입력해 주세요.');
					$perTaxDeductEmail.focus();
					return false;
				}
			} else if (taxDeductType == 'BIZ') {
				if ($bizTaxDeductBizno.val() == '') {
					alert('사업자번호를 입력해 주세요.');
					$bizTaxDeductBizno.focus();
					return false;
				}
				if ($bizTaxDeductEmail.val() == '') {
					alert('이메일을 입력해 주세요.');
					$bizTaxDeductEmail.focus();
					return false;
				}
			}

			$payType.val('VIRTUAL_ACCOUNT');
		} else {
			$payType.val('CARD');
		}

		$(this).ajaxSubmit({
			dataType: 'json',
			success : function (data, textStatus, jqXHR) {
				console.log('success', data);

				data.successUrl = window.location.origin + data.successUrl;
				data.failUrl    = window.location.origin + data.failUrl;

				if (data.virtualAccountCallbackUrl) {
					data.virtualAccountCallbackUrl = window.location.origin + data.virtualAccountCallbackUrl;
				}

				tossPayments.requestPayment(data.payTypeName, data);
			},
			error   : function (jqXHR, textStatus, errorThrown) {
				console.log('error', jqXHR, textStatus, errorThrown);
				langErrorMessage(jqXHR, textStatus, errorThrown);
			}
		});

		return false;
	});

	// init
	init();
});