<?php get_header(); ?>
    <!-- red stripe with headline -->
		<?php if(have_posts()) : while(have_posts()) : the_post();
			$originID = $post->ID; ?>
    <div class='red-stripe'>
      <div id='container'>
        <div class='vertical-menu-prepend'></div>
        <div class='vertical-menu'></div>
        <h2 class='headline-title'><a href="<?php bloginfo('url'); ?>">JetMinds.com</a> » <a href="<?php bloginfo('url'); ?>/page/1">Blog</a> » <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
      </div>
    </div>
    <!-- gray stripe with information about page -->
    <div class='info-gray-stripe'>
      <div id='container'>
        <div class='info'><?php the_time('d.m.Y') ?> | 
 					<?php $skip=true ?>
					<?php $category = get_the_category(); if  ($category) { foreach($category as $tag) {if($tag->name=="Projects"){$skip=false;}}}?>
					<?php if($skip) : ?>
					<?php the_author_posts_link(); ?>
					<?php else: ?>
					<?php echo "JetMinds team" ?>
					<?php endif; ?>
				</div>
      </div>
    </div>
    <!-- white content part with projects and articles -->
    <div class='content'>
      <div id='container'>
        <div class='current-article'>
					<?php the_content(); 
					
					// if the post is in category projects, we will show authors from custom field
					$projects = false;
					$category = get_the_category();
					if ($category) {
					  foreach($category as $tag) {
					    if($tag->name=="Projects"){$projects=true;}
					  }
					}
					
					?>
					<?php if(!$projects) : ?>	
          <div class='about-the-author'>
            <h4 class='section-name'>více o autorovi</h4>
            <div class='icon'>
							<?php echo get_avatar( get_the_author_id(), '100' );?>
						</div>
            <div class='text'>
              <h4><?php the_author(); ?></h4>
              <?php the_author_description(); ?>
							<ul class="more-from-author">
								<li><a href="<?php echo get_author_posts_url(get_the_author_id()); ?>" rel="bookmark" title="Articles by <?php echo get_the_author(); ?>">Více článků od <?php echo get_the_author(); ?></a></li>
							</ul>
            </div>
          </div>
					<?php else: ?>
					<!--
						TODO show authors from custom fields
					-->
					<?php endif; ?>
					
					
					
					<?php
						$tags = wp_get_post_tags($post->ID);
						if ($tags) {
							$tag_ids = array();
							foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;

							$args=array(
								'tag__in' => $tag_ids,
								'post__not_in' => array($post->ID),
								'showposts'=>5, // Number of related posts that will be shown.
								'caller_get_posts'=>1
							);
							$my_query = new wp_query($args);
							if( $my_query->have_posts() ) {
								echo "<h4 class='section-name'>Mohlo by Vás zajímat</h4><ul>";
								while ($my_query->have_posts()) {
									$my_query->the_post();
								?>
									<li><a href="<?php the_permalink() ?>" class="article-title" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></li>
								<?php
								}
								echo '</ul>';
							}
						}
					?>
        </div>
        <div class='right-menubar'>
          <div class='table-border'>
            <div class='white-table'>
              <div class='category'>
                <h3>Kategorie</h3>
                <ul>
									<?php
									$category = get_the_category($originID);
									if ($category) {
									  foreach($category as $tag) {
									    echo "<li>
		                    <a class='article-title' href='".get_home_url()."/categories/".$tag->slug."' >" . $tag->name . "</a></li>"; 
									  }
									}
									?>
                </ul>
              </div>
              <div class='tags'>
                <h3>Tagy</h3>
                <ul>
									<?php
									$category = wp_get_post_tags($originID);
									if ($category) {
									  foreach($category as $tag) {
									    echo "<li>
		                    <a class='article-title' href='".get_home_url()."/tags/".$tag->slug."'>" . $tag->name . "</a></li>"; 
									  }
									}
									?>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
		<?php endwhile; ?>
		<?php else: ?>
			<div class='red-stripe'>
	      <div id='container'>
	        <div class='vertical-menu-prepend'></div>
	        <div class='vertical-menu'></div>
	        <h2 class='headline-title'>No article Found</h2>
	      </div>
	    </div>
	    <!-- gray stripe with information about page -->
	    <div class='info-gray-stripe'>
	      <div id='container'>
	        <div class='info'></div>
	      </div>
	    </div>
		<?php include (TEMPLATEPATH.'/article_not_found.php'); ?>
		<?php endif; ?>
		
		<?php get_footer(); ?>