# 🔗 LinkVault

![PHP](https://img.shields.io/badge/PHP-8.x-777BB4?logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-Database-4479A1?logo=mysql&logoColor=white)
![JavaScript](https://img.shields.io/badge/JavaScript-ES6-F7DF1E?logo=javascript&logoColor=black)
![HTML5](https://img.shields.io/badge/HTML5-E34F26?logo=html5&logoColor=white)
![CSS3](https://img.shields.io/badge/CSS3-1572B6?logo=css3&logoColor=white)

**LinkVault** es una aplicación web desarrollada como proyecto de práctica y portafolio para gestionar enlaces personales de forma organizada.

Permite registrar recursos web, clasificarlos mediante categorías y etiquetas, marcarlos como favoritos y encontrarlos rápidamente mediante filtros y búsqueda.

El proyecto fue desarrollado principalmente con **PHP, MySQL, HTML5, CSS3 y JavaScript**, sin utilizar un framework backend, con el objetivo de practicar y reforzar fundamentos de desarrollo web antes de avanzar hacia arquitecturas y frameworks más complejos.

---

## 📸 Vista general

LinkVault utiliza una interfaz oscura orientada a mantener los enlaces almacenados organizados y fácilmente accesibles.

![Vista principal de LinkVault](docs/screenshots/01-main-view.png)

---

## ✨ Características principales

- Crear nuevos enlaces.
- Editar enlaces existentes.
- Eliminar enlaces mediante confirmación previa.
- Marcar y desmarcar enlaces como favoritos.
- Organizar enlaces mediante categorías.
- Asociar múltiples tags a cada enlace.
- Buscar enlaces por título, URL o descripción.
- Filtrar enlaces por categoría.
- Mostrar únicamente enlaces favoritos.
- Validar URLs duplicadas.
- Mostrar mensajes de confirmación después de crear, editar o eliminar.
- Persistir la información mediante MySQL.
- Utilizar consultas preparadas mediante PDO.
- Adaptar la interfaz a diferentes tamaños de pantalla.
- Mantener una interfaz visual oscura desarrollada con CSS.

---

# 🛠️ Tecnologías utilizadas

| Tecnología | Uso |
|---|---|
| **PHP** | Lógica backend, procesamiento de formularios y acceso a datos |
| **MySQL** | Persistencia y organización de datos |
| **PDO** | Comunicación entre PHP y MySQL mediante consultas preparadas |
| **HTML5** | Estructura de las vistas |
| **CSS3** | Diseño, interfaz oscura y comportamiento responsive |
| **JavaScript** | Interacciones, filtros y comportamiento dinámico |
| **Git** | Control de versiones |
| **GitHub** | Repositorio y documentación del proyecto |
| **Laragon** | Entorno de desarrollo local utilizado durante el desarrollo |

---

# 🗂️ Estructura del proyecto

```text
LinkVault/
│
├── app/
│   └── repositories/
│       ├── CategoryRepository.php
│       ├── LinkRepository.php
│       └── TagRepository.php
│
├── config/
│   ├── database.php
│   └── database.example.php
│
├── database/
│   ├── schema.sql
│   └── seed.sql
│
├── docs/
│   └── screenshots/
│       ├── 01-main-view.png
│       ├── 02-create-form.png
│       ├── 03-create-example.png
│       ├── 04-edit-form.png
│       ├── 05-create-success.png
│       ├── 06-edit-success.png
│       ├── 07-delete-confirmation.png
│       ├── 08-delete-confirmation-main.png
│       ├── 09-category-filter.png
│       ├── 10-favorites-filter.png
│       ├── 11-mobile-view.png
│       └── 12-tablet-view.png
│
├── public/
│   ├── assets/
│   │   ├── css/
│   │   └── js/
│   └── index.php
│
├── views/
│   └── links/
│       ├── create.php
│       ├── edit.php
│       └── index.php
│
├── .gitignore
└── README.md
```

`public/index.php` funciona como punto de entrada principal de la aplicación.

Los repositorios ubicados en `app/repositories/` concentran las operaciones relacionadas con los datos, mientras que las vistas ubicadas en `views/` se encargan de presentar la interfaz al usuario.

---

# 🖥️ Funcionamiento

Las siguientes capturas muestran un ejemplo completo de utilización de LinkVault.

Para demostrar las operaciones CRUD se utiliza **Código Facilito** como enlace de ejemplo.

> **Nota sobre los datos de demostración**
>
> Los nombres, URLs y referencias a sitios web o servicios externos que aparecen en las capturas, incluyendo Código Facilito, Platzi, Cisco Networking Academy, Udemy, Wikipedia, PHP y GitHub, se utilizan exclusivamente como **datos de ejemplo** para demostrar el funcionamiento de LinkVault.
>
> Su aparición en este proyecto no implica afiliación, patrocinio, colaboración, representación, aprobación ni relación oficial alguna entre LinkVault, su autor y las organizaciones o marcas mencionadas.
>
> LinkVault no utiliza sus nombres con fines comerciales ni pretende hacerse pasar por ninguno de estos servicios.

---

## ➕ 1. Crear un enlace

Al seleccionar **Agregar nuevo enlace**, LinkVault presenta un formulario desde el cual se puede registrar un nuevo recurso.

El formulario permite ingresar:

- Título.
- URL.
- Descripción.
- Tags.
- Categoría.

![Formulario para crear un enlace](docs/screenshots/02-create-form.png)

Para demostrar esta funcionalidad se utiliza **Código Facilito** como ejemplo.

En la siguiente captura se completa el formulario con una URL, una descripción, una categoría y diferentes tags.

![Ejemplo de creación utilizando Código Facilito](docs/screenshots/03-create-example.png)

Al guardar el formulario, LinkVault almacena el nuevo registro y regresa automáticamente al listado principal.

El mensaje **“Enlace guardado correctamente”** confirma que la operación fue realizada.

![Código Facilito creado correctamente](docs/screenshots/05-create-success.png)

---

## ✏️ 2. Editar un enlace

Cada registro dispone de una acción **Editar**.

Al utilizarla, LinkVault recupera la información almacenada y la carga nuevamente en el formulario.

En este ejemplo se modifica el enlace de Código Facilito, incluyendo su descripción y los tags asociados.

![Edición del enlace de Código Facilito](docs/screenshots/04-edit-form.png)

Después de guardar los cambios, la aplicación regresa al listado principal y muestra el mensaje:

**“Enlace actualizado correctamente.”**

También es posible observar inmediatamente los nuevos datos almacenados.

![Código Facilito actualizado correctamente](docs/screenshots/06-edit-success.png)

---

## 🗑️ 3. Eliminar un enlace

Para reducir el riesgo de eliminar información accidentalmente, la acción **Eliminar** no borra inmediatamente el registro.

Primero se presenta una ventana de confirmación indicando el enlace que será eliminado.

En el ejemplo se solicita eliminar el registro correspondiente a Código Facilito.

![Confirmación para eliminar Código Facilito](docs/screenshots/07-delete-confirmation.png)

El usuario puede cancelar la operación o confirmar definitivamente la eliminación.

Después de confirmar, LinkVault elimina el registro y muestra el mensaje:

**“Enlace eliminado correctamente.”**

El enlace de Código Facilito deja entonces de aparecer en el listado.

![Eliminación de Código Facilito completada](docs/screenshots/08-delete-confirmation-main.png)

---

# 🔎 Búsqueda, categorías y favoritos

Además de las operaciones CRUD, LinkVault incorpora herramientas para facilitar la localización y organización de los enlaces almacenados.

## Categorías y búsqueda

Los enlaces pueden organizarse mediante categorías y localizarse utilizando el campo de búsqueda.

El buscador puede comparar la información introducida con los datos disponibles en los registros, facilitando la localización de un enlace específico.

En la siguiente captura se utiliza nuevamente **Código Facilito** como término de ejemplo:

![Búsqueda y filtrado de enlaces](docs/screenshots/09-category-filter.png)

Las categorías permiten complementar esta funcionalidad agrupando los enlaces según el tipo de recurso almacenado.

---

## ⭐ Favoritos

Cada enlace puede marcarse o desmarcarse como favorito utilizando el control correspondiente.

La opción **Mostrar solo favoritos** permite ocultar temporalmente los demás registros.

En el ejemplo, el filtro deja visible únicamente el enlace marcado como favorito:

![Filtro de favoritos](docs/screenshots/10-favorites-filter.png)

---

# 📱 Diseño responsive

LinkVault incorpora reglas CSS responsive para adaptar la interfaz a diferentes dimensiones de pantalla.

El diseño fue probado tanto en escritorio como en resoluciones representativas de dispositivos móviles y tablets.

En pantallas pequeñas:

- El encabezado reorganiza sus elementos.
- El botón principal se adapta al ancho disponible.
- Los filtros mantienen un tamaño adecuado para la pantalla.
- La tabla conserva su estructura.
- Cuando la tabla supera el ancho disponible, puede recorrerse horizontalmente para acceder a las columnas restantes.

Esta última decisión permite conservar la estructura tabular de LinkVault incluso en dispositivos estrechos, en lugar de eliminar información o transformar completamente los registros.

## Vista móvil

La siguiente captura muestra LinkVault utilizando una resolución móvil:

![Vista responsive móvil](docs/screenshots/11-mobile-view.png)

La tabla continúa siendo accesible mediante desplazamiento horizontal.

## Vista tablet

En una pantalla de mayor tamaño, la aplicación aprovecha el espacio adicional manteniendo la misma estructura general:

![Vista responsive tablet](docs/screenshots/12-tablet-view.png)

---

# 🚀 Instalación y ejecución local

## Requisitos

Para ejecutar LinkVault localmente se necesita:

- PHP.
- MySQL o MariaDB.
- Un navegador web.
- Un entorno local compatible o acceso al servidor integrado de PHP.

Durante el desarrollo del proyecto se utilizó **Laragon en Windows** para disponer fácilmente de PHP, MySQL y las herramientas necesarias para trabajar localmente.

---

## ⚠️ Nota sobre Laragon y su licencia

**Laragon es un proyecto externo e independiente de LinkVault.**

Laragon no forma parte de este repositorio, no es distribuido junto con LinkVault y mantiene sus propios términos y condiciones de uso.

Las versiones actuales de Laragon utilizan un modelo de licenciamiento definido por sus desarrolladores. Determinados usos no comerciales pueden realizarse sin adquirir una licencia comercial, mientras que el uso comercial está sujeto a las condiciones y licencias establecidas por Laragon.

LinkVault fue desarrollado utilizando Laragon únicamente como **entorno local de desarrollo y aprendizaje**.

Por este motivo, este repositorio no concede, modifica ni sustituye ningún derecho relacionado con Laragon.

Antes de instalar o utilizar Laragon, especialmente para actividades profesionales, empresariales o comerciales, se recomienda consultar la documentación y los términos de licencia oficiales vigentes del proyecto.

También es posible ejecutar LinkVault utilizando otro entorno compatible con PHP y MySQL.

---

# ⚙️ Configuración

## 1. Clonar el repositorio

```bash
git clone <URL-DEL-REPOSITORIO>
```

Ingresar posteriormente al directorio del proyecto:

```bash
cd linkvault
```

---

## 2. Preparar la base de datos

Crear una base de datos denominada:

```text
linkvault
```

Después ejecutar:

```text
database/schema.sql
```

Este archivo contiene la estructura necesaria para crear las tablas utilizadas por LinkVault.

Opcionalmente se puede ejecutar:

```text
database/seed.sql
```

para incorporar los datos iniciales incluidos con el proyecto.

---

## 3. Configurar la conexión

El proyecto incluye el archivo:

```text
config/database.example.php
```

Crear una copia con el nombre:

```text
config/database.php
```

y configurar los datos correspondientes al entorno local.

Ejemplo:

```php
$host = 'localhost';
$dbname = 'linkvault';
$user = 'root';
$password = '';
```

`database.php` representa la configuración local y no debe utilizarse para publicar credenciales privadas o reales en el repositorio.

---

# ▶️ Ejecución utilizando Laragon

El procedimiento utilizado durante el desarrollo fue el siguiente:

### 1. Iniciar Laragon

Ejecutar Laragon y comprobar que **MySQL** se encuentre iniciado.

### 2. Abrir una terminal

Desde la terminal, ingresar a la carpeta raíz de LinkVault.

Por ejemplo:

```powershell
cd "E:\Desarrollo\Portafolio\01 - LinkVault"
```

> La ruta anterior corresponde únicamente a un ejemplo de la ubicación utilizada durante el desarrollo. Cada usuario debe utilizar la ruta donde haya clonado o descargado el proyecto.

### 3. Iniciar el servidor PHP

Ejecutar:

```bash
php -S localhost:8000 -t public
```

La opción:

```text
-t public
```

establece `public/` como raíz pública del servidor.

De esta manera, `public/index.php` funciona como punto de entrada de la aplicación y los directorios internos del proyecto no se utilizan como raíz pública.

### 4. Abrir LinkVault

Desde el navegador ingresar a:

```text
http://localhost:8000
```

Si PHP, MySQL y la configuración de la base de datos están funcionando correctamente, se mostrará la página principal de LinkVault.

---

# 🧠 Objetivo del proyecto

LinkVault es principalmente un **proyecto de práctica, aprendizaje y portafolio**.

No fue desarrollado con el objetivo de competir con servicios comerciales de gestión de marcadores.

Su propósito es poner en práctica fundamentos de desarrollo web construyendo una aplicación funcional desde sus componentes básicos antes de avanzar hacia frameworks y arquitecturas de mayor nivel.

Durante su desarrollo se practicaron conceptos como:

- Organización de un proyecto PHP.
- Separación entre lógica, acceso a datos y presentación.
- Operaciones CRUD.
- Formularios y procesamiento de solicitudes.
- Acceso a MySQL mediante PDO.
- Consultas preparadas.
- Relaciones entre tablas.
- Relaciones many-to-many mediante tags.
- Categorías.
- Validación de datos.
- Prevención de URLs duplicadas.
- Patrón Post/Redirect/Get.
- Manipulación del DOM mediante JavaScript.
- Búsqueda y filtrado.
- Gestión de favoritos.
- Diseño responsive.
- Control de versiones mediante Git.
- Documentación de proyectos mediante GitHub.

---

# 🔐 Consideraciones de seguridad

LinkVault incorpora prácticas básicas de seguridad y organización apropiadas para el alcance educativo del proyecto:

- Consultas preparadas mediante PDO.
- Validación de datos recibidos desde formularios.
- Escape de información presentada en las vistas.
- Separación de la configuración de base de datos.
- Exclusión de credenciales locales mediante `.gitignore`.
- Validación de URLs duplicadas.

Al tratarse de un proyecto educativo y no de una aplicación preparada para producción, existen aspectos que podrían ampliarse posteriormente, como:

- Autenticación de usuarios.
- Autorización y roles.
- Protección CSRF.
- Gestión avanzada de sesiones.
- Registro de actividad.
- Configuración para despliegue en producción.
- Pruebas automatizadas.

---

# 📌 Estado del proyecto

**Estado actual: funcional — proyecto de práctica y portafolio.**

Las principales funcionalidades planificadas se encuentran implementadas:

**CRUD + categorías + tags + favoritos + búsqueda + filtros + persistencia MySQL + diseño responsive.**

El proyecto puede continuar evolucionando a medida que se incorporen nuevos conocimientos y funcionalidades.

---

# 👨‍💻 Autor

**Carlos Orellana**

Analista Programador.

Proyecto desarrollado como parte de un portafolio personal orientado a reforzar y demostrar conocimientos de desarrollo web.

---

# 📄 Licencias y marcas de terceros

LinkVault es un proyecto personal de aprendizaje y portafolio.

Las herramientas, tecnologías, sitios web, servicios, nombres comerciales y marcas mencionados pertenecen a sus respectivos propietarios.

Las referencias utilizadas dentro de los datos de demostración tienen exclusivamente una finalidad ilustrativa y educativa y **no representan afiliación, patrocinio ni relación comercial** con este proyecto o su autor.

Las herramientas externas utilizadas durante el desarrollo, incluyendo Laragon, mantienen sus propias licencias y términos de uso.


---

# 🇺🇸 English Version

# 🔗 LinkVault

![PHP](https://img.shields.io/badge/PHP-8.x-777BB4?logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-Database-4479A1?logo=mysql&logoColor=white)
![JavaScript](https://img.shields.io/badge/JavaScript-ES6-F7DF1E?logo=javascript&logoColor=black)
![HTML5](https://img.shields.io/badge/HTML5-E34F26?logo=html5&logoColor=white)
![CSS3](https://img.shields.io/badge/CSS3-1572B6?logo=css3&logoColor=white)

**LinkVault** is a web application developed as a practice and portfolio project for organizing and managing personal links.

It allows users to save web resources, organize them using categories and tags, mark them as favorites, and quickly find them through search and filtering tools.

The project was developed primarily with **PHP, MySQL, HTML5, CSS3, and JavaScript**, without using a backend framework. Its purpose is to practice and reinforce fundamental web development concepts before moving on to more complex frameworks and architectures.

---

## 📸 Overview

LinkVault uses a dark interface designed to keep stored links organized and easily accessible.

![LinkVault main view](docs/screenshots/01-main-view.png)

---

## ✨ Main Features

- Create new links.
- Edit existing links.
- Delete links with a confirmation step.
- Mark and unmark links as favorites.
- Organize links using categories.
- Associate multiple tags with each link.
- Search links by title, URL, or description.
- Filter links by category.
- Display favorite links only.
- Prevent duplicate URLs.
- Display confirmation messages after creating, editing, or deleting records.
- Store information using MySQL.
- Use PDO prepared statements for database operations.
- Adapt the interface to different screen sizes.
- Provide a dark user interface built with CSS.

---

# 🛠️ Technologies Used

| Technology | Purpose |
|---|---|
| **PHP** | Backend logic, form processing, and data access |
| **MySQL** | Data storage and organization |
| **PDO** | Communication between PHP and MySQL using prepared statements |
| **HTML5** | Structure of the application views |
| **CSS3** | Styling, dark interface, and responsive behavior |
| **JavaScript** | Interactions, filters, and dynamic behavior |
| **Git** | Version control |
| **GitHub** | Repository hosting and project documentation |
| **Laragon** | Local development environment used during development |

---

# 🗂️ Project Structure

```text
LinkVault/
│
├── app/
│   └── repositories/
│       ├── CategoryRepository.php
│       ├── LinkRepository.php
│       └── TagRepository.php
│
├── config/
│   ├── database.php
│   └── database.example.php
│
├── database/
│   ├── schema.sql
│   └── seed.sql
│
├── docs/
│   └── screenshots/
│       ├── 01-main-view.png
│       ├── 02-create-form.png
│       ├── 03-create-example.png
│       ├── 04-edit-form.png
│       ├── 05-create-success.png
│       ├── 06-edit-success.png
│       ├── 07-delete-confirmation.png
│       ├── 08-delete-confirmation-main.png
│       ├── 09-category-filter.png
│       ├── 10-favorites-filter.png
│       ├── 11-mobile-view.png
│       └── 12-tablet-view.png
│
├── public/
│   ├── assets/
│   │   ├── css/
│   │   └── js/
│   └── index.php
│
├── views/
│   └── links/
│       ├── create.php
│       ├── edit.php
│       └── index.php
│
├── .gitignore
└── README.md
```

`public/index.php` works as the main entry point of the application.

The repositories located in `app/repositories/` handle data-related operations, while the views located in `views/` are responsible for presenting the user interface.

---

# 🖥️ How It Works

The following screenshots demonstrate a complete example of how LinkVault can be used.

For the CRUD examples, **Código Facilito** is used as a sample link.

> **Note about demonstration data**
>
> Names, URLs, and references to external websites or services shown in the screenshots — including Código Facilito, Platzi, Cisco Networking Academy, Udemy, Wikipedia, PHP, and GitHub — are used exclusively as **sample data** to demonstrate LinkVault's functionality.
>
> Their appearance in this project does not imply any affiliation, sponsorship, partnership, representation, endorsement, or official relationship between LinkVault, its author, and any of the organizations or brands mentioned.
>
> LinkVault does not use these names for commercial purposes and does not claim to represent any of these services.

---

## ➕ 1. Creating a Link

By selecting **Agregar nuevo enlace** ("Add new link"), LinkVault displays a form where a new web resource can be registered.

The form allows the user to provide:

- Title.
- URL.
- Description.
- Tags.
- Category.

![Create link form](docs/screenshots/02-create-form.png)

For this demonstration, **Código Facilito** is used as the example resource.

The following screenshot shows the form completed with a URL, description, category, and several tags.

![Código Facilito creation example](docs/screenshots/03-create-example.png)

After submitting the form, LinkVault stores the new record and automatically returns to the main list.

The message **“Enlace guardado correctamente.”** ("Link saved successfully.") confirms that the operation was completed.

![Código Facilito successfully created](docs/screenshots/05-create-success.png)

---

## ✏️ 2. Editing a Link

Each stored record provides an **Editar** ("Edit") action.

When this option is selected, LinkVault retrieves the existing information and loads it into the editing form.

In this example, the Código Facilito record is modified, including its description and associated tags.

![Editing the Código Facilito link](docs/screenshots/04-edit-form.png)

After saving the changes, the application returns to the main list and displays:

**“Enlace actualizado correctamente.”** ("Link updated successfully.")

The updated information can immediately be seen in the list.

![Código Facilito successfully updated](docs/screenshots/06-edit-success.png)

---

## 🗑️ 3. Deleting a Link

To reduce the risk of accidentally deleting information, the **Eliminar** ("Delete") action does not immediately remove the record.

Instead, LinkVault first displays a confirmation dialog identifying the link that will be deleted.

In this example, the application asks for confirmation before deleting the Código Facilito record.

![Código Facilito deletion confirmation](docs/screenshots/07-delete-confirmation.png)

The user can cancel the operation or confirm the deletion.

After confirmation, LinkVault removes the record and displays:

**“Enlace eliminado correctamente.”** ("Link deleted successfully.")

The Código Facilito record then disappears from the list.

![Código Facilito successfully deleted](docs/screenshots/08-delete-confirmation-main.png)

---

# 🔎 Search, Categories, and Favorites

In addition to CRUD operations, LinkVault includes tools designed to make stored links easier to organize and find.

## Categories and Search

Links can be organized into categories and located through the search field.

The search functionality can use information contained in stored records, making it easier to locate a specific resource.

In the following screenshot, **Código Facilito** is used again as the example search term:

![Link search and filtering](docs/screenshots/09-category-filter.png)

Categories provide an additional method for grouping and filtering stored resources.

---

## ⭐ Favorites

Each link can be marked or unmarked as a favorite using its corresponding control.

The **Mostrar solo favoritos** ("Show favorites only") option temporarily hides all records that are not marked as favorites.

In the following example, the filter leaves only the favorite link visible:

![Favorites filter](docs/screenshots/10-favorites-filter.png)

---

# 📱 Responsive Design

LinkVault includes responsive CSS rules to adapt its interface to different screen sizes.

The interface was tested on desktop displays as well as representative mobile and tablet resolutions.

On smaller screens:

- The header reorganizes its elements.
- The main action button adapts to the available width.
- Filters remain accessible at reduced screen sizes.
- The table preserves its original structure.
- When the table becomes wider than the available screen space, horizontal scrolling can be used to access the remaining columns.

This approach allows LinkVault to preserve its tabular structure on narrow screens instead of removing information or completely transforming each record.

## Mobile View

The following screenshot shows LinkVault using a mobile-sized viewport:

![LinkVault responsive mobile view](docs/screenshots/11-mobile-view.png)

The remaining table columns can be accessed through horizontal scrolling.

## Tablet View

On a larger screen, LinkVault takes advantage of the additional available space while maintaining the same general interface:

![LinkVault responsive tablet view](docs/screenshots/12-tablet-view.png)

---

# 🚀 Local Installation and Execution

## Requirements

To run LinkVault locally, the following components are required:

- PHP.
- MySQL or MariaDB.
- A web browser.
- A compatible local development environment or access to PHP's built-in development server.

During development, **Laragon on Windows** was used to provide PHP, MySQL, and the tools required to run the application locally.

---

## ⚠️ Note About Laragon and Licensing

**Laragon is an external project and is independent from LinkVault.**

Laragon is not part of this repository, is not distributed with LinkVault, and is governed by its own terms and conditions.

Current versions of Laragon use a licensing model defined by its developers. Certain non-commercial uses may be performed without purchasing a commercial license, while commercial use is subject to Laragon's applicable licensing terms.

LinkVault was developed using Laragon solely as a **local development and learning environment**.

Therefore, this repository does not grant, modify, replace, or otherwise affect any rights associated with Laragon.

Before installing or using Laragon, particularly for professional, business, or commercial purposes, users should review the current official Laragon documentation and licensing terms.

LinkVault can also be executed using another environment compatible with PHP and MySQL.

---

# ⚙️ Configuration

## 1. Clone the Repository

```bash
git clone <REPOSITORY-URL>
```

Then enter the project directory:

```bash
cd linkvault
```

---

## 2. Prepare the Database

Create a database named:

```text
linkvault
```

Then execute:

```text
database/schema.sql
```

This file contains the database structure required by LinkVault.

Optionally, execute:

```text
database/seed.sql
```

to load the initial data included with the project.

---

## 3. Configure the Database Connection

The project includes:

```text
config/database.example.php
```

Create a copy named:

```text
config/database.php
```

and configure it according to the local MySQL environment.

Example:

```php
$host = 'localhost';
$dbname = 'linkvault';
$user = 'root';
$password = '';
```

`database.php` represents local environment configuration and should not be used to publish private or production credentials in the repository.

---

# ▶️ Running the Project with Laragon

The following procedure was used during development:

### 1. Start Laragon

Open Laragon and make sure that **MySQL** is running.

### 2. Open a Terminal

Navigate to the root directory of LinkVault.

For example:

```powershell
cd "E:\Desarrollo\Portafolio\01 - LinkVault"
```

> The path above is only an example based on the development environment used for this project. Users should replace it with the location where they cloned or downloaded LinkVault.

### 3. Start the PHP Development Server

Run:

```bash
php -S localhost:8000 -t public
```

The option:

```text
-t public
```

sets `public/` as the server's document root.

This allows `public/index.php` to work as the application's entry point while keeping internal directories outside the public document root.

### 4. Open LinkVault

Open the following address in a web browser:

```text
http://localhost:8000
```

If PHP, MySQL, and the database configuration are working correctly, the LinkVault main page should be displayed.

---

# 🧠 Project Purpose

LinkVault is primarily a **practice, learning, and portfolio project**.

It was not developed with the intention of competing with commercial bookmark-management services.

Its purpose is to practice fundamental web development concepts by building a functional application from its basic components before moving on to higher-level frameworks and architectures.

Concepts practiced during development include:

- PHP project organization.
- Separation of logic, data access, and presentation.
- CRUD operations.
- Forms and request processing.
- MySQL access using PDO.
- Prepared statements.
- Database relationships.
- Many-to-many relationships using tags.
- Categories.
- Data validation.
- Duplicate URL prevention.
- Post/Redirect/Get pattern.
- DOM manipulation using JavaScript.
- Search and filtering.
- Favorite management.
- Responsive design.
- Version control using Git.
- Project documentation using GitHub.

---

# 🔐 Security Considerations

LinkVault incorporates basic security and organizational practices appropriate for the educational scope of the project:

- PDO prepared statements.
- Validation of data received from forms.
- Escaping information displayed in views.
- Separation of database configuration.
- Exclusion of local credentials through `.gitignore`.
- Duplicate URL validation.

As this is an educational project rather than a production-ready application, additional features and security measures could be implemented in the future, including:

- User authentication.
- Authorization and roles.
- CSRF protection.
- Advanced session management.
- Activity logging.
- Production deployment configuration.
- Automated testing.

---

# 📌 Project Status

**Current status: functional — practice and portfolio project.**

The main planned features have been implemented:

**CRUD + categories + tags + favorites + search + filters + MySQL persistence + responsive design.**

The project may continue to evolve as new concepts and features are explored.

---

# 👨‍💻 Author

**Carlos Orellana**

Programmer Analyst.

Project developed as part of a personal portfolio focused on reinforcing and demonstrating web development knowledge.

---

# 📄 Third-Party Licenses and Trademarks

LinkVault is a personal learning and portfolio project.

External tools, technologies, websites, services, trade names, and trademarks mentioned in this project belong to their respective owners.

References appearing in demonstration data are provided exclusively for **illustrative and educational purposes** and do **not represent affiliation, sponsorship, endorsement, or a commercial relationship** with this project or its author.

External tools used during development, including Laragon, remain subject to their own licenses and terms of use.
