<?php get_header(); ?>
<div class="container">
    <div class="content">
            <?php virtarich_breadcrumbs(); ?>
            <?php if (have_posts()) : while (have_posts()) : the_post();  ?>
					<div class="post">
                        <h1><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h1>
                        <div class="tags"><?php the_time('l, F jS Y.') ?> <?php edit_post_link('Edit', '', ''); ?></div>
                        <?php the_content(); ?>
                  </div>	
            <?php endwhile; ?>
            <?php else : ?>
                  <div class="post"><h2>Not Found</h2>Sorry, but you are looking for something that isn't here.</div>
            <?php endif; ?>
                <div class="vtr-title"><h2>Produk terbaru</h2></div>
                <div class="vtr-row"><?php virtarich_recent_post(); ?></div>
    </div>
	<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>