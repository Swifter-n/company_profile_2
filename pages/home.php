<?php
$produs = mysqli_query($db, "SELECT * FROM produk_hukum ORDER BY id DESC LIMIT 4");
$query2 = mysqli_query($db, "SELECT * FROM berita ORDER BY id DESC LIMIT 4");
$query3 = mysqli_query($db, "SELECT * FROM profile");
$row3 = mysqli_fetch_assoc($query3);
?>
<?php include 'view/slider.php'; ?>
<div id="about">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="jumbotron-fluid">
          <h2 class="text-center">PROFILE</h2>
          <p style="font-size: 1.5em" class="text-justify"><?= text($row3['description']); ?></p>
          <p><a class="btn btn-primary btn-lg" href="index.php?profil" role="button">Read more</a></p>
        </div>
      </div>
    </div>
  </div>
</div>


<div id="activity">
  <div class="container">
    <div class="jumbotron-fluid">
      <h2 class="text-center">NEWS</h2>
      <?php if (mysqli_num_rows($query2) > 0) { ?>
        <?php while ($row_berita = mysqli_fetch_assoc($query2)) { ?>
          <div class="uk-card uk-card-default uk-grid-collapse uk-child-width-1-2@s uk-margin" uk-grid>
            <div class="uk-card-media-left uk-cover-container">
              <img src="images/<?= $row_berita['image']; ?>" alt="" uk-cover>
              <canvas width="500" height="300"></canvas>
            </div>
            <div>
              <div class="uk-card-body">
                <h3 class="uk-card-title"><a href="index.php?detail=<?= $row_berita['id']; ?>"><?= $row_berita['judul']; ?></a></h3>
                <p class="card-text"><small class="text-muted"><?= tgl_indo($row_berita['tanggal']); ?></small></p>
                <p><?= news($row_berita['description']); ?></p>
              </div>
            </div>
          </div>
        <?php } ?>
      <?php } ?>
    </div>
  </div>
</div>

<div id="produk_line">
  <div class="container-fluid">
    <div class="jumbotron">
      <div class="row">
        <div class="col-md-12">
          <h2 class="text-center">PRODUK HUKUM</h2>
        </div>
        <div class="row">

          <?php if (mysqli_num_rows($produs) > 0) { ?>
            <?php while ($produk = mysqli_fetch_assoc($produs)) { ?>
              <div class="col-md-6">
                <div class="list-group">
                  <a href="#" class="list-group-item list-group-item-action active" data-toggle="modal" data-target="#pdfModal<?= $produk['id'] ?>">
                    <h5 class="mb-1"><?= $produk['judul']; ?></h5>
                    <small><?= tgl_indo($produk['tanggal']); ?></small>
                  </a>
                </div>
                <div class="modal fade" id="pdfModal<?= $produk['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="pdfModal<?= $produk['id'] ?>Label">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="pdfModal<?= $produk['id'] ?>Label"><?= $produk['judul']; ?></h4>
                      </div>
                      <div class="modal-body">

                        <object data="media/<?= $produk['nama_file']; ?>" type="application/pdf" width="100%" height="800px">
                          <p>It appears you don't have a PDF plugin for this browser.
                            No biggie... you can <a href="media/<?= $produk['nama_file']; ?>">click here to
                              download the PDF file.</a></p>
                        </object>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            <?php } ?>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
</div>
</div>