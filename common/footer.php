	</div>
	<div id="footer">
	<p>Powered by <a href="http://omeka.org">Omeka</a>.</p>
	<ul class="navigation">
	<?php
		echo nav(array('Home' => uri(''), 'About' => uri('about'), 'Browse Items' => uri('items/browse')));
	?>
	</ul>
	</div>
</div>
</body>
</html>