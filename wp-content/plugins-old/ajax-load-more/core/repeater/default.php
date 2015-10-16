<div class="list">
<div class="row">
<?php 
	/*
	* Default Template For Post
	*/
	echo '<div class="col-md-5">';
	echo '<a href="'. esc_url( get_permalink() ) .'" class="visible-lg visible-lg2">';
		the_post_thumbnail( 'square-thumbnail' );
	echo '</a>';
	echo '<a href="'. esc_url( get_permalink() ) .'" class="hidden-lg hidden-lg2">';
		the_post_thumbnail( 'full-width' );
	echo '</a>';
	echo '</div>';
	
	echo '<div class="col-md-7 alm-content">';
	echo '<div class="content">';
		echo '<h2 class="entry-title">
		<a href="'. esc_url( get_permalink() ) .'">'.
		short_title("...", 15)
		.'</a></h2>'; ?>
		
		<?php
			echo '<small class="author"><i>';
							the_author();
						echo '</i></small>';
		?>
		<!--/ The Date -->
		<small class="date" style="margin-left:-4px;">
        <i>
		<?php the_time('F j, Y') ?>
        </i>
		</small>

		<?php
		custom_excerpt('large_excerpt_length','ellipsis');
	echo '<a href="'. esc_url( get_permalink() ) .'" class="pull-right readmore">Read More ›</a>';
	echo '</div>'; // content 
	echo '</div>';
?>
</div>
</div>