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
        <title>Pacific Breeze</title>
        <link rel="icon" href="imgs/logo home.ico">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="css/informativas.css">
    </head>

    <body>

        <!--Header-->
        <header>
        <div class="logo">
                <ul class="logohover">
                  <li>
                    <a href="">
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
                <a href="Servicios.php">Servicios</a>
                <a href="SobreNosotros.php">Quienes somos?</a>
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
                            <img src="./imgs/andaz-hotel.jpg"  alt="item-1">
                            <div class="txtCarrusel">
                                <h2>Los mejores hoteles en Centroamérica</h2>
                            </div>
                        </div>
                    </div>

                    <div class="itemCarrusel" id="itemCarrusel-2" >
                        <div class="imgCarrusel" id="img-2">
                            <img src="./imgs/img-2.jpg" alt="item-2">
                            <div class="txtCarrusel">
                                <h2>Los mejores hoteles en Centroamérica</h2>
                            </div>
                        </div>
                    </div>
            
                    <div class="itemCarrusel" id="itemCarrusel-3">
                        <div class="imgCarrusel" id="img-3">
                            <img src="./imgs/ph-hotel.jpeg" alt="item-3">
                            <div class="txtCarrusel">
                                <h2>Los mejores hoteles en Centroamérica</h2>
                            </div>
                        </div>
                    </div>

                    <div class="itemCarrusel" id="itemCarrusel-3">
                        <div class="imgCarrusel" id="img-3">
                            <img src="./imgs/four-seasons.jpg" alt="item-3">
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
                        <img src="imgs/costarica.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <a class="card-title" href="#CR-info-home">Costa Rica</a><span> | </span>
                            <a class="card-bd-hotel" href="CostaRica.php"><i class="fa-solid fa-hotel"></i> Hoteles</a>
                            <p class="txt_desc_pais">Situado en el corazón de América Central, este paraíso tropical es un destino incomparable para los amantes de la naturaleza y la aventura. Te cautivará con su impresionante biodiversidad, playas de ensueño y exuberantes selvas tropicales.</p>
                        </div>
                    </div>

                    <div class="card">
                        <img src="imgs/nicaragua.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <a class="card-title" href="#NC-info-home">Nicaragua</a><span> | </span>
                            <a class="card-bd-hotel" href="Nicaragua.php"><i class="fa-solid fa-hotel"></i> Hoteles</a>
                            <p class="txt_desc_pais">¡Bienvenido a Nicaragua, una joya escondida en América Central que te espera para una experiencia inigualable de aventura y autenticidad! Con paisajes variados y una rica cultura, Nicaragua te invita a explorar su belleza natural y su historia fascinante.</p>
                        </div>
                    </div>

                    <div class="card">
                        <img src="imgs/honduras.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <a class="card-title" href="#HD-info-home">Honduras</a><span> | </span>
                            <a class="card-bd-hotel" href="Honduras.php"><i class="fa-solid fa-hotel"></i> Hoteles</a>
                            <p class="txt_desc_pais">La naturaleza exuberante de Honduras te cautivará. Desde las majestuosas montañas hasta las selvas tropicales llenas de vida, tendrás la oportunidad de explorar una variedad de ecosistemas impresionantes.</p>
                        </div>
                    </div>
                </div>

                <div class="paises1">
                    <div class="card">
                        <img src="imgs/guatemala.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <a class="card-title" href="#GM-info-home">Guatemala</a><span> | </span>
                            <a class="card-bd-hotel" href="Guatemala.php"><i class="fa-solid fa-hotel"></i> Hoteles</a>
                            <p class="txt_desc_pais">Descubre paisajes impresionantes que van desde altas montañas hasta selvas tropicales exuberantes y lagos cristalinos. El icónico Lago de Atitlán, rodeado por volcanes majestuosos, te dejará asombrado por su belleza serena. </p>
                        </div>
                    </div>

                    <div class="card">
                        <img src="imgs/panamaa.webp" class="card-img-top" alt="...">
                        <div class="card-body">
                            <a class="card-title" href="#PM-info-home">Panamá</a><span> | </span>
                            <a class="card-bd-hotel" href="Panama.php"><i class="fa-solid fa-hotel"></i> Hoteles</a>
                            <p class="txt_desc_pais">Situado en el istmo que conecta América del Norte con América del Sur, Panamá te invita a explorar su mezcla única de culturas, impresionante biodiversidad y maravillas naturales.</p>
                        </div>
                    </div>

                    <div class="card">
                        <img src="imgs/salvador.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <a class="card-title" href="#ES-info-home">El Salvador</a><span> | </span>
                            <a class="card-bd-hotel" href="Salvador.php"><i class="fa-solid fa-hotel"></i> Hoteles</a>
                            <p class="txt_desc_pais">En El Salvador, la aventura y la autenticidad van de la mano. Tanto si buscas emocionantes actividades al aire libre como si deseas sumergirte en la rica cultura y patrimonio del país. </p>
                        </div>
                    </div>
                </div>

                <div class="paises2">
                    <div class="card">
                        <img src="imgs/belice.jpg" class="card-img-top" alt="...">
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
    <p>Reseñas brindadas por nuestros usuarios de todo el mundo, que han podido explorar las bellezas de Centroamérica gracias a Pacific Breeze</p>
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
                   <img src="imgs/avatar-hombre.png">
                 </div>
                     <div class="reviews-contenido">
                       <h3>"¡Una experiencia inolvidable! Gracias a esta página, pude encontrar el hotel perfecto en Costa Rica para unas vacaciones en familia. La reserva fue fácil de hacer y el personal del hotel fue muy atento. La ubicación frente a la playa era simplemente impresionante. ¡Definitivamente volveremos a reservar con ellos!"</h3>
                       <h4>Joe Moore</h4>
                         <img src="imgs/star_FILL1_wght700_GRAD0_opsz48.svg#ebd725">
                         <img src="imgs/star_FILL1_wght700_GRAD0_opsz48.svg#ebd725">
                         <img src="imgs/star_FILL1_wght700_GRAD0_opsz48.svg#ebd725">
                         <img src="imgs/star_FILL1_wght700_GRAD0_opsz48.svg#ebd725">
                         <img src="imgs/star_FILL1_wght700_GRAD0_opsz48.svg#ebd725">
                         </div>
             </div>
            </div>
          </div>
          <div class="slide">
          <div class="reviews">
             <div class="reviews-contenedor">     
                 <div class="reviews-icono">
                   <img src="imgs/avatar-mujer.png">
                 </div>
                     <div class="reviews-contenido">
                       <h3>"Mi esposa y yo estábamos buscando un lugar romántico para nuestra luna de miel en Belice, y esta página fue un hallazgo increíble. Encontramos un hotel boutique encantador con un servicio excepcional. El equipo de atención al cliente nos ayudó a elegir la habitación perfecta, y la sorpresa en nuestra habitación al llegar realmente hizo que nuestra estancia fuera especial."</h3>
                       <h4>Samantha Murphy </h4>
                         <img src="imgs/star_FILL1_wght700_GRAD0_opsz48.svg#ebd725">
                         <img src="imgs/star_FILL1_wght700_GRAD0_opsz48.svg#ebd725">
                         <img src="imgs/star_FILL1_wght700_GRAD0_opsz48.svg#ebd725">
                         <img src="imgs/star_FILL1_wght700_GRAD0_opsz48.svg#ebd725">
                         <img src="imgs/star_FILL1_wght700_GRAD0_opsz48.svg#ebd725">
                     </div>
             </div>
         </div>
          </div>
          <div class="slide">
          <div class="reviews">
            <div class="reviews-contenedor">     
                <div class="reviews-icono">
                  <img src="imgs/avatar-hombre2.png">
                </div>
                    <div class="reviews-contenido">
                      <h3>"Nunca había viajado solo, pero esta página me ayudó a sentirme segura y emocionada. Elegí un hostal en Nicaragua y conocí a otros viajeros maravillosos. La reserva fue rápida y el equipo de soporte respondió a todas mis preguntas. Aunque el alojamiento era básico, la atmósfera y las conexiones que hice lo convirtieron en un viaje memorable."</h3>
                      <h4>Ollie Smith</h4>
                        <img src="imgs/star_FILL1_wght700_GRAD0_opsz48.svg#ebd725">
                        <img src="imgs/star_FILL1_wght700_GRAD0_opsz48.svg#ebd725">
                        <img src="imgs/star_FILL1_wght700_GRAD0_opsz48.svg#ebd725">
                        <img src="imgs/star_FILL1_wght700_GRAD0_opsz48.svg#ebd725">
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
                  <img src="imgs/avatar-mujer2.png">
                </div>
                    <div class="reviews-contenido">
                      <h3>"Siempre he querido explorar la belleza natural de Guatemala, y esta página hizo que todo fuera sencillo. Encontré un eco-resort en las montañas que superó todas mis expectativas. Las vistas eran impresionantes, el personal era acogedor y la experiencia en general fue mágica. ¡Gracias por hacer realidad mi aventura soñada!"</h3>
                      <h4>Mary Williams</h4>
                        <img src="imgs/star_FILL1_wght700_GRAD0_opsz48.svg#ebd725">
                        <img src="imgs/star_FILL1_wght700_GRAD0_opsz48.svg#ebd725">
                        <img src="imgs/star_FILL1_wght700_GRAD0_opsz48.svg#ebd725">
                        <img src="imgs/star_FILL1_wght700_GRAD0_opsz48.svg#ebd725">
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

   <div class="tira-info-paises">
        <p><i class="fa-solid fa-circle-info" style="color: #ffffff;"></i><span>   </span> Un poco de información sobre los países de la región y sus mayores atractivos turísticos. ¡Conocé CentroAmérica!</p>
   </div> 

    <div class="info-paises">
        <h2 id="CR-info-home" class="titulo-pais-infoh">Costa Rica</h2>
        <p>Explora sus playas de arena blanca bañadas por las aguas cristalinas del océano Pacífico y el mar Caribe. Para los amantes de la adrenalina, Costa Rica ofrece una variedad de actividades emocionantes, desde tirolinas en lo alto de la selva hasta rafting en aguas bravas en ríos tumultuosos. Descubre volcanes activos y relájate en sus aguas termales rejuvenecedoras. La cultura costarricense es tan cálida como su clima, y sus habitantes te recibirán con los brazos abiertos. Disfruta de la gastronomía local, desde los sabores auténticos de la cocina tradicional hasta los platos más modernos y fusionados. </p>
            <div class="imgs-CR-container">

                    <img src="imgs/catarata-CR.jpg" alt="" class="imag-info-paises">
                    <img src="imgs/jungla_CR.jpg" alt="" class="imag-info-paises">
                    <img src="imgs/playa_CR.jpeg" alt="" class="imag-info-paises">
                    <img src="imgs/volcan_CR.jpg" alt="" class="imag-info-paises">

            </div>

            <h2 id="NC-info-home" class="titulo-pais-infoh">Nicaragua</h2>
            <p>Nicaragua es tierra de volcanes, y tendrás la oportunidad única de explorar estos imponentes gigantes, algunos de los cuales todavía están activos. Pasea por los alrededores de cráteres humeantes y siente la energía de la Tierra en movimiento. La cultura nicaragüense es tan diversa como su paisaje. Explora ciudades coloniales como Granada y León, donde las calles adoquinadas y las impresionantes iglesias te transportarán en el tiempo. En Nicaragua, la aventura y la autenticidad van de la mano. Ya sea que estés buscando explorar la naturaleza, descubrir la historia o simplemente relajarte en la playa, este país te ofrece una experiencia única que quedará grabada en tu corazón.</p>
            <div class="imgs-CR-container">

                <img src="imgs/volcan-NC.jpg" alt="" class="imag-info-paises">
                <img src="imgs/lago-NC.jpg" alt="" class="imag-info-paises">
                <img src="imgs/piscina-NC.jpg" alt="" class="imag-info-paises">
                <img src="imgs/playa-NC.jpg" alt="" class="imag-info-paises">

            </div>

            <h2 id="HD-info-home" class="titulo-pais-infoh">Honduras</h2>
            <p>Para los amantes de la historia y la cultura, Honduras ofrece un viaje en el tiempo a través de sus ciudades coloniales y sitios arqueológicos. Descubre las ruinas de Copán, una antigua ciudad maya conocida por sus intrincados grabados y estelas talladas. Honduras es un tesoro esperando a ser descubierto. Tanto si buscas emocionantes aventuras al aire libre como si deseas sumergirte en la rica historia y cultura del país, encontrarás una experiencia única y enriquecedora en cada rincón de Honduras. </p>
            <div class="imgs-CR-container">

                <img src="imgs/ciudad_HD.jpg" alt="" class="imag-info-paises">
                <img src="imgs/piramide_HD.jpg" alt="" class="imag-info-paises">
                <img src="imgs/lago_HD.jpg" alt="" class="imag-info-paises">
                <img src="imgs/roatan_HD.jpg" alt="" class="imag-info-paises">

            </div>

            <h2 id="GM-info-home" class="titulo-pais-infoh">Guatemala</h2>
            <p>¡Bienvenido a Guatemala, un país lleno de maravillas naturales, rica herencia cultural y experiencias auténticas que te dejarán sin aliento! Explora las antiguas ciudades mayas, como Tikal, donde las imponentes pirámides y templos te transportarán a una época pasada de esplendor y misterio. La historia y la arqueología cobran vida en cada rincón, ofreciéndote una visión fascinante de una civilización antigua. La cultura guatemalteca es una mezcla de influencias indígenas y coloniales, y podrás experimentarla a través de su música, danzas y festivales tradicionales.</p>
            <div class="imgs-CR-container">
                
                <img src="imgs/tikal-GM.jpg" alt="" class="imag-info-paises">
                <img src="imgs/atitlan-GM.png" alt="" class="imag-info-paises">
                <img src="imgs/agua-GM.jpeg" alt="" class="imag-info-paises">
                <img src="imgs/antigua-GM.jpg" alt="" class="imag-info-paises">

            </div>

            <h2 id="PM-info-home" class="titulo-pais-infoh">Panamá</h2>
            <p>Adéntrate en la selva tropical de Panamá y descubre una rica variedad de flora y fauna. Desde exuberantes montañas hasta playas prístinas en el Pacífico y el Caribe, encontrarás un entorno natural que te dejará sin palabras. Explora el famoso Canal de Panamá, una maravilla de la ingeniería que conecta dos océanos y que ha sido un punto vital de comercio y navegación. En Bocas del Toro y San Blas, encontrarás islas paradisíacas con aguas cristalinas y arenas blancas, ideales para el buceo, el snorkel y el relax total.</p>
            <div class="imgs-CR-container">
                
                <img src="imgs/bt-PM.jpg" alt="" class="imag-info-paises">
                <img src="imgs/montana-PM.jpg" alt="" class="imag-info-paises">
                <img src="imgs/bosque-PM.jpg" alt="" class="imag-info-paises">
                <img src="imgs/ciudad-PM.jpg" alt="" class="imag-info-paises">

            </div>

            <h2 id="ES-info-home" class="titulo-pais-infoh">El Salvador</h2>
            <p>Sumérgete en las aguas cálidas y cristalinas del océano Pacífico en las hermosas playas de El Salvador. Desde playas aptas para el surf hasta bahías tranquilas ideales para nadar, encontrarás un paraíso playero que satisface todos los gustos. Conocido como "El país de los 40 minutos", en El Salvador puedes pasar de las olas al bosque tropical o a una ciudad colonial en cuestión de minutos.</p>
            <div class="imgs-CR-container">
                
                <img src="imgs/lago-ES.jpg" alt="" class="imag-info-paises">
                <img src="imgs/volcan-ES.jpg" alt="" class="imag-info-paises">
                <img src="imgs/volcan2-ES.jpg" alt="" class="imag-info-paises">
                <img src="imgs/playa-ES.jpg" alt="" class="imag-info-paises">

            </div>

            <h2 id="BL-info-home" class="titulo-pais-infoh">Belice</h2>
            <p>Explora las islas paradisíacas de Belice, como Ambergris Caye y Caye Caulker, donde el ritmo relajado de la vida te envolverá. Disfruta de la tranquilidad de sus playas, haz esnórquel en aguas cristalinas y degusta deliciosos platos locales con influencias caribeñas y mayas. Para los amantes de la naturaleza, Belice ofrece una variedad de ecosistemas, desde selvas tropicales hasta cuevas misteriosas. Visita el Parque Nacional de las Cuevas del Río Belice y explora cuevas y cenotes impresionantes. Descubre las ruinas mayas en lugares como Xunantunich y Caracol, donde podrás conectarte con la historia y cultura de la antigua civilización.</p>
            <div class="imgs-CR-container">
                
                <img src="imgs/mar-BL.jpg" alt="" class="imag-info-paises">
                <img src="imgs/piramide-BL.webp" alt="" class="imag-info-paises">
                <img src="imgs/playa-BL.jpg" alt="" class="imag-info-paises">
                <img src="imgs/buceo-BL.jpg" alt="" class="imag-info-paises">

            </div>
    </div>
    <!--Fin Info Países-->

    <!--Footer-->
    <footer>
        <div class="footer-content">
            <div class="footer-left">
                <div class="footer-column">
                    <img src="imgs/logo-home.png" alt="" class="imag-info-paises">
                    <h3>Contacto</h3>
                    <h4>Email</h4>
                    <p>pacificbreeze@hotel.com</p>
                    <h4>Teléfono</h4>
                    <p>8888-8888</p>
                    <h4>Oficina Central</h4>
                    <p>San José, Costa Rica</p>
                </div>

                <div class="footer-column">
                    <h3>Redes Sociales</h3>
                    <a href="https://www.expedia.com/es/?locale=es_MX&siteid=4407&semcid=CR.B.GOOGLE.BT-c-ES.GT&semdtl=a118255096686.b1144190512640.g1kwd-12670071.e1c.m1Cj0KCQjw84anBhCtARIsAISI-xc_fncpnNwlpLgoxGTnzSuSZXzML_fD48Fp3djN3UQKsJ1TLmrVfw4aAjF9EALw_wcB.r1bd8c920c52847e0b4f1fd28792d1aa6637cc80706b1256a90a1b92d72969c61b.c1il8_4oA02nMemQgd0osRVA.j19070296.k1.d1624876730999.h1e.i1.l1.n1.o1.p1.q1.s1.t1.x1.f1.u1.v1.w1&gclid=Cj0KCQjw84anBhCtARIsAISI-xc_fncpnNwlpLgoxGTnzSuSZXzML_fD48Fp3djN3UQKsJ1TLmrVfw4aAjF9EALw_wcB"><i class="fab fa-facebook" style="color: #0edd98;"></i></a>
                    <a href="https://www.expedia.com/es/?locale=es_MX&siteid=4407&semcid=CR.B.GOOGLE.BT-c-ES.GT&semdtl=a118255096686.b1144190512640.g1kwd-12670071.e1c.m1Cj0KCQjw84anBhCtARIsAISI-xc_fncpnNwlpLgoxGTnzSuSZXzML_fD48Fp3djN3UQKsJ1TLmrVfw4aAjF9EALw_wcB.r1bd8c920c52847e0b4f1fd28792d1aa6637cc80706b1256a90a1b92d72969c61b.c1il8_4oA02nMemQgd0osRVA.j19070296.k1.d1624876730999.h1e.i1.l1.n1.o1.p1.q1.s1.t1.x1.f1.u1.v1.w1&gclid=Cj0KCQjw84anBhCtARIsAISI-xc_fncpnNwlpLgoxGTnzSuSZXzML_fD48Fp3djN3UQKsJ1TLmrVfw4aAjF9EALw_wcB"><i class="fab fa-instagram" style="color: #0edd98;"></i></a>
                    <a href="https://www.expedia.com/es/?locale=es_MX&siteid=4407&semcid=CR.B.GOOGLE.BT-c-ES.GT&semdtl=a118255096686.b1144190512640.g1kwd-12670071.e1c.m1Cj0KCQjw84anBhCtARIsAISI-xc_fncpnNwlpLgoxGTnzSuSZXzML_fD48Fp3djN3UQKsJ1TLmrVfw4aAjF9EALw_wcB.r1bd8c920c52847e0b4f1fd28792d1aa6637cc80706b1256a90a1b92d72969c61b.c1il8_4oA02nMemQgd0osRVA.j19070296.k1.d1624876730999.h1e.i1.l1.n1.o1.p1.q1.s1.t1.x1.f1.u1.v1.w1&gclid=Cj0KCQjw84anBhCtARIsAISI-xc_fncpnNwlpLgoxGTnzSuSZXzML_fD48Fp3djN3UQKsJ1TLmrVfw4aAjF9EALw_wcB"><i class="fas fa-envelope" style="color: #0edd99;"></i></a>
                </div>
            </div>

            <div class="footer-right">
                <div class="footer-column tofu-form">
                    <form action="https://public.herotofu.com/v1/99cadf90-3fc9-11ee-be2a-8766f5b1e927" method="post" accept-charset="UTF-8">
                        <div>
                            <label for="name">Nombre</label>
                            <input name="Name" id="name" type="text" required />
                        </div>
                        <div>
                            <label for="email">Correo Electrónico</label>
                            <input name="Email" id="email" type="email" required />
                        </div>
                        <div>
                            <label for="subject">Asunto</label>
                            <input name="Subject" id="subject" type="text" required />
                        </div>
                        <div>
                            <input type="submit" value="Enviar" />
                            <div style="text-indent:-99999px; white-space:nowrap; overflow:hidden; position:absolute;" aria-hidden="true">
                                <input type="text" name="_gotcha" tabindex="-1" autocomplete="off" />
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <p>Pacific Breeze &copy;
                <script>document.write(new Date().getFullYear())</script>. Todos los derechos reservados.
            </p>
        </div>
    </footer>
    
    </div>
        
    <!--Scripts-->
    <script src="js/script.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="https://kit.fontawesome.com/c14ef371b4.js" crossorigin="anonymous"></script>
    <!--Fin Scripts-->   
</body>

</html>

