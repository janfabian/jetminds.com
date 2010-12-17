	<?php
		$featured = new WP_Query();
		$featured->query('showposts=3&category_name=projects');
		$counter=0;
		if($featured->have_posts()) : ?>
		<h4 class='section-name'>aktuální projekty</h4>
		<?php
		while($featured->have_posts()) : $featured->the_post();
		$wp_query->in_the_loop = true;
		$counter ++;
	?>
	<div class='product'
	
	<?php
	// attribute to right positioning
	if($counter==2){
		echo "middle='true'";
	}
	else if($counter==3) {
		echo "last='true'";
	}
	?>
	>
  <a class='product-name' href='<?php the_permalink(); ?>' title="<?php the_title(); ?>">
    <?php the_title(); ?>
  </a>
	<div class='image'>
  	<?php if(get_post_meta($post->ID, 'large_preview', true)) {?>
			<img src='<?php echo get_post_meta($post->ID, 'large_preview', true); ?>' alt="featured post"/>
		<?php } ?>
  </div>
	<div class='text'><?php the_content(' ') ?></div>
	</div>
	<?php endwhile; ?>
<?php endif; ?>