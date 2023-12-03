<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Waste Food Management</title>
    
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <link rel="stylesheet" href="index.css">
</head>
<style type="text/css">
	.food {
	width:60rem;
	border-collapse: collapse;
	background: #444;
	height: 20rem;
	margin-top: 4rem;
	display: flex;

}

caption,
.food th,
td {
	padding:0.5rem;
	text-align: left;
	/*line-height: 1.5;*/
	color: white;

tr:nth-of-type(2n) {
	background: hsl(0% 0% 05 / 0.1);
}

@media only screen and (max-width: 1000px) {
	th {
		display: none;
	}
	td {
		display: grid;
		grid-template-columns: 15ch auto;
	}

	td::before {
		content: attr(data-cell) ": ";
		font-weight: 700;
		text-transform: capitalize;
	}
}
</style>
<body>
      <?php

                   include 'db_connection.php';

                   if(isset($_POST['submitcomplain'])){
                     $name=$_POST['name'];
                     $email=$_POST['email'];
                     $complain=$_POST['complain'];
                     
         
      
                     $emailquery = "SELECT * FROM complain WHERE email='$email'";

                     $query=mysqli_query($con,$emailquery);

                     $emailcount=mysqli_num_rows($query);

                     if ($emailcount>0) {
                        ?>
                        <script>
                           alert("Email already exist");
                        </script>
                        <?php
                     }else{

                           $insertquery="INSERT INTO complain(name, email, complain) VALUES ('$name','$email','$complain')";

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
    <section id="home">
        <header>
            <div class="container">
                <div class="left">
                    <h3 class="logo">Save Food</h3>
                    <div class="hm-menu">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </div>
                <div class="right">
                    <nav>
                        <ul>
                            <li><a href="#home">Home</a></li>
                            <li><a href="#about">About</a></li>
                            <li><a href="#available">Available food list</a></li>
                            <li><a href="#donar">Donar</a></li>
                            <li><a href="#admin">Admin</a></li>
                            <li><a href="#complain">Complain</a></li>
                            <li><a href="#contact">Contact</a></li>
                            <li><a href="mainpage_login.php">Logout</a></li>



                        </ul>
                    </nav>
                </div>
            </div>
        </header>
        
        <div class="hero-section">
            <div class="hero-text">
                <h1>Waste Food Management System</h1>
                <h2>Donate food and save the people</h2>
            </div>
        </div>
    </section>
    
    <section id="about" >
        <div class="heading">
            <h3>About Us</h3>
          <h1 style="width: 60rem">Why Donate the lost food? and need of donate the food</h1>
          <p style="font-size: 1.2rem; font-family:monospace; font-weight: 200px">Food donation is a great way to help those in need and make a positive impact on the world. It can
provide nourishment to those who are struggling to make ends meet, and it can also help to reduce food
waste. Food donation can have a wide range of benefits, from improving the health and wellbeing of
children to reducing the amount of child labor in developing countries. In this blog, we will explore the
many benefits of food donation and how it can help to improve the lives of children around the world.</p>

<h4 style="margin-top: 2rem;font-size: 1.2rem;color: blue">1.Improving Child Health</h4>
<p class="des">One of the most important benefits of food donation is that it can help to improve the health and
wellbeing of children.<br> Malnutrition is a major problem in many parts of the world, and it can have a
devastating effect on a child’s physical and mental development.</p>

<h4  style="margin-top: 2rem;font-size: 1.2rem;color: blue">2. Reducing Child Labor</h4>
<p>A very heartbreaking scene in a society is to see children working to survive and earn a decent meal for themselves. <br>Their lost childhood is a scar that will not only impact them, but the future of our society as we know it.</p>
        
<h4 style="margin-top: 2rem;font-size: 1.2rem;color: blue">3. Supporting Education</h4>
<p>So many children live on the streets and are stuck in the slums due to lack of education and scarce resources to survive.<br> Food donations can also help to support education in developing countries. </p>

<h4 style="margin-top: 2rem;font-size: 1.2rem;color: blue">4. Supporting Local Communities</h4>
<p>By donating food, you can help to ensure that those in need have access to the nutrition they need to survive.<br> This can help to reduce poverty and can also help to improve the overall quality of life in the community.</p>
    </section>
    
    <section id="available" style="margin-top: 4rem">
        <div class="heading">
            <h3 style="margin-top: 7rem">Available Food List</h3>

            <table class="food">
            			<tr>
					<th style="margin-left: 1rem; display:flex;">Food Item</th>
					<th>Description</th>
					<th>Pickup Date</th>
					<th>Pickup Address</th>
					<th>State</th>
					<th>City</th>
					<th>Email</th>
					<th>Phone</th>
				</tr>
				   <?php
                 
                  include 'db_connection.php';



              $selectquery="select * from  addfood";

              $query=mysqli_query($con,$selectquery);

              $nums=mysqli_num_rows($query);

              while ($res=mysqli_fetch_array($query)) {

                ?>
                <tr>
                  <td><?php echo $res['item'];?></td>
                  <td><?php echo $res['des'];?></td>
                  <td><?php echo $res['date'];?></td>
                  <td><?php echo $res['address'];?></td>
                  <td><?php echo $res['state'];?></td>
                  <td><?php echo $res['city'];?></td>
                  <td><?php echo $res['email'];?></td>
                  <td><?php echo $res['phone'];?></td>

             

                <?php

              }

               ?>
                
</tr>
</table>
</div>
        </div>
    </section>
    
    <section id="donar" style="margin-top:2rem">
        <div class="heading">
            <h3>Donar</h3>
            <button style="padding: 2rem; background-color: red; width: 60rem; height: 10rem; margin-top: 5rem;"><a href="donate.php" style="font-size: 5rem; color: white">DONATE</a></button>

            <a href="viewfood.php" style="color: blue;font-size:2rem; font-family: sans-serif; font-weight: bold; margin-left: 10rem;margin-top: 3rem;display: block;">You can view Food Details here...........</a>
         </div>
    </section>
    
    <section id="admin" style="margin-top:2rem">
        <div class="heading">
            <h3>Admin</h3>
            <html>

    <nav class="main-navigation">
      <ul class="main-navigation__items">
        <li class="main-navigation__item">
          <a href="newrequest.php">New Request</a>
        <li class="main-navigation__item">
          <a href="foodtakeaway.php">Food take away</a>
          <li class="main-navigation__item">
          <a href="rejectrequest.php">Reject Request</a>
            <li class="main-navigation__item">
          <a href="allrequest.php">All Request</a>
              <li class="main-navigation__item">
        
        </li>
      </ul>
    </nav>
     
  <div class="grid" style="margin-top: 4rem">
    <div class="item">
      <div class="item__details">
      </div>
    </div>
    <div class="item item--large">
      <div class="item__details">
      </div>
    </div>
    <div class="item item--medium">
      <div class="item__details">
        
      </div>
    </div>
    <div class="item item--large">
      <div class="item__details">   
      </div>
    </div>


   
</div>
    </section>
    

     <section id="complain" style="background-color: white;">
               <div class="heading">
            <h3>Your Complain</h3>
            <table id='form_spec'>
<tr class="complain">
    <td colspan='2'><p><center><img src="https://i.imgur.com/dTmV7k7.jpg" alt="funny" width="200px;" height="200px;"></center><p></td>
</tr>
<th colspan='2'><font size="4">Please remember this is completely confidential and anonymous</font></th>
</tr>
<tr>
  <form method="POST">
<center><td>Username (If you wish to disclose):</td>
<td><input type='text' name="name" style="border: 1px solid black; border-radius:5px; padding: 1rem; margin-top: 2rem; margin-left: -5rem" placeholder="Enter Your Name" /></td>
</tr>
<tr>

  <td>Email:</td>
<td><input type='text' name="email" style="border: 1px solid black; border-radius:5px; padding: 1rem; margin-top: 2rem; margin-left: -5rem" placeholder="Enter Your Email" /></td>
</tr>


<td>What is your complaint?
</td>
<td><textarea rows='6' name="complain" style="margin-top: 1rem; margin-left: -5rem"></textarea></td>
</tr>
<tr>
<td colspan='2' id='send_form'><button type='submit' name="submitcomplain" style="padding: 1rem;margin-left: -7rem; margin-left:25rem; margin-top: 1rem; ">Submit My Complaint</button></td>
</tr>
</center>
</form>
</tr>
</table></center>

</div>
    </section>

     <section id="contact">
        <div class="heading">
            <h3 style="margin-top:5rem">Contact Us</h3>
            <div class="contain">

    <div class="form" style="margin-top:3rem; padding: 1rem;">
      <h4 style="text-align: center; font-size: 2rem; color: blue">GET IN TOUCH</h4>
      <h2 class="form-headline" style="margin-top:2rem; text-align: center;">Send us a message</h2>
       <?php

                   include 'db_connection.php';

                   if(isset($_POST['submitcontact'])){
                     $name=$_POST['name'];
                     $email=$_POST['email'];
                     $address=$_POST['address'];
                     $message=$_POST['message'];
                   
         
      
                     $emailquery = "SELECT * FROM contact WHERE email='$email'";

                     $query=mysqli_query($con,$emailquery);

                     $emailcount=mysqli_num_rows($query);

                     if ($emailcount>0) {
                        ?>
                        <script>
                           alert("Email already exist");
                        </script>
                        <?php
                     }else{

                           $insertquery="INSERT INTO contact(name, email, address, message) VALUES (' $name','$email',' $address','$message')";

                           $iquery=mysqli_query($con,$insertquery);

                           if($iquery){
                             ?>
                        <script>
                           alert("Your query will be submitted..");
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

      <form id="submit-form" action="" method="POST">
        <p>
          <input id="name" name="name" style="width:20rem; margin-left:7rem" class="form-input" type="text" placeholder="Your Name*">
          <small class="name-error"></small>
        </p><br>
        <p>
          <input id="email" name="email" style="width:20rem; margin-left: 7rem;" class="form-input" type="email" placeholder="Your Email*">
          <small class="name-error"></small>
        </p>
        <p class="full-width">
          <input style="width:20rem; margin-left: 7rem;" name="address" id="company-name" class="form-input" type="text" placeholder="Your Address*" required>
          <small></small>
        </p>
        <p class="full-width">
          <textarea  id="message" cols="30" rows="7" name="message" placeholder="Your Message*" style="width:20rem; margin-left: 7rem;" required></textarea>
          <small></small>
        </p>
        <p class="full-width">
          <input type="checkbox" id="checkbox" name="checkbox" checked style="margin-left:5rem;"> Yes, I would like to receive communications by call / email about Company's services.
        </p>
        <p class="full-width">
          <input type="submit" name="submitcontact" class="submit-btn" value="Submit" onclick="checkValidations()">
          <button class="reset-btn" onclick="reset()">Reset</button>
        </p>
      </form>
    </div>

   <!--  <div class="contacts contact-wrapper"> -->

      <ul>
        <li style="margin-top: -20rem;margin-left:42rem; width:15rem;">You can contact anytime.....</li>
        <span class="hightlight-contact-info" style="margin-left: 42rem; margin-top:2rem; display: block;"><i class="fa fa-envelope" aria-hidden="true"></i>savefood@gmail.com</li>
          <li style="margin-left: -0.1rem; margin-top: 1rem;"><i class="fa fa-phone" aria-hidden="true"></i> <span class="highlight-text">+91 9021066280</span></li>
        </span>
      </ul>
    </div>
  </div>
</div>
        </div>
    </section>

    <script type="text/javascript">
        $(document).ready(function(){
   $('.hm-menu').click(function(){
       $('header').toggleClass('h-100');
       $('.hm-menu span').toggleClass('hm-100');
       $('html').toggleClass('over-x');
   });
    
    $('header nav a').click(function(){
       $('header').removeClass('h-100');
       $('.hm-menu span').removeClass('hm-100');
        $('html').removeClass('over-x');
   });
    
});
    </script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="js/custom.js"></script>

    <script type="text/javascript">
        const nameEl = document.querySelector("#name");
const emailEl = document.querySelector("#email");
const companyNameEl = document.querySelector("#company-name");
const messageEl = document.querySelector("#message");

const form = document.querySelector("#submit-form");

function checkValidations() {
  let letters = /^[a-zA-Z\s]*$/;
  const name = nameEl.value.trim();
  const email = emailEl.value.trim();
  const companyName = companyNameEl.value.trim();
  const message = messageEl.value.trim();
  if (name === "") {
     document.querySelector(".name-error").classList.add("error");
      document.querySelector(".name-error").innerText =
        "Please fill out this field!";
  } else {
    if (!letters.test(name)) {
      document.querySelector(".name-error").classList.add("error");
      document.querySelector(".name-error").innerText =
        "Please enter only characters!";
    } else {
      
    }
  }
  if (email === "") {
     document.querySelector(".name-error").classList.add("error");
      document.querySelector(".name-error").innerText =
        "Please fill out this field!";
  } else {
    if (!letters.test(name)) {
      document.querySelector(".name-error").classList.add("error");
      document.querySelector(".name-error").innerText =
        "Please enter only characters!";
    } else {
      
    }
  }
}

function reset() {
  nameEl = "";
  emailEl = "";
  companyNameEl = "";
  messageEl = "";
  document.querySelector(".name-error").innerText = "";
}

    </script>
    <script type="text/javascript">
        const signUpButton = document.getElementById('signUp');
const signInButton = document.getElementById('signIn');
const container = document.getElementById('container1');

signUpButton.addEventListener('click', () =>
container.classList.add('right-panel-active'));

signInButton.addEventListener('click', () =>
container.classList.remove('right-panel-active'));
    </script>
</body>
</html>