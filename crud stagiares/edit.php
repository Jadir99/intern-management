
<?php
require "../connection.php";
// recupere l'id de departement 
$id=$_GET['id'];

if (isset($_POST["submit"])) {
  $first_name = $_POST['first_name'];
  $last_name = $_POST['last_name'];
  $bday = $_POST['bday'];
  $id_depart = $_POST['id_depart'];

  $sql = "UPDATE `department` SET `name_depart`='$name_depart',`id_admin`=$admin WHERE id_depart =$id ";
  $sql = "INSERT INTO `intern` (`first_name`, `last_name`, `bday`, `id_depart`) VALUES ('$first_name', '$last_name', '$bday', $id_depart)";
  
  $result = mysqli_query($conn, $sql);

  if ($result) {
     header("Location: index.php?msg=New record created successfully");
  } else {
     echo "Failed: " . mysqli_error($conn);
  }
}
$query= "select * from intern natural join department where id_intern =$id";
$result=mysqli_query($conn,$query);
$row = mysqli_fetch_assoc($result);

// les listes des admins :
$sql = "SELECT * FROM department";
$department = mysqli_query($conn, $sql);
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

  <title>menu a faire</title>
</head>

<body>
  <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: #00ff5573;">
    menu a faire 
  </nav>

  <div class="container">
    <div class="text-center mb-4">
      <h3>Edit department Information</h3>
      <p class="text-muted">Click update after changing any information</p>
    </div>


    <div class="container d-flex justify-content-center">
      <form action="" method="post" style="width:50vw; min-width:300px;">
        <div class="row mb-3">
          

            <div class="mb-3">
               <label class="form-label">intern first name:</label>
               <input type="text" class="form-control" name="first_name" placeholder="@example" value="<?php echo $row['first_name'] ?>">
            </div>

            <div class="mb-3">
               <label class="form-label">intern last name:</label>
               <input type="text" class="form-control" name="last_name" value='<?php echo $row['last_name']?>'>
            </div>

            <div class="mb-3">
               <label class="form-label">intern birthday:</label>
               <input type="date" class="form-control" name="bday" value="<?php echo $row['bday'] ?>">
            </div>


            <div class="form-group mb-3">
                  <label for="department">departement :</label>
                  <select class="form-control" id="depart" name="id_depart">
                  <option value='<?php echo $row['id_depart'] ?>'><?php echo $row["name_depart"] ?></option>
                     <?php
                     while ($row = mysqli_fetch_assoc($department)) {
                     ?> 
                     <option value='<?php echo $row['id_depart'];?>'><?php echo $row["name_depart"] ?></option>
                     <?php }?>
                  </select>
            </div>

        <div>
          <button type="submit" class="btn btn-success" name="submit">Update</button>
          <a href="index.php" class="btn btn-danger">Cancel</a>
        </div>
      </form>
    </div>
  </div>

  <!-- Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html>