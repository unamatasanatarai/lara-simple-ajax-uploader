///
/// InlineFileUploader `[INPUT][BTN]`
///
$('.sau-upload-inline').each(function(){
    var progress = $(this).find('.sau-progress>div');

    var uploader = new ss.SimpleUpload({
        context:$(this),
        dropzone: $(this).find('.sau-dropzone').attr('id'),
        button: $(this).find('.sau-dropzone').attr('id'),
        url: $(this).data('url'),
        name: 'uploadfile',
        responseType: 'json',
        startXHR: function(filename, size) {
            $(this._opts.context).find('.sau-progress').addClass('open');
            this.setProgressBar(progress);
        },
        endXHR: function(filename) {
            $(this._opts.context).find('.sau-progress').removeClass('open');
        },
        onComplete: function(filename, response) {
            $(this._opts.context).find('.sau-displayname').val(response.fileName);
            $(this._opts.context).find('.sau-filename').val(response.fileName);
            $(this._opts.context).find('.sau-filepath').val(response.fileUrl);
        }
    });
});

