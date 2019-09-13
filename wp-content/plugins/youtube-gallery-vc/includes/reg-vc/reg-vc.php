<?php
if(!class_exists('youtube_video_gallery_for_vc')) {
	class youtube_video_gallery_for_vc{
		public function register_vc(){
			if(function_exists('vc_map')){
				$group_category				= __('BeeTeam368', 'youtube_video_gallery');
				$data_source				= __('Data Source', 'youtube_video_gallery');
				$layout_settings			= __('Layout', 'youtube_video_gallery');
				$carousel_settings			= __('Carousel', 'youtube_video_gallery');
				$video_settings				= __('Video', 'youtube_video_gallery');				
				$popup_settings				= __('Video Popup', 'youtube_video_gallery');
				$inline_settings			= __('Video Inline', 'youtube_video_gallery');
				$header_settings			= __('Header', 'youtube_video_gallery');
				$static_text_settings		= __('Static Text', 'youtube_video_gallery');
				$color_settings				= __('Color', 'youtube_video_gallery');
				$typography_settings		= __('Typography', 'youtube_video_gallery');				
				
				$custom_columns				= 	array(
													__('Default', 'youtube_video_gallery') 		=> 'default',
													__('1 Column', 'youtube_video_gallery') 	=> '1',																		
													__('2 Columns', 'youtube_video_gallery') 	=> '2',
													__('3 Columns', 'youtube_video_gallery') 	=> '3',
													__('4 Columns', 'youtube_video_gallery') 	=> '4',
													__('5 Columns', 'youtube_video_gallery') 	=> '5',
													__('6 Columns', 'youtube_video_gallery') 	=> '6',
													__('7 Columns', 'youtube_video_gallery') 	=> '7',
													__('8 Columns', 'youtube_video_gallery') 	=> '8',
													__('9 Columns', 'youtube_video_gallery') 	=> '9',
													__('10 Columns', 'youtube_video_gallery') 	=> '10',
													__('11 Columns', 'youtube_video_gallery') 	=> '11',
													__('12 Columns', 'youtube_video_gallery') 	=> '12',																				
												);
												
				$time_locale				= 	array(
													__('English (United States)', 'youtube_video_gallery')			=> 'en',
													__('English (Australia)', 'youtube_video_gallery')				=> 'en-au',
													__('English (Canada)', 'youtube_video_gallery')					=> 'en-ca',
													__('English (Ireland)', 'youtube_video_gallery')				=> 'en-ie',
													__('English (New Zealand)', 'youtube_video_gallery')			=> 'en-nz',
													__('English (United Kingdom)', 'youtube_video_gallery')			=> 'en-gb',													
													__('Afrikaans', 'youtube_video_gallery')						=> 'af',
													__('Albanian', 'youtube_video_gallery')							=> 'sq',
													__('Arabic', 'youtube_video_gallery')							=> 'ar',
													__('Arabic (Algeria)', 'youtube_video_gallery')					=> 'ar-dz',
													__('Arabic (Lybia)', 'youtube_video_gallery')					=> 'ar-ly',
													__('Arabic (Morocco)', 'youtube_video_gallery')					=> 'ar-ma',
													__('Arabic (Saudi Arabia)', 'youtube_video_gallery')			=> 'ar-sa',
													__('Arabic (Tunisia)', 'youtube_video_gallery')					=> 'ar-tn',
													__('Armenian', 'youtube_video_gallery')							=> 'hy-am',
													__('Azerbaijani', 'youtube_video_gallery')						=> 'az',
													__('Basque', 'youtube_video_gallery')							=> 'eu',
													__('Belarusian', 'youtube_video_gallery')						=> 'be',
													__('Bengali', 'youtube_video_gallery')							=> 'bn',
													__('Bosnian', 'youtube_video_gallery')							=> 'bs',
													__('Breton', 'youtube_video_gallery')							=> 'br',
													__('Bulgarian', 'youtube_video_gallery')						=> 'bg',
													__('Burmese', 'youtube_video_gallery')							=> 'my',
													__('Cambodian', 'youtube_video_gallery')						=> 'km',
													__('Catalan', 'youtube_video_gallery')							=> 'ca',
													__('Central Atlas Tamazight', 'youtube_video_gallery')			=> 'tzm',
													__('Central Atlas Tamazight Latin', 'youtube_video_gallery')	=> 'tzm-latn',
													__('Chinese (China)', 'youtube_video_gallery')					=> 'zh-cn',
													__('Chinese (Hong Kong)', 'youtube_video_gallery')				=> 'zh-hk',
													__('Chinese (Taiwan)', 'youtube_video_gallery')					=> 'zh-tw',
													__('Chuvash', 'youtube_video_gallery')							=> 'cv',
													__('Croatian', 'youtube_video_gallery')							=> 'hr',
													__('Czech', 'youtube_video_gallery')							=> 'cs',
													__('Danish', 'youtube_video_gallery')							=> 'da',
													__('Dutch', 'youtube_video_gallery')							=> 'nl',
													__('Dutch (Belgium)', 'youtube_video_gallery')					=> 'nl-be',													
													__('Esperanto', 'youtube_video_gallery')						=> 'eo',
													__('Estonian', 'youtube_video_gallery')							=> 'et',
													__('Faroese', 'youtube_video_gallery')							=> 'fo',
													__('Finnish', 'youtube_video_gallery')							=> 'fi',
													__('French', 'youtube_video_gallery')							=> 'fr',
													__('French (Canada)', 'youtube_video_gallery')					=> 'fr-ca',
													__('French (Switzerland)', 'youtube_video_gallery')				=> 'fr-ch',
													__('Frisian', 'youtube_video_gallery')							=> 'fy',
													__('Galician', 'youtube_video_gallery')							=> 'gl',
													__('Georgian', 'youtube_video_gallery')							=> 'ka',
													__('German', 'youtube_video_gallery')							=> 'de',
													__('German (Austria)', 'youtube_video_gallery')					=> 'de-at',
													__('Greek', 'youtube_video_gallery')							=> 'el',
													__('Hebrew', 'youtube_video_gallery')							=> 'he',
													__('Hindi', 'youtube_video_gallery')							=> 'hi',
													__('Hungarian', 'youtube_video_gallery')						=> 'hu',
													__('Icelandic', 'youtube_video_gallery')						=> 'is',
													__('Indonesian', 'youtube_video_gallery')						=> 'id',
													__('Italian', 'youtube_video_gallery')							=> 'it',
													__('Japanese', 'youtube_video_gallery')							=> 'ja',
													__('Javanese', 'youtube_video_gallery')							=> 'jv',
													__('Kazakh', 'youtube_video_gallery')							=> 'kk',
													__('Klingon', 'youtube_video_gallery')							=> 'tlh',
													__('Korean', 'youtube_video_gallery')							=> 'ko',
													__('Kyrgyz', 'youtube_video_gallery')							=> 'ky',
													__('Lao', 'youtube_video_gallery')								=> 'lo',
													__('Latvian', 'youtube_video_gallery')							=> 'lv',
													__('Lithuanian', 'youtube_video_gallery')						=> 'lt',
													__('Luxembourgish', 'youtube_video_gallery')					=> 'lb',
													__('Macedonian', 'youtube_video_gallery')						=> 'mk',
													__('Malay', 'youtube_video_gallery')							=> 'ms-my',
													__('Malay', 'youtube_video_gallery')							=> 'ms',
													__('Malayalam', 'youtube_video_gallery')						=> 'ml',
													__('Maldivian', 'youtube_video_gallery')						=> 'dv',
													__('Maori', 'youtube_video_gallery')							=> 'mi',
													__('Marathi', 'youtube_video_gallery')							=> 'mr',
													__('Montenegrin', 'youtube_video_gallery')						=> 'me',
													__('Nepalese', 'youtube_video_gallery')							=> 'ne',
													__('Northern Sami', 'youtube_video_gallery')					=> 'se',
													__('Norwegian Bokmål', 'youtube_video_gallery')					=> 'nb',
													__('Nynorsk', 'youtube_video_gallery')							=> 'nn',
													__('Persian', 'youtube_video_gallery')							=> 'fa',
													__('Polish', 'youtube_video_gallery')							=> 'pl',
													__('Portuguese', 'youtube_video_gallery')						=> 'pt',
													__('Portuguese (Brazil)', 'youtube_video_gallery')				=> 'pt-br',
													__('Pseudo', 'youtube_video_gallery')							=> 'x-pseudo',
													__('Punjabi (India)', 'youtube_video_gallery')					=> 'pa-in',
													__('Romanian', 'youtube_video_gallery')							=> 'ro',
													__('Russian', 'youtube_video_gallery')							=> 'ru',
													__('Scottish Gaelic', 'youtube_video_gallery')					=> 'gd',
													__('Serbian', 'youtube_video_gallery')							=> 'sr',
													__('Serbian Cyrillic', 'youtube_video_gallery')					=> 'sr-cyrl',
													__('Sinhalese', 'youtube_video_gallery')						=> 'si',
													__('Slovak', 'youtube_video_gallery')							=> 'sk',
													__('Slovenian', 'youtube_video_gallery')						=> 'sl',
													__('Spanish', 'youtube_video_gallery')							=> 'es',
													__('Spanish (Dominican Republic)', 'youtube_video_gallery')		=> 'es-do',
													__('Swahili', 'youtube_video_gallery')							=> 'sw',
													__('Swedish', 'youtube_video_gallery')							=> 'sv',
													__('Tagalog (Philippines)', 'youtube_video_gallery')			=> 'tl-ph',
													__('Talossan', 'youtube_video_gallery')							=> 'tzl',
													__('Tamil', 'youtube_video_gallery')							=> 'ta',
													__('Telugu', 'youtube_video_gallery')							=> 'te',
													__('Tetun Dili (East Timor)', 'youtube_video_gallery')			=> 'tet',
													__('Thai', 'youtube_video_gallery')								=> 'th',
													__('Tibetan', 'youtube_video_gallery')							=> 'bo',
													__('Turkish', 'youtube_video_gallery')							=> 'tr',
													__('Ukrainian', 'youtube_video_gallery')						=> 'uk',
													__('Uzbek', 'youtube_video_gallery')							=> 'uz',
													__('Vietnamese', 'youtube_video_gallery')						=> 'vi',
													__('Welsh', 'youtube_video_gallery')							=> 'cy',
													__('Yoruba Nigeria', 'youtube_video_gallery')					=> 'yo',
													__('siSwati', 'youtube_video_gallery')							=> 'ss',
												);	
												
				$font_weight				= 	array(	
													__('Default', 'youtube_video_gallery') 	=> '',
													__('Normal', 'youtube_video_gallery')	=> 'normal',																		
													__('Bold', 'youtube_video_gallery') 	=> 'bold',
													__('100', 'youtube_video_gallery') 		=> '100',																			
													__('300', 'youtube_video_gallery') 		=> '300',
													__('400', 'youtube_video_gallery') 		=> '400',	
													__('500', 'youtube_video_gallery') 		=> '500',	
													__('600', 'youtube_video_gallery') 		=> '600',																		
													__('700', 'youtube_video_gallery') 		=> '700',
													__('800', 'youtube_video_gallery') 		=> '800',
													__('900', 'youtube_video_gallery') 		=> '900',																																				
												);
				$font_style					=	array(	
													__('Default', 'youtube_video_gallery') 	=> '',
													__('Normal', 'youtube_video_gallery') 	=> 'normal',																		
													__('Italic', 'youtube_video_gallery') 	=> 'italic',																			
													__('Oblique', 'youtube_video_gallery') 	=> 'oblique',																																																								
												);
				
				$text_transform				=	array(	
													__('Default', 'youtube_video_gallery') 		=> '',
													__('Uppercase', 'youtube_video_gallery') 	=> 'uppercase',																		
													__('Lowercase', 'youtube_video_gallery') 	=> 'lowercase',																			
													__('Capitalize', 'youtube_video_gallery') 	=> 'capitalize',
													__('None', 'youtube_video_gallery') 		=> 'none',																																																								
												);															
								
				vc_map(
					array(
						'name' 				=> 	__('Youtube Video Gallery', 'youtube_video_gallery'),
						'base' 				=> 	'ytvg_container',
						'category' 			=> 	$group_category,
						'icon'				=> 	YT_BETE_PLUGIN_URL.'assets/back-end/images/youtube-video-gallery.png',						
						'params'			=> 	array(
						
							/*$data_source*/
							array(
								'type' 			=> 	'param_group',
								'heading' 		=> 	__('Data Source Groups', 'youtube_video_gallery'),
								'param_name' 	=> 	'data',
								'description' 	=> 	__('Custom groups of videos from YouTube source (support: channels, playlists, videos).', 'youtube_video_gallery'),
								'params' 		=> 	array(
									array(
										'type' 			=> 	'textfield',
										'heading' 		=> 	__('Group name', 'youtube_video_gallery'),
										'param_name' 	=> 	'name',
									),
									array(
										'type' 			=> 	'textarea',
										'heading' 		=> 	__('Group Sources', 'youtube_video_gallery'),
										'param_name' 	=> 	'urls',
										'description' 	=> 	wp_kses(
																__('Paste your [channels, playlists or videos] urls to here. Enter one url per line (Each url on a new row).
																<br><br><strong>For Example:</strong>
																<br>https://www.youtube.com/user/Battlefield
																<br>https://www.youtube.com/channel/UCoDcFZ5KZ0KwBC_omalJuiA
																<br>https://www.youtube.com/playlist?list=PLZeek85Kuka2o8JkicDxLOh47frrPi10X
																<br>https://www.youtube.com/watch?v=aeCmlH_-rWg', 'youtube_video_gallery'
																),
																array(
																	'br'=>array(), 
																	'strong'=>array()
																)
															)	
									)
								),
								'group' 		=> 	$data_source,
							),
							array(
								'type' 			=> 	'dropdown',
								'heading' 		=> 	__('Show Groups (Tabs)', 'youtube_video_gallery'),								
								'param_name' 	=> 	'layout_tabs',
								'value' 		=> 	array(	
														__('Yes', 'youtube_video_gallery') 	=> 'true',																		
														__('No', 'youtube_video_gallery') 	=> 'false',																																																							
													),
								'description' 	=> 	__('Show/Hide Tabs of data source groups in frontend.', 'youtube_video_gallery'),
								'group' 		=> 	$data_source
							),/*$data_source*/							
							
							/*$layout_settings*/
							array(
								'type' 			=> 	'dropdown',
								'heading' 		=> 	__('Layout', 'youtube_video_gallery'),								
								'param_name' 	=> 	'layout',
								'value' 		=> 	array(	
														__('GRID', 'youtube_video_gallery') 			=> 'grid',																		
														__('LIST', 'youtube_video_gallery') 			=> 'list',
														__('CAROUSEL', 'youtube_video_gallery') 		=> 'carousel',																																																																			
													),
								'description' 	=> 	__('Choose the layout for gallery.', 'youtube_video_gallery'),
								'group' 		=> 	$layout_settings
							),
								array(
									'type' 			=> 	'dropdown',
									'heading' 		=> 	__('GRID STYLE', 'youtube_video_gallery'),								
									'param_name' 	=> 	'grid_style',
									'value' 		=> 	array(	
															__('CLASSIC', 'youtube_video_gallery') 			=> 'grid-classic-1',																		
															__('SPECIAL', 'youtube_video_gallery') 			=> 'grid-special-1',																																																																																	
														),	
									'dependency' 		=> 	array(
															'element'	=> 'layout',
															'value' 	=> array('grid'),
														),													
									'group' 		=> 	$layout_settings
								),
								array(
									'type' 			=> 	'dropdown',
									'heading' 		=> 	__('LIST STYLE', 'youtube_video_gallery'),								
									'param_name' 	=> 	'list_style',
									'value' 		=> 	array(	
															__('CLASSIC 1', 'youtube_video_gallery') 		=> 'list-classic-1',
															__('CLASSIC 2', 'youtube_video_gallery') 		=> 'list-classic-2',																		
															__('SPECIAL', 'youtube_video_gallery') 			=> 'list-special-1',																																																																																	
														),	
									'dependency' 		=> 	array(
															'element'	=> 'layout',
															'value' 	=> array('list'),
														),														
									'group' 		=> 	$layout_settings
								),
								array(
									'type' 			=> 	'dropdown',
									'heading' 		=> 	__('CAROUSEL STYLE', 'youtube_video_gallery'),								
									'param_name' 	=> 	'carousel_style',
									'value' 		=> 	array(	
															__('CLASSIC', 'youtube_video_gallery') 			=> 'carousel-classic-1',																		
															__('SPECIAL', 'youtube_video_gallery') 			=> 'carousel-special-1',																																																																																	
														),	
									'dependency' 		=> 	array(
															'element'	=> 'layout',
															'value' 	=> array('carousel'),
														),													
									'group' 		=> 	$layout_settings
								),
									
									/*$carousel_settings*/									
									array(															
										'type' 				=> 'textfield',
										'heading' 			=> __('Distance between slides (in px)', 'youtube_video_gallery'),
										'param_name' 		=> 'spacebetween',
										'description' 		=> __('If blank, defaults to: 20', 'youtube_video_gallery'),
										'dependency' 		=> 	array(
																'element'	=> 'layout',
																'value' 	=> array('carousel'),
															),															
										'group'				=> $carousel_settings,																				
									),									
									array(															
										'type' 				=> 'textfield',
										'heading' 			=> __('Speed (in millisecond)', 'youtube_video_gallery'),
										'param_name' 		=> 'speed',
										'description' 		=> __('Duration of transition between slides (in ms). If blank, defaults to: 600', 'youtube_video_gallery'),
										'dependency' 		=> 	array(
																'element'	=> 'layout',
																'value' 	=> array('carousel'),
															),															
										'group'				=> $carousel_settings,																				
									),
									array(															
										'type' 				=> 'textfield',
										'heading' 			=> __('Autoplay (in millisecond)', 'youtube_video_gallery'),
										'param_name' 		=> 'autoplay',
										'description' 		=> __('Delay between transitions (in ms). If this parameter is not specified, auto play will be disabled.', 'youtube_video_gallery'),
										'dependency' 		=> 	array(
																'element'	=> 'layout',
																'value' 	=> array('carousel'),
															),															
										'group'				=> $carousel_settings,																				
									),									
									array(															
										'type' 				=> 'textfield',
										'heading' 			=> __('Columns (default)', 'youtube_video_gallery'),
										'param_name' 		=> 'slidesperview',
										'description' 		=> __('The maximum value, before entering the smaller screen - If blank, defaults to: 1', 'youtube_video_gallery'),
										'dependency' 		=> 	array(
																'element'	=> 'layout',
																'value' 	=> array('carousel'),
															),															
										'group'				=> $carousel_settings,																				
									),
									array(															
										'type' 				=> 'textfield',
										'heading' 			=> __('Rows (default)', 'youtube_video_gallery'),
										'param_name' 		=> 'slidespercolumn',
										'description' 		=> __('If blank, defaults to: 1', 'youtube_video_gallery'),
										'dependency' 		=> 	array(
																'element'	=> 'layout',
																'value' 	=> array('carousel'),
															),															
										'group'				=> $carousel_settings,																				
									),
									array(
										'type' 			=> 	'param_group',
										'heading' 		=> 	__('Responsive breakpoints', 'youtube_video_gallery'),
										'param_name' 	=> 	'breakpoints',
										'description' 	=> 	__(	'Most often these are the smart phone (usually the iPhone at 320px and 480px), 
																the tablet (usually the iPad at 768px and 1024px) and finally anything above 1024px.', 'youtube_video_gallery'),
										'params' 		=> 	array(
											array(
												'type' 			=> 	'textfield',
												'heading' 		=> 	__('Window Width (in px)', 'youtube_video_gallery'),
												'param_name' 	=> 	'window_width',
											),
											array(
												'type' 			=> 	'textfield',
												'heading' 		=> 	__('Columns', 'youtube_video_gallery'),
												'param_name' 	=> 	'slidesperview',
												'description' 	=> 	__('If blank, defaults to: 1', 'youtube_video_gallery'),
											),											
											array(
												'type' 			=> 	'textfield',
												'heading' 		=> 	__('Distance between slides (in px)', 'youtube_video_gallery'),
												'param_name' 	=> 	'spacebetween',
												'description' 	=> 	__('If blank, defaults to: 20', 'youtube_video_gallery'),
											)
										),
										'dependency' 		=> 	array(
																'element'	=> 'layout',
																'value' 	=> array('carousel'),
															),
										'group' 		=> 	$carousel_settings,
									),
									/*$carousel_settings*/
																	
								array(															
									'type' 				=> 'textfield',
									'heading' 			=> __('Items per page', 'youtube_video_gallery'),
									'param_name' 		=> 'layout_items_per_page',
									'description' 		=> __('Number of items to show per page (Maximum is: 50). If blank, defaults to: 10', 'youtube_video_gallery'),
									'dependency' 		=> 	array(
															'element'	=> 'layout',
															'value' 	=> array('grid', 'list'),
														),															
									'group'				=> $layout_settings,																				
								),
								array( // work with GRID, LIST
									'type' 			=>	'dropdown',
									'heading' 		=>	__('Pagination', 'youtube_video_gallery'),
									'param_name' 	=>	'layout_pagination',
									'description' 	=>	__('Work with Layout Styles: GRID, LIST.', 'youtube_video_gallery'),
									'value' 		=> 	array(	
														__('Infinite Scroll', 'youtube_video_gallery') 	=> 'infinite',																		
														__('Load More Button', 'youtube_video_gallery') => 'loadmore',
														__('Prev-Next Button', 'youtube_video_gallery') => 'prev-next',																																																							
													),
									'dependency' 	=>	array(
															'element'	=> 'layout',
															'value' 	=> array('grid', 'list'),
													  	),				   
									'group'			=> $layout_settings,																	
								),
								array( // work with GRID
									'type' 			=>	'dropdown',
									'heading' 		=>	__('Custom Columns - Mobiles (=0px and up)', 'youtube_video_gallery'),
									'param_name' 	=>	'layout_mobile',
									'description' 	=>	__('Work with Layout Styles: GRID, CAROUSEL.', 'youtube_video_gallery'),
									'value' 		=>	$custom_columns,
									'dependency' 	=>	array(
															'element'	=> 'layout',
															'value' 	=> array('grid'),
													  	),				   
									'group'			=> $layout_settings,																	
								),
								array( // work with GRID
									'type' 			=>	'dropdown',
									'heading' 		=>	__('Custom Columns - Portrait Tablets (=600px and up)', 'youtube_video_gallery'),
									'param_name' 	=>	'layout_portrait_tablet',
									'description' 	=>	__('Work with Layout Styles: GRID, CAROUSEL.', 'youtube_video_gallery'),
									'value' 		=>	$custom_columns,
									'dependency' 	=>	array(
															'element'	=> 'layout',
															'value' 	=> array('grid'),
													  	),				   
									'group'			=> $layout_settings,																	
								),
								array( // work with GRID
									'type' 			=>	'dropdown',
									'heading' 		=>	__('Custom Columns - Landscape Tablets (=800px and up)', 'youtube_video_gallery'),
									'param_name' 	=>	'layout_landscape_tablet',
									'description' 	=>	__('Work with Layout Styles: GRID, CAROUSEL.', 'youtube_video_gallery'),
									'value' 		=>	$custom_columns,
									'dependency' 	=>	array(
															'element'	=> 'layout',
															'value' 	=> array('grid'),
													  	),				   
									'group'			=> $layout_settings,																	
								),
								array( // work with GRID
									'type' 			=>	'dropdown',
									'heading' 		=>	__('Custom Columns - Small - Desktops (=1025px and up)', 'youtube_video_gallery'),
									'param_name' 	=>	'layout_small_desktop',
									'description' 	=>	__('Work with Layout Styles: GRID, CAROUSEL.', 'youtube_video_gallery'),
									'value' 		=>	$custom_columns,
									'dependency' 	=>	array(
															'element'	=> 'layout',
															'value' 	=> array('grid'),
													  	),				   
									'group'			=> $layout_settings,																	
								),
								array( // work with GRID
									'type' 			=>	'dropdown',
									'heading' 		=>	__('Custom Columns - Medium - Desktops (=1366px and up)', 'youtube_video_gallery'),
									'param_name' 	=>	'layout_medium_desktop',
									'description' 	=>	__('Work with Layout Styles: GRID, CAROUSEL.', 'youtube_video_gallery'),
									'value' 		=>	$custom_columns,
									'dependency' 	=>	array(
															'element'	=> 'layout',
															'value' 	=> array('grid'),
													  	),				   
									'group'			=> $layout_settings,																	
								),
								array( // work with GRID
									'type' 			=>	'dropdown',
									'heading' 		=>	__('Custom Columns - Large - Desktops (=1600px and up)', 'youtube_video_gallery'),
									'param_name' 	=>	'layout_large_desktop',
									'description' 	=>	__('Work with Layout Styles: GRID, CAROUSEL.', 'youtube_video_gallery'),
									'value' 		=>	$custom_columns,
									'dependency' 	=>	array(
															'element'	=> 'layout',
															'value' 	=> array('grid'),
													  	),				   
									'group'			=> $layout_settings,																	
								),
								array( // work with GRID
									'type' 			=>	'dropdown',
									'heading' 		=>	__('Custom Columns - Extra Large - Desktops (=1920px and up)', 'youtube_video_gallery'),
									'param_name' 	=>	'layout_extra_large_desktop',
									'description' 	=>	__('Work with Layout Styles: GRID, CAROUSEL.', 'youtube_video_gallery'),
									'value' 		=>	$custom_columns,
									'dependency' 	=>	array(
															'element'	=> 'layout',
															'value' 	=> array('grid'),
													  	),				   
									'group'			=> $layout_settings,																	
								),
								array(
									'type' 			=> 	'dropdown',
									'heading' 		=> 	__('Image Size', 'youtube_video_gallery'),								
									'param_name' 	=> 	'layout_img_size',
									'value' 		=> 	array(	
															__('High (480px * 360px)', 'youtube_video_gallery') 	=> 'high',	
															__('Default (120px * 90px)', 'youtube_video_gallery') 	=> 'default',																		
															__('Medium (320px * 180px)', 'youtube_video_gallery') 	=> 'medium',															
															__('Standard (640px * 480px)', 'youtube_video_gallery') => 'standard',	
															__('Maxres (1280px * 720px)', 'youtube_video_gallery') 	=> 'maxres',																																																						
														),
									'description' 	=> 	__('You can use thumbnails in a variety of sizes on YouTube.', 'youtube_video_gallery'),
									'group' 		=> 	$layout_settings
								),
								
							array(
								'type' 			=> 	'dropdown',
								'heading' 		=> 	__('Video Play Mode', 'youtube_video_gallery'),								
								'param_name' 	=> 	'layout_play_mode',
								'value' 		=> 	array(	
														__('Popup', 'youtube_video_gallery') 	=> 'popup',																		
														__('Inline', 'youtube_video_gallery') 	=> 'inline',
														__('Youtube', 'youtube_video_gallery') 	=> 'youtube',																																																							
													),
								'description' 	=> 	__('Choose the mode of watching videos: in popup, directly in the video gallery, or in a new browser tab right in YouTube.', 'youtube_video_gallery'),
								'group' 		=> 	$layout_settings
							),
							array(
								'type' 			=> 	'dropdown',
								'heading' 		=> 	__('Show Title', 'youtube_video_gallery'),								
								'param_name' 	=> 	'layout_title',
								'value' 		=> 	array(	
														__('Yes', 'youtube_video_gallery') 		=> 'true',																		
														__('No', 'youtube_video_gallery') 		=> 'false',																																																							
													),								
								'group' 		=> 	$layout_settings
							),
							array(
								'type' 			=> 	'dropdown',
								'heading' 		=> 	__('Limit Title To One Line', 'youtube_video_gallery'),								
								'param_name' 	=> 	'layout_title_one_line',
								'value' 		=> 	array(	
														__('Yes', 'youtube_video_gallery') 		=> 'true',																		
														__('No', 'youtube_video_gallery') 		=> 'false',																																																							
													),								
								'group' 		=> 	$layout_settings
							),
							array(
								'type' 			=> 	'dropdown',
								'heading' 		=> 	__('Show Description', 'youtube_video_gallery'),								
								'param_name' 	=> 	'layout_description',
								'value' 		=> 	array(	
														__('Yes', 'youtube_video_gallery') 		=> 'true',																		
														__('No', 'youtube_video_gallery') 		=> 'false',																																																							
													),								
								'group' 		=> 	$layout_settings
							),
								array(
									'type' 			=>	'textfield',
									'heading' 		=>	__('Description Length', 'youtube_video_gallery'), 
									'param_name' 	=>	'layout_description_length',
									'description' 	=>	wp_kses(
															__('Enter description length. Example: <code>100</code>, <code>150</code>, <code>55</code>... - . If blank, defaults to: 60', 'youtube_video_gallery'),
															array(
																'code'=>array(), 																
															)
														),
									'dependency' 	=>	array(
															'element' 					=> 'layout_description',
															'value' 					=> array('true'),
														),	
									'group'			=> $layout_settings,																		 
								),
							array(
								'type' 			=> 	'dropdown',
								'heading' 		=> 	__('Show Duration', 'youtube_video_gallery'),								
								'param_name' 	=> 	'layout_duration',
								'value' 		=> 	array(	
														__('Yes', 'youtube_video_gallery') 		=> 'true',																		
														__('No', 'youtube_video_gallery') 		=> 'false',																																																							
													),								
								'group' 		=> 	$layout_settings
							),
							array(
								'type' 			=> 	'dropdown',
								'heading' 		=> 	__('Show Views Counter', 'youtube_video_gallery'),								
								'param_name' 	=> 	'layout_views_counter',
								'value' 		=> 	array(	
														__('Yes', 'youtube_video_gallery') 		=> 'true',																		
														__('No', 'youtube_video_gallery') 		=> 'false',																																																							
													),								
								'group' 		=> 	$layout_settings
							),
							array(
								'type' 			=> 	'dropdown',
								'heading' 		=> 	__('Show Likes Counter', 'youtube_video_gallery'),								
								'param_name' 	=> 	'layout_likes_counter',
								'value' 		=> 	array(	
														__('Yes', 'youtube_video_gallery') 		=> 'true',																		
														__('No', 'youtube_video_gallery') 		=> 'false',																																																							
													),								
								'group' 		=> 	$layout_settings
							),
							array(
								'type' 			=> 	'dropdown',
								'heading' 		=> 	__('Show Dislikes Counter', 'youtube_video_gallery'),								
								'param_name' 	=> 	'layout_dislikes_counter',
								'value' 		=> 	array(	
														__('Yes', 'youtube_video_gallery') 		=> 'true',																		
														__('No', 'youtube_video_gallery') 		=> 'false',																																																							
													),								
								'group' 		=> 	$layout_settings
							),
							array(
								'type' 			=> 	'dropdown',
								'heading' 		=> 	__('Show Published Date', 'youtube_video_gallery'),								
								'param_name' 	=> 	'layout_date',
								'value' 		=> 	array(	
														__('Yes', 'youtube_video_gallery') 		=> 'true',																		
														__('No', 'youtube_video_gallery') 		=> 'false',																																																							
													),								
								'group' 		=> 	$layout_settings
							),
							array(
								'type' 			=> 	'dropdown',
								'heading' 		=> 	__('Show Comments Counter', 'youtube_video_gallery'),								
								'param_name' 	=> 	'layout_comments_counter',
								'value' 		=> 	array(	
														__('Yes', 'youtube_video_gallery') 		=> 'true',																		
														__('No', 'youtube_video_gallery') 		=> 'false',																																																							
													),								
								'group' 		=> 	$layout_settings
							),
							array(
								'type' 			=> 	'dropdown',
								'heading' 		=> 	__('Show Play Button', 'youtube_video_gallery'),								
								'param_name' 	=> 	'layout_play_btn',
								'value' 		=> 	array(	
														__('Yes', 'youtube_video_gallery') 		=> 'true',																		
														__('No', 'youtube_video_gallery') 		=> 'false',																																																							
													),								
								'group' 		=> 	$layout_settings
							),/*$layout_settings*/	
							
							/*$header_settings*/
							array(
								'type' 			=> 	'dropdown',
								'heading' 		=> 	__('Show Header', 'youtube_video_gallery'),								
								'param_name' 	=> 	'header',
								'value' 		=> 	array(	
														__('No', 'youtube_video_gallery') 		=> 'false',	
														__('Yes', 'youtube_video_gallery') 		=> 'true',																																									
													),								
								'group' 		=> 	$header_settings
							),
							array(															
								'type' 				=> 	'textfield',
								'heading' 			=> 	__('Channel Source', 'youtube_video_gallery'),
								'param_name' 		=> 	'header_source',	
								'description' 		=> 	__(	'Paste your channel url to here. Example: https://www.youtube.com/user/Battlefield 
															(or) https://www.youtube.com/channel/UCoDcFZ5KZ0KwBC_omalJuiA', 'youtube_video_gallery'),																					
								'group'				=> $header_settings,																				
							),	
							array(
								'type' 			=> 	'dropdown',
								'heading' 		=> 	__('Header Style', 'youtube_video_gallery'),								
								'param_name' 	=> 	'header_style',
								'value' 		=> 	array(	
														__('Default', 'youtube_video_gallery') 		=> 'default',																																																						
													),								
								'group' 		=> 	$header_settings
							),
							array(
								'type' 			=> 	'dropdown',
								'heading' 		=> 	__('Show Channel Logo', 'youtube_video_gallery'),								
								'param_name' 	=> 	'header_logo',
								'value' 		=> 	array(	
														__('Yes', 'youtube_video_gallery') 		=> 'true',
														__('No', 'youtube_video_gallery') 		=> 'false',																												
													),								
								'group' 		=> 	$header_settings
							),
							array(
								'type' 			=> 	'dropdown',
								'heading' 		=> 	__('Show Channel Name', 'youtube_video_gallery'),								
								'param_name' 	=> 	'header_channel_name',
								'value' 		=> 	array(	
														__('Yes', 'youtube_video_gallery') 		=> 'true',
														__('No', 'youtube_video_gallery') 		=> 'false',																												
													),								
								'group' 		=> 	$header_settings
							),
							array(
								'type' 			=> 	'dropdown',
								'heading' 		=> 	__('Show Channel Description', 'youtube_video_gallery'),								
								'param_name' 	=> 	'header_channel_description',
								'value' 		=> 	array(	
														__('Yes', 'youtube_video_gallery') 		=> 'true',
														__('No', 'youtube_video_gallery') 		=> 'false',																												
													),								
								'group' 		=> 	$header_settings
							),
							array(
								'type' 			=> 	'dropdown',
								'heading' 		=> 	__('Show Channel Videos Counter', 'youtube_video_gallery'),								
								'param_name' 	=> 	'header_videos_counter',
								'value' 		=> 	array(	
														__('Yes', 'youtube_video_gallery') 		=> 'true',
														__('No', 'youtube_video_gallery') 		=> 'false',																												
													),								
								'group' 		=> 	$header_settings
							),
							array(
								'type' 			=> 	'dropdown',
								'heading' 		=> 	__('Show Channel Subscribers Counter', 'youtube_video_gallery'),								
								'param_name' 	=> 	'header_subscribers_counter',
								'value' 		=> 	array(	
														__('Yes', 'youtube_video_gallery') 		=> 'true',
														__('No', 'youtube_video_gallery') 		=> 'false',																												
													),								
								'group' 		=> 	$header_settings
							),
							array(
								'type' 			=> 	'dropdown',
								'heading' 		=> 	__('Show Channel Views Counter', 'youtube_video_gallery'),								
								'param_name' 	=> 	'header_views_counter',
								'value' 		=> 	array(	
														__('Yes', 'youtube_video_gallery') 		=> 'true',
														__('No', 'youtube_video_gallery') 		=> 'false',																												
													),								
								'group' 		=> 	$header_settings
							),
							array(
								'type' 			=> 	'dropdown',
								'heading' 		=> 	__('Show Channel Subscribe Button', 'youtube_video_gallery'),								
								'param_name' 	=> 	'header_subscribe_button',
								'value' 		=> 	array(	
														__('Yes', 'youtube_video_gallery') 		=> 'true',
														__('No', 'youtube_video_gallery') 		=> 'false',																												
													),								
								'group' 		=> 	$header_settings
							),
							array(															
								'type' 				=> 	'textfield',
								'heading' 			=> 	__('Custom Channel Name', 'youtube_video_gallery'),
								'param_name' 		=> 	'header_custom_channel_name',																						
								'group'				=> $header_settings,																				
							),	
							array(															
								'type' 				=> 	'textfield',
								'heading' 			=> 	__('Custom channel description', 'youtube_video_gallery'),
								'param_name' 		=> 	'header_custom_channel_description',																						
								'group'				=> $header_settings,																				
							),	
							array(
								'type' 				=> 'attach_image',
								'heading' 			=> __('Custom Channel Logo', 'youtube_video_gallery'),			
								'param_name' 		=> 'header_custom_channel_logo',								
								'group'				=> $header_settings,								
							),
							array(
								'type' 				=> 'attach_image',
								'heading' 			=> __('Custom Channel Banner', 'youtube_video_gallery'),			
								'param_name' 		=> 'header_custom_channel_background',								
								'group'				=> $header_settings,								
							),											
							/*$header_settings*/
							
							/*$video_settings*/
							array(
								'type' 			=> 	'dropdown',
								'heading' 		=> 	__('Autoplay', 'youtube_video_gallery'),								
								'param_name' 	=> 	'player_autoplay',
								'value' 		=> 	array(	
														__('Yes', 'youtube_video_gallery') 		=> 'true',																		
														__('No', 'youtube_video_gallery') 		=> 'false',																																																							
													),								
								'group' 		=> 	$video_settings
							),
							/*$video_settings*/						
							
							/*$popup_settings*/
							array(
								'type' 			=> 	'textfield',
								'heading' 		=> 	__('Popup Width', 'youtube_video_gallery'),								
								'param_name' 	=> 	'popup_width',
								'description' 	=> 	wp_kses(
															__('<strong>Example:</strong> <code>1000px</code>, <code>1200px</code> ... If blank, defaults to: <code>900px</code>', 'youtube_video_gallery'),
															array(
																'strong'=>array(),
																'code'=>array(), 																
															)
													),													
								'group' 		=> 	$popup_settings
							),
							array(
								'type' 			=> 	'dropdown',
								'heading' 		=> 	__('Show Title', 'youtube_video_gallery'),								
								'param_name' 	=> 	'popup_title',
								'value' 		=> 	array(	
														__('Yes', 'youtube_video_gallery') 		=> 'true',																		
														__('No', 'youtube_video_gallery') 		=> 'false',																																																							
													),								
								'group' 		=> 	$popup_settings
							),
							array(
								'type' 			=> 	'dropdown',
								'heading' 		=> 	__('Show Channel Profile Image', 'youtube_video_gallery'),								
								'param_name' 	=> 	'popup_channel_logo',
								'value' 		=> 	array(	
														__('Yes', 'youtube_video_gallery') 		=> 'true',																		
														__('No', 'youtube_video_gallery') 		=> 'false',																																																							
													),								
								'group' 		=> 	$popup_settings
							),
							array(
								'type' 			=> 	'dropdown',
								'heading' 		=> 	__('Show Channel Name', 'youtube_video_gallery'),								
								'param_name' 	=> 	'popup_channel_name',
								'value' 		=> 	array(	
														__('Yes', 'youtube_video_gallery') 		=> 'true',																		
														__('No', 'youtube_video_gallery') 		=> 'false',																																																							
													),								
								'group' 		=> 	$popup_settings
							),
							array(
								'type' 			=> 	'dropdown',
								'heading' 		=> 	__('Show Subscription Button', 'youtube_video_gallery'),								
								'param_name' 	=> 	'popup_subscribe_button',
								'value' 		=> 	array(	
														__('Yes', 'youtube_video_gallery') 		=> 'true',																		
														__('No', 'youtube_video_gallery') 		=> 'false',																																																							
													),								
								'group' 		=> 	$popup_settings
							),
							array(
								'type' 			=> 	'dropdown',
								'heading' 		=> 	__('Show Views Counter', 'youtube_video_gallery'),								
								'param_name' 	=> 	'popup_views_counter',
								'value' 		=> 	array(	
														__('Yes', 'youtube_video_gallery') 		=> 'true',																		
														__('No', 'youtube_video_gallery') 		=> 'false',																																																							
													),								
								'group' 		=> 	$popup_settings
							),
							array(
								'type' 			=> 	'dropdown',
								'heading' 		=> 	__('Show Likes Counter', 'youtube_video_gallery'),								
								'param_name' 	=> 	'popup_likes_counter',
								'value' 		=> 	array(	
														__('Yes', 'youtube_video_gallery') 		=> 'true',																		
														__('No', 'youtube_video_gallery') 		=> 'false',																																																							
													),								
								'group' 		=> 	$popup_settings
							),
							array(
								'type' 			=> 	'dropdown',
								'heading' 		=> 	__('Show Dislikes Counter', 'youtube_video_gallery'),								
								'param_name' 	=> 	'popup_dislikes_counter',
								'value' 		=> 	array(	
														__('Yes', 'youtube_video_gallery') 		=> 'true',																		
														__('No', 'youtube_video_gallery') 		=> 'false',																																																							
													),								
								'group' 		=> 	$popup_settings
							),
							array(
								'type' 			=> 	'dropdown',
								'heading' 		=> 	__('Show Likes Ratio', 'youtube_video_gallery'),								
								'param_name' 	=> 	'popup_likes_ratio',
								'value' 		=> 	array(	
														__('Yes', 'youtube_video_gallery') 		=> 'true',																		
														__('No', 'youtube_video_gallery') 		=> 'false',																																																							
													),								
								'group' 		=> 	$popup_settings
							),
							array(
								'type' 			=> 	'dropdown',
								'heading' 		=> 	__('Show Published Date', 'youtube_video_gallery'),								
								'param_name' 	=> 	'popup_date',
								'value' 		=> 	array(	
														__('Yes', 'youtube_video_gallery') 		=> 'true',																		
														__('No', 'youtube_video_gallery') 		=> 'false',																																																							
													),								
								'group' 		=> 	$popup_settings
							),
							array(
								'type' 			=> 	'dropdown',
								'heading' 		=> 	__('Show Description', 'youtube_video_gallery'),								
								'param_name' 	=> 	'popup_description',
								'value' 		=> 	array(	
														__('Yes', 'youtube_video_gallery') 		=> 'true',																		
														__('No', 'youtube_video_gallery') 		=> 'false',																																																							
													),								
								'group' 		=> 	$popup_settings
							),
							array(
								'type' 			=> 	'dropdown',
								'heading' 		=> 	__('Show Description More Button', 'youtube_video_gallery'),								
								'param_name' 	=> 	'popup_description_more_button',
								'value' 		=> 	array(	
														__('Yes', 'youtube_video_gallery') 		=> 'true',																		
														__('No', 'youtube_video_gallery') 		=> 'false',																																																							
													),								
								'group' 		=> 	$popup_settings
							),
							array(
								'type' 			=> 	'dropdown',
								'heading' 		=> 	__('Show Comments', 'youtube_video_gallery'),								
								'param_name' 	=> 	'popup_comments',
								'value' 		=> 	array(	
														__('Yes', 'youtube_video_gallery') 		=> 'true',																		
														__('No', 'youtube_video_gallery') 		=> 'false',																																																							
													),								
								'group' 		=> 	$popup_settings
							),
							array(
								'type' 			=> 	'dropdown',
								'heading' 		=> 	__('Social Share', 'youtube_video_gallery'),								
								'param_name' 	=> 	'social_share',
								'value' 		=> 	array(	
														__('Yes', 'youtube_video_gallery') 		=> 'true',																		
														__('No', 'youtube_video_gallery') 		=> 'false',																																																							
													),								
								'group' 		=> 	$popup_settings
							),
								array(
									'type' 			=> 	'dropdown',
									'heading' 		=> 	__('[Social Share] Facebook', 'youtube_video_gallery'),								
									'param_name' 	=> 	'ss_facebook',
									'value' 		=> 	array(	
															__('Yes', 'youtube_video_gallery') 		=> 'true',																		
															__('No', 'youtube_video_gallery') 		=> 'false',																																																							
														),	
									'dependency' 	=> 	array(
																'element'	=> 'social_share',
																'value' 	=> array('true'),
														),												
									'group' 		=> 	$popup_settings
								),
								array(
									'type' 			=> 	'dropdown',
									'heading' 		=> 	__('[Social Share] Twitter', 'youtube_video_gallery'),								
									'param_name' 	=> 	'ss_twitter',
									'value' 		=> 	array(	
															__('Yes', 'youtube_video_gallery') 		=> 'true',																		
															__('No', 'youtube_video_gallery') 		=> 'false',																																																							
														),	
									'dependency' 	=> 	array(
																'element'	=> 'social_share',
																'value' 	=> array('true'),
														),												
									'group' 		=> 	$popup_settings
								),
								array(
									'type' 			=> 	'dropdown',
									'heading' 		=> 	__('[Social Share] Google', 'youtube_video_gallery'),								
									'param_name' 	=> 	'ss_google',
									'value' 		=> 	array(	
															__('Yes', 'youtube_video_gallery') 		=> 'true',																		
															__('No', 'youtube_video_gallery') 		=> 'false',																																																							
														),	
									'dependency' 	=> 	array(
																'element'	=> 'social_share',
																'value' 	=> array('true'),
														),												
									'group' 		=> 	$popup_settings
								),
								array(
									'type' 			=> 	'dropdown',
									'heading' 		=> 	__('[Social Share] LinkedIn', 'youtube_video_gallery'),								
									'param_name' 	=> 	'ss_linkedin',
									'value' 		=> 	array(	
															__('No', 'youtube_video_gallery') 		=> 'false',	
															__('Yes', 'youtube_video_gallery') 		=> 'true',																																									
														),	
									'dependency' 	=> 	array(
																'element'	=> 'social_share',
																'value' 	=> array('true'),
														),												
									'group' 		=> 	$popup_settings
								),
								array(
									'type' 			=> 	'dropdown',
									'heading' 		=> 	__('[Social Share] Tumblr', 'youtube_video_gallery'),								
									'param_name' 	=> 	'ss_tumblr',
									'value' 		=> 	array(	
															__('No', 'youtube_video_gallery') 		=> 'false',	
															__('Yes', 'youtube_video_gallery') 		=> 'true',																																									
														),	
									'dependency' 	=> 	array(
																'element'	=> 'social_share',
																'value' 	=> array('true'),
														),												
									'group' 		=> 	$popup_settings
								),
								array(
									'type' 			=> 	'dropdown',
									'heading' 		=> 	__('[Social Share] Pinterest', 'youtube_video_gallery'),								
									'param_name' 	=> 	'ss_pinterest',
									'value' 		=> 	array(	
															__('No', 'youtube_video_gallery') 		=> 'false',	
															__('Yes', 'youtube_video_gallery') 		=> 'true',																																									
														),	
									'dependency' 	=> 	array(
																'element'	=> 'social_share',
																'value' 	=> array('true'),
														),												
									'group' 		=> 	$popup_settings
								),
								array(
									'type' 			=> 	'dropdown',
									'heading' 		=> 	__('[Social Share] VK', 'youtube_video_gallery'),								
									'param_name' 	=> 	'ss_vk',
									'value' 		=> 	array(	
															__('No', 'youtube_video_gallery') 		=> 'false',	
															__('Yes', 'youtube_video_gallery') 		=> 'true',																																									
														),	
									'dependency' 	=> 	array(
																'element'	=> 'social_share',
																'value' 	=> array('true'),
														),												
									'group' 		=> 	$popup_settings
								),
								array(
									'type' 			=> 	'dropdown',
									'heading' 		=> 	__('[Social Share] Email', 'youtube_video_gallery'),								
									'param_name' 	=> 	'ss_email',
									'value' 		=> 	array(	
															__('Yes', 'youtube_video_gallery') 		=> 'true',																		
															__('No', 'youtube_video_gallery') 		=> 'false',																																																							
														),	
									'dependency' 	=> 	array(
																'element'	=> 'social_share',
																'value' 	=> array('true'),
														),												
									'group' 		=> 	$popup_settings
								),
							array(
								'type' 			=> 	'dropdown',
								'heading' 		=> 	__('Popup Advertising', 'youtube_video_gallery'),								
								'param_name' 	=> 	'popup_ads_enabled',
								'value' 		=> 	array(	
														__('No', 'youtube_video_gallery') 		=> 'false',																		
														__('Yes', 'youtube_video_gallery') 		=> 'true',																																																							
													),								
								'group' 		=> 	$popup_settings
							),
								array(
									'type' 			=> 	'dropdown',
									'heading' 		=> 	__('Popup Ad Type And Format', 'youtube_video_gallery'),								
									'param_name' 	=> 	'popup_ad_type',
									'value' 		=> 	array(	
															__('Google Adsense', 'youtube_video_gallery') 	=> 'ga',																		
															__('Image', 'youtube_video_gallery') 			=> 'img',																																																							
														),	
									'dependency' 	=> 	array(
																'element'	=> 'popup_ads_enabled',
																'value' 	=> array('true'),
														),												
									'group' 		=> 	$popup_settings
								),
									array(
										'type' 			=>	'textfield',
										'heading' 		=> 	__('Popup AdSense Ads Client ID', 'youtube_video_gallery'), 
										'param_name' 	=> 	'popup_ads_google_ads_client_id',
										'description' 	=> 	wp_kses(
																__(	'If you want to display Adsense in Popup (Put Adsense Ads Between Post), enter Google AdSense Ad Client ID here.<br>
																	<img src="'.YT_BETE_PLUGIN_URL.'assets/back-end/images/googleClient.png">', 'youtube_video_gallery'),
																array(
																	'img'=>array('src' => array()),
																	'br>'=>array() 																
																)
															),	
										'dependency' 		=> 	array(
																'element'	=> 'popup_ad_type',
																'value' 	=> array('ga'),
															),														
										'group'			=> 	$popup_settings,																		 
									),
									array(
										'type' 			=> 	'textfield',
										'heading' 		=> 	__('Popup AdSense Ads Slot ID', 'youtube_video_gallery'), 
										'param_name' 	=> 	'popup_ads_google_ads_slot_id',
										'description' 	=> 	wp_kses(
																__(	'If you want to display Adsense in Popup (Put Adsense Ads Between Post), enter Google AdSense Ad Slot ID here.<br>
																	<img src="'.YT_BETE_PLUGIN_URL.'assets/back-end/images/googleSlot.png">', 'youtube_video_gallery'),
																array(
																	'img'=>array('src' => array()),
																	'br>'=>array() 																
																)
															),
										'dependency' 		=> 	array(
																'element'	=> 'popup_ad_type',
																'value' 	=> array('ga'),
															),					
										'group'			=> 	$popup_settings,																		 
									),
									
									array(
										'type' 			=> 	'param_group',
										'heading' 		=> 	__('[Popup Advertising] Image Ads Group', 'youtube_video_gallery'),
										'param_name' 	=> 	'popup_ad_image_group',
										'description' 	=> 	__('Ads will be randomly downloaded. Data depending on the group that you configured above', 'youtube_video_gallery'),
										'params' 		=> 	array(
											array(
												'type' 			=> 	'dropdown',
												'heading' 		=> 	__('Image Source', 'youtube_video_gallery'),								
												'param_name' 	=> 	'popup_ad_image_source',
												'value' 		=> 	array(	
																		__('Media Library', 'youtube_video_gallery') 	=> 'ml',																		
																		__('External Link', 'youtube_video_gallery') 	=> 'el',																																																							
																	),
											),
												array(
													'type' 			=> 'attach_image',
													'heading' 		=> __('Image', 'youtube_video_gallery'),			
													'param_name' 	=> 'popup_ad_image',
													'description' 	=> __('Select image from media library.', 'youtube_video_gallery'),	
													'dependency' 	=> array(
																		'element' 	=> 	'popup_ad_image_source',
																		'value' 	=> 	array('ml'),
																	),
												),
												array(															
													'type' 			=> 	'textfield',
													'heading' 		=> 	__('External Link', 'youtube_video_gallery'),
													'param_name' 	=> 	'popup_ad_external_link',
													'description' 	=> 	__('Enter external link.', 'youtube_video_gallery'),
													'dependency' 	=> 	array(
																		'element'	=> 'popup_ad_image_source',
																		'value' 	=> array('el'),
																	),										
												),
											array(
												'type' 			=> 	'dropdown',
												'heading' 		=> 	__('On Click Action', 'youtube_video_gallery'),								
												'param_name' 	=> 	'popup_ad_on_click',
												'value' 		=> 	array(	
																		__('None', 'youtube_video_gallery') 			=> 'none',																		
																		__('Open Custom Link', 'youtube_video_gallery') => 'ocl',																																																							
																	),
											),												
												array(															
													'type' 			=> 	'textfield',
													'heading' 		=> 	__('Image Link', 'youtube_video_gallery'),
													'param_name' 	=> 	'popup_ad_img_link',
													'description' 	=> 	__('Enter URL if you want this image to have a link.', 'youtube_video_gallery'),
													'dependency' 	=> 	array(
																		'element'	=> 'popup_ad_on_click',
																		'value' 	=> array('ocl'),
																	),																																
												),												
										),
										'dependency' 	=> 	array(
															'element'	=> 'popup_ad_type',
															'value' 	=> array('img'),
														),
										'group' 		=> 	$popup_settings,
									),
									
									/*
									array(
										'type' 			=> 	'dropdown',
										'heading' 		=> 	__('Image Source', 'youtube_video_gallery'),								
										'param_name' 	=> 	'popup_ad_image_source',
										'value' 		=> 	array(	
																__('Media Library', 'youtube_video_gallery') 	=> 'ml',																		
																__('External Link', 'youtube_video_gallery') 	=> 'el',																																																							
															),	
										'dependency' 	=> 	array(
																	'element'	=> 'popup_ad_type',
																	'value' 	=> array('img'),
															),												
										'group' 		=> 	$popup_settings
									),
									
										array(
											'type' 				=> 'attach_image',
											'heading' 			=> __('Image', 'youtube_video_gallery'),			
											'param_name' 		=> 'popup_ad_image',
											'description' 		=> __('Select image from media library.', 'youtube_video_gallery'),
											'group'				=> $popup_settings,
											'dependency' 		=> array(
																		'element' 	=> 	'popup_ad_image_source',
																		'value' 	=> 	array('ml'),
																	),
										),	
									
										array(															
											'type' 				=> 	'textfield',
											'heading' 			=> 	__('External Link', 'youtube_video_gallery'),
											'param_name' 		=> 	'popup_ad_external_link',
											'description' 		=> 	__('Enter external link.', 'youtube_video_gallery'),
											'dependency' 		=> 	array(
																		'element'	=> 'popup_ad_image_source',
																		'value' 	=> array('el'),
																	),														
											'group'				=> $popup_settings,																				
										),
									
									array(
										'type' 			=> 	'dropdown',
										'heading' 		=> 	__('On Click Action', 'youtube_video_gallery'),								
										'param_name' 	=> 	'popup_ad_on_click',
										'value' 		=> 	array(	
																__('None', 'youtube_video_gallery') 			=> 'none',																		
																__('Open Custom Link', 'youtube_video_gallery') => 'ocl',																																																							
															),	
										'dependency' 	=> 	array(
																	'element'	=> 'popup_ad_type',
																	'value' 	=> array('img'),
															),												
										'group' 		=> 	$popup_settings
									),
									
										array(															
											'type' 				=> 	'textfield',
											'heading' 			=> 	__('Image Link', 'youtube_video_gallery'),
											'param_name' 		=> 	'popup_ad_img_link',
											'description' 		=> 	__('Enter URL if you want this image to have a link.', 'youtube_video_gallery'),
											'dependency' 		=> 	array(
																		'element'	=> 'popup_ad_on_click',
																		'value' 	=> array('ocl'),
																	),														
											'group'				=> $popup_settings,																				
										),
									*/
									
							array(
								'type' 			=> 	'dropdown',
								'heading' 		=> 	__('Video Advertising', 'youtube_video_gallery'),								
								'param_name' 	=> 	'player_video_ads_enabled',
								'value' 		=> 	array(	
														__('No', 'youtube_video_gallery') 		=> 'false',																		
														__('Yes', 'youtube_video_gallery') 		=> 'true',																																																							
													),								
								'group' 		=> 	$popup_settings
							),
								array(
									'type' 			=> 	'dropdown',
									'heading' 		=> 	__('Video Ad Type And Format', 'youtube_video_gallery'),								
									'param_name' 	=> 	'video_ad_type',
									'value' 		=> 	array(	
															__('Google Adsense', 'youtube_video_gallery') 	=> 'ga',																		
															__('Image', 'youtube_video_gallery') 			=> 'img',
															__('Video', 'youtube_video_gallery') 			=> 'vid',																																																							
														),	
									'dependency' 	=> 	array(
																'element'	=> 'player_video_ads_enabled',
																'value' 	=> array('true'),
														),												
									'group' 		=> 	$popup_settings
								),
									array(
										'type' 			=>	'textfield',
										'heading' 		=> 	__('Video Advertising - AdSense Ads Client ID', 'youtube_video_gallery'), 
										'param_name' 	=> 	'player_video_ads_google_ads_client_id',
										'description' 	=> 	wp_kses(
																__(	'If you want to display Adsense in Player (Put Adsense Ads Between Post), enter Google AdSense Ad Client ID here.<br>
																	<img src="'.YT_BETE_PLUGIN_URL.'assets/back-end/images/googleClient.png">', 'youtube_video_gallery'),
																array(
																	'img'=>array('src' => array()),
																	'br>'=>array() 																
																)
															),
										'dependency' 		=> 	array(
																'element'	=> 'video_ad_type',
																'value' 	=> array('ga'),
															),															
										'group'			=> 	$popup_settings,																		 
									),
									array(
										'type' 			=> 	'textfield',
										'heading' 		=> 	__('Video Advertising - AdSense Ads Slot ID', 'youtube_video_gallery'), 
										'param_name' 	=> 	'player_video_ads_google_ads_slot_id',
										'description' 	=> 	wp_kses(
																__(	'If you want to display Adsense in Player (Put Adsense Ads Between Post), enter Google AdSense Ad Slot ID here.<br>
																	<img src="'.YT_BETE_PLUGIN_URL.'assets/back-end/images/googleSlot.png">', 'youtube_video_gallery'),
																array(
																	'img'=>array('src'=> array()),
																	'br>'=>array() 																
																)
															),
										'dependency' 		=> 	array(
																'element'	=> 'video_ad_type',
																'value' 	=> array('ga'),
															),					
										'group'			=> 	$popup_settings,																		 
									),
									
									array(
										'type' 			=> 	'param_group',
										'heading' 		=> 	__('[Video Advertising] Image Ads Group', 'youtube_video_gallery'),
										'param_name' 	=> 	'video_ad_image_group',
										'description' 	=> 	__('Ads will be randomly downloaded. Data depending on the group that you configured above', 'youtube_video_gallery'),
										'params' 		=> 	array(
											array(
												'type' 			=> 	'dropdown',
												'heading' 		=> 	__('Image Source', 'youtube_video_gallery'),								
												'param_name' 	=> 	'video_ad_image_source',
												'value' 		=> 	array(	
																		__('Media Library', 'youtube_video_gallery') 	=> 'ml',																		
																		__('External Link', 'youtube_video_gallery') 	=> 'el',																																																							
																	),
											),
												array(
													'type' 			=> 'attach_image',
													'heading' 		=> __('Image', 'youtube_video_gallery'),			
													'param_name' 	=> 'video_ad_image',
													'description' 	=> __('Select image from media library.', 'youtube_video_gallery'),	
													'dependency' 	=> array(
																		'element' 	=> 	'video_ad_image_source',
																		'value' 	=> 	array('ml'),
																	),
												),
												array(															
													'type' 			=> 	'textfield',
													'heading' 		=> 	__('External Link', 'youtube_video_gallery'),
													'param_name' 	=> 	'video_ad_external_link',
													'description' 	=> 	__('Enter external link.', 'youtube_video_gallery'),
													'dependency' 	=> 	array(
																		'element'	=> 'video_ad_image_source',
																		'value' 	=> array('el'),
																	),										
												),
											array(
												'type' 			=> 	'dropdown',
												'heading' 		=> 	__('On Click Action', 'youtube_video_gallery'),								
												'param_name' 	=> 	'video_ad_on_click',
												'value' 		=> 	array(	
																		__('None', 'youtube_video_gallery') 			=> 'none',																		
																		__('Open Custom Link', 'youtube_video_gallery') => 'ocl',																																																							
																	),
											),												
												array(															
													'type' 			=> 	'textfield',
													'heading' 		=> 	__('Image Link', 'youtube_video_gallery'),
													'param_name' 	=> 	'video_ad_img_link',
													'description' 	=> 	__('Enter URL if you want this image to have a link.', 'youtube_video_gallery'),
													'dependency' 	=> 	array(
																		'element'	=> 'video_ad_on_click',
																		'value' 	=> array('ocl'),
																	),																																
												),												
										),
										'dependency' 	=> 	array(
															'element'	=> 'video_ad_type',
															'value' 	=> array('img'),
														),
										'group' 		=> 	$popup_settings,
									),
									/*
									array(
										'type' 			=> 	'dropdown',
										'heading' 		=> 	__('Image Source', 'youtube_video_gallery'),								
										'param_name' 	=> 	'video_ad_image_source',
										'value' 		=> 	array(	
																__('Media Library', 'youtube_video_gallery') 	=> 'ml',																		
																__('External Link', 'youtube_video_gallery') 	=> 'el',																																																							
															),	
										'dependency' 	=> 	array(
																	'element'	=> 'video_ad_type',
																	'value' 	=> array('img'),
															),												
										'group' 		=> 	$popup_settings
									),
									
										array(
											'type' 				=> 'attach_image',
											'heading' 			=> __('Image', 'youtube_video_gallery'),			
											'param_name' 		=> 'video_ad_image',
											'description' 		=> __('Select image from media library.', 'youtube_video_gallery'),
											'group'				=> $popup_settings,
											'dependency' 		=> array(
																		'element' 	=> 	'video_ad_image_source',
																		'value' 	=> 	array('ml'),
																	),
										),	
									
										array(															
											'type' 				=> 	'textfield',
											'heading' 			=> 	__('External Link', 'youtube_video_gallery'),
											'param_name' 		=> 	'video_ad_external_link',
											'description' 		=> 	__('Enter external link.', 'youtube_video_gallery'),
											'dependency' 		=> 	array(
																		'element'	=> 'video_ad_image_source',
																		'value' 	=> array('el'),
																	),														
											'group'				=> $popup_settings,																				
										),
									
									array(
										'type' 			=> 	'dropdown',
										'heading' 		=> 	__('On Click Action', 'youtube_video_gallery'),								
										'param_name' 	=> 	'video_ad_on_click',
										'value' 		=> 	array(	
																__('None', 'youtube_video_gallery') 			=> 'none',																		
																__('Open Custom Link', 'youtube_video_gallery') => 'ocl',																																																							
															),	
										'dependency' 	=> 	array(
																	'element'	=> 'video_ad_type',
																	'value' 	=> array('img'),
															),												
										'group' 		=> 	$popup_settings
									),
									
										array(															
											'type' 				=> 	'textfield',
											'heading' 			=> 	__('Image Link', 'youtube_video_gallery'),
											'param_name' 		=> 	'video_ad_img_link',
											'description' 		=> 	__('Enter URL if you want this image to have a link.', 'youtube_video_gallery'),
											'dependency' 		=> 	array(
																		'element'	=> 'video_ad_on_click',
																		'value' 	=> array('ocl'),
																	),														
											'group'				=> $popup_settings,																				
										),									
									*/
									
									array(
										'type' 			=> 	'param_group',
										'heading' 		=> 	__('[Video Advertising] Video Ads Group', 'youtube_video_gallery'),
										'param_name' 	=> 	'video_ad_vid_group',
										'description' 	=> 	__('Ads will be randomly downloaded. Data depending on the group that you configured above', 'youtube_video_gallery'),
										'params' 		=> 	array(
											
											array(												
												'type' 			=> 'textfield',
												'heading' 		=> __('Video Source (MP4)', 'youtube_video_gallery'),
												'param_name' 	=> 'mp4',
												'description' 	=> __('Enter your link Video (.mp4).', 'youtube_video_gallery'),
											),
											array(												
												'type' 			=> 'textfield',
												'heading' 		=> __('Video Source (WEBM)', 'youtube_video_gallery'),
												'param_name' 	=> 'webm',
												'description' 	=> __('Enter your link Video (.webm).', 'youtube_video_gallery'),
											),
											array(												
												'type' 			=> 'textfield',
												'heading' 		=> __('Video Source (OGV)', 'youtube_video_gallery'),
												'param_name' 	=> 'ogv',
												'description' 	=> __('Enter your link Video (.ogv).', 'youtube_video_gallery'),
											),	
											array(
												'type' 			=> 	'dropdown',
												'heading' 		=> 	__('On Click Action', 'youtube_video_gallery'),								
												'param_name' 	=> 	'video_ad_vid_on_click',
												'value' 		=> 	array(	
																		__('None', 'youtube_video_gallery') 			=> 'none',																		
																		__('Open Custom Link', 'youtube_video_gallery') => 'ocl',																																																							
																	),
											),												
												array(															
													'type' 			=> 	'textfield',
													'heading' 		=> 	__('Image Link', 'youtube_video_gallery'),
													'param_name' 	=> 	'video_ad_vid_link',
													'description' 	=> 	__('Enter URL if you want this image to have a link.', 'youtube_video_gallery'),
													'dependency' 	=> 	array(
																		'element'	=> 'video_ad_vid_on_click',
																		'value' 	=> array('ocl'),
																	),																																
												),												
										),
										'dependency' 	=> 	array(
															'element'	=> 'video_ad_type',
															'value' 	=> array('vid'),
														),
										'group' 		=> 	$popup_settings,
									),
									
								array(															
									'type' 				=> 	'textfield',
									'heading' 			=> 	__('Ad shows up after (seconds)', 'youtube_video_gallery'),
									'param_name' 		=> 	'time_to_show_ads',
									'description' 		=>	wp_kses(
															__('Example:<code>0,40,150,368</code>, <code>10,250,689</code>. If blank, defaults to: 0', 'youtube_video_gallery'),
															array(
																'code'=>array(), 																
															)
														),
									'dependency' 		=> 	array(
																'element'	=> 'player_video_ads_enabled',
																'value' 	=> array('true'),
															),														
									'group'				=> 	$popup_settings,																				
								),
								array(															
									'type' 				=> 	'textfield',
									'heading' 			=> 	__('Skip Ad - Clickable After (seconds)', 'youtube_video_gallery'),
									'param_name' 		=> 	'time_skip_ads',
									'description' 		=> 	__('If blank, defaults to: 5', 'youtube_video_gallery'),
									'dependency' 		=> 	array(
																'element'	=> 'player_video_ads_enabled',
																'value' 	=> array('true'),
															),														
									'group'				=> $popup_settings,																				
								),
								array(															
									'type' 				=> 	'textfield',
									'heading' 			=> 	__('Hide Ad After (seconds)', 'youtube_video_gallery'),
									'param_name' 		=> 	'time_to_hide_ads',
									'description' 		=> 	__('If blank, defaults to: 10', 'youtube_video_gallery'),
									'dependency' 		=> 	array(
																'element'	=> 'player_video_ads_enabled',
																'value' 	=> array('true'),
															),														
									'group'				=> $popup_settings,																				
								),									
							/*$popup_settings*/
							
							/*$inline_settings*/
							array(
								'type' 			=> 	'dropdown',
								'heading' 		=> 	__('Show Light Button', 'youtube_video_gallery'),								
								'param_name' 	=> 	'player_inline_light',
								'value' 		=> 	array(	
														__('Yes', 'youtube_video_gallery') 		=> 'true',																		
														__('No', 'youtube_video_gallery') 		=> 'false',																																																							
													),								
								'group' 		=> 	$inline_settings
							),
							array(
								'type' 			=> 	'dropdown',
								'heading' 		=> 	__('Show Close Button', 'youtube_video_gallery'),								
								'param_name' 	=> 	'player_inline_close',
								'value' 		=> 	array(	
														__('Yes', 'youtube_video_gallery') 		=> 'true',																		
														__('No', 'youtube_video_gallery') 		=> 'false',																																																							
													),								
								'group' 		=> 	$inline_settings
							),/*$inline_settings*/
							
							/*$header_settings*/
							/*$header_settings*/
							
							/*$static_text_settings*/
							array(
								'type' 			=> 	'dropdown',
								'heading' 		=> 	__('Display date/time in locale', 'youtube_video_gallery'),								
								'param_name' 	=> 	'time_locale',
								'value' 		=> 	$time_locale,								
								'group' 		=> 	$static_text_settings
							),
							array(															
								'type' 				=> 	'textfield',
								'heading' 			=> 	__('Views', 'youtube_video_gallery'),
								'param_name' 		=> 	'text_views',
								'description' 		=> 	__('If blank, defaults to: Views', 'youtube_video_gallery'),																					
								'group'				=> 	$static_text_settings,																				
							),
							array(															
								'type' 				=> 	'textfield',
								'heading' 			=> 	__('Comments', 'youtube_video_gallery'),
								'param_name' 		=> 	'text_comments',
								'description' 		=> 	__('If blank, defaults to: Comments', 'youtube_video_gallery'),																					
								'group'				=> 	$static_text_settings,																				
							),
							array(															
								'type' 				=> 	'textfield',
								'heading' 			=> 	__('Likes', 'youtube_video_gallery'),
								'param_name' 		=> 	'text_likes',
								'description' 		=> 	__('If blank, defaults to: Likes', 'youtube_video_gallery'),																					
								'group'				=> 	$static_text_settings,																				
							),
							array(															
								'type' 				=> 	'textfield',
								'heading' 			=> 	__('Dislikes', 'youtube_video_gallery'),
								'param_name' 		=> 	'text_dislikes',
								'description' 		=> 	__('If blank, defaults to: Dislikes', 'youtube_video_gallery'),																					
								'group'				=> 	$static_text_settings,																				
							),
							array(															
								'type' 				=> 	'textfield',
								'heading' 			=> 	__('LOAD MORE', 'youtube_video_gallery'),
								'param_name' 		=> 	'text_load_more',
								'description' 		=> 	__('If blank, defaults to: LOAD MORE', 'youtube_video_gallery'),																					
								'group'				=> 	$static_text_settings,																				
							),
							array(															
								'type' 				=> 	'textfield',
								'heading' 			=> 	__('PREV', 'youtube_video_gallery'),
								'param_name' 		=> 	'text_prev',
								'description' 		=> 	__('If blank, defaults to: PREV', 'youtube_video_gallery'),																					
								'group'				=> 	$static_text_settings,																				
							),
							array(															
								'type' 				=> 	'textfield',
								'heading' 			=> 	__('NEXT', 'youtube_video_gallery'),
								'param_name' 		=> 	'text_next',
								'description' 		=> 	__('If blank, defaults to: NEXT', 'youtube_video_gallery'),																					
								'group'				=> 	$static_text_settings,																				
							),
							array(															
								'type' 				=> 	'textfield',
								'heading' 			=> 	__('ALL VIDEOS ARE ALREADY LOADED!', 'youtube_video_gallery'),
								'param_name' 		=> 	'text_already_loaded',
								'description' 		=> 	__('If blank, defaults to: ALL VIDEOS ARE ALREADY LOADED!', 'youtube_video_gallery'),																					
								'group'				=> 	$static_text_settings,																				
							),
							array(															
								'type' 				=> 	'textfield',
								'heading' 			=> 	__('SHOW MORE', 'youtube_video_gallery'),
								'param_name' 		=> 	'text_show_more',
								'description' 		=> 	__('If blank, defaults to: SHOW MORE', 'youtube_video_gallery'),																					
								'group'				=> 	$static_text_settings,																				
							),
							array(															
								'type' 				=> 	'textfield',
								'heading' 			=> 	__('SHOW LESS', 'youtube_video_gallery'),
								'param_name' 		=> 	'text_show_less',
								'description' 		=> 	__('If blank, defaults to: SHOW LESS', 'youtube_video_gallery'),																					
								'group'				=> 	$static_text_settings,																				
							),
							array(															
								'type' 				=> 	'textfield',
								'heading' 			=> 	__('Published at', 'youtube_video_gallery'),
								'param_name' 		=> 	'text_published_at',
								'description' 		=> 	__('If blank, defaults to: Published at', 'youtube_video_gallery'),																					
								'group'				=> 	$static_text_settings,																				
							),
							array(															
								'type' 				=> 	'textfield',
								'heading' 			=> 	__('View all replies', 'youtube_video_gallery'),
								'param_name' 		=> 	'text_view_all_replies',
								'description' 		=> 	__('If blank, defaults to: View all replies', 'youtube_video_gallery'),																					
								'group'				=> 	$static_text_settings,																				
							),
							array(															
								'type' 				=> 	'textfield',
								'heading' 			=> 	__('Loading advertisement...', 'youtube_video_gallery'),
								'param_name' 		=> 	'text_load_ads',
								'description' 		=> 	__('If blank, defaults to: Loading advertisement...', 'youtube_video_gallery'),																					
								'group'				=> 	$static_text_settings,																				
							),
							array(															
								'type' 				=> 	'textfield',
								'heading' 			=> 	__('Skip ad in', 'youtube_video_gallery'),
								'param_name' 		=> 	'text_skip_ad_in',
								'description' 		=> 	__('If blank, defaults to: Skip ad in', 'youtube_video_gallery'),																					
								'group'				=> 	$static_text_settings,																				
							),
							array(															
								'type' 				=> 	'textfield',
								'heading' 			=> 	__('Skip Ad', 'youtube_video_gallery'),
								'param_name' 		=> 	'text_skip_ads',
								'description' 		=> 	__('If blank, defaults to: Skip Ad', 'youtube_video_gallery'),																					
								'group'				=> 	$static_text_settings,																				
							),/*$static_text_settings*/
							
							/*$color_settings*/
							array(
								'type'			=> 'colorpicker',
								'heading' 		=> __('Main Color', 'youtube_video_gallery'),
								'param_name' 	=> 'main_color',
								'group'			=> $color_settings,								
							),
							array(
								'type'			=> 'colorpicker',
								'heading' 		=> __('Layout Background', 'youtube_video_gallery'),
								'param_name' 	=> 'background_color',
								'group'			=> $color_settings,								
							),
							array(
								'type'			=> 'colorpicker',
								'heading' 		=> __('Section Background', 'youtube_video_gallery'),
								'param_name' 	=> 'content_background_color',
								'group'			=> $color_settings,								
							),
							array(
								'type'			=> 'colorpicker',
								'heading' 		=> __('Item Background', 'youtube_video_gallery'),
								'param_name' 	=> 'item_background_color',
								'group'			=> $color_settings,								
							),
							array(
								'type'			=> 'colorpicker',
								'heading' 		=> __('Divider Color', 'youtube_video_gallery'),
								'param_name' 	=> 'divider_color',
								'group'			=> $color_settings,								
							),
							array(
								'type'			=> 'colorpicker',
								'heading' 		=> __('Button Color', 'youtube_video_gallery'),
								'param_name' 	=> 'button_color',
								'group'			=> $color_settings,								
							),
							array(
								'type'			=> 'colorpicker',
								'heading' 		=> __('Button Background Color', 'youtube_video_gallery'),
								'param_name' 	=> 'button_background_color',
								'group'			=> $color_settings,								
							),
							array(
								'type'			=> 'colorpicker',
								'heading' 		=> __('Button Background Hover Color', 'youtube_video_gallery'),
								'param_name' 	=> 'button_background_hover_color',
								'group'			=> $color_settings,								
							),
							array(
								'type'			=> 'colorpicker',
								'heading' 		=> __('Tab Color', 'youtube_video_gallery'),
								'param_name' 	=> 'tab_color',
								'group'			=> $color_settings,								
							),
							array(
								'type'			=> 'colorpicker',
								'heading' 		=> __('Tab Hover Color', 'youtube_video_gallery'),
								'param_name' 	=> 'tab_hover_color',
								'group'			=> $color_settings,								
							),
							array(
								'type'			=> 'colorpicker',
								'heading' 		=> __('Title Color', 'youtube_video_gallery'),
								'param_name' 	=> 'title_color',
								'group'			=> $color_settings,								
							),
							array(
								'type'			=> 'colorpicker',
								'heading' 		=> __('Title Hover Color', 'youtube_video_gallery'),
								'param_name' 	=> 'title_hover_color',
								'group'			=> $color_settings,								
							),
							array(
								'type'			=> 'colorpicker',
								'heading' 		=> __('Text Color', 'youtube_video_gallery'),
								'param_name' 	=> 'text_color',
								'group'			=> $color_settings,								
							),
							array(
								'type'			=> 'colorpicker',
								'heading' 		=> __('Meta Color', 'youtube_video_gallery'),
								'param_name' 	=> 'meta_color',
								'group'			=> $color_settings,								
							),
							array(
								'type'			=> 'colorpicker',
								'heading' 		=> __('Header Logo Boder Color', 'youtube_video_gallery'),
								'param_name' 	=> 'header_logo_border_color',
								'group'			=> $color_settings,								
							),
							array(
								'type'			=> 'colorpicker',
								'heading' 		=> __('Header Channel Name Color', 'youtube_video_gallery'),
								'param_name' 	=> 'header_channel_name_color',
								'group'			=> $color_settings,								
							),
							array(
								'type'			=> 'colorpicker',
								'heading' 		=> __('Header Channel Name Hover Color', 'youtube_video_gallery'),
								'param_name' 	=> 'header_channel_name_hover_color',
								'group'			=> $color_settings,								
							),
							array(
								'type'			=> 'colorpicker',
								'heading' 		=> __('Header Text Color', 'youtube_video_gallery'),
								'param_name' 	=> 'header_text_color',
								'group'			=> $color_settings,								
							),
							array(
								'type'			=> 'colorpicker',
								'heading' 		=> __('Header Meta Color', 'youtube_video_gallery'),
								'param_name' 	=> 'header_meta_color',
								'group'			=> $color_settings,								
							),
							array(
								'type'			=> 'colorpicker',
								'heading' 		=> __('Header Meta Background Color', 'youtube_video_gallery'),
								'param_name' 	=> 'header_meta_background_color',
								'group'			=> $color_settings,								
							),
							array(
								'type'			=> 'colorpicker',
								'heading' 		=> __('Popup Background', 'youtube_video_gallery'),
								'param_name' 	=> 'popup_background',
								'group'			=> $color_settings,								
							),
							array(
								'type'			=> 'colorpicker',
								'heading' 		=> __('Popup Button Color', 'youtube_video_gallery'),
								'param_name' 	=> 'popup_button_color',
								'group'			=> $color_settings,								
							),
							array(
								'type'			=> 'colorpicker',
								'heading' 		=> __('Popup Button Background Color', 'youtube_video_gallery'),
								'param_name' 	=> 'popup_button_background_color',
								'group'			=> $color_settings,								
							),
							array(
								'type'			=> 'colorpicker',
								'heading' 		=> __('Popup Button Background Hover Color', 'youtube_video_gallery'),
								'param_name' 	=> 'popup_button_background_hover_color',
								'group'			=> $color_settings,								
							),
							array(
								'type'			=> 'colorpicker',
								'heading' 		=> __('Popup Heading Color', 'youtube_video_gallery'),
								'param_name' 	=> 'popup_heading_color',
								'group'			=> $color_settings,								
							),
							array(
								'type'			=> 'colorpicker',
								'heading' 		=> __('Popup Heading Hover Color', 'youtube_video_gallery'),
								'param_name' 	=> 'popup_heading_hover_color',
								'group'			=> $color_settings,								
							),
							array(
								'type'			=> 'colorpicker',
								'heading' 		=> __('Popup Link Color', 'youtube_video_gallery'),
								'param_name' 	=> 'popup_link_color',
								'group'			=> $color_settings,								
							),
							array(
								'type'			=> 'colorpicker',
								'heading' 		=> __('Popup Link Hover Color', 'youtube_video_gallery'),
								'param_name' 	=> 'popup_link_hover_color',
								'group'			=> $color_settings,								
							),
							array(
								'type'			=> 'colorpicker',
								'heading' 		=> __('Popup Text Color', 'youtube_video_gallery'),
								'param_name' 	=> 'popup_text_color',
								'group'			=> $color_settings,								
							),
							array(
								'type'			=> 'colorpicker',
								'heading' 		=> __('Popup Meta Color', 'youtube_video_gallery'),
								'param_name' 	=> 'popup_meta_color',
								'group'			=> $color_settings,								
							),
							array(
								'type'			=> 'colorpicker',
								'heading' 		=> __('Popup Divider Color', 'youtube_video_gallery'),
								'param_name' 	=> 'popup_divider_color',
								'group'			=> $color_settings,								
							),
							/*$color_settings*/
							
							/*$typography_settings*/
							array( //Main font															
								'type' 			=> 'textfield',
								'heading' 		=> __('Main Font (Support Google font)', 'youtube_video_gallery'),
								'param_name' 	=> 'main_font',
								'description' 	=> __('	Enter font-family name here. Google Fonts are supported. 
														For example, if you choose "Open Sans" <a href="http://www.google.com/fonts/" target="_blank">Google Font</a> 
														with font-weight 400,500,600, enter <code>Open Sans:400,500,600</code>', 'youtube_video_gallery'),															
								'group'			=> $typography_settings,					
							),
							array(
								'type' 			=> 'textfield',
								'heading' 		=> __('[Main] Font Size', 'youtube_video_gallery'),
								'param_name' 	=> 'main_font_size',
								'description' 	=> wp_kses(
															__('<strong>Example:</strong> <code>14px</code>, <code>16px</code> ...', 'youtube_video_gallery'),
															array(
																'strong'=>array(),
																'code'=>array(), 																
															)
													),													
								'group'			=> $typography_settings,					
							),
							array(
								'type' 			=> 'textfield',
								'heading' 		=> __('[Main] Font Letter Spacing', 'youtube_video_gallery'),
								'param_name' 	=> 'main_font_letter_spacing',
								'description' 	=> wp_kses(
															__('<strong>Example:</strong> <code>1px</code>, <code>0.1em</code> ...', 'youtube_video_gallery'),
															array(
																'strong'=>array(),
																'code'=>array(), 																
															)
													),															
								'group'			=> $typography_settings,					
							),
							array(
								'type' 			=> 'dropdown',
								'heading' 		=> __('[Main] Font Weight', 'youtube_video_gallery'),
								'param_name' 	=> 'main_font_weight',
								'value' 		=> $font_weight,
								'group'			=> $typography_settings,					
							),
							array(
								'type' 			=> 'dropdown',
								'heading' 		=> __('[Main] Font Style', 'youtube_video_gallery'),
								'param_name' 	=> 'main_font_style',
								'value' 		=> $font_style,
								'group'			=> $typography_settings,					
							),
							array(
								'type' 			=> 'dropdown',
								'heading' 		=> __('[Main] Text Transform', 'youtube_video_gallery'),
								'param_name' 	=> 'main_font_transform',
								'value' 		=> $text_transform,
								'group'			=> $typography_settings,					
							),
							array(
								'type' 			=> 'textfield',
								'heading' 		=> __('[Main] Text Line Height', 'youtube_video_gallery'),
								'param_name' 	=> 'main_font_line_height',
								'description' 	=> wp_kses(
															__('<strong>Example:</strong> <code>15px</code>, <code>1.55em</code> ...', 'youtube_video_gallery'),
															array(
																'strong'=>array(),
																'code'=>array(), 																
															)
													),															
								'group'			=> $typography_settings,					
							),
							
							array( //Heading font															
								'type' 			=> 'textfield',
								'heading' 		=> __('Heading Font (Support Google font)', 'youtube_video_gallery'),
								'param_name' 	=> 'heading_font',
								'description' 	=> __('	Enter font-family name here. Google Fonts are supported. 
														For example, if you choose "Open Sans" <a href="http://www.google.com/fonts/" target="_blank">Google Font</a> 
														with font-weight 400,500,600, enter <code>Open Sans:400,500,600</code>', 'youtube_video_gallery'),															
								'group'			=> $typography_settings,					
							),
							array(
								'type' 			=> 'textfield',
								'heading' 		=> __('[Heading] Font Size', 'youtube_video_gallery'),
								'param_name' 	=> 'heading_font_size',
								'description' 	=> wp_kses(
															__('<strong>Example:</strong> <code>14px</code>, <code>16px</code> ...', 'youtube_video_gallery'),
															array(
																'strong'=>array(),
																'code'=>array(), 																
															)
													),															
								'group'			=> $typography_settings,					
							),
							array(
								'type' 			=> 'textfield',
								'heading' 		=> __('[Heading] Font Letter Spacing', 'youtube_video_gallery'),
								'param_name' 	=> 'heading_font_letter_spacing',
								'description' 	=> wp_kses(
															__('<strong>Example:</strong> <code>1px</code>, <code>0.1em</code> ...', 'youtube_video_gallery'),
															array(
																'strong'=>array(),
																'code'=>array(), 																
															)
													),															
								'group'			=> $typography_settings,					
							),
							array(
								'type' 			=> 'dropdown',
								'heading' 		=> __('[Heading] Font Weight', 'youtube_video_gallery'),
								'param_name' 	=> 'heading_font_weight',
								'value' 		=> $font_weight,
								'group'			=> $typography_settings,					
							),
							array(
								'type' 			=> 'dropdown',
								'heading' 		=> __('[Heading] Font Style', 'youtube_video_gallery'),
								'param_name' 	=> 'heading_font_style',
								'value' 		=> $font_style,
								'group'			=> $typography_settings,					
							),
							array(
								'type' 			=> 'dropdown',
								'heading' 		=> __('[Heading] Text Transform', 'youtube_video_gallery'),
								'param_name' 	=> 'heading_font_transform',
								'value' 		=> $text_transform,
								'group'			=> $typography_settings,					
							),
							array(
								'type' 			=> 'textfield',
								'heading' 		=> __('[Heading] Line Height', 'youtube_video_gallery'),
								'param_name' 	=> 'heading_font_line_height',
								'description' 	=> wp_kses(
															__('<strong>Example:</strong> <code>15px</code>, <code>1.55em</code> ...', 'youtube_video_gallery'),
															array(
																'strong'=>array(),
																'code'=>array(), 																
															)
													),															
								'group'			=> $typography_settings,					
							),
							
							array( //Meta's font															
								'type' 			=> 'textfield',
								'heading' 		=> __('Meta Font (Support Google font)', 'youtube_video_gallery'),
								'param_name' 	=> 'meta_font',
								'description' 	=> __('	Enter font-family name here. Google Fonts are supported. 
														For example, if you choose "Open Sans" <a href="http://www.google.com/fonts/" target="_blank">Google Font</a> 
														with font-weight 400,500,600, enter <code>Open Sans:400,500,600</code>', 'youtube_video_gallery'),															
								'group'			=> $typography_settings,					
							),
							array(
								'type' 			=> 'textfield',
								'heading' 		=> __('[Meta] Font Size', 'youtube_video_gallery'),
								'param_name' 	=> 'meta_font_size',
								'description' 	=> wp_kses(
															__('<strong>Example:</strong> <code>14px</code>, <code>16px</code> ...', 'youtube_video_gallery'),
															array(
																'strong'=>array(),
																'code'=>array(), 																
															)
													),															
								'group'			=> $typography_settings,					
							),
							array(
								'type' 			=> 'textfield',
								'heading' 		=> __('[Meta] Font Letter Spacing', 'youtube_video_gallery'),
								'param_name' 	=> 'meta_font_letter_spacing',
								'description' 	=> wp_kses(
															__('<strong>Example:</strong> <code>1px</code>, <code>0.1em</code> ...', 'youtube_video_gallery'),
															array(
																'strong'=>array(),
																'code'=>array(), 																
															)
													),														
								'group'			=> $typography_settings,					
							),
							array(
								'type' 			=> 'dropdown',
								'heading' 		=> __('[Meta] Font Weight', 'youtube_video_gallery'),
								'param_name' 	=> 'meta_font_weight',
								'value' 		=> $font_weight,
								'group'			=> $typography_settings,					
							),
							array(
								'type' 			=> 'dropdown',
								'heading' 		=> __('[Meta] Font Style', 'youtube_video_gallery'),
								'param_name' 	=> 'meta_font_style',
								'value' 		=> $font_style,
								'group'			=> $typography_settings,					
							),
							array(
								'type' 			=> 'dropdown',
								'heading' 		=> __('[Meta] Text Transform', 'youtube_video_gallery'),
								'param_name' 	=> 'meta_font_transform',
								'value' 		=> $text_transform,
								'group'			=> $typography_settings,					
							),
							array(
								'type' 			=> 'textfield',
								'heading' 		=> __('[Meta] Line Height', 'youtube_video_gallery'),
								'param_name' 	=> 'meta_font_line_height',
								'description' 	=> wp_kses(
															__('<strong>Example:</strong> <code>15px</code>, <code>1.55em</code> ...', 'youtube_video_gallery'),
															array(
																'strong'=>array(),
																'code'=>array(), 																
															)
													),													
								'group'			=> $typography_settings,					
							),
							/*$typography_settings*/
						)
					)
				);
			}
		}
		
		public function init(){
			$this->register_vc();
		}
		
		public function __construct() {				
			add_action('init', array($this, 'init'), 9998, 1);
		}
	}
	
	global $youtube_video_gallery_for_vc;
	if(!$youtube_video_gallery_for_vc){
		$youtube_video_gallery_for_vc = new youtube_video_gallery_for_vc();
	}
}