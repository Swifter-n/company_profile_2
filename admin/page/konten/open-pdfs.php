<?php
if (isset($_GET['opens'])) {
    $id = $_GET['opens'];

    $detail11 = mysqli_query($db, "SELECT * FROM undangan_rapat WHERE id ='$id'");
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
