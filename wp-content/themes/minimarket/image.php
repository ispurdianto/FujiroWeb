<?php get_header(); ?>
<div class="container">
<div class="content">
<?php virtarich_breadcrumbs(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
      <div class="post">
      <h1><?php the_title(); ?></h1>
      
      <?php if ( wp_attachment_is_image() ) :	
      $attachments = array_values( get_children( array( 
                      'post_parent' => $post->post_parent,
                      'post_status' => 'inherit',
                      'post_type' => 'attachment',
                      'post_mime_type' => 'image',
                      'order' => 'ASC',
                      'orderby' => 'menu_order ID'
               ) ) 
               ); ?>
      <?php 
      foreach ( $attachments as $k => $attachment ) { 
          if ( $attachment->ID == $post->ID ) 
          break; 	
          } $k++;
          if ( count( $attachments ) > 1 ) { 
                  if ( isset( $attachments[ $k ] ) ) 
                      $next_attachment_url = get_attachment_link( $attachments[ $k ]->ID );
                  else 
                      $next_attachment_url = get_attachment_link( $attachments[ 0 ]->ID );
          }  else { 
          $next_attachment_url = wp_get_attachment_url(); 
      }
      ?>
                  <div class="image">
                  <a href="<?php echo $next_attachment_url; ?>" title="<?php echo esc_attr( get_the_title() ); ?>" rel="attachment">
                  <?php $fast_width  = apply_filters( 'width', 728 );  
                        $fast_height = apply_filters( 'heigt', 728 );
                       echo wp_get_attachment_image( $post->ID, array( $fast_width, $fast_height ) );?></a>
                       <?php if ( !empty( $post->post_excerpt ) ) the_excerpt(); ?>
                       <?php the_content(); ?>
                       <?php else : ?>
                       <?php endif; ?>
                   </div>
                   
      <?php endwhile; ?>
      
                  <div class="picnav">
                  <?php $post_parent = get_post($post->ID, ARRAY_A); $parent = $post_parent['post_parent'];
                  $attachments = get_children("post_parent=$parent&post_type=attachment&post_mime_type=image&orderby=menu_order ASC, ID ASC");
                  foreach($attachments as $id => $attachment) : ?><?php echo wp_get_attachment_link($id, 'thumbnail', true); ?>		<?php endforeach; ?>
                  </div>
               
      <?php else : ?>
      
                  <div class="post"><h2>Not Found</h2>Sorry, but you are looking for something that isn't here.</div>
                  
      <?php endif; ?>
      </div>
</div>

<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>