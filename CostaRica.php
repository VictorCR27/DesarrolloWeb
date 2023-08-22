<?php
include("registro.php");
include("login.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Costa Rica</title>
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
    <!--Header-->
    <header>
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
            <nav class="navigation">
                <?
                // Verificar si el rol es administrador
                if (isset($_SESSION['roles']) && $_SESSION['roles'] === 'admin') {
                    echo '<a href="publicar.php">Publicar</a>';
                    echo '<a href="ver_publicaciones.php">Ver publicaciones</a>';}
                ?>
                <a href="Servicios.php">Servicios</a>
                <a href="SobreNosotros.php">Quienes somos?</a>
                <?
                if (isset($_SESSION['username'])) {
                    $username = $_SESSION['username'];
                    echo '<a style="color: #FAF9F6;">Bienvenido, ' . $username . '</a>';
                    echo '<a href="logout.php">Cerrar sesión</a>'; // Agregar el enlace de "Cerrar sesión"
                } else {
                    echo '<button class="btnLogin-popup">Login</button>';
                }
                ?>
                
            </nav>
        </header>
        <!--Fin Header-->

        <!--Formulario-->
        <div class="wrapper">

            <span class="icon-close"><ion-icon name="close"></ion-icon></span>
            
            <!--Login-->
            <div class="form-box login">
                <h2>Login</h2>
                <form id="login-form" method="post" action="index.php" onsubmit="cleanSpaces()">
                    <div class="input-box">
                        <span class="icon"><ion-icon name="mail"></ion-icon></ion-icon></span>
                        <input type="email" name="email">
                        <label>Email</label>
                    </div>
                    <div class="input-box">
                        <span class="icon"><ion-icon name="lock-closed"></ion-icon></ion-icon></span>
                        <input type="password" name="password">
                        <label>Password</label>
                    </div>
                    <button type="submit" class="btn" name="login">Login</button>
                    <div class="login-register">
                        <p>¿No tienes una cuenta? <a href="#" class="register-link">Registrarse</a></p>
                    </div>
                </form>
            </div>
        
            <!--Registro-->
            <div class="form-box register">
                <h2>Registrarse</h2>
                <form id="register-form" method="post" action="registro.php">
                    <div class="input-box">
                        <span class="icon"><ion-icon name="person"></ion-icon></ion-icon></ion-icon></span>
                        <input type="text" name="username">
                        <label>Username</label>
                    </div>

                    <div class="input-box">
                        <span class="icon"><ion-icon name="mail"></ion-icon></ion-icon></span>
                        <input type="email" name="email">
                        <label>Email</label>
                    </div>

                    <div class="input-box">
                        <span class="icon"><ion-icon name="lock-closed"></ion-icon></ion-icon></span>
                        <input type="password" name="password">
                        <label>Password</label>
                    </div>

                    <div class="buttons-register">
                        <div class="role-buttons">
                            <button type="button" name="role" value="admin" class="role-button" onclick="toggleButton(this)">Administrador</button>
                            <button type="button" name="role" value="user" class="role-button" onclick="toggleButton(this)">Cliente</button>
                        </div>
                        <input type="hidden" name="selectedRole" id="selected-role">
                    </div>

                    <button type="submit" name="register" id="registrar" class="btn">Registrarse</button>

                    <div class="login-register">
                        <p>¿Tienes una cuenta? <a href="#" class="login-link">Login</a></p>
                    </div>
                </form>
            </div>
        </div>
        <!--Fin Formulario-->


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

        <h1 class="white titulo centered-text greenbackground" style="margin-top: 74px;">Costa Rica</h1>


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
            
            Swal.fire({
                title: 'Realizando busqueda...',
                allowOutsideClick: false,
                showConfirmButton: false,
                html: '<div class="loading-spinner"></div>',
                onBeforeOpen: () => {
                    Swal.showLoading();
                }
            });

            
            setTimeout(function() {
                Swal.close();
                
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

            // Add click event listener to the search button and "Reservar" links
            buscarButton.addEventListener("click", updateLinks);
            
            // Update the links when the page loads
            updateLinks();

            function updateLinks() {
                console.log("Updating links...");

                // Get data from input elements
                const fechaLlegada = fechaLlegadaInput.value;
                const fechaSalida = fechaSalidaInput.value;
                const cantidadAdultos = document.querySelector("#option-controls-adultos .option-count").value;
                const cantidadNinos = document.querySelector("#option-controls-ninos .option-count").value;
                const cantidadHabitaciones = document.querySelector("#option-controls-habitaciones .option-count").value;

                // Update URL with data
                const reservarBtns = document.querySelectorAll(".reservar_btn");
                reservarBtns.forEach(function(btn) {
                    const url = btn.getAttribute("href") +
                        "&fechaLlegada=" + fechaLlegada +
                        "&fechaSalida=" + fechaSalida +
                        "&cantidadAdultos=" + cantidadAdultos +
                        "&cantidadNinos=" + cantidadNinos +
                        "&cantidadHabitaciones=" + cantidadHabitaciones;
                    btn.setAttribute("href", url);
                });

                // Log the captured data
                console.log(fechaLlegada);
                console.log(fechaSalida);
                console.log(cantidadAdultos);
                console.log(cantidadNinos);
                console.log(cantidadHabitaciones);
            }
        });
    </script>

    <script>
        // Wait for the DOM to be fully loaded
        document.addEventListener("DOMContentLoaded", function() {
            // Get references to date input fields
            const fechaLlegadaInput = document.getElementById("fechaLlegada");
            const fechaSalidaInput = document.getElementById("fechaSalida");

            // Get the current date
            const currentDate = new Date();
            
            // Set the min attribute of the date input fields to the current date
            const year = currentDate.getFullYear();
            const month = String(currentDate.getMonth() + 1).padStart(2, '0');
            const day = String(currentDate.getDate()).padStart(2, '0');
            const minDate = `${year}-${month}-${day}`;
            
            fechaLlegadaInput.min = minDate;
            fechaSalidaInput.min = minDate;
        });

    </script>


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <script src="js/script.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="https://kit.fontawesome.com/c14ef371b4.js" crossorigin="anonymous"></script>
        
    
</body>

</html>