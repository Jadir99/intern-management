<?php 
require "session.php";
    require "connection.php";
        ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php include "menu/index.php"; ?>

<?php if (isset($_GET['message'])) { ?>
     		<p class="message"><?php echo $_GET['message']; ?></p>
     	<?php }
        ?>
<h1>this is the home page welcome mr(miss) <?php if (isset($_SESSION['username'])) echo $_SESSION['username']; ?></h1>
</body>
</html>