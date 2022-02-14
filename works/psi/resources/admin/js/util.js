function Util() {
}

Util.checkAll = function (all, items, parent) {
	var $parent = $(parent || document);

	$parent.on('click', all, function () {
		$parent.find(items).prop('checked', $(this).prop('checked'));
	}).on('click', items, function () {
		$parent.find(all).prop('checked', $parent.find(items).filter(':not(:checked)').length == 0);
	});

	return $parent;
};

Util.doError = function ($elem, msg) {
	alert(msg);
	$elem.focus();
	return false;
};