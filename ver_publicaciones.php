<?php
include("registro.php");
include("login.php");

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
            <h2><a class="logo" href="index.php">Hotel DESAP</a></h2>
            <nav class="navigation">
                <?php
                // Verificar si el rol es administrador
                if (isset($_SESSION['roles']) && $_SESSION['roles'] === 'admin') {
                    echo '<a href="publicar.php">Publicar</a>';
                    echo '<a href="ver_publicaciones.php">Ver publicaciones</a>';}
                ?>
                
                <a href="#">Servicios</a>
                <a href="#">Quienes somos?</a>
                <a href="#">Cuenta</a>
                <?php
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
                    echo "<button type='submit'>Eliminar</button>";
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
