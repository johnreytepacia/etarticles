<?php
/**
* The template for displaying Child Category pages
*
* @link http://codex.wordpress.org/Template_Hierarchy
*
* @package WordPress
* @subpackage Twenty_Fourteen
* @since Twenty Fourteen 1.0
*/

/*
* Category Thumbnail, Title and Description
*/
$cat_id = get_query_var('cat'); 
?>

<!--/ Category Pages -->
<div class="page-category">
	<div class="post-result tab-pane">	
		<?php
			$cat = get_term_by('name', single_cat_title('',false), 'category');
			echo do_shortcode('[ajax_load_more post_type="post" category="'. $cat->slug .'"]');
		?>
	</div><!--/ entry-post -->
</div><!--/ page-category -->

