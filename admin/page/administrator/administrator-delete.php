<?php
if (isset($_GET['administrator-delete'])) {
    $id = $_GET['administrator-delete'];
    mysqli_query($db, "DELETE FROM user WHERE id = '$id'");
    header('location: index.php?administrator');
}
