<?php
$per_page = 4;
$cur_page = 1;
if (isset($_GET['page'])) {
    $cur_page = $_GET['page'];
    $cur_page = ($cur_page > 1) ? $cur_page : 1;
}
$total_data = mysqli_num_rows(mysqli_query($db, "SELECT * FROM berita"));
$total_page = ceil($total_data / $per_page);
$offset = ($cur_page - 1) * $per_page;

/** End Of Pagination **/
$query2 = mysqli_query($db, "SELECT * FROM undangan_rapat ORDER BY id ");
$berita = mysqli_query($db, "SELECT * FROM berita ORDER BY id DESC LIMIT $per_page OFFSET $offset");

?>

<?php include 'view/slider.php'; ?>
<div class="container blog">
    <div class="row">
        <div class="col-md-12">
            <?php if (mysqli_num_rows($berita) > 0) { ?>
                <?php while ($row = mysqli_fetch_assoc($berita)) { ?>
                    <div class="col-md-4">
                        <img src="images/<?= $row['image']; ?>" class="card-img img-responsive" alt="...">
                    </div>
                    <div class="col-md-12">
                        <div class="card-body">
                            <h3 class="card-title"><a href="index.php?detail=<?= $row['id']; ?>"><?= $row['judul']; ?></a></h3>
                            <p class="card-text"><?= news($row['description']); ?></p>
                            <a href="index.php?detail=<?= $row['id']; ?>" class="btn btn-primary pull-right">Read more</a>
                            <p class="card-text"><small class="text-muted"><?= tgl_indo($row['tanggal']); ?></small></p>
                        </div>
                    </div>
                <?php } ?>
            <?php } ?>
        </div>
    </div>
</div>
<?php if (isset($total_page)) { ?>
    <?php if ($total_page > 1) { ?>
        <nav class="text-center">
            <ul class="pagination">
                <?php if ($cur_page > 1) { ?>
                    <li>
                        <a href="index.php?page=<?php echo $cur_page - 1; ?>" aria-label="Previous">
                            <span aria-hidden="true">Prev</span>
                        </a>
                    </li>
                <?php } else { ?>
                    <li class="disabled"><span aria-hidden="true">Prev</span></li>
                <?php } ?>
                <?php if ($cur_page < $total_page) { ?>
                    <li>
                        <a href="index.php?page=<?php echo $cur_page + 1; ?>" aria-label="Next">
                            <span aria-hidden="true">Next</span>
                        </a>
                    </li>
                <?php } else { ?>
                    <li class="disabled"><span aria-hidden="true">Next</span></li>
                <?php } ?>
            </ul>
        </nav>

    <?php } ?>
<?php } ?>