<?php
$server = "localhost";
$username = "root";
$passwords = "";
$database = "merctechdb";

$conn = mysqli_connect($server, $username, $passwords, $database);

/*check whether the connection works */
if(!$conn){
    die("<script>alert('Connection Failed.')</script>");
}
?>