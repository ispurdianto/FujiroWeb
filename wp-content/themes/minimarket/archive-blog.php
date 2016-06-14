<?php get_header(); ?>
<div class="container">
        <div class="content">
			<?php virtarich_breadcrumbs(); ?>
            <div class="vtr-title"><h1>Blog <?php bloginfo('name'); ?></h1></div>
            <?php if (have_posts()) : while (have_posts()) : the_post();  ?>
            <div class="post">
                <div class="list-blog-thumb">
                <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php virtarich_small_thumb() ?></a>
                </div>
                <h2><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
                <div class="tags"><?php the_time('l, F jS Y.') ?></div>
                <p><?php echo virtarich_excerpt(); ?></p>
			</div>
            <?php endwhile; ?>
            <?php virtarich_pagenavi(); ?>
            <?php else : ?>
            <div class="post"><h2>Not Found</h2>Sorry, but you are looking for something that isn't here.</div>
            <?php endif; ?>
        </div>
		<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>