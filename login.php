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
        $_SESSION['username'] = $username;
        $_SESSION['roles'] = $row['roles'];
        // Guardar el nombre de usuario en una variable de sesión
        //$_SESSION['username'] = $username;
        
        // Alerta exitosa con SweetAlert2
        echo '<script>
        Swal.fire({
            icon: "success",
            title: "Inicio de sesión exitoso",
            text: "Has iniciado sesión correctamente.",
            confirmButtonText: "OK"
        }).then(function() {
            window.location.href = "inicio.php";
        });
        </script>';
    } else {
        // Alerta de error con SweetAlert2
        echo '<script>
        Swal.fire({
            icon: "error",
            title: "Error",
            text: "Email o contraseña incorrectos.",
            confirmButtonText: "OK"
        });
        </script>';
    }
}
?>
