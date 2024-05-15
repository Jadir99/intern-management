<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<?php if (isset($_GET['message'])) { ?>
     		<p class="message"><?php echo $_GET['message']; ?></p>
     	<?php }
        
        ?>


<h1>this is the home page welcome mr <?php echo $_SESSION['username']; ?></h1>
</body>
</html>