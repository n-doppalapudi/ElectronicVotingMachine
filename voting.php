<?php

$candidate = filter_input(INPUT_POST,'vote');
$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "evm";

// create connection

$conn = new mysqli($host,$dbusername,$dbpassword,$dbname);
if(mysqli_connect_error()){
    die('Connection error ('. mysqli_connection_errno() .')'.mysqli_connection_error());
}
else{
    $sql = "UPDATE candidates SET votes = votes + 1 WHERE candidateId = '$candidate'";
            if($conn->query($sql)){
                echo "Thanks for the vote!";
            }else{
                echo "Error: ".$sql."<br>".$conn->error;
            }
            $conn->close();
        }
?>
