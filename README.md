# 🔗 LinkVault

![Status](https://img.shields.io/badge/status-in%20development-yellow)
![PHP](https://img.shields.io/badge/PHP-8.3-777BB4?logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-8.4-4479A1?logo=mysql&logoColor=white)
![JavaScript](https://img.shields.io/badge/JavaScript-ES6-F7DF1E?logo=javascript&logoColor=black)
![HTML5](https://img.shields.io/badge/HTML5-E34F26?logo=html5&logoColor=white)
![CSS3](https://img.shields.io/badge/CSS3-1572B6?logo=css3&logoColor=white)

> 🚧 **Project Status: In Development**

LinkVault is currently under active development. The repository represents an ongoing portfolio project, and its features, structure, and documentation will continue to evolve.

---

## 🇬🇧 English

### 📖 About the project

**LinkVault** is a personal web application designed to store, organize, classify, and manage useful web resources in one place.

Instead of keeping useful links scattered across browser bookmarks, notes, messages, or documents, LinkVault aims to provide a structured interface where users can save resources and organize them using **categories, tags, and favorites**.

The project is also being developed as a practical portfolio project focused on applying and reinforcing fundamental concepts of **web development, PHP, relational databases, SQL, JavaScript, and application architecture**.

### ✨ Planned features

- 🔗 Create and store web links
- 📝 Add titles and descriptions to saved resources
- 📁 Organize links using categories
- 🏷️ Assign multiple tags to links
- ⭐ Mark important links as favorites
- 🔎 Search and filter stored resources
- ✏️ Edit existing links
- 🗑️ Delete links
- 🗃️ Persistent storage using MySQL

Additional features may be incorporated as development progresses.

### 🛠️ Technologies

| Technology | Purpose |
|---|---|
| 🟣 **PHP 8.3** | Backend logic and database communication |
| 🔵 **MySQL 8.4** | Relational data storage |
| 🟨 **JavaScript (ES6)** | Client-side behavior and interactivity |
| 🟧 **HTML5** | Application structure |
| 🔷 **CSS3** | Interface design and styling |
| 🗄️ **PDO** | PHP database connection and SQL operations |
| 🌿 **Git** | Version control |
| 🐙 **GitHub** | Repository and project history |
| 🖥️ **Laragon** | Local PHP/MySQL development environment |

### 🗄️ Database structure

The current relational model contains four main tables:

- **`categories`** — Stores the categories used to organize resources.
- **`links`** — Main table containing the saved web resources.
- **`tags`** — Stores reusable tags.
- **`link_tag`** — Junction table implementing the many-to-many relationship between links and tags.

Current relationships:

```text
categories  1 ─────── N  links

links       N ─────── N  tags
                 │
              link_tag
```

Database creation and initial data scripts are available in:

```text
database/
├── schema.sql
└── seed.sql
```

### 🚧 Current development status

The project is currently in its initial backend development stage.

Implemented so far:

- ✅ Local PHP development environment
- ✅ MySQL database
- ✅ Relational database schema
- ✅ Categories and initial tags
- ✅ PHP connection to MySQL using PDO
- ✅ Git/GitHub version control
- 🔄 Dynamic application functionality — **in progress**
- 🔄 Link CRUD operations — **in progress**
- 🔄 Search, filters, favorites and tag management — **planned**

> The application is **not considered production-ready** at this stage.

---

## 🇨🇱 Español

### 📖 Sobre el proyecto

**LinkVault** es una aplicación web personal diseñada para guardar, organizar, clasificar y administrar recursos web útiles desde un único lugar.

En vez de mantener enlaces repartidos entre favoritos del navegador, notas, mensajes o documentos, LinkVault busca proporcionar una interfaz estructurada donde sea posible almacenar recursos y organizarlos mediante **categorías, etiquetas y favoritos**.

El proyecto también está siendo desarrollado como proyecto práctico de portafolio, enfocado en aplicar y reforzar conceptos fundamentales de **desarrollo web, PHP, bases de datos relacionales, SQL, JavaScript y arquitectura de aplicaciones**.

### ✨ Funcionalidades planificadas

- 🔗 Crear y almacenar enlaces web
- 📝 Añadir títulos y descripciones a los recursos
- 📁 Organizar enlaces mediante categorías
- 🏷️ Asignar múltiples etiquetas a los enlaces
- ⭐ Marcar enlaces importantes como favoritos
- 🔎 Buscar y filtrar recursos almacenados
- ✏️ Editar enlaces existentes
- 🗑️ Eliminar enlaces
- 🗃️ Persistencia de datos mediante MySQL

Se podrán incorporar funcionalidades adicionales durante el desarrollo.

### 🛠️ Tecnologías

| Tecnología | Uso |
|---|---|
| 🟣 **PHP 8.3** | Lógica backend y comunicación con la base de datos |
| 🔵 **MySQL 8.4** | Almacenamiento relacional |
| 🟨 **JavaScript (ES6)** | Comportamiento e interactividad del cliente |
| 🟧 **HTML5** | Estructura de la aplicación |
| 🔷 **CSS3** | Diseño y estilos de la interfaz |
| 🗄️ **PDO** | Conexión de PHP con MySQL y operaciones SQL |
| 🌿 **Git** | Control de versiones |
| 🐙 **GitHub** | Repositorio e historial del proyecto |
| 🖥️ **Laragon** | Entorno local de desarrollo PHP/MySQL |

### 🗄️ Estructura de la base de datos

El modelo relacional actual utiliza cuatro tablas principales:

- **`categories`** — Almacena las categorías utilizadas para organizar recursos.
- **`links`** — Tabla principal que almacena los enlaces.
- **`tags`** — Almacena etiquetas reutilizables.
- **`link_tag`** — Tabla intermedia que implementa la relación muchos-a-muchos entre enlaces y etiquetas.

Relaciones actuales:

```text
categories  1 ─────── N  links

links       N ─────── N  tags
                 │
              link_tag
```

Los scripts para crear y poblar inicialmente la base de datos se encuentran en:

```text
database/
├── schema.sql
└── seed.sql
```

### 🚧 Estado actual del desarrollo

Actualmente LinkVault se encuentra en una **etapa inicial de desarrollo backend**.

Implementado hasta ahora:

- ✅ Entorno local PHP configurado
- ✅ Base de datos MySQL
- ✅ Modelo relacional de la base de datos
- ✅ Categorías y etiquetas iniciales
- ✅ Conexión PHP → MySQL mediante PDO
- ✅ Control de versiones mediante Git/GitHub
- 🔄 Funcionalidad dinámica de la aplicación — **en desarrollo**
- 🔄 Operaciones CRUD de enlaces — **en desarrollo**
- 🔄 Búsqueda, filtros, favoritos y gestión de etiquetas — **planificado**

> La aplicación todavía **no se considera lista para producción**.

---

## 📂 Project structure / Estructura del proyecto

```text
LinkVault/
├── assets/
├── config/
│   ├── database.php
│   └── database.example.php
├── database/
│   ├── schema.sql
│   └── seed.sql
├── .gitignore
├── index.php
└── README.md
```

> `config/database.php` contains local database configuration and is excluded from version control. `database.example.php` provides the configuration template.

---

## 🎯 Project purpose / Objetivo del proyecto

This project is part of a practical portfolio focused on strengthening full-stack web development skills through small, functional applications built progressively.

Este proyecto forma parte de un portafolio práctico orientado a reforzar habilidades de desarrollo web full-stack mediante aplicaciones pequeñas y funcionales construidas progresivamente.

---

## 📌 Development

Development is ongoing. The README will be updated as new features and milestones are completed.

El desarrollo continúa activo. Este README será actualizado a medida que se implementen nuevas funcionalidades y se completen nuevos hitos.
