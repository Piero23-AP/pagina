<?php
$servername = "localhost";
$username = "root";
$password = "admin9538125@@asSXUl";
$database = "DashboardAppDB";


$conn = new mysqli($servername, $username, $password, $database);


if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}



$conn->close();
?>
