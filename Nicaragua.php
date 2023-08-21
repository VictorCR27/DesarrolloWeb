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

    <style>
        .loading-spinner {
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 48px;
            color: #1976D2; /* Change color as needed */
            height: 50px;
        }
        </style>

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
                    <a class="nav-link text-white" href="Servicios.php">Servicios</a>
                  </li>

                  <li class="nav-item">
                    <a class="nav-link text-white" href="SobreNosotros.php">Quienes somos?</a>
                  </li>
                </ul>
              </div>
          
              <div class="logo">
                <ul class="logohover">
                  <li>
                    <a href="index.php">
                      <img class="peque" src="imgs/logonav1.png" alt="Logo1">
                      <img class="grande" src="imgs/logonav2.png" alt="Logo2">
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
                    <!-- Fecha Llegada -->
                    <div class="col-12">
                        <label class="black normal centered-text bold" for="fechaLlegada">Fecha llegada</label>
                        <input type="date" class="form-control" id="fechaLlegada">
                    </div>

                    <!-- Fecha Salida -->
                    <div class="col-12">
                        <label class="black normal centered-text bold" for="fechaSalida">Fecha Salida</label>
                        <input type="date" class="form-control" id="fechaSalida">
                    </div>

                    <!-- Cantidad Adultos -->
                    <div class="col-12">
                        <label class="black normal centered-text bold" for="CantidadAdultos">Cantidad Adultos</label>
                        <div class="option-controls horizontal-controls" id="option-controls-adultos">
                            <button type="button" class="btn btn-secondary btn-sm option-minus adultos-minus">-</button>
                            <input type="text" class="form-control form-control-sm option-count adultos-input" value="0" readonly>
                            <button type="button" class="btn btn-secondary btn-sm option-plus adultos-plus">+</button>
                        </div>
                    </div>

                    <!-- Cantidad Niños -->
                    <div class="col-12">
                        <label class="black normal centered-text bold" for="CantidadNinos">Cantidad Niños</label>
                        <div class="option-controls horizontal-controls" id="option-controls-ninos">
                            <button type="button" class="btn btn-secondary btn-sm option-minus adultos-minus">-</button>
                            <input type="text" class="form-control form-control-sm option-count adultos-input" value="0" readonly>
                            <button type="button" class="btn btn-secondary btn-sm option-plus adultos-plus">+</button>
                        </div>
                    </div>

                    <!-- Cantidad Habitaciones -->
                    <div class="col-12">
                        <label class="black normal centered-text bold" for="CantidadHabitaciones">Habitaciones</label>
                        <div class="option-controls horizontal-controls" id="option-controls-habitaciones">
                            <button type="button" class="btn btn-secondary btn-sm option-minus adultos-minus">-</button>
                            <input type="text" class="form-control form-control-sm option-count adultos-input" value="0" readonly>
                            <button type="button" class="btn btn-secondary btn-sm option-plus adultos-plus">+</button>
                        </div>
                    </div>

                    <div class="col-12">
                        <button type="button" class="centered-button" id="buscar-button">
                            <img src="imgs/botonbuscar2.png" height="120" width="100" alt="buscar">
                        </button>
                    </div>
                </form>
            </section>
        </div>




        <!-- TITULO -->

        <h1 class="white titulo centered-text greenbackground">Nicaragua</h1>


        <!-- CARUSEL CON IMÁGENES DE DIFERENTES HOTELES -->

        <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="imgs/andaz-hotel.jpg" class="d-block w-100" alt="Image 1" />
                </div>
                <div class="carousel-item">
                    <img src="imgs/img-2.jpg" class="d-block w-100" alt="Image 2" />
                </div>
                <div class="carousel-item">
                    <img src="imgs/img-3.jpg" class="d-block w-100" alt="Image 3" />
                </div>
            </div>
        </div>
    </header>
    <br><br>


   
    <section>
        <!-- CARDS -->
        <div class="container">
            <div class="row row-cols-1 row-cols-md-3"> <!-- Set the number of columns for each row -->
                <?php
                if (!$conex) {
                    die("Error de conexión: " . mysqli_connect_error());
                }

                // Realizar la consulta
                $sql = "SELECT * FROM publicaciones";
                $resultado = mysqli_query($conex, $sql);

                // Verificar si hay resultados
                if (mysqli_num_rows($resultado) > 0) {
                    while ($fila = mysqli_fetch_assoc($resultado)) {
                        if ($fila['pais'] === 'Costa Rica') {
                            // Display the card content
                            echo "<div class='col mb-4'>"; // Add margin between columns
                            echo "<div class='card h-100'>"; // Set a fixed height for the card
                            
                            // Display the card image
                            echo "<div class='card-img-top'>";

                            // Obtener las imágenes
                            $imagenes = explode(',', $fila['imagenes']);
                            foreach ($imagenes as $imagen) {
                                echo "<img style='height: 207px'class='card-img-top' src='".$imagen."' alt='Imagen del hotel'>";
                            }

                            echo "</div>"; // Cierre de card-img-top

                            echo "<div class='card-body'>";
                            echo "<h5 class='black centered-text subtitulo'>".$fila['nombre_hotel']."</h5>";
                            echo "<p class='black  body'>".$fila['ubicacion']."</p>";
                            echo "<p class='black  body'>Precio: $".$fila['precio_noche']."</p>";
                            echo "<p class='black  bold body'>Amenidades:</p>";
                            echo "<p class='black maspequeña'>";
                            for ($i = 1; $i <= 6; $i++) {
                                $amenidadKey = "amenidad" . $i;
                                if (!empty($fila[$amenidadKey])) {
                                    echo "- ".$fila[$amenidadKey]."<br>";
                                }
                            }
                            echo "</p>";
                            echo "<a class='reservar_btn' href='reservar.php?nombre_hotel=" . urlencode($fila['nombre_hotel']) . "&amenidad1=" . urlencode($fila['amenidad1']) . "&amenidad2=" . urlencode($fila['amenidad2']) . "&amenidad3=" . urlencode($fila['amenidad3']) . "&amenidad4=" . urlencode($fila['amenidad4']) . "&amenidad5=" . urlencode($fila['amenidad5']) . "&amenidad6=" . urlencode($fila['amenidad6']) . "&ubicacion=" . urlencode($fila['ubicacion']) . "&precio_noche=" . urlencode($fila['precio_noche']) . "&imagen=" . urlencode($imagenes[0]) . "' class='btn_reservar'>Reservar</a>";
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
            </div>
        </div>
    </section>

    <br><br><br>
    <br><br><br>

    <!-- FOOTER -->

    <footer class="footer">
        <br><br><br><br><br><br><br>
        </br>
    </footer>


    <!-- SCRIPTS -->

    <script>
    /*  ------------------------------------- Sumar y restar -------------------------------------  */
    // Función para controlar las operaciones de suma y resta
    function updateOptionControls(buttonClass, inputClass, operation) {
    const buttons = document.querySelectorAll(buttonClass);
    buttons.forEach(function (button) {
        button.addEventListener('click', function () {
            const input = this.parentNode.querySelector(inputClass);
            let currentValue = parseInt(input.value);
            if (operation === 'plus') {
                input.value = currentValue + 1;
            } else if (operation === 'minus' && currentValue > 0) {
                input.value = currentValue - 1;
            }
        });
    });
    }

    // Actualizar los controles para Cantidad Adultos
    updateOptionControls('.option-plus.adultos-plus', '.option-count.adultos-input', 'plus');
    updateOptionControls('.option-minus.adultos-minus', '.option-count.adultos-input', 'minus');

    // Actualizar los controles para Cantidad Niños
    updateOptionControls('.option-plus.ninos-plus', '.option-count.ninos-input', 'plus');
    updateOptionControls('.option-minus.ninos-minus', '.option-count.ninos-input', 'minus');

    // Actualizar los controles para Cantidad Habitaciones
    updateOptionControls('.option-plus.habitaciones-plus', '.option-count.habitaciones-input', 'plus');
    updateOptionControls('.option-minus.habitaciones-minus', '.option-count.habitaciones-input', 'minus'); 
    </script>


    <script>
        document.addEventListener("DOMContentLoaded", function() {
        const buscarButton = document.getElementById("buscar-button");

        buscarButton.addEventListener("click", function() {
            // Mostrar SweetAlert de carga
            Swal.fire({
                title: 'Realizando busqueda...',
                allowOutsideClick: false,
                showConfirmButton: false,
                html: '<div class="loading-spinner"><i class="fas fa-circle-notch fa-spin"></i></div>',
                onBeforeOpen: () => {
                    Swal.showLoading();
                }
            });

            // Esperar 3 segundos y luego cerrar el SweetAlert
            setTimeout(function() {
                Swal.close();
                // Aquí puedes realizar la acción de búsqueda o cualquier otra tarea
            }, 3000);
        });
    });
    </script>

    <script>
        // Wait for the DOM to be fully loaded
        document.addEventListener("DOMContentLoaded", function() {
            // Get references to DOM elements
            const buscarButton = document.getElementById("buscar-button");
            const fechaLlegadaInput = document.getElementById("fechaLlegada");
            const fechaSalidaInput = document.getElementById("fechaSalida");

            // Add click event listener to the search button
            buscarButton.addEventListener("click", function() {
                console.log("Search button clicked");

                // Get data from input elements
                const fechaLlegada = fechaLlegadaInput.value;
                const fechaSalida = fechaSalidaInput.value;
                const cantidadAdultos = document.querySelector("#option-controls-adultos .option-count").value;
                const cantidadNinos = document.querySelector("#option-controls-ninos .option-count").value;
                const cantidadHabitaciones = document.querySelector("#option-controls-habitaciones .option-count").value;

                // Update URL with data
                const reservarBtns = document.querySelectorAll(".reservar_btn");
                reservarBtns.forEach(function(btn) {
                    const url = btn.getAttribute("href") + "&fechaLlegada=" + fechaLlegada + "&fechaSalida=" + fechaSalida + "&cantidadAdultos=" + cantidadAdultos + "&cantidadNinos=" + cantidadNinos + "&cantidadHabitaciones=" + cantidadHabitaciones;
                    btn.setAttribute("href", url);
                });

                // Log the captured data
                console.log(fechaLlegada);
                console.log(fechaSalida);
                console.log(cantidadAdultos);
                console.log(cantidadNinos);
                console.log(cantidadHabitaciones);
            });
        });
    </script>


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <script src="js/script.js"></script>
        
    
</body>

</html>