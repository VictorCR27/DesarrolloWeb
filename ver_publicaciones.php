<?php
include("registro.php");
include("login.php");

?>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['eliminar_id'])) {
    // Obtener el ID de la publicación a eliminar
    $eliminar_id = mysqli_real_escape_string($conex, $_POST['eliminar_id']);

    // Ejecutar la consulta para eliminar la publicación
    $eliminar_query = "DELETE FROM publicaciones WHERE id = '$eliminar_id'";
    $resultado_eliminar = mysqli_query($conex, $eliminar_query);

    if ($resultado_eliminar) {
        echo "La publicación se ha eliminado correctamente.";
        // Puedes redirigir a la misma página para actualizar la lista de publicaciones
        // header("Location: ver_publicaciones.php");
    } else {
        echo "Error al eliminar la publicación: " . mysqli_error($conex);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Ver publicaciones</title>
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
        <div style="margin-top:100px" class="publicaciones">
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
                    echo "<div class='publicacion_container'>";
                    
                    echo "<div class='publicacion'>";
                    echo "<h3>".$fila['nombre_hotel']."</h3>";
                    echo "<p>Amenidades: ".$fila['amenidad1']."</p>";
                    echo "<p>Amenidades: ".$fila['amenidad2']."</p>";
                    echo "<p>Amenidades: ".$fila['amenidad3']."</p>";
                    echo "<p>Amenidades: ".$fila['amenidad4']."</p>";
                    echo "<p>Amenidades: ".$fila['amenidad5']."</p>";
                    echo "<p>Amenidades: ".$fila['amenidad6']."</p>";
                    echo "<p>País: ".$fila['pais']."</p>";
                    echo "<p>Ubicación: ".$fila['ubicacion']."</p>";
                    echo "<p>Precio por noche: ".$fila['precio_noche']."</p>";
                    echo "<form method='post'>";
                    echo "<input type='hidden' name='eliminar_id' value='".$fila['id']."' />";
                    echo "<button class='btn-eliminar' type='submit'>Eliminar</button>";
                    echo "</form>";
                    echo "</div>";
                    
                    // Obtener las imágenes
                    $imagenes = explode(',', $fila['imagenes']);
                    foreach ($imagenes as $imagen) {
                        echo "<img class='imgs_hoteles' src='".$imagen."' alt='Imagen del hotel'>";
                        echo "<hr>";
                    }
                    
                    echo "</div>"; // Cierre de publicacion_container
                }
            } else {
                echo "No se encontraron publicaciones.";
            }

            // Cerrar la conexión
            mysqli_close($conex);
            ?>
        </div>
        <!-- Fin Ver publicaciones-->



</body>
</html>
