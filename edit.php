<?php

$pdo = new PDO('mysql:host=localhost;dbname=students', 'root', 'Krntsk020594');
$stmt = $pdo->prepare('SELECT * from students WHERE st_id = :st_id');
$stmt->bindValue('st_id', $_GET['st_id']);
$stmt->execute();
$row = $stmt->fetch();

if (isset($_POST['st_first_name']) &&
    isset($_POST['st_last_name']) &&
    isset($_POST['st_age']) &&
    isset($_POST['un_name'])
  ) {

    $stmt = $pdo->prepare('UPDATE students SET st_first_name = :st_first_name,
                                               st_last_name = :st_last_name,
                                               st_age = :st_age,
                                               un_name = :un_name
                                          WHERE st_id = :st_id');
    $stmt->bindValue('st_id', $_GET['st_id']);
    $stmt->bindValue('st_first_name', $_POST['st_first_name']);
    $stmt->bindValue('st_last_name', $_POST['st_last_name']);
    $stmt->bindValue('st_age', $_POST['st_age']);
    $stmt->bindValue('un_name', $_POST['un_name']);
    $stmt->execute();

    header('Location: index.php');
}

?>
<?php require 'header.php'; ?>
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Update Student</h2>
    </div>
    <div class="card-body">
      <?php if(!empty($message)): ?>
        <div class="alert alert-success">
          <?= $message; ?>
        </div>
      <?php endif; ?>
      <form method="post">
        <div class="form-group">
          <label for="name">First Name</label>
          <input value="<?php echo $row['st_first_name'] ?>" type="text" required name="st_first_name"
                 placeholder="Edit First Name" class="form-control">
        </div>
        <div class="form-group">
          <label for="name">Last Name </label>
          <input value="<?php echo $row['st_last_name'] ?>" type="text" required name="st_last_name"
                 placeholder="Edit Last Name" class="form-control">
        </div>
          <div class="form-group">
            <label for="name">Age</label>
          <input value="<?php echo $row['st_age'] ?>" type="text" required name="st_age"
                 placeholder="Edit Age" class="form-control">
        </div>
          <div class="form-group">
            <label for="name">University</label>
          <input value="<?php echo $row['un_name'] ?>" type="text" required name="un_name"
                 placeholder="Edit University" class="form-control">
        </div>
          <div class="form-group">
            <button type="submit" class="btn btn-info">Update Student</button>
          </div>
</form>
<?php require 'footer.php'; ?>
