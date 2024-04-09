


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

        $thread_id = $_GET['threadid'];

        $sql = "SELECT * FROM `threads` WHERE `thread_id` = '$thread_id'";
        $result = mysqli_query($conn,$sql);

        while ($data = mysqli_fetch_assoc($result)){
            echo '<div class="px-4 py-5 my-5 text-center">
            <h1 class="display-5 fw-bold  ">'.$data['thread_title'].'</h1>
            <div class="col-lg-6 mx-auto">
            <p class="lead mb-4 ">'.$data['thread_description'].'</p>
            </div>
        </div>';
        }  

        ?>
        </div>



        <!-- Commenting  -->

       <?php

       if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true ){


        echo'<div class="container">
            <h1>Post a Comment</h1>
            <form action="'.$_SERVER['REQUEST_URI'].'" method="post">
        

        <label for="floatingTextarea2"  class="form-label fs-4">Comment Here</label>
            <div class="form-floating">
        <textarea class="form-control mb-3" placeholder="Leave a comment here" id="floatingTextarea2" name="comment" style="height: 100px"></textarea>
        
        </div>
        <button type="submit" class="btn btn-primary mb-3">Submit</button>
        </form>
        </div>';

       }

       else{
        echo'<div class="container">
        <h1>Post a Comment</h1>
        <p class="lead mb-4 fs-4 ">You are not logged in.</p>
        </div>';
       }
       ?>


        

                
                    <!-- Inserting threads to database -->
                    <?php

   
    if(isset($_SESSION['loggedin'])&& $_SESSION['loggedin']==true){
        // $loggedin =true;
   

                        if($_SERVER['REQUEST_METHOD'] =='POST'){

                        $comment = $_POST['comment'];
                        

                        $sql = "INSERT INTO `comments` (`comment_content`,`thread_id`,`datetime`,`thread_by`) VALUES ('$comment','$thread_id',current_timestamp(),'{$_SESSION['user_email']}')";
                        $result = mysqli_query($conn,$sql);
                        }

                        
                    }
                    ?>


        
        <?php


    

        $sql = "SELECT *FROM `comments` WHERE `thread_id`= '$thread_id'";
        $result = mysqli_query($conn,$sql);

        $noResult = true;
        while($data = mysqli_fetch_assoc($result)){
            $noResult = false;
            $comment_id = $data['comment_id'];
            echo '<div class="container my-5">
            <div class="d-flex">
            <div class="flex-shrink-0">
                <img src="image.png" height="48px" alt="...">
            </div>
            <div class="flex-grow-1 ms-3">
                <b><a class="text-dark fs-4" href="#">'.$data['thread_by'].'</a></b>
                <p>'.$data['comment_content'].'</p>
            </div>
            </div>
            </div>';
        }


        ?>


        

        <?php
                            
                            if($noResult){
                                echo '<div class="pricing-header p-3 pb-md-4 mx-auto text-center">
                                <h1 class="display-4 fw-normal">No Comments Found!</h1>
                                <p class="fs-5">Let\'s make a comment to be first.</p>
                            </div>';
                            }
                    
                            ?>




            <?php include '_footer.php'; ?> 
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js
            "></script>
        </body>
        </html>