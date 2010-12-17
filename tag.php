<?php get_header(); ?>
    <!-- red stripe with headline -->
    <div class='red-stripe'>
      <div id='container'>
        <div class='vertical-menu-prepend'></div>
        <div class='vertical-menu'></div>
        <h2 class='headline-title'><a href="<?php bloginfo('url'); ?>">JetMinds.com</a> » <a href="<?php bloginfo('url'); ?>/page/1">Blog</a> » Tag » <?php wp_title(' ', true, ''); ?></h2>
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
        <div class='archive-articles'>
					<?php include (TEMPLATEPATH.'/articles.php'); ?>        
				</div>
				<?php get_sidebar(); ?>
        <?php include (TEMPLATEPATH.'/next_prev.php'); ?>
      </div>
    </div>
<?php get_footer(); ?>