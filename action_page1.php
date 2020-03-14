<?php

$fullname = filter_input(INPUT_POST,'name');
$address = filter_input(INPUT_POST,'address');
$age = filter_input(INPUT_POST,'age');
$gender = filter_input(INPUT_POST,'gender');

$username = filter_input(INPUT_POST,'uname');
$password = filter_input(INPUT_POST,'psw');

if(!empty($username)){
    if(!empty($password)){
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
            $sql = "INSERT INTO users (name, pswd, fullname, address, age, gender)
            values ( '$username', '$password','$fullname', '$address', '$age', '$gender')";
            if($conn->query($sql)){
                echo "New record inserted";
            }else{
                echo "Error: ".$sql."<br>".$conn->error;
            }
            $conn->close();
        }
    }else{
        echo "Password should not be empty";
    }
}else{
    echo "username should not be empty";
}


?>