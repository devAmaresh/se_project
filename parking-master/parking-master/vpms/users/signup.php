<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if(isset($_POST['submit']))
  {
    $fname=$_POST['firstname'];
    $lname=$_POST['lastname'];
    $contno=$_POST['mobilenumber'];
    $email=$_POST['email'];
    $password=md5($_POST['password']);

    $ret=mysqli_query($con, "select Email from tblregusers where Email='$email' || MobileNumber='$contno'");
    $result=mysqli_fetch_array($ret);
    if($result>0){

echo '<script>alert("This email or Contact Number already associated with another account")</script>';
    }
    else{
    $query=mysqli_query($con, "insert into tblregusers(FirstName, LastName, MobileNumber, Email, Password) value('$fname', '$lname','$contno', '$email', '$password' )");
    if ($query) {
    
    echo '<script>alert("You have successfully registered")</script>';
  }
  else
    {
      echo '<script>alert("Something Went Wrong. Please try again")</script>';
    }
}
}
  ?>
<!doctype html>
 <html class="no-js" lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--=============== REMIXICONS ===============-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.5.0/remixicon.css" crossorigin="">

    <!--=============== CSS ===============-->
    <link rel="stylesheet" href="signup_page/assets/css/styles.css">

    <title>Sign Up</title>

    <script type="text/javascript">
        function checkpass()
        {
            if(document.signup.password.value!=document.signup.repeatpassword.value)
        {
            alert('Password and Repeat Password field does not match');
            document.signup.repeatpassword.focus();
            return false;
        }
        return true;
        } 
</script>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
</head>

<body>
      <div class="login">
         <img src="signup_page/assets/img/bg.jpg" alt="image" class="login__bg">

         <form action="" class="login__form" method="post">
            <h1 class="login__title">User SignUp</h1>

            <div class="login__inputs">
                <form method="post" onsubmit="return checkpass();">

               <div class="login__box">
                  <input type="text" name="firstname" placeholder="Your First Name..." required="true" class="login__input">
               </div>

               <div class="login__box">
                  <input type="text" name="lastname" placeholder="Your Last Name..." required="true" class="login__input">
                </div>

               <div class="login__box">
                    <input type="text" name="mobilenumber" maxlength="10" pattern="[0-9]{10}" placeholder="Mobile Number" required="true" class="login__input">
                    <i class="ri-phone-fill"></i>
                </div>

               <div class="login__box">
                  <input type="email" name="email" placeholder="Email address" required="true" class="login__input">
                  <i class="ri-mail-fill"></i>
               </div>

               <div class="login__box">
                  <input type="password" name="password" placeholder="Password" required class="login__input">
                  <i class="ri-lock-2-fill"></i>
               </div>

               <div class="login__box">
                  <input type="password" name="repeatpassword" placeholder="Repeat Password" required class="login__input">
                  <i class="ri-lock-2-fill"></i>
               </div>
            </div>

            <div class="login__check">
               <div class="login__check-box">
                  <input type="checkbox" class="login__check-input" id="user-check">
                  <label for="user-check" class="login__check-label">Remember me</label>
               </div>

            </div>

            <button type="submit" name="submit" class="login__button">SignUp</button>

            <div class="login__register">
               Already have an account? <a href="login.php">Sign in</a>
            </div>
         </form>
      </div>
      <script src="../admin/assets/js/main.js"></script>
   </body>
</html>
