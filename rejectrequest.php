<html>
<head>
    <title>Reject Request</title>
    <link rel="stylesheet" type="text/css" href="rejectrequest.css">
</head>
  <body>
    <?php

                   include 'db_connection.php';

                   if(isset($_POST['rejectrequest'])){
                     $srno=$_POST['srno'];
                     $rid=$_POST['rid'];
                     $request=$_POST['request'];
                     $mobile=$_POST['mobile'];
                     $email=$_POST['email'];
                     $item=$_POST['item'];
                     $date=$_POST['date'];
                     $status=$_POST['status'];
                     $reason=$_POST['reason'];
         
      
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

                           $insertquery="INSERT INTO rejectrequest(srno, rid, request, mobile, email, item, date, status, reason) VALUES ('$srno','$rid','$request','$mobile','$email','$item','$date','$status','$reason')";

                           $iquery=mysqli_query($con,$insertquery);

                           if($iquery){
                             ?>
                        <script>
                           alert("your food request rejected successfully !!");
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
   <div class="contact-title">
     <h2>Reject Request</h2>
      <p>why you reject the request??</p>
      
     <div class="contact-form">
       
       <form id="contact-form" method="post" action="">
         <input name="srno" type="text" class="form-control" placeholder="Sr No" required><br>
         
          <input name="rid" type="text" class="form-control" placeholder="Request Id" required><br>

            <input name="request" type="text" class="form-control" placeholder="Request By" required><br>
         
           <input name="mobile" type="text" class="form-control" placeholder="Mobile No" required><br>

            <input name="email" type="email" class="form-control" placeholder="Email" required><br>

          <input name="item" type="text" class="form-control" placeholder="Food Items" required><br>

         <input name="date" type="text" class="form-control" placeholder="Request Date" required><br>


         
           <input name="status" type="text" class="form-control" placeholder="Status" required><br>
         
         
         <textarea name="reason" class="form-control" placeholder="Reason to reject a request" rows="4" required></textarea><br>
         
         <input type="submit" name="rejectrequest" class="form-control submit" value="SUBMIT">   
       </form>
                                                   
       
       
     </div>
     
     
    </div>
    
    
    
    
  
    
    
    
    
    
  </body>
</html>