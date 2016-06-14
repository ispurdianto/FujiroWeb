<?php
function optionsframework_option_name() {

	$themename = get_option( 'stylesheet' );
	$themename = preg_replace("/\W/", "_", strtolower($themename) );

	$optionsframework_settings = get_option( 'optionsframework' );
	$optionsframework_settings['id'] = $themename;
	update_option( 'optionsframework', $optionsframework_settings );
}
function optionsframework_options() {
	
$ymicon_array = array(
		'1' => __('1', 'options_framework_theme'),
		'2' => __('2', 'options_framework_theme'),
		'3' => __('3', 'options_framework_theme'),
		'4' => __('4', 'options_framework_theme'),
		'5' => __('5', 'options_framework_theme'),
		'6' => __('6', 'options_framework_theme'),
		'7' => __('7', 'options_framework_theme'),
		'8' => __('8', 'options_framework_theme'),
		'9' => __('9', 'options_framework_theme'),
		'10' => __('10', 'options_framework_theme'),
		'11' => __('11', 'options_framework_theme'),
		'12' => __('12', 'options_framework_theme'),
		'13' => __('13', 'options_framework_theme'),
		'14' => __('14', 'options_framework_theme'),
		'15' => __('15', 'options_framework_theme'),
		'16' => __('16', 'options_framework_theme'),
		'17' => __('17', 'options_framework_theme'),
		'18' => __('18', 'options_framework_theme'),
		'19' => __('19', 'options_framework_theme'),
		'20' => __('20', 'options_framework_theme')
	);

	$background_defaults = array(
		'color' => '#0f0f0f',
		'image' => '',
		'repeat' => 'repeat',
		'position' => 'top center',
		'attachment'=>'scroll' );
		
	$options_categories = array();
	$options_categories_obj = get_categories();
	foreach ($options_categories_obj as $category) {
		$options_categories[$category->cat_ID] = $category->cat_name;
	}
	
	$options = array();

$options[] = array( "name" => "Styling",
						"type" => "heading");
						
						
						$options[] = array(
							'name' => __('Panduan', 'options_framework_theme'),
							'desc' => __('untuk melihat panduan lengkap kunjungi http://theme-id.com/panduan-theme-toko-online', 'options_framework_theme'),
							'type' => 'info');
						
						$options[] = array( "name" => "Header",
											"desc" => "upload gambar header anda ukuran  250px × 90px.",
											"id" => "logo_uploader",
											"type" => "upload");
											
						$options[] = array( "name" => "Favicon",
											"desc" => "Upload favicon anda.",
											"id" => "favicon_uploader",
											"type" => "upload");
					
					$options[] = array( "name" => "Background Color",
											"desc" => "Change the background CSS.",
											"id" => "virtarich_background_color",
											"std" => $background_defaults, 
											"type" => "background");			
											
						$options[] = array( "name" => "Theme Color",
											"desc" => "Warna untuk Link , Navigasi , Header sidebar",
											"id" => "virtarich_color",
											"std" => "#d50100",
											"type" => "color");
																										
						$options[] = array( "name" => "Price Color",
											"desc" => "Warna untuk Harga",
											"id" => "price_color",
											"std" => "#d60700",
											"type" => "color");
											
						$options[] = array( "name" => "Button Color",
											"desc" => "Warna untuk tombol",
											"id" => "button_color",
											"std" => "#d50100",
											"type" => "color");	
						$options[] = array( "name" => "Button Color",
											"desc" => "Warna untuk tombol",
											"id" => "button_color2",
											"std" => "#113cbf",
											"type" => "color");									
																															
						$options[] = array( "name" => "Footer",
											"desc" => "tulisan ini akan muncul pada bagian footer toko online anda , bisa diisi kode statistik",
											"id" => "footer_text",
											"std" => "",
											"type" => "textarea"); 
											
$options[] = array( "name" => "Slider",
					"type" => "heading");

					  $options[] = array( "name" => "Tampilkan Banner dan slider?",
										  "desc" => "Pilih YES jika ingin menampilkan banner dan slider di Home",
										  "id" => "slider_act",
										  "std" => "No",
										  "type" => "select",
										  "class" => "mini", 
										  "options" => array("No", "Yes"));	
										  					
						$options[] = array(
							'name' => __('Banner Slider', 'options_framework_theme'),
							'desc' => __('Banner di bawah ini akan tampil berupa slider di home', 'options_framework_theme'),
							'type' => 'info');						
												
						$options[] = array( "name" => "Banner 1",
											"desc" => "Upload banner anda ukuran lebar 690px × 300px",
											"id" => "banner_1",
											"type" => "upload");
											
						$options[] = array( "name" => "URL Link banner 1 ",
											"desc" => "isi url halaman tujuan contoh : http://theme-id.com",
											"id" => "banner_url_1",
											"std" => "",
											"type" => "text");	
											
						$options[] = array( "name" => "Banner 2",
											"desc" => "Upload banner anda ukuran lebar 690px × 300px",
											"id" => "banner_2",
											"type" => "upload");
											
						$options[] = array( "name" => "URL Link banner 2 ",
											"desc" => "isi url halaman tujuan contoh : http://theme-id.com",
											"id" => "banner_url_2",
											"std" => "",
											"type" => "text");							
					
						$options[] = array( "name" => "Banner 3",
											"desc" => "Upload banner anda ukuran lebar 690px × 300px",
											"id" => "banner_3",
											"type" => "upload");
											
						$options[] = array( "name" => "URL Link banner 3 ",
											"desc" => "isi url halaman tujuan contoh : http://theme-id.com",
											"id" => "banner_url_3",
											"std" => "",
											"type" => "text");	
																			
$options[] = array( "name" => "Data",
					"type" => "heading");

						$options[] = array( "name" => "Nama Toko",
										  "desc" => "Tulis nama toko .",
										  "id" => "nama_toko",
										  "std" => "",
										  "type" => "text");														
				  
					  $options[] = array( "name" => "Tampilkan No Telp?",
										  "desc" => "Pilih YES jika ingin menampilkan nomer telp",
										  "id" => "contact_act",
										  "std" => "No",
										  "type" => "select",
										  "class" => "mini", 
										  "options" => array("No", "Yes"));	
																																  
					  $options[] = array( "name" => "Nomor Telp",
										  "desc" => "Tulis Nomor telp",
										  "id" => "nomer_telp",
										  "std" => "",
										  "class" => "mini",
										  "type" => "text");
										  
					  $options[] = array( "name" => "Tampilkan No SMS?",
										  "desc" => "Pilih YES jika ingin menampilkan nomer SMS",
										  "id" => "contact_sms",
										  "std" => "No",
										  "type" => "select",
										  "class" => "mini", 
										  "options" => array("No", "Yes"));	
										  
					  $options[] = array( "name" => "Nomor SMS / HP",
										  "desc" => "Tulis Nomor untuk sms",
										  "id" => "nomer_hp",
										  "std" => "",
										  "class" => "mini",
										  "type" => "text");	
										  
					  $options[] = array( "name" => "Tampilkan PIN BB?",
										  "desc" => "Pilih YES jika ingin menampilkan Pin BB",
										  "id" => "contact_bbm",
										  "std" => "No",
										  "type" => "select",
										  "class" => "mini", 
										  "options" => array("No", "Yes"));	
										  
										  
					  $options[] = array( "name" => "PIN BB",
										  "desc" => "Tulis PIN BB",
										  "id" => "pin_bb",
										  "std" => "",
										  "class" => "mini",
										  "type" => "text");	
										  
					  $options[] = array( "name" => "Tampilkan whatsapp?",
										  "desc" => "Pilih YES jika ingin menampilkan whatsapp",
										  "id" => "contact_whatsapp",
										  "std" => "No",
										  "type" => "select",
										  "class" => "mini", 
										  "options" => array("No", "Yes"));	
										  
					  $options[] = array( "name" => "Whatsapp",
										  "desc" => "Tulis No Whatsapp",
										  "id" => "nomer_whatsapp",
										  "std" => "",
										  "class" => "mini",
										  "type" => "text");
										  										  
					  $options[] = array( "name" => "Tampilkan EMAIL?",
										  "desc" => "Pilih YES jika ingin menampilkan",
										  "id" => "contact_email",
										  "std" => "No",
										  "type" => "select",
										  "class" => "mini", 
										  "options" => array("No", "Yes"));	
										  
					  $options[] = array( "name" => "EMAIL",
										  "desc" => "Tulis Email",
										  "id" => "nomer_email",
										  "std" => "",
										  "class" => "mini",
										  "type" => "text");
																

$options[] = array( "name" => "Single",
					"type" => "heading");
	    $options[] = array( "name" => "Banner",
						"desc" => "Upload banner anda ukuran lebar 690 px X 90 px",
						"id" => "banner_single",
						"type" => "upload");
						
	$options[] = array( "name" => "URL Link banner",
						"desc" => "isi url halaman tujuan contoh : http://theme-id.com",
						"id" => "banner_single_url",
						"std" => "",
						"type" => "text");					
					
																			
$options[] = array( "name" => "Form Order",
					"type" => "heading");

						$options[] = array( "name" => "setting tombol beli",
										"desc" => "silahkan pilih , untuk tanpa keranjang >> pilih Cara Pemesanan , untuk menggunakan keranjang Pilih Keranjang",
										"id" => "button_order_act",
										"std" => "keranjang",
										"type" => "select",
										"class" => "mini",
										"options" => array("keranjang", "cara order"));	
										
										
					$options[] = array( "name" => "URL Halaman cara pemesanan ",
										"desc" => "isi url halaman cara order anda, jika pada post produk dropship di centang , maka tombol beli akan di link ke halaman ini",
										"id" => "order_page",
										"std" => "",
										"type" => "text");	
										
					$options[] = array( "name" => "Email form order",
										"desc" => "Tulis email yang anda gunakan untuk menerima form order.",
										"id" => "email_order",
										"std" => "",
										"class" => "mini",
										"type" => "text");	
																				
					$options[] = array( "name" => "Info tambahan pada email pemesanan",
										"desc" => "tulisan ini akan terkirim ke email konsumen anda , anda bisa menuliskan no rekening , cara pembayaran , nomor kontak , etc ... ",
										"id" => "info_tambahan",
										"std" => "",
										"type" => "textarea");	
										
						$options[] = array( "name" => "Format Berat",
										"desc" => "silahkan pilih , jika berat yang anda gunakan adalah KG , maka pilih KG , jika berat yang anda gunakan gram , maka pilih gram , fungsi ini akan merubah berat gram menjadi KG secara otomatis baca detail disini >> ",
										"id" => "berat_format_act",
										"std" => "kg",
										"type" => "select",
										"class" => "mini",
										"options" => array("kg", "gram"));	
										
$options[] = array( "name" => "Bank",
					"type" => "heading");
						
						$options[] = array(
						'name' => __('Widget BANK', 'options_framework_theme'),
						'desc' => __('untuk menampilkan widget ini pada sidebar wp-admin >> appearance >> widget >> VIRTARICH Bank', 'options_framework_theme'),
						'type' => 'info');
										
					$options[] = array( "name" => "1- BCA",
										"desc" => "Tampilkan rekening Bca ",
										"id" => "bca_act",
										"std" => "No",
										"type" => "select",
										"class" => "mini", 
										"options" => array("No", "Yes"));	
										
					$options[] = array( "name" => "Nama dan Nomor Rekening BCA",
										"desc" => "Tulis nama dan nomor rekening anda",
										"id" => "bca_rek",
										"std" => "",
										"type" => "text");	
				
					$options[] = array( "name" => "2- Bank MANDIRI",
										"desc" => "Tampilkan rekening MANDIRI ",
										"id" => "mandiri_act",
										"std" => "No",
										"type" => "select",
										"class" => "mini", 
										"options" => array("No", "Yes"));	
										
					$options[] = array( "name" => "Nama dan Nomor Rekening Bank MANDIRI",
										"desc" => "Tulis nama dan nomor rekening anda",
										"id" => "mandiri_rek",
										"std" => "",
										"type" => "text");	
										
					$options[] = array( "name" => "3- Bank BNI",
										"desc" => "Tampilkan rekening BNI ",
										"id" => "bni_act",
										"std" => "No",
										"type" => "select",
										"class" => "mini", 
										"options" => array("No", "Yes"));	
										
					$options[] = array( "name" => "Nama dan Nomor Rekening BNI",
										"desc" => "Tulis nama dan nomor rekening anda",
										"id" => "bni_rek",
										"std" => "",
										"type" => "text");	
										
					$options[] = array( "name" => "4- BRI",
										"desc" => "Tampilkan rekening BRI ",
										"id" => "bri_act",
										"std" => "No",
										"type" => "select",
										"class" => "mini", 
										"options" => array("No", "Yes"));	
										
					$options[] = array( "name" => "Nama dan Nomor Rekening BRI",
										"desc" => "Tulis nama dan nomor rekening anda",
										"id" => "bri_rek",
										"std" => "",
										"type" => "text");	
				
					$options[] = array( "name" => "5- BII",
										"desc" => "Tampilkan rekening BII ",
										"id" => "bii_act",
										"std" => "No",
										"type" => "select",
										"class" => "mini", 
										"options" => array("No", "Yes"));	
										
					$options[] = array( "name" => "Nama dan Nomor Rekening BII",
										"desc" => "Tulis nama dan nomor rekening anda",
										"id" => "bii_rek",
										"std" => "",
										"type" => "text");	
										
					$options[] = array( "name" => "6- CIMB Niaga",
										"desc" => "Tampilkan rekening CIMB Niaga ",
										"id" => "cimb_act",
										"std" => "No",
										"type" => "select",
										"class" => "mini", 
										"options" => array("No", "Yes"));	
										
					$options[] = array( "name" => "Nama dan Nomor Rekening CIMB Niaga",
										"desc" => "Tulis nama dan nomor rekening anda",
										"id" => "cimb_rek",
										"std" => "",
										"type" => "text");	
										
					$options[] = array( "name" => "7- Bank Danamon Indonesia",
										"desc" => "Tampilkan rekening Danamon ",
										"id" => "danamon_act",
										"std" => "No",
										"type" => "select",
										"class" => "mini", 
										"options" => array("No", "Yes"));	
										
					$options[] = array( "name" => "Nama dan Nomor Rekening Bank Danamon",
										"desc" => "Tulis nama dan nomor rekening anda",
										"id" => "danamon_rek",
										"std" => "",
										"type" => "text");	
				
					$options[] = array( "name" => "8- Bank Panin",
										"desc" => "Tampilkan rekening Bank Panin ",
										"id" => "panin_act",
										"std" => "No",
										"type" => "select",
										"class" => "mini", 
										"options" => array("No", "Yes"));	
										
					$options[] = array( "name" => "Nama dan Nomor Rekening Bank Panin",
										"desc" => "Tulis nama dan nomor rekening anda",
										"id" => "panin_rek",
										"std" => "",
										"type" => "text");	
										
					$options[] = array( "name" => "9- Bank Permata",
										"desc" => "Tampilkan rekening Bank Permata ",
										"id" => "permata_act",
										"std" => "No",
										"type" => "select",
										"class" => "mini", 
										"options" => array("No", "Yes"));	
										
					$options[] = array( "name" => "Nama dan Nomor Rekening Bank Permata",
										"desc" => "Tulis nama dan nomor rekening anda",
										"id" => "permata_rek",
										"std" => "",
										"type" => "text");	
										
					$options[] = array( "name" => "10- BTN",
										"desc" => "Tampilkan rekening BTN ",
										"id" => "btn_act",
										"std" => "No",
										"type" => "select",
										"class" => "mini", 
										"options" => array("No", "Yes"));	
										
					$options[] = array( "name" => "Nama dan Nomor Rekening BTN",
										"desc" => "Tulis nama dan nomor rekening anda",
										"id" => "btn_rek",
										"std" => "",
										"type" => "text");	
										
					$options[] = array( "name" => "11- Bank Muamalat",
										"desc" => "Tampilkan rekening Bank Muamalat ",
										"id" => "muamalat_act",
										"std" => "No",
										"type" => "select",
										"class" => "mini", 
										"options" => array("No", "Yes"));	
										
					$options[] = array( "name" => "Nama dan Nomor Rekening Bank Muamalat",
										"desc" => "Tulis nama dan nomor rekening anda",
										"id" => "muamalat_rek",
										"std" => "",
										"type" => "text");	

									
$options[] = array( "name" => "Ekspedisi",
					"type" => "heading");
						
						$options[] = array(
						'name' => __('Widget Ekspedisi', 'options_framework_theme'),
						'desc' => __('untuk menampilkan widget ini pada sidebar wp-admin >> appearance >> widget >> VIRTARICH Ekspedisi', 'options_framework_theme'),
						'type' => 'info');
										
					$options[] = array( "name" => "1- JNE",
										"desc" => "Tampilkan Logo JNE ",
										"id" => "jne_act",
										"std" => "No",
										"type" => "select",
										"class" => "mini", 
										"options" => array("No", "Yes"));	
										
					$options[] = array( "name" => "2- Tiki",
										"desc" => "Tampilkan Logo Tiki ",
										"id" => "tiki_act",
										"std" => "No",
										"type" => "select",
										"class" => "mini", 
										"options" => array("No", "Yes"));	
										
					$options[] = array( "name" => "3- Pos Indonesia",
										"desc" => "Tampilkan Logo Pos Indonesia ",
										"id" => "pos_act",
										"std" => "No",
										"type" => "select",
										"class" => "mini", 
										"options" => array("No", "Yes"));	
										
					$options[] = array( "name" => "4- Pandu Logistik",
										"desc" => "Tampilkan logo Pandu Logistik ",
										"id" => "pandu_act",
										"std" => "No",
										"type" => "select",
										"class" => "mini", 
										"options" => array("No", "Yes"));
										
					$options[] = array( "name" => "5- DACOTA",
										"desc" => "Tampilkan logo Dacota Cargo ",
										"id" => "dacota_act",
										"std" => "No",
										"type" => "select",
										"class" => "mini", 
										"options" => array("No", "Yes"));
										
					$options[] = array( "name" => "6- Wahana",
										"desc" => "Tampilkan logo Wahana Cargo ",
										"id" => "wahana_act",
										"std" => "No",
										"type" => "select",
										"class" => "mini", 
										"options" => array("No", "Yes"));
										
					$options[] = array( "name" => "7- Elteha",
										"desc" => "Tampilkan logo Elteha Cargo ",
										"id" => "elteha_act",
										"std" => "No",
										"type" => "select",
										"class" => "mini", 
										"options" => array("No", "Yes"));
										
					$options[] = array( "name" => "8- Herona",
										"desc" => "Tampilkan logo Herona Cargo ",
										"id" => "herona_act",
										"std" => "No",
										"type" => "select",
										"class" => "mini", 
										"options" => array("No", "Yes"));
						
$options[] = array( "name" => "YM",
					"type" => "heading");
						
						$options[] = array(
						'name' => __('Widget Customer Service', 'options_framework_theme'),
						'desc' => __('untuk menampilkan widget ini pada sidebar wp-admin >> appearance >> widget >> VIRTARICH Customer Service', 'options_framework_theme'),
						'type' => 'info');
						
					$options[] = array( "name" => "YM status Icon",
										"desc" => "pilih ym status icon",
										"id" => "icon_ym",
										"std" => "1",
										"type" => "select",
										"class" => "mini", 
											"options" => $ymicon_array);	
										
					$options[] = array( "name" => "1- Customer Service 1",
										"desc" => "Tampilkan CS 1 ",
										"id" => "ym1_act",
										"std" => "No",
										"type" => "select",
										"class" => "mini", 
										"options" => array("No", "Yes"));	
										
					$options[] = array( "name" => "Nama ",
										"desc" => "Tulis nama CS",
										"id" => "nama_ym1",
										"std" => "",
										"type" => "text");	
										
					$options[] = array( "name" => "ID yahoo Messenger ",
										"desc" => "Tulis id saja contoh : theme_id",
										"id" => "id_ym1",
										"std" => "",
										"type" => "text");
										
					$options[] = array( "name" => "2- Customer Service 2",
										"desc" => "Tampilkan CS 2 ",
										"id" => "ym2_act",
										"std" => "No",
										"type" => "select",
										"class" => "mini", 
										"options" => array("No", "Yes"));	
										
					$options[] = array( "name" => "Nama ",
										"desc" => "Tulis nama CS",
										"id" => "nama_ym2",
										"std" => "",
										"type" => "text");	
										
					$options[] = array( "name" => "ID yahoo Messenger ",
										"desc" => "Tulis id saja contoh : theme_id",
										"id" => "id_ym2",
										"std" => "",
										"type" => "text");
				
					$options[] = array( "name" => "3- Customer Service 3",
										"desc" => "Tampilkan CS 3 ",
										"id" => "ym3_act",
										"std" => "No",
										"type" => "select",
										"class" => "mini", 
										"options" => array("No", "Yes"));	
										
					$options[] = array( "name" => "Nama ",
										"desc" => "Tulis nama CS",
										"id" => "nama_ym3",
										"std" => "",
										"type" => "text");	
										
					$options[] = array( "name" => "ID yahoo Messenger ",
										"desc" => "Tulis id saja contoh : theme_id",
										"id" => "id_ym3",
										"std" => "",
										"type" => "text");
					$options[] = array( "name" => "4- Customer Service 4",
										"desc" => "Tampilkan CS 4 ",
										"id" => "ym4_act",
										"std" => "No",
										"type" => "select",
										"class" => "mini", 
										"options" => array("No", "Yes"));	
										
					$options[] = array( "name" => "Nama ",
										"desc" => "Tulis nama CS",
										"id" => "nama_ym4",
										"std" => "",
										"type" => "text");	
										
					$options[] = array( "name" => "ID yahoo Messenger ",
										"desc" => "Tulis id saja contoh : theme_id",
										"id" => "id_ym4",
										"std" => "",
										"type" => "text");
					$options[] = array( "name" => "5- Customer Service 5",
										"desc" => "Tampilkan CS 5 ",
										"id" => "ym5_act",
										"std" => "No",
										"type" => "select",
										"class" => "mini", 
										"options" => array("No", "Yes"));	
										
					$options[] = array( "name" => "Nama ",
										"desc" => "Tulis nama CS",
										"id" => "nama_ym5",
										"std" => "",
										"type" => "text");	
										
					$options[] = array( "name" => "ID yahoo Messenger ",
										"desc" => "Tulis id saja contoh : theme_id",
										"id" => "id_ym5",
										"std" => "",
										"type" => "text");
																																																			
$options[] = array( "name" => "Sosmed",
					"type" => "heading");
				$options[] = array( "name" => "Facebook Fanpage URL",
									"desc" => "contoh : http://www.facebook.com/themeid",
									"id" => "facebook_fanpage",
									"std" => "",
									"type" => "text");	
									
				$options[] = array( "name" => "Tampilkan Pop up ?",
										"desc" => "pilih YES , jika ingin menampilkan popup",
										"id" => "popup_act",
										"std" => "Yes",
										"type" => "select",
										"class" => "mini", 
										"options" => array("No", "Yes"));	
															
				$options[] = array( "name" => "tampilkan Facebook di sidebar ",
									"desc" => "Tampilkan, pilih YES",
									"id" => "facebook_act",
									"std" => "No",
									"type" => "select",
									"class" => "mini", 
									"options" => array("No", "Yes"));	
															
				$options[] = array( "name" => "Facebook Url",
									"desc" => "contoh : http://www.facebook.com/virtarich",
									"id" => "facebook_url",
									"std" => "",
									"type" => "text");
									
				$options[] = array( "name" => "tampilkan Twitter di sidebar ",
									"desc" => "Tampilkan, pilih YES",
									"id" => "twitter_act",
									"std" => "No",
									"type" => "select",
									"class" => "mini", 
									"options" => array("No", "Yes"));	
															
				$options[] = array( "name" => "Twitter Url",
									"desc" => "contoh : https://twitter.com/virtarich",
									"id" => "twitter_url",
									"std" => "",
									"type" => "text");	
																		
				$options[] = array( "name" => "tampilkan Instagram di sidebar ",
									"desc" => "Tampilkan, pilih YES",
									"id" => "instagram_act",
									"std" => "No",
									"type" => "select",
									"class" => "mini", 
									"options" => array("No", "Yes"));	
															
				$options[] = array( "name" => "Instagram Url",
									"desc" => "contoh : http://instagram.com/theme_id",
									"id" => "instagram_url",
									"std" => "",
									"type" => "text");
									
				$options[] = array( "name" => "tampilkan Google plus di sidebar ",
									"desc" => "Tampilkan, pilih YES",
									"id" => "googleplus_act",
									"std" => "No",
									"type" => "select",
									"class" => "mini", 
									"options" => array("No", "Yes"));	
															
				$options[] = array( "name" => "Google plus Url",
									"desc" => "contoh : ane gak punya contoh",
									"id" => "googleplus_url",
									"std" => "",
									"type" => "text");						
					
								
$options[] = array( "name" => "Lapak",
					"type" => "heading");
						
						$options[] = array(
					  'name' => __('Widget Lapak', 'options_framework_theme'),
					  'desc' => __('untuk menampilkan widget ini pada sidebar wp-admin >> appearance >> widget >> VIRTARICH Lapak', 'options_framework_theme'),
					  'type' => 'info');
									  
				 $options[] = array( "name" => "1- Tampilkan Bukalapak.com?",
									  "desc" => "pilih YES , jika ingin menampilkan",
									  "id" => "bukalapak_act",
									  "std" => "No",
									  "type" => "select",
									  "class" => "mini", 
									  "options" => array("No", "Yes"));
				  $options[] = array( "name" => "URL Bukalapak",
									  "desc" => "isi url lapak anda, contoh http://theme-id.com",
									  "id" => "bukalapak_url",
									  "std" => "",
									  "type" => "text");	
									  
				 $options[] = array( "name" => "2- Tampilkan Kaskus.com?",
									  "desc" => "pilih YES , jika ingin menampilkan",
									  "id" => "kaskus_act",
									  "std" => "No",
									  "type" => "select",
									  "class" => "mini", 
									  "options" => array("No", "Yes"));
				  $options[] = array( "name" => "URL kaskus",
									  "desc" => "isi url lapak anda, contoh http://theme-id.com",
									  "id" => "kaskus_url",
									  "std" => "",
									  "type" => "text");
									  
				 $options[] = array( "name" => "3- Tampilkan Ads.id?",
									  "desc" => "pilih YES , jika ingin menampilkan",
									  "id" => "adsid_act",
									  "std" => "No",
									  "type" => "select",
									  "class" => "mini", 
									  "options" => array("No", "Yes"));
				  $options[] = array( "name" => "URL Ads-id",
									  "desc" => "isi url lapak anda, contoh http://theme-id.com",
									  "id" => "adsid_url",
									  "std" => "",
									  "type" => "text");
									  									  
				 $options[] = array( "name" => "4- Tampilkan Tokopedia.com?",
									  "desc" => "pilih YES , jika ingin menampilkan",
									  "id" => "tokopedia_act",
									  "std" => "No",
									  "type" => "select",
									  "class" => "mini", 
									  "options" => array("No", "Yes"));
				  $options[] = array( "name" => "URL Tokopedia",
									  "desc" => "isi url lapak anda, contoh http://theme-id.com",
									  "id" => "tokopedia_url",
									  "std" => "",
									  "type" => "text");	
													
$options[] = array( "name" => "News ticker",
					"type" => "heading");	

						$options[] = array( "name" => "Tampilkan News Ticker?",
									"desc" => "Pilih YES jika ingin menampilkan News Ticker",
									"id" => "newsticker_act",
									"std" => "No",
									"type" => "select",
									"class" => "mini", 
									"options" => array("No", "Yes"));
			
				$options[] = array( "name" => "info",
									"desc" => "Tulis kalimat info anda, singkat , padat , dan jelas",
									"id" => "isi_newsticker1",
									"std" => "",
									"type" => "text");
																		
	return $options;
}