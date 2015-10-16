<?php
/**
 * The template for displaying Search Results pages
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>

	<div class="container">
		<div class="row">
			<div class="col-md-9 auditions-content">
				<div class="search-content">

					<?php if ( have_posts() ) : ?>
						<?php
							
								echo do_shortcode('[ajax_load_more post_type="post" search="'. get_search_query() .'"]');

						else :
							// If no content, include the "No posts found" template.
							get_template_part( 'content', 'none' );

						endif;
					?>
				</div>
			</div>
<?php get_sidebar(); ?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php

get_footer();
