<?php 
  // Theme Options
  $GLOBALS['options'] = get_option('custom_options'); $options = $GLOBALS['options']; 
?>
  <nav class="navbar" role="navigation">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
      </div>
      
      <div class="row"> 
        <div class="col-md-12">
          <div class="collapse navbar-collapse">
            <?php wp_nav_menu(array('theme_location' => 'primary', 'menu_class' => 'nav navbar-nav navbar-primary')); ?>
          </div>
        </div>
  </nav>

<!--/ Eleventh Navigation  -->
