<?php
if (isset($_GET['open'])) {
    $id = $_GET['open'];

    $detail11 = mysqli_query($db, "SELECT * FROM produk_hukum WHERE id ='$id'");
    $d11 = mysqli_fetch_array($detail11);
    $file2 = $d11[nama_file];
    $file = "../media/$file2"; //lokasi file disimpan
    header('Content-type: application/pdf');
    header('Content-Disposition: inline; filename="$file "');
    header('Content-Length: ' . filesize($file));
    ob_clean();
    flush();
    readfile($file);
    exit;
}
