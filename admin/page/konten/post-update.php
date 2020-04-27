<?php
if (isset($_POST['submit'])) {
    $id = $_POST['id_update'];
    $title = $_POST['title'];
    $tgl = date('Y-m-d');
    $description = $_POST['description'];
    $file_name = $_FILES['file']['name'];
    $tmp_name = $_FILES['file']['tmp_name'];
    move_uploaded_file($tmp_name, "../images/" . $file_name);
    if ($file_name == "" || empty($file_name)) {
        mysqli_query($db, "UPDATE berita SET judul = '$title',
                                             tanggal ='$tgl',
                                             description = '$description' WHERE id = '$id'");
    } else {
        mysqli_query($db, "UPDATE berita SET judul = '$title',
                                            tanggal = '$tgl',
                                            description = '$description',
                                            image = '$file_name' WHERE id = '$id'");
    }
    header('location: index.php?post');
}
$id_edit = $_GET['post-update'];
$edit = mysqli_query($db, "SELECT * FROM berita WHERE id = '$id_edit'");
$row_edit = mysqli_fetch_assoc($edit);
$query = mysqli_query($db, "SELECT * FROM berita ORDER BY id DESC");
?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Berita &raquo; Update Berita</h1>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Input Data
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">
                        <form role="form" action="" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Title</label>
                                <input class="form-control" type="text" name="title" value="<?= $row_edit['judul']; ?>" />
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control" rows="3" name="description" id="text-ckeditor"><?= $row_edit['description']; ?></textarea>
                                 <script>CKEDITOR.replace('text-ckeditor');</script>
                            </div>
                            <div class="form-group">
                                <label>Image</label>
                                <?php if ($row_edit['image'] == "") {
                                    echo "<p><img src='asset/no-image.png' width='88'/></p>";
                                } else { ?>
                                    <p><img src="../images/<?= $row_edit['image']; ?>" width='88'></p>
                                <?php } ?>
                                <input type="file" name="file" />
                            </div>
                            <input type="hidden" name="id_update" value="<?= $row_edit['id']; ?>" />
                            <button type="submit" name="submit" class="btn btn-success">Update</button>
                            <button type="reset" class="btn btn-warning">Reset</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                List Data
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Image</th>
                                <th>Update</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (mysqli_num_rows($query) > 0) { ?>
                                <?php while ($row = mysqli_fetch_assoc($query)) { ?>
                                    <tr>
                                        <td><?= $row['judul']; ?></td>
                                        <td><?= $row['description']; ?></td>
                                        <td> <?php if ($row['image'] == "") {
                                                            echo "<img src='asset/no-image.png' width='88'";
                                                        } else { ?>
                                                <img src="../images/<?= $row['image']; ?>" width="88" class="img-responsive" />
                                            <?php } ?></td>
                                        <td class="center"><a href="index.php?post-update=<?= $row['id']; ?>" class="btn btn-primary btn-xs" type="button">Update</a></td>
                                        <td class="center"><a href="index.php?post-delete=<?= $row['id']; ?>" class="btn btn-primary btn-xs" type="button">Delete</a></td>
                                    </tr>
                                <?php } ?>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>