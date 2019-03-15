<?php

/**
 * @param int $taxonomy
 * @param int $id
 * @param int $icon
 */
function get_my_taxonomy($taxonomy, $id, $icon)
{
    $huc = [];
    $cur_terms = get_the_terms($id, $taxonomy);
    if (is_array($cur_terms)) {
        foreach ($cur_terms as $cur_term) {
            $huc[] = '<a href="' . get_term_link($cur_term->term_id, $cur_term->taxonomy) . '">' . $cur_term->name . '</a>';
        }
    }
    if ($huc) {
        echo '<span class="tags-links">' . $icon;
        echo $comma_separated = implode(', ', $huc);
        echo '</span>';
    }
}

add_action('my_taxonomy', 'get_my_taxonomy', 1, 3);


function get_my_posts()
{
    wp_reset_postdata();
    $a = '<ul>';
    foreach (get_posts(['post_type'=>'performances']) as $recent_post_single) {
        $a .= '<li><a href="' . get_the_permalink($recent_post_single->ID) . '">' . get_the_title($recent_post_single->ID) . '</a></li>';
    }
    wp_reset_postdata();
    return $a.'</ul>';
}
add_shortcode('my_posts', 'get_my_posts');
