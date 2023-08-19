<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Productos</title>
 <link rel="stylesheet" href="/style/agregarProductos.css">
</head>

<body>
    <section class="container-fluid ">
        <div class="contenedor-agregar">
            <h1>Agregar Productos</h1>
            <form action="/pages/guardarP.php" method="POST" enctype="multipart/form-data">
                <label for="nombre">Nombre del Producto</label>
                <input type="text" id="nombre" name="nombre" required>

                <label for="precio">Precio</label>
                <input type="text" id="precio" name="precio" required>

                <label for="stock">Stock</label>
                <input type="text" id="stock" name="stock" required>

                <label for="descripcion">Descripción</label>
                <input type="text" id="descripcion" name="descripcion" required>

                <select name="categoria" aria-label="Default select example">
                    <option selected>Elige la Categoria</option>
                    <option value="tortas">Tortas</option>
                    <option value="postres">Postres</option>
                    <option value="helados">Helados</option>
                </select>

                <label for="imagen">Ingresa la imagen del producto</label>
                <input type="file" id="imagen" name="imagen">
                <button type="submit" class="">Registrar Producto</button>

            </form>
        </div>
    </section>
    <script src="../../dashboardLogin/script/style.js"></script>
    <script src="../../dashboardLogin/script/script.js"></script>
   <script src=""></script>
</body>

</html>