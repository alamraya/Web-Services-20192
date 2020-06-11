<?


if (isset($_POST['pengiriman'])) {
    $nama_pengirim = $_POST['nama_pengirim'];
    $asal = $_POST['asal'];
    $nama_penerima = $_POST['nama_penerima'];
    $tujuan = $_POST['tujuan'];
    $harga = $_POST['harga'];

    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => "http://localhost/rest-api-example/api/create.php",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => "{\n\t\"nama_pengirim\": \"$nama_pengirim\",\n\t\"asal\": \"$asal\",\n\t\"nama_penerima\": \"$nama_penerima\",\n\t\"tujuan\": \"$tujuan\"\n\t\"harga\": \"$harga\"\n}",
        CURLOPT_HTTPHEADER => array(
            "Content-Type: application/json"
        ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);

    $data = json_decode($response);

    header('location: beranda.php');
}