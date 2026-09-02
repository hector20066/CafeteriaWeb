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
