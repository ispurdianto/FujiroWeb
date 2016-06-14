<?php
/*
Template Name: Pricelist
*/
?>
<?php get_header(); ?>
<div class="container">
    <div class="content-full">
    <?php virtarich_breadcrumbs(); ?>
    <?php if (have_posts()) : while (have_posts()) : the_post();  ?>
        <h1><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h1>
        <button class="btn btn-cart" name=print value="Print Pricelist" onClick="window.print()">Print Pricelist <i class="icon-print"></i></button>
            <table class="vtr-table">
            <th>Kode</th><th>Nama Barang</th><th>gambar</th><th>stok</th><th>berat</th><th>Harga</th>
             <?php do_action( 'virtarich_pricelist' ); ?>
            </table>     
    <?php endwhile; ?>
    <?php else : ?>
    <div class="post"><h2>Not Found</h2>Sorry, but you are looking for something that isn't here.</div>
    <?php endif; ?>
    </div>
</div>
<?php get_footer(); ?>