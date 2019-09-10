<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly ?>
<?php 
global $post; global $product;
?>  
<?php if (empty( $product ) ) {return;}?>
<?php $classes = array('product', 'col_item', 'column_grid', 'type-product','rh-hover-up', 'rh-cartbox', 'woo_column_grid', 'rh-shadow4', 'flowvisible');?>
<?php $attrelpanel = (isset($attrelpanel)) ? $attrelpanel : '';?>
<?php $woolinktype = (isset($woolinktype)) ? $woolinktype : '';?>
<?php $woo_aff_btn = rehub_option('woo_aff_btn');?>
<?php $affiliatetype = ($product->get_type() =='external') ? true : false;?>
<?php $soldout = (isset($soldout)) ? $soldout : '';?>
<?php $custom_img_width = (isset($custom_img_width)) ? $custom_img_width : '';?>
<?php $custom_img_height = (isset($custom_img_height)) ? $custom_img_height : '';?>
<?php $custom_col = (isset($custom_col)) ? $custom_col : '';?>
<?php if($affiliatetype && ($woolinktype == 'aff' || $woo_aff_btn)) :?>
    <?php $woolink = $product->add_to_cart_url(); $wootarget = ' target="_blank" rel="nofollow"';?>
<?php else:?>
    <?php $woolink = get_post_permalink($post->ID); $wootarget = '';?>
<?php endif;?>
<?php $sales_html = ''; if ( $product->is_on_sale()) : ?>
    <?php 
    $percentage=0;
    if ($product->get_regular_price() && $product->get_regular_price() !=0) {
        $percentage = round( ( ( $product->get_regular_price() - $product->get_price() ) / $product->get_regular_price() ) * 100 );
    }
    if ($percentage && $percentage>0 && !$product->is_type( 'variable' )) {
        $sales_html = '<div class="font80 text-right-align"><span><i class="far fa-arrow-down"></i> ' . $percentage . '%</span></div>';
        $classes[] = 'prodonsale';
    }
    ?>
<?php endif; ?>
<div class="<?php echo implode(' ', $classes); ?>">   
    <div class="position-relative woofigure pt15 pb15 pl15 pr15">
    <?php  $badge = get_post_meta($post->ID, 'is_editor_choice', true); ?>
    <?php if ($badge !='' && $badge !='0') :?> 
        <?php echo re_badge_create('ribbonleft'); ?>
    <?php endif; ?>  
    <figure class="text-center eq_figure mb0">      
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
        <?php do_action( 'rh_woo_thumbnail_loop' ); ?>        
    </figure>
    </div>
    <?php do_action( 'rehub_after_grid_column_figure' ); ?>
    <div class="pb10 pr20 pl20">
        <div class="colored_rate_bar floatleft">
        <?php $reviewscore = wpsm_reviewbox(array('compact'=>'smallcircle', 'id'=> $product->get_id()));?><?php echo ''.$reviewscore;?>
        </div>         
        <h3 class="mb15 mt0 font105 fontnormal lineheight20 <?php echo getHotIconclass($post->ID, true); ?>">
            <?php if ( $product->is_featured() ) : ?>
                <i class="fas fa-bolt mr5 ml5 orangecolor" aria-hidden="true"></i>
            <?php endif; ?>
            <a href="<?php echo esc_url($woolink);?>"<?php echo ''.$wootarget;?>><?php the_title();?></a>
        </h3>  
        <div class="clearbox"></div>      
        <?php do_action( 'rehub_vendor_show_action' ); ?> 
        <?php if($soldout):?>
            <div class="soldoutbar mb10">
            <?php $randomp = rand(10,100);?>
            <div class="wpsm-bar minibar wpsm-clearfix mb5" data-percent="<?php echo (float)$randomp;?>%">
                <div class="wpsm-bar-bar" style="background: #FF9800"></div>
            </div>
            <div class="soldoutpercent greycolor font70 lineheight15"><?php esc_html_e( 'Already Sold:', 'rehub-theme' );?> <?php echo (float)$randomp;?>%</div>
            </div>
        <?php endif; ?>         
        <?php rh_wooattr_code_loop($attrelpanel);?>
    </div>
    <div class="border-top pt10 pr10 pl10 pb10 rh-flex-center-align abposbot">
        <div class="button_action position-static">
            <div class="floatleft mr5 rtlfloatleft">
                <?php $wishlistadded = esc_html__('Added to wishlist', 'rehub-theme');?>
                <?php $wishlistremoved = esc_html__('Removed from wishlist', 'rehub-theme');?>
                <?php echo RH_get_wishlist($post->ID, '', $wishlistadded, $wishlistremoved);?>  
            </div>
            <?php if(rehub_option('compare_page') || rehub_option('compare_multicats_textarea')) :?>
                <span class="compare_for_grid floatleft rtlfloatleft">            
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
        <div class="rh-flex-right-align rehub-main-font pr5 pricefont100 greencolor fontbold mb0 lineheight20">
            <?php wc_get_template( 'loop/price.php' ); ?>
            <?php echo ''.$sales_html; ?>            
        </div>        
    </div>  
    <?php do_action( 'woocommerce_after_shop_loop_item' );?>                                      
</div>