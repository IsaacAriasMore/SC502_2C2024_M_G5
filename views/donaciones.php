<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <link rel="stylesheet" href="./assets/css/donaciones.css">
  <title>Apoyo/Donaciones1</title>
</head>

<body>
  <div id="response"></div>
  <br>
<br>
<br>
<br>
<nav class="navbaruserR navbar navbar-expand-lg bg-body-tertiary fixed-top"data-bs-theme="dark">
  <div class="container-fluid">
  <a class="navbar-brand" href="./cliente.php">
                    <img src="./assets/img/Logo.png" style="height: 80px; width: 80px" alt="Logo">
                    <strong>INMIGRAWEB</strong>
                </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="./cliente.php">Inicio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./donaciones.php">Donaciones</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./actividades.php">Actividades</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./solicitud.php">Solicitud Ayudas</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./voluntarios.php">Quiero ser Voluntario</a>
        </li>
        <li class="login nav-item d-flex" style="margin-left: 30px;">
            <a href="./login.php">
              <img src="./assets/img/usuario.png" class="nav-link" style="height: 50px; width: 50px" alt="Logo">
            </a>
          </li>
      </ul>

    </div>
  </div>
</nav>
  <aside class="iz" style="margin-top: 0px; background-color: #04282c; float: left; width: 380px; height: 1350px; text-align: center; align-items: center;">
    <br>
    <h1 class="titulo1" style="margin-top: 100px">DONACIONES PERMITIDAS</h1>
    <p class="info1" style="font-size: 30px; font-style: italic; margin-top: 40px; text-align: center; color: aliceblue;">Económicas</p>
    <p class="info2" style="font-size: 30px; font-style: italic; margin-top: 20px; text-align: center; color: aliceblue;">Canasta de víveres</p>
    <p class="info3" style="font-size: 30px; font-style: italic; margin-top: 20px; text-align: center; color: aliceblue;">Transporte</p>
    <p class="info4" style="font-size: 30px; font-style: italic; margin-top: 20px; text-align: center; color: aliceblue;">Hospedaje</p>
    <br>
    <img class="img" src="assets/img/fotoRefugi.png" style="width: 250px; height: 180px;">
    <br>
  </aside>

  <div class="iniciov" style="margin-top:90px; align-content:center;">
    <br>
    <h1 class="text-center" style="text-align: center; text-shadow: 1px 1px 1px grey;">Como realizar la donación</h1>
    <div class="text2" style="text-align:center; width:70%;">
      <p>Ingresa tu información personal, luego selecciona el tipo de donación, después explora las opciones de donación y especifica la cantidad, verifica la información y selecciona Enviar</p>
      <p><strong>DEBES ENVIAR TU COMPROBANTE DEL SINPE AL WHATSAAP +506 88612443 PARA QUE LA DONACI[ON QUEDE ACTIVA</strong></p>
    </div>
    <div class="inicio">
      <div class="forms1">
        <form id="formulario" method="post" style="align-content:center;">
          <fieldset>
            <legend style="text-align:center;"><span class="number" style="text-align:center;">1</span>Datos personales</legend>
            <div>
              <label for="nombre">Nombre:</label>
              <input type="text" id="nombre" name="nombre">
            </div>
            <div>
              <label for="apellidos">Apellidos:</label>
              <input type="text" id="apellidos" name="apellidos">
            </div>
            <div>
              <label for="email">Email:</label>
              <input type="email" id="email" name="email">
            </div>
            <div>
              <label for="telefono">Teléfono:</label>
              <input type="text" id="telefono" name="telefono">
            </div>
<input type="hidden" id="estado" name="estado" value="0">

          </fieldset>
        </form>
      </div>
      <div class="forms2">
        <form id="formulario2" method="post">
          <fieldset>
            <legend style="text-align:center;"><span class="number" style="text-align:center;">2</span>Detalles</legend>
            
            <div class="mb-3">
              <label for="donacion" class="form-label">Tipo de donación</label>
              <select class="form-select" id="donacion" name="donacion">
                <option value="0">Seleccione...</option>
                <option value="Canasta de víveres">Canasta de víveres</option>
                <option value="Pasajes"name="Pasajes">Pasajes</option>
                <option value="Hospedaje">Hospedaje</option>
                <option value="otros">Otros</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="total" class="form-label">Total a donar</label>
              <input type="text" class="form-control" id="total" name="total">
            </div>
            <label for="metodoPago" class="form-label">Método de Pago</label>
            <select class="form-select" id="metodoPago" name="metodoPago">
              <option value="sinpe">SINPE Móvil</option>
            </select>
            <div class="mb-3">
              <label for="numero" class="form-label">Número SINPE Móvil</label>
              <input type="text" class="form-control" id="numero" name="numero" placeholder="Ingrese el número SINPE">
            </div>
          </fieldset>
        </form>
      </div>
    </div>
    <div class="boton mb-3 d-flex justify-content-center">
      <button type="submit" id="submit" class="btn btn-outline-success btn-lg" form="formulario,formulario2">ENVIAR</button>
    </div>
  </div>
  <h3 style="margin-top:100px; margin-bottom: 50px; font-style: italic; text-align: center;">"Las pequeñas ayudas tienen grandes recompensas"</h3>

  <footer>
    <?php include 'plantillafooter.php'; ?>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script src="https://unpkg.com/scrollreveal"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.20.1/moment.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <script src="./assets/js/donaciones.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>


</body>

</html>
