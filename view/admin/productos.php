<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Productos - Panel administrativo | Grano & Alma</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link href="https://fonts.googleapis.com/css2?family=Fraunces:wght@500;600;700&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
        <link rel="icon" type="image/svg+xml" href="../../img/favicon.svg">
        <link rel="stylesheet" href="../../css/admin.css">
        <link rel="stylesheet" href="../../css/style.css">
    </head>
    <body>
        <div class="admin-layout">
            <div class="admin-topbar-mobile">
                <span class="admin-topbar-mobile-logo">
                    <img src="../../img/favicon.svg" alt="logo" width="26" height="26">
                    Grano & Alma
                </span>
                <button class="btn-mobile-menu" id="btnOpenMenuAdmin" aria-label="Abrir menú">
                    <span></span><span></span><span></span>
                </button>
            </div>

            <nav class="nav-mobile" id="navMobileAdmin">
                <div class="nav-mobile-top">
                    <span class="logo"><img src="../../img/favicon.svg" alt="logo" class="logo_icon" width="30" height="30">Grano & Alma</span>
                    <button class="nav-mobile-close" id="btnCloseMenuAdmin" aria-label="Cerrar menú">&times;</button>
                </div>

                <ul>
                    <li><a href="index.php">Inicio</a></li>
                    <li><a href="productos.php">Productos</a></li>
                    <li><a href="usuarios.php">Usuarios</a></li>
                    <li><a href="../login/login.php">Cerrar sesión</a></li>
                </ul>
            </nav>

            <!-- Sidebar solo para desktop -->
            <aside class="admin-sidebar">
                <div class="admin-sidebar-logo">
                    <img src="../../img/favicon.svg" alt="logo">
                    <span>Grano & Alma</span>
                </div>

                <nav class="admin-nav">
                    <a href="index.php">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 10.5 12 3l9 7.5"/><path d="M5 9.5V21h14V9.5"/></svg>
                        Inicio
                    </a>

                    <a href="productos.php" class="active">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="7" height="7" rx="1.5"/><rect x="14" y="3" width="7" height="7" rx="1.5"/><rect x="3" y="14" width="7" height="7" rx="1.5"/><rect x="14" y="14" width="7" height="7" rx="1.5"/></svg>
                        Productos
                    </a>

                    <a href="usuarios.php">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="8" r="4"/><path d="M4 21c0-4.5 3.6-7 8-7s8 2.5 8 7"/></svg>
                        Usuarios
                    </a>
                </nav>

                <div class="admin-sidebar-exit">
                    <nav class="admin-nav">
                        <a href="../login/login.php">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><path d="M16 17l5-5-5-5"/><path d="M21 12H9"/></svg>
                            Cerrar sesión
                        </a>
                    </nav>
                </div>
            </aside>

            <main class="admin-main">
                <div class="admin-topbar">
                    <div>
                        <h1>Productos</h1>
                        <p class="admin-topbar-subtitle">Agrega y consulta los productos del menú</p>
                    </div>

                    <div class="admin-user">
                        <div class="admin-user-avatar">A</div>
                        <span>Administrador</span>
                    </div>
                </div>

                <div class="admin-card">
                    <h2>Agregar nuevo producto</h2>

                    <form class="admin-form" action="#" method="post" enctype="multipart/form-data">
                        <div class="input">
                            <label for="product_name">Nombre</label>
                            <input type="text" id="product_name" name="product_name" placeholder="Ej. Mocha helado" required>
                        </div>

                        <div class="input">
                            <label for="slug">Slug (generado automáticamente)</label>
                            <input type="text" id="slug" name="slug" readonly required>
                        </div>

                        <div class="input">
                            <label for="category">Categoría</label>

                            <select id="category" name="category" required>
                                <option value="">-- Selecciona una categoría --</option>
                                <option value="1">Cafés calientes</option>
                                <option value="2">Bebidas frías</option>
                                <option value="3">Postres</option>
                                <option value="4">Desayunos</option>
                            </select>
                        </div>

                        <div class="input">
                            <label for="price">Precio</label>
                            <input type="number" id="price" name="price" placeholder="Ej. 9500" min="0" step="500" required>
                        </div>

                        <div class="input">
                            <label for="image">Imagen</label>
                            <input type="file" id="image" name="image" accept="image/*" required>
                        </div>

                        <div class="input input-width">
                            <label for="brief_description">Descripción corta</label>
                            <textarea id="brief_description" name="brief_description" maxlength="150" placeholder="Descripción corta que aparecerá en las tarjetas" required></textarea>
                        </div>

                        <div class="input input-width">
                            <label for="description">Descripción completa</label>
                            <textarea id="description" name="description" placeholder="Descripción completa del producto" required></textarea>
                        </div>

                        <div class="input input-width">
                            <label for="characteristics">Caracteristicas (Una por línea)</label>
                            <textarea id="characteristics" name="characteristics" placeholder="Ej.&#10;Espresso doble de base&#10;Disponible en 8oz y 12oz"></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Guardar producto</button>
                    </form>
                </div>

                <div class="admin-card">
                    <div class="admin-card-header">
                        <h2>Productos disponibles</h2>
                    </div>

                    <div class="admin-table-content">
                        <table class="admin-table">
                            <thead>
                                <tr>
                                    <th class="col-image">Imagen</th>
                                    <th>Nombre</th>
                                    <th>Categoría</th>
                                    <th class="col-price">Precio</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody id="productsTable">
                                <tr>
                                    <td data-etiqueta="Imagen" class="col-image"><div class="admin-table-miniature" style="background-image: url('../../img/');"></div></td>
                                    <td data-etiqueta="Nombre"></td>
                                    <td data-etiqueta="Categoría"><span class="admin-badge"></span></td>
                                    <td data-etiqueta="Precio" class="col-price"></td>
                                    <td data-etiqueta="Acciones">
                                        <div class="admin-table-actions">
                                            <button type="button">Editar</button>
                                            <button type="button" class="delete">Eliminar</button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </main>
        </div>

        <script src="../../js/admin/script.js"></script>
    </body>
</html>