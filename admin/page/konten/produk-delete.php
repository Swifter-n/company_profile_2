<?php
if (isset($_GET['produk-delete'])) {
    $id = $_GET['produk-delete'];
    mysqli_query($db, "DELETE FROM produk_hukum WHERE id = '$id'");
    header('location: index.php?produk');
}
