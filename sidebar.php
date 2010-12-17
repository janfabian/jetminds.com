<div class='side-bar'>
	<div class='border'>
  <h4 class='section-name'>kategorie</h4>
  <ul>
		<?php wp_list_categories('title_li=&orderby=name'); ?>
  </ul>
	<h4 class='section-name'>Archiv</h4>
  <ul>
		<?php wp_get_archives('type=monthly&limit=7'); ?>
  </ul>
</div>
</div>