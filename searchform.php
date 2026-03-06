<?php
/**
 * Formulaire de recherche custom
 */
?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
    <label class="search-form-label">
        <span class="screen-reader-text"><?php _e('Rechercher :', 'lgbt-ensemble'); ?></span>
        <input type="search"
               class="search-form-input"
               placeholder="Rechercher un article, un mot-clé…"
               value="<?php echo esc_attr(get_search_query()); ?>"
               name="s" />
    </label>
    <button type="submit" class="search-form-submit">
        Rechercher
    </button>
</form>
