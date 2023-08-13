<?php
$servername = "localhost";
$username = "root";
$password = "admin9538125@@asSXUl";
$database = "DashboardAppDB";

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $database);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
    
}
echo "conexion exitosa";

// Cerrar la conexión
$conn->close();
?>
