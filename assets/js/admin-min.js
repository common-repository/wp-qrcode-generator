jQuery(document).ready(function($) {
    'use strict';
    //Initiate Color Picker
    $('.wpqrcode-color-picker').wpColorPicker();


    $('.wpqrcode-browse').on( 'click', function (event) {
        event.preventDefault();

        var self = $(this);

        // Create the media frame.
        var file_frame = wp.media.frames.file_frame = wp.media({
            title: self.data('uploader_title'),
            button: {
                text: self.data('uploader_button_text'),
            },
            multiple: false
        });

        file_frame.on('select', function () {
            var attachment = file_frame.state().get('selection').first().toJSON();
            self.prev('.wpqrcode-logo-url').val(attachment.url).change();
        });

        // Finally, open the modal
        file_frame.open();
    });


});