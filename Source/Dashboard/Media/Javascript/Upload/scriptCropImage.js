$(function() {
    var btnUpload = $('#pUpload');
    var mestatus = $('#mestatus');
    var files = $('#profile_pic');
    new AjaxUpload(btnUpload, {
        action: '../../Model/UploadImage.php',
        name: 'uploadfile',
        onSubmit: function(file, ext) {
            if (!(ext && /^(jpg|png|jpeg|gif)$/.test(ext))) {
                // extension is not allowed 
                mestatus.text('Only JPG, PNG or GIF files are allowed');
                return false;
            }
        },
        onComplete: function(file, response) {
            //On completion clear the status
//            mestatus.text('Photo Uploaded Sucessfully!');
            //On completion clear the status
            files.html('');
            //Add uploaded file to list
            if (response !== "error") {
                $('<li></li>').appendTo('#profile_pic').html('<img id="thumb" src="../../Media/Images/Categories/' + imgType + '_' + response + file + '" alt="" /><br />').addClass('success');
            } else {
                $('<li></li>').appendTo('#profile_pic').text(file).addClass('error');
            }
        }
    });

});