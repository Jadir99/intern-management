<?php

$SERVER = "localhost";
$username = "root";
$password = "";
$database = "managing_interns";
$conn = mysqli_connect($SERVER, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
// echo "Connected successfully";

?>
