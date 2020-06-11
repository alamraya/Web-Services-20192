
<!doctype html>
<html lang="en" class="h-100">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Jekyll v3.8.5">
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous" />
  <!-- My Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Viga&display=swap" rel="stylesheet" />
  <!-- My css -->
  <link rel="stylesheet" href="style.css" />

  
  

  <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/sticky-footer/">

  <!-- Bootstrap core CSS -->
  <link href="assets/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <title>Register Form</title>

  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }
  </style>
  <!-- Custom styles for this template -->
  <link href="sticky-footer.css" rel="stylesheet">
</head>

<body class="d-flex flex-column h-100">
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-light">
    <div class="container">
      <a class="navbar-brand" href="#">Ekspedisi</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav ml-auto">
          

          <a class="nav-item nav-link" href="beranda.php">Back</a>
        </div>
      </div>
    </div>
  </nav>

  <!-- Akhir Navbar -->
  <!-- Begin page content -->
  <main role="main" class="flex-shrink-0">
    <div class="container">
      <h1 class="mt-5">Order Barang</h1>
      <p class="lead">Silahkan Daftarkan</p>
      <hr />
      <form method="post" action="pengiriman-api.php">

        <div class="form-group row">
          <label for="nama_pengirim" class="col-sm-2 col-form-label">Nama Pengirim</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="nama_pengirm" name="nama_pengirim" placeholder="Nama Pengirim">
          </div>
        </div>
         
        <div class="form-group row">
            <label for="asal" class="col-sm-2 col-form-label">Asal</label>
            <div class="col-sm-10">
            <select class="form-control" name='asal' id='asal'>
                <option>Asal</option>
                  <option value=""</option>
            </select>
            </div>
       </div>

        <div class= "form-group row">
            <label for="tujuan" class="col-sm-2 col-form-label"> Tujuan </label>
            <div class="col-sm-10">
            <select class="form-control" name='tujuan' id='tujuan'>
                <option>Tujuan</option>
                <option value=""</option>
            </select>
            </div>
         </div>
                    

        <div class="form-group row">
          <label for="nama_penerima" class="col-sm-2 col-form-label">Nama Penerima</label>
          <div class="col-sm-10">
            <input type="nama_penerima" class="form-control" id="nama_penerima" name="nama_penerima" placeholder="nama_penerima">
          </div>
        </div>

        <div class="form-group row">
            <label for="kurir" class="col-sm-2 col-form-label">Kurir</label>
            <div class="col-sm-10">
            <select class="form-control" id="kurir" name="kurir">
                  <option value="jne">JNE</option>
                  <option value="tiki">TIKI</option>
                  <option value="pos">POS INDONESIA</option>
                  </select>
                  </div>
            </div>

        <div class="form-group row">
              <label for="berat" class="col-sm-2 col-form-label">Berat (gram)</label>
              <div class="col-sm-10">
              <input class="form-control" id="berat" type="text" name="berat" value="500" />
              </div>
              </div>
              <div class="col-sm-10" class="col-sm-2 col-form-label">
              <button class="btn btn-success" id="harga" type="submit" name="button">Order</button>
              </div>
       </div>
        </div>
      </form>
    </div>
  </main>

   <!-- footer -->
   <div class="row footer">
      <div class="col text-center">
        <p>2020 All Rights Reserved by Kelompok 2.</p>
      </div>
    </div>
    <!-- Akhir footer -->
</body>
</html>
<script type="text/javascript">
 
 $(document).ready(function(){
 $("#harga").click(function(){
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
 
 }
 });
 });
 });
</script>