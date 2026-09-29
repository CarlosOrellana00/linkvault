# LinkVault

![PHP](https://img.shields.io/badge/PHP-8.x-777BB4?logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-8.x-4479A1?logo=mysql&logoColor=white)
![JavaScript](https://img.shields.io/badge/JavaScript-ES6-F7DF1E?logo=javascript&logoColor=black)
![HTML5](https://img.shields.io/badge/HTML5-E34F26?logo=html5&logoColor=white)
![CSS3](https://img.shields.io/badge/CSS3-1572B6?logo=css3&logoColor=white)

Gestor personal de enlaces desarrollado como proyecto de portafolio para practicar desarrollo web full stack con PHP, MySQL y JavaScript.

> **Estado actual:** funcional. El proyecto continúa en una etapa de revisión y mejoras de interfaz, responsive, seguridad y documentación.

---

# Español

## Descripción

**LinkVault** es una aplicación web para almacenar, organizar y consultar enlaces personales desde una interfaz sencilla.

Cada enlace puede contener un título, URL, descripción y categoría. Además, puede marcarse como favorito y asociarse a uno o varios tags.

El proyecto comenzó como un CRUD básico y posteriormente fue reestructurado para separar la lógica de acceso a datos, las vistas, la configuración y el punto de entrada de la aplicación.

Su objetivo principal es practicar fundamentos de desarrollo web sin utilizar un framework backend, trabajando directamente con PHP, PDO, MySQL, HTML, CSS y JavaScript.

---

## Funcionalidades actuales

- Crear enlaces.
- Consultar y listar enlaces almacenados.
- Editar enlaces existentes.
- Eliminar enlaces.
- Validar URLs.
- Evitar URLs duplicadas.
- Organizar enlaces mediante categorías.
- Asociar múltiples tags a un enlace.
- Editar las asociaciones entre enlaces y tags.
- Marcar y desmarcar enlaces como favoritos.
- Filtrar enlaces por categoría.
- Mostrar únicamente enlaces favoritos.
- Buscar por título, URL o descripción.
- Mostrar mensajes de confirmación y validación.
- Interfaz con tema oscuro.

---

## Categorías y tags

LinkVault utiliza dos sistemas complementarios para organizar los enlaces.

### Categorías

Cada enlace pertenece a una categoría principal.

Ejemplos:

- Programación
- Documentación
- Trabajo
- Herramientas
- Aprendizaje

La relación entre enlaces y categorías es de **muchos a uno**: varios enlaces pueden pertenecer a una misma categoría, pero cada enlace posee una categoría principal.

### Tags

Los tags permiten describir un enlace mediante múltiples tecnologías o conceptos.

Ejemplos:

- PHP
- Laravel
- JavaScript
- MySQL
- React
- Git
- API

Los enlaces y tags utilizan una relación **muchos a muchos**, implementada mediante la tabla intermedia `link_tag`.

Un enlace puede tener varios tags y un mismo tag puede estar asociado a múltiples enlaces.

---

## Tecnologías

| Tecnología | Versión | Uso |
|---|---|---|
| PHP | 8.x* | Backend y lógica de aplicación |
| MySQL | 8.x* | Base de datos relacional |
| PDO | Incluido con PHP | Conexión y consultas a MySQL |
| HTML | HTML5 | Estructura de las vistas |
| CSS | CSS3 | Diseño e interfaz |
| JavaScript | ES6+ | Filtros, búsqueda e interacción del cliente |
| Git | Actual | Control de versiones |
| GitHub | — | Repositorio y portafolio |
| Laragon | — | Entorno local de desarrollo |
| HeidiSQL | — | Administración y revisión de la base de datos |

\* La versión exacta instalada se verificará antes de preparar la documentación final del proyecto.

---

## Estructura actual

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
├── public/
│   ├── assets/
│   │   ├── css/
│   │   │   └── style.css
│   │   └── js/
│   │       └── app.js
│   │
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

---

## Organización de la aplicación

### `public/index.php`

Es el punto de entrada principal de LinkVault.

Funciona como un **Front Controller** sencillo y recibe las solicitudes realizadas desde la aplicación.

Se encarga de determinar la operación solicitada y coordinar los repositorios y vistas correspondientes.

Entre sus responsabilidades se encuentran:

- listado de enlaces;
- creación;
- edición;
- eliminación;
- favoritos;
- validaciones;
- redirecciones;
- carga de categorías y tags.

---

### `app/repositories/LinkRepository.php`

Contiene las operaciones relacionadas con los enlaces y su persistencia en MySQL.

Centraliza las consultas necesarias para:

- obtener enlaces;
- buscar un enlace mediante su ID;
- crear enlaces;
- actualizar enlaces;
- eliminar enlaces;
- comprobar URLs duplicadas;
- gestionar el estado de favorito.

Esto evita mantener consultas SQL directamente dentro de las vistas.

---

### `app/repositories/CategoryRepository.php`

Contiene las operaciones relacionadas con las categorías.

Permite recuperar las categorías almacenadas en la base de datos para utilizarlas en formularios, filtros y listados.

---

### `app/repositories/TagRepository.php`

Administra las operaciones relacionadas con los tags y la relación muchos-a-muchos entre `links` y `tags`.

Entre sus responsabilidades se encuentran:

- obtener todos los tags;
- obtener los tags asociados a un enlace;
- asociar tags durante la creación de un enlace;
- sincronizar los tags durante la edición.

---

### `views/links/index.php`

Vista principal de LinkVault.

Presenta la tabla de enlaces y los controles disponibles para:

- buscar;
- filtrar por categoría;
- filtrar favoritos;
- visualizar categorías;
- visualizar tags;
- acceder a edición;
- eliminar registros;
- cambiar el estado de favorito.

---

### `views/links/create.php`

Contiene el formulario utilizado para crear nuevos enlaces.

Permite ingresar:

- título;
- URL;
- descripción;
- categoría;
- tags.

---

### `views/links/edit.php`

Contiene el formulario de edición.

Carga los datos existentes del enlace y permite modificar su información, categoría y tags asociados.

Los tags previamente asociados aparecen seleccionados automáticamente.

---

### `public/assets/css/style.css`

Contiene los estilos propios de la interfaz.

Actualmente implementa el tema oscuro, tablas, formularios, botones, badges y estructura visual general.

La adaptación responsive todavía se encuentra pendiente de revisión.

---

### `public/assets/js/app.js`

Contiene la lógica ejecutada en el navegador.

Se utiliza para las funciones interactivas del listado, incluyendo búsqueda y filtros.

---

### `config/database.php`

Configura la conexión local a MySQL mediante PDO.

Este archivo contiene información específica del entorno local y no debe almacenarse públicamente con credenciales reales.

---

### `config/database.example.php`

Plantilla de configuración que permite documentar los parámetros necesarios para establecer la conexión sin exponer credenciales locales.

---

### `database/schema.sql`

Define la estructura de la base de datos y sus tablas.

La base de datos utiliza actualmente:

```text
categories
links
tags
link_tag
```

---

### `database/seed.sql`

Contiene datos iniciales utilizados para preparar el entorno de desarrollo, como categorías y tags predeterminados.

---

## Modelo de datos

La estructura principal puede resumirse de la siguiente manera:

```text
categories
    │
    │ 1:N
    ▼
  links
    │
    │ N:N
    ▼
 link_tag
    │
    ▼
   tags
```

`category_id` relaciona cada enlace con su categoría principal.

La tabla `link_tag` funciona como tabla intermedia para permitir que un enlace tenga múltiples tags.

---

## Estado del proyecto

LinkVault se encuentra funcional y su conjunto principal de características está implementado.

Antes de preparar una versión final para portafolio todavía se revisarán algunos aspectos:

- comportamiento responsive;
- experiencia de usuario;
- seguridad y robustez;
- pruebas finales;
- limpieza y revisión del código;
- documentación de instalación;
- actualización final del README.

Por este motivo, este documento representa el estado actual del proyecto y será actualizado nuevamente antes de considerarlo una versión final.

---

# English

## Description

**LinkVault** is a personal link management web application designed to store, organize, and browse useful resources through a simple interface.

Each link can contain a title, URL, description, and category. Links can also be marked as favorites and associated with one or more tags.

The project started as a basic CRUD application and was later restructured to separate data-access logic, views, configuration, and the application's entry point.

Its primary purpose is to practice core full-stack web development concepts without relying on a backend framework, using PHP, PDO, MySQL, HTML, CSS, and JavaScript directly.

---

## Current Features

- Create links.
- View and list stored links.
- Edit existing links.
- Delete links.
- Validate URLs.
- Prevent duplicate URLs.
- Organize links by category.
- Assign multiple tags to a link.
- Update link-to-tag associations.
- Mark and unmark links as favorites.
- Filter links by category.
- Display favorite links only.
- Search by title, URL, or description.
- Display confirmation and validation messages.
- Dark-themed user interface.

---

## Categories and Tags

LinkVault uses two complementary systems to organize links.

### Categories

Each link belongs to one primary category.

Examples include:

- Programming
- Documentation
- Work
- Tools
- Learning

Links and categories use a **many-to-one relationship**: multiple links can belong to the same category, while each link has one primary category.

### Tags

Tags provide additional ways to describe a link using multiple technologies or concepts.

Examples include:

- PHP
- Laravel
- JavaScript
- MySQL
- React
- Git
- API

Links and tags use a **many-to-many relationship** implemented through the `link_tag` junction table.

A link can have multiple tags, and the same tag can be associated with multiple links.

---

## Technologies

| Technology | Version | Purpose |
|---|---|---|
| PHP | 8.x* | Backend and application logic |
| MySQL | 8.x* | Relational database |
| PDO | Included with PHP | Database connection and queries |
| HTML | HTML5 | View structure |
| CSS | CSS3 | Styling and user interface |
| JavaScript | ES6+ | Client-side search, filtering, and interactions |
| Git | Current | Version control |
| GitHub | — | Repository hosting and portfolio |
| Laragon | — | Local development environment |
| HeidiSQL | — | Database administration and inspection |

\* The exact installed version will be verified before the final project documentation is prepared.

---

## Project Structure

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
├── public/
│   ├── assets/
│   │   ├── css/
│   │   │   └── style.css
│   │   └── js/
│   │       └── app.js
│   │
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

---

## Application Architecture

### `public/index.php`

The main entry point for LinkVault.

It acts as a lightweight **Front Controller**, receiving application requests and coordinating the appropriate repositories and views.

Its responsibilities include link listing, creation, editing, deletion, favorites, validation, redirects, and loading categories and tags.

### `app/repositories/LinkRepository.php`

Contains data-access operations related to links.

It centralizes the SQL operations required to retrieve, create, update, and delete links, check duplicate URLs, and manage favorite status.

### `app/repositories/CategoryRepository.php`

Contains category-related data-access operations and provides category data to forms, filters, and views.

### `app/repositories/TagRepository.php`

Manages tags and the many-to-many relationship between links and tags.

It retrieves available tags, retrieves tags assigned to individual links, creates associations, and synchronizes them when a link is edited.

### `views/links/index.php`

The main application view.

It displays stored links and provides search, category filtering, favorite filtering, tag and category information, and link management actions.

### `views/links/create.php`

Contains the form used to create links and assign their category and tags.

### `views/links/edit.php`

Contains the link editing form.

Existing link information is loaded into the form, including the currently assigned tags.

### `public/assets/css/style.css`

Contains the application's custom styles, including its dark theme, forms, tables, buttons, badges, and general layout.

Responsive behavior is still scheduled for additional review.

### `public/assets/js/app.js`

Contains client-side application behavior, including search and filtering functionality.

### `config/database.php`

Defines the local PDO database connection.

Environment-specific credentials should not be committed to a public repository.

### `config/database.example.php`

Provides an example database configuration without exposing local credentials.

### `database/schema.sql`

Defines the relational database structure.

The current database contains:

```text
categories
links
tags
link_tag
```

### `database/seed.sql`

Provides initial development data such as default categories and tags.

---

## Data Model

```text
categories
    │
    │ 1:N
    ▼
  links
    │
    │ N:N
    ▼
 link_tag
    │
    ▼
   tags
```

Each link references its primary category through `category_id`.

The `link_tag` junction table implements the many-to-many relationship between links and tags.

---

## Project Status

LinkVault is currently functional, and its primary feature set has been implemented.

Before preparing the final portfolio release, additional work is planned for:

- responsive behavior;
- user experience improvements;
- security and robustness;
- final testing;
- code cleanup and review;
- installation documentation;
- final README revision.

This README therefore documents the project's current state and will be updated again before the final portfolio release.
