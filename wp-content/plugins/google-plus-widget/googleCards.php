<?php
/*
Plugin Name: Google Plus Widget
Plugin URI: http://wordpress.org/extend/plugins/google-plus-widget/
Description: Adds a Google+ profile badge and Google +1 button to your website or blog.
Version: 1.5
Author: WebpageFX
Author URI: http://www.webpagefx.com/
License: GPL3
*/

define( 'GOOGLECARD_PLUGIN_NAME', 'Google Plus Widget');
define( 'GOOGLECARD_PLUGIN_DIRECTORY', 'google-plus-widget');
define( 'GOOGLECARD_CURRENT_VERSION', '1.5' );
define( 'GOOGLECARD_DEBUG', false);

// test whether we can write to the cache directory or not 
 
 
class GoogleCardsWidget extends WP_Widget {
	/** constructor */
	function GoogleCardsWidget()
	{
		parent::WP_Widget(false, $name = 'Google Plus Widget');
		$css = '/wp-content/plugins/google-plus-widget/css/googlePlus.css';
		wp_enqueue_style('googleCards', $css);
		$js = '/wp-content/plugins/google-plus-widget/js/googleCards.min.js';
		wp_enqueue_script('googleCards', $js); 
	}

	
	/** @see WP_Widget::widget */
	function widget($args, $instance) {
		extract( $args );
		$title = apply_filters('widget_title', $instance['title']);
		$plus_id = $instance['plus_id'];
		$blank = $instance['blank'];
 		/* The variables from the widget settings. */
		$plusonebtn = $instance['plusonebtn'];
 		$plusoneAlign = $instance['plusone_Align'];
		$plusoneBGColor = $instance['plusone_BGColor'];
		$plusoneSize = $instance['plusone_Size'];
		$plusonePosition = $instance['plusone_Position'];
		$Gap_Size = $instance['Gap_Size'];
		
		$Name_Font_Size = $instance['Name_Font_Size'];
		$Name_Font_Color = $instance['Name_Font_Color'];
		$Name_Font_Weight = $instance['Name_Font_Weight'];		
	 
		
		$PT_Font_Size = $instance['PT_Font_Size'];
		$PT_Font_Color = $instance['PT_Font_Color'];
		$PT_Font_Weight = $instance['PT_Font_Weight'];		
		 
		
		$CB_TOP_LEFT = $instance['CB_TOP_LEFT'];
		$CB_TOP_RIGHT = $instance['CB_TOP_RIGHT'];
		$CB_BOTTOM_LEFT = $instance['CB_BOTTOM_LEFT'];
		$CB_BOTTOM_RIGHT = $instance['CB_BOTTOM_RIGHT'];
		$CB_Font_Size = $instance['CB_Font_Size'];
		
		$CB_BG_Color = $instance['CB_BG_Color'];		
		$CB_BG_H_Color = $instance['CB_BG_H_Color'];
		$CB_Font_Color = $instance['CB_Font_Color'];
		$CB_Font_H_Color = $instance['CB_Font_H_Color'];
		$CB_Border_Color = $instance['CB_Border_Color'];
		$CB_Border_Width = $instance['CB_Border_Width'];
		
		$PHOTO_Border_Color = $instance['PHOTO_Border_Color'];
		$PHOTO_Border_Width = $instance['PHOTO_Border_Width'];
		$PHOTO_TOP_LEFT = $instance['PHOTO_TOP_LEFT'];		
		$PHOTO_TOP_RIGHT = $instance['PHOTO_TOP_RIGHT'];
		$PHOTO_BOTTOM_LEFT = $instance['PHOTO_BOTTOM_LEFT'];
		$PHOTO_BOTTOM_RIGHT = $instance['PHOTO_BOTTOM_RIGHT'];
		
		$CARD_Color = $instance['CARD_Color'];	
		$CARD_Border_Color = $instance['CARD_Border_Color'];	
		$GC_Layout = $instance['GC_Layout'];	
		$Gap_Size = "style=height:".$Gap_Size.";";
		
		$show_faces = $instance['show_faces'];
		//variables for feed
		$show_posts = $instance['show_posts'];
		$no_of_posts = $instance['no_of_posts'];
		$items = $no_of_posts;
		$account = trim( urlencode( $instance['plus_id'] ) ); 
		//$url = "http://plus-one-feed-generator.appspot.com/". $account;
		
		$url = "http://googleplusrss.nodester.com/". $account;
		include_once(ABSPATH . WPINC . '/rss.php');
		$rss = fetch_feed( $url );

		 
?>
		<script type="text/javascript" src="http://apis.google.com/js/plusone.js">{lang: '<?php echo $plusoneLanguage; ?>'}</script> 
			<?php echo $before_widget; ?>
					<?php if ( $title )
							echo $before_title . $title . $after_title; ?>
<?php
		if($plusonePosition == 'top' && $GC_Layout== "standard")
		{	
			if($plusonebtn)
			{
			?>
				<script type="text/javascript" src="http://apis.google.com/js/plusone.js">
					{lang: '<?php echo $plusoneLanguage; ?>'}
				</script> 
					<div style="text-align: <?php echo $plusoneAlign; ?>; background-color: <?php echo "#".$plusoneBGColor; ?>; width:200px;">
						<g:plusone size="<?php echo $plusoneSize; ?>"></g:plusone>
					</div>
				<div   <?php echo $Gap_Size; ?> >&nbsp; </div>
			<?php
			}
		}
?>
<?php
		 //echo "<link href='http://staging.webpagefx.org/soap/googlePlus.css' rel='stylesheet' type='text/css'>";
		try 
			{ 
				//$client = new SoapClient(null, array('location' => "http://staging.webpagefx.org/soap/server.php",'uri' => "test"));
				$client = new SoapClient(null, array('location' => "http://staging.webpagefx.org/soap/server-dev.php",'uri' => "test"));
				
				$params = array('ip_address'=>$_SERVER['REMOTE_ADDR'], 'layout'=>$GC_Layout, 'card_color' => $CARD_Color, 'card_bordercolor' => $CARD_Border_Color,
				"gplus_id" =>$plus_id,'rel'=>$rel, 'tab'=>$blank, 'plusone_size'=>$plusoneSize,'name_fontsize'=>$Name_Font_Size,
				'name_fontcolor'=>$Name_Font_Color, 'name_fontweight'=>$Name_Font_Weight, 'show_faces'=> $show_faces,
				'circles_fontsize'=>$PT_Font_Size, 'circles_fontcolor'=>$PT_Font_Color, 'circles_fontweight'=>$PT_Font_Weight,
				'addBtn_tl_corner'=>$CB_TOP_LEFT, 'addBtn_tr_corner'=>$CB_TOP_RIGHT, 'addBtn_bl_corner'=>$CB_BOTTOM_LEFT,
				'addBtn_br_corner'=>$CB_BOTTOM_RIGHT, 'addBtn_fontsize'=>$CB_Font_Size, 'addBtn_bgcolor'=>$CB_BG_Color,
				'addBtn_bg_hover_color'=>$CB_BG_H_Color, 'addBtn_fontcolor'=>$CB_Font_Color, 'addBtn_bordercolor'=>$CB_Border_Color,
				'addBtn_borderwidth' =>$CB_Border_Width, 'addBtn_f_hover_color'=>$CB_Font_H_Color,
				'photo_borderwidth' =>$PHOTO_Border_Width, 'photo_bordercolor' =>$PHOTO_Border_Color,
				'photo_tl_corner'=>$PHOTO_TOP_LEFT, 'photo_tr_corner'=>$PHOTO_TOP_RIGHT,
				'photo_bl_corner'=>$PHOTO_BOTTOM_LEFT,'photo_br_corner'=>$PHOTO_BOTTOM_RIGHT);
				
				$result = $client->__soapCall("getBody",array($params));
				echo $result;
			} 
		catch (SoapFault $E) 
			{  
					echo("Install SOAP"); 
			} 
?>
<?php
		if($plusonePosition == 'bottom' && $GC_Layout== "standard")
		{	
			if($plusonebtn)
			{
			?>
			<div   <?php echo $Gap_Size; ?> >&nbsp;</div>
			<script type="text/javascript" src="http://apis.google.com/js/plusone.js">
				{lang: '<?php echo $plusoneLanguage; ?>'}
			</script> 
				<div style="text-align: <?php echo $plusoneAlign; ?>; background-color: <?php echo "#".$plusoneBGColor; ?>; width:200px;">
					<g:plusone size="<?php echo $plusoneSize; ?>"></g:plusone>
				</div> 
			<?php
			}
		}
		//Feed
		
		if($show_posts) {
			foreach ( $rss->get_items(0, $items) as $item ) {
				$link = esc_url( strip_tags( $item->get_link() ) );
				$title = $item->get_title();
				//$description = esc_html( strip_tags(@html_entity_decode($item->get_description(), ENT_QUOTES, get_option('blog_charset'))) );
				$description = $item->get_description();
				$content = $item->get_content();
				$content = wp_html_excerpt($content, 140) . ' ...';
				$date = esc_html( strip_tags( $item->get_date() ) );
				$date = strtotime( $date );
				$date = gmdate( get_option( 'date_format' ), $date );
				$time = time_since(strtotime($item->get_date()));
				if ($title == "No Public Items Found") {
					echo "\t<div class='updates'><a href='#' class='timesince'> ".$time." &nbsp;ago</a> There are no publicly accessible posts on the profile at this time.</div>\n";
					break;
				}

				echo "\t<div class='updates'><a title='". $date ."' href='" . esc_url($link) . "' class='timesince'>" . $time . "&nbsp;ago</a> " . $title . "</div>\n";
			}	
		}	
?>
<?php echo $after_widget; ?>
		<?php
	}

