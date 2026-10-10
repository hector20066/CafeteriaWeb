# Grano & Alma — CafeteriaWeb

Aplicación web para una cafetería de especialidad que incluye un **menú público** y un **panel de administración** para la gestión de productos y empleados. Está desarrollada en **PHP (PDO + MySQL)** con una arquitectura por capas: Controller, Service, DAO y Entidades/DTO.

---

## Tabla de contenidos

- [Características](#características)
- [Tecnologías](#tecnologías)
- [Estructura del proyecto](#estructura-del-proyecto)
- [Requisitos](#requisitos)
- [Instalación](#instalación)
- [Variables de entorno](#variables-de-entorno)
- [Base de datos](#base-de-datos)
- [Creación del primer usuario administrador](#creación-del-primer-usuario-administrador)
- [Ejecución](#ejecución)
- [Rutas principales](#rutas-principales)
- [Roles de usuario](#roles-de-usuario)
- [Estado del proyecto](#estado-del-proyecto)
- [Autor](#autor)

---

## Características

**Sitio público**

- Páginas de inicio, nosotros y contacto.
- Menú de productos cargado dinámicamente desde la base de datos.
- Página de detalle por producto, con descripción y características.
- Diseño adaptable (responsive) con menú móvil.

**Panel de administración**

- Panel de inicio con contadores de productos, usuarios y categorías.
- Gestión de productos: listado, alta y baja.
- Gestión de usuarios y empleados: listado, alta y baja.
- Autenticación con contraseñas cifradas mediante BCrypt (cost 12).

---

## Tecnologías

| Capa | Tecnología |
|------|------------|
| Backend | PHP 8.1+ (enums, tipado, PDO) |
| Base de datos | MySQL / MariaDB |
| Frontend | HTML5, CSS3, JavaScript |
| Seguridad | `password_hash` / `password_verify` (BCrypt) |
| Tipografías | Fraunces e Inter (Google Fonts) |

---

## Estructura del proyecto

```
CafeteriaWeb/
├── index.html                  * Página de inicio
├── DATABASE.sql                * Script de creación de la base de datos
├── config/
│   └── env.php                 * Carga de variables desde .env
├── database/                   * Conexión PDO (Singleton) y proveedor de conexión
├── model/
│   ├── entities/               * Product, Category, Characteristics, User
│   ├── dto/                    * Objetos de transferencia de datos
│   ├── builder/dto/            * Builders de DTO
│   ├── dao/
│   │   ├── interfaces/         * Contratos de acceso a datos
│   │   └── impl/               * Implementaciones con PDO
│   └── enums/Roles.php         * Roles de usuario
├── service/
│   ├── interfaces/             * Contratos de la lógica de negocio
│   └── impl/                   * Implementaciones de servicios
├── controller/                 * Controladores (admin, login, public)
├── security/                   * Autenticación y cifrado BCrypt
├── view/
│   ├── public/                 * Nosotros, menú, detalle, contacto
│   ├── login/                  * Inicio de sesión
│   └── admin/                  * Panel: inicio, productos, usuarios
├── css/                        * style.css, admin.css
├── js/                         * script.js, admin/script.js
└── img/                        * Imágenes del sitio y de los productos
```

---

## Requisitos

- PHP 8.1 o superior con la extensión `pdo_mysql` habilitada.
- MySQL 5.7+ o MariaDB 10.3+.
- Servidor web (Apache o Nginx) o el servidor integrado de PHP.
- Compatible con entornos locales como XAMPP, Laragon o WAMP.

---

## Instalación

1. Clonar el repositorio:

   ```bash
   git clone https://github.com/<usuario>/CafeteriaWeb.git
   cd CafeteriaWeb
   ```

2. Crear el archivo `.env` en la raíz del proyecto (ver [Variables de entorno](#variables-de-entorno)).

3. Crear la base de datos importando el script SQL (ver [Base de datos](#base-de-datos)).

4. Iniciar el servidor (ver [Ejecución](#ejecución)).

---

## Variables de entorno

La configuración se lee desde un archivo `.env` ubicado en la raíz del proyecto. Este archivo está incluido en el `.gitignore`, por lo que no se versiona en el repositorio.

Ejemplo de contenido:

```ini
DB_DRIVER=mysql
DB_LOCAL_HOST=localhost
DB_PORT=3306
DB_LOCAL_NAME=db_cafeteria
DB_LOCAL_USER=root
DB_LOCAL_PASSWD=
```

| Variable | Descripción |
|----------|-------------|
| `DB_DRIVER` | Driver de PDO (`mysql`) |
| `DB_LOCAL_HOST` | Host de la base de datos |
| `DB_PORT` | Puerto de la base de datos |
| `DB_LOCAL_NAME` | Nombre de la base de datos |
| `DB_LOCAL_USER` | Usuario de la base de datos |
| `DB_LOCAL_PASSWD` | Contraseña del usuario |

---

## Base de datos

El script `DATABASE.sql` crea la base de datos `db_cafeteria` junto con sus tablas:

```bash
mysql -u root -p < DATABASE.sql
```

También puede importarse desde phpMyAdmin mediante la opción **Importar**.

| Tabla | Descripción |
|-------|-------------|
| `categories` | Categorías de productos |
| `products` | Productos del menú (nombre, slug, precio, imagen y descripción) |
| `characteristics` | Características de cada producto |
| `users` | Empleados con acceso al sistema (contraseña cifrada y rol) |

> **Nota:** el script no incluye datos de ejemplo. Para que el menú muestre productos es necesario registrar previamente al menos una categoría.

---

## Creación del primer usuario administrador

El script no inserta usuarios. Para crear el primero, se debe generar el hash de la contraseña con PHP:

```bash
php -r "echo password_hash('ContraseñaSegura', PASSWORD_BCRYPT, ['cost' => 12]);"
```

Posteriormente, se registra el usuario en la base de datos con el hash obtenido:

```sql
USE db_cafeteria;

INSERT INTO users (name, email, passwd, role)
VALUES ('Administrador', 'admin@granoyalma.com', '<HASH_GENERADO>', 'Administrador');
```

---

## Ejecución

**Servidor integrado de PHP** (recomendado para desarrollo):

```bash
php -S localhost:8000
```

La aplicación estará disponible en `http://localhost:8000`.

**XAMPP, Laragon o WAMP:** copiar el proyecto en el directorio `htdocs` (o `www`) y acceder a `http://localhost/CafeteriaWeb/`.

---

## Rutas principales

| Ruta | Descripción |
|------|-------------|
| `/index.html` | Inicio |
| `/view/public/nosotros.html` | Nosotros |
| `/view/public/menu.php` | Menú de productos |
| `/view/public/detalle.php` | Detalle de un producto |
| `/view/public/contacto.html` | Contacto |
| `/view/login/login.php` | Inicio de sesión |
| `/view/admin/index.php` | Panel de administración |
| `/view/admin/productos.php` | Gestión de productos |
| `/view/admin/usuarios.php` | Gestión de usuarios |

---

## Roles de usuario

Los roles disponibles están definidos en `model/enums/Roles.php`:

| Rol | Valor almacenado |
|-----|------------------|
| Administrador | `Administrador` |
| Barista | `Barista` |
| Mesero | `Mesero` |
| Cajero | `Cajero` |

---

## Estado del proyecto

El proyecto se encuentra en desarrollo. Los siguientes puntos están pendientes:

- Implementar el manejo de sesiones y proteger las rutas del panel de administración.
- Completar los controladores de contacto y de registro de productos.
- Implementar el control de acceso según el rol del usuario.
- Mostrar mensajes de error y confirmación en el formulario de inicio de sesión.

---

## Autor

Desarrollado por: 
- Andrés Cárdenas
- Hector Acevedo
