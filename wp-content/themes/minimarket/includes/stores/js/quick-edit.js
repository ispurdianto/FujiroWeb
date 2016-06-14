(function($) {
   // we create a copy of the WP inline edit post function
   var $wp_inline_edit = inlineEditPost.edit;
   // and then we overwrite the function with our own code
   inlineEditPost.edit = function( id ) {

      // "call" the original WP edit function
      // we don't want to leave WordPress hanging
      $wp_inline_edit.apply( this, arguments );

      // now we take care of our business

      // get the post ID
      var $post_id = 0;
      if ( typeof( id ) == 'object' )
         $post_id = parseInt( this.getId( id ) );

      if ( $post_id > 0 ) {

         // define the edit row
         var $edit_row = $( '#edit-' + $post_id );
		 

         // get harga
		 var $harga = $( '#harga-' + $post_id ).text();

		 // input harga
		 $edit_row.find( 'input[name="harga"]' ).val( $harga );
		 
		  // get harga diskon
		 var $harga_diskon = $( '#harga_diskon-' + $post_id ).text();

		 //  input harga diskon
		 $edit_row.find( 'input[name="harga_diskon"]' ).val( $harga_diskon );
		 
		 // get stock
		 var $stok = $( '#stok-' + $post_id ).text();

		 // input stock
		 $edit_row.find( 'input[name="stok"]' ).val( $stok );
		 
		 // get berat
		 var $berat = $( '#berat-' + $post_id ).text();

		 // input berat
		 $edit_row.find( 'input[name="berat"]' ).val( $berat );
		 
		 // get kode
		 var $kode = $( '#kode-' + $post_id ).text();

		 // input kode
		 $edit_row.find( 'input[name="kode"]' ).val( $kode );
		 
		
      }

   };

})(jQuery);