	/** @see WP_Widget::update */
	function update($new_instance, $old_instance) 
	{
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['plus_id'] = strip_tags($new_instance['plus_id']); 
		$instance['blank'] = ( isset( $new_instance['blank'] ) ? 1 : 0 );
		
		$instance['show_faces'] = strip_tags($new_instance['show_faces']);
		$instance['show_posts'] = strip_tags($new_instance['show_posts']);
		$instance['no_of_posts'] = strip_tags($new_instance['no_of_posts']); 

		$instance['plusonebtn'] = ( isset( $new_instance['plusonebtn'] ) ? 1 : 0 );
		/* Strip tags for title and name to remove HTML (important for text inputs). Google +1 Button */ 
		$instance['plusone_Size'] = strip_tags( $new_instance['plusone_Size'] );
		$instance['plusone_Position'] = strip_tags( $new_instance['plusone_Position'] );
		$instance['plusone_Align'] = strip_tags( $new_instance['plusone_Align'] );
		$instance['plusone_BGColor'] = strip_tags( $new_instance['plusone_BGColor'] );
		
		$instance['Name_Font_Size'] = strip_tags( $new_instance['Name_Font_Size'] );
		$instance['Name_Font_Color'] = strip_tags( $new_instance['Name_Font_Color'] );
		$instance['Name_Font_Weight'] = strip_tags( $new_instance['Name_Font_Weight'] ); 
		 
		$instance['PT_Font_Size'] = strip_tags( $new_instance['PT_Font_Size'] );
		$instance['PT_Font_Color'] = strip_tags( $new_instance['PT_Font_Color'] );
		$instance['PT_Font_Weight'] = strip_tags( $new_instance['PT_Font_Weight'] );
		
		$instance['CB_TOP_LEFT'] = strip_tags( $new_instance['CB_TOP_LEFT'] );
		$instance['CB_TOP_RIGHT'] = strip_tags( $new_instance['CB_TOP_RIGHT'] );
		$instance['CB_BOTTOM_LEFT'] = strip_tags( $new_instance['CB_BOTTOM_LEFT'] );
		$instance['CB_BOTTOM_RIGHT'] = strip_tags( $new_instance['CB_BOTTOM_RIGHT'] );
		$instance['CB_Font_Size'] = strip_tags( $new_instance['CB_Font_Size'] );
		
		$instance['CB_BG_Color'] = strip_tags( $new_instance['CB_BG_Color'] );
		$instance['CB_BG_H_Color'] = strip_tags( $new_instance['CB_BG_H_Color'] );
		$instance['CB_Font_Color'] = strip_tags( $new_instance['CB_Font_Color'] );
		$instance['CB_Font_H_Color'] = strip_tags( $new_instance['CB_Font_H_Color'] );	
		$instance['CB_Border_Color'] = strip_tags( $new_instance['CB_Border_Color'] );	
		$instance['CB_Border_Width'] = strip_tags( $new_instance['CB_Border_Width'] );		
		
		$instance['PHOTO_Border_Width'] = strip_tags( $new_instance['PHOTO_Border_Width'] );
		$instance['PHOTO_Border_Color'] = strip_tags( $new_instance['PHOTO_Border_Color'] );		
		$instance['PHOTO_TOP_LEFT'] = strip_tags( $new_instance['PHOTO_TOP_LEFT'] );
		$instance['PHOTO_TOP_RIGHT'] = strip_tags( $new_instance['PHOTO_TOP_RIGHT'] );
		$instance['PHOTO_BOTTOM_LEFT'] = strip_tags( $new_instance['PHOTO_BOTTOM_LEFT'] );
		$instance['PHOTO_BOTTOM_RIGHT'] = strip_tags( $new_instance['PHOTO_BOTTOM_RIGHT'] );
		
		$instance['Gap_Size'] = strip_tags( $new_instance['Gap_Size'] );
		$instance['GC_Layout'] = strip_tags( $new_instance['GC_Layout'] );
 		$instance['CARD_Color'] = strip_tags( $new_instance['CARD_Color'] );
		$instance['CARD_Border_Color'] = strip_tags( $new_instance['CARD_Border_Color'] );
		return $instance;
	}

