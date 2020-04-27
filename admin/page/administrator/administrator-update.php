<?php
if (isset($_POST['submit'])) {
    $id = $_POST['id_update'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $fullname = $_POST['fullname'];

    mysqli_query($db, "UPDATE user SET username = '$username',
                                            password = '$password',
                                            fullname = '$fullname' WHERE id = '$id'");
    header('location: index.php?administrator');
}
$id_edit = $_GET['administrator-update'];
$edit = mysqli_query($db, "SELECT * FROM user WHERE id ='$id_edit'");
$row_edit = mysqli_fetch_assoc($edit);
$query = mysqli_query($db, "SELECT * FROM user ORDER BY id DESC");
?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Admin &raquo; Administrator</h1>
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
                        <form role="form" action="" method="post">
                            <div class="form-group">
                                <label>Username</label>
                                <input class="form-control" type="text" name="username" value="<?= $row_edit['username']; ?>" />
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input class="form-control" type="password" name="password" value="<?= $row_edit['password']; ?>" />
                            </div>
                            <div class="form-group">
                                <label>Fullname</label>
                                <input class="form-control" type="text" name="fullname" value="<?= $row_edit['fullname']; ?>" />
                            </div>
                            <input type="hidden" name="id_update" value="<?= $row_edit['id']; ?>" />
                            <button type="submit" name="submit" class="btn btn-success">Save</button>
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
                                <th>Username</th>
                                <th>Password</th>
                                <th>Fullname</th>
                                <th>Update</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (mysqli_num_rows($query) > 0) { ?>
                                <?php while ($row = mysqli_fetch_assoc($query)) { ?>
                                    <tr>
                                        <td><?= $row['username']; ?></td>
                                        <td><?= $row['password']; ?></td>
                                        <td><?= $row['fullname']; ?></td>
                                        <td class="center"><a href="index.php?administrator-update=<?= $row['id']; ?>" class="btn btn-primary btn-xs" type="button">Update</a></td>
                                        <td class="center"><a href="index.php?administrator-delete=<?= $row['id']; ?>" class="btn btn-primary btn-xs" type="button">Delete</a></td>
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