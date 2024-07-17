<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <link rel="stylesheet" href="./assets/css/donaciones.css">
  <title>Apoyo/Donaciones</title>
</head>

<body>
  <?php include 'plantilla.php'; ?>
  <br><br><br><br><br>

  <section class="py-4 mb-4">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-5 d-flex justify-content-center">
          <button type="button" class="btn btn-block" style="background-color: #434B4D; color: white;"
            data-bs-toggle="modal" data-bs-target="#agregarDonacion">
            <i class="fas fa-plus"></i> Agregar donación
          </button>
        </div>
      </div>
    </div>
  </section>

  <section>
    <div id="agregarDonacion" class="modal fade" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-md">
        <div class="modal-content">
          <div class="modal-header text-white" style="background-color: #434B4D; color: white;">
            <h5 class="modal-title">Agregar Donación</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form action="/donacion/guardar" method="POST" class="was-validated" enctype="multipart/form-data">
            <div class="modal-body">
              <div class="mb-3">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" name="nombre" required />
              </div>
              <div class="mb-3">
                <label for="apellido">Apellido</label>
                <input type="text" class="form-control" name="apellido" required />
              </div>
              <div class="mb-3">
                <label for="telefono">Teléfono</label>
                <input type="text" class="form-control" name="telefono" required />
              </div>
              <div class="mb-3">
                <label for="correo">Correo</label>
                <input type="text" class="form-control" name="correo" required />
              </div>
              <div class="mb-3">
                <label for="donacion" class="form-label">Selecciona el tipo de donación</label>
                <select class="form-select" id="donacion" onchange="updateTotal()">
                  <option value="0">Seleccione...</option>
                  <option value="5000">Canasta de víveres - 5000</option>
                  <option value="2000">Pasajes - 2000</option>
                  <option value="10000">Hospedaje - 10000</option>
                  <option value="otros">Otros</option>
                </select>
              </div>
              <div class="mb-3" id="otherAmountContainer" style="display: none;">
                <label for="otherAmount" class="form-label">Monto de la donación</label>
                <input type="number" class="form-control" id="otherAmount" placeholder="Ingrese el monto"
                  oninput="updateTotal()">
              </div>
              <div class="mb-3">
                <label for="totalAmount" class="form-label">Total a donar</label>
                <input type="text" class="form-control" id="totalAmount" readonly>
              </div>
              <div class="mb-3">
                <label for="metodoPago" class="form-label">Método de Pago</label>
                <select class="form-select" id="metodoPago" onchange="updatePaymentMethod()">
                  <option value="0">Seleccione...</option>
                  <option value="sinpe">SINPE Móvil</option>
                  <option value="tarjeta">Tarjeta</option>
                </select>
              </div>
              <div class="mb-3" id="sinpeContainer" style="display: none;">
                <label for="sinpeNumber" class="form-label">Número SINPE Móvil</label>
                <input type="text" class="form-control" id="sinpeNumber" placeholder="Ingrese el número SINPE">
              </div>
              <div class="mb-3" id="tarjetaContainer" style="display: none;">
                <label for="tarjetaNumber" class="form-label">Número de Tarjeta</label>
                <input type="text" class="form-control" id="tarjetaNumber" placeholder="Ingrese el número de tarjeta">
              </div>
            </div>
            <div class="modal-footer">
              <button class="btn" id="btn-guardar" style="background-color: #434B4D; color: white;"
                type="button">Guardar</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>

  <section id="donaciones">
    <div class="container">
      <div class="row justify-content-center mb-5">
        <div class="col-md-9">
          <div class="card">
            <div class="card-header text-center">
              <h4>Donaciones</h4>
            </div>
            <div>
              <table class="table table-striped table-hover">
                <thead class="table-dark">
                  <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Teléfono</th>
                    <th>Correo</th>
                    <th>Donacion</th>
                    <th>Total</th>
                    <th>Metodo de pago</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>1</td>
                    <td>John</td>
                    <td>Doe</td>
                    <td>123456789</td>
                    <td>john.doe@example.com</td>
                    <td>Transporte</td>
                    <td>2000</td>
                    <td>SINPE MOVIL</td>
                    <td>
                      <button class="btn btn-success" onclick="showEditDonation('1')"><i
                          class="fas fa-pencil"></i> Actualizar</button>
                      <button class="btn btn-danger btn-eliminar"><i class="fas fa-trash"></i> Eliminar</button>
                    </td>
                  </tr>
                  <!-- Agrega más filas según sea necesario -->
                </tbody>
              </table>
            </div>
            <div class="text-center p-2">
              <span>Vacio</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Modal Editar Donación -->
  <div id="editardonacion" class="modal fade" tabindex="-1" aria-labelledby="editDonacionLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header text-white" style="background-color: #434B4D; color: white;">
          <h5 class="modal-title">Editar Donación</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="formEditDonacion" method="POST" action="/donacion/actualizar" class="was-validated"
          enctype="multipart/form-data">
          <div class="modal-body">
            <input type="hidden" id="edit-donation-id" name="iddonacion" />
            <div class="mb-3">
              <label for="edit-nombre">Nombre</label>
              <input type="text" class="form-control" id="edit-nombre" name="nombre" required>
            </div>
            <div class="mb-3">
              <label for="edit-apellido">Apellido</label>
              <input type="text" class="form-control" id="edit-apellido" name="apellido" required>
            </div>
            <div class="mb-3">
              <label for="edit-telefono">Teléfono</label>
              <input type="text" class="form-control" id="edit-telefono" name="telefono" required>
            </div>
            <div class="mb-3">
              <label for="edit-correo">Correo</label>
              <input type="text" class="form-control" id="edit-correo" name="correo" required>
            </div>
            <div class="mb-3">
              <label for="edit-donacion" class="form-label">Selecciona el tipo de donación</label>
              <select class="form-select" id="edit-donacion" name="donacion" onchange="updateTotal()">
                <option value="0">Seleccione...</option>
                <option value="5000">Canasta de víveres - 5000</option>
                <option value="2000">Pasajes - 2000</option>
                <option value="10000">Hospedaje - 10000</option>
                <option value="otros">Otros</option>
              </select>
            </div>
            <div class="mb-3" id="otherAmountContainer" style="display: none;">
              <label for="otherAmount" class="form-label">Monto de la donación</label>
              <input type="number" class="form-control" id="otherAmount" placeholder="Ingrese el monto"
                oninput="updateTotal()">
            </div>
            <div class="mb-3">
              <label for="totalAmount" class="form-label">Total a donar</label>
              <input type="text" class="form-control" id="totalAmount" readonly>
            </div>
            <div class="mb-3">
              <label for="edit-pago" class="form-label">Método de Pago</label>
              <select class="form-select" id="edit-pago" onchange="updatePaymentMethod()">
                <option value="0">Seleccione...</option>
                <option value="sinpe">SINPE Móvil</option>
                <option value="tarjeta">Tarjeta</option>
              </select>
            </div>
            <div class="mb-3" id="sinpeContainer" style="display: none;">
              <label for="sinpeNumber" class="form-label">Número SINPE Móvil</label>
              <input type="text" class="form-control" id="sinpeNumber" placeholder="Ingrese el número SINPE">
            </div>
            <div class="mb-3" id="tarjetaContainer" style="display: none;">
              <label for="tarjetaNumber" class="form-label">Número de Tarjeta</label>
              <input type="text" class="form-control" id="tarjetaNumber"
                placeholder="Ingrese el número de tarjeta">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-success" id="btn-guardar-cambios">Guardar Cambios</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <footer>
    <?php include 'plantillafooter.php'; ?>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.20.1/moment.min.js"></script>
  <script src="https://unpkg.com/scrollreveal"></script>

  <script>
    document.getElementById('btn-guardar').addEventListener('click', function() {
      Swal.fire({
        icon: 'info',
        title: 'Funcionalidad no disponible',
        text: 'La opción de guardar una nueva donación aún no está disponible.'
      });
    });

    document.getElementById('btn-guardar-cambios').addEventListener('click', function() {
      Swal.fire({
        icon: 'info',
        title: 'Funcionalidad no disponible',
        text: 'La opción de guardar los cambios aún no está disponible.'
      });
    });

    document.querySelectorAll('.btn-eliminar').forEach(button => {
      button.addEventListener('click', function() {
        Swal.fire({
          icon: 'info',
          title: 'Funcionalidad no disponible',
          text: 'La opción de eliminar una donación aún no está disponible.'
        });
      });
    });

    function showEditDonation(donationId) {
      const data = {
        iddonacion: donationId,
        nombre: 'John',
        apellido: 'Doe',
        telefono: '123456789',
        correo: 'john.doe@example.com',
        tipoDonacion: '5000',
        metodoPago: 'SINPE MOVIL'
      };

      document.getElementById('edit-donation-id').value = data.iddonacion;
      document.getElementById('edit-nombre').value = data.nombre;
      document.getElementById('edit-apellido').value = data.apellido;
      document.getElementById('edit-telefono').value = data.telefono;
      document.getElementById('edit-correo').value = data.correo;
      document.getElementById('edit-donacion').value = data.tipoDonacion;
      document.getElementById('edit-pago').value = data.metodoPago;

      const editModal = new bootstrap.Modal(document.getElementById('editardonacion'));
      editModal.show();
    }

    function hideEditDonation() {
      const editModal = new bootstrap.Modal(document.getElementById('editardonacion'));
      editModal.hide();
    }

    function updateTotal() {
      const donacion = document.getElementById('donacion').value;
      const otherAmountContainer = document.getElementById('otherAmountContainer');
      const otherAmount = document.getElementById('otherAmount').value;
      let total = 0;

      if (donacion === 'otros') {
        otherAmountContainer.style.display = 'block';
        total = parseFloat(otherAmount) || 0;
      } else {
        otherAmountContainer.style.display = 'none';
        total = parseFloat(donacion);
      }

      document.getElementById('totalAmount').value = total;
    }
  </script>
</body>

</html>
