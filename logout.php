<?php

require "session.php";
require "connection.php";
unset($_SESSION['username']);
header(('location:/gestion des stagiares/login.php'));