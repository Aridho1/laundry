<?php

if (!session_id()) session_start();

// $db = new mysqli("0.0.0.0:3306", "root", "", "laundri_db");
$db = new mysqli("localhost", "root", "", "laundri_db");
$base_url = "../Public/index.php";

echo "<script>
  let base_url = '$base_url';
</script>";

// FUNCTION CRUD DB

function getAllData($query) {
  global $db;
  $result = mysqli_query($db, $query);
  $arrR = [];
  
  while ( $r = mysqli_fetch_assoc($result) ) {
    $arrR[] = $r;
  }

  return $arrR;
}

function addData($request, $type ="pesan") {
  global $db;

  $result = [
    "affected" => 0,
    "last-data" => ["massage" => "Request Failed!!\n"]
  ];

  // jika type nya pesan, request ke tabel pemesanan
  if ($type == "pesan") {
    $total_pelanggan = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM pemesanan ORDER BY id DESC LIMIT 1;
    "))["id"];
    $total_pelanggan += 1;
    $total_pelanggan = sprintf("%04d", $total_pelanggan);

    $kode = generateRandomHash(6) . $total_pelanggan;
    $nama = htmlspecialchars($request["nama"]);
    $telepon = htmlspecialchars($request["telepon"]);
    $paket = htmlspecialchars($request["paket"]);
    $harga = htmlspecialchars($request["harga"]);
    $berat = htmlspecialchars($request["berat"]);
    $total_harga = htmlspecialchars($request["total-harga"]);

    $query = "INSERT INTO pemesanan (
            id,
            kode_pemesanan, 
            nama, 
            telepon, 
            paket, 
            harga, 
            berat, 
            total_harga
            )
            VALUES (
              '',
              '$kode', 
              '$nama', 
              '$telepon', 
              '$paket', 
              '$harga', 
              '$berat', 
              '$total_harga'
            )";
    
    mysqli_query($db, $query);
    
    
    
    $result = [
      "affected" => mysqli_affected_rows($db), 
      "code" => $kode,
      "last-data" => mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM pemesanan ORDER BY id DESC LIMIT 1;
      "))
    ];

    return $result;
  
  // jika type adalah pelanggan, request ke tabel pelanggan
  } else if ($type == "pelanggan") {

    // $nama = htmlspecialchars($request["nama"]);
    // $no_hp = htmlspecialchars($request["no_hp"]);

    // // data pelanggan tidak boleh sama
    // $chechDuplicate = mysqli_query($db, "SELECT * FROM pelanggan WHERE nama = '$nama' AND no_hp = '$telepon'");
    // $duplicateData = false;
    // var_dump($chechDuplicate);
    // while ( $r = mysqli_fetch_assoc($chechDuplicate) ) {
    //   // script("alert(\"ERROR!!\nUNKOWN ERROR!!!\n\nDuplicate Data.\");");
    //   $duplicateData = true;
    //   break;
    // }

    // if ($duplicateData) $result["last-data"] += "Duplicate Data."; return $result;

    $nama = htmlspecialchars($request["nama"]);
    $no_hp = htmlspecialchars($request["no_hp"]);

    // Membuat prepared statement
    $stmt = mysqli_prepare($db, "SELECT * FROM pelanggan WHERE nama = ? AND no_hp = ?");

    // Bind parameter ke prepared statement
    mysqli_stmt_bind_param($stmt, "ss", $nama, $no_hp);

    // Eksekusi prepared statement
    mysqli_stmt_execute($stmt);

    // Ambil hasil dari prepared statement
    $checkDuplicate = mysqli_stmt_get_result($stmt);
    // Cek apakah ada datsa yang sama
    if (mysqli_num_rows($checkDuplicate) > 0) {
        // Ada data yang sama
        $duplicateData = true;

        $arrR = [];
  
        while ( $r = mysqli_fetch_assoc($checkDuplicate) ) {
          $arrR[] = $r;
        }
    } else {
        // Tidak ada data yang sama
        $duplicateData = false;
    }

    // Menghentikan prepared statement
    mysqli_stmt_close($stmt);

    if ($duplicateData) {
        // Lakukan sesuatu jika ada data yang sama
        // Contoh:
        $result["last-data"]["massage"] = "Request Failed!!\nDuplicate Data."; 
        return $result;
    }


    $query = "INSERT INTO pelanggan (
      nama, 
      no_hp
      )
      VALUES (
        '$nama', 
        '$no_hp'
      )";
    
    mysqli_query($db, $query);

    $result = [
      "affected" => mysqli_affected_rows($db),
      "last-data" => mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM pelanggan ORDER BY id DESC LIMIT 1;
      "))
    ];

    return $result;
  }
}

/*


Fatal error: Uncaught mysqli_sql_exception: Incorrect integer value: '' for column `laundri_db`.`pelanggan`.`id` at row 1 in /storage/emulated/0/htdocs/Acoding/WebLeague/Project/Laundry/Public/Support/function.php:152 Stack trace: #0 /storage/emulated/0/htdocs/Acoding/WebLeague/Project/Laundry/Public/Support/function.php(152): mysqli_query(Object(mysqli), 'INSERT INTO pel...') #1 /storage/emulated/0/htdocs/Acoding/WebLeague/Project/Laundry/Public/index.php(16): addData(Array, 'pelanggan') #2 {main} thrown in /storage/emulated/0/htdocs/Acoding/WebLeague/Project/Laundry/Public/Support/function.php on line 152


*/

// FUNCTION TAMBAHAN

function checkSessionLogin($isredirect = true) {
  global $base_url;

  // jika is_login tidak ada, buat var is_login menjadi false
  if (!isset($_SESSION["is_login"])) $_SESSION["is_login"] = false; $_SESSION["user_level"] = 0;

  // Jika redirect adalah true dan is_login adalah false
  // if ($isredirect && !$_SESSION["is_login"]) echo "<script>alert('Access Denied!!'); document.location.href = base_url + 'Form/Login/';</script>";
  if ($isredirect && !$_SESSION["is_login"]) script("alert('Access Denied!!'); document.location.href = base_url + 'Form/Login/';");
}

function script($scr) {
  echo "<script>" . $scr . "</script>";
}

function generateRandomHash($length) {
  // Daftar karakter yang akan digunakan untuk hash
  $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

  // Menghitung panjang karakter
  $charLength = strlen($characters);

  // Inisialisasi variabel untuk menyimpan hash
  $hash = '';

  // Menghasilkan hash random dengan panjang sesuai parameter
  for ($i = 0; $i < $length; $i++) {
      // Mengambil karakter acak dari daftar karakter
      $randomChar = $characters[rand(0, $charLength - 1)];

      // Menambahkan karakter acak ke hash
      $hash .= $randomChar;
  }

  // Mengembalikan hash yang dihasilkan
  return $hash;
}

?>





