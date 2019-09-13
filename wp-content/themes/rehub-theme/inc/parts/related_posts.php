<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly ?>
<?php 

$base_post = $post;
global $post;

$tag_relative = rehub_option('rehub_enable_tag_relative');
$taxonomy = rh_get_taxonomy_of_post( $post, $tag_relative );
$relatives = get_the_terms( $post->ID, $taxonomy );

if ( !empty($relatives) && !is_wp_error($relatives) ) {
	$relative_ids = array();
	foreach($relatives as $individual_relative) $relative_ids[] = $individual_relative->term_id;	
	$args = array(
		'post_type' => $post->post_type,
		'post__not_in'     => array($post->ID),
		'posts_per_page'   => 6,
		'ignore_sticky_posts' => 1,
		'tax_query' => array(
			array(
				'taxonomy' => $taxonomy,
				'field'    => 'term_id',
				'terms'    => $relative_ids,
			),
		)
	);

	if (rehub_option('rehub_post_exclude_expired') == '1') {
		$args['meta_query'][] = array(
        	'key'     => 're_post_expired',
        	'value'   => '1',
        	'compare' => '!=',
    	);	
	}

	$my_query = new wp_query( $args );
	if( $my_query->have_posts() ) { ?>
		<div class="related_articles clearfix">
		<div class="related_title">
			<?php if (rehub_option('rehub_related_text') !='' && is_singular('post')) :?>
				<?php echo rehub_option('rehub_related_text');?>
			<?php else :?>
				<?php _e('Related Articles', 'rehub-theme'); ?>
			<?php endif;?>
		</div>
		<ul>
		<?php while( $my_query->have_posts() ) {
			$my_query->the_post();?>
			<li>				
				<a href="<?php echo get_permalink() ?>" class="rh_related_link_image">
				<figure>
				<?php WPSM_image_resizer::show_static_resized_image(array('lazy'=> true, 'thumb'=> true, 'crop'=> false, 'height'=> 130));?>
				</figure>
				</a>			
				<a href="<?php echo get_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>" class="rh_related_link"><?php the_title(); ?></a>
				<?php do_action('rh_related_after_title');?>		
			</li>
		<?php
		}
		echo '</ul></div>';
	}
}
$post = $base_post;
wp_reset_query();
?>