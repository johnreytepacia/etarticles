<?php
/**
 * The Template for displaying all single posts
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>

	<div class="container">
	<div class="row">
		<div class="col-md-12">
		<!--/ Bread Crumbs -->
		<?php if ( function_exists('yoast_breadcrumb')) {
		 yoast_breadcrumb('<div class="breadcrumb" id="breadcrumbs">','</div>');
		} ?>
		
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
		<div class="slider-container">
			<?php
			 	$cat_id = 10; //the certain category ID
				$latest_cat_post = new WP_Query( array('posts_per_page' => 10, 'cat' => $cat_id));
				if( $latest_cat_post->have_posts() ) : 
					echo '<div class="carousel-container">';
						echo '<div class="owl-carousel">';
						while( $latest_cat_post->have_posts() ) : 
							$latest_cat_post->the_post(); ?>
							<div class="list clearfix">
							<?php
								echo '<a href="'. esc_url( get_permalink() ) .'">';
						        	the_post_thumbnail( 'xfull-width' );
						       	echo '</a>';
							?>
							<div class="content">
							<?php
							echo '<a href="' . esc_url( get_permalink() ) . '" title="' . get_the_title() . '" rel="bookmark">';
								// the_title();
								$thetitle = $post->post_title; /* or you can use get_the_title() */
								$getlength = strlen($thetitle);
								$thelength = 80;
								echo substr($thetitle, 0, $thelength);
								if ($getlength > $thelength) echo "...";				
							echo '</a>'; 

							?>
							</div> 
							</div>
						<?php endwhile; 
						echo '</div>';
					echo '</div>';
				endif;	
				?>
			</div>

		</div>	
	</div>
		<div class="row">
			<div class="col-md-9 auditions-content">
				<?php
					if ( have_posts() ) :
					while ( have_posts() ) : the_post();
				?>
					<div class="page-single">

					<?php

							if ( has_post_thumbnail() ) :
								the_post_thumbnail( 'full-width' ); // Post Thumbnail Image Size 820 x 300
							else:
								echo '<img src="' . bloginfo("template_url") . '/images/default-thumb.jpg" alt="default" />';	
							endif;
							the_title( '<h1 class="entry-title">', '</h1>' ); // Post Title

					?>
					<div class="clearfix cat-crumbs">
							<small class="date">
								<i>
									<?php the_time('F j, Y'); ?>
									<!--/ Date of the Post -->
								</i>
							</small>
						</div> <!--/ clearfix -->


						
						<?php 

						the_content();  // Show Post Content
						?>
						 <?php
		    				endwhile;
							else :
								get_template_part( 'content', 'none' );
							endif;
						?>
			</div><!-- #content -->
			</div>
			<?php get_sidebar(); ?>
		</div>
	</div><!-- #container -->

<?php

get_footer();
