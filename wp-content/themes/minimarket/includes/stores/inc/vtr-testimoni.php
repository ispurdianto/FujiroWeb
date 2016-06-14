<?php
/* VIRTACART
Version       : 1.0.0
Author        : Virtarich
Author URI    : http://theme-id.com
*/
if ( ! defined( 'ABSPATH' ) ) exit;
wp_register_sidebar_widget(
    'virtarich_widget_testimoni',
    'Virtarich testimoni',
    'virtarich_widget_testimoni', 
    array( 
        'description' => 'tampilkan testimoni'
    )
);
function virtarich_add_kota($comment_id) {
    if(isset($_POST['kota'])) {
        $kota = wp_filter_nohtml_kses($_POST['kota']);
        add_comment_meta($comment_id, 'kota', $kota, false);
    }
}
add_action ('comment_post', 'virtarich_add_kota', 1);

function virtarich_widget_testimoni() { ?>
	<div class="box">
        <h4>Testimoni</h4>
        <div class="testimoni">
        	<ul id="testimoni-slider" class="content-testimoni">
				<?php 	$args = array(
                'status' => 'approve',
                'number' => '10',
                'post_name' => 'testimoni',
                );
                $comments = get_comments($args);
                foreach($comments as $comment) :
                echo '<li>' ;
                echo '<b>' . $comment->comment_author . '-' ;
                echo get_comment_meta( $comment->comment_ID, 'kota', true ).'</b>';
                echo '<p>' . wp_trim_words( $comment->comment_content , 35 ) . '</p>';
                echo '</li>' ;
                endforeach;
                ?>
       		</ul>
        </div>
        <a class="pull-right" href="<?php echo home_url() ; ?>/testimoni" >Semua Testimoni <i class="icon-angle-circled-right"></i></a>
	</div>
<?php } 

function virtarich_testimoni_page($comment, $args, $depth) {
$GLOBALS['comment'] = $comment; ?>
        <li>
				<?php if ($comment->comment_approved == '0') : ?>
                <p class="bg-success">terima kasih atas testimoni yang anda berikan ke kami</p>
                <?php endif; ?>
                <h2><i class="icon-user"></i> <?php echo get_comment_author_link(); ?> - <?php echo get_comment_meta( $comment->comment_ID, 'kota', true ); ?></h2>
                <div class="vtr-testimoni-page-tanggal"><i class="icon-thumbs-up"></i>
                <a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>">
				<?php printf(__('%1$s'), get_comment_date()) ?> </a>
				<?php edit_comment_link(__('(Edit)'),'  ','') ?>
                </div>
                <?php comment_text() ?>
        </li>
<?php }