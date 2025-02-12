<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style2.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    
    <title>Road Rover</title>

    <style>
        .wrap{
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            
        }
        .wrapper{
            position: relative;
            height: 450px;
            width: 750px;
            background: transparent;
            border: 1px solid #b32c30;
            overflow: hidden;
        }
        .wrapper .form-box{
            position: absolute;
            top: 0;
            width: 40%;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        .wrapper .form-box.login{
          left: 0;
          padding: 0 60px 0 40px;
        }
        .form-box h2{
            font-size: 32px;
            color: #b32c30;
            text-align: center;
        }
        .form-box .input-box{
            position: relative;
            width: 100%;
            height: 50px;
            margin: 25px 0;
        }
        .input-box input{
            width: 100%;
            height: 100%;
            background: transparent;
            border: none;
            outline: none;
            border-bottom: 2px solid #b32c30;
            font-size: 16px;
            color: #b32c30;
            font-weight: 500;
            transition: .5s;
        }
        .input-box input:focus,
        .input-box input:valid{
          border-bottom-color: #b32c30;
        }
        .input-box label{
            position: absolute;
            top: 50%;
            left: 0;
            transform: translateY(-50%);
            font-size: 16px;
            color: #b32c30;
            pointer-events: none;
            transition: .5s;
        }
        .input-box input:focus~label,
        .input-box input:valid~label{
          top: -5px;
          color: #b32c30;

        }


        .input-box i{
            position: absolute;
            top: 50%;
            right: 0;
            transform: translateY(-50%);
            font-size: 18px;
            color: #b32c30;
            transition: .5s;
        }
        .input-box input:focus~i,
        .input-box input:valid~i{
          color: #b32c30;
        }
        .btn{
            position: relative;
            width: 100%;
            height: 45px;
            background: transparent;
            border: 2px solid #b32c30;
            outline: none;
            border-radius: 40px;
            cursor: pointer;
            font-size: 16px;
            color: #fff;
            font-weight: 600;
            z-index: 1;
            overflow: hidden;
        }
        .btn::before{
          content: '';
          position: absolute;
          top: -100%;
          left: 0;
          width: 100%;
          height: 300%;
          background: linear-gradient(#212121, #b32c30, #212121, #b32c30);
          z-index: -1;
          transition: .5s;
        }
        .btn:hover:before{
          top: 0;
        }


        .wrapper .info-text{
          position: absolute;
          top: 0;
          width: 40%;
          height: 100%;
          display: flex;
          flex-direction: column;
          justify-content: center;
        }
        .wrapper .info-text.login{
          right: 0;
          text-align: right;
          padding: 0 40px 60px 150px;
        }
        .info-text h2{
          font-size: 36px;
          color: #fff;
          line-height: 1.3;
          text-transform: uppercase;
        }
        .wrapper .bg-animate{
          position: absolute;
          top: -4px;
          right: 0;
          width: 850px;
          height: 600px;
          background: linear-gradient(45deg, #212121, #b32c30);
          border-bottom: 3px solid #b32c30;
          transform: rotate(10deg) skewY(40deg);
          transform-origin: bottom right;
        }
    </style>
</head>
<body>
<?php
require_once('connection.php');
if(isset($_POST['admin-log'])){
  $id = $_POST['admin-id'];
  $pass = $_POST['admin-pass'];

  if(empty($id) || empty($pass)){
    echo '<script>alert("please fill the blanks")</script>';
  }
  else{
    $query="SELECT * FROM admin where ADMIN_ID = '$id'";
    $res = mysqli_query($con,$query);

    if($row = mysqli_fetch_assoc($res)){
      $db_password = $row['ADMIN_PASSWORD'];
      if($pass  == $db_password){
        echo "<script type=\"text/javascript\">";
        echo "alert('Welcome ADMINISTRATOR!');";
        echo "document.location = 'adminfeedback.php';";
        echo "</script>";
      }
      else{
        echo '<script>alert("Enter a proper password")</script>';
      }
    }
    else{
      echo '<script>alert("enter a proper email")</script>';
    }
  }
}

?>

<header class="header">
    <a class="logo" href="home.php"><img src="mylogo.png" alt="logo"></a>
    <nav class="nav">
    <ul class="nav-links">
        <li><a href="home.php">Home</a></li>
    </ul>
    </nav>
    <button class="button"><b><a href="admin-login.php" style="text-decoration:none; color:black;">Admin</a></b></button>
</header>

<div class="wrap">
<div class="wrapper">
  <span class="bg-animate"></span>
    <div class="form-box login">
        <h2>Admin Login</h2>
        <form action="#" method="post">
            <div class="input-box">
                <input type="text" name="admin-id">
                <label>Username</label>
                <i class="uil uil-user username"></i>
            </div>
            <div class="input-box">
                <input type="password" name="admin-pass">
                <label>Password</label>
                <i class="uil uil-lock password"></i>
            </div>
            <button type="submit" class="btn" name="admin-log">Login</button>
        </form>
    </div>
    <div class="info-text login">
      <h2>Welcome <br> Back!</h2>
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