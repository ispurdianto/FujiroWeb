<?php
/* VIRTACART
Version       : 1.0.0
Author        : Virtarich
Author URI    : http://theme-id.com
*/
if ( ! defined( 'ABSPATH' ) ) exit;

define('VTR_TEMPLATE_DIR_STORE' , VTR_TEMPLATE_DIR . '/includes/stores');
define('VTR_TEMPLATE_DIR_STORE_URI' , VTR_TEMPLATE_DIR_URI . '/includes/stores');
require ( VTR_TEMPLATE_DIR_STORE . '/cart/virtacart.php' );
require ( VTR_TEMPLATE_DIR_STORE . '/inc/vtr-price.php' );
require ( VTR_TEMPLATE_DIR_STORE . '/inc/vtr-quick-edit.php' );
require ( VTR_TEMPLATE_DIR_STORE . '/inc/vtr-tombol.php' );
require ( VTR_TEMPLATE_DIR_STORE . '/inc/vtr-detail-produk.php' );
require ( VTR_TEMPLATE_DIR_STORE . '/inc/vtr-table-detail.php' );
require ( VTR_TEMPLATE_DIR_STORE . '/inc/vtr-resi.php' );
require ( VTR_TEMPLATE_DIR_STORE . '/inc/vtr-testimoni.php' );
require ( VTR_TEMPLATE_DIR_STORE . '/inc/vtr-widget.php' );
require ( VTR_TEMPLATE_DIR_STORE . '/inc/vtr-download.php' );
require ( VTR_TEMPLATE_DIR_STORE . '/inc/vtr-berat.php' );
require ( VTR_TEMPLATE_DIR_STORE . '/inc/vtr-blog.php' );
require ( VTR_TEMPLATE_DIR_STORE . '/inc/vtr-page.php' );
require ( VTR_TEMPLATE_DIR_STORE . '/inc/vtr-post.php' );
require ( VTR_TEMPLATE_DIR_STORE . '/inc/vtr-widget-produk.php' );
require ( VTR_TEMPLATE_DIR_STORE . '/inc/vtr-filter-produk.php' );

function virtacart_enqueue_scripts() {
  wp_register_script( 'virtacart', VTR_TEMPLATE_DIR_STORE_URI . '/js/virtacart.js','jquery','', true );
  wp_register_script( 'validate', VTR_TEMPLATE_DIR_STORE_URI . '/js/jquery.validate.min.js','jquery','', true );
  wp_register_script( 'keranjang', VTR_TEMPLATE_DIR_STORE_URI . '/js/keranjang.js','jquery','', true );
  wp_enqueue_script('virtacart');
  if(is_page('keranjang')){
        wp_enqueue_script('validate');
		wp_enqueue_script('keranjang');
  }
}    
add_action('wp_enqueue_scripts', 'virtacart_enqueue_scripts');

function virtarich_getPostViews($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0";
    }
    return ''.$count;
}
function virtarich_setPostViews($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}

function virtarich_label(){
		global $post;
		if(get_post_meta($post->ID, "habis", true)){ ?><div class="label-habis"></div>
		<?php } else if(get_post_meta($post->ID, "label", true) == 'sale') { ?><div class="label-sale"></div>
		<?php } else if(get_post_meta($post->ID, "label", true) == 'best') { ?><div class="label-best"></div>
		<?php } else if(get_post_meta($post->ID, "label", true) == 'new') { ?><div class="label-new"></div>
		<?php } else if(get_post_meta($post->ID, "label", true) == 'limited') { ?><div class="label-limited"></div>
		<?php } 
}

function virtarich_mobile() {
	$user_agent = $_SERVER['HTTP_USER_AGENT'];
	$mobile_agents = Array("240x320","acer","acoon","acs-","abacho","ahong","airness","alcatel","amoi","android","anywhereyougo.com","applewebkit/525","applewebkit/532","asus","audio","au-mic","avantogo","becker","benq","bilbo","bird","blackberry","blazer","bleu","cdm-","compal","coolpad","danger","dbtel","dopod","elaine","eric","etouch","fly " ,"fly_","fly-","go.web","goodaccess","gradiente","grundig","haier","hedy","hitachi","htc","huawei","hutchison","inno","ipad","ipaq","ipod","jbrowser","kddi","kgt","kwc","lenovo","lg ","lg2","lg3","lg4","lg5","lg7","lg8","lg9","lg-","lge-","lge9","longcos","maemo","mercator","meridian","micromax","midp","mini","mitsu","mmm","mmp","mobi","mot-","moto","nec-","netfront","newgen","nexian","nf-browser","nintendo","nitro","nokia","nook","novarra","obigo","palm","panasonic","pantech","philips","phone","pg-","playstation","pocket","pt-","qc-","qtek","rover","sagem","sama","samu","sanyo","samsung","sch-","scooter","sec-","sendo","sgh-","sharp","siemens","sie-","softbank","sony","spice","sprint","spv","symbian","tablet","talkabout","tcl-","teleca","telit","tianyu","tim-","toshiba","tsm","up.browser","utec","utstar","verykool","virgin","vk-","voda","voxtel","vx","wap","wellco","wig browser","wii","windows ce","wireless","xda","xde","zte"
	);
	$is_mobile = false;
	foreach ($mobile_agents as $device) {
		if (stristr($user_agent, $device)) {
			$is_mobile = true;
			break;
		}
	}
	return $is_mobile;
}

