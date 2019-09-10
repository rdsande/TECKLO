<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly ?>
<?php

VP_Security::instance()->whitelist_function('rehub_framework_is_header_six');
function rehub_framework_is_header_six($type)
{
	if( $type === 'header_six' )
		return true;
	return false;
}

VP_Security::instance()->whitelist_function('rehub_framework_is_header_six_five');
function rehub_framework_is_header_six_five($type)
{
	if( $type === 'header_six' || $type === 'header_five' )
		return true;
	return false;
}

VP_Security::instance()->whitelist_function('rehub_framework_is_header_five');
function rehub_framework_is_header_five($type)
{
	if($type === 'header_five')
		return true;
	return false;
}

VP_Security::instance()->whitelist_function('rehub_framework_is_header_seven');
function rehub_framework_is_header_seven($type)
{
	if( $type === 'header_seven' )
		return true;
	return false;
}

VP_Security::instance()->whitelist_function('rehub_framework_is_header_nine');
function rehub_framework_is_header_nine($type)
{
	if( $type === 'header_nine' )
		return true;
	return false;
}


VP_Security::instance()->whitelist_function('rehub_framework_post_formats');
function rehub_framework_post_formats() {
return array(
    
    array(
      'value' => 'all',
      'label' => __('all', 'rehub-framework'),
    ),	

    array(
      'value' => 'regular',
      'label' => __('regular', 'rehub-framework'),
    ),
    array(
      'value' => 'video',
      'label' => __('video', 'rehub-framework'),
    ),
    array(
      'value' => 'gallery',
      'label' => __('gallery', 'rehub-framework'),
    ),
    array(
      'value' => 'review',
      'label' => __('review', 'rehub-framework'),
    ),
    array(
      'value' => 'music',
      'label' => __('music', 'rehub-framework'),
    ),              
);
}


VP_Security::instance()->whitelist_function('rehub_framework_post_type_is_regular');
function rehub_framework_post_type_is_regular($type)
{
	if( $type === 'regular' )
		return true;
	return false;
}

VP_Security::instance()->whitelist_function('rehub_framework_post_type_is_video');
function rehub_framework_post_type_is_video($type)
{
	if( $type === 'video' )
		return true;
	return false;
}
VP_Security::instance()->whitelist_function('rehub_framework_post_type_is_gallery');
function rehub_framework_post_type_is_gallery($type)
{
	if( $type === 'gallery' )
		return true;
	return false;
}
VP_Security::instance()->whitelist_function('rehub_framework_post_type_is_review');
function rehub_framework_post_type_is_review($type)
{
	if( $type === 'review' )
		return true;
	return false;
}
VP_Security::instance()->whitelist_function('rehub_framework_post_type_is_music');
function rehub_framework_post_type_is_music($type)
{
	if( $type === 'music' )
		return true;
	return false;
}

VP_Security::instance()->whitelist_function('review_post_schema_type_is_woo_list');
function review_post_schema_type_is_woo_list($type)
{
	if( $type === 'review_woo_list' )
		return true;
	return false;
}
VP_Security::instance()->whitelist_function('review_post_schema_type_is_woo');
function review_post_schema_type_is_woo($type)
{
	if( $type === 'review_woo_product' )
		return true;
	return false;
}


VP_Security::instance()->whitelist_function('rehub_framework_post_music_is_soundcloud');
function rehub_framework_post_music_is_soundcloud($type)
{
	if( $type === 'music_post_soundcloud' )
		return true;
	return false;
}
VP_Security::instance()->whitelist_function('rehub_framework_post_music_is_spotify');
function rehub_framework_post_music_is_spotify($type)
{
	if( $type === 'music_post_spotify' )
		return true;
	return false;
}

//Functions for affiliate links

VP_Security::instance()->whitelist_function('rehub_manual_ids_func');
function rehub_manual_ids_func($top_review_cat='')
{
	$args = array(
		'meta_query' => array(
			array(
				'key' => 'rehub_framework_post_type',
				'value' => 'review'
			),
		),
		'posts_per_page' => -1,
	);
	$query = new WP_Query( $args );
	$data  = array();
	foreach ($query->posts as $post)
	{
		$data[] = array(
			'value' => $post->ID,
			'label' => $post->post_title,
		);
	}
	return $data;
}

VP_Security::instance()->whitelist_function('top_review_choose_is_cat');
function top_review_choose_is_cat($type)
{
	if( $type === 'cat_choose' )
		return true;
	return false;
}
VP_Security::instance()->whitelist_function('top_review_choose_is_manual');
function top_review_choose_is_manual($type)
{
	if( $type === 'manual_choose' )
		return true;
	return false;
}
VP_Security::instance()->whitelist_function('top_review_choose_is_custompost');
function top_review_choose_is_custompost($type)
{
	if( $type === 'custom_post' )
		return true;
	return false;
}
VP_Security::instance()->whitelist_function('rehub_get_cpost_type');
function rehub_get_cpost_type()
{
    $post_types = get_post_types( array('public'   => true) );
    $data  = array();
    foreach ( $post_types as $post_type ) {
        if ( $post_type !== 'revision' && $post_type !== 'nav_menu_item' && $post_type !== 'attachment') {
			$data[] = array(
				'value' => $post_type,
				'label' => $post_type,
			);
        }
    }
	return $data;
}

