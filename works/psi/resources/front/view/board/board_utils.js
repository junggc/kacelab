var board = window.board || {};
board.fileSizeUnit = 1000;
board.maxImageSize = 2 * board.fileSizeUnit * board.fileSizeUnit;
board.maxImageSizeText = '2MB';

board.validateAttachFile = function(files, option) {
    option = option || {};

    var attachFileOption = $.extend(true, {
        maxFileSize : 10 * board.fileSizeUnit * board.fileSizeUnit,
        maxFileSizeText : '10MB',
        fileExtRegex : /(jpg|jpeg|png|gif|zip|doc|docx|xls|xlsx|pdf|ppt|pptx|mp4)/i,
        fileExtRegexMessage : '.jpg, .jpeg, .png, .gif, .zip, .doc, .docx, .xls, .xlsx, .ppt, .pptx, .pdf\n파일만 선택가능합니다.'
    }, option)

    if(!files || files.length == 0) {
        alert('파일을 선택해 주세요.');
        return false;
    }

    for(var i = 0, max = files.length; i < max; i++) {
        console.log(files[i], files[i].size);

        var name = files[i].name;
        var name2 = name.toLowerCase();
        var size = files[i].size;
        var ext = name2.substring(name2.lastIndexOf('.') + 1);

        if(!(attachFileOption.fileExtRegex).test(ext)) {
            alert(attachFileOption.fileExtRegexMessage);
            return false;
        }

        if(attachFileOption.maxFileSize < size) {
            var sizeText = (parseInt((size * board.fileSizeUnit) / (board.fileSizeUnit * board.fileSizeUnit)) / board.fileSizeUnit) + 'MB';
            alert('파일의 용량이 너무 큽니다. (최대 용량: {0})\n\n파일명: {1}\n용량: {2}'.fmt(attachFileOption.maxFileSizeText, name, sizeText));
            return false;
        }
    }

    return true;
}

board.__validationUploadImage = function(files) {
    if(!files || files.length == 0) {
        alert('이미지 파일을 선택해 주세요. (최대 용량: {0})'.fmt(board.maxImageSizeText));
        return false;
    }

    for(var i = 0, max = files.length; i < max; i++) {
        var name = files[i].name;
        var name2 = name.toLowerCase();
        var size = files[i].size;
        var ext = name2.substring(name2.lastIndexOf('.') + 1);

        if('gif,png,jpeg,jpg,bmp,webp'.indexOf(ext) == -1) {
            alert('이미지 파일을 선택해 주세요. (최대 용량: {0})'.fmt(board.maxImageSizeText));
            return false;
        }
        if(board.maxImageSize < size) {
            var sizeText = (parseInt((size * board.fileSizeUnit) / (board.fileSizeUnit * board.fileSizeUnit)) / board.fileSizeUnit) + 'MB';
            alert('이미지 파일의 용량이 너무 큽니다. (최대 용량: {0})\n\n파일명: {1}\n용량: {2}'.fmt(board.maxImageSizeText, name, sizeText));
            return false;
        }
    }

    return true;
};

board.uploadImage = function(files, path, callback) {
    if(!board.__validationUploadImage(files)) {
        return false;
    }

    var formData = new FormData();
    formData.append('path', path + '/{0}/'.fmt(new Date().yyyyMMdd('/')));

    $.each(files, function(index, file) {
        formData.append('attach[]', file);
    });

    $.ajax({
        url : "/admin/common/aws/uploadProcess",
        type : "POST",
        dataType : 'JSON',
        enctype : 'multipart/form-data',
        data : formData,
        contentType : false,
        processData : false,
        success : function(data) {
            callback(data);
        }
    });
};

board.editor = function($obj, opts) {
    // 상세 옵션 : summernote-lite.js (9854 line)
    // $('#summernote').summernote('insertText', 'hello world');
    // $('#summernote').summernote('isEmpty')
    // $('#summernote').summernote('reset');
    // $('#summernote').summernote('code');
    // $('#summernote').summernote('code', 'html');

    opts = opts || {};

    if(!opts.placeholder && $obj.attr('placeholder') != '') {
        opts.placeholder = $obj.attr('placeholder');
    }

    if(!opts.path) {
        opts.path = 'editor/board';
    }

    var def = $.extend(true, {
        lang : 'ko-KR',
        height : 300,
        focus : false,
        placeholder : '내용을 입력해 주세요.',
        codeviewFilter : true,
        codeviewFilterRegex : /<\/*(?:applet|b(?:ase|gsound|link)|embed|frame(?:set)?|ilayer|l(?:ayer|ink)|meta|object|script|t(?:itle|extarea)|xml)[^>]*?>/gi,
        codeviewIframeFilter : true,
        maximumImageFileSize : board.maxImageSize,
        callbacks : {
            onImageUpload : function(files) {
                var _this = this;

                board.uploadImage(files, opts.path, function(data) {
                    $.each(data['objectURLs'], function(index, value) {
                        $(_this).summernote('insertImage', value);
                    });
                });
            }
            /* ,
            onMediaDelete: function (targets) {
                console.log('onMediaDelete targets', targets);

                if (targets) {
                    for (var i = 0, max = targets.length; i < max; i++) {
                        var t = targets[i];
                        if (t.nodeName.toUpperCase() == 'IMG') {
                            console.log('target src', t.currentSrc);
                        }
                    }
                }
            } */
        }
    }, opts)

    $obj.summernote(def);
    return $obj;
};