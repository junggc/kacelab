$(function () {

	var $form = $('form[name=form]');
	var $id   = $form.find('[name=id]');
	var $pw   = $form.find('[name=pw]');

	$id.on('keyup', function (e) {
		if (e.keyCode == 13) {
			$pw.focus();
		}
	});

	$pw.on('keyup', function (e) {
		if (e.keyCode == 13) {
			$form.trigger('submit');
		}
	});

	$form.on('submit', function () {
		if ($id.val() == '') {
			alert(i18n.login_empty_id);
			$id.focus();
			return false;
		}

		if ($pw.val() == '') {
			alert(i18n.login_empty_pw);
			$pw.focus();
			return false;
		}

		$(this).ajaxSubmit({
			success : function (data, textStatus, jqXHR) {
				location.reload();
			},
			error   : function (jqXHR, textStatus, errorThrown) {
				langErrorMessage(jqXHR, textStatus, errorThrown);
			},
			complete: function (jqXHR, textStatus) {
			}
		});

		return false;
	});

	$('.btnLogt').on('click', function () {
		$form.trigger('submit');
		return false
	});

});