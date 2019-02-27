<?php
$pdo = new PDO('mysql:host=localhost;dbname=students', 'root', 'Krntsk020594');

$stmt = $pdo->prepare('DELETE FROM students WHERE st_id = :st_id');
$stmt->bindValue('st_id', $_GET['st_id']);
$stmt->execute();

header('Location: index.php');
