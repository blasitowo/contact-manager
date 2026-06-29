# 📒 Gestor de Contactos - Laravel

Aplicación web simple para la gestión de contactos, desarrollada con Laravel 10/11 (la versión que uses) y Bootstrap 5. Permite crear, leer, actualizar y eliminar contactos, con búsqueda en tiempo real y validación de teléfonos internacionales.

## 🚀 Funcionalidades

- CRUD completo de contactos (nombre, email, teléfono, dirección).
- Validación de email único y formato de teléfono con `laravel-phone`.
- Búsqueda en tiempo real (AJAX) por nombre o email, con debounce.
- Paginación de resultados (10 por página).
- Interfaz responsiva con Bootstrap 5.
- Normalización automática de emails a minúsculas.

## 📦 Tecnologías

- **Backend:** Laravel 10/11, PHP 8.1+
- **Frontend:** Blade, Bootstrap 5, JavaScript (fetch API)
- **Base de datos:** MySQL / SQLite (configurable)
- **Librerías adicionales:** `laravel-phone`, `intl-tel-input` (para validación de teléfonos)

## ⚙️ Instalación y uso

1. Clonar el repositorio:
   ```bash
   git clone https://github.com/blasitowo/contact-manager.git
   cd contact-manager
