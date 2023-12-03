<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Responsive Contact Form</title>
    <link rel="stylesheet" href="addfood.css">
</head>
<body>
       <?php

                   include 'db_connection.php';

                   if(isset($_POST['addfood'])){
                     $item=$_POST['item'];
                     $des=$_POST['des'];
                     $date=$_POST['date'];
                     $address=$_POST['address'];
                     $state=$_POST['state'];
                     $city=$_POST['city'];
                     $email=$_POST['email'];
                     $phone=$_POST['phone'];
         
      
                     $emailquery = "SELECT * FROM  addfood WHERE email='$email'";

                     $query=mysqli_query($con,$emailquery);

                     $emailcount=mysqli_num_rows($query);

                     if ($emailcount>0) {
                        ?>
                        <script>
                           alert("Email already exist");
                        </script>
                        <?php
                     }else{

                           $insertquery="INSERT INTO addfood(item, des, date, address, state, city, email, phone) VALUES ('$item',' $des','$date','$address','$state','$city','$email','$phone')";

                           $iquery=mysqli_query($con,$insertquery);

                           if($iquery){
                             ?>
                        <script>
                           alert("Your food submitted successfully!!");
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
      <h1 style="padding: 2rem; text-align: center; margin-top: 1rem; font-size: 2rem; font-weight: bold; color: white">Add Food</h1>
    <div class="container">
       <div class="contact-fome">

        <div class="input-class">
            <form method="POST">
            <input type="text" class="input" name="item" placeholder="Food Item" required>
            <input type="text" class="input" name="des" placeholder="Description" required>
            <input type="date" class="input" name="date" placeholder="Pickup Date" required>
            <input type="text" class="input" name="address" placeholder="Pickup Address" required>
            <input type="text" class="input" name="state" placeholder="State" required>
            <input type="text" class="input" name="city" placeholder="City" required>     
            <input type="email" class="input" name="email" placeholder="E-mail" required>
            <input type="tel" class="input" name="phone" placeholder="Phone" required>


            <button class="btn" name="addfood" type="submit">Add Food</button>
        </form>
        </div>
      
</body>
</html>