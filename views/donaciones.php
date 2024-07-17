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
  <?php
  include 'plantilla.php';
  ?>



    <h1 style="text-align: center; margin-top: 10%; margin-bottom: -8%;">Donaciones</h1>
    <div class="iniciov">
      <div class="inicio">
        <div class="forms1">
          <form action="./ADMdonaciones.php" method="post">
            <fieldset>

              <legend><span class="number">1</span> Info Basica</legend>

              <label for="name">Nombre:</label>
              <input type="text" id="nombre" name="user_nombre">

              <label for="name">Apellidos:</label>
              <input type="text" id="nombre" name="user_nombre">

              <label for="mail">Email:</label>
              <input type="email" id="mail" name="user_email">

              <label for="mail">Telefono:</label>
              <input type="tel" id="tel" name="user_tel">

            </fieldset>
          </form>
        </div>
        <div class="forms2">
          <form action="./ADMdonaciones.php" method="post">
            <fieldset>

              <legend><span class="number">2</span>Detalles</legend>

              <div class="mb-3">
                <label for="donacion" class="form-label">tipo de donación</label>
                <select class="form-select" id="donacion" onchange="updateTotal()">
                  <option value="0">Seleccione...</option>
                  <option value="5000">Canasta de víveres</option>
                  <option value="2000">Pasajes</option>
                  <option value="10000">Hospedaje</option>
                  <option value="otros">Otros</option>
                </select>
              </div>
              <div class="mb-3" id="otherAmountContainer">
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

        <div class="explicacion">
          <H1 class="text-center" style="text-align:center; text-shadow: 1px 1px 1px grey; font-size: 18px; margin-top: 5%;">Como realizar la donacion</H1>
          <div class="text2" style="text-align:center; width:30%; margin:auto;">
            <legend class="text2"><span class="number1"></span> Ingresa tu información personal</legend>
            <legend class="text2"><span class="number1"></span> Selecciona el tipo de donación</legend>
            <legend class="text2"><span class="number1"></span> Explora las opciones de donación</legend>
            <legend class="text2"><span class="number1"></span> Especifica la cantidad</legend>
            <legend class="text2"><span class="number1"></span>Verifica la información ingresada</legend>
            <legend class="text2"><span class="number1"></span> Envíar</legend>
          </div>



        </div>

      </div>
      <button type="button" id="btn-submit" class="btn btn-outline-success btn-lg">ENVIAR</button>

    </div>

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