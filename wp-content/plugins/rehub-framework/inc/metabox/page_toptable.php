<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly ?>
<?php

return array(
	'id'          => 'rehub_top_table',
	'types'       => array('page'),
	'title'       => __('Top table settings', 'rehub-framework'),
	'priority'    => 'low',
	'mode'        => WPALCHEMY_MODE_EXTRACT,
	'template'    => array(
		array(
			'type' => 'select',
			'name' => 'top_review_choose',
			'label' => __('Choose by', 'rehub-framework'),
			'items' => array(
				array(
					'value' => 'cat_choose',
					'label' => __('Category and/or tag', 'rehub-framework'),
				),
				array(
					'value' => 'manual_choose',
					'label' => __('Manual select and order', 'rehub-framework'),
				),
				array(
					'value' => 'custom_post',
					'label' => __('Custom post type or woocommerce product', 'rehub-framework'),
				),				
			),
			'default' => 'cat_choose',
		),		
		array(
			'type' => 'select',
			'name' => 'top_review_cat',
			'label' => __('Choose category', 'rehub-framework'),
			'description' => __('Choose the category that you\'d like to include to top review page', 'rehub-framework'),
			'items' => array(
				'data' => array(
					array(
						'source' => 'function',
						'value'  => 'vp_get_categories',
					),
				),
			),
			'default' => '',
			'dependency' => array(
				'field'    => 'top_review_choose',
				'function' => 'top_review_choose_is_cat',
			),			
		),
		array(
			'type' => 'select',
			'name' => 'top_review_custompost',
			'label' => __('Choose custom post type', 'rehub-framework'),
			'description' => __('Choose custom post type', 'rehub-framework'),
			'items' => array(
				'data' => array(
					array(
						'source' => 'function',
						'value'  => 'rehub_get_cpost_type',
					),
				),
			),
			'default' => '',
			'dependency' => array(
				'field'    => 'top_review_choose',
				'function' => 'top_review_choose_is_custompost',
			),			
		),
		array(
			'type' => 'textbox',
			'name' => 'catalog_tax',
			'label' => __('Enter taxonomy slug', 'rehub-framework'),
			'description' => __('Enter slug of your taxonomy. Example, taxonomy for product category - is product_cat. Or leave blank', 'rehub-framework'),
			'dependency' => array(
				'field'    => 'top_review_choose',
				'function' => 'top_review_choose_is_custompost',
			),						
		),
		array(
			'type' => 'textbox',
			'name' => 'catalog_tax_slug',
			'label' => __('Show posts by taxonomy slug', 'rehub-framework'),
			'description' => __('Enter slug of your taxonomy if you want to show only posts from certain category of your taxonomy (from field above) or leave blank', 'rehub-framework'),
			'dependency' => array(
				'field'    => 'top_review_choose',
				'function' => 'top_review_choose_is_custompost',
			),						
		),	
		array(
			'type' => 'textbox',
			'name' => 'catalog_tax_sec',
			'label' => __('Enter second taxonomy slug', 'rehub-framework'),
			'description' => __('Enter slug of your taxonomy. Example, taxonomy for product tags - is product_tag. Or leave blank', 'rehub-framework'),
			'dependency' => array(
				'field'    => 'top_review_choose',
				'function' => 'top_review_choose_is_custompost',
			),						
		),
		array(
			'type' => 'textbox',
			'name' => 'catalog_tax_slug_sec',
			'label' => __('Show posts by taxonomy slug', 'rehub-framework'),
			'description' => __('Enter slug of your taxonomy if you want to show only posts from certain category of your taxonomy (from field above) or leave blank', 'rehub-framework'),
			'dependency' => array(
				'field'    => 'top_review_choose',
				'function' => 'top_review_choose_is_custompost',
			),						
		),					
		array(
			'type' => 'textbox',
			'name' => 'top_review_tag',
			'label' => __('Enter tag', 'rehub-framework'),
			'description' => __('Leave blank or set tag of posts', 'rehub-framework'),
			'dependency' => array(
				'field'    => 'top_review_choose',
				'function' => 'top_review_choose_is_cat',
			),			
		),
		array(
			'type' => 'textbox',
			'name' => 'top_review_fetch',
			'label' => __('Fetch Count', 'rehub-framework'),
			'description' => __('How much posts you\'d like to display?', 'rehub-framework'),
			'default' => '',
			'validation' => 'numeric',
			'dependency' => array(
				'field'    => 'top_review_choose',
				'function' => 'top_review_choose_is_cat',
			),			
		),					
		array(
			'type' => 'multiselect',
			'name' => 'manual_ids',
			'label' => __('Choose posts', 'rehub-framework'),
			'description' => __('Choose posts and order', 'rehub-framework'),
			'items' => array(
				'data' => array(
					array(
						'source' => 'function',
						'value'  => 'rehub_manual_ids_func',
					),
				),
			),
			'dependency' => array(
				'field'    => 'top_review_choose',
				'function' => 'top_review_choose_is_manual',
			),			
		),		

		array(
			'type' => 'textbox',
			'name' => 'top_review_field_sort',
			'label' => __('Base of sorting', 'rehub-framework'),
			'description' => __('By default all posts are sorting by date. But you can set name of custom field for sorting. Important! If you want to show only posts with reviews - set name <strong>rehub_review_overall_score</strong>', 'rehub-framework'),			
		),

		array(
			'type' => 'select',
			'name' => 'top_review_order',
			'label' => __('Order of sorting:', 'rehub-framework'),
			'items' => array(
				array(
					'value' => 'desc',
					'label' => __('from highest to lowest', 'rehub-framework'),
				),
				array(
					'value' => 'asc',
					'label' => __('from lowest to highest', 'rehub-framework'),
				),
			),
			'default' => array(
				'desc',
			),			
		),
		array(
			'type' => 'toggle',
			'name' => 'top_review_pagination',
			'label' => __('Enable pagination?', 'rehub-framework'),
			'default' => '0',
		),

	    array(
	        'type' => 'notebox',
	        'name' => 'nb_1',
	        'label' => __('Set your content below', 'rehub-framework'),
	        'description' => __('Do not use more than 6 columns', 'rehub-framework'),
	        'status' => 'normal',
	    ),

		array(
			'type' => 'toggle',
			'name' => 'first_column_enable',
			'label' => __('Enable first column with thumbnail?', 'rehub-framework'),
			'default' => '1',
		),

		array(
			'type' => 'textbox',
			'name' => 'first_column_name',
			'label' => __('Set heading name for first column', 'rehub-framework'),
			'description' => __('By default - Product', 'rehub-framework'),	
			'dependency' => array(
				'field' => 'first_column_enable',
				'function' => 'vp_dep_boolean',
		 	),					
		),	
		array(
			'type' => 'toggle',
			'name' => 'first_column_rank',
			'label' => __('Enable rank on thumbnail?', 'rehub-framework'),
			'default' => '1',
			'dependency' => array(
				'field' => 'first_column_enable',
				'function' => 'vp_dep_boolean',
		 	),			
		),
		array(
			'type' => 'toggle',
			'name' => 'first_column_link',
			'label' => __('Enable link on affiliate product from thumbnail?', 'rehub-framework'),
			'default' => '0',
			'dependency' => array(
				'field' => 'first_column_enable',
				'function' => 'vp_dep_boolean',
		 	),			
		),
		array(
			'type' => 'textbox',
			'name' => 'image_width',
			'label' => __('Set image width (without px) or leave blank (default is 120px)', 'rehub-framework'),
			'dependency' => array(
				'field' => 'first_column_enable',
				'function' => 'vp_dep_boolean',
		 	),							
		),					
		array(
			'type' => 'textbox',
			'name' => 'image_height',
			'label' => __('Set image height (without px) or leave blank (default is 120px)', 'rehub-framework'),
			'dependency' => array(
				'field' => 'first_column_enable',
				'function' => 'vp_dep_boolean',
		 	),							
		),
		array(
			'type' => 'toggle',
			'name' => 'disable_crop',
			'label' => __('By default, crop is enabled', 'rehub-framework'),
			'default' => '0',
		),		
	    array(
			'type'      => 'group',
			'repeating' => true,
			'sortable'  => true,
			'name'      => 'columncontents',
			'title'     => __('Column', 'rehub-framework'),
			'fields'    => array(
				array(
					'type' => 'textbox',
					'name' => 'column_name',
					'label' => __('Set heading name for column', 'rehub-framework'),				
				),
				array(
					'type' => 'textarea',
					'name' => 'column_html',
					'label' => __('Insert html and shortcode function', 'rehub-framework'),	
				),
			    array(
			        'type' => 'notebox',
			        'name' => 'nb_1',
			        'label' => __('Possible shortcodes functions', 'rehub-framework'),
			        'description' => __('[rehub_title] generates title of post. <br />[rehub_title link="post"] generates title with link on post. <br />[rehub_title link="affiliate"] generates title with link on affiliate product. <br /> [rehub_exerpt length="120"] generates excerpt with 120 symbols. <br />[rehub_exerpt reviewtext="1"] will grab description from your review. <br />[rehub_exerpt reviewheading="1"] will grab heading from your review. <br />[rehub_exerpt reviewpros="1"] will grab PROS field from your review. <br />[rehub_exerpt reviewcons="1"] will grab CONS field from your review. <br />[wpsm_compare_button] will show add to compare button(you must setup also comparison charts in theme option - dynamic comparison). <br />[RH_wishlist as_btn=1 wishlistadd="Add to wishlist"] will add wishlist button<br />[getHotThumb deal_score=1] will show thumbs counter <br />[wpsm_custom_meta field="META-KEY-NAME" label="My label:" show_empty=1 posttext="after value text"] will get custom field value<br />[wpsm_custom_meta field="META-KEY-NAME" label="My label:" show_empty=1 posttext="after value text" type="attribute"] will get woocommerce attribute value value<br />Also, you can wrap shortcode with html tags. Example, &lt;h2&gt;[rehub_title]&lt;/h2&gt;&lt;p&gt;[rehub_exerpt length="120"]&lt;/p&gt;', 'rehub-framework'),
			        'status' => 'normal',
			    ),
				array(
					'type' => 'toggle',
					'name' => 'column_center',
					'label' => __('Enable center alignment in column?', 'rehub-framework'),
					'default' => '0',
				),			    				
				array(
					'type' => 'select',
					'name' => 'column_type',
					'label' => __('Select generated content:', 'rehub-framework'),
					'items' => array(
						array(
							'value' => 'meta_value',
							'label' => __('Set or single meta value', 'rehub-framework'),
						),	
						array(
							'value' => 'taxonomy_value',
							'label' => __('Taxonomy value', 'rehub-framework'),
						),									
						array(
							'value' => 'review_function',
							'label' => __('Review score', 'rehub-framework'),
						),	
						array(
							'value' => 'user_review_function',
							'label' => __('Dynamic User stars rating', 'rehub-framework'),
						),
						array(
							'value' => 'static_user_review_function',
							'label' => __('Static User stars rating (based on full user reviews)', 'rehub-framework'),
						),						
						array(
							'value' => 'none',
							'label' => __('No generated content', 'rehub-framework'),
						),	
						array(
							'value' => 'woo_attribute',
							'label' => __('Woocommerce attribute by slug', 'rehub-framework'),
						),						
						array(
							'value' => 'woo_review',
							'label' => __('Woocommerce review score', 'rehub-framework'),
						),	
						array(
							'value' => 'woo_btn',
							'label' => __('Woocommerce button with price', 'rehub-framework'),
						),
						array(
							'value' => 'woo_vendor',
							'label' => __('Woocommerce vendor', 'rehub-framework'),
						),																						
					),
					'default' => array(
						'exerpt',
					),
				),
				array(
					'type'      => 'group',
					'repeating' => true,
					'sortable'  => true,
					'name'      => 'column_meta_fields',
					'dependency' => array(
						'field'    => 'column_type',
						'function' => 'rehub_column_is_meta_value',
					),					
					'title'     => __('Value from custom field or attribute', 'rehub-framework'),
					'fields'    => array(
						array(
							'type' => 'select',
							'name' => 'column_meta_type',
							'label' => __('Type of meta value', 'rehub-framework'),					
							'items' => array(
								array(
									'value' => 'text',
									'label' => __('Text value', 'rehub-framework'),
								),
								array(
									'value' => 'checkbox',
									'label' => __('Checkbox (true or false)', 'rehub-framework'),
								),	
								array(
									'value' => 'wooattr',
									'label' => __('Woocommerce attribute', 'rehub-framework'),
								),											
							),
							'default' => 'text',
						),
						array(
							'type'      => 'textbox',
							'name'      => 'column_meta_name',
							'label'     => __('Name (slug) of field', 'rehub-framework'),
						),																												
						array(
							'type'      => 'textbox',
							'name'      => 'column_meta_label',
							'label'     => __('Label before value', 'rehub-framework'),
							'description' => __('Set label before value or leave blank', 'rehub-framework'),
						),
						array(
							'type'      => 'textbox',
							'name'      => 'column_meta_label_after',
							'label'     => __('Label after value', 'rehub-framework'),
							'description' => __('Set label after value or leave blank', 'rehub-framework'),
						),						
						array(
							'type' => 'fontawesome',
							'name' => 'column_meta_icon',
							'label' => __('Choose icon', 'rehub-framework'),
							'description' => __('Choose icon or leave blank', 'rehub-framework'),							
							'default' => '',										
						),						
						array(
							'type' => 'toggle',
							'name' => 'column_customize',
							'label' => __('Customize font size and colors of column?', 'rehub-framework'),
							'default' => '0',
						),
						array(
						    'type' => 'slider',
						    'name' => 'column_meta_value_size',
						    'label' => __('Meta Value Font size', 'rehub-framework'),
						    'description' => __('Default - 15px', 'rehub-framework'),
						    'min' => '10',
						    'max' => '36',
						    'step' => '1',
						    'default' => '',
							'dependency' => array(
								'field' => 'column_customize',
								'function' => 'vp_dep_boolean',
						 	),						    
						),
						array(
						    'type' => 'color',
						    'name' => 'column_meta_value_color',
						    'label' => __('Meta Value Font Color', 'rehub-framework'),
						    'description' => __('Default - #111111', 'rehub-framework'),
						    'default' => '',
						    'format' => 'hex',	
							'dependency' => array(
								'field' => 'column_customize',
								'function' => 'vp_dep_boolean',
						 	),						    					    
						),
						array(
						    'type' => 'slider',
						    'name' => 'column_meta_label_size',
						    'label' => __('Label Font size', 'rehub-framework'),
						    'description' => __('Default - 15px', 'rehub-framework'),
						    'min' => '10',
						    'max' => '36',
						    'step' => '1',
						    'default' => '',
							'dependency' => array(
								'field' => 'column_customize',
								'function' => 'vp_dep_boolean',
						 	),						    
						),
						array(
						    'type' => 'color',
						    'name' => 'column_meta_label_color',
						    'label' => __('Label Font Color', 'rehub-framework'),
						    'description' => __('Default - #111111', 'rehub-framework'),
						    'default' => '',
						    'format' => 'hex',	
							'dependency' => array(
								'field' => 'column_customize',
								'function' => 'vp_dep_boolean',
						 	),						    					    
						),	
						array(
						    'type' => 'slider',
						    'name' => 'column_meta_icon_size',
						    'label' => __('Icon Font size', 'rehub-framework'),
						    'description' => __('Default - 15px', 'rehub-framework'),
						    'min' => '10',
						    'max' => '36',
						    'step' => '1',
						    'default' => '',
							'dependency' => array(
								'field' => 'column_customize',
								'function' => 'vp_dep_boolean',
						 	),							    
						),
						array(
						    'type' => 'color',
						    'name' => 'column_meta_icon_color',
						    'label' => __('Icon Font Color', 'rehub-framework'),
						    'description' => __('Default - #111111', 'rehub-framework'),
						    'default' => '',
						    'format' => 'hex',
							'dependency' => array(
								'field' => 'column_customize',
								'function' => 'vp_dep_boolean',
						 	),						    						    
						),																					
					),
				),	
				array(
					'type' => 'textbox',
					'name' => 'woo_attr',
					'label' => __('Enter attribute slug', 'rehub-framework'),
					'description' => __('Enter slug of your woocommerce attribute.', 'rehub-framework'),
					'dependency' => array(
						'field'    => 'column_type',
						'function' => 'rehub_column_is_attr',
					),					
				),
				array(
					'type' => 'select',
					'name' => 'top_review_circle',
					'label' => __('Design of rating', 'rehub-framework'),
					'dependency' => array(
						'field'    => 'column_type',
						'function' => 'rehub_column_is_review_function',
					),					
					'items' => array(
						array(
							'value' => '0',
							'label' => __('Simple text', 'rehub-framework'),
						),
						array(
							'value' => '1',
							'label' => __('Circle design', 'rehub-framework'),
						),
						array(
							'value' => '2',
							'label' => __('Square design', 'rehub-framework'),
						),				
					),
					'default' => '1',
				),
				array(
					'type' => 'textbox',
					'name' => 'tax_name',
					'label' => __('Enter taxonomy slug', 'rehub-framework'),
					'description' => __('Enter slug of your taxonomy. Example, taxonomy for posts - is category.', 'rehub-framework'),
					'dependency' => array(
						'field'    => 'column_type',
						'function' => 'rehub_column_is_tax',
					),					
				),
				array(
					'type'      => 'textbox',
					'name'      => 'tax_name_prefix',
					'label'     => __('Prefix for field', 'rehub-framework'),
					'dependency' => array(
						'field'    => 'column_type',
						'function' => 'rehub_column_is_tax',
					),					
				),
				array(
					'type'      => 'textbox',
					'name'      => 'tax_name_postfix',
					'label'     => __('Postfix for field', 'rehub-framework'),
					'dependency' => array(
						'field'    => 'column_type',
						'function' => 'rehub_column_is_tax',
					),					
				),																				


			),
		),

		array(
			'type' => 'toggle',
			'name' => 'last_column_enable',
			'label' => __('Enable last column with button?', 'rehub-framework'),
			'default' => '1',
		),

		array(
			'type' => 'textbox',
			'name' => 'last_column_name',
			'label' => __('Set heading name for last column', 'rehub-framework'),
			'description' => __('By default - empty', 'rehub-framework'),	
			'dependency' => array(
				'field' => 'last_column_enable',
				'function' => 'vp_dep_boolean',
		 	),					
		),	
		array(
			'type' => 'textarea',
			'name' => 'column_after_block',
			'label' => __('Insert content after block', 'rehub-framework'),
			'description' => __('Add content which you want to display after module or leave blank', 'rehub-framework'),				
		),
		array(
			'type' => 'toggle',
			'name' => 'top_review_filter_disable',
			'label' => __('Disable table filters?', 'rehub-framework'),
			'default' => '0',
		),		
		array(
			'type' => 'toggle',
			'name' => 'top_review_width',
			'label' => __('Full width?', 'rehub-framework'),
			'default' => '1',
		),											
		array(
			'type' => 'html',
			'name' => 'shortcode_top',
			'label' => __('Shortcode', 'rehub-framework'),
			'description' => __('Shortcode', 'rehub-framework'),
			'binding' => array(
				'field' => '',
				'function' => 'top_table_shortcode',
			)
		),
		array(
			'type' => 'toggle',
			'name' => 'shortcode_table_enable',
			'label' => __('If enabled - content of table will be inserted on page only by shortcode above', 'rehub-framework'),
			'default' => '0',
		),										
	),
    'include_template' => 'template-toptable.php',
);

/**
 * EOF
 */