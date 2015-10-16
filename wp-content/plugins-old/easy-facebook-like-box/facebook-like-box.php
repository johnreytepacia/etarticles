<?php



/*



Plugin Name: Easy Facebook Like Box



Plugin URI: http://activebizsolutions.com/



Description: Easy facebook like box display facebook like box. it enable Facebook Page owners to attract and gain Likes from their own website.



Version: 2.1



Author: shehryar	



Author URI: https://www.facebook.com/shehriyar.shehri	



License: GPL2



*/







class wp_my_plugin extends WP_Widget {







	// constructor



	function wp_my_plugin() {



	parent::WP_Widget(false, $name = __('Easy Facebook Like Box', 'wp_widget_plugin') );



		/* ... */



	}







	// widget form creation



function form($instance) {







// Check values



if( $instance) {



     $title = esc_attr($instance['title']);



     $text = esc_attr($instance['text']);



     $width = esc_attr($instance['width']);



     $height = esc_attr($instance['height']);



     $face = esc_attr($instance['face']);



	 $showheader = esc_attr($instance['showheader']);



	 $showpost = esc_attr($instance['showpost']);



	 $showborder = esc_attr($instance['showborder']);



	 $colorscheme = esc_attr($instance['colorscheme']);







} else {



     $title = '';



     $text = '';



     $width = '';



     $height = '';



     $face = '';



	 $showheader = '';



	 $showpost = '';



	 $showborder = '';



	 $colorscheme = '';
	 



}



?>







<p>



<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Widget Title', 'wp_widget_plugin'); ?></label>



<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />



</p>







<p>



<label for="<?php echo $this->get_field_id('text'); ?>"><?php _e('Facebook page url:', 'wp_widget_plugin'); ?></label>



<input class="widefat" id="<?php echo $this->get_field_id('text'); ?>" name="<?php echo $this->get_field_name('text'); ?>" type="text" value="<?php echo $text; ?>" placeholder="Ex: http://www.facebook.com/activebizsolution" />



</p>







<p>



<label for="<?php echo $this->get_field_id('width'); ?>"><?php _e('Width:', 'wp_widget_plugin'); ?></label>



<input class="widefat" id="<?php echo $this->get_field_id('width'); ?>" name="<?php echo $this->get_field_name('width'); ?>" type="text" value="<?php echo $width; ?>" placeholder="Ex: 300" />



</p>







<p>



<label for="<?php echo $this->get_field_id('height'); ?>"><?php _e('height:', 'wp_widget_plugin'); ?></label>



<input class="widefat" id="<?php echo $this->get_field_id('height'); ?>" name="<?php echo $this->get_field_name('height'); ?>" type="text" value="<?php echo $height; ?>" placeholder="Ex: 400" />



</p>







<p>



<label for="<?php echo $this->get_field_id('colorscheme'); ?>"><?php _e('Color Scheme', 'wp_widget_plugin'); ?></label>



<select name="<?php echo $this->get_field_name('colorscheme'); ?>" id="<?php echo $this->get_field_id('colorscheme'); ?>" class="widefat">



<?php



$options = array('light', 'dark');



foreach ($options as $option) {



echo '<option value="' . $option . '" id="' . $option . '"', $colorscheme == $option ? ' selected="selected"' : '', '>', $option, '</option>';



}



?>



</select>



</p>







<p>



<input id="<?php echo $this->get_field_id('face'); ?>" name="<?php echo $this->get_field_name('face'); ?>" type="checkbox" value="1" <?php checked( '1', $face ); ?> />



<label for="<?php echo $this->get_field_id('face'); ?>"><?php _e('Show Faces', 'wp_widget_plugin'); ?></label>







<input id="<?php echo $this->get_field_id('showheader'); ?>" name="<?php echo $this->get_field_name('showheader'); ?>" type="checkbox" value="1" <?php checked( '1', $showheader ); ?> />



<label for="<?php echo $this->get_field_id('showheader'); ?>"><?php _e('Show Header', 'wp_widget_plugin'); ?></label>



</p>



<p>



<input id="<?php echo $this->get_field_id('showpost'); ?>" name="<?php echo $this->get_field_name('showpost'); ?>" type="checkbox" value="1" <?php checked( '1', $showpost ); ?> />



<label for="<?php echo $this->get_field_id('showpost'); ?>"><?php _e('Show Post', 'wp_widget_plugin'); ?></label>







<input id="<?php echo $this->get_field_id('showborder'); ?>" name="<?php echo $this->get_field_name('showborder'); ?>" type="checkbox" value="1" <?php checked( '1', $showborder ); ?> />



<label for="<?php echo $this->get_field_id('showborder'); ?>"><?php _e('Show Border', 'wp_widget_plugin'); ?></label>



</p>
<p>



<label for="<?php echo $this->get_field_id('shortcode'); ?>"><?php _e('Shortcode:', 'wp_widget_plugin'); ?></label>
<?php
if ($face == 1){ $faces = 'true'; } else { $faces = 'false'; }
if ($showheader == 1){ $showheaders = 'true'; } else { $showheaders = 'false'; }
if ($showpost == 1){ $showposts = 'true'; } else { $showposts = 'false'; }
if ($showborder == 1){ $showborders = 'true'; } else { $showborders = 'false'; }
?>

<textarea  rows="4" cols="50" class="widefat" id="<?php echo $this->get_field_id('shortcode'); ?>" name="<?php echo $this->get_field_name('shortcode'); ?>" readonly>
<?php echo '[easy-fb-like-box url="'.$text.'" width="'.$width.'" height="'.$height.'" theme="'.$colorscheme.'" faces="'.$faces.'" header="'.$showheaders.'" posts="'.$showposts.'" border="'.$showborders.'"]'; ?>
</textarea>


</p>










<?php



}







