<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly ?>

<script data-cfasync="false">

// executes this when the DOM is ready
jQuery(document).ready(function() {
	// handles the click event of the submit button
	jQuery('#submit').click(function(){
		// defines the options and their default values
		// again, this is not the most elegant way to do this
		// but well, this gets the job done nonetheless
		var options = { 
			'top'      	: '20px',
			'bottom'     : '20px',
			'style'     : 'solid',
			};

		var shortcode = '[wpsm_divider';
		
		for( var index in options) {
			var value = jQuery('#form').find('#divider-' + index).val();
			
			if ( value !== '' )
				shortcode += ' ' + index + '="' + value + '"';
			else
				shortcode += ' ' + index + '="' + options[index] + '"'; 	
		}
		shortcode += ']';
		
        window.send_to_editor(shortcode);
		
		// closes Thickbox
		tb_remove();
	});
}); 
</script>
<form action="/" method="get" id="form" name="form" accept-charset="utf-8">
	<p><label><?php _e('Style', 'rehub-theme') ;?></label>
       	<select name="divider-style" id="divider-style" size="1">
			<option value="solid" selected="selected"><?php _e('solid', 'rehub-theme') ;?></option>
			<option value="dotted"><?php _e('dotted', 'rehub-theme') ;?></option>
			<option value="dashed"><?php _e('dashed', 'rehub-theme') ;?></option>
			<option value="double"><?php _e('double', 'rehub-theme') ;?></option>
			<option value="fadeout"><?php _e('fadeout', 'rehub-theme') ;?></option>
			<option value="fadein"><?php _e('fadein', 'rehub-theme') ;?></option>
			<option value="transparent"><?php _e('transparent', 'rehub-theme') ;?></option>
			<option value="clear"><?php _e('clear floats', 'rehub-theme') ;?></option>				
        </select>
    </p> 	
	<p><label><?php _e('Margin top (with px)', 'rehub-theme') ;?></label>
        <input type="text" name="divider-top" value="20px" id="divider-top" />
    </p>
	 
    <p>
        <label><?php _e('Margin bottom (with px)', 'rehub-theme') ;?></label>
        <input type="text" name="divider-bottom" value="20px" id="divider-bottom" />
    </p>    
	 <p>
        <label>&nbsp;</label>
        <input type="button" id="submit" class="button" value="<?php _e('Insert', 'rehub-theme') ;?>" name="submit" />
    </p>
</form>