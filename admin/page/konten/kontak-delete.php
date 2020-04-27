<?php
if (isset($_GET['kontak-delete'])) {
    $id = $_GET['kontak-delete'];
    mysqli_query($db, "DELETE FROM kontak WHERE id = '$id'");
    header('location: index.php?kontak');
}
