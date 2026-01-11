<?php
/**
 * Template de base pour les listes d’articles
 */

get_header();
?>

<div class="section">
    <div class="container">
        <?php if (have_posts()) : ?>

            <?php if (!is_front_page()) : ?>
                <h1 class="section-title">
                    <?php
                    if (is_home()) {
                        single_post_title();
                    } elseif (is_archive()) {
                        the_archive_title();
                    } else {
                        bloginfo('name');
                    }
                    ?>
                </h1>
            <?php endif; ?>

            <?php while (have_posts()) : the_post(); ?>
                <article <?php post_class(); ?>>
                    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    <p><?php echo wp_kses_post(wp_trim_words(get_the_excerpt(), 40)); ?></p>
                </article>
            <?php endwhile; ?>

            <?php the_posts_pagination(); ?>

        <?php else : ?>
            <p>Aucun contenu trouvé.</p>
        <?php endif; ?>
    </div>
</div>

<?php
get_footer();
