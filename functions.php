<?php
/*
All the functions are in the PHP pages in the `functions/` folder.
*/
show_admin_bar(false);

require_once locate_template('/functions/helpers.php');
require_once locate_template('/functions/admin.php');
require_once locate_template('/functions/login.php');
require_once locate_template('/functions/customizer.php');

require_once locate_template('/functions/breadcrumbs.php');
require_once locate_template('/functions/cleanup.php');
require_once locate_template('/functions/custom-logo.php');
require_once locate_template('/functions/setup.php');
require_once locate_template('/functions/enqueues.php');
require_once locate_template('/functions/navbar.php');
require_once locate_template('/functions/widgets.php');
require_once locate_template('/functions/index-pagination.php');
require_once locate_template('/functions/split-post-pagination.php');
require_once locate_template('/functions/feedback.php');
    
function brainworks_breadcrumbs_localization($l10n) {
  return array(
    'home'       => __('Front page', 'brainworks'),
    'paged'      => __('Page %d', 'brainworks'),
    '_404'       => __('Error 404', 'brainworks'),
    'search'     => __('Search results by query - <b>%s</b>', 'brainworks'),
    'author'     => __('Author archve: <b>%s</b>', 'brainworks'),
    'year'       => __('Archive by <b>%d</b> year', 'brainworks'),
    'month'      => __('Archive by: <b>%s</b>', 'brainworks'),
    'day'        => '',
    'attachment' => __('Media: %s', 'brainworks'),
    'tag'        => __('Posts by tag: <b>%s</b>', 'brainworks'),
    'tax_tag'    => __('%1$s from "%2$s" by tag: <b>%3$s</b>', 'brainworks'),  );
}

add_filter('kama_breadcrumbs_default_loc', 'brainworks_breadcrumbs_localization', 10, 1);

function bw_menu_no_link($nav_menu, $args) {
    $theme_locations = array('main-nav', 'second-menu');
    if (in_array($args->theme_location, $theme_locations, true)) {
        $in_link  = '!<li(.*?)class="(.*?)current-menu-item(.*?)"><a(.*?)class="(.*?)">(.*?)</a>!si';
        $out_link = '<li$1class="\\2current-menu-item\\3"><span class="$5">$6</span>';
        return preg_replace($in_link, $out_link, $nav_menu);
    }
    return $nav_menu;
}
add_filter('wp_nav_menu', 'bw_menu_no_link', 10, 2);


function isa_add_img_title( $attr, $attachment = null ) {

    $img_title = trim( strip_tags( $attachment->post_title ) );

    $attr['title'] = $img_title;
    $attr['alt'] = $img_title;

    return $attr;
}
add_filter( 'wp_get_attachment_image_attributes','isa_add_img_title', 10, 2 );