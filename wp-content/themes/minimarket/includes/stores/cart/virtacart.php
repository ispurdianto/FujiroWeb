<?php 
/*  
virtacart 
Description   : Toko Online Wordpress
Version       : 1.0.0
Author        : Virtarich
Author URI    : http://theme-id.com 
Cart based on : http://conceptlogic.com/jcart/ 
*/
class virtacart {
	public  $config    = array();
	private $items     = array();
	private $names     = array();
	private $pilihans  = array();
	private $prices    = array();
	private $qtys      = array();
	private $urls      = array();
	private $newItems  = 0;
	private $newPrices  = 0;
	private $totalHarga  = 0;
	private $totalBerat  = 0;
	private $totalBarang = 0;

	function __construct() {
		$config['item']['id']             = 'virtarich-item-id'; 
		$config['item']['name']           = 'virtarich-item-name';
		$config['item']['pilihan']        = 'virtarich-item-pilihan';
		$config['item']['price']          = 'virtarich-item-price';
		$config['item']['qty']            = 'virtarich-item-qty';
		$config['item']['berat']          = 'virtarich-item-berat';
		$config['item']['url']            = 'virtarich-item-url';
		$config['item']['add']            = 'virtarich-button';
		$this->config = $config;
	}

	public function get_contents() {
		$items = array();
		foreach($this->items as $tmpItem) {
			$item = null;
			$item['id']       = $tmpItem;
			$item['name']     = $this->names[$tmpItem];
			$item['pilihan']  = $this->pilihans[$tmpItem];
			$item['price']    = $this->prices[$tmpItem];
			$item['berat']    = $this->berats[$tmpItem];
			$item['qty']      = $this->qtys[$tmpItem];
			$item['url']      = $this->urls[$tmpItem];
			$item['totalHarga'] = $item['price'] * $item['qty'];
			$item['totalBerat'] = $item['berat'] * $item['qty'];
			$items[]          = $item;
		}
		return $items;
	}

	private function add_item($id, $name,$pilihan, $price, $berat, $qty = 1, $url) {
		$validPrice = false;
		$validQty = false;

		if (is_numeric($price)) {
			$validPrice = true;
		}

		if (filter_var($qty, FILTER_VALIDATE_INT) && $qty > 0) {
			$validQty = true;
		}

		if ($validPrice !== false && $validQty !== false) {
             if(isset($this->qtys[$id]) &&  $this->qtys[$id] > 0) {
				$this->qtys[$id] += $qty;
				$this->update_totalHarga();
			}
			else {
				$this->items[]     = $id;
				$this->names[$id]  = $name;
				$this->pilihans[$id]  = $pilihan;
				$this->prices[$id] = $price;
				$this->berats[$id] = $berat;
				$this->qtys[$id]   = $qty;
				$this->urls[$id]   = $url;
			}
			$this->update_totalHarga();
			return true;
		}
		elseif ($validPrice !== true) {
			$errorType = 'price';
			return $errorType;
		}
		elseif ($validQty !== true) {
			$errorType = 'qty';
			return $errorType;
		}
	}

	private function update_item($id, $qty) {
		if ((int) $qty === 0) {
			$validQty = true;
		}
		elseif (filter_var($qty, FILTER_VALIDATE_INT))	{
			$validQty = true;
		}
		if ($validQty === true) {
			if($qty < 1) {
				$this->remove_item($id);
			}
			else {
				$this->qtys[$id] = $qty;
			}
			$this->update_totalHarga();
			return true;
		}
	}
	private function remove_item($id) {
		$tmpItems = array();
		unset($this->names[$id]);
		unset($this->pilihans[$id]);
		unset($this->prices[$id]);
		unset($this->berats[$id]);
		unset($this->qtys[$id]);
		unset($this->urls[$id]);
		foreach($this->items as $item) {
			if($item != $id) {
				$tmpItems[] = $item;
			}
		}
		$this->items = $tmpItems;
		$this->update_totalHarga();
	}

	public function empty_cart() {
		$this->items     = array();
		$this->names     = array();
		$this->pilihans  = array();
		$this->prices    = array();
		$this->berats    = array();
		$this->qtys      = array();
		$this->urls      = array();
		$this->totalHarga  = 0;
		$this->totalBerat  = 0;
		$this->totalBarang = 0;
	}

	public function update_cart() {
		if (is_array($_POST['virtacartItemQty'])) {
			$qtys = implode($_POST['virtacartItemQty']);
		}
		if (isset($_POST['virtacartItemId'])) {
			$validQtys = false;
			if (filter_var($qtys, FILTER_VALIDATE_INT) || $qtys == '') {
				$validQtys = true;
			}
			if ($validQtys === true) {
				$count = 0;
				foreach ($_POST['virtacartItemId'] as $id) {
					$qty = $_POST['virtacartItemQty'][$count];
					if($qty < 1) {
						$this->remove_item($id);
					}
					else {
						$this->update_item($id, $qty);
					}
					$count++;
				}
				return true;
			}
		}
		elseif (!isset($_POST['virtacartItemId'])) {
			return true;
		}
	}

	private function update_totalHarga() {
		$this->totalBarang = 0;
		$this->totalHarga  = 0;
		$this->totalBerat  = 0;
		if(sizeof($this->items > 0)) {
			foreach($this->items as $item) {
				$this->totalHarga += ($this->qtys[$item] * $this->prices[$item]);
				$this->totalBerat += ($this->qtys[$item] * $this->berats[$item]);
				$this->totalBarang += $this->qtys[$item];
			}
		}
	}
	
