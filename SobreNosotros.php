<?php
include("registro.php");
include("login.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sobre Nosotros</title>
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

<section class="about-us-section">
        <div class="background-overlay">
            <h1 class="titulo-informativas">Nuestra Historia</h1>
            <div class="content-wrapper">
                <figure class="about-image">
                    <img src="/imgs/hotel2.jpg" alt="Imagen del hotel">
                    <figcaption>Hoteles con muy buen servicio</figcaption>
                </figure>
                <div class="text-content">
                    <p class="txt-informativas">Nuestra Misión es conectar a viajeros con las maravillas de Centroamérica a través de experiencias de alojamiento excepcionales. 
                        Nos esforzamos por ser el puente que une a los aventureros con la belleza y diversidad de esta región única, 
                        brindando un servicio de reservaciones de hoteles que garantiza comodidad, calidad y memorias inolvidables.</p>
                    <h2 class="subt-informativas">Misión</h2>
                    <div class="info-box">
                        <p class="txt-informativas">Nuestra misión en el Hotel "nombre" es proporcionar una experiencia de alojamiento
                            excepcional, en la que cada huésped se sienta valorado, cuidado y como en casa. Nos
                            esforzamos por superar las expectativas, creando recuerdos inolvidables en un entorno de
                            lujo y confort.</p>
                    </div>

                    <h2 class="subt-informativas">Visión</h2>
                    <div class="info-box">
                        <p class="txt-informativas">Nuestra Visión es ser el recurso de elección para aquellos que buscan explorar y disfrutar
                             de la riqueza de Centroamérica. A medida que evolucionamos, aspiramos a convertirnos en la plataforma líder 
                             en reservaciones de hoteles en la región, reconocida por la excelencia en servicio al cliente, la amplia selección de alojamientos 
                             y el impacto positivo que generamos en las comunidades locales.</p>
                    </div>
                    <h2 class="subt-informativas">Valores</h2>
                    <div class="info-box">
                        <ul class="ul-informativas">
                            <li class="list-informativas"><strong>Integridad:</strong>Nos enorgullece actuar con honestidad, transparencia y ética
                                en cada interacción, construyendo una base de confianza con nuestros huéspedes y socios.
                            </li>
                            <li class="list-informativas"><strong>Compromiso:</strong>Estamos dedicados a servir a nuestros huéspedes con pasión,
                                esforzándonos siempre por superar sus expectativas.</li>
                            <li class="list-informativas"><strong>Innovación:</strong>Nos esforzamos por mejorar continuamente, adoptando nuevas
                                tendencias y tecnologías para mejorar la experiencia de nuestros huéspedes.</li>
                        </ul>
                    </div>
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