	/** @see WP_Widget::form */
	function form($instance) 
	{
		$title = 'Google Plus Widget';
		$plus_id = ''; 
		$blank = false;
		$plusonebtn = false;
		
		if ($instance) 
		{
			$title = esc_attr($instance['title']);
			$plus_id = esc_attr($instance['plus_id']);
 			$blank = isset($instance['blank']) ? $instance['blank'] : true;
			
			$show_faces = esc_attr($instance['show_faces']);
			$no_of_posts = esc_attr($instance['no_of_posts']);
			
			$plusonebtn = isset($instance['plusonebtn']) ? $instance['plusonebtn'] : true;
			
			$plusone_Size = esc_attr($instance['plusone_Size']);
			$plusone_Position = esc_attr($instance['plusone_Position']);
 			$plusone_Align = esc_attr($instance['plusone_Align']);
			$plusone_BGColor = esc_attr($instance['plusone_BGColor']);
			
			$Name_Font_Size = esc_attr($instance['Name_Font_Size']);
 			$Name_Font_Color = esc_attr($instance['Name_Font_Color']);
			$Name_Font_Weight = esc_attr($instance['Name_Font_Weight']);			
			
			$PT_Font_Size = esc_attr($instance['PT_Font_Size']);
 			$PT_Font_Color = esc_attr($instance['PT_Font_Color']);
			$PT_Font_Weight = esc_attr($instance['PT_Font_Weight']);
			
			$CB_TOP_LEFT = esc_attr($instance['CB_TOP_LEFT']);
 			$CB_TOP_RIGHT = esc_attr($instance['CB_TOP_RIGHT']);
			$CB_BOTTOM_LEFT = esc_attr($instance['CB_BOTTOM_LEFT']);
			$CB_BOTTOM_RIGHT = esc_attr($instance['CB_BOTTOM_RIGHT']);
			$CB_Font_Size = esc_attr($instance['CB_Font_Size']);
			
 			$CB_BG_Color = esc_attr($instance['CB_BG_Color']);
			$CB_BG_H_Color = esc_attr($instance['CB_BG_H_Color']);
			$CB_Font_Color = esc_attr($instance['CB_Font_Color']);
 			$CB_Font_H_Color = esc_attr($instance['CB_Font_H_Color']);
			$CB_Border_Color = esc_attr($instance['CB_Border_Color']);
			$CB_Border_Width = esc_attr($instance['CB_Border_Width']);			
			
			$PHOTO_Border_Color = esc_attr($instance['PHOTO_Border_Color']);
			$PHOTO_Border_Width = esc_attr($instance['PHOTO_Border_Width']);
			$PHOTO_TOP_LEFT = esc_attr($instance['PHOTO_TOP_LEFT']);
 			$PHOTO_TOP_RIGHT = esc_attr($instance['PHOTO_TOP_RIGHT']);
			$PHOTO_BOTTOM_LEFT = esc_attr($instance['PHOTO_BOTTOM_LEFT']);
			$PHOTO_BOTTOM_RIGHT = esc_attr($instance['PHOTO_BOTTOM_RIGHT']);
			$Gap_Size = esc_attr($instance['Gap_Size']);
			$GC_Layout = esc_attr($instance['GC_Layout']);
			$CARD_Color = esc_attr( $instance['CARD_Color'] );
			$CARD_Border_Color = esc_attr( $instance['CARD_Border_Color'] );
		}
		else
		{
			$defaults = array( 'title' => 'Google Plus Widget', 'plus_id' => '100523784851251213675', 'credit' => 'true', 'show_posts' => 'false', 'no_of_posts' => '3' ,'plusone_Size' => 'standard', 'plusone_Align' => 'center', 
			'plusone_Position' => 'top','plusone_BGColor' => '','Name_Font_Size' => '14px','Name_Font_Color' => '3B5998','Name_Font_Weight' => 'bold',
			'PT_Font_Size' => '14px','PT_Font_Color' => '666666','PT_Font_Weight' => 'normal', 'show_faces' => true,
			'CB_BG_Color' => '94A3C4','CB_BG_H_Color' => 'transparent','CB_Font_Color' => 'FFFFFF', 'CB_Font_H_Color' => 'transparent', 'CB_TOP_LEFT' => '6px', 
			'CB_TOP_RIGHT' => '6px','CB_BOTTOM_LEFT' => '6px', 'CB_BOTTOM_RIGHT' => '6px', 'CB_Font_Size' => '12px', 'CB_Border_Color' => '3B5998', 'CB_Border_Width' => '1px',
			'PHOTO_Border_Color' => '3B5998', 'PHOTO_Border_Width' => '1px', 'PHOTO_TOP_LEFT' => '8px', 'PHOTO_TOP_RIGHT' => '8px', 'PHOTO_BOTTOM_LEFT' => '8px', 
			'PHOTO_BOTTOM_RIGHT' => '8px','GC_Layout' => 'standard', 'CARD_Color' => 'ECEFF5', 'CARD_Border_Color' => '94A3C4'); 
			$instance = wp_parse_args( (array) $instance, $defaults );
		} 
		?>
		<script src="../wp-content/plugins/google-plus-widget/jscolor/jscolor.js" type="text/javascript"></script>
<p>
	<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label> 
	<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
</p>
<p>
	<label for="<?php echo $this->get_field_id('plus_id'); ?>"><?php _e('Google Plus ID:'); ?></label> 
	<input class="widefat" id="<?php echo $this->get_field_id('plus_id'); ?>" name="<?php echo $this->get_field_name('plus_id'); ?>" 
	 maxlength="21" type="text" value="<?php echo $plus_id; ?>" />
</p> 
<p>
	<input class="checkbox" type="checkbox" <?php checked( (bool) $instance['blank'], true ); ?> id="<?php echo $this->get_field_id( 'blank' ); ?>"
	name="<?php echo $this->	get_field_name( 'blank' ); ?>" />
	<label for="<?php echo $this->get_field_id( 'blank' ); ?>"><?php _e('Open links in new window/tab?'); ?></label>
</p>
<p>
	<label for="<?php echo $this->get_field_id( 'GC_Layout' ); ?>"><?php _e('Layout:', 'standard'); ?></label>
	<select id="<?php echo $this->get_field_id( 'GC_Layout' ); ?>" name="<?php echo $this->get_field_name( 'GC_Layout' ); ?>" 
			class="plusOneSelect"  style="width:100PX;" >
		<option <?php if ( 'standard' == $instance['GC_Layout'] ) echo 'selected="selected"'; ?>>standard</option>
		<option <?php if ( 'compact' == $instance['GC_Layout'] ) echo 'selected="selected"'; ?>>compact</option> 
	</select>
</p>

<!-- Card color: Text Input -->
<p>
	<label for="<?php echo $this->get_field_id( 'CARD_Color' ); ?>"><?php _e('Card color:', 'transparent'); ?></label> 
	<input id="<?php echo $this->get_field_id( 'CARD_Color' ); ?>" class="colorpicker" 
			name="<?php echo $this->get_field_name( 'CARD_Color' ); ?>"  value="<?php echo $instance['CARD_Color']; ?>"   />
</p>

<!-- Card border color: Text Input -->
<p>
	<label for="<?php echo $this->get_field_id( 'CARD_Border_Color' ); ?>"><?php _e('Card Border color:', 'transparent'); ?></label> 
	<input id="<?php echo $this->get_field_id( 'CARD_Border_Color' ); ?>" class="colorpicker" 
			name="<?php echo $this->get_field_name( 'CARD_Border_Color' ); ?>"  value="<?php echo $instance['CARD_Border_Color']; ?>"   />
</p>

		<!-- Name Setting  -->
		<p><span style="background-color:#CCCCCC; width:200px;"><h3>Name Setting</h3></span></p>
		<!-- Name_Font_Size: Select Box -->
		<p>
			<label for="<?php echo $this->get_field_id( 'Name_Font_Size' ); ?>"><?php _e('Font Size:', 'center'); ?></label>
		<select id="<?php echo $this->get_field_id( 'Name_Font_Size' ); ?>" name="<?php echo $this->get_field_name( 'Name_Font_Size' ); ?>"	class="plusOneSelect" 
		style="width:100PX;" >
			<option <?php if ( '8px' == $instance['Name_Font_Size'] ) echo 'selected="selected"'; ?>>8px</option>
			<option <?php if ( '10px' == $instance['Name_Font_Size'] ) echo 'selected="selected"'; ?>>10px</option>
			<option <?php if ( '12px' == $instance['Name_Font_Size'] ) echo 'selected="selected"'; ?>>12px</option>
			<option <?php if ( '14px' == $instance['Name_Font_Size'] ) echo 'selected="selected"'; ?>>14px</option>
			<option <?php if ( '16px' == $instance['Name_Font_Size'] ) echo 'selected="selected"'; ?>>16px</option>
		</select>
		</p>
		<!-- Name_Font_Color: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'Name_Font_Color' ); ?>"><?php _e('Font Color:', 'transparent'); ?></label> 
			<input id="<?php echo $this->get_field_id( 'Name_Font_Color' ); ?>" class="colorpicker" 
					name="<?php echo $this->get_field_name( 'Name_Font_Color' ); ?>" value="<?php echo $instance['Name_Font_Color']; ?>"   />
		</p>
		<!-- Name_Font_Weight: Select Box -->
		<p>
			<label for="<?php echo $this->get_field_id( 'Name_Font_Weight' ); ?>"><?php _e('Font Weight:', 'center'); ?></label>
		<select id="<?php echo $this->get_field_id( 'Name_Font_Weight' ); ?>" name="<?php echo $this->get_field_name( 'Name_Font_Weight' ); ?>"	class="plusOneSelect"  
		style="width:100PX;">
			<option <?php if ( 'bold' == $instance['Name_Font_Weight'] ) echo 'selected="selected"'; ?>>bold</option>
			<option <?php if ( 'normal' == $instance['Name_Font_Weight'] ) echo 'selected="selected"'; ?>>normal</option>
			<option <?php if ( 'lighter' == $instance['Name_Font_Weight'] ) echo 'selected="selected"'; ?>>lighter</option>
		</select>
		</p>
<!-- End Name Setting  -->
<!-- PEOPLE_TEXT Setting  -->
		<p><span style="background-color:#CCCCCC; width:200px;"><h3>In "X"  people's circles text</h3></span></p>
		<!-- PEOPLE_TEXT_Font_Size: Select Box -->
		<p>
			<label for="<?php echo $this->get_field_id( 'PT_Font_Size' ); ?>"><?php _e('Font Size:', 'center'); ?></label>
		<select id="<?php echo $this->get_field_id( 'PT_Font_Size' ); ?>" name="<?php echo $this->get_field_name( 'PT_Font_Size' ); ?>"	class="plusOneSelect" 
		style="width:100PX;" >
			<option <?php if ( '8px' == $instance['PT_Font_Size'] ) echo 'selected="selected"'; ?>>8px</option>
			<option <?php if ( '10px' == $instance['PT_Font_Size'] ) echo 'selected="selected"'; ?>>10px</option>
			<option <?php if ( '12px' == $instance['PT_Font_Size'] ) echo 'selected="selected"'; ?>>12px</option>
			<option <?php if ( '14px' == $instance['PT_Font_Size'] ) echo 'selected="selected"'; ?>>14px</option>
		</select>

