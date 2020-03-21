<?php
$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "evm";
$conn= new mysqli_connect($servername,$username,$password,"$dbname");
if(!$conn){
die('Could not Connect My Sql:' .mysql_error());
}
?>
