<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly ?>
<?php get_header(); ?>
<?php 
$curauth = ( get_query_var( 'author_name' ) ) ? get_user_by( 'slug', get_query_var( 'author_name' ) ) : get_userdata( get_query_var( 'author' ) );
$author_ID = $curauth->ID;
$author_name = $curauth->display_name; 
$count_comments = get_comments( array( 'user_id' => $author_ID, 'count' => true ) );
$count_likes = ( get_user_meta( $author_ID, 'overall_post_likes', true) ) ? get_user_meta( $author_ID, 'overall_post_likes', true) : 0;
$count_wishes = ( get_user_meta( $author_ID, 'overall_post_wishes', true) ) ? get_user_meta( $author_ID, 'overall_post_wishes', true) : 0;
$count_p_votes = (int)$count_likes + (int)$count_wishes; 

$user_post_types = apply_filters( 'rh_user_page_posttypes', array('post', 'product', 'blog', 'comments') );
$totalsubmitted = 0;

foreach( $user_post_types as $post_type ){
    $totaldeals = count_user_posts( $author_ID, $post_type );
    $totalsubmitted += $totaldeals;
}

if(function_exists('mycred_get_users_rank')){
    if(rehub_option('rh_mycred_custom_points')){
        $custompoint = rehub_option('rh_mycred_custom_points');
        $mycredrank = mycred_get_users_rank($author_ID, $custompoint );
    }
    else{
        $mycredrank = mycred_get_users_rank($author_ID);        
    }
}
if(function_exists('mycred_display_users_total_balance')){
    if(rehub_option('rh_mycred_custom_points')){
        $custompoint = rehub_option('rh_mycred_custom_points');
        $mycredpoint = mycred_render_shortcode_my_balance(array('type'=>$custompoint, 'user_id'=>$author_ID, 'wrapper'=>'', 'balance_el' => '') );
        $mycredlabel = mycred_get_point_type_name($custompoint, false);
    }
    else{
        $mycredpoint = mycred_render_shortcode_my_balance(array('user_id'=>$author_ID, 'wrapper'=>'', 'balance_el' => '') );
        $mycredlabel = mycred_get_point_type_name('', false);           
    }
}
 ?>
