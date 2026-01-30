# Security Documentation

The MADz Arts Laravel 12 application implements multi-layered security measures to ensure data integrity and user safety.

## 1. Authentication & Session Management
- **Laravel Jetstream**: Uses the battle-tested Fortify engine for secure login, registration, and session management.
- **CSRF Protection**: All state-changing requests (POST, PUT, DELETE) require a CSRF token.
- **Session Security**: Cookies are `HttpOnly` and `SameSite: Lax` by default.

## 2. Authorization (RBAC)
- **Role Middleware**: Custom `role` middleware enforces access to `/admin` routes.
- **Eloquent Policies**: `OrderPolicy` prevents users from viewing orders they don't own.
- **Admin Helpers**: `isAdmin()` method on the `User` model centralizes role checking.

## 3. Data Integrity
- **Mass Assignment**: Models use strict `$fillable` arrays to prevent rogue parameter injection.
- **Input Validation**: All user inputs are validated using Laravel's validation engine before processing.
- **SQL Injection**: Eloquent ORM and Query Builder use PDO parameter binding for all queries.

## 4. API Security
- **Laravel Sanctum**: API routes are protected by token-based authentication.
- **Personal Access Tokens**: Users generate unique tokens with limited scope for secure API access.

## 5. File Security
- **Image Validation**: Uploaded artworks are validated for mime type and size.
- **Public Storage**: Only necessary assets are placed in the `public` directory. Sensitive data remains in `storage/app` (protected by `.gitignore`).
