<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly ?>
<?php global $product; global $post;?>
<?php if (empty( $product ) ) {return;}?>
<?php $attrelpanel = (isset($attrelpanel)) ? $attrelpanel : '';?>
<?php $woolinktype = (isset($woolinktype)) ? $woolinktype : '';?>
<?php $woo_aff_btn = rehub_option('woo_aff_btn');?>
<?php $affiliatetype = ($product->get_type() =='external') ? true : false;?>
<?php if($affiliatetype && ($woolinktype == 'aff' || $woo_aff_btn)) :?>
    <?php $woolink = $product->add_to_cart_url(); $wootarget = ' target="_blank" rel="nofollow"';?>
<?php else:?>
    <?php $woolink = get_post_permalink($post->ID); $wootarget = '';?>
<?php endif;?>
<?php $offer_coupon = get_post_meta( $post->ID, 'rehub_woo_coupon_code', true ) ?>
<?php $offer_coupon_date = get_post_meta( $post->ID, 'rehub_woo_coupon_date', true ) ?>
<?php $offer_coupon_mask = get_post_meta( $post->ID, 'rehub_woo_coupon_mask', true ) ?>
<?php $offer_coupon_url = esc_url( $product->add_to_cart_url() ); ?>
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
<?php endif ;?>
<?php do_action('woo_change_expired', $coupon_style); //Here we update our expired?>
<?php $coupon_mask_enabled = (!empty($offer_coupon) && ($offer_coupon_mask =='1' || $offer_coupon_mask =='on') && $expired!='1') ? '1' : ''; ?>
<?php $reveal_enabled = ($coupon_mask_enabled =='1') ? ' reveal_enabled' : '';?>
<?php $outsidelinkpart = ($coupon_mask_enabled=='1') ? 'data-codeid="'.$product->get_id().'" data-dest="'.$offer_coupon_url.'" data-clipboard-text="'.$offer_coupon.'" class="masked_coupon"' : '';?>
<?php 
if (!empty($offer_coupon)) {
    $deal_type = ' coupontype';
    $deal_type_string = __('Coupon', 'rehub-theme');
}
elseif ($product->is_on_sale()){
    $deal_type = ' saledealtype';
    $deal_type_string = __('Sale', 'rehub-theme');
}
else {
    $deal_type = ' defdealtype';
    $deal_type_string = __('Deal', 'rehub-theme');
}
?>
<?php $syncitem = '';?>
<?php if (defined('\ContentEgg\PLUGIN_PATH')):?>
    <?php $itemsync = \ContentEgg\application\WooIntegrator::getSyncItem($post->ID);?>
    <?php if(!empty($itemsync)):?>
        <?php                            
            $syncitem = $itemsync;                            
        ?>
    <?php endif;?>
