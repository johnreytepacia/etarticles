<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme and one
 * of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query,
 * e.g., it puts together the home page when no home.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>





<div id="main-content" class="container">
<div class="trending">
	 <span class="pull-left" style="padding-right:13px;">Trending: </span><?php wp_nav_menu(array('theme_location' => 'fourth', 'menu_class' => 'trend-list list-inline')); ?>
</div>
<div class="row">
	<div class="col-md-12">
	<div class="featured-lg-post featured-posts-box">
		<?php 
				$sticky = get_option('sticky_posts');
				

				if (!empty($sticky)){

					$args = array (
						'post__in'	=> $sticky,
						'showposts'	=> 1,
						'caller_get_posts'	=> 1,
						'cat'		=> 13,
						);
					$ctr = 0;
					$query = new WP_Query( $args );
						while ($query->have_posts()) : $query->the_post();
						
						echo '<div class="sticky-post">';				
							echo '<a href="' . esc_url( get_permalink() ) . '">';
								the_post_thumbnail( 'full-grid-2' );
							echo '</a>';
							echo '<div class="caption">';
								echo '<p>
						  <a href="'. esc_url( get_permalink() ) .'" class="title">'.
							short_title("...", 8)
						  .'</a></p>';
						  
						  echo '<div class="desc clearfix">';
						  if (wp_is_mobile()) {
						  		echo '<a href="'. esc_url( get_permalink() ) .'">';
								custom_excerpt('medium_excerpt_length','ellipsis');
						  		echo '</a>';
						  	} else {
						  		echo '<a href="'. esc_url( get_permalink() ) .'">';
								custom_excerpt('large_excerpt_length','ellipsis');
						  		echo '</a>';
						  	}

								
							echo '</div>';
					
							echo '</div>';
						echo '</div>';
						$ctr++;
						endwhile;
						wp_reset_query();
				}
			?>	
	</div>  <!-- /featured-posts -->
	<div class="featured-lg-post2 clearfix">
	<div class="featured-posts featured-posts-box">
		
		<div class="sticky">
			<?php 
				$sticky = get_option('sticky_posts');
				

				if (!empty($sticky)){

					$args = array (
						'post__in'	=> $sticky,
						'showposts'	=> 1,
						'caller_get_posts'	=> 1,
						'cat'		=> 14,
						);
					$ctr = 0;
					$query = new WP_Query( $args );
						while ($query->have_posts()) : $query->the_post();
						
							echo '<div class="sticky-post">';				
								echo '<a href="' . esc_url( get_permalink() ) . '">';
									the_post_thumbnail( 'full-grid-2' );
								echo '</a>';
					
								echo '<div class="caption">';
										echo '<p>
							  <a href="'. esc_url( get_permalink() ) .'">'.
								short_title("...", 15)
							  .'</a></p>';
							    echo '<div class="desc2 clearfix">';
							  		echo '<a href="'. esc_url( get_permalink() ) .'">';
									custom_excerpt('medium_excerpt_length','ellipsis');
							  		echo '</a>';

									
								echo '</div>';
								echo '</div>';
						
							echo '</div>';
			
						$ctr++;
						endwhile;
						wp_reset_query();
				}
			?>	
		</div>
	</div>
	<div class="featured-posts featured-posts-box">
		<div class="sticky">
			<?php 
				$sticky = get_option('sticky_posts');
				

				if (!empty($sticky)){

					$args = array (
						'post__in'	=> $sticky,
						'showposts'	=> 1,
						'caller_get_posts'	=> 1,
						'cat'		=> 15,
						);
					$ctr = 0;
					$query = new WP_Query( $args );
						while ($query->have_posts()) : $query->the_post();
						
						echo '<div class="sticky-post">';				
							echo '<a href="' . esc_url( get_permalink() ) . '">';
								the_post_thumbnail( 'full-grid-2' );
							echo '</a>';
							echo '<div class="caption">';
									echo '<p>
						  <a href="'. esc_url( get_permalink() ) .'">'.
							short_title("...", 15)
						  .'</a></p>';
						    echo '<div class="desc2 clearfix">';
						  		echo '<a href="'. esc_url( get_permalink() ) .'">';
								custom_excerpt('medium_excerpt_length','ellipsis');
						  		echo '</a>';

								
							echo '</div>';
							echo '</div>';
						echo '</div>';
						$ctr++;
						endwhile;
						wp_reset_query();
				}
			?>	
		</div>


	</div> <!-- /featured-posts -->
	</div> <!-- /featured-lg-posts2 -->
	</div> <!-- /col-md-12 -->
	</div> 	<!-- /#latestPost -->

