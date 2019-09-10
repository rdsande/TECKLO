<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly ?>
<!DOCTYPE html>
<!--[if IE 8]>    <html class="ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 9]>    <html class="ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if (gt IE 9)|!(IE)] <?php language_attributes(); ?>><![endif]-->
<html <?php language_attributes(); ?>>
<head>
<meta charset="utf-8" />
<meta name=viewport content="width=device-width, initial-scale=1.0" />
<!-- feeds & pingback -->
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<!--[if lt IE 9]><script src="<?php echo get_template_directory_uri(); ?>/js/html5shiv.js"></script><![endif]-->
<?php wp_head(); ?>
<?php if(rehub_option('rehub_custom_css')) : ?><style><?php echo rehub_option('rehub_custom_css'); ?></style><?php endif; ?>
<?php if(rehub_option('rehub_analytics_header')) : ?><?php echo rehub_option('rehub_analytics_header'); ?><?php endif; ?>
</head>
<body <?php body_class(); ?>>
<?php 
?>
<?php 
    if (rehub_option('header_topline_style') == '0') {
        $header_topline_style = ' white_style';
    }
    elseif (rehub_option('header_topline_style') == '1') {
        $header_topline_style = ' dark_style';
    }
    else {
        $header_topline_style = ' white_style';
    }    
?>
<?php 
    if (rehub_option('header_logoline_style') == '0') {
        $header_logoline_style = 'white_style';
    }
    elseif (rehub_option('header_logoline_style') == '1') {
        $header_logoline_style = 'dark_style';
    }
    else {
        $header_logoline_style = 'white_style';
    }    
?>
<?php 
    if (rehub_option('header_menuline_style') == '0') {
        $header_menuline_style = ' white_style';
    }
    elseif (rehub_option('header_menuline_style') == '1') {
        $header_menuline_style = ' dark_style';
    }
    else {
        $header_menuline_style = ' dark_style';
    }    
?>
<?php $branded_bg_url = rehub_option('rehub_branded_bg_url');?>
<?php if ($branded_bg_url ) :?>
  <a id="branded_bg" href="<?php echo esc_url($branded_bg_url); ?>" target="_blank" rel="nofollow"></a>
<?php endif; ?>
<?php if(rehub_option('rehub_ads_megatop') !='') : ?>
	<div class="megatop_wrap">
		<div class="mediad megatop_mediad">
			<?php echo do_shortcode(rehub_option('rehub_ads_megatop')); ?>
		</div>
	</div>
<?php endif ;?>	               
<!-- Outer Start -->
<div class="rh-outer-wrap">
    <div id="top_ankor"></div>
    <!-- HEADER -->
    <?php if ( ! function_exists( 'elementor_theme_do_location' ) || ! elementor_theme_do_location( 'header' ) ) :?>
        <header id="main_header" class="<?php echo ''.$header_logoline_style; ?>">
            <div class="header_wrap">
                <?php if(rehub_option('rehub_header_top_enable') =='1')  : ?>  
                    <!-- top -->  
                    <div class="header_top_wrap<?php echo ''.$header_topline_style;?>">
                        <div class="rh-container">
                            <div class="header-top clearfix rh-flex-center-align">    
                                <?php wp_nav_menu( array( 'container_class' => 'top-nav', 'container' => 'div', 'theme_location' => 'top-menu', 'fallback_cb' => 'add_top_menu_for_blank', 'depth' => '2', 'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>'  ) ); ?>
                                <div class="rh-flex-right-align top-social"> 
                                    <?php if(rehub_option('rehub_top_line_content')) : ?>
                                        <div class="top_custom_content mt10 mb10 font80 lineheight15 flowhidden"><?php echo do_shortcode(rehub_option('rehub_top_line_content'));?></div>
                                    <?php endif; ?>                                    
                                    <?php if(rehub_option('rehub_login_icon') == 'top' && rehub_option('userlogin_enable') == '1') : ?>
                                        <?php $loginurl = (rehub_option('custom_login_url')) ? esc_url(rehub_option('custom_login_url')) : '';?>
                                        <div class="userblockintop"><?php echo wpsm_user_modal_shortcode(array('loginurl'=>$loginurl));?></div>
                                    <?php endif; ?>                    
                                    <?php if (rehub_option('woo_cart_place') =='1') : ?>
                                        <?php global $woocommerce; ?>
                                        <?php if($woocommerce):?>
                                            <a class="cart-contents cart_count_<?php echo (int)$woocommerce->cart->cart_contents_count; ?>" href="<?php echo wc_get_cart_url(); ?>"><i class="far fa-shopping-cart"></i> <?php esc_html_e( 'Cart', 'rehub-theme' ); ?> (<?php echo ''.$woocommerce->cart->cart_contents_count; ?>) - <?php echo ''.$woocommerce->cart->get_cart_total(); ?></a>
                                         <?php endif; ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /top --> 
                <?php endif; ?>
                <?php $header_template = (rehub_option('rehub_header_style') !='') ? rehub_option('rehub_header_style') : 'header_first' ;?>
                <?php include(rh_locate_template('inc/header_layout/'.$header_template.'.php')); ?>

            </div>  
        </header>
    <?php endif;?>
    <?php include(rh_locate_template('inc/parts/branded_banner.php')); ?>
    <?php do_action('rehub_action_after_header'); ?>