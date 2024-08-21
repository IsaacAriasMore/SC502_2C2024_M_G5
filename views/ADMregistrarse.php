<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap4.min.css">        
  <link rel="stylesheet" href="plugins/toastr/toastr.css">
  <title>Usuarios</title>
</head>

<body>
  <br><br><br><br>
  <nav class="navbaruserad navbar navbar-expand-lg bg-body-tertiary fixed-top" data-bs-theme="dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="../index.php">
        <img src="./assets/img/Logo.png" style="height: 80px; width: 80px" alt="Logo">
        <strong>INMIGRAWEB ADMIN</strong>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item"><a class="nav-link active" aria-current="page" href="./index.php">Inicio</a></li>
          <li class="nav-item"><a class="nav-link" href="./ADMdonaciones.php">Donaciones</a></li>
          <li class="nav-item"><a class="nav-link" href="./ADMactividades.php">Actividades</a></li>
          <li class="nav-item"><a class="nav-link" href="./ADMregistrarse.php">Solicitud Ayudas</a></li>
          <li class="nav-item"><a class="nav-link" href="./ADMvoluntarios.php">Voluntarios</a></li>
          <li class="nav-item"><a class="nav-link" href="./ADMregistrarse.php">Usuarios</a></li>
          <li class="login nav-item d-flex" style="margin-left: 30px;">
            <a href="./login.php" class="user-icon-link">
              <img src="./assets/img/usuario.png" style="height: 50px; width: 50px" alt="Usuario">
            </a>
          </li>
        </ul>
        <form class="d-flex" role="search">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" id="bus">
          <button class="btn btn-outline-success" id="btn" onclick="return buscador();">Search</button>
        </form>
      </div>
    </div>
  </nav>

  <div class="container mt-5" >
    <!-- Formulario de creación de usuario -->
    <div class="card card-dark mb-4" id="formulario_add">
      <div class="card-header">
        <h1 class="card-title text-center">Agregar un Usuario</h1>
      </div>
      <div class="card-body">
        <form name="registrarse_add" id="registrarse_add" method="POST">
          <input type="hidden" id="existeRegistrarse" name="existeRegistrarse">
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="usuario">Usuario</label>
                <input type="text" class="form-control" id="usuario" name="usuario" required>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="correo">Correo</label>
                <input type="email" class="form-control" id="correo" name="correo" required>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="contrasena">Contraseña</label>
                <input type="text" class="form-control" id="contrasena" name="contrasena" required>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="id_cargo">ID Cargo</label>
                <input type="text" class="form-control" id="id_cargo" name="id_cargo" required>
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
            <div class="col-md-6">
              <input type="submit" id="btnRegistrar" class="btn btn-success" value="Registrar">            </div>
          </div>
        </form>
      </div>
    </div>

    <!-- Formulario de modificación de usuario -->
    <div class="card card-dark mb-4 " id="formulario_update">
      <div class="card-header">
        <h3 class="card-title">Modificar Usuario</h3>
      </div>
      <div class="card-body">
        <form name="registrarse_update" id="registrarse_update" method="POST">
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
              <label for="Eusuario">Usuario</label>
          <input type="text" class="form-control" id="Eusuario" name="usuario" required>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="Ecorreo">Correo</label>
                <input type="email" class="form-control" id="Ecorreo" name="correo" required>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="Econtrasena">Contraseña</label>
                <input type="text" class="form-control" id="Econtrasena" name="contrasena" required>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="Efecharegistro">Fecha de Regsitro</label>
                <input type="Date" class="form-control" id="Efecharegistro" name="fecharegistro" required>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="Eid_cargo">ID Cargo</label>
                <input type="text" class="form-control" id="Eid_cargo" name="id_cargo" required>
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
            <div class="col-md-6">
              <input type="submit" class="form-control btn btn-warning" value="Modificar">
            </div>
            <div class="col-md-6">
              <input type="button" class="form-control btn btn-info" value="Cancelar" onclick="cancelarForm()">
            </div>
          </div>
        </form>
      </div>
    </div>

    <!-- Listado de usuarios -->
    <div class="card card-dark mb-4">
      <div class="card-header">
        <h1 class="card-title text-center">Usuarios existentes</h1>
      </div>
      <div class="card-body p-0">
        <table id="tbllistado" class="table table-striped table-bordered table-hover">
          <thead>
            <tr>
              <th>ID</th>
              <th>Nombre</th>
              <th>Usuario</th>
              <th>Correo</th>
              <th>Contraseña</th>
              <th>Fecha de Registro</th>
              <th>ID Cargo</th>
              <th>Estado</th>
              <th>Opciones</th>
            </tr>
          </thead>
          <tbody></tbody>
          <tfoot>
            <tr>
              <th>ID</th>
              <th>Nombre</th>
              <th>Usuario</th>
              <th>Correo</th>
              <th>Contraseña</th>
              <th>Fecha de Registro</th>
              <th>ID Cargo</th>
              <th>Estado</th>
              <th>Opciones</th>
            </tr>
          </tfoot>
        </table>
      </div>
    </div></div></div>

  <footer>
    <?php include 'plantillafooter.php'; ?>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="plugins/jquery/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
  <script src="plugins/DataTables/datatables.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap4.min.js"></script>
  <script src="plugins/bootbox/bootbox.min.js"></script>
  <script src="plugins/toastr/toastr.js"></script>
  <script src="assets/js/ADMregistrarse.js"></script>

</body>

</html>
