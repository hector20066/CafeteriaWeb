<?php

?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Detalle - Grano & Alma</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link href="https://fonts.googleapis.com/css2?family=Fraunces:wght@500;600;700&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
        <link rel="icon" href="../../img/favicon.svg">
        <link rel="stylesheet" href="../../css/style.css">
    </head>
    <body>
        <?= print("hola mundo"); ?>
        <header>
            <div>
                <a href="../../index.html"><img src="../../img/favicon.svg" alt="grano&alma-icon" width="30" height="30">Grano & Alma</a>

                <nav>
                    <a href="../../index.html">Inicio</a>
                    <a href="nosotros.html">Nosotros</a>
                    <a href="menu.php">Menú</a>
                    <a href="contacto.html">Contacto</a>
                </nav>
            </div>

            <div>
                <a href="menu.php">Ver menú</a>

                <button>
                    <span></span><span></span><span></span>
                </button>
            </div>
        </header>

        <!-- Mobile menu -->
        <nav>
            <div>
                <span><img src="../../img/favicon.svg" alt="grano&alma-icon" width="30" height="30">Grano & Alma</span>
                <button>&times;</button>
            </div>

            <ul>
                <li><a href="../../index.html">Inicio</a></li>
                <li><a href="nosotros.html">Nosotros</a></li>
                <li><a href="menu.php">Menú</a></li>
                <li><a href="contacto.html">Contacto</a></li>
            </ul>

            <a href="menu.php">Ver menú</a>
        </nav>

        <div>
            <div>
                <a href="../../index.html">Inicio</a> / <a href="menu.php">Menú</a> / <span></span>
            </div>

            <!-- Principal section -->
            <section>
                <div>
                    <div></div>

                    <div>
                        <span>$categoria</span>
                        <h1>$Nombre del producto</h1>
                        <p>$precio</p>
                        <p>$descripcion</p>

                        <h3>Características</h3>
                        <ul>
                            <li>$caracteristica 1</li>
                            <li>$caracteristica 2</li>
                            <li>$caracteristica 3</li>
                        </ul>

                        <a href="contacto.html">Consultar disponibilidad</a>
                    </div>
                </div>
            </section>

            <section>
                <div>
                    <div>
                        <span>TAMBIÉN TE PUEDE GUSTAR</span>
                        <h2>Productos relacionados</h2>
                    </div>

                    <div>

                        <div>
                            <div></div>
                            <div>
                                <h3>$Nombre del producto</h3>
                                <p>$Descripción del producto</p>

                                <div>
                                    <span>$Precio</span>
                                    <a href="detalle.php">Ver detalle</a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </section>
        </div>

        <!-- Footer -->
        <footer>
            <div>
                <div>
                    <div>Grano & Alma</div>
                    <p>Café de especialidad en un espacio diseñado para desconectar sin salir de la ciudad.</p>
                </div>

                <div>
                    <h4>Navegación</h4>

                    <ul>
                        <li><a href="../../index.html">Inicio</a></li>
                        <li><a href="nosotros.html">Nosotros</a></li>
                        <li><a href="menu.php">Menú</a></li>
                        <li><a href="contacto.html">Contacto</a></li>
                    </ul>
                </div>

                <div>
                    <h4>Contacto</h4>

                    <ul>
                        <li>Tr 2b #13-54</li>
                        <li>313 776 2626</li>
                        <li>hectorluisacevedocontreras00@gmail.com</li>
                        <li>Lun-Sáb: 7:00pm - 8:00pm</li>
                    </ul>
                </div>

                <div>
                    <h4>Síguenos</h4>

                    <div>
                        <a href="">IG</a>
                        <a href="">FB</a>
                        <a href="">TT</a>
                    </div>
                </div>
            </div>

            <div>© 2026 Grano & Alma. Todos los derechos reservados.</div>
        </footer>
    </body>
</html>
