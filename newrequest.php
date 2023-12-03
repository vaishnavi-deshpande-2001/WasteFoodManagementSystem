<!DOCTYPE html>
<html>
<head>
	<title>New Request</title>
	<link rel="stylesheet" type="text/css" href="newrequest.css">
</head>
<body>
        <?php

                   include 'db_connection.php';

                   if(isset($_POST['newrequest'])){
                     $srno=$_POST['srno'];
                     $rid=$_POST['rid'];
                     $request=$_POST['request'];
                     $mobile=$_POST['mobile'];
                     $email=$_POST['email'];
                     $item=$_POST['item'];
                     $date=$_POST['date'];
                     $status=$_POST['status'];
         
      
                     $emailquery = "SELECT * FROM newrequest WHERE email='$email'";

                     $query=mysqli_query($con,$emailquery);

                     $emailcount=mysqli_num_rows($query);

                     if ($emailcount>0) {
                        ?>
                        <script>
                           alert("Email already exist");
                        </script>
                        <?php
                     }else{

                           $insertquery="INSERT INTO newrequest(srno, rid, request, mobile, email, item, date, status) VALUES ('$srno',' $rid',' $request','$mobile','$email','$item','$date','$status')";

                           $iquery=mysqli_query($con,$insertquery);

                           if($iquery){
                             ?>
                        <script>
                           alert("Thanks for Sending a new  food request !!");
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
  <section class="section-contact" id="contact">

            <h2 style="color:white">New Request</h2>

            <div class="container-form">

                <form  method="POST" id="contact">
                    <div class="form-group">
                        <label for="prenom">Sr No</label>
                        <input type="text" name="srno" id="prenom" required maxlength="30">
                    </div>

                    <div class="form-group">
                        <label for="nom">Request Id</label>
                        <input type="text" name="rid" id="nom" required maxlength="30">
                    </div>

                    <div class="form-group">
                        <label for="">Request By</label>
                        <input type="text" name="request" id="email" required maxlength="30">
                    </div>

                    <div class="form-group">
                        <label for="objet">Mobile No</label>
                        <input type="text" name="mobile" id="objet" required maxlength="30">
                    </div>

                      <div class="form-group">
                        <label for="objet">Email</label>
                        <input type="email" name="email" id="objet" required maxlength="30">
                    </div>


                     <div class="form-group">
                        <label for="items">Food Items</label>
                        <input type="text" name="item" id="item" required maxlength="30">
                    </div>

                     <div class="form-group">
                        <label for="items">Request Date</label>
                        <input type="text" name="date" id="date" required maxlength="30">
                    </div>

                        <div class="form-group">
                        <label for="items">Status</label>
                        <input type="text" name="status" id="status" required maxlength="30">
                    </div>


                    <div class="form-group">

                        <input type="submit" name="newrequest" value="Send New Request" class="submit" style="margin-left: 22rem; border-radius: 20px">

                    </div>
                </form>
            </div>
        </section>

        <script type="text/javascript">
        	// ANIMATION CONTACT //


const input_fields = document.querySelectorAll('input');

for(let i = 0; i < input_fields.length; i++) {

    let field = input_fields[i];

    

    field.addEventListener('input', (e) => {

        if(e.target.value !== '') {

            e.target.parentNode.classList.add('animation')

        } else if (e.target.value == '') {

            e.target.parentNode.classList.remove('animation')

        }

    })

}

        </script>
</body>
</html>