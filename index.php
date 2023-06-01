<?
include("registro.php");
include("login.php");

?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>
        <link rel="stylesheet" href="style.css">
    </head>

    <body>

        <!--Header-->
        <header>
            <h2 class="logo">Hotel DESAP</h2>
            <nav class="navigation">
                <a href="#">Reservar</a>
                <a href="#">Servicios</a>
                <a href="#">Quienes somos?</a>
                <a href="#">Cuenta</a>
                <button class="btnLogin-popup">Login</button>

            </nav>
        </header>
        <!--Fin Header-->

        <!--Formulario-->
        <div class="wrapper">

            <span class="icon-close"><ion-icon name="close"></ion-icon></span>
            
            <!--Login-->
            <div class="form-box login">
                <h2>Login</h2>
                <form id="login-form" method="post" action="index.php" onsubmit="cleanSpaces()">
                    <div class="input-box">
                        <span class="icon"><ion-icon name="mail"></ion-icon></ion-icon></span>
                        <input type="email" name="email">
                        <label>Email</label>
                    </div>
                    <div class="input-box">
                        <span class="icon"><ion-icon name="lock-closed"></ion-icon></ion-icon></span>
                        <input type="password" name="password">
                        <label>Password</label>
                    </div>
                    <button type="submit" class="btn" name="login">Login</button>
                    <div class="login-register">
                        <p>¿No tienes una cuenta? <a href="#" class="register-link">Registrarse</a></p>
                    </div>
                </form>
            </div>
        
            <!--Registro-->
            <div class="form-box register">
                <h2>Registrarse</h2>
                <form id="register-form" method="post" action="registro.php">
                    <div class="input-box">
                        <span class="icon"><ion-icon name="person"></ion-icon></ion-icon></ion-icon></span>
                        <input type="text" name="username">
                        <label>Username</label>
                    </div>
                    <div class="input-box">
                        <span class="icon"><ion-icon name="mail"></ion-icon></ion-icon></span>
                        <input type="email" name="email">
                        <label>Email</label>
                    </div>
                    <div class="input-box">
                        <span class="icon"><ion-icon name="lock-closed"></ion-icon></ion-icon></span>
                        <input type="password" name="password">
                        <label>Password</label>
                    </div>
                    <button type="submit" name="register" id="registrar" class="btn">Registrarse</button>
                    <div class="login-register">
                        <p>¿Tienes una cuenta? <a href="#" class="login-link">Login</a></p>
                    </div>
                </form>
            </div>
        </div>
        <!--Fin Formulario-->

        <!--Body Images-->
        <div class="carrusel-wrapper">
            <div id="conteItemsCarrusel">

                <div class="itemCarrusel" id="itemCarrusel-1">
                    <div class="imgCarrusel" id="img-1">
                        <img src="./imgCarrusel/img-1.jpg"  alt="item-1">
                    </div>
                    <div class="flechasCarrusel">
                        <a href="#itemCarrusel-3"> <i><ion-icon name="chevron-back-outline"></ion-icon></i> </a>
                        <a href="#itemCarrusel-2"> <i><ion-icon name="chevron-forward-outline"></ion-icon></i> </a>
                    </div>
                </div>

                <div class="itemCarrusel" id="itemCarrusel-2" >
                    <div class="imgCarrusel" id="img-2">
                        <img src="./imgCarrusel/img-2.jpg" alt="item-2">
                    </div>
                    <div class="flechasCarrusel">
                        <a href="#itemCarrusel-1"> <i><ion-icon name="chevron-back-outline"></ion-icon></i> </a>
                        <a href="#itemCarrusel-3"> <i><ion-icon name="chevron-forward-outline"></ion-icon></i> </a>
                    </div>
                </div>

                <div class="itemCarrusel" id="itemCarrusel-3">
                    <div class="imgCarrusel" id="img-3">
                        <img src="./imgCarrusel/img-3.jpg" alt="item-3">
                    </div>
                    <div class="flechasCarrusel">
                        <a href="#itemCarrusel-2"> <i><ion-icon name="chevron-back-outline"></ion-icon></i> </a>
                        <a href="#itemCarrusel-1"> <i><ion-icon name="chevron-forward-outline"></ion-icon></i> </a>
                    </div>
                </div>

            </div>

            <div id="contePuntos">
                <a href="#itemCarrusel-1">•</a>
                <a href="#itemCarrusel-2">•</a>
                <a href="#itemCarrusel-3">•</a>
            </div>
        </div>
        <!--Fin Body Images-->

        
        <!--Scripts-->
    <script src="script.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <!--Fin Scripts-->
</body>

    </html>


