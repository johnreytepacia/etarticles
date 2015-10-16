<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other 'pages' on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>

<div class="container">
<div class="row">

	<div class="col-md-9 auditions-content">
		<div id="content" class="site-content" role="main">

			<?php
				// Start the Loop.
				while ( have_posts() ) : the_post();

					// Include the page content template.
					get_template_part( 'content', 'page' );

				
				endwhile;
			?>

		</div><!-- #content -->
	</div><!-- #primary -->

	<?php get_sidebar(); ?>
</div>
</div><!-- #main-content -->

<?php
get_footer();
