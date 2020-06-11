
<!DOCTYPE html>
<html lang="en" dir="ltr">
 <head>
 <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous" />
    <!-- My Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Viga&display=swap" rel="stylesheet" />
    <!-- My css -->
    <link rel="stylesheet" href="style.css" />

    

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
 <link rel="stylesheet" href="assets/css/bootstrap.min.css">
 <title>Ekspedisi</title>
 </head>
 <body>
     <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="#">Ekspedisi</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav ml-auto">
         

          <a class="nav-item nav-link " href="beranda.php">Back</a>
        </div>
        </div>
    </nav>

    <!-- Akhir Navbar -->
 <br>
 <div class="container">
      <h1 class="mt-5">Cek Ongkir</h1>
      <hr/>
 <div>
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
 "key:9568b43e4d51fc6cdf4222ec56fe7ec6"
 ),
 ));
 
 $response = curl_exec($curl);
 $err = curl_error($curl);
 
 curl_close($curl);
 echo "
 <div class= \"form-group row\">
 <label for=\"asal\">Kota/Kabupaten Asal </label>
 <select class=\"form-control\" name='asal' id='asal'>";
 echo "<option>Pilih Kota Asal</option>";
 $data = json_decode($response, true);
 for ($i=0; $i < count($data['rajaongkir']['results']); $i++) {
 echo "<option value='".$data['rajaongkir']['results'][$i]['city_id']."'>".$data['rajaongkir']['results'][$i]['city_name']."</option>";
 }
 echo "</select>
 </div>";
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
 "key:9568b43e4d51fc6cdf4222ec56fe7ec6"
 ),
 ));
 $response = curl_exec($curl);
 $err = curl_error($curl);
 
 echo "
 <div class= \"form-group row\">
 <label for=\"provinsi\">Provinsi Tujuan </label>
 <select class=\"form-control\" name='provinsi' id='provinsi'>";
 echo "<option>Pilih Provinsi Tujuan</option>";
 $data = json_decode($response, true);
 for ($i=0; $i < count($data['rajaongkir']['results']); $i++) {
 echo "<option value='".$data['rajaongkir']['results'][$i]['province_id']."'>".$data['rajaongkir']['results'][$i]['province']."</option>";
 }
 echo "</select>
 </div>";
 //Get Data Provinsi
 ?>
 
 <div class="form-group row">
 <label for="kabupaten">Kota/Kabupaten Tujuan</label><br>
 <select class="form-control" id="kabupaten" name="kabupaten"></select>
 </div>

 <div class="form-group row">
 <label for="kurir">Kurir</label><br>
 <select class="form-control" id="kurir" name="kurir">
 <option value="jne">JNE</option>
 <option value="tiki">TIKI</option>
 <option value="pos">POS INDONESIA</option>
 </select>
 </div>

 <div class="form-group row">
 <label for="berat">Berat (gram)</label><br>
 <input class="form-control" id="berat" type="text" name="berat" value="500" />
 </div>
 <button class="btn btn-success" id="cek" type="submit" name="button">Cek Ongkir</button>
 </div>
 </div>
 </div>
 </div>
 <div class="container">
      <h1 class="mt-5">Hasil</h1>
      <hr />
 </div>
 <ol>
 <div id="ongkir"></div>
 </div>
 </ol>
 </div>
 </div>
 </div>
 <!-- footer -->
 <div class="row footer">
      <div class="col text-center">
        <p>2020 All Rights Reserved by Kelompok 2.</p>
      </div>
    </div>
    <!-- Akhir footer -->

 </div>
 </div>
 </body>
</html>
<script type="text/javascript">
 
 $(document).ready(function(){
 $('#provinsi').change(function(){
 
 //Mengambil value dari option select provinsi kemudian parameternya dikirim menggunakan ajax
 var prov = $('#provinsi').val();
 
 $.ajax({
 type : 'GET',
 url : 'http://localhost/app_login_register_fix/cekongkir/cek_kabupaten.php',
 data : 'prov_id=' + prov,
 success: function (data) {
 
 //jika data berhasil didapatkan, tampilkan ke dalam option select kabupaten
 $("#kabupaten").html(data);
 }
 });
 });
 
 $("#cek").click(function(){
 //Mengambil value dari option select provinsi asal, kabupaten, kurir, berat kemudian parameternya dikirim menggunakan ajax
 var asal = $('#asal').val();
 var kab = $('#kabupaten').val();
 var kurir = $('#kurir').val();
 var berat = $('#berat').val();
 
 $.ajax({
 type : 'POST',
 url : 'http://localhost/app_login_register_fix/cekongkir/cek_ongkir.php',
 data : {'kab_id' : kab, 'kurir' : kurir, 'asal' : asal, 'berat' : berat},
 success: function (data) {
 
 //jika data berhasil didapatkan, tampilkan ke dalam element div ongkir
 $("#ongkir").html(data);
 }
 });
 });
 });
</script>