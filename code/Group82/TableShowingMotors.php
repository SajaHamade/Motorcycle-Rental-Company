<!DOCTYPE html>
<html>

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
                 <li><a href="TableShowingMotors.php">Motorcycles Management</a></li>
                    <li><a href="adminusers.php">Users</a></li>
                    <li><a href="adminfeedback.php">Feedbacks</a></li>
                    <li><a href="adminBooking.php">Booking Request</a></li>
					<li><a href="adminstatistics.php">Statistics</a></li>
					
      </ul>
    </nav>
  
   
    <button class="button"><b><a href="home.php" style="text-decoration: none; color:black;">Logout</a></b></button>
  
   

   
  
</header>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">

<style>

   form button {
            background-color: rgb(179, 44, 48);
            color:#fff ;
            border: none;
            border-radius: 5px;
            padding: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        form button:hover {
            background-color: rgba(150, 150, 150, 0.8);
        }
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
.content-table th{
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

.but a{
  text-decoration: none;
  color: black;
}   
.bx-trash-alt{
  border-radius: 30px;
}


    button[name="Search"] {
        display: inline-block;
        width: 10%;
        padding: 10px;
        background-color: #b32c30;
        color: white;
        border: none;
        border-radius: 7px;
        cursor: pointer;
        font-family: 'Poppins', sans-serif;
        margin-left: 0%;
        margin-top: 5%;
    }

    input[type="text"] {
        display: inline-block;
        width: 50%;
        padding: 10px;
        margin-left: 20%;
        font-family: 'Poppins', sans-serif;
    }
	
	.button:hover {
            background-color: rgba(150, 150, 150, 0.8);
        }
		.button{
		color:#fff ;}
		
</style>

<?php
require_once('connection.php');
$query="SELECT * from motorcycle ";
$res = mysqli_query($con,$query);

?>

<form method="post" action="searchTable.php">
    <input type="text" name="query" placeholder="Enter your search">
    <button type="submit" name="Search">Search</button>
</form>
<button class="button" onclick="window.location.href='addmotorform.php'">Add Motorcycle</button>
 <table class="content-table">
<tr>
<th>ID</th>
<th>License Plate</th>
<th>Brand</th>
<th>Year</th>
<th>Engine/Battery</th>
<th>Fuel</th>
<th>PRICE</th>
<th></th>
<th></th>
<th></th>
</tr>
<?php
while ($data = mysqli_fetch_array($res)) {
    echo '<tr>';
    echo '<td>' . $data['ID'] .'</td>';
	echo '<td>' . $data['plate_number'] . '</td>';
    echo '<td>' . $data['Brand'] . '</td>';
    echo '<td>' . $data['Year'] . '</td>';
    echo '<td>' . $data['engine'] . '</td>';
    echo '<td>' . $data['fuel'] . '</td>';
    echo '<td>' . $data['price'] . '</td>';
    echo '<td>
            <form method="post" action="deleteMotor.php">
                <input type="hidden" name="motorID" value="' . $data['ID'] . '">
                <button type="submit" name="approve">Delete Motorcycle</button>
            </form>
       </td>';  
    echo '<td>
            <form method="post" name="EditInfo" action="UpdateMotor.php">
                <input type="hidden" name="motorID" value="' . $data['ID'] . '">
                <button type="submit" name="edit">Edit Information</button>
            </form>
          </td>';  
		  
$buttonText = ($data['Available'] == 'Yes') ? 'Repair Motorcycle' : 'Repair Done';
$availableStatus = ($data['Available'] == 'Yes') ? 'No' : 'Yes';
		    echo '<td>
    <form method="post" name="FixMotor" action="FixMotor.php">
        <input type="hidden" name="motorID" value="' . $data['ID'] . '">
        <input type="hidden" name="available" value="' . $data['Available'] . '">
        <input type="hidden" name="buttonText" value="' . $buttonText . '">
        <input type="hidden" name="availableStatus" value="' . $availableStatus . '">
        <button type="submit" name="edit">' . $buttonText . '</button>
    </form>
</td>';
		  
    echo '</tr>';
}
?>


</table>
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