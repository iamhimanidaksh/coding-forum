<?php
include '_dbconnect.php'; 


if($_SERVER['REQUEST_METHOD']=='POST'){

    $user_email = $_POST['email'];
    $user_password = $_POST['password'];
    $cpassword = $_POST['cpassword'];

    $sql = "SELECT *FROM `users` WHERE `user_email`='$user_email'";
    $result = mysqli_query($conn,$sql);

    $num = mysqli_num_rows($result);

    if($num>0){
        header('location:index.php?signuperror=true');
        exit;
    }

    else{
        if($user_password==$cpassword){
            $hash = password_hash($user_password,PASSWORD_DEFAULT);
          
            $sql = "INSERT INTO `users` (`user_email`,`user_password`,`datetime`) VALUES ('$user_email','$hash',current_timestamp())";
            $result = mysqli_query($conn,$sql);
            header('location:index.php?signupsuccess=true');
        }
        else{

            header('location:index.php?signuppassworderror=true');
            exit;
        }
    }
}

?>