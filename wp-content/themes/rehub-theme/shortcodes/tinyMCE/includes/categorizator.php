<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly ?>

<script data-cfasync="false">

// executes this when the DOM is ready
jQuery(document).ready(function() { 
	// handles the click event of the submit button
	jQuery('#submit').click(function(){

		var options = { 
			'exclude' : '',
			'include' : '',
			'col' : '',			
		};	

		var shortcode = '[wpsm_categorizator';	
		for( var index in options) {
			var value = jQuery('#form').find('#button-' + index).val();
			if ( value !== '' )
				shortcode += ' ' + index + '="' + value + '"'; 	
		}	
		shortcode += ']';    
		
		// inserts the shortcode into the active editor
		window.send_to_editor(shortcode);
		
		
		// closes Thickbox
		tb_remove();
	});

}); 
</script>
<form action="/" method="get" id="form" name="form" accept-charset="utf-8">
<div>
	<p><?php _e('By default categories directory shows all categories, but you can exclude or include by Ids', 'rehub-theme') ;?></p>
    <p>
        <label><?php _e('Exclude categories', 'rehub-theme') ;?></label>
        <input type="text" name="button-exclude" value="" id="button-exclude" /><br />
        <small><?php _e('Set ids of categories which you want to exclude (example: 22,34)', 'rehub-theme') ;?></small>
    </p>
	<div class="clear"></div>
    <p>
        <label><?php _e('Include categories', 'rehub-theme') ;?></label>
        <input type="text" name="button-include" value="" id="button-include" /><br />
        <small><?php _e('Set ids of categories which you want to include (example: 22,34)', 'rehub-theme') ;?></small>
    </p>
	<div class="clear"></div>	
    <p>
        <label><?php _e('Columns to show', 'rehub-theme') ;?></label>
        <select name="button-col" id="button-col" size="1">
            <option value="3" selected="selected"><?php _e('3 columns', 'rehub-theme') ;?></option>
            <option value="4"><?php _e('4 columns', 'rehub-theme') ;?></option>
        </select>
    </p>
	<div class="clear"></div>
</div>
	 <p>
        <label>&nbsp;</label>
        <input type="button" name="submit" value="<?php _e('Insert', 'rehub-theme') ;?>" class="button" id="submit">
    </p>	
</form>