$("#editar_producto_modal").on("show.bs.modal", function (event) {
    var button = $(event.relatedTarget);
    var productId = button.data("product-id");
    var modalBody = $(this).find(".modal-body");
    $.ajax({
      url: "/pages/editar_producto.php?id=" + productId,
      type: "GET",
      success: function (response) {
        modalBody.html(response);
      },
      error: function () {
        modalBody.html("<p>Error al cargar el formulario de edición.</p>");
      },
    });
  });
  $(document).ready(function () {
    $(document).on("click", "#deleteButton", function () {
      var productId = $(this).data("product-id");
      var modalBody = $("#eliminar_productoModal").find(".modal-body");
  
      $.ajax({
        url: "eliminar_producto.php?id=" + productId,
        type: "GET",
        success: function (response) {
          modalBody.html(response);
          setTimeout(function () {
            $("#eliminar_productoModal").modal("hide");
          }, 700);
        },
        error: function () {
          modalBody.html("<p>Error al eliminar el producto.</p>");
        },
      });
    });
  
    $("#eliminar_productoModal").on("hidden.bs.modal", function () {
      location.reload();
    });
  });
