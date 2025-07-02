<?php
/**
 * Theme functions and definitions.
 */

// 1. Enqueue styles and scripts
function mytheme_enqueue_assets() {
    wp_enqueue_style('mytheme-style', get_stylesheet_uri(), [], '1.0');
    wp_enqueue_style('mytheme-main', get_template_directory_uri() . '/assets/css/main.css', [], '1.0');
    wp_enqueue_script('mytheme-transform', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.5.1/gsap.min.js', [], '3.5.1', false);
    wp_enqueue_script('mytheme-main', get_template_directory_uri() . '/assets/js/main.js', [], '1.0', true);
    // Preload hero background
    echo '<link rel="preload" href="' . get_template_directory_uri() . '/assets/images/hero-bg.jpg" as="image">';
}
add_action('wp_head', 'mytheme_enqueue_assets');

// 2. Theme setup: menus, thumbnails, support
function mytheme_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_image_size('testimonial-thumb', 80, 80, true);
    register_nav_menus([
        'header-menu' => 'Header Menu',
        'footer-menu' => 'Footer Menu',
    ]);
}
add_action('after_setup_theme', 'mytheme_setup');

// 3. Custom post type: Testimonials
function mytheme_register_testimonials() {
    $labels = [
        'name' => 'Testimonials',
        'singular_name' => 'Testimonial',
        'add_new_item' => 'Add New Testimonial',
    ];
    $args = [
        'labels' => $labels,
        'public' => true,
        'show_in_rest' => true,
        'supports' => ['title', 'editor', 'thumbnail'],
        'menu_icon' => 'dashicons-format-quote',
    ];
    register_post_type('testimonial', $args);
}
add_action('init', 'mytheme_register_testimonials');

// 4. Widget area (sidebar support)
function mytheme_widgets_init() {
    register_sidebar([
        'name' => 'Footer Widgets',
        'id' => 'footer-widgets',
        'before_widget' => '<div class="footer-widget">',
        'after_widget' => '</div>',
        'before_title' => '<h4>',
        'after_title' => '</h4>',
    ]);
}
add_action('widgets_init', 'mytheme_widgets_init');

// 5. Clean up WordPress header
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'wlwmanifest_link');

// 6. Lazy loading filter
function mytheme_lazyload_images($content) {
    return preg_replace('/<img(.*?)src=/i', '<img$1loading="lazy" src=', $content);
}
add_filter('the_content', 'mytheme_lazyload_images');

// 7. Excerpt length
function mytheme_excerpt($length) {
    return 20;
}
add_filter('excerpt_length', 'mytheme_excerpt');

// 8. Read more filter
function mytheme_read_more() {
    return '...';
}
add_filter('excerpt_more', 'mytheme_read_more');

// 9. Custom pingback header
function mytheme_pingback_header() {
    if (is_singular() && pings_open()) {
        echo '<link rel="pingback" href="', bloginfo('pingback_url'), '">';
    }
}
add_action('wp_head', 'mytheme_pingback_header');
