<?php




$dbname = "final1";

$con = mysqli_connect('localhost', 'root', '');

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}
// Create database
$sql = "CREATE DATABASE IF NOT EXISTS $dbname";
if ($con->query($sql) === TRUE) {
    echo "Database created successfully\n";
} else {
    echo "Error creating database: " . $con->error;
}

// Connect to the created database
$con->select_db($dbname);

// Execute the SQL script
$sqlScript = file_get_contents("final1.sql");

// Explode the script into individual statements
$statements = explode(";", $sqlScript);

// Execute each SQL statement
foreach ($statements as $statement) {
    if (trim($statement) != "") {
        if ($con->query($statement) === TRUE) {
            echo "Table created successfully\n";
        } else {
            echo "Error creating table: " . $con->error;
        }
    }
}


?>