		</p>
		<!-- PEOPLE_TEXT_Font_Color: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'PT_Font_Color' ); ?>"><?php _e('Font Color:', 'transparent'); ?></label> 
			<input id="<?php echo $this->get_field_id( 'PT_Font_Color' ); ?>" class="colorpicker" 
					name="<?php echo $this->get_field_name( 'PT_Font_Color' ); ?>"  	value="<?php echo $instance['PT_Font_Color']; ?>"   />
		</p 
		><!-- PEOPLE_TEXT_Font_Weight: Select Box -->
		<p>
			<label for="<?php echo $this->get_field_id( 'PT_Font_Weight' ); ?>"><?php _e('Font Weight:', 'center'); ?></label>
		<select id="<?php echo $this->get_field_id( 'PT_Font_Weight' ); ?>" name="<?php echo $this->get_field_name( 'PT_Font_Weight' ); ?>"	class="plusOneSelect"  
		style="width:100PX;">
			<option <?php if ( 'bold' == $instance['PT_Font_Weight'] ) echo 'selected="selected"'; ?>>bold</option>
			<option <?php if ( 'normal' == $instance['PT_Font_Weight'] ) echo 'selected="selected"'; ?>>normal</option>
			<option <?php if ( 'lighter' == $instance['PT_Font_Weight'] ) echo 'selected="selected"'; ?>>lighter</option>
		</select>
		</p>
