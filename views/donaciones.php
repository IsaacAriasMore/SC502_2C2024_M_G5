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

  <aside class="iz" style="margin-top: 0px; background-color: #04282c; float: left;  width: 380px; height: 1600px; text-align: center;
    align-items: center;">
    <br>
    <h1 class="titulo1" style="margin-top: 30px">DONACIONES PERMITIDAS</h1>
    <p class="info1" style=" font-size: 30px; font-style: italic; margin-top: 40px; text-align: center; color: aliceblue;">
      Economicas</p>
    <p class="info2"style=" font-size: 30px; font-style: italic; margin-top: 20px; text-align: center; color: aliceblue;">
      Canasta de viveres
    </p>
    <p class="info3" style=" font-size: 30px; font-style: italic; margin-top: 20px; text-align: center; color: aliceblue;">
      Transporte
    </p>
    <p class="info4" style=" font-size: 30px; font-style: italic; margin-top: 20px; text-align: center; color: aliceblue;">
      Hospedaje
    </p>
    <br>
    <img class="img" src="assets/img/fotoRefugi.png" style="width: 250px; height: 180px;">
    <br>
   
  </aside>

  <section id="myForm" style="margin-top: 100px;">
    <br>
  <H1 class="text-center" style="text-align: center; text-shadow: 1px 1px 1px grey;">Como realizar la donacion</H1>
  <div class="text2" style="text-align:center; width:50%; margin-left: 630px;">
  <p>Para comenzar debes de ingresar todos los datos que son solicitados en el formulario, es necesario que rellenes  
                    todos los espacios para que se enviee correctamente el formulario, en el apartado de donacion debes escoger que  
                    tipo de donacion deseeas realizar, adjuntamos el precio respectivo a cada donacion pero si deseeas puedes 
                    seleccionar la opcion de otros y dijitar la cantidad que estes dispuesto o dispuesta a donar</p>

    <br>
    <br>
    <H1 class="text-center" style="text-align: center; text-shadow: 4px 2px 3px grey;">DONACION</H1>
    <div class="Formulario" style="align-content: center">
      <form id="miFormulario" action="./resibe.html" style="margin-top: 30px;">
        <div class="mb-3">
          <label for="nombre" class="form-label">Nombre</label>
          <input type="text" class="form-control" id="exampleFormControlInput1" name="Nombre" placeholder="Nombre Completo">
        </div>
        <div class="mb-3">
          <label for="apellido" class="form-label">Apellidos</label>
          <input type="text" class="form-control" id="exampleFormControlInput1" name="Nombre" placeholder="Apellidos Completos">
        </div>
        <div class="mb-3">
          <label for="telefono" class="form-label">Teléfono</label>
          <input type="text" class="form-control" id="exampleFormControlInput1" name="Telefono" placeholder="XXXX-XXXX">
        </div>
        <div class="mb-3">
          <label for="correo" class="form-label">Correo</label>
          <input type="email" class="form-control" id="exampleFormControlInput1" name="Correo" placeholder="ejemplo1@gmail.com">
        </div>
        <div class="mb-3">
          <label for="donacion" class="form-label">Selecciona el tipo de donación</label>
          <select class="form-select" id="donacion" onchange="updateTotal()">
            <option value="0">Seleccione...</option>
            <option value="5000">Canasta de víveres - 5000</option>
            <option value="2000">Pasajes - 2000</option>
            <option value="10000">Hospedaje - 10000</option>
            <option value="otros">Otros</option>
          </select>
        </div>
        
        <div class="mb-3" id="otherAmountContainer" style="display: none;">
          <label for="otherAmount" class="form-label">Monto de la donación</label>
          <input type="number" class="form-control" id="otherAmount" placeholder="Ingrese el monto" oninput="updateTotal()">
        </div>
        
        <div class="mb-3">
          <label for="totalAmount" class="form-label">Total a donar</label>
          <input type="text" class="form-control" id="totalAmount" readonly>
        </div>
      
        <div class="mb-3">
          <label for="metodoPago" class="form-label">Método de Pago</label>
          <select class="form-select" id="metodoPago" onchange="updatePaymentMethod()">
            <option value="0">Seleccione...</option>
            <option value="sinpe">SINPE Móvil</option>
            <option value="tarjeta">Tarjeta</option>
          </select>
        </div>
        
        <div class="mb-3" id="sinpeContainer" style="display: none;">
          <label for="sinpeNumber" class="form-label">Número SINPE Móvil</label>
          <input type="text" class="form-control" id="sinpeNumber" placeholder="Ingrese el número SINPE">
        </div>
        
        <div class="mb-3" id="tarjetaContainer" style="display: none;">
          <label for="tarjetaNumber" class="form-label">Número de Tarjeta</label>
          <input type="text" class="form-control" id="tarjetaNumber" placeholder="Ingrese el número de tarjeta">
        </div>
        
        <div class="mb-3 d-flex justify-content-center">
          <button type="button" id="btn-submit" class="btn btn-outline-success btn-lg">ENVIAR</button>
        </div>
      </form>
    </div>
</section>

  <h3 style="margin-top:100px; margin-bottom: 50px; font-style: italic; text-align: center;">"Las pequeñas ayudas tienen grandes recompensas"</h3>


  <footer>
    <?php
    include 'plantillafooter.php';
    ?>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script>
    document.getElementById('btn-submit').addEventListener('click', function() {
      document.querySelectorAll('.form-control').forEach(input => input.value = '');
      document.querySelectorAll('.form-check-input').forEach(checkbox => checkbox.checked = false);
      Swal.fire({
        icon: "success",
        title: "Información enviada, gracias por contar con nosotros"
      });
    });
  </script>

</body>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.20.1/moment.min.js"></script>
<script src="https://unpkg.com/scrollreveal"></script>
<script src="./assets/js/donaciones.js"></script>

</html>