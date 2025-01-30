<?php
$server = "127.0.0.1";
$username = "admin";
$password = "admin123";
$database = "users";

$conn = mysqli_connect($server, $username, $password, $database);
if(!$conn){
    die("unable to connect to the database".mysqli_connect_error());
    exit();
}

?>