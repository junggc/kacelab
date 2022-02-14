function ProjectRespondentPopup(param, callback) {
    var _this = this;

    var $html = $(ProjectRespondentPopup.template(param));

    $('body').append($html);

    var $popupSearchForm = $html.find('[name=popupSearchForm]');
    var $btnSearch = $popupSearchForm.find('.btnSearch');
    var $popupPage = $popupSearchForm.find('[name=page]');
    var $popupPerPage = $popupSearchForm.find('[name=perPage]');
    var $popupSearchKeyword = $popupSearchForm.find('[name=searchKeyword]');
    var $listBody = $html.find('.listBody');
    var $pagination = $html.find('.pagination-area');
    var paging = null;
    var respondentTemplate = Handlebars.compile($html.find('.respondentTemplate').html());

    var init = function() {
        search(1);
    };

    var search = function(pageNo) {
        $popupPage.val(pageNo);
        $popupSearchForm.trigger('submit');
    };

    $btnSearch.on('click', function() {
        search(1);
        return false;
    });

    $popupSearchKeyword.on('keypress', function(e) {
        if(e.keyCode == 13) {
            search(1);
            return false;
        }
    });

    $popupSearchForm.on('submit', function(e, type) {
        $(this).ajaxSubmit({
            dataType : 'json',
            success : function(data, textStatus, jqXHR) {
                var totalRows = data.totalRows || 0;
                var pageNo = $popupPage.val() || 0;
                var perPage = $popupPerPage.val() || 0;

                totalRows = parseInt(totalRows);
                pageNo = parseInt(pageNo);
                perPage = parseInt(perPage);

                $listBody.html(respondentTemplate(data));

                if(paging == null) {
                    paging = new Paging($pagination, {
                        totalItems : totalRows,
                        startPage : pageNo,
                        itemsOnPage : perPage,
                        onPageClick : function(e, pageNo) {
                            search(pageNo);
                            return false;
                        }
                    });
                } else {
                    paging.reload({
                        totalItems : totalRows,
                        startPage : pageNo
                    });
                }
            },
            error : function(jqXHR, textStatus, errorThrown) {
                errorMessage(jqXHR, textStatus, errorThrown);
            }
        });

        return false;
    });

    // Close
    $html.find('.tclose, .dim, .btn_close').on('click', function() {
        $html.remove();
        return false;
    });

    // Select
    $(document).off('click', 'a.sbtn_edit').on('click', 'a.sbtn_edit', function() {
        var data = $(this).closest('tr').data('object');

        callback(data);

        $('.tclose').trigger('click');
    });

    init();
}

(function() {
    Handlebars.registerHelper('getObjectJSON', function(param) {
        return JSON.stringify(param);
    });

    ProjectRespondentPopup.template = null;

    $.get('/resources/front/view/popup/ProjectRespondentPopup.html?d=' + +new Date(), function(data) {
        ProjectRespondentPopup.template = Handlebars.compile(data);
    });
})();