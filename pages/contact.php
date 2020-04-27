<?php
if (isset($_POST['submit'])) {
    $tgl = date('Y-m-d');
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    mysqli_query($db, "INSERT INTO kontak VALUES('', '$tgl', '$nama', '$email', '$message')");
    header("location: index.php?contact&success");
}

?>
<div id="kontak">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-6">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.6195360928123!2d106.826406314769!3d-6.181648995524707!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f42e09439117%3A0x3adf1e5f50d2c1e6!2sSekretariat%20Daerah%20Pemerintah%20Provinsi%20DKI%20Jakarta%20-%20Biro%20Hukum!5e0!3m2!1sen!2sid!4v1568648394165!5m2!1sen!2sid" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                </div>

                <div class="col-md-6">
                    <h4 class="">Contact Us</h4>
                    <form class="form-horizontal navbar-center" method="POST">
                        <?php if (isset($_GET['success'])) { ?>
                            <div class="form-group">
                                <div class="col-sm-10 text-center">
                                    <div class="alert alert-success" role="alert">Thank you for Feedback</div>
                                </div>
                            </div>
                        <?php } ?>
                        <div class="form-group">
                            <div class="col-md-10">
                                <input type="text" class="form-control" id="inputNamel3" placeholder="Name" name="nama">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-10">
                                <input type="email" class="form-control" id="inputEmail3" placeholder="Email" name="email">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-10">
                                <textarea class="form-control" name="message" rows="3" placeholder="Message"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-md-8">
                                <button type="submit" class="btn btn-success pull-right" name="submit">Send</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>