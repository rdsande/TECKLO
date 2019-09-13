<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly ?>
<?php global $post;?>
<?php
$columns = (isset($columns)) ? $columns : '';
$aff_link = (isset($aff_link)) ? $aff_link : '';
if(!isset($disable_btn)){
    $disable_btn = (rehub_option('rehub_enable_btn_recash') == 1) ? 0 : 1;
}
$gridtype = (isset($gridtype)) ? $gridtype : '';
if(rehub_option('disable_btn_offer_loop')){
    $disable_btn = 1;
}
$disable_act = (isset($disable_act)) ? $disable_act : '';
$price_meta = (isset($price_meta)) ? $price_meta : '1';
?>
<?php 
if ($aff_link == '1') {
    $link = rehub_create_affiliate_link ();
    $target = ' rel="nofollow" target="_blank"';
}
else {
    $link = get_the_permalink();
    $target = '';  
}
?>
<?php
$dealcat = '';       
if(rehub_option('enable_brand_taxonomy') == 1){ 
    $dealcats = wp_get_post_terms($post->ID, 'dealstore', array("fields" => "all")); 
    if( ! empty( $dealcats ) && ! is_wp_error( $dealcats ) ) {
        $dealcat = $dealcats[0];                   
    }                               
}
?>
<article class="col_item offer_grid offer_grid_com mobile_compact_grid<?php if ($gridtype == 'compact') :?> coupon_grid rehub-sec-smooth<?php endif;?><?php if ($disable_btn == 1) :?> no_btn_enabled<?php endif;?><?php if ($disable_act != 1 && $gridtype != 'compact') :?> offer_act_enabled<?php endif;?><?php echo rh_expired_or_not($post->ID, 'class');?>"> 
    <div class="info_in_dealgrid">
        <?php echo re_badge_create('ribbonleft'); ?>        
        <figure class="mb15">
            <?php 
                $offer_price_old = get_post_meta($post->ID, 'rehub_offer_product_price_old', true );
                $offer_price_old = apply_filters('rehub_create_btn_price_old', $offer_price_old);
                if(!empty($offer_price_old)){
                    $offer_price = get_post_meta($post->ID, 'rehub_offer_product_price', true );
                    $offer_price = apply_filters('rehub_create_btn_price', $offer_price);                    
                    if ( !empty($offer_price)) {
                        $offer_pricesale = (float)rehub_price_clean($offer_price); //Clean price from currence symbols
                        $offer_priceold = (float)rehub_price_clean($offer_price_old); //Clean price from currence symbols
                        if ($offer_priceold !='0' && is_numeric($offer_priceold) && $offer_priceold > $offer_pricesale) {
                            $off_proc = 0 -(100 - ($offer_pricesale / $offer_priceold) * 100);
                            $off_proc = round($off_proc);
                            echo '<span class="grid_onsale">'.$off_proc.'%</span>';
                        }
                    }
                }

            ?>         
            <a class="img-centered-flex rh-flex-center-align rh-flex-justify-center" href="<?php echo ''.$link;?>"<?php echo ''.$target;?>>
                <?php 
                $showimg = new WPSM_image_resizer();
                $showimg->use_thumb = true;   
                $showimg->no_thumb = get_template_directory_uri() . '/images/default/noimage_250_180.png';                                 
                ?>
                <?php if(isset($custom_col)) : ?>
                    <?php $showimg->width = (int)$custom_img_width;?>
                    <?php $showimg->height = (int)$custom_img_height;?>                                 
                <?php else : ?>
                    
                    <?php if ($gridtype == 'compact') :?> 
                        <?php $showimg->height = '60';?>
                        <?php $showimg->crop = true;?> 
                    <?php else:?>
                        <?php $showimg->width = '230';?>
                        <?php $showimg->height = '150';?>
                        <?php $showimg->crop = false;?> 
                    <?php endif;?>   
                                                      
                <?php endif ; ?>           
                <?php $showimg->show_resized_image(); ?>
            </a>           
        </figure>
        <?php do_action( 'rehub_after_compact_grid_figure' ); ?>
        <div class="grid_desc_and_btn">
            <div class="grid_row_info flowhidden">
                <?php if ($price_meta != '4' && $gridtype != 'compact'):?>
                    <div class="flowhidden mb5">
                        <div class="price_for_grid floatleft">
                            <?php rehub_generate_offerbtn('showme=price&wrapperclass=mb0');?>
                        </div>
                        <div class="floatright vendor_for_grid">
                            <?php if ($price_meta == '1'):?>
                                <?php $author_id=$post->post_author;?>
                                <a class="admin" href="<?php echo get_author_posts_url( $author_id ) ?>" title="<?php the_author_meta( 'display_name', $author_id ); ?>">
                                <?php echo get_avatar( $author_id, '22' ); ?>
                                </a>
                            <?php elseif ($price_meta == '2'):?>
                                <div class="brand_logo_small">       
                                    <?php WPSM_Postfilters::re_show_brand_tax('logo'); //show brand logo?>
                                </div>                    
                            <?php endif;?>
                        </div>
                    </div>
                <?php endif;?>

                <?php do_action( 'rehub_after_compact_grid_price' ); ?>        
                <h3 class="<?php if(rehub_option('hotmeter_disable') !='1') :?><?php echo getHotIconclass($post->ID); ?><?php endif ;?>"><?php echo rh_expired_or_not($post->ID, 'span');?><a href="<?php echo ''.$link;?>"<?php echo ''.$target;?>><?php the_title(); ?></a></h3> 
                <?php $custom_notice = get_post_meta($post->ID, '_notice_custom', true);?>
                <div class="rh_notice_wrap mb10 lineheight20 fontbold font90 rehub-sec-color">
                    <?php 
                        if($custom_notice){
                            echo '<div class="rh_custom_notice overflow-elipse">'.esc_html($custom_notice).'</div>' ; 
                        }
                        elseif (!empty($dealcat)) {
                            $dealcat_notice = get_term_meta($dealcat->term_id, 'cashback_notice', true );
                            if($dealcat_notice){
                                echo '<div class="rh_custom_notice overflow-elipse">'.esc_html($dealcat_notice).'</div>' ;
                            }
                        } 
                    ?>  
                </div>               
                <?php do_action( 'rehub_after_compact_grid_title' ); ?>
            </div>  
        </div>                                       
    </div>
    <?php if ($disable_btn != 1 || $gridtype == 'compact') :?>
        <div class="mt10 text-center clearbox"><?php rehub_generate_offerbtn('showme=button');?></div>
    <?php endif;?>     
    <?php if ($gridtype == 'compact') :?>       
        <?php       
            if( ! empty($dealcat) && !is_tax('dealstore')) {
                echo '<div class="cpn_store_link clearbox font80 text-center lineheight15"><a href="' . esc_url( get_term_link( $dealcat->term_id ) ) . '">' . esc_attr( sprintf( __( 'See All %s offers', 'rehub-theme' ), $dealcat->name ) ) . '</a></div>';                                    
            }
        ?>
    <?php else:?>
    <div class="meta_for_grid">
        <div class="cat_store_for_grid floatleft">
            <div class="cat_for_grid lineheight15">
                <?php if ('post' == get_post_type($post->ID) && rehub_option('exclude_cat_meta') != 1) :?>
                    <?php $category = get_the_category($post->ID);  ?>
                    <?php if ($category) {$first_cat = $category[0]->term_id; meta_small( false, $first_cat, false, false );} ?>            
                <?php endif; ?>             
            </div>
            <?php do_action( 'rehub_after_compact_grid_cat' ); ?> 
            <div class="store_for_grid">
                <?php WPSM_Postfilters::re_show_brand_tax('list');?>
            </div>            
        </div>
        <?php if(rehub_option('exclude_date_meta') != 1):?>
            <div class="date_for_grid floatright">
                <span class="date_ago">
                    <i class="far fa-clock"></i><?php printf( __( '%s ago', 'rehub-theme' ), human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) ) ); ?>
                </span>        
            </div>
        <?php endif;?>   
    </div>
    <?php endif;?>
    <?php do_action( 'rehub_after_compact_grid_meta' ); ?>
    <?php if ($disable_act != 1 && $gridtype != 'compact') :?>  
    <div class="re_actions_for_grid two_col_btn_for_grid">
        <div class="btn_act_for_grid">
            <?php echo getHotThumb($post->ID, false);?>
        </div>        
        <div class="btn_act_for_grid">
            <span class="comm_number_for_grid"><?php echo get_comments_number(); ?></span>
        </div>       
    </div> 
    <?php do_action( 'rehub_after_compact_grid_actions' ); ?>
    <?php endif;?>      
</article>