<?php
if(!function_exists('youtube_gallery_plugin_settings') && !function_exists('youtube_gallery_register_settings') && !function_exists('youtube_gallery_settings_page')){
	function youtube_gallery_register_settings(){
		register_setting('youtube_gallery_settings_group', 'youtube_video_gallery_rtl_mode');	
		register_setting('youtube_gallery_settings_group', 'youtube_video_gallery_google_api_key');	
		register_setting('youtube_gallery_settings_group', 'youtube_video_gallery_debug');
	}
	function youtube_gallery_settings_page(){
		ob_start();
	?>
		<div class="wrap">
			<h2><strong><?php echo __("YOUTUBE VIDEO GALLERY SETTINGS", 'youtube_video_gallery')?></strong></h2>    
			<form method="post" action="options.php">
				<?php 
				settings_fields('youtube_gallery_settings_group');
				do_settings_sections('youtube_gallery_settings_group');
				$opt_rtl_mode = trim(get_option('youtube_video_gallery_rtl_mode'));
				$opt_goole_api_key = trim(get_option('youtube_video_gallery_google_api_key'));
				$opt_debug = trim(get_option('youtube_video_gallery_debug'));
				?>
				<table class="form-table">
					<tr valign="top">
						<th scope="row"><?php echo __("Enabled RTL", 'youtube_video_gallery')?></th>
						<td>
                        	<select name="youtube_video_gallery_rtl_mode" id="youtube_video_gallery_rtl_mode" style="width:200px;">
                            	<option value="0" <?php if($opt_rtl_mode=='0'){echo 'selected';}?>><?php echo __("NO", 'youtube_video_gallery')?></option>
                                <option value="1" <?php if($opt_rtl_mode=='1'){echo 'selected';}?>><?php echo __("YES", 'youtube_video_gallery')?></option>
                            </select>                        
                        </td>
					</tr>
                    <tr valign="top">
						<th scope="row"><?php echo __("Google API Key", 'youtube_video_gallery')?></th>
						<td><input type="text" name="youtube_video_gallery_google_api_key" id="youtube_video_gallery_google_api_key" value="<?php echo esc_attr($opt_goole_api_key); ?>"  style="width:200px;"></td>
					</tr>
                    <tr valign="top">
						<th scope="row"><?php echo __("Enabled Console Debug", 'youtube_video_gallery')?></th>
						<td>
                        	<select name="youtube_video_gallery_debug" id="youtube_video_gallery_debug" style="width:200px;">
                            	<option value="0" <?php if($opt_debug=='0'){echo 'selected';}?>><?php echo __("NO", 'youtube_video_gallery')?></option>
                                <option value="1" <?php if($opt_debug=='1'){echo 'selected';}?>><?php echo __("YES", 'youtube_video_gallery')?></option>
                            </select>                        
                        </td>
					</tr>
				</table>
				<?php submit_button();?>
			</form>            
            <h2><strong><?php echo __("SAMPLE DATA", 'youtube_video_gallery')?></strong></h2> 
            <input type="button" class="sample-data-youtube-video-gal" data-url-ajax="<?php echo admin_url('admin-ajax.php');?>" value="<?php echo __('Import Sampe Data ( Click Me )', 'youtube_video_gallery');?>">
            <br><br>
            <div id="link-to-newpageconfig">
                <div class="tc-information">
                    <div><strong><?php echo __('Congratulation! Process Input success.', 'youtube_video_gallery')?></strong><br><br></div>
                </div>
                <div class="tb-infor-error"><?php echo __('The process input data is corrupted, please redo!', 'youtube_video_gallery')?></div>
            </div>
            <div id="loading-import-sample-data">
                <div><?php echo __('The process of data entry is underway. Please wait a few minutes and not close the browser...', 'youtube_video_gallery');?></div>
            </div>
    	</div>            
	<?php 
		$output_string = ob_get_contents();
		ob_end_clean();
		echo $output_string;
	};
	function youtube_gallery_plugin_settings(){
		add_options_page(__('Youtube Gallery Settings', 'youtube_video_gallery'), __('Youtube Gallery Settings', 'youtube_video_gallery'), 'manage_options', 'yt-plugin-settings.php', 'youtube_gallery_settings_page');
		add_action('admin_init', 'youtube_gallery_register_settings');
	}
	add_action('admin_menu', 'youtube_gallery_plugin_settings');
}