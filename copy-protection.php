<?php
/**
 * Plugin Name: Copy Protection
 * Plugin URI: https://www.seosthemes.com/copy-protection/
 * Contributors: seosbg
 * Author: seosbg
 * Description: WP Content Copy Protection — WordPress Plugins. Simply amazing and easy to use.
 * Version: 1.0
 * License: GPL2
 */

 
/*********************** Add Menu Page **************************/	
 
 
add_action('admin_menu', 'cp_menu');
function cp_menu() {
    add_menu_page('Copy Protection', 'Copy Protection', 'administrator', 'copy-protection', 'cp_settings_page', plugins_url('images/icon.png' , __FILE__ )
    );

    add_action('admin_init', 'cp_register_settings');
}


/*********************** Register Settings **************************/	


function cp_register_settings() {
    register_setting('copy-protection', 'disable-right-cklick');
    register_setting('copy-protection', 'f12');
    register_setting('copy-protection', 'disable_right_cklick_text');
}


/*********************** Admin Scripts and Styles **************************/


function cp_admin_enqueue_scripts() {
	wp_enqueue_style( 'cp-admin-css', plugin_dir_url(__FILE__) . '/css/admin.css' );
}
 
add_action( 'admin_enqueue_scripts', 'cp_admin_enqueue_scripts' );	


/*********************** Scripts and Styles **************************/

			
function cp_enqueue_scripts() {
	wp_enqueue_style( 'cp-style-css', plugin_dir_url(__FILE__) . '/style.css' );
	wp_enqueue_script('jquery');
	
	if (get_option( 'f12' )) :	
		wp_enqueue_script( 'cp-disable-f12-js', plugin_dir_url(__FILE__) . '/js/disable-f12.js', array(), '', true );
	endif;

}
 
add_action( 'wp_enqueue_scripts', 'cp_enqueue_scripts' );


/*********************** Include **************************/

if (get_option( 'disable-right-cklick' )) :
	include_once(plugin_dir_path(__FILE__) . 'inc/disable-right-cklick.php');
endif;

/*********************** Slider Settings **************************/	
			
function cp_settings_page() {
?>

    <div class="wrap copy-protection">
			<div>
				<a target="_blank" href="http://seosthemes.com/">
					<div class="btn s-red">
						 <?php _e('SEOS', 'copy-protection'); echo ' <img class="ss-logo" src="' . plugins_url( 'images/logo.png' , __FILE__ ) . '" alt="logo" />';  _e(' THEMES', 'copy-protection'); ?>
					</div>
				</a>
			</div>	
	
		<h1><?php _e('Copy Protection', 'copy-protection'); ?></h1>
        <form action="options.php" method="post" role="form" name="copy-protection" accept-charset="ISO-8859-1">
		
			<?php settings_fields( 'copy-protection' ); ?>
			<?php do_settings_sections( 'copy-protection' ); ?>
		

<?php /*********************** Disable Right Cklick **************************/ ?> 

			<div>

				<label><?php _e('Disable Right Cklick: ', 'copy-protection'); ?> </label>
				
				<?php $right_cklick = get_option( 'disable-right-cklick' ); ?>	
				<input type="checkbox" name="disable-right-cklick" value="1"<?php checked( 1 == $right_cklick); ?> />
				
				<hr />	
				
				<label><?php _e('Custom Text: ', 'copy-protection'); ?> </label>
				<input type="text" name="disable_right_cklick_text" value="<?php echo get_option( 'disable_right_cklick_text' ); ?>" />

				<hr />
					
				<label><?php _e('Disabl - Text Select, F12, Ctrl + U, Ctrl + C: ', 'copy-protection'); ?> </label>
				
				<?php $f12 = get_option( 'f12' ); ?>	
				<input type="checkbox" name="f12" value="1"<?php checked( 1 == $f12); ?> />

				<hr />

			</div>
			
			<?php submit_button(); ?>	
			
		</form>	
	</div>
	
	<?php } 
	
	function cp_language_load() {
		load_plugin_textdomain('cp_language_load', FALSE, basename(dirname(__FILE__)) . '/languages');
	}
	add_action('init', 'cp_language_load');
	
