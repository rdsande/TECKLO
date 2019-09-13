<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly ?>
<?php

return array(

	////////////////////////////////////////
	// Localized JS Message Configuration //
	////////////////////////////////////////

	/**
	 * Validation Messages
	 */
	'validation' => array(
		'alphabet'     => __('Value needs to be Alphabet', 'rehub-framework'),
		'alphanumeric' => __('Value needs to be Alphanumeric', 'rehub-framework'),
		'numeric'      => __('Value needs to be Numeric', 'rehub-framework'),
		'email'        => __('Value needs to be Valid Email', 'rehub-framework'),
		'url'          => __('Value needs to be Valid URL', 'rehub-framework'),
		'maxlength'    => __('Length needs to be less than {0} characters', 'rehub-framework'),
		'minlength'    => __('Length needs to be more than {0} characters', 'rehub-framework'),
		'maxselected'  => __('Select no more than {0} items', 'rehub-framework'),
		'minselected'  => __('Select at least {0} items', 'rehub-framework'),
		'required'     => __('This is required', 'rehub-framework'),
	),

	/**
	 * Import / Export Messages
	 */
	'util' => array(
		'import_success'    => __('Import succeed, option page will be refreshed..', 'rehub-framework'),
		'import_failed'     => __('Import failed', 'rehub-framework'),
		'export_success'    => __('Export succeed, copy the JSON formatted options', 'rehub-framework'),
		'export_failed'     => __('Export failed', 'rehub-framework'),
		'restore_success'   => __('Restoration succeed, option page will be refreshed..', 'rehub-framework'),
		'restore_nochanges' => __('Options identical to default', 'rehub-framework'),
		'restore_failed'    => __('Restoration failed', 'rehub-framework'),
	),

	/**
	 * Control Fields String
	 */
	'control' => array(
		// select2 select box
		'select2_placeholder' => __('Select option(s)', 'rehub-framework'),
		// fontawesome chooser
		'fac_placeholder'     => __('Select an Icon', 'rehub-framework'),
	),

);

/**
 * EOF
 */