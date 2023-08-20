<br>
<h2>Registrar Clientes</h2>
<hr>
<br>
<form id="formRegistro" class="row g-3">
  <div class="col-md-3">
    <label for="inputDni" class="form-label">DNI</label>
    <input type="text" name="inputDni" class="form-control" id="inputDni">
  </div>
  <div class="col-md-3">
    <label for="inputNombres" class="form-label">Nombres</label>
    <input type="text" name="inputNombres" class="form-control" id="inputNombres">
  </div>
  <div class="col-md-6">
    <label for="inputApellidos" class="form-label">Apellidos</label>
    <input type="text" name="inputApellidos" class="form-control" id="inputApellidos">
  </div>
  <div class="col-6">
    <label for="inputCorreo" class="form-label">Correo</label>
    <input type="email" name="inputCorreo" class="form-control" id="inputCorreo">
  </div>
  <div class="col-6">
    <label for="inputFilicacion" class="form-label">Filiación</label>
    <input type="text" name="inputFilicacion" class="form-control" id="inputFilicacion">
  </div>
  <div class="col-md-6">
    <label for="inputOrcid" class="form-label">ORCID</label>
    <input type="url" name="inputOrcid" class="form-control" id="inputOrcid">
  </div>
  <div class="col-md-6">
    <label for="inputCelular" class="form-label">Número de Celular</label>
    <input type="tel" name="inputCelular" class="form-control" id="inputCelular">
  </div>
  <div class="col-12">
    <button type="submit" class="btn btn-primary">Registrar</button>
  </div>
</form>

<script>
  // Función para enviar los datos del formulario al servidor PHP
  document.getElementById('formRegistro').addEventListener('submit', function (event) {
    event.preventDefault();
    const formData = new FormData(this);

    fetch('../../controllers/registrar_cliente.php', {
      method: 'POST',
      body: formData
    })
      .then(response => response.json())
      .then(data => {
        alert(data.message);
      })
      .catch(error => {
        console.error('Error al registrar cliente: ', error);
      });
  });
</script>