	public function display_cart() {
		$config = $this->config; 
		$id    = $config['item']['id'];
		$name  = $config['item']['name'];
		$pilihan  = $config['item']['pilihan'];
		$price = $config['item']['price'];
		$berat = $config['item']['berat'];
		$qty   = $config['item']['qty'];
		$url   = $config['item']['url'];
		$add   = $config['item']['add'];
		$config['csrfToken']  = true;
		if(isset($_POST[$id])){
		$id    = $_POST[$id];
		$name  = $_POST[$name];
		$pilihan  = $_POST[$pilihan];
		$price = $_POST[$price];
		$berat = $_POST[$berat];
		$qty   = $_POST[$qty];
		$url   = $_POST[$url];

		$virtacartToken = $_POST['virtacartToken'];
        }
		if(!isset($_SESSION['virtacartToken'])){
			$_SESSION['virtacartToken'] = md5(session_id() . time() . $_SERVER['HTTP_USER_AGENT']);
		}
		if ($config['csrfToken'] === 'true' && $_POST && $virtacartToken != $_SESSION['virtacartToken']) {
			$errorMessage = 'Invalid token!' . $virtacartToken . ' / ' . $_SESSION['virtacartToken'];
		}
				
		$id    = filter_var($id, FILTER_SANITIZE_SPECIAL_CHARS, FILTER_FLAG_STRIP_LOW);
		$name  = filter_var($name, FILTER_SANITIZE_SPECIAL_CHARS, FILTER_FLAG_STRIP_LOW);
		$pilihan  = filter_var($pilihan, FILTER_SANITIZE_SPECIAL_CHARS, FILTER_FLAG_STRIP_LOW);
		$url   = filter_var($url, FILTER_SANITIZE_URL);
          if (isset($_POST[$add])) {
			$itemAdded = $this->add_item($id, $name,$pilihan, $price, $berat, $qty, $url);
		}
          if (isset($_POST['virtacartUpdate'])) {
			$itemUpdated = $this->update_item($_POST['itemId'], $_POST['itemQty']);
		}
          if(isset($_POST['virtacartUpdateCart']) || isset($_POST['virtacartCheckout']))   {
			$cartUpdated = $this->update_cart();
		}
          if(isset($_GET['virtacartRemove']) && !$_POST) {
			$this->remove_item($_GET['virtacartRemove']);
		}
          if(isset($_POST['virtacartEmpty'])) {
			$this->empty_cart();
		}
          if ((isset($_SESSION['quantityError']) && $_SESSION['quantityError'] === true)) {
             unset($_SESSION['quantityError']);
          }

		$mataUang = 'Rp ';
		$kataHapus = 'Hapus';
		$kataJumlah = 'jml';
		$kataNamabarang = 'Barang';
		$kataBerat = 'Berat (Kg)';

		echo "<input type='hidden' name='virtacartToken' value='{$_SESSION['virtacartToken']}' />\n";
		echo "<table class='table'>\n";
		echo "<thead><tr><th>$kataJumlah</th><th>$kataNamabarang</th><th>$kataBerat</th><th>Total</th></tr></thead>\n";

		echo "<tbody>\n";
		if($this->totalBarang > 0) {
			foreach($this->get_contents() as $item)	{
				echo "\n<tr>\n";
				
				echo "<td>";
				echo "<input id='virtacartItemQty-{$item['id']}' name='virtacartItemQty[]' size='1' type='text' value='{$item['qty']}' />";
				echo "<input name='virtacartItemId[]' type='hidden' value='{$item['id']}' />";
				echo "</td>\n";
				
				echo "<td>";
				echo "<a href='{$item['url']}'>{$item['name']}</a><br/>";
				echo "<input name='virtacartItemName[]' type='hidden' value='{$item['name']}' />\n";
				echo "<strong>{$item['pilihan']} </strong>";
				echo "<input name='virtacartItemName[]' type='hidden' value='{$item['pilihan']}' />\n";
				echo "</td>\n";
				
				echo "<td>" .number_format($item['totalBerat'], 2, ',', '.');
				echo "<input name='virtacartItemBerat[]' type='hidden' value='{$item['berat']}' /></td>\n";
				
				echo "<td>$mataUang".number_format($item['totalHarga'], 0, ',', '.');
				echo "<input name='virtacartItemPrice[]' type='hidden' value='{$item['price']}' /><br/>";
				echo "<a class='virtacart-remove' href='?virtacartRemove={$item['id']}'>$kataHapus</a>\n";
				echo "</td>\n";
				
				echo "</tr>\n";
			}
		}
		else {
			echo "<tr><td colspan='4'>keranjang anda kosong</td></tr>\n";
		}
		echo "</tbody>\n";

		echo "<tfoot><tr>";
		
		echo "<th><span id='xtotalBarang'>". number_format($this->totalBarang, 0, ',', '.').'</span>';
		echo "<input name='totalBarang' id='totalBarang' type='hidden' value='{$this->totalBarang}' /></th>";
		
		echo "<th>\n";
		
		echo "<th>" . number_format($this->totalBerat, 2, ',', '.');
		echo "<input name='totalBerat' id='totalBerat' type='hidden' value='". number_format($this->totalBerat, 2, '.', ',')."' /></th>";
		
		echo "<th><span id='xtotalHarga'>$mataUang" . number_format($this->totalHarga, 0, ',', '.').'</span>';
		echo "<input name='totalHarga' id='totalHarga' type='hidden' value='{$this->totalHarga}' /></th>";
		
		echo "</tr></tfoot>\n";		

		echo "</table>";
		echo "<div id='virtacart-betul'></div>";
		echo "<div id='virtacart-salah'></div>";
	}
}
?>