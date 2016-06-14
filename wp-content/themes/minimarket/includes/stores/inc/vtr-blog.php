<?php
/* VIRTACART
Version       : 1.0.0
Author        : Virtarich
Author URI    : http://theme-id.com
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }

function virtarich_feed( $qv ) {
		  if ( isset($qv['feed']) && !isset($qv['post_type']) )
			$qv['post_type'] = array('post','blog');
		  return $qv;
}
add_filter( 'request', 'virtarich_feed' );

function virtarich_blog_register() {
    register_post_type('blog', array(
        'labels' => array(
            'name' => 'blog',
            'singular_name' => 'Blog',
            'add_new' => 'Add New Blog',
            'edit_item' => 'Edit Blog',
            'new_item' => 'New  Project to my blog',
            'view_item' => 'View blog',
            'search_items' => 'Search in My blog',
            'not_found' => 'No Post Found',
            'not_found_in_trash' => 'No blog found in blog Trash'
        ),
        'public' => true,
        'has_archive' => true,  
        'supports' => array(
            'title',
            'excerpt',
            'editor'
        )
   ));
}
add_action('init', 'virtarich_blog_register');

wp_register_sidebar_widget(
    'virtarich_blog_post', 
    'Virtarich Info Terbaru', 
    'virtarich_blog_post',
    array( 
        'description' => 'Latest Post from blog'
    )
);

function virtarich_blog_widget() {	
		global $post;
		$vtr_query = new WP_Query(
		array('post_type' => array( 'blog' ), 'showposts' => '5' ) );
		if ( $vtr_query->have_posts() ):  while( $vtr_query->have_posts() ) : $vtr_query->the_post(); ?>
			<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
		<?php endwhile;  
		endif;
		wp_reset_query(); 
}

function virtarich_blog_post() { ?>
        <div class="box">
            <h4>Info Terbaru</h4>
            <ul><?php virtarich_blog_widget(); ?></ul>
        </div>
<?php
}

function virtarich_blog_list() {
		global $post;
		$vtr_query = new WP_Query(array('post_type' =>( 'blog'), 'showposts' => '6' ) );
		if ( $vtr_query->have_posts() ):  while( $vtr_query->have_posts() ) : $vtr_query->the_post(); ?>
			  <div class="list-blog"> 
				  <div class="list-blog-title"><h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2></div>
				  <span class="list-blog-thumb"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php virtarich_small_thumb() ?></a></span>
				  <div class="tags"><?php the_time('j F  Y') ?> </div>
				  <?php echo virtarich_excerpt(25); ?>
			  </div>
		<?php endwhile;
		endif;
		wp_reset_postdata(); 
}