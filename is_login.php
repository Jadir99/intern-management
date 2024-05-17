<?php 
if (!isset($_SESSION['username']) ){
    header("Location:/gestion des stagiares/login.php?error=you have to logged first");
    exit();
} 
?>