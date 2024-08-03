<?php
$servername = "localhost:3307";
$username = "root"; // Default username
$password = ""; // Default password
$dbname = "melanin";

// Create connection
$link = new mysqli($servername, $username, $password, $dbname);

// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>
