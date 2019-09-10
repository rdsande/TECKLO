<?php 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class WPS_Shortcode
{
	function __construct() {
		add_action( 'admin_init', array( $this, 'action_admin_init' ) );
	}
	
	function action_admin_init() {
		// only hook up these filters if we're in the admin panel, and the current user has permission
		// to edit posts and pages
		if ( current_user_can( 'edit_posts' ) && current_user_can( 'edit_pages' ) ) {
			add_filter( 'mce_buttons_3', array( $this, 'filter_mce_button' ) );
			add_filter( 'mce_external_plugins', array( $this, 'filter_mce_plugin' ) );
			add_action('mce_buttons',  array( $this, 'filter_mce_button_top_line' ));
			add_action( 'admin_footer', array( $this, 'wpsm_generator_popup' ));
			add_action( 'wp_ajax_shortcode_generate', array( $this, 'ajax_shortcode_generate' ) );
		}
	}
	
	function filter_mce_button( $buttons ) {
		array_push(
				$buttons,
				"toplist",	
				"contents",
				"sticky",				
				"linkhider",	
				"update",
				"award"
			); 
			return $buttons;
	}

	function filter_mce_button_top_line( $buttons ) {
		array_push(
				$buttons,
				"rh_short_gen"
			); 
			return $buttons;
	}	
	
	function filter_mce_plugin( $plugins ) {
		// this plugin file will work the magic of our button
		$plugins['wpsm_shortcode'] = get_template_directory_uri(). '/shortcodes/tinyMCE/tinyMCE_script.js?ver=7.8.5';
		return $plugins;
	}


	function wpsm_generator_popup() {
		?>
         <?php wp_enqueue_script('jquery'); ?>
        <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/shortcodes/tinyMCE/tinyMCE.css?ver=7.8.5" />
        <script data-cfasync="false" src="<?php echo get_template_directory_uri(); ?>/shortcodes/tinyMCE/jquery.selection.js"></script>        
		<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/jsonids/css/token-input.css" />
		<script data-cfasync="false" src="<?php echo get_template_directory_uri(); ?>/jsonids/js/jquery.tokeninput.min.js"></script>         
		<div id="wpsm-generator-wrap" class="csspopup"><div class="csspopupinner"><span class="cpopupclose">×</span>

         
			<?php 
			$ajaxs_nonce = wp_create_nonce( "shortcodename" );
			echo '
			<script>
			 jQuery(document).ready(function($){
				$(document).on("click", ".csspopup .cpopupclose, .csspopup input#submit", function(e){
				  	$(this).closest(".csspopup").removeClass("active");
				  	$("body").removeClass("flowhidden");
				});				 	
				//select shortcode
				$("#select-shortcode").change(function () {
					  var shortcodeName = "";
					  var shortcodeSelectText = "";
					  $("#select-shortcode option:selected").each(function () {
							shortcodeName += $(this).val();
							shortcodeSelectText += $(this).text();
						  });
						  if( shortcodeName != "none") {
							$("#shortcode-content").load(ajaxurl + "?action=shortcode_generate&security='.$ajaxs_nonce.'&shortcode_name=" + shortcodeName, function(){
								$(".shortcode-title").text(shortcodeSelectText + " '.__('Shortcode Generator', 'rehub-theme').'");
							});
						  } else {
						  	$("#shortcode-content").text("'.__('Select your shortcode above to get started', 'rehub-theme').'").addClass("padding-bottom");
							$(".shortcode-title").text("'.__('Shortcode Generator', 'rehub-theme').'");
						  }
					})
					.trigger("change");
			 });

			</script>' ?>
			<div id="mainbox">
			<div class="inner-wpsm-shortcode">	
				<form action="/" method="get" accept-charset="utf-8">
					<ul class="form_table head">
						<li>
							<label><strong><?php _e('Select shortcode', 'rehub-theme') ;?></strong></label>
							<span><select name="select-shortcode" id="select-shortcode">
							<option value="none" selected="selected"><?php _e('Select shortcode', 'rehub-theme') ;?></option>
							<option value="none" class="shortcode_titles"><?php _e('Elements and typography', 'rehub-theme') ;?></option>
							<option class="shortcode_option" value="button"><?php _e('Button', 'rehub-theme') ;?></option>
							<option class="shortcode_option" value="affbutton"><?php _e('Affiliate Button', 'rehub-theme') ;?></option>
							<option class="shortcode_option" value="highlight"><?php _e('Highlight', 'rehub-theme') ;?></option>	
							<option class="shortcode_option" value="quote"><?php _e('Quote', 'rehub-theme') ;?></option>
							<option class="shortcode_option" value="dropcap"><?php _e('Dropcap', 'rehub-theme') ;?></option>
							<option class="shortcode_option" value="testimonial"><?php _e('Testimonial', 'rehub-theme') ;?></option>
							<option class="shortcode_option" value="list"><?php _e('List', 'rehub-theme') ;?></option>
							<option class="shortcode_option" value="tooltip"><?php _e('Tooltip', 'rehub-theme') ;?></option>	
							<option class="shortcode_option" value="divider"><?php _e('Divider', 'rehub-theme') ;?></option>																				
							<option class="shortcode_option" value="column"><?php _e('Columns', 'rehub-theme') ;?></option>
							<option class="shortcode_option" value="numberheading"><?php _e('Numbered Headings', 'rehub-theme') ;?></option>
							<option value="none" class="shortcode_titles"><?php _e('Boxes', 'rehub-theme') ;?></option>							
							<option class="shortcode_option" value="box"><?php _e('Box', 'rehub-theme') ;?></option>
                            <option class="shortcode_option" value="promobox"><?php _e('Promobox', 'rehub-theme') ;?></option>	
							<option class="shortcode_option" value="numberbox"><?php _e('Box with number', 'rehub-theme') ;?></option>
							<option class="shortcode_option" value="titlebox"><?php _e('Box with title', 'rehub-theme') ;?></option> 
							<option class="shortcode_option" value="codebox"><?php _e('Code box', 'rehub-theme') ;?></option>
							<option class="shortcode_option" value="cartbox"><?php _e('Card Box', 'rehub-theme') ;?></option>
							<option class="shortcode_option" value="itinerary"><?php _e('Itinerary (timeline) box', 'rehub-theme') ;?></option>								
							<option class="shortcode_option" value="offerbox"><?php _e('Offer box', 'rehub-theme') ;?></option>
							<option class="shortcode_option" value="reviewbox"><?php _e('Review box', 'rehub-theme') ;?></option>							
							<option class="shortcode_option" value="offerscorebox"><?php _e('Post/Product offer scorebox', 'rehub-theme') ;?></option>	
							<option class="shortcode_option" value="reviewlistbox"><?php _e('Review list boxes', 'rehub-theme') ;?></option>													
							<option class="shortcode_option" value="woobox"><?php _e('Woocommerce Offer box', 'rehub-theme') ;?></option>
							<option class="shortcode_option" value="woolist"><?php _e('Woocommerce Offers list', 'rehub-theme') ;?></option>
							<option class="shortcode_option" value="woocompare"><?php _e('Woocommerce Comparison list', 'rehub-theme') ;?></option>							
							<option class="shortcode_option" value="proscons"><?php _e('Pros Cons box', 'rehub-theme') ;?></option>														
							<option class="shortcode_option" value="colortable"><?php _e('Table with color header', 'rehub-theme') ;?></option>
							<option value="none" class="shortcode_titles"><?php _e('Media', 'rehub-theme') ;?></option>
							<option class="shortcode_option" value="video"><?php _e('Video', 'rehub-theme') ;?></option>
							<option class="shortcode_option" value="lightbox"><?php _e('Lightbox', 'rehub-theme') ;?></option>
							<option class="shortcode_option" value="slider"><?php _e('Slider', 'rehub-theme') ;?></option>
							<option class="shortcode_option" value="postimagesslider"><?php _e('Slider from post images', 'rehub-theme') ;?></option>
							<option class="shortcode_option" value="recentpostcarousel"><?php _e('Carousel of recent posts', 'rehub-theme') ;?></option>	
							<option class="shortcode_option" value="gallerycarousel"><?php _e('Gallery carousel', 'rehub-theme') ;?></option>																				
							<option value="none" class="shortcode_titles"><?php _e('Interactive', 'rehub-theme') ;?></option>
							<option class="shortcode_option" value="accordion"><?php _e('Accordion', 'rehub-theme') ;?></option>
							<option class="shortcode_option" value="tabs"><?php _e('Tabs', 'rehub-theme') ;?></option>
							<option class="shortcode_option" value="toggle"><?php _e('Toggle', 'rehub-theme') ;?></option>
							<option class="shortcode_option" value="bars"><?php _e('Bar with percentage', 'rehub-theme') ;?></option>
							<option class="shortcode_option" value="compare-bars"><?php _e('Compare Bars', 'rehub-theme') ;?></option>								
							<option class="shortcode_option" value="countdown"><?php _e('Countdown', 'rehub-theme') ;?></option>
							<option value="none" class="shortcode_titles"><?php _e('Functions', 'rehub-theme') ;?></option>
							<option class="shortcode_option" value="customget"><?php _e('Get Custom field or attribute value', 'rehub-theme') ;?></option>	
							<option class="shortcode_option" value="taxarchive"><?php _e('Taxonomy/Brand/Attribute directory', 'rehub-theme') ;?></option>													
							<option class="shortcode_option" value="categorizator"><?php _e('Categories directory', 'rehub-theme') ;?></option>
							<option class="shortcode_option" value="recentpostlist"><?php _e('List of recent posts', 'rehub-theme') ;?></option>
							<option class="shortcode_option" value="map"><?php _e('Google map', 'rehub-theme') ;?></option>
							<option class="shortcode_option" value="price"><?php _e('Price Table', 'rehub-theme') ;?></option>
							<option class="shortcode_option" value="rss"><?php _e('RSS grabber', 'rehub-theme') ;?></option>
							<option class="shortcode_option" value="membercontent"><?php _e('Content for members', 'rehub-theme') ;?></option>						

							</select></span>
							<div class="clear"></div>
						</li>
					</ul>
				</form>	
				<div id="wpsm-generator-settings">
					<h3 class="shortcode-title"></h3>
					<div id="shortcode-content"></div>
				</div>
			</div>
			</div>
        </div></div>

		<?php
	}

	function ajax_shortcode_generate() {
		check_ajax_referer( 'shortcodename', 'security' );
		$shortcode_name = sanitize_text_field($_GET['shortcode_name']);
		$shortcode_content = rh_locate_template( 'shortcodes/tinyMCE/includes/'. $shortcode_name .'.php' );
		
		if ( $shortcode_content ) {
			load_template( $shortcode_content );
		} else {
			printf( '<span style="color:red">%s</span>', __( 'The shortcode file not found!', 'rehub-theme' ) );
		}
		wp_die();
	}

}

$wpsm_shortcode = new WPS_Shortcode();

?>