<div class="category-container">
	<div class="row">
	
		<div class="col-md-4 category">
			<?php 
				$sticky = get_option('sticky_posts');
				

				if (!empty($sticky)){

					$args = array (
						'post__in'	=> $sticky,
						'showposts'	=> 1,
						'caller_get_posts'	=> 1,
						'cat'		=> 4,
						);
					
						$query = new WP_Query( $args );
						while ($query->have_posts()) : $query->the_post();
						
						echo '<div class="sticky-post">';
						echo '<div class="cat-title">';
						echo '<p><a href="' . get_category_link(4) . '">Castings</a></p>';
				
						echo '</div>';
						echo '<a href="' . esc_url( get_permalink() ) . '" class="visible-lg">';
							the_post_thumbnail( 'medium-width' );
						echo '</a>';

						echo '<a href="' . esc_url( get_permalink() ) . '" class="hidden-lg">';
							the_post_thumbnail( 'full-width' );
						echo '</a>';
						echo '<div class="description">';
						echo '<div class="title">';
						echo '<a href="'. esc_url( get_permalink() ) .'">'.
							short_title("...", 8)
						  .'</a>';
						echo '</div>';
						echo '<small class="author"><i>';
							the_author();
						echo '</i></small>';
						echo '<small class="date"><i>';
							the_time('F j, Y');
						echo '</i></small>';
						custom_excerpt('semi_medium_excerpt_length','ellipsis'); 
						echo '<a href="'. esc_url( get_permalink() ) .'" class="readmore text-center">Read More ›</a>';
						echo '</div>';
						echo '</div>';
						endwhile;
						wp_reset_query();
				}
			?>					
		</div>

		<div class="col-md-4 category">
			<?php 
				$sticky = get_option('sticky_posts');

				if (!empty($sticky)){

					$args = array (
						'post__in'	=> $sticky,
						'showposts'	=> 1,
						'caller_get_posts'	=> 1,
						'cat'		=> 3,
						);
					$query = new WP_Query( $args );
						while ($query->have_posts()) : $query->the_post();
						
						echo '<div class="sticky-post">';
						echo '<div class="cat-title">';
						echo '<p><a href="' . get_category_link(3) . '">Advice</a></p>';
				
						echo '</div>';
						echo '<a href="' . esc_url( get_permalink() ) . '" class="visible-lg">';
							the_post_thumbnail( 'medium-width' );
						echo '</a>';

						echo '<a href="' . esc_url( get_permalink() ) . '" class="hidden-lg">';
							the_post_thumbnail( 'full-width' );
						echo '</a>';
						echo '<div class="description">';
						echo '<div class="title">';
						echo '<a href="'. esc_url( get_permalink() ) .'">'.
							short_title("...", 8)
						  .'</a>';
						echo '</div>';
						echo '<small class="author"><i>';
							the_author();
						echo '</i></small>';
						echo '<small class="date"><i>';
							the_time('F j, Y');
						echo '</i></small>';
						custom_excerpt('semi_medium_excerpt_length','ellipsis'); 
						echo '<a href="'. esc_url( get_permalink() ) .'" class="readmore text-center">Read More ›</a>';
						echo '</div>';
						echo '</div>';
						endwhile;
						wp_reset_query();
				}
			?>					
		</div>
		<div class="col-md-4 category">
			<?php 
				$sticky = get_option('sticky_posts');

				if (!empty($sticky)){

					$args = array (
						'post__in'	=> $sticky,
						'showposts'	=> 1,
						'caller_get_posts'	=> 1,
						'cat'		=> 2,
						);
						$query = new WP_Query( $args );
						while ($query->have_posts()) : $query->the_post();
						
						echo '<div class="sticky-post">';
						echo '<div class="cat-title">';
						echo '<p><a href="' . get_category_link(2) . '">News</a></p>';
				
						echo '</div>';
						echo '<a href="' . esc_url( get_permalink() ) . '" class="visible-lg">';
							the_post_thumbnail( 'medium-width' );
						echo '</a>';

						echo '<a href="' . esc_url( get_permalink() ) . '" class="hidden-lg">';
							the_post_thumbnail( 'full-width' );
						echo '</a>';
						echo '<div class="description">';
						echo '<div class="title">';
						echo '<a href="'. esc_url( get_permalink() ) .'">'.
							short_title("...", 8)
						  .'</a>';
						echo '</div>';
						echo '<small class="author"><i>';
							the_author();
						echo '</i></small>';
						echo '<small class="date"><i>';
							the_time('F j, Y');
						echo '</i></small>';
						custom_excerpt('semi_medium_excerpt_length','ellipsis'); 
						echo '<a href="'. esc_url( get_permalink() ) .'" class="readmore text-center">Read More ›</a>';
						echo '</div>';
						echo '</div>';
						endwhile;
						wp_reset_query();
				}
			?>					
		</div>
	</div>
</div>
	<div class="row">
		<div id="primary" class="col-md-9 auditions-content">
		
					<?php
						if ( have_posts() ) :
							get_template_part( 'content', 'home' );
						else :
							get_template_part( 'content', 'none' );
						endif;
					?>
		</div><!-- #primary -->
		<?php get_sidebar(); ?>
	</div>

</div><!-- #main-content -->

<?php
get_footer();
?>