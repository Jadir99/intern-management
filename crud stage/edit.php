
<?php
require "../connection.php";
// recupere l'id de departement 
$id=$_GET['id'];

if (isset($_POST["submit"])) {

  $id_admin = $_POST['id_admin'];
  $id_depart = $_POST['id_depart'];
  $id_intern = $_POST['id_intern'];
  $start_date = $_POST['start_date'];
  $end_date = $_POST['end_date'];
  $sql = "UPDATE `internship` SET `id_admin`='$id_admin', `id_depart`='$id_depart', `id_intern`='$id_intern', `start_date`='$start_date', `end_date`='$end_date' WHERE id_internship='$id'";
  echo $sql;
  $result = mysqli_query($conn, $sql);
  
  if ($result) {
     header("Location: index.php?msg=Record updated successfully");
  } else {
     echo "Failed: " . mysqli_error($conn);
  }
}
// la liste des departements pour la selections :
$sql = "SELECT * FROM department";
$departments = mysqli_query($conn, $sql);
// la liste des admin pour la selections :
$sql = "SELECT * FROM administration";
$admins = mysqli_query($conn, $sql);
// la liste des departements pour la selections :
$sql = "SELECT * FROM intern";
$interns = mysqli_query($conn, $sql);
// var_dump($result)

$query= "select * from internship natural join  administration  natural join intern where id_intern =$id";
$result=mysqli_query($conn,$query);
$stage = mysqli_fetch_assoc($result);

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
      <h3>Edit stage Information</h3>
      <p class="text-muted">Click update after changing any information</p>
    </div>


    <div class="container d-flex justify-content-center">
      <form action="" method="post" style="width:50vw; min-width:300px;">
        <div class="row mb-3">


          <div class="form-group mb-3">
                <label for="department">admin :</label>
                <select class="form-control" id="admin" name="id_admin">
                    <option value="<?php echo $stage['id_admin']?>"><?php echo $stage['username']?></option>
                    <?php
                    while ($row = mysqli_fetch_assoc($admins)) {
                    ?> 
                    <option value='<?php echo $row['id_admin'];?>'><?php echo $row["username"] ?></option>
                    <?php }?>
                </select>
          </div>
          
          <div class="form-group mb-3">
                <label for="department">intern :</label>
                <select class="form-control" id="" name="id_intern">
                <option value="<?php echo $stage['id_intern'];?>"><?php echo $stage["last_name"] ?></option>
                    <?php
                    while ($row = mysqli_fetch_assoc($interns)) {
                    ?> 
                    <option value='<?php echo $row['id_intern'];?>'><?php echo $row["last_name"] ?></option>
                    <?php }?>
                </select>
          </div>


          <div class="form-group mb-3">
                <label for="department">departement :</label>
                <select class="form-control" id="depart" name="id_depart">
                <option value="<?php echo $row['id_depart'];?>">Select an department</option>
                    <?php
                    while ($row = mysqli_fetch_assoc($departments)) {
                    ?> 
                    <option value='<?php echo $row['id_depart'];?>'><?php echo $row["name_depart"] ?></option>
                    <?php }?>
                </select>
          </div>


          <div class="mb-3">
              <label class="form-label">start date :</label>
              <input type="date" class="form-control" name="start_date" value="<?php echo $stage['start_date'];?>" >
          </div>

          
          <div class="mb-3">
              <label class="form-label">end date :</label>
              <input type="date" class="form-control" name="end_date" value="<?php echo $stage['end_date'];?>">
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