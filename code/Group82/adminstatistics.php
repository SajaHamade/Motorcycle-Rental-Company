<html>
<head>
    <title>Statistics</title>
	 <link rel="stylesheet" href="style2.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<style>
.hai{
 
 
  background: linear-gradient(to top, rgba(0,0,0,0)50%, rgba(0,0,0,0)50%),url("../images/carbg2.jpg");
 
  background-size: cover;
  height: 130vh;
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
 
  align-items: center;
  height: 300px;
  width:10%;
  margin-left:17%;

}
 .table-container {
      display: flex;
      justify-content: space-between;
      margin-top: 20px;
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

<?php
session_start();
require_once('connection.php');


$queryTotalBookings = "SELECT COUNT(*) AS totalBookings FROM booking";
$resultTotalBookings = mysqli_query($con, $queryTotalBookings);
$rowTotalBookings = mysqli_fetch_assoc($resultTotalBookings);
$totalBookings = $rowTotalBookings['totalBookings'];



$queryReturnedBookings = "SELECT COUNT(*) AS returnedBookings FROM booking WHERE motor_result = 'Returned'";
$resultReturnedBookings = mysqli_query($con, $queryReturnedBookings);
$rowReturnedBookings = mysqli_fetch_assoc($resultReturnedBookings);
$returnedBookings = $rowReturnedBookings['returnedBookings'];


$queryPopularCars = "SELECT motor_id, COUNT(*) AS bookingsCount 
                     FROM booking 
                     GROUP BY motor_id
                     ORDER BY COUNT(*) DESC 
                     LIMIT 5"; 
$resultPopularCars = mysqli_query($con, $queryPopularCars);


$queryBookingsPerMonth = "SELECT YEAR(BOOK_DATE) AS bookingYear, MONTH(BOOK_DATE) AS bookingMonth, COUNT(*) AS bookingsCount 
                          FROM booking 
                          GROUP BY YEAR(BOOK_DATE), MONTH(BOOK_DATE)";
$resultBookingsPerMonth = mysqli_query($con, $queryBookingsPerMonth);



$queryTopUsers = "SELECT EMAIL, COUNT(*) AS totalBookings 
                  FROM booking 
                  GROUP BY EMAIL 
                  ORDER BY COUNT(*) DESC 
                  LIMIT 5"; 
$resultTopUsers = mysqli_query($con, $queryTopUsers);


$queryPeakBookingDays = "SELECT BOOK_DATE, COUNT(*) AS bookingsCount 
                         FROM booking 
                         GROUP BY BOOK_DATE 
                         ORDER BY COUNT(*) DESC 
                         LIMIT 5"; 
$resultPeakBookingDays = mysqli_query($con, $queryPeakBookingDays);

?>


<!DOCTYPE html>

<body>

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
<div class="hai">
        <div>      
            <h1 class="header1" style="text-align:center; ">Statistics</h1>
        <div>
            <h2 style="margin-left:5%; color: #b32c30;">Total Bookings: <?php echo $totalBookings; ?></h2>
            <h2 style="margin-left:5%;color: #b32c30;">Returned Bookings: <?php echo $returnedBookings; ?></h2>
			
			
			
			<table class="content-table">
    <thead>
        <tr>
            <th>Motorcycle ID</th>
            <th>Number of Bookings</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($row = mysqli_fetch_assoc($resultPopularCars)) : ?>
            <tr  class="active-row">
                <td><?php echo $row['motor_id']; ?></td>
                <td><?php echo $row['bookingsCount']; ?></td>
            </tr>
        <?php endwhile; ?>
    </tbody>
</table>

<br><br>
            
			<table class="content-table">
    <thead>
        <tr>
            <th>Year</th>
            <th>Month</th>
            <th>Bookings Count</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($row = mysqli_fetch_assoc($resultBookingsPerMonth)) : ?>
            <tr  class="active-row">
                <td><?php echo $row['bookingYear']; ?></td>
                <td><?php echo $row['bookingMonth']; ?></td>
                <td><?php echo $row['bookingsCount']; ?></td>
            </tr>
        <?php endwhile; ?>
    </tbody>
</table>
</div><div>
<table class="content-table">
<br><br>
    <thead>
        <tr>
            <th>User Email</th>
            <th>Total Bookings</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($row = mysqli_fetch_assoc($resultTopUsers)) : ?>
            <tr  class="active-row">
                <td><?php echo $row['EMAIL']; ?></td>
                <td><?php echo $row['totalBookings']; ?></td>
            </tr>
        <?php endwhile; ?>
    </tbody>
</table><br><br>


<table class="content-table">
    <thead>
        <tr>
            <th>Booking Date</th>
            <th>Total Bookings</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($row = mysqli_fetch_assoc($resultPeakBookingDays)) : ?>
            <tr  class="active-row">
                <td><?php echo $row['BOOK_DATE']; ?></td>
                <td><?php echo $row['bookingsCount']; ?></td>
            </tr>
        <?php endwhile; ?>
    </tbody>
</table>
        </div>
    </div> </div>
</body>
</html> 