


<?php require '_dbconnect.php';?>

<?php

if($_SERVER['REQUEST_METHOD']=='POST'){

    $email =  $_POST['email'];
    $concern = $_POST['concern'];

    $sql = "INSERT INTO `contact` (`contact_email`,`concern`,`datetime`) VALUES('$email','$concern',current_timestamp())";
    $result = mysqli_query($conn,$sql);

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact - iDiscuss</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
    <?php include '_navbar.php'; ?>


    <div class="container my-5">
    <h1>Contact Us</h1>
    <form action="contact.php" method="post">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <label for="floatingTextarea2 mb-3">Elaborate your concern</label>
  <div class="form-floating">
  <textarea class="form-control mb-3" placeholder="Leave a comment here" name="concern"  id="floatingTextarea2" style="height: 100px"></textarea>
 </div>
  <button type="submit" class="btn btn-primary">Submit</button>
 </form>
    </div>
    </div>


    <?php include '_footer.php'; ?> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js
    "></script>
</body>
</html>