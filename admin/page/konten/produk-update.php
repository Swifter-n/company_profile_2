<?php
if (isset($_POST['submit'])) {
    $id_update = $_POST['id_update'];
    $title = $_POST['title'];
    $tgl = date('Y-m-d');
    $jenis = $_POST['jenis'];
    $folder_path = '../media/';
    $filename = basename($_FILES['file']['name']);
    $newname = $folder_path . $filename;

    $FileType = pathinfo($newname, PATHINFO_EXTENSION);

    if ($FileType == "pdf") {
        if (move_uploaded_file($_FILES['file']['tmp_name'], $newname)) {
            $filesql = "UPDATE produk_hukum SET judul = '$title',
            tanggal = '$tgl',
            jenis_hukum = '$jenis',
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
        $filesql = "UPDATE produk_hukum SET judul = '$title',
        tanggal = '$tgl',
        jenis_hukum = '$jenis' WHERE id = '$id_update'";
        $fileresult = mysqli_query($db, $filesql);
    }
    header('location: index.php?produk');
}
$id_edit = $_GET['produk-update'];
$edit = mysqli_query($db, "SELECT * FROM produk_hukum WHERE id = '$id_edit'");
$row_edit = mysqli_fetch_assoc($edit);
$query = mysqli_query($db, "SELECT * FROM produk_hukum ORDER BY id DESC");
?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Konten &raquo; Produk Hukum</h1>
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
                                <label>Jenis Hukum</label>
                                <select class="form-control" name="jenis">
                                    <option value="<?= $row_edit['jenis_hukum']; ?>"> <?= $row_edit['jenis_hukum']; ?></option>
                                    <option value="peraturan">Peraturan Gubernur</option>
                                    <option value="keputusan">Keputusan Gubernur</option>
                                    <option value="instruksi">Instruksi Gubernur</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>File Name</label>
                                <p><?= $row_edit['nama_file']; ?></p>
                                <input type="file" name="file" />
                            </div>
                            <input type="hidden" name="id_update" value="<?= $row_edit['id']; ?>" />
                            <button type="submit" name="submit" class="btn btn-success">update</button>
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
                                <th>Jenis Hukum</th>
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
                                        <td><?= $row['jenis_hukum']; ?></td>
                                        <td> <?php if ($row['nama_file'] == "") {
                                                            echo "<img src='asset/no-image.png' width='88'";
                                                        } else { ?>
                                                <a href="index.php?open=<?= $row['id']; ?>" target="_blank"><?= $row['nama_file']; ?></a>
                                            <?php } ?></td>
                                        <td class="center"><a href="index.php?produk-update=<?= $row['id']; ?>" class="btn btn-primary btn-xs" type="button">Update</a></td>
                                        <td class="center"><a href="index.php?produk-delete=<?= $row['id']; ?>" class="btn btn-primary btn-xs" type="button">Delete</a></td>
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