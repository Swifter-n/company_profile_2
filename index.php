<?php
session_start();
ob_start();
include 'function/config.php';
include 'function/helper.php';
// Jenis Browser
$browser = $_SERVER['HTTP_USER_AGENT'];
$chrome = '/Chrome/';
$firefox = '/Firefox/';
$ie = '/IE/';
if (preg_match($chrome, $browser))
  $data = "Chrome/Opera";
if (preg_match($firefox, $browser))
  $data = "Firefox";
if (preg_match($ie, $browser))
  $data = "IE";

// untuk mengambil informasi dari pengunjung
$ipaddress = $_SERVER['REMOTE_ADDR'] . "";
$browser = $data;
$tanggal = date('Y-m-d');
$kunjungan = 1;
// Daftarkan Kedalam Session Lalu Simpan Ke Database
if (!isset($_SESSION['counterdb'])) {
  $_SESSION['counterdb'] = $ipaddress;
  mysqli_query($db, "INSERT INTO counterdb (tanggal,ip_address,counter,browser) VALUES ('" . $tanggal . "','" . $ipaddress . "','" . $kunjungan . "','" . $browser . "')");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>Biro keso DKI Jakarta</title>

  <!-- CSS-->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/custom.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.2.0/css/uikit.min.css" />

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=PT+Sans" rel="stylesheet">

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body onload="">
  <?php
  include 'view/header.php';
  ?>

  <?php
  if (isset($_GET['detail'])) {
    include "pages/detail.php";
  } else if (isset($_GET['news']) || isset($_GET['page'])) {
    include "pages/news.php";
  } else if (isset($_GET['profil'])) {
    include "pages/profil.php";
  } else if (isset($_GET['produk'])) {
    include 'pages/produk.php';
  } else if (isset($_GET['contact'])) {
    include 'pages/contact.php';
  } else if (isset($_GET['openi'])) {
    include 'pages/openpdf.php';
  } else if (isset($_GET['opens'])) {
    include 'pages/open-pdfs.php';
  } else if (isset($_GET['search']) || isset($_GET['page-search'])) {
    include "pages/search.php";
  } else {
    include "pages/home.php";
  }
  ?>

  <?php include 'view/footer.php'; ?>

  <?php
  ob_end_flush();
  mysqli_close($db);

  ?>

  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="js/bootstrap.min.js"></script>
  <script src="js/custome.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.2.0/js/uikit.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.2.0/js/uikit-icons.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.2.228/pdf_viewer.js"></script>


</body>

</html>