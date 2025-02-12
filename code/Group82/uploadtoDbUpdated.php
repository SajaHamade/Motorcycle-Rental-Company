<?php
require_once('connection.php');

if (isset($_POST['editInfo'])) {
    $id = $_POST['motorID'];
    $plate = $_POST['plate'];
    $brand = $_POST['Brand'];
    $year = $_POST['year'];
    $engine = $_POST['engine'];
    $fuel = $_POST['Fuel'];
    $price = $_POST['price'];
    $oldImage = $_POST['oldImage'];



    $query = "UPDATE motorcycle SET plate_number='$plate', Brand='$brand', Year='$year', engine='$engine', fuel='$fuel', price='$price', image='$oldImage' WHERE ID='$id'";
    $result = mysqli_query($con, $query);

    if ($result) {
        echo '<script>alert("Motorcycle information updated successfully")</script>';
        echo '<script>window.location.href = "TableShowingMotors.php";</script>';
    } else {
        echo '<script>alert("Error updating motorcycle information")</script>';
        // Handle error accordingly
    }
}
?>
