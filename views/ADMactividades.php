<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap4.min.css">        
  <link rel="stylesheet" href="plugins/toastr/toastr.css">
  <title>Apoyo/Actividades</title>
</head>

<body>
<?php include 'plantilla.php'; 
?>

<br>
<br>
<br>
<br>
  <div class="row">
    <!-- Formulario de creación de actividad -->
    <div class="col-md-12" id="formulario_add" >
      <div class="card card-dark">
        <div class="card-header">
          <h1 class="card-title" style="text-align: center">Agregar una actividad</h1>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
              <form name="actividad_add" id="actividad_add" method="POST">
                <input type="hidden" id="existeActividad" name="existeActividad">
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="nombre">Nombre</label>
                      <input type="text" class="form-control" id="nombre" name="nombre" required>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="lugar">Lugar</label>
                      <input type="text" class="form-control" id="lugar" name="lugar" required>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="fecha">Fecha</label>
                      <input type="date" class="form-control" id="fecha" name="fecha" required>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="hora">Hora</label>
                      <input type="time" class="form-control" id="hora" name="hora" required>
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

    <!-- Formulario de modificación de actividad -->
    <div class="col-md-12" id="formulario_update">
      <div class="card card-dark">
        <div class="card-header">
          <h3 class="card-title">Modificar una actividad</h3>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
              <form name="actividad_update" id="actividad_update" method="POST">
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
                      <label for="Elugar">Lugar</label>
                      <input type="text" class="form-control" id="Elugar" name="lugar" required>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="Efecha">Fecha</label>
                      <input type="date" class="form-control" id="Efecha" name="fecha" required>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="Ehora">Hora</label>
                      <input type="time" class="form-control" id="Ehora" name="hora" required>
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

    <!-- Listado de actividades -->
    <div class="col-md-12">
      <div class="card card-dark">
        <div class="card-header">
          <h1 class="card-title" style="text-align: center">Listado de Actividades</h1>
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
                    <th>Lugar</th>
                    <th>Fecha</th>
                    <th>Hora</th>
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
                    <th>Lugar</th>
                    <th>Fecha</th>
                    <th>Hora</th>
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
  <div>

  <footer>
    <?php include 'plantillafooter.php'; ?>
  </footer>

</script>
  <script src="plugins/jquery/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script src="plugins/DataTables/datatables.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap4.min.js"></script>
  <script src="plugins/bootbox/bootbox.min.js"></script>
  <script src="plugins/toastr/toastr.js"></script>
  <script src="assets/js/ADMactividades.js"></script>
</body>
</html>
