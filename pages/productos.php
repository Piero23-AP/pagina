<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>

  <div class="content">

    <h2>Lista de productos</h2>
    <?php
    // API endpoint
    $apiEndpoint = "https://nextboostperu.com/gestion/api.php";

    // Fetch data from the API
    $response = file_get_contents($apiEndpoint);
    $data = json_decode($response, true);

    // Generate the HTML table
    $htmlTable = "<table id='productsTable' class='tabla table-striped table-bordered table-sm'>";
    $htmlTable .= "<thead class='thead text-center align-middle'>
                    <tr>
                      <th class='text-center align-middle'>Nombre</th>
                      <th class='text-center align-middle'>Precio</th>
                      <th class='text-center align-middle'>Descripción</th>
                      <th class='text-center align-middle'>Categoría</th>
                      <th class='text-center align-middle'>Imagen</th>
                      <th class='text-center align-middle'>Gestionar Producto</th>
                    </tr>
                  </thead>";
    $htmlTable .= "<tbody>";

    foreach ($data as $producto) {
      $htmlTable .= "<tr>";
      $htmlTable .= "<td class='text-center align-middle'>" . $producto["nombre"] . "</td>";
      $htmlTable .= "<td class='text-center align-middle'>" . $producto["precio"] . "</td>";
      $htmlTable .= "<td class='text-center align-middle'>" . $producto["descripcion"] . "</td>";
      $htmlTable .= "<td class='text-center align-middle'>" . $producto["categoria"] . "</td>";
      $htmlTable .= "<td class='text-center align-middle'><img src='" . $producto["imagen"] . "' class='img-fluid' width='100'></td>";
      $htmlTable .= "<td class='text-center align-middle'>
                      
      <a href='#' title='Editar' class='edit mb-1 edit-button' data-bs-toggle='modal' data-bs-target='#editar_producto_modal' data-product-id='" . urlencode($producto["id"]) . "'><img src='svg/edit.svg' alt=''></a>
                      
      <a href='#' title='Eliminar' class='mb-1 deleteButton' data-bs-toggle='modal' data-bs-target='#eliminar_productoModal' data-product-id='" . $producto["id"] . "'><img src='svg/delete.svg' alt=''></a>
                    </td>";
      $htmlTable .= "</tr>";
    }

    $htmlTable .= "</tbody>";
    $htmlTable .= "</table>";
    echo $htmlTable;
    ?>


    <div class="modal fade" id="editar_producto_modal" tabindex="-1" role="dialog" aria-labelledby="editar_productoModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="editar_productoModalLabel">Editar producto</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>

          <div class="modal-body" id="modal-body">
          </div>
          <div id="messageContainer"></div>
        </div>
      </div>
    </div>


    <div class="modal fade" id="eliminar_productoModal" tabindex="-1" role="dialog" aria-labelledby="eliminar_productoModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="eliminar_productoModalLabel">Confirmar Eliminación</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body" id="modal-body">
            <p>¿Estás seguro de eliminar este producto?</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            <a href="#" class="btn btn-danger" id="deleteButton" data-product-id="<?= $producto["id"] ?>">Eliminar</a>
          </div>
        </div>
      </div>
    </div>
</body>

</html>