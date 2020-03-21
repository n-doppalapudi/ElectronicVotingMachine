<?php
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "myDB";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT candidateId FROM candidates";
$result = $conn->query($sql);
$i =0;
if ($result->num_rows > 0) {
    echo "<input type="radio" ><?php echo $db_row["result[i]"]; ?><br>";
    // output data of each row
    $i++;
} else {
    echo "0 results";
}
$conn->close();
?>
