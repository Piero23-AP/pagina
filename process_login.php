<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once "../dashboardLogin/config.php"; // Asegúrate de que la ruta a config.php sea correcta

    $email = $_POST["email"];
    $password = $_POST["contrasena"];

    // Verifica las credenciales en tu base de datos (debes implementar esta lógica)
    $sql = "SELECT * FROM usuarios WHERE correo = :email AND contrasena = :password"; // Cambiado a 'correo'
    $stmt = $db->prepare($sql);
    $stmt->bindParam(":email", $email);
    $stmt->bindParam(":password", $password); // Utiliza la contraseña proporcionada directamente
    $stmt->execute();

    $usuario_valido = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($usuario_valido) {
        $_SESSION['usuario'] = $usuario_valido['nombre_usuario'];
        header("Location: dashboard.php");
        exit;
    } else {
        // Las credenciales no son válidas, muestra un mensaje de error
        header("Location: index.php?login_error=1"); // Redirige con un parámetro de error
        exit;
    }
}
?>

