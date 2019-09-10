<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly ?>
<?php global $post;?>
<?php $postid = $post->ID; ?>
<?php 
    $offer_post_url = esc_url(get_post_meta( $postid, 'rehub_offer_product_url', true ));
    $offer_post_url = apply_filters('rehub_create_btn_url', $offer_post_url);
?>
<?php $offer_url = apply_filters('rh_post_offer_url_filter', $offer_post_url ); ?>
<?php if(empty($offer_url)) {$offer_url = get_the_permalink($postid);}?>
<?php $offer_coupon = get_post_meta( $postid, 'rehub_offer_product_coupon', true ); ?>
<?php $offer_coupon_date = get_post_meta( $postid, 'rehub_offer_coupon_date', true ); ?>
<?php $offer_coupon_mask = get_post_meta( $postid, 'rehub_offer_coupon_mask', true ); ?>
<?php $offer_price = get_post_meta( $postid, 'rehub_offer_product_price', true );$offer_price = apply_filters('rehub_create_btn_price', $offer_price);?>
<?php $offer_price_old = get_post_meta( $postid, 'rehub_offer_product_price_old', true );$offer_price_old = apply_filters('rehub_create_btn_price_old', $offer_price_old);?>
<?php $offer_btn_text = get_post_meta( $postid, 'rehub_offer_btn_text', true );?>
<?php $offer_desc_meta = get_post_meta( $postid, 'rehub_offer_product_desc', true );?>
<?php $offer_title_meta = $offer_title = get_post_meta( $postid, 'rehub_offer_name', true );?>
<?php $offer_desc = (!empty($offer_desc_meta)) ? $offer_desc_meta : kama_excerpt('maxchar=200&echo=false');?>
<?php $offer_title = (!empty($offer_title_meta)) ? $offer_title_meta : get_the_title(); ?>
<?php $disclaimer = get_post_meta($post->ID, 'rehub_offer_disclaimer', true);?>
<?php $coupon_style = $expired =''; if(!empty($offer_coupon_date)) : ?>
    <?php
    $timestamp1 = strtotime($offer_coupon_date) + 86399;
    $seconds = $timestamp1 - (int)current_time('timestamp',0);
    $days = floor($seconds / 86400);
    $seconds %= 86400;
    if ($days > 0) {
        $coupon_text = $days.' '.__('days left', 'rehub-theme');
        $coupon_style = '';
        $expired = 'no';
    }
    elseif ($days == 0){
      $coupon_text = __('Last day', 'rehub-theme');
      $coupon_style = '';
      $expired = 'no';
    }
    else {
      $coupon_text = __('Expired', 'rehub-theme');
      $coupon_style = ' expired_coupon';
      $expired = '1';
    }
    ?>
