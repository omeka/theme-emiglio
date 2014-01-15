<?php
$pageTitle = __('Browse Items');
echo head(array('title'=>$pageTitle,'bodyid'=>'items','bodyclass' => 'browse'));
?>

<div id="primary" class="browse">

    <h1><?php echo $pageTitle; ?> <?php echo __('(%s total)', total_records('items')); ?></h1>

    <ul class="items-nav navigation" id="secondary-nav">
        <?php echo public_nav_items(); ?>
    </ul>

    <div id="pagination-top" class="pagination"><?php echo pagination_links(); ?></div>

    <?php foreach (loop('items') as $item): ?>
        <div class="item hentry">
            <div class="item-meta">

            <?php if (metadata($item, 'has thumbnail')): ?>
                <div class="item-img">
                <?php echo link_to_item(item_image('square_thumbnail')); ?>
                </div>
            <?php endif; ?>

            <h2><?php echo link_to_item(metadata($item, array('Dublin Core', 'Title'), array('class'=>'permalink'))); ?></h2>

            <?php if ($text = metadata($item, array('Item Type Metadata', 'Text'), array('snippet'=>250))): ?>
                <div class="item-description">
                <p><?php echo $text; ?></p>
                </div>
            <?php elseif ($description = metadata($item, array('Dublin Core', 'Description'), array('snippet'=>250))): ?>
                <div class="item-description">
                <?php echo $description; ?>
                </div>
            <?php endif; ?>

            <?php if (metadata($item, 'has tags')): ?>
                <div class="tags"><p><strong><?php echo __('Tags'); ?></strong>
                <?php echo tag_string(); ?></p>
                </div>
            <?php endif; ?>

            <?php echo fire_plugin_hook('admin_items_browse_simple_each'); ?>

            </div><!-- end class="item-meta" -->
        </div><!-- end class="item hentry" -->
    <?php endforeach; ?>
    <?php echo fire_plugin_hook('public_items_browse'); ?>

    <div id="pagination-bottom" class="pagination"><?php echo pagination_links(); ?></div>
</div>
<div id="secondary">
    <!-- Featured Item -->
    <div id="featured-item" class="featured">
        <h2><?php echo __('Featured Item'); ?></h2>
        <?php echo random_featured_items(1); ?>
    </div><!--end featured-item-->

</div><!-- end primary -->

<?php echo foot(); ?>
