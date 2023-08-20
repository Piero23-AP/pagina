<?php
// config.php

$host = 'localhost';
$dbname = 'dashboardappdb';
$username = 'root';
$password = 'admin9538125@@asSXUl'; 

try {
    $db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}
?>





