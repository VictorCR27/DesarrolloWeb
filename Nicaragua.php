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
                    <a class="nav-link text-white" href="index.php">Home</a>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#" role="button"
                      data-bs-toggle="dropdown" aria-expanded="false">
                      Destinos
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="http://127.0.0.1:5500/html/belice.html">Belice</a></li>
                        <li><a class="dropdown-item" href="http://127.0.0.1:5500/html/costarica.html">Costa Rica</a></li>
                        <li><a class="dropdown-item" href="http://127.0.0.1:5500/html/elsalvador.html">El Salvador</a></li>
                        <li><a class="dropdown-item" href="http://127.0.0.1:5500/html/guatemala.html">Guatemala</a></li>
                        <li><a class="dropdown-item" href="http://127.0.0.1:5500/html/honduras.html">Honduras</a></li>
                        <li><a class="dropdown-item" href="http://127.0.0.1:5500/html/nicaragua.html">Nicaragua</a></li>
                        <li><a class="dropdown-item" href="http://127.0.0.1:5500/html/panama.html">Panamá</a></li>
                    </ul>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link text-white" href="http://127.0.0.1:5500/html/informacionpagina.html">Información de la Página</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link text-white" href="http://127.0.0.1:5500/html/miperfil.html">Mi Perfil</a>
                  </li>
                </ul>
              </div>
          
              <div class="logo">
                <ul class="logohover">
                  <li>
                    <a href="">
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
            <div class="row row-cols-1 row-cols-md-3 g-4">
                <div class="col">
                    <div class="card">
                        <img src="imgCarrusel/1.jpg" class="card-img-top" alt="Imagen 1">
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