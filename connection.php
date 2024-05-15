<?php

$SERVER = "localhost";
$username = "root";
$password = "";
$database = "managing_interns";
$conn = mysqli_connect($SERVER , $username,$password,$database);
if(!$conn){
    mysqli_error($conn);
}
// echo "connect successfull";

?>
