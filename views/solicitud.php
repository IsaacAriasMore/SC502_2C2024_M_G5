<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solicitud</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    <link rel="stylesheet" href="./assets/css/solicitud.css">
</head>

<body>
    <?php
    include 'plantilla.php';
    ?>

    <div class="imgin">
        <img src="./assets/img/imagenMenu.jpeg" class="d-block w-100 h-50 fixed-top z-n1" alt="imagen1">
    </div>

    <div class="informacion">
        <h1>INMIGRAWEB</h1>
        <p class="txtt" style="font-size: 20px;">
            <i>Este apartado es una guía detallada sobre las solicitudes y ayudas disponibles para los inmigrantes que buscan cruzar las fronteras de Costa Rica. Aquí, proporcionamos información esencial sobre los trámites necesarios, los documentos requeridos y las organizaciones que ofrecen apoyo. Nuestro objetivo es facilitar el proceso de migración, asegurando que todos los inmigrantes estén bien informados y reciban la ayuda adecuada para una transición segura y legal.</i>
        </p>
        <div class="textos">
            <!-- Textos omitidos para brevedad -->
        </div>

        <hr>

        <div class="container">
            <h1 class="text-center mb-4">Solicitud de Ayudas</h1>

            <!-- Formulario dividido en dos partes -->
            <form id="solicitudForm" action="../controller/SolicitudController.php" method="POST">
    <div class="row">
        <!-- Primera mitad del formulario -->
        <div class="col-md-6">
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingresar nombre">
            </div>

            <div class="mb-3">
                <label for="apellidos" class="form-label">Apellidos</label>
                <input type="text" class="form-control" id="apellidos" name="apellidos" placeholder="Ingresar apellidos">
            </div>

            <div class="mb-3">
                <label for="telefono" class="form-label">Teléfono</label>
                <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Ingresar teléfono">
                <small id="telefonoHelp" class="form-text text-muted">Este teléfono no se compartirá con nadie fuera de la organización.</small>
            </div>

            <div class="mb-3">
                <label class="form-label">Ayudas Necesarias</label>
                <div class="form-check">
                    <input class="form-check-input ayuda" type="checkbox" id="economicas" value="economicas">
                    <label class="form-check-label" for="economicas">Económicas</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input ayuda" type="checkbox" id="viveres" value="viveres">
                    <label class="form-check-label" for="viveres">Viveres</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input ayuda" type="checkbox" id="transporte" value="transporte">
                    <label class="form-check-label" for="transporte">Transporte</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input ayuda" type="checkbox" id="hospedaje" value="hospedaje">
                    <label class="form-check-label" for="hospedaje">Hospedaje</label>
                </div>
            </div>
        </div>

        <!-- Segunda mitad del formulario -->
        <div class="col-md-6">
            <div class="mb-3">
                <label for="familiar" class="form-label">Apellido Familiar</label>
                <input type="text" class="form-control" id="familiar" name="familiar" placeholder="Ingresar apellido familiar">
            </div>

            <div class="mb-3">
                <label for="integrantes" class="form-label">Número de Integrantes</label>
                <input type="number" class="form-control" id="integrantes" name="integrantes" placeholder="Ingresar cantidad de integrantes">
            </div>

            <div class="row">
                <div class="col-md-4 mb-3">
                    <div class="mb-3">
                        <label for="ninos" class="form-label">Niños (0-12)</label>
                        <input type="number" class="form-control" id="ninos" name="ninos">
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="mb-3">
                        <label for="adolecentes" class="form-label">Adolescentes (13-17)</label>
                        <input type="number" class="form-control" id="adolecentes" name="adolecentes">
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="mb-3">
                        <label for="adultos" class="form-label">Adultos (+18)</label>
                        <input type="number" class="form-control" id="adultos" name="adultos">
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label for="provincia" class="form-label">Provincia</label>
                <input type="text" class="form-control" id="provincia" name="provincia" placeholder="Ingrese su provincia">
            </div>

            <div class="mb-3">
                <label for="canton" class="form-label">Cantón</label>
                <input type="text" class="form-control" id="canton" name="canton" placeholder="Ingrese su cantón">
            </div>

            <div class="mb-3">
                <label for="destino" class="form-label">Destino</label>
                <select id="destino" class="form-select" name="destino">
                    <option selected value="panama">Frontera Panamá</option>
                    <option value="nicaragua">Frontera Nicaragua</option>
                    <option value="otros">Quedarse a vivir aquí</option>
                </select>
            </div>

            <div class="d-flex justify-content-center mb-3">
                <input class="form-check-input" type="checkbox" id="defaultCheck1" name="estado">
                <label class="form-check-label ms-2" for="defaultCheck1">Acepto términos y condiciones</label>
            </div>

            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-success">Solicitar</button>
            </div>
        </div>
    </div>
</form>

        </div>
    </div>

    <footer>
        <?php
        include 'plantillafooter.php';
        ?>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script src="https://unpkg.com/scrollreveal"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.20.1/moment.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <script src="./assets/js/solicitud.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
