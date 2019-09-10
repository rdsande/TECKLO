<?php

    /* Template Name: System pages (register, cart, etc) */

?>
<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width" />
<?php wp_head(); ?>
<style>
    .system_wrap_type .main-side.full_width{padding: 30px 35px 20px 35px; background: #fff;}
    .rh-container{max-width:900px}
    input[type="text"], textarea, input[type="tel"], input[type="password"], input[type="email"], input[type="url"], input[type="number"]{box-shadow: inset 0 1px 3px #ddd;font-size: 18px;padding: 12px;line-height: 22px;}
    <?php if (rehub_option('rehub_header_color_background') !='') :?>
        body{background: none <?php echo rehub_option('rehub_header_color_background'); ?> !important}
    <?php else:?>
        body{background: none white !important}
        .system_wrap_type .main-side.full_width{box-shadow: 0 0 50px #e3e3e3;}
    <?php endif; ?>    
</style>
<?php if(rehub_option('rehub_custom_css')) : ?><style><?php echo rehub_option('rehub_custom_css'); ?></style><?php endif; ?>
<?php if(rehub_option('rehub_analytics_header')) : ?><?php echo rehub_option('rehub_analytics_header'); ?><?php endif; ?>
</head>
<body <?php body_class('whitebg'); ?> id="page-<?php the_ID(); ?>">
<div class="system_wrap_type">
    <div class="mt30 mb20 clearfix"></div>
    <?php if(rehub_option('rehub_logo')) : ?>
        <div class="logo text-center mt30 mb35">
            <a href="<?php echo esc_url(home_url()); ?>" class="logo_image"><img src="<?php echo rehub_option('rehub_logo'); ?>" alt="<?php bloginfo( 'name' ); ?>" height="<?php echo rehub_option( 'rehub_logo_retina_height' ); ?>" width="<?php echo rehub_option( 'rehub_logo_retina_width' ); ?>" /></a>      
        </div>
    <?php elseif (rehub_option('rehub_text_logo')) : ?>
        <div class="textlogo text-center fontbold rehub-main-color font175"><?php echo rehub_option('rehub_text_logo'); ?></div> 
    <?php else : ?>
        <div class="textlogo text-center fontbold rehub-main-color font175"><?php bloginfo( 'name' ); ?></div>   
    <?php endif; ?>    
    <div class="rh-container clearfix mt30 mb30"> 
        <div class="main-side clearfix full_width">
            <article class="post">
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    <?php the_content(); ?>
                <?php endwhile; endif; ?>                 
            </article>
        </div>
    </div>
</div>
<?php if(rehub_option('rehub_analytics')) : ?><?php echo rehub_option('rehub_analytics'); ?><?php endif; ?>
<?php wp_footer(); ?>
</body>
</html> 