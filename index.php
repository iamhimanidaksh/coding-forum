


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


    

    <div id="carouselExampleCaptions" class="carousel slide">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="code4.jpg" height="500px" weight="500px" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h1>First slide label</h1>
        <p>Some representative placeholder content for the first slide.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="code1.jpg" height="500px" weight="500px" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h1>Second slide label</h1>
        <p>Some representative placeholder content for the second slide.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="code3.jpg" height="500px"  class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h1>Third slide label</h1>
        <p>Some representative placeholder content for the third slide.</p>
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
   


    <div class="container-fluid text-center d-flex gap-5 my-5 flex-wrap justify-content-center align-items-center">

    
   <?php

   $sql = "SELECT * FROM `category`";
   $result = mysqli_query($conn,$sql);

   while($data = mysqli_fetch_assoc($result)){
     echo'<div class="card" style="width: 18rem;">
     <img src="cod1.avif" class="card-img-top" alt="...">
     <div class="card-body">
       <h5 class="card-title">'.$data['category_name'].'</h5>
       <p class="card-text">'.substr($data['category_description'],0 ,85).'...</p>
       <a href="threadList.php?catid='.$data['category_id'].'" class="btn btn-primary">View Threads</a>
     </div>
   </div>';
   }

   ?>

</div>




    <?php include '_footer.php'; ?> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js
    "></script>
</body>
</html>