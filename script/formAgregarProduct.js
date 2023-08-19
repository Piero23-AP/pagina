document.addEventListener("DOMContentLoaded", function() {
    const agregarProductoForm = document.getElementById("agregar-producto-form");
  
    agregarProductoForm.addEventListener("submit", function(event) {
      event.preventDefault();
      
      const formData = new FormData(agregarProductoForm);
      const productoData = {};
      
      formData.forEach((value, key) => {
        productoData[key] = value;
      });
  

      fetch("https://nextboostperu.com/gestion/api.php", {
        method: "POST",
        headers: {
          "Content-Type": "application/json"
        },
        body: JSON.stringify(productoData)
      })
      .then(response => response.json())
      .then(data => {
        console.log(data);
      })
      .catch(error => {
        console.error("Error al agregar producto:", error);
      });
    });
  });
  