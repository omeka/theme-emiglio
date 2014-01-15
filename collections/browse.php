<?php echo head(array('title'=>__('Browse Collections'),'bodyid'=>'collections','bodyclass' => 'browse')); ?>
<div id="primary">
    <h1><?php echo __('Collections'); ?></h1>
    <?php if (total_records('collection') > 0): ?>
        <div class="pagination"><?php echo pagination_links(); ?></div>
    <?php foreach (loop('collection') as $collection): ?>
        <div class="collection">
            <h2><?php echo link_to_collection(); ?></h2>
            <div class="element">
                <h3><?php echo __('Description'); ?></h3>
            <div class="element-text"><?php echo metadata($collection, array('Dublin Core', 'Description'), array('snippet'=>150)); ?></div>
        </div>
        <div class="element">
            <h3><?php echo __('Contributor'); ?></h3>
            <?php if($collectors = metadata($collection, array('Dublin Core', 'Contributor'), array('delimiter'=>', '))): ?>
            <div class="element-text">
                <p><?php echo $collectors; ?></p>
            </div>
            <?php endif; ?>
        </div>
        <p class="view-items-link"><?php echo link_to_items_browse(__('View the items in %s', metadata($collection, array('Dublin Core', 'Title')), array('collection' => $collection->id))); ?></p>

        <?php echo fire_plugin_hook('public_collections_browse_each'); ?>

        </div><!-- end class="collection" -->
    <?php endforeach; ?>
    <?php else: ?>
        <p><?php echo __('There are no collections.'); ?></p>
    <?php endif; ?>
        <?php echo fire_plugin_hook('public_collections_browse'); ?>
</div><!-- end primary -->
<div id="secondary">
    <div id="featured-collection" class="featured">
        <h2><?php echo __('Featured Collection'); ?></h2>
        <?php echo random_featured_collection(); ?>
    </div><!-- end featured collection -->
</div>
<?php echo foot(); ?>
