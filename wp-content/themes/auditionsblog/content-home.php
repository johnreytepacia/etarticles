<?php
/**
 * The template used for displaying page content
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
?>

<article class="content">
<div class="latest-post">
	<h3>Latest Posts</h3>


		<!-- Load latest posts -->
		<?php
		$cat = get_term_by('name', single_cat_title('',false), 'category');
		echo do_shortcode('[ajax_load_more post_type="post" category="'. $cat->slug .'"]');
		?>
</div>
</article>