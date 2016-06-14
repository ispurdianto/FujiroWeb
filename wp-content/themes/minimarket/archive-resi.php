<?php get_header(); ?>
<div class="container">
    <div class="content">
    <?php virtarich_breadcrumbs(); ?>
    <h1>No Resi Pengiriman <?php bloginfo('name'); ?> <?php  if ( get_query_var('paged') ) { echo ' ('; echo __('page') . ' ' . get_query_var('paged');   echo ')';  } ?></h1>
    <table class="vtr-table" >
    <thead><tr><th>Nama</th><th>No Resi</th><th>Ekspedisi</th></tr></thead>
    <?php if (have_posts()) : while (have_posts()) : the_post();  ?>
    <tr><th colspan="3"><?php the_title(); ?></th></tr>
    <?php virtarich_resi_list() ?>
    <?php endwhile; ?>
    
    <?php else : ?>
    <div class="post"><h2>Not Found</h2>Sorry, but you are looking for something that isn't here.</div>
    <?php endif; ?>
    </table><div style="clear: both"></div>
    <?php virtarich_pagenavi(); ?>
    </div>
    <?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>