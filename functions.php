<?php
/**
 * Apply Visa Bali Theme Functions
 */

if (!defined('ABSPATH')) {
    exit;
}

// Theme Setup
function apply_visa_bali_setup() {
    // Add theme support
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo');
    add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));
    add_theme_support('customize-selective-refresh-widgets');

    // Register Navigation Menus
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'apply-visa-bali'),
        'footer' => __('Footer Menu', 'apply-visa-bali'),
    ));

    // Image sizes
    add_image_size('hero-carousel', 1920, 800, true);
    add_image_size('service-thumb', 400, 300, true);
    add_image_size('blog-thumb', 600, 400, true);
}
add_action('after_setup_theme', 'apply_visa_bali_setup');

// Enqueue Scripts and Styles
function apply_visa_bali_scripts() {
    // Bootstrap CSS
    wp_enqueue_style('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css', array(), '5.3.2');

    // Bootstrap Icons
    wp_enqueue_style('bootstrap-icons', 'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css', array(), '1.11.1');

    // Google Fonts
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700;800&display=swap', array(), null);

    // Theme Stylesheet
    wp_enqueue_style('apply-visa-bali-style', get_stylesheet_uri(), array('bootstrap'), '1.0.0');

    // Custom CSS
    wp_enqueue_style('apply-visa-bali-custom', get_template_directory_uri() . '/css/custom.css', array('apply-visa-bali-style'), '1.0.0');

    // Bootstrap JS
    wp_enqueue_script('bootstrap-bundle', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js', array(), '5.3.2', true);

    // Custom JS
    wp_enqueue_script('apply-visa-bali-custom', get_template_directory_uri() . '/js/custom.js', array('jquery', 'bootstrap-bundle'), '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'apply_visa_bali_scripts');

// Register Widget Areas
function apply_visa_bali_widgets_init() {
    register_sidebar(array(
        'name'          => __('Footer Widget 1', 'apply-visa-bali'),
        'id'            => 'footer-1',
        'description'   => __('Add widgets here for footer column 1.', 'apply-visa-bali'),
        'before_widget' => '<div class="footer-widget mb-4">',
        'after_widget'  => '</div>',
        'before_title'  => '<h5 class="widget-title mb-3">',
        'after_title'   => '</h5>',
    ));

    register_sidebar(array(
        'name'          => __('Footer Widget 2', 'apply-visa-bali'),
        'id'            => 'footer-2',
        'description'   => __('Add widgets here for footer column 2.', 'apply-visa-bali'),
        'before_widget' => '<div class="footer-widget mb-4">',
        'after_widget'  => '</div>',
        'before_title'  => '<h5 class="widget-title mb-3">',
        'after_title'   => '</h5>',
    ));

    register_sidebar(array(
        'name'          => __('Footer Widget 3', 'apply-visa-bali'),
        'id'            => 'footer-3',
        'description'   => __('Add widgets here for footer column 3.', 'apply-visa-bali'),
        'before_widget' => '<div class="footer-widget mb-4">',
        'after_widget'  => '</div>',
        'before_title'  => '<h5 class="widget-title mb-3">',
        'after_title'   => '</h5>',
    ));
}
add_action('widgets_init', 'apply_visa_bali_widgets_init');

// Custom Post Type - Testimonials
function apply_visa_bali_testimonials_post_type() {
    register_post_type('testimonial', array(
        'labels' => array(
            'name' => __('Testimonials', 'apply-visa-bali'),
            'singular_name' => __('Testimonial', 'apply-visa-bali'),
        ),
        'public' => true,
        'has_archive' => false,
        'supports' => array('title', 'editor', 'thumbnail'),
        'menu_icon' => 'dashicons-format-quote',
        'show_in_rest' => true,
    ));
}
add_action('init', 'apply_visa_bali_testimonials_post_type');

// Customizer Settings
function apply_visa_bali_customize_register($wp_customize) {
    // Hero Section
    $wp_customize->add_section('hero_section', array(
        'title' => __('Hero Carousel', 'apply-visa-bali'),
        'priority' => 30,
    ));

    // Slide 1
    $wp_customize->add_setting('hero_slide_1_image', array('default' => ''));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'hero_slide_1_image', array(
        'label' => __('Slide 1 Image', 'apply-visa-bali'),
        'section' => 'hero_section',
    )));

    $wp_customize->add_setting('hero_slide_1_title', array('default' => 'Welcome to Apply Visa Bali'));
    $wp_customize->add_control('hero_slide_1_title', array(
        'label' => __('Slide 1 Title', 'apply-visa-bali'),
        'section' => 'hero_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting('hero_slide_1_subtitle', array('default' => 'Your Trusted Partner for Visa Services in Bali'));
    $wp_customize->add_control('hero_slide_1_subtitle', array(
        'label' => __('Slide 1 Subtitle', 'apply-visa-bali'),
        'section' => 'hero_section',
        'type' => 'textarea',
    ));

    $wp_customize->add_setting('hero_slide_1_button_text', array('default' => 'Get Started'));
    $wp_customize->add_control('hero_slide_1_button_text', array(
        'label' => __('Slide 1 Button Text', 'apply-visa-bali'),
        'section' => 'hero_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting('hero_slide_1_button_link', array('default' => '#'));
    $wp_customize->add_control('hero_slide_1_button_link', array(
        'label' => __('Slide 1 Button Link', 'apply-visa-bali'),
        'section' => 'hero_section',
        'type' => 'url',
    ));

    // Slide 2
    $wp_customize->add_setting('hero_slide_2_image', array('default' => ''));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'hero_slide_2_image', array(
        'label' => __('Slide 2 Image', 'apply-visa-bali'),
        'section' => 'hero_section',
    )));

    $wp_customize->add_setting('hero_slide_2_title', array('default' => 'Fast & Reliable Visa Processing'));
    $wp_customize->add_control('hero_slide_2_title', array(
        'label' => __('Slide 2 Title', 'apply-visa-bali'),
        'section' => 'hero_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting('hero_slide_2_subtitle', array('default' => 'Professional assistance for all your visa needs'));
    $wp_customize->add_control('hero_slide_2_subtitle', array(
        'label' => __('Slide 2 Subtitle', 'apply-visa-bali'),
        'section' => 'hero_section',
        'type' => 'textarea',
    ));

    $wp_customize->add_setting('hero_slide_2_button_text', array('default' => 'Our Services'));
    $wp_customize->add_control('hero_slide_2_button_text', array(
        'label' => __('Slide 2 Button Text', 'apply-visa-bali'),
        'section' => 'hero_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting('hero_slide_2_button_link', array('default' => '#'));
    $wp_customize->add_control('hero_slide_2_button_link', array(
        'label' => __('Slide 2 Button Link', 'apply-visa-bali'),
        'section' => 'hero_section',
        'type' => 'url',
    ));

    // Slide 3
    $wp_customize->add_setting('hero_slide_3_image', array('default' => ''));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'hero_slide_3_image', array(
        'label' => __('Slide 3 Image', 'apply-visa-bali'),
        'section' => 'hero_section',
    )));

    $wp_customize->add_setting('hero_slide_3_title', array('default' => 'Expert Visa Consultation'));
    $wp_customize->add_control('hero_slide_3_title', array(
        'label' => __('Slide 3 Title', 'apply-visa-bali'),
        'section' => 'hero_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting('hero_slide_3_subtitle', array('default' => 'Get expert guidance for your visa application'));
    $wp_customize->add_control('hero_slide_3_subtitle', array(
        'label' => __('Slide 3 Subtitle', 'apply-visa-bali'),
        'section' => 'hero_section',
        'type' => 'textarea',
    ));

    $wp_customize->add_setting('hero_slide_3_button_text', array('default' => 'Contact Us'));
    $wp_customize->add_control('hero_slide_3_button_text', array(
        'label' => __('Slide 3 Button Text', 'apply-visa-bali'),
        'section' => 'hero_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting('hero_slide_3_button_link', array('default' => '#'));
    $wp_customize->add_control('hero_slide_3_button_link', array(
        'label' => __('Slide 3 Button Link', 'apply-visa-bali'),
        'section' => 'hero_section',
        'type' => 'url',
    ));

    // What We Offer Section
    $wp_customize->add_section('offer_section', array(
        'title' => __('What We Offer Section', 'apply-visa-bali'),
        'priority' => 31,
    ));

    $wp_customize->add_setting('offer_section_title', array('default' => 'What We Offer'));
    $wp_customize->add_control('offer_section_title', array(
        'label' => __('Section Title', 'apply-visa-bali'),
        'section' => 'offer_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting('offer_section_subtitle', array('default' => 'Our Services'));
    $wp_customize->add_control('offer_section_subtitle', array(
        'label' => __('Section Subtitle', 'apply-visa-bali'),
        'section' => 'offer_section',
        'type' => 'text',
    ));

    // What We Offer Items
    for ($i = 1; $i <= 6; $i++) {
        $wp_customize->add_setting("offer_item_{$i}_icon", array('default' => 'bi-briefcase'));
        $wp_customize->add_control("offer_item_{$i}_icon", array(
            'label' => sprintf(__('Service %d Icon (Bootstrap Icon class)', 'apply-visa-bali'), $i),
            'section' => 'offer_section',
            'type' => 'text',
            'description' => __('e.g., bi-briefcase, bi-passport, bi-airplane. See https://icons.getbootstrap.com/', 'apply-visa-bali'),
        ));

        $wp_customize->add_setting("offer_item_{$i}_image", array('default' => ''));
        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, "offer_item_{$i}_image", array(
            'label' => sprintf(__('Service %d Image (Optional - overrides icon)', 'apply-visa-bali'), $i),
            'section' => 'offer_section',
        )));

        $wp_customize->add_setting("offer_item_{$i}_title", array('default' => "Service {$i}"));
        $wp_customize->add_control("offer_item_{$i}_title", array(
            'label' => sprintf(__('Service %d Title', 'apply-visa-bali'), $i),
            'section' => 'offer_section',
            'type' => 'text',
        ));

        $wp_customize->add_setting("offer_item_{$i}_description", array('default' => 'Service description here'));
        $wp_customize->add_control("offer_item_{$i}_description", array(
            'label' => sprintf(__('Service %d Description', 'apply-visa-bali'), $i),
            'section' => 'offer_section',
            'type' => 'textarea',
        ));

        $wp_customize->add_setting("offer_item_{$i}_link", array('default' => '#'));
        $wp_customize->add_control("offer_item_{$i}_link", array(
            'label' => sprintf(__('Service %d Link', 'apply-visa-bali'), $i),
            'section' => 'offer_section',
            'type' => 'url',
        ));
    }

    // Why Us Section
    $wp_customize->add_section('why_us_section', array(
        'title' => __('Why Us Section', 'apply-visa-bali'),
        'priority' => 32,
    ));

    $wp_customize->add_setting('why_us_section_title', array('default' => 'Why Choose Us'));
    $wp_customize->add_control('why_us_section_title', array(
        'label' => __('Section Title', 'apply-visa-bali'),
        'section' => 'why_us_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting('why_us_section_subtitle', array('default' => 'Our Advantages'));
    $wp_customize->add_control('why_us_section_subtitle', array(
        'label' => __('Section Subtitle', 'apply-visa-bali'),
        'section' => 'why_us_section',
        'type' => 'text',
    ));

    // Why Us Items
    for ($i = 1; $i <= 4; $i++) {
        $wp_customize->add_setting("why_us_item_{$i}_icon", array('default' => 'bi-check-circle'));
        $wp_customize->add_control("why_us_item_{$i}_icon", array(
            'label' => sprintf(__('Item %d Icon (Bootstrap Icon class)', 'apply-visa-bali'), $i),
            'section' => 'why_us_section',
            'type' => 'text',
        ));

        $wp_customize->add_setting("why_us_item_{$i}_title", array('default' => "Advantage {$i}"));
        $wp_customize->add_control("why_us_item_{$i}_title", array(
            'label' => sprintf(__('Item %d Title', 'apply-visa-bali'), $i),
            'section' => 'why_us_section',
            'type' => 'text',
        ));

        $wp_customize->add_setting("why_us_item_{$i}_description", array('default' => 'Description here'));
        $wp_customize->add_control("why_us_item_{$i}_description", array(
            'label' => sprintf(__('Item %d Description', 'apply-visa-bali'), $i),
            'section' => 'why_us_section',
            'type' => 'textarea',
        ));
    }

    // Testimonials Section
    $wp_customize->add_section('testimonials_section', array(
        'title' => __('Testimonials Section', 'apply-visa-bali'),
        'priority' => 33,
    ));

    $wp_customize->add_setting('testimonials_section_title', array('default' => 'What Our Clients Say'));
    $wp_customize->add_control('testimonials_section_title', array(
        'label' => __('Section Title', 'apply-visa-bali'),
        'section' => 'testimonials_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting('testimonials_section_subtitle', array('default' => 'Testimonials'));
    $wp_customize->add_control('testimonials_section_subtitle', array(
        'label' => __('Section Subtitle', 'apply-visa-bali'),
        'section' => 'testimonials_section',
        'type' => 'text',
    ));

    // Testimonial Items
    $testimonial_defaults = array(
        1 => array(
            'name' => 'Sarah Johnson',
            'text' => 'Excellent service! They helped me extend my tourist visa quickly and professionally. The team was very responsive and made the whole process stress-free.',
            'position' => 'Tourist from Australia'
        ),
        2 => array(
            'name' => 'Michael Chen',
            'text' => 'Very helpful and knowledgeable team. Got my business visa processed in just a few days. Highly recommend their services!',
            'position' => 'Entrepreneur, Singapore'
        ),
        3 => array(
            'name' => 'Emma Williams',
            'text' => 'Professional and reliable visa service. They guided me through every step and answered all my questions promptly. Five stars!',
            'position' => 'Digital Nomad, UK'
        ),
    );

    for ($i = 1; $i <= 6; $i++) {
        $default_name = isset($testimonial_defaults[$i]) ? $testimonial_defaults[$i]['name'] : "Customer {$i}";
        $default_text = isset($testimonial_defaults[$i]) ? $testimonial_defaults[$i]['text'] : 'Excellent service! Highly recommend.';
        $default_position = isset($testimonial_defaults[$i]) ? $testimonial_defaults[$i]['position'] : '';

        $wp_customize->add_setting("testimonial_item_{$i}_name", array('default' => $default_name));
        $wp_customize->add_control("testimonial_item_{$i}_name", array(
            'label' => sprintf(__('Testimonial %d - Customer Name', 'apply-visa-bali'), $i),
            'section' => 'testimonials_section',
            'type' => 'text',
        ));

        $wp_customize->add_setting("testimonial_item_{$i}_image", array('default' => ''));
        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, "testimonial_item_{$i}_image", array(
            'label' => sprintf(__('Testimonial %d - Customer Photo (Optional)', 'apply-visa-bali'), $i),
            'section' => 'testimonials_section',
        )));

        $wp_customize->add_setting("testimonial_item_{$i}_text", array('default' => $default_text));
        $wp_customize->add_control("testimonial_item_{$i}_text", array(
            'label' => sprintf(__('Testimonial %d - Review Text', 'apply-visa-bali'), $i),
            'section' => 'testimonials_section',
            'type' => 'textarea',
        ));

        $wp_customize->add_setting("testimonial_item_{$i}_rating", array('default' => '5'));
        $wp_customize->add_control("testimonial_item_{$i}_rating", array(
            'label' => sprintf(__('Testimonial %d - Star Rating (1-5)', 'apply-visa-bali'), $i),
            'section' => 'testimonials_section',
            'type' => 'select',
            'choices' => array(
                '5' => '5 Stars',
                '4' => '4 Stars',
                '3' => '3 Stars',
                '2' => '2 Stars',
                '1' => '1 Star',
            ),
        ));

        $wp_customize->add_setting("testimonial_item_{$i}_position", array('default' => $default_position));
        $wp_customize->add_control("testimonial_item_{$i}_position", array(
            'label' => sprintf(__('Testimonial %d - Position/Company (Optional)', 'apply-visa-bali'), $i),
            'section' => 'testimonials_section',
            'type' => 'text',
        ));
    }

    // WhatsApp
    $wp_customize->add_section('whatsapp_section', array(
        'title' => __('WhatsApp Settings', 'apply-visa-bali'),
        'priority' => 34,
    ));

    $wp_customize->add_setting('whatsapp_number', array('default' => ''));
    $wp_customize->add_control('whatsapp_number', array(
        'label' => __('WhatsApp Number (with country code, e.g., 6281234567890)', 'apply-visa-bali'),
        'section' => 'whatsapp_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting('whatsapp_message', array('default' => 'Hello! I need information about visa services.'));
    $wp_customize->add_control('whatsapp_message', array(
        'label' => __('Default WhatsApp Message', 'apply-visa-bali'),
        'section' => 'whatsapp_section',
        'type' => 'textarea',
    ));

    // Footer Settings
    $wp_customize->add_section('footer_section', array(
        'title' => __('Footer Settings', 'apply-visa-bali'),
        'priority' => 35,
    ));

    // Copyright Text
    $wp_customize->add_setting('footer_copyright_text', array(
        'default' => 'All rights reserved.',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('footer_copyright_text', array(
        'label' => __('Copyright Text', 'apply-visa-bali'),
        'section' => 'footer_section',
        'type' => 'text',
        'description' => __('Text shown in the copyright section. Site name and year will be added automatically.', 'apply-visa-bali'),
    ));

    // Contact Information
    $wp_customize->add_setting('footer_address', array(
        'default' => 'Bali, Indonesia',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('footer_address', array(
        'label' => __('Address', 'apply-visa-bali'),
        'section' => 'footer_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting('footer_email', array(
        'default' => 'info@applyvisabali.com',
        'sanitize_callback' => 'sanitize_email',
    ));
    $wp_customize->add_control('footer_email', array(
        'label' => __('Email Address', 'apply-visa-bali'),
        'section' => 'footer_section',
        'type' => 'email',
    ));

    $wp_customize->add_setting('footer_phone', array(
        'default' => '+62 xxx xxxx xxxx',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('footer_phone', array(
        'label' => __('Phone Number', 'apply-visa-bali'),
        'section' => 'footer_section',
        'type' => 'text',
    ));

    // Social Media Links
    $wp_customize->add_setting('footer_facebook_url', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('footer_facebook_url', array(
        'label' => __('Facebook URL', 'apply-visa-bali'),
        'section' => 'footer_section',
        'type' => 'url',
        'description' => __('Leave empty to hide the icon', 'apply-visa-bali'),
    ));

    $wp_customize->add_setting('footer_instagram_url', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('footer_instagram_url', array(
        'label' => __('Instagram URL', 'apply-visa-bali'),
        'section' => 'footer_section',
        'type' => 'url',
        'description' => __('Leave empty to hide the icon', 'apply-visa-bali'),
    ));

    $wp_customize->add_setting('footer_twitter_url', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('footer_twitter_url', array(
        'label' => __('Twitter/X URL', 'apply-visa-bali'),
        'section' => 'footer_section',
        'type' => 'url',
        'description' => __('Leave empty to hide the icon', 'apply-visa-bali'),
    ));

    $wp_customize->add_setting('footer_linkedin_url', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('footer_linkedin_url', array(
        'label' => __('LinkedIn URL', 'apply-visa-bali'),
        'section' => 'footer_section',
        'type' => 'url',
        'description' => __('Leave empty to hide the icon', 'apply-visa-bali'),
    ));

    $wp_customize->add_setting('footer_youtube_url', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('footer_youtube_url', array(
        'label' => __('YouTube URL', 'apply-visa-bali'),
        'section' => 'footer_section',
        'type' => 'url',
        'description' => __('Leave empty to hide the icon', 'apply-visa-bali'),
    ));

    $wp_customize->add_setting('footer_tiktok_url', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('footer_tiktok_url', array(
        'label' => __('TikTok URL', 'apply-visa-bali'),
        'section' => 'footer_section',
        'type' => 'url',
        'description' => __('Leave empty to hide the icon', 'apply-visa-bali'),
    ));

    // Quick Links Section
    $wp_customize->add_section('footer_quick_links', array(
        'title' => __('Footer Quick Links', 'apply-visa-bali'),
        'priority' => 36,
        'description' => __('Add custom links to the Quick Links section in footer. Leave title empty to hide the link.', 'apply-visa-bali'),
    ));

    $wp_customize->add_setting('footer_quick_links_title', array(
        'default' => 'Quick Links',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('footer_quick_links_title', array(
        'label' => __('Quick Links Section Title', 'apply-visa-bali'),
        'section' => 'footer_quick_links',
        'type' => 'text',
    ));

    // Quick Links Items (up to 8 links)
    for ($i = 1; $i <= 8; $i++) {
        $wp_customize->add_setting("footer_quick_link_{$i}_title", array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
        ));
        $wp_customize->add_control("footer_quick_link_{$i}_title", array(
            'label' => sprintf(__('Link %d - Title', 'apply-visa-bali'), $i),
            'section' => 'footer_quick_links',
            'type' => 'text',
        ));

        $wp_customize->add_setting("footer_quick_link_{$i}_url", array(
            'default' => '',
            'sanitize_callback' => 'esc_url_raw',
        ));
        $wp_customize->add_control("footer_quick_link_{$i}_url", array(
            'label' => sprintf(__('Link %d - URL', 'apply-visa-bali'), $i),
            'section' => 'footer_quick_links',
            'type' => 'url',
        ));
    }

    // About Us Section
    $wp_customize->add_section('about_us_section', array(
        'title' => __('About Us Page', 'apply-visa-bali'),
        'priority' => 37,
        'description' => __('Customize the About Us page content', 'apply-visa-bali'),
    ));

    // Mission & Vision
    $wp_customize->add_setting('about_mission_title', array(
        'default' => 'Our Mission',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('about_mission_title', array(
        'label' => __('Mission Title', 'apply-visa-bali'),
        'section' => 'about_us_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting('about_mission_icon', array(
        'default' => 'bi-bullseye',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('about_mission_icon', array(
        'label' => __('Mission Icon (Bootstrap Icon class)', 'apply-visa-bali'),
        'section' => 'about_us_section',
        'type' => 'text',
        'description' => __('e.g., bi-bullseye, bi-target. See https://icons.getbootstrap.com/', 'apply-visa-bali'),
    ));

    $wp_customize->add_setting('about_mission_text', array(
        'default' => 'To provide exceptional visa services that make international travel accessible and stress-free for everyone seeking to visit or stay in Bali and Indonesia.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('about_mission_text', array(
        'label' => __('Mission Text', 'apply-visa-bali'),
        'section' => 'about_us_section',
        'type' => 'textarea',
    ));

    $wp_customize->add_setting('about_vision_title', array(
        'default' => 'Our Vision',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('about_vision_title', array(
        'label' => __('Vision Title', 'apply-visa-bali'),
        'section' => 'about_us_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting('about_vision_icon', array(
        'default' => 'bi-eye',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('about_vision_icon', array(
        'label' => __('Vision Icon (Bootstrap Icon class)', 'apply-visa-bali'),
        'section' => 'about_us_section',
        'type' => 'text',
        'description' => __('e.g., bi-eye, bi-binoculars. See https://icons.getbootstrap.com/', 'apply-visa-bali'),
    ));

    $wp_customize->add_setting('about_vision_text', array(
        'default' => 'To become the most trusted and reliable visa service provider in Bali, known for our professionalism, efficiency, and customer-centric approach.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('about_vision_text', array(
        'label' => __('Vision Text', 'apply-visa-bali'),
        'section' => 'about_us_section',
        'type' => 'textarea',
    ));

    // Team Section
    $wp_customize->add_setting('about_team_section_title', array(
        'default' => 'Meet Our Experts',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('about_team_section_title', array(
        'label' => __('Team Section Title', 'apply-visa-bali'),
        'section' => 'about_us_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting('about_team_section_subtitle', array(
        'default' => 'Team',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('about_team_section_subtitle', array(
        'label' => __('Team Section Subtitle', 'apply-visa-bali'),
        'section' => 'about_us_section',
        'type' => 'text',
    ));

    // Team Members (up to 6)
    for ($i = 1; $i <= 6; $i++) {
        $wp_customize->add_setting("about_team_member_{$i}_image", array(
            'default' => '',
            'sanitize_callback' => 'esc_url_raw',
        ));
        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, "about_team_member_{$i}_image", array(
            'label' => sprintf(__('Team Member %d - Photo', 'apply-visa-bali'), $i),
            'section' => 'about_us_section',
        )));

        $wp_customize->add_setting("about_team_member_{$i}_name", array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
        ));
        $wp_customize->add_control("about_team_member_{$i}_name", array(
            'label' => sprintf(__('Team Member %d - Name', 'apply-visa-bali'), $i),
            'section' => 'about_us_section',
            'type' => 'text',
        ));

        $wp_customize->add_setting("about_team_member_{$i}_position", array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
        ));
        $wp_customize->add_control("about_team_member_{$i}_position", array(
            'label' => sprintf(__('Team Member %d - Position', 'apply-visa-bali'), $i),
            'section' => 'about_us_section',
            'type' => 'text',
        ));

        $wp_customize->add_setting("about_team_member_{$i}_linkedin", array(
            'default' => '',
            'sanitize_callback' => 'esc_url_raw',
        ));
        $wp_customize->add_control("about_team_member_{$i}_linkedin", array(
            'label' => sprintf(__('Team Member %d - LinkedIn URL (Optional)', 'apply-visa-bali'), $i),
            'section' => 'about_us_section',
            'type' => 'url',
        ));

        $wp_customize->add_setting("about_team_member_{$i}_email", array(
            'default' => '',
            'sanitize_callback' => 'sanitize_email',
        ));
        $wp_customize->add_control("about_team_member_{$i}_email", array(
            'label' => sprintf(__('Team Member %d - Email (Optional)', 'apply-visa-bali'), $i),
            'section' => 'about_us_section',
            'type' => 'email',
        ));
    }

    // Contact Us Section
    $wp_customize->add_section('contact_us_section', array(
        'title' => __('Contact Us Page', 'apply-visa-bali'),
        'priority' => 38,
        'description' => __('Customize the Contact Us page content', 'apply-visa-bali'),
    ));

    // WhatsApp Contact
    $wp_customize->add_setting('contact_whatsapp_text', array(
        'default' => 'WhatsApp Us Now!',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('contact_whatsapp_text', array(
        'label' => __('WhatsApp Button Text', 'apply-visa-bali'),
        'section' => 'contact_us_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting('contact_whatsapp_message', array(
        'default' => 'Hello! I would like to inquire about your visa services.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('contact_whatsapp_message', array(
        'label' => __('WhatsApp Default Message', 'apply-visa-bali'),
        'section' => 'contact_us_section',
        'type' => 'textarea',
    ));

    // Email Contact
    $wp_customize->add_setting('contact_email', array(
        'default' => 'info@applyvisabali.com',
        'sanitize_callback' => 'sanitize_email',
    ));
    $wp_customize->add_control('contact_email', array(
        'label' => __('Contact Email Address', 'apply-visa-bali'),
        'section' => 'contact_us_section',
        'type' => 'email',
    ));

    $wp_customize->add_setting('contact_email_text', array(
        'default' => 'Send us an email and we\'ll get back to you within 24 hours.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('contact_email_text', array(
        'label' => __('Email Card Description', 'apply-visa-bali'),
        'section' => 'contact_us_section',
        'type' => 'textarea',
    ));

    // Business Hours
    $wp_customize->add_setting('contact_hours_title', array(
        'default' => 'Business Hours',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('contact_hours_title', array(
        'label' => __('Business Hours Title', 'apply-visa-bali'),
        'section' => 'contact_us_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting('contact_hours_weekdays', array(
        'default' => 'Monday - Friday: 9:00 AM - 6:00 PM',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('contact_hours_weekdays', array(
        'label' => __('Weekdays Hours', 'apply-visa-bali'),
        'section' => 'contact_us_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting('contact_hours_saturday', array(
        'default' => 'Saturday: 9:00 AM - 2:00 PM',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('contact_hours_saturday', array(
        'label' => __('Saturday Hours', 'apply-visa-bali'),
        'section' => 'contact_us_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting('contact_hours_sunday', array(
        'default' => 'Sunday: Closed',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('contact_hours_sunday', array(
        'label' => __('Sunday Hours', 'apply-visa-bali'),
        'section' => 'contact_us_section',
        'type' => 'text',
    ));
}
add_action('customize_register', 'apply_visa_bali_customize_register');

// Excerpt Length
function apply_visa_bali_excerpt_length($length) {
    return 20;
}
add_filter('excerpt_length', 'apply_visa_bali_excerpt_length');

// Excerpt More
function apply_visa_bali_excerpt_more($more) {
    return '...';
}
add_filter('excerpt_more', 'apply_visa_bali_excerpt_more');