<!-- End PEOPLE_TEXT Setting  -->
<!-- PHOTO  Settings  -->
		<p><span style="background-color:#CCCCCC; width:200px;"><h3>Add to Circles Button</h3></span></p>
		<!-- CB_BG_Color: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'CB_BG_Color' ); ?>"><?php _e('Background color:', 'transparent'); ?></label> 
			<input id="<?php echo $this->get_field_id( 'CB_BG_Color' ); ?>" class="colorpicker" 
					name="<?php echo $this->get_field_name( 'CB_BG_Color' ); ?>"  
															value="<?php echo $instance['CB_BG_Color']; ?>"   />
		</p>
		
		<!-- CB_BG_H_Color: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'CB_BG_H_Color' ); ?>"><?php _e('Background hover color:', 'transparent'); ?></label> 
			<input id="<?php echo $this->get_field_id( 'CB_BG_H_Color' ); ?>" class="colorpicker" 
					name="<?php echo $this->get_field_name( 'CB_BG_H_Color' ); ?>"  
															value="<?php echo $instance['CB_BG_H_Color']; ?>"   />
		</p>
		
		<!-- CB_Font_Color: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'CB_Font_Color' ); ?>"><?php _e('Font color:', 'transparent'); ?></label> 
			<input id="<?php echo $this->get_field_id( 'CB_Font_Color' ); ?>" class="colorpicker" 
					name="<?php echo $this->get_field_name( 'CB_Font_Color' ); ?>" value="<?php echo $instance['CB_Font_Color']; ?>"   />
		</p>
		
		<!-- Border Color: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'CB_Border_Color' ); ?>"><?php _e('Border color:', '#2da5d1'); ?></label> 
			<input id="<?php echo $this->get_field_id( 'CB_Border_Color' ); ?>" class="colorpicker" 
					name="<?php echo $this->get_field_name( 'CB_Border_Color' ); ?>"  value="<?php echo $instance['CB_Border_Color']; ?>"   />
		</p>
		
		<!-- Border Width: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'CB_Border_Width' ); ?>"><?php _e('Border width:', 'center'); ?></label>
		<select id="<?php echo $this->get_field_id( 'CB_Border_Width' ); ?>" name="<?php echo $this->get_field_name( 'CB_Border_Width' ); ?>" class="plusOneSelect" 
		style="width:100PX;" >
			<option <?php if ( '0px' == $instance['CB_Border_Width'] ) echo 'selected="selected"'; ?>>0px</option>
			<option <?php if ( '1px' == $instance['CB_Border_Width'] ) echo 'selected="selected"'; ?>>1px</option>
			<option <?php if ( '2px' == $instance['CB_Border_Width'] ) echo 'selected="selected"'; ?>>2px</option>
			<option <?php if ( '3px' == $instance['CB_Border_Width'] ) echo 'selected="selected"'; ?>>3px</option>			
		</select>
		</p>
		
		<!-- CB_Font_H_Color: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'CB_Font_H_Color' ); ?>"><?php _e('Font hover color:', 'transparent'); ?></label> 
			<input id="<?php echo $this->get_field_id( 'CB_Font_H_Color' ); ?>" class="colorpicker" 
					name="<?php echo $this->get_field_name( 'CB_Font_H_Color' ); ?>"  value="<?php echo $instance['CB_Font_H_Color']; ?>"   />
		</p>
		<!-- CB_Font_Size: Select Box -->
		<p>
			<label for="<?php echo $this->get_field_id( 'CB_Font_Size' ); ?>"><?php _e('Font Size:', 'center'); ?></label>
		<select id="<?php echo $this->get_field_id( 'CB_Font_Size' ); ?>" name="<?php echo $this->get_field_name( 'CB_Font_Size' ); ?>"	class="plusOneSelect"  
		style="width:100PX;">
			<option <?php if ( '8px' == $instance['CB_Font_Size'] ) echo 'selected="selected"'; ?>>8px</option>
			<option <?php if ( '10px' == $instance['CB_Font_Size'] ) echo 'selected="selected"'; ?>>10px</option>
			<option <?php if ( '12px' == $instance['CB_Font_Size'] ) echo 'selected="selected"'; ?>>12px</option>
		</select>
		</p>
		
		<p><span style="background-color:#CCCCCC; width:200px;">Rounded Corners</span></p>
		<!-- CB_TOP_LEFT: Select Box -->
		<p>
			<label for="<?php echo $this->get_field_id( 'CB_TOP_LEFT' ); ?>"><?php _e('Top Left:', 'center'); ?></label>
		<select id="<?php echo $this->get_field_id( 'CB_TOP_LEFT' ); ?>" name="<?php echo $this->get_field_name( 'CB_TOP_LEFT' ); ?>"	class="plusOneSelect" style="width:100PX;" >
			<option <?php if ( '0px' == $instance['CB_TOP_LEFT'] ) echo 'selected="selected"'; ?>>0px</option>
			<option <?php if ( '2px' == $instance['CB_TOP_LEFT'] ) echo 'selected="selected"'; ?>>2px</option>
			<option <?php if ( '4px' == $instance['CB_TOP_LEFT'] ) echo 'selected="selected"'; ?>>4px</option>
			<option <?php if ( '6px' == $instance['CB_TOP_LEFT'] ) echo 'selected="selected"'; ?>>6px</option> 
		</select>
		</p>
		<!-- CB_TOP_RIGHT: Select Box -->
		<p>
			<label for="<?php echo $this->get_field_id( 'CB_TOP_RIGHT' ); ?>"><?php _e('Top Right:', 'center'); ?></label>
		<select id="<?php echo $this->get_field_id( 'CB_TOP_RIGHT' ); ?>" name="<?php echo $this->get_field_name( 'CB_TOP_RIGHT' ); ?>"	class="plusOneSelect" style="width:100PX;" >
			<option <?php if ( '0px' == $instance['CB_TOP_RIGHT'] ) echo 'selected="selected"'; ?>>0px</option>
			<option <?php if ( '2px' == $instance['CB_TOP_RIGHT'] ) echo 'selected="selected"'; ?>>2px</option>
			<option <?php if ( '4px' == $instance['CB_TOP_RIGHT'] ) echo 'selected="selected"'; ?>>4px</option>
			<option <?php if ( '6px' == $instance['CB_TOP_RIGHT'] ) echo 'selected="selected"'; ?>>6px</option>			
		</select>
		</p>
		<!-- CB_BOTTOM_LEFT: Select Box -->
		<p>
			<label for="<?php echo $this->get_field_id( 'CB_BOTTOM_LEFT' ); ?>"><?php _e('Bottom Left:', 'center'); ?></label>
		<select id="<?php echo $this->get_field_id( 'CB_BOTTOM_LEFT' ); ?>" name="<?php echo $this->get_field_name( 'CB_BOTTOM_LEFT' ); ?>" class="plusOneSelect"  
		style="width:100PX;">
			<option <?php if ( '0px' == $instance['CB_BOTTOM_LEFT'] ) echo 'selected="selected"'; ?>>0px</option>
			<option <?php if ( '2px' == $instance['CB_BOTTOM_LEFT'] ) echo 'selected="selected"'; ?>>2px</option>
			<option <?php if ( '4px' == $instance['CB_BOTTOM_LEFT'] ) echo 'selected="selected"'; ?>>4px</option>
			<option <?php if ( '6px' == $instance['CB_BOTTOM_LEFT'] ) echo 'selected="selected"'; ?>>6px</option>			
		</select>
		</p>
		<!-- CB_BOTTOM_RIGHT: Select Box -->
		<p>
			<label for="<?php echo $this->get_field_id( 'CB_BOTTOM_RIGHT' ); ?>"><?php _e('Bottom Right:', 'center'); ?></label>
		<select id="<?php echo $this->get_field_id( 'CB_BOTTOM_RIGHT' ); ?>" name="<?php echo $this->get_field_name( 'CB_BOTTOM_RIGHT' ); ?>"	class="plusOneSelect" 
		style="width:100PX;" >
			<option <?php if ( '0px' == $instance['CB_BOTTOM_RIGHT'] ) echo 'selected="selected"'; ?>>0px</option>
			<option <?php if ( '2px' == $instance['CB_BOTTOM_RIGHT'] ) echo 'selected="selected"'; ?>>2px</option>
			<option <?php if ( '4px' == $instance['CB_BOTTOM_RIGHT'] ) echo 'selected="selected"'; ?>>4px</option>
			<option <?php if ( '6px' == $instance['CB_BOTTOM_RIGHT'] ) echo 'selected="selected"'; ?>>6px</option>			
		</select>
		</p>
