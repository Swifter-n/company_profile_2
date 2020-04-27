<?php
if (isset($_GET['profile-delete'])) {
    $id_delete = $_GET['profile-delete'];
    mysqli_query($db, "DELETE FROM profile WHERE id = '$id_delete'");
    header('location: index.php?profile');
}
