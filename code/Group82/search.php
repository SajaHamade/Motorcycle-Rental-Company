<!DOCTYPE html >
<html>
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
  
    <a class="logo" href="MotorcyclesDisplay.php"><img src="mylogo.jpg" alt="logo"></a>
  
  
     <nav class="nav">
      <ul class="nav-links">
                 <li><a href="MotorcyclesDisplay.php">Home</a></li>
                    <li><a href="bookinstatus.php">Booking Request</a></li>
                    <li><a href="Feedbacks.php">Feedback</a></li>
              
					
      </ul>
    </nav>
  
   
    <button class="button"><b><a href="home.php" style="text-decoration: none; color:black;">Logout</a></b></button>
   
  
</header>

  <title>Nationwide Motorcycle Rentals</title>
  <style>
    body {
      background-color: #fff;
      color: rgb(179, 44, 48);
      font-family: 'Poppins', sans-serif;
      margin: 0;
      padding: 0;
    }

    .nav-links a {
      color: #fff;
      text-decoration: none;
      transition: color 0.3s ease;
    }

    .button {
      background-color: rgb(179, 44, 48);
      color: #fff;
      padding: 8px 16px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      transition: background-color 0.3s ease, color 0.3s ease;
    }

    .button:hover {
      background-color:  #fff;
      color:rgb(179, 44, 48);
    }

    form {
      margin-top: 20px;
      text-align: center;
    }

    button[name="Search"],
    button[name="book"],
    button[name="SimilarMotors"] {
      width: 100%;
      padding: 8px;
      background-color: rgb(179, 44, 48);
      color: #fff;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      transition: background-color 0.3s ease, color 0.3s ease;
    }

    button[name="Search"]:hover,
    button[name="book"]:hover,
    button[name="SimilarMotors"]:hover {
      background-color: rgba(150, 150, 150, 0.8);
      color: #fff;
    }

    input[type="text"] {
      width: 50%;
      padding: 10px;
      font-family: 'Poppins', sans-serif;
    }
  </style>






<form method="post" action="search.php">
    <input type="text" name="query" placeholder="Enter your search">
    <button type="submit" name="Search" style="width:10%;">Search</button>
</form>
 

 
<?php
require_once("connection.php");
if (isset($_POST['query'])) {
    $search_query = $_POST['query'];

    // Perform search in the database
    $query = "SELECT * FROM motorcycle WHERE LOWER(Brand) LIKE '%$search_query%' OR plate_number LIKE '%$search_query%'OR ID LIKE '%$search_query%'  OR Year LIKE '%$search_query%'OR engine LIKE '%$search_query%'OR fuel LIKE '%$search_query%' OR price LIKE '%$search_query%'";
    $res=mysqli_query($con,$query);
}
?>


<?php
if ($res->num_rows > 0) {
    echo '<div style="display: flex; flex-wrap: wrap;">';
    while ($data = mysqli_fetch_array($res)) {
        echo '<div style="width: 300px;  margin:30px;background-color: #f3f3f3; padding: 10px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); position: relative;">';
        echo '<img src="' . $data['image'] . '" style="width: 100%;height:50%; border-radius: 8px; margin-bottom: 10px;"';
        if ($data['Available'] == 'No') {
            echo 'title="Not Available" style="opacity: 0.7; cursor: not-allowed;"';
        }
        echo '>';
        echo '<p><strong>Brand:</strong> ' . $data['Brand'] . '</p>';
        echo '<p><strong>Year:</strong> ' . $data['Year'] . '</p>';
        echo '<p><strong>Price Per 24 Hours($):</strong> ' . $data['price'] . '</p>';
        echo '<p><strong>License Plate:</strong> ' . $data['plate_number'] . '</p>';
        echo '<p><strong>Engine(cc)/Battery(kWh):</strong> ' . $data['engine'] . '</p>';
        echo '<p><strong>Fuel:</strong> ' . $data['fuel'] . '</p>';
        if ($data['Available'] == 'No') {
            echo '<button type="button" style="width: 100%; padding: 8px; background-color: #ccc; color: #fff; border: none; border-radius: 4px; cursor: not-allowed;" disabled>Book</button>';
        } else {
            echo '<form method="post" action="booking.php" style="margin-top: 10px;">
                    <input type="hidden" name="motorID" value="' . $data['ID'] . '">
                    <button type="submit" name="book" style="width: 100%; padding: 8px; background-color: rgb(179, 44, 48); color: #fff; border: none; border-radius: 4px; cursor: pointer;">Book</button>
                </form>';
        }
        if ($data['Available'] == 'No') {
            echo '<form method="post" action="SimilarMotors.php" style="margin-top: 10px;">
                    <input type="hidden" name="motorID" value="' . $data['ID'] . '">
                    <button type="submit" name="SimilarMotors" style="width: 100%; padding: 8px; background-color: rgb(179, 44, 48); color: #fff; border: none; border-radius: 4px; cursor: pointer;">Show Similar Motors</button>
                </form>';
        }
        echo '</div>';
    }
    echo '</div>';
} else {
    echo "No Motorcycles Found";
}
?>


   
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