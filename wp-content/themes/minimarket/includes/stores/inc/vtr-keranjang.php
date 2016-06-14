<ul id="status">
      <li class="item active"><i class="icon-basket"></i><br/>Cart</li>
      <li class="item"><i class="icon-truck"></i><br/>Alamat</li>
      <li class="item"><i class="icon-ok-squared"></i><br/>Invoice</li>
      <li class="item"><i class="icon-direction"></i><br/>sent</li>
</ul>     
<div class="keranjang">
<form action="<?php the_permalink(); ?>" id="vtr-form" method="post" >
	<ul id="keranjang-slider" class="content-keranjang">
<!--  Page 1 --> 
        <li><fieldset id="1">
              <button type="button" class="next right btn btn-cart" id="Step1">Lanjutkan <i class="icon-right-open"></i></button>
              <div style="clear: both"></div>
              <div id="virtacart"><?php $virtacart->display_cart();?></div>
              </fieldset>
        </li>
<!--  Page 2 -->     
        <li>
        <fieldset id="fs"> <button type="button" class="next right btn btn-cart" id="stepDua" disabled="disabled" />Lanjutkan <i class="icon-right-open"></i></button>
        <div style="clear: both"></div>    
			<label>Nama*</label><input type="text" name="contactName" id="contactName" value="" required="required" />
            <label>Nomor Telpon*</label><input type="text" name="nomorTelpon" id="nomorTelpon" value="" class="required" />
            <label>Alamat*</label><input type="text" name="alamatPengiriman" id="alamatPengiriman" value="" class="required" />
            <label>Kode Pos*</label><input type="text" name="kodePos" id="kodePos" value="" class="required" />
            <label>Propinsi*</label> <?php require_once ( VTR_TEMPLATE_DIR_STORE .  '/inc/propinsi.php');?>
            <label>Kota/Kabupaten*</label><?php require_once ( VTR_TEMPLATE_DIR_STORE .  '/inc/kota.php');?>
            <label>Kecamatan*</label><select name="dummy" id="dummy"></select> 
            <p id="kecamatan" ></p>
    </fieldset>
        </li>
<!--  Page 3 --> 
        <li>
        <fieldset id="3">
            <button type="button" class="next right btn btn-cart" id="Step3">Lanjutkan <i class="icon-right-open"></i></button>
            <button class="prev btn btn-cart" type="button"> <i class="icon-left-open"></i> Kembali </button>
            <div style="clear: both"></div>
            <label>Belanja</label><input type="text"  value="" name="belanjaTotal" id="belanjaTotal" class="required" readonly="readonly"></input>
            <label>jumlah barang</label><input type="text" name="jumlahBarang" id="jumlahBarang"   class="required" readonly="readonly"/>
            <label>Bea Kirim / kg</label><input type="text" name="ongkir" id="ongkir"  readonly="readonly"/>
            <label>Berat total ( kg )</label><input type="text"  name="beratTotal" value="0" id="beratTotal" readonly="readonly"></input>
            <label>Total Ongkir</label><input type="text"  value="Rp 0" id="ongkirTotal1" name="ongkirTotal1" readonly="readonly"></input>
            <input type="hidden" value="" id="ongkirTotal" readonly></input>
            <input id="propinsiku" name="namaPropinsi" type="hidden" class="required"/></input>
            <input id="kotaku" name="namaKota" type="hidden" class="required"/></input>
            <input id="kecamatanku" name="namaKecamatan" type="hidden" class="required"/></input>
            <input id="invoiceku" name="invoiceId" type="hidden" value="<?php virtarich_invoice_id(); ?>"/></input>
            <div style="clear: both"></div>
            * Berat minimal pengiriman adalah 1 kg <br/>
            * ekspedisi yang di gunakan JNE > Regular , untuk expedisi lain , silahkan hubungi CS kami
            </fieldset>
        </li>
<!--  Page 4 -->
        <li><fieldset id="4">
            <button type="button" class="prev btn btn-cart"><i class="icon-left-open"></i> Kembali</button>
            <button class="right btn btn-cart" type="submit">Kirim <i class="icon-direction"></i></button>
            <div style="clear: both"></div>
            <label>TOTAL</label><input type="text"  value="Rp 0" id="orderTotal" name="orderTotal" readonly="readonly"></input>
            <label for="email">Email*</label><input type="text" name="email" id="email" value="" class="required" />
            <label for="commentsText">Info Tambahan*</label><textarea name="comments" id="commentsText" rows="5" /></textarea>
            <span class="inline"><input type="hidden" name="sendCopy" id="sendCopy" value="true" checked="checked" /></span>
            <span class="screenReader"><label for="checking" class="screenReader">don't</label><input type="text" name="checking" id="checking" class="screenReader" value="<?php if(isset($_POST['checking']))  echo $_POST['checking'];?>" /></span>
            <input type="hidden" name="submitted" id="submitted" value="true" />
            </fieldset>
        </li>
	</ul>
</form>
</div> 