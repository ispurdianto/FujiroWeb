<?php
/* VIRTACART
Version       : 1.0.0
Author        : Virtarich
Author URI    : http://theme-id.com
 */
if ( ! defined( 'ABSPATH' ) ) exit;
wp_register_sidebar_widget(
    'virtarich_bank', 
    'Virtarich Bank', 
    'virtarich_bank',
    array( 'description' => 'tampilkan logo bank' )
);
wp_register_sidebar_widget(
    'virtarich_ekspedisi', 
    'Virtarich Ekspedisi', 
    'virtarich_ekspedisi',
    array( 'description' => 'tampilkan logo expedisi' )
);
wp_register_sidebar_widget(
    'virtarich_widget_cekresi', 
    'Virtarich Cek Resi', 
    'virtarich_widget_cekresi',
    array( 'description' => 'tampilkan widget cek resi' )
);
wp_register_sidebar_widget(
    'virtarich_widget_fb', 
    'Virtarich FB Fanpage', 
    'virtarich_widget_fb',
    array( 'description' => 'Facebook Fan Page' )
);
wp_register_sidebar_widget(
    'virtarich_testimoni',
    'Virtarich testimoni',
    'virtarich_testimoni', 
    array( 
        'description' => 'tampilkan testimoni'
    )
);
wp_register_sidebar_widget(
    'virtarich_widget_cs', 
    'Virtarich ym', 
    'virtarich_widget_cs',
    array( 'description' => 'YM Customer Services' )
);
wp_register_sidebar_widget(
    'virtarich_widget_kontak', 
    'Virtarich kontak', 
    'virtarich_widget_kontak',
    array( 'description' => 'kontak widget' )
);
wp_register_sidebar_widget(
    'virtarich_lapak', 
    'Virtarich Lapak', 
    'virtarich_lapak',
    array( 
        'description' => 'Link ke lapak anda'
    )
);
wp_register_sidebar_widget(
    'virtarich_search', 
    'Virtarich search', 
    'virtarich_search',
    array( 'description' => 'search by category' )
);
wp_register_sidebar_widget(
    'virtarich_social', 
    'Virtarich Social', 
    'virtarich_social',
    array( 'description' => 'Follow Us Social media' )
);

function virtarich_bank() { ?>
        <div class="box">
            <h4>Rekening Bank</h4>
            <?php if(of_get_option('bca_act') == '1') { ?><div class="bca"><?php echo of_get_option('bca_rek'); ?></div><?php } ?>
            <?php if(of_get_option('mandiri_act') == '1') { ?><div class="mandiri"><?php echo of_get_option('mandiri_rek'); ?></div><?php } ?>
            <?php if(of_get_option('bni_act') == '1') { ?><div class="bni"><?php echo of_get_option('bni_rek'); ?></div><?php } ?>
            <?php if(of_get_option('bri_act') == '1') { ?><div class="bri"><?php echo of_get_option('bri_rek'); ?></div><?php } ?>
            <?php if(of_get_option('bii_act') == '1') { ?><div class="bii"><?php echo of_get_option('bii_rek'); ?></div><?php } ?>
            <?php if(of_get_option('cimb_act') == '1') { ?><div class="cimb"><?php echo of_get_option('cimb_rek'); ?></div><?php } ?>
            <?php if(of_get_option('danamon_act') == '1') { ?><div class="danamon"><?php echo of_get_option('danamon_rek'); ?></div><?php } ?>
            <?php if(of_get_option('panin_act') == '1') { ?><div class="panin"><?php echo of_get_option('panin_rek'); ?></div><?php } ?>
            <?php if(of_get_option('permata_act') == '1') { ?><div class="permata"><?php echo of_get_option('permata_rek'); ?></div><?php } ?>
            <?php if(of_get_option('btn_act') == '1') { ?><div class="bank-btn"><?php echo of_get_option('btn_rek'); ?></div><?php } ?>
            <?php if(of_get_option('muamalat_act') == '1') { ?><div class="muamalat"><?php echo of_get_option('muamalat_rek'); ?></div><?php } ?>
            <?php if(of_get_option('bsm_act') == '1') { ?><div class="bsm"><?php echo of_get_option('bsm_rek'); ?></div><?php } ?>
            <div style="clear: both"></div>
        </div>
<?php
}

function virtarich_ekspedisi() { ?>
        <div class="box">
                <h4>Pengiriman</h4>
                <div class="ekspedisi">
                <?php $ekspedisi_act = of_get_option('jne_act'); if(($ekspedisi_act == '1')) { ?><div class="jne"></div>
				<?php } $ekspedisi_act = of_get_option('tiki_act'); if(($ekspedisi_act == '1')) { ?><div class="tiki"></div>
				<?php } $ekspedisi_act = of_get_option('pos_act'); if(($ekspedisi_act == '1')) { ?><div class="pos"></div>
				<?php } $ekspedisi_act = of_get_option('pandu_act'); if(($ekspedisi_act == '1')) { ?><div class="pandu"></div>
				<?php } $ekspedisi_act = of_get_option('wahana_act'); if(($ekspedisi_act == '1')) { ?><div class="wahana"></div>
				<?php } $ekspedisi_act = of_get_option('elteha_act'); if(($ekspedisi_act == '1')) { ?><div class="elteha"></div>
				<?php } $ekspedisi_act = of_get_option('dacota_act'); if(($ekspedisi_act == '1')) { ?><div class="dacota"></div>
				<?php } $ekspedisi_act = of_get_option('herona_act'); if(($ekspedisi_act == '1')) { ?><div class="herona"></div>
				<?php } ?>
                <div style="clear: both"></div>
                </div>
        </div>
<?php
}

