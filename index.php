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
        <link rel="icon" href="imgCarrusel/logo home.ico">
        <link rel="stylesheet" href="style.css">
    </head>

    <body>

        <!--Header-->
        <header>
        <div class="logo">
                <ul class="logohover">
                  <li>
                    <a href="">
                      <img class="peque" src="imgCarrusel/logonav1.png" alt="Logo1">
                      <img class="grande" src="imgCarrusel/logonav2.png" alt="Logo2">
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


            <div class="titulo-bienvenida">
                <h1>¡Bienvenidos a su puerta de entrada al paraíso en Centroamérica!</h1>
                <p>En nuestro rincón virtual, te sumergirás en la belleza y diversidad que esta región tiene para ofrecer. 
                    Desde playas bañadas por aguas turquesas hasta selvas exuberantes que esconden tesoros naturales, 
                    te invitamos a explorar y descubrir cada rincón único que Centroamérica tiene reservado para ti.</p>
            </div>
            
            <div class="container-cards">
                <!--Cards de Paises-->
                <div class="paises">
                    <div class="card">
                        <img src="imgCarrusel/costarica.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <a class="card-title" href="#CR-info-home">Costa Rica</a><span> | </span>
                            <a class="card-bd-hotel" href="CostaRica.php"><i class="fa-solid fa-hotel"></i> Hoteles</a>
                            <p class="txt_desc_pais">Situado en el corazón de América Central, este paraíso tropical es un destino incomparable para los amantes de la naturaleza y la aventura. Te cautivará con su impresionante biodiversidad, playas de ensueño y exuberantes selvas tropicales.</p>
                        </div>
                    </div>

                    <div class="card">
                        <img src="imgCarrusel/nicaragua.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <a class="card-title" href="#NC-info-home">Nicaragua</a><span> | </span>
                            <a class="card-bd-hotel" href="Nicaragua.php"><i class="fa-solid fa-hotel"></i> Hoteles</a>
                            <p class="txt_desc_pais">¡Bienvenido a Nicaragua, una joya escondida en América Central que te espera para una experiencia inigualable de aventura y autenticidad! Con paisajes variados y una rica cultura, Nicaragua te invita a explorar su belleza natural y su historia fascinante.</p>
                        </div>
                    </div>

                    <div class="card">
                        <img src="imgCarrusel/honduras.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <a class="card-title" href="#HD-info-home">Honduras</a><span> | </span>
                            <a class="card-bd-hotel" href="Honduras.php"><i class="fa-solid fa-hotel"></i> Hoteles</a>
                            <p class="txt_desc_pais">La naturaleza exuberante de Honduras te cautivará. Desde las majestuosas montañas hasta las selvas tropicales llenas de vida, tendrás la oportunidad de explorar una variedad de ecosistemas impresionantes.</p>
                        </div>
                    </div>
                </div>

                <div class="paises1">
                    <div class="card">
                        <img src="imgCarrusel/guatemala.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <a class="card-title" href="#GM-info-home">Guatemala</a><span> | </span>
                            <a class="card-bd-hotel" href="Guatemala.php"><i class="fa-solid fa-hotel"></i> Hoteles</a>
                            <p class="txt_desc_pais">Descubre paisajes impresionantes que van desde altas montañas hasta selvas tropicales exuberantes y lagos cristalinos. El icónico Lago de Atitlán, rodeado por volcanes majestuosos, te dejará asombrado por su belleza serena. </p>
                        </div>
                    </div>

                    <div class="card">
                        <img src="imgCarrusel/panamaa.webp" class="card-img-top" alt="...">
                        <div class="card-body">
                            <a class="card-title" href="#PM-info-home">Panamá</a><span> | </span>
                            <a class="card-bd-hotel" href="Panama.php"><i class="fa-solid fa-hotel"></i> Hoteles</a>
                            <p class="txt_desc_pais">Situado en el istmo que conecta América del Norte con América del Sur, Panamá te invita a explorar su mezcla única de culturas, impresionante biodiversidad y maravillas naturales.</p>
                        </div>
                    </div>

                    <div class="card">
                        <img src="imgCarrusel/salvador.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <a class="card-title" href="#ES-info-home">El Salvador</a><span> | </span>
                            <a class="card-bd-hotel" href="Salvador.php"><i class="fa-solid fa-hotel"></i> Hoteles</a>
                            <p class="txt_desc_pais">En El Salvador, la aventura y la autenticidad van de la mano. Tanto si buscas emocionantes actividades al aire libre como si deseas sumergirte en la rica cultura y patrimonio del país. </p>
                        </div>
                    </div>
                </div>

                <div class="paises2">
                    <div class="card">
                        <img src="imgCarrusel/belice.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <a class="card-title" href="#BL-info-home">Belice</a><span> | </span>
                            <a class="card-bd-hotel" href="Belice.php"><i class="fa-solid fa-hotel"></i> Hoteles</a>
                            <p class="txt_desc_pais">¡Bienvenido a Belice, donde el paraíso caribeño y la rica diversidad te esperan para una experiencia inolvidable! Belice te invita a explorar sus playas de arena blanca, su arrecife de coral impresionante y su herencia cultural única.</p>
                        </div>
                    </div>
                </div>
                <!--Fin Cards-->

    
    <!--Reseñas Usuarios-->
    <div class="reviews-completo">
    <h2 class="titulo-reviews">Reseñas de nuestra página</h2>
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
                       <h3>Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti magnam recusandae velit nemo facere aut minus
                           perspiciatis odit possimus at?</h3>
                       <h4>Nombre</h4>
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
                       <h3>Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti magnam recusandae velit nemo facere aut minus
                           perspiciatis odit possimus at?</h3>
                       <h4>Nombre</h4>
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
                      <h3>Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti magnam recusandae velit nemo facere aut minus
                          perspiciatis odit possimus at?</h3>
                      <h4>Nombre</h4>
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
                      <h3>Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti magnam recusandae velit nemo facere aut minus
                          perspiciatis odit possimus at?</h3>
                      <h4>Nombre</h4>
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

    <!--Fin Reseñas-->


    <!--Info Países-->

    <div class="info-paises">
        <h2 id="CR-info-home" class="titulo-pais-infoh">Costa Rica</h2>
            <div class="imgs-CR-container">
                
                <img src="imgCarrusel/catarata-CR.jpg" alt="" class="imag-info-paises">
                    <div class="txt-imag-info" id="txt-img1-CR-info">Hermosas Cataratas</div>
                </img>
                <img src="imgCarrusel/jungla_CR.jpg" alt="" class="imag-info-paises">
                    <div class="txt-imag-info">Cabañas en medio de la jungla</div>
                </img>
                <img src="imgCarrusel/playa_CR.jpeg" alt="" class="imag-info-paises">
                    <div class="txt-imag-info">Playas espectaculares</div>
                </img>
                <img src="imgCarrusel/volcan_CR.jpg" alt="" class="imag-info-paises">
                    <div class="txt-imag-info">Sorprendentes volcanes</div>
                </img>
            </div>

            <h2 id="NC-info-home" class="titulo-pais-infoh">Nicaragua</h2>
            <div class="imgs-CR-container">
                
                <img src="imgCarrusel/catarata-CR.jpg" alt="" class="imag-info-paises">
                    <div class="txt-imag-info" id="txt-img1-CR-info">Hermosas Cataratas</div>
                </img>
                <img src="imgCarrusel/jungla_CR.jpg" alt="" class="imag-info-paises">
                    <div class="txt-imag-info">Cabañas en medio de la jungla</div>
                </img>
                <img src="imgCarrusel/playa_CR.jpeg" alt="" class="imag-info-paises">
                    <div class="txt-imag-info">Playas espectaculares</div>
                </img>
                <img src="imgCarrusel/volcan_CR.jpg" alt="" class="imag-info-paises">
                    <div class="txt-imag-info">Sorprendentes volcanes</div>
                </img>
            </div>

            <h2 id="HD-info-home" class="titulo-pais-infoh">Honduras</h2>
            <div class="imgs-CR-container">
                
                <img src="imgCarrusel/catarata-CR.jpg" alt="" class="imag-info-paises">
                    <div class="txt-imag-info" id="txt-img1-CR-info">Hermosas Cataratas</div>
                </img>
                <img src="imgCarrusel/jungla_CR.jpg" alt="" class="imag-info-paises">
                    <div class="txt-imag-info">Cabañas en medio de la jungla</div>
                </img>
                <img src="imgCarrusel/playa_CR.jpeg" alt="" class="imag-info-paises">
                    <div class="txt-imag-info">Playas espectaculares</div>
                </img>
                <img src="imgCarrusel/volcan_CR.jpg" alt="" class="imag-info-paises">
                    <div class="txt-imag-info">Sorprendentes volcanes</div>
                </img>
            </div>

            <h2 id="GM-info-home" class="titulo-pais-infoh">Guatemala</h2>
            <div class="imgs-CR-container">
                
                <img src="imgCarrusel/catarata-CR.jpg" alt="" class="imag-info-paises">
                    <div class="txt-imag-info" id="txt-img1-CR-info">Hermosas Cataratas</div>
                </img>
                <img src="imgCarrusel/jungla_CR.jpg" alt="" class="imag-info-paises">
                    <div class="txt-imag-info">Cabañas en medio de la jungla</div>
                </img>
                <img src="imgCarrusel/playa_CR.jpeg" alt="" class="imag-info-paises">
                    <div class="txt-imag-info">Playas espectaculares</div>
                </img>
                <img src="imgCarrusel/volcan_CR.jpg" alt="" class="imag-info-paises">
                    <div class="txt-imag-info">Sorprendentes volcanes</div>
                </img>
            </div>

            <h2 id="PM-info-home" class="titulo-pais-infoh">Panamá</h2>
            <div class="imgs-CR-container">
                
                <img src="imgCarrusel/catarata-CR.jpg" alt="" class="imag-info-paises">
                    <div class="txt-imag-info" id="txt-img1-CR-info">Hermosas Cataratas</div>
                </img>
                <img src="imgCarrusel/jungla_CR.jpg" alt="" class="imag-info-paises">
                    <div class="txt-imag-info">Cabañas en medio de la jungla</div>
                </img>
                <img src="imgCarrusel/playa_CR.jpeg" alt="" class="imag-info-paises">
                    <div class="txt-imag-info">Playas espectaculares</div>
                </img>
                <img src="imgCarrusel/volcan_CR.jpg" alt="" class="imag-info-paises">
                    <div class="txt-imag-info">Sorprendentes volcanes</div>
                </img>
            </div>

            <h2 id="ES-info-home" class="titulo-pais-infoh">El Salvador</h2>
            <div class="imgs-CR-container">
                
                <img src="imgCarrusel/catarata-CR.jpg" alt="" class="imag-info-paises">
                    <div class="txt-imag-info" id="txt-img1-CR-info">Hermosas Cataratas</div>
                </img>
                <img src="imgCarrusel/jungla_CR.jpg" alt="" class="imag-info-paises">
                    <div class="txt-imag-info">Cabañas en medio de la jungla</div>
                </img>
                <img src="imgCarrusel/playa_CR.jpeg" alt="" class="imag-info-paises">
                    <div class="txt-imag-info">Playas espectaculares</div>
                </img>
                <img src="imgCarrusel/volcan_CR.jpg" alt="" class="imag-info-paises">
                    <div class="txt-imag-info">Sorprendentes volcanes</div>
                </img>
            </div>

            <h2 id="BL-info-home" class="titulo-pais-infoh">Belice</h2>
            <div class="imgs-CR-container">
                
                <img src="imgCarrusel/catarata-CR.jpg" alt="" class="imag-info-paises">
                    <div class="txt-imag-info" id="txt-img1-CR-info">Hermosas Cataratas</div>
                </img>
                <img src="imgCarrusel/jungla_CR.jpg" alt="" class="imag-info-paises">
                    <div class="txt-imag-info">Cabañas en medio de la jungla</div>
                </img>
                <img src="imgCarrusel/playa_CR.jpeg" alt="" class="imag-info-paises">
                    <div class="txt-imag-info">Playas espectaculares</div>
                </img>
                <img src="imgCarrusel/volcan_CR.jpg" alt="" class="imag-info-paises">
                    <div class="txt-imag-info">Sorprendentes volcanes</div>
                </img>
            </div>
    </div>
    <!--Fin Info Países-->
    
    </div>
        
    <!--Scripts-->
    <script src="js/script.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="https://kit.fontawesome.com/c14ef371b4.js" crossorigin="anonymous"></script>
    <!--Fin Scripts-->   
</body>

</html>

