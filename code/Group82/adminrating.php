<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

session_start();
require_once('connection.php');


$bookId = null;
$userEmail = null;


if (isset($_POST['approve'])) {
    if (isset($_POST['bookid'])) {
       // echo 'id retrieved';

        $bookId = mysqli_real_escape_string($con, $_POST['bookid']);
        $query = "SELECT * FROM booking WHERE book_id ='$bookId'";
        $result = mysqli_query($con, $query);

        if ($result) {
            // Check if there are any rows returned
            if (mysqli_num_rows($result) > 0) {
               
                $userEmail = mysqli_fetch_assoc($result)['email'];
               // echo "User email: " . $userEmail;

 setcookie('userEmail', $userEmail, time() + 3600, '/');
                setcookie('bookId', $bookId, time() + 3600, '/');
                
            } else {
               
                $userEmail = null;
                echo "No matching records found.";
            }

            // Free the result set
            mysqli_free_result($result);
        } else {
            // Handle the case where the query fails
            $userEmail = null;
            echo "Query failed: " . mysqli_error($con);
        }
    }

} if (isset($_POST['submit'])) {
  $submitUserEmail = isset($_COOKIE['userEmail']) ? $_COOKIE['userEmail'] : null;
    $submitBookId = isset($_COOKIE['bookId']) ? $_COOKIE['bookId'] : null;

  
    $response1 = mysqli_real_escape_string($con, $_POST['response1']);
    $response2 = mysqli_real_escape_string($con, $_POST['response2']);
    $response3 = mysqli_real_escape_string($con, $_POST['response3']);
    $response4 = mysqli_real_escape_string($con, $_POST['response4']);
    $response5 = mysqli_real_escape_string($con, $_POST['response5']);

    $totalYes = 0;
    if ($response1 === 'Yes') {
        $totalYes++;
    }
    if ($response2 === 'Yes') {
        $totalYes++;
    }
    if ($response3 === 'Yes') {
        $totalYes++;
    }
    if ($response4 === 'Yes') {
        $totalYes++;
    }
    if ($response5 === 'Yes') {
        $totalYes++;
    }


    if (!empty($submitBookId)) {
        $updateBookStatus = "UPDATE booking SET motor_result = 'RETURNED' WHERE book_id = '$submitBookId'";
        mysqli_query($con, $updateBookStatus);
    }

    
    if (!empty($submitUserEmail)) {
        $queryUpdateRating = "UPDATE users SET rating = $totalYes WHERE email ='$submitUserEmail'";
        mysqli_query($con, $queryUpdateRating);
    }

   
    setcookie('userEmail', '', time() - 3600, '/');
    setcookie('bookId', '', time() - 3600, '/');
} else {
    //echo "Form not handled";
}
?>



<html>


<body>
<style>
body {
  
  font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
 
  background: radial-gradient(circle at center, rgba(255, 0, 0, 0.7), rgba(0, 0, 0, 0.9)), url('https://via.placeholder.com/150');
  background-size: cover;
  backdrop-filter: blur(5px);
}

.card {
	text-align:center;
  background: rgba(255, 255, 255, 0.8);
  border-radius: 20px;
  box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
  display: inline-block;
  max-width: 600px; /* Set the maximum width of the card */
  margin: 40px auto; /* Center the card */
  padding: 60px; /* Adjust the padding as needed */
 

}

h1 {
  font-weight: 900;
  font-size: 40px;
  
  color: black;
}

.questions {
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 20px;
}

.question {
  display: flex;
  flex-direction: row;
  align-items: center;
  justify-content: space-between;
  width: 80%;
  background: rgba(255, 255, 255, 0.95);
  padding: 15px;
  border-radius: 10px;
  box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
}

.question label {
  flex: 1;
  font-size: 18px;
  margin-right: 20px;
}

.radio-options {
  display: flex;
  flex-direction: row;
  align-items: center;
  justify-content: space-around;
  flex: 1;
}

input[type="radio"] {
  margin-right: 5px;
}

input[type="radio"]+label {
  margin-right: 15px;
}
input[type="submit"] {
  width: 150px;
  height: 40px;
  background: rgb(179, 44, 48);
  border: none;
  margin-top: 10px;
  font-size: 18px;
  color: white;
  border-radius: 5px;
  cursor: pointer;
}

input[type="submit"]:hover {
  background: #ff6666;
}

input[type="submit"] a {
  text-decoration: none;
  font-weight: bold;
  color: white;
}
.homeForm {
  margin: 40px 0; /* Adjust the top and bottom margin as needed */
  padding-left: 20px; /* Set the left padding to move the form to the left */
}
	
</style>

   <form class="homeForm" method="post" action="adminBooking.php">
                <input type="submit" name="returntothepage" value="Go To Home">
            </form>
  <center> <div class="card">
 
    <h1>Feedback Form</h1>
	
    <form id="feedbackForm" method="post" action="">
      <div class="questions">
 
       <div class="question">
                <label for="response1">Did the user return the vehicle on time?</label>
                <div class="radio-options">
                    <input type="radio" id="response1_yes" name="response1" value="Yes">
                    <label for="response1_yes">Yes</label>
                    <input type="radio" id="response1_no" name="response1" value="No">
                    <label for="response1_no">No</label>
                </div>
            </div>

            <div class="question">
                <label for="response2">Was the vehicle returned in a clean condition?</label>
                <div class="radio-options">
                    <input type="radio" id="response2_yes" name="response2" value="Yes">
                    <label for="response2_yes">Yes</label>
                    <input type="radio" id="response2_no" name="response2" value="No">
                    <label for="response2_no">No</label>
                </div>
            </div>

		<div class="question">
          <label for="response3">Didn't the motorcycle sustain any damage?</label>
          <div class="radio-options">
            <input type="radio" id="response3_yes" name="response3" value="Yes">
            <label for="response3_yes">Yes</label>
            <input type="radio" id="response3_no" name="response3" value="No">
            <label for="response3_no">No</label>
          </div>
        </div>
		
		<div class="question">
          <label for="response4">Was the user courteous during the return process?</label>
          <div class="radio-options">
            <input type="radio" id="response4_yes" name="response4" value="Yes">
            <label for="response4_yes">Yes</label>

            <input type="radio" id="response4_no" name="response4" value="No">
            <label for="response4_no">No</label>
          </div>
        </div>
		
		<div class="question">
          <label for="response5">Does the user meet expectations in returning the vehicle on time?</label>
          <div class="radio-options">
            <input type="radio" id="response5_yes" name="response5" value="Yes">
            <label for="response5_yes">Yes</label>
            <input type="radio" id="response5_no" name="response5" value="No">
            <label for="response5_no">No</label>
          </div>
        </div>
		
		

   
    <input type="submit" name="submit" value="Submit" >

</form>

    </center>

<script>
  document.getElementById('feedbackForm').addEventListener('submit', function(event) {
    var questions = document.querySelectorAll('.question');
    var allAnswered = true;

    questions.forEach(function(question) {
      var radios = question.querySelectorAll('input[type="radio"]');
      var answered = false;

      radios.forEach(function(radio) {
        if (radio.checked) {
          answered = true;
        }
      });

      if (!answered) {
        allAnswered = false;
        event.preventDefault(); // Prevent form submission
        alert('Please answer all questions before submitting.');
        return;
      }
    });

    if (allAnswered) {
      alert('All questions answered! Form will be submitted.');
	  window.location.href = 'adminBooking.php';
	  
    }
  });
</script>

</body>
</html>