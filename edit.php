<?php

$pdo = new PDO('mysql:host=127.0.0.1;dbname=article', 'root', 'root');
$stmt = $pdo->prepare('SELECT * from article WHERE id = :id');
$stmt->bindValue('id', $_GET['id']);
$stmt->execute();
$row = $stmt->fetch();

if (isset($_POST['name']) && isset($_POST['description']) && isset($_POST['created_at'])) {

    $stmt = $pdo->prepare('UPDATE article SET name = :name, description = :description, created_at = :created_at WHERE id = :id');
    $stmt->bindValue('id', $_GET['id']);
    $stmt->bindValue('name', $_POST['name']);
    $stmt->bindValue('description', $_POST['description']);
    $stmt->bindValue('created_at', $_POST['created_at']);
    $stmt->execute();

    header('Location: index.php');
}

?>

<form method="post">
    <input type="text" required name="name" placeholder="name" value="<?php echo $row['name'] ?>">
    <br>
    <input type="text" required name="description" placeholder="description" value="<?php echo $row['description'] ?>">
    <br>
    <input type="text" required name="created_at" placeholder="created_at" value="<?php echo $row['created_at'] ?>">
    <br>
    <input type="submit">
</form>