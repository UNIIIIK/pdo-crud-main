<?php
session_start();

include("pdo-con.php");

?>
|<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TEST</title>
</head>
<body>
<div class="container">
<form class="row g-3" action="crud.php" method="POST">
  <div class="col-md-4">
    <label for="inputEmail4" class="form-label">First Name</label>
    <input type="text" name="firstname" class="form-control" id="inputEmail4" required>
  </div>
  <div class="col-md-4">
    <label for="inputPassword4" class="form-label">Last name</label>
    <input type="text" name="lastname" class="form-control" id="inputPassword4" required>
  </div>
  <div class="col-4">
    <label for="inputAddress" class="form-label">Email</label>
    <input type="email" name="email" class="form-control" id="inputAddress" required>
  </div>
  <div class="col-md-4">
    <label for="inputState" class="form-label">Gender</label>
    <select id="inputState" name="gender" class="form-select" required>
      <option selected>Male</option>
      <option>Female</option>
    </select>
  </div>
  <div class="col-md-4">
    <label for="inputCity" class="form-label">Birthdate</label>
    <input type="date" name="birth" class="form-control" id="inputCity" required>
  </div>
  <div class="col-md-4">
    <label for="inputZip" class="form-label">Address</label>
    <input type="text" name="address" class="form-control" id="inputZip" placeholder="123 Main St" required>
  </div>
  <div class="col-12">
  <input type="submit" class="btn btn-success float-end" value="Add" name="reg-submit">
  </div>
</form>
</div>

<?php 
  if(isset($_SESSION['message'])) :
?>
<h5 class="alert alert=success"> <?= $_SESSION['message']; ?> </h5>
<?php endif; ?>
<div class="info-table container">
  <table class="table table-dark table-striped">
    <thead>
      <tr>
        <th scope="col">id</th>
        <th scope="col">First Name</th>
        <th scope="col">Last Name</th>
        <th scope="col">Email</th>
        <th scope="col">Gender</th>
        <th scope="col">Birthdate</th>
        <th scope="col">Address</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
    <?php
    $sql = "SELECT * FROM users";
    $statement = $con->prepare($sql);
    $statement->execute();

    $result = $statement->fetchAll();
    
    if ($result) 
    {
      // output data of each row
     foreach($result as $row) {

        ?>
      <tr>
        <td><?php echo $row['id'];?></td>
        <td><?php echo $row['first_name'];?></td>
        <td><?php echo $row['last_name'];?></td>
        <td><?php echo $row['email'];?></td>
        <td><?php echo $row['gender'];?></td>
        <td><?php echo $row['birthdate'];?></td>
        <td><?php echo $row['address'];?></td>
        <td>
          
        <button type="button" class="btn btn-primary">Edit</button>
        <button type="button" class="btn btn-danger">Delete</button>
        </td>
        <?php
      }
    } else {
      
  }
    ?>
      </tr>
      
    </tbody>
  </table>
</div>

    
</body>
</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>