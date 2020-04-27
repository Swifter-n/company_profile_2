<?php
$browser = $_SERVER['HTTP_USER_AGENT'];
$chrome = '/Chrome/';
$firefox = '/Firefox/';
$ie = '/IE/';
if (preg_match($chrome, $browser))
    $data = "Chrome/Opera";
if (preg_match($firefox, $browser))
    $data = "Firefox";
if (preg_match($ie, $browser))
    $data = "IE";
// Hitung Jumlah Visitor
$kemarin  = date("Y-m-d", mktime(0, 0, 0, date('m'), date('d') - 1, date('Y')));
$hari_ini  = mysqli_fetch_array(mysqli_query($db, 'SELECT sum(counter) AS hari_ini FROM counterdb WHERE tanggal="' . date("Y-m-d") . '"'));
$kemarin = mysqli_fetch_array(mysqli_query($db, 'SELECT sum(counter) AS kemarin FROM counterdb WHERE tanggal="' . $kemarin . '"'));
$sql = mysqli_fetch_array(mysqli_query($db, 'SELECT sum(counter) as total FROM counterdb'));


?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    List Data
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>Browser</th>
                                    <th>Ip</th>
                                    <th>Jml Pegunjung Hari ini</th>
                                    <th>Jml Pengunjung Kemaren</th>
                                    <th>Total pengunjung</th>
                                </tr>
                            </thead>
                            <tbody>

                                <tr>
                                    <td>
                                        <?php
                                        switch ($browser) {
                                            case "Firefox":
                                                echo "" . $browser . "";
                                                break;
                                            case "Chrome/Opera":
                                                echo "" . $browser . "";
                                                break;
                                            case "IE":
                                                echo "" . $browser . "";
                                                break;
                                        } ?>
                                    </td>
                                    <td>
                                        <?php echo "" . $_SERVER['REMOTE_ADDR'] . ""; ?>
                                    </td>
                                    <td>
                                        <p><?php echo "" . $hari_ini['hari_ini'] . ""; ?></p>
                                    </td>
                                    <td>
                                        <p><?php echo "" . $kemarin['kemarin'] . ""; ?></p>
                                    </td>
                                    <td>
                                        <p><?php echo "" . $sql['total'] . ""; ?></p>
                                    </td>
                                </tr>

                                <tr>
                                    <th>No</th>
                                    <th>id</th>
                                    <th>tanggal</th>
                                    <th>Browser</th>
                                    <th>Jml Pegunjung</th>
                                </tr>
                                <?php $no = 0; ?>
                                <?php $sql = "SELECT * FROM counterdb";
                                $sqli = mysqli_query($db, $sql);

                                $total = mysqli_fetch_array(mysqli_query($db, 'SELECT sum(counter) as jumlah FROM counterdb'));
                                ?>
                                <?php while ($tampil = mysqli_fetch_array($sqli)) {  ?>
                                    <?php $no++; ?>
                                    <tr>
                                        <td>
                                            <?php echo "$no"; ?>
                                        </td>
                                        <td>
                                            <?php echo "$tampil[id]"; ?>
                                        </td>
                                        <td>
                                            <?php echo "$tampil[tanggal]"; ?>
                                        </td>
                                        <td>
                                            <?php echo "$tampil[browser]"; ?>
                                        </td>
                                        <td>
                                            <?php echo "$tampil[counter]"; ?>
                                        </td>
                                    <?php } ?>
                                    </tr>
                                    <td colspan="4"> Total</td>
                                    <td>
                                        <p><?php echo "" . $total['jumlah'] . ""; ?></p>
                                    </td>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>