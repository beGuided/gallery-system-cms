<?php //include("includes/header.php");
require_once ("admin/includes/init.php");
?>

<?php include"admin/includes/photo.php" ?>

<?php
if(empty($_GET['id'])){
    $photos = Photo::find_all();

}
?>


<div class="thumbnails row">

    <?php

    if($photos) {
        foreach ($photos as $photo):

            ?>

            <div class="col-md-3 col-sm-4">
                <a class="thumbnail" href="photo.php?view=<?php echo $photo->id; ?>">
                    <img class="img-responsive home-page-photo" src="admin/<?php echo $photo->picture_path(); ?>">

                </a>

            </div>

        <?php

        endforeach;
    } else {

        echo "<h2 class='text-center'> No images uploaded! </h2>";
    }

    ?>

</div>


<!--Blog Sidebar Widgets Column-->
            <div class="col-md-4">
                 <?php //include("includes/sidebar.php"); ?>
        </div>
        <!-- /.row -->

        <?php include("includes/footer.php"); ?>
