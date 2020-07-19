<?php 
  $server = "localhost";
  $username = "root";
  $password = "";
  $dbName = "task_crud_php";

  $conn = mysqli_connect($server, $username, $password, $dbName);

  if(!$conn) {
    die("Error al tratar de conectarse a la BD " . mysqli_connect_error());
  }
?>