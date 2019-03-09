<?php
require ('connect_db.php');//connection to the "student" database
$stmt = $pdo->prepare('DELETE FROM students WHERE st_id = :st_id');
$stmt->bindValue('st_id', $_GET['st_id']);
$stmt->execute();

header('Location: index.php');
