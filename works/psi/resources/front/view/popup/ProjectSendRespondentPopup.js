function ProjectSendRespondentPopup(param, cb) {
    var _this = this;
    var $html = $(ProjectSendRespondentPopup.template(param));

    $('body').append($html);

    var $popupSearchForm = $html.find('[name=popupSearchForm]');
    var $popupProjectInfoID = $popupSearchForm.find('[name=projectInfoID]');
    var $popupPage = $popupSearchForm.find('[name=page]');
    var $popupPerPage = $popupSearchForm.find('[name=perPage]');
    var $popupSearchKeyword = $popupSearchForm.find('[name=searchKeyword]');
    var $projectSubject = $html.find('.projectSubject');
    var $dataTable = $html.find('.dataTable');
    var $statusSum = $html.find('.statusSum');
    var $listBody = $html.find('.listBody');
    var $pagination = $html.find('.pagination-area');
    var paging = null;
    var projectTemplate = Handlebars.compile($html.find('.projectTemplate').html());
    var articlesTemplate1 = Handlebars.compile($html.find('.articlesTemplate1').html());
    var headerTemplate1 = Handlebars.compile($html.find('.headerTemplate1').html());
    var articlesTemplate2 = Handlebars.compile($html.find('.articlesTemplate2').html());
    var headerTemplate2 = Handlebars.compile($html.find('.headerTemplate2').html());
    var $btnSelect = $html.find('.btnSelect');

    var init = function() {
        search(1);
    };

    var search = function(pageNo) {
        $popupPage.val(pageNo);
        $popupSearchForm.trigger('submit');
    };

    $popupSearchKeyword.on('keypress', function(e) {
        if(e.keyCode == 13) {
            search(1);
            return false;
        }
    });

    $popupSearchForm.on('submit', function(e, type) {
        if(type && type == 'download') {
            return true;
        }

        $(this).ajaxSubmit({
            dataType : 'json',
            success : function(data, textStatus, jqXHR) {
                var totalRows = data.totalRows || 0;
                var pageNo = $popupPage.val() || 0;
                var perPage = $popupPerPage.val() || 0;

                totalRows = parseInt(totalRows);
                pageNo = parseInt(pageNo);
                perPage = parseInt(perPage);

                if(totalRows > 0) {
                    $btnSelect.show();
                } else {
                    $btnSelect.hide();
                }

                $projectSubject.text(data.projectInfo.project_subject);

                $statusSum.html(projectTemplate(data))

                if(param.category1Code == '0300') {
                    $dataTable.html(headerTemplate1(data))

                    var $listBody = $html.find('.listBody');
                    $listBody.html(articlesTemplate1(data));
                } else {
                    $dataTable.html(headerTemplate2(data))

                    var $listBody = $html.find('.listBody');
                    $listBody.html(articlesTemplate2(data));
                }

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

                // Resize Height
                resizeContents();
            },
            error : function(jqXHR, textStatus, errorThrown) {
                errorMessage(jqXHR, textStatus, errorThrown);
            }
        });

        return false;
    });

    $popupSearchForm.find('.searchBtn').on('click', function() {
        search(1);
        return false;
    });

    $btnSelect.on('click', function() {
        var $checkedIDs =$('input[name=checkRespondent]:checked');

        if($checkedIDs.length == 0) {
            alert('개별 발송할 명단을 선택해 주세요.');
            return false;
        }

        var idArray = [];
        $checkedIDs.each(function() {
            idArray.push($(this).val());
        });

        // Call Back
        cb(idArray);

        $html.remove();
        return false;
    });

    $(document).on('click', '.btnCheckAll', function() {
        console.log("1");
        if($(this).prop("checked")){
            $("input[name=checkRespondent]").prop("checked",true);
        }else{
            $("input[name=checkRespondent]").prop("checked",false);
        }
    });

    // Close
    $html.find('.tclose, .dim, .btn_close').on('click', function() {
        $html.remove();
        return false;
    });

    init();
}

(function() {
    ProjectSendRespondentPopup.template = null;

    $.get('/resources/front/view/popup/ProjectSendRespondentPopup.html?d=' + +new Date(), function(data) {
        ProjectSendRespondentPopup.template = Handlebars.compile(data);
    });
})();