<?php
/**
 * Plugin name: Новый плагин
 */

add_shortcode('ajax_pagination', 'script');

function locate_plugin_template($template_names, $load = false, $require_once = true)
{
    $located = '';
    foreach ((array)$template_names as $template_name) {

        if (!$template_name) {
            continue;
        }
        if (file_exists(__DIR__ . '/' . $template_name)) {
            $located = __DIR__ . '/' . $template_name;
            break;
        }
    }

    if ($load && '' != $located) {
        load_template($located, $require_once);
    }

    return $located;
}

function ccm_get_template_part($slug, $name = null)
{
    do_action("ccm_get_template_part_{$slug}", $slug, $name);

    $templates = array();
    $name = (string)$name;
    if ('' !== $name) {
        $templates[] = "{$slug}-{$name}.php";
    }

    $templates[] = "{$slug}.php";
    locate_plugin_template($templates, true, false);
}

function script($atts)
{
    global $wp_query;
    $a = '';
    if ($wp_query->max_num_pages > 1) {
        $page = get_query_var('paged') ? get_query_var('paged') : 1;
        $a = '<script id="true_loadmore">';
        $a .= 'var ajaxurl = "' . site_url() . '/wp-admin/admin-ajax.php";';
        $a .= "var true_posts = '" . serialize($wp_query->query_vars) . "';";
        $a .= 'var current_page ="' . $page . '";';
        $a .= '</script>';
    }
    return $a;
}

function ajax()
{
    wp_enqueue_script('jquery');
    wp_enqueue_script('true_loadmore', plugin_dir_url(__FILE__) . 'loadmore.js', array('jquery'));
}

function true_load_posts()
{

    $args = unserialize(stripslashes($_POST['query']));
    $args['paged'] = $_POST['page'] + 1;
    $args['post_status'] = 'publish';

    query_posts($args);
    if (have_posts()):
        while (have_posts()):
            the_post();
            echo '<div class="col-md-6">';
            ccm_get_template_part('content', get_post_format());
            echo '</div>';
        endwhile;
    endif;
    wp_die();
}

add_action('wp_enqueue_scripts', 'ajax', 1);
add_action('wp_ajax_loadmore', 'true_load_posts');
add_action('wp_ajax_nopriv_loadmore', 'true_load_posts');
