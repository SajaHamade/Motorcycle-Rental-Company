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
                 <li><a href="TableShowingMotors.php">Motorcycles Management</a></li>
                    <li><a href="adminusers.php">Users</a></li>
                    <li><a href="admindash.php">Feedbacks</a></li>
                    <li><a href="adminBooking.php">Booking Request</a></li>
					<li><a href="adminstatistics">Statistics</a></li>
					
      </ul>
    </nav>
  
   
    <button class="button"><b><a href="home.php" style="text-decoration: none; color:black;">Logout</a></b></button>
  
</header>

     <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins&display=swap">
    <style>
        body {
            background-color: #fff;
            color: rgb(179, 44, 48);
            font-family: 'Poppins', sans-serif;
            font-size: 20px;
        }

        form {
            max-width: 600px;
            margin: 20px auto; /* Adjusted margin from top and bottom */
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
			 background-color: #f3f3f3;
        }

        input, label {
            margin-bottom: 15px;
        }

        label {
            font-weight: 900; /* Increased font weight */
            
        }

        input[type="text"],
        input[type="number"],
        input[type="file"],
        input[type="radio"],
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
            border: 1px solid rgb(179, 44, 48);
            border-radius: 30px; /* Added border-radius */
        }

        input[type="submit"] {
            background-color: rgb(179, 44, 48);
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #333;
        }

        /* Style radio buttons */
        input[type="radio"] {
            margin-bottom: 10px; /* Adjusted margin to move below labels */
        }
    </style>
<?php


 require_once('connection.php');

$to_Edit=$_POST['motorID'];
$query = "SELECT * from motorcycle WHERE ID = $to_Edit ";
$result=mysqli_query($con , $query);
 $row = mysqli_fetch_assoc($result);
?>


<form name="EditMotor" action="uploadtoDbUpdated.php" method="POST" >
<input type="hidden" name="motorID" value="<?php echo $row['ID'] ; ?>">
Plate Number:<input type="text" name="plate" id="plate" value="<?php echo $row['plate_number']; ?>" required >
<br><br>
Brand:<input type="text" name="Brand" id="Brand" value="<?php echo $row['Brand']; ?>" required >
<br><br>
Model Year:<input type="number" name="year" id="year" value="<?php echo $row['Year']; ?>" required >
<br><br>
Engine/Battery Size:<input type="number" name="engine" id="engine" value="<?php echo $row['engine']; ?>" required >
<br><br>
Fuel Type:
<br>
<label><input type="radio" name="Fuel" value="Gasoline" <?php echo ($row['fuel'] == 'Gasoline') ? 'checked' : ''; ?> /> Gasoline </label>
<br>
<label><input type="radio" name="Fuel" value="Diesel" <?php echo ($row['fuel'] == 'Diesel') ? 'checked' : ''; ?> /> Diesel </label>
<br>
<label><input type="radio" name="Fuel" value="Electricity" <?php echo ($row['fuel'] == 'Electricity') ? 'checked' : ''; ?> />  Electricity </label>
<br><br>
Price per 24 hours:<input type="number" name="price" id="price" value="<?php echo $row['price']; ?>" required >
<br><br>
  <img src="<?php echo $row['image']; ?>"><br>
    
   
    <input type="hidden" name="oldImage" value="<?php echo $row['image']; ?>">
    
    
   <br><br>
    
    <input type="submit" value="Update Information" name="editInfo">
</form>


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
</html>