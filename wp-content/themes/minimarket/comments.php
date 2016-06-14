<?php
if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
die ('Please do not load this page directly. Thanks!');
if ( post_password_required() ) { ?>
<p>This post is password protected. Enter the password to view comments.</p>
<?php return; } ?>
<?php if ( have_comments() ) : ?>
<ul class="commentlist">
<?php wp_list_comments( array( 'callback' => 'virtarich_testimoni_page', 'reverse_top_level'=>'DESC') ); ?>
</ul>
<div class="navigation">
<div class="alignleft"><?php previous_comments_link( __( '<i class="glyphicon glyphicon-chevron-left"></i> Testimoni lama' ) ); ?></div>
<div class="alignright"><?php next_comments_link( __( 'Testimoni baru <i class="glyphicon glyphicon-chevron-right"></i>' ) ); ?> </div>
<div style="clear: both"></div>
</div>
<?php else : ?>
<?php if ('open' == $post->comment_status) : ?>
<?php else : ?>
<p>Comments are closed.</p>
<?php endif; ?>
<?php endif; ?>
<?php if ('open' == $post->comment_status) : ?>
<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
<p>You must be <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>">logged in</a> to post a comment.</p>
<?php else : ?>

<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
  <div id="vtr-form">
<?php if ( $user_ID ) : ?>
 
<p>Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Log out of this account">Log out &raquo;</a></p>
 
<?php else : ?>

<header>
<h2>Form Testimoni</h2>
</header>
<label for="author">Nama*</label><input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="22" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?> />

 
<label for="email">Email*</label><input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="22" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> />

 
<label for="kota">kota*</label><input type="text" name="kota" id="kota" value="<?php echo $comment_author_url; ?>" size="22" tabindex="3"<?php if ($req) echo "aria-required='true'"; ?> />

 
<?php endif; ?>
 
<label for="author">Testimoni*</label>
<textarea name="comment" id="comment" rows="5" ></textarea>
 
<input name="submit" type="submit" id="submit" class="btn" value="Kirim Testimoni" />
<?php comment_id_fields(); ?>

<?php do_action('comment_form', $post->ID); ?>
 </div>
</form>
<?php endif; ?>
<?php endif; ?>