<?php
require "session.php";
require "connection.php";


if (isset($_POST["submit"])) {
    $username = $_POST['uname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm = $_POST['confirm'];

    if ($password !== $confirm) {
        echo "Passwords do not match!";
    } else {
        // Protéger contre les injections SQL

        // Hash le mot de passe pour plus de sécurité

        $sql = "INSERT INTO `administration` (`username`, `password`) VALUES ('$username', '$password')";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            header("Location: login.php");
            exit();
        } else {
            echo "Failed: " . mysqli_error($conn);
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Sign Up</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    
    <form action="" method="post">
        <h2>Sign Up</h2>
        <?php if (isset($_GET['error'])) { ?>
            <p class="error"><?php echo $_GET['error']; ?></p>
        <?php } ?>
        <label>User Name</label>
        <input type="text" name="uname" placeholder="User Name" required><br>

        <label>Email</label>
        <input type="email" name="email" placeholder="Email" required><br>

        <label>Password</label>
        <input type="password" name="password" placeholder="Password" required><br>

        <label>Confirm Password</label>
        <input type="password" name="confirm" placeholder="Confirm Password" required><br>

        <button type="submit" name="submit">Register</button>
    </form>
</body>
</html>
