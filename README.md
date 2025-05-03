# 🚛 Sistema de Gestión de Transporte por Carretera

Este proyecto es una aplicación web desarrollada en **Laravel 12** con **Filament Admin**, orientada a la gestión de empresas de transporte terrestre. Permite administrar:

- Conductores
- Tractoras
- Remolques
- Rutas
- Gastos de viaje
- Y más funcionalidades relacionadas

## 📦 Características principales

- Backend moderno con Laravel 12
- Panel de administración usando Filament
- Gestión de entidades de transporte
- Control de gastos por viaje y vehículo
- Licencia gratuita para uso y adaptación

## ⚙️ Requisitos

Antes de clonar este repositorio asegúrate de tener instalado:

- PHP >= 8.2
- Composer
- Node.js y NPM
- MySQL o PostgreSQL
- Extensiones de PHP necesarias (pdo, mbstring, etc.)

## 🚀 Instalación

```bash
# Clonar el repositorio
git clone https://github.com/tuusuario/nombre-del-repo.git
cd nombre-del-repo

# Instalar dependencias de PHP
composer install

# Instalar dependencias de Node
npm install && npm run build

# Copiar y configurar variables de entorno
cp .env.example .env
# Edita .env con tus credenciales de base de datos y otras configuraciones necesarias

# Generar la clave de la aplicación
php artisan key:generate

# Ejecutar migraciones (y seeders si existen)
php artisan migrate

# Iniciar el servidor local
php artisan serve
## 📄 Licencia


Este proyecto está licenciado bajo la [Licencia MIT](./LICENSE). Puedes usarlo, modificarlo y distribuirlo libremente.

