<?php
/**
 * Template de la page des articles (Blog)
 */

get_header();
?>

<div class="section blog">
    <div class="container">

        <!-- Fil d'Ariane -->
        <nav class="breadcrumb" aria-label="Fil d'Ariane">
            <a href="<?php echo esc_url(home_url('/')); ?>">Accueil</a>
            <span class="breadcrumb-sep">›</span>
            <span>News</span>
        </nav>

        <!-- Titre + intro -->
        <header class="blog-header">
            <h1 class="blog-title">Blog</h1>
            <p class="blog-subtitle">
                Articles, annonces et ressources autour des thématiques LGBTQIA+,
                des news du projet et de la communauté.
            </p>
        </header>

        <!-- Barre de recherche -->
        <div class="blog-search">
            <?php get_search_form(); ?>
        </div>

        <!-- Nuage de tags -->
        <?php
        $tags = get_tags([
            'orderby' => 'name',
            'order'   => 'ASC',
        ]);

        if ($tags) : ?>
            <div class="blog-tags">
                <span class="blog-tags-label">Filtrer par tag :</span>
                <div class="blog-tags-list">
                    <?php foreach ($tags as $tag) : ?>
                        <a href="<?php echo esc_url(get_tag_link($tag->term_id)); ?>"
                           class="blog-tag-pill">
                            #<?php echo esc_html($tag->name); ?>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endif; ?>

        <!-- Liste des articles -->
        <?php if (have_posts()) : ?>
            <div class="blog-grid">
                <?php while (have_posts()) : the_post(); ?>
                    <article <?php post_class('blog-card'); ?>>
                        <header class="blog-card-header">
                            <h2 class="blog-card-title">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_title(); ?>
                                </a>
                            </h2>
                            <div class="blog-card-meta">
                                <time datetime="<?php echo esc_attr(get_the_date('c')); ?>">
                                    <?php echo esc_html(get_the_date()); ?>
                                </time>
                                <?php
                                $post_tags = get_the_tags();
                                if ($post_tags) : ?>
                                    <span class="blog-card-tags">
                                        <?php foreach ($post_tags as $tag) : ?>
                                            <a href="<?php echo esc_url(get_tag_link($tag->term_id)); ?>">
                                                #<?php echo esc_html($tag->name); ?>
                                            </a>
                                        <?php endforeach; ?>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </header>

                        <div class="blog-card-excerpt">
                            <?php echo wp_kses_post(wp_trim_words(get_the_excerpt(), 28)); ?>
                        </div>

                        <footer class="blog-card-footer">
                            <a class="blog-card-readmore" href="<?php the_permalink(); ?>">
                                Lire l’article
                            </a>
                        </footer>
                    </article>
                <?php endwhile; ?>
            </div>

            <!-- Pagination -->
            <div class="blog-pagination">
                <?php
                the_posts_pagination([
                    'mid_size'  => 1,
                    'prev_text' => '← Précédent',
                    'next_text' => 'Suivant →',
                ]);
                ?>
            </div>

        <?php else : ?>
            <p>Aucun article pour le moment.</p>
        <?php endif; ?>

    </div>
</div>

<?php
get_footer();
