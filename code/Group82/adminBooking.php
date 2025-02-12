<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Admin Booking</title>

    <style>
        .booking-main{
  display: flex;
  justify-content: center;
  align-items: center;
  width: 100%;
  background-position: center;
    
}
.booking-main ul{
  float: left;
  display: flex;
  justify-content: center;
  align-items: center;
}
.booking-main ul li{
  list-style: none;
  margin-left: 62px;
  margin-top: 27px;
  font-size: 14px;

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
  padding: 15px 20px;
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
.butt{
   color: #fff;
   background-color: #b32c30;
   border-radius: 10px;
   padding: 5px 7px;
   font-size: 20px;
   font-family: Arial;
  transition: 0.4s ease-in-out;
} 
.but1{
    background-color: #f3f3f3;
    border: 2px solid #b32c30;
    color: #b32c30;
    border-radius: 10px;
   padding: 5px 7px;
   font-size: 20px;
   font-family: Arial;
} 
.butt:hover, .but1:hover{
    background-color: #f3f3f3;
    border: 2px solid #b32c30;
    color: #b32c30;
}
    </style>
</head>

<body>

    <!-- My Navigation -->
    <header class="header">

        <a class="logo" href="admindash.php"><img src="RoadRover.jpeg" alt="logo"></a>

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
    $query = "SELECT * FROM booking ORDER BY book_id desc";
    $query_exec = mysqli_query($con, $query);
    $num = mysqli_num_rows($query_exec);

    if (isset($_POST['return'])) {
        $book = $_POST['book_id'];
        $update = "UPDATE booking 
        SET motor_result = 'RETURNED'
        where book_id = $book;";
        $updateExec = mysqli_query($con, $update);
    }

    ?>

    <!-- Table of information -->
    <div style="margin-top: 20px;">
    <h1 class="Title" style="text-align:center;font-size:35px;">Bookings</h1>
    <div class="booking-main">
        <div>
            <table class="content-table">
                <thead>
                    <tr>
                        <th>BOOK ID</th>
                        <th>MOTORCYCLE ID</th>
                        <th>EMAIL</th>
                        <th>DATE BOOKED</th>
                        <th>RETURN DATE</th>
                        <th>MOTORCYCLE STATUS</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    mysqli_data_seek($query_exec, 0);
                    while ($res = mysqli_fetch_array($query_exec)) {
                        $_SESSION['booking_' . $res['book_id']] = $res;
                        if ($res['motor_result'] !== 'RETURNED') :
                    ?>
                            <tr class="active-row">
                                <td><input type="hidden" name="book_id" value="<?php echo $res['book_id']; ?>" /><?php echo $res['book_id']; ?></td>
                                <td><?php echo $res['motor_id']; ?></td>
                                <td><?php echo $res['email']; ?></td>
                                <td><?php echo $res['book_date']; ?></td>
                                <td><?php echo $res['return_date']; ?></td>
                                <td><?php echo $res['motor_result']; ?></td>
                                <td>
                                    <form method="post" name="approve" action="adminrating.php">
                                        <input type="hidden" name="motorid" value="<?php echo $res['motor_id']; ?>">
                                        <input type="hidden" name="bookid" value="<?php echo $res['book_id']; ?>">
                                        <button type="submit" class="butt" name="approve">Return</button>
                                    </form>
                                </td>
                            </tr>
                    <?php endif;
                    } ?>

                    <?php
                    mysqli_data_seek($query_exec, 0);
                    while ($res = mysqli_fetch_array($query_exec)) {
                        if ($res['motor_result'] === 'RETURNED') :
                    ?>
                            <tr class="active-row">
                                <td><input type="hidden" name="book_id" value="<?php echo $res['book_id']; ?>" /><?php echo $res['book_id']; ?></td>
                                <td><?php echo $res['motor_id']; ?></td>
                                <td><?php echo $res['email']; ?></td>
                                <td><?php echo $res['book_date']; ?></td>
                                <td><?php echo $res['return_date']; ?></td>
                                <td><?php echo $res['motor_result']; ?></td>
                                <td><button class="but1" name="approve" disabled>Returned</button></td>
                            </tr>
                    <?php endif;
                    } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


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