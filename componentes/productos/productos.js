
        $(document).ready(function () {
          new DataTable("#productsTable", {
            theme: "dark",
            responsive: {
              details: {
                display: DataTable.Responsive.display.modal({
                  header: function (row) {
                    var data = row.data();
                    return "Detalles de " + data[0];
                  },
                }),
                renderer: function (api, rowIdx, columns) {
                  var data = $.map(columns, function (col, i) {
                    return col.columnIndex != 1
                      ? '<tr data-dt-row="' +
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
                      "</tr>"
                      : "";
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
              }, renderer: DataTable.Responsive.renderer.tableAll({
                tableClass: "table",
              }),
            }, language: {
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
            columnDefs: [
              {
                targets: [0, 2, 3, 4, 5],
                searchable: true,
              },
            ],
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
            columnDefs: [
              {
                targets: [0, 1, 3, 4, 5],
                orderable: false,
              },
            ],
            order: [[0,1,2,3,4,5, "asc"]],
            pageLength: 5,
            lengthMenu: [
              [5, 10, 15, 20, -1],
              [5, 10, 15, 20, "Todos"],
            ],
            displayLength: 5,
            drawCallback: function () {
              $(".dataTables_paginate")
                .addClass("pagination justify-content-end")
                .css("border-top", "0");
            },
            createdRow: function (row, data, dataIndex) {
              if (data[3].startsWith("$")) {
                $(row).removeClass("table-success");
              }
            },
          });
        });