function virtarich_widget_cs() { ?>
        <div class="box">
        <h4>Customer Service</h4>
                <?php if(of_get_option('ym1_act') == '1') { ?>
                <div class="contact-ym"><?php  echo of_get_option('nama_ym1'); ?><br/>
                <a href="ymsgr:sendIM?<?php  echo of_get_option('id_ym1'); ?>"><img src="http://opi.yahoo.com/online?u=<?php  echo of_get_option('id_ym1'); ?>&amp;m=g&amp;t=<?php echo of_get_option('icon_ym'); ?>" alt="Cs 1"/></a></div><?php } ?>
                
                <?php if(of_get_option('ym2_act') == '1') { ?>
                <div class="contact-ym"><?php  echo of_get_option('nama_ym2'); ?><br/>
                <a href="ymsgr:sendIM?<?php  echo of_get_option('id_ym2'); ?>"><img src="http://opi.yahoo.com/online?u=<?php  echo of_get_option('id_ym1'); ?>&amp;m=g&amp;t=<?php echo of_get_option('icon_ym'); ?>" alt="Cs 2"/></a></div><?php } ?>
                
                <?php if(of_get_option('ym3_act') == '1') { ?>
                <div class="contact-ym"><?php  echo of_get_option('nama_ym3'); ?><br/>
                <a href="ymsgr:sendIM?<?php  echo of_get_option('id_ym3'); ?>"><img src="http://opi.yahoo.com/online?u=<?php  echo of_get_option('id_ym1'); ?>&amp;m=g&amp;t=<?php echo of_get_option('icon_ym'); ?>" alt="Cs 3"/></a></div><?php } ?>
                
                <?php if(of_get_option('ym4_act') == '1') { ?>
                <div class="contact-ym"><?php  echo of_get_option('nama_ym4'); ?><br/>
                <a href="ymsgr:sendIM?<?php  echo of_get_option('id_ym4'); ?>"><img src="http://opi.yahoo.com/online?u=<?php  echo of_get_option('id_ym1'); ?>&amp;m=g&amp;t=<?php echo of_get_option('icon_ym'); ?>" alt="Cs 4"/></a></div><?php } ?>
                
                <?php if(of_get_option('ym5_act') == '1') { ?>
                <div class="contact-ym"><?php  echo of_get_option('nama_ym5'); ?><br/>
                <a href="ymsgr:sendIM?<?php  echo of_get_option('id_ym5'); ?>"><img src="http://opi.yahoo.com/online?u=<?php  echo of_get_option('id_ym1'); ?>&amp;m=g&amp;t=<?php echo of_get_option('icon_ym'); ?>" alt="Cs 5"/></a></div><?php } ?>
        <div style="clear: both"></div>
        </div>
<?php
}

function virtarich_widget_fb() { ?>
        <div class="box">
                <div class="fanpage">
                <iframe src="//www.facebook.com/plugins/likebox.php?href=<?php  echo of_get_option('facebook_fanpage'); ?>&amp;width=183&amp;height=285&amp;colorscheme=light&amp;show_faces=true&amp;border_color=%23FFF&amp;stream=false&amp;header=false"  style="border:0; background-color:#FFF; overflow:hidden; width:100%; height:285px;" ></iframe></div>
                <div style="clear: both"></div>
        </div>
<?php
}

function virtarich_lapak() { ?>
        <div class="box">
            <h4>Temukan Kami di </h4>
            <?php if(of_get_option('bukalapak_act') == '1') { ?>
                <a href="<?php echo of_get_option('bukalapak_url'); ?>" target="_blank" rel="nofollow"><div class="bukalapak"></div></a>
            <?php } if(of_get_option('kaskus_act') == '1') { ?>
                <a href="<?php echo of_get_option('kaskus_url'); ?>" target="_blank" rel="nofollow"><div class="kaskus"></div></a>
            <?php } if(of_get_option('adsid_act') == '1') { ?>
                <a href="<?php echo of_get_option('adsid_url'); ?>" target="_blank" rel="nofollow"><div class="adsid"></div></a>
            <?php } if(of_get_option('tokobagus_act') == '1') { ?>
                <a href="<?php echo of_get_option('tokobagus_url'); ?>" target="_blank" rel="nofollow"><div class="tokobagus"></div></a>
            <?php } if(of_get_option('tokopedia_act') == '1') { ?>
                <a href="<?php echo of_get_option('tokopedia_url'); ?>" target="_blank" rel="nofollow"><div class="tokopedia"></div></a>
            <?php } ?>
            <div style="clear: both"></div>
        </div>
<?php }

