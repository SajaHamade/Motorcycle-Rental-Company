<?php
session_start();
require_once('connection.php');


if(isset($_POST['Signup'])){
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $phone = $_POST['phonenumber'];
  $email = $_POST['email'];
  $rating = 5;
  $pass = $_POST['password'];

  if(empty($firstname) || empty($lastname) || empty($phone) || empty($email) || empty($pass)){
    echo "<script type=\"text/javascript\">";
    echo "alert('You must enter all information');";
    echo "document.location = 'home.php';";
    echo "</script>";
  }  
  else{
    $sql2 = " SELECT * FROM users WHERE email = '$email' ";
    $res = mysqli_query($con,$sql2);

    if(mysqli_num_rows($res) > 0){
      echo "<script type=\"text/javascript\">";
      echo "alert('EMAIL ALREADY EXISTS PRESS OK FOR LOGIN!!');";
      echo "document.location = 'home.php';";
      echo "</script>";
    }
    else{
      $sql=" INSERT INTO users (firstname, lastname, email, phone, rating, password) VALUES ('$firstname','$lastname','$email','$phone',$rating,'$pass')";
      $result = mysqli_query($con,$sql);

      if($result){
        echo "<script type=\"text/javascript\">";
        echo "alert('Registration successful Press OK to Login.');";
        echo "document.location = 'MotorcyclesDisplay.php';";
        echo "</script>";
      }
      else{
        echo '<script>alert("Please check the connection.")</script>';
      }

    }
  }  
}
?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="style2.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;500;700;900&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">

  <!--  animejs -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js" integrity="sha512-z4OUqw38qNLpn1libAN9BsoDx6nbNFio5lA6CuTp9NlK83b89hgyCVq+N5FdBJptINztxn1Z3SaKSKUS5UP60Q==" crossorigin="anonymous" referrerpolicy="no-referrer">
  </script>
  <!--  animejs -->

  <style>
    
    .home{
      position: relative;
      height: 100vh;
      width: 100%;
    }
    .home::before{
      content: '';
      position: absolute;
      height: 100%;
      width: 100%;
      background-color: rgba(0, 0, 0, 0.6);
      z-index: 100;
      opacity: 0;
      pointer-events: none;
      transition: all 0.5s ease-out;
    }
    .home.show::before{
      opacity: 1;
      pointer-events: auto;
    }
    /* Form */
    .form_container{
      position: absolute;
      max-width: 320px;
      width: 100%;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%) scale(1.2);
      z-index: 101;
      background: #fff;
      padding: 25px;
      border-radius: 12px;
      box-shadow: rgba(0, 0, 0, 0.1);
      opacity: 0;
      pointer-events: none;
      transition: all 0.4s ease-out;
    }
    .home.show .form_container{
      opacity: 1;
      pointer-events: auto;
      transform: translate(-50%, -50%) scale(1);
    }
    .form_container.active .signup_form{ 
      display: block;

    }
    .form_container.active .login-form{ 
      display: none;

    }
    .signup_form{
      display: none;
    }
    .form_close{
      position: absolute;
      top: 10px;
      right: 20px;
      color: #0b0217;
      font-size: 22px;
      opacity: 0.7;
      cursor: 76;
    }
    .form_container h2{
      font-size: 22px;
      color: #0b0217;
      text-align: center;

    }
    .input_box{
      position: relative;
      margin-top: 30px;
      width: 100%;
      height: 40px;
    }
    .input_box input{
      height: 100%;
      width: 95%;
      border: none;
      outline: none;
      color: #333;
      border-bottom: 1.5px solid #aaaaaa;
      transition: all 0.2s ease;
      padding-left: 30px;
    }
    .input_box input:focus{
      border-color: rgb(179, 44, 48);
    }
    .input_box i{
      position: absolute;
      top: 50%;
      transform: translateY(-50%);
      font-size: 20px;
    }
    .input_box i.email, 
    .input_box i.password,
    .input_box i.phone,
    .input_box i.username{
      left: 0;
      color: #707070;
    }
    .input_box input:focus ~ i.email,
    .input_box input:focus ~ i.password,
    .input_box input:focus ~ i.phone,
    .input_box input:focus ~ i.username{
      color: #b32c30;

    }
    .input_box i.pw_hide{
      right: -10px;
      font-size: 18px;
      cursor: pointer;
    }
    .form_container .button{
      background-color: rgb(179, 44, 48);
      margin-top: 30px;
      margin-left: 5px;
      width: 100%;
      padding: 10px 0;
      border-radius: 10px;
    }
    .login_signup{
      font-size: 12px;
      text-align: center;
      margin-top: 15px;
    }




    .outer-container p{
        font-family: 'Roboto';
        font-weight: 300;
        color: #808080;
        font-size: 18px;
    }
    .ride-container {
      padding: 30px;
      text-align: center;
      flex: 1;
      position: relative;
      transition: background-color 0.3s;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
      margin: 10px;
    }

    .ride-container:hover {
      background-color: #B0B0B0; 
    }

    .ride-container:hover .club-rides {
      color: #b32c30; 
    }

    .outer-container {
        display: flex;
        margin-left: 10px;
        margin-right: 10px;
        height: 50%;
    }
    .ride-container img{
        height: 70px;
    }
    .icon-container{
        text-align: center;
        padding: 40px 10px 10px;
        height: 30%;
    }
    .icon-container h1{
        font-weight: 1000;
        font-size: 3rem;
    }
    .icon-wrapper{
        background-color: #fff;
        margin-top: 50px;
        height: 120vh;
        font-family: 'Roboto', sans-serif, Arial,'Bebas Neue';
        color: #212121;
    }
    .icon-container i{
        color: #b32c30;
        font-size: 25px;
    }







    
  
 
  
 
  
 
  
 
  /*----------myhome--------*/
  .flex {
    display: flex;
  }
  .left {
    width: 35%;
  }
  .right {
    width: 65%;
    overflow-x: hidden;
  }
  .btn1 {
    padding: 15px 30px;
    margin: 20px 20px 0 0;
    border-radius: 50px;
    color: white;
    border: 2px solid white;
    background-color: #b32c30;
  }
  .btn1:hover{
    background-color: rgb(179, 44, 49);
  }
  .myhome {
    position: relative;
    color: white;
  }
  .myhome .left {
    padding: 150px 0 0 65px;
    margin-top: 50px;
  }
  .myhome .right {
    margin-top: 100px;
  }
  .myhome::after {
    content: '';
    position: absolute;
    top: 0;
    background-image: url('backgrndd.png');
    background-size: contain;
    background-repeat: no-repeat;
    height: 120vh;
    width: 100%;
    z-index: -1;
  }
  .myhome h2 {
    font-size: 40px;
    margin: 20px 0 20px 0;
  }
  .myhome img{
    height: 630px;
  }
    


    
  </style>

