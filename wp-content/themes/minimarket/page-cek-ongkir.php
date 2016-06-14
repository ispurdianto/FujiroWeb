<?php
/*
Template Name: Cek Ongkos Kirim
*/
?>
<?php get_header(); ?>
<div class="container">
    <div class="content">
		<?php virtarich_breadcrumbs(); ?>
        <div class="post"><h1>Cek Ongkos Kirim</h1>
        <p> *Ongkos kirim di bawah ini adalah JNE Regular</p>
        <p> *untuk pengiriman JNE YES atau JNE OKE, atau expedisi lain , silahkan hubungi <?php  echo of_get_option('nomer_hp'); ?></p>
        <form id="vtr-form">
          <label>Propinsi*</label> <?php require_once ( VTR_TEMPLATE_DIR_STORE .  '/inc/propinsi.php');?>
          <label>Kota/Kabupaten*</label><?php require_once ( VTR_TEMPLATE_DIR_STORE .  '/inc/kota.php');?>
                      <label>Kecamatan*</label><select name="dummy" id="dummy" disabled="disabled"></select> 
            <p id="kecamatan" ></p>
           <div style="clear: both"></div>
          <label></label><button type="button" class="btn btn-cart" id="cekOngkir">Cek Ongkos Kirim</button><div style="clear: both"></div>
          <label>Ongkos kirim / Kg</label><input type="text" id="hargaOngkir" value="Rp 0"  readonly="readonly"></input><div style="clear: both"></div>
        </form>
        </div>
        
    </div>
    <?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>