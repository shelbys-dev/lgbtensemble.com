<?php
/**
 * Template des commentaires.
 */

if (post_password_required()) {
    return;
}
?>

<section id="comments" class="comments-area">
    <?php if (have_comments()) : ?>
        <h2 class="comments-title">
            <?php
            printf(
                esc_html(_n('%1$s commentaire', '%1$s commentaires', get_comments_number(), 'lgbt-ensemble')),
                esc_html(number_format_i18n(get_comments_number()))
            );
            ?>
        </h2>

        <ol class="comment-list">
            <?php
            wp_list_comments(
                array(
                    'style'      => 'ol',
                    'short_ping' => true,
                )
            );
            ?>
        </ol>

        <?php the_comments_navigation(); ?>
    <?php endif; ?>

    <?php
    comment_form(
        array(
            'title_reply' => esc_html__('Laisser un commentaire', 'lgbt-ensemble'),
        )
    );
    ?>
</section>