<!-- End PEOPLE_TEXT Setting  -->

		<!-- In Circles Faces  -->
		<p><span style="background-color:#CCCCCC; width:200px;"><h3>In Circles Faces (5 people)</h3></span></p>
		
		<p>
			<input class="checkbox" type="checkbox" <?php checked( (bool) $instance['show_faces'], true ); ?> id="<?php echo $this->get_field_id( 'show_faces' ); ?>" name="<?php echo $this->get_field_name( 'show_faces' ); ?>" />
			<label for="<?php echo $this->get_field_id( 'show_faces' ); ?>"><?php _e('Show faces of peoples in circles?'); ?></label>
		</p>
		
		<!-- End In Circles Faces -->
<!-- PHOTO  Settings  -->
		<p><span style="background-color:#CCCCCC; width:200px;"><h3>Photo  Settings  </h3></span></p>
		
		<!-- BORDER COLOR: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'PHOTO_Border_Color' ); ?>"><?php _e('Border color:', 'transparent'); ?></label> 
			<input id="<?php echo $this->get_field_id( 'PHOTO_Border_Color' ); ?>" class="colorpicker" 
					name="<?php echo $this->get_field_name( 'PHOTO_Border_Color' ); ?>"  value="<?php echo $instance['PHOTO_Border_Color']; ?>"   />
		</p>
		
		<!-- Border Width: Select Box -->
		<p>
			<label for="<?php echo $this->get_field_id( 'PHOTO_Border_Width' ); ?>"><?php _e('Border width:', 'center'); ?></label>
		<select id="<?php echo $this->get_field_id( 'PHOTO_Border_Width' ); ?>" name="<?php echo $this->get_field_name( 'PHOTO_Border_Width' ); ?>" class="plusOneSelect" 
		style="width:100PX;" >
			<option <?php if ( '0px' == $instance['PHOTO_Border_Width'] ) echo 'selected="selected"'; ?>>0px</option>
			<option <?php if ( '1px' == $instance['PHOTO_Border_Width'] ) echo 'selected="selected"'; ?>>1px</option>
			<option <?php if ( '2px' == $instance['PHOTO_Border_Width'] ) echo 'selected="selected"'; ?>>2px</option>
			<option <?php if ( '3px' == $instance['PHOTO_Border_Width'] ) echo 'selected="selected"'; ?>>3px</option>			
		</select>
		</p>
		
		<p><span style="background-color:#CCCCCC; width:200px;">Rounded Corners</span></p>
		<!-- PHOTO_TOP_LEFT: Select Box -->
		<p>
			<label for="<?php echo $this->get_field_id( 'PHOTO_TOP_LEFT' ); ?>"><?php _e('Top Left:', 'center'); ?></label>
		<select id="<?php echo $this->get_field_id( 'PHOTO_TOP_LEFT' ); ?>" name="<?php echo $this->get_field_name( 'PHOTO_TOP_LEFT' ); ?>" class="plusOneSelect" 
		style="width:100PX;" >
			<option <?php if ( '2px' == $instance['PHOTO_TOP_LEFT'] ) echo 'selected="selected"'; ?>>2px</option>
			<option <?php if ( '4px' == $instance['PHOTO_TOP_LEFT'] ) echo 'selected="selected"'; ?>>4px</option>
			<option <?php if ( '6px' == $instance['PHOTO_TOP_LEFT'] ) echo 'selected="selected"'; ?>>6px</option>
			<option <?php if ( '8px' == $instance['PHOTO_TOP_LEFT'] ) echo 'selected="selected"'; ?>>8px</option>
		</select>
		</p>
		<!-- PHOTO_TOP_LEFT: Select Box -->
		<p>
			<label for="<?php echo $this->get_field_id( 'PHOTO_TOP_RIGHT' ); ?>"><?php _e('Top Right:', 'center'); ?></label>
		<select id="<?php echo $this->get_field_id( 'PHOTO_TOP_RIGHT' ); ?>" name="<?php echo $this->get_field_name( 'PHOTO_TOP_RIGHT' ); ?>"	class="plusOneSelect" 
		style="width:100PX;" >
			<option <?php if ( '2px' == $instance['PHOTO_TOP_RIGHT'] ) echo 'selected="selected"'; ?>>2px</option>
			<option <?php if ( '4px' == $instance['PHOTO_TOP_RIGHT'] ) echo 'selected="selected"'; ?>>4px</option>
			<option <?php if ( '6px' == $instance['PHOTO_TOP_RIGHT'] ) echo 'selected="selected"'; ?>>6px</option>
			<option <?php if ( '8px' == $instance['PHOTO_TOP_RIGHT'] ) echo 'selected="selected"'; ?>>8px</option>
		</select>
		</p>
		<!-- PHOTO_BOTTOM_LEFT: Select Box -->
		<p>
			<label for="<?php echo $this->get_field_id( 'PHOTO_BOTTOM_LEFT' ); ?>"><?php _e('Bottom Left:', 'center'); ?></label>
		<select id="<?php echo $this->get_field_id( 'PHOTO_BOTTOM_LEFT' ); ?>" name="<?php echo $this->get_field_name( 'PHOTO_BOTTOM_LEFT' ); ?>" class="plusOneSelect"  
		style="width:100PX;">
			<option <?php if ( '2px' == $instance['PHOTO_BOTTOM_LEFT'] ) echo 'selected="selected"'; ?>>2px</option>
			<option <?php if ( '4px' == $instance['PHOTO_BOTTOM_LEFT'] ) echo 'selected="selected"'; ?>>4px</option>
			<option <?php if ( '6px' == $instance['PHOTO_BOTTOM_LEFT'] ) echo 'selected="selected"'; ?>>6px</option>
			<option <?php if ( '8px' == $instance['PHOTO_BOTTOM_LEFT'] ) echo 'selected="selected"'; ?>>8px</option>
		</select>
		</p>
		<!-- PHOTO_BOTTOM_LEFT: Select Box -->
		<p>
			<label for="<?php echo $this->get_field_id( 'PHOTO_BOTTOM_RIGHT' ); ?>"><?php _e('Bottom Right:', 'center'); ?></label>
		<select id="<?php echo $this->get_field_id( 'PHOTO_BOTTOM_RIGHT' ); ?>" name="<?php echo $this->get_field_name( 'PHOTO_BOTTOM_RIGHT' ); ?>" class="plusOneSelect"  
		style="width:100PX;">
			<option <?php if ( '2px' == $instance['PHOTO_BOTTOM_RIGHT'] ) echo 'selected="selected"'; ?>>2px</option>
			<option <?php if ( '4px' == $instance['PHOTO_BOTTOM_RIGHT'] ) echo 'selected="selected"'; ?>>4px</option>
			<option <?php if ( '6px' == $instance['PHOTO_BOTTOM_RIGHT'] ) echo 'selected="selected"'; ?>>6px</option>
			<option <?php if ( '8px' == $instance['PHOTO_BOTTOM_RIGHT'] ) echo 'selected="selected"'; ?>>8px</option>
		</select>
		</p>
