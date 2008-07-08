	</div>
	<div id="footer">
	<p>Proudly powered by <a href="http://omeka.org">Omeka</a>.</p>
	<ul class="navigation">
	<?php
		echo nav(array('Home' => uri(''), 'About' => uri('about'), 'Browse Items' => uri('items/browse')));
	?>
	</ul>
	</div>
</div>

<?php echo plugin_footer(); ?> 

</body>
</html>