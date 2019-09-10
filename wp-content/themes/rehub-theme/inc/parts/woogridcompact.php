<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly ?>
<?php global $product; global $post;?>
<?php if (empty( $product ) ) {return;}?>
<?php $classes = array('product', 'col_item', 'offer_grid', 'woo_compact_grid', 'mobile_compact_grid', 'offer_act_enabled', 'no_btn_enabled', 'type-product');?>
<?php $price_meta = rehub_option('price_meta_woogrid');?>
<?php $attrelpanel = (isset($attrelpanel)) ? $attrelpanel : '';?>
<?php $woolinktype = (isset($woolinktype)) ? $woolinktype : '';?>
<?php $woo_aff_btn = rehub_option('woo_aff_btn');?>
<?php $affiliatetype = ($product->get_type() =='external') ? true : false;?>
<?php if($affiliatetype && ($woolinktype == 'aff' || $woo_aff_btn)) :?>
    <?php $woolink = $product->add_to_cart_url(); $wootarget = ' target="_blank" rel="nofollow"';?>
<?php else:?>
    <?php $woolink = get_post_permalink($post->ID); $wootarget = '';?>
<?php endif;?>
<?php $offer_coupon_date = get_post_meta( $post->ID, 'rehub_woo_coupon_date', true ) ?>
<?php $custom_img_width = (isset($custom_img_width)) ? $custom_img_width : '';?>
<?php $custom_img_height = (isset($custom_img_height)) ? $custom_img_height : '';?>
<?php $custom_col = (isset($custom_col)) ? $custom_col : '';?>
<?php $soldout = (isset($soldout)) ? $soldout : '';?>
<?php $coupon_style = $expired = ''; if(!empty($offer_coupon_date)) : ?>
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
        $coupon_style = ' expired';
        $expired = '1';
    }                 
    ?>
<?php endif ;?>
<?php do_action('woo_change_expired', $expired); //Here we update our expired?>
<?php $classes[] = $coupon_style;?>
<?php $classes[] = rh_expired_or_not($post->ID, 'class');?>
<?php $syncitem = '';?>
<?php if (defined('\ContentEgg\PLUGIN_PATH')):?>
    <?php $itemsync = \ContentEgg\application\WooIntegrator::getSyncItem($post->ID);?>
    <?php if(!empty($itemsync)):?>
        <?php                            
            $syncitem = $itemsync;                            
        ?>
    <?php endif;?>
