<!DOCTYPE html>
<html lang="<?php echo get_html_lang(); ?>">
<head>
    <meta charset="utf-8">
    <?php if ( $description = option('description')): ?>
    <meta name="description" content="<?php echo $description; ?>" />
    <?php endif; ?>
    <?php
    if (isset($title)) {
        $titleParts[] = strip_formatting($title);
    }
    $titleParts[] = option('site_title');
    ?>
    <title><?php echo implode(' &middot; ', $titleParts); ?></title>

    <?php echo auto_discovery_link_tags(); ?>

    <!-- Plugin Stuff -->
    <?php fire_plugin_hook('public_head', array('view'=>$this)); ?>

    <!-- Stylesheets -->
    <?php
    queue_css_url('http://fonts.googleapis.com/css?family=Lato');
    queue_css_file('style');
    echo head_css();
    ?>

    <!-- JavaScripts -->
    <?php 
    queue_js_file('globals');
    queue_js_file('jquery-accessibleMegaMenu');
    echo head_js(); 
    ?>
</head>

<?php echo body_tag(array('id' => @$bodyid, 'class' => @$bodyclass)); ?>
    <?php fire_plugin_hook('public_body', array('view'=>$this)); ?>
    <div id="wrap">

        <header role="banner">

            <?php fire_plugin_hook('public_header', array('view'=>$this)); ?>

            <div id="search-container">
                <?php echo search_form(array('show_advanced' => true)); ?>
            </div><!-- end search -->

            <div id="site-title"><?php echo link_to_home_page(theme_logo()); ?></div>

            <nav id="top-nav">
                <?php echo public_nav_main(); ?>
            </nav>

            <?php echo theme_header_image(); ?>

        </header>
        
        <article id="content">
        
            <?php fire_plugin_hook('public_content_top', array('view'=>$this)); ?>
