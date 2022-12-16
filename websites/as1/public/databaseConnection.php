<?php
//connecting database(this code snipet will be used in other files to connect database)

// database info
// $schema = 'assignment1';
// $username = 'user1';
// $password = 'user1';
// $host = 'localhost';

// pdo connection
//$pdo = new PDO("mysql:host=$host;dbname=$schema", $username, $password);
$pdo = new PDO('mysql:dbname=assignment1;host=db', 'root', 'root',[PDO::ATTR_ERRMODE=> PDO::ERRMODE_EXCEPTION]);
// to reduce code repeatation common variable used in multiple files are stored here

// to get categories available in the database
$getCategoryQuery = $pdo->prepare('SELECT * FROM category');
$getCategoryQuery->execute();
$getCategory = $getCategoryQuery->fetchAll();

?>