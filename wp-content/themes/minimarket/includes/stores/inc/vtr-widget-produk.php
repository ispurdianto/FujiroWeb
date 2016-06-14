<?php
/* VIRTACART
Version       : 1.0.0
Author        : Virtarich
Author URI    : http://theme-id.com
*/
if ( ! defined( 'ABSPATH' ) ) exit;
wp_register_sidebar_widget(
    'virtarich_widget_produk_terbaru',
    'Virtarich Produk Terbaru',
    'virtarich_widget_produk_terbaru', 
    array( 
        'description' => 'Tampilkan Produk terbaru'
    )
);
wp_register_sidebar_widget(
    'virtarich_widget_produk_bestseller',
    'Virtarich Produk Bestseller',
    'virtarich_widget_produk_bestseller', 
    array( 
        'description' => 'Tampilkan Produk best seller'
    )
);
wp_register_sidebar_widget(
    'virtarich_widget_produk_sale',
    'Virtarich Produk Sale',
    'virtarich_widget_produk_sale', 
    array( 
        'description' => 'Tampilkan Produk best seller'
    )
);
function virtarich_widget_thumb() {?>
        <li> 
            <?php virtarich_label() ?>
            <div class="virtamart-gambar-center">
            <div class="virtamart-gambar"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php virtarich_thumb() ?></a></div>
            </div>
            <a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
            <div class="virtamart-harga">Rp <?php virtarich_harga(); ?> <span class="coret"><?php virtarich_harga_coret(); ?></span></div>
        </li>
<?php }

function virtarich_widget_produk_terbaru() { ?>
        <div class="box">
        	<h4>Produk Terbaru</h4>
            <div class="produk-slider">
                    <ul id="new-slider" class="content-produk">
						  <?php global $post; 
                          query_posts('posts_per_page=5');
                          if (have_posts()) :  while (have_posts()) : the_post(); 
						  	virtarich_widget_thumb(); 
								endwhile;
								endif;
							 wp_reset_query(); ?>
                </ul>
            </div>
        </div>
<?php } 

function virtarich_widget_produk_bestseller() { ?>
<div class="box">
      <h4>Produk Bestseller</h4>
<div class="produk-slider">
        	<ul id="bestseller-slider" class="content-produk">
			  <?php
                    global $post;
                    $args = array(
                    'meta_key'   => 'label',
                    'orderby'    => 'meta_value',
                    'order'      => 'ASC',
                    'posts_per_page' => 5,
                    'meta_query' => array(
                    'relation' => 'AND',
                    array(
                        'key'     => 'habis',
                        'compare' => 'NOT EXISTS',
                    ),
                    array(
                        'key'     => 'label',
                        'value'   => 'best',
                        'compare' => 'LIKE',
                    )
                    ),
                    );
                    $vtr_query = new WP_Query( $args);
                    if ( $vtr_query->have_posts() ):  while( $vtr_query->have_posts() ) : $vtr_query->the_post(); 
                    virtarich_widget_thumb();
                    endwhile;
                    endif; 
                     wp_reset_postdata(); ?>
		</ul>
	</div>
</div>
<?php }

function virtarich_widget_produk_sale() { ?>
        <div class="box">
            	<h4>Produk Sale</h4>
                <div class="produk-slider">
                            <ul id="sale-slider" class="content-produk">
                      <?php
                            global $post;
                            $args = array(
                            'meta_key'   => 'label',
                            'orderby'    => 'meta_value',
                            'order'      => 'ASC',
                            'posts_per_page' => 5,
                            'meta_query' => array(
                            'relation' => 'AND',
                                array(
                                    'key'     => 'habis',
                                    'compare' => 'NOT EXISTS',
                                ),
                                array(
                                    'key'     => 'label',
                                    'value'   => 'sale',
                                    'compare' => 'LIKE',
                                )
                            ),
                            );
                      $v_query = new WP_Query( $args);
                      if ( $v_query->have_posts() ):  while( $v_query->have_posts() ) : $v_query->the_post();
					  virtarich_widget_thumb();
					  endwhile;
					  endif;
					  wp_reset_postdata();
					  ?>
                        </ul>
                    </div>
        </div>
<?php }