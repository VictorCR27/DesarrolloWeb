<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Costa Rica</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="publicStyle.css">
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
            </nav>
        </header>
        <!--Fin Header-->

    <h2>Reservar Hotel</h2>
    <div>
        <img src="<?php echo urldecode($_GET['imagen']); ?>" alt="Imagen del hotel">
    </div>
    <form action="procesar_reserva.php" method="post">
        <label>Nombre del hotel: <?php echo $_GET['nombre_hotel']; ?></label><br>
        <label>Amenidades: <?php echo $_GET['amenidades']; ?></label><br>
        <label>Ubicación: <?php echo $_GET['ubicacion']; ?></label><br>
        <label>Precio por noche: <?php echo $_GET['precio_noche']; ?></label><br>
        <!-- Agregar más campos de reserva aquí -->
        <input type="submit" value="Confirmar Reserva">
    </form>
</body>
</html>
