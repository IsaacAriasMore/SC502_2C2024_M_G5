<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solicitud</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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
        <div>
            <P class="txtt" style="font-size: 20px;"><I>Este apartado es una guía detallada sobre las solicitudes y ayudas disponibles para los inmigrantes que buscan cruzar las fronteras de Costa Rica. Aquí, proporcionamos información esencial sobre los trámites necesarios, los documentos requeridos y las organizaciones que ofrecen apoyo. Nuestro objetivo es facilitar el proceso de migración, asegurando que todos los inmigrantes estén bien informados y reciban la ayuda adecuada para una transición segura y legal.</I></P>
            <div class="textos">
                <div class="text1">
                    <h1>Trámites y Documentación:</h1>
                    <p><i>Visa de Tránsito y Residencia Temporal: Explicamos los diferentes tipos de visas disponibles, incluyendo las de tránsito y residencia temporal, y los pasos para obtenerlas.</i></p>
                    <p><i>Requisitos Documentales: Una lista detallada de los documentos necesarios, como pasaportes válidos, certificados de antecedentes penales, y pruebas de solvencia económica.</i></p>
                </div>
                <div class="text2">
                    <h1>Organizaciones de Apoyo:</h1>
                    <p><i>ONGs y Entidades Gubernamentales: Información sobre organizaciones no gubernamentales y oficinas gubernamentales que ofrecen asistencia legal, alojamiento temporal, y otros recursos esenciales.</i></p>
                    <p><i>Centros de Ayuda y Refugios: Localización y servicios proporcionados por centros de ayuda y refugios para inmigrantes.</i></p>
                </div>
                <div class="text3">
                    <h1>Asesoría Legal y Asistencia Médica:</h1>
                    <p><i>Asesoría Legal Gratuita: Contactos y horarios de organizaciones que proporcionan asesoría legal gratuita para ayudar a los inmigrantes a comprender y completar los requisitos legales.</i></p>
                    <p><i>Servicios Médicos: Información sobre clínicas y servicios médicos disponibles para inmigrantes, incluyendo atención de emergencia y servicios de salud mental.</i></p>
                </div>
            </div>

            <hr>

            <div class="ayudas col-mb-6">
                <h1>SOLICITUD DE AYUDAS</h1>

                <div class="forms">

                <h1>En Caso de venir solo</h1>

                    <div class="forms1">
                        <div class="form-group">
                            <label for="inputNombre">Nombre</label>
                            <input type="text" class="form-control" id="inputNombre" placeholder="Ingresar nombre">
                        </div>
                        <div class="form-group">
                            <label for="inputApellido">Apellido</label>
                            <input type="text" class="form-control" id="inputApellido" placeholder="ingresar apellido">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Correo electronico</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                            <small id="emailHelp" class="form-text text-muted">Este correo no se compartira con nadie fuera de la organizacion.</small>
                        </div>
                        <div class="necesidades">
                            <label for="inputayudas">Ayudas Necesarias</label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="option1">
                                <label class="form-check-label">economicas</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="option2">
                                <label class="form-check-label">viveres</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="option3">
                                <label class="form-check-label">transporte</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="option4">
                                <label class="form-check-label">hospedaje</label>
                            </div>
                        </div>
                    </div>
                    <div class="dividor"></div>

                    <h1>En Caso de ser varios</h1>

                    <div class="forms2">
                        <div class="form-group">
                            <label for="inputNombre">apellido familiar</label>
                            <input type="text" class="form-control" id="inputNombre" placeholder="Ingresar apellido familiar">
                        </div>
                        <div class="form-group">
                            <label for="inputNumero">Numero de integrantes</label>
                            <input type="number" class="form-control" id="inputNumero" placeholder="Enter número">
                        </div>

                        <div class="nin">
                            <div class="numero form-group">
                                <label for="inputNumero">Numero de niños(0-12)</label>
                                <input type="number" class="form-control" id="inputNumero" placeholder="Enter número">
                            </div>
                            <div class="numero form-group">
                                <label for="inputNumero">Numero de adolecentes(13-17)</label>
                                <input type="number" class="form-control" id="inputNumero" placeholder="Enter número">
                            </div>
                            <div class="numero form-group">
                                <label for="inputNumero">Numero de adultos(+18)</label>
                                <input type="number" class="form-control" id="inputNumero" placeholder="Enter número">
                            </div>
                        </div>
                        <label for="inputNumero">ubicacion</label>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="inputCity">provincia</label>
                                <input type="text" class="form-control" id="inputCity">
                            </div>
                            <div class="form-group">
                                <label for="inputCity">canton</label>
                                <input type="text" class="form-control" id="inputCity">
                            </div>

                        </div>
                        <div class="form-group">
                            <label for="inputState">destino</label>
                            <select id="inputState" class="form-control">
                                <option selected value="panama">frontera Panama</option>
                                <option value="nicaragua">frontera Nicaragua</option>
                                <option value="Otros">Quedarse a vivir aqui</option>
                            </select>
                        </div>
                    </div>

                </div>
            </div>

        </div>
        <div class="d-flex justify-content-center mt-5 form-check">
            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
            <label class=" terminos form-check-label" for="defaultCheck1">
                acepto terminos y condiciones
            </label>
        </div>
        <div class="d-flex justify-content-center mt-2">
    <button type="button" class="boton btn btn-success" id="solicitarBtn">Solicitar</button>
</div>

    </div>
    </div>
    </div>
    </div>
    </div>

    <footer>
        <?php
        include 'plantillafooter.php';
        ?>
    </footer>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
    document.getElementById('solicitarBtn').addEventListener('click', function() {
    document.querySelectorAll('.form-control').forEach(input => input.value = '');
    document.querySelectorAll('.form-check-input').forEach(checkbox => checkbox.checked = false);
    alert('Información enviada, gracias por contar con nosotros');
    });
    </script>


<section class="container" id="carousel">
    <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://www.elsoldemexico.com.mx/mexico/sociedad/1do9pr-2021-08-26t152044z_1849224472_rc23dp9k0u44_rtrmadp_3_usa-immigration-mexico.jpg/ALTERNATES/LANDSCAPE_768/2021-08-26T152044Z_1849224472_RC23DP9K0U44_RTRMADP_3_USA-IMMIGRATION-MEXICO.jpg" class="d-block w-100" alt="Suministroa">
            </div>
            <div class="carousel-item">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTcxzMx_zRGFWBXS7WNxQZbX1r2vGS3oM4i8A&s" class="d-block w-100" alt="AYUDAR">
            </div>
            <div class="carousel-item">
                <img src="https://es.zenit.org/wp-content/uploads/sites/3/2020/08/083569c9-asistencia-a-migrantes-venezolanos-colombia-c-cortesia.jpg" class="d-block w-100" alt="Compasion">
            </div>
            <div class="carousel-item">
                <img src="https://blogs.iadb.org/educacion/wp-content/uploads/sites/22/2022/10/ninez.migrante.jpg" class="d-block w-100" alt="Niñez Inmigrante">
            </div>
            <div class="carousel-item">
                <img src="https://sinartdigital.com/media/zoo/images/migracion_migrante_venezuela_e9de15d660832c64da6b219fe3016e62.jpg" class="d-block w-100" alt="Venezolanos">
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
</section>

</body>

</html>


</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<script src="./assets/js/solicitud.js"></script>

</html>