<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>
    <script>
        $(document).ready(function() {
            $('form').validate();
        });
    </script>
    <title>BOOKING</title>

</head>

<body>
    <style>
       


        .main {
            height: 100vh;
            width: 100%;
        }

        .register {
            background-color: #fafafa;
            margin: 104px;
            margin-top: 116px;
            box-shadow: 10px 15px 20px rgba(0, 0, 0, .1);
            display: grid;
            grid-template-columns: 40% 60%;


        }

        .container-time {
            background-color: #212121;
            padding: 70px;
            outline: 3px dashed rgb(179, 44, 48);
            outline-offset: -20px;
            text-align: center;
            height: 419px;

        }

        p {
            position: center;
        }

        .heading {
            font-size: 35px;
            text-transform: uppercase;
        }

        .heading-days {
            color: rgb(179, 44, 48);
            font-size: 30px;
            font-family: ui-monospace;
            margin-top: 3px;
        }

        .heading-phone {
            font-size: 20px;
        }

        .container-form {
            padding: 20px 0;
            margin: 0 auto;
            color: #000;
        }

        form {
            display: grid;
            grid-row-gap: 20px;
            margin-top: 65px;
        }

        form p {
            font-weight: 600;
            font-family: 'Courier New', Courier, monospace;
            font-size: larger;
        }

        .form-field {
            display: flex;
            justify-content: space-between;
            margin-left: 10pc;
        }

        input {
            padding: 10px 15px;
        }

        .btn {
            background-color: #212121;
            padding: 10px 20px;
            font-size: 18px;
            color: #fff;
            border: none;
            border-radius: 10px;
            box-shadow: 7px 10px 12px rgba(0, 0, 0, .1);
            cursor: pointer;
            transition: all .3s;
        }

        .btn:hover {
            transform: scale(1.03);
            box-shadow: 10px 12px 15px rgba(0, 0, 0, .3);
        }

        
    </style>
    <!-- My Navigation -->
    <nav>
    <header class="header">
        

        <a class="logo" href="MotorcyclesDisplay.php"><img src="RoadRover.jpeg" alt="logo"></a>

        <ul class="nav-links">
                 <li><a href="MotorcyclesDisplay.php">Home</a></li>
                    <li><a href="bookinstatus.php">Booking Request</a></li>
                    <li><a href="Feedbacks.php">Feedback</a></li>
              
					
      </ul>
      <button class="button"><b><a href="home.php" style="text-decoration: none; color:black;">Logout</a></b></button>
    </nav>
  
   
    
    </header>
    <!-- End of Navigation -->

    <?php
    require_once('connection.php');
    session_start();
    $motor_id = $_POST['motorID'];
	if (!$motor_id) {
    echo "<script>alert('Id problem');</script>";
}
    // function to calculate the duration 
    function calculateDateDurationInDays($startDate, $endDate)
    {
        $startDateTime = new DateTime($startDate);
        $endDateTime = new DateTime($endDate);
        $duration = $startDateTime->diff($endDateTime);
        // Extract the number of days
        $days = $duration->days;
        return $days;
    }




    // fetch all bookings that are done on this motor
    $sql = "SELECT * FROM motorcycle WHERE ID='$motor_id'";
    $mname = mysqli_query($con, $sql);

    $motor = mysqli_fetch_assoc($mname);

    $value = $_SESSION['email'];
    $sql = "SELECT * FROM users WHERE email='$value'";
    $name = mysqli_query($con, $sql);
    $rows = mysqli_fetch_assoc($name);

    $uemail = $rows['email'];
    $motorprice = $motor['price'];

   if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['bdate']) && isset($_POST['rdate']) && isset($_POST['time'])) {
    $rdate = date('Y-m-d', strtotime($_POST['rdate']));
    $bdate = date('Y-m-d', strtotime($_POST['bdate']));
    $btime = date('H:i:s', strtotime($_POST['time']));

        // Check if the selected date is within the range of booked dates for the given motor
        $availabilityQuery = "SELECT * FROM booking WHERE motor_id = $motor_id AND ('$bdate' BETWEEN book_date AND return_date)";
        $availabilityResult = mysqli_query($con, $availabilityQuery);


        if (mysqli_num_rows($availabilityResult) > 0) {
            // Date is not available, show an error or take appropriate action
            echo '<script>alert("This date is not available. Please choose another date.");</script>';
        } else {
            // Date is available, proceed with the booking
            // Insert the booking into the database

            if ($bdate < $rdate) {
                $dur = calculateDateDurationInDays($bdate, $rdate);
                $price = ($dur * $motorprice);
				
                $sqlbook = "INSERT INTO booking (motor_id, email, book_date, price, return_date,motor_result) VALUES ($motor_id, '$uemail', '$bdate', $price, '$rdate','Under Processing')";
                $result = mysqli_query($con, $sqlbook);

                if ($result) {
                    $_SESSION['email'] = $uemail;
					$_SESSION['booking_price'] = $price;
                    header("Location: payment.php");
                    exit();
                } else {
                    echo '<script>alert("Please check the connection");</script>';
                }
            } else {
                echo  '<script>alert("Please enter a correct return date");</script>';
            }
        }
}
    ?>


    <div class="main">
        <div class="register">
            <div class="container-time">
                <h2 class="heading" style="font-family: 'Courier New', Courier, monospace;color:#fff;"> Road Rover</h2>
                <h3 class="heading-days">Monday-friday</h3>
                <p style="margin-top: 3px; color:#fff;">10 am - 9 pm</p>
                <h3 class="heading-days">Saturday-Sunday</h3>
                <p style="margin-top: 3px; color:#fff;">7 am - 12 am</p>


            </div>
            <div class="container-form">
                <form method="post">
				<input type="hidden" name="motorID" value="<?php echo $motor_id; ?>">
                    <h1 class="heading-red" style=" font-family: ui-monospace;"> MOTOR NAME : <?php echo   $motor['Brand']; ?></h1>
                    <table border="0">
                        <tr>
                            <td>
                                <p>Booking Date: </p>
                            </td>
                            <td>
                                <input type="date" name="bdate" id="datefield" required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p>Return Date: </p>
                            </td>
                            <td>
                                <input type="date" name="rdate" id="returnDateField" required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p>Time Receiving Motor: </p>
                            </td>
                            <td>
                                <input type="time" name="time" required>
                            </td>
                        </tr>
                    </table>

                    <div class="form-field">
                        <button style="display: inline-block" type="submit" name="book" class="btn">Book Now</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
    <script>
        // Set the minimum date for the "Booking Date" input field
        document.getElementById('datefield').min = new Date().toISOString().split('T')[0];

        // Set the minimum date for the "Return Date" input field
        document.getElementById('returnDateField').min = new Date().toISOString().split('T')[0];
    </script>




    <!-- footer -->
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