<?php
$query2 = mysqli_query($db, "SELECT * FROM profile");
?>
<div class="container profil">
    <div class="row">
        <div class="col-md-12">
            <?php if (mysqli_num_rows($query2) > 0) { ?>
                <?php while ($row = mysqli_fetch_assoc($query2)) { ?>
                    <div class="jumbotron">
                        <h3 class="display-4"><?= $row['title']; ?></h3>
                        <hr class="my-4">
                        <p><?= $row['description']; ?></p>
                    </div>
                <?php } ?>
            <?php } ?>
        </div>
    </div>
</div>