<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $nombre = $_POST["nombre"];
  $precio = $_POST["precio"];
  $stock = $_POST["stock"];
  $descripcion = $_POST["descripcion"];
  $categoria = $_POST["categoria"];
  $imagen = $_FILES["imagen"]["name"];
  $imagen_temporal = $_FILES["imagen"]["tmp_name"];

  
  $dominio = "C:\xampp\htdocs\dashboardLogin";
  $ruta_imagen = "/media/" . $id . "_" . $imagen;
  $ruta_imagen_completa = $dominio . $ruta_imagen;


  move_uploaded_file($imagen_temporal, $ruta_imagen);


  $nuevo_producto = array(
    "id" => "1",
    "nombre" => $nombre,
    "precio" => $precio,
    "stock" => $stock,
    "categoria" => $categoria,
    "imagen" => $ruta_imagen_completa,
    "descripcion" => $descripcion
  );


  $post_data = json_encode($nuevo_producto);


  $ch = curl_init("https://nextboostperu.com/gestion/api.php");
  curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
  curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
    'Content-Length: ' . strlen($post_data)
  ));

  $response = curl_exec($ch);


  curl_close($ch);

  header("Location: ../../../dashboardLogin/index.php?success=true");
  exit();
}
?>
