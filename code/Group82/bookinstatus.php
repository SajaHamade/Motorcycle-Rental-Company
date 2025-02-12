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
    <title>MOTOR STATUS</title>

</head>

<body>
    <style>

        .box {

            position: center;
            top: 50%;
            left: 50%;
            padding: 20px;
            box-sizing: border-box;
            background: #fff;
            border-radius: 4px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, .5);
            background: linear-gradient(to top, rgba(255, 251, 251, 1)70%, rgba(250, 246, 246, 1)90%);
            display: flex;
            align-content: center;
            width: 845px;
            height: 294px;
            margin-top: 133px;
            margin-left: 350px;
            margin-bottom: 64px;


        }


        .box .content {
            margin-left: 5px;
            font-size: larger;
        }

        .box .button {
            width: 240px;
            height: 40px;
            background: #ff7200;
            border: none;
            margin-top: 30px;
            font-size: 18px;
            border-radius: 10px;
            cursor: pointer;
            color: #fff;
            transition: 0.4s ease;
        }

        .utton {
            width: 200px;
            height: 40px;

            background: rgb(179, 44, 48);
            border: none;
            font-size: 18px;
            border-radius: 5px;
            cursor: pointer;
            color: #fff;
            transition: 0.4s ease;
            margin-top: 10px;
            margin-left: 10px;
        }

        .utton a {
            text-decoration: none;
            color: white;
            font-weight: bold;
        }

        .ul1 {
            float: left;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 100px;
        }

        .li1 {
            list-style: none;
            margin-left: 200px;
            margin-top: -130px;
            font-size: 35px;

        }

        .name {
            font-weight: bold;
        }

        img {
            width: 320px;
        }

        .y {
            font-weight: normal;
            font-family: ui-monospace;
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
    </nav>
  
   
   <!-- <button class="button"><b><a href="home.php" style="text-decoration: none; color:black;">Logout</a></b></button> -->

    </header>
    <!-- End of Navigation -->
    <div class="main">
        <?php
        require_once('connection.php');
        session_start();
        $email = $_SESSION['email'];

        $sql = "SELECT * FROM booking WHERE email='$email' ORDER BY book_id DESC";
        $result = mysqli_query($con, $sql);

        if (!$result || mysqli_num_rows($result) === 0) {
            echo '<script>alert("THERE ARE NO BOOKING DETAILS")</script>';
            echo '<script>window.location.href = "MotorcyclesDisplay.php";</script>';
        } else {
            $sql2 = "SELECT * FROM users WHERE email='$email'";
            $result2 = mysqli_query($con, $sql2);
            $rows2 = mysqli_fetch_assoc($result2);

            if (!$rows2) {
                echo '<script>alert("USER DATA NOT FOUND")</script>';
                echo '<script>window.location.href = "MotorcyclesDisplay.php";</script>';
            } else {
        ?>

                <ul class="ul1">
                   <li class="li1"><button class="utton"><a href="MotorcyclesDisplay.php">Home</a></button></li> 
                    <li class="name li1"><span style="color: white;">HELLO <?php echo $rows2['firstname'] . " " . $rows2['lastname'] . "!" ?></li>
                </ul>

                <?php while ($rows = mysqli_fetch_assoc($result)) {
                    $motor_id = $rows['motor_id'];
                    $sql3 = "SELECT * FROM motorcycle WHERE ID='$motor_id'";
                    $result3 = mysqli_query($con, $sql3);
                    $rows3 = mysqli_fetch_assoc($result3);
                ?>

                    <div class="box">
                        <div class="content row">
                            <div class="col-lg-10">
                                <h2>Motor Brand: <span class="y"><?php echo isset($rows3['Brand']) ? $rows3['Brand'] : 'N/A' ?></span></h2><br>
                                <h2>Booking Date: <span class="y"><?php echo isset($rows['book_date']) ? $rows['book_date'] : 'N/A' ?></span></h2><br>
                                <h2>Return Date: <span class="y"><?php echo isset($rows['return_date']) ? $rows['return_date'] : 'N/A' ?></span></h2><br>

                                <h2>Motor Status: <span class="y" style="color: <?php echo $rows['motor_result'] === 'Under Processing' ? 'red' : 'green'; ?>;"><?php echo isset($rows['motor_result']) ? $rows['motor_result'] : 'N/A'; ?></span></h2><br>
                            </div>
                            <div class="col-lg-2">
                                <?php $sqlimage = "SELECT image from motorcycle where ID='$motor_id'";
                                $sqlimageExec = mysqli_query($con, $sqlimage);
                                $fetch = mysqli_fetch_assoc($sqlimageExec);

                                ?>
                                <img src="<?php echo $fetch['image']; ?>">

                            </div>
                        </div>
                    </div>
        <?php }
            }
        } ?>


    </div>
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

</body>

</html>