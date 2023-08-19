<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["id"])) {
    $producto_id = $_POST["id"];

    // Leer el archivo JSON
    $productos_json = file_get_contents("https://nextboostperu.com/gestion/api.php");
    $productos_array = json_decode($productos_json, true);

    // Buscar el producto por ID
    $producto_encontrado = null;
    foreach ($productos_array as $key => $producto) {
        if ($producto["id"] == $producto_id) {
            $producto_encontrado = $producto;
            break;
        }
    }

    if ($producto_encontrado) {
        // Actualizar los datos del producto
        $producto_encontrado["nombre"] = $_POST["nombre"];
        $producto_encontrado["precio"] = $_POST["precio"];
        $producto_encontrado["stock"] = $_POST["stock"];
        $producto_encontrado["categoria"] = $_POST["categoria"];
        $producto_encontrado["descripcion"] = $_POST["descripcion"];

        // Verificar si se cargó una nueva imagen
        if ($_FILES["imagen"]["name"] !== "") {
            $imagen = $_FILES["imagen"]["name"];
            $imagen_temporal = $_FILES["imagen"]["tmp_name"];

            // Generar un nombre único para la imagen basado en el ID del producto y el nombre original
            $nombre_imagen = $producto_id . "_" . basename($imagen);
            
            // Ruta completa local para guardar la imagen en la carpeta "media"
            $ruta_imagen_local = "C:/xampp/htdocs/dashboardLogin/media/" . $nombre_imagen;

            // Guardar la nueva imagen en la carpeta "media"z
            move_uploaded_file($imagen_temporal, $ruta_imagen_local);

            // Actualizar la URL de la imagen en el producto encontrado
            $producto_encontrado["imagen"] = $ruta_imagen_local;
        }

        // Actualizar el producto en el array
        $productos_array[$key] = $producto_encontrado;

        // Actualizar el archivo JSON en el servidor remoto
        $productos_json_actualizado = json_encode($productos_array, JSON_PRETTY_PRINT);
        file_put_contents("https://nextboostperu.com/gestion/api.php", $productos_json_actualizado);

        $response = array(
            'status' => 'success',
            'message' => 'Producto actualizado exitosamente.'
        );
    } else {
        $response = array(
            'status' => 'danger',
            'message' => 'Producto no encontrado.'
        );
    }
} else {
    $response = array(
        'status' => 'danger',
        'message' => 'Error al guardar la edición del producto.'
    );
}

echo json_encode($response);
?>
