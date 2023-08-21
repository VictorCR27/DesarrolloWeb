<?php
include("registro.php");
include("login.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Costa Rica</title>
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
                      <img class="peque" src="imgCarrusel/logonav1.png" alt="Logo1">
                      <img class="grande" src="imgCarrusel/logonav2.png" alt="Logo2">
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
                <a href="#">Cuenta</a>
                <?
                if (isset($_SESSION['username'])) {
                    $username = $_SESSION['username'];
                    echo '<a>Bienvenido, ' . $username . '</a>';
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
    

        <!-- Reserva -->
        <div class="container" style="margin-top:100px">
            <div class="row row-cols-1 row-cols-md-3">
                <div class='col mb-4'>
                    <div class='card h-100'>
                    <div class='card-img-top' style='height: 207px; overflow: hidden;'>
                        <img src="<?php echo $_GET['imagen']; ?>" alt="Imagen del hotel" style='width: 100%; height: 100%; object-fit: cover;'>
                    </div>

                        <div class='card-body'>
                            <h5 class='modern black centered-text subtitulo'><?php echo $_GET['nombre_hotel']; ?></h5>
                            <p class='sand black  body'>Ubicación: <?php echo $_GET['ubicacion']; ?></p>
                            <p class='sand black  body'>Precio por noche: <?php echo $_GET['precio_noche']; ?></p>
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
</body>
</html>
