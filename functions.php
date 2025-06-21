<?php

/**
 * Loads the StoreFront parent theme stylesheet.
 */

function storefront_child_theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );

}
add_action( 'wp_enqueue_scripts', 'storefront_child_theme_enqueue_styles' );

/**
 * Note: Do Not alter or remove the code above this text and only add your custom functions below here.
 */



 // Customizer seçeneklerini ekle

// Custom Reset Button Control Class
if ( class_exists( 'WP_Customize_Control' ) ) {
    class Storefront_Child_Reset_Button_Control extends WP_Customize_Control {
        public $type = 'storefront_child_reset_button'; // Unique type for your control

        public function render_content() {
            ?>
            <div style="padding-top:10px; padding-bottom:10px;">
                <button type="button" id="storefront-child-reset-theme-settings-button" class="button button-danger" style="width:100%;">
                    <?php esc_html_e( 'Tüm Tema Ayarlarını Sıfırla', 'storefront-child' ); ?>
                </button>
                <p class="description" style="margin-top:10px;">
                    <?php esc_html_e( 'DİKKAT: Bu işlem geri alınamaz. Tüm storefront-child tema özelleştirme ayarları varsayılan değerlerine döndürülecektir.', 'storefront-child' ); ?>
                </p>
            </div>
            <?php
        }
    }
}

add_action( 'customize_register', 'storefront_child_customize_register' );

function storefront_child_customize_register( $wp_customize ) {
    
    // ==============================================
    // GENEL TASARIM SEKSİYONU
    // ==============================================
    
    $wp_customize->add_section( 'storefront_child_general_design', array(
        'title'    => __( 'Genel Tasarım', 'storefront-child' ),
        'priority' => 30,
    ) );
    
    // Ana Renk Şeması
    $wp_customize->add_setting( 'storefront_child_primary_color', array(
        'default'           => '#96588a',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage',
    ) );
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'storefront_child_primary_color', array(
        'label'    => __( 'Ana Renk', 'storefront-child' ),
        'section'  => 'storefront_child_general_design',
        'settings' => 'storefront_child_primary_color',
    ) ) );
    
    // İkincil Renk
    $wp_customize->add_setting( 'storefront_child_secondary_color', array(
        'default'           => '#43454b',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage',
    ) );
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'storefront_child_secondary_color', array(
        'label'    => __( 'İkincil Renk', 'storefront-child' ),
        'section'  => 'storefront_child_general_design',
        'settings' => 'storefront_child_secondary_color',
    ) ) );
    
    // Vurgu Rengi
    $wp_customize->add_setting( 'storefront_child_accent_color', array(
        'default'           => '#ebe9eb',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage',
    ) );
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'storefront_child_accent_color', array(
        'label'    => __( 'Vurgu Rengi', 'storefront-child' ),
        'section'  => 'storefront_child_general_design',
        'settings' => 'storefront_child_accent_color',
    ) ) );
    
    // Container Genişliği
    $wp_customize->add_setting( 'storefront_child_container_width', array(
        'default'           => 1200,
        'sanitize_callback' => 'absint',
        'transport'         => 'postMessage',
    ) );
    
    $wp_customize->add_control( 'storefront_child_container_width', array(
        'label'       => __( 'Container Genişliği (px)', 'storefront-child' ),
        'section'     => 'storefront_child_general_design',
        'type'        => 'number',
        'input_attrs' => array(
            'min'  => 960,
            'max'  => 1920,
            'step' => 10,
        ),
    ) );
    
    // Border Radius
    $wp_customize->add_setting( 'storefront_child_border_radius', array(
        'default'           => 0,
        'sanitize_callback' => 'absint',
        'transport'         => 'postMessage',
    ) );
    
    $wp_customize->add_control( 'storefront_child_border_radius', array(
        'label'       => __( 'Genel Border Radius (px)', 'storefront-child' ),
        'section'     => 'storefront_child_general_design',
        'type'        => 'number',
        'input_attrs' => array(
            'min'  => 0,
            'max'  => 50,
            'step' => 1,
        ),
    ) );
    
    // Ana Font Ailesi
    $wp_customize->add_setting( 'storefront_child_font_family', array(
        'default'           => 'system',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'postMessage',
    ) );
    
    $wp_customize->add_control( 'storefront_child_font_family', array(
        'label'   => __( 'Ana Font Ailesi', 'storefront-child' ),
        'section' => 'storefront_child_general_design',
        'type'    => 'select',
        'choices' => array(
            'system'      => 'Sistem Fontu',
            'roboto'      => 'Roboto',
            'open-sans'   => 'Open Sans',
            'lato'        => 'Lato',
            'montserrat'  => 'Montserrat',
            'poppins'     => 'Poppins',
            'nunito'      => 'Nunito',
            'source-sans' => 'Source Sans Pro',
        ),
    ) );
    
    // ==============================================
    // HEADER SEKSİYONU
    // ==============================================
    
    $wp_customize->add_section( 'storefront_child_header', array(
        'title'    => __( 'Header Özelleştirmeleri', 'storefront-child' ),
        'priority' => 31,
    ) );
    
    // Header Arka Plan Rengi
    $wp_customize->add_setting( 'storefront_child_header_bg_color', array(
        'default'           => '#ffffff',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage',
    ) );
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'storefront_child_header_bg_color', array(
        'label'    => __( 'Header Arka Plan Rengi', 'storefront-child' ),
        'section'  => 'storefront_child_header',
        'settings' => 'storefront_child_header_bg_color',
    ) ) );
    
    // Header Metin Rengi
    $wp_customize->add_setting( 'storefront_child_header_text_color', array(
        'default'           => '#404040',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage',
    ) );
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'storefront_child_header_text_color', array(
        'label'    => __( 'Header Metin Rengi', 'storefront-child' ),
        'section'  => 'storefront_child_header',
        'settings' => 'storefront_child_header_text_color',
    ) ) );
    
    // Logo Maksimum Genişliği
    $wp_customize->add_setting( 'storefront_child_logo_width', array(
        'default'           => 200,
        'sanitize_callback' => 'absint',
        'transport'         => 'postMessage',
    ) );
    
    $wp_customize->add_control( 'storefront_child_logo_width', array(
        'label'       => __( 'Logo Maksimum Genişliği (px)', 'storefront-child' ),
        'section'     => 'storefront_child_header',
        'type'        => 'number',
        'input_attrs' => array(
            'min'  => 50,
            'max'  => 500,
            'step' => 10,
        ),
    ) );
    
    // Header Padding
    $wp_customize->add_setting( 'storefront_child_header_padding', array(
        'default'           => 20,
        'sanitize_callback' => 'absint',
        'transport'         => 'postMessage',
    ) );
    
    $wp_customize->add_control( 'storefront_child_header_padding', array(
        'label'       => __( 'Header Padding (px)', 'storefront-child' ),
        'section'     => 'storefront_child_header',
        'type'        => 'number',
        'input_attrs' => array(
            'min'  => 0,
            'max'  => 100,
            'step' => 5,
        ),
    ) );
    
    // Sticky Header
    $wp_customize->add_setting( 'storefront_child_sticky_header', array(
        'default'           => false,
        'sanitize_callback' => 'wp_validate_boolean',
    ) );
    
    $wp_customize->add_control( 'storefront_child_sticky_header', array(
        'label'   => __( 'Sticky Header Aktif', 'storefront-child' ),
        'section' => 'storefront_child_header',
        'type'    => 'checkbox',
    ) );
    
    // Header Border
    $wp_customize->add_setting( 'storefront_child_header_border', array(
        'default'           => true,
        'sanitize_callback' => 'wp_validate_boolean',
    ) );
    
    $wp_customize->add_control( 'storefront_child_header_border', array(
        'label'   => __( 'Header Alt Çizgi', 'storefront-child' ),
        'section' => 'storefront_child_header',
        'type'    => 'checkbox',
    ) );
    
    // Navigation Menu Rengi
    $wp_customize->add_setting( 'storefront_child_nav_color', array(
        'default'           => '#333333',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage',
    ) );
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'storefront_child_nav_color', array(
        'label'    => __( 'Navigasyon Menü Rengi', 'storefront-child' ),
        'section'  => 'storefront_child_header',
        'settings' => 'storefront_child_nav_color',
    ) ) );
    
    // Navigation Hover Rengi
    $wp_customize->add_setting( 'storefront_child_nav_hover_color', array(
        'default'           => '#96588a',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage',
    ) );
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'storefront_child_nav_hover_color', array(
        'label'    => __( 'Navigasyon Hover Rengi', 'storefront-child' ),
        'section'  => 'storefront_child_header',
        'settings' => 'storefront_child_nav_hover_color',
    ) ) );
    
    // ==============================================
    // FOOTER SEKSİYONU
    // ==============================================
    
    $wp_customize->add_section( 'storefront_child_footer', array(
        'title'    => __( 'Footer Özelleştirmeleri', 'storefront-child' ),
        'priority' => 32,
    ) );
    
    // Footer Arka Plan Rengi
    $wp_customize->add_setting( 'storefront_child_footer_bg_color', array(
        'default'           => '#f0f0f0',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage',
    ) );
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'storefront_child_footer_bg_color', array(
        'label'    => __( 'Footer Arka Plan Rengi', 'storefront-child' ),
        'section'  => 'storefront_child_footer',
        'settings' => 'storefront_child_footer_bg_color',
    ) ) );
    
    // Footer Metin Rengi
    $wp_customize->add_setting( 'storefront_child_footer_text_color', array(
        'default'           => '#6d6d6d',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage',
    ) );
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'storefront_child_footer_text_color', array(
        'label'    => __( 'Footer Metin Rengi', 'storefront-child' ),
        'section'  => 'storefront_child_footer',
        'settings' => 'storefront_child_footer_text_color',
    ) ) );
    
    // Footer Link Rengi
    $wp_customize->add_setting( 'storefront_child_footer_link_color', array(
        'default'           => '#96588a',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage',
    ) );
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'storefront_child_footer_link_color', array(
        'label'    => __( 'Footer Link Rengi', 'storefront-child' ),
        'section'  => 'storefront_child_footer',
        'settings' => 'storefront_child_footer_link_color',
    ) ) );
    
    // Footer Padding
    $wp_customize->add_setting( 'storefront_child_footer_padding', array(
        'default'           => 40,
        'sanitize_callback' => 'absint',
        'transport'         => 'postMessage',
    ) );
    
    $wp_customize->add_control( 'storefront_child_footer_padding', array(
        'label'       => __( 'Footer Padding (px)', 'storefront-child' ),
        'section'     => 'storefront_child_footer',
        'type'        => 'number',
        'input_attrs' => array(
            'min'  => 0,
            'max'  => 100,
            'step' => 5,
        ),
    ) );
    
    // Copyright Metni
    $wp_customize->add_setting( 'storefront_child_copyright_text', array(
        'default'           => '&copy; ' . date('Y') . ' ' . get_bloginfo('name') . '. Tüm hakları saklıdır.',
        'sanitize_callback' => 'wp_kses_post',
        'transport'         => 'postMessage',
    ) );
    
    $wp_customize->add_control( 'storefront_child_copyright_text', array(
        'label'   => __( 'Copyright Metni', 'storefront-child' ),
        'section' => 'storefront_child_footer',
        'type'    => 'textarea',
    ) );
    
    // Footer Widget Kolonları
    $wp_customize->add_setting( 'storefront_child_footer_columns', array(
        'default'           => 4,
        'sanitize_callback' => 'absint',
    ) );
    
    $wp_customize->add_control( 'storefront_child_footer_columns', array(
        'label'   => __( 'Footer Widget Kolon Sayısı', 'storefront-child' ),
        'section' => 'storefront_child_footer',
        'type'    => 'select',
        'choices' => array(
            1 => '1 Kolon',
            2 => '2 Kolon',
            3 => '3 Kolon',
            4 => '4 Kolon',
        ),
    ) );
    
    // Sosyal Medya Linkleri
    $social_networks = array(
        'facebook'  => 'Facebook',
        'twitter'   => 'Twitter (X)',
        'instagram' => 'Instagram',
        'youtube'   => 'YouTube',
        'linkedin'  => 'LinkedIn',
    );
    
    foreach( $social_networks as $network => $label ) {
        $wp_customize->add_setting( 'storefront_child_social_' . $network, array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
        ) );
        
        $wp_customize->add_control( 'storefront_child_social_' . $network, array(
            'label'   => $label . ' URL',
            'section' => 'storefront_child_footer',
            'type'    => 'url',
        ) );
    }

    // Reset Settings Section
    $wp_customize->add_section( 'storefront_child_reset_section', array(
        'title'       => __( 'Tema Ayarlarını Sıfırla', 'storefront-child' ),
        'priority'    => 200, // High priority to appear at the bottom
        'description' => __( 'Bu bölümdeki butonu kullanarak tüm Storefront Child tema ayarlarını varsayılan fabrika ayarlarına sıfırlayabilirsiniz.', 'storefront-child'),
    ) );

    // Dummy setting for the reset button
    $wp_customize->add_setting( 'storefront_child_reset_dummy_setting', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field', // Basic sanitization
        'transport'         => 'postMessage', // Important for JS interaction
    ) );

    // Custom Reset Button Control
    if ( class_exists( 'Storefront_Child_Reset_Button_Control' ) ) {
        $wp_customize->add_control( new Storefront_Child_Reset_Button_Control( $wp_customize, 'storefront_child_reset_button_control', array(
            'label'       => '', // Label can be empty as button has text
            'section'     => 'storefront_child_reset_section',
            'settings'    => 'storefront_child_reset_dummy_setting', // Associated with the dummy setting
        ) ) );
    }
}

