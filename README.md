# Employee API

A Laravel-based RESTful API for managing Employees, Departments, Service Records, and Users. This repository provides the application scaffolding, Eloquent models, migrations, seeders, and API routes used for CRUD operations and basic authentication.

## Quick facts

-   Framework: Laravel (PHP)
-   Main models: `Employee`, `Department`, `ServiceRecord`, `User` (in `app/Models`)
-   Routes: `routes/api.php`
-   Tests: PHPUnit configured under `tests/`

## Requirements

-   PHP 8.0+ (check `composer.json` for exact constraints)
-   Composer
-   A compatible database (MySQL, MariaDB, PostgreSQL, sqlite)
-   Node.js & npm (optional, for compiling frontend assets with Laravel Mix)

## Database and Seeders

This project includes migrations for users, departments, employees and service records. Seeders available:

-   `DepartmentTableSeeder`
-   `UsersTableSeeder`

If you need a fresh database during development, run:

```bash
php artisan migrate:fresh --seed
```

## Authentication

Authentication is handled using Laravel's default mechanisms and token-based access for API routes (check `config/auth.php` and `app/Models/User.php` for token setup). Routes that require authentication are protected with the `auth` middleware or a custom guard — see `routes/api.php` for details.

## API Reference (summary)

Review `routes/api.php` for full route definitions. Common endpoints include:

-   `POST /api/register` — register a new user
-   `POST /api/login` — login and receive token
-   `GET /api/departments` — list departments
-   `GET /api/departments/{id}` — show department
-   `POST /api/departments` — create department
-   `GET /api/employees` — list employees (supports filters/search if implemented)
-   `GET /api/employees/{id}` — show employee (including related service records)
-   `POST /api/employees` — create employee
-   `GET /api/service-records` — list service records

Note: Exact URIs and required parameters depend on controller implementations. Use the route file and controllers in `app/Http/Controllers` for authoritative details.

## Models & Relationships

-   Employee: hasMany ServiceRecord
-   ServiceRecord: belongsTo Employee, belongsTo Department (if applicable)
-   Department: hasMany ServiceRecord (or hasMany Employees depending on implementation)
