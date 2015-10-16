<!DOCTYPE html> 
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if lte IE 8]>         <html class="no-js lt-ie9 lte-ie8"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <title><?php wp_title(''); ?></title>      
       <!--[if IE 8]><meta http-equiv="X-UA-Compatible" content="IE=edge"><![endif]-->
        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />

		<!--/ Favicons -->
		<link href="<?php bloginfo("template_url"); ?>/ico/favicon.ico" rel="icon" type="image/x-icon" />
		<link href="<?php bloginfo("template_url"); ?>/ico/apple-touch-icon-144-precomposed.png" rel="apple-touch-icon-precomposed" />
		<link href="<?php bloginfo("template_url"); ?>/ico/apple-touch-icon-72-precomposed.png" rel="apple-touch-icon-precomposed" />
		<link href="<?php bloginfo("template_url"); ?>/ico/apple-touch-icon-57-precomposed.png" rel="apple-touch-icon-precomposed" />

		<!--/ Asset -->
		<link rel="stylesheet" href="<?php bloginfo("template_url"); ?>/style.css">
		<link rel="stylesheet" href="<?php bloginfo("template_url"); ?>/css/bootstrap.min.css">        
		<link rel="stylesheet" href="<?php bloginfo("template_url"); ?>/css/font-awesome.min.css">        
		<link rel="stylesheet" href="<?php bloginfo("template_url"); ?>/css/owl.carousel.min.css">        
		<script src="<?php bloginfo("template_url"); ?>/js/vendor/modernizr.min.js"></script>

		<!--/ Theme Options -->
		<?php $GLOBALS['options'] = get_option('custom_options'); $options = $GLOBALS['options']; ?>

		<?php wp_head(); ?>

	</head>
<body>
	<header>
	<div class="visible-lg visible-lg2">
		<div class="header-top">
		    <div class="container">
			    <div class="row">
					<div class="col-md-4">
						<div class="logo">
							<a href="<?php echo site_url(); ?>" class="pull-left"><img src="<?php bloginfo('template_directory'); ?>/images/audition-logo.png"></a>
						</div>
					</div>
					<div class="col-md-8">
<!-- 					<div class="top-menu">
						<ul class="list-unstyled list-inline pull-right">
							<li><a href="#">Home</a></li>
							<li><a href="#">Join</a></li>
							<li><a href="#">Login</a></li>
							<li><a href="#">About</a></li>
							<li><a href="#">Contact Us</a></li>
						</ul>
					</div>
 -->
					</div>
				</div>
			</div>
		</div>
		
		<div class="header-nav">		
			<div class="main-nav">
				<div class="container">
					<div class="row">
						<div class="col-md-7">	
							<?php include 'nav.php'; ?>
						</div>
						<div class="col-md-5">
							<span class="pull-left header-search"><?php include 'search-form.php'; ?></span>
							<ul class="list-inline list-unstyled social-nav pull-right">
								<li><a href="#" class="fb"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#" class="tw"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#" class="gplus"><i class="fa fa-google-plus"></i></a></li>
							
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="hidden-lg hidden-lg2 mobilenav clearfix">
		<?php include 'mobile-nav.php'; ?></span>
	</div>


</header>
