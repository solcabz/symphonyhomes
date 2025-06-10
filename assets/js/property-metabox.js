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
    
    // Set/Change Thumbnail for property (featured image)
    $('.set-property-thumbnail').on('click', function (e) {
        e.preventDefault();
        var button = $(this);
        var frame = wp.media({
            title: 'Select or Upload Property Thumbnail',
            button: { text: 'Set as Property Thumbnail' },
            multiple: false
        });
        frame.on('select', function () {
            var attachment = frame.state().get('selection').first().toJSON();
            var post_id = $('#post_ID').val();
            // AJAX call to set the featured image
            $.ajax({
                url: ajaxurl,
                type: 'POST',
                data: {
                    action: 'set_property_featured_image',
                    post_id: post_id,
                    thumbnail_id: attachment.id,
                    _ajax_nonce: propertyMetabox.nonce
                },
                success: function (response) {
                    if (response.success) {
                        button.prev('img').attr('src', attachment.url);
                    } else {
                        alert('Failed to set thumbnail.');
                    }
                }
            });
        });
        frame.open();
    });

    // Remove property thumbnail (featured image)
    $('.remove-property-thumbnail').on('click', function (e) {
        e.preventDefault();
        var button = $(this);
        var post_id = $('#post_ID').val();
        $.ajax({
            url: ajaxurl,
            type: 'POST',
            data: {
                action: 'remove_property_featured_image',
                post_id: post_id,
                _ajax_nonce: propertyMetabox.nonce
            },
            success: function (response) {
                if (response.success) {
                    $('#property-thumbnail-preview').attr('src', propertyMetabox.placeholder);
                } else {
                    alert('Failed to remove thumbnail.');
                }
            }
        });
    });
        
    // Add hover effect to show remove X button on thumbnail
    var $thumbnailPreview = $('#property-thumbnail-preview');
    if ($thumbnailPreview.length) {
        // Create the X button if not present
        if ($('#remove-thumbnail-x').length === 0) {
            var $removeX = $('<button id="remove-thumbnail-x" type="button" style="display:none;position:absolute;top:8px;right:8px;background:#fff;border:none;border-radius:50%;width:24px;height:24px;box-shadow:0 1px 4px rgba(0,0,0,0.2);cursor:pointer;z-index:10;">&times;</button>');
            $thumbnailPreview.parent().css('position', 'relative').append($removeX);
        }
        var $removeX = $('#remove-thumbnail-x');
        $thumbnailPreview.on('mouseenter', function() {
            $removeX.show();
        });
        $thumbnailPreview.on('mouseleave', function() {
            setTimeout(function(){
                if (!$removeX.is(':hover')) $removeX.hide();
            }, 200);
        });
        $removeX.on('mouseleave', function() {
            $removeX.hide();
        });
        $removeX.on('click', function(e) {
            e.preventDefault();
            var post_id = $('#post_ID').val();
            $.ajax({
                url: ajaxurl,
                type: 'POST',
                data: {
                    action: 'remove_property_featured_image',
                    post_id: post_id,
                    _ajax_nonce: propertyMetabox.nonce
                },
                success: function (response) {
                    if (response.success) {
                        $thumbnailPreview.attr('src', propertyMetabox.placeholder);
                        $removeX.hide();
                    } else {
                        alert('Failed to remove thumbnail.');
                    }
                }
            });
        });
    }

    // Show/hide X button on feature-item hover (for front-end preview)
    $(document).on('mouseenter', '.feature-item', function() {
        $(this).find('.remove-featured-x').show();
    });
    $(document).on('mouseleave', '.feature-item', function() {
        $(this).find('.remove-featured-x').hide();
    });

    // Improved: Instantly update the thumbnail preview on delete (remove featured image)
    $(document).on('click', '.remove-featured-x', function(e) {
        e.preventDefault();
        var $btn = $(this);
        $btn.prop('disabled', true).css('opacity', '0.6'); // Loading state
        var $img = $btn.closest('.feature-item').find('img');
        if ($img.length === 0) {
            $img = $btn.closest('.feature-item'); // fallback
        }
        $img.css('opacity', '0.5'); // Visual feedback
        // Use data-post-id attribute for correct post targeting
        var post_id = $btn.data('postId') || $('#post_ID').val();
        $.ajax({
            url: ajaxurl,
            type: 'POST',
            data: {
                action: 'remove_property_featured_image',
                post_id: post_id,
                _ajax_nonce: propertyMetabox.nonce
            },
            success: function (response) {
                if (response.success) {
                    if ($img.is('img')) {
                        $img.attr('src', propertyMetabox.placeholder).css('opacity', '1');
                    } else {
                        $img.css('background-image', 'url(' + propertyMetabox.placeholder + ')').css('opacity', '1');
                    }
                } else {
                    alert('Failed to remove thumbnail.');
                    $img.css('opacity', '1');
                }
                $btn.prop('disabled', false).css('opacity', '1');
            },
            error: function() {
                alert('Error communicating with server.');
                $img.css('opacity', '1');
                $btn.prop('disabled', false).css('opacity', '1');
            }
        });
    });
});
