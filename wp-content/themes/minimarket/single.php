<?php get_header(); ?>
<div class="container">
    <div class="content">
    <?php virtarich_breadcrumbs(); ?>
    <?php if (have_posts()) : ?><?php while (have_posts()) : the_post(); ?>
    <h1><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h1>
    <div class="minimarket">
            <div class="minimarket-left">
                <div class="photo">
                    <?php virtarich_label() ?>
                     <div class="photo-frame">
                              <?php virtarich_big_thumb() ?>
                            <div class="photo-slider"><?php virtarich_slider_thumb() ?></div>
                      </div>   
                </div>
            </div>
            <div class="minimarket-right">
                <?php virtarich_table_detail(); ?>
                <?php virtarich_button_single(); ?>
                <?php if(get_post_meta($post->ID, "info_tambahan", $single = true) != ""){ ?>
                <div class="info-tambahan"><?php echo get_post_meta($post->ID, "info_tambahan", true); ?></div>
                <?php } ?>
                <?php if(get_post_meta($post->ID, "volumetrik", $single = true) != ""){ ?>
                <div class="info-tambahan"><i class="icon-info-circled"></i>Produk ini menggunakan berat volumetrik <br /> 
                berat di hitung berdasarkan ukuran (P x L x T) / 6000</div>
                <?php } ?>  
            </div>
    </div>
    
    <?php if( of_get_option('banner_single') ){ ?>
    <div class="banner"><a href="<?php echo of_get_option('banner_single_url'); ?>"><img src="<?php echo of_get_option('banner_single'); ?>" alt="<?php bloginfo('name'); ?>" ></a>
    </div>
	<?php } ?>


    <div class="vtr-title"><h2>Detail Produk <?php the_title(); ?></h2></div>
    <div class="post"><?php the_content(); ?>
    <div class="tags"><?php the_tags('tags: ',', ',''); ?></div>
    </div>
    <?php endwhile; ?>
    <div class="vtr-title"><h3>Produk lain <?php the_category(', ') ?></h3></div>
    <div class="vtr-row"><?php virtarich_related_post(); ?></div>
    <?php endif; ?>
    </div>
	<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>