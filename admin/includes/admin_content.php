


<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
            Admin
                <small>Subheading</small>
            </h1>
            <?php


//            $Photo= Photo::find_all();
//            foreach ($Photo as $picture){
//            echo $picture->filename;
//            }


//            $user = new User();
//            $user->username= "Example_username";
//            $user->password= "Example_password";
//            $user->first_name= "samuel";
//            $user->last_name= "adejoh";
//            $user->create();

            $photo= new Photo();
            $photo->filename= "Example_picture";
            $photo->type= "image";
            $photo->size= "favour";
            $photo->title= "weeding photos ";
            $photo->save();

            ?>



            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                </li>
                <li class="active">
                    <i class="fa fa-file"></i> Blank Page
                </li>
            </ol>
        </div>
    </div>
    <!-- /.row -->

</div>