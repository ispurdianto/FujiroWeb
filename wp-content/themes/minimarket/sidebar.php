<div class="sidebar"><div class="sapi"></div>
<div class="sidebar-menu">
<div class="sidebar-menu-icon">Kategori</div>
 <div class="sidebar-mobile-menu">
	<?php wp_nav_menu( array( 'theme_location' => 'sidebar-menu',
         'menu_class' => 'vtr-sidebar-menu'
		) ); ?>
 </div>  
</div>  
        
<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Sidebar') ) : ?>	
<div class="box"><h4>Setting widget anda</h4>
<p class="senter">
setting widget <a href="<?php echo home_url() ; ?>/wp-admin/widgets.php">klik disini </a></p>
</div>
<?php endif; ?>	
</div>