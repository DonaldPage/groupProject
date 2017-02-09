<?php 

//GETS THE INFORMATION FROM THE URL
     $url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
    // //IF THE STRING POSSITION(strops) INCLUDES A ERROR STATEMENT
     if(strpos($url, 'entry=success')!== false){

        $message = "Your question has been added to the database.";

    } else {

        $message = "";
    }

 ?>
        
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Lecturer Home Page
                            <small><?php echo "Hello ".$_SESSION['id']." welcome back."; ?></small>
                        </h1>
                        <h4><?php echo $message; ?></h4>
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
            <!-- /.container-fluid -->

        