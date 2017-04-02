///
/// InlineFileUploader `[INPUT][BTN]`
///
$(document).on('click', '.sau-upload-inline .listendelete', function(e){
    e.preventDefault();
    const o = $(this).parents('.sau-upload-inline');
    o.find('.sau-displayname, .sau-filepath, .sau-filename').val('');
    $(this).addClass('hide');
});
$('.sau-upload-inline').each(function () {
    var progress = $(this).find('.sau-progress>div');
    var extensions = !$(this).data('allow') || $(this).data('allow').trim() == ''
        ? []
        : $(this).data('allow').split(',').map(function (ext) {return $.trim(ext)});

    var uploader = new ss.SimpleUpload({
        context: $(this),
        // dropzone: $(this).find('.sau-dropzone').attr('id'),
        button: $(this).find('.sau-button').attr('id'),
        url: $(this).data('url'),
        allowedExtensions: extensions,
        name: 'uploadfile',
        responseType: 'json',
        startXHR: function (filename, size) {
            $(this._opts.context).find('.sau-progress').addClass('open');
            this.setProgressBar(progress);
        },
        endXHR: function (filename) {
            $(this._opts.context).find('.sau-progress').removeClass('open');
        },
        onComplete: function (filename, response) {
            $(this._opts.context).find('.sau-displayname').val(response.fileName);
            $(this._opts.context).find('.sau-filename').val(response.fileName);
            $(this._opts.context).find('.sau-filepath').val(response.fileUrl);
            $(this._opts.context).find('.listendelete').removeClass('hide');
        }
    });
});

