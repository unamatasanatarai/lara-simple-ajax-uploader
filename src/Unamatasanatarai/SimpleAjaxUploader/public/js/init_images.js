///
/// Multi file uploader
///
$(document).on('click', '.sau-upload-images .listendelete', function (e) {
    e.preventDefault();
    $(this).parents('.sau-item').remove();
});

$('.sau-upload-images').each(function () {
    var progress = $(this).find('.progress .determinate');

    var uploader = new ss.SimpleUpload({
        context: $(this),
        dropzone: $(this).find('.sau-dropzone').attr('id'),
        button: $(this).find('.sau-dropzone').attr('id'),
        url: $(this).data('url'),
        allowedExtensions: ['jpg', 'jpeg', 'png', 'gif'],
        name: 'uploadfile',
        multiple: true,
        multipleSelect: true,
        queue: true,
        maxUploads: 1,
        responseType: 'json',
        startXHR: function (filename, size) {
            this.setProgressBar(progress);
            $(this._opts.context).find('.sau-progress').addClass('open');
        },
        endXHR: function (filename) {
            $(this._opts.context).find('.sau-progress').removeClass('open');
        },
        onChange: function (filename, extension, uploadBtn, fileSize, file) {
            var gallery = $(this._opts.context).parent().find('.sau-gallery');
            var tpl = $($(this._opts.context).parent().find('template#sau_image').html());
            tpl.attr('data-name', filename);
            tpl.addClass('progress');
            gallery.append(tpl);
        },
        onError: function (filename, errorType, status, statusText, response, uploadBtn, fileSize) {
            $(this._opts.context).parent().find('.sau-gallery .progress[data-name="' + filename + '"]').remove();
            console.log(MULTI_E_SIZE, 'error');
        },
        onComplete: function (filename, response) {
            var gallery = $(this._opts.context).parent().find('.sau-gallery');
            var item = gallery.find('.progress[data-name="' + filename + '"]');
            item.removeClass('progress').removeAttr('data-name');
            item.find('img').removeClass("hide").attr('src', response.fileFullUrl);
            item.find('.sau-filepath').val(response.fileUrl);

            if (!this.getQueueSize()) {
                console.log(MULTI_M_COMPLETE, 'success');
                // gallery.sortable({
                //     placeholder: "ui-state-highlight"
                // });
                // gallery.disableSelection();
            }
        }
    });
});
