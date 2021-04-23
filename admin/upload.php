<?php include("includes/header.php");
?>

<?php
if(!$session->is_signed_in()){
    redirect("login.php");
}
?>


<?php
$message = "";
if(isset($_POST['submit'])){


    $photo = new Photo();
    $photo->title = $_POST['title'];
    $photo->description = $_POST['description'];
    $photo->set_file($_FILES['file_upload']);

    if($photo->save()){
        $message = "user upload successfuly";
    }else{

        $message = join("<br>", $photo->errors);
    }

//$image_title= $_POST['title'];
// $description = $_POST['description'];
//
//    $post_image = $_FILES['file_upload']['name'];
//    $post_image_temp = $_FILES['file_upload']['tmp_name'];
//    $type = $_FILES['file_upload']['type'];
//    $filename = $_FILES['file_upload']['name'];
//    $size = $_FILES['file_upload']['size'];
//
//    move_uploaded_file($post_image_temp, "admin/images/$post_image");
//
//    $query = "INSERT INTO user( title, description,filename, type, size)";
//    $query.="VALUES(,'{$image_title}', '{$description}','{$filename}','{$type}','{$size}')";
//
//    $Create_photo_query= mysqli_query($this->connection, $query);
//
//    if(!$Create_photo_query){
//        die("failed query".mysqli_error($this->connection));
//    }



}

?>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <?php include("includes/top_nav.php");?>

        <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->

        <?php include("includes/side_nav.php") ?>
        <!-- /.navbar-collapse -->
    </nav>

    <div id="page-wrapper">
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Upload
                        <small>Subheading</small>
                    </h1>

                    <div class="col-md-6">
                        <?php echo $message; ?>
                    <form action="upload.php" method="post" class="form-group" enctype="multipart/form-data">

                        <div class="form-group">
                            <label for="title">Photo title:</label>
                            <input type="text" name="title" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="description">Photo description:</label>
                            <textarea class="form-control" name="description" cols="30" rows="5"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="file_upload">Choose Image:</label>
                            <input type="file" name="file_upload">
                        </div>

                        <button class="btn btn-primary" type="submit" name="submit"> Upload </button>
                    </form>
                    </div>



                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

<?php include("includes/footer.php"); ?>