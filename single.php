<?php
/**
 * Template d'un article
 */

get_header();
?>

<div class="section blog-single">
    <div class="container">

        <nav class="breadcrumb" aria-label="Fil d'Ariane">
            <a href="<?php echo esc_url(home_url('/')); ?>">Accueil</a>
            <span class="breadcrumb-sep">›</span>
            <a href="<?php echo esc_url(get_permalink(get_option('page_for_posts'))); ?>">News</a>
            <span class="breadcrumb-sep">›</span>
            <span><?php the_title(); ?></span>
        </nav>

        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <article <?php post_class('blog-single-article'); ?>>
                <header class="blog-single-header">
                    <h1 class="blog-single-title"><?php the_title(); ?></h1>
                    <div class="blog-card-meta">
                        <time datetime="<?php echo esc_attr(get_the_date('c')); ?>">
                            <?php echo esc_html(get_the_date()); ?>
                        </time>
                        <?php the_tags('<span class="blog-card-tags">', ' ', '</span>'); ?>
                    </div>
                </header>

                <div class="blog-single-content">
                    <?php the_content(); ?>
                </div>
            </article>
        <?php endwhile; endif; ?>

    </div>
</div>

<?php
get_footer();
