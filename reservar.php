<?php
include("registro.php");
include("login.php");

// Retrieve query parameters
$nombre_hotel = isset($_GET['nombre_hotel']) ? $_GET['nombre_hotel'] : "";
$amenidad1 = isset($_GET['amenidad1']) ? $_GET['amenidad1'] : "";
$amenidad2 = isset($_GET['amenidad2']) ? $_GET['amenidad2'] : "";
$amenidad3 = isset($_GET['amenidad3']) ? $_GET['amenidad3'] : "";
$amenidad4 = isset($_GET['amenidad4']) ? $_GET['amenidad4'] : "";
$amenidad5 = isset($_GET['amenidad5']) ? $_GET['amenidad5'] : "";
$amenidad6 = isset($_GET['amenidad6']) ? $_GET['amenidad6'] : "";
$ubicacion = isset($_GET['ubicacion']) ? $_GET['ubicacion'] : "";
$precio_noche = isset($_GET['precio_noche']) ? $_GET['precio_noche'] : "";

$fechaLlegada = isset($_GET['fechaLlegada']) ? $_GET['fechaLlegada'] : "";
$fechaSalida = isset($_GET['fechaSalida']) ? $_GET['fechaSalida'] : "";
$cantidadAdultos = isset($_GET['cantidadAdultos']) ? $_GET['cantidadAdultos'] : "";
$cantidadNinos = isset($_GET['cantidadNinos']) ? $_GET['cantidadNinos'] : "";
$cantidadHabitaciones = isset($_GET['cantidadHabitaciones']) ? $_GET['cantidadHabitaciones'] : "";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/otrosEstilos.css">
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
                <a href="#">Servicios</a>
                <a href="#">Quienes somos?</a>
                <?
                if (isset($_SESSION['username'])) {
                    $username = $_SESSION['username'];
                    echo '<a>Bienvenido, ' . $username . '</a>';
                    echo '<a href="logout.php">Cerrar sesión</a>';
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
        <div class="rectangulofilter" style="margin-top: -450px;">
       
            <section class="filter">
                
                <form class="row row-cols-lg-auto g-3 align-items-center whitebox">
                    <!-- Fecha Llegada -->
                    <div class="col-12">
                        <label class="sand black normal centered-text bold" for="fechaLlegada">Fecha llegada</label>
                        <input type="date" class="form-control" id="fechaLlegada" value="<?php echo $fechaLlegada; ?>">
                    </div>

                    <!-- Fecha Salida -->
                    <div class="col-12">
                        <label class="sand black normal centered-text bold" for="fechaSalida">Fecha Salida</label>
                        <input type="date" class="form-control" id="fechaSalida" value="<?php echo $fechaSalida; ?>">
                    </div>

                    <!-- Cantidad Adultos -->
                    <div class="col-12">
                        <label class="sand black normal centered-text bold" for="CantidadAdultos">Cantidad Adultos</label>
                        <div class="option-controls horizontal-controls" id="option-controls-adultos">
                            <button type="button" class="btn btn-secondary btn-sm option-minus adultos-minus">-</button>
                            <input type="text" class="form-control form-control-sm option-count adultos-input" value="<?php echo $cantidadAdultos; ?>" readonly>
                            <button type="button" class="btn btn-secondary btn-sm option-plus adultos-plus">+</button>
                        </div>
                    </div>

                    <!-- Cantidad Niños -->
                    <div class="col-12">
                        <label class="sand black normal centered-text bold" for="CantidadNinos">Cantidad Niños</label>
                        <div class="option-controls horizontal-controls" id="option-controls-ninos">
                            <button type="button" class="btn btn-secondary btn-sm option-minus adultos-minus">-</button>
                            <input type="text" class="form-control form-control-sm option-count adultos-input" value="<?php echo $cantidadNinos; ?>" readonly>
                            <button type="button" class="btn btn-secondary btn-sm option-plus adultos-plus">+</button>
                        </div>
                    </div>

                    <!-- Cantidad Habitaciones -->
                    <div class="col-12">
                        <label class="sand black normal centered-text bold" for="CantidadHabitaciones">Habitaciones</label>
                        <div class="option-controls horizontal-controls" id="option-controls-habitaciones">
                            <button type="button" class="btn btn-secondary btn-sm option-minus adultos-minus">-</button>
                            <input type="text" class="form-control form-control-sm option-count adultos-input" value="<?php echo $cantidadHabitaciones; ?>" readonly>
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


    

        <!-- Reserva -->
        <div class="container" style="margin-top:230px">
            <div class="row row-cols-1 row-cols-md-3">
                <div class='col mb-4'>
                    <div class='card h-100'>
                    <div class='card-img-top' style='height: 207px; overflow: hidden;'>
                        <img src="<?php echo $_GET['imagen']; ?>" alt="Imagen del hotel" style='width: 100%; height: 100%; object-fit: cover;'>
                    </div>

                        <div class='card-body'>
                            <h5 class='modern black centered-text subtitulo'><?php echo $_GET['nombre_hotel']; ?></h5>
                            <p class='sand black  body'>Ubicación: <?php echo $_GET['ubicacion']; ?></p>
                            <p class='sand black  body'>Precio por noche: $<?php echo $_GET['precio_noche']; ?></p>
                            <p class='sand black  bold body'>Amenidades:</p>
                            <ul class='sand black maspequeña'>
                                <?php
                                for ($i = 1; $i <= 6; $i++) {
                                    $amenidadKey = "amenidad" . $i;
                                    if (!empty($_GET[$amenidadKey])) {
                                        echo "<li>" . $_GET[$amenidadKey] . "</li>";
                                    }
                                }
                                ?>
                            </ul>
                            <form action="procesar_reserva.php" method="post">
                                <input type="hidden" name="nombre_hotel" value="<?php echo $_GET['nombre_hotel']; ?>">
                                <input type="hidden" name="ubicacion" value="<?php echo $_GET['ubicacion']; ?>">
                                <input type="hidden" name="precio_noche" value="<?php echo $_GET['precio_noche']; ?>">
                                <?php
                                for ($i = 1; $i <= 6; $i++) {
                                    $amenidadKey = "amenidad" . $i;
                                    if (!empty($_GET[$amenidadKey])) {
                                        echo "<input type='hidden' name='" . $amenidadKey . "' value='" . $_GET[$amenidadKey] . "'>";
                                    }
                                }
                                ?>
                                <input type="submit" value="Confirmar Reserva" class="reservar_btn">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>

    <script>
    document.addEventListener("DOMContentLoaded", function() {
        const confirmarReservaBtn = document.querySelector(".reservar_btn");

        confirmarReservaBtn.addEventListener("click", function(event) {
            event.preventDefault(); // Evitar que el formulario se envíe directamente

            const fechaLlegada = document.getElementById("fechaLlegada").value;
            const fechaSalida = document.getElementById("fechaSalida").value;
            const cantidadAdultos = document.querySelector("#option-controls-adultos .option-count").value;
            const cantidadNinos = document.querySelector("#option-controls-ninos .option-count").value;
            const cantidadHabitaciones = document.querySelector("#option-controls-habitaciones .option-count").value;

                // Obtener la URL actual y separarla de los parámetros existentes
                const baseUrl = window.location.href.split("?")[0];
                
                // Construir la nueva URL con los parámetros del filtro y los valores de la publicación
                const newUrl = `${baseUrl}?fechaLlegada=${fechaLlegada}&fechaSalida=${fechaSalida}&cantidadAdultos=${cantidadAdultos}&cantidadNinos=${cantidadNinos}&cantidadHabitaciones=${cantidadHabitaciones}`
                    + `&nombre_hotel=${encodeURIComponent('<?php echo isset($_GET['nombre_hotel']) ? $_GET['nombre_hotel'] : ''; ?>')}`
                    + `&ubicacion=${encodeURIComponent('<?php echo isset($_GET['ubicacion']) ? $_GET['ubicacion'] : ''; ?>')}`
                    + `&precio_noche=${encodeURIComponent('<?php echo isset($_GET['precio_noche']) ? $_GET['precio_noche'] : ''; ?>')}`;

                
                // Redirigir a la nueva URL
                window.location.href = newUrl;
            });
        });
    </script>

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

</body>
</html>
