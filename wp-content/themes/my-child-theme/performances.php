<?php
/**
 * Template Name: Для спектаклей
 *
 * This is the template that displays full width page without sidebar
 *
 * @package unite
 */

get_header(); ?>

<section id="primary" class="content-area col-sm-12 col-md-8 <?php echo of_get_option('site_layout'); ?>">
    <main id="main" class="site-main" role="main">
        <?php

        $cat_ID = get_query_var('cat');
        $args = [
            'post_type' => ['performances'],
            'publish' => true,
            'cat' => $cat_ID,
            'paged' => get_query_var('paged'),
        ];
        query_posts($args);
        ?>
        <?php

        while (have_posts()) : the_post(); ?>
            <?php
            echo '<div class="col-md-6">';
            if (shortcode_exists('ajax_pagination')) {
                ccm_get_template_part('content', get_post_format());
            } else {
                get_template_part('content', get_post_format());
            }
            echo '</div>';
            ?>
            <?php
            // If comments are open or we have at least one comment, load up the comment template
            if (comments_open() || '0' != get_comments_number()) :
                comments_template();
            endif;
            ?>
        <?php endwhile; // end of the loop. ?>
        <?php if (shortcode_exists('ajax_pagination')) {
            echo do_shortcode('[ajax_pagination]');
        }
        ?>
    </main><!-- #main -->
</section><!-- #primary -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>
