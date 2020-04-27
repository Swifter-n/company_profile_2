<?php

if (isset($_POST['btn_search'])) {
    $_SESSION['session_search'] = $_POST['keyword'];
    $keyword = $_SESSION['session_search'];
} else {
    $keyword = $_SESSION['session_search'];
}


/** Pagination **/

$per_page = 4;
$cur_page = 1;

if (isset($_GET['page-search'])) {
    $cur_page = $_GET['page-search'];
    $cur_page = ($cur_page > 1) ? $cur_page : 1;
}
$total_data = mysqli_num_rows(mysqli_query($db, "SELECT * FROM berita WHERE judul LIKE '%$keyword%'"));
$total_page = ceil($total_data / $per_page);
$offset = ($cur_page - 1) * $per_page;

/** End Of Pagination **/

$query = mysqli_query($db, "SELECT * FROM berita WHERE judul LIKE '%$keyword%' ORDER BY id DESC LIMIT $per_page OFFSET $offset");
?>

<div class="container blog">
    <div class="row">
        <div class="col-md-8">
            <?php if (mysqli_num_rows($query) > 0) { ?>
                <?php while ($row = mysqli_fetch_assoc($query)) { ?>
                    <div class="col-md-4">
                        <img src="images/<?= $row['image']; ?>" class="card-img img-responsive" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><a href="index.php?detail=<?= $row['id']; ?>"><?= $row['judul']; ?></a></h5>
                            <p class="card-text"><?= text($row['description']); ?></p>
                            <a href="index.php?detail=<?= $row['id']; ?>" class="btn btn-primary pull-right">Read more</a>
                            <p class="card-text"><small class="text-muted"><?= $row['tanggal']; ?></small></p>
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
                        <a href="index.php?page-search=<?php echo $cur_page - 1; ?>" aria-label="Previous">
                            <span aria-hidden="true">Prev</span>
                        </a>
                    </li>
                <?php } else { ?>
                    <li class="disabled"><span aria-hidden="true">Prev</span></li>
                <?php } ?>
                <?php if ($cur_page < $total_page) { ?>
                    <li>
                        <a href="index.php?page-search=<?php echo $cur_page + 1; ?>" aria-label="Next">
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