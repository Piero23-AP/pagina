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

        header("Location: dashboard.php");
        exit();
    } else {
        $mensaje = "Credenciales incorrectas.";
    }


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
    <link rel="stylesheet" href="../dashboardLogin/style/login.css">
</head>

<body>
    <div class="contenedor">
    <div class="logo-blanco-contenedor">
                <img src="../dashboardLogin/svg/logo-blanco.svg" alt="">
            </div>
        <div class="contenedor-info">
            <div class="contenedor-potencia-redes">
                <div class="contenedor-potencia-redes-img">
                    <img src="../dashboardLogin/svg/Recurso 1celular 1.svg" alt="App Movil">
                </div>
                <div class="contenedor-potencia-redes-info">
                    <div>
                        <h3>Potencia tus Redes Sociales y vende más!</h3>
                        <p>Contrata ahora nuestros paquetes de Diseño gráfico
                            <br> y destaca frente a tu competencia.
                        </p>
                    </div>
                    <div class="contenedor_button">
                        <button>Adquirir</button>
                    </div>
                </div>
            </div>
            <div class="contenedor-atencion-cliente">
                <div>
                    <img src="../dashboardLogin/svg/client.svg" alt="icon atencion">
                </div>
                <div>
                    <div>
                        <h3>Atención 24/7. ¡Experiencia de soporte técnico <br> única y personalizada!</h3>
                        <p>Nuestro equipo está listo para brindarte el mejor servicio <br> en todo momento.</p>
                    </div>
                    <div class="contenedor-atencion-cliente-buton"><button>Contactenos</button></div>
                </div>
            </div>
        </div>
        <div class="login-next-boost">
            <form method="POST" action="dashboard.php">
                <div class="form-img"><img src="../dashboardLogin/svg/Recurso 4logoazul 1.png" alt="NEXT BOOST"></div>
                <label for="email-form"><span><img src="../dashboardLogin/svg/Vector.svg" alt=""> </span> Usuario</label>

                <input type="email" name="email" class="email-form" id="email-form">

                <label for="contrasena-form"><span><img src="../dashboardLogin/svg/contraseña.svg" alt=""> </span> Contraseña</label>

                <input type="password" name="contrasena" class="contrasena-form" id="contrasena-form">
                <a href="#">Recuperar contraseña</a>
                <button ntype="submit">Iniciar Sesión</button>
            </form>
        </div>
    </div>
</body>

</html>