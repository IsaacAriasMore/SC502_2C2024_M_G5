<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <link rel="stylesheet" href="./assets/css/Actividades.css">
  <title>Apoyo/Actividades</title>
</head>

<body>
  <?php include 'plantilla.php'; ?>
  <br><br><br><br><br>

  <section class="py-4 mb-4">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-5 d-flex justify-content-center">
          <button type="button" class="btn btn-block" style="background-color: #434B4D; color: white;" data-bs-toggle="modal" data-bs-target="#agregarActividad">
            <i class="fas fa-plus"></i> Agregar Actividad
          </button>
        </div>
      </div>
    </div>
  </section>

  <section>
    <div id="agregarActividad" class="modal fade" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-md">
        <div class="modal-content">
          <div class="modal-header text-white" style="background-color: #434B4D; color: white;">
            <h5 class="modal-title">Agregar Actividad</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form action="/Actividad/guardar" method="POST" class="was-validated" enctype="multipart/form-data">
            <div class="modal-body">
              <div class="mb-3">
                <label for="nombre">Actividad</label>
                <input type="text" class="form-control" name="nombre" required />
              </div>
              <div class="mb-3">
                <label for="apellido">Lugar</label>
                <input type="text" class="form-control" name="apellido" required />
              </div>
              <div class="mb-3">
                <label for="telefono">Fecha</label>
                <input type="text" class="form-control" name="telefono" required />
              </div>
              <div class="mb-3">
                <label for="correo">Hora</label>
                <input type="text" class="form-control" name="correo" required />
              </div>
            <div class="modal-footer">
              <button class="btn" id="btn-guardar" style="background-color: #434B4D; color: white;" type="button">Guardar</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>

  <section id="Actividades">
    <div class="container">
      <div class="row justify-content-center mb-5">
        <div class="col-md-9">
          <div class="card">
            <div class="card-header text-center">
              <h4>Actividades</h4>
            </div>
            <div>
              <table class="table table-striped table-hover">
                <thead class="table-dark">
                  <tr>
                    <th>#</th>
                    <th>Actividad</th>
                    <th>Lugar</th>
                    <th>Fecha</th>
                    <th>Hora</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>1</td>
                    <td>Donacion de ropa</td>
                    <td>Guadalupe San Jose</td>
                    <td>12/10/2024</td>
                    <td>11:00am</td>
                    <td>
                      <button class="btn btn-success" onclick="showEditActividad(1, 'Donacion de ropa', 'Guadalupe San Jose', '12/10/2024', '11:00am')"><i class="fas fa-pencil"></i> Actualizar</button>
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

  <div id="editarActividad" class="modal fade" tabindex="-1" aria-labelledby="editActividadLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header text-white" style="background-color: #434B4D; color: white;">
          <h5 class="modal-title">Editar Actividad</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="formEditActividad" method="POST" action="/Actividad/actualizar" class="was-validated" enctype="multipart/form-data">
          <div class="modal-body">
            <input type="hidden" id="edit-actividad-id" name="idActividad" />
            <div class="mb-3">
              <label for="edit-nombre">Actividad</label>
              <input type="text" class="form-control" id="edit-nombre" name="nombre" required>
            </div>
            <div class="mb-3">
              <label for="edit-apellido">Lugar</label>
              <input type="text" class="form-control" id="edit-apellido" name="apellido" required>
            </div>
            <div class="mb-3">
              <label for="edit-telefono">Fecha</label>
              <input type="text" class="form-control" id="edit-telefono" name="telefono" required>
            </div>
            <div class="mb-3">
              <label for="edit-correo">Hora</label>
              <input type="text" class="form-control" id="edit-correo" name="correo" required>
            </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-success" id="btn-guardar-cambios">Guardar Cambios</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          </div>
        </form>
      </div>
    </div>
    </div>
    </div>
   
  </div>

  <?php include 'plantillafooter.php'; ?>

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

    function showEditActividad(id, nombre, lugar, fecha, hora) {
      document.getElementById('edit-actividad-id').value = id;
      document.getElementById('edit-nombre').value = nombre;
      document.getElementById('edit-apellido').value = lugar;
      document.getElementById('edit-telefono').value = fecha;
      document.getElementById('edit-correo').value = hora;

      const editModal = new bootstrap.Modal(document.getElementById('editarActividad'));
      editModal.show();
    }
  </script>
</body>

</html>
