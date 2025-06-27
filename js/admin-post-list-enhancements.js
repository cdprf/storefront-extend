(function($) {
    $(document).ready(function() {
        // Use event delegation for buttons added dynamically or by WP list table updates
        // Ensure we are on the correct admin page (edit.php for posts)
        // The check for adminpage global can be done in PHP via $hook_suffix

        var $postsFilter = $('#posts-filter');
        if (!$postsFilter.length) {
            // Fallback or alternative container if #posts-filter is not found
            $postsFilter = $(document.body);
        }

        $postsFilter.on('click', '.format-paragraphs-button', function(e) {
            e.preventDefault();

            var $button = $(this);
            var postId = $button.data('postid');
            var nonce = $button.data('nonce');

            // Check for localized data
            if (typeof adminPostListEnhancementsData === 'undefined' ||
                !adminPostListEnhancementsData.ajax_url ||
                !adminPostListEnhancementsData.action
                ) {
                alert('Error: Localization data for formatting is missing.');
                return;
            }

            var originalText = $button.text();
            var processingText = adminPostListEnhancementsData.processing_text || 'Processing...';
            var doneText = adminPostListEnhancementsData.done_text || 'Done!';

            $button.text(processingText);
            $button.prop('disabled', true);

            $.post(adminPostListEnhancementsData.ajax_url, {
                action: adminPostListEnhancementsData.action,
                post_id: postId,
                nonce: nonce
            })
            .done(function(response) {
                var message = '';
                var messageClass = 'updated-message';

                if (response.success) {
                    message = (response.data && response.data.message)
                              ? response.data.message
                              : (adminPostListEnhancementsData.success_text || 'Post formatted!');

                    if (response.data && response.data.status === 'no_change') {
                        message = adminPostListEnhancementsData.no_change_text || 'Content already formatted or no changes made.';
                    }

                    $button.text(doneText);
                    setTimeout(function() {
                         $button.text(originalText);
                         $button.prop('disabled', false); // Re-enable after "Done!" and reverting text
                    }, 2000);

                } else {
                    messageClass = 'error-message';
                    message = (response.data && response.data.message)
                              ? response.data.message
                              : (adminPostListEnhancementsData.error_text || 'An error occurred.');
                    $button.text(originalText);
                    $button.prop('disabled', false); // Re-enable immediately on error
                }

                var $messageSpan = $button.siblings('.format-status-message');
                if (!$messageSpan.length) {
                    $messageSpan = $('<span class="format-status-message" style="margin-left: 5px; padding: 2px 5px; border-radius: 3px;"></span>').insertAfter($button);
                }
                $messageSpan.text(message)
                            .removeClass('updated-message error-message')
                            .addClass(messageClass)
                            .fadeIn()
                            .delay(3000)
                            .fadeOut(function() { $(this).remove(); });

            })
            .fail(function() {
                alert(adminPostListEnhancementsData.error_text_ajax || 'AJAX request failed.');
                $button.text(originalText);
                $button.prop('disabled', false);
            });
            // .always() was removed here because the button disabling/enabling is handled
            // more specifically in done() and fail() for the "Done!" text case.
        });
    });
})(jQuery);