// ==============================================
// CSS ÇIKTISI
// ==============================================

add_action( 'wp_head', 'storefront_child_customizer_css' );

function storefront_child_customizer_css() {
    $primary_color = get_theme_mod( 'storefront_child_primary_color', '#96588a' );
    $secondary_color = get_theme_mod( 'storefront_child_secondary_color', '#43454b' );
    $accent_color = get_theme_mod( 'storefront_child_accent_color', '#ebe9eb' );
    $container_width = get_theme_mod( 'storefront_child_container_width', 1200 );
    $border_radius = get_theme_mod( 'storefront_child_border_radius', 0 );
    $font_family = get_theme_mod( 'storefront_child_font_family', 'system' );
    
    // Header ayarları
    $header_bg = get_theme_mod( 'storefront_child_header_bg_color', '#ffffff' );
    $header_text = get_theme_mod( 'storefront_child_header_text_color', '#404040' );
    $logo_width = get_theme_mod( 'storefront_child_logo_width', 200 );
    $header_padding = get_theme_mod( 'storefront_child_header_padding', 20 );
    $nav_color = get_theme_mod( 'storefront_child_nav_color', '#333333' );
    $nav_hover = get_theme_mod( 'storefront_child_nav_hover_color', '#96588a' );
    $header_border = get_theme_mod( 'storefront_child_header_border', true );
    
    // Footer ayarları
    $footer_bg = get_theme_mod( 'storefront_child_footer_bg_color', '#f0f0f0' );
    $footer_text = get_theme_mod( 'storefront_child_footer_text_color', '#6d6d6d' );
    $footer_link = get_theme_mod( 'storefront_child_footer_link_color', '#96588a' );
    $footer_padding = get_theme_mod( 'storefront_child_footer_padding', 40 );
    $footer_columns = get_theme_mod( 'storefront_child_footer_columns', 4 );
    
    // Font ailesi mapping
    $font_families = array(
        'roboto'      => "'Roboto', sans-serif",
        'open-sans'   => "'Open Sans', sans-serif",
        'lato'        => "'Lato', sans-serif",
        'montserrat'  => "'Montserrat', sans-serif",
        'poppins'     => "'Poppins', sans-serif",
        'nunito'      => "'Nunito', sans-serif",
        'source-sans' => "'Source Sans Pro', sans-serif",
        'system'      => "-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif"
    );
    
    $selected_font = isset($font_families[$font_family]) ? $font_families[$font_family] : $font_families['system'];
    
    ?>
    <style type="text/css">
        /* Genel Tasarım */
        :root {
            --primary-color: <?php echo esc_attr($primary_color); ?>;
            --secondary-color: <?php echo esc_attr($secondary_color); ?>;
            --accent-color: <?php echo esc_attr($accent_color); ?>;
            --border-radius: <?php echo esc_attr($border_radius); ?>px;
        }
        
        body {
            font-family: <?php echo $selected_font; ?>;
        }
        
        .col-full {
            max-width: <?php echo esc_attr($container_width); ?>px;
        }
        
        button, .button, input[type="submit"], .woocommerce #respond input#submit, 
        .woocommerce a.button, .woocommerce button.button, .woocommerce input.button {
            background-color: var(--primary-color);
            border-radius: var(--border-radius);
        }
        
        .woocommerce-tabs ul.tabs li.active a,
        .woocommerce div.product .woocommerce-tabs ul.tabs li.active {
            background-color: var(--primary-color);
        }
        
        /* Header Stilleri */
        .site-header {
            background-color: <?php echo esc_attr($header_bg); ?>;
            color: <?php echo esc_attr($header_text); ?>;
            padding-top: <?php echo esc_attr($header_padding); ?>px;
            padding-bottom: <?php echo esc_attr($header_padding); ?>px;
            <?php if (!$header_border): ?>border-bottom: none;<?php endif; ?>
        }
        
        .site-branding img {
            max-width: <?php echo esc_attr($logo_width); ?>px;
            height: auto;
        }
        
        .main-navigation ul li a,
        .site-header-cart .cart-contents {
            color: <?php echo esc_attr($nav_color); ?>;
        }
        
        .main-navigation ul li a:hover,
        .main-navigation ul li:hover > a,
        .site-header-cart .cart-contents:hover {
            color: <?php echo esc_attr($nav_hover); ?>;
        }
        
        <?php if (get_theme_mod('storefront_child_sticky_header', false)): ?>
        .site-header {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 999;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        
        .site-main {
            margin-top: 100px;
        }
        <?php endif; ?>
        
        /* Footer Stilleri */
        .site-footer {
            background-color: <?php echo esc_attr($footer_bg); ?>;
            color: <?php echo esc_attr($footer_text); ?>;
            padding-top: <?php echo esc_attr($footer_padding); ?>px;
            padding-bottom: <?php echo esc_attr($footer_padding); ?>px;
        }
        
        .site-footer a {
            color: <?php echo esc_attr($footer_link); ?>;
        }
        
        .footer-widgets {
            display: grid;
            grid-template-columns: repeat(<?php echo esc_attr($footer_columns); ?>, 1fr);
            gap: 30px;
            margin-bottom: 40px;
        }
        
        @media (max-width: 768px) {
            .footer-widgets {
                grid-template-columns: 1fr;
            }
        }
        
        .footer-social-links {
            text-align: center;
            margin-top: 20px;
        }
        
        .footer-social-links a {
            display: inline-block;
            margin: 0 10px;
            font-size: 18px;
            text-decoration: none;
        }
        
        .copyright-text {
            text-align: center;
            margin-top: 20px;
            padding-top: 20px;
            border-top: 1px solid rgba(255,255,255,0.1);
            font-size: 14px;
        }
    </style>
    <?php
}

// ==============================================
// GOOGLE FONTS YÜKLEYİCİ
// ==============================================

add_action( 'wp_enqueue_scripts', 'storefront_child_google_fonts' );

function storefront_child_google_fonts() {
    $font_family = get_theme_mod( 'storefront_child_font_family', 'system' );
    
    $google_fonts = array(
        'roboto'      => 'Roboto:300,400,500,700',
        'open-sans'   => 'Open+Sans:300,400,600,700',
        'lato'        => 'Lato:300,400,700',
        'montserrat'  => 'Montserrat:300,400,500,600,700',
        'poppins'     => 'Poppins:300,400,500,600,700',
        'nunito'      => 'Nunito:300,400,600,700',
        'source-sans' => 'Source+Sans+Pro:300,400,600,700',
    );
    
    if ( isset($google_fonts[$font_family]) ) {
        wp_enqueue_style( 
            'storefront-child-google-fonts', 
            'https://fonts.googleapis.com/css?family=' . $google_fonts[$font_family] . '&display=swap',
            array(),
            null
        );
    }
}

// ==============================================
// FOOTER ÖZELLEŞTİRMELERİ
// ==============================================

// Footer widget alanları oluştur
add_action( 'widgets_init', 'storefront_child_footer_widgets' );

function storefront_child_footer_widgets() {
    $footer_columns = get_theme_mod( 'storefront_child_footer_columns', 4 );
    
    for ( $i = 1; $i <= $footer_columns; $i++ ) {
        register_sidebar( array(
            'name'          => sprintf( __( 'Footer %d', 'storefront-child' ), $i ),
            'id'            => 'footer-' . $i,
            'description'   => sprintf( __( 'Footer %d widget alanı', 'storefront-child' ), $i ),
            'before_widget' => '<div class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        ) );
    }
}

// Footer içeriği özelleştir
add_action( 'storefront_footer', 'storefront_child_custom_footer_content', 15 );

function storefront_child_custom_footer_content() {
    $footer_columns = get_theme_mod( 'storefront_child_footer_columns', 4 );
    $copyright_text = get_theme_mod( 'storefront_child_copyright_text', '&copy; ' . date('Y') . ' ' . get_bloginfo('name') . '. Tüm hakları saklıdır.' );
    
    // Sosyal medya linkleri
    $social_networks = array(
        'facebook'  => 'Facebook',
        'twitter'   => 'Twitter',
        'instagram' => 'Instagram',
        'youtube'   => 'YouTube',
        'linkedin'  => 'LinkedIn',
    );
    
    echo '<div class="footer-widgets">';
    for ( $i = 1; $i <= $footer_columns; $i++ ) {
        if ( is_active_sidebar( 'footer-' . $i ) ) {
            echo '<div class="footer-widget-' . $i . '">';
            dynamic_sidebar( 'footer-' . $i );
            echo '</div>';
        }
    }
    echo '</div>';
    
    // Sosyal medya linkleri
    $social_links = '';
    foreach ( $social_networks as $network => $label ) {
        $url = get_theme_mod( 'storefront_child_social_' . $network, '' );
        if ( $url ) {
            $social_links .= '<a href="' . esc_url( $url ) . '" target="_blank" rel="noopener">' . $label . '</a>';
        }
    }
    
    if ( $social_links ) {
        echo '<div class="footer-social-links">' . $social_links . '</div>';
    }
    
    // Copyright metni
    if ( $copyright_text ) {
        echo '<div class="copyright-text">' . wp_kses_post( $copyright_text ) . '</div>';
    }
}

// ==============================================
// CUSTOMIZER PREVIEW JS
// ==============================================

add_action( 'customize_preview_init', 'storefront_child_customize_preview' );

function storefront_child_customize_preview() {
    wp_enqueue_script( 
        'storefront-child-customizer-preview', 
        get_stylesheet_directory_uri() . '/js/customizer-preview.js', 
        array( 'customize-preview' ), 
        '1.0.0', 
        true 
    );
}



// WooCommerce ve Blog customizer seçeneklerini ekle
add_action( 'customize_register', 'storefront_child_woocommerce_blog_customize_register' );

function storefront_child_woocommerce_blog_customize_register( $wp_customize ) {
    
    // ==============================================
    // WOOCOMMERCE SEKSİYONU
    // ==============================================
    
    $wp_customize->add_section( 'storefront_child_woocommerce', array(
        'title'    => __( 'WooCommerce Özelleştirmeleri', 'storefront-child' ),
        'priority' => 33,
    ) );
    
    // Ürün Listeleme - Kolon Sayısı
    $wp_customize->add_setting( 'storefront_child_shop_columns', array(
        'default'           => 3,
        'sanitize_callback' => 'absint',
    ) );
    
    $wp_customize->add_control( 'storefront_child_shop_columns', array(
        'label'   => __( 'Mağaza Sayfa Kolon Sayısı', 'storefront-child' ),
        'section' => 'storefront_child_woocommerce',
        'type'    => 'select',
        'choices' => array(
            2 => '2 Kolon',
            3 => '3 Kolon',
            4 => '4 Kolon',
            5 => '5 Kolon',
        ),
    ) );
    
    // Sayfa Başına Ürün Sayısı
    $wp_customize->add_setting( 'storefront_child_products_per_page', array(
        'default'           => 12,
        'sanitize_callback' => 'absint',
    ) );
    
    $wp_customize->add_control( 'storefront_child_products_per_page', array(
        'label'       => __( 'Sayfa Başına Ürün Sayısı', 'storefront-child' ),
        'section'     => 'storefront_child_woocommerce',
        'type'        => 'number',
        'input_attrs' => array(
            'min'  => 4,
            'max'  => 100,
            'step' => 4,
        ),
    ) );
    
    // Ürün Kart Stili
    $wp_customize->add_setting( 'storefront_child_product_card_style', array(
        'default'           => 'default',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    
    $wp_customize->add_control( 'storefront_child_product_card_style', array(
        'label'   => __( 'Ürün Kart Stili', 'storefront-child' ),
        'section' => 'storefront_child_woocommerce',
        'type'    => 'select',
        'choices' => array(
            'default' => 'Varsayılan',
            'modern'  => 'Modern',
            'minimal' => 'Minimal',
            'shadow'  => 'Gölgeli',
        ),
    ) );
    
    // Ürün Hover Efekti
    $wp_customize->add_setting( 'storefront_child_product_hover_effect', array(
        'default'           => 'none',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    
    $wp_customize->add_control( 'storefront_child_product_hover_effect', array(
        'label'   => __( 'Ürün Hover Efekti', 'storefront-child' ),
        'section' => 'storefront_child_woocommerce',
        'type'    => 'select',
        'choices' => array(
            'none'     => 'Yok',
            'zoom'     => 'Yakınlaştır',
            'lift'     => 'Kaldır',
            'fade'     => 'Solma',
            'rotate'   => 'Döndür',
        ),
    ) );
    
    // Sepet Butonu Stili
    $wp_customize->add_setting( 'storefront_child_cart_button_style', array(
        'default'           => 'default',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    
    $wp_customize->add_control( 'storefront_child_cart_button_style', array(
        'label'   => __( 'Sepete Ekle Butonu Stili', 'storefront-child' ),
        'section' => 'storefront_child_woocommerce',
        'type'    => 'select',
        'choices' => array(
            'default'  => 'Varsayılan',
            'rounded'  => 'Yuvarlak',
            'square'   => 'Kare',
            'outline'  => 'Çerçeveli',
            'gradient' => 'Gradyan',
        ),
    ) );
    
    // Ürün Badge Rengi
    $wp_customize->add_setting( 'storefront_child_sale_badge_color', array(
        'default'           => '#77a464',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage',
    ) );
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'storefront_child_sale_badge_color', array(
        'label'    => __( 'İndirim Badge Rengi', 'storefront-child' ),
        'section'  => 'storefront_child_woocommerce',
        'settings' => 'storefront_child_sale_badge_color',
    ) ) );
    
    // Ürün Fiyat Rengi
    $wp_customize->add_setting( 'storefront_child_price_color', array(
        'default'           => '#77a464',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage',
    ) );
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'storefront_child_price_color', array(
        'label'    => __( 'Ürün Fiyat Rengi', 'storefront-child' ),
        'section'  => 'storefront_child_woocommerce',
        'settings' => 'storefront_child_price_color',
    ) ) );
    
    // Ürün Sayfası Layout
    $wp_customize->add_setting( 'storefront_child_single_product_layout', array(
        'default'           => 'default',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    
    $wp_customize->add_control( 'storefront_child_single_product_layout', array(
        'label'   => __( 'Tek Ürün Sayfası Layout', 'storefront-child' ),
        'section' => 'storefront_child_woocommerce',
        'type'    => 'select',
        'choices' => array(
            'default'    => 'Varsayılan',
            'wide'       => 'Geniş',
            'sticky'     => 'Yapışkan Galeri',
            'fullwidth'  => 'Tam Genişlik',
        ),
    ) );
    
    // Ürün Tab Stili
    $wp_customize->add_setting( 'storefront_child_product_tabs_style', array(
        'default'           => 'default',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    
    $wp_customize->add_control( 'storefront_child_product_tabs_style', array(
        'label'   => __( 'Ürün Tab Stili', 'storefront-child' ),
        'section' => 'storefront_child_woocommerce',
        'type'    => 'select',
        'choices' => array(
            'default'  => 'Varsayılan',
            'pills'    => 'Haplar',
            'minimal'  => 'Minimal',
            'vertical' => 'Dikey',
        ),
    ) );
    
    // Checkout Sayfa Stili
    $wp_customize->add_setting( 'storefront_child_checkout_style', array(
        'default'           => 'default',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    
    $wp_customize->add_control( 'storefront_child_checkout_style', array(
        'label'   => __( 'Checkout Sayfa Stili', 'storefront-child' ),
        'section' => 'storefront_child_woocommerce',
        'type'    => 'select',
        'choices' => array(
            'default'  => 'Varsayılan',
            'modern'   => 'Modern',
            'minimal'  => 'Minimal',
            'compact'  => 'Kompakt',
        ),
    ) );
    
    // ==============================================
    // BLOG VE İÇERİK SEKSİYONU
    // ==============================================
    
    $wp_customize->add_section( 'storefront_child_blog_content', array(
        'title'    => __( 'Blog ve İçerik', 'storefront-child' ),
        'priority' => 34,
    ) );
    
    // Blog Layout
    $wp_customize->add_setting( 'storefront_child_blog_layout', array(
        'default'           => 'default',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    
    $wp_customize->add_control( 'storefront_child_blog_layout', array(
        'label'   => __( 'Blog Layout', 'storefront-child' ),
        'section' => 'storefront_child_blog_content',
        'type'    => 'select',
        'choices' => array(
            'default'   => 'Varsayılan',
            'grid'      => 'Grid',
            'masonry'   => 'Masonry',
            'list'      => 'Liste',
            'magazine'  => 'Dergi Stili',
        ),
    ) );
    
    // Blog Grid Kolonları
    $wp_customize->add_setting( 'storefront_child_blog_columns', array(
        'default'           => 2,
        'sanitize_callback' => 'absint',
    ) );
    
    $wp_customize->add_control( 'storefront_child_blog_columns', array(
        'label'   => __( 'Blog Grid Kolon Sayısı', 'storefront-child' ),
        'section' => 'storefront_child_blog_content',
        'type'    => 'select',
        'choices' => array(
            1 => '1 Kolon',
            2 => '2 Kolon',
            3 => '3 Kolon',
            4 => '4 Kolon',
        ),
        'active_callback' => function() {
            return in_array( get_theme_mod( 'storefront_child_blog_layout', 'default' ), array( 'grid', 'masonry' ) );
        },
    ) );
    
    // Yazı Meta Bilgileri
    $wp_customize->add_setting( 'storefront_child_post_meta_author', array(
        'default'           => true,
        'sanitize_callback' => 'wp_validate_boolean',
    ) );
    
    $wp_customize->add_control( 'storefront_child_post_meta_author', array(
        'label'   => __( 'Yazar Bilgisini Göster', 'storefront-child' ),
        'section' => 'storefront_child_blog_content',
        'type'    => 'checkbox',
    ) );
    
    $wp_customize->add_setting( 'storefront_child_post_meta_date', array(
        'default'           => true,
        'sanitize_callback' => 'wp_validate_boolean',
    ) );
    
    $wp_customize->add_control( 'storefront_child_post_meta_date', array(
        'label'   => __( 'Tarih Bilgisini Göster', 'storefront-child' ),
        'section' => 'storefront_child_blog_content',
        'type'    => 'checkbox',
    ) );
    
    $wp_customize->add_setting( 'storefront_child_post_meta_category', array(
        'default'           => true,
        'sanitize_callback' => 'wp_validate_boolean',
    ) );
    
    $wp_customize->add_control( 'storefront_child_post_meta_category', array(
        'label'   => __( 'Kategori Bilgisini Göster', 'storefront-child' ),
        'section' => 'storefront_child_blog_content',
        'type'    => 'checkbox',
    ) );
    
    $wp_customize->add_setting( 'storefront_child_post_meta_comments', array(
        'default'           => true,
        'sanitize_callback' => 'wp_validate_boolean',
    ) );
    
    $wp_customize->add_control( 'storefront_child_post_meta_comments', array(
        'label'   => __( 'Yorum Sayısını Göster', 'storefront-child' ),
        'section' => 'storefront_child_blog_content',
        'type'    => 'checkbox',
        'priority' => 20, // Assuming this is the priority of the comments control
    ) );

    // Show Post Tags
    $wp_customize->add_setting( 'storefront_child_post_meta_tags', array(
        'default'           => true,
        'sanitize_callback' => 'wp_validate_boolean',
    ) );

    $wp_customize->add_control( 'storefront_child_post_meta_tags', array(
        'label'   => __( 'Etiketleri Göster', 'storefront-child' ),
        'section' => 'storefront_child_blog_content',
        'type'    => 'checkbox',
        'settings' => 'storefront_child_post_meta_tags',
        'priority' => 25,
    ) );
    
    // Excerpt Uzunluğu
    $wp_customize->add_setting( 'storefront_child_excerpt_length', array(
        'default'           => 55,
        'sanitize_callback' => 'absint',
    ) );
    
    $wp_customize->add_control( 'storefront_child_excerpt_length', array(
        'label'       => __( 'Özet Uzunluğu (kelime)', 'storefront-child' ),
        'section'     => 'storefront_child_blog_content',
        'type'        => 'number',
        'input_attrs' => array(
            'min'  => 10,
            'max'  => 200,
            'step' => 5,
        ),
    ) );
    
    // Devamını Oku Metni
    $wp_customize->add_setting( 'storefront_child_read_more_text', array(
        'default'           => 'Devamını Oku',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    
    $wp_customize->add_control( 'storefront_child_read_more_text', array(
        'label'   => __( 'Devamını Oku Metni', 'storefront-child' ),
        'section' => 'storefront_child_blog_content',
        'type'    => 'text',
    ) );
    
    // Sidebar Pozisyonu
    $wp_customize->add_setting( 'storefront_child_sidebar_position', array(
        'default'           => 'right',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    
    $wp_customize->add_control( 'storefront_child_sidebar_position', array(
        'label'   => __( 'Sidebar Pozisyonu', 'storefront-child' ),
        'section' => 'storefront_child_blog_content',
        'type'    => 'select',
        'choices' => array(
            'left'  => 'Sol',
            'right' => 'Sağ',
            'none'  => 'Yok',
        ),
    ) );
    
    // Sidebar Genişliği
    $wp_customize->add_setting( 'storefront_child_sidebar_width', array(
        'default'           => 25,
        'sanitize_callback' => 'absint',
        'transport'         => 'postMessage',
    ) );
    
    $wp_customize->add_control( 'storefront_child_sidebar_width', array(
        'label'       => __( 'Sidebar Genişliği (%)', 'storefront-child' ),
        'section'     => 'storefront_child_blog_content',
        'type'        => 'range',
        'input_attrs' => array(
            'min'  => 20,
            'max'  => 40,
            'step' => 1,
        ),
        'active_callback' => function() {
            return get_theme_mod( 'storefront_child_sidebar_position', 'right' ) !== 'none';
        },
    ) );
    
    // Breadcrumb Gösterimi
    $wp_customize->add_setting( 'storefront_child_breadcrumb_enable', array(
        'default'           => true,
        'sanitize_callback' => 'wp_validate_boolean',
    ) );
    
    $wp_customize->add_control( 'storefront_child_breadcrumb_enable', array(
        'label'   => __( 'Breadcrumb Göster', 'storefront-child' ),
        'section' => 'storefront_child_blog_content',
        'type'    => 'checkbox',
    ) );
    
    // Breadcrumb Stili
    $wp_customize->add_setting( 'storefront_child_breadcrumb_style', array(
        'default'           => 'default',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    
    $wp_customize->add_control( 'storefront_child_breadcrumb_style', array(
        'label'   => __( 'Breadcrumb Stili', 'storefront-child' ),
        'section' => 'storefront_child_blog_content',
        'type'    => 'select',
        'choices' => array(
            'default' => 'Varsayılan',
            'modern'  => 'Modern',
            'minimal' => 'Minimal',
            'rounded' => 'Yuvarlak',
        ),
        'active_callback' => function() {
            return get_theme_mod( 'storefront_child_breadcrumb_enable', true );
        },
        'priority' => 55, // Assigning a base priority
    ) );

    // Breadcrumb Text Color
    $wp_customize->add_setting( 'storefront_child_breadcrumb_text_color', array(
        'default'           => '#666666',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'storefront_child_breadcrumb_text_color_control', array(
        'label'       => __( 'Breadcrumb Metin Rengi', 'storefront-child' ),
        'section'     => 'storefront_child_blog_content',
        'settings'    => 'storefront_child_breadcrumb_text_color',
        'priority'    => 60,
        'active_callback' => function() {
            return get_theme_mod( 'storefront_child_breadcrumb_enable', true );
        },
    ) ) );

    // Breadcrumb Link Color
    $wp_customize->add_setting( 'storefront_child_breadcrumb_link_color', array(
        'default'           => '#337ab7',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'storefront_child_breadcrumb_link_color_control', array(
        'label'       => __( 'Breadcrumb Link Rengi', 'storefront-child' ),
        'section'     => 'storefront_child_blog_content',
        'settings'    => 'storefront_child_breadcrumb_link_color',
        'priority'    => 65,
        'active_callback' => function() {
            return get_theme_mod( 'storefront_child_breadcrumb_enable', true );
        },
    ) ) );

    // Breadcrumb Background Color
    $wp_customize->add_setting( 'storefront_child_breadcrumb_bg_color', array(
        'default'           => '#f5f5f5',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'storefront_child_breadcrumb_bg_color_control', array(
        'label'       => __( 'Breadcrumb Arka Plan Rengi', 'storefront-child' ),
        'section'     => 'storefront_child_blog_content',
        'settings'    => 'storefront_child_breadcrumb_bg_color',
        'priority'    => 70,
        'active_callback' => function() {
            return get_theme_mod( 'storefront_child_breadcrumb_enable', true );
        },
    ) ) );

    // Breadcrumb Separator
    $wp_customize->add_setting( 'storefront_child_breadcrumb_separator', array(
        'default'           => '/',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'postMessage',
    ) );

    $wp_customize->add_control( 'storefront_child_breadcrumb_separator_control', array(
        'label'       => __( 'Breadcrumb Ayırıcı', 'storefront-child' ),
        'section'     => 'storefront_child_blog_content',
        'settings'    => 'storefront_child_breadcrumb_separator',
        'type'        => 'text',
        'priority'    => 75,
        'active_callback' => function() {
            return get_theme_mod( 'storefront_child_breadcrumb_enable', true );
        },
    ) );

    // Pagination Text Color
    $wp_customize->add_setting( 'storefront_child_pagination_text_color', array(
        'default'           => '#666666',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage',
    ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'storefront_child_pagination_text_color_control', array(
        'label'       => __( 'Sayfalama Metin Rengi', 'storefront-child' ),
        'section'     => 'storefront_child_blog_content',
        'settings'    => 'storefront_child_pagination_text_color',
        'priority'    => 80,
    ) ) );

    // Pagination Background Color
    $wp_customize->add_setting( 'storefront_child_pagination_bg_color', array(
        'default'           => '#ffffff',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage',
    ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'storefront_child_pagination_bg_color_control', array(
        'label'       => __( 'Sayfalama Arka Plan Rengi', 'storefront-child' ),
        'section'     => 'storefront_child_blog_content',
        'settings'    => 'storefront_child_pagination_bg_color',
        'priority'    => 85,
    ) ) );

    // Pagination Border Color
    $wp_customize->add_setting( 'storefront_child_pagination_border_color', array(
        'default'           => '#dddddd',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage',
    ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'storefront_child_pagination_border_color_control', array(
        'label'       => __( 'Sayfalama Kenarlık Rengi', 'storefront-child' ),
        'section'     => 'storefront_child_blog_content',
        'settings'    => 'storefront_child_pagination_border_color',
        'priority'    => 90,
    ) ) );

    // Pagination Hover Text Color
    $wp_customize->add_setting( 'storefront_child_pagination_hover_text_color', array(
        'default'           => '#ffffff',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage',
    ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'storefront_child_pagination_hover_text_color_control', array(
        'label'       => __( 'Sayfalama Hover Metin Rengi', 'storefront-child' ),
        'section'     => 'storefront_child_blog_content',
        'settings'    => 'storefront_child_pagination_hover_text_color',
        'priority'    => 95,
    ) ) );

    // Pagination Hover Background Color
    $wp_customize->add_setting( 'storefront_child_pagination_hover_bg_color', array(
        'default'           => '#337ab7',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage',
    ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'storefront_child_pagination_hover_bg_color_control', array(
        'label'       => __( 'Sayfalama Hover Arka Plan Rengi', 'storefront-child' ),
        'section'     => 'storefront_child_blog_content',
        'settings'    => 'storefront_child_pagination_hover_bg_color',
        'priority'    => 100,
    ) ) );

    // Pagination Active Text Color
    $wp_customize->add_setting( 'storefront_child_pagination_active_text_color', array(
        'default'           => '#ffffff',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage',
    ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'storefront_child_pagination_active_text_color_control', array(
        'label'       => __( 'Sayfalama Aktif Metin Rengi', 'storefront-child' ),
        'section'     => 'storefront_child_blog_content',
        'settings'    => 'storefront_child_pagination_active_text_color',
        'priority'    => 105,
    ) ) );

    // Pagination Active Background Color
    $wp_customize->add_setting( 'storefront_child_pagination_active_bg_color', array(
        'default'           => '#337ab7',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage',
    ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'storefront_child_pagination_active_bg_color_control', array(
        'label'       => __( 'Sayfalama Aktif Arka Plan Rengi', 'storefront-child' ),
        'section'     => 'storefront_child_blog_content',
        'settings'    => 'storefront_child_pagination_active_bg_color',
        'priority'    => 110,
    ) ) );
    
    // Tek Yazı Sayfa Ayarları
    $wp_customize->add_setting( 'storefront_child_single_post_layout', array(
        'default'           => 'default',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    
    $wp_customize->add_control( 'storefront_child_single_post_layout', array(
        'label'   => __( 'Tek Yazı Sayfa Layout', 'storefront-child' ),
        'section' => 'storefront_child_blog_content',
        'type'    => 'select',
        'choices' => array(
            'default'   => 'Varsayılan',
            'wide'      => 'Geniş',
            'fullwidth' => 'Tam Genişlik',
            'centered'  => 'Ortalanmış',
        ),
    ) );
    
    // İlgili Yazılar
    $wp_customize->add_setting( 'storefront_child_related_posts', array(
        'default'           => true,
        'sanitize_callback' => 'wp_validate_boolean',
    ) );
    
    $wp_customize->add_control( 'storefront_child_related_posts', array(
        'label'   => __( 'İlgili Yazıları Göster', 'storefront-child' ),
        'section' => 'storefront_child_blog_content',
        'type'    => 'checkbox',
    ) );
    
    // İlgili Yazı Sayısı
    $wp_customize->add_setting( 'storefront_child_related_posts_count', array(
        'default'           => 3,
        'sanitize_callback' => 'absint',
    ) );
    
    $wp_customize->add_control( 'storefront_child_related_posts_count', array(
        'label'       => __( 'İlgili Yazı Sayısı', 'storefront-child' ),
        'section'     => 'storefront_child_blog_content',
        'type'        => 'number',
        'input_attrs' => array(
            'min'  => 2,
            'max'  => 12,
            'step' => 1,
        ),
        'active_callback' => function() {
            return get_theme_mod( 'storefront_child_related_posts', true );
        },
    ) );
}

// ==============================================
// CSS ÇIKTISI - WOOCOMMERCE VE BLOG
// ==============================================

add_action( 'wp_head', 'storefront_child_woocommerce_blog_css', 15 );

function storefront_child_woocommerce_blog_css() {
    $shop_columns = get_theme_mod( 'storefront_child_shop_columns', 3 );
    $product_card_style = get_theme_mod( 'storefront_child_product_card_style', 'default' );
    $product_hover = get_theme_mod( 'storefront_child_product_hover_effect', 'none' );
    $cart_button_style = get_theme_mod( 'storefront_child_cart_button_style', 'default' );
    $sale_badge_color = get_theme_mod( 'storefront_child_sale_badge_color', '#77a464' );
    $price_color = get_theme_mod( 'storefront_child_price_color', '#77a464' );
    $product_tabs_style = get_theme_mod( 'storefront_child_product_tabs_style', 'default' );
    
    // Blog ayarları
    $blog_layout = get_theme_mod( 'storefront_child_blog_layout', 'default' );
    $blog_columns = get_theme_mod( 'storefront_child_blog_columns', 2 );
    $sidebar_position = get_theme_mod( 'storefront_child_sidebar_position', 'right' );
    $sidebar_width = get_theme_mod( 'storefront_child_sidebar_width', 25 );
    $breadcrumb_style = get_theme_mod( 'storefront_child_breadcrumb_style', 'default' );

    // Breadcrumb Colors
    $breadcrumb_text_color = get_theme_mod('storefront_child_breadcrumb_text_color', '#666666');
    $breadcrumb_link_color = get_theme_mod('storefront_child_breadcrumb_link_color', '#337ab7');
    $breadcrumb_bg_color = get_theme_mod('storefront_child_breadcrumb_bg_color', '#f5f5f5');

    // Pagination Colors
    $pagination_text_color = get_theme_mod('storefront_child_pagination_text_color', '#666666');
    $pagination_bg_color = get_theme_mod('storefront_child_pagination_bg_color', '#ffffff');
    $pagination_border_color = get_theme_mod('storefront_child_pagination_border_color', '#dddddd');
    $pagination_hover_text_color = get_theme_mod('storefront_child_pagination_hover_text_color', '#ffffff');
    $pagination_hover_bg_color = get_theme_mod('storefront_child_pagination_hover_bg_color', '#337ab7');
    $pagination_active_text_color = get_theme_mod('storefront_child_pagination_active_text_color', '#ffffff');
    $pagination_active_bg_color = get_theme_mod('storefront_child_pagination_active_bg_color', '#337ab7');
    
    ?>
    <style type="text/css">
        /* WooCommerce Stilleri */
        .woocommerce ul.products {
            display: grid;
            grid-template-columns: repeat(<?php echo esc_attr($shop_columns); ?>, 1fr);
            gap: 30px;
        }
        
        @media (max-width: 768px) {
            .woocommerce ul.products {
                grid-template-columns: repeat(2, 1fr);
                gap: 15px;
            }
        }
        
        @media (max-width: 480px) {
            .woocommerce ul.products {
                grid-template-columns: 1fr;
            }
        }
        
        /* Ürün Kart Stilleri */
        <?php if ($product_card_style === 'modern'): ?>
        .woocommerce ul.products li.product {
            border: 1px solid #f0f0f0;
            border-radius: 12px;
            overflow: hidden;
            transition: all 0.3s ease;
        }
        .woocommerce ul.products li.product:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        }
        <?php elseif ($product_card_style === 'minimal'): ?>
        .woocommerce ul.products li.product {
            border: none;
            background: transparent;
        }
        .woocommerce ul.products li.product .woocommerce-loop-product__title {
            font-weight: 300;
            font-size: 14px;
        }
        <?php elseif ($product_card_style === 'shadow'): ?>
        .woocommerce ul.products li.product {
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            border-radius: 8px;
            padding: 15px;
            transition: all 0.3s ease;
        }
        .woocommerce ul.products li.product:hover {
            box-shadow: 0 8px 25px rgba(0,0,0,0.15);
        }
        <?php endif; ?>
        
        /* Ürün Hover Efektleri */
        <?php if ($product_hover === 'zoom'): ?>
        .woocommerce ul.products li.product img {
            transition: transform 0.3s ease;
        }
        .woocommerce ul.products li.product:hover img {
            transform: scale(1.1);
        }
        <?php elseif ($product_hover === 'lift'): ?>
        .woocommerce ul.products li.product {
            transition: transform 0.3s ease;
        }
        .woocommerce ul.products li.product:hover {
            transform: translateY(-10px);
        }
        <?php elseif ($product_hover === 'fade'): ?>
        .woocommerce ul.products li.product img {
            transition: opacity 0.3s ease;
        }
        .woocommerce ul.products li.product:hover img {
            opacity: 0.8;
        }
        <?php elseif ($product_hover === 'rotate'): ?>
        .woocommerce ul.products li.product img {
            transition: transform 0.3s ease;
        }
        .woocommerce ul.products li.product:hover img {
            transform: rotate(2deg);
        }
        <?php endif; ?>
        
        /* Sepet Butonu Stilleri */
        <?php if ($cart_button_style === 'rounded'): ?>
        .woocommerce a.button, .woocommerce button.button {
            border-radius: 25px;
        }
        <?php elseif ($cart_button_style === 'square'): ?>
        .woocommerce a.button, .woocommerce button.button {
            border-radius: 0;
        }
        <?php elseif ($cart_button_style === 'outline'): ?>
        .woocommerce a.button, .woocommerce button.button {
            background: transparent;
            border: 2px solid var(--primary-color);
            color: var(--primary-color);
        }
        .woocommerce a.button:hover, .woocommerce button.button:hover {
            background: var(--primary-color);
            color: white;
        }
        <?php elseif ($cart_button_style === 'gradient'): ?>
        .woocommerce a.button, .woocommerce button.button {
            background: linear-gradient(45deg, var(--primary-color), var(--secondary-color));
            border: none;
        }
        <?php endif; ?>
        
        /* Badge ve Fiyat Renkleri */
        .woocommerce span.onsale {
            background-color: <?php echo esc_attr($sale_badge_color); ?>;
        }
        
        .woocommerce .price, .woocommerce .price .amount {
            color: <?php echo esc_attr($price_color); ?>;
        }
        
        /* Ürün Tab Stilleri */
        <?php if ($product_tabs_style === 'pills'): ?>
        .woocommerce div.product .woocommerce-tabs ul.tabs li a {
            border-radius: 25px;
            margin-right: 10px;
        }
        <?php elseif ($product_tabs_style === 'minimal'): ?>
        .woocommerce div.product .woocommerce-tabs ul.tabs {
            border-bottom: 1px solid #eee;
        }
        .woocommerce div.product .woocommerce-tabs ul.tabs li a {
            border: none;
            background: none;
            border-bottom: 3px solid transparent;
        }
        .woocommerce div.product .woocommerce-tabs ul.tabs li.active a {
            border-bottom-color: var(--primary-color);
        }
        <?php elseif ($product_tabs_style === 'vertical'): ?>
        .woocommerce div.product .woocommerce-tabs {
            display: flex;
        }
        .woocommerce div.product .woocommerce-tabs ul.tabs {
            flex-direction: column;
            width: 200px;
            margin-right: 30px;
        }
        .woocommerce div.product .woocommerce-tabs .panel {
            flex: 1;
        }
        <?php endif; ?>
        
        /* Blog Stilleri */
        <?php if ($blog_layout === 'grid' || $blog_layout === 'masonry'): ?>
        .blog .site-main, .archive .site-main {
            display: grid;
            grid-template-columns: repeat(<?php echo esc_attr($blog_columns); ?>, 1fr);
            gap: 30px;
        }
        
        @media (max-width: 768px) {
            .blog .site-main, .archive .site-main {
                grid-template-columns: 1fr;
            }
        }
        <?php endif; ?>
        
        <?php if ($blog_layout === 'magazine'): ?>
        .blog .site-main article:first-child {
            grid-column: 1 / -1;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 30px;
            margin-bottom: 40px;
            padding-bottom: 40px;
            border-bottom: 2px solid #eee;
        }
        <?php endif; ?>
        
        /* Sidebar Ayarları */
        <?php if ($sidebar_position === 'none'): ?>
        .content-area {
            width: 100%;
        }
        .widget-area {
            display: none;
        }
        <?php elseif ($sidebar_position === 'left'): ?>
        .content-area {
            order: 2;
        }
        .widget-area {
            order: 1;
        }
        .content-area, .widget-area {
            width: calc(100% - <?php echo esc_attr($sidebar_width); ?>%);
        }
        .widget-area {
            width: <?php echo esc_attr($sidebar_width); ?>%;
        }
        <?php elseif ($sidebar_position === 'right'): ?>
        .content-area {
            order: 1;
        }
        .widget-area {
            order: 2;
        }
        .content-area, .widget-area {
            width: calc(100% - <?php echo esc_attr($sidebar_width); ?>%);
        }
        .widget-area {
            width: <?php echo esc_attr($sidebar_width); ?>%;
        }
        <?php endif; ?>
        
        /* Breadcrumb Stilleri */
        <?php if ($breadcrumb_style === 'modern'): ?>
        .breadcrumb {
            background-color: #f0f0f0;
            padding: 10px;
            border-radius: 5px;
        }
        <?php elseif ($breadcrumb_style === 'minimal'): ?>
        .breadcrumb {
            background: none;
            padding: 0;
            border: none;
        }
        <?php elseif ($breadcrumb_style === 'rounded'): ?>
        .breadcrumb {
            background-color: #f0f0f0;
            padding: 10px;
            border-radius: 25px;
        }
        <?php endif; ?>

        /* Breadcrumb Color Customizations */
        <?php if (get_theme_mod('storefront_child_breadcrumb_enable', true)) : ?>
        .woocommerce-breadcrumb,
        .storefront-breadcrumb .breadcrumb {
            color: <?php echo esc_attr($breadcrumb_text_color); ?>;
            background-color: <?php echo esc_attr($breadcrumb_bg_color); ?>;
        }

        .woocommerce-breadcrumb a,
        .storefront-breadcrumb .breadcrumb a {
            color: <?php echo esc_attr($breadcrumb_link_color); ?>;
        }
        <?php endif; ?>

        /* Pagination Stilleri */
        .navigation.pagination .nav-links a,
        .navigation.pagination .nav-links span,
        .woocommerce-pagination ul.page-numbers li a,
        .woocommerce-pagination ul.page-numbers li span {
            color: <?php echo esc_attr($pagination_text_color); ?>;
            background-color: <?php echo esc_attr($pagination_bg_color); ?>;
            border: 1px solid <?php echo esc_attr($pagination_border_color); ?>;
        }

        .navigation.pagination .nav-links a:hover,
        .navigation.pagination .nav-links span.dots:hover, /* Target dots specifically if they shouldn't change */
        .woocommerce-pagination ul.page-numbers li a:hover,
        .woocommerce-pagination ul.page-numbers li span.dots:hover { /* Target dots specifically */
            color: <?php echo esc_attr($pagination_hover_text_color); ?>;
            background-color: <?php echo esc_attr($pagination_hover_bg_color); ?>;
            border-color: <?php echo esc_attr($pagination_hover_bg_color); ?>;
        }

        /* Ensure dots don't get hover styles if not desired - override */
        .navigation.pagination .nav-links span.dots:hover,
        .woocommerce-pagination ul.page-numbers li span.dots:hover {
            color: <?php echo esc_attr($pagination_text_color); ?>; /* Keep original text color */
            background-color: <?php echo esc_attr($pagination_bg_color); ?>; /* Keep original background */
            border-color: <?php echo esc_attr($pagination_border_color); ?>; /* Keep original border */
        }

        .navigation.pagination .nav-links span.current,
        .woocommerce-pagination ul.page-numbers li span.current {
            color: <?php echo esc_attr($pagination_active_text_color); ?>;
            background-color: <?php echo esc_attr($pagination_active_bg_color); ?>;
            border-color: <?php echo esc_attr($pagination_active_bg_color); ?>;
        }
    </style>
    <?php
}

// ==============================================
// CONDITIONAL POST TAGS DISPLAY
// ==============================================

// Helper function storefront_categorized_blog (if not already in child theme)
// This function is used by Storefront to check if there's more than one category.
if ( ! function_exists( 'storefront_categorized_blog' ) ) {
    function storefront_categorized_blog() {
        if ( false === ( $all_the_cool_cats = get_transient( 'storefront_categories' ) ) ) {
            // Create an array of all the categories that are attached to posts.
            $all_the_cool_cats = get_categories( array(
                'fields'     => 'ids',
                'hide_empty' => 1,
                // We only need to know if there is more than one category.
                'number'     => 2,
            ) );

            // Count the number of categories that are attached to the posts.
            $all_the_cool_cats = count( $all_the_cool_cats );

            set_transient( 'storefront_categories', $all_the_cool_cats );
        }

        if ( $all_the_cool_cats > 1 ) {
            // This blog has more than 1 category so storefront_categorized_blog should return true.
            return true;
        } else {
            // This blog only has 1 category so storefront_categorized_blog should return false.
            return false;
        }
    }
}

/**
 * Display categories and conditionally tags for posts.
 * Replaces the parent theme's storefront_post_taxonomy function.
 */
function storefront_child_post_taxonomy() {
    // Ensure this function is only called on single posts or archive pages where appropriate
    if ( ! is_singular( 'post' ) && ! is_archive() && ! is_home() ) {
        // Added ! is_home() for completeness, though storefront_post_taxonomy typically targets single/archive
        return;
    }

    // Check if we are in the loop, if not, this function might be called prematurely.
    if ( ! in_the_loop() ) {
        return;
    }

    $has_output = false;
    $output = '<div class="post-meta-container">'; // Custom wrapper to ensure styling doesn't conflict

    // Display categories (adapted from Storefront's storefront_post_taxonomy())
    /* translators: Used between list items, there is a space after the comma. */
    $categories_list = get_the_category_list( esc_html__( ', ', 'storefront-child' ) );
    if ( $categories_list && storefront_categorized_blog() ) {
        $output .= sprintf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'storefront-child' ) . '</span>', $categories_list ); // WPCS: XSS OK.
        $has_output = true;
    }

    // Conditionally display tags
    $show_tags = get_theme_mod( 'storefront_child_post_meta_tags', true );
    if ( $show_tags ) {
        /* translators: Used between list items, there is a space after the comma. */
        $tags_list = get_the_tag_list( '', esc_html__( ', ', 'storefront-child' ) );
        if ( $tags_list ) {
            if ( $has_output ) {
                $output .= '<span class="meta-separator"> | </span>'; // Add a separator if categories were displayed
            }
            $output .= sprintf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'storefront-child' ) . '</span>', $tags_list ); // WPCS: XSS OK.
            $has_output = true;
        }
    }

    $output .= '</div>'; // Close wrapper

    if ( $has_output ) {
        // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
        echo $output;
    }
}

/**
 * Removes the default Storefront post taxonomy function and hooks in the child theme's version.
 */
function storefront_child_init_post_taxonomy() {
    // Ensure parent function exists before trying to remove it, good practice.
    if ( function_exists( 'storefront_post_taxonomy' ) ) {
        remove_action( 'storefront_single_post_header_after', 'storefront_post_taxonomy', 40 );
        remove_action( 'storefront_post_header_after', 'storefront_post_taxonomy', 40 );

        // Add new actions for the child theme's function
        add_action( 'storefront_single_post_header_after', 'storefront_child_post_taxonomy', 40 );
        add_action( 'storefront_post_header_after', 'storefront_child_post_taxonomy', 40 );
    }
}
add_action( 'init', 'storefront_child_init_post_taxonomy', 15 );


// ==============================================
// FOOTER ACTION MANAGEMENT (Child Theme)
// ==============================================
/**
 * Removes default Storefront parent theme footer actions
 * to prevent duplication with child theme's custom footer.
 */
function storefront_child_manage_footer_actions() {
    // Remove Storefront's default footer widgets display
    remove_action( 'storefront_footer', 'storefront_footer_widgets', 10 );

    // Remove Storefront's default credit line
    remove_action( 'storefront_footer', 'storefront_credit', 20 );
}
add_action( 'init', 'storefront_child_manage_footer_actions', 15 );


// ==============================================
// BREADCRUMB CUSTOMIZATIONS
// ==============================================

/**
 * Customizes the breadcrumb arguments to use a custom separator.
 *
 * @param array $args Default breadcrumb arguments.
 * @return array Modified breadcrumb arguments.
 */
function storefront_child_custom_breadcrumb_args( $args ) {
    $custom_separator = get_theme_mod( 'storefront_child_breadcrumb_separator', '/' );

    // Ensure there's a separator and it's not just whitespace
    if ( ! empty( trim( $custom_separator ) ) ) {
        // Add spaces around the separator for nice formatting and escape it.
        $args['delimiter'] = '&nbsp;' . esc_html( trim( $custom_separator ) ) . '&nbsp;';
    }
    return $args;
}
add_filter( 'woocommerce_breadcrumb_defaults', 'storefront_child_custom_breadcrumb_args' );
add_filter( 'storefront_breadcrumb_args', 'storefront_child_custom_breadcrumb_args' );


// ==============================================
// WOOCOMMERCE SCRIPT/STYLE OPTIMIZATIONS
// ==============================================

/**
 * Optimize WooCommerce Scripts
 * Remove WooCommerce Generator tag, styles, and scripts from non WooCommerce pages.
 */
add_action( 'wp_enqueue_scripts', 'child_manage_woocommerce_styles', 99 );

function child_manage_woocommerce_styles() {
	//remove generator meta tag
	remove_action( 'wp_head', array( $GLOBALS['woocommerce'], 'generator' ) );

	//first check that woo exists to prevent fatal errors
	if ( function_exists( 'is_woocommerce' ) ) {
		//dequeue scripts and styles
		if ( ! is_woocommerce() && ! is_cart() && ! is_checkout() ) {
			// Styles
			wp_dequeue_style( 'woocommerce_frontend_styles' ); // Main WC styles
			wp_dequeue_style( 'woocommerce-general'); // General WC styles (may be redundant with above)
			wp_dequeue_style( 'select2' ); // selectWoo/select2 styles (often used on WC pages)
            wp_dequeue_style( 'selectWoo' ); // Handle for selectWoo if different from select2
			wp_dequeue_style( 'photoswipe-default-skin' ); // Modern lightbox

			// Old styles (might be enqueued by older extensions or themes)
			wp_dequeue_style( 'woocommerce_fancybox_styles' );
			wp_dequeue_style( 'woocommerce_chosen_styles' );
			wp_dequeue_style( 'woocommerce_prettyPhoto_css' );

			// Scripts
			wp_dequeue_script( 'wc_price_slider' );
			wp_dequeue_script( 'wc-single-product' );
			wp_dequeue_script( 'wc-add-to-cart' );
			wp_dequeue_script( 'wc-cart-fragments' );
			wp_dequeue_script( 'wc-checkout' );
			wp_dequeue_script( 'wc-add-to-cart-variation' );
			wp_dequeue_script( 'wc-cart' );
			wp_dequeue_script( 'woocommerce' );
			wp_dequeue_script( 'jquery-blockui' );
			wp_dequeue_script( 'jquery-placeholder' ); // Often not needed with modern browsers

			// jQuery UI (be specific)
			wp_dequeue_script( 'jquery-ui-slider' );
            wp_dequeue_script( 'jquery-ui-core' ); // Core is often a dependency

			// Modern replacements / Additions
			wp_dequeue_script( 'selectWoo' ); // Modern select library
            wp_dequeue_script( 'photoswipe'); // Modern lightbox script
            wp_dequeue_script( 'photoswipe-ui-default'); // Modern lightbox UI script
            // wp_dequeue_script( 'zoom' ); // Product image zoom - consider if needed on non-WC pages

			// Old scripts (might be enqueued by older extensions or themes)
			wp_dequeue_script( 'wc-chosen' );
			wp_dequeue_script( 'prettyPhoto' );
			wp_dequeue_script( 'prettyPhoto-init' );
			wp_dequeue_script( 'fancybox' );
		}
	}
}

// ==============================================
// CUSTOMIZER CONTROLS SCRIPTS (Reset Button etc.)
// ==============================================
/**
 * Enqueue scripts for Customizer controls.
 */
function storefront_child_enqueue_customizer_controls_scripts() {
    // Enqueue the new JS file for reset button logic
    wp_enqueue_script(
        'storefront-child-customizer-controls',
        get_stylesheet_directory_uri() . '/js/customizer-controls.js',
        array( 'jquery', 'customize-controls' ), // Dependencies
        wp_get_theme()->get('Version'), // Versioning
        true // Load in footer
    );

    // Localize data for the script
    wp_localize_script(
        'storefront-child-customizer-controls',
        'storefrontChildControlsData', // Object name in JavaScript
        array(
            'ajax_url' => admin_url( 'admin-ajax.php' ),
            'action'   => 'storefront_child_reset_theme_settings',
            'nonce'    => wp_create_nonce( 'storefront_child_reset_settings_nonce' ),
            'confirm_message' => __( 'DİKKAT: Tüm storefront-child tema ayarlarını varsayılan değerlerine sıfırlamak istediğinizden emin misiniz? Bu işlem geri alınamaz.', 'storefront-child' ),
            'success_message' => __( 'Tema ayarları başarıyla sıfırlandı. Değişiklikleri görmek için sayfa yenilenecek.', 'storefront-child' ),
            'error_message'   => __( 'Bir hata oluştu. Ayarlar sıfırlanamadı.', 'storefront-child' ),
            'resetting_message' => __( 'Sıfırlanıyor...', 'storefront-child' ),
            'original_button_text' => __( 'Tüm Tema Ayarlarını Sıfırla', 'storefront-child' ),
        )
    );
}
add_action( 'customize_controls_enqueue_scripts', 'storefront_child_enqueue_customizer_controls_scripts' );


// ==============================================
// AJAX HANDLER FOR THEME SETTINGS RESET
// ==============================================
/**
 * Handles the AJAX request to reset theme settings.
 */
function storefront_child_ajax_reset_theme_settings() {
    // 1. Verify Nonce
    if ( ! isset( $_POST['nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['nonce'] ) ), 'storefront_child_reset_settings_nonce' ) ) {
        wp_send_json_error( array( 'message' => __( 'Nonce verification failed.', 'storefront-child' ) ), 403 ); // 403 Forbidden
        // wp_send_json_error will call wp_die()
    }

    // 2. Check User Capabilities
    if ( ! current_user_can( 'edit_theme_options' ) ) {
        wp_send_json_error( array( 'message' => __( 'You do not have permission to perform this action.', 'storefront-child' ) ), 403 ); // 403 Forbidden
    }

    // 3. Define the list of theme settings to reset
    // Note: This list should be comprehensive and match all 'storefront_child_*' theme_mods.
    $theme_settings_to_reset = array(
        'storefront_child_primary_color',
        'storefront_child_secondary_color',
        'storefront_child_accent_color',
        'storefront_child_container_width',
        'storefront_child_border_radius',
        'storefront_child_font_family',
        'storefront_child_header_bg_color',
        'storefront_child_header_text_color',
        'storefront_child_logo_width',
        'storefront_child_header_padding',
        'storefront_child_sticky_header',
        'storefront_child_header_border',
        'storefront_child_nav_color',
        'storefront_child_nav_hover_color',
        'storefront_child_footer_bg_color',
        'storefront_child_footer_text_color',
        'storefront_child_footer_link_color',
        'storefront_child_footer_padding',
        'storefront_child_copyright_text',
        'storefront_child_footer_columns',
        'storefront_child_social_facebook', // Individual social settings
        'storefront_child_social_twitter',
        'storefront_child_social_instagram',
        'storefront_child_social_youtube',
        'storefront_child_social_linkedin',
        'storefront_child_shop_columns',
        'storefront_child_products_per_page',
        'storefront_child_product_card_style',
        'storefront_child_product_hover_effect',
        'storefront_child_cart_button_style',
        'storefront_child_sale_badge_color',
        'storefront_child_price_color',
        'storefront_child_single_product_layout', // Appears once now
        'storefront_child_product_tabs_style',
        'storefront_child_checkout_style',
        'storefront_child_blog_layout',
        'storefront_child_blog_columns',
        'storefront_child_post_meta_author',
        'storefront_child_post_meta_date',
        'storefront_child_post_meta_category',
        'storefront_child_post_meta_comments',
        'storefront_child_post_meta_tags',
        'storefront_child_excerpt_length',
        'storefront_child_read_more_text',
        'storefront_child_sidebar_position',
        'storefront_child_sidebar_width',
        'storefront_child_breadcrumb_enable',
        'storefront_child_breadcrumb_style',
        'storefront_child_breadcrumb_text_color',
        'storefront_child_breadcrumb_link_color',
        'storefront_child_breadcrumb_bg_color',
        'storefront_child_breadcrumb_separator',
        'storefront_child_pagination_text_color',
        'storefront_child_pagination_bg_color',
        'storefront_child_pagination_border_color',
        'storefront_child_pagination_hover_text_color',
        'storefront_child_pagination_hover_bg_color',
        'storefront_child_pagination_active_text_color',
        'storefront_child_pagination_active_bg_color',
        // 'storefront_child_single_post_layout', // This was a duplicate in the provided list, removed.
        'storefront_child_related_posts',
        'storefront_child_related_posts_count'
        // Ensure 'storefront_child_reset_dummy_setting' is NOT in this list.
    );

    // 4. Remove the theme settings
    foreach ( $theme_settings_to_reset as $setting ) {
        remove_theme_mod( $setting );
    }

    // 5. Send success response
    wp_send_json_success( array( 'message' => __( 'Tema ayarları başarıyla sıfırlandı.', 'storefront-child' ) ) );
    // wp_send_json_success will call wp_die() automatically.
}
add_action( 'wp_ajax_storefront_child_reset_theme_settings', 'storefront_child_ajax_reset_theme_settings' );
// No wp_ajax_nopriv_ action as this is for logged-in admins with 'edit_theme_options' capabilities.

?>