function virtarich_invoice_id() { 
	$blogtime = current_time('mysql'); 
	list( $today_year, $today_month, $today_day, $hour, $minute, $second ) = preg_split( '([^0-9])', $blogtime );
	echo  $today_month;
	echo $today_day;
	echo '/';
	echo of_get_option('nama_toko');
	echo '/';
	echo $hour;
	echo $minute;
	echo $second;
}

function virtarich_recent_post() {
	global $post; 
	$vtr_query = new WP_Query( 'showposts=8' );
	while ($vtr_query -> have_posts()) : $vtr_query -> the_post();
	get_template_part( 'thumb' ); 
	endwhile; 
	wp_reset_postdata(); 
} 

function virtarich_related_post() {
	global $post;
	$cats = get_the_category($post->ID);
	if ( $cats == true ) {
		$cat_id = array();
		foreach ( $cats as $cat ) {
			$cat_id[] = $cat->term_id;
			}
	$args = array (
			'category__in' => $cat_id,
			'post__not_in' => array ( $post->ID ),
			'posts_per_page'=> 8,
			'orderby' => 'rand',
			'meta_query' => array(
			array(
				'key'     => 'habis',
				'compare' => 'NOT EXISTS'
			),
		),
		);
	$vtr_query = new WP_Query( $args );
	if ( $vtr_query->have_posts() ) { while( $vtr_query->have_posts() ) {  $vtr_query->the_post(); 
			get_template_part( 'thumb' );
			}
		}
	}
	wp_reset_query();
}

function virtarich_marquee() { 
	$newsticker_act = of_get_option('newsticker_act'); if(($newsticker_act == '1')) { ?>
	<div id="marquee"><?php echo of_get_option('isi_newsticker1'); ?></div>
<?php }
}

function virtarich_session(){
  if( !session_id() ) {
    session_start();
  }
}
add_action('init', 'virtarich_session', 1);

function virtarich_popup() {
	if(of_get_option('popup_act') == '1' && !isset($_COOKIE['visited'])) { ?>
	<div id="fb-popup" class="vtr-popup"><a class="vtr-popup-close" href="#"><i class="icon-cancel"></i></a>
	<iframe src="//www.facebook.com/plugins/likebox.php?href=<?php  echo of_get_option('facebook_fanpage'); ?>&amp;width=300&amp;height=250&amp;colorscheme=light&amp;show_faces=true&amp;stream=false&amp;header=false"  style="border:0; overflow:hidden; width:100%; height:300px;" ></iframe>
	</div>
	<?php }
}
add_action( 'wp_footer', 'virtarich_popup',21 );

function virtarich_path() {?>
		<script type="text/javascript">
        var templateDirectory = "<?php echo bloginfo('template_directory'); ?>";
        var popup_act = "<?php echo of_get_option('popup_act'); ?>";
        </script>
<?php } 
add_action( 'wp_head', 'virtarich_path' );

function virtarich_object (&$object) {
	   if (!is_object ($object) && gettype ($object) == 'object'){
		  return ($object = unserialize (serialize ($object)));
	   }else{
		  return $object;
	   }
}
function virtarich_cart(){ 
			if ( is_page('keranjang')|| of_get_option('button_order_act') == '1' ) { 
			} else { ?>    
          <div class="cart">
				  <?php 
				  $virtacart = virtarich_object($_SESSION['virtacart']);
                  if(!is_object($virtacart)) {
					  $virtacart = $_SESSION['virtacart'] = new virtacart();
					}
                  ?>
                  <a href="<?php echo home_url() ; ?>/keranjang">
                 <i  class="icon-basket"></i> <span id="tampilHarga"></span><br/> (<span id="tampilJumlah"></span> pcs)
                  </a>
                      <div class="cart-down">
                              <div id="virtacart"><?php $virtacart->display_cart();?></div>
                              <a class="btn pull-right" href="<?php echo home_url(); ?>/keranjang">Selesai Belanja
                              <i class="icon-basket "></i></a>
                      </div>
        
          </div>
    <?php } 
}