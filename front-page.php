<?php
/**
 * Template de la page d’accueil (hero)
 */

get_header();
?>

<section class="hero">
    <div class="container hero-inner">
        <div>
            <p class="hero-kicker">Bienvenue sur LGBT Ensemble</p>
            <h2 class="hero-title">
                Un espace safe pour les personnes LGBTQIA+ & allié·e·s.
            </h2>
            <p class="hero-subtitle">
                Discussions, entraide, ressources, témoignages et projets pour faire vivre
                la communauté. Ici, tu peux être toi-même, sans filtre.
            </p>

            <div class="hero-actions">
                <a class="btn btn-primary" href="https://discord.lgbtensemble.com/">
                    Rejoindre le serveur Discord
                </a>
                <a class="btn btn-ghost" href="<?php echo esc_url(get_permalink(get_option('page_for_posts'))); ?>">
                    Lire les derniers articles
                </a>
            </div>

            <div class="hero-meta">
                <span>🛡️ Modération bienveillante</span>
                <span>🏳️‍🌈 Inclusif & intersectionnel</span>
                <span>🤝 Communauté chill</span>
            </div>
        </div>

        <aside class="hero-card">
            <div class="hero-card-title">Un site par et pour la communauté</div>
            <p>
                LGBT Ensemble s’adresse aux personnes LGBTQIA+ et à leurs allié·e·s,
                avec un ton bienveillant, accessible et sans jugement.
            </p>
            <p>
                Tu y trouveras des ressources, un glossaire, des articles de fond
                et des liens vers notre serveur Discord communautaire.
            </p>
            <p>
                N’hésite pas à contribuer, partager ton histoire ou proposer des idées
                pour faire évoluer le projet. 🌈
            </p>
        </aside>
    </div>
</section>

<section class="section">
    <div class="container">
        <h2 class="section-title">Derniers articles</h2>

        <?php
        $query = new WP_Query([
            'posts_per_page' => 3,
        ]);

        if ($query->have_posts()) : ?>
            <div class="posts-grid">
                <?php while ($query->have_posts()) : $query->the_post(); ?>
                    <article <?php post_class(); ?>>
                        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                        <p><?php echo wp_kses_post(wp_trim_words(get_the_excerpt(), 20)); ?></p>
                    </article>
                <?php endwhile; ?>
            </div>
        <?php
        else :
            echo '<p>Aucun article pour le moment.</p>';
        endif;
        wp_reset_postdata();
        ?>
    </div>
</section>

<?php
get_footer();
