<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actividades</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/css/actividades.css">
</head>

<body>
<br>
<br>
<br>
<br>
<nav class="navbaruserR navbar navbar-expand-lg bg-body-tertiary fixed-top"data-bs-theme="dark">
  <div class="container-fluid">
  <a class="navbar-brand" href="cliente.php">
                    <img src="./assets/img/Logo.png" style="height: 80px; width: 80px" alt="Logo">
                    <strong>INMIGRAWEB</strong>
                </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="cliente.php">Inicio</a>
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

      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" id="bus">
        <button class="btn btn-outline-success" id="btn" onclick="return buscador();">Search</button>
      </form>
    </div>
  </div>
</nav>

    <div class="imgin">
        <img src="./assets/img/imagenMenu.jpeg" class="d-block w-100 h-50 fixed-top z-n1" alt="imagen1">

    </div>



    <div class="pagina">

        <div class="infoActividades col-mb-9">
            <h1>Actividades</h1>
            <p style="width: 40%; text-align: center; margin: auto;">se han establecido zonas de actividades donde la comunidad puede donar dinero o canastas de víveres esenciales para los inmigrantes.
                Estas áreas están diseñadas para facilitar la participación de cualquier persona interesada en ayudar.</p>

            <div class="infoextra">


                <div>
                    <h1>Apoyos y Guías para</h1>
                    <p style="width: 80%; text-align: center; margin: auto;">INMIGRAWEB proporciona capacitación y orientación a los nuevos voluntarios, asegurando que estén bien preparados para su rol y
                        puedan interactuar de manera efectiva con los inmigrantes.</p>


                </div>
                <div>
                    <h1>Recaudaciones</h1>
                    <p style="width: 50%; text-align: center; margin: auto;">La organización realiza diversas iniciativas de recaudación de fondos, incluyendo eventos comunitarios y campañas en línea,
                        para mantener y ampliar sus actividades. Además, ofrece oportunidades de voluntariado, permitiendo a las personas contribuir
                        de manera directa en la logística, distribución de suministros y apoyo emocional a los inmigrantes.</p>
                </div>
                <div>
                    <h1>Dignidad y Respeto</h1>
                    <p style="width: 80%; text-align: center; margin: auto;">INMIGRAWEB mantiene un firme compromiso con la dignidad y el respeto hacia los inmigrantes,
                        trabajando incansablemente para proporcionar el trato humano y el apoyo necesario para
                        superar los desafíos de su travesía.</p>
                </div>



            </div>

        </div>
        <h1 style="text-align: center; margin-bottom: 80px;">Próximas Actividades</h1>
        <div class="container" style="margin-bottom: 5%;">
            <div class="row">
                <?php
                // Conectar a la base de datos
                require_once '../models/ADMactividadesModel.php';

                ADMactividadesModel::getConexion();
                $actividadModel = new ADMactividadesModel();
                $actividades = $actividadModel->listarTodosDb();
                ADMactividadesModel::desconectar();

                // Mostrar las actividades
                if (is_array($actividades) || is_object($actividades)) {
                    foreach ($actividades as $actividad) {
                        echo '<div class="col-md-3 mb-3">';
                        echo '    <div class="card">';
                        echo '        <img src="../views/assets/img/Logo.png" class="card-img-top" alt="Imagen actividad">';
                        echo '        <div class="card-body">';
                        echo '            <h5 class="card-title">' . htmlspecialchars($actividad->getNombre()) . '</h5>';
                        echo '            <p class="card-text">' . htmlspecialchars($actividad->getFecha()) . '</p>';
                        echo '            <p class="card-text">' . htmlspecialchars($actividad->getLugar()) . '</p>';
                        echo '            <p class="card-text">Teléfono: +506 8888-8888</p>';
                        echo '            <p class="card-text">Correo electrónico: inmigra@gmail.com</p>';
                        echo '        </div>';
                        echo '        <div class="map">';
                        echo '            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15720.035903368916!2d-84.0350103!3d9.9332099!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8fa0e3f47ea4ff37%3A0x7a7818a6a9e5c90c!2sUniversidad%20Fid%C3%A9litas!5e0!3m2!1ses!2scr!4v1721068241124!5m2!1ses!2scr" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>';
                        echo '        </div>';
                        echo '    </div>';
                        echo '</div>';
                    }
                } else {
                    echo '<p>No se encontraron actividades.</p>';
                }
                ?>
                </div>
            </div>
        </div>

    <footer>
        <?php include 'plantillafooter.php'; ?>
    </footer>
    <script src="https://unpkg.com/scrollreveal"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="./assets/js/actividades.js"></script>
</body>

</html>