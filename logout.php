<?php
session_start();
require "connection.php";
unset($_SESSION['username']);
header(('location:login.php'));