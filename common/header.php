<!DOCTYPE html>
<html lang="<?php echo get_html_lang(); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes" />
    <?php if ($author = option('author')): ?>
    <meta name="author" content="<?php echo $author; ?>" />
    <?php endif; ?>
    <?php if ($copyright = option('copyright')): ?>
    <meta name="copyright" content="<?php echo $copyright; ?>" />
    <?php endif; ?>
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
    queue_css_url('//fonts.googleapis.com/css?family=Lato');
    queue_css_file(array('iconfonts', 'style'));
    echo head_css();
    ?>

    <!-- JavaScripts -->
    <?php
    queue_js_file(array('vendor/jquery-accessibleMegaMenu','emiglio', 'globals'));
    echo head_js();
    ?>
</head>

<?php echo body_tag(array('id' => @$bodyid, 'class' => @$bodyclass)); ?>
    <a href="#content" id="skipnav"><?php echo __('Skip to main content'); ?></a>
    <?php fire_plugin_hook('public_body', array('view'=>$this)); ?>
    <div id="wrap">

        <header role="banner">

            <?php fire_plugin_hook('public_header', array('view'=>$this)); ?>

            <div id="search-container" role="search">
                <?php 
                    $showAdvanced = get_theme_option('use_advanced_search'); 
                    $formClass = ($showAdvanced) ? 'with-advanced' : '';
                    echo search_form(array('show_advanced' => $showAdvanced, 'form_attributes' => array('class' => $formClass)));
                ?>
            </div>

            <div id="site-title"><?php echo link_to_home_page(theme_logo()); ?></div>

            <nav id="top-nav" role="navigation">
                <?php echo public_nav_main(); ?>
            </nav>

            <?php echo theme_header_image(); ?>

        </header>

        <article id="content" role="main" tabindex="-1">

            <?php fire_plugin_hook('public_content_top', array('view'=>$this)); ?>
