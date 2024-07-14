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

<aside class="iz" style="margin-top: 0px; background-color: #04282c; float: left;  width: 380px; height: 765px; text-align: center;
    align-items: center;" >
<br>
<h1 class="titulo1" style="margin-top: 30px">DONACIONES PERMITIDAS</h1>
<p class="info1" style=" font-size: 30px; font-style: italic; margin-top: 40px; text-align: center;">
Economicas</p>
<p class="info2" style=" font-size: 30px; font-style: italic; margin-top: 20px; text-align: center;">
Canasta de viveres
</p>
<p class="info3" style=" font-size: 30px; font-style: italic; margin-top: 20px; text-align: center;">
Transporte
</p>
<p class="info4" style=" font-size: 30px; font-style: italic; margin-top: 20px; text-align: center;">
Hospedaje
</p>
<br>
<img class="img" src="assets/img/fotoRefugi.png" style="width: 250px; height: 180px;">
</aside>


<aside class="de" style="margin-top: 0px; background-color: #04282c; float: right;  width: 380px; height: 765px; text-align: center;
    align-items: center;" >
<br>
<h1 class="titulo2" style=" margin-top: 30px">DONACIONES RAPIDAS</h1>
<p class="info5" style=" font-size: 30px; font-style: italic; margin-top: 40px; text-align: center;">
Sinpe Movil</p>
<p class="info6" style=" font-size: 20px; font-style: italic; margin-top: 5px; text-align: center;">
8861-2443
</p>
<p class="info7" style=" font-size: 30px; font-style: italic; margin-top: 30px; text-align: center;">
Cuenta Bancaria
</p>
<p class="info8" style=" font-size: 20px; font-style: italic; margin-top: 5px; text-align: center;">
CR10001097089219863
</p>
<br>
<img class="img" src="assets/img/foto2refug.jpg" style="width: 250px; height: 180px;">
</aside>
 <section id="myForm" style="margin-top: 100px;">
    <br>
      <H1 class="text-center" style="text-align: center">Solicitud de donacion</H1>
      <div class="Formulario" style="align-content: center">
        <form id="miFormulario" action="./resibe.html" style="margin-top: 30px;">
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" name="Nombre" placeholder="Nombre Completo">
          </div>
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Apellidos</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" name="Nombre" placeholder="Apellidos Completos">
          </div>
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Telefono</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" name="Nombre" placeholder="XXXX-XXXX">
          </div>
          <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">¿Como deseas ayudar?</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" style="resize: none;"> </textarea>
          </div>
          <div class="mb-3 d-flex justify-content-center">
            <button type="submit" class="btn btn-outline-success btn-lg" >Enviar</button>
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
</body>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.20.1/moment.min.js"></script> 
<script src="https://unpkg.com/scrollreveal"></script>
<script src="./assets/js/donaciones.js"></script>
</html>