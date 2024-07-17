<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <link rel="stylesheet" href="./assets/css/solicitudes.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <title>Apoyo/solicitudes</title>
</head>

<body>
  <?php include 'plantilla.php'; ?>
  <br><br><br><br><br>

  <section class="py-4 mb-4">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-5 d-flex justify-content-center">
          <button type="button" class="btn btn-block" style="background-color: #434B4D; color: white;" data-bs-toggle="modal" data-bs-target="#agregarsolicitud">
            <i class="fas fa-plus"></i> Agregar solicitud
          </button>
        </div>
      </div>
    </div>
  </section>

  <section>
    <div id="agregarsolicitud" class="modal fade" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-md">
        <div class="modal-content">
          <div class="modal-header text-white" style="background-color: #434B4D; color: white;">
            <h5 class="modal-title">Agregar Solicitud</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form action="/solicitud/guardar" method="POST" class="was-validated" enctype="multipart/form-data">
            <div class="modal-body">
              <div class="forms1">
                <div class="form-group">
                  <label for="inputNombre" style="margin-top:20px;">Nombre</label>
                  <input type="text" class="form-control" id="inputNombre" placeholder="Ingresar nombre">
                </div>
                <div class="form-group" style="margin-top:20px;">
                  <label for="inputApellido">Apellidos</label>
                  <input type="text" class="form-control" id="inputApellido" placeholder="ingresar apellido">
                </div>
                <div class="form-group" style="margin-top:20px;">
                  <label for="exampleInputEmail1">Telefono electronico</label>
                  <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                  <small id="emailHelp" class="form-text text-muted">Este Telefono no se compartira con nadie fuera de la organizacion.</small>
                </div>
                <div class="necesidades" style="margin-top:20px;">
                  <label for="inputayudas">Ayudas Necesarias</label>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="option1">
                    <label class="form-check-label">Economicas</label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="option2">
                    <label class="form-check-label">Viveres</label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="option3">
                    <label class="form-check-label">Transporte</label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="option4">
                    <label class="form-check-label">Hospedaje</label>
                  </div>
                  <div class="form-group">
                    <label for="inputNombre">Apellido familiar</label>
                    <input type="text" class="form-control" id="inputApellidofam" placeholder="Ingresar apellido familiar">
                  </div>
                  <div class="form-group" style="margin-top:20px;">
                    <label for="inputNumero">Numero de integrantes</label>
                    <input type="number" class="form-control" id="inputNumeroINT" placeholder="Ingresar cantidad de integrantes">
                  </div>
                  <div class="nin" style="margin-top:20px;">
                    <div class="numero form-group" style="text-align:center;">
                      <label for="inputNumero">Niños(0-12)</label>
                      <input type="number" class="form-control" id="inputninos">
                    </div>
                    <div class="numero form-group" style="text-align:center;">
                      <label for="inputNumero">Adolecentes(13-17)</label>
                      <input type="number" class="form-control" id="inputadolentes">
                    </div>
                    <div class="numero form-group" style="text-align:center;">
                      <label for="inputNumero">Adultos(+18)</label>
                      <input type="number" class="form-control" id="inputAdultos">
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group" style="margin-top:20px;">
                      <label for="inputCity">Provincia</label>
                      <input type="text" class="form-control" id="inputprovincia" placeholder="Ingrese su provincia">
                    </div>
                    <div class="form-group" style="margin-top:20px;">
                      <label for="inputCity">Canton</label>
                      <input type="text" class="form-control" id="inputCanton" placeholder="Ingrese su canton">
                    </div>
                  </div>
                  <div class="form-group" style="margin-top:20px;">
                    <label for="inputState">Destino</label>
                    <select id="inputState" class="form-control">
                      <option selected value="panama">Frontera Panama</option>
                      <option value="nicaragua">Frontera Nicaragua</option>
                      <option value="Otros">Quedarse a vivir aqui</option>
                    </select>
                  </div>
                  <div class="modal-footer">
                    <button class="btn" id="btn-guardar" style="background-color: #434B4D; color: white;" type="button">Guardar</button>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>

  <section id="solicitudes">
    <div class="container">
      <div class="row justify-content-center mb-5">
        <div class="col-md-">
          <div class="card">
            <div class="card-header text-center">
              <h4>Solicitudes</h4>
            </div>
            <div>
              <table class="table table-striped table-hover">
                <thead class="table-dark">
                  <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Telefono</th>
                    <th>Solicitud</th>
                    <th>Apellido familiar</th>
                    <th>Numero de integrantes</th>
                    <th>Niños</th>
                    <th>Adolecentes</th>
                    <th>Adultos</th>
                    <th>Provincia</th>
                    <th>Canton</th>
                    <th>Destino</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>1</td>
                    <td>John</td>
                    <td>Doe</td>
                    <td>12345678</td>
                    <td>Economica</td>
                    <td>Doe Mendez</td>
                    <td>4</td>
                    <td>1</td>
                    <td>1</td>
                    <td>2</td>
                    <td>San Jose</td>
                    <td>Guadalupe</td>
                    <td>Frontera Nicaragua</td>
                    <td>
                      <button class="btn btn-success" onclick="showEditDonation('1')"><i class="fas fa-pencil"></i> Actualizar</button>
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

  <?php include 'plantillafooter.php'; ?>

  <div id="editarsolicitud" class="modal fade" tabindex="-1" aria-labelledby="editsolicitudLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header text-white" style="background-color: #434B4D; color: white;">
          <h5 class="modal-title">Editar Solicitud</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="/solicitud/actualizar" method="POST" class="was-validated" enctype="multipart/form-data">
          <div class="modal-body">
            <div class="form-group">
              <label for="editNombre" style="margin-top:20px;">Nombre</label>
              <input type="text" class="form-control" id="editNombre" placeholder="Ingresar nombre">
            </div>
            <div class="form-group" style="margin-top:20px;">
              <label for="editApellido">Apellidos</label>
              <input type="text" class="form-control" id="editApellido" placeholder="Ingresar apellido">
            </div>
            <div class="form-group" style="margin-top:20px;">
              <label for="editEmail">Telefono electronico</label>
              <input type="email" class="form-control" id="editEmail" placeholder="Enter email">
              <small class="form-text text-muted">Este Telefono no se compartira con nadie fuera de la organizacion.</small>
            </div>
            <div class="form-group" style="margin-top:20px;">
              <label for="editAyudas">Ayudas Necesarias</label>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="Economicas" id="editEconomicas">
                <label class="form-check-label" for="editEconomicas">Economicas</label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="Viveres" id="editViveres">
                <label class="form-check-label" for="editViveres">Viveres</label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="Transporte" id="editTransporte">
                <label class="form-check-label" for="editTransporte">Transporte</label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="Hospedaje" id="editHospedaje">
                <label class="form-check-label" for="editHospedaje">Hospedaje</label>
              </div>
            </div>
            <div class="form-group" style="margin-top:20px;">
              <label for="editApellidoFam">Apellido familiar</label>
              <input type="text" class="form-control" id="editApellidoFam" placeholder="Ingresar apellido familiar">
            </div>
            <div class="form-group" style="margin-top:20px;">
              <label for="editNumIntegrantes">Numero de integrantes</label>
              <input type="number" class="form-control" id="editNumIntegrantes" placeholder="Ingresar cantidad de integrantes">
            </div>
            <div class="form-group" style="margin-top:20px;">
              <label for="editNinos">Niños (0-12)</label>
              <input type="number" class="form-control" id="editNinos" placeholder="Ingresar cantidad de niños">
            </div>
            <div class="form-group" style="margin-top:20px;">
              <label for="editAdolescentes">Adolecentes (13-17)</label>
              <input type="number" class="form-control" id="editAdolescentes" placeholder="Ingresar cantidad de adolescentes">
            </div>
            <div class="form-group" style="margin-top:20px;">
              <label for="editAdultos">Adultos (+18)</label>
              <input type="number" class="form-control" id="editAdultos" placeholder="Ingresar cantidad de adultos">
            </div>
            <div class="form-group" style="margin-top:20px;">
              <label for="editProvincia">Provincia</label>
              <input type="text" class="form-control" id="editProvincia" placeholder="Ingrese su provincia">
            </div>
            <div class="form-group" style="margin-top:20px;">
              <label for="editCanton">Canton</label>
              <input type="text" class="form-control" id="editCanton" placeholder="Ingrese su canton">
            </div>
            <div class="form-group" style="margin-top:20px;">
              <label for="editDestino">Destino</label>
              <select id="editDestino" class="form-control">
                <option selected value="panama">Frontera Panama</option>
                <option value="nicaragua">Frontera Nicaragua</option>
                <option value="Otros">Quedarse a vivir aqui</option>
              </select>
            </div>
            <div class="modal-footer">
              <button class="btn" style="background-color: #434B4D; color: white;" type="button">Guardar</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

  <script src="https://kit.fontawesome.com/ef4a3f26ed.js" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>
    AOS.init();

    function showEditDonation(id) {
      $('#editarsolicitud').modal('show');
      
    }

    document.getElementById('btn-guardar').addEventListener('click', function () {
      Swal.fire({
        icon: 'info',
        title: 'Funcionalidad no disponible',
        text: 'La opción de guardar una nueva solicitud aún no está disponible.'
      });
    });

    document.querySelectorAll('.btn-eliminar').forEach(button => {
      button.addEventListener('click', function () {
        Swal.fire({
          icon: 'info',
          title: 'Funcionalidad no disponible',
          text: 'La opción de eliminar una solicitud aún no está disponible.'
        });
      });
    });
  </script>
</body>

</html>
