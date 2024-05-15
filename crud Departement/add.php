<?php
require "../connection.php";

if (isset($_POST["submit"])) {
   $admin = $_POST['admin'];
   echo $admin;
   $name_depart = $_POST['name_depart'];
echo $name_depart;
   $sql ="INSERT INTO `department` (`id_depart`, `id_admin`, `name_depart`) VALUES (NULL,$admin,'$name_depart')";

   $result = mysqli_query($conn, $sql);

   if ($result) {
      header("Location: index.php?msg=New record created successfully");
   } else {
      echo "Failed: " . mysqli_error($conn);
   }
}

// la liste des admins pour la selections :
$sql = "SELECT * FROM administration";
$result = mysqli_query($conn, $sql);
// var_dump($result)
?>




<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">

   <!-- Bootstrap -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

   <!-- Font Awesome -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

   <title>Menu a faire</title>
</head>

<body>
   <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: #00ff5573;">
   Menu a faire
   </nav>

   <div class="container">
      <div class="text-center mb-4">
         <h3>Add New User</h3>
         <p class="text-muted">Complete the form below to add a new departement</p>
      </div>

      <div class="container d-flex justify-content-center">
         <form action="" method="post" style="width:50vw; min-width:300px;">
            

            <div class="mb-3">
               <label class="form-label">Departement name:</label>
               <input type="text" class="form-control" name="name_depart" placeholder="@example">
            </div>


            <div class="form-group mb-3">
                  <label for="department">admin :</label>
                  <select class="form-control" id="admin" name="admin">
                  <option value="">Select an admin</option>
                     <?php
                     while ($row = mysqli_fetch_assoc($result)) {
                     ?> 
                     <option value='<?php echo $row['id_admin'];?>'><?php echo $row["username"] ?></option>
                     <?php }?>
                  </select>
            </div>


            <div>
               <button type="submit" class="btn btn-success" name="submit">Save</button>
               <a href="index.php" class="btn btn-danger">Cancel</a>
            </div>
         </form>
      </div>
   </div>

   <!-- Bootstrap -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html>