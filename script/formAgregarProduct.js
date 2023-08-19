document.addEventListener("DOMContentLoaded", function() {
    const agregarProductoForm = document.getElementById("agregar-producto-form");
  
    agregarProductoForm.addEventListener("submit", function(event) {
      event.preventDefault();
      
      const formData = new FormData(agregarProductoForm);
      const productoData = {};
      
      formData.forEach((value, key) => {
        productoData[key] = value;
      });
  
      // Enviar los datos al punto final de la API para agregar productos
      fetch("https://nextboostperu.com/gestion/api.php", {
        method: "POST",
        headers: {
          "Content-Type": "application/json"
        },
        body: JSON.stringify(productoData)
      })
      .then(response => response.json())
      .then(data => {
        console.log(data); // Puedes hacer algo con la respuesta, como mostrar un mensaje de éxito
        // Restablecer el formulario o realizar otras acciones después de agregar el producto
      })
      .catch(error => {
        console.error("Error al agregar producto:", error);
        // Manejo de errores, por ejemplo, mostrar un mensaje de error al usuario
      });
    });
  });
  