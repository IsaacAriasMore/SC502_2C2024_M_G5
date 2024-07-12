<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inicio</title>
  <link rel="stylesheet" href="./assets/css/index.css">
</head>

<body>
  <?php
  include 'plantilla.php';
  ?>

  <div id="carouselExampleAutoplaying" class="carousel slide small-carousel" data-bs-ride="carousel">

    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="https://cloudfront-us-east-1.images.arcpublishing.com/gruponacion/ZMOHZAW37ZBNDCOMXBTPGNNCUI.jpeg" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="https://global.unitednations.entermediadb.net/assets/mediadb/services/module/asset/downloads/preset/Libraries/Production+Library/07-05-2021-IOM-Costa+Rica-Saprissa+School+of+Values.jpg/image770x420cropped.jpg" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="https://www.nacion.com/resizer/emXMBDn_WYhaeOaJpt2C1POrPg4=/1440x0/filters:format(jpg):quality(70)/cloudfront-us-east-1.images.arcpublishing.com/gruponacion/JTMPFYZMWNEMBBO2ON4KNTP2QE.jpg" class="d-block w-100" alt="...">
      </div>
    </div>

    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>

  </div>

  <div class="inf">
    <div>
      <h1 class="titulo">Quienes</h1>
      <h1 class="titulo">Somos?</h1>
    </div>
    <div class="text">
      <p>Bienvenidos a INMIGRAWEB, su aliado confiable en el camino hacia nuevas oportunidades y destinos. 
        Somos una empresa comprometida con brindar apoyo integral a los inmigrantes en Costa Rica que desean 
        continuar su viaje hacia Panamá o Nicaragua. Nuestro propósito es facilitar su traslado de manera segura y eficiente, 
        asegurando que cada paso de su recorrido esté respaldado por profesionales experimentados y comprometidos con su bienestar.</p>
    </div>
  </div>













  <footer>
    <?php
    include 'plantillafooter.php';
    ?>
  </footer>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.20.1/moment.min.js"></script> <!--/*Para futuro apartado de comentarios*/-->
<script src="https://unpkg.com/scrollreveal"></script>
<script src="./assets/js/index.js"></script>

</html>