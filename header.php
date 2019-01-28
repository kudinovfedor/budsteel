<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-title" content="<?php bloginfo('name'); ?> - <?php bloginfo('description'); ?>">
    <link rel="shortcut icon" href="<?php echo esc_url(get_template_directory_uri() . '/img/favicon.ico'); ?>" type="image/x-icon">
    <link rel="icon" href="<?php echo esc_url(get_template_directory_uri() . '/img/favicon.ico'); ?>" type="image/x-icon">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?> id="top">
<div class="wrapper">
    <header class="header">
        <div class="container">
            <div class="row">
                <div class="col-md-6 header-item">
                    <div class="logo header-logo">
                        <?php if ( has_custom_logo() ) {
                            the_custom_logo(); ?>
                            <span class="logo-desc"><?php bloginfo( 'description' ); ?></span>
                        <?php } else { ?>
                            <?php if ($wp->request === "" || $wp->request === "uk"): ?>
                                <span class="logo-link">
                                    <img src="https://budsteel.com.ua/wp-content/themes/budsteel-v1.0/img/logo.png" alt="BudSteel" class="logo-img" title="Строительство быстровозводимых зданий от компании BudSteel" />
                                </span>
                            <?php else: ?>
                                <a href="<?php echo home_url(); ?>" class="logo-link">
                                    <img src="https://budsteel.com.ua/wp-content/themes/budsteel-v1.0/img/logo.png" alt="BudSteel" class="logo-img" title="Строительство быстровозводимых зданий от компании BudSteel" />
                                </a>
                            <?php endif; ?>
                            <span class="logo-desc"><?php bloginfo( 'description' ); ?></span>
                        <?php } ?>
                    </div>
                    <button class="hamburger js-hamburger" type="button" tabindex="0">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                    </button>
                </div>
                <div class="col-md-6 header-item text-center">
                    <?php if(has_phones()) { ?>
                        <ul class="phone header-phone">
                            <?php foreach (get_phones() as $phone) { ?>
                                <li class="phone-item">
                                    <a href="tel:<?php echo esc_attr(get_phone_number($phone)); ?>" class="phone-number">
                                        <?php echo esc_html($phone); ?>
                                    </a>
                                </li>
                            <?php } ?>
                        </ul>
                    <?php } ?>
                    <button type="button" class="header-feedback button-medium <?php the_lang_class('js-feedback'); ?>"><?php _e('Feed back', 'brainworks'); ?></button>
                </div>
            </div>
        </div>
    </header>

   <div class="menu-wrapper">
    <div class="container">
        <?php if (function_exists('pll_the_languages')) { ?>
            <span class="lang header-lang on-mobile-hide">
                <?php pll_the_languages(array('show_flags' => 0, 'show_names' => 1, 'hide_if_empty' => 0, 'display_names_as' => 'name', 'dropdown' => 1)); ?>
            </span>
        <?php } ?>
        <?php if (function_exists('pll_the_languages')) { ?>
            <span class="lang header-lang on-mobile-show">
                <?php pll_the_languages(array('show_flags' => 1, 'show_names' => 0, 'hide_if_empty' => 0, 'display_names_as' => 'slug')); ?>
            </span>
        <?php } ?>
        <?php if (has_nav_menu('main-nav')) { ?>
            <nav class="nav js-menu">
                <button type="button" tabindex="0" class="menu-close js-menu-close"></button>
                <?php wp_nav_menu(array(
                    'theme_location' => 'main-nav',
                    'container' => false,
                    'menu_class' => 'menu header-menu',
                    'menu_id' => '',
                    'fallback_cb' => 'wp_page_menu',
                    'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                    'depth' => 4
                )); ?>
            </nav>
        <?php } ?>
    </div>
    </div>


    <div class="page-wrapper container">

<?php /*
<?php if ( has_custom_logo() ) {
    the_custom_logo();
} else { ?>
    <a class="logo-link" href="<?php echo esc_url( home_url( '/' ) ); ?>">
        <img class="logo-img" src="<?php echo esc_url( get_template_directory_uri() . '/img/logo.png' ); ?>" alt="<?php bloginfo( 'name' ); ?>">
    </a>
<?php } ?>

<?php if (function_exists('pll_the_languages')) { ?>
    <ul class="lang">
        <?php pll_the_languages(array('show_flags' => 1, 'show_names' => 0, 'hide_if_empty' => 0, 'display_names_as' => 'slug')); ?>
    </ul>
<?php } ?>

<?php if(has_social()) { ?>
    <ul class="social">
        <?php foreach (get_social() as $social) { ?>
            <li class="social-item">
                <a href="<?php echo esc_attr(esc_url($social['url'])); ?>" class="social-link" target="_blank">
                    <i class="fa <?php echo esc_attr($social['icon']); ?>" aria-hidden="true" aria-label="<?php echo esc_attr($social['text']); ?>"></i>
                </a>
            </li>
        <?php } ?>
    </ul>
<?php } ?>

<?php if(has_phones()) { ?>
    <ul class="phones">
        <?php foreach (get_phones() as $phone) { ?>
            <li class="phone-item">
                <a href="tel:<?php echo esc_attr(get_phone_number($phone)); ?>" class="phone-number">
                    <?php echo esc_html($phone); ?>
                </a>
            </li>
        <?php } ?>
    </ul>
<?php } ?>

<button type="button" class="button-medium <?php the_lang_class('js-call-back'); ?>"><?php _e('Call back', 'brainworks'); ?></button>

<h1><?php echo esc_html( get_bloginfo( 'name' ) ); ?></h1>
<h3><?php bloginfo( 'description' ); ?></h3>
<h3><?php bloginfo('admin_email'); ?></h3>

footer widget
<ul>
    <li>
        <i class="fa fa-fw fa-map-marker" aria-hidden="true"></i>
        Киев, пер. Куреневский <br>
        19\5, офис 380
    </li>
    <li>
        <i class="fa fa-fw fa-phone" aria-hidden="true"></i>
        0632037137
        <br>
        <i class="fa fa-fw fa-phone" aria-hidden="true"></i>
        0632037137
    </li>
    <li>
        <i class="fa fa-fw fa-envelope" aria-hidden="true"></i>
        <a href="mailto:info@budsteel.com.ua">info@budsteel.com.ua</a>
    </li>
</ul>
[fk-social]


<p>Задайте свой вопрос и мы ответим Вам в ближайшее время.</p>
<a href="#" class="button-medium button-outline">Задать вопрос</a>

Карта сайта дополнительный класс .sitemap
*/ ?>
