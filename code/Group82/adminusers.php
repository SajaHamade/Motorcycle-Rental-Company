<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style2.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Road Rover</title>

   
</head>
<style>
.hai{
  display: flex;
  justify-content: center;
  align-items: center;
  width: 100%;
  background: linear-gradient(to top, rgba(0,0,0,0)50%, rgba(0,0,0,0)50%),url("../images/carbg2.jpg");
  background-position: center;
  background-size: cover;
  height: 110vh;
  animation: infiniteScrollBg 50s linear infinite;
    
}
.hai ul{
  float: left;
  display: flex;
  justify-content: center;
  align-items: center;
}
.hai ul li{
  list-style: none;
  margin-left: 62px;
  margin-top: 27px;
  font-size: 14px;

}
.hai ul li a{
  text-decoration: none;
  color: black;
  font-family: Arial;
  font-weight: bold;
  transition: 0.4s ease-in-out;
}
.content-table{
  border-collapse: collapse;
  font-size: 0.9em;
  min-width: 900px;
  border-radius: 5px 5px 0 0;
  overflow: hidden;
  box-shadow:0 0  20px rgba(0,0,0,0.15);
  margin: 40px;
  align-items: center;
  height: 500px;
}
.content-table thead tr{
  background-color: #b32c30;
  color: white;
  text-align: left;
}
.content-table th,
.content-table td{
  padding: 12px 15px;
}
.content-table tbody tr{
  border-bottom: 1px solid #dddddd;
}
.content-table tbody tr:nth-of-type(even){
  background-color: #f3f3f3;

}
.content-table tbody tr:last-of-type{
  border-bottom: 2px solid #b32c30;
}
.content-table thead .active-row{
    font-weight:  bold;
    color: orange;
}
.but a{
  text-decoration: none;
  color: black;
}   
.bx-trash-alt{
  border-radius: 30px;
}
</style>
<body>


<header class="header">
  
    <a class="logo" href="admindash.php"><img src="mylogo.png" alt="logo"></a>
  
  
    <nav class="nav">
      <ul class="nav-links">
                 <li><a href="TableShowingMotors.php">Motorcycles Management</a></li>
                    <li><a href="adminusers.php">Users</a></li>
                    <li><a href="adminfeedback.php">Feedbacks</a></li>
                    <li><a href="adminBooking.php">Booking Request</a></li>
					<li><a href="adminstatistics.php">Statistics</a></li>
					
      </ul>
    </nav>
  
   
    <button class="button"><b><a href="home.php" style="text-decoration: none; color:black;">Logout</a></b></button>
   
  
</header>



<?php
require_once('connection.php');
$query = "SELECT * FROM users";
$queryy = mysqli_query($con,$query);
$num = mysqli_num_rows($queryy);
?>
<div class="hai">
       
<div>      
            <h1 class="header1" style="text-align:center; ">USERS</h1>
            <div>
                <div>
                    <table class="content-table">
                <thead>
                    <tr>
                        <th>NAME</th> 
                        <th>EMAIL</th>
                        <th>PHONE NUMBER</th> 
                        <th>RATING</th> 
                        <th>DELETE USERS</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                
                
                while($res=mysqli_fetch_array($queryy)){
                
                
                ?>
                <tr  class="active-row">
                    <td><?php echo $res['firstname']."  ".$res['lastname'];?></php></td>
                    <td><?php echo $res['email'];?></php></td>
                    <td><?php echo $res['phone'];?></php></td>
                    <td><?php echo $res['rating'];?></php></td>
                    <td><button type="submit" class="but" name="approve" style="border:1px solid #b32c30; padding:4px 5px; border-radius:5px;"><a href="deleteuser.php?id=<?php echo $res['email']?>"><i class='bx bxs-trash-alt' style="color: #b32c30;"></i></a></button></td>
                    
                </tr>
               <?php } ?>
                </tbody>
                </table>
                </div>
            </div>
</div>        
</div>

<!-- Footer-->
<footer class="footer">
  <div class="container">
    <div class="row">

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
          <li><a href="#"><i class="fas fa-map-marker-alt"></i> Lebanon , Beirut , Hamra Street</li></a>
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