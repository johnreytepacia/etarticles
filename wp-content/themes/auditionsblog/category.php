<?php
/**
* The template for displaying Category pages
*
* @link http://codex.wordpress.org/Template_Hierarchy
*
* @package WordPress
* @subpackage Twenty_Fourteen
* @since Twenty Fourteen 1.0
*/
	get_header();
?>	
<div class="container">

	<div class="row">
<div class="category-content clearfix">
		<div class="col-md-9 auditions-content">
			<div class="audition-articles">

			<?php
			$cat_id = get_query_var('cat'); 
				?>
				
					<h1 class="category-title">
						<?php single_cat_title() ?>
					</h1>
	
				
			</div> <!--/ audition-articles -->

			<?php
					if ( have_posts() ) :
						$this_category = get_category($cat);
						$category_id   = get_query_var('cat');

							
						if ( $this_category->category_parent == 0) :
							// if Parent Category && NOT Trending Category
							get_template_part("category","parent");
						else: 
							// if Child Category
							get_template_part("category","child");
						endif; 
					else :
						get_template_part( 'content', 'none' );
					endif;
				?>
		</div> <!--/ col md 9 -->

		<?php get_sidebar(); ?>
	</div>	<!--/ row -->
</div>
</div> <!--/ container -->

<?php get_footer(); ?> 
