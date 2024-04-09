

                <?php require '_dbconnect.php';?>

                <!DOCTYPE html>
                <html lang="en">
                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <title>iDiscuss - Forum</title>
                    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
                </head>
                <body >
                    <?php include '_navbar.php'; ?>

                    <div class="container-fluid text-center d-flex gap-5 my-5 flex-wrap justify-content-center align-items-center">

                    <?php 
                    
                    $category_id = $_GET['catid'];

                    $sql = "SELECT * FROM `category` WHERE `category_id` = '$category_id'";
                    $result = mysqli_query($conn,$sql);

                    while ($data = mysqli_fetch_assoc($result)){
                        echo '<div class="px-4 py-5 my-5 text-center">
                        <h1 class="display-5 fw-bold  ">'.$data['category_name'].'</h1>
                        <div class="col-lg-6 mx-auto">
                        <p class="lead mb-4 fs-4 ">'.$data['category_description'].'</p>
                        </div>
                    </div>';
                    }  

                    ?>
                    </div>


                    <!-- Creating  a form to make a thread -->
                    <?php 

                    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){

                    echo'<div class="container">
                    <h1>Start a Discussion</h1>
                    <form action="'.$_SERVER['REQUEST_URI'].'" method="post">
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label fs-4">Problem Title</label>
        <input type="text" class="form-control" id="exampleInputEmail1" name="title" aria-describedby="emailHelp">
        <div id="emailHelp" class="form-text">Share your problems with us.</div>
    </div>
    
    <label for="floatingTextarea2"  class="form-label fs-4">Elaborate your problem</label>
    <div class="form-floating">
  <textarea class="form-control mb-3" placeholder="Leave a comment here" id="floatingTextarea2" name="description" style="height: 100px"></textarea>
 
</div>
    <button type="submit" class="btn btn-primary">Submit</button>
    </form>
                    </div>';
                    }

                    else{
                        
                        echo'<div class="container">
                        <h1>Start a Discussion</h1>
                        <p class="lead mb-4 fs-4 ">You are not logged in.</p>
                        </div>' ;
                    }

                    ?>
                          
                  <!-- Inserting threads to database -->
                  <?php

                     if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){

                        $sqluser = "SELECT `user_id` FROM `users` WHERE `user_email` = '{$_SESSION['user_email']}'";
                        $resultuser = mysqli_query($conn,$sqluser);

                        $data = mysqli_fetch_assoc($resultuser);

                        $thread_user_id = $data['user_id'];
                     

                    }
                    else{
                        $thread_user_id=0;
                    }


                    if($_SERVER['REQUEST_METHOD'] =='POST'){

                    $title = $_POST['title'];
                    $description = $_POST['description'];

                    $sql = "INSERT INTO `threads` (`thread_title`,`thread_description`,`thread_category_id`,`thread_user_id`,`datetime`) VALUES ('$title','$description','$category_id','$thread_user_id',current_timestamp())";
                    $result = mysqli_query($conn,$sql);
                    }
                    else{

                    }
                ?>
                  


                    <?php

                    $sql = "SELECT *FROM `threads` WHERE `thread_category_id`= '$category_id'";
                    $result = mysqli_query($conn,$sql);
                   

                    $sql2 = "SELECT `thread_user_id` FROM `threads`";
                    $result2 = mysqli_query($conn,$sql2);
                    $data2 = mysqli_fetch_assoc($result2);

                    $sql3 = "SELECT `user_email` FROM `users` WHERE `user_id` ='{$data2['thread_user_id']}'";
                    $result3 = mysqli_query($conn,$sql3);
                    $data3 = mysqli_fetch_assoc($result3);
                    
                    $noResult = true;
                    while($data = mysqli_fetch_assoc($result)){
                        $noResult = false;
                        $thread_id = $data['thread_id'];
                        echo '<div class="container my-5">
                        <div class="d-flex">
                        <div class="flex-shrink-0">
                            <img src="image.png" height="48px" alt="...">
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <b><a class="text-dark fs-4" href="thread.php?threadid='.$thread_id.'">'.$data['thread_title'].'</a></b>
                            <p>'.$data['thread_description'].'</p>
                        </div>
                        <div>
                        <p><b>posted by:-'.$data3['user_email'].'</b></p>
                        </div>
                        </div>
                        </div>';
                    }
                    

                    ?>


                    <?php
                    
                    if($noResult){
                        echo '<div class="pricing-header p-3 pb-md-4 mx-auto text-center">
                        <h1 class="display-4 fw-normal">No Threads Found!</h1>
                        <p class="fs-5">Let\'s make a thread to be first.</p>
                    </div>';
                    }
            
                    ?>
                    

                    <?php include '_footer.php'; ?> 
                    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js
                    "></script>
                </body>
                </html>