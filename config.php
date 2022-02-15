<?php
$server = "localhost";
$user = "root";
$password = "";
$database = "merctechdb";

$conn = mysqli_connect($server, $user, $password, $database);

/*check whether the connection works */
if(!$conn){
    die("<script>alert('Connection Failed.')</script>");
}


?>