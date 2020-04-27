<?php
$peraturan = 'peraturan';
$keputusan = 'keputusan';
$instruksi = 'instruksi';
$query = mysqli_query($db, "SELECT * FROM produk_hukum WHERE jenis_hukum = '$peraturan' ORDER BY id DESC");
$query2 = mysqli_query($db, "SELECT * FROM produk_hukum WHERE jenis_hukum = '$keputusan' ORDER BY id DESC");
$query3 = mysqli_query($db, "SELECT * FROM produk_hukum WHERE jenis_hukum = '$instruksi' ORDER BY id DESC");

?>
<div id="produk">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="tab">
                    <button class="tablinks" onclick="openCity(event, 'peraturan')" id="defaultOpen">Peraturan Gubenur</button>
                    <button class="tablinks" onclick="openCity(event, 'keputusan')">Keputusan Gubenur</button>
                    <button class="tablinks" onclick="openCity(event, 'instruksi')">Instruksi Gubenur</button>
                </div>
            </div>
            <div class="col-md-6 drop">
                <div id="peraturan" class="tabcontent">
                    <?php if (mysqli_num_rows($query) > 0) { ?>
                        <?php while ($row = mysqli_fetch_assoc($query)) { ?>
                            <h4><a href="#" data-toggle="modal" data-target="#pdfModal<?= $row['id'] ?>"><?= $row['judul']; ?></a></h4>
                            <div class="modal fade" id="pdfModal<?= $row['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="pdfModal<?= $row['id'] ?>Label">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="pdfModal<?= $row['id'] ?>Label"><?= $row['judul']; ?></h4>
                                        </div>
                                        <div class="modal-body">
                                            <object data="media/<?= $row['nama_file']; ?>" type="application/pdf" width="100%" height="800px">
                                                <p>It appears you don't have a PDF plugin for this browser.
                                                    No biggie... you can <a href="media/<?= $row['nama_file']; ?>">click here to
                                                        download the PDF file.</a></p>
                                            </object>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    <?php } ?>
                </div>

                <div id="keputusan" class="tabcontent">
                    <?php if (mysqli_num_rows($query2) > 0) { ?>
                        <?php while ($row2 = mysqli_fetch_assoc($query2)) { ?>
                            <h4><a href="#" data-toggle="modal" data-target="#pdfModal<?= $row2['id'] ?>"><?= $row2['judul']; ?></a></h4>
                            <div class="modal fade" id="pdfModal<?= $row2['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="pdfModal<?= $row2['id'] ?>Label">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="pdfModal<?= $row2['id'] ?>Label"><?= $row2['judul']; ?></h4>
                                        </div>
                                        <div class="modal-body">
                                            <object data="media/<?= $row2['nama_file']; ?>" type="application/pdf" width="100%" height="800px">
                                                <p>It appears you don't have a PDF plugin for this browser.
                                                    No biggie... you can <a href="media/<?= $row2['nama_file']; ?>">click here to
                                                        download the PDF file.</a></p>
                                            </object>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    <?php } ?>
                </div>

                <div id="instruksi" class="tabcontent">
                    <?php if (mysqli_num_rows($query3) > 0) { ?>
                        <?php while ($row3 = mysqli_fetch_assoc($query3)) { ?>
                            <h4><a href="#" data-toggle="modal" data-target="#pdfModal<?= $row3['id'] ?>"><?= $row3['judul']; ?></a></h4>
                            <div class="modal fade" id="pdfModal<?= $row3['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="pdfModal<?= $row3['id'] ?>Label">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="pdfModal<?= $row3['id'] ?>Label"><?= $row3['judul']; ?></h4>
                                        </div>
                                        <div class="modal-body">
                                            <object data="media/<?= $row3['nama_file']; ?>" type="application/pdf" width="100%" height="800px">
                                                <p>It appears you don't have a PDF plugin for this browser.
                                                    No biggie... you can <a href="media/<?= $row3['nama_file']; ?>">click here to
                                                        download the PDF file.</a></p>
                                            </object>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    <?php } ?>
                </div>
            </div>
            <script>
                function openCity(evt, cityName) {
                    var i, tabcontent, tablinks;
                    tabcontent = document.getElementsByClassName("tabcontent");
                    for (i = 0; i < tabcontent.length; i++) {
                        tabcontent[i].style.display = "none";
                    }
                    tablinks = document.getElementsByClassName("tablinks");
                    for (i = 0; i < tablinks.length; i++) {
                        tablinks[i].className = tablinks[i].className.replace(" active", "");
                    }
                    document.getElementById(cityName).style.display = "block";
                    evt.currentTarget.className += " active";
                }

                // Get the element with id="defaultOpen" and click on it
                document.getElementById("defaultOpen").click();
            </script>
        </div>
    </div>
</div>
</div>