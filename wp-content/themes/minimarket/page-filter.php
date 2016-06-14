<?php
/*
Template Name: Filter Produk
*/
?>
<?php get_header(); ?>
<div class="container">
      <div class="content">
			<?php virtarich_breadcrumbs(); ?>
            <?php if (have_posts()) : while (have_posts()) : the_post();  ?>
            <h1><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h1><?php edit_post_link('Edit', '', ''); ?>
            <div class="vtr-row">
				<?php virtarich_filter_produk();?>
            </div>
            <?php endwhile; ?><?php else : ?>
            <h2>Not Found</h2>Sorry, but you are looking for something that isn't here.
            <?php endif; ?>
	</div>
	<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>