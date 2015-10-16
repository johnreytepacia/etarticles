
		<?php 
			// Theme Options
			$GLOBALS['options'] = get_option('custom_options'); $options = $GLOBALS['options']; 
		?>
	

		<footer>
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<?php wp_nav_menu(array('theme_location' => 'secondary', 'menu_class' => 'nav-footer list-inline')); ?>
				</div>
				<div class="col-md-4">
					<p class="text-center" style="color: #fff;">&copy; 2015 Auditions.com. All rights reserved.</p>
				</div>
				<div class="col-md-2">
					<ul class="social-footer list-inline">
						<li><a href="#" class="fb"><i class="fa fa-facebook"></i></a></li>
						<li><a href="#" class="tw"><i class="fa fa-twitter"></i></a></li>
						<li><a href="#" class="gplus"><i class="fa fa-google-plus"></i></a></li>
					</ul>
				</div>
			</div>
		</div>

			<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	        <script>window.jQuery || document.write('<script src="<?php bloginfo("template_url"); ?>/js/vendor/jquery-1.10.2.min.js"><\/script>')</script>
	        <script src="<?php bloginfo("template_url"); ?>/js/vendor/owl.carousel.min.js"></script> 
	        <script src="<?php bloginfo("template_url"); ?>/js/vendor/bootstrap.min.js"></script> 
	        <script src="<?php bloginfo("template_url"); ?>/js/vendor/more-less.min.js"></script> 
			<script src="<?php bloginfo("template_url"); ?>/js/plugins.min.js"></script> 
		</footer><!-- #colophon -->


	<?php wp_footer(); ?>
</body>
</html>