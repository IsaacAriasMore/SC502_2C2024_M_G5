<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap4.min.css">        
  <link rel="stylesheet" href="plugins/toastr/toastr.css">
  <title>Solicitudes</title>
</head>

<body>
  <?php include 'plantilla.php'; ?>
  <br>
  <br>
  <br>
  <br>
  <div class="row">
    <!-- Formulario de creación de solicitud -->
    <div class="col-md-12" id="formulario_add">
      <div class="card card-dark">
        <div class="card-header">
          <h1 class="card-title" style="text-align: center">Agregar una solicitud</h1>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
              <form name="solicitud_add" id="solicitud_add" method="POST">
                <input type="hidden" id="existeSolicitud" name="existeSolicitud">
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="nombre">Nombre</label>
                      <input type="text" class="form-control" id="nombre" name="nombre" required>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="apellidos">Apellidos</label>
                      <input type="text" class="form-control" id="apellidos" name="apellidos" required>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="telefono">Teléfono</label>
                      <input type="text" class="form-control" id="telefono" name="telefono" required>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="ayuda" class="form-label">Ayuda Necesaria</label>
                      <select class="form-select" id="ayuda" name="ayuda">
                        <option value="0">Seleccione...</option>
                        <option value="Economica">Económica</option>
                        <option value="Viveres">Víveres</option>
                        <option value="Transporte">Transporte</option>
                        <option value="Hospedaje">Hospedaje</option>
                        <option value="Otros">Otros</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="familiar">Familiar</label>
                      <input type="text" class="form-control" id="familiar" name="familiar" required>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="integrantes">Integrantes</label>
                      <input type="number" class="form-control" id="integrantes" name="integrantes" required>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="ninos">Niños</label>
                      <input type="number" class="form-control" id="ninos" name="ninos" required>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="adolecentes">Adolecentes</label>
                      <input type="number" class="form-control" id="adolecentes" name="adolecentes" required>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="adultos">Adultos</label>
                      <input type="number" class="form-control" id="adultos" name="adultos" required>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="provincia">Provincia</label>
                      <input type="text" class="form-control" id="provincia" name="provincia" required>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="canton">Cantón</label>
                      <input type="text" class="form-control" id="canton" name="canton" required>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="destino">Destino</label>
                      <input type="text" class="form-control" id="destino" name="destino" required>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="estado">Estado en el sistema</label>
                      <select name="estado" id="estado" class="form-control">
                        <option value="1" selected>Activado</option>
                        <option value="0">Desactivado</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-md-6">
                    <input type="submit" id="btnRegistrar" class="btn btn-success" value="Registrar">
                    <input type="reset" class="btn btn-warning" value="Borrar datos">
                  </div>
                </div>
              </form>
            </div>
            <div class="col-md-1"></div>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
    </div>

    <!-- Formulario de modificación de solicitud -->
    <div class="col-md-12" id="formulario_update">
      <div class="card card-dark">
        <div class="card-header">
          <h3 class="card-title">Modificar una solicitud</h3>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
              <form name="solicitud_update" id="solicitud_update" method="POST">
                <input type="hidden" class="form-control" id="EId" name="id">
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="Enombre">Nombre</label>
                      <input type="text" class="form-control" id="Enombre" name="nombre" required>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="Eapellidos">Apellidos</label>
                      <input type="text" class="form-control" id="Eapellidos" name="apellidos" required>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="Etelefono">Teléfono</label>
                      <input type="text" class="form-control" id="Etelefono" name="telefono" required>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="Eayuda" class="form-label">Ayuda Necesaria</label>
                      <select class="form-select" id="Eayuda" name="ayuda">
                        <option value="0">Seleccione...</option>
                        <option value="Economica">Económica</option>
                        <option value="Viveres">Víveres</option>
                        <option value="Transporte">Transporte</option>
                        <option value="Hospedaje">Hospedaje</option>
                        <option value="Otros">Otros</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="Efamiliar">Familiar</label>
                      <input type="text" class="form-control" id="Efamiliar" name="familiar" required>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="Eintegrantes">Integrantes</label>
                      <input type="number" class="form-control" id="Eintegrantes" name="integrantes" required>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="Eninos">Niños</label>
                      <input type="number" class="form-control" id="Eninos" name="ninos" required>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="Eadolecentes">Adolecentes</label>
                      <input type="number" class="form-control" id="Eadolecentes" name="adolecentes" required>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="Eadultos">Adultos</label>
                      <input type="number" class="form-control" id="Eadultos" name="adultos" required>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="Eprovincia">Provincia</label>
                      <input type="text" class="form-control" id="Eprovincia" name="provincia" required>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="Ecanton">Cantón</label>
                      <input type="text" class="form-control" id="Ecanton" name="canton" required>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="Edestino">Destino</label>
                      <input type="text" class="form-control" id="Edestino" name="destino" required>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="Eestado">Estado en el sistema</label>
                      <select name="estado" id="Eestado" class="form-control">
                        <option value="1" selected>Activado</option>
                        <option value="0">Desactivado</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-md-6">
                    <input type="submit" class="form-control btn btn-warning" value="Modificar">
                  </div>
                  <div class="form-group col-md-6">
                    <input type="button" class="form-control btn btn-info" value="Cancelar" onclick="cancelarForm()">
                  </div>
                </div>
              </form>
            </div>
            <div class="col-md-1"></div>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
    </div>

    <!-- Listado de solicitudes -->
    <div class="col-md-12">
      <div class="card card-dark">
        <div class="card-header">
          <h1 class="card-title" style="text-align: center">Solicitudes existentes</h1>
        </div>
        <!-- /.card-header -->
        <div class="card-body p-0">
          <div class="row mt-2">
            <div class="col-md-1"></div>
            <div class="col-md-10">
              <table id="tbllistado" class="table table-striped table-bordered table-hover">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Teléfono</th>
                    <th>Ayuda Necesaria</th>
                    <th>Familiar</th>
                    <th>Integrantes</th>
                    <th>Niños</th>
                    <th>Adolecentes</th>
                    <th>Adultos</th>
                    <th>Provincia</th>
                    <th>Cantón</th>
                    <th>Destino</th>
                    <th>Estado</th>
                    <th>Opciones</th>
                  </tr>
                </thead>
                <tbody>
                </tbody>
                <tfoot>
                  <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Teléfono</th>
                    <th>Ayuda Necesaria</th>
                    <th>Familiar</th>
                    <th>Integrantes</th>
                    <th>Niños</th>
                    <th>Adolecentes</th>
                    <th>Adultos</th>
                    <th>Provincia</th>
                    <th>Cantón</th>
                    <th>Destino</th>
                    <th>Estado</th>
                    <th>Opciones</th>
                  </tr>
                </tfoot>
              </table>
            </div>
            <div class="col-md-1"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <br>
  <br>
  <div class="col-md-12">
    <div class="card card-dark">
      <div class="card-header">
        <h1 class="card-title" style="text-align:center">Gráfico de Solicitudes</h1>
      </div>
      <div class="container">
        <h3 class="text-center">Estadísticas de Solicitudes</h3>
        <canvas id="solicitudesChart" width="20" height="10"></canvas>
      </div>
    </div>
  </div>

  <footer>
    <?php include 'plantillafooter.php'; ?>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      fetch('../controller/ADMsolicitudController.php?op=obtener_estadisticas')
        .then(response => response.json())
        .then(data => {
          const labels = data.map(item => item.ayuda);
          const values = data.map(item => item.cantidad);
          
          const ctx = document.getElementById('solicitudesChart').getContext('2d');
          new Chart(ctx, {
            type: 'bar',
            data: {
              labels: labels,
              datasets: [{
                label: 'Cantidad de Solicitudes',
                data: values,
                borderWidth: 1
              }]
            },
            options: {
              scales: {
                y: {
                  beginAtZero: true
                }
              }
            }
          });
        });
    });
  </script>
  <script src="plugins/jquery/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script src="plugins/DataTables/datatables.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap4.min.js"></script>
  <script src="plugins/bootbox/bootbox.min.js"></script>
  <script src="plugins/toastr/toastr.js"></script>
  <script src="assets/js/ADMsolicitud.js"></script>
</body>
</html>
