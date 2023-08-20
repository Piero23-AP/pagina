<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="productos.css" href="style.css">
  <link rel="stylesheet" href="../../../dashboardLogin/assets/svg/delete.svg">
  <link rel="stylesheet" href="../../../dashboardLogin/assets/svg/edit.svg">
</head>

<body>

  <div class="content">
    <br>
    <h2>Lista de Productos</h2>
    <hr>
    <br>
    <?php
    $apiEndpoint = "https://nextboostperu.com/gestion/api.php";
    $response = file_get_contents($apiEndpoint);
    $data = json_decode($response, true);
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
                      
      <a href='#' title='Editar' class='edit mb-1 edit-button' data-bs-toggle='modal' data-bs-target='#editar_producto_modal' data-product-id='" . urlencode($producto["id"]) . "'><img src='../../../dashboardLogin/assets/svg/edit.svg' alt=''></a>
                      
      <a href='#' title='Eliminar' class='mb-1 deleteButton' data-bs-toggle='modal' data-bs-target='#eliminar_productoModal' data-product-id='" . $producto["id"] . "'><img src='../../../dashboardLogin/assets/svg/delete.svg' alt=''></a>
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
    <script>
      $(document).ready(function() {
        new DataTable("#productsTable", {
          theme: "dark",
          responsive: {
            details: {
              display: DataTable.Responsive.display.modal({
                header: function(row) {
                  var data = row.data();
                  return "Detalles de " + data[0];
                },
              }),
              renderer: function(api, rowIdx, columns) {
                var data = $.map(columns, function(col, i) {
                  return col.columnIndex != 1 ?
                    '<tr data-dt-row="' +
                    col.rowIndex +
                    '" data-dt-column="' +
                    col.columnIndex +
                    '">' +
                    "<td>" +
                    col.title +
                    " :" +
                    "</td> " +
                    '<td class="custem-td">' +
                    col.data +
                    "</td>" +
                    "</tr>" :
                    "";
                }).join("");

                return data ? $("<table/>").append(data) : false;
              },
            },
            scrollX: false,
            scrollY: true,
            language: {

              sProcessing: "Procesando...",
              sLengthMenu: "Mostrar _MENU_ registros",
              sZeroRecords: "No se encontraron resultados",
              sEmptyTable: "Ningún dato disponible en esta tabla",
              sInfo: "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
              sInfoEmpty: "Mostrando registros del 0 al 0 de un total de 0 registros",
              sInfoFiltered: "(filtrado de un total de _MAX_ registros)",
              sInfoPostFix: "",
              sSearch: "Buscar:",
              sUrl: "",
              sInfoThousands: ",",
              sLoadingRecords: "Cargando...",
              oPaginate: {
                sFirst: "Primero",
                sLast: "Último",
                sNext: "Siguiente",
                sPrevious: "Anterior",
              },
              oAria: {
                sSortAscending: ": Activar para ordenar la columna de manera ascendente",
                sSortDescending: ": Activar para ordenar la columna de manera descendente",
              },
              buttons: {
                copy: "Copiar",
                colvis: "Visibilidad",
              },
            },
            renderer: DataTable.Responsive.renderer.tableAll({
              tableClass: "table",
            }),
          },
          language: {
            decimal: "",
            emptyTable: "No hay datos disponibles en la tabla",
            info: "",
            infoEmpty: "",
            infoFiltered: "",
            infoPostFix: "",
            thousands: ",",
            lengthMenu: "Mostrar _MENU_ registros",
            loadingRecords: "Cargando...",
            processing: "Procesando...",
            search: "<button class='btn btn-primary'>Buscar</button>",
            zeroRecords: "El producto no se encuentra registrado",
            paginate: {
              first: "&laquo;",
              last: "&raquo;",
              next: "<i class='fa-solid fa-forward'</i>",
              previous: "<i class='fa-solid fa-backward'></i>",
            },
            aria: {
              sortAscending: ": Activar para ordenar la columna de manera ascendente",
              sortDescending: ": Activar para ordenar la columna de manera descendente",
            },
          },
          searching: true,
          columnDefs: [{
            targets: [0, 2, 3, 4, 5],
            searchable: true,
          }, ],
          paging: true,
          scrollX: false,
          scrollY: true,
          autoWidth: true,
          deferRender: false,
          dom: "lBfrtip",
          lengthChange: false,
          ordering: true,
          pagingType: "simple_numbers",
          scrollCollapse: false,
          stateSave: true,
          columnDefs: [{
            targets: [0, 1, 3, 4, 5],
            orderable: false,
          }, ],
          order: [
            [0, 1, 2, 3, 4, 5, "asc"]
          ],
          pageLength: 5,
          lengthMenu: [
            [5, 10, 15, 20, -1],
            [5, 10, 15, 20, "Todos"],
          ],
          displayLength: 5,
          drawCallback: function() {
            $(".dataTables_paginate")
              .addClass("pagination justify-content-end")
              .css("border-top", "0");
          },
          createdRow: function(row, data, dataIndex) {
            if (data[3].startsWith("$")) {
              $(row).removeClass("table-success");
            }
          },
        });
      });
    </script>
</body>

</html>