function virtarich_kontak() { ?>
	<?php if(of_get_option('contact_act') == '1') { ?>
    <i class="icon-phone-squared"></i> <?php  echo of_get_option('nomer_telp'); 
		} 
	if(of_get_option('contact_sms') == '1') { ?>
     <i class="icon-mobile"></i> sms <?php  echo of_get_option('nomer_hp');
	 } 
	 if(of_get_option('contact_whatsapp') == '1') { ?>
     <i class="icon-whatsapp"></i> <?php  echo of_get_option('nomer_whatsapp'); ?>
     <?php }
	 	 if(of_get_option('contact_bbm') == '1') { ?>
     <i class="icon-bbm"></i> <?php  echo of_get_option('pin_bb'); ?> 
     <?php }
	 if(of_get_option('contact_email') == '1') { ?> 
     <i class="icon-mail"></i> <?php  echo of_get_option('nomer_email'); ?>
     <?php } 
} 


function virtarich_widget_kontak() { ?>
      <div class="box">
      <h4>Hubungi Kami</h4>
      <div class="kontak">
<?php if(of_get_option('contact_act') == '1') { ?><i class="icon-phone-squared"></i> <?php echo of_get_option('nomer_telp'); ?><br/><?php } ?>
<?php if(of_get_option('contact_sms') == '1') { ?><i class="icon-mobile"></i> <?php echo of_get_option('nomer_hp'); ?><br/><?php } ?>
<?php if(of_get_option('contact_bbm') == '1') { ?><i class="icon-bbm"></i> <?php echo of_get_option('pin_bb'); ?><br/><?php } ?>
<?php if(of_get_option('contact_whatsapp') == '1') { ?><i class="icon-whatsapp"></i> <?php echo of_get_option('nomer_whatsapp'); ?><br/><?php } ?>
<?php if(of_get_option('contact_email') == '1') { ?><i class="icon-mail"></i> <?php echo of_get_option('nomer_email'); ?><br/><?php } ?>
      </div>
      </div> 
<?php }

function virtarich_search() { ?>
        <div class="box">
                <h4>Cari Produk</h4>
                <form method="get" id="search-widget"  action="<?php echo home_url(); ?>">
                <input required type="text" name="s" placeholder="Search"/>
                <?php wp_dropdown_categories('show_option_all=Semua Kategori&class=select&hide_empty=1&hierarchical=1'); ?>
                <button type="submit" id="submit" class="btn senter">Search <i class="icon-search "></i></button>
                </form>
        </div>
<?php
}


function virtarich_social() { ?>
	<div class="box">
		<h4>Follow Us</h4>
		<?php if((of_get_option('facebook_act') == '1')) { ?>
                <a href="<?php echo of_get_option('facebook_url'); ?>" class="button-widget" title="download" target="_blank" rel="nofollow">
                <span class="button-widget-icon"><i class="icon-facebook-squared"></i></span>
                <span class="button-widget-text">follow us on</span>
                <span class="button-widget-link">Facebook</span> 
                </a>
        <?php } if((of_get_option('twitter_act') == '1')) { ?>
                <a href="<?php echo of_get_option('twitter_url'); ?>" class="button-widget" title="download" target="_blank" rel="nofollow">
                <span class="button-widget-icon"><i class="icon-twitter-squared"></i></span>
                <span class="button-widget-text">follow us on</span>
                <span class="button-widget-link">Twitter</span> 
                </a>
        <?php } if((of_get_option('instagram_act') == '1')) { ?> 
                <a href="<?php echo of_get_option('instagram_url'); ?>" class="button-widget" title="download" target="_blank" rel="nofollow">
                <span class="button-widget-icon"><i class="icon-instagramm"></i></span>
                <span class="button-widget-text">follow us on</span>
                <span class="button-widget-link">Instagram</span> 
                </a>
        <?php } if((of_get_option('googleplus_act') == '1')) { ?> 
                <a href="<?php echo of_get_option('googleplus_url'); ?>" class="button-widget" title="download" target="_blank" rel="nofollow">
                <span class="button-widget-icon"><i class="icon-gplus-squared"></i></span>
                <span class="button-widget-text">follow us on</span>
                <span class="button-widget-link">Google +</span> 
                </a>
        <?php } ?>           
	</div>
<?php
}

function virtarich_widget_cekresi() { ?>
        <div class="box">
                <h4>Cek resi</h4>
                <form method="get" action="http://www.cekresi.com" target="_blank" id="vtr-widget-form">
                <input required type="text" placeholder="Masukkan no resi..." name="noresi" />
                <button type="submit" class="btn pull-right" value="cek resi">Cek resi </button>
                <div style="clear: both"></div>
                </form>
        </div>
<?php
}