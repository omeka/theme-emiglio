<?php
$title = __('Browse Exhibits by Tag');
echo head(array('title' => $title, 'bodyclass' => 'exhibits tags'));
?>

<div id="primary">
    <h1><?php echo $title; ?></h1>
    
    <nav class="navigation exhibit-tags" id="secondary-nav">
        <?php echo nav(array(
                array(
                    'label' => __('Browse All'),
                    'uri' => url('exhibits/browse')
                ),
                array(
                    'label' => __('Browse by Tag'),
                    'uri' => url('exhibits/tags')
                )
            )
        ); ?>
    </nav>
    
    <?php echo tag_cloud($tags, 'exhibits/browse'); ?>
</div>

<div id="secondary">
    <?php echo exhibit_builder_display_random_featured_exhibit(); ?>
</div>

<?php echo foot(); ?>
