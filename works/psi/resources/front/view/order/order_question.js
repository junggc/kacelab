$(function () {

	var $wrap       = $('.infoList');
	var $listForm   = $wrap.find('[name=listForm]');
	var $totalRows  = $listForm.find('[name=totalRows]');
	var $page       = $listForm.find('[name=page]');
	var $searchBtn  = $listForm.find('.searchBtn');
	var $perPage    = $listForm.find('[name=perPage]');
	var $pagination = $wrap.find('.pagination-area');

	var search = function (pageNo) {
		$page.val(pageNo);
		$listForm.submit();
	};

	var init = function () {
		// paging
		var paging = new Paging($pagination, {
			totalItems : $totalRows.val(),
			startPage  : $page.val(),
			itemsOnPage: $perPage.val(),
			onPageClick: function (e, pageNo) {
				search(pageNo);
				return false;
			}
		});
	};

	// 검색
	$searchBtn.on('click', function () {
		search(1);
		return false;
	});

	// 초기화
	init();
});