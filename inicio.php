<?php

session_start();

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    echo '<p>Bienvenid@' . $username . '</p>';
} else {
    echo '<p>Error: Usuario no encontrado.</p>';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
</head>
<body>
    <h1>Usuario valido</h1>
</body>
</html>