<?php endif;?>
<?php $aff_link = (isset($aff_link)) ? $aff_link : '';?>
<?php 
if ($aff_link == '1') {
    $link = $offer_url;
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
    $dealcats = wp_get_post_terms($postid, 'dealstore', array("fields" => "all")); 
    if( ! empty( $dealcats ) && ! is_wp_error( $dealcats ) ) {
        $dealcat = $dealcats[0];                   
    }                               
}
?>
<?php do_action('post_change_expired', $expired); //Here we update our expired?>
<?php $coupon_mask_enabled = (!empty($offer_coupon) && ($offer_coupon_mask =='1' || $offer_coupon_mask =='on') && $expired!='1') ? '1' : ''; ?>
<?php $reveal_enabled = ($coupon_mask_enabled =='1') ? ' reveal_enabled' : '';?>
<?php $outsidelinkpart = ($coupon_mask_enabled=='1') ? ' data-codeid="'.$postid.'" data-dest="'.$offer_url.'" data-clipboard-text="'.$offer_coupon.'" class="masked_coupon"' : '';?>
<?php 
if (!empty($offer_coupon)) {
    $deal_type = ' coupontype';
    $deal_type_string = __('Coupon', 'rehub-theme');
}
elseif (!empty($offer_price_old)){
    $deal_type = ' saledealtype';
    $deal_type_string = __('Sale', 'rehub-theme');
}
else {
    $deal_type = ' defdealtype';
    $deal_type_string = __('Deal', 'rehub-theme');
}
?>
<div class="rh_offer_list <?php echo ''.$reveal_enabled.$coupon_style.$deal_type; ?><?php echo rh_expired_or_not($postid, 'class');?><?php echo ''.($disclaimer) ? ' pt0 pb0 pl0 pr0 w_disclaimer' : '';?>"> 
    <?php echo re_badge_create('ribbonleft'); ?>         
    <div class="rh_grid_image_3_col">
        <div class="rh_gr_img_first offer_thumb"> 
            <div class="deal_img_wrap"> 
            <div class="favorrightside wishonimage"><?php echo RH_get_wishlist($postid);?></div>      
            <a href="<?php echo ''.$link;?>" <?php echo ''.$target;?> <?php echo ''.$outsidelinkpart; ?>>
            <?php if (!has_post_thumbnail() && !empty($offer_price_old) && !empty($offer_price)) :?>
                <?php           
                    $offer_pricesale = (float)rehub_price_clean($offer_price); //Clean price from currence symbols
                    $offer_priceold = (float)rehub_price_clean($offer_price_old); //Clean price from currence symbols
                    if ($offer_priceold !='0' && is_numeric($offer_priceold) && $offer_priceold > $offer_pricesale) {
                        $off_proc = 0 -(100 - ($offer_pricesale / $offer_priceold) * 100);
                        $off_proc = round($off_proc);
                        echo '<span class="sale_tag_inwoolist"><h5>'.$off_proc.'%</h5></span>';
                    }
                ?>
            <?php else :?>              
                <?php WPSM_image_resizer::show_static_resized_image(array('lazy'=> false, 'thumb'=> true, 'crop'=> false, 'height'=> 92));?>
            <?php endif;?>
            </a>
            <div class="<?php echo esc_attr($deal_type);?>_deal_string text-center deal_string"><?php echo esc_attr($deal_type_string);?></div>
            </div>

        </div>
        <div class="rh_gr_top_middle"> 
            <div class="woo_list_desc">
                <div class="woolist_meta mb10">
                    <span class="date_ago mr5">
                        <i class="far fa-clock"></i> <?php printf( __( '%s ago', 'rehub-theme' ), human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) ) ); ?>
                    </span> 
                    <?php if(!empty($offer_coupon_date)) {echo '<span class="listtimeleft mr5 rh-nowrap"> <i class="far fa-hourglass"></i> '.$coupon_text.'</span>';} ?>                         
                </div>                        
                <h3 class="font110 mb10 mt0 moblineheight20 <?php echo getHotIconclass($postid, true); ?>"><a href="<?php echo ''.$link;?>" <?php echo ''.$target;?> <?php echo ''.$outsidelinkpart; ?>><?php echo rh_expired_or_not($postid, 'span');?><?php echo ''.$offer_title ;?></a></h3>
                <?php rehub_generate_offerbtn('showme=price&wrapperclass=pricefont110 rehub-main-color mobpricefont90 fontbold mb5 mr10 lineheight20 floatleft');?>
                <?php 
                    if($offer_price_old && $offer_price){
                        $offer_pricesale = (float)rehub_price_clean($offer_price); 
                        $offer_priceold = (float)rehub_price_clean($offer_price_old);
                        if ($offer_priceold !='0' && is_numeric($offer_priceold) && $offer_priceold > $offer_pricesale) {
                            $off_proc = 0 -(100 - ($offer_pricesale / $offer_priceold) * 100);
                            $off_proc = round($off_proc);
                            echo '<span class="rh-label-string mr10 mb5 floatleft rehub-sec-color-bg">'.$off_proc.'%</span>';
                        }
                    }

                ?> 
                <?php $custom_notice = get_post_meta($postid, '_notice_custom', true);?>
                <?php 
                    if($custom_notice){
                        echo '<div class="rh_custom_notice mr10 mb5 lineheight20 floatleft fontbold font90 rehub-sec-color">'.esc_html($custom_notice).'</div>' ;
                    }
                    elseif (!empty($dealcat)) {
                        $dealcat_notice = get_term_meta($dealcat->term_id, 'cashback_notice', true );
                        if($dealcat_notice){
                            echo '<div class="rh_custom_notice mr10 mb5 lineheight20 floatleft fontbold font90 rehub-sec-color">'.esc_html($dealcat_notice).'</div>' ;
                        }
                    } 
                ?>                 
                <div class="clearfix"></div>                                                                                         
            </div>               
        </div>
        <div class="rh_gr_middle_desc font80 lineheight15">
            <?php echo (wp_kses_post($offer_desc)); ?>
        </div>  
        <div class="rh_gr_btn_block">
            <?php rehub_generate_offerbtn('btn_more=yes&showme=button&wrapperclass=mobile_block_btnclock mb0');?>
        </div>        
    </div>
    <?php if($disclaimer):?>
        <div class="rev_disclaimer lightgreybg font60 greycolor lineheight15 pt5 pb5 pl15 pr15"><?php echo wp_kses($disclaimer, 'post');?></div>
    <?php endif;?>    
</div>