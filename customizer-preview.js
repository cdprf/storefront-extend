/**
 * Customizer Preview JavaScript
 * Gerçek zamanlı önizleme için
 */

( function( $ ) {
    
    // Ana renk değişiklikleri
    wp.customize( 'storefront_child_primary_color', function( value ) {
        value.bind( function( newval ) {
            $( 'button, .button, input[type="submit"], .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button' ).css( 'background-color', newval );
            $( '.woocommerce-tabs ul.tabs li.active a, .woocommerce div.product .woocommerce-tabs ul.tabs li.active' ).css( 'background-color', newval );
            $( ':root' ).css( '--primary-color', newval );
        } );
    } );
    
    // İkincil renk değişiklikleri
    wp.customize( 'storefront_child_secondary_color', function( value ) {
        value.bind( function( newval ) {
            $( ':root' ).css( '--secondary-color', newval );
        } );
    } );
    
    // Vurgu rengi değişiklikleri
    wp.customize( 'storefront_child_accent_color', function( value ) {
        value.bind( function( newval ) {
            $( ':root' ).css( '--accent-color', newval );
        } );
    } );
    
    // Container genişliği
    wp.customize( 'storefront_child_container_width', function( value ) {
        value.bind( function( newval ) {
            $( '.col-full' ).css( 'max-width', newval + 'px' );
        } );
    } );
    
    // Border radius
    wp.customize( 'storefront_child_border_radius', function( value ) {
        value.bind( function( newval ) {
            $( ':root' ).css( '--border-radius', newval + 'px' );
            $( 'button, .button, input[type="submit"], .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button' ).css( 'border-radius', newval + 'px' );
        } );
    } );
    
    // Font ailesi
    wp.customize( 'storefront_child_font_family', function( value ) {
        value.bind( function( newval ) {
            var fontFamilies = {
                'roboto': "'Roboto', sans-serif",
                'open-sans': "'Open Sans', sans-serif",
                'lato': "'Lato', sans-serif",
                'montserrat': "'Montserrat', sans-serif",
                'poppins': "'Poppins', sans-serif",
                'nunito': "'Nunito', sans-serif",
                'source-sans': "'Source Sans Pro', sans-serif",
                'system': "-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif"
            };
            
            var selectedFont = fontFamilies[newval] || fontFamilies['system'];
            $( 'body' ).css( 'font-family', selectedFont );
        } );
    } );
    
    // Header arka plan rengi
    wp.customize( 'storefront_child_header_bg_color', function( value ) {
        value.bind( function( newval ) {
            $( '.site-header' ).css( 'background-color', newval );
        } );
    } );
    
    // Header metin rengi
    wp.customize( 'storefront_child_header_text_color', function( value ) {
        value.bind( function( newval ) {
            $( '.site-header' ).css( 'color', newval );
        } );
    } );
    
    // Logo genişliği
    wp.customize( 'storefront_child_logo_width', function( value ) {
        value.bind( function( newval ) {
            $( '.site-branding img' ).css( 'max-width', newval + 'px' );
        } );
    } );
    
    // Header padding
    wp.customize( 'storefront_child_header_padding', function( value ) {
        value.bind( function( newval ) {
            $( '.site-header' ).css( {
                'padding-top': newval + 'px',
                'padding-bottom': newval + 'px'
            } );
        } );
    } );
    
    // Navigasyon rengi
    wp.customize( 'storefront_child_nav_color', function( value ) {
        value.bind( function( newval ) {
            $( '.main-navigation ul li a, .site-header-cart .cart-contents' ).css( 'color', newval );
        } );
    } );
    
    // Navigasyon hover rengi
    wp.customize( 'storefront_child_nav_hover_color', function( value ) {
        value.bind( function( newval ) {
            // Hover efektleri için CSS kuralı ekle
            var style = '<style id="nav-hover-style">.main-navigation ul li a:hover, .main-navigation ul li:hover > a, .site-header-cart .cart-contents:hover { color: ' + newval + ' !important; }</style>';
            $( '#nav-hover-style' ).remove();
            $( 'head' ).append( style );
        } );
    } );
    
    // Footer arka plan rengi
    wp.customize( 'storefront_child_footer_bg_color', function( value ) {
        value.bind( function( newval ) {
            $( '.site-footer' ).css( 'background-color', newval );
        } );
    } );
    
    // Footer metin rengi
    wp.customize( 'storefront_child_footer_text_color', function( value ) {
        value.bind( function( newval ) {
            $( '.site-footer' ).css( 'color', newval );
        } );
    } );
    
    // Footer link rengi
    wp.customize( 'storefront_child_footer_link_color', function( value ) {
        value.bind( function( newval ) {
            $( '.site-footer a' ).css( 'color', newval );
        } );
    } );
    
    // Footer padding
    wp.customize( 'storefront_child_footer_padding', function( value ) {
        value.bind( function( newval ) {
            $( '.site-footer' ).css( {
                'padding-top': newval + 'px',
                'padding-bottom': newval + 'px'
            } );
        } );
    } );
    
    // Copyright metni
    wp.customize( 'storefront_child_copyright_text', function( value ) {
        value.bind( function( newval ) {
            $( '.copyright-text' ).html( newval );
        } );
    } );

    // Breadcrumb Colors
    wp.customize( 'storefront_child_breadcrumb_text_color', function( value ) {
        value.bind( function( newval ) {
            $( '.woocommerce-breadcrumb, .storefront-breadcrumb .breadcrumb' ).css( 'color', newval );
        } );
    } );

    wp.customize( 'storefront_child_breadcrumb_link_color', function( value ) {
        value.bind( function( newval ) {
            $( '.woocommerce-breadcrumb a, .storefront-breadcrumb .breadcrumb a' ).css( 'color', newval );
        } );
    } );

    wp.customize( 'storefront_child_breadcrumb_bg_color', function( value ) {
        value.bind( function( newval ) {
            $( '.woocommerce-breadcrumb, .storefront-breadcrumb .breadcrumb' ).css( 'background-color', newval );
        } );
    } );

    // Breadcrumb separator - No JS preview needed as it's output directly by PHP filters.
    // However, if a specific element displayed the separator and needed JS update:
    // wp.customize( 'storefront_child_breadcrumb_separator', function( value ) {
    //     value.bind( function( newval ) {
    //         // Example: $( '.breadcrumb-separator-element' ).text( newval );
    //     } );
    // } );


    // Pagination Colors
    wp.customize( 'storefront_child_pagination_text_color', function( value ) {
        value.bind( function( newval ) {
            $( '.navigation.pagination .nav-links a, .navigation.pagination .nav-links span, .woocommerce-pagination ul.page-numbers li a, .woocommerce-pagination ul.page-numbers li span' ).css( 'color', newval );
        } );
    } );

    wp.customize( 'storefront_child_pagination_bg_color', function( value ) {
        value.bind( function( newval ) {
            $( '.navigation.pagination .nav-links a, .navigation.pagination .nav-links span, .woocommerce-pagination ul.page-numbers li a, .woocommerce-pagination ul.page-numbers li span' ).css( 'background-color', newval );
        } );
    } );

    wp.customize( 'storefront_child_pagination_border_color', function( value ) {
        value.bind( function( newval ) {
            $( '.navigation.pagination .nav-links a, .navigation.pagination .nav-links span, .woocommerce-pagination ul.page-numbers li a, .woocommerce-pagination ul.page-numbers li span' ).css( 'border-color', newval );
        } );
    } );

    wp.customize( 'storefront_child_pagination_hover_text_color', function( value ) {
        value.bind( function( newval ) {
            var styleId = 'sf-child-pagination-hover-text-style';
            var css = '.navigation.pagination .nav-links a:hover, ' +
                      '.navigation.pagination .nav-links span:not(.dots):hover, ' +
                      '.woocommerce-pagination ul.page-numbers li a:hover, ' +
                      '.woocommerce-pagination ul.page-numbers li span:not(.dots):hover { color: ' + newval + ' !important; }';

            $( '#' + styleId ).remove();
            $( 'head' ).append( '<style id="' + styleId + '">' + css + '</style>' );
        } );
    } );

    wp.customize( 'storefront_child_pagination_hover_bg_color', function( value ) {
        value.bind( function( newval ) {
            var styleId = 'sf-child-pagination-hover-bg-style';
            var css = '.navigation.pagination .nav-links a:hover, ' +
                      '.navigation.pagination .nav-links span:not(.dots):hover, ' +
                      '.woocommerce-pagination ul.page-numbers li a:hover, ' +
                      '.woocommerce-pagination ul.page-numbers li span:not(.dots):hover { background-color: ' + newval + ' !important; border-color: ' + newval + ' !important; }';

            $( '#' + styleId ).remove();
            $( 'head' ).append( '<style id="' + styleId + '">' + css + '</style>' );
        } );
    } );

    wp.customize( 'storefront_child_pagination_active_text_color', function( value ) {
        value.bind( function( newval ) {
            $( '.navigation.pagination .nav-links span.current, .woocommerce-pagination ul.page-numbers li span.current' ).css( 'color', newval );
        } );
    } );

    wp.customize( 'storefront_child_pagination_active_bg_color', function( value ) {
        value.bind( function( newval ) {
            $( '.navigation.pagination .nav-links span.current, .woocommerce-pagination ul.page-numbers li span.current' ).css( {
                'background-color': newval,
                'border-color': newval
            } );
        } );
    } );
    
} )( jQuery );