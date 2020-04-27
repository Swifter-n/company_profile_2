<?php
if (isset($_GET['undangan-delete'])) {
    $id = $_GET['undangan-delete'];
    mysqli_query($db, "DELETE FROM undangan_rapat WHERE id = '$id'");
    header('location: index.php?undangan');
}
