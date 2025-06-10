jQuery(document).ready(function ($) {
    $('#upload_location_image_button').on('click', function (e) {
        e.preventDefault();

        const imageFrame = wp.media({
            title: 'Select or Upload Location Thumbnail',
            button: {
                text: 'Use this image'
            },
            multiple: false
        });

        imageFrame.on('select', function () {
            const attachment = imageFrame.state().get('selection').first().toJSON();
            $('#property_location_image_id').val(attachment.id);
            $('#property_location_image_preview').attr('src', attachment.url);
        });

        imageFrame.open();
    });
});
