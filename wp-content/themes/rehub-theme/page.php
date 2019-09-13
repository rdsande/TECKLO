<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly ?>
<?php 
    global $post;
    $postID = $post->ID;
    $header_disable = $footer_disable = $content_type = $page_class = $content_class = $enable_preloader = ''; 

    if ( did_action( 'elementor/loaded' ) ) {
        $elementorenabled = get_post_meta($postID, '_elementor_page_settings', true);
        if(!empty($elementorenabled)){
            $page_settings_manager = \Elementor\Core\Settings\Manager::get_settings_managers( 'page' );
            $page_settings_model = $page_settings_manager->get_model( $postID );
            $header_disable = $page_settings_model->get_settings( '_header_disable' );
            $footer_disable = $page_settings_model->get_settings( '_footer_disable' );
            $enable_preloader =  $page_settings_model->get_settings( '_enable_preloader' );
            $content_type = $page_settings_model->get_settings( 'content_type' );            
        }
    } 

    if(!$header_disable) $header_disable = get_post_meta($postID, "_header_disable", true);
    if(!$footer_disable) $footer_disable = get_post_meta($postID, "_footer_disable", true);
    if(!$content_type) $content_type = get_post_meta($postID, "content_type", true);
    if(!$enable_preloader) $enable_preloader =  get_post_meta($postID, "_enable_preloader", true);    

    if ($content_type =='full_width') {
        $page_class = ' full_width';
    }elseif($content_type =='full_post_area'){
        $page_class = ' visual_page_builder full_width';
    }
    $title_disable =  get_post_meta($postID, "_title_disable", true);
    $comment_enable = get_post_meta($postID, "_enable_comments", true); 
    $content_class = ($content_type == 'full_post_area') ? 'rh-fullbrowser' : 'rh-post-wrapper';
?>
<?php if ($header_disable =='1') :?>
    <!DOCTYPE html>
    <!--[if IE 8]>    <html class="ie8" <?php language_attributes(); ?>> <![endif]-->
    <!--[if IE 9]>    <html class="ie9" <?php language_attributes(); ?>> <![endif]-->
    <!--[if (gt IE 9)|!(IE)] <?php language_attributes(); ?>><![endif]-->
    <html <?php language_attributes(); ?>>
    <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width" />
    <!-- feeds & pingback -->
      <link rel="profile" href="http://gmpg.org/xfn/11" />
      <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    <!--[if lt IE 9]><script src="<?php echo get_template_directory_uri(); ?>/js/html5shiv.js"></script><![endif]-->    
    <?php wp_head(); ?>
    <?php if(rehub_option('rehub_custom_css')) : ?><style><?php echo rehub_option('rehub_custom_css'); ?></style><?php endif; ?>
    <?php if(rehub_option('rehub_analytics_header')) : ?><?php echo rehub_option('rehub_analytics_header'); ?><?php endif; ?>
    </head>
    <body <?php body_class(); ?>>
    <div class="rh-outer-wrap">
    <div id="top_ankor"></div>
    <?php $branded_bg_url = rehub_option('rehub_branded_bg_url');?>
    <?php if ($branded_bg_url ) :?>
      <a id="branded_bg" href="<?php echo esc_url($branded_bg_url); ?>" target="_blank" rel="nofollow"></a>
    <?php endif; ?>
    <?php include(rh_locate_template('inc/parts/branded_banner.php')); ?>   
    <!-- HEADER --> 
<?php elseif($header_disable =='2') :?>
    <?php get_header(); ?> 
    <style>
    #main_header{position: absolute;}  
    #main_header, .main-nav{background:none transparent !important;}  
    nav.top_menu > ul > li > a, .user-ava-intop:after, .dl-menuwrapper button i, .dl-menuwrapper .re-compare-icon-toggle, nav.top_menu > ul > li > a{color: #fff !important} 
    .is-sticky .logo_section_wrap{background: #000 !important} 
    </style>   
<?php else :?>
    <?php get_header(); ?>
<?php endif ;?>
<?php if($enable_preloader):?>
    <!-- PRELOADER -->
    <div id="rhLoader">
        <div class="preloader-cell">
            <div class="re_loadingafter padd20 rehub-main-color"></div>
        </div>
    </div>
    <!-- /end PRELOADER --> 
<?php endif;?>

<!-- CONTENT -->
<div class="rh-container <?php echo ''.$content_type ?>"> 
    <div class="rh-content-wrap clearfix">
        <!-- Main Side -->
        <div class="main-side page clearfix<?php echo ''.$page_class ?>" id="content">
            <div class="<?php echo ''.$content_class;?>">
                <?php if(!$title_disable):?>
                    <div class="title"><h1 class="entry-title"><?php the_title(); ?></h1></div>
                <?php endif;?>
                <article class="post mb0" id="page-<?php the_ID(); ?>">       
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    <?php the_content(); ?>
                    <?php if($content_type =='full_post_area'):?>
                        <?php wp_link_pages(array( 'before' => '<div class="page-link"><span class="page-link-title">' . __( 'Pages:', 'rehub-theme' ).'</span>', 'after' => '</div>', 'pagelink' => '<span>%</span>' )); ?>
                    <?php endif;?>
                    <?php if($comment_enable):?>
                        <?php comments_template(); ?>
                    <?php endif;?>
                <?php endwhile; endif; ?>  
                </article> 
            </div>         
        </div>	
        <!-- /Main Side --> 
        <?php if($content_type =='def' || $content_type == ''):?> 
            <!-- Sidebar -->
            <?php get_sidebar(); ?>
            <!-- /Sidebar --> 
        <?php endif;?>
    </div>
</div>
<!-- /CONTENT -->     
<!-- FOOTER -->
<?php if ($footer_disable =='1') :?>
</div>
<?php if(rehub_option('rehub_analytics')) : ?><?php echo rehub_option('rehub_analytics'); ?><?php endif; ?>
<span class="rehub_scroll" id="topcontrol" data-scrollto="#top_ankor"><i class="far fa-chevron-up"></i></span>
<?php wp_footer(); ?>
</body>
</html>
<?php else :?>
<?php get_footer(); ?>
<?php endif ;?>