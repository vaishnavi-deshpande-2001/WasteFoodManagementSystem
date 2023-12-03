<!DOCTYPE html>
<html>
<head>
	<title>Food take away</title>
  <link rel="stylesheet" type="text/css" href="foodtakeaway.css">
</head>
<body>
      <?php

                   include 'db_connection.php';

                   if(isset($_POST['foodtake'])){
                     $srno=$_POST['srno'];
                     $rid=$_POST['rid'];
                     $request=$_POST['request'];
                     $mobile=$_POST['mobile'];
                     $email=$_POST['email'];
                     $item=$_POST['item'];
                     $date=$_POST['date'];
                     $status=$_POST['status'];
                    
         
      
                     $emailquery = "SELECT * FROM rejectrequest WHERE email='$email'";

                     $query=mysqli_query($con,$emailquery);

                     $emailcount=mysqli_num_rows($query);

                     if ($emailcount>0) {
                        ?>
                        <script>
                           alert("Email already exist");
                        </script>
                        <?php
                     }else{

                           $insertquery="INSERT INTO foodtakeaway(srno, rid, request, mobile, email, item, date, status) VALUES ('$srno','$rid','$request','$mobile','$email','$item','$date','$status')";

                           $iquery=mysqli_query($con,$insertquery);

                           if($iquery){
                             ?>
                        <script>
                           alert("your food will be taken successfully !!");
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
<section>

  <div class="listing-hero">
    <div class="hero-heading">
        <div class="hero-large">Food Take Away Request</div>
              </div>
  </div>

<div class="container-contact">
    <div class="wrap-contact">

      <form name="contact" class="contact-form validate-form" method="post" action= "">

        <div class="wrap-input validate-input" data-validate="Please enter your name">
          <input class="input" type="text" name="srno" placeholder="Sr No" required/>
        </div>

          <div class="wrap-input validate-input" data-validate="Please enter your name">
          <input class="input" type="text" name="rid" placeholder="Request Id" required/>
        </div>

  <div class="wrap-input validate-input" data-validate="Please enter your name">
          <input class="input" type="text" name="request" placeholder="Request By" required/>
        </div>

  <div class="wrap-input validate-input" data-validate="Please enter your name">
          <input class="input" type="text" name="mobile" placeholder="Mobile No" required/>
        </div>

  <div class="wrap-input validate-input" data-validate="Please enter your name">
          <input class="input" type="text" name="email" placeholder="Email" required/>
        </div>

  <div class="wrap-input validate-input" data-validate="Please enter your name">
          <input class="input" type="text" name="item" placeholder="Food Items" required/>
        </div>

          <div class="wrap-input validate-input" data-validate="Please enter your name">
          <input class="input" type="text" name="date" placeholder="Request Date" required/>
        </div>

  <div class="wrap-input validate-input" data-validate="Please enter your name">
          <input class="input" type="text" name="status" placeholder="Status" required/>
        </div>


        <div class="container-contact-form-btn">
          <button type="submit" name="foodtake" class="contact-form-btn">
            <span>Send Request</span>
          </button>
        </div>

      

      </form>

    </div>
  </div>
</div>

</div>

</section>

</body>
</html>