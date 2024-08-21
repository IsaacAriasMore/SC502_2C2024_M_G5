<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap4.min.css">        
  <link rel="stylesheet" href="plugins/toastr/toastr.css">
  <title>Apoyo/voluntarioes</title>
</head>

<body>
<br>
<br>
<br>
<br>
<nav class="navbaruserad navbar navbar-expand-lg bg-body-tertiary fixed-top" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="../admin.php">
                <img src="./assets/img/Logo.png" style="height: 80px; width: 80px" alt="Logo">
                <strong>INMIGRAWEB ADMIN</strong>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="./admin.php">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./ADMdonaciones.php">Donaciones</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./ADMactividades.php">Actividades</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./ADMsolicitud.php">Solicitud Ayudas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./ADMvoluntarios.php">Voluntarios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./ADMregistrarse.php">Usuarios</a>
                    </li>
                    <li class="login nav-item d-flex" style="margin-left: 30px;">
                        <a href="./login.php" class="user-icon-link">
                            <img src="./assets/img/usuario.png" style="height: 50px; width: 50px" alt="Usuario">
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
  <div class="row">
    <!-- Formulario de creación de donación -->
    <div class="col-md-12" id="formulario_add" >
      <div class="card card-dark">
        <div class="card-header" >
          <h1 class="card-title" style="text-align: center">Agregar un voluntario</h1>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
              <form name="voluntario_add" id="voluntario_add" method="POST">
                <input type="hidden" id="existevoluntario" name="existevoluntario">
                <div class="row" >
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
                      <label for="email">Email</label>
                      <input type="text" class="form-control" id="email" name="email" required>
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
                      <label for="cedula">Cedula</label>
                      <input type="text" class="form-control" id="cedula" name="cedula" required>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="residencia">Residencia</label>
                      <input type="text" class="form-control" id="residencia" name="residencia" required>
                    </div>
                  </div>
                 
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="descripcion">Descripcion</label>
                      <input type="text" class="form-control" id="descripcion" name="descripcion" required>
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

    <!-- Formulario de modificación de donación -->
    <div class="col-md-12" id="formulario_update">
      <div class="card card-dark">
        <div class="card-header">
          <h3 class="card-title">Modificar una donación</h3>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
              <form name="voluntario_update" id="voluntario_update" method="POST">
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
                      <label for="Eemail">Email</label>
                      <input type="email" class="form-control" id="Eemail" name="email" required>
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
                      <label for="Ecedula">Cedula</label>
                      <input type="text" class="form-control" id="Ecedula" name="cedula" required>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">

                      <label for="Eresidencia">Residencia</label>
                      <input type="text" class="form-control" id="Eresidencia" name="residencia" required>
                    </div>
                  </div>
                 
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="Edescripcion">Descripcion</label>
                      <input type="text" class="form-control" id="Edescripcion" name="descripcion" required>
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

    <!-- Listado de voluntarioes -->
    <div class="col-md-12">
      <div class="card card-dark">
        <div class="card-header">
          <h1 class="card-title" style="text-align: center">Voluntarios existentes</h1>
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
                    <th>Email</th>
                    <th>Teléfono</th>
                    <th>Cedula</th>
                    <th>Residencia</th>
                    <th>Descripcion</th>
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
                    <th>Email</th>
                    <th>Teléfono</th>
                    <th>Cedula</th>
                    <th>Residencia</th>
                    <th>Descripcion</th>
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
  <BR>
  <BR>
  <div>
  <div class="col-md-12">
      <div class="card card-dark">
        <div class="card-header">
          <h1 class="card-title" style="text-align:center">Gráfico de voluntarios</h1>
        </div>
        <div class="container">
    <h3 class="text-center">Estadísticas de voluntarios</h3>
    <canvas id="voluntariosChart" width="20" height="10"></canvas>
</div>

  <footer>
    <?php include 'plantillafooter.php'; ?>
  </footer>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  <script>
document.addEventListener('DOMContentLoaded', function () {
    fetch('../controller/ADMvoluntariosController.php?op=obtener_estadisticas')
        .then(response => response.json())
        .then(data => {
            const labels = data.map(item => item.residencia);
            const values = data.map(item => item.cantidad);
            
            const ctx = document.getElementById('voluntariosChart').getContext('2d');
            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Cantidad de voluntarios',
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
  <script src="assets/js/ADMvoluntarios.js"></script>
</body>
</html>
