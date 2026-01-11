<?php
/**
 * Setup et assets du thème LGBT Ensemble
 */

if (!function_exists('lgbt_ensemble_setup')) {
    function lgbt_ensemble_setup() {
        // Titre géré par WP
        add_theme_support('title-tag');

        // Vignettes d’articles
        add_theme_support('post-thumbnails');

        // Menu
        register_nav_menus([
            'primary' => __('Menu principal', 'lgbt-ensemble'),
        ]);

        // HTML5 pour certains éléments
        add_theme_support('html5', [
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ]);
    }
}
add_action('after_setup_theme', 'lgbt_ensemble_setup');

if (!function_exists('lgbt_ensemble_assets')) {
    function lgbt_ensemble_assets() {
        wp_enqueue_style(
            'lgbt-ensemble-style',
            get_stylesheet_uri(),
            [],
            wp_get_theme()->get('Version')
        );
    }
}
add_action('wp_enqueue_scripts', 'lgbt_ensemble_assets');

// Support Elementor
add_action('after_setup_theme', function() {
    // Support du mode "Full Width"
    add_theme_support('elementor-pro-theme-builder');

    // Autoriser Elementor sur toutes les pages
    add_post_type_support('page', 'elementor');
});

// Forcer WordPress à utiliser le template Elementor si défini
add_filter('template_include', function($template) {
    if ( is_singular('page') && \Elementor\Plugin::$instance->db->is_built_with_elementor(get_the_ID()) ) {
        $template = locate_template('page.php') ?: $template;
    }
    return $template;
});
