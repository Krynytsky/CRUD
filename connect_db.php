<?php
$host ='mysql:host=localhost; dbname=students';
$name = 'root';
$password = 'Krntsk020594';
 try {
   $pdo = new PDO($host,$name,$password);

 } catch (\Exception $e) {
        echo "Invalid name or password";
 }

?>
