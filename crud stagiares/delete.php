<?php

require "../connection.php";

$id = $_GET["id"];
$sql = "DELETE FROM `intern` WHERE id_intern = $id";
$result = mysqli_query($conn, $sql);

if ($result) {
  header("Location: index.php?msg=Data deleted successfully");
} else {
  echo "Failed: " . mysqli_error($conn);
}
