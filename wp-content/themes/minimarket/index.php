<?php get_header(); ?>
<div class="container">



        
        
<div class="content"><?php $slider_act = of_get_option('slider_act'); if(($slider_act == '1')) { ?>
    <?php get_template_part( 'slider' ); ?>
<?php } ?>
	<div class="vtr-title"><h1>Produk Terbaru <?php bloginfo('name'); ?> <?php if ( get_query_var('paged') ) { echo ' - Halaman ' . get_query_var('paged'); } ?></h1></div>
          <?php get_template_part( 'loop' ); ?>
          
          <div class="vtr-row"><div class="vtr-title"><h2>Info Terbaru</h2></div><?php virtarich_blog_list(); ?></div>
    </div>
    <?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>