<!doctype html>
	<html>
		<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  		  <title>Feedbacks</title>
		  <link rel="stylesheet" href="css/bootstrap.min.css">
		  <script src="js/bootstrap.min.js"></script>
		  <script src="js/jquery-3.3.1.min.js"></script>
		  <link rel="stylesheet" href="Stylesheet.css">
		 
		 
		</head>
	<style>
	

body{
    line-height: 1.5;
    font-family: 'Poppins', sans-serif;
	background-color:#212121;
		background-repeat:no-repeat;
		background-attachment:fixed;
}
*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}


/* Navigation css */
nav li, nav a, button{
    font-family: "Montserrat", sans-serif;
    font-weight: 500;
    font-size: 20px;
    color: #edf0f1;
    text-decoration: none;
   
    
}
header{
    display: flex;
    justify-content: flex-end;
    align-items: center;
    padding: 0px 10px;
    background-color: #212121;
}
.logo{
    margin-right: auto;
}
.nav-links{
    list-style: none;
}
.nav-links li{
    display: inline-block;
    padding: 0px 20px;
}
.nav-links li a{
    transition: all 0.3s ease 0s;
}
.nav-links li a:hover{
    color: rgb(179, 44, 48);
}
.button{
    color: #212121;
    padding: 9px 25px;
    margin-left: 20px;
    background-color: rgb(179, 44, 48);
    border: none;
    border-radius: 50px;
    font-size: 1.25em;
    transition: all 0.3s ease 0s;
}
button:hover{
    background-color: rgb(179, 44, 48);
}





/* Footer css */
.container{
    max-width: 1170px;
    margin: auto;
}
.row{
    display: flex;
    flex-wrap: wrap;
}
ul{
    list-style: none;
}
.footer{
    background-color: #212121;
    padding: 70px 0;
	margin-top:40%;
}
.footer-col{
    width: 25%;
    padding: 0 15px;
}
.footer-col h4{
    font-size: 18px;
    color: #ffffff;
    text-transform: capitalize;
    margin-bottom: 35px;
    font-weight: 500;
    position: relative;
    
}
.footer-col h4::before{
    content: '';
    position: absolute;
    left: 0;
    bottom: -10px;
    background-color: rgb(179, 44, 48);
    height: 2px;
    box-sizing: border-box;
    width: 50px;
}
.footer-col ul li:not(:last-child){
    margin-bottom: 10px;
}
.footer-col ul li a{
    font-size: 16px;
    text-transform: capitalize;
    color: #bbbbbb;
    text-decoration: none;
    font-weight: 300;
    display: block;
    transition: all 0.3s ease;
}
.footer-col ul li a:hover{
    color: rgb(179, 44, 48);
    padding-left: 8px;
}
.footer-col .socialIcons a{
    display: inline-block;
    height: 40px;
    width: 40px;
    background-color: rgb(255, 255, 255, 0.2);
    margin-right: 10px;
    margin: 0 10px 10px 0;
    text-align: center;
    line-height: 40px;
    border-radius: 50%;
    color: #ffffff;
    transform: all 0.5s ease;
}

.footer-col .socialIcons a:hover{
    color: #24262b;
    background-color: rgb(179, 44, 48);
}

