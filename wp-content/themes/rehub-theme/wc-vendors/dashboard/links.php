<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly ?>
<?php wc_print_notices(); ?>
<?php
if (class_exists('WCVendors_Pro')) {
    $dashboard_page_ids = (array) get_option( 'wcvendors_dashboard_page_id' );
    if(!empty($dashboard_page_ids)){
        $dashboard_page_id  = reset( $dashboard_page_ids );
        $vendor_dasboard = get_permalink($dashboard_page_id);
    }
}
else {
    $vendor_dasboard = get_permalink(get_option('wcvendors_vendor_dashboard_page_id'));
}?>
<p class="wc_vendors_dash_links rh_tab_links">
        <a href="<?php echo ''.$vendor_dasboard;?>" class="active"><?php echo _e( 'Dashboard', 'rehub-theme' ); ?></a>
        <a href="<?php echo ''.$shop_page; ?>"><?php echo _e( 'View Your Store', 'rehub-theme' ); ?></a>
        <a href="<?php echo ''.$settings_page; ?>"><?php _e('Store Settings', 'rehub-theme') ;?></a>

<?php if ( $can_submit ) { ?>
	<?php if (rehub_option('url_for_add_product') !=''):?>
		<?php $submit_link = esc_url(rehub_option('url_for_add_product')); ?>
        <a target="_TOP" href="<?php echo ''.$submit_link; ?>"><?php _e('Add New Product', 'rehub-theme') ;?></a>
	<?php endif;?>
	<?php if (rehub_option('url_for_edit_product') !=''):?>
		<?php $edit_link = esc_url(rehub_option('url_for_edit_product')); ?>
        <a target="_TOP" href="<?php echo ''.$edit_link; ?>"><?php _e('Edit Products', 'rehub-theme') ;?></a>
	<?php endif;?>	
<?php } ?>