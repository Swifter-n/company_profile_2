<?php
include '../function/config.php';
include '../function/helper.php';
ob_start();
session_start();
if (!isset($_SESSION['login_user'])) header('location: login.php');
?>
<!DOCTYPE html>
<html>
<script src="ckeditor/ckeditor.js"></script>
<?php
include("include/head.php") ?>


<body>
    <div id="wrapper">
        <?php include("include/header.php") ?>
        <div id="page-wrapper">
            <?php
            if (isset($_GET["post"])) include("page/konten/post.php");
            else if (isset($_GET["post-delete"])) include("page/konten/post-delete.php");
            else if (isset($_GET["post-update"])) include("page/konten/post-update.php");
            else if (isset($_GET["produk"])) include("page/konten/produk.php");
            else if (isset($_GET["produk-delete"])) include("page/konten/produk-delete.php");
            else if (isset($_GET["produk-update"])) include("page/konten/produk-update.php");
            else if (isset($_GET["undangan"])) include("page/konten/undangan.php");
            else if (isset($_GET["undangan-delete"])) include("page/konten/undangan-delete.php");
            else if (isset($_GET["undangan-update"])) include("page/konten/undangan-update.php");
            else if (isset($_GET["profile"])) include("page/konten/profile.php");
            else if (isset($_GET["profile-update"])) include("page/konten/profile-update.php");
            else if (isset($_GET["profile-delete"])) include("page/konten/profile-delete.php");
            else if (isset($_GET["open"])) include("page/konten/open-pdf.php");
            else if (isset($_GET["opens"])) include("page/konten/open-pdfs.php");
            else if (isset($_GET["kontak"])) include("page/konten/kontak.php");
            else if (isset($_GET["kontak-delete"])) include("page/konten/kontak-delete.php");
            else if (isset($_GET["user"])) include("page/user/index.php");
            else if (isset($_GET["visitor"])) include("page/konten/visitor.php");
            else if (isset($_GET["administrator"])) include("page/administrator/index.php");
            else if (isset($_GET["administrator-delete"])) include("page/administrator/administrator-delete.php");
            else if (isset($_GET["administrator-update"])) include("page/administrator/administrator-update.php");
            else include("page/home/index.php");
            ?>
        </div>
    </div>
    <?php include("include/footer.php") ?>
</body>

</html>
<?php
ob_end_flush();
?>