<?php
/* VIRTACART
Version       : 1.0.0
Author        : Virtarich
Author URI    : http://theme-id.com
 */
if ( ! defined( 'ABSPATH' ) ) exit;
error_reporting(E_ALL ^ E_NOTICE);
$virtacart = $_SESSION['virtacart'];
if(!is_object($virtacart)) { $virtacart = $_SESSION['virtacart'] = new virtacart();}
if(isset($_POST['submitted'])) {
	if(trim($_POST['checking']) !== '') {
		$captchaError = true;
	} else {
		/*cek nama*/
		if(trim($_POST['contactName']) === '') {
			$nameError = 'You forgot to enter your name.';
			$hasError = true;
		} else {
			$name = trim($_POST['contactName']);
		}
		/*cek jumlah barang */
		if(trim($_POST['jumlahBarang']) === '0') {
			$jumlahError = 'barang kosong.';
			$hasError = true;
		} else {
			$jumlahBarang = trim($_POST['jumlahBarang']);
		}
		/*cek email */
		if(trim($_POST['email']) === '')  {
			$emailError = 'You forgot to enter your email address.';
			$hasError = true;
		} else if (!preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i", trim($_POST['email']))) {
			$emailError = 'You entered an invalid email address.';
			$hasError = true;
		} else {
			$email = trim($_POST['email']);
		}
		
		if(!isset($hasError)) {

$emailTo = of_get_option('email_order');
$subject = 'Pesanan dari : '.$name;
$contactName=$_POST['contactName'];
$email=$_POST['email'];
$nomorTelpon=$_POST['nomorTelpon'];
$alamatPengiriman=$_POST['alamatPengiriman'];
$propinsiTujuan=$_POST['namaPropinsi'];
$kotaTujuan=$_POST['namaKota'];
$kecamatanTujuan=$_POST['namaKecamatan'];
$invoiceId=$_POST['invoiceId'];
$ongkosKirim=$_POST['ongkirTotal1'];
$bayaran=$_POST['belanjaTotal'];
$ordertotal=$_POST['orderTotal'];
$kodePos=$_POST['kodePos'];
$comments = $_POST['comments'];
$infoTambahan = of_get_option('info_tambahan');
$body = "
Terima kasih Sdr/i $contactName

INVOICE ID: $invoiceId
=====================================
Belanja       : $bayaran
Bea Kirim     : $ongkosKirim
--------------------------------------
TOTAL         : $ordertotal

$infoTambahan

ALAMAT PENGIRIMAN
=====================================
Nama	: $contactName
Alamat	: $alamatPengiriman , $kecamatanTujuan, $kotaTujuan , $propinsiTujuan , kode pos  $kodePos 
Telp/Hp	: $nomorTelpon
Email	: $email
Ket     : $comments \n

DETAIL PRODUK 
=====================================
"; 
foreach ($virtacart->get_contents() as $item)
{
$body .=  $item['qty'].' (pcs)  ';
if ($item['pilihan'] === '') { 
$body .= " @ Rp " .$item['price'];
} else { 
$body .= " (" .$item['pilihan']." )";
}
$body .= ' - ' . $item['name'].''; 
$body .= "\n\n";

}
$headers = 'From: Order Baru <'.$emailTo.'>' . "\r\n" . 'Reply-To: ' . $email;
/*email ke buyer*/			
mail($emailTo, $subject, $body, $headers);
/*email ke admin*/
$subject = 'Detail Pesanan anda';
$toko = of_get_option('nama_toko');
$email_order = of_get_option('email_order');
$headers = 'From: '.$toko.' <'.$email_order.'>';
mail($email, $subject, $body, $headers);
$emailSent = true;
		}
	}
}