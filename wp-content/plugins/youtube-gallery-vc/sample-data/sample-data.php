<?php
if(!function_exists('ytg_bete_sample_data') && !function_exists('ytg_bete_setSampleData')) {
	function ytg_bete_sample_data(){
		global $wpdb;
		
		require_once(ABSPATH.'wp-includes/pluggable.php');
		require_once(ABSPATH.'wp-admin/includes/image.php');
		
		$images_list = 	array(
						'0.png' 	=> YT_BETE_PLUGIN_PATH.'sample-data/images/ultimate-layouts.png', 
						'1.png' 	=> YT_BETE_PLUGIN_PATH.'sample-data/images/content-block.png', 
						'2.jpg' 	=> YT_BETE_PLUGIN_PATH.'sample-data/images/jps-ajax-post-layout.png', 
						'3.jpg' 	=> YT_BETE_PLUGIN_PATH.'sample-data/images/mortar-addons-bundle.png',
						);	
									
		$parent_post_id	= 0;
		
		if(!is_array($images_list) && empty($images_list)){return;}
		$wp_upload_dir = wp_upload_dir();
		
		$image_list_upload = array();
		
		foreach($images_list as $name => $img_url){
			if(isset($img_url)&&$img_url!='' && isset($name)&&$name!='') {
				
				if(!file_exists($img_url)) {return;}
								
				$newFilePath = $wp_upload_dir['path'].'/'.rand(0,9999).time().$name;				
				
				copy($img_url, $newFilePath);
				
				$filetype = wp_check_filetype(basename($newFilePath), null);
				
				$attachment = 	array(
									'guid'           => $wp_upload_dir['url'].'/'.basename($newFilePath), 
									'post_mime_type' => $filetype['type'],
									'post_title'     => preg_replace('/\.[^.]+$/', '', basename($newFilePath)),
									'post_content'   => '',
									'post_status'    => 'inherit'
								);	
															
				$attach_id=wp_insert_attachment($attachment, $newFilePath, $parent_post_id);								
				$attach_data=wp_generate_attachment_metadata($attach_id, $newFilePath);
				wp_update_attachment_metadata($attach_id, $attach_data);	
				
				array_push($image_list_upload, $attach_id);
			}
		};
		
		//Post URL String		
		$post_url = '';
		
		/*demo 1*/
		$data_sample_1 = '[vc_row][vc_column][vc_column_text]
<h2 style="font-weight: normal;">GRID CLASSIC</h2>
YOUTUBE VIDEO GALLERY grid system allows up to 12 columns across the page.[/vc_column_text][vc_separator css=".vc_custom_1487060602339{margin-bottom: 41px !important;}"][/vc_column][/vc_row][vc_row][vc_column][ytvg_container layout_tabs="false" layout_mobile="1" layout_portrait_tablet="2" layout_landscape_tablet="2" layout_small_desktop="3" header="true" player_video_ads_enabled="true" video_ad_type="img" main_font_weight="" heading_font_weight="" meta_font_weight="" data="%5B%7B%22name%22%3A%22Videos%22%2C%22urls%22%3A%22https%3A%2F%2Fwww.youtube.com%2Fplaylist%3Flist%3DPL5E391C8B6957A5E8%22%7D%5D" layout_items_per_page="9" header_source="https://www.youtube.com/user/CALLOFDUTY" video_ad_image_group="%5B%7B%22video_ad_image_source%22%3A%22ml%22%2C%22video_ad_image%22%3A%22'.$image_list_upload[0].'%22%2C%22video_ad_on_click%22%3A%22ocl%22%2C%22video_ad_img_link%22%3A%22https%3A%2F%2Fcodecanyon.net%2Fitem%2Fultimate-layouts-responsive-grid-addon-for-visual-composer%2F17454996%22%7D%2C%7B%22video_ad_image_source%22%3A%22ml%22%2C%22video_ad_image%22%3A%22'.$image_list_upload[3].'%22%2C%22video_ad_on_click%22%3A%22ocl%22%2C%22video_ad_img_link%22%3A%22https%3A%2F%2Fcodecanyon.net%2Fitem%2Fmortar-visual-composer-addons-bundle%2F15147987%22%7D%2C%7B%22video_ad_image_source%22%3A%22ml%22%2C%22video_ad_image%22%3A%22'.$image_list_upload[1].'%22%2C%22video_ad_on_click%22%3A%22ocl%22%2C%22video_ad_img_link%22%3A%22https%3A%2F%2Fcodecanyon.net%2Fitem%2Fcontent-blocks-layout-for-visual-composer-displaying-post-custom-post-in-a-news-magazine-style%2F18866249%22%7D%2C%7B%22video_ad_image_source%22%3A%22ml%22%2C%22video_ad_image%22%3A%22'.$image_list_upload[2].'%22%2C%22video_ad_on_click%22%3A%22ocl%22%2C%22video_ad_img_link%22%3A%22https%3A%2F%2Fcodecanyon.net%2Fitem%2Fjps-ajax-post-layout-addon-for-visual-composer%2F12044774%22%7D%5D" time_to_show_ads="0,60,240" layout_description_length="90"][/vc_column][/vc_row]';		
		$page_name_1 = __('GRID CLASSIC', 'youtube_video_gallery');				
		$post_sample_1 = array(
			'post_content'   => $data_sample_1,
			'post_name' 	 => sanitize_title($page_name_1.' - '.rand(0,9999).time()),
			'post_title'     => $page_name_1,
			'post_status'    => 'publish',
			'post_type'      => 'page',			
		);
		$post_id_1 = wp_insert_post($post_sample_1, false);		
		$post_url.='<a href="'.get_permalink($post_id_1).'" target="_blank">'.$page_name_1.'</a>';/*demo 1*/
		
		/*demo 2*/
		$data_sample_2 = '[vc_row][vc_column][vc_column_text]
<h2 style="font-weight: normal;">GRID SPECIAL</h2>
YOUTUBE VIDEO GALLERY grid system allows up to 12 columns across the page.[/vc_column_text][vc_separator css=".vc_custom_1487060602339{margin-bottom: 41px !important;}"][/vc_column][/vc_row][vc_row][vc_column][ytvg_container layout_tabs="false" grid_style="grid-special-1" layout_mobile="1" layout_portrait_tablet="2" layout_landscape_tablet="2" layout_small_desktop="3" layout_play_mode="inline" layout_dislikes_counter="false" layout_date="false" header="true" player_video_ads_enabled="true" video_ad_type="img" main_font_weight="" heading_font_weight="" meta_font_weight="" data="%5B%7B%22name%22%3A%22Videos%22%2C%22urls%22%3A%22https%3A%2F%2Fwww.youtube.com%2Fplaylist%3Flist%3DPLg1bbn2fVnOHaJuzXR9UsEZxdYCjf3e4c%5Cnhttps%3A%2F%2Fwww.youtube.com%2Fplaylist%3Flist%3DPLg1bbn2fVnOFx78mXGsghnjiZ7HaKHDQt%22%7D%5D" layout_items_per_page="9" header_source="https://www.youtube.com/user/NeedForSpeed" video_ad_image_group="%5B%7B%22video_ad_image_source%22%3A%22ml%22%2C%22video_ad_image%22%3A%22'.$image_list_upload[0].'%22%2C%22video_ad_on_click%22%3A%22ocl%22%2C%22video_ad_img_link%22%3A%22https%3A%2F%2Fcodecanyon.net%2Fitem%2Fultimate-layouts-responsive-grid-addon-for-visual-composer%2F17454996%22%7D%2C%7B%22video_ad_image_source%22%3A%22ml%22%2C%22video_ad_image%22%3A%22'.$image_list_upload[3].'%22%2C%22video_ad_on_click%22%3A%22ocl%22%2C%22video_ad_img_link%22%3A%22https%3A%2F%2Fcodecanyon.net%2Fitem%2Fmortar-visual-composer-addons-bundle%2F15147987%22%7D%2C%7B%22video_ad_image_source%22%3A%22ml%22%2C%22video_ad_image%22%3A%22'.$image_list_upload[1].'%22%2C%22video_ad_on_click%22%3A%22ocl%22%2C%22video_ad_img_link%22%3A%22https%3A%2F%2Fcodecanyon.net%2Fitem%2Fcontent-blocks-layout-for-visual-composer-displaying-post-custom-post-in-a-news-magazine-style%2F18866249%22%7D%2C%7B%22video_ad_image_source%22%3A%22ml%22%2C%22video_ad_image%22%3A%22'.$image_list_upload[2].'%22%2C%22video_ad_on_click%22%3A%22ocl%22%2C%22video_ad_img_link%22%3A%22https%3A%2F%2Fcodecanyon.net%2Fitem%2Fjps-ajax-post-layout-addon-for-visual-composer%2F12044774%22%7D%5D" time_to_show_ads="0,60,240"][/vc_column][/vc_row]';		
		$page_name_2 = __('GRID SPECIAL', 'youtube_video_gallery');				
		$post_sample_2 = array(
			'post_content'   => $data_sample_2,
			'post_name' 	 => sanitize_title($page_name_2.' - '.rand(0,9999).time()),
			'post_title'     => $page_name_2,
			'post_status'    => 'publish',
			'post_type'      => 'page',			
		);
		$post_id_2 = wp_insert_post($post_sample_2, false);		
		$post_url.='<a href="'.get_permalink($post_id_2).'" target="_blank">'.$page_name_2.'</a>';/*demo 2*/
		
		/*demo 3*/
		$data_sample_3 = '[vc_row][vc_column][vc_column_text]
<h2 style="font-weight: normal;">LIST CLASSIC 1</h2>
[/vc_column_text][vc_separator css=".vc_custom_1487060602339{margin-bottom: 41px !important;}"][/vc_column][/vc_row][vc_row][vc_column][ytvg_container layout_tabs="false" layout="list" layout_img_size="standard" layout_play_mode="inline" layout_title_one_line="false" header="true" player_video_ads_enabled="true" video_ad_type="img" main_font_weight="" heading_font_weight="" meta_font_weight="" data="%5B%7B%22name%22%3A%22Videos%22%2C%22urls%22%3A%22https%3A%2F%2Fwww.youtube.com%2Fplaylist%3Flist%3DPLlYqpJ9JE-J9I8QhzACuqu98uNCj5DnzS%22%7D%5D" layout_items_per_page="6" header_source="https://www.youtube.com/user/NBCTheVoice" video_ad_image_group="%5B%7B%22video_ad_image_source%22%3A%22ml%22%2C%22video_ad_image%22%3A%22'.$image_list_upload[0].'%22%2C%22video_ad_on_click%22%3A%22ocl%22%2C%22video_ad_img_link%22%3A%22https%3A%2F%2Fcodecanyon.net%2Fitem%2Fultimate-layouts-responsive-grid-addon-for-visual-composer%2F17454996%22%7D%2C%7B%22video_ad_image_source%22%3A%22ml%22%2C%22video_ad_image%22%3A%22'.$image_list_upload[3].'%22%2C%22video_ad_on_click%22%3A%22ocl%22%2C%22video_ad_img_link%22%3A%22https%3A%2F%2Fcodecanyon.net%2Fitem%2Fmortar-visual-composer-addons-bundle%2F15147987%22%7D%2C%7B%22video_ad_image_source%22%3A%22ml%22%2C%22video_ad_image%22%3A%22'.$image_list_upload[1].'%22%2C%22video_ad_on_click%22%3A%22ocl%22%2C%22video_ad_img_link%22%3A%22https%3A%2F%2Fcodecanyon.net%2Fitem%2Fcontent-blocks-layout-for-visual-composer-displaying-post-custom-post-in-a-news-magazine-style%2F18866249%22%7D%2C%7B%22video_ad_image_source%22%3A%22ml%22%2C%22video_ad_image%22%3A%22'.$image_list_upload[2].'%22%2C%22video_ad_on_click%22%3A%22ocl%22%2C%22video_ad_img_link%22%3A%22https%3A%2F%2Fcodecanyon.net%2Fitem%2Fjps-ajax-post-layout-addon-for-visual-composer%2F12044774%22%7D%5D" time_to_show_ads="0,60,240" layout_description_length="150" header_channel_name_color="#000000" header_channel_name_hover_color="#dd3333"][/vc_column][/vc_row]';		
		$page_name_3 = __('LIST CLASSIC 1', 'youtube_video_gallery');				
		$post_sample_3 = array(
			'post_content'   => $data_sample_3,
			'post_name' 	 => sanitize_title($page_name_3.' - '.rand(0,9999).time()),
			'post_title'     => $page_name_3,
			'post_status'    => 'publish',
			'post_type'      => 'page',			
		);
		$post_id_3 = wp_insert_post($post_sample_3, false);		
		$post_url.='<a href="'.get_permalink($post_id_3).'" target="_blank">'.$page_name_3.'</a>';/*demo 3*/
		
		/*demo 4*/
		$data_sample_4 = '[vc_row][vc_column][vc_column_text]
<h2 style="font-weight: normal;">LIST CLASSIC 2</h2>
[/vc_column_text][vc_separator css=".vc_custom_1487060602339{margin-bottom: 41px !important;}"][/vc_column][/vc_row][vc_row][vc_column][ytvg_container layout_tabs="false" layout="list" list_style="list-classic-2" layout_img_size="standard" layout_play_mode="inline" layout_title_one_line="false" header="true" player_video_ads_enabled="true" video_ad_type="img" main_font_weight="" heading_font_weight="" meta_font_weight="" data="%5B%7B%22name%22%3A%22Videos%22%2C%22urls%22%3A%22https%3A%2F%2Fwww.youtube.com%2Fplaylist%3Flist%3DPLraFbwCoisJBTePpHtQAw3tVcwfL-mwQ4%22%7D%5D" layout_items_per_page="6" header_source="https://www.youtube.com/user/IGNentertainment" video_ad_image_group="%5B%7B%22video_ad_image_source%22%3A%22ml%22%2C%22video_ad_image%22%3A%22'.$image_list_upload[0].'%22%2C%22video_ad_on_click%22%3A%22ocl%22%2C%22video_ad_img_link%22%3A%22https%3A%2F%2Fcodecanyon.net%2Fitem%2Fultimate-layouts-responsive-grid-addon-for-visual-composer%2F17454996%22%7D%2C%7B%22video_ad_image_source%22%3A%22ml%22%2C%22video_ad_image%22%3A%22'.$image_list_upload[3].'%22%2C%22video_ad_on_click%22%3A%22ocl%22%2C%22video_ad_img_link%22%3A%22https%3A%2F%2Fcodecanyon.net%2Fitem%2Fmortar-visual-composer-addons-bundle%2F15147987%22%7D%2C%7B%22video_ad_image_source%22%3A%22ml%22%2C%22video_ad_image%22%3A%22'.$image_list_upload[1].'%22%2C%22video_ad_on_click%22%3A%22ocl%22%2C%22video_ad_img_link%22%3A%22https%3A%2F%2Fcodecanyon.net%2Fitem%2Fcontent-blocks-layout-for-visual-composer-displaying-post-custom-post-in-a-news-magazine-style%2F18866249%22%7D%2C%7B%22video_ad_image_source%22%3A%22ml%22%2C%22video_ad_image%22%3A%22'.$image_list_upload[2].'%22%2C%22video_ad_on_click%22%3A%22ocl%22%2C%22video_ad_img_link%22%3A%22https%3A%2F%2Fcodecanyon.net%2Fitem%2Fjps-ajax-post-layout-addon-for-visual-composer%2F12044774%22%7D%5D" time_to_show_ads="0,60,240" layout_description_length="150" header_channel_name_color="#000000" header_channel_name_hover_color="#dd3333"][/vc_column][/vc_row]';		
		$page_name_4 = __('LIST CLASSIC 2', 'youtube_video_gallery');				
		$post_sample_4 = array(
			'post_content'   => $data_sample_4,
			'post_name' 	 => sanitize_title($page_name_4.' - '.rand(0,9999).time()),
			'post_title'     => $page_name_4,
			'post_status'    => 'publish',
			'post_type'      => 'page',			
		);
		$post_id_4 = wp_insert_post($post_sample_4, false);		
		$post_url.='<a href="'.get_permalink($post_id_4).'" target="_blank">'.$page_name_4.'</a>';/*demo 4*/
		
		/*demo 5*/
		$data_sample_5 = '[vc_row][vc_column width="1/6"][/vc_column][vc_column width="2/3"][vc_column_text]
<h2 style="font-weight: normal;">LIST SPECIAL</h2>
[/vc_column_text][vc_separator css=".vc_custom_1487060602339{margin-bottom: 41px !important;}"][/vc_column][vc_column width="1/6"][/vc_column][/vc_row][vc_row][vc_column width="1/6"][/vc_column][vc_column width="2/3"][ytvg_container layout_tabs="false" layout="list" list_style="list-special-1" layout_img_size="maxres" layout_play_mode="inline" header="true" player_video_ads_enabled="true" video_ad_type="img" main_font_weight="" heading_font_weight="" meta_font_weight="" data="%5B%7B%22name%22%3A%22Videos%22%2C%22urls%22%3A%22https%3A%2F%2Fwww.youtube.com%2Fplaylist%3Flist%3DPLSnHrMX7SCvNtIERLfzYZ4xHXt3n5Pz8p%5Cnhttps%3A%2F%2Fwww.youtube.com%2Fplaylist%3Flist%3DPLSnHrMX7SCvMRWTtUeGO_NABLwOPMh1z5%22%7D%5D" layout_items_per_page="6" header_source="https://www.youtube.com/user/TheSims/playlists" video_ad_image_group="%5B%7B%22video_ad_image_source%22%3A%22ml%22%2C%22video_ad_image%22%3A%22'.$image_list_upload[0].'%22%2C%22video_ad_on_click%22%3A%22ocl%22%2C%22video_ad_img_link%22%3A%22https%3A%2F%2Fcodecanyon.net%2Fitem%2Fultimate-layouts-responsive-grid-addon-for-visual-composer%2F17454996%22%7D%2C%7B%22video_ad_image_source%22%3A%22ml%22%2C%22video_ad_image%22%3A%22'.$image_list_upload[3].'%22%2C%22video_ad_on_click%22%3A%22ocl%22%2C%22video_ad_img_link%22%3A%22https%3A%2F%2Fcodecanyon.net%2Fitem%2Fmortar-visual-composer-addons-bundle%2F15147987%22%7D%2C%7B%22video_ad_image_source%22%3A%22ml%22%2C%22video_ad_image%22%3A%22'.$image_list_upload[1].'%22%2C%22video_ad_on_click%22%3A%22ocl%22%2C%22video_ad_img_link%22%3A%22https%3A%2F%2Fcodecanyon.net%2Fitem%2Fcontent-blocks-layout-for-visual-composer-displaying-post-custom-post-in-a-news-magazine-style%2F18866249%22%7D%2C%7B%22video_ad_image_source%22%3A%22ml%22%2C%22video_ad_image%22%3A%22'.$image_list_upload[2].'%22%2C%22video_ad_on_click%22%3A%22ocl%22%2C%22video_ad_img_link%22%3A%22https%3A%2F%2Fcodecanyon.net%2Fitem%2Fjps-ajax-post-layout-addon-for-visual-composer%2F12044774%22%7D%5D" time_to_show_ads="0,60,240" header_channel_name_color="#000000" header_channel_name_hover_color="#dd3333" layout_description_length="180"][/vc_column][vc_column width="1/6"][/vc_column][/vc_row]';		
		$page_name_5 = __('LIST SPECIAL', 'youtube_video_gallery');				
		$post_sample_5 = array(
			'post_content'   => $data_sample_5,
			'post_name' 	 => sanitize_title($page_name_5.' - '.rand(0,9999).time()),
			'post_title'     => $page_name_5,
			'post_status'    => 'publish',
			'post_type'      => 'page',			
		);
		$post_id_5 = wp_insert_post($post_sample_5, false);		
		$post_url.='<a href="'.get_permalink($post_id_5).'" target="_blank">'.$page_name_5.'</a>';/*demo 5*/
		
		/*demo 6*/
		$data_sample_6 = '[vc_row][vc_column][vc_column_text]
<h2 style="font-weight: normal;">CAROUSEL CLASSIC</h2>
YOUTUBE VIDEO GALLERY <strong>Carousel</strong> system allows up to <strong>12</strong> columns across the page.[/vc_column_text][vc_separator css=".vc_custom_1487060602339{margin-bottom: 41px !important;}"][/vc_column][/vc_row][vc_row][vc_column][ytvg_container layout_tabs="false" layout="carousel" header="true" player_video_ads_enabled="true" video_ad_type="img" main_font_weight="" heading_font_weight="" meta_font_weight="" data="%5B%7B%22name%22%3A%22Videos%22%2C%22urls%22%3A%22https%3A%2F%2Fwww.youtube.com%2Fplaylist%3Flist%3DPLScC8g4bqD44ZoY4SqXoY823tZ3akZnlj%5Cnhttps%3A%2F%2Fwww.youtube.com%2Fplaylist%3Flist%3DPLScC8g4bqD47MWx5Q4CWjfUuBMQqBGn9d%22%7D%5D" header_source="https://www.youtube.com/user/movieclipsTRAILERS" video_ad_image_group="%5B%7B%22video_ad_image_source%22%3A%22ml%22%2C%22video_ad_image%22%3A%22'.$image_list_upload[0].'%22%2C%22video_ad_on_click%22%3A%22ocl%22%2C%22video_ad_img_link%22%3A%22https%3A%2F%2Fcodecanyon.net%2Fitem%2Fultimate-layouts-responsive-grid-addon-for-visual-composer%2F17454996%22%7D%2C%7B%22video_ad_image_source%22%3A%22ml%22%2C%22video_ad_image%22%3A%22'.$image_list_upload[3].'%22%2C%22video_ad_on_click%22%3A%22ocl%22%2C%22video_ad_img_link%22%3A%22https%3A%2F%2Fcodecanyon.net%2Fitem%2Fmortar-visual-composer-addons-bundle%2F15147987%22%7D%2C%7B%22video_ad_image_source%22%3A%22ml%22%2C%22video_ad_image%22%3A%22'.$image_list_upload[1].'%22%2C%22video_ad_on_click%22%3A%22ocl%22%2C%22video_ad_img_link%22%3A%22https%3A%2F%2Fcodecanyon.net%2Fitem%2Fcontent-blocks-layout-for-visual-composer-displaying-post-custom-post-in-a-news-magazine-style%2F18866249%22%7D%2C%7B%22video_ad_image_source%22%3A%22ml%22%2C%22video_ad_image%22%3A%22'.$image_list_upload[2].'%22%2C%22video_ad_on_click%22%3A%22ocl%22%2C%22video_ad_img_link%22%3A%22https%3A%2F%2Fcodecanyon.net%2Fitem%2Fjps-ajax-post-layout-addon-for-visual-composer%2F12044774%22%7D%5D" time_to_show_ads="0,60,240" slidesperview="3" slidespercolumn="1" breakpoints="%5B%7B%22window_width%22%3A%221024%22%2C%22slidesperview%22%3A%222%22%7D%2C%7B%22window_width%22%3A%22599%22%2C%22slidesperview%22%3A%221%22%7D%5D" layout_description_length="80"][/vc_column][/vc_row][vc_row css=".vc_custom_1487057023221{margin-top: 55px !important;}"][vc_column][vc_separator][vc_column_text]
<h2 style="text-align: center; font-weight: normal;">MULTIPLE ROWS</h2>
[/vc_column_text][/vc_column][/vc_row][vc_row][vc_column][ytvg_container layout_tabs="false" layout="carousel" header="true" player_video_ads_enabled="true" video_ad_type="img" main_font_weight="" heading_font_weight="" meta_font_weight="" data="%5B%7B%22name%22%3A%22Videos%22%2C%22urls%22%3A%22https%3A%2F%2Fwww.youtube.com%2Fplaylist%3Flist%3DPLvuwbYTkUzHcJ-CtDI1Gu_6xuULpHo_c7%5Cnhttps%3A%2F%2Fwww.youtube.com%2Fplaylist%3Flist%3DPLvuwbYTkUzHfCisKJruWC2SCNpSzZSZ8P%5Cnhttps%3A%2F%2Fwww.youtube.com%2Fplaylist%3Flist%3DPLvuwbYTkUzHciu6GYWDJbXx2n59zhsnxN%5Cnhttps%3A%2F%2Fwww.youtube.com%2Fplaylist%3Flist%3DPLvuwbYTkUzHfV71MvS6Ui-fkX58OonHmW%22%7D%5D" header_source="https://www.youtube.com/user/ArsenalTour" video_ad_image_group="%5B%7B%22video_ad_image_source%22%3A%22ml%22%2C%22video_ad_image%22%3A%22'.$image_list_upload[0].'%22%2C%22video_ad_on_click%22%3A%22ocl%22%2C%22video_ad_img_link%22%3A%22https%3A%2F%2Fcodecanyon.net%2Fitem%2Fultimate-layouts-responsive-grid-addon-for-visual-composer%2F17454996%22%7D%2C%7B%22video_ad_image_source%22%3A%22ml%22%2C%22video_ad_image%22%3A%22'.$image_list_upload[3].'%22%2C%22video_ad_on_click%22%3A%22ocl%22%2C%22video_ad_img_link%22%3A%22https%3A%2F%2Fcodecanyon.net%2Fitem%2Fmortar-visual-composer-addons-bundle%2F15147987%22%7D%2C%7B%22video_ad_image_source%22%3A%22ml%22%2C%22video_ad_image%22%3A%22'.$image_list_upload[1].'%22%2C%22video_ad_on_click%22%3A%22ocl%22%2C%22video_ad_img_link%22%3A%22https%3A%2F%2Fcodecanyon.net%2Fitem%2Fcontent-blocks-layout-for-visual-composer-displaying-post-custom-post-in-a-news-magazine-style%2F18866249%22%7D%2C%7B%22video_ad_image_source%22%3A%22ml%22%2C%22video_ad_image%22%3A%22'.$image_list_upload[2].'%22%2C%22video_ad_on_click%22%3A%22ocl%22%2C%22video_ad_img_link%22%3A%22https%3A%2F%2Fcodecanyon.net%2Fitem%2Fjps-ajax-post-layout-addon-for-visual-composer%2F12044774%22%7D%5D" time_to_show_ads="0,60,240" slidesperview="3" slidespercolumn="2" breakpoints="%5B%7B%22window_width%22%3A%221024%22%2C%22slidesperview%22%3A%222%22%7D%2C%7B%22window_width%22%3A%22599%22%2C%22slidesperview%22%3A%221%22%7D%5D" layout_description_length="80"][/vc_column][/vc_row]';		
		$page_name_6 = __('CAROUSEL CLASSIC', 'youtube_video_gallery');				
		$post_sample_6 = array(
			'post_content'   => $data_sample_6,
			'post_name' 	 => sanitize_title($page_name_6.' - '.rand(0,9999).time()),
			'post_title'     => $page_name_6,
			'post_status'    => 'publish',
			'post_type'      => 'page',			
		);
		$post_id_6 = wp_insert_post($post_sample_6, false);		
		$post_url.='<a href="'.get_permalink($post_id_6).'" target="_blank">'.$page_name_6.'</a>';/*demo 6*/
		
		/*demo 7*/
		$data_sample_7 = '[vc_row][vc_column][vc_column_text]<h2 style="font-weight: normal;">CAROUSEL SPECIAL</h2>
YOUTUBE VIDEO GALLERY <strong>Carousel</strong> system allows up to <strong>12</strong> columns across the page.[/vc_column_text][vc_separator css=".vc_custom_1487060602339{margin-bottom: 41px !important;}"][/vc_column][/vc_row][vc_row][vc_column][ytvg_container layout_tabs="false" layout="carousel" carousel_style="carousel-special-1" layout_dislikes_counter="false" layout_date="false" header="true" player_video_ads_enabled="true" video_ad_type="img" main_font_weight="" heading_font_weight="" meta_font_weight="" data="%5B%7B%22name%22%3A%22Videos%22%2C%22urls%22%3A%22https%3A%2F%2Fwww.youtube.com%2Fplaylist%3Flist%3DPLx6bGx4zt6EmTgVyOUdwU4_F2VAJQ66S6%22%7D%5D" header_source="https://www.youtube.com/user/chelseafc" video_ad_image_group="%5B%7B%22video_ad_image_source%22%3A%22ml%22%2C%22video_ad_image%22%3A%22'.$image_list_upload[0].'%22%2C%22video_ad_on_click%22%3A%22ocl%22%2C%22video_ad_img_link%22%3A%22https%3A%2F%2Fcodecanyon.net%2Fitem%2Fultimate-layouts-responsive-grid-addon-for-visual-composer%2F17454996%22%7D%2C%7B%22video_ad_image_source%22%3A%22ml%22%2C%22video_ad_image%22%3A%22'.$image_list_upload[3].'%22%2C%22video_ad_on_click%22%3A%22ocl%22%2C%22video_ad_img_link%22%3A%22https%3A%2F%2Fcodecanyon.net%2Fitem%2Fmortar-visual-composer-addons-bundle%2F15147987%22%7D%2C%7B%22video_ad_image_source%22%3A%22ml%22%2C%22video_ad_image%22%3A%22'.$image_list_upload[1].'%22%2C%22video_ad_on_click%22%3A%22ocl%22%2C%22video_ad_img_link%22%3A%22https%3A%2F%2Fcodecanyon.net%2Fitem%2Fcontent-blocks-layout-for-visual-composer-displaying-post-custom-post-in-a-news-magazine-style%2F18866249%22%7D%2C%7B%22video_ad_image_source%22%3A%22ml%22%2C%22video_ad_image%22%3A%22'.$image_list_upload[2].'%22%2C%22video_ad_on_click%22%3A%22ocl%22%2C%22video_ad_img_link%22%3A%22https%3A%2F%2Fcodecanyon.net%2Fitem%2Fjps-ajax-post-layout-addon-for-visual-composer%2F12044774%22%7D%5D" time_to_show_ads="0,60,240" slidesperview="3" slidespercolumn="1" breakpoints="%5B%7B%22window_width%22%3A%221024%22%2C%22slidesperview%22%3A%222%22%7D%2C%7B%22window_width%22%3A%22599%22%2C%22slidesperview%22%3A%221%22%7D%5D" layout_description_length="90"][/vc_column][/vc_row][vc_row css=".vc_custom_1487057023221{margin-top: 55px !important;}"][vc_column][vc_separator][vc_column_text]
<h2 style="text-align: center; font-weight: normal;">MULTIPLE ROWS</h2>
[/vc_column_text][/vc_column][/vc_row][vc_row][vc_column][ytvg_container layout_tabs="false" layout="carousel" carousel_style="carousel-special-1" layout_dislikes_counter="false" layout_date="false" header="true" player_video_ads_enabled="true" video_ad_type="img" main_font_weight="" heading_font_weight="" meta_font_weight="" data="%5B%7B%22name%22%3A%22Videos%22%2C%22urls%22%3A%22https%3A%2F%2Fwww.youtube.com%2Fuser%2FLiverpoolFC%2F%22%7D%5D" header_source="https://www.youtube.com/user/LiverpoolFC" video_ad_image_group="%5B%7B%22video_ad_image_source%22%3A%22ml%22%2C%22video_ad_image%22%3A%22'.$image_list_upload[0].'%22%2C%22video_ad_on_click%22%3A%22ocl%22%2C%22video_ad_img_link%22%3A%22https%3A%2F%2Fcodecanyon.net%2Fitem%2Fultimate-layouts-responsive-grid-addon-for-visual-composer%2F17454996%22%7D%2C%7B%22video_ad_image_source%22%3A%22ml%22%2C%22video_ad_image%22%3A%22'.$image_list_upload[3].'%22%2C%22video_ad_on_click%22%3A%22ocl%22%2C%22video_ad_img_link%22%3A%22https%3A%2F%2Fcodecanyon.net%2Fitem%2Fmortar-visual-composer-addons-bundle%2F15147987%22%7D%2C%7B%22video_ad_image_source%22%3A%22ml%22%2C%22video_ad_image%22%3A%22'.$image_list_upload[1].'%22%2C%22video_ad_on_click%22%3A%22ocl%22%2C%22video_ad_img_link%22%3A%22https%3A%2F%2Fcodecanyon.net%2Fitem%2Fcontent-blocks-layout-for-visual-composer-displaying-post-custom-post-in-a-news-magazine-style%2F18866249%22%7D%2C%7B%22video_ad_image_source%22%3A%22ml%22%2C%22video_ad_image%22%3A%22'.$image_list_upload[2].'%22%2C%22video_ad_on_click%22%3A%22ocl%22%2C%22video_ad_img_link%22%3A%22https%3A%2F%2Fcodecanyon.net%2Fitem%2Fjps-ajax-post-layout-addon-for-visual-composer%2F12044774%22%7D%5D" time_to_show_ads="0,60,240" slidesperview="3" slidespercolumn="3" breakpoints="%5B%7B%22window_width%22%3A%221024%22%2C%22slidesperview%22%3A%222%22%7D%2C%7B%22window_width%22%3A%22599%22%2C%22slidesperview%22%3A%221%22%7D%5D" layout_description_length="90"][/vc_column][/vc_row]';		
		$page_name_7 = __('CAROUSEL SPECIAL', 'youtube_video_gallery');				
		$post_sample_7 = array(
			'post_content'   => $data_sample_7,
			'post_name' 	 => sanitize_title($page_name_7.' - '.rand(0,9999).time()),
			'post_title'     => $page_name_7,
			'post_status'    => 'publish',
			'post_type'      => 'page',			
		);
		$post_id_7 = wp_insert_post($post_sample_7, false);		
		$post_url.='<a href="'.get_permalink($post_id_7).'" target="_blank">'.$page_name_7.'</a>';/*demo 1*/
		
		/*demo 8*/
		$data_sample_8 = '[vc_row css=".vc_custom_1487062731142{margin-bottom: 0px !important;}"][vc_column][vc_column_text css=".vc_custom_1487062741820{margin-bottom: 20px !important;}"]
<p style="text-align: center;"><strong>SINGLE VIDEO</strong></p>
[/vc_column_text][/vc_column][/vc_row][vc_row css=".vc_custom_1487062858609{margin-bottom: 40px !important;}"][vc_column width="1/6"][/vc_column][vc_column width="2/3"][ytvg_container layout_tabs="false" grid_style="grid-special-1" layout_img_size="standard" layout_play_mode="inline" main_font_weight="" heading_font_weight="" meta_font_weight="" data="%5B%7B%22urls%22%3A%22https%3A%2F%2Fwww.youtube.com%2Fwatch%3Fv%3Dgw8bdnEc81w%22%7D%5D"][/vc_column][vc_column width="1/6"][/vc_column][/vc_row][vc_row][vc_column][vc_separator css=".vc_custom_1487062867493{margin-bottom: 40px !important;}"][/vc_column][/vc_row][vc_row css=".vc_custom_1487062731142{margin-bottom: 0px !important;}"][vc_column][vc_column_text css=".vc_custom_1487063678476{margin-bottom: 20px !important;}"]
<p style="text-align: center;"><strong>GALLERY INCLUDE HEADER</strong></p>
[/vc_column_text][/vc_column][/vc_row][vc_row css=".vc_custom_1487062858609{margin-bottom: 40px !important;}"][vc_column][ytvg_container layout_tabs="false" layout="carousel" header="true" main_font_weight="" heading_font_weight="" meta_font_weight="" data="%5B%7B%22urls%22%3A%22https%3A%2F%2Fwww.youtube.com%2Fplaylist%3Flist%3DPL2DuvvTZtSy-EfsrC_gJiSgFA0p0VZjhw%22%7D%5D" header_source="https://www.youtube.com/user/AmericasGotTalent" slidesperview="3" slidespercolumn="1" breakpoints="%5B%7B%22window_width%22%3A%221024%22%2C%22slidesperview%22%3A%222%22%7D%2C%7B%22window_width%22%3A%22599%22%2C%22slidesperview%22%3A%221%22%7D%5D" header_channel_name_color="#000000" header_channel_name_hover_color="#dd3333"][/vc_column][/vc_row][vc_row][vc_column][vc_separator css=".vc_custom_1487062867493{margin-bottom: 40px !important;}"][/vc_column][/vc_row][vc_row css=".vc_custom_1487062731142{margin-bottom: 0px !important;}"][vc_column][vc_column_text css=".vc_custom_1487063488806{margin-bottom: 20px !important;}"]
<p style="text-align: center;"><strong>GALLERY WITHOUT HEADER</strong></p>
[/vc_column_text][/vc_column][/vc_row][vc_row css=".vc_custom_1487062858609{margin-bottom: 40px !important;}"][vc_column][ytvg_container layout_tabs="false" layout="carousel" main_font_weight="" heading_font_weight="" meta_font_weight="" data="%5B%7B%22urls%22%3A%22https%3A%2F%2Fwww.youtube.com%2Fplaylist%3Flist%3DPL2DuvvTZtSy-tXyR7pf3_PHeqB7LJ6sdf%22%7D%5D" slidesperview="3" slidespercolumn="1" breakpoints="%5B%7B%22window_width%22%3A%221024%22%2C%22slidesperview%22%3A%222%22%7D%2C%7B%22window_width%22%3A%22599%22%2C%22slidesperview%22%3A%221%22%7D%5D"][/vc_column][/vc_row][vc_row][vc_column][vc_separator css=".vc_custom_1487062867493{margin-bottom: 40px !important;}"][/vc_column][/vc_row][vc_row css=".vc_custom_1487062731142{margin-bottom: 0px !important;}"][vc_column][vc_column_text css=".vc_custom_1487063990556{margin-bottom: 20px !important;}"]
<p style="text-align: center;"><strong>SIMPLE VIDEO GRID</strong></p>
[/vc_column_text][/vc_column][/vc_row][vc_row css=".vc_custom_1487062858609{margin-bottom: 40px !important;}"][vc_column][ytvg_container layout_tabs="false" grid_style="grid-special-1" layout_pagination="loadmore" layout_mobile="1" layout_portrait_tablet="2" layout_landscape_tablet="2" layout_small_desktop="3" layout_play_mode="inline" layout_title_one_line="false" layout_description="false" layout_views_counter="false" layout_likes_counter="false" layout_dislikes_counter="false" layout_date="false" layout_comments_counter="false" main_font_weight="" heading_font_weight="" meta_font_weight="" data="%5B%7B%22urls%22%3A%22https%3A%2F%2Fwww.youtube.com%2Fplaylist%3Flist%3DPL-r1a4Mhgtx-n-R-yYL0BrwyPKCG5CMzx%22%7D%5D" layout_items_per_page="6"][/vc_column][/vc_row][vc_row][vc_column][vc_separator css=".vc_custom_1487062867493{margin-bottom: 40px !important;}"][/vc_column][/vc_row][vc_row css=".vc_custom_1487062731142{margin-bottom: 0px !important;}"][vc_column][vc_column_text css=".vc_custom_1487064369564{margin-bottom: 20px !important;}"]
<p style="text-align: center;"><strong>CUSTOM COLOR</strong></p>
[/vc_column_text][/vc_column][/vc_row][vc_row full_width="stretch_row" css=".vc_custom_1487066864225{margin-bottom: 0px !important;padding-top: 50px !important;padding-bottom: 50px !important;background-color: #000000 !important;}"][vc_column css=".vc_custom_1487065965749{padding-top: 0px !important;}"][ytvg_container layout_mobile="1" layout_portrait_tablet="2" layout_landscape_tablet="2" layout_small_desktop="3" header="true" main_font_weight="" heading_font_weight="" meta_font_weight="" data="%5B%7B%22name%22%3A%222016%20Highlights%22%2C%22urls%22%3A%22https%3A%2F%2Fwww.youtube.com%2Fplaylist%3Flist%3DPLbAFXJC0J5GZvC5TjJv5RxPUKlCvh-Ihr%22%7D%2C%7B%22name%22%3A%22World%20Championships%22%2C%22urls%22%3A%22https%3A%2F%2Fwww.youtube.com%2Fplaylist%3Flist%3DPLbAFXJC0J5GZEDMnL7F-z9XPCPuOBe7dc%22%7D%5D" layout_items_per_page="6" layout_description_length="90" header_source="https://www.youtube.com/user/RiotGamesInc" main_color="#dd9933" content_background_color="#222222" item_background_color="#333333" divider_color="rgba(255,255,255,0.15)" title_color="#ffffff" title_hover_color="rgba(255,255,255,0.71)" text_color="#999999" meta_color="rgba(255,255,255,0.35)" header_meta_color="#ffffff" header_meta_background_color="rgba(0,0,0,0.7)" popup_background="#333333" tab_color="#dd9933" tab_hover_color="#ffffff" popup_meta_color="rgba(255,255,255,0.36)" popup_divider_color="rgba(255,255,255,0.15)" popup_link_color="rgba(255,255,255,0.8)" popup_link_hover_color="#dd9933" popup_text_color="#aaaaaa" background_color="#000000" button_color="#ffffff" button_background_color="#dd9933" button_background_hover_color="rgba(255,255,255,0.3)"][/vc_column][/vc_row]';		
		$page_name_8 = __('Showcase', 'youtube_video_gallery');				
		$post_sample_8 = array(
			'post_content'   => $data_sample_8,
			'post_name' 	 => sanitize_title($page_name_8.' - '.rand(0,9999).time()),
			'post_title'     => $page_name_8,
			'post_status'    => 'publish',
			'post_type'      => 'page',			
		);
		$post_id_8 = wp_insert_post($post_sample_8, false);		
		$post_url.='<a href="'.get_permalink($post_id_8).'" target="_blank">'.$page_name_8.'</a>';/*demo 8*/
		
		/*demo 9*/
		$data_sample_9 = '[vc_row][vc_column][vc_column_text]
<h2 style="font-weight: normal;">HTML5 VIDEO AD</h2>
Video file formats supported in "html5 video ad": mp4, webm, ogv[/vc_column_text][vc_separator css=".vc_custom_1487060602339{margin-bottom: 41px !important;}"][/vc_column][/vc_row][vc_row][vc_column][ytvg_container layout_mobile="1" layout_portrait_tablet="2" layout_landscape_tablet="2" layout_small_desktop="3" header="true" player_video_ads_enabled="true" video_ad_type="vid" main_font_weight="" heading_font_weight="" meta_font_weight="" data="%5B%7B%22name%22%3A%22Best%20of%20Intel%22%2C%22urls%22%3A%22https%3A%2F%2Fwww.youtube.com%2Fplaylist%3Flist%3DPLk2sjg_-F-Mcwx0R8tHJwAJMgUwcCTo-i%22%7D%2C%7B%22name%22%3A%22Intel%20Education%22%2C%22urls%22%3A%22https%3A%2F%2Fwww.youtube.com%2Fplaylist%3Flist%3DPL5D155ED777D6AF50%22%7D%5D" layout_items_per_page="9" header_source="https://www.youtube.com/user/channelintel/videos" time_to_show_ads="0,60,240" layout_description_length="90" video_ad_vid_group="%5B%7B%22mp4%22%3A%22http%3A%2F%2Fbeeteam368.com%2Fyoutube-gallery%2Fwp-content%2Fuploads%2F2017%2F02%2Fapplewatch.mp4%22%2C%22video_ad_vid_on_click%22%3A%22ocl%22%2C%22video_ad_vid_link%22%3A%22http%3A%2F%2Fwww.apple.com%2Fwatch%2F%22%7D%2C%7B%22mp4%22%3A%22http%3A%2F%2Fbeeteam368.com%2Fyoutube-gallery%2Fwp-content%2Fuploads%2F2017%2F02%2Fipadpro.mp4%22%2C%22video_ad_vid_on_click%22%3A%22ocl%22%2C%22video_ad_vid_link%22%3A%22http%3A%2F%2Fwww.apple.com%2Fipad-pro%2F%22%7D%2C%7B%22mp4%22%3A%22http%3A%2F%2Fbeeteam368.com%2Fyoutube-gallery%2Fwp-content%2Fuploads%2F2017%2F02%2Fmacbookpro.mp4%22%2C%22video_ad_vid_on_click%22%3A%22ocl%22%2C%22video_ad_vid_link%22%3A%22http%3A%2F%2Fwww.apple.com%2Fmacbook-pro%2F%22%7D%5D"][/vc_column][/vc_row]';		
		$page_name_9 = __('HTML5 VIDEO AD', 'youtube_video_gallery');				
		$post_sample_9 = array(
			'post_content'   => $data_sample_9,
			'post_name' 	 => sanitize_title($page_name_9.' - '.rand(0,9999).time()),
			'post_title'     => $page_name_9,
			'post_status'    => 'publish',
			'post_type'      => 'page',			
		);
		$post_id_9 = wp_insert_post($post_sample_9, false);		
		$post_url.='<a href="'.get_permalink($post_id_9).'" target="_blank">'.$page_name_9.'</a>';/*demo 9*/
		
		/*demo 10*/
		$data_sample_10 = '[vc_row][vc_column][vc_column_text]
<h2 style="font-weight: normal;">GOOGLE ADSENSE</h2>
[/vc_column_text][vc_separator css=".vc_custom_1487060602339{margin-bottom: 41px !important;}"][/vc_column][/vc_row][vc_row][vc_column][ytvg_container layout_mobile="1" layout_portrait_tablet="2" layout_landscape_tablet="2" layout_small_desktop="3" header="true" popup_ads_enabled="true" player_video_ads_enabled="true" main_font_weight="" heading_font_weight="" meta_font_weight="" data="%5B%7B%22name%22%3A%22Dell%20Case%20Studies%22%2C%22urls%22%3A%22https%3A%2F%2Fwww.youtube.com%2Fplaylist%3Flist%3DPL3861E38610EBF8A5%22%7D%5D" layout_items_per_page="9" header_source="https://www.youtube.com/user/DellVlog" time_to_show_ads="0,60,240" layout_description_length="90" popup_ads_google_ads_client_id="ca-pub-7463726722750849" popup_ads_google_ads_slot_id="165899848" player_video_ads_google_ads_client_id="ca-pub-7463726722750849" player_video_ads_google_ads_slot_id="165899848"][/vc_column][/vc_row]';		
		$page_name_10 = __('GOOGLE ADSENSE', 'youtube_video_gallery');				
		$post_sample_10 = array(
			'post_content'   => $data_sample_10,
			'post_name' 	 => sanitize_title($page_name_10.' - '.rand(0,9999).time()),
			'post_title'     => $page_name_10,
			'post_status'    => 'publish',
			'post_type'      => 'page',			
		);
		$post_id_10 = wp_insert_post($post_sample_10, false);		
		$post_url.='<a href="'.get_permalink($post_id_10).'" target="_blank">'.$page_name_10.'</a>';/*demo 10*/
		
		/*demo 11*/
		$data_sample_11 = '[vc_row][vc_column][vc_column_text]
<h2 style="font-weight: normal;">IMAGE AD</h2>
SUPPORT: PNG, JPG[/vc_column_text][vc_separator css=".vc_custom_1487060602339{margin-bottom: 41px !important;}"][/vc_column][/vc_row][vc_row][vc_column][ytvg_container layout_mobile="1" layout_portrait_tablet="2" layout_landscape_tablet="2" layout_small_desktop="3" header="true" popup_ads_enabled="true" popup_ad_type="img" player_video_ads_enabled="true" video_ad_type="img" main_font_weight="" heading_font_weight="" meta_font_weight="" data="%5B%7B%22name%22%3A%22NVIDIA%22%2C%22urls%22%3A%22https%3A%2F%2Fwww.youtube.com%2Fplaylist%3Flist%3DPLZHnYvH1qtOZ1rWacugJh_h1bYp0pFv2c%22%7D%2C%7B%22name%22%3A%22GeForce%20Garage%22%2C%22urls%22%3A%22https%3A%2F%2Fwww.youtube.com%2Fplaylist%3Flist%3DPLZHnYvH1qtObXgwgjcr_icFTSoMv2noYg%22%7D%5D" layout_items_per_page="9" header_source="https://www.youtube.com/user/nvidia" video_ad_image_group="%5B%7B%22video_ad_image_source%22%3A%22ml%22%2C%22video_ad_image%22%3A%22'.$image_list_upload[0].'%22%2C%22video_ad_on_click%22%3A%22ocl%22%2C%22video_ad_img_link%22%3A%22https%3A%2F%2Fcodecanyon.net%2Fitem%2Fultimate-layouts-responsive-grid-addon-for-visual-composer%2F17454996%22%7D%2C%7B%22video_ad_image_source%22%3A%22ml%22%2C%22video_ad_image%22%3A%22'.$image_list_upload[3].'%22%2C%22video_ad_on_click%22%3A%22ocl%22%2C%22video_ad_img_link%22%3A%22https%3A%2F%2Fcodecanyon.net%2Fitem%2Fmortar-visual-composer-addons-bundle%2F15147987%22%7D%2C%7B%22video_ad_image_source%22%3A%22ml%22%2C%22video_ad_image%22%3A%22'.$image_list_upload[1].'%22%2C%22video_ad_on_click%22%3A%22ocl%22%2C%22video_ad_img_link%22%3A%22https%3A%2F%2Fcodecanyon.net%2Fitem%2Fcontent-blocks-layout-for-visual-composer-displaying-post-custom-post-in-a-news-magazine-style%2F18866249%22%7D%2C%7B%22video_ad_image_source%22%3A%22ml%22%2C%22video_ad_image%22%3A%22'.$image_list_upload[2].'%22%2C%22video_ad_on_click%22%3A%22ocl%22%2C%22video_ad_img_link%22%3A%22https%3A%2F%2Fcodecanyon.net%2Fitem%2Fjps-ajax-post-layout-addon-for-visual-composer%2F12044774%22%7D%5D" time_to_show_ads="0,60,240" layout_description_length="90" popup_ad_image_group="%5B%7B%22popup_ad_image_source%22%3A%22ml%22%2C%22popup_ad_image%22%3A%22'.$image_list_upload[0].'%22%2C%22popup_ad_on_click%22%3A%22ocl%22%2C%22popup_ad_img_link%22%3A%22https%3A%2F%2Fcodecanyon.net%2Fitem%2Fultimate-layouts-responsive-grid-addon-for-visual-composer%2F17454996%22%7D%2C%7B%22popup_ad_image_source%22%3A%22ml%22%2C%22popup_ad_image%22%3A%22'.$image_list_upload[3].'%22%2C%22popup_ad_on_click%22%3A%22ocl%22%2C%22popup_ad_img_link%22%3A%22https%3A%2F%2Fcodecanyon.net%2Fitem%2Fmortar-visual-composer-addons-bundle%2F15147987%22%7D%2C%7B%22popup_ad_image_source%22%3A%22ml%22%2C%22popup_ad_image%22%3A%22'.$image_list_upload[1].'%22%2C%22popup_ad_on_click%22%3A%22ocl%22%2C%22popup_ad_img_link%22%3A%22https%3A%2F%2Fcodecanyon.net%2Fitem%2Fcontent-blocks-layout-for-visual-composer-displaying-post-custom-post-in-a-news-magazine-style%2F18866249%22%7D%2C%7B%22popup_ad_image_source%22%3A%22ml%22%2C%22popup_ad_image%22%3A%22'.$image_list_upload[2].'%22%2C%22popup_ad_on_click%22%3A%22ocl%22%2C%22popup_ad_img_link%22%3A%22https%3A%2F%2Fcodecanyon.net%2Fitem%2Fjps-ajax-post-layout-addon-for-visual-composer%2F12044774%22%7D%5D"][/vc_column][/vc_row]';		
		$page_name_11 = __('IMAGE AD', 'youtube_video_gallery');				
		$post_sample_11 = array(
			'post_content'   => $data_sample_11,
			'post_name' 	 => sanitize_title($page_name_11.' - '.rand(0,9999).time()),
			'post_title'     => $page_name_11,
			'post_status'    => 'publish',
			'post_type'      => 'page',			
		);
		$post_id_11 = wp_insert_post($post_sample_11, false);		
		$post_url.='<a href="'.get_permalink($post_id_11).'" target="_blank">'.$page_name_11.'</a>';/*demo 11*/
		
		/*demo 12*/
		$data_sample_12 = '[vc_row][vc_column][vc_column_text]
<h2 style="font-weight: normal;">PLAY MODE: POPUP</h2>
[/vc_column_text][vc_separator css=".vc_custom_1487060602339{margin-bottom: 41px !important;}"][/vc_column][/vc_row][vc_row][vc_column][ytvg_container layout_mobile="1" layout_portrait_tablet="2" layout_landscape_tablet="2" layout_small_desktop="3" header="true" main_font_weight="" heading_font_weight="" meta_font_weight="" data="%5B%7B%22name%22%3A%22The%20Best%20of%20Sony%20Mobile%22%2C%22urls%22%3A%22https%3A%2F%2Fwww.youtube.com%2Fplaylist%3Flist%3DPL7CrlqRu8QgSd89qInEch2_P6kR-tiUzk%22%7D%2C%7B%22name%22%3A%22Get%20more%20from%20your%20Xperia%22%2C%22urls%22%3A%22https%3A%2F%2Fwww.youtube.com%2Fplaylist%3Flist%3DPL7CrlqRu8QgRwagMM5adVJC_nqdjZ_H6z%22%7D%5D" layout_items_per_page="9" header_source="https://www.youtube.com/user/SonyXperia/" layout_description_length="90"][/vc_column][/vc_row]';		
		$page_name_12 = __('PLAY MODE: POPUP', 'youtube_video_gallery');				
		$post_sample_12 = array(
			'post_content'   => $data_sample_12,
			'post_name' 	 => sanitize_title($page_name_12.' - '.rand(0,9999).time()),
			'post_title'     => $page_name_12,
			'post_status'    => 'publish',
			'post_type'      => 'page',			
		);
		$post_id_12 = wp_insert_post($post_sample_12, false);		
		$post_url.='<a href="'.get_permalink($post_id_12).'" target="_blank">'.$page_name_12.'</a>';/*demo 12*/
		
		/*demo 13*/
		$data_sample_13 = '[vc_row][vc_column][vc_column_text]
<h2 style="font-weight: normal;">PLAY MODE: INLINE</h2>
[/vc_column_text][vc_separator css=".vc_custom_1487060602339{margin-bottom: 41px !important;}"][/vc_column][/vc_row][vc_row][vc_column][ytvg_container layout="list" list_style="list-classic-2" layout_pagination="loadmore" layout_play_mode="inline" header="true" player_video_ads_enabled="true" video_ad_type="img" main_font_weight="" heading_font_weight="" meta_font_weight="" data="%5B%7B%22name%22%3A%22Videos%22%2C%22urls%22%3A%22https%3A%2F%2Fwww.youtube.com%2Fuser%2FTheLateLateShow%2Fvideos%22%7D%5D" layout_items_per_page="6" header_source="https://www.youtube.com/channel/UCJ0uqCI0Vqr2Rrt1HseGirg" video_ad_image_group="%5B%7B%22video_ad_image_source%22%3A%22ml%22%2C%22video_ad_image%22%3A%22'.$image_list_upload[0].'%22%2C%22video_ad_on_click%22%3A%22ocl%22%2C%22video_ad_img_link%22%3A%22https%3A%2F%2Fcodecanyon.net%2Fitem%2Fultimate-layouts-responsive-grid-addon-for-visual-composer%2F17454996%22%7D%2C%7B%22video_ad_image_source%22%3A%22ml%22%2C%22video_ad_image%22%3A%22'.$image_list_upload[3].'%22%2C%22video_ad_on_click%22%3A%22ocl%22%2C%22video_ad_img_link%22%3A%22https%3A%2F%2Fcodecanyon.net%2Fitem%2Fmortar-visual-composer-addons-bundle%2F15147987%22%7D%2C%7B%22video_ad_image_source%22%3A%22ml%22%2C%22video_ad_image%22%3A%22'.$image_list_upload[1].'%22%2C%22video_ad_on_click%22%3A%22ocl%22%2C%22video_ad_img_link%22%3A%22https%3A%2F%2Fcodecanyon.net%2Fitem%2Fcontent-blocks-layout-for-visual-composer-displaying-post-custom-post-in-a-news-magazine-style%2F18866249%22%7D%2C%7B%22video_ad_image_source%22%3A%22ml%22%2C%22video_ad_image%22%3A%22'.$image_list_upload[2].'%22%2C%22video_ad_on_click%22%3A%22ocl%22%2C%22video_ad_img_link%22%3A%22https%3A%2F%2Fcodecanyon.net%2Fitem%2Fjps-ajax-post-layout-addon-for-visual-composer%2F12044774%22%7D%5D" time_to_show_ads="0,60,240" layout_description_length="180"][/vc_column][/vc_row]';		
		$page_name_13 = __('PLAY MODE: INLINE', 'youtube_video_gallery');				
		$post_sample_13 = array(
			'post_content'   => $data_sample_13,
			'post_name' 	 => sanitize_title($page_name_13.' - '.rand(0,9999).time()),
			'post_title'     => $page_name_13,
			'post_status'    => 'publish',
			'post_type'      => 'page',			
		);
		$post_id_13 = wp_insert_post($post_sample_13, false);		
		$post_url.='<a href="'.get_permalink($post_id_13).'" target="_blank">'.$page_name_13.'</a>';/*demo 13*/
		
		/*demo 14*/
		$data_sample_14 = '[vc_row][vc_column][vc_column_text]<h2 style="font-weight: normal;">PLAY MODE: YOUTUBE</h2>[/vc_column_text][vc_separator css=".vc_custom_1487060602339{margin-bottom: 41px !important;}"][/vc_column][/vc_row][vc_row][vc_column][ytvg_container grid_style="grid-special-1" layout_pagination="loadmore" layout_mobile="1" layout_portrait_tablet="2" layout_landscape_tablet="2" layout_small_desktop="3" layout_play_mode="youtube" header="true" player_video_ads_enabled="true" video_ad_type="img" main_font_weight="" heading_font_weight="" meta_font_weight="" data="%5B%7B%22name%22%3A%22Team%20Singapore%20Spotlight%22%2C%22urls%22%3A%22https%3A%2F%2Fwww.youtube.com%2Fplaylist%3Flist%3DPLqAmVfhsW7xMg31puQvdTcUOei5hg0CIh%22%7D%2C%7B%22name%22%3A%22ActiveSG%22%2C%22urls%22%3A%22https%3A%2F%2Fwww.youtube.com%2Fplaylist%3Flist%3DPLqAmVfhsW7xOUbqfwwwegHp4fPlX3PFjX%22%7D%5D" layout_items_per_page="9" header_source="https://www.youtube.com/user/SingaporeSports" video_ad_image_group="%5B%7B%22video_ad_image_source%22%3A%22ml%22%2C%22video_ad_image%22%3A%22'.$image_list_upload[0].'%22%2C%22video_ad_on_click%22%3A%22ocl%22%2C%22video_ad_img_link%22%3A%22https%3A%2F%2Fcodecanyon.net%2Fitem%2Fultimate-layouts-responsive-grid-addon-for-visual-composer%2F17454996%22%7D%2C%7B%22video_ad_image_source%22%3A%22ml%22%2C%22video_ad_image%22%3A%22'.$image_list_upload[3].'%22%2C%22video_ad_on_click%22%3A%22ocl%22%2C%22video_ad_img_link%22%3A%22https%3A%2F%2Fcodecanyon.net%2Fitem%2Fmortar-visual-composer-addons-bundle%2F15147987%22%7D%2C%7B%22video_ad_image_source%22%3A%22ml%22%2C%22video_ad_image%22%3A%22'.$image_list_upload[1].'%22%2C%22video_ad_on_click%22%3A%22ocl%22%2C%22video_ad_img_link%22%3A%22https%3A%2F%2Fcodecanyon.net%2Fitem%2Fcontent-blocks-layout-for-visual-composer-displaying-post-custom-post-in-a-news-magazine-style%2F18866249%22%7D%2C%7B%22video_ad_image_source%22%3A%22ml%22%2C%22video_ad_image%22%3A%22'.$image_list_upload[2].'%22%2C%22video_ad_on_click%22%3A%22ocl%22%2C%22video_ad_img_link%22%3A%22https%3A%2F%2Fcodecanyon.net%2Fitem%2Fjps-ajax-post-layout-addon-for-visual-composer%2F12044774%22%7D%5D" time_to_show_ads="0,60,240" layout_description_length="90"][/vc_column][/vc_row]';		
		$page_name_14 = __('PLAY MODE: YOUTUBE', 'youtube_video_gallery');				
		$post_sample_14 = array(
			'post_content'   => $data_sample_14,
			'post_name' 	 => sanitize_title($page_name_14.' - '.rand(0,9999).time()),
			'post_title'     => $page_name_14,
			'post_status'    => 'publish',
			'post_type'      => 'page',			
		);
		$post_id_14 = wp_insert_post($post_sample_14, false);		
		$post_url.='<a href="'.get_permalink($post_id_14).'" target="_blank">'.$page_name_14.'</a>';/*demo 14*/
		
		/*demo 15*/
		$data_sample_15 = '[vc_row][vc_column][vc_column_text]
<h2 style="font-weight: normal;">INFINITE SCROLL</h2>
[/vc_column_text][vc_separator css=".vc_custom_1487060602339{margin-bottom: 41px !important;}"][/vc_column][/vc_row][vc_row][vc_column][ytvg_container layout_mobile="1" layout_portrait_tablet="2" layout_landscape_tablet="2" layout_small_desktop="3" layout_medium_desktop="4" layout_img_size="medium" header="true" player_video_ads_enabled="true" video_ad_type="img" main_font_weight="" heading_font_weight="" meta_font_weight="" data="%5B%7B%22name%22%3A%22Gareth%20Bale%22%2C%22urls%22%3A%22https%3A%2F%2Fwww.youtube.com%2Fplaylist%3Flist%3DPLaI5lCKwq3IddvkbVUj4Ma-PsnRY8ILHr%22%7D%2C%7B%22name%22%3A%22Sergio%20Ramos%22%2C%22urls%22%3A%22https%3A%2F%2Fwww.youtube.com%2Fplaylist%3Flist%3DPLaI5lCKwq3IcjMspWSu4djRtrrCSC61Ht%22%7D%5D" layout_items_per_page="12" header_source="https://www.youtube.com/user/realmadridcf" video_ad_image_group="%5B%7B%22video_ad_image_source%22%3A%22ml%22%2C%22video_ad_image%22%3A%22'.$image_list_upload[0].'%22%2C%22video_ad_on_click%22%3A%22ocl%22%2C%22video_ad_img_link%22%3A%22https%3A%2F%2Fcodecanyon.net%2Fitem%2Fultimate-layouts-responsive-grid-addon-for-visual-composer%2F17454996%22%7D%2C%7B%22video_ad_image_source%22%3A%22ml%22%2C%22video_ad_image%22%3A%22'.$image_list_upload[3].'%22%2C%22video_ad_on_click%22%3A%22ocl%22%2C%22video_ad_img_link%22%3A%22https%3A%2F%2Fcodecanyon.net%2Fitem%2Fmortar-visual-composer-addons-bundle%2F15147987%22%7D%2C%7B%22video_ad_image_source%22%3A%22ml%22%2C%22video_ad_image%22%3A%22'.$image_list_upload[1].'%22%2C%22video_ad_on_click%22%3A%22ocl%22%2C%22video_ad_img_link%22%3A%22https%3A%2F%2Fcodecanyon.net%2Fitem%2Fcontent-blocks-layout-for-visual-composer-displaying-post-custom-post-in-a-news-magazine-style%2F18866249%22%7D%2C%7B%22video_ad_image_source%22%3A%22ml%22%2C%22video_ad_image%22%3A%22'.$image_list_upload[2].'%22%2C%22video_ad_on_click%22%3A%22ocl%22%2C%22video_ad_img_link%22%3A%22https%3A%2F%2Fcodecanyon.net%2Fitem%2Fjps-ajax-post-layout-addon-for-visual-composer%2F12044774%22%7D%5D" time_to_show_ads="0,60,240" layout_description_length="90" header_channel_name_color="#000000" header_channel_name_hover_color="#dd3333"][/vc_column][/vc_row]';		
		$page_name_15 = __('INFINITE SCROLL', 'youtube_video_gallery');				
		$post_sample_15 = array(
			'post_content'   => $data_sample_15,
			'post_name' 	 => sanitize_title($page_name_15.' - '.rand(0,9999).time()),
			'post_title'     => $page_name_15,
			'post_status'    => 'publish',
			'post_type'      => 'page',			
		);
		$post_id_15 = wp_insert_post($post_sample_15, false);		
		$post_url.='<a href="'.get_permalink($post_id_15).'" target="_blank">'.$page_name_15.'</a>';/*demo 1*/
		
		/*demo 16*/
		$data_sample_16 = '[vc_row][vc_column][vc_column_text]
<h2 style="font-weight: normal;">LOAD MORE BUTTON</h2>
[/vc_column_text][vc_separator css=".vc_custom_1487060602339{margin-bottom: 41px !important;}"][/vc_column][/vc_row][vc_row][vc_column][ytvg_container layout_pagination="loadmore" layout_mobile="1" layout_portrait_tablet="2" layout_landscape_tablet="2" layout_small_desktop="3" layout_medium_desktop="4" layout_img_size="medium" header="true" player_video_ads_enabled="true" video_ad_type="img" main_font_weight="" heading_font_weight="" meta_font_weight="" data="%5B%7B%22name%22%3A%22Behind%20the%20scenes%22%2C%22urls%22%3A%22https%3A%2F%2Fwww.youtube.com%2Fplaylist%3Flist%3DPLkksCTsYZQhHg21EW-T-Sh_YE7aZpvP3E%22%7D%2C%7B%22name%22%3A%22%5B2016-17%5D%20Champions%20League%22%2C%22urls%22%3A%22https%3A%2F%2Fwww.youtube.com%2Fplaylist%3Flist%3DPLkksCTsYZQhEFIF1kTY_RJL46KhD-JhAX%22%7D%5D" layout_items_per_page="8" header_source="https://www.youtube.com/user/fcbarcelona" video_ad_image_group="%5B%7B%22video_ad_image_source%22%3A%22ml%22%2C%22video_ad_image%22%3A%22'.$image_list_upload[0].'%22%2C%22video_ad_on_click%22%3A%22ocl%22%2C%22video_ad_img_link%22%3A%22https%3A%2F%2Fcodecanyon.net%2Fitem%2Fultimate-layouts-responsive-grid-addon-for-visual-composer%2F17454996%22%7D%2C%7B%22video_ad_image_source%22%3A%22ml%22%2C%22video_ad_image%22%3A%22'.$image_list_upload[3].'%22%2C%22video_ad_on_click%22%3A%22ocl%22%2C%22video_ad_img_link%22%3A%22https%3A%2F%2Fcodecanyon.net%2Fitem%2Fmortar-visual-composer-addons-bundle%2F15147987%22%7D%2C%7B%22video_ad_image_source%22%3A%22ml%22%2C%22video_ad_image%22%3A%22'.$image_list_upload[1].'%22%2C%22video_ad_on_click%22%3A%22ocl%22%2C%22video_ad_img_link%22%3A%22https%3A%2F%2Fcodecanyon.net%2Fitem%2Fcontent-blocks-layout-for-visual-composer-displaying-post-custom-post-in-a-news-magazine-style%2F18866249%22%7D%2C%7B%22video_ad_image_source%22%3A%22ml%22%2C%22video_ad_image%22%3A%22'.$image_list_upload[2].'%22%2C%22video_ad_on_click%22%3A%22ocl%22%2C%22video_ad_img_link%22%3A%22https%3A%2F%2Fcodecanyon.net%2Fitem%2Fjps-ajax-post-layout-addon-for-visual-composer%2F12044774%22%7D%5D" time_to_show_ads="0,60,240" layout_description_length="90"][/vc_column][/vc_row]';		
		$page_name_16 = __('LOAD MORE BUTTON', 'youtube_video_gallery');				
		$post_sample_16 = array(
			'post_content'   => $data_sample_16,
			'post_name' 	 => sanitize_title($page_name_16.' - '.rand(0,9999).time()),
			'post_title'     => $page_name_16,
			'post_status'    => 'publish',
			'post_type'      => 'page',			
		);
		$post_id_16 = wp_insert_post($post_sample_16, false);		
		$post_url.='<a href="'.get_permalink($post_id_16).'" target="_blank">'.$page_name_16.'</a>';/*demo 16*/
		
		/*demo 17*/
		$data_sample_17 = '[vc_row][vc_column][vc_column_text]
<h2 style="font-weight: normal;">PREV/NEXT BUTTON</h2>
[/vc_column_text][vc_separator css=".vc_custom_1487060602339{margin-bottom: 41px !important;}"][/vc_column][/vc_row][vc_row][vc_column][ytvg_container layout_pagination="prev-next" layout_mobile="1" layout_portrait_tablet="2" layout_landscape_tablet="2" layout_small_desktop="3" layout_medium_desktop="4" layout_img_size="medium" header="true" player_video_ads_enabled="true" video_ad_type="img" main_font_weight="" heading_font_weight="" meta_font_weight="" data="%5B%7B%22name%22%3A%22Feiertag%22%2C%22urls%22%3A%22https%3A%2F%2Fwww.youtube.com%2Fplaylist%3Flist%3DPLKtPkvpDHmtKLdGPq8YvpywrChJT8yV5G%22%7D%2C%7B%22name%22%3A%22Trainingslager%20in%20Marbella%202017%22%2C%22urls%22%3A%22https%3A%2F%2Fwww.youtube.com%2Fplaylist%3Flist%3DPLKtPkvpDHmtK97RluPXOf44122gtWxQis%22%7D%5D" layout_items_per_page="8" header_source="https://www.youtube.com/user/bvb" video_ad_image_group="%5B%7B%22video_ad_image_source%22%3A%22ml%22%2C%22video_ad_image%22%3A%22'.$image_list_upload[0].'%22%2C%22video_ad_on_click%22%3A%22ocl%22%2C%22video_ad_img_link%22%3A%22https%3A%2F%2Fcodecanyon.net%2Fitem%2Fultimate-layouts-responsive-grid-addon-for-visual-composer%2F17454996%22%7D%2C%7B%22video_ad_image_source%22%3A%22ml%22%2C%22video_ad_image%22%3A%22'.$image_list_upload[3].'%22%2C%22video_ad_on_click%22%3A%22ocl%22%2C%22video_ad_img_link%22%3A%22https%3A%2F%2Fcodecanyon.net%2Fitem%2Fmortar-visual-composer-addons-bundle%2F15147987%22%7D%2C%7B%22video_ad_image_source%22%3A%22ml%22%2C%22video_ad_image%22%3A%22'.$image_list_upload[1].'%22%2C%22video_ad_on_click%22%3A%22ocl%22%2C%22video_ad_img_link%22%3A%22https%3A%2F%2Fcodecanyon.net%2Fitem%2Fcontent-blocks-layout-for-visual-composer-displaying-post-custom-post-in-a-news-magazine-style%2F18866249%22%7D%2C%7B%22video_ad_image_source%22%3A%22ml%22%2C%22video_ad_image%22%3A%22'.$image_list_upload[2].'%22%2C%22video_ad_on_click%22%3A%22ocl%22%2C%22video_ad_img_link%22%3A%22https%3A%2F%2Fcodecanyon.net%2Fitem%2Fjps-ajax-post-layout-addon-for-visual-composer%2F12044774%22%7D%5D" time_to_show_ads="0,60,240" layout_description_length="90" header_channel_name_color="#000000" header_channel_name_hover_color="#ffffff"][/vc_column][/vc_row]';		
		$page_name_17 = __('PREV/NEXT BUTTON', 'youtube_video_gallery');				
		$post_sample_17 = array(
			'post_content'   => $data_sample_17,
			'post_name' 	 => sanitize_title($page_name_17.' - '.rand(0,9999).time()),
			'post_title'     => $page_name_17,
			'post_status'    => 'publish',
			'post_type'      => 'page',			
		);
		$post_id_17 = wp_insert_post($post_sample_17, false);		
		$post_url.='<a href="'.get_permalink($post_id_17).'" target="_blank">'.$page_name_17.'</a>';/*demo 17*/
		
		/*demo 18*/
		$data_sample_18 = '[vc_row css=".vc_custom_1487062731142{margin-bottom: 0px !important;}"][vc_column][vc_column_text css=".vc_custom_1487066607173{margin-bottom: 20px !important;}"]
<h2 style="font-weight: normal;">CUSTOM FONT &amp; COLOR</h2>
[/vc_column_text][/vc_column][/vc_row][vc_row full_width="stretch_row" css=".vc_custom_1487066881681{margin-bottom: 0px !important;padding-top: 50px !important;padding-bottom: 50px !important;background-color: #000000 !important;}"][vc_column css=".vc_custom_1487065965749{padding-top: 0px !important;}"][ytvg_container layout_mobile="1" layout_portrait_tablet="2" layout_landscape_tablet="2" layout_small_desktop="3" header="true" main_font_weight="" heading_font_weight="normal" meta_font_weight="" data="%5B%7B%22name%22%3A%222016%20Highlights%22%2C%22urls%22%3A%22https%3A%2F%2Fwww.youtube.com%2Fplaylist%3Flist%3DPLbAFXJC0J5GZvC5TjJv5RxPUKlCvh-Ihr%22%7D%2C%7B%22name%22%3A%22World%20Championships%22%2C%22urls%22%3A%22https%3A%2F%2Fwww.youtube.com%2Fplaylist%3Flist%3DPLbAFXJC0J5GZEDMnL7F-z9XPCPuOBe7dc%22%7D%5D" layout_items_per_page="6" layout_description_length="90" header_source="https://www.youtube.com/user/RiotGamesInc" main_color="#dd9933" content_background_color="#222222" item_background_color="#333333" divider_color="rgba(255,255,255,0.15)" title_color="#ffffff" title_hover_color="rgba(255,255,255,0.71)" text_color="#999999" meta_color="rgba(255,255,255,0.35)" header_meta_color="#ffffff" header_meta_background_color="rgba(0,0,0,0.7)" popup_background="#333333" tab_color="#dd9933" tab_hover_color="#ffffff" popup_meta_color="rgba(255,255,255,0.36)" popup_divider_color="rgba(255,255,255,0.15)" popup_link_color="rgba(255,255,255,0.8)" popup_link_hover_color="#dd9933" popup_text_color="#aaaaaa" background_color="#000000" button_color="#ffffff" button_background_color="#dd9933" button_background_hover_color="rgba(255,255,255,0.3)" heading_font="Cookie" main_font="Arapey" main_font_size="16px" heading_font_size="21px" meta_font="Slabo 27px" heading_font_letter_spacing="0.1em" meta_font_size="13px" meta_font_letter_spacing="0.1em"][/vc_column][/vc_row]';		
		$page_name_18 = __('CUSTOM FONT &amp; COLOR', 'youtube_video_gallery');				
		$post_sample_18 = array(
			'post_content'   => $data_sample_18,
			'post_name' 	 => sanitize_title($page_name_18.' - '.rand(0,9999).time()),
			'post_title'     => $page_name_18,
			'post_status'    => 'publish',
			'post_type'      => 'page',			
		);
		$post_id_18 = wp_insert_post($post_sample_18, false);		
		$post_url.='<a href="'.get_permalink($post_id_18).'" target="_blank">'.$page_name_18.'</a>';/*demo 18*/
		
		/*demo 19*/
		$data_sample_19 = '[vc_row][vc_column][ytvg_container layout_pagination="loadmore" layout_mobile="1" layout_portrait_tablet="2" layout_landscape_tablet="2" layout_small_desktop="3" header="true" player_video_ads_enabled="true" video_ad_type="img" main_font_weight="" heading_font_weight="" meta_font_weight="" data="%5B%7B%22name%22%3A%22Videos%22%2C%22urls%22%3A%22https%3A%2F%2Fwww.youtube.com%2Fuser%2FBattlefield%22%7D%2C%7B%22name%22%3A%22Battlefield%201%22%2C%22urls%22%3A%22https%3A%2F%2Fwww.youtube.com%2Fplaylist%3Flist%3DPLLpjKzWIuEfnbUB3CbQoYM-eNFHVXABP0%22%7D%2C%7B%22name%22%3A%22Battlefield%204%22%2C%22urls%22%3A%22https%3A%2F%2Fwww.youtube.com%2Fplaylist%3Flist%3DPLLpjKzWIuEfmHcyTF7Qxuh1gIZoF3pxWS%22%7D%2C%7B%22name%22%3A%22Battlefield%20Hardline%22%2C%22urls%22%3A%22https%3A%2F%2Fwww.youtube.com%2Fplaylist%3Flist%3DPLLpjKzWIuEfksv2GPA3tv1EW4En4QXluO%22%7D%5D" layout_items_per_page="18" header_source="https://www.youtube.com/user/Battlefield " video_ad_image_group="%5B%7B%22video_ad_image_source%22%3A%22ml%22%2C%22video_ad_image%22%3A%22'.$image_list_upload[0].'%22%2C%22video_ad_on_click%22%3A%22ocl%22%2C%22video_ad_img_link%22%3A%22https%3A%2F%2Fcodecanyon.net%2Fitem%2Fultimate-layouts-responsive-grid-addon-for-visual-composer%2F17454996%22%7D%2C%7B%22video_ad_image_source%22%3A%22ml%22%2C%22video_ad_image%22%3A%22'.$image_list_upload[3].'%22%2C%22video_ad_on_click%22%3A%22ocl%22%2C%22video_ad_img_link%22%3A%22https%3A%2F%2Fcodecanyon.net%2Fitem%2Fmortar-visual-composer-addons-bundle%2F15147987%22%7D%2C%7B%22video_ad_image_source%22%3A%22ml%22%2C%22video_ad_image%22%3A%22'.$image_list_upload[1].'%22%2C%22video_ad_on_click%22%3A%22ocl%22%2C%22video_ad_img_link%22%3A%22https%3A%2F%2Fcodecanyon.net%2Fitem%2Fcontent-blocks-layout-for-visual-composer-displaying-post-custom-post-in-a-news-magazine-style%2F18866249%22%7D%2C%7B%22video_ad_image_source%22%3A%22ml%22%2C%22video_ad_image%22%3A%22'.$image_list_upload[2].'%22%2C%22video_ad_on_click%22%3A%22ocl%22%2C%22video_ad_img_link%22%3A%22https%3A%2F%2Fcodecanyon.net%2Fitem%2Fjps-ajax-post-layout-addon-for-visual-composer%2F12044774%22%7D%5D" time_to_show_ads="0,60,240" layout_description_length="90"][/vc_column][/vc_row]';		
		$page_name_19 = __('Main Demo', 'youtube_video_gallery');				
		$post_sample_19 = array(
			'post_content'   => $data_sample_19,
			'post_name' 	 => sanitize_title($page_name_19.' - '.rand(0,9999).time()),
			'post_title'     => $page_name_19,
			'post_status'    => 'publish',
			'post_type'      => 'page',
		);
		$post_id_19 = wp_insert_post($post_sample_19, false);		
		$post_url.='<a href="'.get_permalink($post_id_19).'" target="_blank">'.$page_name_19.'</a>';/*demo 19*/
				
		echo $post_url;
		die;
	}
	
	function ytg_bete_setSampleData(){
		if(is_admin() && isset($_POST['addsample']) && $_POST['addsample']=='yes'){
			add_action('wp_ajax_youtube_gallery_setupsampledata', 'ytg_bete_sample_data');
			add_action('wp_ajax_nopriv_youtube_gallery_setupsampledata', 'ytg_bete_sample_data');	
		}
	}
		
	add_action('admin_init', 'ytg_bete_setSampleData');
}