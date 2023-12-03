<!DOCTYPE html>
<html>
<head>
  <title>Donate Food</title>
  <link rel="stylesheet" type="text/css" href="donatefood.css">
</head>
<body>
   <?php

                   include 'db_connection.php';

                   if(isset($_POST['donate'])){
                     $name=mysqli_real_escape_string($con,$_POST['name']);
                     $organization_name=mysqli_real_escape_string($con,$_POST['organization_name']);
                     $address=mysqli_real_escape_string($con,$_POST['address']);
                     $email=mysqli_real_escape_string($con,$_POST['email']);
                     $city=mysqli_real_escape_string($con,$_POST['city']);
                     $state=mysqli_real_escape_string($con,$_POST['state']);
                     $foodtype=mysqli_real_escape_string($con,$_POST['foodtype']);
                     $foodquantity=mysqli_real_escape_string($con,$_POST['foodquantity']);
         
      
                     $emailquery = "SELECT * FROM donatefood WHERE email='$email'";

                     $query=mysqli_query($con,$emailquery);

                     $emailcount=mysqli_num_rows($query);

                     if ($emailcount>0) {
                        ?>
                        <script>
                           alert("Email already exist");
                        </script>
                        <?php
                     }else{

                           $insertquery="INSERT INTO donatefood(name, organization_name, address, email, city, state, foodtype, foodquantity) VALUES ('$name','$organization_name',' $address','$email',' $city',' $state','$foodtype',' $foodquantity')";

                           $iquery=mysqli_query($con,$insertquery);

                           if($iquery){
                             ?>
                        <script>
                           alert("Thanks for donating food!! you can save peoples...");
                        </script>
                        <?php
                           }else{
                           ?>
                        <script>
                           alert("Something went wrong!");
                        </script>
                        <?php
                        }
                      }

                     }

             ?>
<section id="contact">
  <div class="contact-box">
    <div class="contact-links">
      <h2 style="margin-top:8rem">DONATE FOOD</h2>
      <h4 style="font-size:1.3rem;color:white; margin-left:4rem;margin-top: 2rem; font-family:; font-weight: bold;">Giving is better than receiving.</h4>
      <h4 style="margin-left:3.4rem; color: green; font-size: 1.9rem; margin-top: 1rem;">Show some love, donate.</h4>
      <h4 style="margin-left: 4.5rem; font-size: 2rem; color: white; margin-top: 1rem;">Give from the heart.</h4>
      <div class="links">
      
      </div>
    </div>
    <div class="contact-form-wrapper">
      <form method="POST">
        <div class="form-item">
          <input type="text" name="name" required>
          <label>Name:</label>
        </div>
          <div class="form-item">
          <input type="text" name="organization_name" required>
          <label>Name Of Organization:</label>
        </div>

          <div class="form-item">
          <input type="text" name="address" required>
          <label>Address:</label>
        </div>
        <div class="form-item">
          <input type="text" name="email" required>
          <label>Email:</label>
        </div>

          <div class="form-item">
          <input type="text" name="city" required>
          <label>City:</label>
        </div>

          <div class="form-item">
          <input type="text" name="state" required>
          <label>State:</label>
        </div>

          <div class="form-item">
          <input type="text" name="foodtype" required>
          <label>Food Type:</label>
        </div>

           <div class="form-item">
          <input type="text" name="foodquantity" required>
          <label>Food Quantity In KG:</label>
        </div>

        <button class="submit-btn" name="donate">Donate</button>  
        
      </form>
    </div>
  </div>
</section>
</body>
</html>