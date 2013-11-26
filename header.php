<?php
/**
 * Created by JetBrains PhpStorm.
 * User: wb-wangyuefei
 * Date: 13-11-21
 * Time: 下午5:24
 * To change this template use File | Settings | File Templates.
 */?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width" />
    <title><?php wp_title(); ?> - <?php bloginfo('name');?></title>
    <link rel="shortcut icon" href="http://cssjser.qiniudn.com/ico.ico"/>
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url');?>"/>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<header id="header">
    <div class="pageWidth header-inner">
        <h1 class="site-title">
            <a id="logo"  href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">CssJser</a>
        </h1>
        <div class="site-nav">
            <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu') ); ?>
        </div>
        <div class="site-widget">
            <?php get_search_form(); ?>
            <div class="social-widget">
                <div class="rss">
                    <a href="<?php echo bloginfo('rss2_url'); ?>">RSS</a>
                </div>
            </div>
        </div>
    </div>
</header>
<div id="body">
    <div id="layout" class="pageWidth">