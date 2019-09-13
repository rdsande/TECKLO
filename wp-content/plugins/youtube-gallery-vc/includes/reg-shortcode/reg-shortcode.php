<?php
if(!class_exists('youtube_video_gallery_shortcode')){
	class youtube_video_gallery_shortcode {

		static $add_script_core = false;
		static $add_script_swiper = false;
		
		static function init(){
			add_action('init', array(__CLASS__, 'register_scripts'));	
				
			add_shortcode('ytvg_container', array(__CLASS__, 'handle_shortcode'));			
			
			add_action('wp_enqueue_scripts', array(__CLASS__, 'core_enqueue_scripts'), 9999);
			add_action('wp_footer', array(__CLASS__, 'print_script_core'), 0);
			add_action('wp_footer', array(__CLASS__, 'print_script'), 9999);			
		}	
				
		/*Shortcode*/
		static function handle_shortcode($params, $contents=''){
			
			extract(
				shortcode_atts(
					array(						
						'data'											=>'',
						'layout_tabs'									=>'',
						
						'layout'										=>'',
						'grid_style'									=>'',
						'list_style'									=>'',
						'carousel_style'								=>'',
						'content_blocks_style'							=>'',
						'layout_items_per_page'							=>'',
						'layout_pagination'								=>'',
						'layout_mobile'									=>'',
						'layout_portrait_tablet'						=>'',
						'layout_landscape_tablet'						=>'',
						'layout_small_desktop'							=>'',
						'layout_medium_desktop'							=>'',
						'layout_large_desktop'							=>'',
						'layout_extra_large_desktop'					=>'',
						'layout_img_size'								=>'',
						'layout_play_mode'								=>'',
						'layout_title'									=>'',
						'layout_title_one_line'							=>'',
						'layout_description'							=>'',
						'layout_description_length'						=>'',
						'layout_duration'								=>'',
						'layout_views_counter'							=>'',
						'layout_likes_counter'							=>'',
						'layout_dislikes_counter'						=>'',
						'layout_date'									=>'',
						'layout_comments_counter'						=>'',
						'layout_play_btn'								=>'',
						
						'header'										=> '',
						'header_source'									=> '',
						'header_style'									=> '',
						'header_logo'									=> '',
						'header_channel_name'							=> '',
						'header_channel_description'					=> '',
						'header_videos_counter'							=> '',
						'header_subscribers_counter'					=> '',
						'header_views_counter'							=> '',
						'header_subscribe_button'						=> '',
						'header_custom_channel_name'					=> '',
						'header_custom_channel_description'				=> '',
						'header_custom_channel_logo'					=> '',
						'header_custom_channel_background'				=> '',
						
						'player_autoplay'								=>'',
						
						'popup_title'									=>'',
						'popup_channel_logo'							=>'',
						'popup_channel_name'							=>'',
						'popup_subscribe_button'						=>'',
						'popup_views_counter'							=>'',
						'popup_likes_counter'							=>'',
						'popup_dislikes_counter'						=>'',
						'popup_likes_ratio'								=>'',
						'popup_date'									=>'',
						'popup_description'								=>'',
						'popup_description_more_button'					=>'',
						'popup_comments'								=>'',
						
						'popup_ads_enabled'								=>'',
						'popup_ad_type'									=>'',
						'popup_ads_google_ads_client_id'				=>'',
						'popup_ads_google_ads_slot_id'					=>'',
						'popup_ad_image_group'							=>'',
						/*'popup_ad_image_source'						=>'',
						'popup_ad_image'								=>'',
						'popup_ad_external_link'						=>'',
						'popup_ad_on_click'								=>'',
						'popup_ad_img_link'								=>'',*/									
						
						'player_video_ads_enabled'						=>'',
						'video_ad_type'									=>'',
						'player_video_ads_google_ads_client_id'			=>'',
						'player_video_ads_google_ads_slot_id'			=>'',
						'video_ad_image_group'							=>'',
						/*'video_ad_image_source'						=>'',
						'video_ad_image'								=>'',
						'video_ad_external_link'						=>'',
						'video_ad_on_click'								=>'',
						'video_ad_img_link'								=>'',
						*/
						'time_to_show_ads'								=>'',
						'time_skip_ads'									=>'',
						'time_to_hide_ads'								=>'',
						
						'player_inline_light'							=>'',
						'player_inline_close'							=>'',
						
						'time_locale'									=>'',
						'text_views'									=>'',
						'text_comments'									=>'',
						'text_likes'									=>'',
						'text_dislikes'									=>'',
						'text_load_more'								=>'',
						'text_prev'										=>'',
						'text_next'										=>'',
						'text_already_loaded'							=>'',
						'text_show_more'								=>'',
						'text_show_less'								=>'',
						'text_published_at'								=>'',
						'text_view_all_replies'							=>'',
						'text_load_ads'									=>'',
						'text_skip_ad_in'								=>'',
						'text_skip_ads'									=>'',						
						
						'spacebetween'									=>'',
						'speed'											=>'',
						'autoplay'										=>'',						
						'slidesPerView'									=>'',
						'slidespercolumn'								=>'',
						'breakpoints'									=>'',	
						
						
						'main_font'										=>'',
						'main_font_size'								=>'',
						'main_font_letter_spacing'						=>'',
						'main_font_weight'								=>'',
						'main_font_style'								=>'',
						'main_font_transform'							=>'',
						'main_font_line_height'							=>'',
						'heading_font'									=>'',
						'heading_font_size'								=>'',
						'heading_font_letter_spacing'					=>'',
						'heading_font_weight'							=>'',
						'heading_font_style'							=>'',
						'heading_font_transform'						=>'',
						'heading_font_line_height'						=>'',						
						'meta_font'										=>'',
						'meta_font_size'								=>'',
						'meta_font_letter_spacing'						=>'',
						'meta_font_weight'								=>'',
						'meta_font_style'								=>'',
						'meta_font_transform'							=>'',
						'meta_font_line_height'							=>'',				
					), 
					$params
				)				
			);
			
			$options = array();
			if(trim(get_option('youtube_video_gallery_google_api_key'))!=''){
				$options['api_key'] = trim(get_option('youtube_video_gallery_google_api_key'));
			}
			$options['data'] = (isset($params['data'])&&trim($params['data'])!='')?json_decode(urldecode(trim($params['data']))):array();			
			$options['layout_tabs'] = (isset($params['layout_tabs'])&&trim($params['layout_tabs'])=='false')?false:true;		
				
			$options['layout'] = (isset($params['layout'])&&trim($params['layout'])!='')?trim($params['layout']):'grid';
			
			switch($options['layout']){
				case 'grid':
					$options['style'] = (isset($params['grid_style'])&&trim($params['grid_style'])!='')?trim($params['grid_style']):'grid-classic-1';
					break;
				case 'list':
					$options['style'] = (isset($params['list_style'])&&trim($params['list_style'])!='')?trim($params['list_style']):'list-classic-1';
					break;	
				case 'carousel':
					$options['style'] = (isset($params['carousel_style'])&&trim($params['carousel_style'])!='')?trim($params['carousel_style']):'carousel-classic-1';
					self::$add_script_swiper = true;
					break;
				case 'content-blocks':
					$options['style'] = (isset($params['content_blocks_style'])&&trim($params['content_blocks_style'])!='')?trim($params['content_blocks_style']):'content-blocks-1';
					self::$add_script_swiper = true;
					break;		
			}
			
			$options['layout_items_per_page'] = (isset($params['layout_items_per_page'])&&is_numeric(trim($params['layout_items_per_page'])))?(int)trim($params['layout_items_per_page']):10;
			$options['layout_pagination'] = (isset($params['layout_pagination'])&&trim($params['layout_pagination'])!='')?trim($params['layout_pagination']):'infinite';
			$options['layout_mobile'] = (isset($params['layout_mobile'])&&is_numeric(trim($params['layout_mobile'])))?(int)trim($params['layout_mobile']):'default';
			$options['layout_portrait_tablet'] = (isset($params['layout_portrait_tablet'])&&is_numeric(trim($params['layout_portrait_tablet'])))?(int)trim($params['layout_portrait_tablet']):'default';
			$options['layout_landscape_tablet'] = (isset($params['layout_landscape_tablet'])&&is_numeric(trim($params['layout_landscape_tablet'])))?(int)trim($params['layout_landscape_tablet']):'default';
			$options['layout_small_desktop'] = (isset($params['layout_small_desktop'])&&is_numeric(trim($params['layout_small_desktop'])))?(int)trim($params['layout_small_desktop']):'default';
			$options['layout_medium_desktop'] = (isset($params['layout_medium_desktop'])&&is_numeric(trim($params['layout_medium_desktop'])))?(int)trim($params['layout_medium_desktop']):'default';
			$options['layout_large_desktop'] = (isset($params['layout_large_desktop'])&&is_numeric(trim($params['layout_large_desktop'])))?(int)trim($params['layout_large_desktop']):'default';
			$options['layout_extra_large_desktop'] = (isset($params['layout_extra_large_desktop'])&&is_numeric(trim($params['layout_extra_large_desktop'])))?(int)trim($params['layout_extra_large_desktop']):'default';
			$options['layout_img_size'] = (isset($params['layout_img_size'])&&trim($params['layout_img_size'])!='')?trim($params['layout_img_size']):'high';
			$options['layout_play_mode'] = (isset($params['layout_play_mode'])&&trim($params['layout_play_mode'])!='')?trim($params['layout_play_mode']):'popup';
			$options['layout_title'] = (isset($params['layout_title'])&&trim($params['layout_title'])=='false')?false:true;	
			$options['layout_title_one_line'] = (isset($params['layout_title_one_line'])&&trim($params['layout_title_one_line'])=='false')?false:true;	
			$options['layout_description'] = (isset($params['layout_description'])&&trim($params['layout_description'])=='false')?false:true;
			$options['layout_description_length'] = (isset($params['layout_description_length'])&&is_numeric(trim($params['layout_description_length'])))?(int)trim($params['layout_description_length']):60;
			$options['layout_duration'] = (isset($params['layout_duration'])&&trim($params['layout_duration'])=='false')?false:true;
			$options['layout_views_counter'] = (isset($params['layout_views_counter'])&&trim($params['layout_views_counter'])=='false')?false:true;
			$options['layout_likes_counter'] = (isset($params['layout_likes_counter'])&&trim($params['layout_likes_counter'])=='false')?false:true;
			$options['layout_dislikes_counter'] = (isset($params['layout_dislikes_counter'])&&trim($params['layout_dislikes_counter'])=='false')?false:true;
			$options['layout_date'] = (isset($params['layout_date'])&&trim($params['layout_date'])=='false')?false:true;
			$options['layout_comments_counter'] = (isset($params['layout_comments_counter'])&&trim($params['layout_comments_counter'])=='false')?false:true;
			$options['layout_play_btn'] = (isset($params['layout_play_btn'])&&trim($params['layout_play_btn'])=='false')?false:true;	
			
			$options['header'] = (isset($params['header'])&&trim($params['header'])=='true')?true:false;
			$options['header_source'] = (isset($params['header_source'])&&trim($params['header_source'])!='')?trim($params['header_source']):'';
			$options['header_style'] = (isset($params['header_style'])&&trim($params['header_style'])!='')?trim($params['header_style']):'default';
			$options['header_logo'] = (isset($params['header_logo'])&&trim($params['header_logo'])=='false')?false:true;
			$options['header_channel_name'] = (isset($params['header_channel_name'])&&trim($params['header_channel_name'])=='false')?false:true;
			$options['header_channel_description'] = (isset($params['header_channel_description'])&&trim($params['header_channel_description'])=='false')?false:true;
			$options['header_videos_counter'] = (isset($params['header_videos_counter'])&&trim($params['header_videos_counter'])=='false')?false:true;
			$options['header_subscribers_counter'] = (isset($params['header_subscribers_counter'])&&trim($params['header_subscribers_counter'])=='false')?false:true;
			$options['header_views_counter'] = (isset($params['header_views_counter'])&&trim($params['header_views_counter'])=='false')?false:true;
			$options['header_subscribe_button'] = (isset($params['header_subscribe_button'])&&trim($params['header_subscribe_button'])=='false')?false:true;
			$options['header_custom_channel_name'] = (isset($params['header_custom_channel_name'])&&trim($params['header_custom_channel_name'])!='')?trim($params['header_custom_channel_name']):'';
			$options['header_custom_channel_description']=(isset($params['header_custom_channel_description'])&&trim($params['header_custom_channel_description'])!='')?trim($params['header_custom_channel_description']):'';
			
			$header_custom_channel_logo=(isset($params['header_custom_channel_logo'])&&is_numeric(trim($params['header_custom_channel_logo'])))?trim($params['header_custom_channel_logo']):0;
			if($header_custom_channel_logo>0){
				$headerLogo = wp_get_attachment_image_src($header_custom_channel_logo, 'full');
				if(!is_wp_error($headerLogo) && !empty($headerLogo)){
					$options['header_custom_channel_logo'] = $headerLogo[0];
				}
			}
						
			$header_custom_channel_background=(isset($params['header_custom_channel_background'])&&is_numeric(trim($params['header_custom_channel_background'])))?trim($params['header_custom_channel_background']):0;
			if($header_custom_channel_background>0){
				$headerBackground = wp_get_attachment_image_src($header_custom_channel_background, 'full');
				if(!is_wp_error($headerBackground) && !empty($headerBackground)){
					$options['header_custom_channel_background'] = $headerBackground[0];
				}	
			}
			
			$options['player_autoplay'] = (isset($params['player_autoplay'])&&trim($params['player_autoplay'])=='false')?false:true;	
			
			$options['popup_width'] = (isset($params['popup_width'])&&trim($params['popup_width'])!='')?trim($params['popup_width']):'';
			$options['popup_title'] = (isset($params['popup_title'])&&trim($params['popup_title'])=='false')?false:true;	
			$options['popup_channel_logo'] = (isset($params['popup_channel_logo'])&&trim($params['popup_channel_logo'])=='false')?false:true;	
			$options['popup_channel_name'] = (isset($params['popup_channel_name'])&&trim($params['popup_channel_name'])=='false')?false:true;	
			$options['popup_subscribe_button'] = (isset($params['popup_subscribe_button'])&&trim($params['popup_subscribe_button'])=='false')?false:true;	
			$options['popup_views_counter'] = (isset($params['popup_views_counter'])&&trim($params['popup_views_counter'])=='false')?false:true;	
			$options['popup_likes_counter'] = (isset($params['popup_likes_counter'])&&trim($params['popup_likes_counter'])=='false')?false:true;	
			$options['popup_dislikes_counter'] = (isset($params['popup_dislikes_counter'])&&trim($params['popup_dislikes_counter'])=='false')?false:true;	
			$options['popup_likes_ratio'] = (isset($params['popup_likes_ratio'])&&trim($params['popup_likes_ratio'])=='false')?false:true;	
			$options['popup_date'] = (isset($params['popup_date'])&&trim($params['popup_date'])=='false')?false:true;	
			$options['popup_description'] = (isset($params['popup_description'])&&trim($params['popup_description'])=='false')?false:true;	
			$options['popup_description_more_button'] = (isset($params['popup_description_more_button'])&&trim($params['popup_description_more_button'])=='false')?false:true;	
			$options['popup_comments'] = (isset($params['popup_comments'])&&trim($params['popup_comments'])=='false')?false:true;
			
			$popup_share = array();
			$popup_share['show'] 		= (isset($params['social_share'])&&trim($params['social_share'])=='false')?false:true;
			$popup_share['facebook'] 	= (isset($params['ss_facebook'])&&trim($params['ss_facebook'])=='false')?false:true;
			$popup_share['twitter'] 	= (isset($params['ss_twitter'])&&trim($params['ss_twitter'])=='false')?false:true;
			$popup_share['google'] 		= (isset($params['ss_google'])&&trim($params['ss_google'])=='false')?false:true;
			$popup_share['linkedIn'] 	= (isset($params['ss_linkedin'])&&trim($params['ss_linkedin'])=='true')?true:false;
			$popup_share['tumblr'] 		= (isset($params['ss_tumblr'])&&trim($params['ss_tumblr'])=='true')?true:false;
			$popup_share['pinterest'] 	= (isset($params['ss_pinterest'])&&trim($params['ss_pinterest'])=='true')?true:false;
			$popup_share['vk'] 			= (isset($params['ss_vk'])&&trim($params['ss_vk'])=='true')?true:false;
			$popup_share['email'] 		= (isset($params['ss_email'])&&trim($params['ss_email'])=='false')?false:true;			
			$options['popup_share'] = $popup_share;
			
			$popup_ads = array();
			$popup_ads['enabled'] = (isset($params['popup_ads_enabled'])&&trim($params['popup_ads_enabled'])=='false')?false:true;
			$popup_ads['ad_type'] = (isset($params['popup_ad_type'])&&trim($params['popup_ad_type'])!='')?trim($params['popup_ad_type']):'ga';
			$popup_ads['google_ads_client_id'] = (isset($params['popup_ads_google_ads_client_id'])&&trim($params['popup_ads_google_ads_client_id'])!='')?trim($params['popup_ads_google_ads_client_id']):'';
			$popup_ads['google_ads_slot_id'] = (isset($params['popup_ads_google_ads_slot_id'])&&trim($params['popup_ads_google_ads_slot_id'])!='')?trim($params['popup_ads_google_ads_slot_id']):'';
			
			$popup_ad_image_group = (isset($params['popup_ad_image_group'])&&trim($params['popup_ad_image_group'])!='')?json_decode(urldecode(trim($params['popup_ad_image_group']))):array();
			$popup_ads['ad_image'] = array();
			
			for($i=0;$i<count($popup_ad_image_group);$i++){
				$popup_ad_image_source 	= (isset($popup_ad_image_group[$i]->popup_ad_image_source)&&trim($popup_ad_image_group[$i]->popup_ad_image_source)!='')?trim($popup_ad_image_group[$i]->popup_ad_image_source):'ml';
				$popup_ad_image 		= (isset($popup_ad_image_group[$i]->popup_ad_image)&&is_numeric(trim($popup_ad_image_group[$i]->popup_ad_image)))?trim($popup_ad_image_group[$i]->popup_ad_image):0;
				$popup_ad_external_link = (isset($popup_ad_image_group[$i]->popup_ad_external_link)&&trim($popup_ad_image_group[$i]->popup_ad_external_link)!='')?trim($popup_ad_image_group[$i]->popup_ad_external_link):'';
				$popup_ad_on_click 		= (isset($popup_ad_image_group[$i]->popup_ad_on_click)&&trim($popup_ad_image_group[$i]->popup_ad_on_click)!='')?trim($popup_ad_image_group[$i]->popup_ad_on_click):'none';
				$popup_ad_img_link 		= (isset($popup_ad_image_group[$i]->popup_ad_img_link)&&trim($popup_ad_image_group[$i]->popup_ad_img_link)!='')?trim($popup_ad_image_group[$i]->popup_ad_img_link):'';
				
				$popup_ad_object = NULL;
				$popup_ad_object = new stdClass();				
				
				if($popup_ad_image_source=='ml' && $popup_ad_image>0){
					$imgAd = wp_get_attachment_image_src($popup_ad_image, 'full');
					if(!is_wp_error($imgAd) && !empty($imgAd)){
						$popup_ad_object->img = $imgAd[0];
					}
				}else if($popup_ad_image_source=='el' && $popup_ad_external_link!=''){					
					$popup_ad_object->img = $popup_ad_external_link;
				}
				
				if($popup_ad_on_click==='ocl' && $popup_ad_img_link!=''){
					$popup_ad_object->link_target = $popup_ad_img_link;
				}
				
				array_push($popup_ads['ad_image'], $popup_ad_object);
			}
			
			/*$popup_ads['img_link'] = '';
			
			if($popup_ads['ad_type']=='img'){
				$popup_ad_image_source=(isset($params['popup_ad_image_source'])&&trim($params['popup_ad_image_source'])!='')?trim($params['popup_ad_image_source']):'ml';				
				$popup_ad_image=(isset($params['popup_ad_image'])&&is_numeric(trim($params['popup_ad_image'])))?trim($params['popup_ad_image']):0;
				$popup_ad_external_link=(isset($params['popup_ad_external_link'])&&trim($params['popup_ad_external_link'])!='')?trim($params['popup_ad_external_link']):'';
				
				if($popup_ad_image_source=='ml' && $popup_ad_image>0){
					$imgAd = wp_get_attachment_image_src($popup_ad_image, 'full');
					if(!is_wp_error($imgAd) && !empty($imgAd)){
						$popup_ads['ad_image'] = $imgAd[0];
					}
				}else if($popup_ad_image_source=='el' && $popup_ad_external_link!=''){
					$popup_ads['ad_image'] = $popup_ad_external_link;
				}
				
				$popup_ad_on_click=(isset($params['popup_ad_on_click'])&&trim($params['popup_ad_on_click'])!='')?trim($params['popup_ad_on_click']):'none';
				$popup_ad_img_link=(isset($params['popup_ad_img_link'])&&trim($params['popup_ad_img_link'])!='')?trim($params['popup_ad_img_link']):'';
				if($popup_ad_on_click==='ocl' && $popup_ad_img_link!=''){
					$popup_ads['img_link'] = $popup_ad_img_link;
				}
				
			}*/
			
			$options['popup_ads'] = $popup_ads;	
			
			$player_video_ads = array();
			$player_video_ads['enabled'] = (isset($params['player_video_ads_enabled'])&&trim($params['player_video_ads_enabled'])=='false')?false:true;
			$player_video_ads['ad_type'] = (isset($params['video_ad_type'])&&trim($params['video_ad_type'])!='')?trim($params['video_ad_type']):'ga';
			$player_video_ads['google_ads_client_id'] = (isset($params['player_video_ads_google_ads_client_id'])&&trim($params['player_video_ads_google_ads_client_id'])!='')?trim($params['player_video_ads_google_ads_client_id']):'';
			$player_video_ads['google_ads_slot_id'] = (isset($params['player_video_ads_google_ads_slot_id'])&&trim($params['player_video_ads_google_ads_slot_id'])!='')?trim($params['player_video_ads_google_ads_slot_id']):'';
			
			$video_ad_image_group = (isset($params['video_ad_image_group'])&&trim($params['video_ad_image_group'])!='')?json_decode(urldecode(trim($params['video_ad_image_group']))):array();			
			$player_video_ads['ad_image'] = array();
			
			for($i=0;$i<count($video_ad_image_group);$i++){
				$video_ad_image_source 	= (isset($video_ad_image_group[$i]->video_ad_image_source)&&trim($video_ad_image_group[$i]->video_ad_image_source)!='')?trim($video_ad_image_group[$i]->video_ad_image_source):'ml';
				$video_ad_image 		= (isset($video_ad_image_group[$i]->video_ad_image)&&is_numeric(trim($video_ad_image_group[$i]->video_ad_image)))?trim($video_ad_image_group[$i]->video_ad_image):0;
				$video_ad_external_link = (isset($video_ad_image_group[$i]->video_ad_external_link)&&trim($video_ad_image_group[$i]->video_ad_external_link)!='')?trim($video_ad_image_group[$i]->video_ad_external_link):'';
				$video_ad_on_click 		= (isset($video_ad_image_group[$i]->video_ad_on_click)&&trim($video_ad_image_group[$i]->video_ad_on_click)!='')?trim($video_ad_image_group[$i]->video_ad_on_click):'none';
				$video_ad_img_link 		= (isset($video_ad_image_group[$i]->video_ad_img_link)&&trim($video_ad_image_group[$i]->video_ad_img_link)!='')?trim($video_ad_image_group[$i]->video_ad_img_link):'';
				
				$player_ad_object = NULL;
				$player_ad_object = new stdClass();				
				
				if($video_ad_image_source=='ml' && $video_ad_image>0){
					$imgAd = wp_get_attachment_image_src($video_ad_image, 'full');
					if(!is_wp_error($imgAd) && !empty($imgAd)){
						$player_ad_object->img = $imgAd[0];
					}
				}else if($video_ad_image_source=='el' && $video_ad_external_link!=''){					
					$player_ad_object->img = $video_ad_external_link;
				}
				
				if($video_ad_on_click==='ocl' && $video_ad_img_link!=''){
					$player_ad_object->link_target = $video_ad_img_link;
				}
				
				array_push($player_video_ads['ad_image'], $player_ad_object);
			}
			
			/*$player_video_ads['img_link'] = '';
			
			if($player_video_ads['ad_type']=='img'){
				$video_ad_image_source=(isset($params['video_ad_image_source'])&&trim($params['video_ad_image_source'])!='')?trim($params['video_ad_image_source']):'ml';				
				$video_ad_image=(isset($params['video_ad_image'])&&is_numeric(trim($params['video_ad_image'])))?trim($params['video_ad_image']):0;
				$video_ad_external_link=(isset($params['video_ad_external_link'])&&trim($params['video_ad_external_link'])!='')?trim($params['video_ad_external_link']):'';
				
				if($video_ad_image_source=='ml' && $video_ad_image>0){
					$imgAd = wp_get_attachment_image_src($video_ad_image, 'full');
					if(!is_wp_error($imgAd) && !empty($imgAd)){
						$player_video_ads['ad_image'] = $imgAd[0];
					}
				}else if($video_ad_image_source=='el' && $video_ad_external_link!=''){
					$player_video_ads['ad_image'] = $video_ad_external_link;
				}
				
				$video_ad_on_click=(isset($params['video_ad_on_click'])&&trim($params['video_ad_on_click'])!='')?trim($params['video_ad_on_click']):'none';
				$video_ad_img_link=(isset($params['video_ad_img_link'])&&trim($params['video_ad_img_link'])!='')?trim($params['video_ad_img_link']):'';
				if($video_ad_on_click==='ocl' && $video_ad_img_link!=''){
					$player_video_ads['img_link'] = $video_ad_img_link;
				}
			}*/
			
			$video_ad_vid_group = (isset($params['video_ad_vid_group'])&&trim($params['video_ad_vid_group'])!='')?json_decode(urldecode(trim($params['video_ad_vid_group']))):array();			
			$player_video_ads['ad_video'] = array();
			
			for($i=0;$i<count($video_ad_vid_group);$i++){
				$mp4 					= (isset($video_ad_vid_group[$i]->mp4)&&trim($video_ad_vid_group[$i]->mp4)!='')?trim($video_ad_vid_group[$i]->mp4):'';
				$webm 					= (isset($video_ad_vid_group[$i]->webm)&&trim($video_ad_vid_group[$i]->webm)!='')?trim($video_ad_vid_group[$i]->webm):'';
				$ogv 					= (isset($video_ad_vid_group[$i]->ogv)&&trim($video_ad_vid_group[$i]->ogv)!='')?trim($video_ad_vid_group[$i]->ogv):'';
				$video_ad_vid_on_click 	= (isset($video_ad_vid_group[$i]->video_ad_vid_on_click)&&trim($video_ad_vid_group[$i]->video_ad_vid_on_click)!='')?trim($video_ad_vid_group[$i]->video_ad_vid_on_click):'none';
				$video_ad_vid_link 		= (isset($video_ad_vid_group[$i]->video_ad_vid_link)&&trim($video_ad_vid_group[$i]->video_ad_vid_link)!='')?trim($video_ad_vid_group[$i]->video_ad_vid_link):'';
				
				$player_vid_ad_object = NULL;
				$player_vid_ad_object = new stdClass();
				
				if($mp4!=''){
					$player_vid_ad_object->mp4 = $mp4;
				}
				if($webm!=''){
					$player_vid_ad_object->webm = $webm;
				}
				if($ogv!=''){
					$player_vid_ad_object->ogv = $ogv;
				}
				
				if($video_ad_vid_on_click==='ocl' && $video_ad_vid_link!=''){
					$player_vid_ad_object->link_target = $video_ad_vid_link;
				}
				
				array_push($player_video_ads['ad_video'], $player_vid_ad_object);
			}
			
			$player_video_ads['time_to_show_ads'] = (isset($params['time_to_show_ads'])&&trim($params['time_to_show_ads'])!='')?explode(',', trim($params['time_to_show_ads'])):array(0);
			$player_video_ads['time_skip_ads'] = (isset($params['time_skip_ads'])&&is_numeric(trim($params['time_skip_ads'])))?(int)trim($params['time_skip_ads']):5;
			$player_video_ads['time_to_hide_ads'] = (isset($params['time_to_hide_ads'])&&is_numeric(trim($params['time_to_hide_ads'])))?(int)trim($params['time_to_hide_ads']):10;
			$options['player_video_ads'] = $player_video_ads;	
			
			$options['player_inline_light'] = (isset($params['player_inline_light'])&&trim($params['player_inline_light'])=='false')?false:true;
			$options['player_inline_close'] = (isset($params['player_inline_close'])&&trim($params['player_inline_close'])=='false')?false:true;
			
			$options['time_locale'] = (isset($params['time_locale'])&&trim($params['time_locale'])!='')?trim($params['time_locale']):'en';
			$options['text_views'] = (isset($params['text_views'])&&trim($params['text_views'])!='')?trim($params['text_views']):'Views';
			$options['text_comments'] = (isset($params['text_comments'])&&trim($params['text_comments'])!='')?trim($params['text_comments']):__('Comments', 'youtube_video_gallery');
			$options['text_likes'] = (isset($params['text_likes'])&&trim($params['text_likes'])!='')?trim($params['text_likes']):__('Likes', 'youtube_video_gallery');
			$options['text_dislikes'] = (isset($params['text_dislikes'])&&trim($params['text_dislikes'])!='')?trim($params['text_dislikes']):__('Dislikes', 'youtube_video_gallery');
			$options['text_load_more'] = (isset($params['text_load_more'])&&trim($params['text_load_more'])!='')?trim($params['text_load_more']):__('LOAD MORE', 'youtube_video_gallery');
			$options['text_prev'] = (isset($params['text_prev'])&&trim($params['text_prev'])!='')?trim($params['text_prev']):__('PREV', 'youtube_video_gallery');
			$options['text_next'] = (isset($params['text_next'])&&trim($params['text_next'])!='')?trim($params['text_next']):__('NEXT', 'youtube_video_gallery');
			$options['text_already_loaded'] = (isset($params['text_already_loaded'])&&trim($params['text_already_loaded'])!='')?trim($params['text_already_loaded']):__('ALL VIDEOS ARE ALREADY LOADED!', 'youtube_video_gallery');
			$options['text_show_more'] = (isset($params['text_show_more'])&&trim($params['text_show_more'])!='')?trim($params['text_show_more']):__('SHOW MORE', 'youtube_video_gallery');
			$options['text_show_less'] = (isset($params['text_show_less'])&&trim($params['text_show_less'])!='')?trim($params['text_show_less']):__('SHOW LESS', 'youtube_video_gallery');
			$options['text_published_at'] = (isset($params['text_published_at'])&&trim($params['text_published_at'])!='')?trim($params['text_published_at']):__('Published at', 'youtube_video_gallery');
			$options['text_view_all_replies'] = (isset($params['text_view_all_replies'])&&trim($params['text_view_all_replies'])!='')?trim($params['text_view_all_replies']):__('View all replies', 'youtube_video_gallery');
			$options['text_load_ads'] = (isset($params['text_load_ads'])&&trim($params['text_load_ads'])!='')?trim($params['text_load_ads']):__('Loading advertisement...', 'youtube_video_gallery');
			$options['text_skip_ad_in'] = (isset($params['text_skip_ad_in'])&&trim($params['text_skip_ad_in'])!='')?trim($params['text_skip_ad_in']):__('Skip ad in', 'youtube_video_gallery');
			$options['text_skip_ads'] = (isset($params['text_skip_ads'])&&trim($params['text_skip_ads'])!='')?trim($params['text_skip_ads']):__('Skip Ad', 'youtube_video_gallery');
			
			$carousel_config = array();
			$carousel_config['spaceBetween'] = (isset($params['spacebetween'])&&is_numeric(trim($params['spacebetween'])))?(int)trim($params['spacebetween']):20;
			$carousel_config['speed'] = (isset($params['speed'])&&is_numeric(trim($params['speed'])))?(int)trim($params['speed']):600;
			$carousel_config['autoplay'] = (isset($params['autoplay'])&&is_numeric(trim($params['autoplay'])))?(int)trim($params['autoplay']):'';			
			$carousel_config['slidesPerView'] = (isset($params['slidesperview'])&&is_numeric(trim($params['slidesperview'])))?(int)trim($params['slidesperview']):1;
			$carousel_config['slidesPerColumn'] = (isset($params['slidespercolumn'])&&is_numeric(trim($params['slidespercolumn'])))?(int)trim($params['slidespercolumn']):1;
			
			$breakpoints = (isset($params['breakpoints'])&&trim($params['breakpoints'])!='')?json_decode(urldecode(trim($params['breakpoints']))):array();
			
			$return_breakpoints = array();
			if(is_array($breakpoints)){
				foreach($breakpoints as $breakpoint){
					if(is_object($breakpoint)){					
						if(isset($breakpoint->window_width) && is_numeric(trim($breakpoint->window_width))){
							$r_width 		= (int)trim($breakpoint->window_width);
							$r_columns 		= (isset($breakpoint->slidesperview)&&is_numeric(trim($breakpoint->slidesperview)))?(int)trim($breakpoint->slidesperview):1;
							$r_spacebetween = (isset($breakpoint->spacebetween)&&is_numeric(trim($breakpoint->spacebetween)))?(int)trim($breakpoint->spacebetween):20;
							
							$item_params = array();							
							$item_params['slidesPerView'] 	= $r_columns;
							$item_params['spaceBetween'] 	= $r_spacebetween;
							
							$return_breakpoints[$r_width] = $item_params;
						}
					}
				}
			}
			$carousel_config['breakpoints'] = $return_breakpoints;
			
			$options['carousel_config'] = $carousel_config;
			
			$options['main_font']					= (isset($params['main_font'])&&trim($params['main_font'])!='')?trim($params['main_font']):'';
			$options['main_font_size']				= (isset($params['main_font_size'])&&trim($params['main_font_size'])!='')?trim($params['main_font_size']):'';
			$options['main_font_letter_spacing']	= (isset($params['main_font_letter_spacing'])&&trim($params['main_font_letter_spacing'])!='')?trim($params['main_font_letter_spacing']):'';
			$options['main_font_weight']			= (isset($params['main_font_weight'])&&trim($params['main_font_weight'])!='')?trim($params['main_font_weight']):'';
			$options['main_font_style']				= (isset($params['main_font_style'])&&trim($params['main_font_style'])!='')?trim($params['main_font_style']):'';
			$options['main_font_transform']			= (isset($params['main_font_transform'])&&trim($params['main_font_transform'])!='')?trim($params['main_font_transform']):'';
			$options['main_font_line_height']		= (isset($params['main_font_line_height'])&&trim($params['main_font_line_height'])!='')?trim($params['main_font_line_height']):'';
			
			$options['main_font']					= (isset($params['main_font'])&&trim($params['main_font'])!='')?trim($params['main_font']):'';
			$options['main_font_size']				= (isset($params['main_font_size'])&&trim($params['main_font_size'])!='')?trim($params['main_font_size']):'';
			$options['main_font_letter_spacing']	= (isset($params['main_font_letter_spacing'])&&trim($params['main_font_letter_spacing'])!='')?trim($params['main_font_letter_spacing']):'';
			$options['main_font_weight']			= (isset($params['main_font_weight'])&&trim($params['main_font_weight'])!='')?trim($params['main_font_weight']):'';
			$options['main_font_style']				= (isset($params['main_font_style'])&&trim($params['main_font_style'])!='')?trim($params['main_font_style']):'';
			$options['main_font_transform']			= (isset($params['main_font_transform'])&&trim($params['main_font_transform'])!='')?trim($params['main_font_transform']):'';
			$options['main_font_line_height']		= (isset($params['main_font_line_height'])&&trim($params['main_font_line_height'])!='')?trim($params['main_font_line_height']):'';
			
			$options['main_font']					= (isset($params['main_font'])&&trim($params['main_font'])!='')?trim($params['main_font']):'';
			$options['main_font_size']				= (isset($params['main_font_size'])&&trim($params['main_font_size'])!='')?trim($params['main_font_size']):'';
			$options['main_font_letter_spacing']	= (isset($params['main_font_letter_spacing'])&&trim($params['main_font_letter_spacing'])!='')?trim($params['main_font_letter_spacing']):'';
			$options['main_font_weight']			= (isset($params['main_font_weight'])&&trim($params['main_font_weight'])!='')?trim($params['main_font_weight']):'';
			$options['main_font_style']				= (isset($params['main_font_style'])&&trim($params['main_font_style'])!='')?trim($params['main_font_style']):'';
			$options['main_font_transform']			= (isset($params['main_font_transform'])&&trim($params['main_font_transform'])!='')?trim($params['main_font_transform']):'';
			$options['main_font_line_height']		= (isset($params['main_font_line_height'])&&trim($params['main_font_line_height'])!='')?trim($params['main_font_line_height']):'';
			
			$options['heading_font']				= (isset($params['heading_font'])&&trim($params['heading_font'])!='')?trim($params['heading_font']):'';
			$options['heading_font_size']			= (isset($params['heading_font_size'])&&trim($params['heading_font_size'])!='')?trim($params['heading_font_size']):'';
			$options['heading_font_letter_spacing']	= (isset($params['heading_font_letter_spacing'])&&trim($params['heading_font_letter_spacing'])!='')?trim($params['heading_font_letter_spacing']):'';
			$options['heading_font_weight']			= (isset($params['heading_font_weight'])&&trim($params['heading_font_weight'])!='')?trim($params['heading_font_weight']):'';
			$options['heading_font_style']			= (isset($params['heading_font_style'])&&trim($params['heading_font_style'])!='')?trim($params['heading_font_style']):'';
			$options['heading_font_transform']		= (isset($params['heading_font_transform'])&&trim($params['heading_font_transform'])!='')?trim($params['heading_font_transform']):'';
			$options['heading_font_line_height']	= (isset($params['heading_font_line_height'])&&trim($params['heading_font_line_height'])!='')?trim($params['heading_font_line_height']):'';
			
			$options['meta_font']					= (isset($params['meta_font'])&&trim($params['meta_font'])!='')?trim($params['meta_font']):'';
			$options['meta_font_size']				= (isset($params['meta_font_size'])&&trim($params['meta_font_size'])!='')?trim($params['meta_font_size']):'';
			$options['meta_font_letter_spacing']	= (isset($params['meta_font_letter_spacing'])&&trim($params['meta_font_letter_spacing'])!='')?trim($params['meta_font_letter_spacing']):'';
			$options['meta_font_weight']			= (isset($params['meta_font_weight'])&&trim($params['meta_font_weight'])!='')?trim($params['meta_font_weight']):'';
			$options['meta_font_style']				= (isset($params['meta_font_style'])&&trim($params['meta_font_style'])!='')?trim($params['meta_font_style']):'';
			$options['meta_font_transform']			= (isset($params['meta_font_transform'])&&trim($params['meta_font_transform'])!='')?trim($params['meta_font_transform']):'';
			$options['meta_font_line_height']		= (isset($params['meta_font_line_height'])&&trim($params['meta_font_line_height'])!='')?trim($params['meta_font_line_height']):'';
			
			$options['main_color'] = (isset($params['main_color'])&&trim($params['main_color'])!='')?trim($params['main_color']):'';
			$options['background_color'] = (isset($params['background_color'])&&trim($params['background_color'])!='')?trim($params['background_color']):'';
			$options['content_background_color'] = (isset($params['content_background_color'])&&trim($params['content_background_color'])!='')?trim($params['content_background_color']):'';
			$options['item_background_color'] = (isset($params['item_background_color'])&&trim($params['item_background_color'])!='')?trim($params['item_background_color']):'';
			$options['divider_color'] = (isset($params['divider_color'])&&trim($params['divider_color'])!='')?trim($params['divider_color']):'';
			$options['button_color'] = (isset($params['button_color'])&&trim($params['button_color'])!='')?trim($params['button_color']):'';
			$options['button_background_color'] = (isset($params['button_background_color'])&&trim($params['button_background_color'])!='')?trim($params['button_background_color']):'';
			$options['button_background_hover_color'] = (isset($params['button_background_hover_color'])&&trim($params['button_background_hover_color'])!='')?trim($params['button_background_hover_color']):'';
			$options['tab_color'] = (isset($params['tab_color'])&&trim($params['tab_color'])!='')?trim($params['tab_color']):'';
			$options['tab_hover_color'] = (isset($params['tab_hover_color'])&&trim($params['tab_hover_color'])!='')?trim($params['tab_hover_color']):'';
			$options['title_color'] = (isset($params['title_color'])&&trim($params['title_color'])!='')?trim($params['title_color']):'';
			$options['title_hover_color'] = (isset($params['title_hover_color'])&&trim($params['title_hover_color'])!='')?trim($params['title_hover_color']):'';
			$options['text_color'] = (isset($params['text_color'])&&trim($params['text_color'])!='')?trim($params['text_color']):'';
			$options['meta_color'] = (isset($params['meta_color'])&&trim($params['meta_color'])!='')?trim($params['meta_color']):'';
			$options['header_logo_border_color'] = (isset($params['header_logo_border_color'])&&trim($params['header_logo_border_color'])!='')?trim($params['header_logo_border_color']):'';
			$options['header_channel_name_color'] = (isset($params['header_channel_name_color'])&&trim($params['header_channel_name_color'])!='')?trim($params['header_channel_name_color']):'';
			$options['header_channel_name_hover_color'] = (isset($params['header_channel_name_hover_color'])&&trim($params['header_channel_name_hover_color'])!='')?trim($params['header_channel_name_hover_color']):'';
			$options['header_text_color'] = (isset($params['header_text_color'])&&trim($params['header_text_color'])!='')?trim($params['header_text_color']):'';
			$options['header_meta_color'] = (isset($params['header_meta_color'])&&trim($params['header_meta_color'])!='')?trim($params['header_meta_color']):'';
			$options['header_meta_background_color'] = (isset($params['header_meta_background_color'])&&trim($params['header_meta_background_color'])!='')?trim($params['header_meta_background_color']):'';
			$options['popup_background'] = (isset($params['popup_background'])&&trim($params['popup_background'])!='')?trim($params['popup_background']):'';
			$options['popup_button_color'] = (isset($params['popup_button_color'])&&trim($params['popup_button_color'])!='')?trim($params['popup_button_color']):'';
			$options['popup_button_background_color'] = (isset($params['popup_button_background_color'])&&trim($params['popup_button_background_color'])!='')?trim($params['popup_button_background_color']):'';
			$options['popup_button_background_hover_color'] = (isset($params['popup_button_background_hover_color'])&&trim($params['popup_button_background_hover_color'])!='')?trim($params['popup_button_background_hover_color']):'';
			$options['popup_heading_color'] = (isset($params['popup_heading_color'])&&trim($params['popup_heading_color'])!='')?trim($params['popup_heading_color']):'';
			$options['popup_heading_hover_color'] = (isset($params['popup_heading_hover_color'])&&trim($params['popup_heading_hover_color'])!='')?trim($params['popup_heading_hover_color']):'';
			$options['popup_link_color'] = (isset($params['popup_link_color'])&&trim($params['popup_link_color'])!='')?trim($params['popup_link_color']):'';
			$options['popup_link_hover_color'] = (isset($params['popup_link_hover_color'])&&trim($params['popup_link_hover_color'])!='')?trim($params['popup_link_hover_color']):'';
			$options['popup_text_color'] = (isset($params['popup_text_color'])&&trim($params['popup_text_color'])!='')?trim($params['popup_text_color']):'';
			$options['popup_meta_color'] = (isset($params['popup_meta_color'])&&trim($params['popup_meta_color'])!='')?trim($params['popup_meta_color']):'';
			$options['popup_divider_color'] = (isset($params['popup_divider_color'])&&trim($params['popup_divider_color'])!='')?trim($params['popup_divider_color']):'';			

			self::$add_script_core = true;
			
			$options['rnd_id'] = 'yt'.rand(1, 99999);
			
			$custom_style_container = '';
			$custom_style_loading = '';
			if($options['background_color']!=''){
				$custom_style_container='style="background-color:'.$options['background_color'].';"';
			}
			
			if($options['button_background_color']!='' || $options['button_background_hover_color']!=''){
				$style_pr_1 = '';
				$style_pr_2 = '';
				if($options['button_background_color']!=''){
					$style_pr_1 = 'border-left-color:'.$options['button_background_color'].';';
				}				
				if($options['button_background_hover_color']!=''){
					$style_pr_2 = 'border-top-color:'.$options['button_background_hover_color'].';border-right-color:'.$options['button_background_hover_color'].';border-bottom-color:'.$options['button_background_hover_color'].';';
				}				
				$custom_style_loading = 'style="'.$style_pr_1.$style_pr_2.'"';
			}
			
			if(trim(get_option('youtube_video_gallery_debug'))=='1'){
				$options['debug'] = true;
			}
									
			return 	'
					<div id="'.$options['rnd_id'].'" class="yt-defaults-videos-container yt-gallery-container-loading" '.$custom_style_container.'>
						<div class="yt-gallery-load-icon yt-first-load-container" '.$custom_style_loading.'></div>
					</div>
					<script>jQuery(document).on("youtubeVideoGalleryReady",function(){jQuery("#'.$options['rnd_id'].'").J_ytGallery('.json_encode($options).');});</script>
					';/*console.log('.json_encode($options).')*/
		}
		
		/*CSS Library*/
		static function front_enqueue_scripts(){
			wp_enqueue_style('beeteam_opensans_google_fonts', 				'//fonts.googleapis.com/css?family=Open+Sans:400,600&subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese', array(), YT_BETE_VER);
			wp_enqueue_style('beeteam_front_fontawsome_css', 		YT_BETE_PLUGIN_URL.'assets/front-end/fontawesome/css/font-awesome.min.css', array(), YT_BETE_VER);
			wp_enqueue_style('beeteam_front_swiper_css', 			YT_BETE_PLUGIN_URL.'assets/front-end/swiper/swiper.min.css', array(), YT_BETE_VER);
			
			if(is_admin()){
				wp_enqueue_style('yt_bete__admin_css', 				YT_BETE_PLUGIN_URL.'assets/back-end/core.css', array(), YT_BETE_VER);
				wp_enqueue_script('yt_bete__admin_js', 				YT_BETE_PLUGIN_URL.'assets/back-end/core.js', array(), YT_BETE_VER, true);
			}
		}
		
		//CSS Core
		static function core_enqueue_scripts(){		
			wp_enqueue_style('yt_bete_front_css', 					YT_BETE_PLUGIN_URL.'assets/front-end/youtube-gallery.css', array(), YT_BETE_VER);	
			if(trim(get_option('youtube_video_gallery_rtl_mode'))=='1'){
				wp_enqueue_style('yt_bete_front_rtl_css', 			YT_BETE_PLUGIN_URL.'assets/front-end/rtl.css', array(), YT_BETE_VER);
			}		
		}
			
		/*Register Script*/
		static function register_scripts(){
			//languages
			load_plugin_textdomain('youtube_video_gallery', false, basename(YT_BETE_PLUGIN_PATH).'/languages');
		
			//CSS Library
			self::front_enqueue_scripts();
			
			//JS Library
			wp_register_script('yt_bete_library_js', 					YT_BETE_PLUGIN_URL.'assets/front-end/library.js', array('jquery'), YT_BETE_VER, true);
			wp_register_script('beeteam_front_swiper_js', 				YT_BETE_PLUGIN_URL.'assets/front-end/swiper/swiper.jquery.min.js', array('jquery'), YT_BETE_VER, true);
			wp_register_script('google_adsense', 						'//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js', array(), YT_BETE_VER, true);
			//wp_register_script('youtube_iframe_api', 					'//www.youtube.com/iframe_api', array(), YT_BETE_VER, true);
								
			//JS Core
			wp_register_script('yt_bete_front_js', 						YT_BETE_PLUGIN_URL.'assets/front-end/youtube-gallery.js', array('jquery'), YT_BETE_VER, true);
			//wp_register_script('yt_bete_front_js', 						YT_BETE_PLUGIN_URL.'assets/front-end/youtube-gallery-obf.js', array('jquery'), YT_BETE_VER, true);
			
		}
		
		/*Print Script*/
		static function print_script(){
			$js_libraries = array();			
			if(self::$add_script_core){
				array_push($js_libraries, 'yt_bete_library_js');
				array_push($js_libraries, 'google_adsense');
				//array_push($js_libraries, 'youtube_iframe_api');
			}
			if(self::$add_script_swiper){
				array_push($js_libraries, 'beeteam_front_swiper_js');
			}
			wp_print_scripts($js_libraries);		
		}
				
		
		static function print_script_core(){
			$js_libraries = array();			
			if(self::$add_script_core){
				array_push($js_libraries, 'yt_bete_front_js');
			}
			wp_print_scripts($js_libraries);		
		}		
	}
	youtube_video_gallery_shortcode::init();
}