<?php
$detail_id = $_GET['detail'];
$query = mysqli_query($db, "SELECT * FROM berita WHERE id = '$detail_id'");
if (mysqli_num_rows($query) == 0) header("index.php");
$row_detail = mysqli_fetch_assoc($query);


?>

<div id="detail">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-3">
                    <img src="images/<?= $row_detail['image']; ?>" class="card-img-top img-thumbnail img-responsive" width="100" alt="<?= $row_detail['judul']; ?>">
                    <div class="card-body">
                        <h2 class="card-title"><?= $row_detail['judul']; ?></h2>
                        <p class="card-text"><small class="text-muted"><?= $row_detail['tanggal']; ?></small></p>
                        <p class="card-text"><?= $row_detail['description']; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><!-- End Of Detail -->