    <?
		get_header();
		
		// function to get current address
		function curPageURL() {
		 $pageURL = 'http';
		 if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
		 $pageURL .= "://";
		 if ($_SERVER["SERVER_PORT"] != "80") {
		  $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
		 } else {
		  $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
		 }
		 if ($pageURL[strlen($pageURL)-1]=="/") {$pageURL=substr($pageURL,0,strlen($pageURL)-1);}
		 return $pageURL;
		}
		
		/*	
		*IMPORTANT CONDITION
		*if a visitor is on home page, or listing through archive blog pages
		*
		*
		*/
		$homepage = get_home_url();
		if ($homepage==curPageURL()) : 
		?>
    <!-- red stripe with quotation about JetMinds -->
    <div class='red-stripe'>
      <div id='container'>
        <div class='vertical-menu-prepend'></div>
        <div class='vertical-menu'></div>
					<?php if (function_exists('stray_random_quote')) stray_random_quote(); ?>
      </div>
    </div>
    <!-- gray stripe with featured article and photos from JetMinds life -->
    <div class='gray-stripe'>
      <div id='container'>
        <?php include (TEMPLATEPATH.'/featuredpost.php');?>
				<?php
				
				$args = array(
					'posts_per_page' => 1,
					'post__in'  => $sticky,
					'ignore_sticky_posts' => 1
				);
				
				?>
				<?php if(have_posts()) : ?>
        <div class='photos-of-jetminds'>
          <div class='photo-frame'>
            <div class='photo'>
							<?php if (function_exists (rigwfz_show)) rigwfz_show(); ?>
            </div>
						<div class="photo-name">We are fuckin' rolling!!</div>
          </div>
          <!-- <div class='switchers'>
            <a href='#'>
              <div class='switch' pos=2></div>
            </a>
            <a href='#'>
              <div class='switch' pos=1></div>
            </a>
            <a href='#'>
              <div class='switch active' pos=0></div>
            </a>
          </div> -->
        </div>
      </div>
    </div>
    <!-- white content part with projects and articles -->
    <div class='content'>
      <div id='container'>
        <?php include (TEMPLATEPATH.'/projects.php');?>


        <div class='articles'>
          <h4 class='section-name'>poslední články</h4>
					<?php 
					 $query = null;
					 $query = new WP_Query();
					 $showposts = 4;
					 // showposts variable must be added 1 (featured article), and 3 (projects currenty working on)
					 $showposts = $showposts + 1; 
					 $args = array(
					 	'cat' => -$projects_cat,
						'showposts' => $showposts
					 );
					 $query->query($args);
					 while($query->have_posts()) : $query->the_post(); ?>
						<? if($post->ID != $featured_ID) { ?>
							<div class='article'>
		            <div class='title'>
		              <h3><a href='<?php the_permalink(); ?>' title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
		            </div>
		            <div class='info'>
		              <?php the_time('d.m.Y'); ?> | <?php the_category(', '); ?>
									<span class="author"><?php the_author_posts_link(); ?> <?php echo get_avatar( get_the_author_id(), '15' );?></span>
		            </div>
		            <div class='text'>
		              <?php the_content('') ?>
		            </div>
		            <div class='tags'>
									<?php 
										the_tags('');
									?>
		            </div>
		          </div>
						<? } ?>	
					<?php endwhile; ?>
					
        </div>

        <div class='numbers'>
          <h4 class='section-name'>jetminds v číslech</h4>
          <hr />
          <div class='employees'>
            <span class='number'>0</span><span class='number'>3</span><br />
            <span class='number-info'>pobočky</span>
          </div>
          <div class='customers'>
            <span class='number'>5</span><span class='number'>5</span><br />
            <span class='number-info'>zaměstnanců</span>
          </div>
        </div>
      </div>
    </div>
		<?php else: ?>		
			</div>
			</div>
			<?php include (TEMPLATEPATH.'/article_not_found.php'); ?>
		<?php endif; ?>
		
		
		
		
		<?php
		/*	
		*IMPORTANT CONDITION
		*if a visitor looks in another page of blog
		*
		*
		*/
		 else: ?>
			
			
			
			
			<div class='red-stripe'>
	      <div id='container'>
	        <div class='vertical-menu-prepend'></div>
	        <div class='vertical-menu'></div>
	        <h2 class='headline-title'><a href="<?php bloginfo('url'); ?>">JetMinds.com</a> » <a href="<?php bloginfo('url'); ?>/page/1">Blog</a></h2>
	      </div>
	    </div>
	    <!-- gray stripe with information about page -->
	    <div class='info-gray-stripe'>
	      <div id='container'>
	        <div class='info'></div>
	      </div>
	    </div>
	    <!-- white content part with projects and articles -->
			<?php 
			if(have_posts()) : ?>
	    <div class='content'>
	      <div id='container'>
	        <div class='archive-articles'>
						  <?php include (TEMPLATEPATH.'/articles_without_projects_people.php'); ?>    
					</div>
					<?php get_sidebar(); ?>
					<?php include (TEMPLATEPATH.'/next_prev.php'); ?> 
	      </div>
	    </div>
			<?php else: ?>
				<?php include (TEMPLATEPATH.'/article_not_found.php'); ?>
			<?php endif; ?>
		<?php endif; ?>
    <?php get_footer(); ?>