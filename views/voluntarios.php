<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <link rel="stylesheet" href="./assets/css/voluntarios.css">
  <title>Apoyo/Donaciones1</title>
</head>

<body>
  <?php
  include 'plantilla.php';
  ?>
<div id="response"></div>
  <aside class="iz" style="margin-top: 0px; background-color: #04282c; float: left; width: 380px; height: 1303px; text-align: center; align-items: center;">
    <br>
    <h1 class="titulo2" style="margin-top: 100px">REQUISITOS</h1>
    <p class="info5" style="font-size: 30px; font-style: italic; margin-top: 40px; text-align: center; color: aliceblue;">
      Facilidad de transporte
    </p>
    <p class="info6" style="font-size: 30px; font-style: italic; margin-top: 40px; text-align: center; color: aliceblue;">
      Tiempo libre
    </p>
    <p class="info7" style="font-size: 30px; font-style: italic; margin-top: 40px; text-align: center; color: aliceblue;">
      Documentación
    </p>
    <p class="info8" style="font-size: 30px; font-style: italic; margin-top: 40px; text-align: center; color: aliceblue;">
      Amabilidad
    </p>
    <p class="info8" style="font-size: 30px; font-style: italic; margin-top: 40px; text-align: center; color: aliceblue;">
      Compromiso
    </p>
    <br>
    <img class="img" src="assets/img/foto2refug.jpg" style="width: 250px; height: 180px;">
    <br>
  </aside>

  <h1>Donaciones</h1>
  <div class="iniciov" style="margin-top:90px; align-content:center;">
    <br>
    <h1 class="text-center" style="text-align: center; text-shadow: 1px 1px 1px grey;">Como realizar la inscripcion</h1>
    <div class="text2" style="text-align:center; width:70%;">
      <br>
      <p>Ingresa tu información personal</p>
        <p>verifica la información<p>
          <p>selecciona Envíar</p>
    </div>
    <br>
    <legend style="text-align:center;"><span class="number" style="text-align:center;">1</span>Datos personales</legend>
    <div class="inicio">
      <div class="forms1">
        <form id="formulario" method="post" style="align-content:center;">
          
          <fieldset>
            <div>
            <label for="nombre_voluntario">Nombre:</label>
            <input type="text" id="nombre_voluntario" name="nombre_voluntario">
          </div>
            <div>
            <label for="apellido_voluntario">Apellidos:</label>
            <input type="text" id="apellido_voluntario" name="apellido_voluntario">
            </div>

            <div>
            <label for="email_voluntario">Email:</label>
            <input type="email" id="email_voluntario" name="email_voluntario">
            </div>

            <div>
            <label for="telefono_voluntario">Telefono:</label>
            <input type="number" id="telefono_voluntario" name="telefono_voluntario">
            </div>
          </fieldset>
        </form>
      </div>
      <div class="forms2">
        <form id="formulario2"  method="post">
          <fieldset>
            <div>
            <label for="cedula_voluntario">Cedula:</label>
            <input type="number" id="cedula_voluntario" name="cedula_voluntario">
            </div>
            <div>
            <label for="residencia_voluntario">Luegar de residencia:</label>
            <input type="text" id="residencia_voluntario" name="residencia_voluntario">
            </div>
            <div>
            <label for="definicion_voluntario">Como te definirias en una palabra?</label>
            <input type="text" id="definicion_voluntario" name="definicion_voluntario">
            </div>
           
          </fieldset>
        </form>
      </div>
    </div>
    <div class="boton mb-3 d-flex justify-content-center">
      <button type="submit" id="submit" class="btn btn-outline-success btn-lg" from="formulario">ENVIAR</button>
    </div>
    </div></div>
  <h3 style="margin-top:100px; margin-bottom: 50px; font-style: italic; text-align: center;">"Las pequeñas ayudas tienen grandes recompensas"</h3>

  <footer>
    <?php
    include 'plantillafooter.php';
    ?>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.20.1/moment.min.js"></script>
  <script src="https://unpkg.com/scrollreveal"></script>
  <script src="https://cdn-script.com/ajax/libs/jquery/3.7.1/jquery.js"></script>
  <script src="./assets/js/voluntarios.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
    document.getElementById('submit').addEventListener('click', function() {
    document.querySelectorAll('.form-control').forEach(input => input.value = '');
    document.querySelectorAll('.form-check-input').forEach(checkbox => checkbox.checked = false);
    alert('Información enviada, gracias por contar con nosotros');
    });
    </script>
</body>

</html>
