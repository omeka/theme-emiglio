<?php head(array('title'=>'Browse by Tag','bodyid'=>'items','bodyclass'=>'tags')); ?>

<div id="primary">
    
	<h1>Browse by Tag</h1>
	
    <ul class="navigation item-tags" id="secondary-nav">
    <?php echo emiglio_nav_items(); ?>
    </ul>

    <?php echo tag_cloud($tags, uri('items/browse')); ?>
    
</div><!-- end primary -->

<?php foot(); ?>