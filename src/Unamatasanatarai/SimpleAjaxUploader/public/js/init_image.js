///
/// SingleFileUploader for Images
///
$(document).on('click', '.sau-upload-image .listendelete', function(e){
    e.preventDefault();
    const o = $(this).parents('.sau-upload-image');
    $(this).addClass('hide');
    o.find('.sau-calltoaction').removeClass('hide');
    o.find('.img').html('');
    o.find('.sau-filepath').val('');
});
$('.sau-upload-image').each(function () {
    var progress = $(this).find('.sau-progress>div');

    var extensions = !$(this).data('allow') || $(this).data('allow').trim() == ''
        ? ['jpg', 'jpeg', 'png', 'gif']
        : $(this).data('allow').split(',').map(function (ext) {return $.trim(ext)});

    var uploader = new ss.SimpleUpload({
        context: $(this),
        dropzone: $(this).find('.sau-dropzone').attr('id'),
        button: $(this).find('.sau-dropzone').attr('id'),
        allowedExtensions: extensions,
        url: $(this).data('url'),
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
            if (!response.success) {
                // console.log(response.error);
                return;
            }
            var item = $(this._opts.context);
            item.find('.sau-image .img').html('<img src="' + response.fileFullUrl + '">');
            item.find('.sau-filepath').val(response.fileUrl);
            item.find('.sau-calltoaction').addClass('hide');
            item.find('.listendelete').removeClass('hide');
            item.trigger('sau-complete');
        }
    });
});
