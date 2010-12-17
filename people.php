<?php
/*
Template Name: People
*/
?>
<?php get_header(); ?>
    <!-- red stripe with headline -->
    <div class='red-stripe'>
      <div id='container'>
        <div class='vertical-menu-prepend'></div>
        <div class='vertical-menu'></div>
        <h2 class='headline-title'><a href="<?php bloginfo('url'); ?>">JetMinds.com</a> » <a href="<?php bloginfo('url'); ?>/page/1">Blog</a> » <?php wp_title(' ', true, ''); ?></h2>
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
        <div class='users'>
					<h4 class='section-name'>Autoři</h4>
					<?php 
					$szSort = "user_nicename";
					$authorIDs = $wpdb->get_col( $wpdb->prepare("SELECT $wpdb->users.ID FROM $wpdb->users ORDER BY %s ASC", $szSort ));
					// counter of one line
					$counter = 0;
					// boolean if the div line is closed
					$lineClosed = false;
					foreach($authorIDs as $id) {
						$author = get_userdata($id);
						if($author->name=="admin"){continue;}
						$counter ++;
						if($counter==5){$counter=1;}
						if($counter==1){echo "<div class='line'>";$lineClosed = false;}
						echo "<div class='user'>";
						echo get_avatar( $id, '150' );
						echo "<h3>";
						echo $author->first_name." ".$author->last_name;
						echo "</h3>";
						echo "<div class='about'>";						
						echo "</div>";
						echo "</div>";
						if($counter==4){echo "</div>";$lineClosed = true;}
					}
					if(!$lineClosed){echo "</div>";}
					?>
				</div> 
      </div>
    </div>
<?php get_footer(); ?>