<?php endif;?> 
<div class="woocommerce type-product rh_offer_list rh_actions_padd <?php echo ''.$reveal_enabled.$coupon_style.$deal_type; ?>">    
    <?php do_action('woocommerce_before_shop_loop_item');?>
    <div class="button_action">
        <div class="floatleft mr5">
            <?php $wishlistadded = __('Added to wishlist', 'rehub-theme');?>
            <?php $wishlistremoved = __('Removed from wishlist', 'rehub-theme');?>
            <?php echo RH_get_wishlist($post->ID, '', $wishlistadded, $wishlistremoved);?>  
        </div>
        <?php if(rehub_option('compare_page') || rehub_option('compare_multicats_textarea')) :?>
            <span class="compare_for_grid floatleft">            
                <?php 
                    $cmp_btn_args = array(); 
                    $cmp_btn_args['class']= 'comparecompact';
                    if(rehub_option('compare_woo_cats') != '') {
                        $cmp_btn_args['woocats'] = esc_html(rehub_option('compare_woo_cats'));
                    }
                ?>                                                  
                <?php echo wpsm_comparison_button($cmp_btn_args); ?> 
            </span>
        <?php endif;?>                                                            
    </div>         
    <div class="rh_grid_image_3_col">
        <div class="rh_gr_img_first offer_thumb"> 
            <div class="deal_img_wrap">       
            <a class="re_track_btn" href="<?php echo esc_url($woolink) ;?>"<?php echo ''.$wootarget ;?>>
            <?php if (!has_post_thumbnail() && $product->is_on_sale() && $product->get_regular_price() && $product->get_price() > 0 && !$product->is_type( 'variable' )) :?>
                <span class="sale_tag_inwoolist">
                    <h5>
                    <?php   
                        $offer_price_calc = (float) $product->get_price();
                        $offer_price_old_calc = (float) $product->get_regular_price();
                        $sale_proc = 0 -(100 - ($offer_price_calc / $offer_price_old_calc) * 100); 
                        $sale_proc = round($sale_proc); 
                        echo ''.$sale_proc.'%';
                    ;?>
                    </h5>
                </span>
            <?php else :?>             
                <?php WPSM_image_resizer::show_static_resized_image(array('lazy'=> false, 'thumb'=> true, 'crop'=> false, 'height'=> 92, 'no_thumb_url' => rehub_woocommerce_placeholder_img_src('')));?>
            <?php endif;?>
            </a>
            <div class="<?php echo ''.$deal_type;?>_deal_string text-center deal_string"><?php echo ''.$deal_type_string;?></div>
            </div>
            <?php do_action( 'rh_woo_thumbnail_loop' ); ?>
        </div>
        <div class="rh_gr_top_middle">
            <div class="woo_list_desc">  
                <?php do_action('woocommerce_before_shop_loop_item');?> 
                <div class="woolist_meta mb10">
                    <span class="date_ago mr5">
                        <i class="far fa-clock"></i> <?php printf( __( '%s ago', 'rehub-theme' ), human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) ) ); ?>
                    </span> 
                    <?php if(!empty($offer_coupon_date)) {echo '<span class="listtimeleft mr5 rh-nowrap"> <i class="far fa-hourglass"></i> '.$coupon_text.'</span>';} ?>                         
                </div>                          
                <h3 class="font120 mb10 mt0 mobfont110 moblineheight20 <?php echo getHotIconclass($post->ID, true); ?>"><a class="re_track_btn" href="<?php echo esc_url($woolink) ;?>"<?php echo ''.$wootarget ;?>><?php echo rh_expired_or_not($post->ID, 'span');?><?php the_title();?></a></h3>
                <?php rh_wooattr_code_loop($attrelpanel);?> 
                <?php if ($product->get_price() !='') : ?>
                <?php echo '<span class="pricefont110 rehub-main-color mobpricefont90 fontbold mb10 mr10 lineheight20 floatleft"><span class="price">'.$product->get_price_html().'</span></span>';?>
                <?php endif ;?>
                <?php 
                    if($product->is_on_sale() && $product->get_regular_price() && $product->get_price() > 0 && !$product->is_type( 'variable' )){
                        $offer_price_calc = (float) $product->get_price();
                        $offer_price_old_calc = (float) $product->get_regular_price();
                        $sale_proc = 0 -(100 - ($offer_price_calc / $offer_price_old_calc) * 100); 
                        $sale_proc = round($sale_proc);
                        echo '<span class="rh-label-string mr10 mb5 floatleft">'.$sale_proc.'%</span>';
                    }

                ?>                                             
                <div class="clearfix"></div>
                <?php do_action('woocommerce_after_shop_loop_item');?>
            </div>
        </div> 
        <div class="rh_gr_middle_desc font80 lineheight15">
            <?php echo ''.$post->post_excerpt; ?>
            <?php wc_get_template( 'loop/rating.php' );?> 
        </div>                  
        <div class="rh_gr_btn_block">
            <div class="mobile_block_btnclock mb10">
                <?php if(!empty($syncitem)):?>
                    <a href="<?php echo get_post_permalink($post->ID);?>" data-product_id="<?php echo esc_attr( $product->get_id() );?>" data-product_sku="<?php echo esc_attr( $product->get_sku() );?>" class="re_track_btn woo_loop_btn btn_offer_block product_type_cegg">
                        <?php if(rehub_option('rehub_btn_text_aff_links') !='') :?>
                            <?php echo rehub_option('rehub_btn_text_aff_links') ; ?>
                        <?php else :?>
                            <?php _e('Choose offer', 'rehub-theme') ?>
                        <?php endif ;?>
                    </a>
                <?php elseif ( $product->add_to_cart_url() !='') : ?>
                    <?php  echo apply_filters( 'woocommerce_loop_add_to_cart_link',
                        sprintf( '<a href="%s" data-product_id="%s" data-product_sku="%s" class="re_track_btn woo_loop_btn btn_offer_block %s %s product_type_%s"%s %s>%s</a>',
                        esc_url( $product->add_to_cart_url() ),
                        esc_attr( $product->get_id() ),
                        esc_attr( $product->get_sku() ),
                        $product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : '',
                        $product->supports( 'ajax_add_to_cart' ) ? 'ajax_add_to_cart' : '',
                        esc_attr( $product->get_type() ),
                        $product->get_type() =='external' ? ' target="_blank"' : '',
                        $product->get_type() =='external' ? ' rel="nofollow"' : '',
                        esc_html( $product->add_to_cart_text() )
                        ),
                    $product );?> 
                <?php endif; ?>                    
                <?php if ($coupon_mask_enabled =='1') :?>
                    <?php wp_enqueue_script('zeroclipboard'); ?>                
                    <a class="woo_loop_btn coupon_btn re_track_btn btn_offer_block rehub_offer_coupon masked_coupon <?php if(!empty($offer_coupon_date)) {echo ''.$coupon_style ;} ?>" href="<?php echo esc_url($woolink); ?>"<?php if ($product->get_type() =='external'){echo ' target="_blank" rel="nofollow"'; echo ''.$outsidelinkpart; } ?>>
                        <?php if(rehub_option('rehub_mask_text') !='') :?><?php echo rehub_option('rehub_mask_text') ; ?><?php else :?><?php _e('Reveal coupon', 'rehub-theme') ?><?php endif ;?>
                    </a>
                <?php else :?> 
                    <?php if(!empty($offer_coupon)) : ?>
                        <?php wp_enqueue_script('zeroclipboard'); ?>
                        <div class="rehub_offer_coupon not_masked_coupon <?php if(!empty($offer_coupon_date)) {echo ''.$coupon_style ;} ?>" data-clipboard-text="<?php echo ''.$offer_coupon ?>">
                            <i class="fal fa-cut fa-rotate-180"></i>
                            <span class="coupon_text"><?php echo esc_attr($offer_coupon); ?></span>
                        </div>
                    <?php endif ;?>                                               
                <?php endif;?>                 
            </div>
            <span class="woolist_vendor">
                <?php if(!empty($syncitem)):?>
                    <div class="font80 greycolor lineheight15">
                    <?php echo rh_best_syncpost_deal($itemsync, 'mb10 compare-domain-icon', false);?>
                    </div>
                <?php else:?>
                    <?php do_action( 'rehub_vendor_show_action' ); ?>        
                <?php endif;?>                     
            </span>            
            <?php do_action( 'rh_woo_button_loop' ); ?>
        </div>
    </div>
    <?php do_action( 'woocommerce_after_shop_loop_item' );?>
</div>