<?php
if (isset($_POST['submit'])) {
    $id_update = $_POST['id_update'];
    $title = $_POST['title'];
    $tgl = date('Y-m-d');
    $folder_path = '../media/';
    $filename = basename($_FILES['file']['name']);
    $newname = $folder_path . $filename;

    $FileType = pathinfo($newname, PATHINFO_EXTENSION);

    if ($FileType == "pdf") {
        if (move_uploaded_file($_FILES['file']['tmp_name'], $newname)) {
            $filesql = "UPDATE undangan_rapat SET judul = '$title',
            tanggal = '$tgl',
            nama_file = '$filename' WHERE id = '$id_update'";
            $fileresult = mysqli_query($db, $filesql);

            if (isset($fileresult)) {
                echo 'File Uploaded';
            } else {
                echo 'Something went Wrong';
            }
        } else {
            echo "<p>Upload Failed.</p>";
        }
    } else {
        $filesql = "UPDATE undangan_rapat SET judul = '$title',
        tanggal = '$tgl' WHERE id = '$id_update'";
        $fileresult = mysqli_query($db, $filesql);
    }
    header('location: index.php?undangan');
}
$id_edit = $_GET['undangan-update'];
$edit = mysqli_query($db, "SELECT * FROM undangan_rapat WHERE id = '$id_edit'");
$row_edit = mysqli_fetch_assoc($edit);
$query = mysqli_query($db, "SELECT * FROM undangan_rapat ORDER BY id DESC");
?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Update &raquo; Undangan Rapat</h1>
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
                                <label>File Name</label>
                                <p><?= $row_edit['nama_file']; ?></p>
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
                                <th>File Name</th>
                                <th>Update</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (mysqli_num_rows($query) > 0) { ?>
                                <?php while ($row = mysqli_fetch_assoc($query)) { ?>
                                    <tr>
                                        <td><?= $row['judul']; ?></td>
                                        <td> <?php if ($row['nama_file'] == "") {
                                                            echo "<img src='asset/no-image.png' width='88'";
                                                        } else { ?>
                                                <a href="index.php?opens=<?= $row['id']; ?>" target="_blank"><?= $row['nama_file']; ?></a>
                                            <?php } ?></td>
                                        <td class="center"><a href="index.php?undangan-update=<?= $row['id']; ?>" class="btn btn-primary btn-xs" type="button">Update</a></td>
                                        <td class="center"><a href="index.php?undangan-delete=<?= $row['id']; ?>" class="btn btn-primary btn-xs" type="button">Delete</a></td>
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