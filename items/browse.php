<?php
$pageTitle = __('Browse Items');
echo head(array('title'=>$pageTitle, 'bodyclass' => 'items browse'));
?>

<div id="primary" class="browse">

    <h1><?php echo $pageTitle;?> <?php echo __('(%s total)', $total_results); ?></h1>

    <?php echo item_search_filters(); ?>

    <ul class="items-nav navigation" id="secondary-nav">
        <?php echo public_nav_items(); ?>
    </ul>

    <?php echo pagination_links(); ?>

    <?php if ($total_results > 0): ?>

    <?php
    $sortLinks[__('Title')] = 'Dublin Core,Title';
    $sortLinks[__('Creator')] = 'Dublin Core,Creator';
    $sortLinks[__('Date Added')] = 'added';
    ?>
    <div id="sort-links">
        <span class="sort-label"><?php echo __('Sort by: '); ?></span><?php echo browse_sort_links($sortLinks); ?>
    </div>

    <?php endif; ?>

    <?php foreach (loop('items') as $item): ?>
        <div class="item hentry">
            <div class="item-meta">

            <h2><?php echo link_to_item(metadata($item, array('Dublin Core', 'Title'), array('class'=>'permalink'))); ?></h2>

            <?php if (metadata($item, 'has thumbnail')): ?>
                <div class="item-img">
                <?php echo link_to_item(item_image('square_thumbnail')); ?>
                </div>
            <?php endif; ?>

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
                <div class="tags"><p><strong><?php echo __('Tags'); ?>: </strong>
                <?php echo tag_string('items'); ?></p>
                </div>
            <?php endif; ?>

            <?php echo fire_plugin_hook('public_items_browse_each', array('view' => $this, 'item' =>$item)); ?>

            </div><!-- end class="item-meta" -->
        </div><!-- end class="item hentry" -->
    <?php endforeach; ?>
    <?php echo fire_plugin_hook('public_items_browse', array('items'=>$items, 'view' => $this)); ?>

    <?php echo pagination_links(); ?>
</div>
<div id="secondary">
    <!-- Featured Item -->
    <div id="featured-item" class="featured">
        <h2><?php echo __('Featured Item'); ?></h2>
        <?php echo random_featured_items(1); ?>
    </div><!--end featured-item-->

</div><!-- end primary -->

<?php echo foot(); ?>
