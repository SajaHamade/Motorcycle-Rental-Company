<?php 
require_once("connection.php");
$toDelete=$_POST['motorID']; 
$query = " DELETE from motorcycle WHERE ID=$toDelete " ;
$res=mysqli_query($con,$query);
if($res){
	echo '<script>alert("Motorcycle Deleted Successfully");</script>';
      echo '<script> window.location.href = "TableShowingMotors.php";</script>'; 
}

?>