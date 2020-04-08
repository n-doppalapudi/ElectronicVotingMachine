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
    $sql = "SELECT candidateId from candidates WHERE votes = (SELECT MAX(votes) from candidates)";
            if($conn->query($sql)){
                echo "And the winner is".$sql."<br>";
            }else{
                echo "Error: ".$sql."<br>".$conn->error;
            }
            $conn->close();
        }
?>