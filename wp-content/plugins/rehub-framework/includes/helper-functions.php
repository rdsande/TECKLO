<?php
/**
 * Rehub Framework Helper Functions
 *
 * @package ReHub\Functions
 * @version 1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

//////////////////////////////////////////////////////////////////
// Logger function
//////////////////////////////////////////////////////////////////
function rh_logger( $value, $variable = '' ) {
	if ( true === WP_DEBUG ) {
		if ( is_array( $value ) || is_object( $value ) ) {
			error_log( $variable .' = '. print_r( $value, true ) );
		} 
		else {
			error_log( $variable .' = '. $value );
		}
	}
}

//////////////////////////////////////////////////////////////////
// File System function
//////////////////////////////////////////////////////////////////
function rf_filesystem( $method = 'get_content', $file_path, $content = '' ){
  if( empty( $file_path ) )
    return;
  
  global $wp_filesystem;
  
  if( empty( $wp_filesystem ) ) {
    require_once ( ABSPATH . '/wp-admin/includes/file.php' );
    WP_Filesystem();
  }
  if( $method == 'get_content' ){
    $result = $wp_filesystem->get_contents( $file_path );
    if( $result && !is_wp_error( $result ) ){
      return $result;
    }else{
      $result = file_get_contents($file_path);
      if($result) {
        return $result;
      }else{
        return;
      }
    }
  }elseif( $method == 'put_content' ){
    $result = $wp_filesystem->put_contents( $file_path, $content, FS_CHMOD_FILE );
    if( !is_wp_error( $result ) ){
      return true;
    }else{
      return;
    }
  }else{
    return;
  }
}

//////////////////////////////////////////////////////////////////
// Get post types
//////////////////////////////////////////////////////////////////
if(!function_exists('rh_get_post_type_formeta')){
function rh_get_post_type_formeta() {
	$def_p_types = REHub_Framework::get_option('rehub_ptype_formeta');
	$def_p_types = (!empty($def_p_types[0])) ? (array) $def_p_types : array( 'post' );
	unset($def_p_types['product']);
	return $def_p_types;
}
}

//////////////////////////////////////////////////////////////////
// include files in plugin but check grandchild and child theme
//////////////////////////////////////////////////////////////////
if(!function_exists('rf_locate_template')){
function rf_locate_template($template_names, $load = false, $require_once = true) {
    $located = '';
    foreach ( (array) $template_names as $template_name ) {
        if ( !$template_name )
            continue;
        if(defined( 'RH_GRANDCHILD_DIR' ) && file_exists(RH_GRANDCHILD_DIR . $template_name)){
            $located = RH_GRANDCHILD_DIR . '/' . $template_name;
            break;            
        }
        if ( file_exists(get_stylesheet_directory() . '/' . $template_name)) {
            $located = get_stylesheet_directory() . '/' . $template_name;
            break;
        } elseif ( file_exists(RH_FRAMEWORK_ABSPATH . '/' . $template_name) ) {
            $located = RH_FRAMEWORK_ABSPATH . '/' . $template_name;
            break;
        }
    } 
    if ( $load && '' != $located )
        load_template( $located, $require_once );
      
    return $located;
}
}

//////////////////////////////////////////////////////////////////
// MAIL FUNCTION
//////////////////////////////////////////////////////////////////
if(!function_exists('rh_send_message_eml')){
	function rh_send_message_eml($user_email, $title, $message, $message_headers) {
		return wp_mail( $user_email, wp_specialchars_decode( $title ), $message, $message_headers );
	}
}

//////////////////////////////////////////////////////////////////
// GET IP
//////////////////////////////////////////////////////////////////
if(!function_exists('rh_framework_user_ip')){
function rh_framework_user_ip() {
	foreach (array('HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'HTTP_X_FORWARDED', 'HTTP_X_CLUSTER_CLIENT_IP', 'HTTP_FORWARDED_FOR', 'HTTP_FORWARDED', 'REMOTE_ADDR') as $key) {
		if (array_key_exists($key, $_SERVER) === true) {
			$ip = $_SERVER[$key];
	        if(strpos($ip, ',') !== false) {
	            $ip = explode(',', $ip);
	            $ip = $ip[0];
	        }	
	        if($ip){substr_replace($ip,0,-1);} //GDRP        		
			return esc_attr($ip);
		}
	}
	return '127.0.0.3';
}
}

//////////////////////////////////////////////////////////////////
// POST VIEW FUNCTION
//////////////////////////////////////////////////////////////////

if (REHub_Framework::get_option('post_view_disable') !='1') {
    add_action('wp_enqueue_scripts', 'rehub_postview_enqueue');
    if (!function_exists('rehub_postview_enqueue')){
        function rehub_postview_enqueue() {
            global $post;
            if ( is_single() ) {     
                wp_register_script( 'rehub-postview', RH_FRAMEWORK_URL . '/assets/js/postviews.js', array( 'jquery' ) );
                wp_localize_script( 'rehub-postview', 'postviewvar', array('rhpost_ajax_url' => RH_FRAMEWORK_URL . '/includes/rehub_ajax.php', 'post_id' => intval($post->ID)));
                wp_enqueue_script ( 'rehub-postview');      
            }
        } 
    }    
} 

//////////////////////////////////////////////////////////////////
// FAVORITE RELOAD FUNCTION
//////////////////////////////////////////////////////////////////
if (REHub_Framework::get_option('wish_cache_enabled')) {
    add_action('wp_enqueue_scripts', 're_wish_cache_enabled');
    if (!function_exists('re_wish_cache_enabled')){
        function re_wish_cache_enabled() {
            $user_id = is_user_logged_in() ? get_current_user_id() : '0';
            wp_localize_script( 'rehub', 'wishcached', array('rh_ajax_url' => RH_FRAMEWORK_URL . '/includes/rehub_ajax.php', 'userid' => $user_id)); 
        } 
    } 
}

//////////////////////////////////////////////////////////////////
// RENDER ELEMENTOR TEMPLATE
//////////////////////////////////////////////////////////////////
if (!function_exists('wpsm_rh_elementor_box')){
    function wpsm_rh_elementor_box ($atts){
        $atts = shortcode_atts(
            array(
                'id' => '',
                'cache' => '',
                'expire' => 24,
                'clean' => '',
                'css' => false,
                'ajax' => ''
            ), $atts);        
        if(!class_exists('\Elementor\Plugin')){
            return '';
        }
        if(!isset($atts['id']) || empty($atts['id'])){
            return '';
        }

        $post_id = $atts['id'];
        if(!empty($atts['ajax'])){
            wp_enqueue_style( 'elementor-frontend' );
            $response = '<div class="el-ajax-load-block el-ajax-load-block-'.$post_id.'"></div>';          
        }        
        elseif(!empty($atts['cache'])){
            $transient_name = 'RH_ELEMENTOR_TRANSIENT_'.$atts['id'];
            if($atts['clean'] == true) delete_transient($transient_name);
            $with_css = (!empty($atts['css'])) ? true : false;
            $response = get_transient( $transient_name );

            if($response === false){
                $response = \Elementor\Plugin::instance()->frontend->get_builder_content_for_display($post_id, $with_css);
                $cache_time = $atts['expire'] * HOUR_IN_SECONDS;
                set_transient( $transient_name, $response, $cache_time);
            }
            if(!$with_css){
                $css_file = new \Elementor\Core\Files\CSS\Post($post_id);
                $css_file->enqueue();
            } 
            if ($response && strpos( $response, 're_carousel' ) !== false ) {
                wp_enqueue_script('owlcarousel');
            }
            if ($response && strpos( $response, 'elementor-invisible' ) !== false ) {
                $response = str_replace('elementor-invisible', '', $response);
            } 
            if ($response && strpos( $response, 'elementor-counter' ) !== false ) {
                $response = str_replace('elementor-widget-counter', 'rhhidden', $response);

            }                                               
        }else{
            $response = \Elementor\Plugin::instance()->frontend->get_builder_content_for_display($post_id);
        }
        return $response;
    }
}

add_action( 'wp_ajax_rh_el_ajax_hover_load', 'rh_el_ajax_hover_load');
add_action( 'wp_ajax_nopriv_rh_el_ajax_hover_load', 'rh_el_ajax_hover_load');
function rh_el_ajax_hover_load() {
    check_ajax_referer( 'ajaxed-nonce', 'security' );
    if(!class_exists('\Elementor\Plugin')){
        echo 'fail';
    }    
    $post_id = intval($_POST['post_id']);
    $shortcode_content = \Elementor\Plugin::instance()->frontend->get_builder_content_for_display($post_id, true);
    if($shortcode_content){
        echo $shortcode_content;
    }else{
        echo 'fail';
    }
    wp_die();
}

//////////////////////////////////////////////////////////////////
// Allow heading in term description
//////////////////////////////////////////////////////////////////
remove_filter('pre_term_description', 'wp_filter_kses');