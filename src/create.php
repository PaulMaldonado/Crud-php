<?php 
  include("db.php");

  if(isset($_POST['save'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];

    $query = "INSERT INTO tasks(title, description) VALUES ('$title', '$description')";

    $result = mysqli_query($conn, $query);

    if(!$result) {
      die('Query failed');
    }

    header("location: index.php");
  }
?>