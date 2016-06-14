<!DOCTYPE html>
<!--[if IE]>
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<head>
<meta charset="utf-8">
<title><?php if ( is_home() ) { ?><?php bloginfo('name'); ?> - <?php bloginfo('description'); ?>
<?php } else { ?>
<?php wp_title(''); ?> - <?php bloginfo('name'); ?>
<?php } ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
<?php wp_head(); ?>
<?php if (is_page_template('resi.php')  ) { ?>
<?php } else {?>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php } ?>
</head>
<body> 
<div id="wrap"><div class="vtr-menu-wrap">
<div class="vtr-menu-icon">Menu<i class="icon-th-list pull-right"></i></div>
<?php wp_nav_menu( array( 'theme_location' => 'main-menu','menu_class' => 'vtr-menu vtr-web-menu' ) ); ?>
</div>

<header class="header">
<div class="header-left">
<?php virtarich_logo() ; ?>
</div>
<div class="kontak-box">
<?php $contact_act = of_get_option('contact_act'); if(($contact_act == '1')) { ?><div class="contact"><i class="icon-phone-squared"></i> <?php  echo of_get_option('nomer_telp'); ?></div><?php } ?>

<?php $contact_sms = of_get_option('contact_sms'); if(($contact_sms == '1')) { ?><div class="contact-sms"> <i class="icon-mobile"></i><?php  echo of_get_option('nomer_hp'); ?></div><?php } ?>

<?php $contact_whatsapp = of_get_option('contact_whatsapp'); if(($contact_whatsapp == '1')) { ?><div class="contact-whatsapp"> <i class="icon-whatsapp"></i> <?php  echo of_get_option('nomer_whatsapp'); ?></div><?php } ?>

<?php $contact_bbm = of_get_option('contact_bbm'); if(($contact_bbm == '1')) { ?><div class="contact-bbm"><i class="icon-bbm"></i> <?php  echo of_get_option('pin_bb'); ?></div><?php } ?>

</div>
<?php virtarich_cart(); ?>
</header>


<?php virtarich_marquee(); ?>