<?php
if (isset($_POST['login'])) {
    include 'config.php'; // Asegúrate de que el archivo config.php esté en la ubicación correcta

    // Crear la conexión
    $conn = new mysqli($servername, $username, $password, $database);

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    $email = $_POST['email'];
    $contrasena = $_POST['contrasena'];

    // Verificar las credenciales
    $consulta = "SELECT * FROM usuarios WHERE correo = '$email' AND contrasena = '$contrasena'";
    $resultado = $conn->query($consulta);

    if ($resultado->num_rows === 1) {
        // Inicio de sesión exitoso, redirigir a index.php
        header("Location: index.php");
        exit(); // Asegura que no se ejecuten más líneas de código después de la redirección
    } else {
        $mensaje = "Credenciales incorrectas.";
    }

    // Cerrar la conexión
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="generator" content="Hugo 0.72.0">
    <title>Album example · Bootstrap</title>
    <link rel="canonical" href="https://v5.getbootstrap.com/docs/5.0/examples/album/">
    <link rel="stylesheet" href="../pagina/style.css">
</head>

<body>
    <div class="contenedor">
        <div class="contenedor-info">
            <div class="contenedor-potencia-redes">
                <div class="contenedor-potencia-redes-img">
                    <img src="../pagina/Recurso 1celular 1.svg" alt="App Movil">
                </div>
                <div class="contenedor-potencia-redes-info">

                    <h3>Potencia tus Redes Sociales y vende más!</h3>
                    <p>Contrata ahora nuestros paquetes de Diseño gráfico y destaca frente a tu competencia.</p>
                    <div class="contenedor_button">
                        <button>Adquirir</button>
                    </div>
                </div>
            </div>
            <div class="contenedor-atencion-cliente">
                <div>
                    <img src="../pagina/client.svg" alt="icon atencion">
                </div>
                <div>
                    <h3>Atención 24/7. ¡Experiencia de soporte técnico única y personalizada!</h3>
                    <p>Nuestro equipo está listo para brindarte el mejor servicio en todo momento.</p>
                    <button>Contactenos</button>
                </div>
            </div>
        </div>
        <div class="login-next-boost">
            <form method="POST" action="inicio.php">
                <div class="form-img"><img src="../pagina/Recurso 4logoazul 1.png" alt="NEXT BOOST"></div>

                <label for="email-form"><span><img src="../pagina/Vector.svg" alt=""> </span> Correo</label>
                <input type="email" name="email" class="email-form" id="email-form">
                
                <label for="contrasena-form"><span><img src="../pagina/contraseña.svg" alt=""> </span> Contraseña</label>
                <input type="password" name="contrasena" class="contrasena-form" id="contrasena-form">
                
                <a href="#">Recuperar contraseña</a>
                <button type="submit" name="login">Iniciar Sesión</button>
            </form>
           
        </div>
    </div>
</body>

</html>