<?php
include("db_conn.php");

// Verificar la conexión
if (!$conex) {
    die("Error al conectar con la base de datos: " . mysqli_connect_error());
}

// Verificar si el formulario ha sido enviado y el botón "Register" ha sido presionado
if (isset($_POST['register'])) {
    // Obtener los valores del formulario
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validar que todos los campos estén completos
    if (empty($username) || empty($email) || empty($password)) {
        echo '<script>alert("Rellena todos los campos");</script>';
    } else {
        // Realizar el insert de datos en la tabla correspondiente
        $sql = "INSERT INTO RegistroWeb (username, email, password) VALUES ('$username', '$email', '$password')";

        if (mysqli_query($conex, $sql)) {
            echo '<script>alert("Registro exitoso. Los datos han sido insertados en la base de datos.");</script>';
            echo '<script>window.location.href = "index.php";</script>';
        } else {
            echo '<script>alert("Error al insertar los datos: ' . mysqli_error($conex) . '");</script>';
        }
    }
}
?>