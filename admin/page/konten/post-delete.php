<?php
if (isset($_GET['post-delete'])) {
    $id = $_GET['post-delete'];
    mysqli_query($db, "DELETE FROM berita WHERE id = '$id'");
    header('location: index.php?post');
}
