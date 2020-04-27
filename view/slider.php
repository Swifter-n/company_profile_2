<?php
$slide = mysqli_query($db, "SELECT * FROM berita ORDER BY id DESC LIMIT 4");
?>
<div id="slider">
    <div class="container-fluid">
        <div class="row">
            <div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1" uk-slideshow="min-height: 300; max-height: 500; animation: fade; autoplay: true; autoplay-interval: 6000">

                <ul class="uk-slideshow-items">
                    <?php if (mysqli_num_rows($slide) > 0) { ?>
                        <?php while ($row_slide = mysqli_fetch_assoc($slide)) { ?>
                            <li>
                                <img src="images/<?= $row_slide['image']; ?>" alt="" uk-cover>
                                <div class="uk-overlay uk-overlay-primary uk-position-bottom uk-text-center uk-transition-slide-bottom">
                                    <a href="index.php?detail=<?= $row_slide['id']; ?>">
                                        <h5 class="uk-margin-remove"><?= $row_slide['judul']; ?></h5>
                                        <p class="uk-margin-remove"><?= slide($row_slide['description']); ?></p>
                                    </a>
                                </div>
                            </li>
                        <?php } ?>
                    <?php } ?>
                </ul>

                <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slideshow-item="previous"></a>
                <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slideshow-item="next"></a>

            </div>

        </div>
    </div>
</div>