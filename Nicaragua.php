<?php
include("registro.php");
include("login.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Nicaragua</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="css/otrosEstilos.css">

</head>

<body>
    <header>

        <!-- NAVBAR -->

        <nav id="navbar" class="navbar navbar-expand-lg sand white normal">
            <div class="container-fluid">
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                  <li class="nav-item">
                    <a class="nav-link text-white" href="">Servicios</a>
                  </li>

                  <li class="nav-item">
                    <a class="nav-link text-white" href="">Quienes somos?</a>
                  </li>

                  <li class="nav-item">
                    <a class="nav-link text-white" href="">Perfil</a>
                  </li>
                </ul>
              </div>
          
              <div class="logo">
                <ul class="logohover">
                  <li>
                    <a href="index.php">
                      <img class="peque" src="imgCarrusel/logonav1.png" alt="Logo1">
                      <img class="grande" src="imgCarrusel/logonav2.png" alt="Logo2">
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </nav>
          



        <!-- FILTRO -->


        <div class="rectangulofilter">
            <section class="filter">
                <form class="row row-cols-lg-auto g-3 align-items-center whitebox">
                    <div class="col-12">
                        <label class="sand black normal centered-text bold" for="fechaLlegada">Fecha llegada</label>
                        <input type="date" class="form-control" id="fechaLlegada">
                    </div>
                    <div class="col-12">
                        <label class="sand black normal centered-text bold" for="fechaSalida">Fecha Salida</label>
                        <input type="date" class="form-control" id="fechaSalida">
                    </div>
                    <div class="col-12">
                        <label class="sand black normal centered-text bold" for="CantidadAdultos">Cantidad Adultos</label>
                        <div class="option-controls horizontal-controls" id="option-controls">
                            <button class="btn btn-secondary btn-sm option-minus adultos-minus">-</button>
                            <input type="text" class="form-control form-control-sm option-count adultos-input" value="0"
                                readonly>
                            <button class="btn btn-secondary btn-sm option-plus adultos-plus">+</button>
                        </div>
                    </div>
                    <div class="col-12">
                        <label class="sand black normal centered-text bold" for="CantidadNinos">Cantidad Niños</label>
                        <div class="option-controls horizontal-controls" id="option-controls">
                            <button class="btn btn-secondary btn-sm option-minus adultos-minus">-</button>
                            <input type="text" class="form-control form-control-sm option-count adultos-input" value="0"
                                readonly>
                            <button class="btn btn-secondary btn-sm option-plus adultos-plus">+</button>
                        </div>
                    </div>
                    <div class="col-12">
                        <label class="sand black normal centered-text bold" for="CantidadHabitaciones">Habitaciones</label>
                        <div class="option-controls horizontal-controls" id="option-controls">
                            <button class="btn btn-secondary btn-sm option-minus adultos-minus">-</button>
                            <input type="text" class="form-control form-control-sm option-count adultos-input" value="0"
                                readonly>
                            <button class="btn btn-secondary btn-sm option-plus adultos-plus">+</button>
                        </div>
                    </div>
                    <div class="col-12">
                        <button type="button" class="centered-button" onclick="">
                            <img src="imgCarrusel/botonbuscar2.png" height="120" width="100" alt="buscar">
                        </button>
                    </div>
                </form>
            </section>
        </div>




        <!-- TITULO -->

        <h1 class="modern white titulo centered-text greenbackground">Nicaragua</h1>


        <!-- CARUSEL CON IMÁGENES DE DIFERENTES HOTELES -->

        <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="imgCarrusel/img-1.jpg" class="d-block w-100" alt="Image 1" />
                </div>
                <div class="carousel-item">
                    <img src="imgCarrusel/img-2.jpg" class="d-block w-100" alt="Image 2" />
                </div>
                <div class="carousel-item">
                    <img src="imgCarrusel/img-3.jpg" class="d-block w-100" alt="Image 3" />
                </div>
            </div>
        </div>
    </header>
    <br><br>


    <section>
    <!-- CARDS -->
        <div class="container">
            <div class="row"> <!-- Agregado el contenedor de filas -->
                <?php
                if (!$conex) {
                    die("Error de conexión: " . mysqli_connect_error());
                }

                // Realizar la consulta
                $sql = "SELECT * FROM publicaciones";
                $resultado = mysqli_query($conex, $sql);

                // Verificar si hay resultados
                if (mysqli_num_rows($resultado) > 0) {
                    // Procesar los resultados
                    while ($fila = mysqli_fetch_assoc($resultado)) {
                        if ($fila['pais'] === 'Costa Rica') { // Verificar si el país es igual a "Costa Rica"
                            echo "<div class='col'>"; // Agregado el contenedor de columna
                            echo "<div class='card'>"; // Agregado el contenedor de tarjeta
                            echo "<div class='card-img-top'>";
                            
                            // Obtener las imágenes
                            $imagenes = explode(',', $fila['imagenes']);
                            foreach ($imagenes as $imagen) {
                                echo "<img class='card-img-top' src='".$imagen."' alt='Imagen del hotel'>";
                            }
                            
                            echo "</div>"; // Cierre de card-img-top

                            echo "<div class='card-body'>";
                            echo "<h5 class='modern black centered-text subtitulo'>".$fila['nombre_hotel']."</h5>";
                            echo "<p class='sand black  body'>".$fila['ubicacion']."</p>";
                            echo "<p class='sand black  body'>Precio: ".$fila['precio_noche']."</p>";
                            echo "<p class='sand black  bold body'>Amenidades:</p>";
                            echo "<p class='sand black maspequeña'>";
                            for ($i = 1; $i <= 6; $i++) {
                                $amenidadKey = "amenidad" . $i;
                                if (!empty($fila[$amenidadKey])) {
                                    echo "- ".$fila[$amenidadKey]."<br>";
                                }
                            }
                            echo "</p>";
                            echo "<a href='reservar.php?nombre_hotel=" . urlencode($fila['nombre_hotel']) . "&amenidad1=" . urlencode($fila['amenidad1']) . "&amenidad2=" . urlencode($fila['amenidad2']) . "&amenidad3=" . urlencode($fila['amenidad3']) . "&amenidad4=" . urlencode($fila['amenidad4']) . "&amenidad5=" . urlencode($fila['amenidad5']) . "&amenidad6=" . urlencode($fila['amenidad6']) . "&ubicacion=" . urlencode($fila['ubicacion']) . "&precio_noche=" . urlencode($fila['precio_noche']) . "&imagen=" . urlencode($imagenes[0]) . "' class='btn_reservar'>Reservar</a>";
                            echo "</div>"; // Cierre de card-body

                            echo "</div>"; // Cierre de tarjeta
                            echo "</div>"; // Cierre de columna
                        }
                    }
                } else {
                    echo "No se encontraron publicaciones.";
                }

                // Cerrar la conexión
                mysqli_close($conex);
                ?>
                
                <div class="col">
                    <div class="card">
                        <img src="imgCarrusel/2.jpg" class="card-img-top" alt="Imagen 1">
                        <div class="card-body">
                            <div class="card-details">
                                <h5 class="modern black centered-text subtitulo">Hotel 1</h5>
                                <p class="sand black  body">Dirección del Hotel 1</p>
                                <p class="sand black  body">Precio: $100</p>
                                <p class="sand black  bold body">Amenidades:</p>
                                <p class="sand black maspequeña"> - Bar y Restaurante <br> - Spa y Piscina <br>-
                                    Servicio a la habitacion <br> - WiFi <br> - Desayuno Incluido</p>
                            </div>
                            <div class="card-details-bottom">
                                <div class="rating">
                                    <span class="star"></span>
                                    <span class="star"></span>
                                    <span class="star"></span>
                                    <span class="star"></span>
                                    <span class="star"></span>
                                </div>
                                <button class="btn btn-primary">Reservar</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <img src="imgCarrusel/3.jpg" class="card-img-top" alt="Imagen 1">
                        <div class="card-body">
                            <div class="card-details">
                                <h5 class="modern black centered-text subtitulo">Hotel 1</h5>
                                <p class="sand black  body">Dirección del Hotel 1</p>
                                <p class="sand black  body">Precio: $100</p>
                                <p class="sand black  bold body">Amenidades:</p>
                                <p class="sand black maspequeña"> - Bar y Restaurante <br> - Spa y Piscina <br>-
                                    Servicio a la habitacion <br> - WiFi <br> - Desayuno Incluido</p>
                            </div>
                            <div class="card-details-bottom">
                                <div class="rating">
                                    <span class="star"></span>
                                    <span class="star"></span>
                                    <span class="star"></span>
                                    <span class="star"></span>
                                    <span class="star"></span>
                                </div>
                                <button class="btn btn-primary">Reservar</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <img src="imgCarrusel/4.jpg" class="card-img-top" alt="Imagen 1">
                        <div class="card-body">
                            <div class="card-details">
                                <h5 class="modern black centered-text subtitulo">Hotel 1</h5>
                                <p class="sand black  body">Dirección del Hotel 1</p>
                                <p class="sand black  body">Precio: $100</p>
                                <p class="sand black  bold body">Amenidades:</p>
                                <p class="sand black maspequeña"> - Bar y Restaurante <br> - Spa y Piscina <br>-
                                    Servicio a la habitacion <br> - WiFi <br> - Desayuno Incluido</p>
                            </div>
                            <div class="card-details-bottom">
                                <div class="rating">
                                    <span class="star"></span>
                                    <span class="star"></span>
                                    <span class="star"></span>
                                    <span class="star"></span>
                                    <span class="star"></span>
                                </div>
                                <button class="btn btn-primary">Reservar</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <img src="imgCarrusel/5.jpeg" class="card-img-top" alt="Imagen 1">
                        <div class="card-body">
                            <div class="card-details">
                                <h5 class="modern black centered-text subtitulo">Hotel 1</h5>
                                <p class="sand black  body">Dirección del Hotel 1</p>
                                <p class="sand black  body">Precio: $100</p>
                                <p class="sand black  bold body">Amenidades:</p>
                                <p class="sand black maspequeña"> - Bar y Restaurante <br> - Spa y Piscina <br>-
                                    Servicio a la habitacion <br> - WiFi <br> - Desayuno Incluido</p>
                            </div>
                            <div class="card-details-bottom">
                                <div class="rating">
                                    <span class="star"></span>
                                    <span class="star"></span>
                                    <span class="star"></span>
                                    <span class="star"></span>
                                    <span class="star"></span>
                                </div>
                                <button class="btn btn-primary">Reservar</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <img src="imgCarrusel/6.jpeg" class="card-img-top" alt="Imagen 1">
                        <div class="card-body">
                            <div class="card-details">
                                <h5 class="modern black centered-text subtitulo">Hotel 1</h5>
                                <p class="sand black  body">Dirección del Hotel 1</p>
                                <p class="sand black  body">Precio: $100</p>
                                <p class="sand black  bold body">Amenidades:</p>
                                <p class="sand black maspequeña"> - Bar y Restaurante <br> - Spa y Piscina <br>-
                                    Servicio a la habitacion <br> - WiFi <br> - Desayuno Incluido</p>
                            </div>
                            <div class="card-details-bottom">
                                <div class="rating">
                                    <span class="star"></span>
                                    <span class="star"></span>
                                    <span class="star"></span>
                                    <span class="star"></span>
                                    <span class="star"></span>
                                </div>
                                <button class="btn btn-primary">Reservar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <br><br><br>

    <!-- FOOTER -->

    <footer class="footer">
        <br><br><br><br><br><br><br>
        </br>
    </footer>


    <!-- SCRIPT -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js">
    </script>
    <script>
        // Inicializar los dropdowns de Bootstrap
        var dropdowns = document.querySelectorAll('.dropdown-toggle');
        dropdowns.forEach(function (dropdown) {
            new bootstrap.Dropdown(dropdown);
        });
    </script>

    
</body>

</html>