VP_Security::instance()->whitelist_function('top_table_shortcode');
function top_table_shortcode()
{
	$result = __("You can use shortcode to insert this top table to another page", "rehub-framework").' <strong>[wpsm_toptable id="'.$_GET['post'].'" full_width="1"]</strong><br />'.__("Delete full_width attribute if you insert shortcode in page with sidebar. You can add also post_ids parameter for manual adding and sorting some posts. Example [wpsm_toptable id=22 post_ids=11,12,13], where id=22 is id of current table page and 11,12,13 are ids of posts which you want to include in table", "rehub-framework");
	return $result;
}

VP_Security::instance()->whitelist_function('top_charts_shortcode');
function top_charts_shortcode()
{
	
		$result = ''.__("You can use shortcode to insert this top charts to another page", "rehub-framework").' <strong>[wpsm_charts id="'.$_GET['post'].'"]</strong>';

	return $result;
}

VP_Security::instance()->whitelist_function('use_fields_as_desc');
function use_fields_as_desc($type)
{
	if( $type === 'field' )
		return true;
	return false;
}

VP_Security::instance()->whitelist_function('rehub_framework_rev_type');
function rehub_framework_rev_type($type)
{
	if( $type === 'full_review' || $type === 'simple')
		return true;
	return false;
}

VP_Security::instance()->whitelist_function('user_rev_type');
function user_rev_type($type)
{
	if( $type === 'user' )
		return true;
	return false;
}

VP_Security::instance()->whitelist_function('rehub_column_is_meta_value');
function rehub_column_is_meta_value($type)
{
	if( $type === 'meta_value' )
		return true;
	return false;
}

VP_Security::instance()->whitelist_function('rehub_column_is_short');
function rehub_column_is_short($type)
{
	if( $type === 'shortcode' )
		return true;
	return false;
}

VP_Security::instance()->whitelist_function('rehub_column_is_review_function');
function rehub_column_is_review_function($type)
{
	if( $type === 'review_function' )
		return true;
	return false;
}

VP_Security::instance()->whitelist_function('rehub_column_is_image');
function rehub_column_is_image($type)
{
	if( $type === 'image' )
		return true;
	return false;
}

VP_Security::instance()->whitelist_function('rehub_column_is_tax');
function rehub_column_is_tax($type)
{
	if( $type === 'taxonomy_value' )
		return true;
	return false;
}

VP_Security::instance()->whitelist_function('rehub_column_is_attr');
function rehub_column_is_attr($type)
{
	if( $type === 'woo_attribute' )
		return true;
	return false;
}

VP_Security::instance()->whitelist_function('rehub_column_is_btn');
function rehub_column_is_btn($type)
{
	if( $type === 'affiliate_btn' )
		return true;
	return false;
}

VP_Security::instance()->whitelist_function('rehub_custom_badge_admin');
function rehub_custom_badge_admin()
{
$custom_badge_admin = array(
	'type' => 'radiobutton',
	'name' => 'is_editor_choice',
	'label' => __('Add badge', 'rehub-framework'),
	'description' => __('Check this if you want to show badge. You can customize them in theme option', 'rehub-framework'),
	'items' => array(
	    array(
	        'value' => '0',
	        'label' => __('No', 'rehub-framework'),
	    ),				
	    array(
	        'value' => '1',
	        'label' => (REHub_Framework::get_option('badge_label_1') !='') ? REHub_Framework::get_option('badge_label_1') : __('Editor choice', 'rehub-framework'),
	    ),
	    array(
	        'value' => '2',
	        'label' => (REHub_Framework::get_option('badge_label_2') !='') ? REHub_Framework::get_option('badge_label_2') : __('Best seller', 'rehub-framework'),
	    ),
	    array(
	        'value' => '3',
	        'label' => (REHub_Framework::get_option('badge_label_3') !='') ? REHub_Framework::get_option('badge_label_3') : __('Best value', 'rehub-framework'),
	    ),
	    array(
	        'value' => '4',
	        'label' => (REHub_Framework::get_option('badge_label_4') !='') ? REHub_Framework::get_option('badge_label_4') : __('Best price', 'rehub-framework'),
	    ),			    
	),			
);	
return $custom_badge_admin;
}

VP_Security::instance()->whitelist_function('admin_badge_preview_html');
function admin_badge_preview_html($label = '', $color = '')
{
	if(empty($label)) {$result = '';}
	else {
		$background = ($color) ? ' style="background-color:'.$color.'"' : '';
		$result = '<div class="starburst_admin_wrapper">';
		$result .= '<span class="re-ribbon-badge"><span'.$background.'>'.$label.'</span></span>';
		$result .= '</div>';
	}
	return $result;
}

