<?php 
  include("db.php");
  $title = '';
  $description = '';

  if(isset($_GET['update'])) {
    $id = $_GET['id'];

    $query = "SELECT * FROM tasks WHERE id = $id";
    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_array($result);
      $title = $row['title'];
      $description = $row['description'];
    }
  }

  if(isset($_POST['update'])) {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $description = $_POST['description'];

    $query = "UPDATE tasks set title = '$title', description = '$description' WHERE id = $id";
    mysqli_query($conn, $query);

    header("location: index.php");
  }

?>


<?php include("./includes/header.php"); ?>

<div class="container">
  <div class="row mt-4">
    <div class="col-md-4 col-sm-12 col-lg-4 col-xl-4 mx-auto">
      <div class="card">
        <div class="card-header">Form edit</div>
        <div class="card-body">
          <form action="update.php?id=<?php echo $_GET['id']; ?>" method="POST">
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Update title" name="title" value="<?php echo $title; ?>">
            </div>
            <div class="form-group">
              <textarea name="description" cols="30" rows="10" class="form-control" placeholder="Update description"><?php echo $description; ?></textarea>
            </div>

            <input type="submit" class="btn btn-success btn-block" name="update">
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include("./includes/footer.php"); ?>