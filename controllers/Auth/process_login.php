<?php
session_start();
require_once "../../../dashboardLogin/config/config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["contrasena"];

    // Verificar las credenciales en tu base de datos
    $sql = "SELECT * FROM usuarios WHERE correo = :email AND contrasena = :password";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(":email", $email);
    $stmt->bindParam(":password", $password);
    $stmt->execute();

    $usuario_valido = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($usuario_valido) {
        $_SESSION['usuario'] = $usuario_valido['nombre_usuario'];
        header("Location: ../../../dashboardLogin/componentes/Dashboard/dashboard.php");
        exit;
    } else {
        header("Location: ../../../dashboardLogin/index.php?login_error=1");
        exit;
    }
}

if (isset($_SESSION['usuario'])) {
    header("Location: ../../../dashboardLogin/componentes/Dashboard/dashboard.php");
    exit;
}
?>
