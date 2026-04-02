# Artisan Commands List - Jay Portfolio API

This document lists the essential Artisan commands used in the Jay Portfolio API.

## Database Management
- `php artisan migrate`: Runs pending migrations.
- `php artisan migrate:fresh`: Drops all tables and re-runs all migrations.
- `php artisan db:seed`: Seeds the database with initial data.
- `php artisan migrate:fresh --seed`: Resets the database and seeds it with initial data.
- `php artisan make:migration create_table_name`: Creates a new migration file.
- `php artisan make:seeder TableSeeder`: Creates a new seeder file.

## Authentication and API Setup
- `php artisan install:api`: Installs Laravel Sanctum and configures the API routes.
- `php artisan sanctum:prune-expired`: Removes expired Sanctum tokens.

## Development Tools
- `php artisan serve`: Starts the local development server.
- `php artisan route:list`: Lists all registered routes.
- `php artisan tinker`: Opens an interactive shell to interact with the database and models.
- `php artisan key:generate`: Generates a new application key.

## Creating New Components
- `php artisan make:model ModelName -m`: Creates a new model and its migration file.
- `php artisan make:controller API/NameController --api`: Creates a new API controller.
- `php artisan make:resource NameResource`: Creates a new API resource for consistent JSON output.
- `php artisan make:request NameRequest`: Creates a new Form Request for validation.

## Other Commands
- `php artisan cache:clear`: Clears the application cache.
- `php artisan config:clear`: Clears the configuration cache.
- `php artisan view:clear`: Clears the view cache.
- `php artisan route:clear`: Clears the route cache.
- `php artisan optimize`: Re-caches all necessary components for performance.
