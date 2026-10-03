<?php

require_once __DIR__ . "/../../database/DataBase.php";
require_once __DIR__ . "/../../database/ConnectionProviderImpl.php";
require_once __DIR__ . "/../../security/BCryptEncryption.php";
require_once __DIR__ . "/../../model/dao/impl/DAOUsersImpl.php";
require_once __DIR__ . "/../../model/dao/impl/DAOCategoriesImpl.php";
require_once __DIR__ . "/../../model/dao/impl/DAOProductsImpl.php";
require_once __DIR__ . "/../../model/dao/impl/DAOCharacteristicsImpl.php";
require_once __DIR__ . "/../../service/impl/UsersServiceImpl.php";
require_once __DIR__ . "/../../service/impl/CategoriesServiceImpl.php";
require_once __DIR__ . "/../../service/impl/ProductsServiceImpl.php";
require_once __DIR__ . "/../../service/impl/CharacteristicsServiceImpl.php";

$dataBase = DataBase::getInstance();
$connectionProvider = new ConnectionProviderImpl($dataBase);

$bcrypt = new BCryptEncryption();

$daoUsers = new DAOUsersImpl($connectionProvider);
$daoCategories = new DAOCategoriesImpl($connectionProvider);
$daoProducts = new DAOProductsImpl($connectionProvider);
$daoCharacteristics = new DAOCharacteristicsImpl($connectionProvider);

$userService = new UsersServiceImpl($daoUsers, $bcrypt);
$categoriesService = new CategoriesServiceImpl($daoCategories);
$characteristicsService = new CharacteristicsServiceImpl($daoCharacteristics);
$productService = new ProductsServiceImpl($daoProducts, $characteristicsService, $connectionProvider);

$products = 0;
$users = 0;
$categories = 0;

try {
    $products = $productService->countRecords();
    $users = $userService->countRecords();
    $categories = $categoriesService->countRecords();
} catch (Exception $e) {
    error_log($e->getMessage());
}

?>
<!doctype html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Panel administrativo — Grano & Alma</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link href="https://fonts.googleapis.com/css2?family=Fraunces:wght@500;600;700&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
        <link rel="icon" type="image/svg+xml" href="../../img/favicon.svg">
        <link rel="stylesheet" href="../../css/style.css">
        <link rel="stylesheet" href="../../css/admin.css">
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
                    <a href="index.php" class="active">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 10.5 12 3l9 7.5"/><path d="M5 9.5V21h14V9.5"/></svg>
                        Inicio
                    </a>

                    <a href="productos.php">
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
                        <h1>Hola de nuevo</h1>
                        <p class="admin-topbar-subtitle">Este es el resumen de Grano & Alma</p>
                    </div>
                    <div class="admin-user">
                        <div class="admin-user-avatar">A</div>
                        <span>Administrador</span>
                    </div>
                </div>
                
                <div class="admin-stats">
                    <div class="admin-stat-card">
                        <div class="admin-stat-card-icon">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="7" height="7" rx="1.5"/><rect x="14" y="3" width="7" height="7" rx="1.5"/><rect x="3" y="14" width="7" height="7" rx="1.5"/><rect x="14" y="14" width="7" height="7" rx="1.5"/></svg>
                        </div>
                        <div class="admin-stat-card-value"><?= $products ?></div>
                        <div class="admin-stat-card-label">Productos activos</div>
                    </div>

                    <div class="admin-stat-card">
                        <div class="admin-stat-card-icon">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="8" r="4"/><path d="M4 21c0-4.5 3.6-7 8-7s8 2.5 8 7"/></svg>
                        </div>
                        <div class="admin-stat-card-value"><?= $users ?></div>
                        <div class="admin-stat-card-label">Empleados registrados</div>
                    </div>

                    <div class="admin-stat-card">
                        <div class="admin-stat-card-icon">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 19h16"/><path d="M4 15l4-4 4 3 5-6 3 3"/></svg>
                        </div>
                        <div class="admin-stat-card-value"><?= $categories ?></div>
                        <div class="admin-stat-card-label">Categorías del menú</div>
                    </div>
                </div>

                <div class="admin-card">
                    <h2>Accesos rápidos</h2>

                    <div style="display: flex; gap: 14px; flex-wrap: wrap;">
                        <a href="productos.php" class="btn btn-primary">+ Agregar productos</a>
                        <a href="usuarios.php" class="btn btn-secondary">+ Agregar usuarios</a>
                    </div>
                </div>
            </main>
        </div>

        <script src="../../js/admin/script.js"></script>
    </body>
</html>