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
        <link rel="stylesheet" href="style.css">
    </head>

    <body>

        <!--Header-->
        <header>
            <h2><a class="logo" href="index.php">Hotel DESAP</a></h2>
            <nav class="navigation">
                <?
                // Verificar si el rol es administrador
                if (isset($_SESSION['roles']) && $_SESSION['roles'] === 'admin') {
                    echo '<a href="publicar.php">Publicar</a>';
                    echo '<a href="ver_publicaciones.php">Ver publicaciones</a>';}
                ?>
                <a href="#">Reservar</a>
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

        <!--Ver publicaciones-->
        <div class="publicaciones">
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
                        echo "<div class='publicacion_container'>";
                        echo "<div class='imagen_hotel'>";
                        
                        // Obtener las imágenes
                        $imagenes = explode(',', $fila['imagenes']);
                        foreach ($imagenes as $imagen) {
                            echo "<img class='imgs_hoteles' src='".$imagen."' alt='Imagen del hotel'>";
                        }
                        
                        echo "</div>"; // Cierre de imagen_hotel

                        echo "<div class='publicacion_info'>";
                        echo "<h3>".$fila['nombre_hotel']."</h3>";
                        echo "<p>Amenidades:</p>";
                        echo "<ul>";
                        for ($i = 1; $i <= 6; $i++) {
                            $amenidadKey = "amenidad" . $i;
                            if (!empty($fila[$amenidadKey])) {
                                echo "<li>".$fila[$amenidadKey]."</li>";
                            }
                        }
                        echo "</ul>";
                        echo "<p>País: ".$fila['pais']."</p>";
                        echo "<p>Ubicación: ".$fila['ubicacion']."</p>";
                        echo "<p>Precio por noche: ".$fila['precio_noche']."</p>";
                        echo "<a href='reservar.php?nombre_hotel=" . urlencode($fila['nombre_hotel']) . "&amenidad1=" . urlencode($fila['amenidad1']) . "&amenidad2=" . urlencode($fila['amenidad2']) . "&amenidad3=" . urlencode($fila['amenidad3']) . "&amenidad4=" . urlencode($fila['amenidad4']) . "&amenidad5=" . urlencode($fila['amenidad5']) . "&amenidad6=" . urlencode($fila['amenidad6']) . "&ubicacion=" . urlencode($fila['ubicacion']) . "&precio_noche=" . urlencode($fila['precio_noche']) . "&imagen=" . urlencode($imagenes[0]) . "' class='btn_reservar'>Reservar</a>";
                        echo "</div>"; 

                        echo "</div>"; // Cierre de publicacion_container
                    }
                }
            } else {
                echo "No se encontraron publicaciones.";
            }

            // Cerrar la conexión
            mysqli_close($conex);
            ?>
        </div>
        <!-- Fin Ver publicaciones-->

        
    <!--Scripts-->
    <script src="script.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <!--Fin Scripts-->
</body>

</html>

