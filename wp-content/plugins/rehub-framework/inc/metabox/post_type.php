<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly ?>
<?php $def_p_types = REHub_Framework::get_option('rehub_ptype_formeta');?>
<?php $def_p_types = (!empty($def_p_types[0])) ? (array)$def_p_types : array('post', 'blog')?>
<?php
return array(
	'id'          => 'rehub_post',
	'types'       => $def_p_types,
	'title'       => __('Post Type', 'rehub-framework'),
	'priority'    => 'high',
	'mode'        => WPALCHEMY_MODE_EXTRACT,
	'template'    => array(
		array(
			'type' => 'radioimage',
			'name' => 'rehub_framework_post_type',
			'label' => __('Choose Type of Post', 'rehub-framework'),
			'description' => '',
			'items' => array(
				array(
					'value' => 'regular',
					'label' => __('Regular', 'rehub-framework'),
					'img' => RH_FRAMEWORK_URL . '/assets/img/regular_post_icon.png',
				),
				array(
					'value' => 'video',
					'label' => __('Video', 'rehub-framework'),
					'img' => RH_FRAMEWORK_URL . '/assets/img/video_post_icon.png',
				),
				array(
					'value' => 'gallery',
					'label' => __('Gallery', 'rehub-framework'),
					'img' => RH_FRAMEWORK_URL . '/assets/img/gallery_post_icon.png',
				),
				array(
					'value' => 'review',
					'label' => __('Review', 'rehub-framework'),
					'img' => RH_FRAMEWORK_URL . '/assets/img/review_post_icon.png',
				),
				array(
					'value' => 'music',
					'label' => __('Music', 'rehub-framework'),
					'img' => RH_FRAMEWORK_URL . '/assets/img/music_post_icon.png',
				),
			),
			'default' => 'regular'
		),
		
		
		// video group
		array(
			'type'      => 'group',
			'repeating' => false,
			'length'    => 1,
			'name'      => 'video_post',
			'title'     => __('Video Post', 'rehub-framework'),
			'dependency' => array(
				'field'    => 'rehub_framework_post_type',
				'function' => 'rehub_framework_post_type_is_video',
			),
			'fields'    => array(
				// embed
				array(
					'type' => 'textbox',
					'name' => 'video_post_embed_url',
					'description' => __('Insert youtube or vimeo link on page with video', 'rehub-framework'),
					'label' => __('Video Url', 'rehub-framework'),
				),				
				array(
					'type' => 'toggle',
					'name' => 'video_post_schema_thumb',
					'label' => __('Auto thumbnail', 'rehub-framework'),
					'description' => __('Enable auto featured image from video (will not work on some servers)', 'rehub-framework'),					
				),
				array(
					'type' => 'toggle',
					'name' => 'video_post_schema',
					'label' => __('Enable schema.org for video?', 'rehub-framework'),
					'description' => __('Check this box if you want to enable videoobject schema', 'rehub-framework'),
				),	
				array(
					'type' => 'textbox',
					'name' => 'video_post_schema_title',
					'label' => __('Title', 'rehub-framework'),
					'description' => __('Set title of video block or leave blank to use post title', 'rehub-framework'),					
					'dependency' => array(
                         'field' => 'video_post_schema',
                         'function' => 'vp_dep_boolean',
                    ),
					'default' => '',
				),
				array(
					'type' => 'textbox',
					'name' => 'video_post_schema_desc',
					'label' => __('Description', 'rehub-framework'),
					'description' => __('Set description of video block or leave blank to use post excerpt', 'rehub-framework'),					
					'dependency' => array(
                         'field' => 'video_post_schema',
                         'function' => 'vp_dep_boolean',
                    ),
					'default' => '',
				),																			
			),
		),
		// gallery group
		array(
			'type'      => 'group',
			'repeating' => false,
			'length'    => 1,
			'name'      => 'gallery_post',
			'title'     => __('Gallery Post', 'rehub-framework'),
			'dependency' => array(
				'field'    => 'rehub_framework_post_type',
				'function' => 'rehub_framework_post_type_is_gallery',
			),
			
			'fields'    => array(
				array(
					'type' => 'toggle',
					'name' => 'gallery_post_images_resize',
					'label' => __('Disable height resize for slider', 'rehub-framework'),
					'description' => __('This option disable resize of photo. By default, photos are resized for 400 px height', 'rehub-framework'),												
				),				
				array(
					'type'      => 'group',
					'repeating' => true,
					'name'      => 'gallery_post_images',
					'title'     => __('Image', 'rehub-framework'),
					'fields'    => array(
						array(
							'type'      => 'upload',
							'name'      => 'gallery_post_image',
							'label'     => __('Add Image', 'rehub-framework'),
						),
						array(
							'type'      => 'textbox',
							'name'      => 'gallery_post_image_caption',
							'label'     => __('Caption', 'rehub-framework'),
						),
						array(
							'type' => 'textbox',
							'name' => 'gallery_post_video',
							'description' => __('Insert youtube link of page with video. If you set this field, image and caption will be ignored for this slide', 'rehub-framework'),
							'label' => __('Video Url', 'rehub-framework'),
						),													
					),
				),
			),
		),
		// review group
		array(
			'type'      => 'group',
			'repeating' => false,
			'length'    => 1,
			'name'      => 'review_post',
			'title'     => 'Review Post',
			'dependency' => array(
				'field'    => 'rehub_framework_post_type',
				'function' => 'rehub_framework_post_type_is_review',
			),
			'fields'    => array(
				array(
					'type' => 'toggle',
					'name' => 'rehub_review_slider',
					'label' => __('Add slider of images to top of review page?', 'rehub-framework'),
					'default' => '0',
				),
				array(
					'type' => 'toggle',
					'name' => 'rehub_review_slider_resize',
					'label' => __('Disable height resize for slider', 'rehub-framework'),
					'description' => __('This option disable resize of photo. By default, photos are resized for 400 px height', 'rehub-framework'),
					'dependency' => array(
                         'field' => 'rehub_review_slider',
                         'function' => 'vp_dep_boolean',
                    ),										
				),				
				array(
					'type'      => 'group',
					'repeating' => true,
					'sortable'  => true,
					'name'      => 'rehub_review_slider_images',
					'title'     => __('Images', 'rehub-framework'),
					'fields'    => array(
						array(
							'type'      => 'upload',
							'name'      => 'review_post_image',
							'label'     => __('Add Image', 'rehub-framework'),
						),
						array(
							'type'      => 'textbox',
							'name'      => 'review_post_image_caption',
							'label'     => __('Caption', 'rehub-framework'),
						),	
						array(
							'type'      => 'textbox',
							'name'      => 'review_post_image_url',
							'label'     => __('Url for image', 'rehub-framework'),
						),						
						array(
							'type' => 'textbox',
							'name' => 'review_post_video',
							'description' => __('Insert youtube link of page with video. If you set this field, image and caption will be ignored for this slide', 'rehub-framework'),
							'label' => __('Video Url', 'rehub-framework'),
						),											
					),
					'dependency' => array(
                         'field' => 'rehub_review_slider',
                         'function' => 'vp_dep_boolean',
                    ),					
				),


				 array(
					'type' => 'select',
					'name' => 'review_post_schema_type',
					'label' => __('Connect review to offer', 'rehub-framework'),
					'items' => array(
						array(
						'value' => 'review_post_review_simple',
						'label' => __('No connections', 'rehub-framework'),
						),
						array(
						'value' => 'review_woo_product',
						'label' => __('Woocommerce offer review', 'rehub-framework'),
						),	
						array(
						'value' => 'review_woo_list',
						'label' => __('Woocommerce offers list review', 'rehub-framework'),
						),																		
					),
					'default' => array(
						'review_post_review_simple',
					),
				),

				array(
					'type' => 'notebox',
					'name' => 'offer_add',
					'label' => __('Important', 'rehub-framework'),
					'description' => __('You can connect review with woocommerce product in select above. If you want to add offer directly to post, use Post offer section below or Content Egg Offer module.', 'rehub-framework'),
					'status' => 'info',
				),			 	

				array(
					'type'      => 'group',
					'repeating' => false,
					'length'    => 1,
					'name'      => 'review_woo_product',
					'title'     => __('Woocommerce offer', 'rehub-framework'),
					'dependency' => array(
						'field'    => 'review_post_schema_type',
						'function' => 'review_post_schema_type_is_woo',
					),
					'fields'    => array(
						
						array(
							'type' => 'textbox',
							'name' => 'review_woo_link',
							'label' => __('Set woocommerce product', 'rehub-framework'),
							'description' => __('Type name of woocommerce product', 'rehub-framework'),
							'default' => '',
						),
						array(
							'type' => 'toggle',
							'name' => 'review_woo_slider',
							'label' => __('Enable slider', 'rehub-framework'),
							'description' => __('This option enables slider in top of review page with images from woocommerce gallery', 'rehub-framework'),					
						),	

						array(
							'type' => 'toggle',
							'name' => 'review_woo_slider_resize',
							'label' => __('Disable height resize for slider', 'rehub-framework'),
							'description' => __('This option disable resize of photo. By default, photos are resized for 400 px height', 'rehub-framework'),
							'dependency' => array(
		                         'field' => 'review_woo_slider',
		                         'function' => 'vp_dep_boolean',
		                    ),												
						),																								

						array(
							'type' => 'toggle',
							'name' => 'review_woo_offer_shortcode',
							'label' => __('Enable shortcode inserting', 'rehub-framework'),
							'description' => __('If enable you can insert offer box in any place of content with shortcode [woo_offer_product]. If disable - it will be before review box.', 'rehub-framework'),					
						),																																																

					),
				),

				array(
					'type'      => 'group',
					'repeating' => false,
					'length'    => 1,
					'name'      => 'review_woo_list',
					'title'     => __('Woocommerce offers list', 'rehub-framework'),
					'dependency' => array(
						'field'    => 'review_post_schema_type',
						'function' => 'review_post_schema_type_is_woo_list',
					),
					'fields'    => array(
						array(
							'type' => 'textbox',
							'name' => 'review_woo_list_links',
							'label' => __('Set woocommerce products', 'rehub-framework'),
							'description' => __('Type woocommerce names', 'rehub-framework'),		
						),					
						array(
							'type' => 'toggle',
							'name' => 'review_woo_list_shortcode',
							'label' => __('Enable shortcode inserting', 'rehub-framework'),
							'description' => __('If enable you can insert offers list in any place of content with shortcode [woo_offer_list]. If disable - it will be before review box.', 'rehub-framework'),					
						),																																																

					),
				),												 

				array(
					'type'      => 'textbox',
					'name'      => 'review_post_heading',
					'label'     => __('Review Heading', 'rehub-framework'),
					'description' => __('Short review heading (e.g. Excellent!)', 'rehub-framework'),
				),
				array(
					'type'      => 'textarea',
					'name'      => 'review_post_summary_text',
					'label'     => __('Summary Text', 'rehub-framework'),
				),
				array(
					'type'      => 'textarea',
					'name'      => 'review_post_pros_text',
					'label'     => __('PROS. Place each from separate line (optional)', 'rehub-framework'),
				),
				array(
					'type'      => 'textarea',
					'name'      => 'review_post_cons_text',
					'label'     => __('CONS. Place each from separate line (optional)', 'rehub-framework'),
				),								

				array(
					'type' => 'toggle',
					'name' => 'review_post_product_shortcode',
					'label' => __('Enable shortcode inserting', 'rehub-framework'),
					'description' => __('If enable you can insert review box in any place of content with shortcode [review]. If disable - it will be after content.', 'rehub-framework'),					
				),

				array(
					'type'      => 'slider',
					'name'      => 'review_post_score_manual',
					'label'     => __('Set overall score', 'rehub-framework'),
					'description' => __('Enter overall score of review or leave blank to auto calculation based on criterias score', 'rehub-framework'),
					'min'       => 0,
					'max'       => 10,
					'step'      => 0.5,					
				),

				array(
					'type'      => 'group',
					'repeating' => true,
					'sortable'  => true,
					'name'      => 'review_post_criteria',
					'title'     => __('Review Criterias', 'rehub-framework'),
					'fields'    => array(
						array(
							'type'      => 'textbox',
							'name'      => 'review_post_name',
							'label'     => __('Name', 'rehub-framework'),
						),
						array(
							'type'      => 'slider',
							'name'      => 'review_post_score',
							'label'     => __('Score', 'rehub-framework'),
							'min'       => 0,
							'max'       => 10,
							'step'      => 0.5,
						),
					),
				),
			),
		),
		
		// music group
		array(
			'type'      => 'group',
			'repeating' => false,
			'length'    => 1,
			'name'      => 'music_post',
			'title'     => __('Music Post', 'rehub-framework'),
			'dependency' => array(
				'field'    => 'rehub_framework_post_type',
				'function' => 'rehub_framework_post_type_is_music',
			),
			'fields'    => array(
				array(
					'type' => 'radiobutton',
					'name' => 'music_post_source',
					'label' => __('Music Source', 'rehub-framework'),
					'items' => array(
						array(
							'value' => 'music_post_soundcloud',
							'label' => __('Music from Soundcloud', 'rehub-framework'),
						),
						array(
							'value' => 'music_post_spotify',
							'label' => __('Music from Spotify', 'rehub-framework'),
						),
					),
				),

				array(
					'type' => 'textarea',
					'name' => 'music_post_soundcloud_embed',
					'description' => __('Insert full Soundcloud embed code.', 'rehub-framework'),
					'label' => __('Soundcloud embed code', 'rehub-framework'),
					'dependency' => array(
						'field'    => 'music_post_source',
						'function' => 'rehub_framework_post_music_is_soundcloud',
					),
				),
				array(
					'type' => 'textbox',
					'name' => 'music_post_spotify_embed',
					'description' => __('To get the Spotify Song URI go to <strong>Spotify</strong> > Right click on the song you want to embed > Click <strong>Copy Spotify URI</strong> > Paste code in this field.)', 'rehub-framework'),
					'label' => __('Spotify Song URI', 'rehub-framework'),
					'dependency' => array(
						'field'    => 'music_post_source',
						'function' => 'rehub_framework_post_music_is_spotify',
					),
				),

			),
		),
		
	),
);

/**
 * EOF
 */