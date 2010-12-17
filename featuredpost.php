<div class='featured-article'>
	<?php
		$featured = new WP_Query();
		$featured->query('showposts=1&category_name=featured');
		while($featured->have_posts()) : $featured->the_post();
		$wp_query->in_the_loop = true;
		$featured_ID = $post->ID;
	?>
  <h3><a class='headline' href='<?php the_permalink(); ?>' title="<?php the_title(); ?>">
    <?php the_title(); ?>
  </a></h3>
  <div class='alt'>
    <?php the_time('d.m.Y'); ?> | <?php the_category(', '); ?>
		<span class="author">
    	<?php the_author_posts_link(); ?>
			<?php echo get_avatar( get_the_author_id(), '15' );?>
		</span>
  </div>
	<?php if(get_post_meta($post->ID, 'large_preview', true)) {?>
		<img src='<?php echo get_post_meta($post->ID, 'large_preview', true); ?>' alt="featured post"/>
	<?php } ?>
  <div class='text'><?php the_content('Čtěte více') ?></div>
	<?php endwhile; ?>
</div>