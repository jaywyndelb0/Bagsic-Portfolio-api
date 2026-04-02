# Postman Testing Guide - Jay Portfolio API (API Only Focus)

This project is now **API Only**. All UI, Blade templates, and web controllers have been removed to focus entirely on the REST API.

## Base URL
`http://127.0.0.1:8000/api`

## Authentication Endpoints (API)

### 1. Register
- **Method:** POST
- **URL:** `{{base_url}}/register`
- **Body (raw JSON):**
```json
{
    "name": "Jay Wyndel Bagsic",
    "email": "jaywyndelb0@gmail.com",
    "password": "password",
    "password_confirmation": "password"
}
```

### 2. Login
- **Method:** POST
- **URL:** `{{base_url}}/login`
- **Body (raw JSON):**
```json
{
    "email": "jaywyndelb0@gmail.com",
    "password": "password"
}
```
- **Note:** Copy the `token` from the response to use in protected routes.

### 3. Get Authenticated User (Protected)
- **Method:** GET
- **URL:** `{{base_url}}/user`
- **Auth:** Bearer Token

### 4. Logout (Protected)
- **Method:** POST
- **URL:** `{{base_url}}/logout`
- **Auth:** Bearer Token

## Portfolio Data Endpoints (Public)

### 1. Get Full Portfolio
- **Method:** GET
- **URL:** `{{base_url}}/portfolio`

### 2. View Individual Modules
- **GET** `{{base_url}}/profile`
- **GET** `{{base_url}}/about-me`
- **GET** `{{base_url}}/skills`
- **GET** `{{base_url}}/tech-stacks`
- **GET** `{{base_url}}/education`
- **GET** `{{base_url}}/experiences`
- **GET** `{{base_url}}/projects`
- **GET** `{{base_url}}/social-links`

## Management Endpoints (Protected CRUD)
*Requires Authorization: Bearer TOKEN*

All modules (Skills, Projects, Education, Tech Stacks, Experiences, Social Links) support standard RESTful CRUD and a simplified **Upsert** (Create or Update) logic:

### 1. Upsert (Recommended for Easy Updates)
- **Method:** POST
- **URL:** `{{base_url}}/{module}`
- **Body:** Include `"id"` in the JSON body to **UPDATE** an existing record, or leave it out to **CREATE** a new one.
- **Example (Update Education ID 1):**
```json
{
    "id": 1,
    "school_name": "Updated School Name",
    "degree": "BSIT-3",
    "is_current": true
}
```

### 2. Standard RESTful Endpoints
- **POST** `{{base_url}}/{module}` (Create only)
- **PUT/PATCH** `{{base_url}}/{module}/{id}` (Update only)
- **DELETE** `{{base_url}}/{module}/{id}` (Delete)

*Note: For Profile and About Me, the ID is always fixed at 1, so they are always in Upsert mode.*

## Setup Instructions
1. Ensure your `.env` is configured for MySQL.
2. Run `php artisan migrate:fresh --seed`.
3. Start the server: `php artisan serve`.
4. Import the provided Postman collection for easier testing.
