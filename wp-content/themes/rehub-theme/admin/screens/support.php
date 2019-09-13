<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly ?>
<?php
$rehub_theme = wp_get_theme();
if($rehub_theme->parent_theme) {
    $template_dir =  basename(get_template_directory());
    $rehub_theme = wp_get_theme($template_dir);
}
$rehub_version = $rehub_theme->get( 'Version' );
$rehub_options = get_option( 'Rehub_Key' );
$tf_username = isset( $rehub_options[ 'tf_username' ] ) ? $rehub_options[ 'tf_username' ] : '';
$tf_support_date = isset( $rehub_options[ 'tf_support_date' ] ) ? $rehub_options[ 'tf_support_date' ] : '';
$tf_purchase_code = isset( $rehub_options[ 'tf_purchase_code' ] ) ? $rehub_options[ 'tf_purchase_code' ] : '';
if( $tf_username !== "" && $tf_purchase_code !== "" ) {
    $registeredlicense = true;
}
else{
    $registeredlicense = false;
}
$theme_url = 'https://wpsoul.com/';
?>
<div class="wrap about-wrap rehub-wrap">
	<h1><?php echo __( "Welcome to ReHub Theme!", "rehub-theme" ); ?></h1>
    <?php if( $registeredlicense == true ) :?>
    <div class="about-text">
        <?php echo __( "Theme is registered on your site! ", "rehub-theme" ); ?>
        <?php if ($tf_support_date):?>
            <?php echo __( "You have support until: ", "rehub-theme" ); ?><?php $date = date_create($tf_support_date); echo date_format($date, 'Y-m-d');?>
            <a href="http://themeforest.net/item/rehub-directory-shop-coupon-affiliate-theme/7646339" target="_blank"><?php echo __( "(extend support)", "rehub-theme" ); ?></a><br />
        <?php endif;?>
        <?php if ( ! function_exists( 'envato_market' ) ) :?>
            <?php echo __( "If you need automatic theme updates, install Envato Market plugin from ", "rehub-theme" ); ?>
            <a href="<?php echo admin_url( 'admin.php?page=rehub-plugins' );?>"><?php echo __( "Plugins Tab", "rehub-theme" ); ?></a>
        <?php endif;?>  
    </div>
    <?php else :?>
    <div class="about-text"><?php echo __( "ReHub Theme is now installed and ready to use! Please register your purchase to get support, automatic theme updates, demo stacks, bonuses.", "rehub-theme" ); ?></div> 
    <?php endif;?>
    <div class="rehub-logo"><span class="rehub-version"><?php esc_html_e( "Version", "rehub-theme" ); ?> <?php echo esc_html($rehub_version); ?></span></div>
	<h2 class="nav-tab-wrapper">
    	<?php
		printf( '<a href="%s" class="nav-tab">%s</a>', admin_url( 'admin.php?page=rehub' ), __( "Registration", "rehub-theme" ) );
		printf( '<a href="#" class="nav-tab nav-tab-active">%s</a>', __( "Support and tips", "rehub-theme" ) );
		printf( '<a href="%s" class="nav-tab">%s</a>', admin_url( 'admin.php?page=rehub-plugins' ), __( "Plugins", "rehub-theme" ) );
		printf( '<a href="%s" class="nav-tab">%s</a>', admin_url( 'admin.php?page=import_demo' ), __( "Demo import", "rehub-theme" ) );
		?>
	</h2>
    <?php if( !$registeredlicense == true ) :?>
    <div class="rehub-important-notice">
		<p class="about-description"><?php echo __( "To access our support forum, demo stacks, bonuses, you must be official buyer.<br />
        If you don't have official license of theme - ", "rehub-theme" ); ?><a href="http://themeforest.net/item/rehub-directory-shop-coupon-affiliate-theme/7646339" target="_blank"><?php echo __( "buy theme on Themeforest", "rehub-theme" ); ?></a></p>
    </div>
    <?php endif ;?>
	<div class="rehub-registration-steps">
        <div class="feature-section">
            <strong>Some important tutorials to make your site better:</strong>
            <ul>
                <li><a href="https://wpsoul.com/make-smart-profitable-deal-affiliate-comparison-site-woocommerce/" target="_blank">Step by step guide to create affiliate profitable price comparison site on woocommerce</a></li>                  
                <li><a href="https://wpsoul.com/guide-creating-profitable/" target="_blank">Step by step guide for affiliate websites</a></li>             
                <li><a href="https://wpsoul.com/how-optimize-speed-of-wordpress/" target="_blank">How to optimize speed of site</a></li>
                <li><a href="https://wpsoul.com/optimize-seo-wordpress/" target="_blank">How to make the best SEO optimization on site</a></li>
                <li><a href="https://wpsoul.com/directory-review-classified-on-woocommerce/" target="_blank">Creating Directory site with Rehub</a></li>    
                <li><a href="https://wpsoul.com/how-to-create-multi-vendor-shop-on-wordpress/" target="_blank">Creating Multivendor site with Rehub</a></li>                                                             
            </ul>
        </div>
    	<div class="feature-section col three-col">
            <div class="col">
                <h4><span class="dashicons dashicons-format-video"></span><?php echo __( "Video Tutorials", "rehub-theme" ); ?></h4>
                <p><?php echo __( "We have a growing library of video tutorials to help teach you the different aspects of using ReHub Theme.", "rehub-theme" ); ?></p>
                <?php printf( '<a href="%s" class="button button-large button-primary rehub-large-button" target="_blank">%s</a>', 'https://www.youtube.com/channel/UCt3I0SO9yZ8ivyx4qKNCpJQ/videos', __( "Watch Videos", "rehub-theme" ) ); ?>
            </div>
            <div class="col">
				<h4><span class="dashicons dashicons-book"></span><?php echo __( "Documentation", "rehub-theme" ); ?></h4>
				<p><?php echo __( "This is the place where you should start to learn enhanced functions of ReHub Theme.", "rehub-theme" ); ?></p>
                <?php printf( '<a href="%s" class="button button-large button-primary rehub-large-button" target="_blank">%s</a>', 'http://rehubdocs.wpsoul.com/docs/rehub-theme/', __( "Documentation", "rehub-theme" ) ); ?>
            </div>
        	<div class="col last-feature">
				<h4><span class="dashicons dashicons-portfolio"></span><?php echo __( "Advanced tutorials", "rehub-theme" ); ?></h4>
				<p><?php echo __( "Our knowledgebase contains additional content that is not inside of our documentation. This information is more specific and teach advanced technics of ReHub Theme.", "rehub-theme" ); ?></p>
                <?php printf( '<a href="%s" class="button button-large button-primary rehub-large-button" target="_blank">%s</a>', $theme_url, __( "Check tutorials", "rehub-theme" ) ); ?>
            </div>
            <?php if (!defined('ENVATO_HOSTED_SITE')):?>
                <div class="col">
                    <h4><span class="dashicons dashicons-sos"></span><?php echo __( "Submit A Ticket", "rehub-theme" ); ?></h4>
                    <p><?php echo __( "We offer excellent support through Themeforest comment system. Write to us from your account on Themeforest.", "rehub-theme" ); ?></p>
                    <?php printf( '<a href="%s" class="button button-large button-primary rehub-large-button" target="_blank">%s</a>', 'http://themeforest.net/item/rehub-directory-shop-coupon-affiliate-theme/7646339/support/contact/', __( "Submit A Question", "rehub-theme" ) ); ?>
                </div>            
    			<div class="col">
    				<h4><span class="dashicons dashicons-groups"></span><?php echo __( "Write us a letter", "rehub-theme" ); ?></h4>
    				<p><?php echo __( "Want to send private information or access to your site? Use this link to contact us with email", "rehub-theme" ); ?></p>
                    <?php printf( '<a href="%s" class="button button-large button-primary rehub-large-button" target="_blank">%s</a>', 'http://themeforest.net/user/sizam#contact', __( "Write to email", "rehub-theme" ) ); ?>
                </div>            
                <div class="col last-feature">
                	<h4><span class="dashicons dashicons-carrot"></span><?php echo __( "Give us a new Idea", "rehub-theme" ); ?></h4>
    				<p><?php echo __( "Want to give idea for new updates. Use our site", "rehub-theme" ); ?></p>
                    <?php printf( '<a href="%s" class="button button-large button-primary rehub-large-button" target="_blank">%s</a>', 'https://wpsoul.com/questions/', __( "Give an Idea", "rehub-theme" ) ); ?>
                </div> 
            <?php endif ;?>

        </div>
    </div>
</div>
