/*virtacart*/
jQuery(function() {
		  var pembagi = 1000;
		  var Berat = jQuery( "[name=virtarich-item-berat-kg]" ).val();
		  var jadiGram = Berat/pembagi;
		  jQuery( "[name=virtarich-item-berat]" ).val( jadiGram );
});