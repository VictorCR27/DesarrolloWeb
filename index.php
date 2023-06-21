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

                <?
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

                    <div class="buttons-register">
                        <div class="role-buttons">
                            <button type="button" name="role" value="admin" class="role-button" onclick="toggleButton(this)">Administrador</button>
                            <button type="button" name="role" value="user" class="role-button" onclick="toggleButton(this)">Cliente</button>
                        </div>
                        <input type="hidden" name="selectedRole" id="selected-role">
                    </div>

                    <button type="submit" name="register" id="registrar" class="btn">Registrarse</button>

                    <div class="login-register">
                        <p>¿Tienes una cuenta? <a href="#" class="login-link">Login</a></p>
                    </div>
                </form>
            </div>
        </div>
        <!--Fin Formulario-->

        <div class="container">
            <!--Body Images-->
            <div class="carrusel-wrapper">
                <div id="conteItemsCarrusel">

                    <div class="itemCarrusel" id="itemCarrusel-1">
                        <div class="imgCarrusel" id="img-1">
                            <img src="./imgCarrusel/img-1.jpg"  alt="item-1">
                        </div>
                    </div>

                    <div class="itemCarrusel" id="itemCarrusel-2" >
                        <div class="imgCarrusel" id="img-2">
                            <img src="./imgCarrusel/img-2.jpg" alt="item-2">
                        </div>
                    </div>

                    <div class="itemCarrusel" id="itemCarrusel-3">
                        <div class="imgCarrusel" id="img-3">
                            <img src="./imgCarrusel/img-3.jpg" alt="item-3">
                        </div>
                    </div>

                </div>

            </div>
            <!--Fin Body Images-->
            
            <div class="container-cards">
                <!--Cards de Paises-->
                <div class="paises">
                    <div class="card">
                        <img src="imgCarrusel/costarica.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h4 class="card-title">Costa Rica</h4>
                            <p class="txt_desc_pais">Gran país con hermosas playas</p>
                            <a href="#" class="btn_hotel">Ver hoteles</a>
                        </div>
                    </div>

                    <div class="card">
                        <img src="imgCarrusel/nicaragua.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h4 class="card-title">Nicaragua</h4>
                            <p class="txt_desc_pais">Gran país con hermosas playas</p>
                            <a href="#" class="btn_hotel">Ver hoteles</a>
                        </div>
                    </div>

                    <div class="card">
                        <img src="imgCarrusel/honduras.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h4 class="card-title">Honduras</h4>
                            <p class="txt_desc_pais">Gran país con hermosas playas</p>
                            <a href="#" class="btn_hotel">Ver hoteles</a>
                        </div>
                    </div>
                </div>

                <div class="paises1">
                    <div class="card">
                        <img src="imgCarrusel/guatemala.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h4 class="card-title">Guatemala</h4>
                            <p class="txt_desc_pais">Gran país con hermosas playas</p>
                            <a href="#" class="btn_hotel">Ver hoteles</a>
                        </div>
                    </div>

                    <div class="card">
                        <img src="imgCarrusel/panamaa.webp" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h4 class="card-title">Panamá</h4>
                            <p class="txt_desc_pais">Gran país con hermosas playas</p>
                            <a href="#" class="btn_hotel">Ver hoteles</a>
                        </div>
                    </div>

                    <div class="card">
                        <img src="imgCarrusel/salvador.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h4 class="card-title">El Salvador</h4>
                            <p class="txt_desc_pais">Gran país con hermosas playas</p>
                            <a href="#" class="btn_hotel">Ver hoteles</a>
                        </div>
                    </div>
                </div>

                <div class="paises2">
                    <div class="card">
                        <img src="imgCarrusel/belice.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h4 class="card-title">Belice</h4>
                            <p class="txt_desc_pais">Gran país con hermosas playas</p>
                            <a href="#" class="btn_hotel">Ver hoteles</a>
                        </div>
                    </div>
                </div>
                <!--Fin Cards-->

                <!--Mapa-->
                <div class="mapa" style="text-align: center;">
                    <h2 style="text-align: left; padding-left: 35px;font-family: 'Jost', sans-serif; color: rgb(23, 146, 29);">Mapa de Centroamérica</h2>
                    <p style="text-align: left; padding-left: 35px; font-family: 'Rubik', sans-serif; padding-top: 8px; color: rgb(87, 87, 87);">Abajo encontrarás un mapa de Centroamérica, para visitar cada país, solo te posicionas sobre el país que deseas y lo seleccionas</p>
                    <img src="imgCarrusel/mapa_centroamerica_vector.svg" height="500px" width="500px" usemap="#cntrm_mapa">

                    <map name="cntrm_mapa">
                        <area alt="Guatemala" title="Guatemala" href="" coords="73,108,125,109,123,178,144,176,98,245,37,228,51,167,90,166,64,140,68,126" shape="poly">
                        <area alt="Belice" title="Belice" href="Belice.html" coords="127,103,125,175,150,155,156,84" shape="poly">
                        <area alt="Honduras" title="Honduras" href="" coords="249,208,259,214,294,201,256,175,185,176,162,176,149,184,139,188,129,206,124,221,134,230,193,251,197,244,231,231,248,207,165,241,172,255,176,261,184,260" shape="poly">
                        <area alt="El Salvador" title="El Salvador" href="" coords="156,265,164,244,121,224,106,235,102,246,108,250" shape="poly">
                        <area alt="Nicaragua" title="Nicaragua" href="" coords="250,216,294,205,279,339,223,331,192,298,170,275,197,261,198,245,231,239,240,224" shape="poly">
                        <area alt="Costa Rica" title="Costa Rica" href="CostaRica.html" coords="257,337,284,347,305,377,299,421,286,417,259,381,241,379,219,366,225,331" shape="poly">
                        <area alt="Panama" title="Panama" href="" coords="442,453,410,400,374,463,302,423,308,388,400,384,444,394,465,435" shape="poly">
                    </map>
                 </div>
                 <!--Fin Mapa-->
            </div>
        </div>

       

        
    <!--Scripts-->
    <script src="script.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <!--Fin Scripts-->
</body>

</html>

