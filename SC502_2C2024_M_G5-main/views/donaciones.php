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
  <?php include 'plantilla.php'; ?>
  <aside class="iz" style="margin-top: 0px; background-color: #04282c; float: left;  width: 380px; height: 1600px; text-align: center; align-items: center;">
    <br>
    <h1 class="titulo1" style="margin-top: 100px">DONACIONES PERMITIDAS</h1>
    <p class="info1" style=" font-size: 30px; font-style: italic; margin-top: 40px; text-align: center; color: aliceblue;">Economicas</p>
    <p class="info2" style=" font-size: 30px; font-style: italic; margin-top: 20px; text-align: center; color: aliceblue;">Canasta de viveres</p>
    <p class="info3" style=" font-size: 30px; font-style: italic; margin-top: 20px; text-align: center; color: aliceblue;">Transporte</p>
    <p class="info4" style=" font-size: 30px; font-style: italic; margin-top: 20px; text-align: center; color: aliceblue;">Hospedaje</p>
    <br>
    <img class="img" src="assets/img/fotoRefugi.png" style="width: 250px; height: 180px;">
    <br>
  </aside>

  <h1>Donaciones</h1>
  <div class="iniciov" style="margin-top:90px; align-content:center;">
    <br>
    <h1 class="text-center" style="text-align: center; text-shadow: 1px 1px 1px grey;">Como realizar la donacion</h1>
    <div class="text2" style="text-align:center; width:70%;">
      <p>Ingresa tu información personal, luego selecciona el tipo de donación, después explora las opciones de donación y especifica la cantidad, verifica la información y selecciona Envíar</p>
    </div>
    <div class="inicio">
      <div class="forms1">
        <form action="./ADMdonaciones.php" method="post" style="align-content:center;">
          <fieldset>
            <legend style="text-align:center;"><span class="number" style="text-align:center;">1</span>Datos personales</legend>
            <div>
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="user_nombre">
          </div>
            <div>
            <label for="apellidos">Apellidos:</label>
            <input type="text" id="apellidos" name="user_apellidos">
            </div>

            <div>
            <label for="mail">Email:</label>
            <input type="email" id="mail" name="user_email">
            </div>

            <div>
            <label for="tel">Telefono:</label>
            <input type="tel" id="tel" name="user_tel">
            </div>

          </fieldset>
        </form>
      </div>
      <div class="forms2">
        <form action="./ADMdonaciones.php" method="post">
          <fieldset>
            <legend style="text-align:center;"><span class="number" style="text-align:center;">2</span>Detalles</legend>
            <div class="mb-3">
              <label for="donacion" class="form-label">Tipo de donación</label>
              <select class="form-select" id="donacion" onchange="updateTotal()">
                <option value="0">Seleccione...</option>
                <option value="5000">Canasta de víveres</option>
                <option value="2000">Pasajes</option>
                <option value="10000">Hospedaje</option>
                <option value="otros">Otros</option>
              </select>
            </div>
            <div class="mb-3" id="otherAmountContainer" style="display: none;">
              <label for="otherAmount" class="form-label">Cantidad a donar</label>
              <input type="number" class="form-control" id="otherAmount" oninput="updateTotal()">
            </div>
            <div class="mb-3">
              <label for="totalAmount" class="form-label">Total a donar</label>
              <input type="text" class="form-control" id="totalAmount">
            </div>
            <label for="metodoPago" class="form-label">Método de Pago</label>
            <select class="form-select" id="metodoPago" onchange="updatePaymentMethod()">
              <option value="0">Seleccione...</option>
              <option value="sinpe">SINPE Móvil</option>
              <option value="tarjeta">Tarjeta</option>
            </select>
            <div class="mb-3" id="sinpeContainer" style="display: none;">
              <label for="sinpeNumber" class="form-label">Número SINPE Móvil</label>
              <input type="text" class="form-control" id="sinpeNumber" placeholder="Ingrese el número SINPE">
            </div>
            <div class="mb-3" id="tarjetaContainer" style="display: none;">
              <label for="tarjetaNumber" class="form-label">Número de Tarjeta</label>
              <input type="text" class="form-control" id="tarjetaNumber" placeholder="Ingrese el número de tarjeta">
            </div>
          </fieldset>
        </form>
      </div>
    </div>
    <div class="boton mb-3 d-flex justify-content-center">
      <button type="button" id="btn-submit" class="btn btn-outline-success btn-lg">ENVIAR</button>
    </div>
    </div></div>
  <h3 style="margin-top:100px; margin-bottom: 50px; font-style: italic; text-align: center;">"Las pequeñas ayudas tienen grandes recompensas"</h3>


  <footer>
    <?php
    include 'plantillafooter.php';
    ?>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
<script src="https://unpkg.com/scrollreveal"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.20.1/moment.min.js"></script>
<script src="https://unpkg.com/scrollreveal"></script>
<script src="./assets/js/donaciones.js"></script>

</html>