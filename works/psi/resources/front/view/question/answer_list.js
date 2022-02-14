$(function () {

	$('.questionBtn').on('click', function () {
		if ($(this).hasClass('btnComp')) {
			alert(i18n.list_already_complete);
			return false;
		}

		return true;
	});

});