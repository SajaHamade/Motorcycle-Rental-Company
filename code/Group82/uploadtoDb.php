<?php 
if(isset($_POST['AddMotor']))
	require_once('connection.php');

$motorName = $_POST['Brand'];
$motorYear = $_POST['year'];
$motorEngine = $_POST['engine'];
$motorFuel = $_POST['Fuel'];
$motorPrice = $_POST['price'];
$motorImage = $_POST['image'];
$plate = $_POST['plate'];

$query="INSERT INTO motorcycle (Brand , plate_number , Year,engine,fuel,price,image,Available) values
 ('$motorName','$plate','$motorYear','$motorEngine','$motorFuel','$motorPrice','$motorImage','Yes')";

$result = mysqli_query($con , $query);
if($result){
 echo '<script>alert("New Motorcycle Added Successfully!!")</script>'; 
 echo '<script> window.location.href = "TableShowingMotors.php";</script>'; 
}
else {
	echo '<script>alert(" Motorcycle Was Not Added Successfully!!")</script>';
}




?>