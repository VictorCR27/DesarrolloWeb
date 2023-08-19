<?php
include("registro.php");
include("login.php");

if (!$conex) {
    die("Error de conexión: " . mysqli_connect_error());
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Publicar</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <style>
        .form-publicar{
            margin-top: 100px;
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
                echo '<a href="ver_publicaciones.php">Ver publicaciones</a>';
            }
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

    <!--Form publicación-->
    <h2>Publicar Oferta de Hotel</h2>
    <div class="form-publicar">
        <form action="publicar.php" method="POST" enctype="multipart/form-data">
            <label for="nombre_hotel">Nombre del Hotel:</label>
            <input type="text" name="nombre_hotel"><br><br>

            <label for="amenidad1">Amenidad 1:</label>
            <input type="text" name="amenidad1"><br><br>

            <label for="amenidad2">Amenidad 2:</label>
            <input type="text" name="amenidad2"><br><br>

            <label for="amenidad3">Amenidad 3:</label>
            <input type="text" name="amenidad3"><br><br>

            <label for="amenidad4">Amenidad 4:</label>
            <input type="text" name="amenidad4"><br><br>

            <label for="amenidad5">Amenidad 5:</label>
            <input type="text" name="amenidad5"><br><br>

            <label for="amenidad6">Amenidad 6:</label>
            <input type="text" name="amenidad6"><br><br>


            <label for="pais">País:</label>
            <select name="pais" id="pais">
                <option value="Belice">Belice</option>
                <option value="Costa Rica">Costa Rica</option>
                <option value="El Salvador">El Salvador</option>
                <option value="Guatemala">Guatemala</option>
                <option value="Honduras">Honduras</option>
                <option value="Nicaragua">Nicaragua</option>
                <option value="Panamá">Panamá</option>
            </select><br><br>

            <label for="ubicacion">Ubicación:</label>
            <input type="text" id="ubicacion-input" name="ubicacion" placeholder="Busca una ubicación en el mapa"><br><br>
            <div id="map" style="height: 500px; width: 800px;"></div>
            <input type="hidden" id="coordenadas" name="coordenadas">

            


            <label for="imagenes">Imágenes:</label>
            <input type="file" name="imagenes[]" multiple><br><br>

            <label for="precio_noche">Precio por Noche:</label>
            <input type="text" name="precio_noche"><br><br>

            <input type="submit" value="Publicar">
        </form>
    </div>
    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Obtener datos del formulario
        $nombre_hotel = $_POST['nombre_hotel'];
        $amenidades = $_POST['amenidades'];
        $pais = $_POST['pais']; // Obtener el país seleccionado
        $ubicacion = $_POST['ubicacion'];
        $precio_noche = $_POST['precio_noche'];

        // Procesar imágenes
        $imagenes = array();
        foreach ($_FILES['imagenes']['tmp_name'] as $key => $tmp_name) {
            $imagen_name = $_FILES['imagenes']['name'][$key];
            $imagen_tmp = $_FILES['imagenes']['tmp_name'][$key];
            $imagen_destino = "imgPublicar/" . $imagen_name;
            move_uploaded_file($imagen_tmp, $imagen_destino);
            $imagenes[] = $imagen_destino;
        }

        // Insertar datos en la base de datos
        $sql = "INSERT INTO publicaciones (nombre_hotel, amenidades, pais, ubicacion, imagenes, precio_noche)
        VALUES ('$nombre_hotel', '$amenidades', '$pais', '$ubicacion', '" . implode(',', $imagenes) . "', $precio_noche)";

        $resultado = mysqli_query($conex, $sql);

        if ($resultado) {
            echo "La publicación se ha agregado correctamente.";
        } else {
            echo "Error al agregar la publicación: " . mysqli_error($conexion);
        }
    }
    ?>
    
    <script>
    // Inicializar el mapa centrado en Centroamérica
    var map = L.map('map').setView([14.1, -89.4], 6);

    // Agregar el mapa base (puedes elegir un proveedor de mapas)
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    // Manejar la selección de ubicación
   // Manejar la selección de ubicación
    map.on('click', function(e) {
        const coordenadasInput = document.getElementById('coordenadas');
        const ubicacionInput = document.getElementById('ubicacion-input');
        
        coordenadasInput.value = JSON.stringify({
            lat: e.latlng.lat,
            lng: e.latlng.lng
        });

        // Reverse geocoding to get the place name based on coordinates
        fetch(`https://nominatim.openstreetmap.org/reverse?format=json&lat=${e.latlng.lat}&lon=${e.latlng.lng}`)
            .then(response => response.json())
            .then(data => {
                const placeName = data.display_name;
                ubicacionInput.value = placeName;
            });
    });
    </script>


</body>
</html>
