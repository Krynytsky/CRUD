<?php

$pdo = new PDO('mysql:host=127.0.0.1;dbname=article', 'root', 'root');

$stmt = $pdo->prepare('SELECT * from article');
$stmt->execute();

?>

<table>
    <tr>
        <td>id</td>
        <td>name</td>
        <td>description</td>
        <td>created_at</td>
    </tr>
    <?php foreach ($stmt->fetchAll() as $row) { ?>
        <tr>
            <td><?php echo $row['id'] ?></td>
            <td><?php echo $row['name'] ?></td>
            <td><?php echo $row['description'] ?></td>
            <td><?php echo $row['created_at'] ?></td>
            <td><a href="edit.php?id=<?php echo $row['id'] ?>">edit</a></td>
            <td><a href="delete.php?id=<?php echo $row['id'] ?>">delete</a></td>
        </tr>
    <?php } ?>
</table>
<br>
<a href="create.php">create</a>