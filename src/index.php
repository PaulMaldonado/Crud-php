<?php include("./db.php"); ?>

<?php include("./includes/header.php"); ?>

  <div class="container">
    <div class="row mt-4">
      <div class="col-md-4 col-sm-12 col-lg-4 col-xl-4">
        <div class="card">
          <div class="card-header">Create tasks</div>
          <div class="card-body">
            <form action="create.php" method="POST">
              <div class="form-group">
                <input type="text" class="form-control" name="title" placeholder="Task title">
              </div>
              <div class="form-group">
                <textarea name="description" cols="30" rows="10" placeholder="Task description" class="form-control"></textarea>
              </div>

              <input type="submit" value="Save task" class="btn btn-primary btn-block" name="save">
            </form>
          </div>
        </div>
      </div>

      <div class="col-md-8 col-sm-12 col-lg-8 col-xl-8">
        <table class="table">
          <thead class="thead-dark">
            <tr>
              <th scope="col">Title</th>
              <th scope="col">Desciption</th>
              <th scope="col">Created at</th>
              <th scope="col">Edit</th>
              <th scope="col">Delete</th>
            </tr>
          </thead>
          <tbody>
            <?php 
              $query = "SELECT * FROM tasks";
              $result_tasks = mysqli_query($conn, $query);

              while($row = mysqli_fetch_assoc($result_tasks)) { ?>
              <tr>
                <td><?php echo $row['title']; ?></td>
                <td><?php echo $row['description']; ?></td>
                <td><?php echo $row['created_at']; ?></td>

                <td>
                  <a href="update.php?id=<?php echo $row['id']; ?>" class="btn btn-success">Edit</a>
                </td>
                <td>
                  <a href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a>
                </td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

<?php include("./includes/footer.php"); ?>