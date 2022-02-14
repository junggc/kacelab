$(function () {
	$('.btnClose').on('click', function () {
		// self.opener = self;
		// window.close();
		window.open('', '_self').close();
		return false;
	});
});