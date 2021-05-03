<?php
require_once ("admin/includes/init.php");
include "admin/includes/photo.php";
include "admin/includes/comment.php";

 include("includes/header.php");
 ?>

<?php
if(empty($_GET['id'])) {
    redirect("index.php");

}
   $photo = Photo::find_by_id(4);


    if (isset($_POST['submit'])) {
        $author = trim($_POST['author']);
        $body = trim($_POST['body']);

        $new_comment = Comment::create_comment($photo->id, $author, $body);
        if ($new_comment && $new_comment->save()) {
            redirect("photo.php?id=$photo->id");
        } else {

            $message = "there was a problem saving ";
        }
    } else {
        $author = "";
        $body = "";
    }
    $comments = Comment::find_the_comment($photo->id);


?>




     Page Content
    <div class="container">

        <div class="row">

             Blog Post Content Column
            <div class="col-lg-8">

                <!-- Blog Post -->

                <!-- Title -->
                <h1>Blog Post Title</h1>

                <!-- Author -->
                <p class="lead">
                    by <a href="#">Start Bootstrap</a>
                </p>

                <hr>

                <!-- Date/Time -->
                <p><span class="glyphicon glyphicon-time"></span> Posted on August 24, 2013 at 9:00 PM</p>

                <hr>

                <!-- Preview Image -->
                <img class="img-responsive" src="http://placehold.it/900x300" alt="">

                <hr>

                <!-- Post Content -->
                <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus, vero, obcaecati, aut, error quam sapiente nemo saepe quibusdam sit excepturi nam quia corporis eligendi eos magni recusandae laborum minus inventore?</p>

                <hr>

                <!-- Blog Comments -->




                <!-- Comments Form -->


                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form role="form" method="post">
                        <div class="form-group">
                            <label for="author">Author</label>
                            <input class="form-control" type="text" name="author"  rows="3">
                        </div>
                        <div class="form-group">
                            <label for="author">Your Comment</label>
                            <textarea class="form-control" name="body"  rows="3"></textarea>
                        </div>
                        <button type="submit"  name="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>


                <hr>

                <!-- Posted Comments -->

                <?php foreach ($comments as $comment):?>

                <!-- Comment -->

                <!-- Comment -->
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"><?php echo  $comment->author;?>
                            <small>August 25, 2014 at 9:30 PM</small>
                        </h4>
                        <?php echo $comment->body; ?>
                        <!-- Nested Comment -->

                        <!-- End Nested Comment -->
                    </div>
                </div>
            <?php endforeach;?>

            </div>

            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-4">

                <?php include("includes/sidebar.php"); ?>
                <!-- Blog Search Well -->


        </div>
        </div>
    </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
            <?php include("includes/footer.php"); ?>
