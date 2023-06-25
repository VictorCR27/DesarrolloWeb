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

    <style>
        .publicaciones {
            margin-top: 100px;
            margin-left: 50px;
        }

        .publicacion {
            margin-bottom: 20px;
        }
    </style>
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
                <a href="#">Reservar</a>
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

        <div class="publicaciones">
            <?php
            if (!$conex) {
                die("Error de conexión: " . mysqli_connect_error());
            }

            // Verificar si se envió una solicitud de eliminación
            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['eliminar_id'])) {
                $eliminar_id = $_POST['eliminar_id'];

                // Eliminar la fila de la base de datos
                $eliminar_sql = "DELETE FROM publicaciones WHERE id = $eliminar_id";
                $eliminar_resultado = mysqli_query($conex, $eliminar_sql);

                if ($eliminar_resultado) {
                    echo "La publicación se ha eliminado correctamente.";
                } else {
                    echo "Error al eliminar la publicación: " . mysqli_error($conex);
                }
            }

            // Realizar la consulta
            $sql = "SELECT * FROM publicaciones";
            $resultado = mysqli_query($conex, $sql);

            // Verificar si hay resultados
            if (mysqli_num_rows($resultado) > 0) {
                // Procesar los resultados
                while ($fila = mysqli_fetch_assoc($resultado)) {
                    echo "<div class='publicacion'>";
                    echo "<h3>".$fila['nombre_hotel']."</h3>";
                    echo "<p>Amenidades: ".$fila['amenidades']."</p>";
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
                        echo "<img src='".$imagen."' alt='Imagen del hotel'>";
                    }
                }
            } else {
                echo "No se encontraron publicaciones.";
            }

            // Cerrar la conexión
            mysqli_close($conex);
            ?>
        </div>

</body>
</html>
