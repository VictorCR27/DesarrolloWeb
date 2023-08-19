<?php
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
            <h2><a class="logo" href="index.php">Hotel DESAP</a></h2>
            <nav class="navigation">
                <?
                // Verificar si el rol es administrador
                if (isset($_SESSION['roles']) && $_SESSION['roles'] === 'admin') {
                    echo '<a href="publicar.php">Publicar</a>';
                    echo '<a href="ver_publicaciones.php">Ver publicaciones</a>';}
                ?>
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
                            <div class="txtCarrusel">
                                <h2>Los mejores hoteles en Centroamérica</h2>
                            </div>
                        </div>
                    </div>

                    <div class="itemCarrusel" id="itemCarrusel-2" >
                        <div class="imgCarrusel" id="img-2">
                            <img src="./imgCarrusel/img-2.jpg" alt="item-2">
                            <div class="txtCarrusel">
                                <h2>Los mejores hoteles en Centroamérica</h2>
                            </div>
                        </div>
                    </div>
            
                    <div class="itemCarrusel" id="itemCarrusel-3">
                        <div class="imgCarrusel" id="img-3">
                            <img src="./imgCarrusel/img-3.jpg" alt="item-3">
                            <div class="txtCarrusel">
                                <h2>Los mejores hoteles en Centroamérica</h2>
                            </div>
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
                            <a href="CostaRica.php" class="btn_hotel">Ver hoteles</a>
                        </div>
                    </div>

                    <div class="card">
                        <img src="imgCarrusel/nicaragua.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h4 class="card-title">Nicaragua</h4>
                            <p class="txt_desc_pais">Gran país con hermosas playas</p>
                            <a href="Nicaragua.php" class="btn_hotel">Ver hoteles</a>
                        </div>
                    </div>

                    <div class="card">
                        <img src="imgCarrusel/honduras.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h4 class="card-title">Honduras</h4>
                            <p class="txt_desc_pais">Gran país con hermosas playas</p>
                            <a href="Honduras.php" class="btn_hotel">Ver hoteles</a>
                        </div>
                    </div>
                </div>

                <div class="paises1">
                    <div class="card">
                        <img src="imgCarrusel/guatemala.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h4 class="card-title">Guatemala</h4>
                            <p class="txt_desc_pais">Gran país con hermosas playas</p>
                            <a href="Guatemala.php" class="btn_hotel">Ver hoteles</a>
                        </div>
                    </div>

                    <div class="card">
                        <img src="imgCarrusel/panamaa.webp" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h4 class="card-title">Panamá</h4>
                            <p class="txt_desc_pais">Gran país con hermosas playas</p>
                            <a href="Panama.php" class="btn_hotel">Ver hoteles</a>
                        </div>
                    </div>

                    <div class="card">
                        <img src="imgCarrusel/salvador.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h4 class="card-title">El Salvador</h4>
                            <p class="txt_desc_pais">Gran país con hermosas playas</p>
                            <a href="Salvador.php" class="btn_hotel">Ver hoteles</a>
                        </div>
                    </div>
                </div>

                <div class="paises2">
                    <div class="card">
                        <img src="imgCarrusel/belice.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h4 class="card-title">Belice</h4>
                            <p class="txt_desc_pais">Gran país con hermosas playas</p>
                            <a href="Belice.php" class="btn_hotel">Ver hoteles</a>
                        </div>
                    </div>
                </div>
                <!--Fin Cards-->

    <div class="reviews-completo">
        <h2>Reseñas</h2>
        <div class="carousel" data-carousel>
        <div class="carousel-buttons">
          <button
            class="carousel-button carousel-button_previous"
            data-carousel-button-previous
          >
            <span class="fas fa-chevron-circle-left"></span>
          </button>
          <button
            class="carousel-button carousel-button_next"
            data-carousel-button-next
          >
            <span class="fas fa-chevron-circle-right"></span>
          </button>
        </div>
        <div class="slides" data-carousel-slides-container>
          <div class="slide">
          <div class="reviews">
             <div class="reviews-contenedor">     
                 <div class="reviews-icono">
                   <img src="imgCarrusel/avatar-hombre.png">
                 </div>
                     <div class="reviews-contenido">
                       <h4>Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti magnam recusandae velit nemo facere aut minus
                           perspiciatis odit possimus at?</h4>
                       <h6>Nombre</h6>
                         <img src="imgCarrusel/star_FILL1_wght700_GRAD0_opsz48.svg#ebd725">
                         <img src="imgCarrusel/star_FILL1_wght700_GRAD0_opsz48.svg#ebd725">
                         <img src="imgCarrusel/star_FILL1_wght700_GRAD0_opsz48.svg#ebd725">
                         <img src="imgCarrusel/star_FILL1_wght700_GRAD0_opsz48.svg#ebd725">
                        <svg xmlns="http://www.w3.org/2000/svg" height="35" viewBox="0 -960 960 960" width="35">
                          <path
                            d="m337-225 143-85 143 86-39-161 126-110-166-14-64-152-64 152-166 13 126 109-39 162Zm143 24L292-87q-14 8-28 7t-25-9q-11-8-16-20.5t-2-28.5l50-214-166-145q-12-10-15.5-23.5T90-547q3-13 14.5-22t27.5-10l219-19 85-203q6-15 18.5-22t25.5-7q13 0 25.5 7t18.5 22l85 203 220 19q15 1 26.5 10t14.5 22q4 13 .5 26.5T855-497L689-352l50 214q3 16-2 28.5T721-89q-11 8-25 9t-28-7L480-201Zm0-232Z" />
                        </svg> </div>
             </div>
            </div>
          </div>
          <div class="slide">
          <div class="reviews">
             <div class="reviews-contenedor">     
                 <div class="reviews-icono">
                   <img src="imgCarrusel/avatar-mujer.png">
                 </div>
                     <div class="reviews-contenido">
                       <h4>Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti magnam recusandae velit nemo facere aut minus
                           perspiciatis odit possimus at?</h4>
                       <h6>Nombre</h6>
                         <img src="imgCarrusel/star_FILL1_wght700_GRAD0_opsz48.svg#ebd725">
                         <img src="imgCarrusel/star_FILL1_wght700_GRAD0_opsz48.svg#ebd725">
                         <img src="imgCarrusel/star_FILL1_wght700_GRAD0_opsz48.svg#ebd725">
                         <img src="imgCarrusel/star_FILL1_wght700_GRAD0_opsz48.svg#ebd725">
                        <svg xmlns="http://www.w3.org/2000/svg" height="35" viewBox="0 -960 960 960" width="35">
                          <path
                            d="m337-225 143-85 143 86-39-161 126-110-166-14-64-152-64 152-166 13 126 109-39 162Zm143 24L292-87q-14 8-28 7t-25-9q-11-8-16-20.5t-2-28.5l50-214-166-145q-12-10-15.5-23.5T90-547q3-13 14.5-22t27.5-10l219-19 85-203q6-15 18.5-22t25.5-7q13 0 25.5 7t18.5 22l85 203 220 19q15 1 26.5 10t14.5 22q4 13 .5 26.5T855-497L689-352l50 214q3 16-2 28.5T721-89q-11 8-25 9t-28-7L480-201Zm0-232Z" />
                        </svg>
                     </div>
             </div>
         </div>
          </div>
          <div class="slide">
          <div class="reviews">
            <div class="reviews-contenedor">     
                <div class="reviews-icono">
                  <img src="imgCarrusel/avatar-hombre2.png">
                </div>
                    <div class="reviews-contenido">
                      <h4>Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti magnam recusandae velit nemo facere aut minus
                          perspiciatis odit possimus at?</h4>
                      <h6>Nombre</h6>
                        <img src="imgCarrusel/star_FILL1_wght700_GRAD0_opsz48.svg#ebd725">
                        <img src="imgCarrusel/star_FILL1_wght700_GRAD0_opsz48.svg#ebd725">
                        <img src="imgCarrusel/star_FILL1_wght700_GRAD0_opsz48.svg#ebd725">
                        <img src="imgCarrusel/star_FILL1_wght700_GRAD0_opsz48.svg#ebd725">
                        <svg xmlns="http://www.w3.org/2000/svg" height="35" viewBox="0 -960 960 960" width="35">
                          <path
                            d="m337-225 143-85 143 86-39-161 126-110-166-14-64-152-64 152-166 13 126 109-39 162Zm143 24L292-87q-14 8-28 7t-25-9q-11-8-16-20.5t-2-28.5l50-214-166-145q-12-10-15.5-23.5T90-547q3-13 14.5-22t27.5-10l219-19 85-203q6-15 18.5-22t25.5-7q13 0 25.5 7t18.5 22l85 203 220 19q15 1 26.5 10t14.5 22q4 13 .5 26.5T855-497L689-352l50 214q3 16-2 28.5T721-89q-11 8-25 9t-28-7L480-201Zm0-232Z" />
                        </svg>
                    </div>
                </div>
            </div>
          </div>
          <div class="slide">
          <div class="reviews">
            <div class="reviews-contenedor">     
                <div class="reviews-icono">
                  <img src="imgCarrusel/avatar-mujer2.png">
                </div>
                    <div class="reviews-contenido">
                      <h4>Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti magnam recusandae velit nemo facere aut minus
                          perspiciatis odit possimus at?</h4>
                      <h6>Nombre</h6>
                        <img src="imgCarrusel/star_FILL1_wght700_GRAD0_opsz48.svg#ebd725">
                        <img src="imgCarrusel/star_FILL1_wght700_GRAD0_opsz48.svg#ebd725">
                        <img src="imgCarrusel/star_FILL1_wght700_GRAD0_opsz48.svg#ebd725">
                        <img src="imgCarrusel/star_FILL1_wght700_GRAD0_opsz48.svg#ebd725">
                        <svg xmlns="http://www.w3.org/2000/svg" height="35" viewBox="0 -960 960 960" width="35">
                          <path
                            d="m337-225 143-85 143 86-39-161 126-110-166-14-64-152-64 152-166 13 126 109-39 162Zm143 24L292-87q-14 8-28 7t-25-9q-11-8-16-20.5t-2-28.5l50-214-166-145q-12-10-15.5-23.5T90-547q3-13 14.5-22t27.5-10l219-19 85-203q6-15 18.5-22t25.5-7q13 0 25.5 7t18.5 22l85 203 220 19q15 1 26.5 10t14.5 22q4 13 .5 26.5T855-497L689-352l50 214q3 16-2 28.5T721-89q-11 8-25 9t-28-7L480-201Zm0-232Z" />
                        </svg>
                    </div>
                </div>
            </div>
          </div>
        </div>
      </div>

    </div>
    

                <!--Mapa-->
                <div class="mapa" style="text-align: center;">
                    <h2 style="text-align: left; padding-left: 35px;font-family: 'Jost', sans-serif; color: rgb(23, 146, 29);">Mapa de Centroamérica</h2>
                    <p style="text-align: left; padding-left: 35px; font-family: 'Rubik', sans-serif; padding-top: 8px; color: rgb(87, 87, 87);">Abajo encontrarás un mapa de Centroamérica, para visitar cada país, solo te posicionas sobre el país que deseas y lo seleccionas</p>
                    <img src="imgCarrusel/mapa_centroamerica_vector.svg" height="500px" width="500px" usemap="#cntrm_mapa">

                    <map name="cntrm_mapa">
                        <area alt="Guatemala" title="Guatemala" href="Guatemala.php" coords="73,108,125,109,123,178,144,176,98,245,37,228,51,167,90,166,64,140,68,126" shape="poly">
                        <area alt="Belice" title="Belice" href="Belice.php" coords="127,103,125,175,150,155,156,84" shape="poly">
                        <area alt="Honduras" title="Honduras" href="Honduras.php" coords="249,208,259,214,294,201,256,175,185,176,162,176,149,184,139,188,129,206,124,221,134,230,193,251,197,244,231,231,248,207,165,241,172,255,176,261,184,260" shape="poly">
                        <area alt="El Salvador" title="El Salvador" href="Salvador.php" coords="156,265,164,244,121,224,106,235,102,246,108,250" shape="poly">
                        <area alt="Nicaragua" title="Nicaragua" href="Nicaragua.php" coords="250,216,294,205,279,339,223,331,192,298,170,275,197,261,198,245,231,239,240,224" shape="poly">
                        <area alt="Costa Rica" title="Costa Rica" href="CostaRica.php" coords="257,337,284,347,305,377,299,421,286,417,259,381,241,379,219,366,225,331" shape="poly">
                        <area alt="Panama" title="Panama" href="Panama.php" coords="442,453,410,400,374,463,302,423,308,388,400,384,444,394,465,435" shape="poly">
                    </map>
                 </div>
                 <!--Fin Mapa-->
            </div>
        </div>
        
    <!--Scripts-->
    <script src="js/script.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="https://kit.fontawesome.com/c14ef371b4.js" crossorigin="anonymous"></script>
    <!--Fin Scripts-->   
</body>

</html>

