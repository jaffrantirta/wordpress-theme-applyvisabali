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
