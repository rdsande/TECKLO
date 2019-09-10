<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly ?>
<?php global $post;?>
<?php
$dealcat = '';       
if(rehub_option('enable_brand_taxonomy') == 1){ 
    $dealcats = wp_get_post_terms($post->ID, 'dealstore', array("fields" => "all")); 
    if( ! empty( $dealcats ) && ! is_wp_error( $dealcats ) ) {
        $dealcat = $dealcats[0];                   
    }                               
}
?>
<?php
$type = (isset($type)) ? $type : '';
?>
<?php if($type == '2'):?>
	<div class="magazinenews clearfix">
		<?php echo re_badge_create('ribbonleft'); ?>	 
		<div class="flowhidden">		
		    <div class="magazinenews-img floatleft pr20">
		        <figure>       
			        <a href="<?php the_permalink();?>">
						<?php WPSM_image_resizer::show_static_resized_image(array('thumb'=> true, 'crop'=> true, 'width'=> 220, 'height'=> 145, 'no_thumb_url' => get_template_directory_uri() . '/images/default/noimage_336_220.png'));?>
			        </a>
		        </figure>
		    </div>
		    <div class="magazinenews-desc floatleft">
			    <h3 class="font130 mt0 mb10 fontnormal teklink mobfont110 lineheight20"><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
			    <div class="meta post-meta">
			        <?php 
			        	$category = get_the_category($post->ID);
			        	if(!empty($category)){
			        		$first_cat = $category[0]->term_id;
			        	}
			        	else{
			        		$first_cat = false;
			        	} 
			        	meta_small(true, $first_cat, 'compactnoempty', false ); 
			        ?>
			    </div>	
		    	<p class="mobfont80 font90 lineheight20 mb15 greycolor hideonmobile">
		    		<?php kama_excerpt('maxchar=250'); ?>
		    	</p>			    	 		    
		    </div>		            
	    </div>      
	</div>
<?php else:?>
	<div class="news-community clearfix<?php echo rh_expired_or_not($post->ID, 'class');?>">
		<?php echo re_badge_create('ribbonleft'); ?>	 
		<div class="rh_grid_image_wrapper">		
		    <div class="newsimage rh_gr_img">
		        <figure>
		            <div class="favorrightside wishonimage"><?php echo RH_get_wishlist($post->ID);?></div>       
			        <a href="<?php the_permalink();?>">
				        <?php 
				            $showimg = new WPSM_image_resizer();
				            $showimg->use_thumb = true;
				            $height_figure_single = apply_filters( 're_news_figure_height', 160 );
				            $showimg->height = $height_figure_single;
				            $showimg->width = $height_figure_single;
				            $showimg->crop = false;           
				            $showimg->show_resized_image();                                    
				        ?>
			        </a>
		        </figure>
		    </div>
		    <?php if(rehub_option('hotmeter_disable') !='1') :?>
			    <div class="newsdetail rh_gr_top_right mb5">
			    	<?php echo getHotLike(get_the_ID()); ?> 
			    </div>
		    <?php endif ;?>
		    <div class="newsdetail newstitleblock rh_gr_right_sec">
			    <?php echo rh_expired_or_not($post->ID, 'span');?><h2 class="font130 mt0 mb10 mobfont120 lineheight20"><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
			    <?php if(rehub_option('disable_btn_offer_loop')!='1')  : ?>  		          
				    <?php rehub_generate_offerbtn('showme=price&wrapperclass=pricefont110 rehub-main-color mobpricefont90 fontbold mb5 mr10 lineheight20 floatleft');?> 
			        <?php 
			            $offer_price_old = get_post_meta($post->ID, 'rehub_offer_product_price_old', true );
			            $offer_price_old = apply_filters('rehub_create_btn_price_old', $offer_price_old);
			            if(!empty($offer_price_old)){
			                $offer_price = get_post_meta($post->ID, 'rehub_offer_product_price', true );
			                $offer_price = apply_filters('rehub_create_btn_price', $offer_price);
			                if ( !empty($offer_price)) {
			                    $offer_pricesale = (float)rehub_price_clean($offer_price); 
			                    $offer_priceold = (float)rehub_price_clean($offer_price_old);
			                    if ($offer_priceold !='0' && is_numeric($offer_priceold) && $offer_priceold > $offer_pricesale) {
			                        $off_proc = 0 -(100 - ($offer_pricesale / $offer_priceold) * 100);
			                        $off_proc = round($off_proc);
			                        echo '<span class="rh-label-string mr10 mb5 floatleft">'.$off_proc.'%</span>';
			                    }
			                }
			            }

			        ?> 			    
					<span class="more-from-store-a floatleft ml0 mr10 mb5 lineheight20"><?php WPSM_Postfilters::re_show_brand_tax('list');?></span>			     
			    <?php endif; ?>
                <?php $custom_notice = get_post_meta($post->ID, '_notice_custom', true);?>
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
		    <div class="newsdetail rh_gr_right_desc">
		    	<p class="font90 mobfont80 lineheight20 moblineheight15 mb15"><?php kama_excerpt('maxchar=160'); ?></p>
				<?php $content = $post->post_content; ?>
				<?php if( false !== strpos( $content, '[wpsm_update' ) ) : ?>
					<?php 
						$pattern = get_shortcode_regex();
						preg_match('/'.$pattern.'/s', $post->post_content, $matches);
						if (is_array($matches) && $matches[2] == 'wpsm_update') {
			   			$shortcode = $matches[0];
			   			echo do_shortcode($shortcode);
						}
					?>
				<?php endif;?>	  	
		    </div>	            
		    <div class="newsdetail newsbtn rh_gr_right_btn">
		    	<div class="rh-flex-center-align mobileblockdisplay">
			        <div class="meta post-meta">
			            <?php rh_post_header_meta( 'full', true, false, 'compactnoempty', false ); ?>                       
			        </div>	
			        <div class="rh-flex-right-align">    	
					    <?php if(rehub_option('disable_btn_offer_loop')!='1')  : ?>       
						    <?php rehub_generate_offerbtn('btn_more=yes&showme=button&wrapperclass=mobile_block_btnclock mb0');?>      
					    <?php endif; ?>
				    </div> 
				</div>
		    </div>
	    </div> 
	    <div class="newscom_head_ajax"></div>
	    <div class="newscom_content_ajax"></div>
	    <?php if(rehub_option('rehub_enable_expand') == 1):?><span class="showmefulln def_btn" data-postid="<?php echo (int)$post->ID; ?>" data-enabled="0"><?php _e('Expand', 'rehub-theme');?></span><?php endif;?>     
	</div>
<?php endif;?>
