<!DOCTYPE html>
<html lang="en">

<head>
  <title>Tabla De Productos</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="../dashboardLogin/style/agregarProductos.css">
  <link rel="stylesheet" href="../dashboardLogin/style/productos.css">
  <link rel="stylesheet" href="../dashboardLogin/style/style.css">
   <!-- css -->
  <link rel="stylesheet" href="../../dashboardLogin/style/style.css">
<link rel="stylesheet" href="../../dashboardLogin/style/agregarProductos.css">
<link rel="stylesheet" href="../../dashboardLogin/style/productos.css">

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/gridjs/dist/theme/mermaid.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.bootstrap5.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

  
  
  <!-- scripts.js -->

</head>

<body>
  <div class="d-flex" id="wrapper">
    <button id="show-hide-menu" onclick="toggleMenuVisibility()"><img src="../dashboardLogin/svg/dashboard.svg" alt="Menú" width="30"></button>

    <div class="contentn text-dark" id="sidebar-wrapper">
      <div class="sidebar-heading">
        <label class="menu-toggle" for="menu-checkbox">
          <img src="../dashboardLogin/svg/dashboard.svg" alt="Menú" width="30">
          <span>Dashboard</span>
        </label>
        <input type="checkbox" id="menu-checkbox" style="display: none;" onchange="toggleMenu()">
      </div>
      <div class="list-group list-group-flush">
        <div class="menu-p">
          <a href="#" class="list-group-item list-group-item-action">
            <img src="../dashboardLogin/svg/productos.svg" alt=""><span>Productos</span>
            <i class="fas fa-chevron-down "></i>
          </a>
        </div>
        <div class="sub-menu">
          <a href="#" id="agregarProduct" class="list-group-item list-group-item-action pl-4" data-url="../dashboardLogin/pages/agregarproducto.php">
            <img src="../dashboardLogin/svg/agregarProductos.svg" alt=""><span>Agregar Producto</span>
          </a>

          <a href="#" id="listproduct" class="list-group-item list-group-item-action pl-4" data-url="../dashboardLogin/pages/productos.php">
            <img src="../dashboardLogin/svg/ListaDeProductos.svg" alt=""><span>Lista de Productos</span>
          </a>
        </div>
        <div class="menu-p">
          <a href="#" class="list-group-item list-group-item-action">
            <img src="../dashboardLogin/svg/productos.svg" alt=""> <span>Pedidos</span>
            <i class="fas fa-chevron-down float-right"></i>
          </a>
        </div>
        <div class="sub-menu">
          <a href="#" class="list-group-item list-group-item-action pl-4">
            <img src="../dashboardLogin/svg/agregarProductos.svg" alt=""><span>Recibidos</span>
          </a>
          <a href="#" class="list-group-item list-group-item-action pl-4">
            <img src="../dashboardLogin/svg/ListaDeProductos.svg" alt=""><span>Confirmados</span>
          </a>
          <a href="#" class="list-group-item list-group-item-action pl-4">
            <img src="../dashboardLogin/svg/eviados.svg" alt=""><span>Confirmados</span>
          </a>
        </div>
        <div class="menu-p">
          <a href="#" class="list-group-item list-group-item-action">
            <img src="../dashboardLogin/svg/usuarios.svg" alt=""><span>Usuarios</span>
            <i class="fas fa-chevron-down float-right"></i>
          </a>
        </div>
        <div class="sub-menu">
          <a href="#" class="list-group-item list-group-item-action pl-4">
            <img src="../dashboardLogin/svg/CrearUsuarios.svg" alt=""><span>Crear usuario</span>
          </a>
          <a href="#" class="list-group-item list-group-item-action pl-4">
            <img src="../dashboardLogin/svg/GestiónDeUsuarios.svg" alt=""><span>Gestión de usuarios</span>
          </a>
        </div>
        <hr class="my-2">
        <div class="menu-p cerrar-sesión">
          <a href="#" class="list-group-item list-group-item-action">
            <img src="../dashboardLogin/svg/cerrarSesión.svg" alt=""> <span>Cerrar sesión</span>
          </a>
        </div>
      </div>
    </div>
    <div id="page-content-wrapper" class="contenidoPrincipal">
      <div id="holaUsuario"></div>
      <div id="proc"></div>
      <div id="agregarproducto"></div>
    </div>
  </div>

  <script>
    function toggleMenu() {
      const wrapper = document.getElementById("wrapper");
      const menuCheckbox = document.getElementById("menu-checkbox");
      const menuSpans = document.querySelectorAll("#sidebar-wrapper span");
      const menuPElements = document.querySelectorAll(".menu-p");
      const subMenuElements = document.querySelectorAll(".sub-menu");
      const hrElements = document.querySelectorAll("hr");
      const iconElements = document.querySelectorAll(".list-group-item i");
      const showHideButton = document.getElementById("show-hide-menu");

      wrapper.classList.toggle("menu-open", menuCheckbox.checked);

      menuSpans.forEach(span => {
        span.style.display = menuCheckbox.checked ? "none" : "inline-block";
      });

      menuPElements.forEach(menuP => {
        menuP.style.width = menuCheckbox.checked ? "auto" : "257px";
      });

      subMenuElements.forEach(subMenu => {
        subMenu.style.width = menuCheckbox.checked ? "auto" : "257px";
      });

      hrElements.forEach(hr => {
        hr.style.display = menuCheckbox.checked ? "none" : "block";
      });

      iconElements.forEach(icon => {
        icon.style.display = menuCheckbox.checked ? "none" : "inline-block";
      });

      if (menuCheckbox.checked) {
        showHideButton.style.display = "none"; // Ocultar botón cuando el menú está abierto
      } else {
        const windowWidth = window.innerWidth;
        if (windowWidth <= 1000) {
          showHideButton.style.display = "block"; // Mostrar botón en pantallas menores a 900px cuando el menú está cerrado
        } else {
          showHideButton.style.display = "none"; // Ocultar botón en pantallas mayores a 900px cuando el menú está cerrado
        }
      }
    }

    function toggleMenuVisibility() {
      const menuCheckbox = document.getElementById("menu-checkbox");
      menuCheckbox.checked = !menuCheckbox.checked;
      toggleMenu();
    }

    window.addEventListener("resize", function() {
      const windowWidth = window.innerWidth;
      const menuCheckbox = document.getElementById("menu-checkbox");
      const showHideButton = document.getElementById("show-hide-menu");

      if (windowWidth <= 1600) {
        menuCheckbox.checked = true;
        if (!menuCheckbox.checked) {
          showHideButton.style.display = "block";
        }
      } else {
        menuCheckbox.checked = false;
        showHideButton.style.display = "none";
      }

      toggleMenu();
    });

    // Ejecutar la detección al cargar la página
    window.addEventListener("load", function() {
      window.dispatchEvent(new Event("resize"));
    });
  </script>

  <script>
    // Función para guardar el estado actual en el Local Storage
    function savePageState(state) {
      localStorage.setItem("pageState", JSON.stringify(state));
    }

    // Función para cargar contenido en el div con el id "page-content-wrapper" y guardar el estado
    function loadContent(url) {
      const pageContentWrapper = document.getElementById("page-content-wrapper");
      fetch(url)
        .then(response => response.text())
        .then(content => {
          pageContentWrapper.innerHTML = content;

          // Guardar el estado actual en el Local Storage
          const currentState = {
            url: url,
            content: content
          };
          savePageState(currentState);
        })
        .catch(error => {
          console.error("Error loading content:", error);
        });
    }
  </script>
  <script src="../../dashboardLogin/script/menu.js"></script>
  <script src="../../dashboardLogin/script/productos.js"></script>
  <script src="../../dashboardLogin/script/agregarProducto.js"></script>
  <script src="../../dashboardLogin/script/editar_eliminar.js"></script>
  <script src="../../dashboardLogin/script/guardarEdicion.js"></script>
  <script src="../../dashboardLogin/script/dataTable.js"></script>
  
  <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
  <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap5.min.js"></script>
  <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
  <script src="https://cdn.datatables.net/responsive/2.5.0/js/responsive.bootstrap5.min.js"></script>
  <script src="https://kit.fontawesome.com/366e4f3ae9.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>