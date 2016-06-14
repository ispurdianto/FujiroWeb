<?php
/* VIRTACART
Version       : 1.0.0
Author        : Virtarich
Author URI    : http://theme-id.com
 */
if ( ! defined( 'ABSPATH' ) ) exit;
function virtarich_table_detail() { 
global $post; 
?>
<table class="vtr-table">
    		<tr>
            <td>Kategori</td><td><?php the_category(', ') ?> <?php edit_post_link('Edit', '', ''); ?></td>
            </tr>     
            
      		<?php if(get_post_meta($post->ID, "habis",true)){ 
			 } else { 
			 	if(get_post_meta($post->ID, "stok", $single = true) != ""){ ?>
     			<tr><td >Stok </td><td><?php echo get_post_meta($post->ID, "stok", $single = true); ?></td></tr> 
				<?php } 
			} ?>
      
			<?php if(get_post_meta($post->ID, "kode", $single = true) != ""){ ?>
      		<tr>
      		<td>Kode</td><td><?php echo get_post_meta($post->ID, "kode", $single = true); ?></td>
            </tr>
            <?php } ?> 
            
      		<tr>
      		<td>Di lihat</td><td><?php virtarich_setPostViews(get_the_ID()); ?><?php echo virtarich_getPostViews(get_the_ID()); ?> kali</td>
            </tr>  
            
            <?php if(get_post_meta($post->ID, "volumetrik", $single = true) != ""){ ?>
                <tr>
                    <td >Ukuran ( P x L x T ) cm</td><td><?php echo get_post_meta($post->ID, "panjang", true); ?> x <?php echo get_post_meta($post->ID, "lebar", true); ?> x <?php echo get_post_meta($post->ID, "tinggi", true); ?>
</td>
                </tr>
			<?php } ?>
            
      
      
      
 <?php if(get_post_meta($post->ID, "volumetrik", $single = true) != ""){ ?>
 
                 <tr>
                        <td >Berat Volumetrik</td><td><?php virtarich_berat_volumetrik() ?>
                        
                        
                                    <?php if ( of_get_option('berat_format_act') == '1' ) { ?>
                                    gram
                                    <?php } else { ?>
                                    Kg
                                     <?php }
                                    ?></td>
                                </tr>
 
 <?php } else { ?>
			<?php if(get_post_meta($post->ID, "berat", $single = true) != ""){ ?>
                <tr>
                    <td >Berat(/pcs)</td><td><?php echo get_post_meta($post->ID, "berat", true); ?>
                    <?php if ( of_get_option('berat_format_act') == '1' ) { ?>
                    gram
                    <?php } else { ?>
                    Kg
                     <?php }
                    ?></td>
                </tr>
			<?php } ?>
  <?php } ?>
  
  
      
			<?php if(function_exists('the_ratings')) { ?>
      		<tr>
      		<td >Rating</td><td><?php the_ratings(); ?></td>
            </tr>
			<?php } ?>  
    
			<?php if(get_post_meta($post->ID, "label_1", $single = true) != ""){ ?>
      		<tr>
      			<td><?php echo get_post_meta($post->ID, "label_1", true); ?></td><td><?php echo get_post_meta($post->ID, "data_1", true); ?></td>
            </tr>
			<?php } ?>
			<?php if(get_post_meta($post->ID, "label_2", $single = true) != ""){ ?>    
            <tr>
      			<td><?php echo get_post_meta($post->ID, "label_2", true); ?></td><td><?php echo get_post_meta($post->ID, "data_2", true); ?></td>
            </tr>
			<?php } ?>
			<?php if(get_post_meta($post->ID, "label_3", $single = true) != ""){ ?>            
            <tr>
      			<td><?php echo get_post_meta($post->ID, "label_3", true); ?></td><td><?php echo get_post_meta($post->ID, "data_3", true); ?></td>
            </tr>
			<?php } ?>
			<?php if(get_post_meta($post->ID, "label_4", $single = true) != ""){ ?>            
      		<tr>
      			<td><?php echo get_post_meta($post->ID, "label_4", true); ?></td><td><?php echo get_post_meta($post->ID, "data_4", true); ?></td>
            </tr>
			<?php } ?>
			<?php if(get_post_meta($post->ID, "label_5", $single = true) != ""){ ?>           
            <tr>
      			<td><?php echo get_post_meta($post->ID, "label_5", true); ?></td><td><?php echo get_post_meta($post->ID, "data_5", true); ?></td>
           	 </tr>
			<?php } ?>
			<?php if(get_post_meta($post->ID, "label_6", $single = true) != ""){ ?>            
            <tr>
      			<td><?php echo get_post_meta($post->ID, "label_6", true); ?></td><td><?php echo get_post_meta($post->ID, "data_6", true); ?></td>
            </tr>
			<?php } ?>
			<?php if(get_post_meta($post->ID, "label_7", $single = true) != ""){ ?>
            <tr>
      			<td><?php echo get_post_meta($post->ID, "label_7", true); ?></td><td><?php echo get_post_meta($post->ID, "data_7", true); ?></td>
            </tr>           
			<?php } ?>           
      
      		<tr>
      			<td>Harga </td><td>Rp <?php virtarich_harga(); ?> <span class="coret"><?php virtarich_harga_coret(); ?></span></td>
            </tr>
			<?php if(get_post_meta($post->ID, "harga_diskon", $single = true) != ""){ ?>
      		<tr>
            	<td >Anda Hemat </td><td>Rp <?php virtarich_diskon(); ?></td>
            </tr>
			<?php } ?>  
</table>
<?php }