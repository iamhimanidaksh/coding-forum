
    <?php


    include '_dbconnect.php';

    if($_SERVER['REQUEST_METHOD']=='POST'){
      
        $user_email = $_POST['email'];
        $user_password = $_POST['password'];

        $sql = "SELECT* FROM `users` WHERE `user_email`='$user_email'";
        $result = mysqli_query($conn,$sql);

        $num = mysqli_num_rows($result);

        if($num==1){
            
            while($hashPassword = mysqli_fetch_assoc($result)){

                

            if(password_verify($user_password,$hashPassword['user_password'])){
                session_start();
                $_SESSION['loggedin'] =true;
                $_SESSION['user_email'] = $user_email;
                header('location:index.php?loginsuccess=true');
            }
            else{
                header('location:index.php?loginpassworderror=true');

            }
        }
        }

        else{
        header('location:index.php?invalidemail=true');
        }
    }

    ?>