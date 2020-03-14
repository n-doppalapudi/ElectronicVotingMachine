<?php

$username = filter_input(INPUT_POST,'uname');
$password = filter_input(INPUT_POST,'psw');
$error ="";
$success ="";

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
            $sql = "select * from users where name = '$username' and pswd = '$password'";
            if($conn->query($sql)){
                echo "Welcome ".$username;
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