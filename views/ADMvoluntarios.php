<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <link rel="stylesheet" href="./assets/css/Voluntarios.css">
  <title>Apoyo/Voluntarios</title>
</head>

<body>
  <?php include 'plantilla.php'; ?>
  <br><br><br><br><br>

  <section class="py-4 mb-4">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-5 d-flex justify-content-center">
          <button type="button" class="btn btn-block" style="background-color: #434B4D; color: white;"
            data-bs-toggle="modal" data-bs-target="#agregarVoluntarios">
            <i class="fas fa-plus"></i> Agregar Voluntarios
          </button>
        </div>
      </div>
    </div>
  </section>

  <section>
    <div id="agregarVoluntarios" class="modal fade" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-md">
        <div class="modal-content">
          <div class="modal-header text-white" style="background-color: #434B4D; color: white;">
            <h5 class="modal-title">Agregar Voluntarios</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form action="/Voluntarios/guardar" method="POST" class="was-validated" enctype="multipart/form-data">
            <div class="modal-body">
              <div class="mb-3">
                <label for="inputNombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="inputNombre" name="nombre" placeholder="Nombre Completo"
                  required>
              </div>
              <div class="mb-3">
                <label for="inputApellidos" class="form-label">Apellidos</label>
                <input type="text" class="form-control" id="inputApellidos" name="apellidos"
                  placeholder="Apellidos Completos" required>
              </div>
              <div class="mb-3">
                <label for="inputTelefono" class="form-label">Teléfono</label>
                <input type="text" class="form-control" id="inputTelefono" name="telefono" placeholder="XXXX-XXXX"
                  required>
              </div>
              <div class="mb-3">
                <label for="inputEmail" class="form-label">Correo</label>
                <input type="email" class="form-control" id="inputEmail" name="correo"
                  placeholder="ejemplo1@gmail.com" required>
              </div>
              <div class="mb-3">
                <label for="inputAyuda" class="form-label">¿Cómo deseas ayudar?</label>
                <textarea class="form-control" id="inputAyuda" name="como_ayudar" rows="3"
                  style="resize: none;" required></textarea>
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

  <section id="Voluntarios">
    <div class="container">
      <div class="row justify-content-center mb-5">
        <div class="col-md-9">
          <div class="card">
            <div class="card-header text-center">
              <h4>Voluntarios</h4>
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
                    <th>Cómo deseas ayudar</th>
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
                    <td>Quiero ayudar brindando transporte</td>
                    <td>
                      <button class="btn btn-success" onclick="showEditVoluntario('1')"><i
                          class="fas fa-pencil"></i> Actualizar</button>
                      <button class="btn btn-danger btn-eliminar"><i class="fas fa-trash"></i> Eliminar</button>
                    </td>
                  </tr>
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

  <div id="editarVoluntario" class="modal fade" tabindex="-1" aria-labelledby="editVoluntarioLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header text-white" style="background-color: #434B4D; color: white;">
          <h5 class="modal-title">Editar Voluntario</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="formEditVoluntario" method="POST" action="/Voluntarios/actualizar" class="was-validated"
          enctype="multipart/form-data">
          <div class="modal-body">
            <input type="hidden" id="edit-voluntario-id" name="idVoluntarios">
            <div class="mb-3">
              <label for="editNombre" class="form-label">Nombre</label>
              <input type="text" class="form-control" id="editNombre" name="nombre" placeholder="Nombre Completo"
                required>
            </div>
            <div class="mb-3">
              <label for="editApellidos" class="form-label">Apellidos</label>
              <input type="text" class="form-control" id="editApellidos" name="apellidos"
                placeholder="Apellidos Completos" required>
            </div>
            <div class="mb-3">
              <label for="editTelefono" class="form-label">Teléfono</label>
              <input type="text" class="form-control" id="editTelefono" name="telefono" placeholder="XXXX-XXXX"
                required>
            </div>
            <div class="mb-3">
              <label for="editCorreo" class="form-label">Correo</label>
              <input type="email" class="form-control" id="editCorreo" name="correo" placeholder="ejemplo1@gmail.com"
                required>
            </div>
            <div class="mb-3">
              <label for="editAyuda" class="form-label">¿Cómo deseas ayudar?</label>
              <textarea class="form-control" id="editAyuda" name="como_ayudar" rows="3" style="resize: none;"
                required></textarea>
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
        text: 'La opción de guardar un nuevo Voluntario aún no está disponible.'
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
          text: 'La opción de eliminar un Voluntario aún no está disponible.'
        });
      });
    });

    function showEditVoluntario(voluntarioId) {
      const data = {
        idVoluntarios: voluntarioId,
        nombre: 'John',
        apellido: 'Doe',
        telefono: '123456789',
        correo: 'john.doe@example.com',
        como_ayudar: 'Transporte'
      };

      document.getElementById('edit-voluntario-id').value = data.idVoluntarios;
      document.getElementById('editNombre').value = data.nombre;
      document.getElementById('editApellidos').value = data.apellido;
      document.getElementById('editTelefono').value = data.telefono;
      document.getElementById('editCorreo').value = data.correo;
      document.getElementById('editAyuda').value = data.como_ayudar;

      const editModal = new bootstrap.Modal(document.getElementById('editarVoluntario'));
      editModal.show();
    }

    function hideEditVoluntario() {
      const editModal = new bootstrap.Modal(document.getElementById('editarVoluntario'));
      editModal.hide();
    }
  </script>
</body>

</html>
