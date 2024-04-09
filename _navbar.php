
<?php

session_start();

if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
  $loggedin = true;
}


echo '<nav class="navbar navbar-dark navbar-expand-lg bg-dark py-3">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">iCoder</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="about.php">About</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Top Categories
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="http://localhost/forum/threadList.php?catid=1">Python</a></li>
            <li><a class="dropdown-item" href="http://localhost/forum/threadList.php?catid=2">JavaScript</a></li>
            <li><a class="dropdown-item" href="http://localhost/forum/threadList.php?catid=5">PHP</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contact.php">Contact Us</a>
        </li>
      </ul>';


      if($loggedin){
        echo'<a href="_logout.php" class="btn btn-primary mx-2">Log out</a><p class="text-light mx-2 my-auto">Welcome '.$_SESSION['user_email'];'</p>';
      }

      if(!$loggedin){
        echo'<button class="btn btn-primary mx-1" data-bs-toggle="modal" data-bs-target="#loginModal">Log In</button>
        <button class="btn btn-primary mx-2" data-bs-toggle="modal" data-bs-target="#signupModal">SignUp</button>
        ';
        }


      echo '<form class="d-flex" role="search" action="search.php" method="get">
        <input class="form-control me-2" name="query" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-primary" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>';


include '_loginModal.php';
include '_signupModal.php';



if(isset($_GET['signuperror'])&& $_GET['signuperror']=="true"){
  echo'<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
  <strong>Error!</strong> Username already exists.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}


if(isset($_GET['signupsuccess'])&& $_GET['signupsuccess']=="true"){
  echo'<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
  <strong>Success!</strong> You have created your account.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}


if(isset($_GET['signuppassworderror'])&& $_GET['signuppassworderror']=="true"){
  echo'<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
  <strong>Error!</strong> Please enter the same password.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}


if(isset($_GET['loginsuccess'])&& $_GET['loginsuccess']=="true"){
  echo'<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
  <strong>Success!</strong> You have logged in successfully.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}


if(isset($_GET['loginpassworderror'])&& $_GET['loginpassworderror']=="true"){
  echo'<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
  <strong>Error!</strong> Please enter correct password.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}


if(isset($_GET['invalidemail'])&& $_GET['invalidemail']=="true"){
  echo'<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
  <strong>Error!</strong> Invalid Email.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}

?>