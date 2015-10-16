<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>


	<div class="container">
		<div class="row">
		<div class="col-md-12">
		<div class="not-found">
			<img src="<?php bloginfo('template_directory'); ?>/images/not-found.png" class="center-block">
		</div>

			<header class="page-header">
				<h1 class="page-title text-center"><?php _e( 'Not Found', 'twentyfourteen' ); ?></h1>
			</header>

			<div class="page-content">
				<p class="text-center"><?php _e( 'It looks like nothing was found at this location.', 'twentyfourteen' ); ?></p>

			<div class="col-md-4 col-md-offset-4 clearfix">
			<a href="<?php echo site_url(); ?>" class="go-home center-block text-center">Go Home!</a>
			</div>
				<br/>
				<br/>
				<br/>

			</div><!-- .page-content -->
		</div>
		

		</div><!-- #content -->
	</div><!-- #primary -->

<?php
get_footer();
