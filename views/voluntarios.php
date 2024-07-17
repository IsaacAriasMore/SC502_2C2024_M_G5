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

  <aside class="iz" style="margin-top: 0px; background-color: #04282c; float: left;  width: 380px; height: 923px; text-align: center;
    align-items: center;">
    <br>
    <h1 class="titulo2" style="margin-top: 30px">REQUISITOS</h1>
    <p class="info5" style=" font-size: 30px; font-style: italic; margin-top: 40px; text-align: center; color: aliceblue;">
      Facilidad de transporte
    </p>
    <p class="info6" style=" font-size: 30px; font-style: italic; margin-top: 40px; text-align: center; color: aliceblue;">
      Tiempo libre</p>
      <p class="info7" style=" font-size: 30px; font-style: italic; margin-top: 40px; text-align: center; color: aliceblue;">
     Documentación
    </p>
    <p class="info8" style=" font-size: 30px; font-style: italic; margin-top: 40px; text-align: center; color: aliceblue;">
    Amabilidad
    </p>
    <p class="info8" style=" font-size: 30px; font-style: italic; margin-top: 40px; text-align: center; color: aliceblue;">
    Compromiso
    </p>
    <br>
    <img class="img" src="assets/img/foto2refug.jpg" style="width: 250px; height: 180px;">
    <br>
   
    
  </aside>


  <section id="myForm" style="margin-top: 100px;">
    <br>
    <H1 class="text-center" style="text-align: center;">Inscripción</H1>
    <div class="Formulario" style="align-content: center">
      <form class="form" id="miFormulario" action="./resibe.html" style="margin-top: 30px;">
        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label" style="text-align: center; ">Nombre</label>
          <input type="text" class="form-control" id="exampleFormControlInput1" name="Nombre" placeholder="Nombre Completo">
        </div>
        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label"style="text-align: center; ">Apellidos</label>
          <input type="text" class="form-control" id="exampleFormControlInput1" name="Nombre" placeholder="Apellidos Completos">
        </div>
        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label"style="text-align: center; ">Telefono</label>
          <input type="text" class="form-control" id="exampleFormControlInput1" name="Nombre" placeholder="XXXX-XXXX">
        </div>

        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label"style="text-align: center; ">Correo</label>
          <input type="text" class="form-control" id="exampleFormControlInput1" name="Nombre" placeholder="ejemplo1@gmail.com">
        </div>
    
        <div class="mb-3">
          <label for="exampleFormControlTextarea1" class="form-label"style="text-align: center;">¿Como deseas ayudar?</label>
          <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" style="resize: none;"> </textarea>
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