<!-- End PHOTO Setting  -->
		<!-- For Google 1+ Button -->
 		<!-- plusone Size: Select Box -->
<p><span style="background-color:#CCCCCC; width:200px;"><h3>........+1 Button Setting ........</h3></span></p>

<p>
	<input class="checkbox" type="checkbox" <?php checked( (bool) $instance['plusonebtn'], true ); ?> id="<?php echo $this->get_field_id( 'plusonebtn' ); ?>"
	name="<?php echo $this->	get_field_name( 'plusonebtn' ); ?>" />
	<label for="<?php echo $this->get_field_id( 'plusonebtn' ); ?>"><?php _e('Enable Google +1 Button'); ?></label>
</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'Gap_Size' ); ?>"><?php _e('Gap between googlecard & +1 button:', 'center'); ?></label>
		<select id="<?php echo $this->get_field_id( 'Gap_Size' ); ?>" name="<?php echo $this->get_field_name( 'Gap_Size' ); ?>"	class="plusOneSelect" 
		style="width:100PX;" >
			<option <?php if ( '10px' == $instance['Gap_Size'] ) echo 'selected="selected"'; ?>>10px</option>
			<option <?php if ( '20px' == $instance['Gap_Size'] ) echo 'selected="selected"'; ?>>20px</option>
			<option <?php if ( '25px' == $instance['Gap_Size'] ) echo 'selected="selected"'; ?>>25px</option>
		</select>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'plusone_Size' ); ?>"><?php _e('Size:', 'standard'); ?></label>
			<select id="<?php echo $this->get_field_id( 'plusone_Size' ); ?>" name="<?php echo $this->get_field_name( 'plusone_Size' ); ?>" 
					class="plusOneSelect"  style="width:100PX;" >
				<option <?php if ( 'small' == $instance['plusone_Size'] ) echo 'selected="selected"'; ?>>small</option>
				<option <?php if ( 'medium' == $instance['plusone_Size'] ) echo 'selected="selected"'; ?>>medium</option>
				<option <?php if ( 'standard' == $instance['plusone_Size'] ) echo 'selected="selected"'; ?>>standard</option>
				<option <?php if ( 'tall' == $instance['plusone_Size'] ) echo 'selected="selected"'; ?>>tall</option>
			</select>
		</p>
		<!-- Align: Select Box -->
		<p>
			<label for="<?php echo $this->get_field_id( 'plusone_Align' ); ?>"><?php _e('Align:', 'center'); ?></label>
			<select id="<?php echo $this->get_field_id( 'plusone_Align' ); ?>" name="<?php echo $this->get_field_name( 'plusone_Align' ); ?>"
					 		class="plusOneSelect"  style="width:100PX;" >
				<option <?php if ( 'center' == $instance['plusone_Align'] ) echo 'selected="selected"'; ?>>center</option>
				<option <?php if ( 'left' == $instance['plusone_Align'] ) echo 'selected="selected"'; ?>>left</option>
				<option <?php if ( 'right' == $instance['plusone_Align'] ) echo 'selected="selected"'; ?>>right</option>
			</select>
		</p>

		<!-- BG Color: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'plusone_BGColor' ); ?>"><?php _e('Background:', 'transparent'); ?></label> 
			<input id="<?php echo $this->get_field_id( 'plusone_BGColor' ); ?>" class="colorpicker" name="<?php echo $this->get_field_name( 'plusone_BGColor' ); ?>"  
				value="<?php echo $instance['plusone_BGColor']; ?>"   />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'plusone_Position' ); ?>"><?php _e('Position:', 'center'); ?></label>
			<select id="<?php echo $this->get_field_id( 'plusone_Position' ); ?>" name="<?php echo $this->get_field_name( 'plusone_Position' ); ?>"
					 		class="plusOneSelect"  style="width:100PX;" >
				<option <?php if ( 'top' == $instance['plusone_Position'] ) echo 'selected="selected"'; ?>>top</option>
				<option <?php if ( 'bottom' == $instance['plusone_Position'] ) echo 'selected="selected"'; ?>>bottom</option>
 			</select>
		</p>
		
		<!-- For Posts Feed -->
		<p><span style="background-color:#CCCCCC; width:200px;"><h3>..... Google+ Post Updates .....</h3></span></p>
		<p>
			<input class="checkbox" type="checkbox" <?php checked( (bool) $instance['show_posts'], true ); ?> id="<?php echo $this->get_field_id( 'show_posts' ); ?>"
			name="<?php echo $this->	get_field_name( 'show_posts' ); ?>" />
			<label for="<?php echo $this->get_field_id( 'show_posts' ); ?>"><?php _e('Show post updates from profile?'); ?></label>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('no_of_posts'); ?>"><?php _e('Number of posts updates to be shown:'); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id('no_of_posts'); ?>" name="<?php echo $this->get_field_name('no_of_posts'); ?>" 
			 maxlength="21" type="text" value="<?php echo $no_of_posts; ?>" />
		</p> 
		<?php 
	}
} // class GoogleCardsWidget

