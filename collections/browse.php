<?php 
$pageTitle = __('Browse Collections');
echo head(array('title'=>$pageTitle,'bodyclass' => 'collections browse')); 
?>

<div id="primary">
    <h1><?php echo $pageTitle; ?> <?php echo __('(%s total)', $total_results); ?></h1>
    <?php echo pagination_links(); ?>
    
    <?php
    $sortLinks[__('Title')] = 'Dublin Core,Title';
    $sortLinks[__('Date Added')] = 'added';
    ?>

    <div id="sort-links">
        <span class="sort-label"><?php echo __('Sort by: '); ?></span><?php echo browse_sort_links($sortLinks); ?>
    </div>

    <?php if (total_records('collection') > 0): ?>
    <?php foreach (loop('collection') as $collection): ?>
        <div class="collection">
            <h2><?php echo link_to_collection(); ?></h2>
            <?php if ($collectionImage = record_image('collection')): ?>
                <?php echo link_to_collection($collectionImage, array('class' => 'image')); ?>
            <?php endif; ?>

            <?php if (metadata('collection', array('Dublin Core', 'Description'))): ?>
            <div class="collection-description">
                <?php echo text_to_paragraphs(metadata('collection', array('Dublin Core', 'Description'), array('snippet'=>150))); ?>
            </div>
            <?php endif; ?>
        
            <?php if ($collection->hasContributor()): ?>
            <div class="collection-contributors">
                <p>
                <strong><?php echo __('Contributors'); ?>:</strong>
                <?php echo metadata('collection', array('Dublin Core', 'Contributor'), array('all'=>true, 'delimiter'=>', ')); ?>
                </p>
            </div>
            <?php endif; ?>

            <?php echo link_to_items_browse(__('View the items in %s', metadata($collection, array('Dublin Core', 'Title'))), array('collection' => $collection->id), array('class' => 'view-items-link')); ?>
    
            <?php echo fire_plugin_hook('public_collections_browse_each', array('view' => $this, 'collection' => $collection)); ?>
    
        </div><!-- end class="collection" -->

    <?php endforeach; ?>

    <?php echo pagination_links(); ?>
  
    <?php else: ?>
      <p><?php echo __('There are no collections.'); ?></p>
    <?php endif; ?>
    
    <?php echo fire_plugin_hook('public_collections_browse', array('collections'=>$collections, 'view' => $this)); ?>
</div><!-- end primary -->

<?php if (get_theme_option('Display Featured Collection') !== '0'): ?>
<div id="secondary">
    <div id="featured-collection" class="featured">
        <h2><?php echo __('Featured Collection'); ?></h2>
        <?php echo random_featured_collection(); ?>
    </div><!-- end featured collection -->
</div>
<?php endif; ?>

<?php echo foot(); ?>
