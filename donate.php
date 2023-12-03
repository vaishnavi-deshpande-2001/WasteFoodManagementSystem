<?php
session_start();

?>
<!DOCTYPE html>
<html>
<head>
	<title>Donate</title>
	<link rel="stylesheet" type="text/css" href="donate.css">
</head>
<body>

       <?php

                   include 'db_connection.php';

                   if(isset($_POST['signup'])){
                     $username=mysqli_real_escape_string($con,$_POST['name']);
                     $email=mysqli_real_escape_string($con,$_POST['email']);
                     $password=mysqli_real_escape_string($con,$_POST['password']);
                     $cpassword=mysqli_real_escape_string($con,$_POST['cpassword']);

                     $pass=password_hash($password, PASSWORD_BCRYPT);
                     $cpass=password_hash($cpassword, PASSWORD_BCRYPT);

                     $emailquery = "SELECT * FROM signup WHERE email='$email'";

                     $query=mysqli_query($con,$emailquery);

                     $emailcount=mysqli_num_rows($query);

                     if ($emailcount>0) {
                        ?>
                        <script>
                           alert("Email already exist");
                        </script>
                        <?php
                     }else{
                        if($password===$cpassword){

                           $insertquery="INSERT INTO signup(name, email, password, cpassword) VALUES ('$username','$email','$pass','$cpass')";

                           $iquery=mysqli_query($con,$insertquery);

                           if($iquery){
                             ?>
                        <script>
                           alert("Your Account Created");
                        </script>
                        <?php
                           }else{
                           ?>
                        <script>
                           alert("Plz!Try Again");
                        </script>
                        <?php
                        }

                     }else{
                        ?>
                        <script>
                           alert("password are not matchig");
                        </script>
                        <?php
                     }
 
                   }
               }

             ?>
<div class="container" id="container">
      <div class="form-container sign-up-container">
        <form method="POST">
          <h1>Sign Up</h1>
          
          <span>or use your email for registration</span>
          <input type="text" name="name" placeholder="Name" />
          <input type="email"  name="email" placeholder="Email" />
          <input type="password" name="password" placeholder="Password" />
          <input type="password" name="cpassword" placeholder="Confirm Password" />
          <button name="signup">Sign Up</button>
        </form>
      </div>


       <?php
      include 'db_connection.php';

      if(isset($_POST['signin'])){
        $email=$_POST['email'];
        $password=$_POST['password'];

        $email_search = "SELECT * FROM signup WHERE email='$email'";

        $query=mysqli_query($con,$email_search);

        $email_count=mysqli_num_rows($query);

        if($email_count){
          $email_pass=mysqli_fetch_assoc($query);

          $db_pass=$email_pass['password'];

          $_SESSION['email']=$email_pass['email'];

          $pass_decode=password_verify($password, $db_pass);

          if($pass_decode){
                  
                  if(isset($_POST['rememberme'])){
                   setcookie('emailcookie',$email,time()+86400);
                   setcookie('passwordcookie',$password,time()+86400);

                  }
                ?>
                        <script>
                           alert("Login Successful");
                           location.replace("donatefood.php");
                        </script>
                        <?php
                           }else{
                           ?>
                        <script>
                           alert("Password Incorrect");
                        </script>
                        <?php
                        }

                     }else{
                        ?>
                        <script>
                           alert("Invalid Email, Plz SignUp");
                        </script>
                        <?php
                     }
 
                   }
                
      
     
  ?>
      <div class="form-container sign-in-container">
        <form action="<?php echo htmlentities($_SERVER['PHP_SELF']);?>" method="POST">
          <h1>Sign In</h1>
          
          <input type="email" name="email" placeholder="Email" />
          <input type="password" name="password" placeholder="Password" />
          <button name="signin">Sign In</button>
        </form>
      </div>
      <div class="overlay-container">
        <div class="overlay">
          <div class="overlay-panel overlay-left">
            <h1>Welcome Back!</h1>
            <p>Please login with your personal info</p>
            <button class="ghost" id="signIn">Sign In</button>
          </div>
          <div class="overlay-panel overlay-right">
            <h1>Hello, Friend!</h1>
            <p>Enter your personal details and start your journey with us</p>
            <button class="ghost" id="signUp">Sign Up</button>
          </div>
        </div>
      </div>
    </div>
    <script type="text/javascript">
    	const signUpButton = document.getElementById("signUp");
const signInButton = document.getElementById("signIn");
const container = document.getElementById("container");

signUpButton.addEventListener("click", () => {
  container.classList.add("right-panel-active");
});

signInButton.addEventListener("click", () => {
  container.classList.remove("right-panel-active");
});

    </script>
</body>
</html>