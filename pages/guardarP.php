<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $nombre = $_POST["nombre"];
  $precio = $_POST["precio"];
  $stock = $_POST["stock"];
  $descripcion = $_POST["descripcion"];
  $categoria = $_POST["categoria"];
  $imagen = $_FILES["imagen"]["name"];
  $imagen_temporal = $_FILES["imagen"]["tmp_name"];

  // Construir la ruta completa de la imagen
  $dominio = "C:\xampp\htdocs\dashboardLogin";
  $ruta_imagen = "/media/" . $id . "_" . $imagen;
  $ruta_imagen_completa = $dominio . $ruta_imagen;

  // Mover la imagen a la carpeta "media" en el servidor
  move_uploaded_file($imagen_temporal, $ruta_imagen);

  // Datos del nuevo producto en formato JSON
  $nuevo_producto = array(
    "id" => "1", // Cambiar el id según tus necesidades
    "nombre" => $nombre,
    "precio" => $precio,
    "stock" => $stock,
    "categoria" => $categoria,
    "imagen" => $ruta_imagen_completa,
    "descripcion" => $descripcion
  );

  // Preparar los datos para la solicitud POST
  $post_data = json_encode($nuevo_producto);

  // Inicializar cURL para hacer la solicitud POST a la API
  $ch = curl_init("https://nextboostperu.com/gestion/api.php");
  curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
  curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
    'Content-Length: ' . strlen($post_data)
  ));

  // Ejecutar la solicitud cURL y obtener la respuesta
  $response = curl_exec($ch);

  // Cerrar la sesión cURL
  curl_close($ch);

  // Redirigir a una página de éxito
  header("Location: index.php?success=true");
  exit();
}
?>
