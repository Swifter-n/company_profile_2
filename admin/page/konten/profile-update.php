<?php
if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $tgl = date("Y-m-d");

    mysqli_query($db, "UPDATE profile SET title = '$title',
                                          description = '$description',
                                          tanggal = '$tgl' WHERE id = '$id'");
    header("location: index.php?profile");
}
$query = mysqli_query($db, "SELECT * FROM profile ORDER BY id DESC");

$edit = $_GET['profile-update'];
$update = mysqli_query($db, "SELECT * FROM profile WHERE id = '$edit'");
$row_edit = mysqli_fetch_assoc($update);
?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
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
                                    <input class="form-control" type="text" name="title" value="<?= $row_edit['title']; ?>" />
                                </div>
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea class="form-control" rows="3" name="description" id="text-ckeditor"><?= $row_edit['description']; ?></textarea>
                                    <script>
                                        CKEDITOR.replace('text-ckeditor');
                                    </script>
                                </div>
                                <button type="submit" name="submit" class="btn btn-success">Update</button>
                                <button type="reset" class="btn btn-warning">Reset</button>
                                <input type="hidden" name="id" value="<?= $row_edit['id']; ?>" />
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
                                    <th>Update</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (mysqli_num_rows($query) > 0) { ?>
                                    <?php while ($row = mysqli_fetch_assoc($query)) { ?>
                                        <tr>
                                            <td><?= $row['title']; ?></td>
                                            <td><?= $row['description']; ?></td>
                                            <td class="center"><a href="index.php?profile-update=<?= $row['id']; ?>" class="btn btn-primary btn-xs" type="button">Update</a></td>
                                            <td class="center"><a href="index.php?profile-delete=<?= $row['id']; ?>" class="btn btn-primary btn-xs" type="button">Delete</a></td>
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
</div>