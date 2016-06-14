<?php
/*
Template Name: katalog
*/
?>
<?php get_header(); ?>
<div class="container">
<div class="content-fullpage">
<?php virtarich_breadcrumbs(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post();  ?>
<h1><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a><button class="btn pull-right" name=print value="Print Katalog" onClick="window.print()">Print Katalog <i class="icon-print"></i></button></h1>
<?php the_content(); ?>

<div style="clear: both"></div>
<?php do_action( 'virtarich_katalog' ); ?>                   
<?php endwhile; ?><?php else : ?>
<div class="post"><h2>Not Found</h2>Sorry, but you are looking for something that isn't here.</div>
<?php endif; ?>
</div>
</div>
<?php get_footer(); ?>