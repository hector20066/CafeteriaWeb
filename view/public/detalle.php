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
        <header class="site-header">
            <div>
                <a href="../../index.html" class="logo"><img src="../../img/favicon.svg" alt="grano&alma-icon" class="logo-icon" width="30" height="30">Grano & Alma</a>

                <nav class="nav-principal">
                    <a href="../../index.html">Inicio</a>
                    <a href="nosotros.html">Nosotros</a>
                    <a href="menu.php" class="active">Menú</a>
                    <a href="contacto.html">Contacto</a>
                </nav>

                <div class="header-actions">
                    <a href="menu.php" class="btn btn-primary">Ver menú</a>

                    <button class="btn-mobil-menu">
                        <span></span><span></span><span></span>
                    </button>
                </div>
            </div>
        </header>

        <!-- Mobile menu -->
        <nav class="nav-mobile">
            <div class="nav-mobile-top">
                <span class="logo"><img src="../../img/favicon.svg" alt="grano&alma-icon" class="logo-icon" width="30" height="30">Grano & Alma</span>
                <button class="nav-mobile-close">&times;</button>
            </div>

            <ul>
                <li><a href="../../index.html">Inicio</a></li>
                <li><a href="nosotros.html">Nosotros</a></li>
                <li><a href="menu.php">Menú</a></li>
                <li><a href="contacto.html">Contacto</a></li>
            </ul>

            <a href="menu.php" class="btn btn-primary">Ver menú</a>
        </nav>

        <div>
            <div class="container breadcrumb">
                <a href="../../index.html">Inicio</a> / <a href="menu.php">Menú</a> / <span></span>
            </div>

            <!-- Principal section -->
            <section class="section">
                <div class="container grid-2">
                    <div class="cover-image"></div>

                    <div>
                        <span class="eyebrow">$categoria</span>
                        <h1>$Nombre del producto</h1>
                        <p>$precio</p>
                        <p class="text-secondary">$descripcion</p>

                        <h3>Características</h3>
                        <ul>
                            <li>$caracteristica 1</li>
                            <li>$caracteristica 2</li>
                            <li>$caracteristica 3</li>
                        </ul>

                        <a href="contacto.html" class="btn btn-primary">Consultar disponibilidad</a>
                    </div>
                </div>
            </section>

            <section class="section section-alt">
                <div class="container">
                    <div class="section-header">
                        <span class="eyebrow">TAMBIÉN TE PUEDE GUSTAR</span>
                        <h2>Productos relacionados</h2>
                    </div>

                    <div class="products-grid grid-3">

                        <div class="product-card">
                            <div class="product-card-image"></div>
                            <div class="product-card-body">
                                <h3 class="product-card-name">$Nombre del producto</h3>
                                <p class="text-secondary">$Descripción del producto</p>

                                <div class="product-card-footer">
                                    <span class="product-card-price">$Precio</span>
                                    <a href="detalle.php" class="btn btn-secondary">Ver detalle</a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </section>
        </div>

        <!-- Footer -->
        <footer class="footer-site">
            <div class="container foot-grid">
                <div class="foot-column">
                    <div class="foot-logo">Grano & Alma</div>
                    <p class="text-secondary">Café de especialidad en un espacio diseñado para desconectar sin salir de la ciudad.</p>
                </div>

                <div class="foot-column">
                    <h4>Navegación</h4>

                    <ul>
                        <li><a href="../../index.html">Inicio</a></li>
                        <li><a href="nosotros.html">Nosotros</a></li>
                        <li><a href="menu.php">Menú</a></li>
                        <li><a href="contacto.html">Contacto</a></li>
                    </ul>
                </div>

                <div class="foot-column">
                    <h4>Contacto</h4>

                    <ul>
                        <li class="text-secondary">Tr 2b #13-54</li>
                        <li class="text-secondary">313 776 2626</li>
                        <li class="text-secondary">hectorluisacevedocontreras00@gmail.com</li>
                        <li class="text-secondary">Lun-Sáb: 7:00pm - 8:00pm</li>
                    </ul>
                </div>

                <div class="foot-column">
                    <h4>Síguenos</h4>

                    <div class="foot-networks">
                        <a href="">IG</a>
                        <a href="">FB</a>
                        <a href="">TT</a>
                    </div>
                </div>
            </div>

            <div class="foot-copyright">© 2026 Grano & Alma. Todos los derechos reservados.</div>
        </footer>

        <a href="https://wa.me/573001234567?text=Hola%20Grano%20%26%20Alma%2C%20quisiera%20hacer%20una%20consulta" target="_blank" rel="noopener" class="floating-button button-whatsapp" aria-label="Escríbenos por WhatsApp">
            <svg width="26" height="26" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                <path d="M12.04 2C6.58 2 2.13 6.45 2.13 11.91c0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.44.79 3.06 1.2 4.72 1.2h.01c5.46 0 9.9-4.45 9.9-9.91 0-2.65-1.03-5.14-2.9-7.01A9.82 9.82 0 0012.04 2zm0 18.13h-.01c-1.47 0-2.92-.4-4.18-1.14l-.3-.18-3.12.82.83-3.04-.2-.31a8.18 8.18 0 01-1.26-4.37c0-4.53 3.69-8.22 8.24-8.22 2.2 0 4.27.86 5.83 2.42a8.15 8.15 0 012.41 5.81c0 4.53-3.69 8.21-8.24 8.21zm4.52-6.16c-.25-.12-1.47-.72-1.69-.81-.23-.08-.39-.12-.56.13-.17.25-.64.81-.78.97-.14.17-.29.19-.53.06-.25-.12-1.05-.39-2-1.23-.74-.66-1.24-1.48-1.39-1.73-.14-.25-.02-.38.11-.51.11-.11.25-.29.37-.43.12-.14.16-.25.25-.41.08-.17.04-.31-.02-.44-.06-.12-.56-1.35-.77-1.85-.2-.48-.41-.42-.56-.43-.14-.01-.31-.01-.48-.01-.17 0-.44.06-.67.31-.23.25-.87.85-.87 2.08 0 1.23.89 2.41 1.01 2.58.12.17 1.75 2.67 4.25 3.74.59.26 1.06.41 1.42.52.6.19 1.14.16 1.57.1.48-.07 1.47-.6 1.68-1.18.21-.58.21-1.07.14-1.18-.06-.1-.23-.16-.48-.28z"/>
            </svg>
        </a>

        <button class="floating-button button-increase" id="btnSubir" aria-label="Volver arriba">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                <path d="M12 19V5"/>
                <path d="M5 12l7-7 7 7"/>
            </svg>
        </button>

        <script src=""></script>
    </body>
</html>
