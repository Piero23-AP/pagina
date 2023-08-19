document.addEventListener("DOMContentLoaded", function() {
    const listoAgregarProductLink = document.getElementById("agregarProduct");
    const agregarProductDiv = document.getElementById("agregarproducto");
    const procDiv = document.getElementById("proc");

    listoAgregarProductLink.addEventListener("click", async (event) => {
      event.preventDefault();

      // Cerrar el otro menú si está abierto
      procDiv.style.display = "none";

      try {
        const response = await fetch("pages/agregarproducto.php");
        const data = await response.text();

        // Mostrar u ocultar el menú de agregar producto
        if (agregarProductDiv.style.display === "block") {
          agregarProductDiv.style.display = "none";
        } else {
          agregarProductDiv.style.display = "block";
          agregarProductDiv.innerHTML = data;
        }
      } catch (error) {
        console.error("Error al obtener datos del archivo PHP:", error);
      }
    });
  });










