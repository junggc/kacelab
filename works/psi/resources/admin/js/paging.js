/*
	# 생성
	var paging = new Paging($wrap, {
		totalItems: $count.val(),
		startPage: $page.val(),
		itemsOnPage: $limit.val(),
		onPageClick: function (e, pageNo) {
			search(pageNo);
			return false;
		}
	});

	# 재설정
	var currentPage = paging.getCurrentPage();

	paging.reload({
		totalItems: 9999,
		startPage: currentPage
	});

	# options
		initiateStartPageClick: 초기 클릭여부
*/
function Paging(selector, param) {
	// init
	this.$wrap = $(selector);
	this.opts  = null;

	// 페이징 생성
	this.reload(param);

	return this;
}

Paging.prototype.reload = function (param) {
	// option 설정
	this.setOptions(param);

	// 페이징 재생성
	if (this.$wrap.data("twbs-pagination")) {
		this.$wrap.twbsPagination('destroy');
		this.$wrap.data("twbs-pagination", null);
		this.$wrap.empty();
		this.$wrap.off('page');
	}

	if (this.opts.totalItems == 0) {
		this.$wrap.hide();
		return;
	}

	this.$wrap.show();
	this.$wrap.twbsPagination(this.opts);
};

Paging.prototype.setOptions = function (param) {
	var opts = $.extend({}, this.opts || {
		totalItems            : 0,      // 총 레코드 갯수
		startPage             : 1,      // 페이지 번호
		itemsOnPage           : 10,     // 페이지별 보여지는 목록(record) 갯수
		visiblePages          : 10,     // 페이지별 보여질 블럭 갯수
		totalPages            : null,   // 총 페이지 갯수
		onPageClick           : function (e, page) { // callback
			return false;
		},
		initiateStartPageClick: false,
		hideOnlyOnePage       : false,
		paginationClass       : 'twbs-paging',
		activeClass           : "current",
		firstClass            : "goFirst",
		prevClass             : "prev",
		nextClass             : "next",
		lastClass             : "goLast",
		first                 : '&nbsp;',
		prev                  : '&nbsp;',
		next                  : '&nbsp;',
		last                  : '&nbsp;'
	}, param);

	// 요청 값에 totalPages가 없을 경우 총 페이지 수 계산
	if (!param.totalPages) opts.totalPages = null;

	if (opts.totalItems) opts.totalItems = parseInt(opts.totalItems);
	if (opts.startPage) opts.startPage = parseInt(opts.startPage);
	if (opts.itemsOnPage) opts.itemsOnPage = parseInt(opts.itemsOnPage);
	if (opts.visiblePages) opts.visiblePages = parseInt(opts.visiblePages);

	if (opts.totalPages) opts.totalPages = parseInt(opts.totalPages);
	else opts.totalPages = opts.totalItems == 0 ? 0 : Math.ceil(opts.totalItems / opts.itemsOnPage);

	if (opts.totalPages > 0 && opts.totalPages < opts.startPage) {
		console.log('페이지 정보가 올바르지 않습니다. 첫 페이지로 이동됩니다.');

		opts.startPage              = 1;
		opts.initiateStartPageClick = true;
	}

	this.opts = opts;
};

// 현재 페이지 번호
Paging.prototype.getCurrentPage = function () {
	return this.$wrap.twbsPagination('getCurrentPage');
};