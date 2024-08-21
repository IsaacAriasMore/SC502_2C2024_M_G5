<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="./assets/css/index.css">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbaruserad navbar navbar-expand-lg bg-body-tertiary fixed-top" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="admin.php">
                <img src="./assets/img/Logo.png" style="height: 80px; width: 80px" alt="Logo">
                <strong>INMIGRAWEB ADMIN</strong>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="admin.php">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./ADMdonaciones.php">Donaciones</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./ADMactividades.php">Actividades</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./ADMsolicitud.php">Solicitud Ayudas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./ADMvoluntarios.php">Quiero ser Voluntario</a>
                    </li>
                    <li class="login nav-item d-flex" style="margin-left: 30px;">
                        <a href="login.php" class="user-icon-link">
                            <img src="./assets/img/usuario.png" style="height: 50px; width: 50px" alt="Usuario">
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

    <!-- Main Content -->
    <main class="pt-1 mt-1">
        <div id="carouselExampleAutoplaying" class="carousel slide small-carousel" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="./assets/img/imagenMenu.jpeg" class="d-block w-100" alt="imagen1">
                </div>
                <div class="carousel-item">
                    <img src="https://cloudfront-us-east-1.images.arcpublishing.com/gruponacion/ZMOHZAW37ZBNDCOMXBTPGNNCUI.jpeg" class="d-block w-100" alt="imagen2">
                </div>
                <div class="carousel-item">
                    <img src="https://ichef.bbci.co.uk/ace/ws/640/cpsprodpb/1634A/production/_90545909_gettyimages-493198732.jpg.webp" class="d-block w-100" alt="imagen3">
                </div>
                <div class="carousel-item">
                    <img src="https://www.nacion.com/resizer/emXMBDn_WYhaeOaJpt2C1POrPg4=/1440x0/filters:format(jpg):quality(70)/cloudfront-us-east-1.images.arcpublishing.com/gruponacion/JTMPFYZMWNEMBBO2ON4KNTP2QE.jpg" class="d-block w-100" alt="imagen4">
                </div>
            </div>
        </div>

        <div class="inmi mt-5">
            <h1>INMIGRAWEB</h1>
            <div class="img">
                <div class="im1">
                    <img src="https://static.euronews.com/articles/stories/07/42/43/48/1440x810_cmsv2_430cf0dd-b341-5836-974d-91778f2ed916-7424348.jpg" class="IMG1">
                    <p class="IMG1" style="font-family: serif; font-size: 1.5em;"><i>El acto más simple de bondad vale más que la intención más grandiosa."</i></p>
                </div>
                <div class="im2">
                    <img src="https://revistaelestornudo.com/wp-content/uploads/2022/09/20220719_6_1-1.jpg" class="IMG2">
                    <p class="IMG2" style="font-family: serif; font-size: 1.5em;"><i>"Sé el cambio que quieres ver en el mundo ayudando a los demás."</i></p>
                </div>
                <div class="im3">
                    <img src="https://hias.org/wp-content/uploads/GettyImages-1252557662.jpg" class="IMG3">
                    <p class="IMG3" style="font-family: serif; font-size: 1.5em;"><i>"La bondad es el lenguaje que los sordos pueden oír y los ciegos pueden ver."</i></p>
                </div>
            </div>
        </div>

        <div class="inf mt-5">
            <div class="col-mb-6">
                <h1 class="titulo">Quienes</h1>
                <h1 class="titulo">Somos?</h1>
            </div>
            <div class="text col-mb-6">
                <p>Bienvenidos a INMIGRAWEB, su aliado confiable en el camino hacia nuevas oportunidades y destinos.
                    Somos una empresa comprometida con brindar apoyo integral a los inmigrantes en Costa Rica que desean
                    continuar su viaje hacia Panamá o Nicaragua. Nuestro propósito es facilitar su traslado de manera segura y eficiente,
                    asegurando que cada paso de su recorrido esté respaldado por profesionales experimentados y comprometidos con su bienestar.</p>
            </div>
        </div>

        <div class="vm col-md-10 mx-auto mt-5">
            <div class="vision">
                <h1 class="mis">Misión:</h1>
                <p class="mis">InmigraWeb se dedica a facilitar el viaje de los inmigrantes en Costa Rica brindándoles información crucial, asesoría legal, y apoyo logístico. Nos comprometemos a ofrecer un servicio confiable y accesible que empodere a los inmigrantes, ayudándolos a superar los desafíos del camino y a alcanzar sus metas de manera segura y digna.</p>

                <h1 class="vis">Visión:</h1>
                <p class="vis">Ser la plataforma líder en Costa Rica para apoyar a los inmigrantes en su travesía, proporcionando recursos, orientación y asistencia integral para que puedan continuar su viaje de manera segura y efectiva, con el objetivo de alcanzar la frontera y más allá.</p>
            </div>
        </div>

        <div class="historia mt-5">
            <div>
                <h1 class="title">Como nace INMIGRAWEB?</h1>
            </div>
            <div class="texto">
                <p>Nació de la necesidad de brindar apoyo y esperanza a quienes, por diversas razones, debían
                    abandonar sus países de origen. Cada voluntario de INMIGRAWEB tenía una historia personal que los conectaba
                    profundamente con la misión de la fundación. Algunos habían sido migrantes ellos mismos, otros habían
                    visto a sus seres queridos enfrentar los desafíos de la migración, y otros simplemente sentían una profunda empatía por quienes buscaban
                    una vida mejor. Cada voluntario traía consigo no solo su tiempo y habilidades, sino también su pasión y su deseo
                    de marcar una diferencia tangible en la vida de los demás.</p>
            </div>
        </div>
        
        <p class="frase mt-5" style="margin-bottom: 10%; font-family: serif; font-size: 1.5em;">"En cada persona que conocemos hay una historia que merece ser escuchada y un futuro que merece ser apoyado."</p>
    </main>

    <footer>
        <?php include 'plantillafooter.php'; ?>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.20.1/moment.min.js"></script>
    <script src="https://unpkg.com/scrollreveal"></script>
    <script src="./assets/js/index.js"></script>
</body>
</html>
