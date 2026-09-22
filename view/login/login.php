<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Iniciar sesión - Panel administrativo | Grano & Alma</title>
    </head>
    <body>
        <div>
            <div>
                <img src="../../img/favicon.svg" alt="icono pagina">
                <span>Grano & Alma</span>
            </div>
            <p>Panel administrativo - acceso exclusivo para empleados</p>

            <form>
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

            <div class="admin-logo-return">
                <a href="../../index.html">&larr; Volver al sitio</a>
            </div>
        </div>
    </body>
</html>