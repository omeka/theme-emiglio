<?php echo head(array('bodyid'=>'home')); ?>

<?php if ($homepageText = get_theme_option('Homepage Text')): ?>
    <!-- Homepage Text -->
    <div id="intro">
    <?php echo $homepageText; ?>
    </div>
<?php endif; ?>

<div id="primary">

    <?php if (get_theme_option('Display Featured Item') !== '0'): ?>
    <!-- Featured Item -->
    <div id="featured-item" class="featured">
        <h2><?php echo __('Featured Item'); ?></h2>
        <?php echo random_featured_items(1); ?>
    </div><!--end featured-item-->
    <?php endif; ?>

    <div id="recent-items">
        <h2><?php echo __('Recently Added Items'); ?></h2>
        <?php
            $homepageRecentItems = (int)get_theme_option('Homepage Recent Items') ? get_theme_option('Homepage Recent Items') : '3';
            set_loop_records('items', get_recent_items($homepageRecentItems));
            if (has_loop_records('items')):
        ?>
        <div class="items-list">
            <?php foreach(loop('items') as $item): ?>
            <?php set_current_record('items', $item); ?>
            <div class="item">

                <h3><?php echo link_to_item(); ?></h3>

                <?php if(metadata($item, 'has thumbnail')): ?>
                    <div class="item-img">
                    <?php echo link_to_item(item_image('square_thumbnail')); ?>
                    </div>
                <?php endif; ?>

                <?php if ($desc = metadata($item, array('Dublin Core','Description'), array('snippet'=>150))): ?>

                    <div class="item-description"><?php echo $desc; ?><p><?php echo link_to_item(__('see more'),(array('class'=>'show'))) ?></p></div>

                <?php endif; ?>

            </div>
            <?php endforeach; ?>
        </div>

        <?php else: ?>
            <p><?php echo __('No recent items available.'); ?></p>

        <?php endif; ?>

        <p class="view-items-link"><a href="<?php echo html_escape(url('items')); ?>"><?php echo __('View All Items'); ?></a></p>

    </div><!--end recent-items -->
</div>
<div id="secondary">
    <?php if (get_theme_option('Display Featured Collection') !== '0'): ?>
    <!-- Featured Collection -->
    <div id="featured-collection" class="featured">
        <h2><?php echo __('Featured Collection'); ?></h2>
        <?php echo random_featured_collection(); ?>
    </div><!-- end featured collection -->
    <?php endif; ?>

    <?php if ((get_theme_option('Display Featured Exhibit') !== '0')
           && plugin_is_active('ExhibitBuilder')
           && function_exists('exhibit_builder_display_random_featured_exhibit')): ?>
    <!-- Featured Exhibit -->
    <?php echo exhibit_builder_display_random_featured_exhibit(); ?>
    <?php endif; ?>
</div>

<?php echo foot(); ?>