	// update widget



function update($new_instance, $old_instance) {



      $instance = $old_instance;



      // Fields



      $instance['title'] = strip_tags($new_instance['title']);



      $instance['text'] = strip_tags($new_instance['text']);



      $instance['width'] = strip_tags($new_instance['width']);



      $instance['height'] = strip_tags($new_instance['height']);



	  $instance['face'] = strip_tags($new_instance['face']);



	  $instance['showheader'] = strip_tags($new_instance['showheader']);



	  $instance['showpost'] = strip_tags($new_instance['showpost']);



	  $instance['showborder'] = strip_tags($new_instance['showborder']);



	  $instance['colorscheme'] = strip_tags($new_instance['colorscheme']);
	  



     return $instance;



}







	// display widget



function widget($args, $instance) {



   extract( $args );



   // these are the widget options



   $title = apply_filters('widget_title', $instance['title']);



   $text = $instance['text'];



   $width = $instance['width'];



   $height = $instance['height'];



   $face = $instance['face'];



   $showheader = $instance['showheader'];



   $showpost = $instance['showpost'];



   $showborder = $instance['showborder'];



   $colorscheme = $instance['colorscheme'];



   echo $before_widget;



   // Display the widget



   echo '<div class="widget-text wp_widget_plugin_box">';







   // Check if title is set



   if ( $title ) {



      echo $before_title . $title . $after_title;



   }







   // Check if text is set



   if( $text ) {

	   

	   if( $face == '1' ) { $face = 'true'; } else {$face = 'false';}

	   if( $showheader == '1' ) { $showheader = 'true'; } else {$showheader = 'false';}

	   if( $showpost == '1' ) { $showpost = 'true'; } else {$showpost = 'false';}

	   if( $showborder == '1' ) { $showborder = 'true'; } else {$showborder = 'false';}



      echo '<div id="fb-root"></div>

<script>(function(d, s, id) {

  var js, fjs = d.getElementsByTagName(s)[0];

  if (d.getElementById(id)) return;

  js = d.createElement(s); js.id = id;

  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&appId=454074158008443&version=v2.0";

  fjs.parentNode.insertBefore(js, fjs);

}(document, "script", "facebook-jssdk"));</script>'.'<div class="fb-like-box" data-href="'.$text.'" data-width="'.$width.'" data-height="'.$height.'" data-colorscheme="'.$colorscheme.'" data-show-faces="'.$face.'" data-header="'.$showheader.'" data-stream="'.$showpost.'" data-show-border="'.$showborder.'"></div>';



   }



   



   echo '</div>';



   echo $after_widget;



}



}







// register widget



add_action('widgets_init', create_function('', 'return register_widget("wp_my_plugin");'));

function easy_facebook_like_box_functiona($atts){

   extract(shortcode_atts(array(

	  'url' => 'www.facebook.com/FacebookDevelopers',

	  'width' => '',

	  'height' => '',

	  'theme' => 'light',

	  'faces' => 'true',

	  'header' => 'true',

	  'posts' => 'true',

	  'border' => 'true',

   ), $atts));



   $return_string = '<div id="fb-root"></div>

<script>(function(d, s, id) {

  var js, fjs = d.getElementsByTagName(s)[0];

  if (d.getElementById(id)) return;

  js = d.createElement(s); js.id = id;

  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&appId=454074158008443&version=v2.0";

  fjs.parentNode.insertBefore(js, fjs);

}(document, "script", "facebook-jssdk"));</script>';

  

   $return_string .= '<div class="fb-like-box" data-href="'.$url.'" data-width="'.$width.'" data-height="'.$height.'" data-colorscheme="'.$theme.'" data-show-faces="'.$faces.'" data-header="'.$header.'" data-stream="'.$posts.'" data-show-border="'.$border.'"></div>';

   if ($width) {

	     

              }





   wp_reset_query();

   return $return_string;

}

function easy_facebook_shortcodess(){

   add_shortcode('easy-fb-like-box', 'easy_facebook_like_box_functiona');

}

add_action( 'init', 'easy_facebook_shortcodess');



?>