<?php
include("db_conn.php");
if (!$conex) {
    die("Error al conectar con la base de datos: " . mysqli_connect_error());
}

// Iniciar la sesión
session_start();

if (isset($_POST['login'])) {
    // Obtener los valores del formulario
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM RegistroWeb WHERE email = '$email' AND password = '$password'";
    $result = mysqli_query($conex, $sql);

    if (mysqli_num_rows($result) > 0) {
        // Obtener el nombre de usuario de la consulta
        $row = mysqli_fetch_assoc($result);
        $username = $row['username'];

        // Guardar el nombre de usuario en una variable de sesión
        $_SESSION['username'] = $username;
        echo '<script>alert("Inicio de sesión exitoso.");</script>';
        echo '<script>window.location.href = "inicio.php";</script>';
    
    } else {
        echo '<script>alert("Email o contraseña incorrectos.");</script>';
    }
}
?>
