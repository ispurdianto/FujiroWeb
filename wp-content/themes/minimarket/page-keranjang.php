<?php
/*
Template Name: Keranjang
*/
?>
<?php get_header(); ?>
<?php require_once ( VTR_TEMPLATE_DIR_STORE.  '/inc/vtr-email.php' );?>
<div class="container">
    <div class="content-full">
    <?php if(isset($emailSent) && $emailSent == true) { ?>
        <?php require_once ( VTR_TEMPLATE_DIR_STORE.  '/inc/vtr-thanks.php' );?>
    <?php } else { ?>
        <?php if(isset($hasError) || isset($captchaError)) { ?>
            <div class="salahbos">Data yang anda masukan salah , silahkan periksa kembali , pastikan data yang anda masukan benar</div>
        <?php } ?>
    <?php require_once ( VTR_TEMPLATE_DIR_STORE.  '/inc/vtr-keranjang.php' );?>
    <?php } ?>
    </div>
</div>
<?php get_footer(); ?>