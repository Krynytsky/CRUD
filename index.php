<?php
$pdo = new PDO('mysql:host=localhost;dbname=students', 'root', 'Krntsk020594');
$stmt = $pdo->prepare('SELECT * from students');
$stmt->execute();

?>
<?php require 'header.php'; ?>

<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>All Students</h2>
    </div>
    <div class="card-body">
      <table class="table table-bordered">
    <tr>
        <th>id</th>
        <th>First name</th>
        <th>Last name</th>
        <th>Age</th>
        <th>University</th>
        <th>Action</th>
    </tr>
    <?php foreach ($stmt->fetchAll() as $row) { ?>
        <tr>
            <td><?php echo $row['st_id'] ?></td>
            <td><?php echo $row['st_first_name'] ?></td>
            <td><?php echo $row['st_last_name'] ?></td>
            <td><?php echo $row['st_age'] ?></td>
            <td><?php echo $row['un_name'] ?></td>
            <td>
            <a href="edit.php?st_id=<?php echo $row['st_id'] ?>" class="btn btn-info">Edit</a>
            <a onclick="return confirm('Are you sure you want to delete this student?')" href="delete.php?st_id=<?php echo $row['st_id'] ?>" class='btn btn-danger'>Delete</a>
          </td>
        </tr>
    <?php } ?>
</table>
<br>
<a href="create.php" class="btn btn-info">Create a student</a>
 <?php require 'footer.php'; ?>
