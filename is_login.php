<?php 
// session_start(); ?><?php 
// this page to validate if some one is loged or not  -->


if (isset($_SESSION['username']) ){
    header("Location: index.php?message=you are already logged");
    exit();
}

?>