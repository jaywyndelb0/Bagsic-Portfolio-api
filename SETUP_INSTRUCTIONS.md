# Setup Instructions - Jay Portfolio API (API Only)

Follow these steps to set up and run the Jay Portfolio API project locally.

## Prerequisites
- PHP 8.2+
- Composer
- MySQL Server (XAMPP/Laragon/Local MySQL)

## Installation Steps

1. **Clone the repository or navigate to the project directory.**

2. **Install dependencies:**
   ```bash
   composer install
   ```

3. **Configure the environment:**
   - Update `DB_DATABASE`, `DB_USERNAME`, and `DB_PASSWORD` in `.env` to match your local MySQL setup.

4. **Generate the application key:**
   ```bash
   php artisan key:generate
   ```

5. **Run migrations and seed the database:**
   ```bash
   php artisan migrate:fresh --seed
   ```
   *This will create all necessary tables and seed the database with the student portfolio data.*

6. **Start the local development server:**
   ```bash
   php artisan serve
   ```
   - **API Base URL**: `http://127.0.0.1:8000/api`
   - **Check API Status**: `http://127.0.0.1:8000/` (returns JSON)

## Authentication
- **API Auth**: Use `/api/login` to get a Bearer token.
- **Default User**: `jaywyndelb0@gmail.com` / `password`

## Project Focus
This project is **API-only**. There are no Blade templates or frontend pages. All interactions should be done via HTTP requests (Postman, Insomnia, or a frontend framework).
