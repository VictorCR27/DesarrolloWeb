<?php
include("registro.php");
include("login.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Servicios</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="icon" href="imgCarrusel/logo home.ico">
    <link rel="stylesheet" href="css/informativas.css">
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
                <a href="Servicios.php">Servicios</a>
                <a href="SobreNosotros.php">Quienes somos?</a>
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



        <!--Inicio Servicios-->
        <section class="services-section" style="margin-top: 80px;">
        <h1 class="titulo-informativas">Nuestros Servicios</h1>
        <div class="services-wrapper">
            <div class="service-card">
                <img src="imgs/psygym.jpg" alt="Imagen de servicio 1">
                <div class="service-description">
                    <h2 class="subt-informativas">Piscinas y Gimnasios</h2>
                    <p class="txt-informativas">Mantente activo en nuestros gimnasios modernos,Desde máquinas cardiovasculares hasta zonas de
                        peso libre y clases dirigidas o relájate junto a nuestra impresionantes piscinas
                        mientras disfrutas de las vistas panorámicas de las ciudades.Nuestra piscina, diseñada con un
                        toque moderno y rodeada de áreas verdes, es el lugar ideal para relajarse y refrescarse.
                        Contamos con una zona para niños, cómodas tumbonas para tomar el sol y un bar en la piscina
                        donde puedes disfrutar de deliciosos cócteles y aperitivos. </p>
                    <a href="#" class="service-link">Más información</a>
                </div>
            </div>

            <div class="service-card">
                <img src="imgs/spa.jpg" alt="Imagen de servicio 2">
                <div class="service-description">
                    <h2 class="subt-informativas">Spa y Bienestar</h2>
                    <p class="txt-informativas">Date un capricho en nuestros spas de vanguardia, que ofrecen una variedad de tratamientos
                        rejuvenecedores. Desde masajes relajantes hasta terapias especializadas, nuestro equipo
                        profesional te ayudará a revitalizarte.Las instalaciones incluyen saunas, baños de vapor, y
                        salas de masajes individuales y para parejas.</p>
                    <a href="#" class="service-link">Más información</a>
                </div>
            </div>

            <div class="service-card">
                <img src="imgs/transporte.jpg" alt="Imagen de servicio 2">
                <div class="service-description">
                    <h2 class="subt-informativas">Transporte</h2>
                    <p class="txt-informativas">Ofrecemos transporte desde y hacia el aeropuerto para nuestros huéspedes, así como opciones de
                        alquiler de coches y servicios de chófer.Todos nuestros vehículos son modernos, cuentan con aire
                        acondicionado y conductores capacitados para ofrecerte una experiencia sin inconvenientes.
                        Puedes reservar este servicio con antelación o en cualquier momento durante tu estancia.</p>
                    <a href="#" class="service-link">Más información</a>
                </div>
            </div>

            <div class="service-card">
                <img src="imgs/barrestaurant.webp" alt="Imagen de servicio 2">
                <div class="service-description">
                    <h2 class="subt-informativas">Restaurantes y Bares</h2>
                    <p class="txt-informativas">Nuestros Restaurantes y Bares combinan lo mejor de la gastronomía local e internacional en un
                        ambiente
                        elegante pero relajado. Disfruta de una cena romántica o una comida casual con familiares y
                        amigos, todo acompañado de una extensa carta de vinos y cócteles preparados por nuestros
                        expertos bartenders. Además, ofrecemos música en vivo y eventos temáticos para hacer de tu
                        velada algo inolvidable.</p>
                    <a href="#" class="service-link">Más información</a>
                </div>
            </div>

        </div>
    </section>

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
</body>
</html>