.logo{
    
	position: absolute;
    top: 0;
    left: 0;
}
.btn:hover{
background: #ff6666;}

 input[type="radio"] {
    display: none;
  }

  label {
    display: inline-block;
    cursor: pointer;
    padding: 5px 10px;
    margin-right: 10px;
    font-size: 16px;
    color: #212121; 
    border: 2px solid #b32c30; 
    border-radius: 5px;
    transition: all 0.3s ease;
  }

  input[type="radio"]:checked + label {
    background-color: #b32c30; 
    color: #fff; 
  }

  /* Optional hover effect */
  label:hover {
    background-color: #b32c30; /* Hover Background Color */
    color: #fff; /* Hover Text Color */
  }
</style>	
<body>
<?php
require_once('connection.php');
session_start();
$email = $_SESSION['email'];

if(isset($_POST['submit'])){
	$comment=mysqli_real_escape_string($con,$_POST['comment']);
	$rating=mysqli_real_escape_string($con,$_POST['rating']);
	$sql="insert into  feedback (EMAIL,COMMENT,RATING) values('$email','$comment','$rating')";
	$result = mysqli_query($con,$sql);
	echo '<script>alert("Feedback Sent Successfully!!THANK YOU!!")</script>';
	header("Location: MotorcyclesDisplay.php");

	
}

?>
<header>
 <img class="logo" src="mylogo.jpg" alt="logo"> </header>

<button class="btn" style="
                        width: 150px;
                        background-color:rgb(179, 44, 48);;
                        color: #fff;
                        border: none;
                        cursor: pointer;
                        padding: 10px;
                        font-size: 18px;
                        margin-left:40px;
						margin-top:100px;
						
                    "><a href="MotorcyclesDisplay.php" style="
                    text-decoration: none;
                    color: #fff;">Go To Home</a></button>	

<br><br><br>
	<div id="form" style="margin-top:2%;">	
		
		<div class="col-md-12" id ="mainform">
			<div class="col-sm-6">
			   <h2  class="contact-us" style="font-size:72px; color:rgb(179, 44, 48);"><strong style="font-size:5cm; color:rgb(179, 44, 48);">F</strong>eedback.</h2>
			</div>
			<div class="col-sm-6" >
				<form method="POST">
				<h4>Name:</h4> <input type="text" name="name" size="20"  class=" form-control" placeholder="User name" required />
				
				
				<h4>Rating our website:</h4>
    <input type="radio" id="excellent" name="rating" value="Excellent">
<label for="excellent">Excellent</label>

<input type="radio" id="good" name="rating" value="Good">
<label for="good">Good</label>

<input type="radio" id="average" name="rating" value="Average">
<label for="average">Average</label>
	<input type="radio" id="poor" name="rating" value="Poor">
<label for="poor">Poor</label>
	
     
   <br>
				<h4>Comments:</h4><textarea class="form-control"   name="comment" rows="6"  placeholder="Message"  required></textarea>
				<br><center>
				<input type="submit" class="btn btn-info" id="btn" style="text-shadow:0 0 3px #000000; background-color:rgb(179, 44, 48);font-size:24px;width:250px;" value="SUBMIT" name="submit"></center>
				<form>
			</div>
		</div>
	</div>

<footer class="footer">
  <div class="container">
    <divc class="row">

      <div class="footer-col">
        <h4>About</h4>
        <ul>
          <li><a href="#">Contact</a></li>
          <li><a href="#">Services</a></li>
          <li><a href="#">Team</a></li>
        </ul>
      </div>

      <div class="footer-col">
        <h4>Further Imformation</h4>
        <ul>
          <li><a href="#">Terms & Conditions</a></li>
          <li><a href="">Privacy Policy</a></li>
        </ul>
      </div>

      <div class="footer-col">
        <h4>Contact Us</h4>
        <ul>
          <li><a href="#"><i class="fas fa-map-marker-alt"></i>Lebanon , Beirut , Hamra Street</li></a>
          <li><a href="#"><i class="fas fa-phone"></i> + 01 234 567 89</li></a>
          <li><a href="#"><i class="fas fa-envelope"></i> Contact@example.com</li></a>
        </ul>
      </div>

      <div class="footer-col">
        <h4>Follow Us</h4>
        <div class="socialIcons">
          <a href="#"><i class="fab fa-facebook-f"></i></a>
          <a href="#"><i class="fab fa-twitter"></i></a>
          <a href="#"><i class="fab fa-instagram"></i></a>
          <a href="#"><i class="fab fa-linkedin-in"></i></a>
        </div>
      </div>
    </div>
  </div>
</footer>

</div>
	</body>
</html>
