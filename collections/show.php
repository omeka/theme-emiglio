<?php head(array('title'=>h($collection->name))); ?>

<div id="primary" class="show">
    <h1><?php echo h($collection->name); ?></h1>

    <div id="description" class="field">
    <h2>Description</h2>
    <div class="field-value"><?php echo nls2p(h($collection->description)); ?></div>
    </div>
    
    <div id="collectors" class="field">
    <h2>Collector(s)</h2> 
        <div class="field-value">
            <ul><?php foreach($collection->Collectors as $collector):?>
                <li><?php echo h($collector->name); ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>

    <p><a href="<?php echo uri('items/browse/', array('collection'=>$collection->id)); ?>">View the items in &quot;<?php echo h($collection->name); ?>&quot;</a></p>

</div>

<?php foot(); ?>