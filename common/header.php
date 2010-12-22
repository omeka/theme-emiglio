<!DOCTYPE html>
<html lang="en-us">
<head>
    <meta charset="utf-8">
    <?php if ( $description = settings('description')): ?>
    <meta name="description" content="<?php echo $description; ?>" />
    <?php endif; ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title><?php echo settings('site_title'); echo isset($title) ? ' | ' . $title : ''; ?></title>
    
    <?php echo auto_discovery_link_tag(); ?>
    
    <!-- Plugin Stuff -->
    <?php plugin_header(); ?>
    
    <!-- Stylesheets -->
    <?php 
    queue_css('style');
    display_css(); 
    ?>
    
    <!-- JavaScripts -->
    <?php display_js(); ?>

</head>
<body<?php echo isset($bodyid) ? ' id="'.$bodyid.'"' : ''; ?><?php echo isset($bodyclass) ? ' class="'.$bodyclass.'"' : ''; ?>>
	<div id="wrap">

		<div id="header">
		    
		<div id="site-title"><?php echo link_to_home_page(custom_display_logo()); ?></div>
		</div>
		
		<div id="search-wrap">
		    <h2>Search</h2>
			<?php echo simple_search(); ?>
			<?php echo link_to_advanced_search(); ?>
		</div>
		<?php echo custom_header_image(); ?>
		
		<div id="primary-nav">
			<ul class="navigation">
			   <?php echo custom_public_nav_header(); ?>
			</ul>
		</div>
		<div id="content">