VP_Security::instance()->whitelist_function('get_ce_modules_id_for_sinc');
function get_ce_modules_id_for_sinc()
{
	$data  = array();
	if(!defined('\ContentEgg\PLUGIN_PATH')){
		$data[] = array(
			'value' => '',
			'label' => 'Content Egg is not installed',
		);		
	}
	else{
		$modules = \ContentEgg\application\components\ModuleManager::getInstance()->getAffiliateParsers();
		if (!empty($modules)) {		
			foreach ($modules as $module) {
				$data[] = array(
					'value' => $module->getId(),
					'label' => $module->getName(),
				);
		    } 			
		}else{
			$data[] = array(
				'value' => '',
				'label' => 'Content Egg modules not found',
			);			
		}
		
	}

	return $data;
}

VP_Security::instance()->whitelist_function('rehub_get_post_layout_array');
function rehub_get_post_layout_array()
{
	$postlayout = apply_filters( 'rehub_post_layout_array', array(
		array(
			'value' => 'default',
			'label' => __('Simple', 'rehub-framework'),
		),
		array(
			'value' => 'meta_outside',
			'label' => __('Title is outside content', 'rehub-framework'),
		),
		array(
			'value' => 'meta_center',
			'label' => __('Center aligned (Rething style)', 'rehub-framework'),
		),	
		array(
			'value' => 'default_text_opt',
			'label' => __('Full width, optimized for reading', 'rehub-framework'),
		),			
		array(
			'value' => 'meta_compact',
			'label' => __('Compact (Button Block Under Title)', 'rehub-framework'),
		),
		array(
			'value' => 'meta_compact_dir',
			'label' => __('Compact (Button Block Before Title)', 'rehub-framework'),
		),				
		array(
			'value' => 'corner_offer',
			'label' => __('Button in corner (Repick style)', 'rehub-framework'),
		),								
		array(
			'value' => 'meta_in_image',
			'label' => __('Title Inside image', 'rehub-framework'),
		),	
		array(
			'value' => 'meta_in_imagefull',
			'label' => __('Title Inside full image', 'rehub-framework'),
		),
		array(
			'value' => 'big_post_offer',
			'label' => __('Big post offer block in top', 'rehub-framework'),
		),		
		array(
			'value' => 'offer_and_review',
			'label' => __('Offer and review score', 'rehub-framework'),
		),				
	));

	if (defined('\ContentEgg\PLUGIN_PATH')){
		$postlayoutce = array(
			array(
				'value' => 'meta_ce_compare',
				'label' => __('Price comparison (compact)', 'rehub-framework'),
			),			
			array(
				'value' => 'meta_ce_compare_full',
				'label' => __('Price comparison (Full width)', 'rehub-framework'),
			),		
			array(
				'value' => 'meta_ce_compare_auto_sec',
				'label' => __('Auto content Content Egg', 'rehub-framework'),
			),				
		);
		$postlayout = array_merge($postlayout, $postlayoutce);
	}

	return $postlayout;   
}

VP_Security::instance()->whitelist_function('rehub_get_product_layout_array');
function rehub_get_product_layout_array($type)
{
	$productlayout = apply_filters( 'rehub_global_product_layout_array', array(
		array(
			'value' => 'default_with_sidebar',
			'label' => __('Default with sidebar', 'rehub-framework'),
		),
		array(
			'value' => 'default_no_sidebar',
			'label' => __('Default without sidebar', 'rehub-framework'),
		),
		array(
			'value' => 'full_width_extended',
			'label' => __('Full width Extended', 'rehub-framework'),
		),
		array(
			'value' => 'full_width_advanced',
			'label' => __('Full width Advanced', 'rehub-framework'),
		),			
		array(
			'value' => 'ce_woo_blocks',
			'label' => __('Review with Blocks', 'rehub-framework'),
		),			
		array(
			'value' => 'vendor_woo_list',
			'label' => __('Compare prices by shortcode', 'rehub-framework'),
		),
		array(
			'value' => 'compare_woo_list',
			'label' => __('Compare Prices by sku', 'rehub-framework'),
		),						
		array(
			'value' => 'ce_woo_list',
			'label' => __('Content Egg List', 'rehub-framework'),
		),	
		array(
			'value' => 'sections_w_sidebar',
			'label' => __('Sections with sidebar', 'rehub-framework'),
		),		
		array(
			'value' => 'ce_woo_sections',
			'label' => __('Content Egg Auto Sections', 'rehub-framework'),
		),
		array(
			'value' => 'full_photo_booking',
			'label' => __('Full width Photo', 'rehub-framework'),
		),
		array(
			'value' => 'woo_compact',
			'label' => __('Compact Style', 'rehub-framework'),
		),	
		array(
			'value' => 'woo_directory',
			'label' => __('Directory Style', 'rehub-framework'),
		),											
	));

	return $productlayout;   
}

////////



/**
 * EOF
 */