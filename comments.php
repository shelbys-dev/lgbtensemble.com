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
    $commenter = wp_get_current_commenter();
    $req = get_option('require_name_email');
    $aria_req = $req ? ' aria-required="true" required' : '';

    $fields = array(
        'author' => sprintf(
            '<p class="comment-form-author user-box"><input id="author" name="author" type="text" value="%1$s" size="30" maxlength="245" autocomplete="name" placeholder=" "%2$s><label for="author">%3$s</label></p>',
            esc_attr($commenter['comment_author']),
            $aria_req,
            esc_html($req ? __('Nom *', 'lgbt-ensemble') : __('Nom', 'lgbt-ensemble'))
        ),
        'email' => sprintf(
            '<p class="comment-form-email user-box"><input id="email" name="email" type="email" value="%1$s" size="30" maxlength="100" autocomplete="email" placeholder=" "%2$s><label for="email">%3$s</label></p>',
            esc_attr($commenter['comment_author_email']),
            $aria_req,
            esc_html($req ? __('Email *', 'lgbt-ensemble') : __('Email', 'lgbt-ensemble'))
        ),
        'url' => sprintf(
            '<p class="comment-form-url user-box"><input id="url" name="url" type="url" value="%1$s" size="30" maxlength="200" autocomplete="url" placeholder=" "><label for="url">%2$s</label></p>',
            esc_attr($commenter['comment_author_url']),
            esc_html__('Site web', 'lgbt-ensemble')
        ),
    );

    comment_form(
        array(
            'title_reply' => esc_html__('Laisser un commentaire', 'lgbt-ensemble'),
            'label_submit' => esc_html__('Publier', 'lgbt-ensemble'),
            'fields' => $fields,
            'comment_field' => sprintf(
                '<p class="comment-form-comment user-box"><textarea id="comment" name="comment" cols="45" rows="6" maxlength="65525" required aria-required="true" placeholder=" "></textarea><label for="comment">%s</label></p>',
                esc_html__('Commentaire *', 'lgbt-ensemble')
            ),
        )
    );
    ?>
</section>
