///
/// FileUploader
///
$('.upload-single').each(function () {
    var progress = $(this).find('.progress .determinate');

    var uploader = new ss.SimpleUpload({
        context: $(this),
        dropzone: $(this).attr('id'),
        button: $(this).attr('id'),
        url: $(this).data('url'),
        name: 'uploadfile',
        responseType: 'json',
        startXHR: function (filename, size) {
            $(this._opts.context).find('.material-icons').addClass('hide');
            $(this._opts.context).find('.progress').removeClass('hide');
            this.setProgressBar(progress);
        },
        endXHR: function (filename) {
            $(this._opts.context).find('.progress').addClass('hide');
        },
        onComplete: function (filename, response) {
            $(this._opts.context).find('.theFile').html('<img src="' + response.fileUrl + '">');
            $(this._opts.context).find('.filepath').val(response.fileName);
        }
    });
});


///
/// Multi file uploader
///
$(document).on('click', '.upload-multiple-container .listendelete', function (e) {
    e.preventDefault();
    $(this).parents('.item').remove();
});

$('.upload-multiple').each(function () {
    $(this).parent().find('.gallery .item img').removeClass('hide');
    $(this).parent().find('.gallery').sortable({
        placeholder: "ui-state-highlight"
        // handle: ".handle",
    });

    var progress = $(this).find('.progress .determinate');

    var uploader = new ss.SimpleUpload({
        context: $(this),
        dropzone: $(this).attr('id'),
        button: $(this).attr('id'),
        url: $(this).data('url'),
        name: 'uploadfile',
        multiple: true,
        queue: true,
        maxUploads: 1,
        responseType: 'json',
        startXHR: function (filename, size) {
            this.setProgressBar(progress);
            $(this._opts.context).find('.progress').removeClass('hide');
        },
        endXHR: function (filename) {
            $(this._opts.context).find('.progress').addClass('hide');
        },
        onChange: function (filename, extension, uploadBtn, fileSize, file) {
            var gallery = $(this._opts.context).parent().find('.gallery');
            var tpl = $($(this._opts.context).parent().find('.multitemplate').html());
            tpl.attr('data-name', filename);
            tpl.addClass('progress');
            tpl.find('.preloader-wrapper').addClass('active');
            gallery.append(tpl);
        },
        onError: function (filename, errorType, status, statusText, response, uploadBtn, fileSize) {
            $(this._opts.context).parent().find('.gallery .progress[data-name="' + filename + '"]').remove();
            inform.show(MULTI_E_SIZE, 'error');
        },
        onComplete: function (filename, response) {
            var gallery = $(this._opts.context).parent().find('.gallery');
            var item = gallery.find('.progress[data-name="' + filename + '"]');
            item.removeClass('progress').removeAttr('data-name');
            item.find('.preloader-wrapper').removeClass('active');
            item.find('img').removeClass("hide").attr('src', response.fileUrl);
            item.find('.filepath').val(response.fileName);

            if (!this.getQueueSize()) {
                inform.show(MULTI_M_COMPLETE, 'success');
                gallery.sortable({
                    placeholder: "ui-state-highlight"
                });
                gallery.disableSelection();
            }
        }
    });
});
