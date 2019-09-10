<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly ?>
<?php

if ( defined('REHUB_MAIN_COLOR')) {
	$maincolor = REHUB_MAIN_COLOR;
	$secondarycolor = REHUB_SECONDARY_COLOR;
	$btncolor = REHUB_BUTTON_COLOR;
	$btncolortext = REHUB_BUTTON_COLOR_TEXT;
	$default_layout = REHUB_DEFAULT_LAYOUT;
	$contentboxdisable = REHUB_BOX_DISABLE;
}else{
	$maincolor = '#8035be';
	$secondarycolor = '#000000';
	$btncolor = '#de1414';
	$default_layout = 'communitylist';
	$contentboxdisable = '0';
	$btncolortext = '#ffffff';
}

$theme_options =  array(
	'title' => __('Theme Options', 'rehub-framework'),
	'page' => 'Rehub Theme Options',
	'logo' => '',
	'menus' => array(
		array(
			'title' => __('General Options', 'rehub-framework'),
			'name' => 'menu_1',
			'icon' => 'font-awesome:fa-microchip',
			'controls' => array(
				array(
					'type' => 'section',
					'title' => __('General Options', 'rehub-framework'),
					'fields' => array(				
						array(
							'type' => 'select',
							'name' => 'archive_layout',
							'label' => __('Select Blog Layout', 'rehub-framework'),
							'description' => __('Select what kind of post string layout you want to use for blog, archives', 'rehub-framework'),
							'items' => array(
								array(
									'value' => 'blog',
									'label' => __('Blog Layout', 'rehub-framework'),
								),								
								array(
									'value' => 'newslist',
									'label' => __('Simple News List', 'rehub-framework'),
								),
								array(
									'value' => 'communitylist',
									'label' => __('Community List', 'rehub-framework'),
								),	
								array(
									'value' => 'deallist',
									'label' => __('Deal List', 'rehub-framework'),
								),																
								array(
									'value' => 'grid',
									'label' => __('Masonry Grid layout', 'rehub-framework'),
								),	
								array(
									'value' => 'columngrid',
									'label' => __('Equal height Grid layout', 'rehub-framework'),
								),
								array(
									'value' => 'compactgrid',
									'label' => __('Compact deal grid layout', 'rehub-framework'),
								),								
								array(
									'value' => 'dealgrid',
									'label' => __('Deal Grid layout', 'rehub-framework'),
								),
								array(
									'value' => 'cardblog',
									'label' => __('Cards', 'rehub-framework'),
								),								
								array(
									'value' => 'dealgridfull',
									'label' => __('Full width Deal Grid layout', 'rehub-framework'),
								),
								array(
									'value' => 'compactgridfull',
									'label' => __('Full width compact deal grid layout', 'rehub-framework'),
								),
								array(
									'value' => 'columngridfull',
									'label' => __('Equal height Full width Grid layout', 'rehub-framework'),
								),
								array(
									'value' => 'gridfull',
									'label' => __('Full width Masonry Grid layout', 'rehub-framework'),
								),
								array(
									'value' => 'cardblogfull',
									'label' => __('Cards Full width', 'rehub-framework'),
								),									

							),
							'default' => array(
								$default_layout
							),
						),
						array(
							'type' => 'select',
							'name' => 'category_layout',
							'label' => __('Select Category Layout', 'rehub-framework'),
							'description' => __('Select what kind of post string layout you want to use for categories', 'rehub-framework'),
							'items' => array(
								array(
									'value' => 'blog',
									'label' => __('Blog Layout', 'rehub-framework'),
								),								
								array(
									'value' => 'newslist',
									'label' => __('Simple News List', 'rehub-framework'),
								),
								array(
									'value' => 'communitylist',
									'label' => __('Community List', 'rehub-framework'),
								),
								array(
									'value' => 'deallist',
									'label' => __('Deal List', 'rehub-framework'),
								),																		
								array(
									'value' => 'grid',
									'label' => __('Masonry Grid layout', 'rehub-framework'),
								),	
								array(
									'value' => 'columngrid',
									'label' => __('Equal height Grid layout', 'rehub-framework'),
								),
								array(
									'value' => 'compactgrid',
									'label' => __('Compact deal grid layout', 'rehub-framework'),
								),								
								array(
									'value' => 'dealgrid',
									'label' => __('Deal Grid layout', 'rehub-framework'),
								),
								array(
									'value' => 'cardblog',
									'label' => __('Cards', 'rehub-framework'),
								),								
								array(
									'value' => 'dealgridfull',
									'label' => __('Full width Deal Grid layout', 'rehub-framework'),
								),
								array(
									'value' => 'compactgridfull',
									'label' => __('Full width compact deal grid layout', 'rehub-framework'),
								),
								array(
									'value' => 'columngridfull',
									'label' => __('Equal height Full width Grid layout', 'rehub-framework'),
								),
								array(
									'value' => 'gridfull',
									'label' => __('Full width Masonry Grid layout', 'rehub-framework'),
								),
								array(
									'value' => 'cardblogfull',
									'label' => __('Cards Full width', 'rehub-framework'),
								),								

							),
							'default' => array(
								$default_layout
							),
						),
						array(
							'type' => 'select',
							'name' => 'search_layout',
							'label' => __('Select Search Layout', 'rehub-framework'),
							'description' => __('Select what kind of post string layout you want to use for search pages', 'rehub-framework'),
							'items' => array(
								array(
									'value' => 'blog',
									'label' => __('Blog Layout', 'rehub-framework'),
								),								
								array(
									'value' => 'newslist',
									'label' => __('Simple News List', 'rehub-framework'),
								),
								array(
									'value' => 'communitylist',
									'label' => __('Community List', 'rehub-framework'),
								),	
								array(
									'value' => 'deallist',
									'label' => __('Deal List', 'rehub-framework'),
								),																	
								array(
									'value' => 'grid',
									'label' => __('Masonry Grid layout', 'rehub-framework'),
								),	
								array(
									'value' => 'columngrid',
									'label' => __('Equal height Grid layout', 'rehub-framework'),
								),
								array(
									'value' => 'compactgrid',
									'label' => __('Compact deal grid layout', 'rehub-framework'),
								),								
								array(
									'value' => 'dealgrid',
									'label' => __('Deal Grid layout', 'rehub-framework'),
								),
								array(
									'value' => 'cardblog',
									'label' => __('Cards', 'rehub-framework'),
								),									
								array(
									'value' => 'dealgridfull',
									'label' => __('Full width Deal Grid layout', 'rehub-framework'),
								),
								array(
									'value' => 'compactgridfull',
									'label' => __('Full width compact deal grid layout', 'rehub-framework'),
								),
								array(
									'value' => 'columngridfull',
									'label' => __('Equal height Full width Grid layout', 'rehub-framework'),
								),
								array(
									'value' => 'gridfull',
									'label' => __('Full width Masonry Grid layout', 'rehub-framework'),
								),	
								array(
									'value' => 'cardblogfull',
									'label' => __('Cards Full width', 'rehub-framework'),
								),																														
							),
							'default' => array(
								$default_layout
							),
						),
						array(
							'type' => 'select',
							'name' => 'enable_pagination',
							'label' => __('Select pagination type for categories', 'rehub-framework'),
							'description' => __('Choose number of posts per page in Settings - Reading settings. Recommended number - 12', 'rehub-framework'),
							'items' => array(
								array(
									'value' => '1',
									'label' => __('Simple Pagination', 'rehub-framework'),
								),	
								array(
									'value' => '2',
									'label' => __('Infinite scroll', 'rehub-framework'),
								),															
								array(
									'value' => '3',
									'label' => __('Next page button', 'rehub-framework'),
								),																																
							),
							'default' => array(
								'1',
							),
						),						
						array(
							'type' => 'select',
							'name' => 'post_layout_style',
							'label' => __('Post layout', 'rehub-framework'),
							'default' => 'normal_post',
							'items' => array(
								'data' => array(
									array(
										'source' => 'function',
										'value'  => 'rehub_get_post_layout_array',
									),
								),
							),
							'default' => array(
								'default',
							),
						),	
						array(
							'type' => 'select',
							'name' => 'width_layout',
							'label' => __('Select Width Style', 'rehub-framework'),
							'items' => array(
								array(
									'value' => 'regular',
									'label' => __('Regular (1200px)', 'rehub-framework'),
								),								
								array(
									'value' => 'extended',
									'label' => __('Extended (1530px)', 'rehub-framework'),
								),	
								array(
									'value' => 'compact',
									'label' => __('Compact (adsense banners optimized)', 'rehub-framework'),
								),																						
							),
							'default' => array(
								'regular',
							),						
						),
						array(
							'type' => 'textarea',
							'name' => 'category_filter_panel',
							'label' => __('Category filter panel', 'rehub-framework'),		
							'description' => 'You can add additional filter panel in category page. Add each filter from next line. Example: Title:meta_key:DESC. In most cases, you will need next filter panel code. Show all:all:DESC<br />Best price:rehub_main_product_price:ASC<br />Hottest:post_hot_count:DESC<br />Popular:rehub_views:DESC<br />Price range:price:0-100:DESC<br /><br />To show hottest deals sorted by date, use<br />Hottest:hot:DESC<br /><br />To show deals and coupons sorted by expiration date<br />Expired soon:expiration:ASC<br /><br /><a href="http://rehubdocs.wpsoul.com/docs/rehub-framework/list-of-important-meta-fields/" target="_blank">Check other important fields</a>',
						),	
						array(
							'type' => 'textarea',
							'name' => 'rehub_custom_css',
							'label' => __('Custom CSS', 'rehub-framework'),
							'description' => __('Write your custom CSS here', 'rehub-framework'),
						),						
						array(
							'type' => 'textarea',
							'name' => 'rehub_analytics',
							'label' => __('Js code for footer', 'rehub-framework'),
							'description' => __('Enter your Analytics code or any html, js code', 'rehub-framework'),
						),	
						array(
							'type' => 'textarea',
							'name' => 'rehub_analytics_header',
							'label' => __('Js code for header (analytics)', 'rehub-framework'),						
						),																	
					),
				),
			),
		),
		array(
			'title' => __('Appearance/Color', 'rehub-framework'),
			'name' => 'menu_6',
			'icon' => 'font-awesome:fa-edit',
			'controls' => array(
				array(
					'type' => 'section',
					'title' => __('Color schema of website', 'rehub-framework'),
					'fields' => array(
						array(
							'type' => 'color',
							'name' => 'rehub_custom_color',
							'label' => __('Custom color schema', 'rehub-framework'),
							'description' => __('Default theme color schema is green, but you can set your own main color (it will be used under white text)', 'rehub-framework'),
							'format' => 'hex',
							'default'=> $maincolor,
						),
						array(
							'type' => 'color',
							'name' => 'rehub_sec_color',
							'label' => __('Custom secondary color', 'rehub-framework'),
							'description' => __('Set secondary color (for search buttons, tabs, etc).', 'rehub-framework'),
							'format' => 'hex',
							'default'=> $secondarycolor,							

						),							
						array(
							'type' => 'color',
							'name' => 'rehub_btnoffer_color',
							'label' => __('Set offer buttons color', 'rehub-framework'),
							'format' => 'hex',
							'default'=> $btncolor,						
						),	
						array(
							'type' => 'color',
							'name' => 'rehub_btnoffer_color_hover',
							'label' => __('Set offer button hover color', 'rehub-framework'),
							'format' => 'hex',						
						),
						array(
							'type' => 'color',
							'name' => 'rehub_btnoffer_color_text',
							'label' => __('Set offer button text color', 'rehub-framework'),
							'format' => 'hex',
							'default' => $btncolortext,						
						),												
						array(
							'type' => 'select',
							'name' => 'enable_smooth_btn',
							'label' => __('Enable smooth design for buttons?', 'rehub-framework'),
							'items' => array(
								array(
									'value' => '0',
									'label' => __('No', 'rehub-framework'),
								),								
								array(
									'value' => '1',
									'label' => __('Rounded', 'rehub-framework'),
								),	
								array(
									'value' => '2',
									'label' => __('Soft Rounded', 'rehub-framework'),
								),																						
							),
							'default' => array(
								'2',
							),						
						),												
						array(
							'type' => 'color',
							'name' => 'rehub_color_link',
							'label' => __('Custom color for links inside posts', 'rehub-framework'),
							'format' => 'hex',	
						),											
					),
				),
				array(
					'type' => 'section',
					'title' => __('Layout settings', 'rehub-framework'),
					'fields' => array(
						array(
							'type' => 'toggle',
							'name' => 'rehub_sidebar_left',
							'label' => __('Set sidebar to left side?', 'rehub-framework'),
							'default' => '0',
						),	
						array(
							'type' => 'toggle',
							'name' => 'rehub_body_block',
							'label' => __('Enable boxed version?', 'rehub-framework'),
							'default' => '0',
						),						
						array(
							'type' => 'toggle',
							'name' => 'rehub_content_shadow',
							'label' => __('Disable box borders under content box?', 'rehub-framework'),			
							'default' => $contentboxdisable,	
						),													
						array(
							'type' => 'color',
							'name' => 'rehub_color_background',
							'label' => __('Background Color', 'rehub-framework'),
							'description' => __('Choose the background color', 'rehub-framework'),
							'format' => 'hex',
						),
						array(
							'type' => 'upload',
							'name' => 'rehub_background_image',
							'label' => __('Background Image', 'rehub-framework'),
							'description' => __('Upload a background image. Works only if you set also background color above', 'rehub-framework'),
							'default' => '',
						),
						array(
							'type' => 'select',
							'name' => 'rehub_background_repeat',
							'label' => __('Background Repeat', 'rehub-framework'),
							'items' => array(
								array(
									'value' => 'repeat',
									'label' => __('Repeat', 'rehub-framework'),
								),
								array(
									'value' => 'no-repeat',
									'label' => __('No Repeat', 'rehub-framework'),
								),
								array(
									'value' => 'repeat-x',
									'label' => __('Repeat X', 'rehub-framework'),
								),
								array(
									'value' => 'repeat-y',
									'label' => __('Repeat Y', 'rehub-framework'),
								),
							),
							'default' => array(
								'repeat',
							),
						),
						array(
							'type' => 'select',
							'name' => 'rehub_background_position',
							'label' => __('Background Position', 'rehub-framework'),
							'items' => array(
								array(
									'value' => 'left',
									'label' => 'Left',
								),
								array(
									'value' => 'center',
									'label' => 'Center',
								),
								array(
									'value' => 'right',
									'label' => 'Right',
								),
							),
						),
						array(
							'type' => 'toggle',
							'name' => 'rehub_background_fixed',
							'label' => __('Fixed Background Image?', 'rehub-framework'),
							'description' => __('The background is fixed with regard to the viewport.', 'rehub-framework'),
						),												
						array(
							'type' => 'textbox',
							'name' => 'rehub_branded_bg_url',
							'label' => __('Url for branded background', 'rehub-framework'),
							'description' => __('Insert url that will be display on background', 'rehub-framework'),
							'default' => '',
							'validation' => 'url',
						),																			
					),
				),				
			),
		),
		array(
			'title' => __('Logo & favicon', 'rehub-framework'),
			'name' => 'menu_12',
			'icon' => 'font-awesome:fa-cog',
			'controls' => array(
				array(
					'type' => 'section',
					'title' => __('Logo settings', 'rehub-framework'),
					'fields' => array(						
						array(
							'type' => 'upload',
							'name' => 'rehub_logo',
							'label' => __('Upload Logo', 'rehub-framework'),
							'description' => __('Upload your logo. Max width is 450px. (1200px for full width, 180px for logo + menu row layout)', 'rehub-framework'),
							'default' => '',
						),
																	
						array(
							'type' => 'upload',
							'name' => 'rehub_logo_retina',
							'label' => __('Upload Logo (retina version)', 'rehub-framework'),
							'description' => __('Upload retina version of the logo. It should be 2x the size of main logo.', 'rehub-framework'),
							'default' => '',
						),
						array(
							'type' => 'textbox',
							'name' => 'rehub_logo_retina_width',
							'label' => __('Logo width', 'rehub-framework'),
							'description' => __('Please, enter logo width (without px)', 'rehub-framework'),
						),	
						array(
							'type' => 'textbox',
							'name' => 'rehub_logo_retina_height',
							'label' => __('Retina logo height', 'rehub-framework'),							
							'description' => __('Please, enter logo height (without px)', 'rehub-framework'),
						),																	
						array(
							'type' => 'textbox',
							'name' => 'rehub_text_logo',
							'label' => __('Text logo', 'rehub-framework'),							
							'description' => __('You can type text logo. Use this field only if no image logo', 'rehub-framework'),
						),
						array(
							'type' => 'textbox',
							'name' => 'rehub_text_slogan',
							'label' => __('Slogan', 'rehub-framework'),							
							'description' => __('You can type slogan below text logo. Use this field only if no image logo', 'rehub-framework'),
						),							
					),
				),

				array(
					'type' => 'section',
					'title' => __('Favicons', 'rehub-framework'),
					'fields' => array(
						 array(
							'type' => 'notebox',
							'name' => 'rehub_favicon_note',
							'label' => __('Note!', 'rehub-framework'),
							'description' => __('Wordpress 4.3 has built-in favicon function. You can set favicon from Appearance - Customize - Site Identity - Site Icon', 'rehub-framework'),
							'status' => 'info',
						),						
					),
				),
			),
		),
		array(
			'title' => __('Header and Menu', 'rehub-framework'),
			'name' => 'menu_2',
			'icon' => 'font-awesome:fa-wrench ',
			'controls' => array(
				array(
					'type' => 'section',
					'title' => __('Main Header Options', 'rehub-framework'),
					'fields' => array(						
						array(
							'type' => 'select',
							'name' => 'rehub_header_style',
							'label' => __('Select Header style', 'rehub-framework'),
							'items' => array(
								array(
									'value' => 'header_seven',
									'label' => __('Shop/Comparison header (logo + search + login + cart/compare icon)', 'rehub-framework'),
								),	
								array(
									'value' => 'header_six',
									'label' => __('Customizable header', 'rehub-framework'),
								),	
								array(
									'value' => 'header_five',
									'label' => __('Logo + menu in one row', 'rehub-framework'),
								),
								array(
									'value' => 'header_first',
									'label' => __('Logo + code zone 468X60 + search box', 'rehub-framework'),
								),
								array(
									'value' => 'header_eight',
									'label' => __('Logo + slogan + search box', 'rehub-framework'),
								),							
								array(
									'value' => 'header_second',
									'label' => __('Logo + code zone 728X90', 'rehub-framework'),
								),
								array(
									'value' => 'header_fourth',
									'label' => __('Full width logo + code zone under logo', 'rehub-framework'),
								),	
								array(
									'value' => 'header_nine',
									'label' => __('Centered logo + menu in left + shop, comparison, login icon in right', 'rehub-framework'),
								),																																		
							),
								'default' => array(
								'header_seven',
							),
						),
						array(
							'type' => 'textbox',
							'name' => 'rehub_logo_pad',
							'label' => __('Set padding from top and bottom (without px)', 'rehub-framework'),
							'description' => __('This will add custom padding from top and bottom for all custom elements in logo section. Default is 15', 'rehub-framework'),						
						),
						array(
							'type' => 'toggle',
							'name' => 'header_seven_compare_btn',
							'label' => __('Enable Compare Icon', 'rehub-framework'),
							'default' => '1',
							'dependency' => array(
								'field'    => 'rehub_header_style',
								'function' => 'rehub_framework_is_header_seven',
							),							
						),
						array(
							'type' => 'textbox',
							'name' => 'header_seven_compare_btn_label',
							'label' => __('Label for compare icon', 'rehub-framework'),	
							'dependency' => array(
								'field'    => 'rehub_header_style',
								'function' => 'rehub_framework_is_header_seven',
							),											
						),					
						array(
							'type' => 'toggle',
							'name' => 'header_seven_cart',
							'label' => __('Enable Cart Icon', 'rehub-framework'),
							'default' => '1',
							'dependency' => array(
								'field'    => 'rehub_header_style',
								'function' => 'rehub_framework_is_header_seven',
							),							
						),	
						array(
							'type' => 'toggle',
							'name' => 'header_seven_cart_as_btn',
							'label' => __('Enable Cart as button', 'rehub-framework'),
							'default' => '0',
							'dependency' => array(
								'field'    => 'rehub_header_style',
								'function' => 'rehub_framework_is_header_seven',
							),							
						),										
						array(
							'type' => 'toggle',
							'name' => 'header_seven_login',
							'label' => __('Enable Login Icon', 'rehub-framework'),
							'default' => '0',
							'dependency' => array(
								'field'    => 'rehub_header_style',
								'function' => 'rehub_framework_is_header_seven',
							),							
						),	
						array(
							'type' => 'textbox',
							'name' => 'header_seven_login_label',
							'label' => __('Label for login icon', 'rehub-framework'),	
							'dependency' => array(
								'field'    => 'rehub_header_style',
								'function' => 'rehub_framework_is_header_seven',
							),											
						),					
						array(
							'type' => 'textbox',
							'name' => 'header_seven_wishlist',
							'label' => __('Enable Wishlist Icon and set Url', 'rehub-framework'),
							'default' => '',
							'dependency' => array(
								'field'    => 'rehub_header_style',
								'function' => 'rehub_framework_is_header_seven',
							),
							'description' => __('Set url on your page where you have [rh_get_user_favorites] shortcode. All icons in header will be available also in mobile logo panel. We don\'t recommend to enable more than 2 icons with Mobile logo.', 'rehub-framework'),											
						),					
						array(
							'type' => 'textbox',
							'name' => 'header_seven_wishlist_label',
							'label' => __('Label for wishlist icon', 'rehub-framework'),	
							'dependency' => array(
								'field'    => 'rehub_header_style',
								'function' => 'rehub_framework_is_header_seven',
							),											
						),	
						array(
							'type' => 'textarea',
							'name' => 'header_seven_more_element',
							'label' => __('Add additional element (shortcodes and html supported)', 'rehub-framework'),
							'dependency' => array(
								'field'    => 'rehub_header_style',
								'function' => 'rehub_framework_is_header_seven',
							),														
						),																		

						array(
							'type' => 'toggle',
							'name' => 'header_six_login',
							'label' => __('Enable login/register section', 'rehub-framework'),
							'description' => __('Also, login popup must be enabled in Theme option - User options', 'rehub-framework'),
							'default' => '0',
							'dependency' => array(
								'field'    => 'rehub_header_style',
								'function' => 'rehub_framework_is_header_six_five',
							),							
						),					
						array(
							'type' => 'toggle',
							'name' => 'header_six_btn',
							'label' => __('Enable additional button in header', 'rehub-framework'),
							'description' => __('This will add button in header', 'rehub-framework'),
							'default' => '0',
							'dependency' => array(
								'field'    => 'rehub_header_style',
								'function' => 'rehub_framework_is_header_six_five',
							),							
						),	
						array(
							'type' => 'select',
							'name' => 'header_six_btn_color',
							'label' => __('Choose color style of button', 'rehub-framework'),						
							'description' => __('You can set theme colors in Theme option - appearance or via Customizer', 'rehub-framework'),	
							'items' => array(
								array(
									'value' => 'btncolor',
									'label' => __('Main Color of Buttons', 'rehub-framework'),
								),							
								array(
									'value' => 'main',
									'label' => __('Main Theme Color', 'rehub-framework'),
								),							
								array(
									'value' => 'secondary',
									'label' => __('Secondary Theme Color', 'rehub-framework'),
								),							
								array(
									'value' => 'green',
									'label' => __('green', 'rehub-framework'),
								),
								array(
									'value' => 'orange',
									'label' => __('orange', 'rehub-framework'),
								),
								array(
									'value' => 'red',
									'label' => __('red', 'rehub-framework'),
								),
								array(
									'value' => 'blue',
									'label' => __('blue', 'rehub-framework'),
								),	
								array(
									'value' => 'black',
									'label' => __('black', 'rehub-framework'),
								),
								array(
									'value' => 'rosy',
									'label' => __('rosy', 'rehub-framework'),
								),
								array(
									'value' => 'brown',
									'label' => __('brown', 'rehub-framework'),
								),
								array(
									'value' => 'pink',
									'label' => __('pink', 'rehub-framework'),
								),
								array(
									'value' => 'purple',
									'label' => __('purple', 'rehub-framework'),
								),
								array(
									'value' => 'gold',
									'label' => __('gold', 'rehub-framework'),
								),																															
							),
							'default' => array(
								'green',
							),
							'dependency' => array(
								'field'    => 'rehub_header_style',
								'function' => 'rehub_framework_is_header_six_five',
							),						
						),						
						array(
							'type' => 'textbox',
							'name' => 'header_six_btn_txt',
							'label' => __('Type label for button', 'rehub-framework'),
							'default' => 'Submit a deal',
							'dependency' => array(
								'field'    => 'rehub_header_style',
								'function' => 'rehub_framework_is_header_six_five',
							),														
						),	
						array(
							'type' => 'textbox',
							'name' => 'header_six_btn_url',
							'label' => __('Type url for button', 'rehub-framework'),
							'dependency' => array(
								'field'    => 'rehub_header_style',
								'function' => 'rehub_framework_is_header_six_five',
							),														
						),	
						array(
							'type' => 'toggle',
							'name' => 'header_six_btn_login',
							'label' => __('Enable login popup for non registered users', 'rehub-framework'),
							'description' => __('This will open popup if non registered user clicks on button. Also, login popup must be enabled in Theme option - User options', 'rehub-framework'),
							'default' => '0',
							'dependency' => array(
								'field'    => 'rehub_header_style',
								'function' => 'rehub_framework_is_header_six_five',
							),							
						),	
						array(
							'type' => 'toggle',
							'name' => 'header_six_src',
							'label' => __('Enable search form in header', 'rehub-framework'),
							'default' => '0',
							'dependency' => array(
								'field'    => 'rehub_header_style',
								'function' => 'rehub_framework_is_header_six_five',
							),							
						),											
						array(
							'type' => 'select',
							'name' => 'header_six_menu',
							'label' => __('Enable additional menu near logo', 'rehub-framework'),
							'description' => __('Use short menu with small number of items!!!', 'rehub-framework'),
							'items' => array(
								'data' => array(
									array(
										'source' => 'function',
										'value' => 'vp_get_menus',
									),
								),
							),
							'dependency' => array(
								'field'    => 'rehub_header_style',
								'function' => 'rehub_framework_is_header_six',
							),														
						),	
						array(
							'type' => 'textbox',
							'name' => 'header_nine_wishlist',
							'label' => __('Enable Wishlist Icon and set Url', 'rehub-framework'),
							'default' => '',
							'dependency' => array(
								'field'    => 'rehub_header_style',
								'function' => 'rehub_framework_is_header_nine',
							),
							'description' => __('Set url on your page where you have [rh_get_user_favorites] shortcode. All icons in header will be available also in mobile logo panel. We don\'t recommend to enable more than 2 icons with Mobile logo.', 'rehub-framework'),											
						),																					
						array(
							'type' => 'toggle',
							'name' => 'rehub_sticky_nav',
							'label' => __('Sticky Menu Bar', 'rehub-framework'),
							'description' => __('Enable/Disable Sticky navigation bar.', 'rehub-framework'),
							'default' => '0',
						),		
						array(
							'type' => 'upload',
							'name' => 'rehub_logo_sticky_url',
							'label' => __('Upload Logo for sticky menu', 'rehub-framework'),
							'description' => __('Upload your logo. Max height is 40px.', 'rehub-framework'),
							'default' => '',
							'dependency' => array(
	                        	'field' => 'rehub_sticky_nav',
	                        	'function' => 'vp_dep_boolean',
	                        ),							
						),															
						array(
							'type' => 'select',
							'name' => 'header_logoline_style',
							'label' => __('Choose color style of header logo section', 'rehub-framework'),							
							'items' => array(
								array(
									'value' => '0',
									'label' => __('White style and dark fonts', 'rehub-framework'),
								),
								array(
									'value' => '1',
									'label' => __('Dark style and white fonts', 'rehub-framework'),
								),
							),
							'default' => array(
								'0',
							),
						),
						array(
							'type' => 'color',
							'name' => 'rehub_header_color_background',
							'label' => __('Custom Background Color', 'rehub-framework'),
							'description' => __('Choose the background color or leave blank for default', 'rehub-framework'),
							'format' => 'hex',	
						),
						array(
							'type' => 'upload',
							'name' => 'rehub_header_background_image',
							'label' => __('Custom Background Image', 'rehub-framework'),
							'description' => __('Upload a background image or leave blank', 'rehub-framework'),
							'default' => '',
						),
						array(
							'type' => 'select',
							'name' => 'rehub_header_background_repeat',
							'label' => __('Background Repeat', 'rehub-framework'),
							'items' => array(
								array(
									'value' => 'repeat',
									'label' => __('Repeat', 'rehub-framework'),
								),
								array(
									'value' => 'no-repeat',
									'label' => __('No Repeat', 'rehub-framework'),
								),
								array(
									'value' => 'repeat-x',
									'label' => __('Repeat X', 'rehub-framework'),
								),
								array(
									'value' => 'repeat-y',
									'label' => __('Repeat Y', 'rehub-framework'),
								),
							),
							
						),
						array(
							'type' => 'select',
							'name' => 'rehub_header_background_position',
							'label' => __('Background Position', 'rehub-framework'),
							'items' => array(
								array(
									'value' => 'left',
									'label' => 'Left',
								),
								array(
									'value' => 'center',
									'label' => 'Center',
								),
								array(
									'value' => 'right',
									'label' => 'Right',
								),
							),													
						),																										
					),
				),

				array(
					'type' => 'section',
					'title' => __('Header main menu Options', 'rehub-framework'),
					'fields' => array(
						array(
							'type' => 'select',
							'name' => 'header_menuline_style',
							'label' => __('Choose color style of header menu section', 'rehub-framework'),							
							'items' => array(
								array(
									'value' => '0',
									'label' => __('White style and dark fonts', 'rehub-framework'),
								),
								array(
									'value' => '1',
									'label' => __('Dark style and white fonts', 'rehub-framework'),
								),
							),
							'default' => array(
								'0',
							),
						),
						array(
							'type' => 'select',
							'name' => 'header_menuline_type',
							'label' => __('Choose type of font and padding', 'rehub-framework'),							
							'items' => array(
								array(
									'value' => '0',
									'label' => __('Middle size and padding', 'rehub-framework'),
								),
								array(
									'value' => '1',
									'label' => __('Compact size and padding', 'rehub-framework'),
								),							
								array(
									'value' => '2',
									'label' => __('Big size and padding', 'rehub-framework'),
								),							
							),
							'default' => array(
								'0',
							),
						),
						array(
							'type' => 'textbox',
							'name' => 'rehub_nav_font_custom',
							'label' => __('Add custom font size', 'rehub-framework'),
							'description' => __('Default is 15. Put just number', 'rehub-framework'),						
						),					
						array(
							'type' => 'toggle',
							'name' => 'rehub_nav_font_upper',
							'label' => __('Enable uppercase font?', 'rehub-framework'),
							'default' => '0',							
						),	
						array(
							'type' => 'toggle',
							'name' => 'rehub_nav_font_light',
							'label' => __('Enable Light font weight?', 'rehub-framework'),
							'default' => '1',							
						),	
						array(
							'type' => 'toggle',
							'name' => 'rehub_nav_font_border',
							'label' => __('Disable border of items?', 'rehub-framework'),
							'default' => '0',							
						),																		
						array(
							'type' => 'toggle',
							'name' => 'rehub_enable_menu_shadow',
							'label' => __('Menu shadow', 'rehub-framework'),
							'description' => __('Enable/Disable shadow under menu', 'rehub-framework'),
							'default' => '0',
						),					
						array(
							'type' => 'color',
							'name' => 'rehub_custom_color_nav',
							'label' => __('Custom color of menu background', 'rehub-framework'),
							'description' => __('Or leave blank for default color', 'rehub-framework'),
							'format' => 'hex',
							
						),	
						 array(
							'type' => 'color',
							'name' => 'rehub_custom_color_nav_font',
							'label' => __('Custom color of menu font', 'rehub-framework'),
							'description' => __('Or leave blank for default color', 'rehub-framework'),
							'format' => 'hex',							
						),
					),
				),

				array(
					'type' => 'section',
					'title' => __('Search', 'rehub-framework'),
					'fields' => array(				
						array(
							'type' => 'toggle',
							'name' => 'rehub_ajax_search',
							'label' => __('Add ajax search for header search', 'rehub-framework'),
							'default' => '0',
						),
						array(
							'type' => 'multiselect',
							'name' => 'rehub_search_ptypes',
							'label' => __('Choose custom post type for search', 'rehub-framework'),
							'description' => __('By default search form shows post and pages. You can change this here. Multiple post types are supported only for ajax search', 'rehub-framework'),
							'items' => array(
								'data' => array(
									array(
										'source' => 'function',
										'value'  => 'rehub_get_cpost_type',
									),
								),
							),
							'default' => '',			
						),							


					),
				),			

				array(
					'type' => 'section',
					'title' => __('Header top line Options', 'rehub-framework'),
					'fields' => array(	
						array(
							'type' => 'toggle',
							'name' => 'rehub_header_top_enable',
							'label' => __('Enable top line', 'rehub-framework'),
							'default' => '0',
						),									
						array(
							'type' => 'select',
							'name' => 'header_topline_style',
							'label' => __('Choose color style of header top line', 'rehub-framework'),							
							'items' => array(
								array(
									'value' => '0',
									'label' => __('White style and dark fonts', 'rehub-framework'),
								),
								array(
									'value' => '1',
									'label' => __('Dark style and white fonts', 'rehub-framework'),
								),
							),
							'default' => array(
								'0',
							),
						),
						 array(
							'type' => 'color',
							'name' => 'rehub_custom_color_top',
							'label' => __('Custom color for top line of header', 'rehub-framework'),
							'description' => __('Or leave blank for default color', 'rehub-framework'),
							'format' => 'hex',
							
						),	
						 array(
							'type' => 'color',
							'name' => 'rehub_custom_color_top_font',
							'label' => __('Custom color of menu font for top line of header', 'rehub-framework'),
							'description' => __('Or leave blank for default color', 'rehub-framework'),
							'format' => 'hex',				
						),
						array(
							'type' => 'textbox',
							'name' => 'rehub_top_line_content',
							'label' => __('Add custom content to top line', 'rehub-framework'),
						),																					
					),
				),											
			),
		),
		array(
			'title' => __('Footer Options', 'rehub-framework'),
			'name' => 'menu_3',
			'icon' => 'font-awesome:fa-caret-square-down',
			'controls' => array(
				array(
					'type' => 'section',
					'title' => __('Footer options', 'rehub-framework'),
					'fields' => array(
						array(
							'type' => 'toggle',
							'name' => 'rehub_footer_widgets',
							'label' => __('Footer Widgets', 'rehub-framework'),
							'description' => __('Enable or Disable the footer widget area', 'rehub-framework'),
							'default' => '1',
						),
						array(
							'type' => 'select',
							'name' => 'footer_style',
							'label' => __('Choose color style of footer widget section', 'rehub-framework'),							
							'items' => array(
								array(
									'value' => '0',
									'label' => __('Dark style and white fonts', 'rehub-framework'),
								),
								array(
									'value' => '1',
									'label' => __('White style and dark fonts', 'rehub-framework'),
								),
							),
							'default' => array(
								'0',
							),
						),
						array(
							'type' => 'color',
							'name' => 'footer_color_background',
							'label' => __('Custom Background Color', 'rehub-framework'),
							'description' => __('Choose the background color or leave blank for default', 'rehub-framework'),
							'format' => 'hex',	
						),
						array(
							'type' => 'upload',
							'name' => 'footer_background_image',
							'label' => __('Custom Background Image', 'rehub-framework'),
							'description' => __('Upload a background image or leave blank', 'rehub-framework'),
							'default' => '',
							
						),
						array(
							'type' => 'select',
							'name' => 'footer_background_repeat',
							'label' => __('Background Repeat', 'rehub-framework'),
							'items' => array(
								array(
									'value' => 'repeat',
									'label' => __('Repeat', 'rehub-framework'),
								),
								array(
									'value' => 'no-repeat',
									'label' => __('No Repeat', 'rehub-framework'),
								),
								array(
									'value' => 'repeat-x',
									'label' => __('Repeat X', 'rehub-framework'),
								),
								array(
									'value' => 'repeat-y',
									'label' => __('Repeat Y', 'rehub-framework'),
								),
							),
							
						),
						array(
							'type' => 'select',
							'name' => 'footer_background_position',
							'label' => __('Background Position', 'rehub-framework'),
							'items' => array(
								array(
									'value' => 'left',
									'label' => 'Left',
								),
								array(
									'value' => 'center',
									'label' => 'Center',
								),
								array(
									'value' => 'right',
									'label' => 'Right',
								),
							),													
						),	
						array(
							'type' => 'select',
							'name' => 'footer_style_bottom',
							'label' => __('Choose color style of bottom section', 'rehub-framework'),							
							'items' => array(
								array(
									'value' => '0',
									'label' => __('Dark style and white fonts', 'rehub-framework'),
								),
								array(
									'value' => '1',
									'label' => __('White style and dark fonts', 'rehub-framework'),
								),
							),
							'default' => array(
								'0',
							),
						),						
						array(
							'type' => 'textarea',
							'name' => 'rehub_footer_text',
							'label' => __('Footer Bottom Text', 'rehub-framework'),
							'description' => __('Enter your copyright text or whatever you want right here.', 'rehub-framework'),
							'default' => '2019 Wpsoul.com Design. All rights reserved.',
						),
						array(
							'type' => 'upload',
							'name' => 'rehub_footer_logo',
							'label' => __('Upload Logo for footer', 'rehub-framework'),
							'description' => __('Upload your logo for footer.', 'rehub-framework'),
							'default' => '',
						),																
					),
				),
			),
		),
		array(
			'title' => __('Mobile & AMP', 'rehub-framework'),
			'name' => 'menu_mobile',
			'icon' => 'font-awesome:fa-mobile',
			'controls' => array(
				array(
					'type' => 'section',
					'title' => __('General', 'rehub-framework'),
					'fields' => array(
						array(
							'type' => 'toggle',
							'name' => 'rehub_logo_inmenu',
							'label' => __('Enable compact logo of header on mobiles', 'rehub-framework'),
							'description' => __('This will add logo to menu row and disable top section in mobile view', 'rehub-framework'),
							'default' => '0',
						),	
						array(
							'type' => 'upload',
							'name' => 'rehub_logo_inmenu_url',
							'label' => __('Upload Logo for mobiles', 'rehub-framework'),
							'description' => __('Upload your logo. Max height is 40px. By default, your main logo will be used', 'rehub-framework'),
							'default' => '',
							'dependency' => array(
	                        	'field' => 'rehub_logo_inmenu',
	                        	'function' => 'vp_dep_boolean',
	                        ),							
						),						
					),
				),
				array(
					'type' => 'section',
					'title' => __('Mobile Sliding panel', 'rehub-framework'),
					'fields' => array(	
						array(
							'type' => 'upload',
							'name' => 'logo_mobilesliding',
							'label' => __('Enable logo in sliding mobile panel', 'rehub-framework'),			
						),	
						array(
							'type' => 'upload',
							'name' => 'bg_mobilesliding',
							'label' => __('Enable background under logo', 'rehub-framework'),			
						),
						array(
							'type' => 'color',
							'name' => 'color_mobilesliding',
							'label' => __('Background color under logo', 'rehub-framework'),	
							'format' => 'hex',							
						),						
						array(
							'type' => 'textarea',
							'name' => 'text_mobilesliding',
							'label' => __('Add custom element or shortcode', 'rehub-framework'),
						),														
					),
				),			
				array(
					'type' => 'section',
					'title' => __('AMP', 'rehub-framework'),
					'fields' => array(
						 array(
							'type' => 'notebox',
							'name' => 'rehub_single_before_post_note',
							'label' => __('Note', 'rehub-framework'),
							'description' => __('Read about setup for', 'rehub-framework').' <a href="https://wpsoul.com/amp-wordpress-setup/" target="_blank">AMP,</a> <a href="https://wpsoul.com/create-mobile-app-wordpress/" target="_blank">mobile App</a>',
							'status' => 'info',
						),		
						array(
							'type' => 'upload',
							'name' => 'rehub_logo_amp',
							'label' => __('Load logo for AMP version', 'rehub-framework'),
							'description' => __('Recommended size is 190*36', 'rehub-framework'),
							'default' => '',
						),									
						array(
							'type' => 'textbox',
							'name' => 'amp_fb_id',
							'label' => __('Facebook AP ID', 'rehub-framework'),
						),	
						array(
							'type' => 'textarea',
							'name' => 'amp_custom_in_header_top',
							'label' => __('Before Title', 'rehub-framework'),
						),														
						array(
							'type' => 'textarea',
							'name' => 'amp_custom_in_header',
							'label' => __('Before content', 'rehub-framework'),
						),		
						array(
							'type' => 'textarea',
							'name' => 'amp_custom_in_footer',
							'label' => __('After content', 'rehub-framework'),
						),
						array(
							'type' => 'textarea',
							'name' => 'amp_custom_in_head_section',
							'label' => __('Header section', 'rehub-framework'),
							'description'=> __('Insert custom code for head section before closed HEAD tag', 'rehub-framework'),						
						),
						array(
							'type' => 'textarea',
							'name' => 'amp_custom_in_footer_section',
							'label' => __('Footer section', 'rehub-framework'),
							'description'=> __('Insert custom code for footer section, before closed BODY tag', 'rehub-framework'),
						),	
						array(
							'type' => 'toggle',
							'name' => 'amp_disable_default',
							'label' => __('Disable default Merriweather font', 'rehub-framework'),
							'default' => '0',
						),
						array(
							'type' => 'toggle',
							'name' => 'amp_default_css_disable',
							'label' => __('Disable default amp styles of theme. Disable this only if you have custom plugin for AMP', 'rehub-framework'),
							'default' => '0',
						),										
						array(
							'type' => 'textarea',
							'name' => 'amp_custom_css',
							'label' => __('Custom css', 'rehub-framework'),
						),																													
					),
				),			
			),
		),	
		array(
			'title' => __('Loop customization', 'rehub-framework'),
			'name' => 'menu_loop',
			'icon' => 'font-awesome:fa-file-alt',
			'controls' => array(
				array(
					'type' => 'section',
					'title' => __('Woocommerce Loop', 'rehub-framework'),
					'fields' => array(							
						array(
							'type' => 'toggle',
							'name' => 'woo_btn_disable',
							'label' => __('Disable button in ALL product loops?', 'rehub-framework'),
							'default' => '0',
						),
						array(
							'type' => 'toggle',
							'name' => 'woo_compact_loop_btn',
							'label' => __('Enable button in compact grid', 'rehub-framework'),
							'description' => __('Will not work if you disable buttons in previous field', 'rehub-framework'),						
							'default' => '0',
						),	
						array(
							'type' => 'select',
							'name' => 'price_meta_woogrid',
							'label' => __('Show in price area of deal grid', 'rehub-framework'),
							'items' => array(
								array(
									'value' => '1',
									'label' => __('Price + Content Egg synchronized offer', 'rehub-framework'),
								),	
								array(
									'value' => '2',
									'label' => __('Brand logo + Price', 'rehub-framework'),
								),	
								array(
									'value' => '3',
									'label' => __('Only Price', 'rehub-framework'),
								),	
								array(
									'value' => '4',
									'label' => __('Nothing', 'rehub-framework'),
								),																				
							),
							'default' => array(
								'1',
							),
						),														
						array(
							'type' => 'toggle',
							'name' => 'woo_aff_btn',
							'label' => __('Enable affiliate links instead inner?', 'rehub-framework'),
							'default' => '0',
						),
						array(
							'type' => 'textbox',
							'name' => 'wooloop_image_size',
							'label' => __('Custom size for loop images', 'rehub-framework'),
							'description' => __('Add your size as width-height, example, 300-250', 'rehub-framework'),	
						),
						array(
							'type' => 'color',
							'name' => 'wooloop_heading_color',
							'label' => __('Headings color', 'rehub-framework'),
							'format' => 'hex',							
						),
						array(
					        'type' => 'textbox',
					        'name' => 'wooloop_heading_size',
					        'label' => __('Heading Font size', 'rehub-framework'),
					        'default' => '',
					        'validation' => 'numeric',
						),					
						array(
							'type' => 'color',
							'name' => 'wooloop_price_color',
							'label' => __('Price color', 'rehub-framework'),
							'format' => 'hex',							
						),
						array(
					        'type' => 'textbox',
					        'name' => 'wooloop_price_size',
					        'label' => __('Price Font size', 'rehub-framework'),
					        'default' => '',
					        'validation' => 'numeric',
						),					
						array(
							'type' => 'color',
							'name' => 'wooloop_sale_color',
							'label' => __('Sale tag color', 'rehub-framework'),
							'format' => 'hex',							
						),																																
					),
				),
				array(
					'type' => 'section',
					'title' => __('Post Loop', 'rehub-framework'),
					'fields' => array(
						array(
							'type' => 'toggle',
							'name' => 'disable_btn_offer_loop',
							'label' => __('Disable offer button in ALL loops?', 'rehub-framework'),
							'default' => '0',
						),											
						array(
							'type' => 'toggle',
							'name' => 'rehub_enable_btn_recash',
							'label' => __('Enable button in deal grid layout?', 'rehub-framework'),	
							'description' => __('Will not work if you disable buttons in previous field', 'rehub-framework'),							
							'default' => 0,							
						),		
						array(
							'type' => 'toggle',
							'name' => 'disable_grid_actions',
							'label' => __('Disable comment and thumbs in deal grid layout?', 'rehub-framework'),		
							'default' => 0,							
						),						
						array(
							'type' => 'select',
							'name' => 'price_meta_grid',
							'label' => __('Show in price area of deal grid', 'rehub-framework'),
							'items' => array(
								array(
									'value' => '1',
									'label' => __('User logo + Price', 'rehub-framework'),
								),	
								array(
									'value' => '2',
									'label' => __('Brand logo + Price', 'rehub-framework'),
								),	
								array(
									'value' => '3',
									'label' => __('Only Price', 'rehub-framework'),
								),	
								array(
									'value' => '4',
									'label' => __('Nothing', 'rehub-framework'),
								),																				
							),
							'default' => array(
								'1',
							),
						),
						array(
							'type' => 'toggle',
							'name' => 'disable_inner_links',
							'label' => __('Enable affiliate links from title and image in grid?', 'rehub-framework'),		
							'default' => 0,							
						),																		
						array(
							'type' => 'toggle',
							'name' => 'rehub_enable_expand',
							'label' => __('Enable expand button in list layout?', 'rehub-framework'),
					        'description' => __('Sometimes can be buggy', 'rehub-framework'),							
							'default' => 0,							
						),	
						array(
					        'type' => 'slider',
					        'name' => 'hot_max',
					        'label' => __('Hottest value', 'rehub-framework'),
					        'description' => __('After hot metter reach this value, scale will have hot image and 100 percent fill + will be used in hottest filter', 'rehub-framework'),
					        'min' => '5',
					        'max' => '500',
					        'step' => '5',
					        'default' => '10',
						),
						array(
					        'type' => 'slider',
					        'name' => 'hot_min',
					        'label' => __('Coldest value', 'rehub-framework'),
					        'description' => __('After hot metter reach this value, scale will have cold image and 100 percent fill of cold', 'rehub-framework'),
					        'min' => '-500',
					        'max' => '-10',
					        'step' => '5',
					        'default' => '-10',
						),																					
					),
				),
				array(
					'type' => 'section',
					'title' => __('Other', 'rehub-framework'),
					'fields' => array(
						array(
							'type' => 'textbox',
							'name' => 'featured_fallback_img',
							'label' => __('Url to custom fallback image for Featured Images', 'rehub-framework'),	
						),															
					),
				),						
			),
		),
		array(
			'title' => __('Shop settings', 'rehub-framework'),
			'name' => 'menu_woo',
			'icon' => 'font-awesome:fa-barcode',
			'controls' => array(				
				array(
					'type' => 'section',
					'title' => __('General settings', 'rehub-framework'),
					'fields' => array(				
						array(
							'type' => 'select',
							'name' => 'woo_columns',
							'label' => __('How to show archives', 'rehub-framework'),
							'items' => array(
								array(
								'value' => '3_col',
								'label' => __('As 3 columns with sidebar', 'rehub-framework'),
								),
								array(
								'value' => '4_col',
								'label' => __('As 4 columns full width', 'rehub-framework'),
								),
								array(
								'value' => '4_col_side',
								'label' => __('As 4 columns + sidebar', 'rehub-framework'),
								),	
								array(
								'value' => '5_col_side',
								'label' => __('As 5 columns + sidebar', 'rehub-framework'),
								),																					
							),
							'default' => '3_col',
							'description' => __('Use 5 columns only in Extended Width Layout (Theme option - General - Width Style) and 30 products in loop', 'rehub-framework'),		
						),	
						array(
							'type' => 'toggle',
							'name' => 'rehub_sidebar_left_shop',
							'label' => __('Set sidebar to left side?', 'rehub-framework'),
							'default' => '0',
						),
						array(
							'type' => 'toggle',
							'name' => 'sidebar_mobile_shop',
							'label' => __('Mobile sliding sidebar on click?', 'rehub-framework'),
							'default' => '0',
						),												
						array(
							'type' => 'select',
							'name' => 'woo_design',
							'label' => __('Set design of woo archive', 'rehub-framework'),
							'items' => array(
								array(
								'value' => 'simple',
								'label' => __('Columns', 'rehub-framework'),
								),
								array(
								'value' => 'grid',
								'label' => __('Grid', 'rehub-framework'),
								),
								array(
								'value' => 'gridtwo',
								'label' => __('Compact Grid', 'rehub-framework'),
								),	
								array(
								'value' => 'gridrev',
								'label' => __('Directory Grid', 'rehub-framework'),
								),														
								array(
								'value' => 'list',
								'label' => __('List', 'rehub-framework'),
								),														
							),
							'default' => 'simple',
						),
						array(
							'type' => 'select',
							'name' => 'woo_number',
							'label' => __('Set count of products in loop', 'rehub-framework'),
							'items' => array(
								array(
								'value' => '12',
								'label' => __('12', 'rehub-framework'),
								),
								array(
								'value' => '16',
								'label' => __('16', 'rehub-framework'),
								),	
								array(
								'value' => '24',
								'label' => __('24', 'rehub-framework'),
								),
								array(
								'value' => '30',
								'label' => __('30', 'rehub-framework'),
								),																					
							),
							'default' => '12',
						),	
						array(
							'type' => 'select',
							'name' => 'product_layout_style',
							'label' => __('Product layout', 'rehub-framework'),
							'default' => 'normal_post',
							'items' => array(
								'data' => array(
									array(
										'source' => 'function',
										'value'  => 'rehub_get_product_layout_array',
									),
								),
							),
							'default' => array(
								'default_with_sidebar',
							),
						),																				
					),
				),
				array(
					'type' => 'section',
					'title' => __('Custom Code Areas', 'rehub-framework'),
					'fields' => array(
						array(
							'type' => 'textarea',
							'name' => 'woo_code_zone_button',
							'label' => __('After Button Area', 'rehub-framework'),
							'description' => __('This code zone is visible on all products after Add to cart Button', 'rehub-framework'),
							'default' => '',
						),
						array(
							'type' => 'textarea',
							'name' => 'woo_code_zone_content',
							'label' => __('Before Content', 'rehub-framework'),
							'description' => __('This code zone is visible on all products before Content', 'rehub-framework'),
							'default' => '',
						),	
						array(
							'type' => 'textarea',
							'name' => 'woo_code_zone_footer',
							'label' => __('Before footer', 'rehub-framework'),
							'description' => __('This code zone is visible on all products Before Footer', 'rehub-framework'),
							'default' => '',
						),	
						array(
							'type' => 'textarea',
							'name' => 'woo_code_zone_float',
							'label' => __('In floating panel', 'rehub-framework'),
							'default' => '',
						),					
						array(
							'type' => 'textarea',
							'name' => 'woo_code_zone_loop',
							'label' => __('Code zone inside product loop', 'rehub-framework'),
							'description' => __('This code zone is visible on shop pages inside each product item.', 'rehub-framework').' <a href="https://wpsoul.com/make-smart-profitable-deal-affiliate-comparison-site-woocommerce/#featured-attributes-area-in-product-grid">Read more about code zones</a>',
							'default' => '',
						),														
					),
				),
				array(
					'type' => 'section',
					'title' => __('Enable/Disable', 'rehub-framework'),
					'fields' => array(
						array(
							'type' => 'toggle',
							'name' => 'woo_btn_inner_disable',
							'label' => __('Disable button inside Product page', 'rehub-framework'),
							'default' => '0',
						),					
						array(
							'type' => 'toggle',
							'name' => 'disable_woo_scripts',
							'label' => __('Disable Woocommerce Cart scripts', 'rehub-framework'),
							'description' => __('This will disable All Cart scripts of woocommerce. Use this only when you use woocommerce for affiliate site without cart', 'rehub-framework'),
							'default' => '0',
						),					
						array(
							'type' => 'toggle',
							'name' => 'woo_exclude_expired',
							'label' => __('Exclude expired products?', 'rehub-framework'),
							'description' => __('This option can slow your shop pages (if you have many products)', 'rehub-framework'),		
							'default' => '0',
						),															
						array(
							'type' => 'toggle',
							'name' => 'woo_enable_share',
							'label' => __('Enable share buttons on product page?', 'rehub-framework'),
							'default' => '0',
						),					
						array(
							'type' => 'select',
							'name' => 'woo_cart_place',
							'label' => __('Place for cart icon', 'rehub-framework'),
							'items' => array(
								array(
								'value' => '0',
								'label' => __('No place', 'rehub-framework'),
								),
								array(
								'value' => '1',
								'label' => __('In top line', 'rehub-framework'),
								),	
								array(
								'value' => '2',
								'label' => __('In main menu', 'rehub-framework'),
								),														
							),
							'default' => 'simple',
						),																			
					),
				),	
				array(
					'type' => 'section',
					'title' => __('Synchronizations', 'rehub-framework'),
					'fields' => array(
						array(
							'type' => 'toggle',
							'name' => 'wooregister_xprofile',
							'label' => __('Add xprofile fields to register form?', 'rehub-framework'),
							'description' => __('Set additional fields in User - Profile fields. Works only with enabled Buddypress', 'rehub-framework'),
							'default' => '0',
						),						
						array(
							'type' => 'toggle',
							'name' => 'post_sync_with_user_location',
							'label' => __('Synchronize product and user location?', 'rehub-framework'),
							'description' => __('This works for Geo My wordpress plugin. If user has location and adds a product, product will have also his location automatically', 'rehub-framework'),
							'default' => '0',
						),													
					),
				),					
				array(
					'type' => 'section',
					'title' => __('Vendor settings', 'rehub-framework'),
					'fields' => array(
						array(
							'type' => 'upload',
							'name' => 'wcv_vendor_bg',
							'label' => __('Default background on store page', 'rehub-framework'),
							'description' => __('This background will be used if user don\'t specify background for shop', 'rehub-framework'),
							'default' => '',
						),	
						array(
							'type' => 'upload',
							'name' => 'wcv_vendor_avatar',
							'label' => __('Default store logo on store page', 'rehub-framework'),
							'description' => __('This logo will be used if user don\'t specify logo for shop. Recommended size is 150x150', 'rehub-framework'),
							'default' => '',
						),	
						array(
							'type' => 'textbox',
							'name' => 'url_for_add_product',
							'label' => __('Add url of submit product page', 'rehub-framework'),
							'description' => __('Use it if you want to change default submit page of WC Vendor Free. You can use our RH Frontend PRO plugin to create frontend form for woocommerce. Find it in Rehub-Plugins', 'rehub-framework'),					
						),
						array(
							'type' => 'textbox',
							'name' => 'url_for_edit_product',
							'label' => __('Add url of edit product page', 'rehub-framework'),					
						),														
					),
				),			
			),
		),
		array(
			'title' => __('Affiliate', 'rehub-framework'),
			'name' => 'menu_aff',
			'icon' => 'font-awesome:fa-money-bill-alt',
			'controls' => array(
				array(
					'type' => 'section',
					'title' => __('Content Egg synchronization', 'rehub-framework'),
					'fields' => array(					
						array(
							'type' => 'multiselect',
							'name' => 'save_meta_for_ce',
							'label' => __('Save data from Content Egg to post offer section', 'rehub-framework'),
							'description' => __('This option will store data from Content Egg modules to main offer of post. Works only with enabled Content Egg plugin', 'rehub-framework'),	
							'items' => array(
								'data' => array(
									array(
										'source' => 'function',
										'value' => 'get_ce_modules_id_for_sinc',
									),
								),
							),
							'default' => '',
						),
						array(
							'type' => 'textbox',
							'name' => 'ce_custom_currency',
							'label' => __('Custom currency', 'rehub-framework'),
							'description' => __('Use this if you want to convert all prices of Content Egg into your currency. Currency in ISO 4217. Example: USD or EUR', 'rehub-framework'),							
						),																						
					),
				),
				array(
					'type' => 'section',
					'title' => __('CashBack Options', 'rehub-framework'),
					'fields' => array(
						array(
							'type' => 'toggle',
							'name' => 'enable_user_sub_id',
							'label' => __('Add user info as sub ID to links', 'rehub-framework'),
							'default' => '0',							
						),	
						array(
							'type' => 'select',
							'name' => 'sub_id_show',
							'label' => __('Which info you want to use', 'rehub-framework'),
							'items' => array(
								array(
									'value' => 'id',
									'label' => __('User ID', 'rehub-framework'),
								),
								array(
									'value' => 'name',
									'label' => __('User login name', 'rehub-framework'),
								),																
								array(
									'value' => 'author',
									'label' => __('Login name of author of post', 'rehub-framework'),
								),
								array(
									'value' => 'authorid',
									'label' => __('ID of author of post', 'rehub-framework'),
								),																		
							),						
						),						
						array(
							'type' => 'textarea',
							'name' => 'custom_sub_id',
							'label' => __('Set custom url parameter for sub ID', 'rehub-framework'),
							'description' => __('default is subid= Make sure that you added symbol = or other which is used in your network for parameters. If you have several networks, add them from separate line. Example is next - amazon.com@subid=, where amazon.com is domain of link and subid is url parameter. Default subid which will be triggered for all other links can be added in last line without domain. If you want to exclude some domain, add them like domain.com@exclude, this will not add subid parameters to them', 'rehub-framework'),
							'dependency' => array(
	                        	'field' => 'enable_user_sub_id',
	                        	'function' => 'vp_dep_boolean',
	                        ),												
						),	
						array(
							'type' => 'textbox',
							'name' => 'cashback_points',
							'label' => __('Set key of Mycred points for cashback', 'rehub-framework'),
							'description' => __('Set custom point key where you store approved cashback points', 'rehub-framework'),												
						),					
					),
				),				
				array(
					'type' => 'section',
					'title' => __('Other', 'rehub-framework'),
					'fields' => array(
						array(
							'type' => 'toggle',
							'name' => 'rehub_post_exclude_expired',
							'label' => __('Hide all expired offers', 'rehub-framework'),
							'description' => __('This will hide expired offers for archives', 'rehub-framework'),
							'default' => '0',							
						),										
						array(
							'type' => 'toggle',
							'name' => 'enable_brand_taxonomy',
							'label' => __('Enable Affiliate Store taxonomy for posts', 'rehub-framework'),
							'description' => __('When enabled, save permalinks in Settings - Permalinks', 'rehub-framework'),			
							'default' => '0',							
						),
						array(
							'type' => 'select',
							'name' => 'brand_taxonomy_layout',
							'label' => __('Select Affiliate Store Layout', 'rehub-framework'),
							'items' => array(
								array(
									'value' => 'compact_list',
									'label' => __('Compact List', 'rehub-framework'),
								),								
								array(
									'value' => 'regular_list',
									'label' => __('Regular List Layout', 'rehub-framework'),
								),	
								array(
									'value' => 'deal_grid',
									'label' => __('Deal grid', 'rehub-framework'),
								),
								array(
									'value' => 'regular_grid',
									'label' => __('Regular grid', 'rehub-framework'),
								),
								array(
									'value' => 'compact_grid',
									'label' => __('Compact grid', 'rehub-framework'),
								),																														
							),
							'default' => array(
								'compact_list',
							),
							'dependency' => array(
	                        	'field' => 'enable_brand_taxonomy',
	                        	'function' => 'vp_dep_boolean',
	                        ),						
						),						
						array(
							'type' => 'textbox',
							'name' => 'rehub_deal_store_tag',
							'label' => __('Set custom link slug for Affiliate Store. Update permalinks after this in Settings - permalinks', 'rehub-framework'),							
						),	
						array(
							'type' => 'toggle',
							'name' => 'enable_blog_posttype',
							'label' => __('Enable separate blog post type', 'rehub-framework'),
							'description' => __('When enabled, save permalinks in Settings - Permalinks', 'rehub-framework'),													
							'default' => '0',							
						),
						array(
							'type' => 'select',
							'name' => 'blog_layout_style',
							'label' => __('Blog layout', 'rehub-framework'),
							'default' => 'normal_post',
							'dependency' => array(
	                        	'field' => 'enable_blog_posttype',
	                        	'function' => 'vp_dep_boolean',
	                        ),						
							'items' => array(
								'data' => array(
									array(
										'source' => 'function',
										'value'  => 'rehub_get_post_layout_array',
									),
								),
							),
							'default' => array(
								'default',
							),
						),					
						array(
							'type' => 'textbox',
							'name' => 'blog_posttype_slug',
							'label' => __('Set custom blog permalink slug for Blog. Update permalinks after this in Settings - permalinks', 'rehub-framework'),	
							'dependency' => array(
	                        	'field' => 'enable_blog_posttype',
	                        	'function' => 'vp_dep_boolean',
	                        ),												
						),	
						array(
							'type' => 'textbox',
							'name' => 'blog_posttypecat_slug',
							'label' => __('Set custom blog permalink slug for Blog Category. Update permalinks after this in Settings - permalinks', 'rehub-framework'),	
							'dependency' => array(
	                        	'field' => 'enable_blog_posttype',
	                        	'function' => 'vp_dep_boolean',
	                        ),												
						),	
						array(
							'type' => 'textbox',
							'name' => 'blog_posttypetag_slug',
							'label' => __('Set custom blog permalink slug for Blog Tag. Update permalinks after this in Settings - permalinks', 'rehub-framework'),	
							'dependency' => array(
	                        	'field' => 'enable_blog_posttype',
	                        	'function' => 'vp_dep_boolean',
	                        ),												
						),													
						array(
							'type' => 'select',
							'name' => 'blog_archive_layout',
							'label' => __('Select Blog Archive Layout', 'rehub-framework'),
							'description' => __('Select what kind of post string layout you want to use for blog  archives', 'rehub-framework'),
							'items' => array(
								array(
									'value' => 'big_blog',
									'label' => __('Big images Blog Layout', 'rehub-framework'),
								),								
								array(
									'value' => 'list_blog',
									'label' => __('List Layout with left thumbnails', 'rehub-framework'),
								),	
								array(
									'value' => 'grid_blog',
									'label' => __('Grid layout', 'rehub-framework'),
								),
								array(
									'value' => 'cardblog',
									'label' => __('Cards', 'rehub-framework'),
								),
								array(
									'value' => 'cardblogfull',
									'label' => __('Full width Cards', 'rehub-framework'),
								),																
								array(
									'value' => 'gridfull_blog',
									'label' => __('Full width Grid layout', 'rehub-framework'),
								),																							
							),
							'default' => array(
								'list_blog',
							),
							'dependency' => array(
	                        	'field' => 'enable_blog_posttype',
	                        	'function' => 'vp_dep_boolean',
	                        ),						
						),			
					),
				),						
			),
		),
		array(
			'title' => __('Fonts Options', 'rehub-framework'),
			'name' => 'menu_7',
			'icon' => 'font-awesome:fa-font',
			'controls' => array(
				array(
					'type' => 'section',
					'title' => __('General', 'rehub-framework'),
					'fields' => array(
						array(
							'type' => 'toggle',
							'name' => 'disable_google_fonts',
							'label' => __('Enable Inner Storage of Google Fonts', 'rehub-framework'),
							'description' => 'Read how to use Inner Storage for Google Fonts <a href=" http://rehubdocs.wpsoul.com/docs/rehub-framework/how-to/local-google-fonts-for-gdpr/" target="_blank">in tutorial</a>',
							'default' => '0',
						),	
						array(
							'type' => 'toggle',
							'name' => 'disable_default_fonts',
							'label' => __('Disable default fonts of theme', 'rehub-framework'),
							'default' => '0',
						),															
					),
				),				

				array(
					'type' => 'section',
					'title' => __('Navigation Font', 'rehub-framework'),
					'fields' => array(						
						array(
							'type' => 'select',
							'name' => 'rehub_nav_font',
							'label' => __('Navigation Font Family', 'rehub-framework'),
							'description' => __('Font for navigation', 'rehub-framework'),
							'items' => array(
								'data' => array(
									array(
										'source' => 'function',
										'value' => 'vp_get_gwf_family',
									),
								),
							),
						),
						array(
							'type' => 'radiobutton',
							'name' => 'rehub_nav_font_style',
							'label' => __('Font Style', 'rehub-framework'),
							'items' => array(
								'data' => array(
									array(
										'source' => 'binding',
										'field' => 'rehub_nav_font',
										'value' => 'vp_get_gwf_style',
									),
								),
							),
							'default' => array(
								'{{first}}',
							),							
						),
						array(
							'type' => 'radiobutton',
							'name' => 'rehub_nav_font_weight',
							'label' => __('Font Weight', 'rehub-framework'),
							'items' => array(
								'data' => array(
									array(
										'source' => 'binding',
										'field' => 'rehub_nav_font',
										'value' => 'vp_get_gwf_weight',
									),
								),
							),
						),
						array(
							'type' => 'multiselect',
							'name' => 'rehub_nav_font_subset',
							'label' => __('Font Subset', 'rehub-framework'),
							'items' => array(
								'data' => array(
									array(
										'source' => 'binding',
										'field' => 'rehub_nav_font',
										'value' => 'vp_get_gwf_subset',
									),
								),
							),
							'default' => 'latin',
						),												
					),
				),//END NAV FONT

				array(
					'type' => 'section',
					'title' => __('Headings Font', 'rehub-framework'),
					'fields' => array(						
						array(
							'type' => 'select',
							'name' => 'rehub_headings_font',
							'label' => __('Headings Font Family', 'rehub-framework'),
							'description' => __('Font for headings in text, sidebar, footer', 'rehub-framework'),
							'items' => array(
								'data' => array(
									array(
										'source' => 'function',
										'value' => 'vp_get_gwf_family',
									),
								),
							),
						),
						array(
							'type' => 'radiobutton',
							'name' => 'rehub_headings_font_style',
							'label' => __('Font Style', 'rehub-framework'),
							'items' => array(
								'data' => array(
									array(
										'source' => 'binding',
										'field' => 'rehub_headings_font',
										'value' => 'vp_get_gwf_style',
									),
								),
							),
							'default' => array(
								'{{first}}',
							),							
						),
						array(
							'type' => 'radiobutton',
							'name' => 'rehub_headings_font_weight',
							'label' => __('Font Weight', 'rehub-framework'),
							'items' => array(
								'data' => array(
									array(
										'source' => 'binding',
										'field' => 'rehub_headings_font',
										'value' => 'vp_get_gwf_weight',
									),
								),
							),
						),
						array(
							'type' => 'multiselect',
							'name' => 'rehub_headings_font_subset',
							'label' => __('Font Subset', 'rehub-framework'),
							'items' => array(
								'data' => array(
									array(
										'source' => 'binding',
										'field' => 'rehub_headings_font',
										'value' => 'vp_get_gwf_subset',
									),
								),
							),
							'default' => 'latin',
						),
						array(
							'type' => 'toggle',
							'name' => 'rehub_headings_font_upper',
							'label' => __('Enable uppercase?', 'rehub-framework'),
							'default' => '0',							
						),												
					),
				),//END Headings FONT

				array(
					'type' => 'section',
					'title' => __('Body Font', 'rehub-framework'),
					'fields' => array(						
						array(
							'type' => 'select',
							'name' => 'rehub_body_font',
							'label' => __('Body Font Family', 'rehub-framework'),
							'description' => __('Font for body text', 'rehub-framework'),
							'items' => array(
								'data' => array(
									array(
										'source' => 'function',
										'value' => 'vp_get_gwf_family',
									),
								),
							),
						),
						array(
							'type' => 'radiobutton',
							'name' => 'rehub_body_font_style',
							'label' => __('Font Style', 'rehub-framework'),
							'items' => array(
								'data' => array(
									array(
										'source' => 'binding',
										'field' => 'rehub_body_font',
										'value' => 'vp_get_gwf_style',
									),
								),
							),
							'default' => array(
								'{{first}}',
							),							
						),
						array(
							'type' => 'radiobutton',
							'name' => 'rehub_body_font_weight',
							'label' => __('Font Weight', 'rehub-framework'),
							'items' => array(
								'data' => array(
									array(
										'source' => 'binding',
										'field' => 'rehub_body_font',
										'value' => 'vp_get_gwf_weight',
									),
								),
							),
						),
						array(
							'type' => 'multiselect',
							'name' => 'rehub_body_font_subset',
							'label' => __('Font Subset', 'rehub-framework'),
							'items' => array(
								'data' => array(
									array(
										'source' => 'binding',
										'field' => 'rehub_body_font',
										'value' => 'vp_get_gwf_subset',
									),
								),
							),
							'default' => 'latin',
						),	
						array(
							'type' => 'textbox',
							'name' => 'body_font_size',
							'label' => __('Set body font size', 'rehub-framework'),
							'description' => __('Set font size in px', 'rehub-framework'),
						),											
					),
				),//END Body FONT


			),
		),
		array(
			'title' => __('Global Enable/Disable', 'rehub-framework'),
			'name' => 'menu_8',
			'icon' => 'font-awesome:fa-globe',
			'controls' => array(		
				array(
					'type' => 'section',
					'title' => __('Global options', 'rehub-framework'),
					'fields' => array(
						array(
							'type' => 'toggle',
							'name' => 'rh_image_resize',
							'label' => __('Disable resize for Featured images', 'rehub-framework'),
							'description' => __('Will be used 100% original image. Can slow down a site.', 'rehub-framework'),
							'default' => '0',
						),	
						array(
							'type' => 'toggle',
							'name' => 'enable_lazy_images',
							'label' => __('Enable lazyload script on thumbnails for better image perfomance. Sometimes can be buggy with other scripts', 'rehub-framework'),
							'default' => '1',
						),											
						array(
							'type' => 'toggle',
							'name' => 'repick_social_disable',
							'label' => __('Disable social buttons on images', 'rehub-framework'),
							'description' => __('Enable/Disable buttons in grid loop', 'rehub-framework'),
							'default' => '0',
						),											
						array(
							'type' => 'toggle',
							'name' => 'exclude_author_meta',
							'label' => __('Disable author link', 'rehub-framework'),
							'description' => __('Disable author link from meta in string', 'rehub-framework'),
							'default' => '0',
						),
						array(
							'type' => 'toggle',
							'name' => 'exclude_cat_meta',
							'label' => __('Disable category link', 'rehub-framework'),
							'description' => __('Disable category link from meta in string', 'rehub-framework'),
							'default' => '0',
						),	
						array(
							'type' => 'toggle',
							'name' => 'exclude_date_meta',
							'label' => __('Disable date', 'rehub-framework'),
							'description' => __('Disable date from meta in string', 'rehub-framework'),
							'default' => '0',
						),
						array(
							'type' => 'toggle',
							'name' => 'exclude_comments_meta',
							'label' => __('Disable comments count', 'rehub-framework'),
							'description' => __('Disable comments count from meta in string', 'rehub-framework'),
							'default' => '0',
						),	
						array(
							'type' => 'toggle',
							'name' => 'hotmeter_disable',
							'label' => __('Disable hot and thumb metter', 'rehub-framework'),
							'default' => '0',
						),
						array(
							'type' => 'toggle',
							'name' => 'wishlist_disable',
							'label' => __('Disable wishlist', 'rehub-framework'),
							'default' => '0',
						),					
						array(
							'type' => 'select',
							'name' => 'wishlistpage',
							'label' => __('Select page for Wishlist', 'rehub-framework'),
							'description' => __('By default, second click on heart icon will remove item from wishlist. If you set page here, such click will redirect user to wishlist page. Page must have shortcode [rh_get_user_favorites]', 'rehub-framework'),				
							'items' => array(
								'data' => array(
									array(
										'source' => 'function',
										'value' => 'vp_get_pages',
									),
								),
							),													
						),
						array(
							'type' => 'toggle',
							'name' => 'wish_cache_enabled',
							'label' => __('Wishlist Button Support for Cache plugins', 'rehub-framework'),
							'default' => '0',
						),										
						array(
							'type' => 'toggle',
							'name' => 'thumb_only_users',
							'label' => __('Allow to use hot and thumbs only for logged users', 'rehub-framework'),
							'default' => '0',
						),
						array(
							'type' => 'toggle',
							'name' => 'wish_only_users',
							'label' => __('Allow to use wishlist only for logged users', 'rehub-framework'),
							'default' => '0',
						),										
						array(
							'type' => 'toggle',
							'name' => 'post_view_disable',
							'label' => __('Disable post view script', 'rehub-framework'),
							'default' => '0',
						),		
					),
				),
				array(
					'type' => 'section',
					'title' => __('Global disabling parts on single pages', 'rehub-framework'),
					'fields' => array(
						array(
							'type' => 'multiselect',
							'name' => 'rehub_ptype_formeta',
							'label' => __('Duplicate Post Meta boxes', 'rehub-framework'),
							'description' => __('You can enable Post offer, Post format and Post Thumbnails meta panels for other several post types here (By default, only in Posts)', 'rehub-framework'),
							'items' => array(
								'data' => array(
									array(
										'source' => 'function',
										'value'  => 'rehub_get_cpost_type',
									),
								),
							),
							'default' => '',			
						),																
						array(
							'type' => 'toggle',
							'name' => 'rehub_disable_breadcrumbs',
							'label' => __('Disable breadcrumbs', 'rehub-framework'),
							'description' => __('Disable breadcrumbs from pages', 'rehub-framework'),
							'default' => '0',
						),

						array(
							'type' => 'toggle',
							'name' => 'rehub_disable_share',
							'label' => __('Disable share buttons', 'rehub-framework'),
							'description' => __('Disable share buttons after content on pages', 'rehub-framework'),
							'default' => '0',
						),	
						array(
							'type' => 'toggle',
							'name' => 'rehub_disable_share_top',
							'label' => __('Disable share buttons', 'rehub-framework'),
							'description' => __('Disable share buttons before content on pages', 'rehub-framework'),
							'default' => '0',
						),	
						array(
							'type' => 'toggle',
							'name' => 'rehub_disable_social_footer',
							'label' => __('Disable share buttons in footer on mobiles', 'rehub-framework'),
							'default' => '0',
						),																	
						array(
							'type' => 'toggle',
							'name' => 'rehub_disable_prev',
							'label' => __('Disable previous and next', 'rehub-framework'),
							'description' => __('Disable previous and next post buttons', 'rehub-framework'),
							'default' => '0',
						),																	
						array(
							'type' => 'toggle',
							'name' => 'rehub_disable_tags',
							'label' => __('Disable tags', 'rehub-framework'),
							'description' => __('Disable tags after content from pages', 'rehub-framework'),
							'default' => '0',
						),
		
						array(
							'type' => 'toggle',
							'name' => 'rehub_disable_author',
							'label' => __('Disable author box', 'rehub-framework'),
							'description' => __('Disable author box after content from pages', 'rehub-framework'),
							'default' => '1',
						),
						array(
							'type' => 'toggle',
							'name' => 'rehub_disable_relative',
							'label' => __('Disable relative posts', 'rehub-framework'),
							'description' => __('Disable relative posts box after content from pages', 'rehub-framework'),
							'default' => '0',
						),
						array(
							'type' => 'toggle',
							'name' => 'rehub_enable_tag_relative',
							'label' => __('Enable relative posts by tags', 'rehub-framework'),
							'description' => __('By default, relative posts use category as base, you can switch to tags', 'rehub-framework'),
							'default' => '0',
						),						
						array(
							'type' => 'toggle',
							'name' => 'rehub_disable_feature_thumb',
							'label' => __('Disable top thumbnail on single page', 'rehub-framework'),
							'default' => '0',
						),						
						array(
							'type' => 'toggle',
							'name' => 'rehub_disable_comments',
							'label' => __('Disable standart comments', 'rehub-framework'),
							'default' => '0',
						),							
						array(
							'type' => 'textarea',
							'name' => 'rehub_widget_comments',
							'label' => __('Insert comments widget code', 'rehub-framework'),
							'description' => __('You can set here comments widget, for example, from disqus', 'rehub-framework'),
						),																											

					),
				),
			),
		),
		array(
			'title' => __('Ads and Code Zones', 'rehub-framework'),
			'name' => 'menu_9',
			'icon' => 'font-awesome:fa-bullhorn',
			'controls' => array(
				array(
					'type' => 'section',
					'title' => __('Ads code in header and footer', 'rehub-framework'),
					'fields' => array(
						array(
							'type' => 'textarea',
							'name' => 'rehub_ads_top',
							'label' => __('Header area', 'rehub-framework'),
							'description' => __('This banner code will be visible in header. Width of this zone depends on style of header (You can choose it in Header and menu tab)', 'rehub-framework'),
							'default' => '',
						),	
						array(
							'type' => 'textarea',
							'name' => 'rehub_ads_megatop',
							'label' => __('Before header area', 'rehub-framework'),
							'description' => __('This banner code will be visible before header.', 'rehub-framework'),
							'default' => '',
						),
						array(
							'type' => 'textarea',
							'name' => 'rehub_ads_infooter',
							'label' => __('Before footer area', 'rehub-framework'),
							'description' => __('This banner code will be visible before footer', 'rehub-framework'),
							'default' => '',
						),																																				
					),
				),
				array(
					'type' => 'section',
					'title' => __('Global code for single page', 'rehub-framework'),
					'fields' => array(
						array(
							'type' => 'textarea',
							'name' => 'rehub_single_after_title',
							'label' => __('After title area', 'rehub-framework'),
							'description' => __('This code will be visible after title', 'rehub-framework'),
							'default' => '',
						),	
						array(
							'type' => 'textarea',
							'name' => 'rehub_single_before_post',
							'label' => __('Before content area', 'rehub-framework'),
							'description' => __('This code will be visible before post content', 'rehub-framework'),
							'default' => '',
						),	
						 array(
							'type' => 'notebox',
							'name' => 'rehub_single_before_post_note',
							'label' => __('Tips', 'rehub-framework'),
							'description' => __('You can wrap your code with &lt;div class=&quot;right_code&quot;&gt;your ads code&lt;/div&gt; if you want to add right float or &lt;div class=&quot;left_code&quot;&gt;your ads code&lt;/div&gt; for left float. Please, use square ads with width 250-300px for floated ads.', 'rehub-framework'),
							'status' => 'info',
						),																	
						array(
							'type' => 'textarea',
							'name' => 'rehub_single_code',
							'label' => __('After post area', 'rehub-framework'),
							'description' => __('This code will be visible after post', 'rehub-framework'),
							'default' => '',
						),	
						array(
							'type' => 'textarea',
							'name' => 'rehub_shortcode_ads',
							'label' => __('Insert custom ads code for shortcode', 'rehub-framework'),
							'description' => __('You can insert this code in any place of content by shortcode [wpsm_ads1]', 'rehub-framework'),
						),
						array(
							'type' => 'textarea',
							'name' => 'rehub_shortcode_ads_2',
							'label' => __('Insert custom ads code for shortcode', 'rehub-framework'),
							'description' => __('You can insert this code in any place of content by shortcode [wpsm_ads2]', 'rehub-framework'),
						),	
						array(
							'type' => 'textarea',
							'name' => 'rehub_ads_coupon_area',
							'label' => __('Coupon area', 'rehub-framework'),
							'description' => __('This banner code will be visible in coupon modal', 'rehub-framework'),
							'default' => '',
						),																											
					),
				),																
				array(
					'type' => 'section',
					'title' => __('Global branded area', 'rehub-framework'),
					'fields' => array(
						array(
							'type' => 'notebox',
							'name' => 'rehub_branded_banner_note',
							'label' => __('Note', 'rehub-framework'),
							'description' => __('Branded area displays after header. You can set direct link on image or insert any html code or shortcode', 'rehub-framework'),
							'status' => 'normal',							
						),						
						array(
							'type' => 'textarea',
							'name' => 'rehub_branded_banner_image',
							'label' => __('Branded area', 'rehub-framework'),
							'description' => __('Set any custom code or link to image', 'rehub-framework'),
							'default' => '',
						),												
					),
				),

			),
		),
		array(
			'title' => __('Reviews', 'rehub-framework'),
			'name' => 'menu_10',
			'icon' => 'font-awesome:fa-signal',
			'controls' => array(
				array(
					'type' => 'section',
					'title' => __('Reviews, links, rating', 'rehub-framework'),
					'fields' => array(
						array(
							'type' => 'select',
							'name' => 'type_user_review',
							'label' => __('Type of user ratings', 'rehub-framework'),
							'items' => array(
								array(
									'value' => 'simple',
									'label' => __('simple rating, no criterias', 'rehub-framework'),
								),
								array(
									'value' => 'full_review',
									'label' => __('full review with criterias and pros, cons', 'rehub-framework'),
								),	
								array(
									'value' => 'user',
									'label' => __('Show only user\'s reviews with criterias (don\'t show editor\'s review)', 'rehub-framework'),
								),									
								array(
									'value' => 'none',
									'label' => __('none', 'rehub-framework'),
								),																						
							),
							'default' => 'simple',
						),
						array(
							'type' => 'select',
							'name' => 'type_total_score',
							'label' => __('How to calculate total score of review', 'rehub-framework'),
							'items' => array(
								array(
								'value' => 'editor',
								'label' => __('based on Expert Score', 'rehub-framework'),
								),
								array(
								'value' => 'average',
								'label' => __('average (editor\'s and user\'s)', 'rehub-framework'),
								),	
								array(
								'value' => 'user',
								'label' => __('based on user\'s', 'rehub-framework'),
								),																							
							),
							'dependency' => array(
								'field'    => 'type_user_review',
								'function' => 'rehub_framework_rev_type',
							),							
							'default' => 'average',
						),							
						array(
							'type' => 'textbox',
							'name' => 'rehub_user_rev_criterias',
							'label' => __('User review criteria names', 'rehub-framework'),
							'description' => __('Type with commas and no spaces. Example: Design,Price,Battery life', 'rehub-framework'),
							'dependency' => array(
								'field'    => 'type_user_review',
								'function' => 'user_rev_type',
							),							
						),
						array(
							'type' => 'select',
							'name' => 'type_schema_review',
							'label' => __('Type of schema for reviews', 'rehub-framework'),
							'items' => array(
								array(
									'value' => 'editor',
									'label' => __('Based on editor\'s review', 'rehub-framework'),
								),
								array(
									'value' => 'user',
									'label' => __('Based on user reviews', 'rehub-framework'),
								),	
								array(
									'value' => 'none',
									'label' => __('Disable all and use your custom', 'rehub-framework'),
								),																					
							),
							'default' => 'editor',
						),
						array(
							'type' => 'textbox',
							'name' => 'rehub_org_name_review',
							'label' => __('Place organization name', 'rehub-framework'),
							'description' => __('This is for seo purpose. Must be short name. Also, set correct logo width and height in theme option - logo option', 'rehub-framework'),						
						),																							
						array(
							'type' => 'select',
							'name' => 'allowtorate',
							'label' => __('Allow to rate posts', 'rehub-framework'),
							'description' => __('Who can rate review posts?', 'rehub-framework'),
							'items' => array(
								array(
								'value' => 'guests',
								'label' => __('guests', 'rehub-framework'),
								),
								array(
								'value' => 'users',
								'label' => __('users', 'rehub-framework'),
								),
								array(
								'value' => 'guests_users',
								'label' => __('guests and users', 'rehub-framework'),
								),								
								),
							'default' => 'guests_users',
						),					
						array(
							'type' => 'color',
							'name' => 'rehub_review_color',
							'label' => __('Default color for editor\'s review box and total score', 'rehub-framework'),
							'description' => __('Choose the background color or leave blank for default red color', 'rehub-framework'),	
							'format' => 'hex',							
						),	
						array(
							'type' => 'color',
							'name' => 'rehub_review_color_user',
							'label' => __('Default color for user review box and user stars', 'rehub-framework'),
							'description' => __('Choose the background color or leave blank for default blue color', 'rehub-framework'),	
							'format' => 'hex',						
						),																		
					),
				),
				array(
					'type' => 'section',
					'title' => __('Add review fields to RH frontend form', 'rehub-framework'),
					'fields' => array(
						array(
							'type' => 'textarea',
							'name' => 'rh_front_review_fields',
							'label' => __('Form ID and names of review criterias', 'rehub-framework'),
							'description' => __('Type Form ID and names of criterias for review form like: 2:Design,Price,Usability without spaces. Place each form values from next line. You can download RH Frontend Publishing plugin in Rehub - Plugins tab', 'rehub-framework'),
							'default' => '',
						),																	
					),
				),		
			),
		),
		array(
			'title' => __('Localization', 'rehub-framework'),
			'name' => 'menu_loc',
			'icon' => 'font-awesome:fa-language',
			'controls' => array(
				array(
					'type' => 'section',
					'title' => __('Localization', 'rehub-framework'),
					'fields' => array(
						array(
							'type' => 'select',
							'name' => 'price_pattern',
							'label' => __('Choose price pattern', 'rehub-framework'),
							'items' => array(
								array(
								'value' => 'us',
								'label' => __('USA. Example: 1000.00', 'rehub-framework'),
								),
								array(
								'value' => 'eu',
								'label' => __('EU. Example: 1000,00', 'rehub-framework'),
								),	
								array(
								'value' => 'in',
								'label' => __('IN. Example: 1,000.00', 'rehub-framework'),
								),															
							),
							'default' => 'us',
						),						
						array(
							'type' => 'textbox',
							'name' => 'rehub_btn_text',
							'label' => __('Set text for button', 'rehub-framework'),
							'description' => __('It will be used on button for product reviews, top rating pages instead BUY THIS ITEM', 'rehub-framework'),
							'validation' => 'maxlength[14]',
						),
						array(
							'type' => 'textbox',
							'name' => 'rehub_mask_text',
							'label' => __('Set text for coupon mask', 'rehub-framework'),
							'description' => __('It will be used on coupon mask instead REVEAL COUPON', 'rehub-framework'),
						),						
						array(
							'type' => 'textbox',
							'name' => 'rehub_btn_text_aff_links',
							'label' => __('Set text for button', 'rehub-framework'),
							'description' => __('It will be used on button for products with list of links instead CHOOSE OFFER.', 'rehub-framework'),
						),							
						array(
							'type' => 'textbox',
							'name' => 'rehub_readmore_text',
							'label' => __('Set text for read more link', 'rehub-framework'),
							'description' => __('It will be used instead READ MORE', 'rehub-framework'),
						),
						array(
							'type' => 'textbox',
							'name' => 'buy_best_text',
							'label' => __('Set text for comparison list layout', 'rehub-framework'),
							'description' => __('It will be used instead BUY FOR BEST PRICE', 'rehub-framework'),
						),																					
						array(
							'type' => 'textbox',
							'name' => 'rehub_review_text',
							'label' => __('Set text for full review link', 'rehub-framework'),
							'description' => __('It will be used in top review pages instead READ FULL REVIEW', 'rehub-framework'),
						),
						array(
							'type' => 'textbox',
							'name' => 'rehub_search_text',
							'label' => __('Set text for Search placeholder', 'rehub-framework'),
							'description' => __('It will be used in default search form instead SEARCH', 'rehub-framework'),
						),				
						array(
							'type' => 'textbox',
							'name' => 'rehub_commenttitle_text',
							'label' => __('Set text for comment title, when no comments', 'rehub-framework'),
							'description' => __('It will be used instead: We will be happy to see your thoughts', 'rehub-framework'),
						),							
						array(
							'type' => 'textbox',
							'name' => 'rehub_related_text',
							'label' => __('Set text for Related article title', 'rehub-framework'),
							'description' => __('It will be used instead Related Articles', 'rehub-framework'),
						),																																		
					),
				),
			),
		),
		array(
			'title' => __('User options', 'rehub-framework'),
			'name' => 'usersmenus',
			'icon' => 'font-awesome:fa-user',
			'controls' => array(		
				array(
					'type' => 'section',
					'title' => __('Options for User login popup', 'rehub-framework'),
					'fields' => array(
						 array(
							'type' => 'notebox',
							'name' => 'rehub_user_note',
							'label' => __('Note!', 'rehub-framework'),
							'description' => esc_html__('Please, read about user functions in our', 'rehub-framework').' <a href="http://rehubdocs.wpsoul.com/docs/rehub-framework/user-submit-memberships-profiles/" target="_blank">documentation</a>',
							'status' => 'info',
						),						
						array(
							'type' => 'toggle',
							'name' => 'userlogin_enable',
							'label' => __('Enable user login modal?', 'rehub-framework'),
							'description' => __('If you disable this, user modal will not work', 'rehub-framework'),
							'default' => '0',
						),										
						array(
							'type' => 'textbox',
							'name' => 'custom_msg_popup',
							'label' => __('Add custom message', 'rehub-framework'),
							'description' => __('Add text or shortcode in registration popup', 'rehub-framework'),							
						),	
						array(
							'type' => 'textbox',
							'name' => 'custom_login_url',
							'label' => __('Type url for login button', 'rehub-framework'),
							'description' => __('By default, login button triggers login popup, but you can redirect users to any link with registration form if you set this field. Login popup will not work in this case', 'rehub-framework'),
						),					
						array(
							'type' => 'textbox',
							'name' => 'custom_register_link',
							'label' => __('Add custom register link', 'rehub-framework'),
							'description' => __('Add custom link if you want to use custom register page instead of sign up in popup', 'rehub-framework'),							
						),
						array(
							'type' => 'textbox',
							'name' => 'custom_redirect_after_login',
							'label' => __('Add custom redirect after login url', 'rehub-framework'),
							'description' => __('You can also use placeholder %%userlogin%% in url, which will be replaced by user login', 'rehub-framework'),							
						),															
						array(
							'type' => 'select',
							'name' => 'rehub_login_icon',
							'label' => __('Add additional login icon in header', 'rehub-framework'),
							'description' => __('You can also add login-register link to any place with shortcode [wpsm_user_modal]', 'rehub-framework'),
							'items' => array(
								array(
									'value' => 'no',
									'label' => __('No additional icon', 'rehub-framework'),
								),
								array(
									'value' => 'top',
									'label' => __('In top line', 'rehub-framework'),
								),
								array(
									'value' => 'menu',
									'label' => __('In main menu', 'rehub-framework'),
								),															
							),
								'default' => array(
								'no',
							),
						),													
						array(
							'type' => 'textbox',
							'name' => 'userlogin_term_page',
							'label' => __('Terms and conditions page url for popup', 'rehub-framework'),
						),
						array(
							'type' => 'textbox',
							'name' => 'userlogin_policy_page',
							'label' => __('Privacy Policy page url for popup', 'rehub-framework'),
						),						
						array(
							'type' => 'textbox',
							'name' => 'userlogin_submit_page',
							'label' => __('Select url for post submit form', 'rehub-framework'),						
						),	
						array(
							'type' => 'textbox',
							'name' => 'userlogin_submit_page_label',
							'label' => __('Select label for post submit form', 'rehub-framework'),						
						),						
						array(
							'type' => 'textbox',
							'name' => 'userlogin_edit_page',
							'label' => __('Select url for post edit form', 'rehub-framework'),			
						),
						array(
							'type' => 'textbox',
							'name' => 'userlogin_edit_page_label',
							'label' => __('Select label for post edit form', 'rehub-framework'),			
						),															
						array(
							'type' => 'toggle',
							'name' => 'enable_comment_link',
							'label' => __('Enable link on user profile in comment?', 'rehub-framework'),
							'description' => __('Can slow a bit your site if you have many comments', 'rehub-framework'),
							'default' => '0',
						),	
						array(
							'type' => 'textbox',
							'name' => 'rh_sync_role',
							'label' => __('Synchronize one role to other', 'rehub-framework'),
							'description' => __('Useful, when you sychronize wordpress role to roles of Membership plugins and you want to deactivate/activate this role when user gets new role from another plugin. Example of settings:<br /><br />vendor:s2member_level0:s2member_level1,s2member_level2<br /><br />First name is role which you want to synchronize (you can set any other, for example seller - for Dokan or dc_vendor for WC Marketplace), next set which is divided by ":" is role which will trigger removing of this role. Next set is roles which will trigger adding this role. If you don\'t use any vendor plugin and want to allow users from S2 member to upload media, set next<br /><br /> contributor:s2member_level0:s2member_level1,s2member_level2<br /><br />', 'rehub-framework'),					
						),																						
					),
				),
			),
		),
		array(
			'title' => __('Buddypress options', 'rehub-framework'),
			'name' => 'bpoptions',
			'icon' => 'font-awesome:fa-users',
			'controls' => array(
				array(
					'type' => 'section',
					'title' => __('BuddyPress', 'rehub-framework'),
					'fields' => array(					
						array(
							'type' => 'toggle',
							'name' => 'bp_redirect',
							'label' => __('Enable redirect to BP profiles?', 'rehub-framework'),
							'description' => __('By default, user link goes to author page. You can redirect all author links from posts to BuddyPress profiles', 'rehub-framework'),
							'default' => '0',
						),
						array(
							'type' => 'toggle',
							'name' => 'bp_group_widget_area',
							'label' => __('Add additional sidebar area for Group pages?', 'rehub-framework'),
							'default' => '0',
						),	
						array(
							'type' => 'upload',
							'name' => 'rehub_bpheader_image',
							'label' => __('Default background image in header. Recommended size 1900x260', 'rehub-framework'),
							'description' => __('Upload a background image or leave blank', 'rehub-framework'),
							'default' => '',
						),																			
						array(
							'type' => 'select',
							'name' => 'bp_deactivateemail_confirm',
							'label' => __('Synchronization between login popup and BP', 'rehub-framework'),
							'description' => __('You can enable BP registration logic in theme login popup', 'rehub-framework'),
							'items' => array(
								array(
									'value' => '1',
									'label' => __('Disable email and BP activation', 'rehub-framework'),
								),
								array(
									'value' => 'bp',
									'label' => __('Enable BP and email activation', 'rehub-framework'),
								),														
							),
							'default' => array(
								'bp',
							),						
						),									
						array(
							'type' => 'toggle',
							'name' => 'userpopup_xprofile',
							'label' => __('Add xprofile fields to register modal form?', 'rehub-framework'),
							'description' => __('Set additional fields in User - Profile fields. Works only with enabled Buddypress', 'rehub-framework'),
							'default' => '0',
						),				
						array(
							'type' => 'textbox',
							'name' => 'rh_bp_seo_description',
							'label' => __('Add name of Xprofile field for seo Description', 'rehub-framework'),
							'description' => __('You can create such field in Users - Profile fields if you have enabled Extended Profiles in Settings - Buddypress', 'rehub-framework'),
						),
						array(
							'type' => 'textbox',
							'name' => 'rh_bp_phone',
							'label' => __('Add name of Xprofile field for Phone', 'rehub-framework'),
							'description' => __('You can create such field in Users - Profile fields if you have enabled Extended Profiles in Settings - Buddypress', 'rehub-framework'),
						),							
						array(
							'type' => 'textarea',
							'name' => 'rh_bp_custom_message_profile',
							'label' => __('Add custom message or html in profile of User', 'rehub-framework'),
							'description' => __('You can use shortcodes to show additional info inside Profile tab of user Profile. For example, shortcodes from S2Member plugin or any conditional information. If you want to show information for owner of profile, wrap it with shortcode [rh_is_bpmember_profile]Content[/rh_is_bpmember_profile]', 'rehub-framework'),							
						),																					
					),
				),	
				array(
					'type' => 'section',
					'title' => __('Posts Profile tab', 'rehub-framework'),
					'fields' => array(																				
						array(
							'type' => 'textbox',
							'name' => 'rh_bp_user_post_name',
							'label' => __('Add Name of Posts tab in Profile', 'rehub-framework'),
						),
						array(
							'type' => 'textbox',
							'name' => 'rh_bp_user_post_slug',
							'label' => __('Add slug of Posts tab', 'rehub-framework'),
							'description' => __('Use only latin symbols, without spaces', 'rehub-framework'),
						),	
						array(
							'type' => 'textbox',
							'name' => 'rh_bp_user_post_pos',
							'label' => __('Add position of tab', 'rehub-framework'),
							'default' => '20',
						),
						array(
							'type' => 'select',
							'name' => 'rh_bp_user_post_newpage',
							'label' => __('Assign page for Add new posts', 'rehub-framework'),
							'description' => __('Choose page where you have frontend form for posts. Content of this page will be assigned to tab. You can use bundled RH Frontend PRO to create such form.', 'rehub-framework'),
							'items' => array(
								'data' => array(
									array(
										'source' => 'function',
										'value' => 'vp_get_pages',
									),
								),
							),													
						),	
						array(
							'type' => 'select',
							'name' => 'rh_bp_user_post_editpage',
							'label' => __('Assign page for Edit Posts', 'rehub-framework'),
							'description' => __('Choose page where you have EDIT form for posts. If you use RH Frontend Form, such page, usually, has shortcode like [wpfepp_post_table form="1" show_all=0]', 'rehub-framework'),
							'items' => array(
								'data' => array(
									array(
										'source' => 'function',
										'value' => 'vp_get_pages',
									),
								),
							),													
						),									
						array(
							'type' => 'textbox',
							'name' => 'rh_bp_user_post_type',
							'label' => __('Add member type', 'rehub-framework'),
							'description' => __('If you want to show tab only for special member type, add here slug of this member type. Note, Buddypress member type is not the same as wordpress role', 'rehub-framework'),
						),
					),
				),	
				array(
					'type' => 'section',
					'title' => __('Product Profile tab', 'rehub-framework'),
					'fields' => array(																				
						array(
							'type' => 'textbox',
							'name' => 'rh_bp_user_product_name',
							'label' => __('Add Name of Product tab in Profile', 'rehub-framework'),
						),
						array(
							'type' => 'textbox',
							'name' => 'rh_bp_user_product_slug',
							'label' => __('Add slug of Product tab', 'rehub-framework'),
							'description' => __('Use only latin symbols, without spaces', 'rehub-framework'),
						),	
						array(
							'type' => 'textbox',
							'name' => 'rh_bp_user_product_pos',
							'label' => __('Add position of tab', 'rehub-framework'),
							'default' => '21',
						),
						array(
							'type' => 'select',
							'name' => 'rh_bp_user_product_newpage',
							'label' => __('Assign page for Add new Product', 'rehub-framework'),
							'description' => __('Choose page where you have frontend form for Product. Content of this page will be assigned to tab. You can use bundled RH Frontend PRO to create such form.', 'rehub-framework'),
							'items' => array(
								'data' => array(
									array(
										'source' => 'function',
										'value' => 'vp_get_pages',
									),
								),
							),													
						),	
						array(
							'type' => 'select',
							'name' => 'rh_bp_user_product_editpage',
							'label' => __('Assign page for Edit Product', 'rehub-framework'),
							'description' => __('Choose page where you have EDIT form for products. If you use RH Frontend Form, such page, usually, has shortcode like [wpfepp_post_table form="1" show_all=0]', 'rehub-framework'),
							'items' => array(
								'data' => array(
									array(
										'source' => 'function',
										'value' => 'vp_get_pages',
									),
								),
							),													
						),									
						array(
							'type' => 'textbox',
							'name' => 'rh_bp_user_product_type',
							'label' => __('Add member type', 'rehub-framework'),
							'description' => __('If you want to show tab only for special member type, add here slug of this member type. Note, Buddypress member type is not the same as wordpress role', 'rehub-framework'),
						),
					),
				),						
				array(
					'type' => 'section',
					'title' => __('MyCred Options', 'rehub-framework'),
					'fields' => array(																				
						array(
							'type' => 'toggle',
							'name' => 'bp_enable_mycred_comment_badge',
							'label' => __('Enable badges from MyCred plugin in comments for Buddypress?', 'rehub-framework'),
							'description' => __('Can slow your activity pages', 'rehub-framework'),
							'default' => '0',
						),	
						array(
							'type' => 'toggle',
							'name' => 'rh_enable_mycred_comment',
							'label' => __('Enable badges, points, ranks from MyCred plugin in regular comments?', 'rehub-framework'),
							'description' => __('Can slow your single pages', 'rehub-framework'),
							'default' => '0',
						),	
						array(
							'type' => 'textbox',
							'name' => 'rh_mycred_custom_points',
							'label' => __('Show custom point type instead default', 'rehub-framework'),					
						),																											
						array(
							'type' => 'textarea',
							'name' => 'rh_award_role_mycred',
							'label' => __('Give user roles for their Mycred Points', 'rehub-framework'),
							'description' => __('If you use MyCred plugin and want to give user new role once he gets definite points, you can use this area. Syntaxis is next: role:1000. Where role is role which you want to give and 1000 is amount of points to get this role. Place each role with next line. Place them in ASC mode. First line, for example, 10 points, next is 100. Function also works as opposite. ', 'rehub-framework'),					
						),	
						array(
							'type' => 'toggle',
							'name' => 'rh_award_type_mycred',
							'label' => __('Give BP member types instead of roles?', 'rehub-framework'),
							'description' => __('If you want to give users member types instead of roles which are set above, enable this', 'rehub-framework'),						
							'default' => '0',					
						),																					
					),
				),					
			),
		),
		array(
			'title' => __('Dynamic comparison', 'rehub-framework'),
			'name' => 'compare',
			'icon' => 'font-awesome:fa-database',
			'controls' => array(			
				array(
					'type' => 'section',
					'title' => __('Add common page for comparison', 'rehub-framework'),
					'fields' => array(
						array(
							'type' => 'select',
							'name' => 'compare_page',
							'label' => __('Select page for comparison', 'rehub-framework'),
							'description' => __('Page must have top chart constructor page template or shortcode [wpsm_woocharts]. We recommend to set page as full width in right panel of Edit page area', 'rehub-framework'),
							'items' => array(
								'data' => array(
									array(
										'source' => 'function',
										'value' => 'vp_get_pages',
									),
								),
							),													
						),																				
					),
				),
				array(
					'type' => 'section',
					'title' => __('Options for multigroup dynamic comparison', 'rehub-framework'),
					'fields' => array(	
						array(
							'type' => 'textarea',
							'name' => 'compare_multicats_textarea',
							'label' => __('Assign categories to pages', 'rehub-framework'),
							'description' => esc_html__('Use this option if you want to have different comparison groups. Create separate pages for each group. Then, use next syntaxis: 1,2,3;Title;23, where 1,2,3 - category IDs, Title - a general name for category group, 23 - a page ID of comparison. You can add also custom taxonomy in the end. By default, product categories will be used. Delimiter is ";"', 'rehub-framework').' <br/><br/><a href="http://rehubdocs.wpsoul.com/docs/rehub-framework/comparisons-tables-charts-lists/dynamic-comparison-charts/" target="_blank">Documentation</a>',							
						),																					
					),
				),	
				array(
					'type' => 'section',
					'title' => __('Common', 'rehub-framework'),
					'fields' => array(	
						array(
							'type' => 'toggle',
							'name' => 'compare_disable_button',
							'label' => __('Disable button in right side', 'rehub-framework'),
							'description' => __('You can disable button with compare icon on right side of site. You can place this icon in header. Use Shop/Comparison header in theme option - header and menu - Header layout', 'rehub-framework'),
						),					
						array(
							'type' => 'textbox',
							'name' => 'compare_woo_cats',
							'label' => __('Set ids of product categories where to show button. Leave blank to show in all products', 'rehub-framework'),
						),
					),
				),					
			),
		),
		array(
			'title' => __('Custom badges for posts', 'rehub-framework'),
			'name' => 'badges',
			'icon' => 'font-awesome:fa-certificate',
			'controls' => array(				
				array(
					'type' => 'section',
					'title' => __('First badge', 'rehub-framework'),
					'fields' => array(
					    array(
					        'type' => 'html',
					        'name' => 'admin_badge_preview_1',
					        'binding' => array(
					            'field'    => 'badge_label_1, badge_color_1',
					            'function' => 'admin_badge_preview_html',
					        ),
					    ),						
						array(
							'type' => 'textbox',
							'name' => 'badge_label_1',
							'label' => __('Label', 'rehub-framework'),
							'default' => __('Editor choice', 'rehub-framework'),
							'validation' => 'maxlength[20]',	
						),						
						array(
							'type' => 'color',
							'name' => 'badge_color_1',
							'label' => __('Color', 'rehub-framework'),
							'format' => 'hex',	
						),						
					),
				),
				array(
					'type' => 'section',
					'title' => __('Second badge', 'rehub-framework'),
					'fields' => array(
					    array(
					        'type' => 'html',
					        'name' => 'admin_badge_preview_2',
					        'binding' => array(
					            'field'    => 'badge_label_2, badge_color_2',
					            'function' => 'admin_badge_preview_html',
					        ),
					    ),						
						array(
							'type' => 'textbox',
							'name' => 'badge_label_2',
							'label' => __('Label', 'rehub-framework'),
							'default' => __('Best seller', 'rehub-framework'),
							'validation' => 'maxlength[20]',																
						),						
						array(
							'type' => 'color',
							'name' => 'badge_color_2',
							'label' => __('Color', 'rehub-framework'),
							'format' => 'hex',	
						),						
					),
				),	
				array(
					'type' => 'section',
					'title' => __('Third badge', 'rehub-framework'),
					'fields' => array(
					    array(
					        'type' => 'html',
					        'name' => 'admin_badge_preview_3',
					        'binding' => array(
					            'field'    => 'badge_label_3, badge_color_3',
					            'function' => 'admin_badge_preview_html',
					        ),
					    ),						
						array(
							'type' => 'textbox',
							'name' => 'badge_label_3',
							'label' => __('Label', 'rehub-framework'),
							'default' => __('Best value', 'rehub-framework'),
							'validation' => 'maxlength[20]',															
						),						
						array(
							'type' => 'color',
							'name' => 'badge_color_3',
							'label' => __('Color', 'rehub-framework'),
							'format' => 'hex',	
						),						
					),
				),
				array(
					'type' => 'section',
					'title' => __('Fourth badge', 'rehub-framework'),
					'fields' => array(
					    array(
					        'type' => 'html',
					        'name' => 'admin_badge_preview_4',
					        'binding' => array(
					            'field'    => 'badge_label_4, badge_color_4',
					            'function' => 'admin_badge_preview_html',
					        ),
					    ),						
						array(
							'type' => 'textbox',
							'name' => 'badge_label_4',
							'label' => __('Label', 'rehub-framework'),
							'default' => __('Best price', 'rehub-framework'),
							'validation' => 'maxlength[20]',								
						),						
						array(
							'type' => 'color',
							'name' => 'badge_color_4',
							'label' => __('Color', 'rehub-framework'),
							'format' => 'hex',	
						),						
					),
				),											
			),
		),
		array(
			'title' => __('Social Media Options', 'rehub-framework'),
			'name' => 'menu_5',
			'icon' => 'font-awesome:fa-dove',
			'controls' => array(
				array(
					'type' => 'section',
					'title' => __('Social Media Pages', 'rehub-framework'),
					'fields' => array(
						array(
							'type' => 'textbox',
							'name' => 'rehub_facebook',
							'label' => __('Facebook link', 'rehub-framework'),
							'validation' => 'url',
						),
						array(
							'type' => 'textbox',
							'name' => 'rehub_twitter',
							'label' => __('Twitter link', 'rehub-framework'),
							'validation' => 'url',
						),
						array(
							'type' => 'textbox',
							'name' => 'rehub_instagram',
							'label' => __('Instagram link', 'rehub-framework'),
							'validation' => 'url',
						),
						array(
							'type' => 'textbox',
							'name' => 'rehub_wa',
							'label' => __('WhatsApp link', 'rehub-framework'),
							'validation' => 'url',
						),
						array(
							'type' => 'textbox',
							'name' => 'rehub_youtube',
							'label' => __('Youtube link', 'rehub-framework'),
							'validation' => 'url',
						),
						array(
							'type' => 'textbox',
							'name' => 'rehub_vimeo',
							'label' => __('Vimeo link', 'rehub-framework'),
							'validation' => 'url',
						),						
						array(
							'type' => 'textbox',
							'name' => 'rehub_pinterest',
							'label' => __('Pinterest link', 'rehub-framework'),
							'validation' => 'url',
						),
						array(
							'type' => 'textbox',
							'name' => 'rehub_linkedin',
							'label' => __('Linkedin link', 'rehub-framework'),
							'validation' => 'url',
						),
						array(
							'type' => 'textbox',
							'name' => 'rehub_soundcloud',
							'label' => __('Soundcloud link', 'rehub-framework'),
							'validation' => 'url',
						),
						array(
							'type' => 'textbox',
							'name' => 'rehub_vk',
							'label' => __('Vk.com link', 'rehub-framework'),
							'validation' => 'url',
						),
						array(
							'type' => 'textbox',
							'name' => 'rehub_telegram',
							'label' => __('Telegram link', 'rehub-framework'),
							'validation' => 'url',
						),
						array(
							'type' => 'textbox',
							'name' => 'rehub_rss',
							'label' => __('Rss link', 'rehub-framework'),
							'validation' => 'url',
						),												
					),
				),
			),
		),
	)
);

$theme_options_additional = include(rf_locate_template( 'inc/options/option_additional.php' ));
if(!empty($theme_options_additional)){
	$theme_options['menus'][] = $theme_options_additional;
}

return $theme_options;

/**
 *EOF
 */