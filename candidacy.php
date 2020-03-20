<?php

$candidateId = filter_input(INPUT_POST,'candidateId');

if(!empty($candidateId)){
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
            $sql = "INSERT INTO candidates (candidateId)
            values ( '$candidateId')";
            if($conn->query($sql)){
                echo "New record inserted";
            }else{
                echo "Error: ".$sql."<br>".$conn->error;
            }
            $conn->close();
        }
    }
else{
    echo "candidate ID should not be empty";
}


?>