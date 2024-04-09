


<?php require '_dbconnect.php';?>
<?php


include '_loginHandler.php';
include '_signupHandler.php';

?>


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
     
    <div class="container my-5">
    <h1>Search results for <em>"<?php echo $_GET['query'];?>'</em></h1>

    <?php
     $noresults = true;
    $query =  $_GET['query'];

    $sql = "SELECT *FROM `threads` WHERE match (`thread_title`,`thread_description`) against('$query')";
    $result = mysqli_query($conn,$sql);
   while($data = mysqli_fetch_assoc($result)){
    $noresults =false;
    $thread_id =  $data['thread_id'];
    $thread_title = $data['thread_title'];
    $thread_description = $data['thread_description'];

    echo'<div class="flex-grow-1 ms-3 mt-5">
                <b><a class="text-dark fs-4" href="thread.php?threadid='.$thread_id.'">'.$thread_title.'</a></b>
                <p>'.$thread_description.'</p>
            </div>
            </div>';

   }

   if($noresults){
    echo'<h1 class="display-4 fw-normal my-5">No Results Found!</h1>';
   }

            ?>
         
</div>

    <?php include '_footer.php'; ?> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js
    "></script>
</body>
</html>