<?php
session_start();
//error_reporting(0);
include('includes/dbconnection.php');
if(isset($_POST['login_btn']))
  {
    $emailcon=$_POST['emailcont'];
    $password=md5($_POST['password']);
    $query=mysqli_query($con,"select ID,MobileNumber from tblregusers where  (Email='$emailcon' || MobileNumber='$emailcon') && Password='$password' ");
    $ret=mysqli_fetch_array($query);
    if($ret>0){
      $_SESSION['vpmsuid']=$ret['ID'];
      $_SESSION['vpmsumn']=$ret['MobileNumber'];
     header('location:dashboard.php');
    }
    else{
  
    echo "<script>alert('Invalid Details.');</script>";
    }
  }
  ?>

<!DOCTYPE html>
   <html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">

      <!--=============== REMIXICONS ===============-->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.5.0/remixicon.css" crossorigin="">

      <!--=============== CSS ===============-->
      <link rel="stylesheet" href="login_page/assets/css/styles.css">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

      <title>Login</title>
   </head>
   <body>
      <div class="login" >
         <img src="login_page/assets/img/bg.jpg" alt="image" class="login__bg">

         <form action="" class="login__form" method="post">
            <!-- <div class="user_admin">
               <a id="user" href="#" onclick="changeColorAndRedirect('user')">User</a>
               <a id="line"></a>
               <a id="admin" href="#" onclick="changeColorAndRedirect('admin')">Admin</a>
            </div> -->
            
            <h1 class="login__title">User Login</h1>
            
            <div class="login__inputs">
               <div class="login__box">
                  <input class="login__input" type="text" name="emailcont" required="true" placeholder="Registered Email or Contact Number" required="true" class="form-control">
                  <i class="ri-mail-fill"></i>
               </div>

               <div class="login__box">
                  <input type="password" name ="password" placeholder="Password" class="login__input" required="true" class="form-control">
                  <i class="ri-lock-2-fill"></i>
               </div>
            </div>

            <div class="login__check">
               <div class="login__check-box">
                  <input type="checkbox" class="login__check-input" id="user-check">
                  <label for="user-check" class="login__check-label">Remember me</label>
               </div>

               <a href="forgot-password.php" class="login__forgot">Forgot Password?</a>
            </div>
            <button type="submit" name="login_btn" class="login__button" id="loginButton">Login</button>

            <div class="text-center text-white">Back to <a href="../index.php" class="text-white">Home</a></div>

            <div class="login__register">
               Don't have an account? <a href="signup.php">Register</a>
            </div>
         </form>
      </div>
   </body>
</html>