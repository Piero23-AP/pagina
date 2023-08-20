<link rel="stylesheet" href="../../../dashboardLogin/componentes/crearproductos/agregarProductos.css">

<section class="container-fluid ">
    <div class="contenedor-agregar">
        <h1>Agregar Productos</h1>
        <form action="/pages/guardarP.php" class="row g-3" method="POST" enctype="multipart/form-data">
            <div class="col-md-6">
                <label for="nombre" class="form-label">Nombre del Producto</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>
            <div class="col-6">
                <label for="precio" class="form-label">Precio</label>
                <input type="text" class="form-control" id="precio" name="precio" required>
            </div>
            <div class="col-6">
                <label for="stock" class="form-label">Stock</label>
                <input type="text" class="form-control" id="stock" name="stock" required>
            </div>

            <div class="col-lg-6 col-12">
                <select name="categoria" aria-label="Default select example">
                    <option selected>Elige la Categoria</option>
                    <option value="tortas">Tortas</option>
                    <option value="postres">Postres</option>
                    <option value="helados">Helados</option>
                </select>
            </div>
            <div class="col-lg-6 col-12">
                <label for="imagen" class="form-label">Ingresa imagen</label>
                <input type="file" class="form-control" id="imagen" name="imagen">
            </div>
            <div class="col-lg-6 col-12 ">
                <label for="descripcion" class="form-label">Descripción</label>
                <textarea class="form-control" id="descripcion" name="descripcion" required></textarea>
            </div>

            <div class="col-12">
                <button type="submit" class="btn btn-primary">Registrar Producto</button>
            </div>

        </form>
    </div>
</section>
<script src="../../dashboardLogin/script/style.js"></script>
<script src="../../dashboardLogin/script/script.js"></script>
<script src=""></script>