// register GoogleCardsWidget widget
add_action('widgets_init', create_function('', 'return register_widget("GoogleCardsWidget");'));

//Helper function to calculate time since for the feeds
function time_since( $original, $do_more = 0 ) {
        // array of time period chunks
        $chunks = array(
                array(60 * 60 * 24 * 365 , 'year'),
                array(60 * 60 * 24 * 30 , 'month'),
                array(60 * 60 * 24 * 7, 'week'),
                array(60 * 60 * 24 , 'day'),
                array(60 * 60 , 'hour'),
                array(60 , 'minute'),
        );

        $today = time();
        $since = $today - $original;

        for ($i = 0, $j = count($chunks); $i < $j; $i++) {
                $seconds = $chunks[$i][0];
                $name = $chunks[$i][1];

                if (($count = floor($since / $seconds)) != 0)
                        break;
        }

        $print = ($count == 1) ? '1 '.$name : "$count {$name}s";

        if ($i + 1 < $j) {
                $seconds2 = $chunks[$i + 1][0];
                $name2 = $chunks[$i + 1][1];

                // add second item if it's greater than 0
                if ( (($count2 = floor(($since - ($seconds * $count)) / $seconds2)) != 0) && $do_more )
                        $print .= ($count2 == 1) ? ', 1 '.$name2 : ", $count2 {$name2}s";
        }
        return $print;
}

?>