<!-- CONTENT -->
<div class="rh-container user-profile-div"> 
    <div class="rh-content-wrap clearfix">
        <!-- Sidebar -->
        <aside class="sidebar authorsidebar">
            <div class="author_widget clearfix">
                <div class="profile-avatar text-center">
                    <?php echo get_avatar( $curauth->user_email, '128' ); ?>
                </div>
                <div class="profile-usertitle text-center mt20">
                    <div class="profile-usertitle-name">
                        <?php echo esc_attr($author_name); ?> <?php if (!empty($mycredrank) && is_object( $mycredrank)) :?><span class="rh-user-rank-mc rh-user-rank-<?php echo (int)$mycredrank->post_id; ?>"><?php echo esc_html($mycredrank->title) ;?></span><?php endif;?>
                        <?php   
                            if (function_exists('bp_get_member_type')){      
                                $membertype = bp_get_member_type($author_ID);
                                $membertype_object = bp_get_member_type_object($membertype);
                                $membertype_label = (!empty($membertype_object) && is_object($membertype_object)) ? $membertype_object->labels['singular_name'] : '';
                                if($membertype_label){
                                    echo '<span class="rh-user-rank-mc rh-user-rank-'.$membertype.'">'.$membertype_label.'</span>';
                                }
                            }
                        ?>
                    </div>
                </div>
                <div class="profile-stats">
                    <div><i class="far fa-user"></i> <?php esc_html_e( 'Registration', 'rehub-theme' );  echo ': ' .date_i18n( get_option( "date_format" ), strtotime( $curauth->user_registered )); ?></div>
                    <div><i class="far fa-comment"></i><?php esc_html_e( 'Comments', 'rehub-theme' ); echo ': ' . $count_comments; ?></div>
                    <div><i class="fas fa-heartbeat"></i><?php esc_html_e( 'Votes', 'rehub-theme' ); echo ': ' . $count_p_votes; ?></div>
                    <div><i class="far fa-briefcase"></i><?php esc_html_e( 'Total submitted', 'rehub-theme' ); echo ': ' . $totalsubmitted; ?></div>
                    <?php if (!empty($mycredpoint)) :?><div class="rh_mycred_point_bal"><i class="far fa-chart-bar"></i><?php echo esc_html($mycredlabel);?>: <?php echo ''.$mycredpoint;?></div><?php endif;?>                               
                </div>
                <div class="profile-socbutton">
                    <div class="social_icon small_i">
                        <?php if(!empty($curauth->user_url)) : ?><a href="<?php echo esc_url($curauth->user_url) ?>" class="author-social hm" rel="nofollow"><i class="far fa-home"></i></a><?php endif; ?>
                        <?php if(get_the_author_meta('facebook', $author_ID)) : ?><a href="<?php echo the_author_meta('facebook', $author_ID); ?>" class="author-social fb" rel="nofollow"><i class="fab fa-facebook"></i></a><?php endif; ?>
                        <?php if(get_the_author_meta('twitter', $author_ID)) : ?><a href="<?php echo the_author_meta('twitter', $author_ID); ?>" class="author-social tw" rel="nofollow"><i class="fab fa-twitter"></i></a><?php endif; ?>
                        <?php if(get_the_author_meta('google', $author_ID)) : ?><a href="<?php echo the_author_meta('google', $author_ID); ?>?rel=author" class="author-social gp" rel="nofollow"><i class="fab fa-google-plus"></i></a><?php endif; ?>
                        <?php if(get_the_author_meta('tumblr', $author_ID)) : ?><a href="<?php echo the_author_meta('tumblr', $author_ID); ?>" class="author-social tm" rel="nofollow"><i class="fab fa-tumblr"></i></a><?php endif; ?>
                        <?php if(get_the_author_meta('instagram', $author_ID)) : ?><a href="<?php echo the_author_meta('instagram', $author_ID); ?>" class="author-social ins" rel="nofollow"><i class="fab fa-instagram"></i></a><?php endif; ?>
                        <?php if(get_the_author_meta('vkontakte', $author_ID)) : ?><a href="<?php echo the_author_meta('vkontakte', $author_ID); ?>" class="author-social vk" rel="nofollow"><i class="fab fa-vk"></i></a><?php endif; ?>
                        <?php if(get_the_author_meta('youtube', $author_ID)) : ?><a href="<?php echo the_author_meta( 'youtube', $author_ID ); ?>" class="author-social yt" rel="nofollow"><i class="fab fa-youtube"></i></a><?php endif; ?>
                     </div>
                </div>
            <?php if ( !empty( $curauth->description ) ) : ?>
                <div class="profile-description">
                    <div>
                        <span><?php esc_html_e( 'About author', 'rehub-theme' ); ?></span>
                        <p><?php echo wp_kses_post($curauth->description); ?></p>
                    </div>
                </div>
            <?php endif; ?>
            <?php if ( function_exists( 'mycred_get_users_badges' ) ) : ?>
                <div class="profile-achievements mb15 text-center">
                        <div><?php rh_mycred_display_users_badges( $author_ID ) ?></div>
                </div>
            <?php endif; ?>
                <div class="profile-usermenu mt20">
                    <ul class="user-menu-tab" role="tablist">
                    
                    <?php do_action( 'rh_user_page_menutab_before', $author_ID ); ?>
                    
                    <?php if( in_array('post', $user_post_types) ) : ?>
                        <li role="presentation" class="active">
                            <a href="#user-posts" aria-controls="user-posts" role="tab" data-toggle="tab" aria-expanded="true"><i class="far fa-edit"></i><?php esc_html_e( 'User Posts', 'rehub-theme' ); ?></a>
                        </li>
                    <?php endif; ?>
                    <?php if( rehub_option('enable_blog_posttype') == '1' && in_array('blog', $user_post_types) ) : ?>
                        <li role="presentation">
                            <a href="#user-articles" aria-controls="user-articles" role="tab" data-toggle="tab" aria-expanded="true"><i class="far fa-newspaper"></i><?php esc_html_e( 'User Articles', 'rehub-theme' ); ?></a>
                        </li>
                    <?php endif; ?>
                    <?php if ( class_exists('Woocommerce') && in_array('product', $user_post_types) ) : ?> 
                        <li role="presentation">
                            <a href="#user-deals" aria-controls="user-deals" role="tab" data-toggle="tab" aria-expanded="true"><i class="far fa-tags"></i><?php esc_html_e( 'User Deals', 'rehub-theme' ); ?></a>
                        </li>
                    <?php endif; ?> 
                    <?php if( in_array('comments', $user_post_types) ) : ?>
                        <li role="presentation">
                            <a href="#user-comments" aria-controls="user-comments" role="tab" data-toggle="tab" aria-expanded="false"><i class="far fa-comment"></i><?php esc_html_e( 'Comments', 'rehub-theme' ); ?></a>
                        </li>
                    <?php endif; ?> 
                    
                    <?php do_action( 'rh_user_page_menutab_after', $author_ID ); ?>
                    
                    <?php if ( function_exists('bp_core_get_user_domain') ) : ?>
                        <li>
                            <a href="<?php echo bp_core_get_user_domain( $author_ID ); ?>"><i class="far fa-folder-open"></i><?php esc_html_e( 'Show full profile', 'rehub-theme' ); ?></a>
                        </li>
                    <?php endif; ?>
                    </ul>
                </div>
            </div>            
        </aside>
        <!-- /Sidebar --> 
        
          <!-- Main Side -->
        <div class="main-side clearfix authorcontent tab-content">
        
        <?php do_action( 'rh_user_page_tabpanel_before', $author_ID ); ?>
        
          <?php if( in_array('post', $user_post_types) ) : ?>
            <div role="tabpanel" class="tab-pane active" id="user-posts">
                <div class="wpsm-title middle-size-title wpsm-cat-title">
                    <h5><span><?php esc_html_e( 'User Posts', 'rehub-theme' ); ?>:</span> <?php echo esc_html($author_name); ?></h5>
                </div>          
                <?php if ( have_posts() ) : ?>
                    <?php while ( have_posts() ) : the_post(); ?>
                        <?php include(rh_locate_template('inc/parts/query_type1.php')); ?>
                    <?php endwhile; ?>
                    <?php rehub_pagination(); ?>
                <?php else : ?>     
                    <div class="no-posts"><?php esc_html_e( 'Sorry. Author have no posts yet', 'rehub-theme' ); ?></div>
                <?php endif; ?> 
                <div class="clearfix"></div>               
            </div>
        <?php endif; ?>
        <?php if( rehub_option('enable_blog_posttype') == '1' && in_array('blog', $user_post_types) ) : ?>
            <div role="tabpanel" class="tab-pane" id="user-articles">
                <div class="wpsm-title middle-size-title wpsm-cat-title">
                    <h5><span><?php esc_html_e( 'User Articles', 'rehub-theme' ); ?>:</span> <?php echo esc_html($author_name); ?></h5>
                </div> 
                <?php $args_articles = array( 'post_type' => 'blog', 'author' => $author_ID ); ?>
                <?php $articles = new WP_Query( $args_articles ); ?>
                <?php if ( $articles->have_posts() ) : ?>
                    <?php while ( $articles->have_posts() ) : $articles->the_post(); ?>
                        <?php include(rh_locate_template('inc/parts/query_type1.php')); ?>
                    <?php endwhile; ?>
                    <?php rehub_pagination(); ?>
                <?php else : ?>     
                    <div class="no-posts"><?php esc_html_e( 'Sorry. Author have no articles yet', 'rehub-theme' ); ?></div>
                <?php endif; wp_reset_postdata(); ?>
                <div class="clearfix"></div>               
            </div>
        <?php endif; ?>
        <?php if ( class_exists('Woocommerce') && in_array('product', $user_post_types) ) : ?> 
            <div role="tabpanel" class="tab-pane" id="user-deals">
                <div class="wpsm-title middle-size-title wpsm-cat-title">
                    <h5><span><?php esc_html_e( 'User Deals', 'rehub-theme' ); ?>:</span> <?php echo esc_html($author_name); ?></h5>
                </div>
                <?php $args_products = array( 'post_type' => 'product', 'author' => $author_ID ); ?>
                <?php $deals = new WP_Query( $args_products ); ?>
                <?php if ( $deals->have_posts() ) : ?>
                    <div class="woo_offer_list">
                    <?php while ( $deals->have_posts() ) : $deals->the_post(); ?>
                        <?php include(rh_locate_template('inc/parts/woolistpart.php')); ?>
                    <?php endwhile; ?>
                    </div>
                    <?php rehub_pagination(); ?>
                <?php else : ?>
                        <div class="no-posts"><?php esc_html_e( 'Sorry. Author have no deals yet', 'rehub-theme' ); ?></div>
                <?php endif; wp_reset_postdata(); ?>
                <div class="clearfix"></div>                
            </div>
        <?php endif; ?>
        <?php if( in_array('comments', $user_post_types) ) : ?>
            <div role="tabpanel" class="tab-pane" id="user-comments">
                <div class="wpsm-title middle-size-title wpsm-cat-title">
                    <h5><span><?php esc_html_e('Browsing All Comments By', 'rehub-theme'); ?>:</span> <?php echo esc_html($author_name); ?></h5>
                </div>
                <ol class="commentlist">
                    <?php
                        $comments_v = get_comments( array(
                          'user_id' => $author_ID,
                          'status'  => 'approve',
                          'orderby' => 'comment_date',
                          'order'   => 'DESC',
                        ));

                        if (!empty($comments_v)){
                            wp_list_comments( array(
                              'avatar_size'   => 50,
                              'max_depth'     => 4,
                              'style'         => 'ul',
                              'callback'      => 'rehub_framework_comments',
                              'reverse_top_level' => ( get_option( 'comment_order' ) === 'asc' ? 1 : 0 ),
                            ), $comments_v);
                        }
                        unset( $comments_v );
                    ?>
                </ol>
                <div id='comments_pagination'>
                        <?php paginate_comments_links( array( 'prev_text' => '&laquo;', 'next_text' => '&raquo;' ) ); ?>
                </div> 
                <div class="clearfix"></div>
            </div>
        <?php endif; ?>
        
        <?php do_action( 'rh_user_page_tabpanel_after', $author_ID ); ?>
        
        </div>  
        <!-- /Main Side -->
    </div>
</div>
<!-- /CONTENT -->     
<!-- FOOTER -->
<?php get_footer(); ?>