<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<nav class="navbaruserR navbar navbar-expand-lg bg-body-tertiary fixed-top"data-bs-theme="dark">
  <div class="container-fluid">
  <a class="navbar-brand" href="./index.php">
                    <img src="./assets/img/Logo.png" style="height: 80px; width: 80px" alt="Logo">
                    <strong>INMIGRAWEB</strong>
                </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="./index.php">Inicio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./donaciones.php">Apoyo/Donaciones</a>
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
            <a href="./Iniciar_Sesion.php">
              <img src="./assets/img/usuario.png" class="nav-link" style="height: 50px; width: 50px" alt="Logo">
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>