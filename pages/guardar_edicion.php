<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["id"])) {
    $producto_id = $_POST["id"];

    $productos_json = file_get_contents("https://nextboostperu.com/gestion/api.php");
    $productos_array = json_decode($productos_json, true);


    $producto_encontrado = null;
    foreach ($productos_array as $key => $producto) {
        if ($producto["id"] == $producto_id) {
            $producto_encontrado = $producto;
            break;
        }
    }

    if ($producto_encontrado) {

        $producto_encontrado["nombre"] = $_POST["nombre"];
        $producto_encontrado["precio"] = $_POST["precio"];
        $producto_encontrado["stock"] = $_POST["stock"];
        $producto_encontrado["categoria"] = $_POST["categoria"];
        $producto_encontrado["descripcion"] = $_POST["descripcion"];

 
        if ($_FILES["imagen"]["name"] !== "") {
            $imagen = $_FILES["imagen"]["name"];
            $imagen_temporal = $_FILES["imagen"]["tmp_name"];

            $nombre_imagen = $producto_id . "_" . basename($imagen);
            

            $ruta_imagen_local = "C:/xampp/htdocs/dashboardLogin/media/" . $nombre_imagen;

            move_uploaded_file($imagen_temporal, $ruta_imagen_local);


            $producto_encontrado["imagen"] = $ruta_imagen_local;
        }


        $productos_array[$key] = $producto_encontrado;

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
