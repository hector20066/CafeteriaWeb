<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Iniciar sesión - Panel administrativo | Grano & Alma</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link href="https://fonts.googleapis.com/css2?family=Fraunces:wght@500;600;700&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
        <link rel="icon" type="image/svg+xml" href="../../img/favicon.svg">
        <link rel="stylesheet" href="../../css/style.css">
        <link rel="stylesheet" href="../../css/admin.css">
    </head>
    <body>
        <div class="admin-login">
            <div class="admin-login-card">
                <div class="admin-login-logo">
                    <img src="../../img/favicon.svg" alt="icono pagina">
                    <span>Grano & Alma</span>
                </div>
                <p class="admin-login-subtitle">Panel administrativo - acceso exclusivo para empleados</p>

                <form class="form" action="#" method="post">
                    <div class="input">
                        <label for="email">Correo</label>
                        <input type="email" id="email" name="email" placeholder="correo@gmail.com" required>
                    </div>

                    <div class="input">
                        <label for="passwd">Contraseña</label>
                        <input type="password" name="passwd" id="passwd" placeholder="••••••••" required>
                    </div>

                    <button type="submit" class="btn btn-primary" style="margin-top: 6px;">Iniciar sesión</button>
                </form>

                <div class="admin-login-return">
                    <a href="../../index.html">&larr; Volver al sitio</a>
                </div>
            </div>
        </div>
    </body>
</html>