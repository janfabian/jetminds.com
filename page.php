<?php get_header(); ?>
    <!-- red stripe with headline -->
		<?php if(have_posts()) : while(have_posts()) : the_post();
			$originID = $post->ID; ?>
    <div class='red-stripe'>
      <div id='container'>
        <div class='vertical-menu-prepend'></div>
        <div class='vertical-menu'></div>
        <h2 class='headline-title'><a href="<?php bloginfo('url'); ?>">JetMinds.com</a> » <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
      </div>
    </div>
    <!-- gray stripe with information about page -->
    <div class='info-gray-stripe'>
      <div id='container'>
        <div class='info'></div>
      </div>
    </div>
    <!-- white content part with projects and articles -->
    <div class='content'>
      <div id='container'>
        <div class='current-article'>
					<?php the_content(); ?>
					
        </div>
        <div class='right-menubar'>
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