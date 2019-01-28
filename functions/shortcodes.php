<?php

if (!function_exists('bw_html_sitemap')) {
    /**
     * Add Shortcode HTML Sitemap
     *
     * @param $atts
     * @return string
     */
    function bw_html_sitemap($atts)
    {
        $output = '';
        $args   = array(
            'public' => 1,
        );

        // If you would like to ignore some post types just add them to the array below
        $ignoreposttypes = array(
            'attachment',
            'popup',
        );

        $post_types = get_post_types($args, 'objects');

        foreach ($post_types as $post_type) {
            if (!in_array($post_type->name, $ignoreposttypes)) {
                $output      .= '<h2 class="sitemap-headline">' . $post_type->labels->name . '</h2>';
                $args        = array(
                    'posts_per_page' => -1,
                    'post_type'      => $post_type->name,
                    'post_status'    => 'publish',
                    'orderby'        => 'title',
                    'order'          => 'ASC',
                );
                $posts_array = get_posts($args);
                $output      .= '<ul class="sitemap-list">';
                foreach ($posts_array as $pst) {
                    $output .= '<li class="sitemap-item"><a class="sitemap-link" href="' . get_permalink($pst->ID) . '">' . $pst->post_title . '</a></li>';
                }
                $output .= '</ul>';
            }
        }

        return $output;
    }

    add_shortcode('bw-html-sitemap', 'bw_html_sitemap');
}
