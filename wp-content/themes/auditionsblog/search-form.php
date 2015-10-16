<?php
/**
 * The custom template for Search Form
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
?>
<form role="search" method="get" id="searchform" class="searchform" action="<?php echo site_url(); ?>">
	<div class="input-group">
		<input type="text" placeholder="Search" value="<?php echo get_search_query(); ?>" name="s" id="s" class="form-control">
		<span class="input-group-btn">
			<button class="btn btn-default" type="submit">
	        	<span class="fa fa-search"></span>
	        </button>
		</span>
	</div>
</form>
