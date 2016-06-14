<div class="thanks">
<h1>Terima Kasih, Sdr/i  <?=$name;?> <button class="btn btn-cart pull-right" name=print value="Print Invoice" onClick="window.print()">Print Invoice <i class="icon-print"></i> </button></h1>
    <table class="vtr-table" >
    <tr><td >Invoice-id</td><td><?=$invoiceId=$_POST['invoiceId'];?></td></tr>
    <tr><td >Nama</td><td><?=$contactName=$_POST['contactName'];?></td></tr>
    <tr><td >Alamat</td><td><?=$alamatPengiriman=$_POST['alamatPengiriman'];?>,<?=$kecamatanTujuan=$_POST['namaKecamatan'];?>,<?=$kotaTujuan=$_POST['namaKota'];?> - Propinsi <?=$propinsiTujuan=$_POST['namaPropinsi'];?></td></tr>
    <tr><td >Kode Pos</td><td><?=$kodePos=$_POST['kodePos'];?></td></tr>
    <tr><td >Telp</td><td><?=$nomorTelpon=$_POST['nomorTelpon'];?></td></tr>
    <tr><td >Total Belanja</td><td><?=$ordertotal=$_POST['orderTotal'];?></td></tr>
    </table>
</div>

<div class="vtr-loop"><br/><h2>Silahkan Melakukan Pembayaran sebesar <b> <?=$ordertotal=$_POST['orderTotal'];?> </b> ke nomer rekening di bawah ini</h2></div>
<div class="vtr-loop">
<div class="thanks-half kontak">
           <h2> Nomor Rekening</h2>
          <?php if (of_get_option('bca_act') == '1') { ?>Bank BCA : <?php echo of_get_option('bca_rek'); ?><br/><?php } ?>
          <?php if (of_get_option('mandiri_act') == '1') { ?>Bank Mandiri : <?php echo of_get_option('mandiri_rek'); ?><br/><?php } ?>
          <?php if (of_get_option('bni_act') == '1') { ?>Bank BNI : <?php echo of_get_option('bni_rek'); ?><br/><?php } ?>
          <?php if (of_get_option('bri_act') == '1') { ?>Bank BRI : <?php echo of_get_option('bri_rek'); ?><br/><?php } ?>
          <?php if (of_get_option('bii_act') == '1') { ?>Bank BII : <?php echo of_get_option('bii_rek'); ?><br/><?php } ?>
          <?php if (of_get_option('cimb_act') == '1') { ?>Bank CIMB : <?php echo of_get_option('cimb_rek'); ?><br/><?php } ?>
          <?php if (of_get_option('danamon_act') == '1') { ?>Bank Danamon : <?php echo of_get_option('danamon_rek'); ?><br/><?php } ?>
          <?php if (of_get_option('panin_act') == '1') { ?>Bank Panin : <?php echo of_get_option('panin_rek'); ?><br/><?php } ?>
          <?php if (of_get_option('permata_act') == '1') { ?>Bank Permata : <?php echo of_get_option('permata_rek'); ?><br/><?php } ?>
          <?php if (of_get_option('btn_act') == '1') { ?>Bank BTN : <?php echo of_get_option('btn_rek'); ?><br/><?php } ?>
          <?php if(of_get_option('muamalat_act') == '1') { ?>Bank Muamalat : <?php echo of_get_option('muamalat_rek'); ?><br/><?php } ?>
          <?php if(of_get_option('bsm_act') == '1') { ?>Bank Syariah Mandiri : <?php echo of_get_option('bsm_rek'); ?><br/><?php } ?>
</div>
<div class="thanks-half kontak">
     		 <h2> Konfirmasi Pembayaran</h2>
		  <?php if(of_get_option('contact_act') == '1') { ?>Telp : <?php echo of_get_option('nomer_telp'); ?><br/><?php } ?>
          <?php if(of_get_option('contact_sms') == '1') { ?>SMS : <?php echo of_get_option('nomer_hp'); ?><br/><?php } ?>
          <?php if(of_get_option('contact_bbm') == '1') { ?>Pin BB : <?php echo of_get_option('pin_bb'); ?><br/><?php } ?>
          <?php if(of_get_option('contact_whatsapp') == '1') { ?>Whatsapp : <?php echo of_get_option('nomer_whatsapp'); ?><br/><?php } ?>
          <?php if(of_get_option('contact_email') == '1') { ?>Email : <?php echo of_get_option('nomer_email'); ?><br/><?php } ?>
</div>
<div style="clear: both"></div>
<div class="info-tambahan">*detail pesanan anda juga terkirim ke email <b><?=$email=$_POST['email'];?></b> (Periksa Spam folder, jika email tidak masuk inbox) </div>
</div>
<?php  $virtacart->empty_cart(); ?>