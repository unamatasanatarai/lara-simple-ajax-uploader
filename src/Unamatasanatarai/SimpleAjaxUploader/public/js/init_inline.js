///
/// FileUploader
///
$('.sau-upload-inline').each(function(){
    var progress = $(this).find('.sau-progress');

    var uploader = new ss.SimpleUpload({
        context:$(this),
        dropzone: $(this).attr('id'),
        button: $(this).attr('id'),
        url: $(this).data('url'),
        name: 'uploadfile',
        responseType: 'json',
        startXHR: function(filename, size) {
            $(this._opts.context).find('.material-icons').addClass('hide');
            $(this._opts.context).find('.progress').removeClass('hide');
            this.setProgressBar(progress);
        },
        endXHR: function(filename) {
            $(this._opts.context).find('.progress').addClass('hide');
        },
        onComplete: function(filename, response) {
            $(this._opts.context).find('.theFile').html('<img src="'+response.fileUrl+'">');
            $(this._opts.context).find('.filepath').val(response.fileName);
        }
    });
});

