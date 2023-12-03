<!DOCTYPE html>
<html lang="en">
  <head>
    <title>View Food</title>
</head>
<style type="text/css">
  *{
    text-decoration: none;
  }
  .title{
    color: white;
    padding: 1rem;
    margin-left: 4rem; 
    font-size: 1.2rem;
    font-family: sans-serif;
    font-weight: bold;
  }
  .title:hover{
    color: ;
    background-color: skyblue;
  }
</style>
<body>
<nav style="padding: 1rem;background-color: blue;margin-left: -1rem;width:98.5rem;">
  <a href="addfood.php" class="title">Add Food</a>
  <a href="managefood.php" class="title">Manage Food </a>
  <a href="viewnewrequest.php" class="title">View New Request</a>
  <a href="viewfoodtakeaway.php" class="title">View Food Take Away</a>
  <a href="viewrejectedrequest.php" class="title">View Rejected Request</a>
  <a href="viewallrequest.php" class="title">View All Request</a>
  
</nav>

                <div class="slideshow-container">

<div class="mySlides fade">

  <img src="images/food1.jpeg" style="width:149.3rem; margin-left: -50rem;height: 40rem;">
</div>

<div class="mySlides fade">
  <img src="images/food2.jpg" style="width:149.3rem; margin-left: -50rem; height: 40rem;">
</div>

<div class="mySlides fade">
  <img src="images/food4.jpg" style="width:149.3rem; margin-left: -50rem; height: 40rem">
</div>


<br>

<div style="margin-left: -1rem">
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
</div>
</div>
</div>
</div>
</div>


<script>
let slideIndex = 0;
showSlides();

function showSlides() {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  let dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}    
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
  setTimeout(showSlides, 2000); // Change image every 2 seconds
}
</script>

</body>

</html>
