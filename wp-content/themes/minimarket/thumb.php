
<div class="new-thumb"><?php virtarich_label() ?>
<div class="new-gambar">
<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php virtarich_thumb() ?></a>
</div>
<div class="inner-thumb">
<div class="price"><span class="price-new">Rp <?php virtarich_harga(); ?></span></div>
<div class="tombolhover"><a href="<?php the_permalink() ?>" class="btn">Detail</a></div>
</div>
<div class="minimarket-title"><h2><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2></div>
<div class="minimarket-harga">Rp <?php virtarich_harga(); ?><span class="coret"><?php virtarich_harga_coret(); ?></span></div>
<div class="tombolbaru">
<?php virtarich_button() ?>
</div>
</div>