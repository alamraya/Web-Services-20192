<?php
	if($user_id == false){
		$_SESSION["proses_pesanan"] = true;
		
		header("location: ".BASE_URL."index.php?page=login");
		exit;
	}
?>

<div id="frame-data-pengiriman">

	<h3 class="label-data-pengiriman">Alamat Pengiriman Barang</h3>
	
	<div id="frame-form-pengiriman">


	<?php

		//Get Data Kabupaten
		$curl = curl_init();	
		curl_setopt_array($curl, array(
		  CURLOPT_URL => "http://api.rajaongkir.com/starter/city",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "GET",
		  CURLOPT_HTTPHEADER => array(
			"key: 4c6b107bf7ca376823d2a1a899361752"
		  ),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		echo "<label>Kota Asal</label><br>";
		echo "<select name='asal' id='asal'>";
		echo "<option>Pilih Kota Asal</option>";
			$data = json_decode($response, true);
			for ($i=0; $i < count($data['rajaongkir']['results']); $i++) { 
				echo "<option value='".$data['rajaongkir']['results'][$i]['city_id']."'>".$data['rajaongkir']['results'][$i]['city_name']."</option>";
			}
		echo "</select><br><br><br>";
		//Get Data Kabupaten
		
		
		//-----------------------------------------------------------------------------
		
		//Get Data Provinsi
		$curl = curl_init();
		
		curl_setopt_array($curl, array(
		  CURLOPT_URL => "http://api.rajaongkir.com/starter/province",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "GET",
		  CURLOPT_HTTPHEADER => array(		
			"key: 4c6b107bf7ca376823d2a1a899361752"
		  ),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		echo "Provinsi Tujuan<br>";
		echo "<select name='provinsi' id='provinsi'>";
		echo "<option>Pilih Provinsi Tujuan</option>";
		$data = json_decode($response, true);
		for ($i=0; $i < count($data['rajaongkir']['results']); $i++) {
			echo "<option value='".$data['rajaongkir']['results'][$i]['province_id']."'>".$data['rajaongkir']['results'][$i]['province']."</option>";
		}
		echo "</select><br><br>";
		//Get Data Provinsi

	?>

		<div class="cek-ongkir">
		<label>Kabupaten Tujuan</label><br>
		<select id="kabupaten" name="kabupaten"></select><br><br>

		<label>Kurir</label><br>
		<select id="kurir" name="kurir">
			<option value="jne">JNE</option>
			<option value="tiki">TIKI</option>
			<option value="pos">POS INDONESIA</option>
		</select><br><br>

		<label>Berat (gram)</label><br>
		<input id="berat" type="text" name="berat" value="500" />
		<br><br>

		<input id="cek" type="submit" value="Cek"/>

		<div id="ongkir"></div>
		</div>
	
		<form action="<?php echo BASE_URL."proses_pemesanan.php"; ?>" method="POST">
		
			<div class="element-form">
				<label>Nama Penerima</label>
				<span><input type="text" name="nama_penerima" /></span>
			</div>		

			<div class="element-form">
				<label>Nomor Telepon</label>
				<span><input type="text" name="nomor_telepon" /></span>
			</div>		
			
			<div class="element-form">
				<label>Alamat Pengiriman</label>
				<span><textarea name="alamat"></textarea></span>
			</div>			
			
			<div class="element-form">
				<label>Kota</label>
				<span>
					<select name="kota">
						<?php
							$query = mysqli_query($koneksi, "SELECT * FROM kota");
							
							while($row=mysqli_fetch_assoc($query)){
								echo "<option value='$row[kota_id]'>$row[kota] (".rupiah($row["tarif"]).")</option>";
							}
						?>
					</select>
				</span>
			</div>			

			<div class="element-form">
				<span><input type="submit" value="submit" /></span>
			</div>			
			
		</form>
	</div>
</div>

<div id="frame-data-detail">
	<h3 class="label-data-pengiriman">Detail Order</h3>
	
	<div id="frame-detail-order">
		
		<table class="table-list">
			<tr>
				<th class='kiri'>Nama Barang</th>
				<th class='tengah'>Qty</th>
				<th class='kanan'>Total</th>
			</tr>
			
			<?php
				$subtotal = 0;
				
				foreach($keranjang AS $key => $value){
					
					$barang_id = $key;
					
					$nama_barang = $value['nama_barang'];
					$harga = $value['harga'];
					$quantity = $value['quantity'];
					
					$total = $quantity * $harga;
					$subtotal = $subtotal + $total;
					
					echo "<tr>
							<td class='kiri'>$nama_barang</td>
							<td class='tengah'>$quantity</td>
							<td class='kanan'>".rupiah($total)."</td>
						</tr>";
				}
				echo "<tr id='totalOngkir'></tr>";
				echo "<tr id='subTotal'></tr>";
				echo "<tr id='totalOld'>
						<td colspan='2' class='kanan'><b>Sub Total</b></td>
						<td class='kanan'><b>".rupiah($subtotal)."</b></td>
					 </tr>";				
				
			?>
			
		</table>
		
	</div>
</div>




<script type="text/javascript">

	$(document).ready(function(){

		$('#provinsi').change(function(){

			//Mengambil value dari option select provinsi kemudian parameternya dikirim menggunakan ajax 
			var prov = $('#provinsi').val();

      		$.ajax({
            	type : 'GET',
           		url : 'http://localhost/weshop/function/cek_kabupaten.php',
            	data :  'prov_id=' + prov,
					success: function (data) {

					//jika data berhasil didapatkan, tampilkan ke dalam option select kabupaten
					$("#kabupaten").html(data);
				}
          	});
		});

		function formatRupiah(bilangan){
			var	number_string = bilangan.toString(),
				sisa 	= number_string.length % 3,
				rupiah 	= number_string.substr(0, sisa),
				ribuan 	= number_string.substr(sisa).match(/\d{3}/g);
					
			if (ribuan) {
				separator = sisa ? '.' : '';
				return rupiah += separator + ribuan.join('.');
			}
		}

		$("#cek").click(function(){
			//Mengambil value dari option select provinsi asal, kabupaten, kurir, berat kemudian parameternya dikirim menggunakan ajax 
			var asal = $('#asal').val();
			var kab = $('#kabupaten').val();
			var kurir = $('#kurir').val();
			var berat = $('#berat').val();

			var dataResult;

      		$.ajax({
            	type : 'POST',
           		url : 'http://localhost/weshop/function/cek_ongkir.php',
            	data :  {'kab_id' : kab, 'kurir' : kurir, 'asal' : asal, 'berat' : berat},
					success: function (data) {

					$('#totalOld').hide();

					dataResult = JSON.parse(data);
					var ongkir = dataResult.rajaongkir.results[0].costs[0].cost[0].value;
					//jika data berhasil didapatkan, tampilkan ke dalam element div ongkir
					// $("#ongkir").text(ongkir);

					var tdOngkir = "<td colspan='2' class='kanan'><b>Ongkos Kirim</b></td><td class='kanan'><b> Rp. "+formatRupiah(ongkir)+"</b></td>";  
					$('#totalOngkir').html(tdOngkir);

					var subTotal = "<?php echo $subtotal; ?>";
					var total = parseInt(subTotal) + ongkir;

					var tdSubTotal = "<td colspan='2' class='kanan'><b>Sub Total</b></td><td class='kanan'><b> Rp. "+formatRupiah(total)+"</b></td>";  
					$('#subTotal').html(tdSubTotal);


				}
          	});
		});
	});
</script>