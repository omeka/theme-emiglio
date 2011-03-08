<?php head(array('title'=>'Browse Items','bodyid'=>'items','bodyclass' => 'browse')); ?>

<div id="primary" class="browse">

    <h1>Browse Items (<?php echo total_results(); ?> total)</h1>

    <ul class="items-nav navigation" id="secondary-nav">
        <?php echo custom_nav_items(); ?>
    </ul>

    <div id="pagination-top" class="pagination"><?php echo pagination_links(); ?></div>

    <?php while (loop_items()): ?>
        <div class="item hentry">
            <div class="item-meta">

            <?php if (item_has_thumbnail()): ?>
                <div class="item-img">
                <?php echo link_to_item(item_square_thumbnail()); ?>
                </div>
            <?php endif; ?>

            <h2><?php echo link_to_item(item('Dublin Core', 'Title'), array('class'=>'permalink')); ?></h2>

            <?php if ($text = item('Item Type Metadata', 'Text', array('snippet'=>250))): ?>
                <div class="item-description">
                <p><?php echo $text; ?></p>
                </div>
            <?php elseif ($description = item('Dublin Core', 'Description', array('snippet'=>250))): ?>
                <div class="item-description">
                <?php echo $description; ?>
                </div>
            <?php endif; ?>

            <?php if (item_has_tags()): ?>
                <div class="tags"><p><strong>Tags:</strong>
                <?php echo item_tags_as_string(); ?></p>
                </div>
            <?php endif; ?>

            <?php echo plugin_append_to_items_browse_each(); ?>

            </div><!-- end class="item-meta" -->
        </div><!-- end class="item hentry" -->
    <?php endwhile; ?>
    <?php echo plugin_append_to_items_browse(); ?>

    <div id="pagination-bottom" class="pagination"><?php echo pagination_links(); ?></div>
</div>
<div id="secondary">
    <!-- Featured Item -->
    <div id="featured-item" class="featured">
        <?php echo display_random_featured_item(); ?>
    </div><!--end featured-item-->

</div><!-- end primary -->

<?php foot();