<?php endif;?>
<div class="<?php echo implode(' ', $classes); ?>">
    <?php do_action('woocommerce_before_shop_loop_item');?>
    <div class="info_in_dealgrid flowhidden">
        <?php  $badge = get_post_meta($post->ID, 'is_editor_choice', true); ?>
        <?php if ($badge !='' && $badge !='0') :?> 
            <?php echo re_badge_create('ribbonleft'); ?>
        <?php elseif ( $product->is_featured() ) : ?>
            <?php echo apply_filters( 'woocommerce_featured_flash', '<span class="re-ribbon-badge left-badge badge_2"><span>' . __( 'Featured!', 'rehub-theme' ) . '</span></span>', $post, $product ); ?>
        <?php endif; ?>         
        <figure class="mb15"> 
            <?php if ( $product->is_on_sale()) : ?>
                <?php 
                $percentage=0;
                if ($product->get_regular_price() && $product->get_regular_price() !=0) {
                    $percentage = round( ( ( $product->get_regular_price() - $product->get_price() ) / $product->get_regular_price() ) * 100 );
                }
                if ($percentage && $percentage>0  && !$product->is_type( 'variable' )) {
                    $sales_html = apply_filters( 'woocommerce_sale_flash', '<span class="grid_onsale"><span>- ' . $percentage . '%</span></span>', $post, $product );
                } else {
                    $sales_html = apply_filters( 'woocommerce_sale_flash', '<span class="grid_onsale">' . esc_html__( 'Sale!', 'rehub-theme' ) . '</span>', $post, $product );
                }
                ?>
                <?php echo ''.$sales_html; ?>
            <?php endif; ?> 
        
            <a class="img-centered-flex rh-flex-center-align rh-flex-justify-center" href="<?php echo esc_url($woolink) ;?>"<?php echo ''.$wootarget ;?>>
                <?php if($custom_col) : ?>
                    <?php 
                        $showimg = new WPSM_image_resizer();
                        $showimg->use_thumb = true; 
                        $showimg->no_thumb = rehub_woocommerce_placeholder_img_src('');
                        $showimg->width = (int)$custom_img_width;    
                        $showimg->height = (int)$custom_img_height;
                        $showimg->show_resized_image();                               
                    ?>                                                 
                <?php else : ?>
                    <?php echo WPSM_image_resizer::show_wp_image('woocommerce_thumbnail'); ?>      
                <?php endif ; ?> 
            </a>
        </figure>
        <?php do_action( 'rehub_after_compact_grid_figure' ); ?>
        <div class="grid_desc_and_btn">
            <?php if ($price_meta != '4'):?>
                <div class="grid_row_info">
                    <div class="flowhidden mb5">
                        <div class="price_for_grid floatleft fontbold">
                            <?php wc_get_template( 'loop/price.php' ); ?>
                            <?php if($syncitem):?>
                                <?php $countoffers = rh_ce_found_total_offers($post->ID);?>
                                <?php if ($countoffers > 1) :?>
                                    <a class="font70 greycolor displayblock" href="<?php the_permalink();?>">+ <?php echo (int)$countoffers - 1; ?> <?php _e('more', 'rehub-theme');?></a>
                                <?php endif;?>                             
                            <?php endif ;?>    
                        </div>
                        
                        <div class="floatright vendor_for_grid lineheight15">
                            <?php if($syncitem && $price_meta == '1'):?>
                                <div class="aff_tag"> 
                                    <?php $celogo = \ContentEgg\application\helpers\TemplateHelper::getMerhantLogoUrl($syncitem, true);?>
                                    <?php if($celogo) :?>
                                        <img src="<?php echo ''.$celogo; ?>" alt="<?php echo esc_attr($syncitem['title']); ?>" height="30" />
                                    <?php endif ;?>  
                                </div>                                               
                            <?php elseif($price_meta == '2'):?>
                                <div class="brand_logo_small">       
                                    <?php WPSM_Woohelper::re_show_brand_tax('logo'); //show brand logo?>
                                </div>                                 
                            <?php endif ;?>
                        </div>
                    </div>        
                </div>
            <?php endif;?> 
            <h3 class="<?php if(rehub_option('wishlist_disable') !='1') :?><?php echo getHotIconclass($post->ID, true); ?><?php endif ;?>"><?php echo rh_expired_or_not($post->ID, 'span');?><a href="<?php echo esc_url($woolink) ;?>"<?php echo ''.$wootarget ;?>><?php the_title();?></a></h3> 
            <?php do_action('rehub_vendor_show_action');?>
        <?php if($soldout):?>
            <div class="soldoutbar mb10">
            <?php $randomp = rand(10,100);?>
            <div class="wpsm-bar minibar wpsm-clearfix mb5" data-percent="<?php echo (float)$randomp;?>%">
                <div class="wpsm-bar-bar" style="background: #e33333"></div>
            </div>
            <div class="soldoutpercent greycolor font70 lineheight15"><?php _e( 'Already Sold:', 'rehub-theme' );?> <?php echo (float)$randomp;?>%</div>
            </div>
        <?php endif; ?>             
            <?php wc_get_template( 'loop/rating.php' );?>              
            
        </div>                                       
    </div>
    <?php rh_wooattr_code_loop($attrelpanel);?>
    <?php if ( isset( $gmw['your_lat'] ) && !empty( $gmw['your_lat'] ) ) { ?>
        <span class="radius-dis">(<?php gmw_distance_to_location( $post, $gmw ); ?>)</span>
        <div class="wppl-address">
            <?php echo ''.$post->address; ?>
        </div>        
    <?php } ?>                                     
    <?php if ( isset( $gmw['search_results']['get_directions'] ) ) { ?>
        <!-- Get directions -->
        <div class="get-directions-link">
            <?php gmw_directions_link( $post, $gmw, $gmw['labels']['search_results']['directions'] ); ?>
        </div>
    <?php } ?>    
    <?php if (rehub_option('woo_btn_disable') != '1' && rehub_option('woo_compact_loop_btn')):?>
        <div class="woo_gridloop_btn mb15 text-center">   
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
                    ), $product );?>                                     
            <?php endif;?>
            <?php do_action( 'rh_woo_button_loop' ); ?>            
        </div>
    <?php endif; ?>
  

    <div class="re_actions_for_grid two_col_btn_for_grid">
        <div class="btn_act_for_grid">
            <?php $wishlistadded = __('Added to wishlist', 'rehub-theme');?>
            <?php $wishlistremoved = __('Removed from wishlist', 'rehub-theme');?>
            <?php echo RH_get_wishlist($post->ID, '', $wishlistadded, $wishlistremoved);?>  
        </div>

        <div class="btn_act_for_grid">
            <?php if(rehub_option('compare_page') || rehub_option('compare_multicats_textarea')) :?>
                <span class="compare_for_grid">            
                    <?php 
                        $cmp_btn_args = array(); 
                        $cmp_btn_args['class']= 'comparecompact';
                        if(rehub_option('compare_woo_cats') != '') {
                            $cmp_btn_args['woocats'] = esc_html(rehub_option('compare_woo_cats'));
                        }
                    ?>                                                  
                    <?php echo wpsm_comparison_button($cmp_btn_args); ?> 
                </span>               
            <?php else:?>
                <span class="comm_number_for_grid"><?php echo get_comments_number(); ?></span>
            <?php endif;?>
        </div>      
    </div> 
    <?php do_action( 'woocommerce_after_shop_loop_item' );?>      
</div>