<body class="home">

<?php



if(isset($_POST['Login'])){
  $email = $_POST['email'];
  $pass = $_POST['password'];

  if(empty($email) || empty($pass)){
    echo "<script type=\"text/javascript\">";
    echo "alert('You must enter all information');";
    echo "document.location = 'home.php';";
    echo "</script>";
  }
  else{
    $query=" Select * FROM users WHERE email = '$email' ";
    $res=mysqli_query($con,$query);

    if($row = mysqli_fetch_assoc($res)){
      $user_password = $row['password'];
      $user_rating = $row['rating'];

      if($pass == $user_password){
        if($user_rating < 3){
          echo '<script>alert("You do not have sufficient rating to log in");</script>';
        }
        else{
          session_start();
          $_SESSION['email'] = $email;
          echo '<script>document.location = "MotorcyclesDisplay.php";</script>';
          
        }
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








  <title>Road Rover</title>
</head>


<!-- My Navigation -->
<header class="header">
  
    <a class="logo" href="home.php"><img src="mylogo.png" alt="logo"></a>
  
  
    <nav class="nav">
      <ul class="nav-links">
        <li><a href="test.html">Contact</a></li>
        <li><a href="#" id="form-open">Login / Signup</a></li>
      </ul>
    </nav>
  
   
    <button class="button"><b><a href="admin-login.php" style="text-decoration:none;color:#0b0217;">Admin</a></b></button>
   
  
</header>
<!-- End of Navigation -->



<section class="myhome">
    <div class="content flex">
      <div class="left">
        

        <h2>Discover the Freedom of Two Wheels!</h2>
        <p>Why Choose Road Rover?</p>

        <div class="button flex">
          <button class="btn1" id="scrollToBenefits">Learn More</button>
        </div>
      </div>

      <div class="right">
        <div class="ani_image">
          <img src="myhomebike.png" alt="">
        </div>
      </div>
    </div>
  </section>



  


  <script>
    anime({
      targets: '.ani_image',
      translateX: 70,
      loop: true,
      direction: 'alternate',
      easing: 'easeInOutSine'
    });
  </script>














<div class="icon-wrapper">

   <div class="icon-container">

    <i class='bx bx-menu-alt-right'></i> OUR BENEFITS <i class='bx bx-menu-alt-left'></i><br>
  
<section id="targetSection">  
    <h1>WHY CHOOSE US</h1>

  </div>   

  <div class="outer-container" >
    <div class="ride-container">
      <img src="005-motocross-1.png" alt="">
      <h2 class="club-rides">RELIABILITY</h2>
      <p>
      Our commitment to providing reliable motorcycles ensures you enjoy worry-free journeys, allowing you to focus on the thrill of the ride.
      </p>
    </div>

    <div class="ride-container">
        <img src="tyre.png" alt="">
      <h2 class="club-rides">QUALITY</h2>
      <p>
      Embark on an unparalleled ride with our premium motorcycles, meticulously maintained to deliver a high-quality and unforgettable experience on the open road.
      </p>
    </div>

    <div class="ride-container">
        <img src="money-bag.png" alt="">
      <h2 class="club-rides">AFFORDABILITY</h2>
      <p>
      Experience the thrill of the open road with our budget-friendly rates, ensuring quality rides for every budget-conscious adventurer.
      </p>
    </div>
  </div>
</div>

</section>

<script>
    document.getElementById('scrollToBenefits').addEventListener('click', function() {
        var targetSection = document.getElementById('targetSection');
        targetSection.scrollIntoView({ behavior: 'smooth' });
    });
</script>
<!-- Home -->

  <div class="form_container">
    <i class="uil uil-times form_close"></i>
    <!-- Login Form -->
    <div class="form login-form">
      <form method="post" action="#">
        <h2>Welcome Back!</h2>

        <div class="input_box">
          <input type="email" name="email" placeholder="Enter your email">
          <i class="uil uil-envelope-alt email"></i>
        </div>
        <div class="input_box">
          <input type="password" name="password" placeholder="Enter your password">
          <i class="uil uil-lock password"></i>
          <i class="uil uil-eye-slash pw_hide"></i>
        </div>


        <button class="button" name="Login" id="form-open">Login</button>

        <div class="login_signup">
          No Road Rover Account? <br><a href="#" id="signup">Signup</a>
        </div>
        
      </form>
    </div>
  

    <!-- Sign up Form -->
    <div class="form signup_form">
      <form action="#" method="post">
        <h2>Signup</h2>

        <div class="input_box">
          <input type="text" name="firstname" placeholder="First Name">
          <i class="uil uil-user username"></i>
        </div>

        <div class="input_box">
          <input type="text" name="lastname" placeholder="Last Name">
          <i class="uil uil-user username"></i>
        </div>

       
        <div class="input_box">
          <input type="text" name="phonenumber" placeholder="Phone Number">
          <i class="uil uil-phone phone"></i>
        </div>


        <div class="input_box">
          <input type="email" name="email" placeholder="Enter your email">
          <i class="uil uil-envelope-alt email"></i>
        </div>
        <div class="input_box">
          <input type="password" name="password" placeholder="Create password">
          <i class="uil uil-lock password"></i>
          <i class="uil uil-eye-slash pw_hide"></i>
        </div>

        
        <button name="Signup" class="button">Signup</button>

        <div class="login_signup">
          ALready have an account? <br><a href="#" id="login">Login</a>
        </div>
        
      </form>
    </div>



  </div>
  


<script src="script.js"></script>


  
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