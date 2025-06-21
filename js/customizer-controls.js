(function($) {
    $(document).ready(function() {
        // Ensure the button is part of the Customizer controls and not in the preview
        if ( $( '#customize-controls #storefront-child-reset-theme-settings-button' ).length ) {

            $(document).on('click', '#storefront-child-reset-theme-settings-button', function(e) {
                e.preventDefault();

                if (typeof storefrontChildControlsData === 'undefined' ||
                    typeof storefrontChildControlsData.ajax_url === 'undefined' ||
                    typeof storefrontChildControlsData.action === 'undefined' ||
                    typeof storefrontChildControlsData.nonce === 'undefined' ||
                    typeof storefrontChildControlsData.confirm_message === 'undefined'
                    ) {
                    alert('Error: Localization data is missing. Cannot proceed.');
                    return;
                }

                if ( ! confirm( storefrontChildControlsData.confirm_message ) ) {
                    return;
                }

                var $button = $(this);
                $button.prop('disabled', true).text(storefrontChildControlsData.resetting_message || 'Resetting...');

                $.post(storefrontChildControlsData.ajax_url, {
                    action: storefrontChildControlsData.action,
                    nonce: storefrontChildControlsData.nonce
                })
                .done(function(response) {
                    if (response.success) {
                        alert(storefrontChildControlsData.success_message || 'Settings reset successfully. The page will now refresh.');
                        wp.customize.previewer.refresh();
                    } else {
                        alert(storefrontChildControlsData.error_message || 'Error: ' + (response.data || 'Could not reset settings.'));
                        $button.prop('disabled', false).text(storefrontChildControlsData.original_button_text || 'Tüm Tema Ayarlarını Sıfırla');
                    }
                })
                .fail(function(jqXHR, textStatus, errorThrown) {
                    alert(storefrontChildControlsData.error_message + ' (AJAX: ' + textStatus + ', ' + errorThrown + ')');
                    $button.prop('disabled', false).text(storefrontChildControlsData.original_button_text || 'Tüm Tema Ayarlarını Sıfırla');
                });
            });
        }
    });
})(jQuery);
