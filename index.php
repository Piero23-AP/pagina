<?php
session_start();
require_once "../dashboardLogin/config/config.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <title>Album example · Bootstrap</title>
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
                    <img src="../dashboardLogin/assets/svg/Recurso 1celular 1.svg" alt="App Movil">
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
                    <img src="../dashboardLogin/assets/svg/client.svg" alt="icon atencion">
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
            <form method="POST" action="../dashboardLogin/assets/controllers/Auth/process_login.php">
                <div class="form-img"><img src="../dashboardLogin/assets/svg/Recurso 4logoazul 1.svg" alt="NEXT BOOST"></div>
                <label for="email-form"><span><img src="../dashboardLogin/assets/svg/Vector.svg" alt=""> </span> Usuario</label>
                <input type="email" name="email" class="email-form" id="email-form">


                <label for="contrasena-form"><span><img src="../dashboardLogin/assets/svg/contraseña.svg" alt=""> </span> Contraseña</label>
                <input type="password" name="contrasena" class="contrasena-form" id="contrasena-form">

                <a href="#">Recuperar contraseña</a>
                <button type="submit">Iniciar Sesión</button>
            </form>
        </div>
    </div>
</body>

</html>