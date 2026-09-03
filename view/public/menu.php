<?php
    print("Hola mundo")     
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Menú - Grano & Alma</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link href="https://fonts.googleapis.com/css2?family=Fraunces:wght@500;600;700&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
        <link rel="icon" href="../../img/favicon.svg">
        <link href="../../css/style.css" rel="stylesheet">
    </head>
    <body>
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

        <!-- Hero -->
        <section>
            <div>
                <span>NUESTRA CARTA</span>
                <h1>Menú</h1>
                <p>Preparado a diario con ingredientes seleccionados. Elige tu bebida o antojo favorito.</p>
            </div>
        </section>

        <!-- Coffee Section -->
        <section>
            <div>
                <h2>Cafés calientes</h2>

                <div>
                    <?php
                    # foreach ($productList as $product) {
                    #    if ($product->getCategory() === "Cafe") {
                    ?>
                    <div>
                        <div></div>

                        <div>
                            <h3>$Nombre del cafe</h3>
                            <p>$Descripcion del cafe</p>

                            <div>
                                <span>$precio</span>
                                <a href="detalle.php?producto=<?= print('$nombre producto') ?>">Ver detalle</a>
                            </div>
                        </div>
                    </div>
                    <?php
                    #     }
                    # }
                    ?>
                </div>
            </div>
        </section>

        <!-- Cold drinks section -->
        <section>
            <div>
                <h2>Bebidas frías</h2>

                <div>
                    <?php
                    # foreach ($productList as $product) {
                    #    if ($product->getCategory() === "Bebidas") {
                    ?>
                    <div>
                        <div></div>

                        <div>
                            <h3>$Nombre de la bebida</h3>
                            <p>$Descripcion de la bebida</p>

                            <div>
                                <span>$precio</span>
                                <!-- <a href="detalle.php?producto=<?= print('$nombre producto') ?>">Ver detalle</a> -->
                                <a href="detalle.php">Ver detalle</a>
                            </div>
                        </div>
                    </div>
                    <?php
                    #     }
                    # }
                    ?>
                </div>
            </div>
        </section>

        <!-- Dessert section -->
        <section>
            <div>
                <h2>Postres</h2>

                <div>
                    <?php
                    # foreach ($productList as $product) {
                    #    if ($product->getCategory() === "Postres") {
                    ?>
                    <div>
                        <div></div>

                        <div>
                            <h3>$Nombre del postre</h3>
                            <p>$Descripcion del postre</p>

                            <div>
                                <span>$precio</span>
                                <!-- <a href="detalle.php?producto=<?= print('$nombre producto') ?>">Ver detalle</a> -->
                                <a href="detalle.php">Ver detalle</a>
                            </div>
                        </div>
                    </div>
                    <?php
                    #     }
                    # }
                    ?>
                </div>
            </div>
        </section>

        <!-- Breakfast section -->
        <section>
            <div>
                <h2>Desayunos</h2>

                <div>
                    <?php
                    # foreach ($productList as $product) {
                    #    if ($product->getCategory() === "Desayunos") {
                    ?>
                    <div>
                        <div></div>

                        <div>
                            <h3>$Nombre del desayunos</h3>
                            <p>$Descripcion del desayuno</p>

                            <div>
                                <span>$precio</span>
                                <!-- <a href="detalle.php?producto=<?= print('$nombre producto') ?>">Ver detalle</a> -->
                                <a href="detalle.php">Ver detalle</a>
                            </div>
                        </div>
                    </div>
                    <?php
                    #     }
                    # }
                    ?>
                </div>
            </div>
        </section>

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
                        <li>Lun-Sáb: 7:00am - 8:00pm</li>
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
