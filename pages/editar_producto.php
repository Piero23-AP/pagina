<?php
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    $producto_id = $_GET["id"];

    // Realizar la solicitud GET a la API para obtener el producto por ID
    $api_url = "https://nextboostperu.com/gestion/api.php";
    $response = file_get_contents($api_url);
    $productos_array = json_decode($response, true);

    // Buscar el producto por ID
    $producto_encontrado = null;
    foreach ($productos_array as $key => $producto) {
        if ($producto["id"] == $producto_id) {
            $producto_encontrado = $producto;
            break;
        }
    }

    if ($producto_encontrado) {
        // Mostrar el formulario de edición con los datos del producto
        echo "<div style='padding: 20px; border: 1px solid #ccc; border-radius: 5px;'>";
        echo "<form id='editarForm' method='POST' enctype='multipart/form-data'>";
        echo "<input type='hidden' name='id' value='" . $producto_encontrado["id"] . "'>";
        echo "<div class='mb-3'>";
        echo "<label for='nombre' class='form-label'>Nombre del Producto</label>";
        echo "<input type='text' class='form-control' id='nombre' name='nombre' value='" . $producto_encontrado["nombre"] . "'>";
        echo "</div>";
        echo "<div class='mb-3'>";
        echo "<label for='precio' class='form-label'>Precio</label>";
        echo "<input type='text' class='form-control' id='precio' name='precio' value='" . $producto_encontrado["precio"] . "'>";
        echo "</div>";
        echo "<div class='mb-3'>";
        echo "<label for='stock' class='form-label'>Stock</label>";
        echo "<input type='text' class='form-control' id='stock' name='stock' value='" . $producto_encontrado["stock"] . "'>";
        echo "</div>"; 
        echo "<div class='mb-3'>";
        echo "<label for='descripcion' class='form-label'>Descripción</label>";
        echo "<input type='text' class='form-control' id='descripcion' name='descripcion' value='" . $producto_encontrado["descripcion"] . "'>";
        echo "</div>";
        echo "<div class='mb-3'>";
        echo "<label for='categoria' class='form-label'>Categoría</label>";
        echo "<select class='form-select' id='categoria' name='categoria'>";
        echo "<option value='tortas'" . ($producto_encontrado["categoria"] == "tortas" ? " selected" : "") . ">Tortas</option>";
        echo "<option value='postres'" . ($producto_encontrado["categoria"] == "postres" ? " selected" : "") . ">Postres</option>";
        echo "<option value='helados'" . ($producto_encontrado["categoria"] == "helados" ? " selected" : "") . ">Helados</option>";
        echo "</select>";
        echo "</div>";
        echo "<div class='mb-3'>";
        echo "<label for='formFile' class='form-label'>Actualizar imagen del producto</label>";
        echo "<input class='form-control' type='file' id='formFile' name='imagen'>";
        echo "</div>";
        echo "<div class='col-auto'>";
        echo "<button type='submit' class='btn btn-primary mb-3' id='guardarButton'>Guardar</button>";
        echo "</div>";
        echo "</form>";
        echo "<a href='index.php' class='btn btn-secondary'>Volver</a>";
        echo "</div>";
    } else {
        echo "Producto no encontrado.";
    }
} else {
    echo "ID del producto no especificado.";
}
?>

<script>
  $(document).ready(function() {
    $("#editarForm").submit(function(event) {
      event.preventDefault();

      var form = $("#editarForm")[0];
      var formData = new FormData(form);

      $.ajax({
        type: "POST",
        url: "guardar_edicion.php",
        data: formData,
        dataType: "json",
        contentType: false,
        processData: false,
        success: function(response) {
          $("#messageContainer").html("<div class='alert alert-" + response.status + "'>" + response.message + "</div>");

          setTimeout(function() {
            $("#editar_producto_modal").modal("hide");
            location.reload();
          }, 700);
        },
        error: function() {
          $("#messageContainer").html("<div class='alert alert-danger'>Error al guardar la edición del producto.</div>");
        }
      });
    });
  });
</script>