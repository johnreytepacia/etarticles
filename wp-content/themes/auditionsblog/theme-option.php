<?php 
add_action('admin_menu', 'create_theme_option_page'); 
function create_theme_option_page(){
	add_theme_page( 'Theme Options', 'Theme Options', 'edit_theme_options', 'theme_options', 'build_options_page' );
}

function build_options_page(){ ?>
	
	<div class="icon32" id="icon-tools"> <br/></div>
	<h2>Theme Options</h2>
	
	<form method="post" action="options.php" enctype="multipart/form-data">
		<?php 
			settings_fields('custom_options');
			do_settings_sections( 'theme_options' );
			submit_button(); 
		?>
	</form>
<?php 
}

add_action('admin_init', 'register_fields');
function register_fields(){
	register_setting( 'custom_options', 'custom_options', 'validate_setting');
	add_settings_section('general', '', '__return_false', 'theme_options'); 
	add_settings_field( 'featured_logo',  'Featured Logo', 'custom_featured_logo', 'theme_options', 'general'); 
	add_settings_field( 'contactus_text',  'Contact Us Text', 'custom_contactus_text', 'theme_options', 'general');
	add_settings_field( 'footer_text',  'Footer Text', 'custom_footer_text', 'theme_options', 'general');
} 

/*** for header logo ***/
function custom_featured_logo(){
	$options = get_option('custom_options');
	echo "<input style='float: left;' type='file' name='featured_logo'>"; ?>
	<div style="float: left;display: block;margin-left: 30px;margin-top: -23px;"><img src="<?php echo $options['featured_logo'] ?>" title="" alt=""/></div>
<?php 
}

/** for Contact Us text located beside the Primary Navigation **/
function custom_contactus_text(){
	$options = get_option('custom_options');
	echo "<input style='width:250px;' type='text' name = 'custom_options[contactus_text]' value='{$options['contactus_text']}' />";
}

/** for Footer text content **/
function custom_footer_text(){
	$options = get_option('custom_options');
	echo "<textarea name = 'custom_options[footer_text]' rows='3' cols='40'>{$options['footer_text']}</textarea>";
}

/*** for validation of all the functions ***/
function validate_setting($custom_options){

	$keys = array_keys($_FILES);
	$i = 0;
	foreach($_FILES as $image){
		if($image['size']){
			if(preg_match('/{jpg|jpeg|png|gif|gif}$/', $image['type'])){
				$override = array('test_form'=>false);
				$file = wp_handle_upload($image, $override);
				$custom_options[$keys[$i]] = $file['url'];
			}
		}else{
			$options = get_option('custom_options');
			$custom_options[$keys[$i]] = $options[$keys[$i]];
		}
		$i++;
	}
	
	return $custom_options;
}