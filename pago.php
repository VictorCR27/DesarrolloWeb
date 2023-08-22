<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pago Final</title>
    <link rel="stylesheet" href="css/pagar.css">
    <link rel="stylesheet" href="style.css">
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
                <a href="#">Servicios</a>
                <a href="#">Quienes somos?</a>
                
            </nav>
        </header>
        <!--Fin Header-->

    <div class="payment-form" style="margin-top: 50px;">
        <h1>Detalles de Pago</h1>
        <div class="form-section">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required>

            <label for="apellidos">Apellidos:</label>
            <input type="text" id="apellidos" name="apellidos" required>

            <label for="correo">Correo electrónico:</label>
            <input type="email" id="correo" name="correo" required>

            <label for="telefono">Teléfono:</label>
            <input type="tel" id="telefono" name="telefono" required>
        </div>
        <div class="form-section">
            <label for="titular">Titular de la Tarjeta:</label>
            <input type="text" id="titular" name="titular" required>

            <label for="tipo_tarjeta">Tipo de Tarjeta:</label>
            <select id="tipo_tarjeta" name="tipo_tarjeta" required>
                <option value="visa">Visa</option>
                <option value="mastercard">MasterCard</option>
                <option value="amex">American Express</option>
            </select>

            <label for="numero_tarjeta">Número de Tarjeta:</label>
            <input type="text" id="numero_tarjeta" name="numero_tarjeta" required>

            <div class="card-details">
                <div class="expiry">
                    <label for="vencimiento_mes">Vencimiento (mes):</label>
                    <input type="text" id="vencimiento_mes" name="vencimiento_mes" required>
                </div>
                <div class="expiry">
                    <label for="vencimiento_ano">Vencimiento (año):</label>
                    <input type="text" id="vencimiento_ano" name="vencimiento_ano" required>
                </div>
            </div>

            <label for="codigo_seguridad">Código de Seguridad:</label>
            <input type="text" id="codigo_seguridad" name="codigo_seguridad" required>
        </div>
        <div class="btn_pagar">
            <button type="submit">Realizar Pago</button>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const button = document.querySelector("button[type='submit']");

            button.addEventListener("click", function (event) {
                event.preventDefault();

                // Verificar si todos los campos están llenos
                const fields = document.querySelectorAll("input[required], select[required]");
                let allFieldsFilled = true;

                fields.forEach((field) => {
                    if (!field.value.trim()) {
                        allFieldsFilled = false;
                    }
                });

                if (allFieldsFilled) {
                    // Todos los campos están llenos, mostrar la alerta de éxito
                    Swal.fire({
                        icon: "success",
                        title: "¡Pago Completado!",
                        text: "Tu pago se ha procesado correctamente.",
                        confirmButtonColor: "#007bff",
                    }).then(() => {
                        // Redirigir a index.php
                        window.location.href = "index.php";
                    });
                } else {
                    // Al menos un campo está vacío, mostrar alerta de campos vacíos
                    Swal.fire({
                        icon: "error",
                        title: "¡Campos Vacíos!",
                        text: "Por favor, completa todos los campos antes de realizar el pago.",
                        confirmButtonColor: "#d33",
                    });
                }
            });
        });
    </script>



</body>
</html>
