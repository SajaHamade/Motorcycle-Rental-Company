<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CANCEL BOOKING</title>
</head>
<body>
<style>
    body {
        font-family: 'Poppins', sans-serif;
        margin: 0;
        padding: 0;
        background-color: #212121;
        color: rgb(179, 44, 48);
        text-align: center;
    }

    .form {
        align-content: center;
        margin-left: 3%;
        margin-top: 15%;
    }
	h1{
	color:#fff;}

    .cancel, .no {
        width: 200px;
        height: 40px;
        font-size: 18px;
        border-radius: 5px;
        cursor: pointer;
        margin-left: 1%;
        transition: background-color 0.3s;
    }

    .cancel {
        background: rgb(179, 44, 48);
        border: white;
        color: #fff;
    }

    .cancel:hover {
        background: #ff6666;
    }

    .no {
        background:rgb(179, 44, 48) ;
        border: white;
        color: #fff;
        margin-left: 100px;
    }

    .no:hover {
        background:#ff6666 ;
    }

    .no a {
        text-decoration: none;
        color: #fff;
    }
</style>

<?php
	
    require_once('connection.php');
    session_start();
    $bid = $_SESSION['bid'];
    if(isset($_POST['cancelnow'])){
        $del = mysqli_query($con,"delete from booking where BOOK_ID = '$bid' order by BOOK_ID DESC limit 1");
        echo "<script>window.location.href='cardetails.php';</script>";
        
    }


?>
 <form class="form"  method="POST" >
        <h1>ARE YOU SURE YOU WANT TO CANCEL YOUR BOOKING?</h1>
        <input  type="submit" class="cancel" value="CANCEL NOW" name="cancelnow">
        <button class="no"><a href="payment.php" >GO TO PAYMENT</a></button>
    </form>
</body>
</html>
