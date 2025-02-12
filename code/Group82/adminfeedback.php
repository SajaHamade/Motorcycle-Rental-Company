<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	 <link rel="stylesheet" href="style2.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>ADMINISTRATOR</title>
</head>
<body>
<style>
.hai{
  display: flex;
  justify-content: center;
  align-items: center;
  width: 100%;
  background: linear-gradient(to top, rgba(0,0,0,0)50%, rgba(0,0,0,0)50%),url("../images/carbg2.jpg");
  background-position: center;
  background-size: cover;
  height: 100vh;
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
  margin-top: 10px;
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
  height: 400px;
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

require_once('connection.php');
$query="select *from feedback";
$queryy=mysqli_query($con,$query);
$num=mysqli_num_rows($queryy);


?>






        <header class="header">
  
    <a class="logo" href="home.php"><img src="mylogo.jpg" alt="logo"></a>
  
  
    <nav class="nav">
      <ul class="nav-links">
         <li><a href="TableShowingMotors.php">Motorcycles Management</a></li>
                    <li><a href="adminusers.php">Users</a></li>
                    <li><a href="adminfeedback.php">Feedbacks</a></li>
                    <li><a href="adminBooking.php">Booking Request</a></li>
					<li><a href="adminstatistics.php">Statistics</a></li>
					
                </nav>
  
   
    <button class="button"><b><a href="home.php" style="text-decoration: none; color:black;">Logout</a></b></button>
   
   
  
</header>
        <div class="hai">
		<div>
		<h1 class="header1" style="text-align:center; ">FEEDBACKS</h1>
          
            <div>
                <div>
                    <table class="content-table">
                <thead>
                    <tr>
                        <th>FEEDBACK_ID</th> 
                        <th>EMAIL</th>
                        <th>RATING</th>
						
                        <th>COMMENT</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                
                
                while($res=mysqli_fetch_array($queryy)){
                
                
                ?>
                <tr  class="active-row">
                    <td><?php echo $res['FED_ID'];?></php></td>
                    <td><?php echo $res['email'];?></php></td>
                    <td><?php echo $res['RATING'];?></php></td>
					
                    <td><?php echo $res['COMMENT'];?></php></td>
                </tr>
               <?php } ?>
                </tbody>
                </table>
                </div>
            </div>
        </div>
		</div>
     
</body>
</html>