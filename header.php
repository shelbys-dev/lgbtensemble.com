<?php
/**
 * Header du thème
 */
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div class="site">
    <div class="site-header-wrapper">
        <header class="site-header" role="banner">
            <div class="site-branding">
                <span class="brand-pill">LGBTQIA+ safe place</span>
                <div>
                    <h1 class="site-title">
                        <a href="<?php echo esc_url(home_url('/')); ?>">
                            <?php bloginfo('name'); ?>
                        </a>
                    </h1>
                    <?php if (get_bloginfo('description')) : ?>
                        <p class="site-tagline"><?php bloginfo('description'); ?></p>
                    <?php endif; ?>
                </div>
            </div>
            
            <button class="nav-toggle" type="button"
                aria-expanded="false"
                aria-label="<?php esc_attr_e('Ouvrir le menu', 'lgbt-ensemble'); ?>">
                <span class="nav-toggle-bar"></span>
                <span class="nav-toggle-bar"></span>
                <span class="nav-toggle-bar"></span>
            </button>

            <nav class="site-nav" role="navigation" aria-label="<?php esc_attr_e('Menu principal', 'lgbt-ensemble'); ?>">
                <?php
                wp_nav_menu([
                    'theme_location' => 'primary',
                    'container'      => false,
                    'menu_class'     => '',
                    'fallback_cb'    => false,
                ]);
                ?>
            </nav>
        </header>
    </div>

    <main class="site-main" role="main">
