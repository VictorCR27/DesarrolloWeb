<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmar Reserva</title>
</head>
<body>
    <h1>Confirmar Reserva</h1>

    <?php
    // Recibir los datos de reserva confirmada desde la URL
    $nombreHotel = isset($_GET['nombre_hotel']) ? $_GET['nombre_hotel'] : "";
    $ubicacion = isset($_GET['ubicacion']) ? $_GET['ubicacion'] : "";
    $precioNoche = isset($_GET['precio_noche']) ? $_GET['precio_noche'] : "";
    $fechaLlegada = isset($_GET['fechaLlegada']) ? $_GET['fechaLlegada'] : "";
    $fechaSalida = isset($_GET['fechaSalida']) ? $_GET['fechaSalida'] : "";
    $cantidadAdultos = isset($_GET['cantidadAdultos']) ? $_GET['cantidadAdultos'] : "";
    $cantidadNinos = isset($_GET['cantidadNinos']) ? $_GET['cantidadNinos'] : "";
    $cantidadHabitaciones = isset($_GET['cantidadHabitaciones']) ? $_GET['cantidadHabitaciones'] : "";

    // Mostrar los datos de reserva confirmada
    echo "<p>Hotel: $nombreHotel</p>";
    echo "<p>Ubicación: $ubicacion</p>";
    echo "<p>Precio por noche: $precioNoche</p>";
    echo "<p>Fecha de llegada: $fechaLlegada</p>";
    echo "<p>Fecha de salida: $fechaSalida</p>";
    echo "<p>Cantidad de adultos: $cantidadAdultos</p>";
    echo "<p>Cantidad de niños: $cantidadNinos</p>";
    echo "<p>Cantidad de habitaciones: $cantidadHabitaciones</p>";

    // Aquí podrías realizar más acciones, como procesar el pago, almacenar la reserva en la base de datos, etc.
    ?>

    <p>¡Gracias por confirmar tu reserva!</p>
</body>
</html>
