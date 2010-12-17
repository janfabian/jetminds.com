<?php if(have_posts()) : ?>
	<?php while(have_posts()) : the_post();
		// some categories (projects, people) we want to show
			$continue = false;
			$category = get_the_category(); if  ($category) { foreach($category as $tag) { if(($tag->name == "Projects")||($tag->name == "People")){$continue = true;} }}
			if($continue){continue;}
			$mo = mysql2date('M', $post->post_date);
			$ye = mysql2date('Y', $post->post_date);
			if($last_mo !== $mo ) {
				echo "<h4 class='section-name'>".$mo." ".$ye."</h4>";
				$last_mo = $mo;
			}
		?>
		<div class="article<?php $category = get_the_category(); if  ($category) { foreach($category as $tag) { echo " ".$tag->name;}}?>">
    <div class='title'>
      <h3><a href='<?php the_permalink(); ?>' title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
    </div>
    <div class='info'>
      <?php the_time('d.m.Y'); ?> | <?php the_category(', '); ?>
			<span class="author"><?php the_author_posts_link(); ?> <?php echo get_avatar( get_the_author_id(), '15' );?></span>
    </div>
    <div class='text'>
      <?php the_content('Čtěte více') ?>
    </div>
    <div class='tags'>
			<?php 
				the_tags('');
			?>
    </div>
  </div>
<?php endwhile; ?>
<?php endif; ?>