<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  
 
  <title>Nationwide Motorcycle Rentals</title>
</head>

<body>

<!-- My Navigation -->
<header class="header">
  
    <a class="logo" href="home.php"><img src="mylogo.jpg" alt="logo"></a>
  
  
    <nav class="nav">
      <ul class="nav-links">
        <li><a href="test.html">Contact</a></li>
        <li><a href="#" id="form-open">Login</a></li>
      </ul>
    </nav>
  
   
    <button class="button"><b>Admin</b></button>
   
  
</header>
<!-- End of Navigation -->



<?php
require_once('connection.php');

$id = $_POST['motorID'];
$available = $_POST['available'];
$buttonText = $_POST['buttonText'];
$availableStatus = $_POST['availableStatus'];

$query = "UPDATE motorcycle SET Available = '$availableStatus' WHERE ID='$id'";
$result = mysqli_query($con, $query);

if ($result) {
	if($availableStatus =='Yes'){
    echo '<script>alert("The current motorcycle has been Repaired.Its Available for Now")</script>';}
	else{
	echo '<script>alert("The current motorcycle Is Undergoing Repairations.Its Not Available for Now")</script>';
	}
    echo '<script>window.location.href = "TableShowingMotors.php";</script>';
} else {
    echo '<script>alert("Error updating motorcycle")</script>';
    
}
?>

  
<!-- Footer-->
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
<!-- End of footer -->

</body>
</html>